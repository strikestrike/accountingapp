<?php
include_once(dirname(__FILE__) . "/Admin.php");

use PhpOffice\PhpSpreadsheet\IOFactory;

class IncomeNorms extends Admin
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
	 * Load Income Norms page with data
	 *
	 * @return void
	 */
	public function index()
	{
		$data['caen'] = $this->admin_model->getCaenData();
		$data['county'] = $this->admin_model->getCountiesNames();
		$data['pending_columns'] = $this->admin_model->getPendingColumn();
		$data['completed_columns'] = $this->admin_model->getImportCompletedColumns();
		$data['templates'] = $this->admin_model->getTemplatesList();
		// dd($data['templates']);
		if ($data['templates'])
			$data['templates'] = json_encode($data['templates']);
		// dd($data['templates']);
		// dd($data['completed_columns']);
		// dd($data['pending_columns']);
		// dd($data['county']);
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/income_norms/add', $data);
		$this->load->view('admin/layout/footer1');
	}

	public function viewTemplate($template_id)
	{
		$data['caen'] = $this->admin_model->getCaenData();
		$data['county'] = $this->admin_model->getCountiesNames();
		$data['template_info'] = $this->admin_model->getTemplateById($template_id);
		$data['templates'] = $this->admin_model->getTemplatesList();
		if ($data['templates'])
			$data['templates'] = json_encode($data['templates']);

		// dd($data['template_info']);

		$this->load->view('admin/layout/header1');
		$this->load->view('admin/income_norms/view', $data);
		$this->load->view('admin/layout/footer1');
	}

	public function processIncomeNorms()
	{
		$data = $this->input->post();
		$pending_col_id = '';
		if (!empty($data['pending_col_id'])) {
			$pending_col_id = $data['pending_col_id'];
		}
		// dd($data);
		// dd($_FILES);
		// echo json_encode("hi");
		if (!empty($_FILES['xlsx_file']['name'])) {
			// Set preference 
			$config['upload_path'] = 'upload/imports/';
			$config['allowed_types'] = 'csv|xlsx|xls';
			$config['max_size'] = '1000000000'; // max_size in kb 
			$config['file_name'] = $_FILES['xlsx_file']['name'];
			// dd($config);

			// Load upload library 
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			$upload_status =  $this->upload->do_upload('xlsx_file');
			// File upload
			if ($upload_status) {
				$fileData = $this->upload->data();
				// Get filename
				$filename = FCPATH . 'upload/imports/' . $fileData['file_name'];
				// dd($filename);
				$inputTileType = IOFactory::identify($filename);
				$reader = IOFactory::createReader($inputTileType);
				$spreadsheet = $reader->load($filename);
				$sheet = $spreadsheet->getSheet(0);
				// dd($sheet);
				$count_Rows = 0;
				$column_cells = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
				$r = [];
				foreach ($sheet->getRowIterator() as $row) {
					if ($row->getRowIndex() > 1) {

						$caen_code = $spreadsheet->getActiveSheet()->getCell($column_cells[$data['caen_column'] - 1] . $row->getRowIndex())->getValue();
						// dd($caen_code);
						$tax_value = $spreadsheet->getActiveSheet()->getCell($column_cells[$data['city_column']] . $row->getRowIndex())->getValue();
						// dd($tax_value);
						if ($caen_code == null && $tax_value == null) {
							break;
						}
						$insert_data = array(
							// 'county_name' => $data['county_name'],
							// 'city_name' => $data['city_name'],
							'caen_code' => $caen_code,
							'tax' => $tax_value,
							// 'column_name' => $data['city_column']
						);
						// $this->dd($insert_data);

						if ($this->admin_model->fetchIncomeNormsTax($insert_data)) {
							// dd("found");
							continue;
						} else {
							// $insert_data = [];
							array_push($r, $insert_data);
							$count_Rows++;
						}
					}
				}

				// if (count($r) > 0) {
				if ($this->admin_model->getColDetailsByCountyCity($data['county_name'], $data['city_name'])) {
					echo json_encode(['msg' => 'This column details already exist!']);
				} else {

					$insert_column_data = array(
						'county_name' => $data['county_name'],
						'city_name' => $data['city_name'],
						'column_name' => $data['city_column'],
						'created_at' => date('Y-m-d H:i:s')
					);
					if (($pending_col_id != '')) {
						$this->admin_model->updateColumnDetails($data['pending_col_id'], $insert_column_data);
					} else {
						$this->db->insert('income_norms_column_details', $insert_column_data);
					}
					echo json_encode('success');
				}
				// }
				// else {
				// 	dd("not inserted");
				// }
				// dd($r);
				// dd("column added");
				// $this->session->set_flashdata('success', 'Column added successfully!');
				// echo "<script>window.location.href='" . base_url('admin/income_norms') . "';</script>";
				// die;
			} else {
				echo json_encode('error');
				// echo false;
				// dd($this->upload->display_errors());
				// $this->session->set_flashdata('error', 'Something went wrong!');
				// echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
				// die;
			}
		} else {
			echo json_encode('error');
			// echo false;
			// $data['response'] = 'failed';
			// $this->session->set_flashdata('error', 'Please choose a valid file!');
			// echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
			// die;
		}
	}

	public function columns_added_success()
	{
		$this->session->set_flashdata('success', 'Column added successfully!');
		echo "<script>window.location.href='" . base_url('admin/income_norms') . "';</script>";
		die;
	}

	public function uploadColumnExcel()
	{
		$data = $this->input->post();
		// d($_FILES);
		// dd($data);
		if (!empty($_FILES['xlsx_file']['name'])) {
			// Set preference 
			$config['upload_path'] = 'upload/imports/';
			$config['allowed_types'] = 'csv|xlsx|xls';
			$config['max_size'] = '1000000000'; // max_size in kb 
			$config['file_name'] = $_FILES['xlsx_file']['name'];
			// dd($config);

			// Load upload library 
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			$upload_status =  $this->upload->do_upload('xlsx_file');
			// File upload
			if ($upload_status) {
				$fileData = $this->upload->data();
				// Get filename
				$filename = FCPATH . 'upload/imports/' . $fileData['file_name'];
				// dd($filename);
				$inputTileType = IOFactory::identify($filename);
				$reader = IOFactory::createReader($inputTileType);
				$spreadsheet = $reader->load($filename);
				$sheet = $spreadsheet->getSheet(0);
				// dd($sheet);
				$count_Rows = 0;
				$column_cells = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
				$r = [];
				foreach ($sheet->getRowIterator() as $row) {
					if ($row->getRowIndex() > 1) {

						$caen_code = $spreadsheet->getActiveSheet()->getCell($column_cells[$data['caen_column'] - 1] . $row->getRowIndex())->getValue();
						// dd($caen_code);
						$tax_value = $spreadsheet->getActiveSheet()->getCell($column_cells[$data['city_column']] . $row->getRowIndex())->getValue();
						// dd($tax_value);
						if ($caen_code == null && $tax_value == null) {
							break;
						}
						$insert_data = array(
							'caen_code' => $caen_code,
							'tax' => $tax_value,
							'year' => $data['year'],
							'column_details_id' => $data['pending_col_id'],
							// 'column_name' => $data['city_column']
						);
						// $this->dd($insert_data);

						if ($this->admin_model->fetchIncomeNormsTax($insert_data)) {
							// dd("found");
							continue;
						} else {
							// $insert_data = [];
							$insert_data['created_at'] = date('Y-m-d H:i:s');
							array_push($r, $insert_data);
							$this->db->insert('income_norms_tax', $insert_data);
							$count_Rows++;
						}
					}
				}

				if (count($r) > 0) {
					$this->db->where('id', $data['pending_col_id']);
					$this->db->update('income_norms_column_details', ['has_caen_tax_import' => 1]);
				}
				echo json_encode('success');
				// dd($r);
				// dd("column added");
				// $this->session->set_flashdata('success', 'Column added successfully!');
				// echo "<script>window.location.href='" . base_url('admin/income_norms') . "';</script>";
				// die;
			} else {
				echo json_encode('error');
				// echo false;
				// dd($this->upload->display_errors());
				// $this->session->set_flashdata('error', 'Something went wrong!');
				// echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
				// die;
			}
		} else {
			echo json_encode('error');
			// echo false;
			// $data['response'] = 'failed';
			// $this->session->set_flashdata('error', 'Please choose a valid file!');
			// echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
			// die;
		}
	}

	public function saveTemplate()
	{
		$data = $this->input->post();

		$completed_cols = json_decode($data['columnDetails']);

		$this->db->trans_begin();
		$savedData = $this->admin_model->saveTemplate($data);
		if ($savedData) {

			if (!empty($_FILES['xlsx_file']['name'])) {
				// Set preference 
				$config['upload_path'] = 'upload/imports/';
				$config['allowed_types'] = 'csv|xlsx|xls';
				$config['max_size'] = '1000000000'; // max_size in kb 
				$config['file_name'] = $_FILES['xlsx_file']['name'];
				// dd($config);

				// Load upload library 
				$this->upload->initialize($config);
				$this->load->library('upload', $config);
				$upload_status =  $this->upload->do_upload('xlsx_file');
				// File upload
				if ($upload_status) {
					$fileData = $this->upload->data();
					// Get filename
					$filename = FCPATH . 'upload/imports/' . $fileData['file_name'];
					// dd($filename);
					$inputTileType = IOFactory::identify($filename);
					$reader = IOFactory::createReader($inputTileType);
					$spreadsheet = $reader->load($filename);
					$sheet = $spreadsheet->getSheet(0);
					// dd($sheet);
					$count_Rows = 0;
					$column_cells = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
					$r = [];
					foreach ($completed_cols as $col) {
						foreach ($sheet->getRowIterator() as $row) {
							if ($row->getRowIndex() > 1) {
								$caen_code = $spreadsheet->getActiveSheet()->getCell($column_cells[$data['caen_column'] - 1] . $row->getRowIndex())->getValue();

								$tax_value = $spreadsheet->getActiveSheet()->getCell($column_cells[$col->column_name] . $row->getRowIndex())->getValue();

								if ($caen_code == null && $tax_value == null) {
									break;
								}
								$insert_data = array(
									'caen_code' => $caen_code,
									'tax' => $tax_value,
									'year' => $data['year'],
									'template_id' => $savedData['template_id']
								);
								// dd($insert_data);

								// if ($this->admin_model->fetchIncomeNormsTax($insert_data)) {
								// 	// dd("found");
								// 	continue;
								// } else {
								// $insert_data = [];
								$insert_data['created_at'] = date('Y-m-d H:i:s');
								array_push($r, $insert_data);
								// $this->db->insert('income_norms_tax', $insert_data);
								$count_Rows++;
								// }

							}
						}
						$countTaxRecords = count($r);
						$this->db->insert_batch('income_norms_tax', $r);
						$tax_first_id = $this->db->insert_id();
						$tax_last_id = $tax_first_id + ($countTaxRecords - 1);
						$txCol = [];
						for ($i = $tax_first_id; $i <= $tax_last_id; $i++) {
							for ($j = $savedData['col_details_first_id']; $j <= $savedData['col_details_last_id']; $j++) {
								array_push($txCol, ['tax_id' => $i, 'column_details_id' => $j]);
							}
						}

						$this->db->insert_batch('income_norms_tax_columns', $txCol);
					}




					if ($this->db->trans_status() === FALSE) {
						$this->db->trans_rollback();
						echo json_encode('error');
					} else {
						$this->db->trans_commit();
						echo json_encode('success');
					}
				} else {
					echo json_encode('error');
				}
			} else {
				echo json_encode('error');
			}
		} else {
			echo json_encode('error');
		}
	}

	public function savedTemplateSuccess()
	{
		$this->session->set_flashdata('success', 'Template saved successfully!');
		echo "<script>window.location.href='" . base_url('admin/income_norms') . "';</script>";
		die;
	}

	public function updateTemplate()
	{
		$data = $this->input->post();
		// dd($data);
		if ($data['id'] != '' && $data['template_name'] != '') {
			if ($this->admin_model->updateTemplate($data)) {
				echo json_encode('success');
			} else {
				echo json_encode('error');
			}
		} else {
			echo json_encode('error');
		}
	}

	public function templateUpdateSuccess()
	{
		$this->session->set_flashdata('success', 'Template updated successfully!');
		echo "<script>window.location.href='" . base_url('admin/income_norms') . "';</script>";
		die;
	}

	public function fetchColumnById()
	{
		$data = $this->input->post();
		// dd($data);
		if ($data['column_details_id']) {
			$colData = $this->admin_model->fetchColumnDetailsById($data['column_details_id']);
			// dd($colData);
			if ($colData) {
				echo json_encode($colData);
			} else {
				echo json_encode('error');
			}
		} else {
			echo json_encode('error');
		}
	}

	public function updateColumnDetails()
	{
		$data = $this->input->post();
		// dd($data);
		if (count($data) > 0) {
			$updateData['column_name'] = $data['column_name'];
			$updateData['city_name'] = $data['city_name'];
			$updateData['county_name'] = $data['county_name'];
			$id = $data['id'];
			if ($this->admin_model->updateColumnDetailsById($id, $updateData)) {
				echo json_encode('success');
			} else {
				echo json_encode('error');
			}
		} else {
			echo json_encode('error');
		}
	}

	public function deleteColumnDetailsById()
	{
		$data = $this->input->post();
		if ($data['id']) {
			if ($this->admin_model->deleteColumnDetailsById($data['id'])) {
				echo true;
			}
		} else {
			echo false;
		}
	}

	public function deleteTemplateById()
	{
		$data = $this->input->post();
		// dd($data);
		if ($data['id']) {
			if ($this->admin_model->deleteTemplateById($data['id'])) {
				echo true;
			} else {
				echo false;
			}
		}
	}

	public function updateIncomeNormTemplate()
	{
		$data = $this->input->post();
		if ($this->admin_model->deleteTemplateById($data['id'])) {
			unset($data['id']);
			$completed_cols = json_decode($data['columnDetails']);

			$this->db->trans_begin();
			$savedData = $this->admin_model->saveTemplate($data);
			if ($savedData) {

				if (!empty($_FILES['xlsx_file']['name'])) {
					// Set preference 
					$config['upload_path'] = 'upload/imports/';
					$config['allowed_types'] = 'csv|xlsx|xls';
					$config['max_size'] = '1000000000'; // max_size in kb 
					$config['file_name'] = $_FILES['xlsx_file']['name'];
					// dd($config);

					// Load upload library 
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					$upload_status =  $this->upload->do_upload('xlsx_file');
					// File upload
					if ($upload_status) {
						$fileData = $this->upload->data();
						// Get filename
						$filename = FCPATH . 'upload/imports/' . $fileData['file_name'];
						// dd($filename);
						$inputTileType = IOFactory::identify($filename);
						$reader = IOFactory::createReader($inputTileType);
						$spreadsheet = $reader->load($filename);
						$sheet = $spreadsheet->getSheet(0);
						// dd($sheet);
						$count_Rows = 0;
						$column_cells = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
						$r = [];
						foreach ($completed_cols as $col) {
							foreach ($sheet->getRowIterator() as $row) {
								if ($row->getRowIndex() > 1) {
									$caen_code = $spreadsheet->getActiveSheet()->getCell($column_cells[$data['caen_column'] - 1] . $row->getRowIndex())->getValue();

									$tax_value = $spreadsheet->getActiveSheet()->getCell($column_cells[$col->column_name] . $row->getRowIndex())->getValue();

									if ($caen_code == null && $tax_value == null) {
										break;
									}
									$insert_data = array(
										'caen_code' => $caen_code,
										'tax' => $tax_value,
										'year' => $data['year'],
										'template_id' => $savedData['template_id']
									);
									// dd($insert_data);

									// if ($this->admin_model->fetchIncomeNormsTax($insert_data)) {
									// 	// dd("found");
									// 	continue;
									// } else {
									// $insert_data = [];
									$insert_data['created_at'] = date('Y-m-d H:i:s');
									array_push($r, $insert_data);
									// $this->db->insert('income_norms_tax', $insert_data);
									$count_Rows++;
									// }

								}
							}
							$countTaxRecords = count($r);
							$this->db->insert_batch('income_norms_tax', $r);
							$tax_first_id = $this->db->insert_id();
							$tax_last_id = $tax_first_id + ($countTaxRecords - 1);
							$txCol = [];
							for ($i = $tax_first_id; $i <= $tax_last_id; $i++) {
								for ($j = $savedData['col_details_first_id']; $j <= $savedData['col_details_last_id']; $j++) {
									array_push($txCol, ['tax_id' => $i, 'column_details_id' => $j]);
								}
							}

							$this->db->insert_batch('income_norms_tax_columns', $txCol);
						}

						if ($this->db->trans_status() === FALSE) {
							$this->db->trans_rollback();
							echo json_encode('error');
						} else {
							$this->db->trans_commit();
							echo json_encode('success');
						}
					} else {
						echo json_encode('error');
					}
				} else {
					echo json_encode('error');
				}
			} else {
				echo json_encode('error');
			}
		}
	}
}
