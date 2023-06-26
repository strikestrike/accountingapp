<?php
include_once(dirname(__FILE__) . "/Admin.php");
class InfoBlocks extends Admin
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
		$data['variables'] = $this->admin_model->getVariablesList();
		$data['pension_mandatory'] = $this->admin_model->getPensionMandatory();
		$data['pension_optional'] = $this->admin_model->getPensionOptional();
		$data['health_mandatory'] = $this->admin_model->getHealthMandatory();
		$data['health_optional'] = $this->admin_model->getHealthOptional();
		$data['pfa_data'] = $this->admin_model->getPfaData();
		// dd($data['pfa_data']);
		$data['pfa_spec_data'] = $this->admin_model->getPfaSpecData();
		// dd($data['pfa_spec_data']);
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/info_blocks/blocks', $data);
		$this->load->view('admin/layout/footer1');
	}

	public function savePensionMandatory()
	{
		$data = $this->input->post();
		// dd($data);
		if ($data) {
			if ($this->admin_model->saveInfoBlock($data)) {
				$this->session->set_flashdata('success', 'Information saved successfully!');
				echo "<script>window.location.href='" . base_url('admin/blocks') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Something went wrong!');
				echo "<script>window.location.href='" . base_url('admin/blocks') . "';</script>";
				die;
			}
		}
	}

	public function savePensionOptional()
	{
		$data = $this->input->post();
		// dd($data);
		if ($data) {
			if ($this->admin_model->savePensionOptionalBlock($data)) {
				$this->session->set_flashdata('success', 'Information saved successfully!');
				echo "<script>window.location.href='" . base_url('admin/blocks') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Something went wrong!');
				echo "<script>window.location.href='" . base_url('admin/blocks') . "';</script>";
				die;
			}
		}
	}

	public function saveHealthMandatory()
	{
		$data = $this->input->post();
		// dd($data);
		if ($data) {
			if ($this->admin_model->saveHealthMandatoryBlock($data)) {
				$this->session->set_flashdata('success', 'Information saved successfully!');
				echo "<script>window.location.href='" . base_url('admin/blocks') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Something went wrong!');
				echo "<script>window.location.href='" . base_url('admin/blocks') . "';</script>";
				die;
			}
		}
	}
	
	
	public function saveHealthOptional()
	{
		$data = $this->input->post();
		// dd($data);
		if ($data) {
			if ($this->admin_model->saveHealthOptionalBlock($data)) {
				$this->session->set_flashdata('success', 'Information saved successfully!');
				echo "<script>window.location.href='" . base_url('admin/blocks') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Something went wrong!');
				echo "<script>window.location.href='" . base_url('admin/blocks') . "';</script>";
				die;
			}
		}
	}

	public function savePFAdata()
	{
		$data = $this->input->post();
		$data['variables_and_variants'] = json_decode($data['variables_and_variants']);
		$data['variants_dd_options'] = json_decode($data['variants_dd_options']);
		$data['income_types'] = json_decode($data['income_types']);
		// var_dump($data['income_types']);
		// dd($data);
		if ($data) {
			if ($this->admin_model->savePFABlock($data)) {
				echo json_encode('success');
			} else {
				echo json_encode('error');
			}
		}
	}

	public function pfaDataSuccess()
	{
		$this->session->set_flashdata('success', 'Information saved successfully!');
		echo "<script>window.location.href='" . base_url('admin/blocks') . "';</script>";
		die;
	}

	public function savePFASpecdata()
	{
		$data = $this->input->post();
		$data['variables_and_variants'] = json_decode($data['variables_and_variants']);
		$data['variants_dd_options'] = json_decode($data['variants_dd_options']);
		$data['income_types'] = json_decode($data['income_types']);
		// var_dump($data['income_types']);
		// dd($data);
		if ($data) {
			if ($this->admin_model->savePFASpecBlock($data)) {
				echo json_encode('success');
			} else {
				echo json_encode('error');
			}
		}
	}
}
