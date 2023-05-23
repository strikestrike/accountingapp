<?php
include_once(dirname(__FILE__) . "/Admin.php");

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class AdminCountry extends Admin
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','html','form'));
		$this->load->library('form_validation');
		$this->admin_auth();
	}

	public function index()
	{
		$this->admin_auth();

		$data['country_list'] = $this->admin_model->getCountryList();

		$this->load->view('admin/layout/header1');
		$this->load->view('admin/country/index', $data);
		$this->load->view('admin/layout/footer1');
	}

	public function delete() {
		$id = $this->input->post('id');

		$this->admin_model->deleteCountryById($id);

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode(array('success' => 'true')));
	}

	public function import() {
		$path 		= './upload/imports/';
		$json 		= [];
		$upload_status =  $this->uploadxlsxDoc();
		if (!$upload_status) {
			$json = [
				'error_message' => ($this->upload->display_errors()),
			];
		} else {
			$filename = FCPATH . 'upload/imports/' . $upload_status;

			$arr_file 	= explode('.', $filename);
			$extension 	= end($arr_file);
			if('csv' == $extension) {
				$reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader 	= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}
			$spreadsheet 	= $reader->load($filename);
			$sheet_data 	= $spreadsheet->getActiveSheet()->toArray();
			$list 			= [];
			foreach($sheet_data as $key => $val) {
				if($key != 0) {
					$list [] = [
						'name'					=> $val[0],
						'code_letter'			=> $val[1],
						'code_number'			=> $val[2],
					];
				}
			}

			if(file_exists($filename))
				unlink($filename);

			if(count($list) > 0) {
				$result 	= $this->admin_model->insertCountryDataFromExcel($list);
				if($result) {
					$this->session->set_flashdata('success', 'Data uploaded successfully!');
					echo "<script>window.location.href='" . base_url('admin/country') . "';</script>";
					die;
				} else {
					$json = [
						'error_message' 	=> ("Something went wrong. Please try again.")
					];
				}
			} else {
				$json = [
					'error_message' => ("No new record is found."),
				];
			}
		}

		$this->session->set_flashdata('success', 'Import data failed!');
		echo "<script>window.location.href='" . base_url('admin/country') . "';</script>";
		die;
	}

	public function upload_config($path) {
		if (!is_dir($path))
			mkdir($path, 0777, TRUE);
		$config['upload_path'] 		= './'.$path;
		$config['allowed_types'] 	= 'csv|CSV|xlsx|XLSX|xls|XLS';
		$config['max_filename']	 	= '255';
		$config['encrypt_name'] 	= TRUE;
		$config['max_size'] 		= 4096;
		$this->load->library('upload', $config);
	}
}
