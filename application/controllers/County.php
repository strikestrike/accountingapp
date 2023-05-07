<?php
include_once(dirname(__FILE__) . "/Admin.php");
class County extends Admin
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

	public function index()
	{
		// $data['countyList'] = $this->admin_model->getCountyData();
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/county/county');
		$this->load->view('admin/layout/footer1');
	}

	public function list()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$countyData = $this->admin_model->getCountyData();
		// dd($countyData);
		$data = [];
		if (!empty($countyData)) {
			foreach ($countyData as $r) {
				$id = $r['id'];
				$statusBtn = "<input class='form-check-input toggle-switch-red approve-ong status-switch' type='checkbox' role='switch' data-id=" . $id . ">";
				if ($r['status'] == 1) {
					$statusBtn = "<input class='form-check-input toggle-switch-red approve-ong status-switch' type='checkbox' role='switch' data-id=" . $id . " checked>";
				}
				$deleteBtn = "<a href='javascript:void(0);' class='deleteCountyBtn btn btn-danger shadow btn-xs1 sharp1' data-CId=" . $id . "><i class='fas fa-trash'></i></a>";
				$data[] = array(
					$r['id'],
					$r['county_name'],
					$r['city_name'],
					'<button class="btn btn-primary viewCounty" data-CId="' . $r['id'] . '"><i class="fas fa-eye"></i></button>',
					'<div class="d-flex align-items-center justify-content-center">
						<div class="form-check form-switch me-3">
							' . $statusBtn . '
						</div>
					</div>',
					$deleteBtn
				);
			}
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => count($data),
			"recordsFiltered" => count($data),
			"data" => $data
		);
		// dd($result);
		echo json_encode($result);
		exit();
	}

	public function import()
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
				// dd("here");
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

				$existingData = $this->admin_model->getCountyData();

				// insert import data
				$temp_arr = [];
				foreach ($importData_arr as $userdata) {
					// Skip first row
					if ($skip != 0) {
						// dd($userdata);
						$item = [
							'county_name' => $userdata[0],
							'city_name' => $userdata[1],
							'created_at' => date('Y-m-d H:i:s'),
						];
						if (count($temp_arr) < 1500) {
							// dd($item);
							array_push($temp_arr, $item);
						} else {
							if ($existingData) {
								$this->db->update_batch('counties', $temp_arr, 'city_name');
							} else {
								$this->db->insert_batch('counties', $temp_arr, 'city_name');
								$temp_arr = [];
								array_push($temp_arr, $item);
							}
						}
					}
					$skip++;
				}
				if (count($temp_arr) > 0) {
					if ($existingData) {
						$this->db->update_batch('counties', $temp_arr, 'city_name');
					} else {
						$this->db->insert_batch('counties', $temp_arr, 'city_name');
						$temp_arr = [];
						array_push($temp_arr, $item);
					}
				}
				$data['response'] = 'successfully uploaded ' . $filename;
			} else {
				$this->session->set_flashdata('error', 'Please choose CSV file!');
				echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
				die;
			}
		} else {
			$data['response'] = 'failed';
		}
		// dd($data);
		// load view 
		$this->session->set_flashdata('success', 'Data uploaded successfully!');
		echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
		die;
	}

	public function insert()
	{
		$data = $this->input->post();

		$config = [
			[
				'field' => 'county_name',
				'label' => 'County Name',
				'rules' => 'required|trim'
			],
			[
				'field' => 'city_name',
				'label' => 'City Name',
				'rules' => 'required|trim'
			],
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
			die;
		} else {
			if ($this->admin_model->insertCounty($data)) {
				$this->session->set_flashdata('success', 'County added successfully!!');
				echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Something went wrong!');
				echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
				die;
			}
		}
	}

	public function destroy()
	{
		$data = $this->input->post();
		// dd($data);
		$id = $data['id'];

		if ($this->admin_model->deleteCountyById($id))
			return true;
		return false;
	}

	public function fetch($id)
	{
		$data = $this->admin_model->fetchCountyById($id);
		if (!empty($data)) {
			echo json_encode($data);
		} else {
			echo false;
		}
	}

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
				'field' => 'county_name',
				'label' => 'County Name',
				'rules' => 'required|trim'
			],
			[
				'field' => 'city_name',
				'label' => 'City Name',
				'rules' => 'required|trim'
			],
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			// echo validation_errors();
			// die;
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
			die;
		} else {
			// echo "validated";
			// die;
			$id = $data['id'];
			$updata['county_name'] = $data['county_name'];
			$updata['city_name'] = $data['city_name'];

			if ($this->admin_model->updateCounty($id, $updata)) {
			}
			$this->session->set_flashdata('success', 'Record has been updated successfully!!');
			echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
			die;
		}
	}

	public function updateStatus()
	{
		$data = $this->input->post();
		$id = $data['id'];
		$value = $data['value'];
		if ($this->admin_model->updateCountyStatus($id, $value))
			echo true;
		echo false;
	}

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
						echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
						die;
					}
					$i++;
				}
				fclose($file);

				$skip = 0;

				// insert import data
				$temp_arr = [];
				foreach ($importData_arr as $userdata) {
					// Skip first row
					if ($skip != 0) {
						$item = [
							'id' => $userdata[0],
							'county_name' => $userdata[1],
							'city_name' => $userdata[2],
						];
						if (count($temp_arr) < 1500) {
							array_push($temp_arr, $item);
						} else {
							$this->db->update_batch('counties', $temp_arr, 'id');
							$temp_arr = [];
							array_push($temp_arr, $item);
						}
					}
					$skip++;
				}
				if (count($temp_arr) > 0) {
					$this->db->update_batch('counties', $temp_arr, 'id');
					$temp_arr = [];
				}
				$data['response'] = 'successfully uploaded ' . $filename;
			} else {
				$this->session->set_flashdata('error', 'Please choose CSV file!');
				echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
				die;
			}
		} else {
			$data['response'] = 'failed';
		}
		// dd($data);
		// load view 
		$this->session->set_flashdata('success', 'Data uploaded successfully!');
		echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
		die;
	}

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
						echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
						die;
					}
					$i++;
				}
				fclose($file);

				if (count($importData_arr) > 1) {
					// first, delete all data in the table
					if ($this->admin_model->deleteAllCounties()) {
						$skip = 0;
						// insert import data
						$temp_arr = [];
						foreach ($importData_arr as $userdata) {
							// Skip first row
							if ($skip != 0) {
								$item = [
									'county_name' => $userdata[0],
									'city_name' => $userdata[1],
								];
								if (count($temp_arr) < 1500) {
									array_push($temp_arr, $item);
								} else {
									$this->db->insert_batch('counties', $temp_arr, 'id');
									$temp_arr = [];
									array_push($temp_arr, $item);
								}
							}
							$skip++;
						}
						if (count($temp_arr) > 0) {
							$this->db->insert_batch('counties', $temp_arr, 'id');
							$temp_arr = [];
						}
						$data['response'] = 'successfully uploaded ' . $filename;
					}
				} else {
					$this->session->set_flashdata('error', 'No data found in selected file!');
					echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
					die;
				}
			} else {
				$this->session->set_flashdata('error', 'Please choose CSV file!');
				echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
				die;
			}
		} else {
			$data['response'] = 'failed';
		}
		// dd($data);
		// load view 
		$this->session->set_flashdata('success', 'Data uploaded successfully!');
		echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
		die;
	}

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
				$numberOfFields = 3; // Total number of fields
				$importData_arr = array();

				while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
					$num = count($filedata);

					if ($numberOfFields == $num) {
						// dd("hi");
						for ($c = 0; $c < $num; $c++) {
							$importData_arr[$i][] = $filedata[$c];
						}
					}
					else {
						$this->session->set_flashdata('error', 'Please download the below CSV file to update records!');
						echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
						die;
					}
					$i++;
				}
				fclose($file);

				$skip = 0;

				// insert import data
				$temp_arr = [];
				foreach ($importData_arr as $userdata) {
					// Skip first row
					if ($skip != 0) {
						$item = [
							'id' => $userdata[0],
							'county_name' => $userdata[1],
							'city_name' => $userdata[2],
							'status' => 0
						];
						if (count($temp_arr) < 1500) {
							array_push($temp_arr, $item);
						} else {
							$this->db->update_batch('counties', $temp_arr, 'id');
							$temp_arr = [];
							array_push($temp_arr, $item);
						}
					}
					$skip++;
				}
				if (count($temp_arr) > 0) {
					$this->db->update_batch('counties', $temp_arr, 'id');
					$temp_arr = [];
				}
				$data['response'] = 'successfully uploaded ' . $filename;
			} else {
				$this->session->set_flashdata('error', 'Please choose CSV file!');
				echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
				die;
			}
		} else {
			$data['response'] = 'failed';
		}
		// dd($data);
		// load view 
		$this->session->set_flashdata('success', 'Data updated successfully!');
		echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
		die;
	}

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
				$numberOfFields = 3; // Total number of fields
				$importData_arr = array();

				while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
					$num = count($filedata);

					if ($numberOfFields == $num) {
						// dd("hi");
						for ($c = 0; $c < $num; $c++) {
							$importData_arr[$i][] = $filedata[$c];
						}
					}
					else {
						$this->session->set_flashdata('error', 'Please download the below CSV file to update records!');
						echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
						die;
					}
					$i++;
				}
				fclose($file);

				$skip = 0;

				// insert import data
				$temp_arr = [];
				foreach ($importData_arr as $userdata) {
					// Skip first row
					if ($skip != 0) {
						$item = [
							'id' => $userdata[0],
							'county_name' => $userdata[1],
							'city_name' => $userdata[2],
							'status' => 1
						];
						if (count($temp_arr) < 1500) {
							array_push($temp_arr, $item);
						} else {
							$this->db->update_batch('counties', $temp_arr, 'id');
							$temp_arr = [];
							array_push($temp_arr, $item);
						}
					}
					$skip++;
				}
				if (count($temp_arr) > 0) {
					$this->db->update_batch('counties', $temp_arr, 'id');
					$temp_arr = [];
				}
				$data['response'] = 'successfully uploaded ' . $filename;
			} else {
				$this->session->set_flashdata('error', 'Please choose CSV file!');
				echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
				die;
			}
		} else {
			$data['response'] = 'failed';
		}
		// dd($data);
		// load view 
		$this->session->set_flashdata('success', 'Data updated successfully!');
		echo "<script>window.location.href='" . base_url('admin/county') . "';</script>";
		die;
	}

	/**
	 * Export data in CSV format 
	 *
	 * @return void
	 */
	public function exportCSV()
	{
		// file name 
		$filename = 'counties_' . date('Ymd') . '.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/csv; ");

		// get data 
		$exData = [];
		$q = $this->db->query("SELECT id, county_name, city_name FROM counties");
		if ($q->num_rows() > 0) {
			$exData = $q->result_array();
		}
		// file creation 
		$file = fopen('php://output', 'w');

		$header = array("id", "County", "City");
		fputcsv($file, $header);
		foreach ($exData as $key => $line) {
			fputcsv($file, $line);
		}
		fclose($file);
		exit;
	}

	/**
	 * fetch cities by county name
	 *
	 * @return json
	 */
	public function fetchCities()
	{
		$data = $this->input->post();
		$countyNames = json_decode($data['county']);
		
		$cities = $this->admin_model->fetchCitiesByCounty($countyNames[count($countyNames) - 1]);
		if($cities) {
			echo json_encode($cities);
			// dd($cities);
		}
		else {
			return false;
		}
	}
	
	/**
	 * fetch cities along with county
	 *
	 * @return json
	 */
	public function fetchCitiesWithCounty()
	{
		$data = $this->input->post();
		$countyNames = json_decode($data['county']);
		$cities = $this->admin_model->fetchCitiesByCounty($countyNames[count($countyNames) - 1]);
		if($cities) {
			echo json_encode(['cities' => $cities, 'county' => $countyNames[count($countyNames) - 1]]);
		}
		else {
			return false;
		}
	}
}
