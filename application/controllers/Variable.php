<?php
include_once(dirname(__FILE__) . "/Admin.php");
class Variable extends Admin
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
		$data['variables_list'] = $this->admin_model->getVariablesList();
		$data['variants_list'] = $this->admin_model->getVariantsList();
		$data['pending_variable'] = $this->admin_model->getPendingVariable();
		$data['if_has_variants'] = '';
		if($data['pending_variable']) {
			$data['if_has_variants'] = $this->admin_model->checkVariableHasVariant($data['pending_variable']['id']);
		}
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/variables/variables_list', $data);
		$this->load->view('admin/layout/footer1');
	}

	/**
	 * save variable data into database
	 *
	 * @return void
	 */
	public function saveVariable()
	{
		$data = $this->input->post();
		// dd($data);
		$config = [
			[
				'field' => 'variable_name',
				'label' => 'Variable Name',
				'rules' => 'required|trim'
			],
			[
				'field' => 'auto_evaluation',
				'label' => 'Automatic Evaluation',
				'rules' => 'required'
			]
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/variables') . "';</script>";
			die;
		} else {
			$save_arr = [];
			$save_arr['name'] = $data['variable_name'];
			$save_arr['auto_evaluation'] = $data['auto_evaluation'];
			$save_arr['created_at'] = date('Y-m-d H:i:s');
			if ($this->admin_model->save_variables($save_arr)) {
				$this->session->set_flashdata('success', 'Data saved successfully!');
				echo "<script>window.location.href='" . base_url('admin/variables') . "';</script>";
				die;
			}
		}
	}

	public function saveVariant()
	{
		$data = $this->input->post();
		// dd($data);
		$config = [
			[
				'field' => 'variant_name',
				'label' => 'Variant Name',
				'rules' => 'required'
			],
			[
				'field' => 'tooltip_info',
				'label' => 'Tooltip Info',
				'rules' => 'required'
			],
			[
				'field' => 'variant_option',
				'label' => 'Variant Option',
				'rules' => 'required'
			],
			[
				'field' => 'auto_evaluation',
				'label' => 'Auto Evaluation',
				'rules' => 'required'
			],
			[
				'field' => 'display_on_frontend',
				'label' => 'Display On Frontend',
				'rules' => 'required'
			],
		];

		$this->form_validation->set_rules($config);

		if($this->form_validation->run() == false) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/variables') . "';</script>";
			die;
		}
		else {
			$save_arr = [];
			// dd($data);
			$save_arr['name'] = $data['variant_name'];
			$save_arr['tooltip'] = $data['tooltip_info'];
			$save_arr['variant_option'] = $data['variant_option'];
			$save_arr['auto_evaluation'] = $data['auto_evaluation'];
			$save_arr['display_on_frontend'] = $data['display_on_frontend'];
			if($data['display_on_frontend'] == 'Yes' || $data['display_on_frontend'] == 'Always_Yes') {
				$save_arr['name_on_frontend'] = $data['name_on_frontend'];
				$save_arr['frontend_interaction'] = $data['frontend_interaction'];
				$save_arr['interaction_with_variant'] = $data['interaction_with_variant'];
			}
			!empty($data['row'])
				? $save_arr['row'] = $data['row']
				: $save_arr['row'] = null;
			!empty($data['month_intervals']) 
				? $save_arr['month_intervals'] = $data['month_intervals']
				: $save_arr['month_intervals'] = null;
			!empty($data['days_intervals']) 
				? $save_arr['days_intervals'] = $data['days_intervals']
				: $save_arr['days_intervals'] = null;
			!empty($data['one_date'])
				? $save_arr['one_date'] = $data['one_date']
				: $save_arr['one_date'] = null;

			$save_arr['created_at'] = date('Y-m-d H:i:s');
			// dd($save_arr);
			$savedId = $this->admin_model->save_variant($save_arr);
			if ($savedId) {
				$relData['variable_id'] = $data['variable_id'];
				$relData['variant_id'] = $savedId;
				$relData['created_at'] = date('Y-m-d H:i:s');
				if($this->admin_model->saveVariableVariantRelation($relData)) {
					$this->session->set_flashdata('success', 'Data saved successfully!');
					echo "<script>window.location.href='" . base_url('admin/variables') . "';</script>";
					die;
				}
			}	
		}
	}

	public function fetchVariantById()
	{
		$id = $this->input->post()['id'];
		$data = [];
		if($id) {
			$variant_info = $this->admin_model->getVariantById($id);
			if($variant_info) {
				$variable_variant = $this->admin_model->getVariableVariant($variant_info['id']);
				if($variable_variant) {
					// dd($variable_variant);
					$variable_info = $this->admin_model->getVariableById($variable_variant['variable_id']);
					if($variable_info) {
						// dd($variable_info);
						$data['variable_info'] = $variable_info;
						$data['variant_info'] = $variant_info;
						echo json_encode($data);
					}
				}
			}
			else
				return false;
		} else {
			return false;
		}
	}
	
	public function fetchVariableById()
	{
		$id = $this->input->post()['id'];
		if($id) {
			$data = $this->admin_model->getVariableById($id);
			if($data)
				echo json_encode($data);
			else
				return false;
		} else {
			return false;
		}
	}

	public function deleteVariantById()
	{
		$data = $this->input->post();
		$id = $data['id'];
		if($id) {
			if($this->admin_model->deleteVariantById($id)) {
				return true;
			}
			else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	
	public function deleteVariableById()
	{
		$data = $this->input->post();
		$id = $data['id'];
		if($id) {
			if($this->admin_model->deleteVariableById($id)) {
				return true;
			}
			else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	public function editVariable()
	{
		$data = $this->input->post();
		// dd($data);
		$config = [
			[
				'field' => 'id',
				'label' => 'id',
				'rules' => 'required|trim'
			],
			[
				'field' => 'variable_name',
				'label' => 'Variable Name',
				'rules' => 'required|trim'
			],
			[
				'field' => 'auto_evaluation',
				'label' => 'Automatic Evaluation',
				'rules' => 'required'
			]
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/variables') . "';</script>";
			die;
		} else {
			$save_arr = [];
			$save_id = $data['id'];
			$save_arr['name'] = $data['variable_name'];
			$save_arr['auto_evaluation'] = $data['auto_evaluation'];
			// dd($save_arr);
			if ($this->admin_model->update_variable($save_id, $save_arr)) {
				$this->session->set_flashdata('success', 'Data updated successfully!');
				echo "<script>window.location.href='" . base_url('admin/variables') . "';</script>";
				die;
			}
		}
	}
	public function editVariant()
	{
		$data = $this->input->post();
		// dd($data);
		$config = [
			[
				'field' => 'variant_name',
				'label' => 'Variant Name',
				'rules' => 'required'
			],
			[
				'field' => 'tooltip_info',
				'label' => 'Tooltip Info',
				'rules' => 'required'
			],
			[
				'field' => 'variant_option',
				'label' => 'Variant Option',
				'rules' => 'required'
			],
			[
				'field' => 'auto_evaluation',
				'label' => 'Auto Evaluation',
				'rules' => 'required'
			],
			[
				'field' => 'display_on_frontend',
				'label' => 'Display On Frontend',
				'rules' => 'required'
			],
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/variables') . "';</script>";
			die;
		} else {
			$save_arr = [];
			$save_id = $data['id'];
			// dd($data);
			$save_arr['name'] = $data['variant_name'];
			$save_arr['tooltip'] = $data['tooltip_info'];
			$save_arr['variant_option'] = $data['variant_option'];
			$save_arr['auto_evaluation'] = $data['auto_evaluation'];
			$save_arr['display_on_frontend'] = $data['display_on_frontend'];
			if($data['display_on_frontend'] == 'Yes' || $data['display_on_frontend'] == 'Always_Yes') {
				$save_arr['name_on_frontend'] = $data['name_on_frontend'];
				$save_arr['frontend_interaction'] = $data['frontend_interaction'];
				$save_arr['interaction_with_variant'] = $data['interaction_with_variant'];
			}
			!empty($data['row'])
				? $save_arr['row'] = $data['row']
				: $save_arr['row'] = null;
			!empty($data['month_intervals']) 
				? $save_arr['month_intervals'] = $data['month_intervals']
				: $save_arr['month_intervals'] = null;
			!empty($data['days_intervals']) 
				? $save_arr['days_intervals'] = $data['days_intervals']
				: $save_arr['days_intervals'] = null;
			!empty($data['one_date'])
				? $save_arr['one_date'] = $data['one_date']
				: $save_arr['one_date'] = null;

			// dd($save_arr);
			if ($this->admin_model->update_variant($save_id, $save_arr)) {
				$this->session->set_flashdata('success', 'Data updated successfully!');
				echo "<script>window.location.href='" . base_url('admin/variables') . "';</script>";
				die;
			}
		}
	}


	public function finalSubmitVariable()
	{
		$data = $this->input->post();
		// dd($data);
		if(!empty($data['variableId'])) {
			if($this->admin_model->finalSubmitVariable($data['variableId'])) {
				echo true;
			}
			else echo false;
		}
	}

	public function view($variable_id)
	{
		// dd($variable_id);
		// $data['variables_list'] = $this->admin_model->getVariablesList();
		$data['variable_info'] = $this->admin_model->getVariableById($variable_id);
		$data['variants_info'] = $this->admin_model->getVariantsByVariableId($variable_id);
		// dd($data);
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/variables/view', $data);
		$this->load->view('admin/layout/footer1');
	}

	public function fetchVariantsByVariableId()
	{
		$data = $this->input->post();
		$id = $data['variable_id'];
		if($id) {
			$variants = $this->admin_model->getVariantsByVariableId($id);
			if($variants) {
				// dd($variants);
				echo json_encode($variants);
			}
			else {
				echo json_encode('error');
			}
		}
		else {
			echo json_encode('no id');
		}
		// dd($data);
	}
}
