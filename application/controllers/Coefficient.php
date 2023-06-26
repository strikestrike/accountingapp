<?php
include_once(dirname(__FILE__) . "/Admin.php");
class Coefficient extends Admin
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
	 * Load Correction coefficients page with data
	 *
	 * @return void
	 */
	public function index()
	{

		$data['county'] = $this->admin_model->getCountiesNames();
		$data['caen'] = $this->admin_model->getAllCaenCodes();
		$data['variables'] = $this->admin_model->getVariablesList();
		$data['coefficients'] = $this->admin_model->getCoefficientsList();

		$coeff_list = [];
		if (!empty($data['coefficients'])) {
			foreach ($data['coefficients'] as $c) {
				$arr = [];
				$coeff_caen = $this->admin_model->getCoeffCaen($c['id']);
				$coeff_county_cities = $this->admin_model->getCoeffCountyCities($c['id']);
				$variables = $this->admin_model->getCoeffVariables($c['id']);
				$variants = $this->admin_model->getCoeffVariants($c['id']);

				$arr['coeff_details'] = $c;
				$arr['coeff_details']['caen_details'] = $coeff_caen;
				$arr['coeff_details']['county_details'] = $coeff_county_cities;
				$arr['coeff_details']['variables'] = $variables;
				$arr['coeff_details']['variants'] = $variants;
				array_push($coeff_list, $arr);
			}
		}

		$data['coefficients'] = $coeff_list;

		$this->load->view('admin/layout/header1');
		$this->load->view('admin/correction_coefficients/correction_coefficients', $data);
		$this->load->view('admin/layout/footer1');
	}

	/**
	 * Edit coefficient
	 */
	public function editCoeff($id)
	{
		$data['county'] = $this->admin_model->getCountiesNames();
		$data['caen'] = $this->admin_model->getAllCaenCodes();
		$data['variables'] = $this->admin_model->getVariablesList();
		$data['coefficients'] = $this->admin_model->getCoefficientsList();
		$data['editCoeff'] = [];
		$coeff_list = [];
		if (!empty($data['coefficients'])) {
			foreach ($data['coefficients'] as $c) {
				$arr = [];
				$coeff_caen = $this->admin_model->getCoeffCaen($c['id']);
				// dd($coeff_caen);
				$coeff_county_cities = $this->admin_model->getCoeffCountyCities($c['id']);
				$coeff_cities = $this->admin_model->getCoeffCities($c['id']);
				$variables = $this->admin_model->getCoeffVariables($c['id']);
				$variants = $this->admin_model->getCoeffVariants($c['id']);

				$arr['coeff_details'] = $c;
				$arr['coeff_details']['caen_details'] = $coeff_caen;
				$arr['coeff_details']['county_details'] = $coeff_county_cities;
				$arr['coeff_details']['cities_details'] = $coeff_cities;
				$arr['coeff_details']['variables'] = $variables;
				$arr['coeff_details']['variants'] = $variants;
				array_push($coeff_list, $arr);
				if ($c['id'] == $id) {
					$data['editCoeff'] = $arr;
				}
			}
		}
		// dd($data['editCoeff']);	

		$data['coefficients'] = $coeff_list;

		$this->load->view('admin/layout/header1');
		$this->load->view('admin/correction_coefficients/edit', $data);
		$this->load->view('admin/layout/footer1');
	}

	/**
	 * save coefficients details
	 *
	 * @return void
	 */
	public function store()
	{
		$data = $this->input->post();

		$caenData = json_decode($data['caen']);
		$countyData = json_decode($data['county_cities']);

		$saveData = [];
		if (count($data) > 0) {
			$saveData['coef_name'] = $data['coef_name'];
			$saveData['coef_value'] = $data['coef_value'];
			$saveData['coef_option'] = $data['coef_option'];
			$saveData['created_at'] = date('Y-m-d H:i:s');

			$saved = $this->admin_model->saveCoeffDetails($saveData);
			if ($saved) {
				$saveData2 = [];
				$vrblData = json_decode($data['variable_variants']);
				foreach ($vrblData as $v) {
					$saveData2[] = ['coeff_id' => $saved, 'variable_id' => $v->variable_id, 'variant_id' => $v->variant_id, 'created_at' => date('Y-m-d H:i:s')];
				}

				// $this->admin_model->saveCoeffVrblVrnts($saveData2);
				$this->db->insert_batch('coeff_variable_variants', $saveData2);

				if (count($caenData) > 0) {
					$saveData3 = [];
					foreach ($caenData as $caen) {
						$saveData3[] = ['coeff_id' => $saved, 'caen_code' => $caen, 'created_at' => date('Y-m-d H:i:s')];
					}

					$this->db->insert_batch('coeff_caen', $saveData3);
					// $this->admin_model->saveCoeffCaen($saveData3);
				}

				if (count($countyData) > 0) {
					$saveData4 = [];
					foreach ($countyData as $c) {
						$saveData4[] = ['coeff_id' => $saved, 'county_name' => $c[0], 'city_name' => $c[1], 'created_at' => date('Y-m-d H:i:s')];
					}

					$this->db->insert_batch('coeff_county_cities', $saveData4);
					// $this->admin_model->saveCoeffCounty($saveData4);
				}

				echo json_encode('success');
			} else {
				echo json_encode(['error' => 'Something went wrong saving your data!']);
			}
		}
	}

	/**
	 * show success message after saving data
	 *
	 * @return void
	 */
	public function coeffSavedSuccess()
	{
		$this->session->set_flashdata('success', 'Information saved successfully!');
		echo "<script>window.location.href='" . base_url('admin/correction_coefficients') . "';</script>";
		die;
	}

	/**
	 * delete coefficient by id
	 *
	 * @return void
	 */
	public function deleteCoeffById()
	{
		$data = $this->input->post();
		// dd($data);
		if ($data['id']) {
			if ($this->admin_model->deleteCoefficientDetailsById($data['id'])) {
				echo true;
			} else {
				echo false;
			}
		}
	}

	public function update()
	{
		$data = $this->input->post();
		// dd($data);

		$id = $data['id'];
		$caenData = json_decode($data['caen']);
		$countyData = json_decode($data['county_cities']);

		$updateData = [];
		if (count($data) > 0) {
			$updateData['coef_name'] = $data['coef_name'];
			$updateData['coef_value'] = $data['coef_value'];
			$updateData['coef_option'] = $data['coef_option'];

			$updated = $this->admin_model->updateCoeffDetails($id, $updateData);
			if ($updated) {
				$saveData2 = [];
				$vrblData = json_decode($data['variable_variants']);
				foreach ($vrblData as $v) {
					$saveData2[] = ['coeff_id' => $id, 'variable_id' => $v->variable_id, 'variant_id' => $v->variant_id, 'created_at' => date('Y-m-d H:i:s')];
				}

				// deleting the existing data then inserting the new data
				$this->db->where('coeff_id', $id);
				$this->db->delete('coeff_variable_variants');
				$this->db->insert_batch('coeff_variable_variants', $saveData2);

				if (count($caenData) > 0) {
					$saveData3 = [];
					foreach ($caenData as $caen) {
						$saveData3[] = ['coeff_id' => $id, 'caen_code' => $caen, 'created_at' => date('Y-m-d H:i:s')];
					}

					// deleting the existing data then inserting the new data
					$this->db->where('coeff_id', $id);
					$this->db->delete('coeff_caen');
					$this->db->insert_batch('coeff_caen', $saveData3);
				}

				if (count($countyData) > 0) {
					$saveData4 = [];
					foreach ($countyData as $c) {
						$saveData4[] = ['coeff_id' => $id, 'county_name' => $c[0], 'city_name' => $c[1], 'created_at' => date('Y-m-d H:i:s')];
					}

					$this->db->where('coeff_id', $id);
					$this->db->delete('coeff_county_cities');
					$this->db->insert_batch('coeff_county_cities', $saveData4);
				}

				echo json_encode('success');
			} else {
				echo json_encode(['error' => 'Something went wrong saving your data!']);
			}
		}
	}

	/**
	 * show success message after updating coefficient data
	 *
	 * @return void
	 */
	public function updateSuccess()
	{
		$this->session->set_flashdata('success', 'Information updated successfully!');
		echo "<script>window.location.href='" . base_url('admin/correction_coefficients') . "';</script>";
		die;
	}
}
