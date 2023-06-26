<?php
include_once(dirname(__FILE__) . "/Admin.php");
class Caen extends Admin
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('calculation');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->admin_auth();
	}

	/**
	 * Load CAEN page with data
	 *
	 * @return void
	 */
	public function index()
	{
		$data['caen_codes_list'] = $this->admin_model->getCaenData();
		
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/caen/caen_list', $data);
		$this->load->view('admin/layout/footer1');
	}

	/**
	 * Import CAEN data from CSV file
	 *
	 * @return void
	 */
	public function import()
	{
		// dd($_FILES);
		$data = array();
		if (!empty($_FILES['upload']['name'])) {
			// Set preference 
			// dd("here");
			$config['upload_path'] = 'upload/imports/';
			$config['allowed_types'] = 'csv';
			$config['max_size'] = '1000'; // max_size in kb 
			$config['file_name'] = $_FILES['upload']['name'];

			// dd("uploaded");
			// Load upload library 
			$this->load->library('upload', $config);
			$upload_status =  $this->uploadCSV();
			// dd($upload_status);
			// File upload
			if ($upload_status) {
				// Get filename
				$filename = FCPATH . 'upload/imports/' . $upload_status;

				// Reading file
				$file = fopen($filename, "r");
				$i = 0;
				$numberOfFields = 2; // Total number of fields
				$importData_arr = array();

				while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
					// dd("here");
					$num = count($filedata);
					// dd($num);
					// if ($numberOfFields == $num) {
						// dd("in");
						for ($c = 0; $c < $num; $c++) {
							$importData_arr[$i][] = $filedata[$c];
						}
					// }
					$i++;
				}
				fclose($file);

				$skip = 0;

				// insert import data
				foreach ($importData_arr as $userdata) {
					
					// Skip first row
					if ($skip != 0) {
						$this->admin_model->importCaenCodes($userdata);
					}
					$skip++;
				}
				$data['response'] = 'successfully uploaded ' . $filename;
			} else {
				$data['response'] = 'failed';
			}
		} else {
			$data['response'] = 'failed';
		}
		// load view 
		$this->session->set_flashdata('success', 'Data uploaded successfully!');
		echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
		die;
	}

	/**
	 * Update CAEN data in bulk using CSV file
	 *
	 * @return void
	 */
	public function updateCSV()
	{
		$data = array();
		if (!empty($_FILES['upload']['name'])) {
			// Set preference 
			$config['upload_path'] = 'upload/imports/';
			$config['allowed_types'] = 'csv';
			$config['max_size'] = '1000'; // max_size in kb 
			$config['file_name'] = $_FILES['upload']['name'];

			// Load upload library 
			$this->load->library('upload', $config);
			$upload_status =  $this->uploadCSV();
			// File upload
			if ($upload_status) {
				// Get filename
				$filename = FCPATH . 'upload/imports/' . $upload_status;

				// Reading file
				$file = fopen($filename, "r");
				$i = 0;
				$numberOfFields = 3; // Total number of fields
				$importData_arr = array();

				while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
					$num = count($filedata);

					if ($numberOfFields == $num) {
						for ($c = 0; $c < $num; $c++) {
							$importData_arr[$i][] = $filedata[$c];
						}
					} else {
						$this->session->set_flashdata('error', 'Please download the below CSV file to update records!');
						echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
						die;
					}
					$i++;
				}
				fclose($file);

				$skip = 0;

				// insert import data
				foreach ($importData_arr as $userdata) {

					// Skip first row
					if ($skip != 0) {
						// dd($userdata);
						$this->admin_model->updateCaenCSV($userdata);
					}
					$skip++;
				}
				$data['response'] = 'successfully uploaded ' . $filename;
			} else {
				$this->session->set_flashdata('error', 'Please choose CSV file!');
				echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
				die;
			}
		} else {
			$data['response'] = 'failed';
		}
		// dd($data);
		// load view 
		$this->session->set_flashdata('success', 'Data uploaded successfully!');
		echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
		die;
	}

	/**
	 * Replace the current records with 
	 * new records uploaded using CSV file
	 *
	 * @return void
	 */
	public function replace()
	{
		$data = array();
		if (!empty($_FILES['upload']['name'])) {
			// Set preference 
			$config['upload_path'] = 'upload/imports/';
			$config['allowed_types'] = 'csv';
			$config['max_size'] = '1000'; // max_size in kb 
			$config['file_name'] = $_FILES['upload']['name'];

			// Load upload library 
			$this->load->library('upload', $config);
			$upload_status =  $this->uploadCSV();
			// File upload
			if ($upload_status) {
				// Get filename
				$filename = FCPATH . 'upload/imports/' . $upload_status;

				// Reading file
				$file = fopen($filename, "r");
				$i = 0;
				$numberOfFields = 2; // Total number of fields
				$importData_arr = array();


				while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
					$num = count($filedata);

					if ($numberOfFields == $num) {
						// dd("hi");
						for ($c = 0; $c < $num; $c++) {
							$importData_arr[$i][] = $filedata[$c];
						}
					} else {
						$this->session->set_flashdata('error', 'Please choose a valid CSV file to replace records!');
						echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
						die;
					}
					$i++;
				}
				fclose($file);

				if(count($importData_arr) > 1) {
					// first, delete all data in the table
					if($this->admin_model->deleteAllCaen()) {
						$skip = 0;						
						// insert/import data
						foreach ($importData_arr as $userdata) {
							// Skip first row
							if ($skip != 0) {
								$this->admin_model->importCaenCodes($userdata);
							}
							$skip++;
						}
						$data['response'] = 'successfully uploaded ' . $filename;
					}
				}
				else {
					$this->session->set_flashdata('error', 'No data found in selected file!');
					echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
					die;
				}				
			} else {
				$this->session->set_flashdata('error', 'Please choose CSV file!');
				echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
				die;
			}
		} else {
			$data['response'] = 'failed';
		}
		// dd($data);
		// load view 
		$this->session->set_flashdata('success', 'Data uploaded successfully!');
		echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
		die;
	}

	/**
	 * Deactivate CAEN records in bulk uisng CSV file
	 *
	 * @return void
	 */
	public function deactivate()
	{
		$data = array();
		if (!empty($_FILES['upload']['name'])) {
			// Set preference 
			$config['upload_path'] = 'upload/imports/';
			$config['allowed_types'] = 'csv';
			$config['max_size'] = '1000'; // max_size in kb 
			$config['file_name'] = $_FILES['upload']['name'];

			// Load upload library 
			$this->load->library('upload', $config);
			$upload_status =  $this->uploadCSV();
			// File upload
			if ($upload_status) {
				// Get filename
				$filename = FCPATH . 'upload/imports/' . $upload_status;

				// Reading file
				$file = fopen($filename, "r");
				$i = 0;
				$numberOfFields = 2; // Total number of fields
				$importData_arr = array();

				while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
					$num = count($filedata);

					if ($numberOfFields == $num) {
						// dd("hi");
						for ($c = 0; $c < $num; $c++) {
							$importData_arr[$i][] = $filedata[$c];
						}
					}
					$i++;
				}
				fclose($file);

				$skip = 0;

				// insert import data
				foreach ($importData_arr as $userdata) {

					// Skip first row
					if ($skip != 0) {
						// dd($userdata);
						$this->admin_model->deactivateCaen($userdata);
					}
					$skip++;
				}
				$data['response'] = 'successfully uploaded ' . $filename;
			} else {
				$this->session->set_flashdata('error', 'Please choose CSV file!');
				echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
				die;
			}
		} else {
			$data['response'] = 'failed';
		}
		// dd($data);
		// load view 
		$this->session->set_flashdata('success', 'Data updated successfully!');
		echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
		die;
	}

	/**
	 * Activate CAEN records in bulk using CSV file
	 *
	 * @return void
	 */
	public function activate()
	{
		$data = array();
		if (!empty($_FILES['upload']['name'])) {
			// Set preference 
			$config['upload_path'] = 'upload/imports/';
			$config['allowed_types'] = 'csv';
			$config['max_size'] = '1000'; // max_size in kb 
			$config['file_name'] = $_FILES['upload']['name'];

			// Load upload library 
			$this->load->library('upload', $config);
			$upload_status =  $this->uploadCSV();
			// File upload
			if ($upload_status) {
				// Get filename
				$filename = FCPATH . 'upload/imports/' . $upload_status;

				// Reading file
				$file = fopen($filename, "r");
				$i = 0;
				$numberOfFields = 2; // Total number of fields
				$importData_arr = array();

				while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
					$num = count($filedata);

					if ($numberOfFields == $num) {
						// dd("hi");
						for ($c = 0; $c < $num; $c++) {
							$importData_arr[$i][] = $filedata[$c];
						}
					}
					$i++;
				}
				fclose($file);

				$skip = 0;

				// insert import data
				foreach ($importData_arr as $userdata) {

					// Skip first row
					if ($skip != 0) {
						// dd($userdata);
						$this->admin_model->activateCaen($userdata);
					}
					$skip++;
				}
				$data['response'] = 'successfully uploaded ' . $filename;
			} else {
				$this->session->set_flashdata('error', 'Please choose CSV file!');
				echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
				die;
			}
		} else {
			$data['response'] = 'failed';
		}
		// dd($data);
		// load view 
		$this->session->set_flashdata('success', 'Data updated successfully!');
		echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
		die;
	}

	/**
	 * Fetch CAEN code information by id
	 *
	 * @param int $id
	 * @return void
	 */
	public function fetch($id)
	{
		$data = $this->admin_model->fetchCaenById($id);
		if (!empty($data)) {
			echo json_encode($data);
		} else {
			echo false;
		}
	}

	/**
	 * Update CAEN code information
	 *
	 * @return void
	 */
	public function update()
	{
		$data = $this->input->post();
		
		$config = [
			[
				'field' => 'id',
				'label' => 'id',
				'rules' => 'required|trim'
			],
			[
				'field' => 'code',
				'label' => 'Code',
				'rules' => 'required|trim'
			],
			[
				'field' => 'description',
				'label' => 'Description',
				'rules' => 'required|trim'
			],
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
			die;
		} else {
			$id = $data['id'];
			$updata['code'] = $data['code'];
			$updata['description'] = $data['description'];

			if ($this->admin_model->updateCaen($id, $updata)) {
			}
			$this->session->set_flashdata('success', 'Record has been updated successfully!!');
			echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
			die;
		}
	}
	
	/**
	 * Manually insert a new CAEN record
	 *
	 * @return void
	 */
	public function insert()
	{
		$data = $this->input->post();
		
		$config = [
			[
				'field' => 'code',
				'label' => 'Code',
				'rules' => 'required|trim'
			],
			[
				'field' => 'description',
				'label' => 'Description',
				'rules' => 'required|trim'
			],
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
			die;
		} 
		else {
			$updata['code'] = $data['code'];
			$updata['description'] = $data['description'];

			if ($this->admin_model->insertCaen($updata)) {
			}
			$this->session->set_flashdata('success', 'CAEN added successfully!!');
			echo "<script>window.location.href='" . base_url('admin/caen') . "';</script>";
			die;
		}
	}

	/**
	 * Delete a CAEN record from the database
	 *
	 * @return void
	 */
	public function destroy()
	{
		$data = $this->input->post();	
		$id = $data['id'];

		if($this->admin_model->deleteCaenById($id)) 
			return true;
		return false;
	}

	/**
	 * Activate or deactivate CAEN record
	 *
	 * @return void
	 */
	public function updateStatus()
	{
		$data = $this->input->post();
		$id = $data['id'];
		$value = $data['value'];
		if($this->admin_model->updateCaenStatus($id, $value))
			echo true;
		echo false;
	}

}
