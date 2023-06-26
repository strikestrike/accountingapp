<?php

date_default_timezone_set('Asia/Kolkata');
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(['form', 'url', 'file', 'string']);
		$this->load->library(['form_validation', 'session']);
		$this->load->model('User_Model');
		$this->load->helper('calculation');
		$this->load->helper('evaluation');

		$this->load->database();
		$this->load->library('upload');
		$this->load->library('Email');
	}

	//check admin auth
	public function user_auth()
	{
		if ($_SESSION['role'] == 2) {
		} else {
			// "yes";die;
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black"><strong></strong>You are not logged in. Please login to access this!</div>');
			echo "<script>window.location.href='" . base_url() . "';</script>";
			die;
		}
	}

	public function index()
	{
		$this->load->view('user/auth/login');
	}

	public function test()
	{
		dd("here");
		echo phpinfo();
	}

	public function register()
	{
		$this->load->view('user/auth/register');
	}

	public function registerUser()
	{
		$data = $this->input->post();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$config = [
			[
				'field' => 'first_name',
				'label' => 'First Name',
				'rules' => 'required|trim'
			],
			[
				'field' => 'last_name',
				'label' => 'Last Name',
				'rules' => 'required|trim'
			],
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|trim|valid_email|is_unique[users.email]'
			],
			[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[8]'
			],
			[
				'field' => 'confirm_password',
				'label' => 'Confirm Password',
				'rules' => 'required|matches[password]'
			],

		];


		$updata = array();
		$language = $this->session->userdata('language');

		foreach ($this->lang->language as $klang => $lng) {
			$data[$klang] = $lng;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="validation-errors alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('user/register') . "';</script>";
			die;
		} else {
			$updata['user_id'] 		= $this->generateUserId();
			$updata['first_name'] 	= $this->input->post('first_name');
			$updata['last_name'] 	= $this->input->post('last_name');
			$updata['user_name'] 	= $updata['first_name'] . " " . $updata['last_name'];
			$updata['email'] 		= $this->input->post('email');
			$password 				= $this->input->post('password');
			$updata['password'] 	= hash('md5', $password);
			$updata['created_at'] 	= date('Y-m-d H:i:s');

			if ($this->admin_model->createUser($updata)) {
			}
			$this->session->set_flashdata('success', 'User registered successfully.');
			echo "<script>window.location.href='" . base_url('/') . "';</script>";
			die;
		}
	}

	// User login
	public function login()
	{
		$data = [];
		$this->session->keep_flashdata('redirect_url');

		if ($this->input->post('login')) {
			$this->load->library('form_validation');

			$config = [
				[
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|trim|valid_email'
				],
				[
					'field' => 'password',
					'label' => 'Password',
					'rules' => 'required'
				],

			];

			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg', '<div class="alert validation-errors alert-danger" style="color:black"><strong> </strong>' . validation_errors() . '</div>');
			} else {
				$data['email'] = $this->input->post('email');
				$pass = $this->input->post('password');
				$data['password'] = hash('md5', $pass);
				$result = $this->user_model->get_user_login_detail($data);

				if (!empty($result)) {
					if ($result['status'] == 0) {
						$this->session->set_flashdata('msg', '<div class="alert validation-errors alert-danger" style="color:black"><strong></strong>You are not authorized to login.</div>');
						echo "<script>window.location.href='" . base_url() . "';</script>";
						die;
					} else {
						$this->session->set_userdata($result);
						// $this->dd($_SESSION);die;
						echo "<script>window.location.href='" . base_url('user/dashboard') . "';</script>";
						die;
					}
				} else {
					$this->session->set_flashdata('msg', '<div class="alert validation-errors alert-danger" style="color:black"><strong></strong>Invalid Email or Password. Please try again</div>');
					echo "<script>window.location.href='" . base_url() . "';</script>";
					die;
				}
			}
		}
		echo "<script>window.location.href='" . base_url() . "';</script>";
					die;
	}

	/**
	 * --------------------------------------
	 * 	Render user dashboard after login 
	 * --------------------------------------
	 * @return view
	 */

	public function dashboard()
	{
		$this->user_auth();
		$this->load->view('user/dashboard');
	}


	public function create_user()
	{
		$this->user_auth();
		$id = $this->session->userdata('id');
		$data['personal_data_list'] = $this->user_model->fetchPersonalDataInfo($id);
		// $this->dd($data);
		$this->load->view('user/layout/header');
		$this->load->view('user/create_user', $data);
		$this->load->view('user/layout/footer');
	}

	/**
	 * delete client by id
	 */
	public function deleteUserById()
	{
		// $this->dd($this->input->post());
		if(!empty($this->input->post()))
		{
			$id = $this->input->post('id');
			if($this->admin_model->deleteClientById($id))
				return true;
			return false;
		}
	}



	public function profile()
	{
		$this->user_auth();
		$cond = array();
		// $data['personal_data_list'] = array_reverse($this->db->get_where('personal_data', $cond)->result_array());
		$data = "";
		$this->load->view('user/layout/header');
		$this->load->view('user/profile', $data);
		$this->load->view('user/layout/footer');
	}

	public function updateProfile()
	{
		$data = array();
		$uid = $this->session->userdata('user_id');
		$updata = array();
		$language = $this->session->userdata('language');
		foreach ($this->lang->language as $klang => $lng) {
			$data[$klang] = $lng;
		}
		$userInfo = $this->user_model->getUserDetailsByUserID($uid);

		// $this->dd($userInfo);

		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$profile_image = $userInfo['profile_image'];
		$profileimage = $_FILES["profile_image"]["name"];
		$user_profileimage1 = explode('.', $profileimage);
		$ext = $user_profileimage1[count($user_profileimage1) - 1];

		if ($_FILES["profile_image"]["name"] != "") {

			$config['upload_path'] 		= './upload/profile_image/';
			$config['allowed_types'] 	= 'jpeg|jpg|png';
			$config['max_size'] 		= 2048;
			$config['file_name'] 		= $uid . "_" . time() . "." . $ext;
			// print_r($config);
			// die();
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('profile_image')) {
				$error = array('error' => $this->upload->display_errors());
				// print_r($error);
				// echo "here";
				// die();

			} else {
				$data = array('upload_data' => $this->upload->data());

				if (is_file('./upload/profile_image/' . $this->session->userdata('profile_image'))) {
					unlink('./upload/profile_image/' . $this->session->userdata('profile_image'));
				}
			}
			$updata['profile_image'] = $config['file_name'];
			$this->session->set_userdata('profile_image', $config['file_name']);
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('user/profile') . "';</script>";
			die;
		} else {
			$updata['first_name'] = $first_name;
			$updata['last_name'] = $last_name;
			$updata['user_name'] = $first_name . " " . $last_name;
			if ($this->user_model->updateUserProfile($uid, $updata)) {
			}
			$_SESSION['first_name'] = $first_name;
			$_SESSION['last_name'] = $last_name;
			$_SESSION['user_name'] = $first_name . " " . $last_name;
			$this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black">User Profile Updated Successfully.</div>');
			echo "<script>window.location.href='" . base_url('user/profile') . "';</script>";
			die;
		}
	}

	public function updatePassword()
	{
		$data = array();
		$language = $this->session->userdata('language');
		foreach ($this->lang->language as $klang => $lng) {
			$data[$klang] = $lng;
		}
		$uid = $this->session->userdata('user_id');
		$userData = $this->user_model->getUserDetailsByUserID($uid);
		// $this->dd($userData);die;
		$oldPass = $userData['password'];
		$old_password = hash('md5', $this->input->post('old_password'));
		$new_password = hash('md5', $this->input->post('new_password'));
		$confirm_password = hash('md5', $this->input->post('confirm_password'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('new_password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black"><strong> </strong>' . validation_errors() . '</div>');
		} else {
			if ($old_password == $oldPass) {
				if ($new_password == $confirm_password) {
					if ($old_password != $new_password) {
						$result1 = $this->user_model->updateLoginPassword($uid, $old_password, $new_password);
						$this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black"><strong></strong>You have successfully changed your password.</div>');
						echo "<script>window.location.href='" . base_url('user/profile') . "';</script>";
						die;
					} else {
						$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black"><strong></strong> Current password and new password can\'t be same keep it different.</div>');
					}
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black"><strong></strong> New Password\'s doesn\'t match.</div>');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black"><strong></strong> Old password doesn\'t match.</div>');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('uid');
		$this->session->sess_destroy();
		// redirect();
		echo "<script>window.location.href='" . base_url() . "';</script>";
		die;
	}


	/**
	 * --------------------------------
	 * 	Forget password
	 * --------------------------------
	 * 	renders forget password form  
	 *  @request GET
	 */
	public function forget_password()
	{
		$this->load->view('user/auth/forgot_pass');
	}

	/**
	 * --------------------------------
	 * 	Forget password
	 * --------------------------------
	 *  user submits form after entering email
	 * @request POST
	 */
	public function forgetPassword()
	{
		$email = $this->input->post('email');
		$result = $this->db->query("select * from users where email ='" . $email . "'")->result_array();

		if (!empty($result)) {

			$reset_code = $this->generateResetCode();
			$info['reset_code'] = $reset_code;
			$info['reset_code_expire'] = date("Y-m-d H:i:s", strtotime("+1 hours"));

			$message = "Please click on the given link to reset your password " . base_url('user/reset_password?token=') . $reset_code . "\nThis link will be valid for one hour.";

			if ($this->user_model->putresetcode($email, $info)) {
				if ($this->Email($email, 'Reset Password Link', $message)) {
					$this->session->set_flashdata('msg-success', 'Please check your email to reset your password.');
					echo "<script>window.location.href='" . base_url() . "user/forget_password';</script>";
					die;
				}
			}
		} else {
			$this->session->set_flashdata('msg', 'Email not registered.');
			echo "<script>window.location.href='" . base_url() . "user/forget_password';</script>";
			die;
		}
	}

	/**
	 * ----------------------------------
	 * 	generate password reset code 
	 * ----------------------------------
	 */
	public function generateResetCode()
	{
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}

	/**
	 * --------------------------------
	 * 	Reset password
	 * --------------------------------
	 * 	renders reset password form if the reset code matches 
	 *  @request GET
	 */
	public function reset_password()
	{
		$reset_code = $this->input->get('token');
		$userInfoFromDb = $this->user_model->getUserInfoByResetCode($reset_code);
		$data['user'] = $userInfoFromDb;

		if (strtotime($userInfoFromDb['reset_code_expire']) > strtotime(date("Y-m-d H:i:s"))) {
			$this->load->view('user/auth/reset_password', $data);
		} else {
			$this->session->set_flashdata('msg', 'Link Expired, try again for new link.');
			echo "<script>window.location.href='" . base_url() . "user/forget_password';</script>";
			die;
		}
	}


	/**
	 * --------------------------------
	 * 	Reset password
	 * --------------------------------
	 * 	user submits form after filling new password form
	 *  @request POST
	 */
	public function resetPassword()
	{
		$data = $this->input->post();
		$uid = $this->input->post('user_id');
		$token = $this->input->post('token');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$config = [
			[
				'field' => 'new_password',
				'label' => 'New Password',
				'rules' => 'required|min_length[8]'
			],
			[
				'field' => 'confirm_new_password',
				'label' => 'Confirm New Password',
				'rules' => 'required|matches[new_password]'
			],
		];

		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('msg', validation_errors());
			echo "<script>window.location.href='" . base_url() . "user/reset_password?token=" . $token . "';</script>";
			die;
		} else {
			$new_password = hash('md5', $this->input->post('new_password'));
			if ($this->user_model->reset_password($uid, $new_password)) {
				$this->session->set_flashdata('success', "Your password has been changed, now login.");
				echo "<script>window.location.href='" . base_url() . "';</script>";
				die;
			}
		}
	}


	public function updatepass()
	{
		$_SESSION['token'];
		$data = $this->input->post();
		if ($data['password'] == $data['cpassword']) {
			$this->db->query("update login_user set password'" . $data['password'] . "' where password='" . $_SESSION['token'] . "'");
		}
	}

	public function newpassword()
	{
		$this->load->view('user/header');
		$this->load->view('user/newpassword');
		$this->load->view('user/footer');
	}

	public function Email($email, $subject, $content)
	{
		$from = 'acct67183@gmail.com';
		$this->email->from($from, 'donotreply@accountingapp');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($content);

		if ($this->email->send()) {
			// echo "sent";die;
			return TRUE;
		} else {
			// echo "not sent";die;
			return FALSE;
		}
	}

	/**
	 * --------------------------
	 * generate random user ID
	 * --------------------------
	 * @return $pass|string
	 */

	public function generateUserId()
	{
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 6; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}

	/**
	 * -----------------------
	 * 	Personal Data 
	 * -----------------------
	 * @desc it is used to render the personal data form
	 * 	User will not be able to add new personal data until payment is done for previous one.
	 */
	public function personalData()
	{
		$this->user_auth();
		$data = [];
		if (!empty($this->input->post('id'))) {
			$id = $this->input->post('id');
			$data['personal_data'] = $this->user_model->getPersonalDataById($id);

			// $this->dd($data['personal_data']);
		}
		$this->load->view('user/layout/header');
		$this->load->view('user/personal_data', $data);
		$this->load->view('user/layout/footer');
	}

	public function verifyPersonalData($id)
	{
		$data['personal_data'] = $this->user_model->getPersonalDataById($id);
		// $_SESSION['personal_data_id'] = $id;
		// $this->dd($data['personal_data']);

		$this->load->view('user/layout/header');
		$this->load->view('user/personal_data/verify_personal_data', $data);
		$this->load->view('user/layout/footer');
	}

	/**
	 * -------------------------------------
	 * 	save personal data
	 * -------------------------------------
	 */
	public function savePersonalData()
	{

		$data = $this->input->post();

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$config = [
			[
				'field' => 'salutation',
				'label' => 'Salutation',
				'rules' => 'required|trim'
			],
			[
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required|trim'
			],
			[
				'field' => 'surname',
				'label' => 'Surname',
				'rules' => 'required|trim'
			],
			[
				'field' => 'personal_number',
				'label' => 'Personal Number',
				'rules' => 'required|min_length[13]|max_length[13]|is_unique[personal_data.personal_number]'
			],
			[
				'field' => 'mobile_number',
				'label' => 'Mobile Number',
				'rules' => 'required|trim|min_length[11]|max_length[11]|is_unique[personal_data.mobile_number]'
			],
			[
				'field' => 'national_id_code',
				'label' => 'National ID',
				'rules' => 'required|trim|min_length[2]|max_length[2]'
			],
			[
				'field' => 'national_id_number',
				'label' => 'National ID',
				'rules' => 'required|trim|min_length[6]|max_length[6]'
			],
			[
				'field' => 'dob',
				'label' => 'DOB',
				'rules' => 'required'
			],
			[
				'field' => 'city',
				'label' => 'City',
				'rules' => 'required'
			],
			[
				'field' => 'area',
				'label' => 'Area',
				'rules' => 'required'
			],
			[
				'field' => 'address_other_details',
				'label' => 'Address Details',
				'rules' => 'required'
			],

		];


		$saveData = array();
		$language = $this->session->userdata('language');

		foreach ($this->lang->language as $klang => $lng) {
			$data[$klang] = $lng;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			// echo "<script>window.location.href='" . base_url('user/personalData') . "';</script>";
			$this->load->view('user/layout/header');
			$this->load->view('user/personal_data');
			$this->load->view('user/layout/footer');

		} else {
			// echo "validated";
			$saveData['salutation'] 			= $this->input->post('salutation');
			$saveData['name'] 					= $this->input->post('name');
			$saveData['surname'] 				= $this->input->post('surname');
			$saveData['personal_number'] 		= $this->input->post('personal_number');
			$saveData['mobile_number'] 			= $this->input->post('mobile_number');
			$saveData['national_id_code'] 		= $this->input->post('national_id_code');
			$saveData['national_id_number'] 	= $this->input->post('national_id_number');
			$saveData['dob'] 					= $this->input->post('dob');
			$saveData['address'] 				= $this->input->post('address_other_details');
			$saveData['city'] 					= $this->input->post('city');
			$saveData['area'] 					= $this->input->post('area');
			$saveData['steps_completed'] 		= '0';
			$saveData['created_by'] 			= $this->session->userdata('id');
			$saveData['created_at'] 			= date('Y-m-d H:i:s');

			// $this->dd($saveData);
			$inserted = $this->user_model->savePersonalData($saveData);
			if ($inserted) {
				$this->session->set_flashdata('warning', 'Now, please verify your data.');
				echo "<script>window.location.href='" . base_url('user/verifyPersonalData/'.$inserted) . "';</script>";
				die;
			}
		}
	}

	public function editPersonalData()
	{
		$data = $this->input->post();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('Regex');
		// $this->dd($data);
		$id = $data['id'];
		$config = [
			[
				'field' => 'salutation',
				'label' => 'Salutation',
				'rules' => 'required|trim'
			],
			[
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required|trim'
			],
			[
				'field' => 'surname',
				'label' => 'Surname',
				'rules' => 'required|trim'
			],
			[
				'field' => 'personal_number',
				'label' => 'Personal Number',
				'rules' => 'required|min_length[13]|max_length[13]'
			],
			[
				'field' => 'mobile_number',
				'label' => 'Mobile Number',
				'rules' => 'required|trim|min_length[11]|max_length[11]'
			],
			[
				'field' => 'national_id_code',
				'label' => 'National ID',
				'rules' => 'required|trim|min_length[2]|max_length[2]'
			],
			[
				'field' => 'national_id_number',
				'label' => 'National ID',
				'rules' => 'required|trim|min_length[6]|max_length[6]'
			],
			[
				'field' => 'dob',
				'label' => 'DOB',
				'rules' => 'required'
			],
			[
				'field' => 'city',
				'label' => 'City',
				'rules' => 'required'
			],
			[
				'field' => 'area',
				'label' => 'Area',
				'rules' => 'required'
			],
			[
				'field' => 'address_other_details',
				'label' => 'Address Details',
				'rules' => 'required'
			],

		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$dataToUpdate['salutation'] 			= $data['salutation'];
			$dataToUpdate['name'] 					= $data['name'];
			$dataToUpdate['surname'] 				= $data['surname'];
			$dataToUpdate['personal_number'] 		= $data['personal_number'];
			$dataToUpdate['mobile_number'] 			= $data['mobile_number'];
			$dataToUpdate['national_id_code'] 		= $data['national_id_code'];
			$dataToUpdate['national_id_number'] 	= $data['national_id_number'];
			$dataToUpdate['dob'] 					= $data['dob'];

			$dataToUpdate['address']		 		= $data['address_other_details'];
			$dataToUpdate['city'] 					= $data['city'];
			$dataToUpdate['area'] 					= $data['area'];

			// echo "DAta to update";
			// $this->dd($dataToUpdate);
			if ($this->admin_model->updateData('personal_data', $id, $dataToUpdate)) {
				$this->session->set_flashdata('success', 'Data updated Successfully.');
				echo "<script>window.location.href='" . base_url('user/verifyPersonalData/'.$id) . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to update data.');
				echo "<script>window.location.href='" . base_url('user/personalData') . "';</script>";
			}
		} else {
			// echo validation_errors();
			// die;
			$this->session->set_flashdata('error', 'Failed to update data.');
			echo "<script>window.location.href='" . base_url('user/personalData') . "';</script>";

			die;
		}
	}

	/**
	 * --------------------------------------
	 * 	Final submit personal data
	 * --------------------------------------
	 * @desc it updates editable field as 0 and steps_completed 
	 * 		 as 1 in personal_data table
	 * 
	 * @return bool true|false
	 */
	public function finalSubmitPersonalData()
	{
		$id = $this->input->post('id');

		$stepsData = $this->completeThisStep($id, 1);
		// $this->dd($stepsData);
		// echo $stepsJson;die;


		// $this->dd($id);

		if ($this->user_model->finalSubmitPersonalData($id, $stepsData)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * --------------------------------------
	 * 	Step 1 Completed
	 * --------------------------------------
	 * @desc it checks whether the step 1 is completed ,i.e., whether
	 * 		 personal data has been filled or not and then redirects 
	 * 		 to choose income page
	 * 
	 * @return view
	 */
	public function step1completed($id)
	{
		// echo "Step 1 completed";
		$this->user_auth();
		// $this->dd($id);
		$_SESSION['personal_data_id'] = $id;
		echo "<script>window.location.href='" . base_url('user/chooseIncome') . "';</script>";
		die;
	}

	public function chooseIncome()
	{
		$this->user_auth();
		$this->load->view('user/layout/header');
		$this->load->view('user/choose_income_type');
		$this->load->view('user/layout/footer');
	}

	public function rentalIncome()
	{
		$this->user_auth();
		$id = $this->session->userdata('id');
		$personalDataId = $this->session->userdata('personal_data_id');
		$data['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		$steps = $data['personalData']['steps_completed'];
		$stepsCompleted = $this->checkSteps($steps);
		// $this->dd($steps);
		// $this->dd($stepsCompleted);

		// $this->dd($stepsCompleted);
		$data['personalData']['steps_completed'] = $stepsCompleted;
		// $this->dd($_SESSION);
		$data['rentIncomePrice'] = $this->user_model->fetchRentIncomeModulesPrice();
		$data['rentIncome'] = $this->user_model->fetchRentIncome($id, $personalDataId);
		// $this->dd($data);
		$this->load->view('user/layout/header');
		$this->load->view('user/rental_income', $data);
		$this->load->view('user/layout/footer');
	}

	/**
	 * ----------------------------------- 
	 *	Save Rental Income
	 * ----------------------------------- 
	 */
	public function saveRentIncome()
	{
		$data = $this->input->post();


		$income_type_data = [];
		$incomeRow = [];
		foreach ($data['income_type'] as $d) {
			$incomeRow['personal_data_id'] = $_SESSION['personal_data_id'];
			$incomeRow['rented_space_address'] = $d['rented_space_address'];
			$incomeRow['contract_number'] = $d['contract_number'];
			$incomeRow['rent_value'] = $d['rent_value'];
			$incomeRow['currency'] = $d['currency'];
			$incomeRow['sign_date'] = $d['sign_date'];
			$incomeRow['contract_start_date'] = $d['contract_start_date'];
			$incomeRow['contract_end_date'] = $d['contract_end_date'];
			$incomeRow['created_by'] = $this->session->userdata('id');
			$incomeRow['created_at'] = date('Y-m-d H:i:s');

			array_push($income_type_data, $incomeRow);
		}
		// $this->dd($income_type_data);
		if ($this->db->insert_batch('rent_income_type', $income_type_data)) {
			// if($this->user_model->stepTwoCompleted($_SESSION['personal_data_id']))
			// {
			$personal_data_id = $_SESSION['personal_data_id'];
			$price = $data['cost_final'];
			

			if ($this->calculateFinalPrice($personal_data_id, $price)) {
				// echo "Inserted";
				$this->session->set_flashdata('success', 'Record saved Successfully.');
				echo "<script>window.location.href='" . base_url('user/rentalIncome') . "';</script>";
				die;
			}
			// }
		} else {
			$this->session->set_flashdata('error', 'Failed to save record.');
			echo "<script>window.location.href='" . base_url('user/rentalIncome') . "';</script>";
			die;
		}
	}

	/**
	 * 
	 */
	public function updateRentIncome()
	{
		$data = $this->input->post();


		$income_type_data = [];
		$updateIncomeRow = [];
		foreach ($data['income_type'] as $d) {
			// $updateIncomeRow['personal_data_id'] = $_SESSION['personal_data_id'];
			$updateIncomeRow['id'] = $d['id'];
			$updateIncomeRow['rented_space_address'] = $d['rented_space_address'];
			$updateIncomeRow['contract_number'] = $d['contract_number'];
			$updateIncomeRow['rent_value'] = $d['rent_value'];
			$updateIncomeRow['currency'] = $d['currency'];
			$updateIncomeRow['sign_date'] = $d['sign_date'];
			$updateIncomeRow['contract_start_date'] = $d['contract_start_date'];
			$updateIncomeRow['contract_end_date'] = $d['contract_end_date'];

			array_push($income_type_data, $updateIncomeRow);
		}
		// $this->dd($income_type_data);
		if ($this->db->update_batch('rent_income_type', $income_type_data, 'id')) {

			$personal_data_id = $_SESSION['personal_data_id'];
			// $finalCostData['user_id'] = $_SESSION['id'];
			$price = $data['cost_final'];
			// $finalCostData['created_at'] = date('Y-m-d H:i:s');

			if ($this->calculateFinalPrice($personal_data_id, $price)) {
				// echo "Inserted";
				$this->session->set_flashdata('success', 'Record updated Successfully.');
				echo "<script>window.location.href='" . base_url('user/rentalIncome') . "';</script>";
				die;
			}
		} else {
			$this->session->set_flashdata('error', 'Failed to save record.');
			echo "<script>window.location.href='" . base_url('user/rentalIncome') . "';</script>";
			die;
		}
	}

	/**
	 * ---------------------------------
	 *  Step 2 completed
	 * ---------------------------------
	 * 
	 * @desc this function updates steps_completed column in 
	 * 		 personal_data table with value 2
	 * 
	 * @return
	 */
	public function step2Completed()
	{
		$data = $this->input->post();
		// $this->dd($data);
		$personal_data_id = $data['id'];
		$type = $data['type'];
		$stepData = $this->completeThisStep($personal_data_id, 2, $type);
		// $this->dd($stepData);

		// die;
		if ($this->user_model->stepTwoCompleted($personal_data_id, $stepData)) {
			return true;
		} else {
			return false;
		}
	}


	public function rentVerification()
	{
		$this->user_auth();
		$id = $this->session->userdata('id');
		$personalDataId = $this->session->userdata('personal_data_id');

		// $this->dd($_SESSION);

		$data['rentIncome'] = $this->user_model->fetchRentIncome($id, $personalDataId);

		$verificationData['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		$steps = $verificationData['personalData']['steps_completed'];
		$stepsCompleted = $this->checkSteps($steps);
		$verificationData['personalData']['steps_completed'] = $stepsCompleted;
		// $this->dd($stepsCompleted);




		if (!empty($verificationData['personalData'])) {
			// if ($verificationData['personalData']['steps_completed'] == 2) {
				$rentalVerification = $this->user_model->fetchVerifiedRentalByPersonalDataId($personalDataId);
				if($rentalVerification) {
					$verificationData['rentVerif_id'] = $rentalVerification['id'];
				}
				$verificationData['income2021'] = $this->getIncome2021($data);
				$verificationData['income2022'] = $this->getIncome2022($data);
				// $th\is->dd($verificationData);
				$this->load->view('user/layout/header');
				$this->load->view('user/rent_verification', $verificationData);
				$this->load->view('user/layout/footer');
			// } 
			// elseif ($verificationData['personalData']['steps_completed'] == 3 || $verificationData['personalData']['steps_completed'] == 4) {
			// 	$this->session->set_flashdata('step-error', 'Rental Information verification completed. Add more income type or proceed to payment.');
			// 	echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
			// 	die;
			// }
		}
	}


	/**
	 * ------------------------------------
	 * 		Get Income 2021
	 * ------------------------------------
	 * @desc It is used to calculate "Product Name 2021" Details
	 * 
	 * @return array $calculatedData,$errors
	 */
	public function getIncome2021($data)
	{
		// $this->dd($data);
		$netIncomeData = [];
		$taxableIncomeData = [];
		$taxData = [];
		$errors = [];
		$oblcass_est_total = 0;
		foreach ($data['rentIncome'] as $key => $value) {
			// $this->dd($value);
			$dataForCalculation['rent_value'] 			= $value['rent_value'];
			$dataForCalculation['contract_start_date'] 	= $value['contract_start_date'];
			$dataForCalculation['currency'] 			= $value['currency'];
			$dataForCalculation['contract_end_date']	= $value['contract_end_date'];

			$currYr = date('Y');

			if(getDMY('y', $dataForCalculation['contract_start_date']) == $currYr) {
				continue;
			}


			if($dataForCalculation['currency'] == 'EUR')
			{
				$income = calculateIncome2021($dataForCalculation);
				$previous_year = date("Y", strtotime("-1 year"));
				$annualExchangeRate = $this->admin_model->fetchAnnualExchangeRate($dataForCalculation['currency'], $previous_year);
				if ($annualExchangeRate == false) {
					$error = "Annual exchange rate not found for for the year " . getDMY('y', $dataForCalculation['contract_end_date']) . " to calculate net income.";
					array_push($errors, $error);
				}
				// $this->dd($annualExchangeRate);
				if(count($errors) == 0){
					$netIncome = round($annualExchangeRate[0]['value'] * $income);
					array_push($netIncomeData, $netIncome);
		
					$taxableIncome = round($netIncome * 0.6);
					array_push($taxableIncomeData, $taxableIncome);
		
					$tax = round($taxableIncome * 0.1);
					array_push($taxData, $tax);
				}
				else{
					$this->session->set_flashdata('error', 'Rental Information verification could not be completed. No annual exchange rate found for previous year.');
					echo "<script>window.location.href='" . base_url('user/rentalIncome') . "';</script>";
					die;
				}
			}
			else{
				$error = "The currency for ".$value['rented_space_address']." rental space address has currency RON therefore it is not calculated." ;
			}
			
		}


		$calculatedData['netIncome'] 		= array_sum($netIncomeData);
		$calculatedData['taxableIncome'] 	= array_sum($taxableIncomeData);
		$calculatedData['tax'] 				= array_sum($taxData);
		
		$minWagePreviousYear = $this->user_model->getMinWageForPreviousYear();

		if($minWagePreviousYear) {
			if($oblcass_est_total != 0 && $oblcass_est_total == ($minWagePreviousYear['value']*12*0.1)) {
				$calculatedData['to_be_paid_health_tax'] = $oblcass_est_total;
				$calculatedData['to_be_paid_tax'] = $calculatedData['to_be_paid_health_tax'];
			}
			elseif($oblcass_est_total != 0 && $oblcass_est_total < ($minWagePreviousYear['value']*12*0.1)) {
				$calculatedData['to_be_paid_health_tax'] = ($calculatedData['taxableIncome'] > (12 * $minWagePreviousYear['value'])) ? (12 * $minWagePreviousYear['value'] * 0.1) : $oblcass_est_total;
				$calculatedData['to_be_paid_tax'] = $calculatedData['to_be_paid_health_tax'];
			}
			elseif($calculatedData['taxableIncome'] > 12 * $minWagePreviousYear['value']) {
				$calculatedData['to_be_paid_health_tax'] = 12 * $minWagePreviousYear['value'] * 0.1;
				$calculatedData['to_be_paid_tax'] = $calculatedData['to_be_paid_health_tax'];
			}
			elseif($calculatedData['taxableIncome'] < 12 * $minWagePreviousYear['value']) {
				$calculatedData['to_be_paid_health_tax'] = 0;
				$calculatedData['to_be_paid_tax'] = $calculatedData['to_be_paid_health_tax'];
			}
			return $calculatedData;
		} else {
			$this->session->set_flashdata('error', 'Minimum wage for previous year not found. Please contact admin.');
			echo "<script>window.location.href='" . base_url('user/rentalIncome') . "';</script>";
			die;
		}

	}

	/**
	 * ------------------------------------
	 * 		Get Income 2022
	 * ------------------------------------
	 * @desc It is used to calculate "Product Name 2021" Details
	 * 
	 * @return array $calculatedData,$errors
	 */
	public function getIncome2022($data)
	{
		// $this->dd($data);
		$netIncomeData = [];
		$taxableIncomeData = [];
		$taxData = [];
		$errors = [];
		foreach ($data['rentIncome'] as $key => $value) {
			// $this->dd($value);
			$dataForCalculation['rent_value'] 			= $value['rent_value'];
			$dataForCalculation['contract_start_date'] 	= $value['contract_start_date'];
			$dataForCalculation['currency'] 			= $value['currency'];
			
			$currYr = date('Y');

			if($value['contract_end_date'] == "0000-00-00")
			{
				$previous_year = date("Y",strtotime("-1 year"));
				$dataForCalculation['contract_end_date']	= $previous_year."-12-31";
			}
			else {
				$dataForCalculation['contract_end_date']	= $value['contract_end_date'];
				if(getDMY('y', $dataForCalculation['contract_end_date']) < $currYr) {
					continue;
				}
			}

			$netIncome = 0;

			if($dataForCalculation['currency'] != "RON") {
				$annualExchangeRate = $this->admin_model->fetchAnnualExchangeRate($dataForCalculation['currency'], getDMY('y', $dataForCalculation['contract_end_date']));
				if ($annualExchangeRate == false) {
					// echo "no rate found";die;
					$error = "Annual exchange rate not found for for the year " . getDMY('y', $dataForCalculation['contract_end_date']) . " to calculate net income. Please contact admin.";
					$this->session->set_flashdata('error', $error);
					echo "<script>window.location.href='" . base_url('user/rentalIncome') . "';</script>";
					die;
				}
				// echo $annualExchangeRate[0]['value']; die;
				$netIncome = calculateIncome2022($dataForCalculation, $annualExchangeRate[0]['value']);
			}
			else {
				$netIncome = $dataForCalculation['rent_value']*getDMY('m', $dataForCalculation['contract_end_date']) ;
			}

			// $this->dd($netIncome);
			array_push($netIncomeData, $netIncome);

			$taxableIncome = round($netIncome * 0.6);
			array_push($taxableIncomeData, $taxableIncome);

			$tax = round($taxableIncome * 0.1);
			array_push($taxData, $tax);
		}

		$current_year = date("Y");
		$calculatedData['selectYes'] = 0;
		$minWageCurrentYear = $this->user_model->getMinWageForCurrentYear($current_year);
		
		if($minWageCurrentYear){
			$calculatedData['netIncome'] 		= array_sum($netIncomeData);
			$calculatedData['taxableIncome'] 	= array_sum($taxableIncomeData);
			$calculatedData['tax'] 				= array_sum($taxData);
	
			if($calculatedData['taxableIncome'] > 12 * $minWageCurrentYear['value']){
				// echo "taxableIncome greater than min wage current year";die;
				$calculatedData['health_insurance_tax'] = round(12 * $minWageCurrentYear['value'] * 0.1);
			}
			elseif($calculatedData['taxableIncome'] < 12 * $minWageCurrentYear['value']){
				// echo "taxableIncome lesser than min wage current year";die;
				$calculatedData['health_insurance_tax'] = round(12 * $minWageCurrentYear['value'] * 0.05);
				$calculatedData['selectYes'] = 1;
			}
	
			// $this->dd($calculatedData);
			return $calculatedData;
		} else {
			$this->session->set_flashdata('error', "Min wage for the year ".$current_year." is not found. Please contact admin.");
			echo "<script>window.location.href='" . base_url('user/rentalIncome') . "';</script>";
			die;
		}

	}

	public function saveRentVerification()
	{
		// $this->dd($this->input->post());
		$data = $this->input->post();

		$dataToSave['personal_data_id']			= $data['personal_data']['id'];
		$dataToSave['net_income_2021'] 			= $data['net_income_2021'];
		$dataToSave['taxable_income_2021'] 		= $data['taxable_income_2021'];
		$dataToSave['tax_2021']					= $data['tax_2021'];
		$dataToSave['health_tax_to_be_paid_2022'] = $data['health_tax_to_be_paid_2022'];
		$dataToSave['tax_to_be_paid_2022'] 		= $data['tax_to_be_paid_2022'];
		$dataToSave['net_income_2022'] 			= $data['net_income_2022'];
		$dataToSave['taxable_income_2022'] 		= $data['taxable_income_2022'];
		$dataToSave['tax_2022'] 					= $data['tax_2022'];
		$dataToSave['total_health_income_2022'] 	= $data['total_health_income_2022'];
		$dataToSave['need_health_insurance'] 		= $data['need_health_insurance'];
		$dataToSave['health_insurance_tax_2023'] 	= $data['health_insurance_tax_2023'];

		if(!empty($data['health_tax_2023']) && !empty($data['health_tax_2023']))
		{
			$dataToSave['health_tax_2023'] 			= $data['health_tax_2023'];
			$dataToSave['health_tax_2023'] 			= $data['health_tax_2023'];	
		}
		$dataToSave['created_at']					= date('Y-m-d H:i:s');

		// $this->dd($dataToUpdate);

		if ($this->user_model->saveRentVerification($dataToSave)) {
			$step = $this->completeThisStep($dataToSave['personal_data_id'], 3, 'rental');

			if ($this->user_model->stepThreeCompleted($dataToSave['personal_data_id'], $step)) {
				$this->session->set_flashdata('success', 'Information verification saved.');
				echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
				die;
			}
		}
	}

	public function updateRentVerification()
	{
		// $this->dd($this->input->post());
		$data = $this->input->post();
		$id = $data['id'];
		
		$dataToUpdate['personal_data_id']			= $data['personal_data']['id'];
		$dataToUpdate['net_income_2021'] 			= $data['net_income_2021'];
		$dataToUpdate['taxable_income_2021'] 		= $data['taxable_income_2021'];
		$dataToUpdate['tax_2021']					= $data['tax_2021'];
		$dataToUpdate['health_tax_to_be_paid_2022'] = $data['health_tax_to_be_paid_2022'];
		$dataToUpdate['tax_to_be_paid_2022'] 		= $data['tax_to_be_paid_2022'];
		$dataToUpdate['net_income_2022'] 			= $data['net_income_2022'];
		$dataToUpdate['taxable_income_2022'] 		= $data['taxable_income_2022'];
		$dataToUpdate['tax_2022'] 					= $data['tax_2022'];
		$dataToUpdate['total_health_income_2022'] 	= $data['total_health_income_2022'];
		$dataToUpdate['need_health_insurance'] 		= $data['need_health_insurance'];
		$dataToUpdate['health_insurance_tax_2023'] 	= $data['health_insurance_tax_2023'];

		if(!empty($data['health_tax_2023']) && !empty($data['health_tax_2023']))
		{
			$dataToUpdate['health_tax_2023'] 		= $data['health_tax_2023'];
			$dataToUpdate['health_tax_2023'] 		= $data['health_tax_2023'];	
		}
		$dataToUpdate['updated_at']					= date('Y-m-d H:i:s');

		if ($this->user_model->updateRentVerification($id, $dataToUpdate)) {
			$step = $this->completeThisStep($dataToUpdate['personal_data_id'], 3, 'rental');

			if ($this->user_model->stepThreeCompleted($dataToUpdate['personal_data_id'], $step)) {
				$this->session->set_flashdata('success', 'Information verification updated.');
				echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
				die;
			}
		}
	}



	public function add_more_income_type()
	{
		$this->user_auth();
		$this->load->view('user/layout/header');
		$this->load->view('user/add_more_income_type');
		$this->load->view('user/layout/footer');
	}

	public function hotelRegimIncome()
	{
		$this->user_auth();
		$id = $this->session->userdata('id');
		$personalDataId = $this->session->userdata('personal_data_id');
		$data['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		// $this->dd($_SESSION);
		$steps = $data['personalData']['steps_completed'];
		$stepsCompleted = $this->checkHotelSteps($steps);
		// $this->dd($steps);
		// $this->dd($stepsCompleted);

		// $this->dd($stepsCompleted);
		$data['personalData']['steps_completed'] = $stepsCompleted;

		$data['rentIncomePrice'] = $this->user_model->fetchHotelIncomeModulesPrice();
		$data['rentIncome'] = $this->user_model->fetchHotelRentIncome($id, $personalDataId);
		// $data['rentIncome'] = '';

		$this->load->view('user/layout/header');
		$this->load->view('user/hotel_regim_income', $data);
		$this->load->view('user/layout/footer');
	}

	public function saveHotelIncome()
	{
		$data = $this->input->post();
		// $this->dd($data);

		$income_type_data = [];
		$incomeRow = [];
		foreach ($data['income_type'] as $d) {
			$incomeRow['personal_data_id'] = $_SESSION['personal_data_id'];
			$incomeRow['rented_space_address'] = $d['rented_space_address'];
			$incomeRow['rent_value'] = $d['rent_value'];
			$incomeRow['currency'] = $d['currency'];
			$incomeRow['year'] = $d['year'];
			$incomeRow['expenses'] = $d['expenses'];
			$incomeRow['financial_loss'] = $d['financial_loss'];
			$incomeRow['created_by'] = $this->session->userdata('id');
			$incomeRow['created_at'] = date('Y-m-d H:i:s');

			array_push($income_type_data, $incomeRow);
		}
		// $this->dd($income_type_data);
		// $this->calculateFinalPrice($_SESSION['personal_data_id'],$data['cost_final']);

		if ($this->user_model->saveHotelIncome($income_type_data)) {

			if ($this->calculateFinalPrice($_SESSION['personal_data_id'], $data['cost_final'])) {
				// echo "Inserted";
				$this->session->set_flashdata('success', 'Record saved Successfully.');
				echo "<script>window.location.href='" . base_url('user/hotelRegimIncome') . "';</script>";
				die;
			}
			// }
		} else {
			$this->session->set_flashdata('error', 'Failed to save record.');
			echo "<script>window.location.href='" . base_url('user/hotelRegimIncome') . "';</script>";
			die;
		}
	}

	public function updateHotelIncome()
	{
		$data = $this->input->post();
		// $this->dd($data);
		$income_type_data = [];
		$updateIncomeRow = [];
		foreach ($data['income_type'] as $d) {
			// $updateIncomeRow['personal_data_id'] = $_SESSION['personal_data_id'];
			$updateIncomeRow['id'] = $d['id'];
			$updateIncomeRow['rented_space_address'] = $d['rented_space_address'];
			$updateIncomeRow['rent_value'] = $d['rent_value'];
			$updateIncomeRow['currency'] = $d['currency'];
			$updateIncomeRow['year'] = $d['year'];
			$updateIncomeRow['expenses'] = $d['expenses'];
			$updateIncomeRow['financial_loss'] = $d['financial_loss'];

			array_push($income_type_data, $updateIncomeRow);
		}
		// $this->dd($income_type_data);
		if ($this->db->update_batch('hotel_rental_income_type', $income_type_data, 'id')) {

			$personal_data_id = $_SESSION['personal_data_id'];

			$price = $data['cost_final'];
			// $finalCostData['created_at'] = date('Y-m-d H:i:s');

			if ($this->calculateFinalPrice($personal_data_id, $price)) {
				// echo "Inserted";
				$this->session->set_flashdata('success', 'Record updated Successfully.');
				echo "<script>window.location.href='" . base_url('user/hotelRegimIncome') . "';</script>";
				die;
			}
		} else {
			$this->session->set_flashdata('error', 'Failed to save record.');
			echo "<script>window.location.href='" . base_url('user/hotelRegimIncome') . "';</script>";
			die;
		}
	}

	public function hotelIncomeVerification()
	{
		$this->user_auth();
		$id = $this->session->userdata('id');
		$personalDataId = $this->session->userdata('personal_data_id');

		// $this->dd($_SESSION);

		$data['rentIncome'] = $this->user_model->fetchHotelIncome($id, $personalDataId);

		$verificationData['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		
		// $this->dd($verificationData['personalData']);
		$steps = $verificationData['personalData']['steps_completed'];
		$stepsCompleted = $this->checkHotelSteps($steps);
		$verificationData['personalData']['steps_completed'] = $stepsCompleted;
		// $this->dd($stepsCompleted);




		if (!empty($verificationData['personalData'])) {
			// if ($verificationData['personalData']['steps_completed'] == 2) {
				// $this->dd($data);
				$hotelVerification = $this->user_model->fetchVerifiedHotelByPersonalDataId($personalDataId);
				if($hotelVerification) {
					$verificationData['hotelVerif_id'] = $hotelVerification['id'];
					$verificationData['existing_data'] = $hotelVerification;
				}
				$verificationData['incomeData'] = $this->getHotelIncome2021and2022($data);

				$this->load->view('user/layout/header');
				$this->load->view('user/hotel_income_verification', $verificationData);
				$this->load->view('user/layout/footer');
			// } elseif ($verificationData['personalData']['steps_completed'] == 3) {
			// 	$this->session->set_flashdata('step-error', 'Hotel Income Information verification completed. Add more income type or proceed to payment.');
			// 	echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
			// 	die;
			// }
		}
	}

	/**
	 * ------------------------------------
	 * 	Get Hotel Income 2021 and 2022
	 * ------------------------------------
	 * It is used to calculate "Product Name 2021 and 2022" 
	 * details on hotel rental verification 		 
	 * 
	 * @return array $calculatedData,$errors
	 */
	public function getHotelIncome2021and2022($data)
	{
		// $this->dd($data);
		$rentValueData = [];
		$expensesData = [];
		$financialLossData = [];
		$errors = [];
		$currentYear = date("Y");
		$minWage = $this->user_model->getMinWageForCurrentYear($currentYear);
		// $this->dd($minWage);
		if($minWage){

			foreach ($data['rentIncome'] as $key => $value) {
				// $this->dd($value);
				$rent_value 			= $value['rent_value'];
				$currency 				= $value['currency'];
				$year 					= $value['year'];
				$expenses 				= $value['expenses'];
				$financial_loss 		= $value['financial_loss'];

				// $this->dd($dataForCalculation);

				array_push($rentValueData, $rent_value);
				array_push($expensesData, $expenses);
				array_push($financialLossData, $financial_loss);
			}


			$calculatedData['income'] 					= round(array_sum($rentValueData));
			$calculatedData['totalExpenses'] 			= round(array_sum($expensesData));
			$calculatedData['totalFinancialLoss'] 		= round(array_sum($financialLossData));
			$calculatedData['taxableIncome'] 			= $calculatedData['income'] - $calculatedData['totalExpenses'] - $calculatedData['totalFinancialLoss'];
			$calculatedData['tax'] 						= round($calculatedData['taxableIncome'] * 0.1);
			$calculatedData['totalIncomeForHealth'] 	= $calculatedData['taxableIncome'];
			$calculatedData['healthInsuranceTax']		= $calculatedData['totalIncomeForHealth'] > (12 * $minWage['value']) ? round(12 * $minWage['value'] * 0.1) : 0;
			$calculatedData['healthInsuranceTax2022']	= $calculatedData['income'] > (12 * $minWage['value']) ? round(12 * $minWage['value'] * 0.1) : 0;
			// $this->dd($calculatedData);
			return $calculatedData;
		} else {
			$this->session->set_flashdata('error', 'Minimum wage for the year '.$currentYear." is not found. Please contact admin.");
			echo "<script>window.location.href='" . base_url('user/hotelRegimIncome') . "';</script>";
			die;
		}
	}

	public function saveHotelVerification()
	{
		$data = $this->input->post();
		// $this->dd($data);

		$dataToSave['personal_data_id']				= $data['personal_data']['id'];
		$dataToSave['income_2021'] 					= $data['income_2021'];
		$dataToSave['expenses'] 					= $data['expenses'];
		$dataToSave['financial_loss'] 				= $data['financial_loss'];
		$dataToSave['taxable_income_2021'] 			= $data['taxable_income_2021'];
		$dataToSave['tax'] 							= $data['tax'];
		$dataToSave['total_income_for_health'] 		= $data['total_income_for_health'];
		$dataToSave['health_insurance_tax'] 		= $data['health_insurance_tax'];
		$dataToSave['to_be_paid_health_tax'] 		= $data['to_be_paid_health_tax'];
		$dataToSave['to_be_paid_tax'] 				= $data['to_be_paid_tax'];
		$dataToSave['need_health_insurance'] 		= $data['need_health_insurance'];
		

		if(!empty($data['income_estimation_2022']))
			$dataToSave['income_estimation_2022'] = $data['income_estimation_2022'];		
		if(!empty($data['health_insurance_tax_2022']))
			$dataToSave['health_insurance_tax_2022'] = $data['health_insurance_tax_2022'];		

		$dataToSave['created_at'] = date('Y-m-d H:i:s');
			
		// $this->dd($dataToSave);

		if ($this->user_model->saveHotelVerification($dataToSave)) {
			$step = $this->completeThisStep($dataToSave['personal_data_id'], 3, 'hotel');

			if ($this->user_model->stepThreeCompleted($dataToSave['personal_data_id'], $step)) {
				$this->session->set_flashdata('success', 'Information verification saved.');
				echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
				die;
			}
		}
	}

	public function updateHotelVerification()
	{
		// $this->dd($this->input->post());
		$data = $this->input->post();
		$id = $data['id'];
		
		$dataToUpdate['personal_data_id']			= $data['personal_data']['id'];
		$dataToUpdate['income_2021'] 				= $data['income_2021'];
		$dataToUpdate['expenses'] 					= $data['expenses'];
		$dataToUpdate['financial_loss'] 			= $data['financial_loss'];
		$dataToUpdate['taxable_income_2021'] 		= $data['taxable_income_2021'];
		$dataToUpdate['tax'] 						= $data['tax'];
		$dataToUpdate['total_income_for_health'] 	= $data['total_income_for_health'];
		$dataToUpdate['health_insurance_tax'] 		= $data['health_insurance_tax'];
		$dataToUpdate['to_be_paid_health_tax'] 		= $data['to_be_paid_health_tax'];
		$dataToUpdate['to_be_paid_tax'] 			= $data['to_be_paid_tax'];
		$dataToUpdate['need_health_insurance'] 		= $data['need_health_insurance'];
		
		if(!empty($data['income_estimation_2022']))
			$dataToUpdate['income_estimation_2022'] = $data['income_estimation_2022'];		
		if(!empty($data['health_insurance_tax_2022']))
			$dataToUpdate['health_insurance_tax_2022'] = $data['health_insurance_tax_2022'];		

		$dataToUpdate['updated_at'] = date('Y-m-d H:i:s');
			
		// $this->dd($dataToUpdate);

		if ($this->user_model->updateHotelVerification($id, $dataToUpdate)) {
			$step = $this->completeThisStep($dataToUpdate['personal_data_id'], 3, 'hotel');

			if ($this->user_model->stepThreeCompleted($dataToUpdate['personal_data_id'], $step)) {
				$this->session->set_flashdata('success', 'Information verification updated.');
				echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
				die;
			}
		}
	}

	/**
	 * calculate final price after adding each income type 
	 *
	 * @param [int] $personal_data_id
	 * @param [int] $cost_final
	 * @return void
	 */
	public function calculateFinalPrice($personal_data_id, $cost_final)
	{
		$data = $this->user_model->fetchFinalCost($personal_data_id);
		// $this->dd($data);
		if (!empty($data)) {
			$lastPrice = $data['price'];
			$newPrice = $lastPrice + $cost_final;
			$updateData['personal_data_id'] = $personal_data_id;
			$updateData['price'] = $newPrice;
			if ($this->user_model->updateFinalCost($updateData)) {
				return true;
			} else {
				return false;
			}
		} else {
			$finalCostData['personal_data_id'] = $personal_data_id;
			$finalCostData['user_id'] = $_SESSION['id'];
			$finalCostData['price'] = $cost_final;
			$finalCostData['created_at'] = date('Y-m-d H:i:s');

			if ($this->user_model->saveFinalCost($finalCostData)) {
				// echo "Inserted";
				return true;
			} else {
				return false;
			}
		}
	}

	/**
	 *  Norma de venit Income type
	 */
	public function normaIncome()
	{
		$this->user_auth();
		$personal_data_id = $_SESSION['personal_data_id'];
		$data['county'] = $this->admin_model->getCountiesNames();
		$data['caen'] = $this->admin_model->getCaenCodesList();
		$data['existing_income'] = $this->user_model->getNormaIncome($personal_data_id);
		$data['recommended_variables'] = $this->user_model->getRecommendedVariables();
		$data['pfa_data_variables'] = $this->user_model->getPfaDataVariables('Norma');
		// dd($data['pfa_data_variables']);
		// dd($data['pfa_data_variables']);
		$data['personalData'] = $this->user_model->getPersonalDataById($personal_data_id);
		// dd($data['personalData']);
		$age = age_evaluation($data['personalData']['personal_number']);
		$genre = genre_evaluation($data['personalData']['personal_number']);
		$data['age'] = $age;
		$data['genre'] = $genre;

		$this->load->view('user/layout/header');
		$this->load->view('user/norma/income_type', $data);
		$this->load->view('user/layout/footer');
	}

	public function fetchVariants()
	{
		$data = $this->input->post();
		// dd($data);
		if($data) {
			$variants = $this->user_model->getVariantsByVariableId($data['variableId']);
			$pfaDataVarblsVarnts = $this->user_model->getPfaDataVrblsVrnts("Norma");
			$pfaSpecVarblsVarnts = $this->user_model->getPfaSpecVrblsVrnts("Norma");
			// dd($pfaSpecVarblsVarnts);
			// dd($pfaDataVarblsVarnts);
			echo json_encode([
				"variants" => $variants, 
				"pfa_data_vars" => $pfaDataVarblsVarnts,
				"pfa_spec_vars" => $pfaSpecVarblsVarnts
			]);
		}
		else {
			echo false;
		}
	}	

	/**
	 * get cities name along with county
	 *
	 * @return json
	 */
	public function fetchCitiesWithCounty()
	{
		$data = $this->input->post();
		// dd($data);
		$countyNames = json_decode($data['county']);
		// dd($countyNames);
		$cities = $this->admin_model->fetchCitiesByCounty($countyNames[count($countyNames) - 1]);
		if($cities) {
			echo json_encode(['cities' => $cities, 'county' => $countyNames[count($countyNames) - 1]]);
			// dd($cities);
		}
		else {
			return false;
		}
	}

	public function getNormaIncome()
	{
		$data = $this->input->post();
		// dd($data);
		if(!empty($data)) {
			$normaIncome = $this->admin_model->getNormaIncome($data);
			$variablesInfo = $this->admin_model->getCoeffVariableForNormaIncome($data);
			// dd($normaIncome);
			if($normaIncome){
				$resData['normaIncome'] = $normaIncome['tax'];
				$resData['variablesInfo'] = $variablesInfo;
				echo json_encode($resData);
			}
			else {
				echo json_encode("error");
			}
		}
		else {
			echo false;
		}
	}

	public function submitNormaIncome()
	{
		$data = $this->input->post();
		if($data) {
			$res = $this->user_model->submitNormaIncome($data);
			if($res) {
				echo true;
			}
			else {
				echo false;
			}
		}
	}

	public function normaInfoVerification()
	{
		$this->user_auth();
		$personal_data_id = $_SESSION['personal_data_id'];
		$norma_income_data = $this->user_model->getNormaIncome($personal_data_id);
		// dd($norma_income_data);
		$verificationData['county'] = $norma_income_data[0]['county'];
		$verificationData['city'] = $norma_income_data[0]['city'];
		$c_var = $norma_income_data[0]['cvar'] ?? null;

		$verificationData['personalData'] = $this->user_model->getPersonalDataById($personal_data_id);
		$normaValue = 0;
		
		foreach ($norma_income_data as $i) {
			$normaValue += $i['norma_de_venit'];
		}
		$high_increase = $norma_income_data[0]['high_increase'] ?? 0;
		$high_decrease = $norma_income_data[0]['high_decrease'] ?? 0;
		$current_year = date("Y");
		$minWageCurrentYear = $this->user_model->getMinWageForCurrentYear($current_year);
		$start_date = $norma_income_data[0]['start_date'];
		$end_date = $norma_income_data[0]['end_date'];
		if($end_date == "0000-00-00") $end_date = "";
		
		$verificationData['norma_venit_initiata'] = $normaValue;
		$verificationData['norma_ajustata'] = compute_norma_ajustata($normaValue, $high_increase, $high_decrease);
		$verificationData['venit_net_anual'] = compute_venit_net_anual($verificationData['norma_ajustata'], $start_date, $end_date, $c_var);
		// dd($verificationData['venit_net_anual']);
		$verificationData['venit_impozabil'] = compute_venit_impozabil($verificationData['venit_net_anual']);
		$verificationData['impozit'] = compute_impozit($verificationData['venit_impozabil']);

		$pensionMandatoryIncomes = $this->admin_model->getPensionMandatoryIncomes();
		$incomes = [];
		foreach ($pensionMandatoryIncomes as $inc) {
			$incomes[] = $inc['income_name'];
		}
		$varCASforPensionMandatory = $this->admin_model->getvarCAS($incomes, $personal_data_id, $verificationData['venit_impozabil']);
		// dd($varCASforPensionMandatory);
		
		$pensionOptionalIncomes = $this->admin_model->getPensionOptionalIncomes();
		$incomes1 = [];
		foreach ($pensionOptionalIncomes as $inc) {
			$incomes1[] = $inc['income_name'];
		}
		$varCASforPensionOptional = $this->admin_model->getvarCAS($incomes1, $personal_data_id, $verificationData['venit_impozabil']);
		// dd($varCASforPensionMandatory);
		
		$verificationData['pfa_block'] = compute_pension_mandatory($varCASforPensionMandatory, $minWageCurrentYear['value']);
		$verificationData['pfa_spec_block'] = compute_pension_optional($varCASforPensionOptional, $minWageCurrentYear['value']);

		$healthMandatoryIncomes = $this->admin_model->getHealthMandatoryIncomes();
		$incomes2 = [];
		foreach ($healthMandatoryIncomes as $inc) {
			$incomes2[] = $inc['income_name'];
		}
		$varCASforHealthMandatory = $this->admin_model->getvarCAS($incomes, $personal_data_id, $verificationData['venit_impozabil']);
		// dd($varCASforHealthMandatory);
		
		$healthOptionalIncomes = $this->admin_model->getHealthOptionalIncomes();
		$incomes3 = [];
		foreach ($healthOptionalIncomes as $inc) {
			$incomes3[] = $inc['income_name'];
		}
		$varCASforHealthOptional = $this->admin_model->getvarCAS($incomes, $personal_data_id, $verificationData['venit_impozabil']);
		// dd($varCASforHealthOptional);
		

		$verificationData['health_mandatory_block'] = compute_health_mandatory_block($varCASforHealthMandatory, $minWageCurrentYear['value']);
		$verificationData['health_optional_block'] = compute_health_optional_block($varCASforHealthOptional, $minWageCurrentYear['value']);
		// dd($verificationData);
		$this->load->view('user/layout/header');
		$this->load->view('user/norma/info_verification', $verificationData);
		$this->load->view('user/layout/footer');
	}

	public function increasePfaTax()
	{
		$data = $this->input->post();
		// dd($data);
		if(count($data) > 0) {
			$taxa = $data['value'] * 25/100;

			echo json_encode(['tax' => round($taxa)]);
		}
		else {
			echo json_encode('error');
		}
	}

	public function saveNormaInfoVerification()
	{
		$data = $this->input->post();
		if($data) {
			$res = $this->user_model->saveNormaInfoVerification($data);
			if($res) {
				$this->session->set_flashdata('success', 'Information verification saved.');
				echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
				die;
			}
			else {
				$this->session->set_flashdata('success', 'Information verification updated.');
				echo "<script>window.location.href='" . base_url('user/normaInfoVerification') . "';</script>";
				die;
			}
		}
	}

	public function payment()
	{
		// $this->dd($_SESSION);
		$data['final_cost'] = $this->user_model->fetchFinalCost($_SESSION['personal_data_id']);
		$this->load->view('user/payment',$data);
	}

	public function processPayment()
	{
		$user_id = '';
		\Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
        $session = \Stripe\Checkout\Session::retrieve($this->input->get('session_id'));
        $transId = $session->payment_intent;

        $paymentIntentObj = \Stripe\PaymentIntent::retrieve($session->payment_intent);
        $amount = $paymentIntentObj->amount_received/100;
		// $this->dd($amount);
			
			if($this->user_model->updateFinalCostStatus($_SESSION['personal_data_id']))
			{
				$transcData['transaction_id'] = $transId;
				$transcData['user_id'] = $user_id;
				$transcData['personal_data_id'] = $_SESSION['personal_data_id'];
				$transcData['created_at'] = date("Y-m-d H:i:s");
				$transcData['amount'] = $amount;

				if($this->user_model->saveTransaction($transcData))
				{
					$step = $this->completeThisStep($_SESSION['personal_data_id'],4);
	
					if ($this->user_model->stepFourCompleted($_SESSION['personal_data_id'], $step)) 
					{
						$this->session->set_flashdata('success', 'Payment Successful');
						echo "<script>window.location.href='" . base_url('user/generatePdf') . "';</script>";
						die;
					}
				}
				
			}
	}

	/**
	 * render payment page
	 *
	 * @return void
	 */
	public function generatePdf()
	{
		$personal_data_id = $_SESSION['personal_data_id'];
		$data['final_cost'] = $this->user_model->fetchFinalCost($personal_data_id);
		$data['personal_data_id'] = $personal_data_id;
		$this->load->view('user/layout/header');
		$this->load->view('user/generate_pdf', $data);
		$this->load->view('user/layout/footer');
		
	}


	/**
	 * render divident income page with/without income information
	 *
	 * @return void
	 */
	public function dividentsIncome()
	{
		$this->user_auth();
		$id = $this->session->userdata('id');
		$personalDataId = $this->session->userdata('personal_data_id');
		$data['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		
		$steps = $data['personalData']['steps_completed'];
		$stepsCompleted = $this->checkDividentSteps($steps);
		// $this->dd($steps);
		// $this->dd($stepsCompleted);

		// $this->dd($stepsCompleted);
		$data['personalData']['steps_completed'] = $stepsCompleted;

		$data['dividentModulesPrice'] = $this->user_model->fetchDividentModulesPrice();
		$data['dividentIncome'] = $this->user_model->fetchDividentWithCountry($personalDataId);

		$this->load->view('user/layout/header');
		$this->load->view('user/divident_income', $data);
		$this->load->view('user/layout/footer');
	}

	/**
	 * save dividents income data from excel file to database
	 */
	public function saveDividentsIncome()
	{
		$this->user_auth();
		// echo "here";die;
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// echo "post";die;
			$upload_status =  $this->uploadxlsxDoc();
			// var_dump($upload_status);die;

			if ($upload_status != false) {
				$inputFileName = FCPATH . 'upload/imports/' . $upload_status;
				// $this->dd($inputFileName);

				$inputTileType = IOFactory::identify($inputFileName);
				$reader = IOFactory::createReader($inputTileType);
				$spreadsheet = $reader->load($inputFileName);
				$sheet = $spreadsheet->getSheet(3);
				// $all = $spreadsheet->getSheetNames()[3];
				// $this->dd($all);
				$count_Rows = 0;
				foreach ($sheet->getRowIterator() as $row) {
					if ($row->getRowIndex() > 1) {
						$netDivident = $sheet->getCell('C' . $row->getRowIndex())->getValue();
						// var_dump($netDivident);
						// if($netDivident == ''){
						// 	print_r($count_Rows);
						// 	die;
						// }
						// $this->dd($netDivident);

						// $date = gmdate("Y-m-d",$date_inUnixTimestamp);

						$isin = $sheet->getCell('H' . $row->getRowIndex())->getValue();
						if($isin == ''){
							// var_dump($row->getRowIndex());
							// print_r($count_Rows);
							// die;
							break;
						}
						
						$country = substr($isin, 0, 2);


						// $rateBnrEuro = $spreadsheet->getActiveSheet()->getCell('C'.$row->getRowIndex())->getValue();

						// $this->dd($date);

						$data = array(
							'personal_data_id' => $_SESSION['personal_data_id'],
							'country' => $country,
							'divident' => $netDivident,
						);
						// $this->dd($data);

						if ($this->user_model->dividentData($data)) {
							continue;
						} else {
							$this->db->insert('divident_income_type', $data);
							$count_Rows++;
						}
					}
					else {
						$this->session->set_flashdata('error', 'Invalid file.');
						echo "<script>window.location.href='" . base_url('user/dividentsIncome') . "';</script>";
					}
				}

				$this->session->set_flashdata('success', 'Successfully imported data');
				echo "<script>window.location.href='" . base_url('user/dividentsIncome') . "';</script>";
			} else {
				$this->session->set_flashdata('error', 'File is not uploaded');
				echo "<script>window.location.href='" . base_url('user/dividentsIncome') . "';</script>";
			}
		} else {
			$this->load->view('user/layout/header');
			$this->load->view('user/divident_income');
			$this->load->view('user/layout/footer');
		}
	}

	public function saveDividentFinalCost()
	{
		$data = $this->input->post();
		// $this->dd($data);
		if ($this->calculateFinalPrice($data['personal_data_id'], $data['final_cost'])) {
			return true;
		} else {
			return false;
		}
	}


	public function dividentVerification()
	{
		$this->user_auth();
		$id = $this->session->userdata('id');
		$personalDataId = $this->session->userdata('personal_data_id');

		// $this->dd($_SESSION);

		$verificationData['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		
		// $this->dd($verificationData['personalData']);
		$steps = $verificationData['personalData']['steps_completed'];
		$stepsCompleted = $this->checkDividentSteps($steps);
		$verificationData['personalData']['steps_completed'] = $stepsCompleted;
		// $this->dd($stepsCompleted);




		if (!empty($verificationData['personalData'])) 
		{
			// $this->dd($verificationData['personalData']);
			if ($verificationData['personalData']['steps_completed'] == 1) 
			{
				// echo "step 1 of divident completed";die;
				$this->load->view('user/layout/header');
				$this->load->view('user/divident_verification', $verificationData);
				$this->load->view('user/layout/footer');
			}
			if($verificationData['personalData']['steps_completed'] >= 2)
			{
				
				$dividentIncome = $this->user_model->fetchDividentWithCountry($personalDataId);
				// $this->dd($dividentIncome);

				$calculatedDividentList = $this->calculateListOfDivident($dividentIncome);
				// $this->dd($calculatedDividentList);

				$calculatedData2021 = $this->calculateDivident2021($calculatedDividentList);

				$verificationData['calculatedDividentList'] = $calculatedDividentList;
				$verificationData['calculatedData2021'] = $calculatedData2021;

				$existingVerification = $this->user_model->fetchVerifiedDividentByPid($personalDataId);
				if(!empty($existingVerification)) {
					$verificationData['existingVerification'] = $existingVerification;
				}

				$this->load->view('user/layout/header');
				$this->load->view('user/divident_verification', $verificationData);
				$this->load->view('user/layout/footer');
			}
			// if ($verificationData['personalData']['steps_completed'] == 3) 
			// 	{
			// 		$this->session->set_flashdata('step-error', 'Divident Information verification completed. Add more income type or proceed to payment.');
			// 		echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
			// 		die;
			// 	}
		}
	}

	public function calculateListOfDivident($data)
	{
		// $this->dd($data);
		$calculatedDividentList = [];
		$previous_year = date("Y", strtotime("-1 year"));
		$annualExchangeRate = $this->admin_model->fetchAnnualExchangeRate('USD', $previous_year);
		// $this->dd($annualExchangeRate);
		if (!empty($annualExchangeRate)) {
			foreach ($data as $key => $value) {
				// $this->dd($value);
				$netDivident = round($value['SUM(divident)'] * $annualExchangeRate[0]['value']);
				$divTax = $netDivident * 0.05;
				$row['country'] = $value['country'];
				$row['divident'] = $netDivident;
				$row['tax'] = $divTax;
				array_push($calculatedDividentList, $row);
			}
			// $this->dd($calculatedDividentList);
			return $calculatedDividentList;
		}
		else{
			$this->session->set_flashdata('error', 'Annual Exchange Rate for the year '.$previous_year.' is not found. Please contact admin.');
			echo "<script>window.location.href='" . base_url('user/dividentsIncome') . "';</script>";
			die;
		}
	}

	public function calculateDivident2021($data)
	{
		// $this->dd($data);
		$calculateDivident2021 = [];
		$minWagePreviousYear = $this->user_model->getMinWageForPreviousYear();
		// $this->dd($minWagePreviousYear);
		if($minWagePreviousYear){
			$taxableIncome = 0;
			foreach ($data as $key => $value) {
				$taxableIncome += $value['divident'];
			}
			// $this->dd($taxableIncome);
			$tax = round($taxableIncome * 0.05);
			$calculateDivident2021['taxableincome2021'] = round($taxableIncome);
			$calculateDivident2021['tax2021'] = round($tax);
			$calculateDivident2021['totalIncomeForHealth2021'] = round($taxableIncome);
			$calculateDivident2021['healthInsuranceTax2021'] = $calculateDivident2021['totalIncomeForHealth2021'] > 12 * $minWagePreviousYear['value'] ? round(12 * $minWagePreviousYear['value'] * 0.1) : 0;
			$calculateDivident2021['toBePaidHealthTax2021'] = $calculateDivident2021['totalIncomeForHealth2021'] > 12 * $minWagePreviousYear['value'] ? round(12 * $minWagePreviousYear['value'] * 0.1) : 0;
			
			if($calculateDivident2021['toBePaidHealthTax2021'] == 0)
				$calculateDivident2021['toBePaidTax2021'] = 0;
			else
				$calculateDivident2021['toBePaidTax2021'] = round($tax);
	
			return $calculateDivident2021;
		} else {
			$this->session->set_flashdata('error', 'Minimum wage for the year previous year is not found. Please contact admin.');
			echo "<script>window.location.href='" . base_url('user/dividentsIncome') . "';</script>";
			die;
		}
	}

	public function calculateDivident2022()
	{
		$data = $this->input->post();
		// $this->dd($data);
		$current_year = date("Y");
		$minWageCurrentYear = $this->user_model->getMinWageForCurrentYear($current_year);
		// $this->dd($minWageCurrentYear);
		if($data['income'] > 12 * $minWageCurrentYear['value']){
			$healthInsuranceTax = 12 * $minWageCurrentYear['value'] *0.1;
		}
		else{
			$currentDate = date("Y-m-d");
			$currentMonth = getDMY('m',$currentDate);
			$currentDay = getDMY('d',$currentDate);
			if($currentDay <= 31 && $currentMonth <= 1){ //Jan
				$healthInsuranceTax = 5 * $minWageCurrentYear['value'] *0.1;
			}
			elseif($currentDay <= 30 && $currentMonth <= 2){ //Feb
				$healthInsuranceTax = 4 * $minWageCurrentYear['value'] *0.1;
			}
			elseif($currentDay <= 31 && $currentMonth <= 3){ //Mar
				$healthInsuranceTax = 3 * $minWageCurrentYear['value'] *0.1;
			}
			elseif($currentDay <= 30 && $currentMonth <= 4){ //Apr
				$healthInsuranceTax = 2 * $minWageCurrentYear['value'] *0.1;
			}
			elseif($currentDay <= 31 && $currentMonth <= 5){ //May
				$healthInsuranceTax = 1 * $minWageCurrentYear['value'] *0.1;
			}
			elseif($currentDay <= 25 && $currentMonth <= 5){	//May
				$healthInsuranceTax = 12 * $minWageCurrentYear['value'] *0.05;
			}
			elseif($currentDay <= 30 && $currentMonth <= 6){ //June
				$healthInsuranceTax = 12 * $minWageCurrentYear['value'] *0.1;
			}
			elseif($currentDay <= 30 && $currentMonth <= 7){ //July
				$healthInsuranceTax = 11 * $minWageCurrentYear['value'] *0.1;
			}
			elseif($currentDay <= 31 && $currentMonth <= 8){ //August
				$healthInsuranceTax = 10 * $minWageCurrentYear['value'] *0.1;
			}
			elseif($currentDay <= 30 && $currentMonth <= 9){ //Sept
				$healthInsuranceTax = 9 * $minWageCurrentYear['value'] *0.1;
			}
			elseif($currentDay <= 31 && $currentMonth <= 10){ //Oct
				$healthInsuranceTax = 8 * $minWageCurrentYear['value'] *0.1;
			}
			elseif($currentDay <= 30 && $currentMonth <= 11){ //Nov
				$healthInsuranceTax = 7 * $minWageCurrentYear['value'] *0.1;
			}
			elseif($currentDay <= 31 && $currentMonth <= 12){ //Dec
				$healthInsuranceTax = 6 * $minWageCurrentYear['value'] *0.1;
			}
		}
		$toBePaid = $healthInsuranceTax;

		$data2022['healthInsuranceTax'] = round($healthInsuranceTax);
		$data2022['toBePaid'] = round($toBePaid);

		echo json_encode($data2022);

	}

	/**
	 * save divident verification
	 */
	public function saveDividentVerification()
	{
		$data = $this->input->post();
		// $this->dd($data);

		$dataToSave['personal_data_id'] = $_SESSION['personal_data_id'];
		$dataToSave['income_2021'] = $data['income_2021'];
		$dataToSave['taxable_income_2021'] = $data['taxable_income_2021'];
		$dataToSave['tax_2021'] = $data['tax_2021'];
		$dataToSave['total_income_for_health_2021'] = $data['total_income_for_health_2021'];
		$dataToSave['health_insurance_tax_2021'] = $data['health_insurance_tax_2021'];
		$dataToSave['to_be_paid_health_tax_2021'] = $data['to_be_paid_health_tax_2021'];
		$dataToSave['to_be_paid_tax_2021'] = $data['to_be_paid_tax_2021'];
		$dataToSave['income_2022'] = $data['income_2022'];
		$dataToSave['health_insurance_tax_2022'] = $data['health_insurance_tax_2022'];
		$dataToSave['tax_2022'] = $data['tax_2022'];
		$dataToSave['created_by'] = $this->session->userdata('id');
		$dataToSave['created_at'] = date("Y-m-d H:i:s");

		// $this->dd($dataToSave);
		if ($this->user_model->saveDividentVerification($dataToSave)) {
			$step = $this->completeThisStep($dataToSave['personal_data_id'], 3, 'divident');

			if ($this->user_model->stepThreeCompleted($dataToSave['personal_data_id'], $step)) 
			{
				$this->session->set_flashdata('success', 'Information verification saved.');
				echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
				die;
			}
		}
	}
	
	public function updateDividentVerification()
	{
		$data = $this->input->post();
		// $this->dd($data);
		$id = $data['id'];
		$dataToUpdate['personal_data_id'] 			= $_SESSION['personal_data_id'];
		$dataToUpdate['income_2021'] 					= $data['income_2021'];
		$dataToUpdate['taxable_income_2021'] 			= $data['taxable_income_2021'];
		$dataToUpdate['tax_2021'] 					= $data['tax_2021'];
		$dataToUpdate['total_income_for_health_2021'] = $data['total_income_for_health_2021'];
		$dataToUpdate['health_insurance_tax_2021'] 	= $data['health_insurance_tax_2021'];
		$dataToUpdate['to_be_paid_health_tax_2021'] 	= $data['to_be_paid_health_tax_2021'];
		$dataToUpdate['to_be_paid_tax_2021'] 			= $data['to_be_paid_tax_2021'];

		// $dataToUpdate['income_2022'] 					= $data['income_2022'];
		// $dataToUpdate['health_insurance_tax_2022'] 	= $data['health_insurance_tax_2022'];
		// $dataToUpdate['tax_2022'] 					= $data['tax_2022'];

		!empty($data['income_2022']) 
			? $dataToUpdate['income_2022'] = $data['income_2022']
			: $dataToUpdate['income_2022'] = 0;
		!empty($data['health_insurance_tax_2022'])
			? $dataToUpdate['health_insurance_tax_2022'] = $data['health_insurance_tax_2022']
			: $dataToUpdate['health_insurance_tax_2022'] = 0;
		!empty($data['tax_2022'])
			? $dataToUpdate['tax_2022'] = $data['tax_2022']
			: $dataToUpdate['tax_2022'] = 0;
			
		$dataToUpdate['created_by'] 					= $this->session->userdata('id');
		$dataToUpdate['created_at'] 					= date("Y-m-d H:i:s");

		// $this->dd($dataToUpdate);
		if ($this->user_model->updateDividentVerification($id, $dataToUpdate)) {
			$step = $this->completeThisStep($dataToUpdate['personal_data_id'], 3, 'divident');

			if ($this->user_model->stepThreeCompleted($dataToUpdate['personal_data_id'], $step)) 
			{
				$this->session->set_flashdata('success', 'Information verification updated.');
				echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
				die;
			}
		}
	}

	public function stocksIncome()
	{
		$this->user_auth();
		$id = $this->session->userdata('id');
		$personalDataId = $this->session->userdata('personal_data_id');
		$data['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		
		$steps = $data['personalData']['steps_completed'];
		$stepsCompleted = $this->checkStockSteps($steps);
		// $this->dd($steps);
		// $this->dd($stepsCompleted);

		// $this->dd($stepsCompleted);
		$data['personalData']['steps_completed'] = $stepsCompleted;

		$data['stocksModulesPrice'] = $this->user_model->fetchStocksModulesPrice();
		// $this->dd($data['stocksModulesPrice']);
		$data['stocksIncome'] = $this->user_model->fetchStocksWithCountry($personalDataId);

		$this->load->view('user/layout/header');
		$this->load->view('user/stocks_income', $data);
		$this->load->view('user/layout/footer');
	}

	/**
	 * save stocks income data from excel file to database
	 */
	public function saveStocksIncome()
	{
		$this->user_auth();
		// echo "here";die;
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// echo "post";die;
			$upload_status =  $this->uploadxlsxDoc();
			// var_dump($upload_status);die;

			if ($upload_status != false) {
				$inputFileName = FCPATH . 'upload/imports/' . $upload_status;
				// $this->dd($inputFileName);

				$inputTileType = IOFactory::identify($inputFileName);
				$reader = IOFactory::createReader($inputTileType);
				$spreadsheet = $reader->load($inputFileName);
				$sheet = $spreadsheet->getSheet(1);
				// $all = $spreadsheet->getSheetNames()[1];
				// $this->dd($all);
				$bnrExRate = 0;
				$count_Rows = 0;
				$stocksData = [];
				$i = 0;
				foreach ($sheet->getRowIterator() as $row) {
					if ($row->getRowIndex() > 1) {

						if($sheet->getCell('P'. $row->getRowIndex())->getValue() == '')
						{
							// var_dump($row->getRowIndex());
							// echo "EOL";die;
							break;
						}

						$type = trim($sheet->getCell('P'. $row->getRowIndex())->getValue());

						if( strcasecmp($type, "Stocks") == 0 || strcasecmp($type, "CFD") == 0 || strcasecmp($type, "ETF") == 0)
						{

							$isin = $sheet->getCell('Q' . $row->getRowIndex())->getValue();
							if($isin == '')
								$country = 'CY';
							else
								$country = substr($isin, 0, 2);
							// $this->dd($country);
							// print_r($sheet->getCell('F'.$row->getRowIndex())->getValue());echo "\n";
							$closeDateTimestamp = $sheet->getCell('F'.$row->getRowIndex())->getValue();
							
							$datetimearray = explode(" ", $closeDateTimestamp);
							$d = $datetimearray[0];
							$t = $datetimearray[1];
							
							$date = DateTime::createFromFormat('d/m/Y', $d);
							$closeDate = $date->format('Y-m-d');
							
							$previousDay = date('Y-m-d', strtotime('-1 day', strtotime($closeDate)));
							
							$bnrData = $this->user_model->fetchBnrByDate($previousDay);
							
							if(!empty($bnrData))
								$bnrExRate = $bnrData['rate_bnr_usd'];
								
							$profit = $sheet->getCell('I'.$row->getRowIndex())->getValue();
							$rolloverFnD = $sheet->getCell('N'.$row->getRowIndex())->getValue();
							$var_profit = $profit - $rolloverFnD;


							$var_final = round($var_profit * $bnrExRate);

							$data = array(
								'personal_data_id' => $_SESSION['personal_data_id'],
								'country' => $country,
								'var_final' => $var_final,								
							);
							// $this->dd($data);							

							// if ($this->user_model->stocksData($data)) {
							// 	$i++;
							// 	continue;
							// } else {
								// $this->db->insert('stocks_income_type', $data);
								if(count($stocksData) < 1000)
								{
									array_push($stocksData,$data);
								}
								else{
									$this->db->insert_batch('stocks_income_type', $stocksData);
									$stocksData = [];
								}
								$count_Rows++;
							// }
						}
						else{ 
							// echo $type."\n";
							// echo $count_Rows; die;
							continue;
						}
					}
					else {
						$this->session->set_flashdata('error', 'Invalid file.');
						echo "<script>window.location.href='" . base_url('user/stocksIncome') . "';</script>";
						die;
					}
				}
				$this->db->insert_batch('stocks_income_type', $stocksData);
				// echo $i;die;

				// die;
				$this->session->set_flashdata('success', 'Successfully imported data');
				echo "<script>window.location.href='" . base_url('user/stocksIncome') . "';</script>";
			} else {
				$this->session->set_flashdata('error', 'File is not uploaded');
				echo "<script>window.location.href='" . base_url('user/stocksIncome') . "';</script>";
			}
		} else {
			$this->load->view('user/layout/header');
			$this->load->view('user/stocks_income');
			$this->load->view('user/layout/footer');
		}
	}

	public function stocksVerification()
	{
		$this->user_auth();

		$id = $this->session->userdata('id');
		$personalDataId = $this->session->userdata('personal_data_id');

		// $this->dd($_SESSION);

		$verificationData['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		
		// $this->dd($verificationData['personalData']);
		$steps = $verificationData['personalData']['steps_completed'];
		$stepsCompleted = $this->checkStockSteps($steps);
		$verificationData['personalData']['steps_completed'] = $stepsCompleted;
		// $this->dd($stepsCompleted);

		if (!empty($verificationData['personalData'])) 
		{
			// $this->dd($verificationData['personalData']);
			if ($verificationData['personalData']['steps_completed'] == 1) 
			{
				// echo "step 1 of divident completed";die;
				$this->load->view('user/layout/header');
				$this->load->view('user/stocks_verification', $verificationData);
				$this->load->view('user/layout/footer');
			}
			if($verificationData['personalData']['steps_completed'] >= 2)
			{

				$stocksIncome = $this->user_model->fetchStocksWithCountry($personalDataId);
				// $this->dd($dividentIncome);

				$calculatedStocksList = $this->calculateListOfStocks($stocksIncome);
				// $this->dd($calculatedStocksList);

				$calculatedData2021 = $this->calculateStocks2021($calculatedStocksList);
				// $this->dd($calculatedData2021);

				$verificationData['calculatedDividentList'] = $calculatedStocksList;
				$verificationData['calculatedData2021'] = $calculatedData2021;

				$verificationData['ongList'] = $this->user_model->fetchApprovedOngList();

				$existingVerification = $this->user_model->fetchVerifiedStocksByPid($personalDataId);
				if(!empty($existingVerification)) {
					$verificationData['existingVerification'] = $existingVerification;
					// dd($verificationData['existingVerification']);
					/**
					 * check for existing ong selected
					 */
					$existingOng = $this->user_model->fetchMyOng(['personal_data_id' => $personalDataId, 'info_verification_id' => $existingVerification['id'], 'info_verf_type' => 'stocks']);
					// dd($existingOng);
					$ongInfo = '';
					if(!empty($existingOng)) { // get ONG information if ONG is selected
						$ongInfo = $this->user_model->fetchOngById($existingOng['ong_id']);
						// now check if the new ONG was added or selected from the list
						$ongEditable = false;
						if($ongInfo['info_verf_type'] == 'stocks' && $ongInfo['info_verification_id'] == $verificationData['existingVerification']['id']) {
							$ongEditable = true;
						}
						$verificationData['ongEditable'] = $ongEditable;
					}
					$verificationData['existingOng'] = $existingOng;
					$verificationData['ongInfo'] = $ongInfo;
				}

				$this->load->view('user/layout/header');
				$this->load->view('user/stocks_verification', $verificationData);
				$this->load->view('user/layout/footer');
			}
			// if ($verificationData['personalData']['steps_completed'] == 3) 
			// 	{
			// 		$this->session->set_flashdata('step-error', 'Stocks Information verification completed. Add more income type or proceed to payment.');
			// 		echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
			// 		die;
			// 	}
		}
	}

	public function calculateListOfStocks($data)
	{
		// $this->dd($data);
		$calculatedDividentList = [];
		
			foreach ($data as $key => $value) {
				// $this->dd($value);
				
				$divTax = $value['SUM(var_final)'] * 0.1;
				$row['country'] = $value['country'];
				$row['divident'] = $value['SUM(var_final)'];
				$row['tax'] = $divTax;
				array_push($calculatedDividentList, $row);
			}
			// $this->dd($calculatedDividentList);
			return $calculatedDividentList;
	}

	public function calculateStocks2021($data)
	{
		// $this->dd($data);
		$calculateStocks2021 = [];
		$minWagePreviousYear = $this->user_model->getMinWageForPreviousYear();
		// echo 12 * $minWagePreviousYear['value'];
		// $this->dd($minWagePreviousYear);
		if($minWagePreviousYear) {
			$taxableIncome = 0;
			foreach ($data as $key => $value) {
				$taxableIncome += $value['divident'];
			}
			// $this->dd($taxableIncome);
			$tax = round($taxableIncome * 0.1);
			$calculateStocks2021['taxableincome2021'] = round($taxableIncome);
			$calculateStocks2021['tax2021'] = round($tax);
			$calculateStocks2021['totalIncomeForHealth2021'] = round($taxableIncome);
			// $this->dd($calculateStocks2021['totalIncomeForHealth2021']);
			$calculateStocks2021['healthInsuranceTax2021'] = $calculateStocks2021['totalIncomeForHealth2021'] > 12 * $minWagePreviousYear['value'] ? round(12 * $minWagePreviousYear['value'] * 0.1) : 0;
			$calculateStocks2021['toBePaidHealthTax2021'] = $calculateStocks2021['totalIncomeForHealth2021'] > 12 * $minWagePreviousYear['value'] ? round(12 * $minWagePreviousYear['value'] * 0.1) : 0;
			if($calculateStocks2021['toBePaidHealthTax2021'] == 0)
				$calculateStocks2021['toBePaidTax2021'] = 0;
			else
				$calculateStocks2021['toBePaidTax2021'] = round($tax);
			return $calculateStocks2021;
		} else {
			$this->session->set_flashdata('error', 'Minimum wage for previous year is not found. Please contact admin.');
			echo "<script>window.location.href='" . base_url('user/stocksIncome') . "';</script>";
			die;
		}
	}


	/***
	 * Save stocks verification
	 */
	public function saveStocksVerification()
	{
		$data = $this->input->post();
		// $this->dd($data);
		$ong_data = [];
		$dataToSave['personal_data_id'] 			= $_SESSION['personal_data_id'];
		$dataToSave['income_2021'] 					= $data['income_2021'];
		$dataToSave['taxable_income_2021'] 			= $data['taxable_income_2021'];
		$dataToSave['tax_2021'] 					= $data['tax_2021'];
		$dataToSave['total_income_for_health_2021'] = $data['total_income_for_health_2021'];
		$dataToSave['health_insurance_tax_2021'] 	= $data['health_insurance_tax_2021'];
		$dataToSave['to_be_paid_health_tax_2021'] 	= $data['to_be_paid_health_tax_2021'];
		$dataToSave['to_be_paid_tax_2021'] 			= $data['to_be_paid_tax_2021'];
		
		if(!empty($data['ong_question']))
		{
			$dataToSave['ong_question'] = $data['ong_question'];
		}
		if(!empty($data['ong_name']) && !empty($data['ong_registration_number']) && !empty($data['ong_bank_account'])){
			$ong_data['ong_name'] 					= $data['ong_name'];
			$ong_data['ong_registration_number'] 	= $data['ong_registration_number'];
			$ong_data['ong_bank_account'] 			= $data['ong_bank_account'];
		}		
		
		if(!empty($data['income_2022']))
			$dataToSave['income_2022'] = $data['income_2022'];		
		if(!empty($data['health_insurance_tax_2022']))
			$dataToSave['health_insurance_tax_2022'] = $data['health_insurance_tax_2022'];		
		if(!empty($data['tax_2022']))
			$dataToSave['tax_2022'] = $data['tax_2022'];		

		$dataToSave['created_by'] 					= $this->session->userdata('id');
		$dataToSave['created_at'] 					= date("Y-m-d H:i:s");

		// $this->dd($dataToSave);
		// $this->dd($ong_data);
		
		$inserted_id = $this->user_model->saveStocksVerification($dataToSave);
		if ($inserted_id) 
		{
			if(!empty($ong_data))
			{
				if(empty($data['ong_id'])) {
					$ong_data['personal_data_id'] 		= $_SESSION['personal_data_id'];
					$ong_data['info_verification_id'] 	= $inserted_id;
					$ong_data['info_verf_type'] 		= 'stocks';
					$ong_data['created_by'] 			= $this->session->userdata('id');
					$ong_data['created_at'] 			= date("Y-m-d H:i:s");
					$insertedOng = $this->user_model->saveOng($ong_data);
					if($insertedOng) {
						$ongRelation['personal_data_id'] = $_SESSION['personal_data_id'];
						$ongRelation['info_verification_type'] = 'stocks';
						$ongRelation['info_verification_id'] = $inserted_id;
						$ongRelation['ong_id'] = $insertedOng;
						$this->user_model->saveOngRelation($ongRelation);
					}
				}
				else {
					$ongRelation['personal_data_id'] = $_SESSION['personal_data_id'];
					$ongRelation['info_verification_type'] = 'stocks';
					$ongRelation['info_verification_id'] = $inserted_id;
					$ongRelation['ong_id'] = $data['ong_id'];
					$this->user_model->saveOngRelation($ongRelation);
				}
			}
			$step = $this->completeThisStep($dataToSave['personal_data_id'], 3, 'stocks');

			if ($this->user_model->stepThreeCompleted($dataToSave['personal_data_id'], $step)) 
			{
				$this->session->set_flashdata('success', 'Information verification saved.');
				echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
				die;
			}
		}
	}
	
	public function updateStocksVerification()
	{
		$data = $this->input->post();
		// $this->dd($data);
		$id = $data['id'];
		$ong_data = [];
		$dataToUpdate['personal_data_id'] 			= $_SESSION['personal_data_id'];
		$dataToUpdate['income_2021'] 					= $data['income_2021'];
		$dataToUpdate['taxable_income_2021'] 			= $data['taxable_income_2021'];
		$dataToUpdate['tax_2021'] 					= $data['tax_2021'];
		$dataToUpdate['total_income_for_health_2021'] = $data['total_income_for_health_2021'];
		$dataToUpdate['health_insurance_tax_2021'] 	= $data['health_insurance_tax_2021'];
		$dataToUpdate['to_be_paid_health_tax_2021'] 	= $data['to_be_paid_health_tax_2021'];
		$dataToUpdate['to_be_paid_tax_2021'] 			= $data['to_be_paid_tax_2021'];
		
		if(!empty($data['ong_question']))
		{
			$dataToUpdate['ong_question'] = $data['ong_question'];
		}
		if(!empty($data['ong_name']) && !empty($data['ong_registration_number']) && !empty($data['ong_bank_account'])){
			$ong_data['ong_name'] 					= $data['ong_name'];
			$ong_data['ong_registration_number'] 	= $data['ong_registration_number'];
			$ong_data['ong_bank_account'] 			= $data['ong_bank_account'];
		}		
		if(!empty($data['ong_id'])) {
			$ongId = $data['ong_id'];
		}
		
		!empty($data['income_2022']) 
			? $dataToUpdate['income_2022'] = $data['income_2022']
			: $dataToUpdate['income_2022'] = 0;
		!empty($data['health_insurance_tax_2022'])
			? $dataToUpdate['health_insurance_tax_2022'] = $data['health_insurance_tax_2022']
			: $dataToUpdate['health_insurance_tax_2022'] = 0;
		!empty($data['tax_2022'])
			? $dataToUpdate['tax_2022'] = $data['tax_2022']
			: $dataToUpdate['tax_2022'] = 0;		

		// $dataToUpdate['created_by'] 					= $this->session->userdata('id');
		$dataToUpdate['created_at'] 					= date("Y-m-d H:i:s");

		// $this->dd($dataToUpdate);
		// $this->dd($ong_data);
		
		$inserted_id = $this->user_model->updateStocksVerification($id, $dataToUpdate);
		if ($inserted_id) 
		{
			if(!empty($ong_data)) {
				if(empty($data['ong_id'])) {
					$ong_data['personal_data_id'] 		= $_SESSION['personal_data_id'];
					$ong_data['info_verification_id'] 	= $id;
					$ong_data['info_verf_type'] 		= 'stocks';
					$ong_data['created_by'] 			= $this->session->userdata('id');
					$ong_data['created_at'] 			= date("Y-m-d H:i:s");
					$insertedOng = $this->user_model->saveOng($ong_data);
					if($insertedOng) {
						$ongRelation['personal_data_id'] = $_SESSION['personal_data_id'];
						$ongRelation['info_verification_type'] = 'stocks';
						$ongRelation['info_verification_id'] = $id;
						$ongRelation['ong_id'] = $insertedOng;
						$this->user_model->saveOngRelation($ongRelation);
					}
				}
				else {
					// dd("else");
					$ongRelation['personal_data_id'] = $_SESSION['personal_data_id'];
					$ongRelation['info_verification_type'] = 'stocks';
					$ongRelation['info_verification_id'] = $id;
					$ongRelation['ong_id'] = $data['ong_id'];

					$myOng = $this->user_model->fetchMyOng(['personal_data_id' => $ongRelation['personal_data_id'], 'info_verification_id' => $ongRelation['info_verification_id'], 'info_verf_type' => 'stocks']);
					if(!empty($myOng)) {
						$ongRelation['id'] = $myOng['id'];
						$this->user_model->saveOngRelation($ongRelation);						
					}
					else {
						$this->user_model->saveOngRelation($ongRelation);
					}
				}
			}

			$step = $this->completeThisStep($dataToUpdate['personal_data_id'], 3, 'stocks');

			if ($this->user_model->stepThreeCompleted($dataToUpdate['personal_data_id'], $step)) 
			{
				$this->session->set_flashdata('success', 'Information verification updated.');
				echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
				die;
			}
		}
	}

	public function cryptoIncome()
	{
		$this->user_auth();
		$id = $this->session->userdata('id');
		$personalDataId = $this->session->userdata('personal_data_id');
		$data['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		
		$steps = $data['personalData']['steps_completed'];
		$stepsCompleted = $this->checkCryptoSteps($steps);
		// $this->dd($steps);
		// $this->dd($stepsCompleted);

		// $this->dd($stepsCompleted);
		$data['personalData']['steps_completed'] = $stepsCompleted;

		$data['cryptoModulesPrice'] = $this->user_model->fetchCryptoModulesPrice();
		// $this->dd($data['cryptoModulesPrice']);
		$data['cryptoIncome'] = $this->user_model->fetchCryptoWithCountry($personalDataId);
		// $this->dd($data['cryptoIncome']);
		if(!empty($data['cryptoIncome']))
			$data['cryptoCount'] = count($data['cryptoIncome']);
		

		$this->load->view('user/layout/header');
		$this->load->view('user/crypto_income', $data);
		$this->load->view('user/layout/footer');
	}

	
	/**
	 * save crypto income data from excel file to database
	 */
	public function saveCryptoIncome()
	{
		$this->user_auth();
		// echo "here";die;
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// echo "post";die;
			$upload_status =  $this->uploadxlsxDoc();
			// var_dump($upload_status);die;

			if ($upload_status != false) {
				$inputFileName = FCPATH . 'upload/imports/' . $upload_status;
				// $this->dd($inputFileName);

				$inputTileType = IOFactory::identify($inputFileName);
				$reader = IOFactory::createReader($inputTileType);
				$spreadsheet = $reader->load($inputFileName);
				$sheet = $spreadsheet->getSheet(1);
				// $all = $spreadsheet->getSheetNames()[1];
				// $this->dd($all);
				$bnrExRate = 0;
				$count_Rows = 0;
				$stocksData = [];
				$i = 0;
				foreach ($sheet->getRowIterator() as $row) {
					if ($row->getRowIndex() > 1) {

						if($sheet->getCell('P'. $row->getRowIndex())->getValue() == '')
						{
							// var_dump($row->getRowIndex());die;
							break;
						}

						$type = trim($sheet->getCell('P'. $row->getRowIndex())->getValue());

						if( strcasecmp($type, "crypto") == 0)
						{
							$isin = $sheet->getCell('Q' . $row->getRowIndex())->getValue();
							// if($isin == '')
							// 	$country = 'CY';
							// else
							// 	$country = substr($isin, 0, 2);
							// $this->dd($country);

							$closeDateTimestamp = $sheet->getCell('F'.$row->getRowIndex())->getValue();
							
							$datetimearray = explode(" ", $closeDateTimestamp);
							$d = $datetimearray[0];
							$t = $datetimearray[1];
							
							$date = DateTime::createFromFormat('d/m/Y', $d);
							$closeDate = $date->format('Y-m-d');
							
							$previousDay = date('Y-m-d', strtotime('-1 day', strtotime($closeDate)));
							
							$bnrData = $this->user_model->fetchBnrByDate($previousDay);
							
							if(!empty($bnrData))
								$bnrExRate = $bnrData['rate_bnr_usd'];
								
							$profit = $sheet->getCell('I'.$row->getRowIndex())->getValue();
							$rolloverFnD = $sheet->getCell('N'.$row->getRowIndex())->getValue();
							$var_profit = $profit - $rolloverFnD;


							$var_final = round($var_profit * $bnrExRate);

							$data = array(
								'personal_data_id' => $_SESSION['personal_data_id'],
								'var_final' => $var_final,								
							);
							// $this->dd($data);							
							if(count($stocksData) < 1000)
							{
								array_push($stocksData,$data);
							}
							else{
								$this->db->insert_batch('crypto_income_type', $stocksData);
								$stocksData = [];
							}
							$count_Rows++;
						}
						else{ 
							// echo $type."\n";
							// echo $count_Rows; die;
							continue;
						}
					}
					else {
						$this->session->set_flashdata('error', 'Invalid file.');
						echo "<script>window.location.href='" . base_url('user/cryptoIncome') . "';</script>";
					}
				}
				$this->db->insert_batch('crypto_income_type', $stocksData);
				// echo $i;die;


				$this->session->set_flashdata('success', 'Successfully imported data');
				echo "<script>window.location.href='" . base_url('user/cryptoIncome') . "';</script>";
			} else {
				$this->session->set_flashdata('error', 'File is not uploaded');
				echo "<script>window.location.href='" . base_url('user/cryptoIncome') . "';</script>";
			}
		} else {
			$this->load->view('user/layout/header');
			$this->load->view('user/crypto_income');
			$this->load->view('user/layout/footer');
		}
	}

	public function cryptoVerification()
	{
		$this->user_auth();

		$id = $this->session->userdata('id');
		$personalDataId = $this->session->userdata('personal_data_id');

		// $this->dd($_SESSION);

		$verificationData['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		$steps = $verificationData['personalData']['steps_completed'];
		$stepsCompleted = $this->checkCryptoSteps($steps);
		$verificationData['personalData']['steps_completed'] = $stepsCompleted;
		// $this->dd($stepsCompleted);

		if (!empty($verificationData['personalData'])) 
		{
			// $this->dd($verificationData['personalData']);
			if ($verificationData['personalData']['steps_completed'] == 1) 
			{
				// echo "step 1 of divident completed";die;
				$this->load->view('user/layout/header');
				$this->load->view('user/crypto_verification', $verificationData);
				$this->load->view('user/layout/footer');
			}
			if($verificationData['personalData']['steps_completed'] >= 2)
			{
				// echo "step 2 of divident completed";die;

				$cryptoIncome = $this->user_model->fetchCryptoWithCountry($personalDataId);
				// $this->dd($cryptoIncome);

				$calculatedData2021 = $this->calculateCrypto2021($cryptoIncome);
				// $this->dd($calculatedData2021);
				
				// $verificationData['calculatedDividentList'] = $calculatedCryptoList;
				$verificationData['calculatedData2021'] = $calculatedData2021;
				
				$verificationData['ongList'] = $this->user_model->fetchApprovedOngList();

				$cryptoVerification = $this->user_model->fetchVerifiedCryptoWithPersonalDataId($personalDataId);
				if($cryptoVerification) {
					$verificationData['cryptoVerif_id'] = $cryptoVerification['id'];
					$verificationData['existingVerificationData'] = $cryptoVerification;
					/**
					 * check for existing ong selected
					 */
					$existingOng = $this->user_model->fetchMyOng(['personal_data_id' => $personalDataId, 'info_verification_id' => $cryptoVerification['id'], 'info_verf_type' => 'crypto']);
					// dd($existingOng);
					$ongInfo = '';
					if(!empty($existingOng)) { // get ONG information if ONG is selected
						$ongInfo = $this->user_model->fetchOngById($existingOng['ong_id']);
						// now check if the new ONG was added or selected from the list
						$ongEditable = false;
						if($ongInfo['info_verf_type'] == 'crypto' && $ongInfo['info_verification_id'] == $verificationData['cryptoVerif_id']) {
							$ongEditable = true;
						}
						$verificationData['ongEditable'] = $ongEditable;
					}
					$verificationData['existingOng'] = $existingOng;
					$verificationData['ongInfo'] = $ongInfo;
				}
				$this->load->view('user/layout/header');
				$this->load->view('user/crypto_verification', $verificationData);
				$this->load->view('user/layout/footer');
			}
			// if ($verificationData['personalData']['steps_completed'] == 3) 
			// {
			// 	$this->session->set_flashdata('step-error', 'Crypto Information verification completed. Add more income type or proceed to payment.');
			// 	echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
			// 	die;
			// }
			if ($verificationData['personalData']['steps_completed'] == 4) 
			{
				$this->session->set_flashdata('success', 'You have completed the process. Download your declaration.');
				echo "<script>window.location.href='" . base_url('user/generatePdf') . "';</script>";
				die;
			}
		}
	}

	public function calculateCrypto2021($data)
	{
		// $this->dd($data);
		$calculateCrypto2021 = [];
		$minWagePreviousYear = $this->user_model->getMinWageForPreviousYear();
		if($minWagePreviousYear) {
			$taxableIncome = $data[0]['SUM(var_final)'];
			
			$tax = round($taxableIncome * 0.1);
			$calculateCrypto2021['taxableincome2021'] = round($taxableIncome);
			$calculateCrypto2021['tax2021'] = round($tax);
			$calculateCrypto2021['totalIncomeForHealth2021'] = round($taxableIncome);
			$calculateCrypto2021['healthInsuranceTax2021'] = $calculateCrypto2021['totalIncomeForHealth2021'] > 12 * $minWagePreviousYear['value'] ? round(12 * $minWagePreviousYear['value'] * 0.1) : 0;
			$calculateCrypto2021['toBePaidHealthTax2021'] = $calculateCrypto2021['totalIncomeForHealth2021'] > 12 * $minWagePreviousYear['value'] ? round(12 * $minWagePreviousYear['value'] * 0.1) : 0;
			if($calculateCrypto2021['toBePaidHealthTax2021'] == 0)
				$calculateCrypto2021['toBePaidTax2021'] = 0;
			else
				$calculateCrypto2021['toBePaidTax2021'] = round($tax);
			return $calculateCrypto2021;
		} else {
			$this->session->set_flashdata('error', 'Minimum wage for previous year not found. Please contact admin.');
			echo "<script>window.location.href='" . base_url('user/cryptoIncome') . "';</script>";			
			die;
		}
	}

	/***
	 * Save crypto verification
	 */
	public function saveCryptoVerification()
	{
		$data = $this->input->post();
		// $this->dd($data);
		$ong_data = [];
		$dataToSave['personal_data_id'] 			= $_SESSION['personal_data_id'];
		$dataToSave['income_2021'] 					= $data['income_2021'];
		$dataToSave['taxable_income_2021'] 			= $data['taxable_income_2021'];
		$dataToSave['tax_2021'] 					= $data['tax_2021'];
		$dataToSave['total_income_for_health_2021'] = $data['total_income_for_health_2021'];
		$dataToSave['health_insurance_tax_2021'] 	= $data['health_insurance_tax_2021'];
		$dataToSave['to_be_paid_health_tax_2021'] 	= $data['to_be_paid_health_tax_2021'];
		$dataToSave['to_be_paid_tax_2021'] 			= $data['to_be_paid_tax_2021'];
		
		if(!empty($data['ong_question']))
		{
			$dataToSave['ong_question'] = $data['ong_question'];
		}
		if(!empty($data['ong_name']) && !empty($data['ong_registration_number']) && !empty($data['ong_bank_account'])){
			$ong_data['ong_name'] 					= $data['ong_name'];
			$ong_data['ong_registration_number'] 	= $data['ong_registration_number'];
			$ong_data['ong_bank_account'] 			= $data['ong_bank_account'];
		}	
		
		if(!empty($data['income_2022']))
			$dataToSave['income_2022'] = $data['income_2022'];		
		if(!empty($data['health_insurance_tax_2022']))
			$dataToSave['health_insurance_tax_2022'] = $data['health_insurance_tax_2022'];		
		if(!empty($data['tax_2022']))
			$dataToSave['tax_2022'] = $data['tax_2022'];		

		$dataToSave['created_by'] 					= $this->session->userdata('id');
		$dataToSave['created_at'] 					= date("Y-m-d H:i:s");

		// $this->dd($dataToSave);
		// $this->dd($ong_data);
		
		$inserted_id = $this->user_model->saveCryptoVerification($dataToSave);
		if ($inserted_id) 
		{
			if(!empty($ong_data))
			{
				if(empty($data['ong_id'])) {
					$ong_data['personal_data_id'] 		= $_SESSION['personal_data_id'];
					$ong_data['info_verification_id'] 	= $inserted_id;
					$ong_data['info_verf_type'] 		= 'crypto';
					$ong_data['created_by'] 			= $this->session->userdata('id');
					$ong_data['created_at'] 			= date("Y-m-d H:i:s");
					$insertedOng = $this->user_model->saveOng($ong_data);
					if($insertedOng) {
						$ongRelation['personal_data_id'] = $_SESSION['personal_data_id'];
						$ongRelation['info_verification_type'] = 'crypto';
						$ongRelation['info_verification_id'] = $inserted_id;
						$ongRelation['ong_id'] = $insertedOng;
						$this->user_model->saveOngRelation($ongRelation);
					}
				}
				else {
					$ongRelation['personal_data_id'] = $_SESSION['personal_data_id'];
					$ongRelation['info_verification_type'] = 'crypto';
					$ongRelation['info_verification_id'] = $inserted_id;
					$ongRelation['ong_id'] = $data['ong_id'];
					$this->user_model->saveOngRelation($ongRelation);
				}
			}
			$step = $this->completeThisStep($dataToSave['personal_data_id'], 3, 'crypto');

			if ($this->user_model->stepThreeCompleted($dataToSave['personal_data_id'], $step)) 
			{
				$this->session->set_flashdata('success', 'Information verification saved.');
				echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
				die;
			}
		}
		else{
			$this->session->set_flashdata('error', 'Unable to save your data.');
			echo "<script>window.location.href='" . base_url('user/cryptoVerification') . "';</script>";
			die;
		}
	}
	
	public function updateCryptoVerification()
	{
		$data = $this->input->post();
		// $this->dd($data);
		$id = $data['id'];
		$ong_data = [];
		$dataToUpdate['personal_data_id'] 				= $data['personal_data']['id'];
		$dataToUpdate['income_2021'] 					= $data['income_2021'];
		$dataToUpdate['taxable_income_2021'] 			= $data['taxable_income_2021'];
		$dataToUpdate['tax_2021'] 						= $data['tax_2021'];
		$dataToUpdate['total_income_for_health_2021'] 	= $data['total_income_for_health_2021'];
		$dataToUpdate['health_insurance_tax_2021'] 		= $data['health_insurance_tax_2021'];
		$dataToUpdate['to_be_paid_health_tax_2021'] 	= $data['to_be_paid_health_tax_2021'];
		$dataToUpdate['to_be_paid_tax_2021'] 			= $data['to_be_paid_tax_2021'];
		
		if(!empty($data['ong_question']))
		{
			$dataToUpdate['ong_question'] = $data['ong_question'];
		}
		if(!empty($data['ong_name']) && !empty($data['ong_registration_number']) && !empty($data['ong_bank_account'])){
			$ong_data['ong_name'] 					= $data['ong_name'];
			$ong_data['ong_registration_number'] 	= $data['ong_registration_number'];
			$ong_data['ong_bank_account'] 			= $data['ong_bank_account'];
		}	
		if(!empty($data['ong_id'])) {
			$ongId = $data['ong_id'];
		}
		
		!empty($data['income_2022']) 
			? $dataToUpdate['income_2022'] = $data['income_2022']
			: $dataToUpdate['income_2022'] = 0;
		!empty($data['health_insurance_tax_2022'])
			? $dataToUpdate['health_insurance_tax_2022'] = $data['health_insurance_tax_2022']
			: $dataToUpdate['health_insurance_tax_2022'] = 0;
		!empty($data['tax_2022'])
			? $dataToUpdate['tax_2022'] = $data['tax_2022']
			: $dataToUpdate['tax_2022'] = 0;

		// $dataToUpdate['created_by'] 					= $this->session->userdata('id');
		$dataToUpdate['created_at'] 					= date("Y-m-d H:i:s");

		$inserted_id = $this->user_model->updateCryptoVerification($id, $dataToUpdate);
		if ($inserted_id) 
		{
			if(!empty($ong_data)) {
				if(empty($data['ong_id'])) {
					$ong_data['personal_data_id'] 		= $_SESSION['personal_data_id'];
					$ong_data['info_verification_id'] 	= $id;
					$ong_data['info_verf_type'] 		= 'crypto';
					$ong_data['created_by'] 			= $this->session->userdata('id');
					$ong_data['created_at'] 			= date("Y-m-d H:i:s");
					$insertedOng = $this->user_model->saveOng($ong_data);
					if($insertedOng) {
						$ongRelation['personal_data_id'] = $_SESSION['personal_data_id'];
						$ongRelation['info_verification_type'] = 'crypto';
						$ongRelation['info_verification_id'] = $id;
						$ongRelation['ong_id'] = $insertedOng;
						$this->user_model->saveOngRelation($ongRelation);
					}
				}
				else {
					// dd("else");
					$ongRelation['personal_data_id'] = $_SESSION['personal_data_id'];
					$ongRelation['info_verification_type'] = 'crypto';
					$ongRelation['info_verification_id'] = $id;
					$ongRelation['ong_id'] = $data['ong_id'];

					$myOng = $this->user_model->fetchMyOng(['personal_data_id' => $ongRelation['personal_data_id'], 'info_verification_id' => $ongRelation['info_verification_id'], 'info_verf_type' => 'stocks']);
					if(!empty($myOng)) {
						$ongRelation['id'] = $myOng['id'];
						$this->user_model->saveOngRelation($ongRelation);						
					}
					else {
						$this->user_model->saveOngRelation($ongRelation);
					}
				}
			}

			$step = $this->completeThisStep($dataToUpdate['personal_data_id'], 3, 'crypto');

			if ($this->user_model->stepThreeCompleted($dataToUpdate['personal_data_id'], $step)) 
			{
				$this->session->set_flashdata('success', 'Information verification updated.');
				echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
				die;
			}
		}
		else{
			$this->session->set_flashdata('error', 'Unable to update your data.');
			echo "<script>window.location.href='" . base_url('user/cryptoVerification') . "';</script>";
			die;
		}
	}

	public function processStocks()
	{
		$stocks = $this->input->post();
		if($this->db->insert_batch('stocks_income_type', $stocks['data'])){
			$personal_data_id = $_SESSION['personal_data_id'];
			$type = 'stocks';
			$stepData = $this->completeThisStep($personal_data_id, 2, $type);
			
			if ($this->user_model->stepTwoCompleted($personal_data_id, $stepData)) {
				return true;
			} else {
				return false;
			}
		}
		return false;
	}

	public function processDividents()
	{
		$stocks = $this->input->post();
		if($this->db->insert_batch('divident_income_type', $stocks['data'])){
			$personal_data_id = $_SESSION['personal_data_id'];
			$type = 'divident';
			$stepData = $this->completeThisStep($personal_data_id, 2, $type);
			
			if ($this->user_model->stepTwoCompleted($personal_data_id, $stepData)) {
				return true;
			} else {
				return false;
			}
		}
		return false;
	}

	function showPdf(){
		$this->load->view('user/layout/header');
		$this->load->view('user/pdfPreview');
		$this->load->view('user/layout/footer');
	}

	/**
	 * -----------------------------------
	 *  Check for rental steps completed
	 * -----------------------------------
	 */
	public function checkSteps($steps)
	{
		$steps = json_decode($steps);
		if ($steps->step1 == 1) {
			// echo "step1 completed";die;
			if ($steps->step2->rental == 1) {
				// echo "step2 completed";die;
				if ($steps->step3->rental == 1) {
					// echo "step3 completed";die;
					if ($steps->step4 == 1) {
						// echo "step4 completed";die;
						$stepsCompleted = 4;
					} elseif ($steps->step4 == 0) {
						// echo "step3 completed";die;
						$stepsCompleted = 3;
					}
				} elseif ($steps->step3->rental == 0) {
					$stepsCompleted = 2;
				}
			} elseif ($steps->step2->rental == 0) {
				$stepsCompleted = 1;
			}
		}

		return $stepsCompleted;
	}

	/**
	 * ----------------------------------------
	 *  Check Hotel Income steps completed
	 * ----------------------------------------
	 */
	public function checkHotelSteps($steps)
	{
		$steps = json_decode($steps);
		if ($steps->step1 == 1) {
			// echo "step1 completed";die;
			if ($steps->step2->hotel == 1) {
				// echo "step2 completed";die;
				if ($steps->step3->hotel == 1) {
					// echo "step3 completed";die;
					if ($steps->step4 == 1) {
						// echo "step4 completed";die;
						$stepsCompleted = 4;
					} elseif ($steps->step4 == 0) {
						// echo "step3 completed";die;
						$stepsCompleted = 3;
					}
				} elseif ($steps->step3->hotel == 0) {
					$stepsCompleted = 2;
				}
			} elseif ($steps->step2->hotel == 0) {
				$stepsCompleted = 1;
			}
		}

		return $stepsCompleted;
	}

	/**
	 * ----------------------------------------
	 *  Check Dividents Income steps completed
	 * ----------------------------------------
	 */
	public function checkDividentSteps($steps)
	{
		$steps = json_decode($steps);
		// $this->dd($steps);
		if ($steps->step1 == 1) {
			// echo "step1 completed";die;
			if ($steps->step2->divident == 1) {
				// echo "step2 completed";die;
				if ($steps->step3->divident == 1) {
					// echo "step3 completed";die;
					if ($steps->step4 == 1) {
						// echo "step4 completed";die;
						$stepsCompleted = 4;
					} elseif ($steps->step4 == 0) {
						// echo "step3 completed";die;
						$stepsCompleted = 3;
					}
				} elseif ($steps->step3->divident == 0) {
					$stepsCompleted = 2;
				}
			} elseif ($steps->step2->divident == 0) {
				$stepsCompleted = 1;
			}
		}

		return $stepsCompleted;
	}

	/**
	 * ----------------------------------------
	 *  Check Dividents Income steps completed
	 * ----------------------------------------
	 */
	public function checkStockSteps($steps)
	{
		$steps = json_decode($steps);
		// $this->dd($steps);
		if ($steps->step1 == 1) {
			// echo "step1 completed";die;
			if ($steps->step2->stocks == 1) {
				// echo "step2 completed";die;
				if ($steps->step3->stocks == 1) {
					// echo "step3 completed";die;
					if ($steps->step4 == 1) {
						// echo "step4 completed";die;
						$stepsCompleted = 4;
					} elseif ($steps->step4 == 0) {
						// echo "step3 completed";die;
						$stepsCompleted = 3;
					}
				} elseif ($steps->step3->stocks == 0) {
					$stepsCompleted = 2;
				}
			} elseif ($steps->step2->stocks == 0) {
				$stepsCompleted = 1;
			}
		}

		return $stepsCompleted;
	}

	/**
	 * ----------------------------------------
	 *  Check Dividents Income steps completed
	 * ----------------------------------------
	 */
	public function checkCryptoSteps($steps)
	{
		$steps = json_decode($steps);
		// $this->dd($steps);
		if ($steps->step1 == 1) {
			// echo "step1 completed";die;
			if ($steps->step2->crypto == 1) {
				// echo "step2 completed";die;
				if ($steps->step3->crypto == 1) {
					// echo "step3 completed";die;
					if ($steps->step4 == 1) {
						// echo "step4 completed";die;
						$stepsCompleted = 4;
					} elseif ($steps->step4 == 0) {
						// echo "step3 completed";die;
						$stepsCompleted = 3;
					}
				} elseif ($steps->step3->crypto == 0) {
					$stepsCompleted = 2;
				}
			} elseif ($steps->step2->crypto == 0) {
				$stepsCompleted = 1;
			}
		}

		return $stepsCompleted;
	}

	/**
	 * -----------------------------------
	 * 	Complete this step
	 * -----------------------------------
	 */
	public function completeThisStep($personal_data_id, int $step, string $type = '')
	{
		$data = $this->user_model->fetchStepCompleted($personal_data_id);
		$stepsData = $data['steps_completed'];
		// $this->dd($stepsData);
		if ($stepsData == 0) {
			$stepsData = [];
			$stepsData['step1'] = 1;
			$stepsData['step2'] = [
				'rental' => 0,
				'hotel' => 0,
				'stocks' => 0,
				'divident' => 0,
				'crypto' => 0,
			];
			$stepsData['step3'] = [
				'rental' => 0,
				'hotel' => 0,
				'stocks' => 0,
				'divident' => 0,
				'crypto' => 0,
			];
			$stepsData['step4'] = 0;
		} elseif($step == 4) {
			$stepsData = json_decode($stepsData);
			$stepName = 'step' . $step;
			$stepsData->$stepName = 1;
		} else {
			$stepsData = json_decode($stepsData);
			$stepName = 'step' . $step;
			$stepsData->$stepName->$type = 1;
		}


		return json_encode($stepsData);
	}

	function uploadxlsxDoc()
	{
		// echo "upload";die;

		$uploadPath = './upload/imports/';
		if (!is_dir($uploadPath)) {
			mkdir($uploadPath, 0777, TRUE); // FOR CREATING DIRECTORY IF ITS NOT EXIST
		}

		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'csv|xlsx|xls';
		$config['max_size'] = 1000000000000000000000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('upload_excel')) {
			$fileData = $this->upload->data();
			return $fileData['file_name'];
		} else {
			// $this->dd($this->upload->display_errors());
			return false;
		}
	}

	function processXml(){
		if (isset($_FILES['doc']) && ($_FILES['doc']['error'] == UPLOAD_ERR_OK)) {
			$xml = simplexml_load_file($_FILES['doc']['tmp_name']);                        
			// $this->dd($xml);
			echo json_encode($xml);
		}
	}

	public function getDownloadLink() {
		$this->user_auth();

		$links = [];

		$payload = $this->generatePDFParams('212');
		$payload['doc_type'] = '212';
		$response = $this->fetchPDFLink(json_encode($payload));
		if ($response['success'] && !empty($response['pdf_link'])) {
			array_push($links, $response['pdf_link']);
		}
		if ($response['success'] && !empty($response['invoice_link'])) {
			array_push($links, $response['invoice_link']);
		}

		$is168 = $this->check168DocType();
		if ($is168) {
			$payload_168 = $this->generatePDFParams('168');
			$payload_168['doc_type'] = '168';
			$response = $this->fetchPDFLink(json_encode($payload_168));
			if ($response['success'] && !empty($response['pdf_link'])) {
				array_push($links, $response['pdf_link']);
			}
		}

		if (empty($links)) {
			echo json_encode([
				'success' => false,
				'params' => $payload,
				'params1' => $payload_168,
				'message' => $response['message'],
			]);
		} else {
			echo json_encode([
				'success' => true,
				'params' => $payload,
				'params1' => $payload_168,
				'links' => $links,
			]);
		}
	}

	private function fetchPDFLink($payload) {
		log_message('error', 'params: ' . $payload);
		$url = 'http://89.117.54.26/api/documents/generate';
//		$url = 'http://localhost:8000/api/documents/generate';
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ( $status != 201 && $status != 200 ) {
			$error = "Error: call to URL $url failed with status $status, response $result, curl_error " . curl_error($ch) . ", curl_errno " . curl_errno($ch);
			return [
				'success' => false,
				'message' => "Can not generate PDF. " . $error,
				'error' => $error,
			];
		}
		curl_close($ch);
		return json_decode($result, true);
	}

	private function generatePDFParams($doc_type)
	{
		$apiParams =  [];
		$pdfParams = [];
		$xmlParams = [];
		$invoiceParams = [];

		$mapping_rules = $this->admin_model->getMappingRulesByDocType($doc_type);
		if (!empty($mapping_rules)) {
			foreach ($mapping_rules as $key => $value) {
				$param = [];
				if ($mapping_rules[$key]['rule_type'] == 'pdf') {
					if ($mapping_rules[$key]['component'] == 'button') {
						$param = $this->generateButtonParams($mapping_rules[$key]);
					} else if ($mapping_rules[$key]['component'] == 'checkbox') {
						$param = $this->generateCheckboxParams($mapping_rules[$key]);
					}
					if (!empty($param)) {
						array_push($pdfParams, $param);
					}
				} else if ($mapping_rules[$key]['rule_type'] == 'xml') {
					$param = $this->generateXMLParams($mapping_rules[$key]);
					if (!empty($param)) {
						array_push($xmlParams, $param);
					}
				} else if ($mapping_rules[$key]['rule_type'] == 'invoice') {
					$param = $this->generateInvoiceParams($mapping_rules[$key]);
					$invoiceParams = array_merge($invoiceParams, $param);
				}
			}
		}

		$apiParams['pdfs'] = $pdfParams;
		$apiParams['xmls'] = $xmlParams;
//		if ($doc_type == 212) {
			$apiParams['invoice'] = (object)$invoiceParams;
//		}

		return $apiParams;
	}

	private function check168DocType() {
		$personal_data_id = $this->session->userdata('personal_data_id');
		$count = 0;
		$query = $this->db
			->select('count(*) AS cnt')
			->where("personal_data_id=" . $personal_data_id)
			->group_by('personal_data_id')
			->get('rent_income_type', 1);
		$result = $query->row_array();
		if (isset($result['cnt']) && !empty($result['cnt'])) {
			$count = (int)$result['cnt'];
		}
		if ($count > 0) {
			return true;
		}

		return false;
	}

	private function generateButtonParams($rule) {
		$minMatchingCount = $this->checkConditions($rule);
		if ($minMatchingCount == 0) {
			return [];
		}

		$params = [];

		$pdf_rule_paths = $this->admin_model->fetchPathsByRuleId($rule['id']);
		foreach ($pdf_rule_paths as $key => $path) {
			$params = array_merge(
				$params,
				array(
					'path' => $path['pdf_field_path'],
					'type' => 'button',
					'times' => $minMatchingCount.''
				)
			);
		}
		return $params;
	}

	private function generateCheckboxParams($rule) {
		$minMatchingCount = $this->checkConditions($rule);
		if ($minMatchingCount == 0) {
			return [];
		}

		$params = [];

		$pdf_rule_paths = $this->admin_model->fetchPathsByRuleId($rule['id']);
		foreach ($pdf_rule_paths as $key => $path) {
			$params = array_merge(
				$params,
				array(
					'path' => $path['pdf_field_path'],
					'type' => 'checkbox',
				)
			);
		}
		return $params;
	}

	private function generateXMLParams($rule) {
		$minMatchingCount = $this->checkConditions($rule);
		if ($minMatchingCount == 0) {
			return [];
		}

		$value = '';
		if ($rule['action_type'] == 'copy') {
			$value = $this->getDataSourceValue($rule['field_mappings_ids']);
		} else if ($rule['action_type'] == 'concat') {
			$ids = explode(",", $rule['field_mappings_ids']);
			foreach ($ids as $id) {
				$ret = $this->getDataSourceValue($id);
				if (isset($ret)) {
					$value = (empty($value) ? '' : ' ') . $ret;
				}
			}
		} else if ($rule['action_type'] == 'value') {
			$pdf_rule_paths = $this->admin_model->fetchPathsByRuleId($rule['id']);
			if (!empty($pdf_rule_paths)) {
				$value = $pdf_rule_paths[0]['value'];
			}
		}

		$params = [];

		$pdf_rule_paths = $this->admin_model->fetchPathsByRuleId($rule['id']);
		foreach ($pdf_rule_paths as $key => $path) {
			$params = array_merge(
				$params,
				array(
					'path' => $path['pdf_field_path'],
					'type' => $rule['component'],
					'value' => $value
				)
			);
		}
		return $params;
	}

	private function generateInvoiceParams($rule) {
		$value = $this->getDataSourceValue($rule['field_mappings_ids']);

		$params = [];

		$pdf_rule_paths = $this->admin_model->fetchPathsByRuleId($rule['id']);
		foreach ($pdf_rule_paths as $key => $path) {
			$params = array_merge(
				$params,
				array(
					$path['pdf_field_path'] => $value,
				)
			);
		}
		return $params;
	}

	private function checkConditions($rule) {
		$minMatchingCount = 0;

		$personal_data_id = $this->session->userdata('personal_data_id');
		$rule_conditions = $this->admin_model->fetchConditionsByRuleId($rule['id']);
		if (empty($rule_conditions)) {
			return 1;
		}

		$matching_exists = false;
		$any_condition_type_exists = false;
		foreach ($rule_conditions as $condition) {
			$fieldMapping = $this->admin_model->fetchMappingById($condition['field_mappings_id']);
			if (empty($fieldMapping) && $condition['matching_mode'] == 'all') {
				return 0;
			}

			$tablecolumns = explode(".", $fieldMapping['data_source']);
			if (count($tablecolumns) < 2 && $condition['matching_mode'] == 'all') {
				return 0;
			}


			$this->db->select("count(*) AS cnt");
			if ($tablecolumns[0] == 'personal_data') {
			    $this->db->where("id=" . $personal_data_id);
			} else {	
     			    $this->db->where("personal_data_id=" . $personal_data_id);
			}
			if ($condition['function'] == 'is') {
				$this->db->where($tablecolumns[1] . '=\'' . $condition['value'] . '\'');
			} else if ($condition['function'] == 'is not') {
				$this->db->where($tablecolumns[1] . '<>\'' . $condition['value'] . '\'');
			} else if ($condition['function'] == 'equals or greater than') {
				$this->db->where("CONCAT(`$tablecolumns[1]`, '')" . ' >= ' . $condition['value']);
			} else if ($condition['function'] == 'equals or less than') {
				$this->db->where("CONCAT(`$tablecolumns[1]`, '')" . ' <= ' . $condition['value']);
			} else if ($condition['function'] == 'greater than') {
				$this->db->where("CONCAT(`$tablecolumns[1]`, '')" . ' > ' . $condition['value']);
			} else if ($condition['function'] == 'less than') {
				$this->db->where("CONCAT(`$tablecolumns[1]`, '')" . ' < ' . $condition['value']);
			} else if ($condition['function'] == 'contains') {
				$this->db->where($tablecolumns[1] . ' LIKE \'%' . $condition['value']) . '%\'';
			} else if ($condition['function'] == 'does not contain') {
				$this->db->where($tablecolumns[1] . ' NOT LIKE \'%' . $condition['value']) . '%\'';
			}
			if ($tablecolumns[0] == 'personal_data') {
			    $this->db->group_by("personal_data.id");
			} else {	
     			    $this->db->group_by("personal_data_id");
			}
			$query = $this->db->get($tablecolumns[0], 1);
			$result = $query->row_array();
			$count = 0;
			if (isset($result['cnt']) && !empty($result['cnt'])) {
				$count = (int)$result['cnt'];
				if ($rule['component'] == 'button') {
					if ($minMatchingCount > $count && $count > 0) {
						$minMatchingCount = $count;
					}
				} else {
					$minMatchingCount = $count;
				}
			}

			if ($count == 0 && $condition['matching_mode'] == 'all') {
				return 0;
			}
			if ($condition['matching_mode'] == 'any') {
				if ($count > 0) {
					$matching_exists = true;
				}
				$any_condition_type_exists = true;
			}
		}

		if ($any_condition_type_exists && !$matching_exists) {
			return 0;
		}

		return $minMatchingCount;
	}

	private function getDataSourceValue($field_mappings_id) {
		$value = null;
		$personal_data_id = $this->session->userdata('personal_data_id');

		$fieldMapping = $this->admin_model->fetchMappingById($field_mappings_id);
		if (!empty($fieldMapping)) {
			$tablecolumns = explode(".", $fieldMapping['data_source']);
			if (count($tablecolumns) > 1) {
				if ($tablecolumns[0] == 'personal_data') {
					$query = $this->db->query('SELECT * FROM '.$tablecolumns[0].' WHERE id='.$personal_data_id);
				} else {
					$query = $this->db->query('SELECT * FROM '.$tablecolumns[0].' WHERE personal_data_id='.$personal_data_id);
				}
				$data = $query->row_array();
				if (isset($data)) {
					$value = $data[$tablecolumns[1]];
				}
			}
		}

		return $value;
	}
}
