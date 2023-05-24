<?php
include_once(dirname(__FILE__) . "/Admin.php");
class FieldMapping extends Admin
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->admin_auth();
	}

	public function index()
	{
        $data['fieldmappings'] = $this->admin_model->getAllFieldMapping();
		$data['fieldtypes'] = ['personal data', 'information verification', 'income type info'];
		$this->admin_auth();
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/mappingrule/fieldmapping', $data);
		$this->load->view('admin/layout/footer1');
	}

	public function fetchMapping()
	{
		$data = $this->input->post();
		$id = $data['id'];

		$data = $this->admin_model->fetchMappingById($id);
		if (!empty($data)) {
			echo json_encode($data);
		} else {
			echo false;
		}
	}

	public function autoFillMapping()
	{
		$this->db->empty_table('rule_conditions');
		$this->db->empty_table('mapping_rules');
		$this->db->empty_table('field_mappings');

		$query = $this->db->query('SELECT DISTINCT TABLE_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE COLUMN_NAME IN (\'personal_data_id\') AND TABLE_SCHEMA=\'accountingapp\'');
		$result = $query->result_array();
		$table_names = ['personal_data'];
		foreach ($result as $row)
		{
			array_push($table_names, $row['TABLE_NAME']);
		}
		foreach ($table_names as $table_name) {
			$this->autoFillTableFields($table_name);
		}

		echo json_encode([
			'success' => true,
		]);
	}

	private function autoFillTableFields($table_name) {
		$fields = $this->db->list_fields($table_name);
		foreach ($fields as $field)
		{
			$data = array(
				'type' => $table_name,
				'field_label' => $table_name. ' ' . $field,
				'data_source' => $table_name. '.' . $field,
			);
			$this->admin_model->insertMapping($data);
		}
	}

	public function updateMapping()
	{
		$data = $this->input->post();
		
		$config = [
			[
				'field' => 'id',
				'label' => 'id',
				'rules' => 'required|trim'
			],
			[
				'field' => 'type',
				'label' => 'Type',
				'rules' => 'required|trim'
			],
			[
				'field' => 'field_label',
				'label' => 'Field Label',
				'rules' => 'required|trim'
			],
            [
				'field' => 'data_source',
				'label' => 'Data Source',
				'rules' => 'required|trim'
			],
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/fieldmappings') . "';</script>";
			die;
		} else {
			$id = $data['id'];
			$updata['type'] = $data['type'];
			$updata['field_label'] = $data['field_label'];
            $updata['data_source'] = $data['data_source'];

			if ($this->admin_model->updateMapping($id, $updata)) {
			}
			$this->session->set_flashdata('success', 'Record has been updated successfully!!');
			echo "<script>window.location.href='" . base_url('admin/fieldmappings') . "';</script>";
			die;
		}
	}

	public function insertMapping()
	{
		$data = $this->input->post();
		
		$config = [
			[
				'field' => 'type',
				'label' => 'Type',
				'rules' => 'required|trim'
			],
			[
				'field' => 'field_label',
				'label' => 'Field Label',
				'rules' => 'required|trim'
			],
            [
				'field' => 'data_source',
				'label' => 'Data Source',
				'rules' => 'required|trim'
			],
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/fieldmappings') . "';</script>";
			die;
		} 
		else {
			$updata['type'] = $data['type'];
			$updata['field_label'] = $data['field_label'];
            $updata['data_source'] = $data['data_source'];

			if ($this->admin_model->insertMapping($updata)) {
			}
			$this->session->set_flashdata('success', 'Mapping added successfully!!');
			echo "<script>window.location.href='" . base_url('admin/fieldmappings') . "';</script>";
			die;
		}
	}

	public function destroyMapping()
	{
		$data = $this->input->post();	
		$id = $data['id'];

		if($this->admin_model->deleteMappingById($id)) 
			return true;
		return false;
	}

	public function mappingrule()
	{
		$data['mappingrules'] = $this->admin_model->getAllMappingRule();
		if ($data['mappingrules']) {
			foreach ($data['mappingrules'] as $key => $rule) {
				$data['mappingrules'][$key]['path'] = '';
				$pdf_rule_paths = $this->admin_model->fetchPathsByRuleId($rule['id']);
				foreach ($pdf_rule_paths as $web_path) {
					if (!empty($web_path['pdf_field_path'])) {
						if (empty($data['mappingrules'][$key]['path'])) {
							$data['mappingrules'][$key]['path'] = $web_path['pdf_field_path'];
						} else {
							$data['mappingrules'][$key]['path'] .= '<br/>' . $web_path['pdf_field_path'];
						}
					}
				}
			}
		}
		$this->admin_auth();
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/mappingrule/mappingrules', $data);
		$this->load->view('admin/layout/footer1');
	}

	public function editrule()
	{
		$data['webfields'] = $this->admin_model->getAllFieldMapping();
		$data['rule_conditions'] = [];
		$data['web_paths'] = [];
		$data['selected_fields'] = [];
		$id = $this->input->get('id');
		if (!empty($id)) {
			$mappingrule = $this->admin_model->fetchMappingRuleById($id);
			$rule_conditions = $this->admin_model->fetchConditionsByRuleId($id);
			$pdf_rule_paths = $this->admin_model->fetchPathsByRuleId($id);
			$data['mappingrule'] = $mappingrule;
			$data['rule_conditions'] = $rule_conditions;
			$data['web_paths'] = $pdf_rule_paths;
			$selected_fields = !empty($mappingrule['field_mappings_ids']) ? explode(',', $mappingrule['field_mappings_ids']) : [];
			$data['selected_fields'] = $selected_fields;
		}
		$this->admin_auth();
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/mappingrule/editrule', $data);
		$this->load->view('admin/layout/footer1');
	}

	public function saveMappingRule()
	{
		$data = $this->input->post();

		$config = [
			[
				'field' => 'document_type',
				'label' => 'Document Type',
				'rules' => 'required|trim'
			],
			[
				'field' => 'rule_type',
				'label' => 'Rule Type',
				'rules' => 'required|trim'
			],
			[
				'field' => 'component',
				'label' => 'Component Type',
				'rules' => 'required|trim'
			],
			[
				'field' => 'path_fields[]',
				'label' => 'Path',
				'rules' => 'required|trim'
			],
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			echo json_encode([
				'success' => false,
				'message' => validation_errors(),
			]);
		} else {
			if (isset($data['id'])) {
				$this->admin_model->deleteRuleById($data['id']);
				$this->admin_model->deleteConditionsByRuleId($data['id']);
				$this->admin_model->deletePathsByRuleId($data['id']);
			}

			$updata['document_type'] = $data['document_type'];
			$updata['rule_type'] = $data['rule_type'];
			$updata['component'] = $data['component'];
			if (isset($data['field_mappings_ids'])) {
				$updata['field_mappings_ids'] = $data['field_mappings_ids'];
			}
			if (isset($data['action_type'])) {
				$updata['action_type'] = $data['action_type'];
			}
			$rule_id = $this->admin_model->insertRule($updata);

			if (!empty($data['path_fields']) && !empty($rule_id)) {
				foreach ($data['path_fields'] as $key => $value) {
					$web_path['rule_id'] = $rule_id;
					$web_path['pdf_field_path'] = $value['pdf_field_path'];
					if (!empty($value['value'])) {
						$web_path['value'] = $value['value'];
					}
					$this->admin_model->insertWebPath($web_path);
				}
			}

			if (!empty($data['conditions']) && !empty($rule_id)) {
				foreach ($data['conditions'] as $key => $condition) {
					$condition['mapping_rules_id'] = $rule_id;
					$this->admin_model->insertCondition($condition);
				}
			}

			echo json_encode([
				'success' => true,
			]);
		}
	}

	public function destroyMappingRule()
	{
		$data = $this->input->post();
		$id = $data['id'];

		if($this->admin_model->deleteRuleById($id))
			return true;
		return false;
	}
}
