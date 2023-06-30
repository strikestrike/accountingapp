<?php
date_default_timezone_set('Asia/Kolkata');
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
		$this->load->helper('download');
		$this->load->library('Email');
		$this->load->helper('calculation');
		// $this->load->model('Admin_model');
		force_download('/path/to/pdf.pdf', NULL);
	}

	public static function getInstance()
	{
		return new Admin();
	}

	//check admin auth
	public function admin_auth()
	{
		// dd($_SESSION);
		if (isset($_SESSION['role'])) {
			if ($_SESSION['role'] == 1) {
			}
			if($_SESSION['role'] == 2) {
					$this->session->set_flashdata('logError', '<div class="alert alert-danger" style="color:black"><strong></strong>You are not authorized to access this!</div>');
					echo "<script>window.location.href='" . base_url('admin/login') . "';</script>";
					die;
			}
		} else {
			$this->session->set_flashdata('logError', '<div class="alert alert-danger" style="color:black"><strong></strong>You are not logged in. Please login to access this!</div>');
			echo "<script>window.location.href='" . base_url('admin/login') . "';</script>";
			die;
		}
	}

	// admin login functionality
	public function login()
	{
		$data = array();
		$this->session->keep_flashdata('redirect_url');
		if ($this->input->post('login')) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('logError', '<div class="alert alert-danger" style="color:black"><strong> </strong>' . validation_errors() . '</div>');
			} else {
				$email = $this->input->post('email');
				$pass = $this->input->post('password');
				$encode = hash('md5', $pass);
				$result = $this->admin_model->get_admin_login_detail(['email' => $email, 'password' => $encode]);
				// echo "<pre>";print_r($result);die;
				if (!empty($result)) {
					$this->session->set_userdata($result[0]);
					echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
					die;
				} else {
					$this->session->set_flashdata('logError', '<div class="alert alert-danger" style="color:black"><strong></strong>Invalid Email or Password. Please try again</div>');
					echo "<script>window.location.href='" . base_url('admin/login') . "';</script>";
					die;
				}
			}
		}
		$this->load->view('admin/auth/header');
		$this->load->view('admin/auth/login', $data);
		$this->load->view('admin/auth/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('uid');
		$this->session->sess_destroy();
		// redirect();
		echo "<script>window.location.href='" . base_url() . "admin';</script>";
		die;
	}

	//admin forgot password functionlity
	public function forgot_password()
	{
		// echo "admin forgot password";die;
		$this->load->view('admin/auth/header');
		$this->load->view('admin/auth/forgot');
		$this->load->view('admin/auth/footer');
	}

	/**
	 * --------------------------------
	 * 	Forget password
	 * --------------------------------
	 *  admin submits form after entering email
	 * @request POST
	 */
	public function forgetPassword()
	{
		$email = $this->input->post('email');

		$result = $this->db->query("select * from admins where email ='" . $email . "'")->row_array();
		// $this->dd($result);
		if (!empty($result)) {

			$reset_code = $this->generateResetCode();
			$info['reset_code'] = $reset_code;
			$info['reset_code_expire'] = date("Y-m-d H:i:s", strtotime("+1 hours"));

			$message = "Please click on the given link to reset your password " . base_url('admin/reset_password?token=') . $reset_code . "\nThis link will be valid for one hour.";

			if ($this->admin_model->putresetcode($email, $info)) {
				if ($this->Email($email, 'Reset Password Link', $message)) {
					$this->session->set_flashdata('msg-success', 'Please check your email to reset your password.');
					$this->load->view('admin/auth/header');
					$this->load->view('admin/auth/forgot');
					$this->load->view('admin/auth/footer');
				}
			}
		} else {
			$this->session->set_flashdata('msg', 'Email not registered.');
			$this->load->view('admin/auth/header');
			$this->load->view('admin/auth/forgot');
			$this->load->view('admin/auth/footer');
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
	 * ----------------------------------
	 * 	send mail 
	 * ----------------------------------
	 */
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
	 * --------------------------------
	 * 	Reset password
	 * --------------------------------
	 * 	renders reset password form if the reset code matches 
	 *  @request GET
	 */
	public function reset_password()
	{
		$reset_code = $this->input->get('token');
		$adminInfoFromDb = $this->admin_model->getAdminInfoByResetCode($reset_code);
		$data['user'] = $adminInfoFromDb;

		if (strtotime($adminInfoFromDb['reset_code_expire']) > strtotime(date("Y-m-d H:i:s"))) {
			$this->load->view('admin/auth/reset_password', $data);
		} else {
			$this->session->set_flashdata('msg', 'Link Expired, try again for new link.');
			echo "<script>window.location.href='" . base_url() . "admin/forget_password';</script>";
			die;
		}
	}

	/**
	 * --------------------------------
	 * 	Reset password
	 * --------------------------------
	 * 	admin submits form after filling new password form
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
			echo "<script>window.location.href='" . base_url() . "admin/reset_password?token=" . $token . "';</script>";
			die;
		} else {
			$new_password = hash('md5', $this->input->post('new_password'));
			if ($this->admin_model->reset_password($uid, $new_password)) {
				$this->session->set_flashdata('success', "Your password has been changed, now login.");
				echo "<script>window.location.href='" . base_url() . "admin';</script>";
				die;
			}
		}
	}

	//admin system configuration functionality
	public function system_configration()
	{
		$this->admin_auth();
		$data['rates'] = $this->admin_model->getAllAnnualExchangeRate();
		$data['currencies'] = $this->admin_model->getAllCurrency();
		$data['minimum_wages'] = $this->admin_model->getAllMinimumWages();
		// echo "<pre>";
		// print_r(json_encode($data));
		// die;
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/system_configration', $data);
		$this->load->view('admin/layout/footer1');
	}

	public function create_user()
	{
		$cond = array();
		$data['personal_data_list'] = array_reverse($this->db->get_where('personal_data', $cond)->result_array());
		$this->load->view('admin/layout/header');
		$this->load->view('admin/create_user', $data);
		$this->load->view('admin/layout/footer');
	}


	/**
	 * Admin Pricing
	 * 
	 * @desc renders admin pricing page  
	 */

	public function pricing()
	{
		$data['rental'] = $this->admin_model->getAllRental();
		$data['divident'] = $this->admin_model->getAllData('master_pricing_dividents');
		$data['stock'] = $this->admin_model->getAllData('master_pricing_stocks');
		$data['crypto'] = $this->admin_model->getAllData('master_pricing_cryptos');
		$data['rentalRegim'] = $this->admin_model->getAllData('master_pricing_rental_regimes');
		$this->admin_auth();
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/admin_pricing', $data);
		$this->load->view('admin/layout/footer1');
	}

	/**
	 * Admin ONG
	 * 
	 * @desc renders admin ONG page
	 */

	public function ong()
	{
		$this->admin_auth();
		$data['ongList'] = $this->admin_model->getAllData('ong_lists');
		// $this->dd($data);
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/admin_ong', $data);
		$this->load->view('admin/layout/footer1');
	}

	public function fetchOngById($id)
	{
		$this->admin_auth();
		$ongData = $this->admin_model->fetchOngById($id);
		// dd($ongData);
		if ($ongData)
			echo json_encode($ongData);
		return null;
	}

	public function updateOng()
	{
		$data = $this->input->post();
		// dd($data);
		$id = $data['id'];
		$config = [
			[
				'field' => 'ong_name',
				'label' => 'ONG Name',
				'rules' => 'required|trim'
			],
			[
				'field' => 'ong_registration_number',
				'label' => 'ONG Bank Account',
				'rules' => 'required|trim'
			],
			[
				'field' => 'ong_bank_account',
				'label' => 'ONG Bank Account',
				'rules' => 'required|trim'
			],
		];
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Check your data');
			echo "<script>window.location.href='" . base_url('admin/ong') . "';</script>";
			die;
		} else {
			$updated = $this->admin_model->update_ong($id, $data);
			if ($updated) {
				$this->session->set_flashdata('success', 'Information updated successfully!');
				echo "<script>window.location.href='" . base_url('admin/ong') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Something went wrong!');
				echo "<script>window.location.href='" . base_url('admin/ong') . "';</script>";
				die;
			}
		}
	}

	public function updateOngApprove()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('value');
		echo $this->admin_model->approveOng($id, $status);
	}

	public function deleteOngById()
	{
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			if ($this->admin_model->deleteDataById('ong_lists', $id))
				return true;
			return false;
		}
	}

	public function bnrExchangeRate()
	{
		$this->admin_auth();
		$data['bnrlist'] = $this->admin_model->getAllBnrData();
		// $this->dd($data);
		$this->load->view('admin/layout/header');
		$this->load->view('admin/bnrExchangeRate', $data);
		$this->load->view('admin/layout/footer');
	}

	public function getBNRById()
	{
		$id = $this->input->post('id');
		$id = (int)$id;
		$data['BNR'] = $this->admin_model->fetchBnrById($id);
		echo json_encode($data['BNR']);
	}

	public function editBNR()
	{
		$data = $this->input->post();

		$id = $this->input->post('id');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$config = [
			[
				'field' => 'date',
				'label' => 'Date',
				'rules' => 'required|trim'
			],
			[
				'field' => 'rate_bnr_usd',
				'label' => 'Rate BNR USD',
				'rules' => 'required|trim'
			],
			[
				'field' => 'rate_bnr_euro',
				'label' => 'Rate BNR EURO',
				'rules' => 'required|trim'
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
			// echo validation_errors();
			// die;
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/bnrExchangeRate') . "';</script>";
			die;
		} else {
			// echo "validated";
			// die;
			$updata['date'] = $this->input->post('date');
			$updata['rate_bnr_usd'] = $this->input->post('rate_bnr_usd');
			$updata['rate_bnr_euro'] = $this->input->post('rate_bnr_euro');


			if ($this->admin_model->updateBNR($id, $updata)) {
			}
			$this->session->set_flashdata('success', 'Record has been updated successfully!!');
			echo "<script>window.location.href='" . base_url('admin/bnrExchangeRate') . "';</script>";
			die;
		}
	}

	public function deleteBNRById()
	{
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			if ($this->admin_model->deleteBNRById($id))
				return true;
			return false;
		}
	}

	/**
	 * Admin Client list
	 * 
	 * @desc renders admin clients list
	 */

	public function client()
	{
		$this->admin_auth();
		$data['clients'] = $this->admin_model->fetchClients();
		$this->load->view('admin/layout/header1');
		$this->load->view('admin/admin_client', $data);
		$this->load->view('admin/layout/footer1');
	}

	public function clientDeclarationData($id)
	{
		$this->admin_auth();

		$data['personalData'] = $this->user_model->getPersonalDataById($id);

		$this->session->set_userdata(['client_id' => $id]);
		/**
		 * here $id is client_id or personal data id
		 */
		$rentIncome = $this->admin_model->fetchClientRentIncome($id);
		$hotelIncome = $this->admin_model->fetchClientHotelIncome($id);
		$stocksIncome = $this->user_model->fetchStocksWithCountry($id);
		$cryptoIncome = $this->admin_model->fetchCryptoIncome($id);
		$dividentIncome = $this->admin_model->fetchDividentIncome($id);

		if ($rentIncome)
			$data['rent_income'] = $rentIncome;
		if ($hotelIncome)
			$data['hotel_income'] = $hotelIncome;
		if ($stocksIncome)
			$data['stocks_income'] = $stocksIncome;
		if ($cryptoIncome)
			$data['crypto_income'] = $cryptoIncome;
		if ($dividentIncome)
			$data['divident_income'] = $dividentIncome;


		$this->load->view('admin/layout/header');
		$this->load->view('admin/client_declaration_data', $data);
		$this->load->view('admin/layout/footer');
	}

	public function clientRentIncome($client_id)
	{
		// $data['rent_income_id'] = $this->admin_model->fetchClientRentIncome($id);

		// $personalDataId = $this->session->userdata('personal_data_id');
		$data['personalData'] = $this->user_model->getPersonalDataById($client_id);

		$data['rentIncomePrice'] = $this->user_model->fetchRentIncomeModulesPrice();
		$data['rentIncome'] = $this->admin_model->fetchClientRentIncome($client_id);
		$this->load->view('admin/layout/header');
		$this->load->view('admin/client_rent_income', $data);
		$this->load->view('admin/layout/footer');
	}

	public function updateClientRentIncome()
	{
		$data = $this->input->post();

		// $this->dd($data);
		$income_type_data = [];
		$updateIncomeRow = [];
		foreach ($data['income_type'] as $d) {
			// $this->dd($d);
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
		// $this->db->update_batch('rent_income_type', $income_type_data, 'id')
		if ($this->admin_model->updateClientRentIncome($income_type_data)) {

			// echo "updated";die;

			$personal_data_id = $data['income_type'][0]['personal_data_id'];
			// $finalCostData['user_id'] = $_SESSION['id'];
			$price = $data['cost_final'];
			// $finalCostData['created_at'] = date('Y-m-d H:i:s');
			if (!empty($price)) {
				if ($this->calculateFinalPrice($personal_data_id, $price)) {
					// echo "Inserted";
					$this->session->set_flashdata('success', 'Record updated Successfully.');
					echo "<script>window.location.href='" . base_url('admin/clientRentIncome/' . $data['income_type'][0]['personal_data_id']) . "';</script>";
					die;
				}
			}
			$this->session->set_flashdata('success', 'Record updated Successfully.');
			echo "<script>window.location.href='" . base_url('admin/clientRentVerification/' . $data['income_type'][0]['personal_data_id']) . "';</script>";
			die;
		} else {
			// echo "failed";die;
			$this->session->set_flashdata('error', 'Failed to update record.');
			echo "<script>window.location.href='" . base_url('admin/clientRentIncome/' . $data['income_type'][0]['personal_data_id']) . "';</script>";
			die;
		}
	}

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

	public function clientRentVerification($client_id)
	{
		$this->admin_auth();
		// $id = $this->session->userdata('id');
		$personalDataId = $client_id;

		// $this->dd($_SESSION);

		$data['rentIncome'] = $this->admin_model->fetchClientRentIncome($personalDataId);
		// $this->dd($data);

		$verificationData['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		// $this->dd($verificationData);
		$steps = $verificationData['personalData']['steps_completed'];
		// $stepsCompleted = $this->checkSteps($steps);
		// $verificationData['personalData']['steps_completed'] = $stepsCompleted;
		// $this->dd($stepsCompleted);


		if (!empty($verificationData['personalData'])) {
			// if ($verificationData['personalData']['steps_completed'] == 2) {

			$existing_verf_data = $this->admin_model->fetchClientRentVerification($personalDataId);

			if (!empty($existing_verf_data)) {
				// $this->dd($existing_verf_data);
				$verificationData['existing_data'] = $existing_verf_data[0];
			}
			$verificationData['income2021'] = $this->getIncome2021($data);
			$verificationData['income2022'] = $this->getIncome2022($data);
			// $this->dd($verificationData);
			$this->load->view('admin/layout/header');
			$this->load->view('admin/client_rent_verification', $verificationData);
			$this->load->view('admin/layout/footer');
			// } elseif ($verificationData['personalData']['steps_completed'] == 3) {
			// $this->session->set_flashdata('step-error', 'Rental Information verification completed. Add more income type or proceed to payment.');
			// echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
			// die;
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


			if ($dataForCalculation['currency'] == 'EUR') {
				$income = calculateIncome2021($dataForCalculation);
				$previous_year = date("Y", strtotime("-1 year"));
				$annualExchangeRate = $this->admin_model->fetchAnnualExchangeRate($dataForCalculation['currency'], $previous_year);
				if ($annualExchangeRate == false) {
					$error = "Annual exchange rate not found for for the year " . getDMY('y', $dataForCalculation['contract_end_date']) . " to calculate net income.";
					array_push($errors, $error);
				}
				// $this->dd($annualExchangeRate);
				if (count($errors) == 0) {
					$netIncome = round($annualExchangeRate[0]['value'] * $income);
					array_push($netIncomeData, $netIncome);

					$taxableIncome = round($netIncome * 0.6);
					array_push($taxableIncomeData, $taxableIncome);

					$tax = round($taxableIncome * 0.1);
					array_push($taxData, $tax);
				} else {
					$this->session->set_flashdata('error', 'Rental Information verification could not be completed. No annual exchange rate found.');
					echo "<script>window.location.href='" . base_url('user/rentalIncome') . "';</script>";
					die;
				}
			} else {
				$error = "The currency for " . $value['rented_space_address'] . " rental space address has currency RON therefore it is not calculated.";
			}
		}


		$calculatedData['netIncome'] 		= array_sum($netIncomeData);
		$calculatedData['taxableIncome'] 	= array_sum($taxableIncomeData);
		$calculatedData['tax'] 				= array_sum($taxData);

		$minWagePreviousYear = $this->user_model->getMinWageForPreviousYear();

		if ($oblcass_est_total != 0 && $oblcass_est_total == ($minWagePreviousYear['value'] * 12 * 0.1)) {
			$calculatedData['to_be_paid_health_tax'] = $oblcass_est_total;
			$calculatedData['to_be_paid_tax'] = $calculatedData['to_be_paid_health_tax'];
		} elseif ($oblcass_est_total != 0 && $oblcass_est_total < ($minWagePreviousYear['value'] * 12 * 0.1)) {
			$calculatedData['to_be_paid_health_tax'] = ($calculatedData['taxableIncome'] > (12 * $minWagePreviousYear['value'])) ? (12 * $minWagePreviousYear['value'] * 0.1) : $oblcass_est_total;
			$calculatedData['to_be_paid_tax'] = $calculatedData['to_be_paid_health_tax'];
		} elseif ($calculatedData['taxableIncome'] > 12 * $minWagePreviousYear['value']) {
			$calculatedData['to_be_paid_health_tax'] = 12 * $minWagePreviousYear['value'] * 0.1;
			$calculatedData['to_be_paid_tax'] = $calculatedData['to_be_paid_health_tax'];
		} elseif ($calculatedData['taxableIncome'] < 12 * $minWagePreviousYear['value']) {
			$calculatedData['to_be_paid_health_tax'] = 0;
			$calculatedData['to_be_paid_tax'] = $calculatedData['to_be_paid_health_tax'];
		}
		return $calculatedData;
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
			$dataForCalculation['contract_end_date']	= $value['contract_end_date'];


			$annualExchangeRate = $this->admin_model->fetchAnnualExchangeRate($dataForCalculation['currency'], getDMY('y', $dataForCalculation['contract_end_date']));
			if ($annualExchangeRate == false) {
				// echo "no rate found";die;
				$error = "Annual exchange rate not found for for the year " . getDMY('y', $dataForCalculation['contract_end_date']) . " to calculate net income.";
				array_push($errors, $error);
				continue;
			}
			// echo $annualExchangeRate[0]['value']; die;
			$netIncome = calculateIncome2022($dataForCalculation, $annualExchangeRate[0]['value']);

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
		// $this->dd($minWageCurrentYear['value'] * 12);

		$calculatedData['netIncome'] 		= array_sum($netIncomeData);
		$calculatedData['taxableIncome'] 	= array_sum($taxableIncomeData);
		$calculatedData['tax'] 				= array_sum($taxData);

		if ($calculatedData['taxableIncome'] > 12 * $minWageCurrentYear['value']) {
			// echo "taxableIncome greater than min wage current year";die;
			$calculatedData['health_insurance_tax'] = round(12 * $minWageCurrentYear['value'] * 0.1);
		} elseif ($calculatedData['taxableIncome'] < 12 * $minWageCurrentYear['value']) {
			// echo "taxableIncome lesser than min wage current year";die;
			$calculatedData['health_insurance_tax'] = round(12 * $minWageCurrentYear['value'] * 0.05);
			$calculatedData['selectYes'] = 1;
		}

		// $this->dd($calculatedData);
		return $calculatedData;
	}

	public function updateClientRentVerification()
	{
		$data = $this->input->post();
		// $this->dd($data);

		$dataToUpdate['id'] 						= $data['verf_id'];
		$dataToUpdate['personal_data_id'] 			= $data['personal_data']['id'];
		$dataToUpdate['net_income_2021'] 			= $data['net_income_2021'];
		$dataToUpdate['taxable_income_2021'] 		= $data['taxable_income_2021'];
		$dataToUpdate['tax_2021'] 					= $data['tax_2021'];
		$dataToUpdate['health_tax_to_be_paid_2022'] = $data['health_tax_to_be_paid_2022'];
		$dataToUpdate['tax_to_be_paid_2022'] 		= $data['tax_to_be_paid_2022'];
		$dataToUpdate['net_income_2022'] 			= $data['net_income_2022'];
		$dataToUpdate['taxable_income_2022'] 		= $data['taxable_income_2022'];
		$dataToUpdate['tax_2022'] 					= $data['tax_2022'];
		$dataToUpdate['total_health_income_2022'] 	= $data['total_health_income_2022'];
		$dataToUpdate['health_insurance_tax_2023'] 	= $data['health_insurance_tax_2023'];
		$dataToUpdate['need_health_insurance']		= $data['need_health_insurance'];

		if ($dataToUpdate['need_health_insurance'] == 1 && !empty($data['health_tax_2023'])) {
			$dataToUpdate['health_tax_2023'] = $data['health_tax_2023'];
		}

		// $this->dd($dataToUpdate);
		if ($this->db->replace('info_verification_rentals', $dataToUpdate)) {
			$this->session->set_flashdata('success', 'Record updated Successfully.');
			echo "<script>window.location.href='" . base_url('admin/clientRentVerification/' . $data['personal_data']['id']) . "';</script>";
			die;
		}
	}


	/**
	 * ------------------------------------------
	 * 	Client hotel income
	 * ------------------------------------------
	 */
	public function clientHotelIncome($client_id)
	{
		$this->admin_auth();
		$data['personalData'] = $this->user_model->getPersonalDataById($client_id);

		$data['rentIncomePrice'] = $this->user_model->fetchHotelIncomeModulesPrice();
		$data['rentIncome'] = $this->admin_model->fetchClientHotelIncome($client_id);

		$this->load->view('admin/layout/header');
		$this->load->view('admin/client_hotel_income', $data);
		$this->load->view('admin/layout/footer');
	}

	public function updateClientHotelIncome()
	{
		$data = $this->input->post();

		// $this->dd($data);
		$income_type_data = [];
		$updateIncomeRow = [];
		foreach ($data['income_type'] as $d) {
			// $this->dd($d);
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
		// $this->db->update_batch('rent_income_type', $income_type_data, 'id')
		if ($this->admin_model->updateClientHotelIncome($income_type_data)) {

			// echo "updated";die;

			$personal_data_id = $data['income_type'][0]['personal_data_id'];
			// $finalCostData['user_id'] = $_SESSION['id'];
			$price = $data['cost_final'];
			// $finalCostData['created_at'] = date('Y-m-d H:i:s');
			if (!empty($price)) {
				if ($this->calculateFinalPrice($personal_data_id, $price)) {
					// echo "Inserted";
					$this->session->set_flashdata('success', 'Record updated Successfully.');
					echo "<script>window.location.href='" . base_url('admin/clientHotelIncome/' . $data['income_type'][0]['personal_data_id']) . "';</script>";
					die;
				}
			}
			$this->session->set_flashdata('success', 'Record updated Successfully.');
			echo "<script>window.location.href='" . base_url('admin/clientHotelIncome/' . $data['income_type'][0]['personal_data_id']) . "';</script>";
			die;
		} else {
			// echo "failed";die;
			$this->session->set_flashdata('warning', 'No changes to update record.');
			echo "<script>window.location.href='" . base_url('admin/clientHotelIncome/' . $data['income_type'][0]['personal_data_id']) . "';</script>";
			die;
		}
	}

	public function clientHotelIncomeVerification($client_id)
	{
		$this->admin_auth();
		$id = $this->session->userdata('id');
		$personalDataId = $client_id;

		// $this->dd($_SESSION);

		$data['rentIncome'] = $this->admin_model->fetchClientHotelIncome($personalDataId);
		// $this->dd($data['rentIncome']);


		$verificationData['personalData'] = $this->user_model->getPersonalDataById($personalDataId);
		// $this->dd($verificationData['personalData']);
		// $steps = $verificationData['personalData']['steps_completed'];
		// $stepsCompleted = $this->checkHotelSteps($steps);
		// $verificationData['personalData']['steps_completed'] = $stepsCompleted;
		// $this->dd($stepsCompleted);




		if (!empty($verificationData['personalData'])) {

			$existing_verf_data = $this->admin_model->fetchClientHotelVerification($personalDataId);
			// $this->dd($existing_verf_data);

			if (!empty($existing_verf_data)) {
				$verificationData['existing_data'] = $existing_verf_data[0];
			}
			// $this->dd($verificationData['existing_data']);
			$verificationData['incomeData'] = $this->getHotelIncome2021and2022($data);

			$this->load->view('admin/layout/header');
			$this->load->view('admin/client_hotel_verification', $verificationData);
			$this->load->view('admin/layout/footer');
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
	 * @desc It is used to calculate "Product Name 2021 and 2022" 
	 * 		 Details on hotel rental verification 		 
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
	}

	public function updateClientHotelVerification()
	{
		$data = $this->input->post();
		// $this->dd($data);

		$dataToUpdate['id'] 						= $data['verf_id'];
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

		if ($dataToUpdate['need_health_insurance'] == 1 && !empty($data['income_estimation_2022'])) {
			$dataToUpdate['income_estimation_2022'] = $data['income_estimation_2022'];
			$dataToUpdate['health_insurance_tax_2022'] = $data['health_insurance_tax_2022'];
		}

		// $this->dd($dataToUpdate);
		if ($this->db->replace('info_verification_hotels', $dataToUpdate)) {
			$this->session->set_flashdata('success', 'Record updated Successfully.');
			echo "<script>window.location.href='" . base_url('admin/clientHotelIncomeVerification/' . $data['personal_data']['id']) . "';</script>";
			die;
		}
	}

	public function clientStocksIncomeVerification($client_id)
	{
		$this->admin_auth();
		$personalDataId = $client_id;

		$verificationData['personalData'] = $this->user_model->getPersonalDataById($personalDataId);

		// $this->dd($verificationData['personalData']);
		// $steps = $verificationData['personalData']['steps_completed'];
		// $stepsCompleted = $this->checkStockSteps($steps);
		// $verificationData['personalData']['steps_completed'] = $stepsCompleted;
		// $this->dd($stepsCompleted);


		if (!empty($verificationData['personalData'])) {
			// $this->dd($verificationData['personalData']);
			// if ($verificationData['personalData']['steps_completed'] == 1) 
			// {
			// 	// echo "step 1 of divident completed";die;
			// 	$this->load->view('user/layout/header');
			// 	$this->load->view('user/stocks_verification', $verificationData);
			// 	$this->load->view('user/layout/footer');
			// }

			$existing_verf_data = $this->admin_model->fetchClientStockVerification($personalDataId);

			// $this->dd($existing_verf_data);


			/* important code below for future reference
			*
			if($verificationData['personalData']['steps_completed'] == 2)
			{
				// echo "step 2 of divident completed";die;

				$stocksIncome = $this->user_model->fetchStocksWithCountry($personalDataId);
				

				$calculatedStocksList = $this->calculateListOfStocks($stocksIncome);
				// $this->dd($calculatedStocksList);

				$calculatedData2021 = $this->calculateStocks2021($calculatedStocksList);
				// $this->dd($calculatedData2021);

				$verificationData['calculatedDividentList'] = $calculatedStocksList;
				$verificationData['calculatedData2021'] = $calculatedData2021;

				$this->load->view('admin/layout/header');
				$this->load->view('admin/client_stocks_verification', $verificationData);
				$this->load->view('admin/layout/footer');
			}
			*/

			if (!empty($existing_verf_data)) {
				// $this->dd($existing_verf_data);
				$verificationData['existing_data'] = $existing_verf_data[0];

				//to fetch related ong data if added by user from frontend
				$arr = [
					'personal_data_id' 		=> $existing_verf_data[0]['personal_data_id'],
					'info_verification_id' 	=> $existing_verf_data[0]['id'],
					'info_verf_type' 		=> 'stocks',
				];
				$ong_data = $this->admin_model->getOngDataByVerification($arr);
				// $this->dd($ong_data);
				if (!empty($ong_data)) {
					$verificationData['ong_data'] = $ong_data;
				}
			}

			$stocksIncome = $this->user_model->fetchStocksWithCountry($personalDataId);


			$calculatedStocksList = $this->calculateListOfStocks($stocksIncome);
			// $this->dd($calculatedStocksList);

			$calculatedData2021 = $this->calculateStocks2021($calculatedStocksList);
			// $this->dd($calculatedData2021);

			$verificationData['calculatedDividentList'] = $calculatedStocksList;
			$verificationData['calculatedData2021'] = $calculatedData2021;

			$this->load->view('admin/layout/header');
			$this->load->view('admin/client_stocks_verification', $verificationData);
			$this->load->view('admin/layout/footer');
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
		if ($calculateStocks2021['toBePaidHealthTax2021'] == 0)
			$calculateStocks2021['toBePaidTax2021'] = 0;
		else
			$calculateStocks2021['toBePaidTax2021'] = round($tax);
		return $calculateStocks2021;
	}

	/***
	 * update/save client's stocks verification
	 */
	public function saveClientStocksVerification()
	{
		$data = $this->input->post();
		// $this->d($data);
		// $this->dd($data);
		$ong_data = [];
		if (!empty($data['verf_id'])) {
			$dataToUpdate['id'] = $data['verf_id'];
		}
		$dataToUpdate['personal_data_id'] 			= $data['personal_data']['id'];
		$dataToUpdate['income_2021'] 					= $data['income_2021'];
		$dataToUpdate['taxable_income_2021'] 			= $data['taxable_income_2021'];
		$dataToUpdate['tax_2021'] 					= $data['tax_2021'];
		$dataToUpdate['total_income_for_health_2021'] = $data['total_income_for_health_2021'];
		$dataToUpdate['health_insurance_tax_2021'] 	= $data['health_insurance_tax_2021'];
		$dataToUpdate['to_be_paid_health_tax_2021'] 	= $data['to_be_paid_health_tax_2021'];
		$dataToUpdate['to_be_paid_tax_2021'] 			= $data['to_be_paid_tax_2021'];
		$dataToUpdate['need_health_insurance'] 		= $data['need_health_insurance'];

		if (!empty($data['ong_question'])) {
			$dataToUpdate['ong_question'] = $data['ong_question'];
		}
		if (!empty($data['ong_name']) && !empty($data['ong_registration_number']) && !empty($data['ong_bank_account'])) {
			$ong_data['ong_name'] 					= $data['ong_name'];
			$ong_data['ong_registration_number'] 	= $data['ong_registration_number'];
			$ong_data['ong_bank_account'] 			= $data['ong_bank_account'];
		}

		if (!empty($data['income_2022']))
			$dataToUpdate['income_2022'] = $data['income_2022'];
		if (!empty($data['health_insurance_tax_2022']))
			$dataToUpdate['health_insurance_tax_2022'] = $data['health_insurance_tax_2022'];
		if (!empty($data['tax_2022']))
			$dataToUpdate['tax_2022'] = $data['tax_2022'];

		// $dataToUpdate['created_by'] = $this->session->userdata('id');
		// $dataToUpdate['created_at'] = date("Y-m-d H:i:s");

		// $this->dd($dataToUpdate);
		// $this->dd($ong_data);

		if (empty($data['verf_id'])) {
			// die('verfication id not found');
			$inserted_id = $this->user_model->saveStocksVerification($dataToUpdate);
			if ($inserted_id) {
				if (!empty($ong_data)) {
					$ong_data['personal_data_id'] 		= $data['personal_data']['id'];
					$ong_data['info_verification_id'] 	= $inserted_id;
					$ong_data['info_verf_type'] 		= 'stocks';
					$ong_data['created_by'] 			= $this->session->userdata('id');
					$ong_data['created_at'] 			= date("Y-m-d H:i:s");
					$this->user_model->saveOng($ong_data);
				}
				$step = $this->completeThisStep($dataToUpdate['personal_data_id'], 3, 'crypto');

				if ($this->user_model->stepThreeCompleted($dataToUpdate['personal_data_id'], $step)) {
					$this->session->set_flashdata('success', 'Record updated Successfully.');
					echo "<script>window.location.href='" . base_url('admin/clientStocksIncomeVerification/' . $data['personal_data']['id']) . "';</script>";
					die;
				}
			}
		} else {
			// die('here');
			if ($this->db->replace('info_verification_stocks', $dataToUpdate)) {
				if (!empty($ong_data)) {
					$ong_data['personal_data_id'] 		= $data['personal_data']['id'];
					$ong_data['info_verification_id'] 	= $data['verf_id'];
					$ong_data['info_verf_type'] 		= 'stocks';
					$ong_data['created_by'] 			= $this->session->userdata('id');
					$ong_data['created_at'] 			= date("Y-m-d H:i:s");

					if (!empty($data['ong_id'])) { // check if ong data exists in the database, then update
						$ong_data['id'] = $data['ong_id'];

						if ($this->db->replace('ong_lists', $ong_data)) {
							$this->session->set_flashdata('success', 'Record updated Successfully.');
							echo "<script>window.location.href='" . base_url('admin/clientStocksIncomeVerification/' . $data['personal_data']['id']) . "';</script>";
							die;
						}
					} else { // if ong data doesn't exists, then create
						$this->user_model->saveOng($ong_data);
						$this->session->set_flashdata('success', 'Record updated Successfully.');
						echo "<script>window.location.href='" . base_url('admin/clientStocksIncomeVerification/' . $data['personal_data']['id']) . "';</script>";
						die;
					}
				}
				$this->session->set_flashdata('success', 'Record updated Successfully.');
				echo "<script>window.location.href='" . base_url('admin/clientStocksIncomeVerification/' . $data['personal_data']['id']) . "';</script>";
				die;
			}
		}


		$inserted_id = $this->admin_model->updateClientStocksVerification($dataToUpdate);
		if ($inserted_id) {
			if (!empty($ong_data)) {
				$ong_data['personal_data_id'] 		= $_SESSION['personal_data_id'];
				$ong_data['info_verification_id'] 	= $inserted_id;
				$ong_data['info_verf_type'] 		= 'stocks';
				$ong_data['created_by'] 			= $this->session->userdata('id');
				$ong_data['created_at'] 			= date("Y-m-d H:i:s");
				$this->user_model->saveOng($ong_data);
			}
			// $step = $this->completeThisStep($dataToUpdate['personal_data_id'], 3, 'stocks');

			// if ($this->user_model->stepThreeCompleted($dataToUpdate['personal_data_id'], $step)) 
			// {
			// 	$this->session->set_flashdata('success', 'Information verification saved.');
			// 	echo "<script>window.location.href='" . base_url('user/add_more_income_type') . "';</script>";
			// 	die;
			// }
		}
	}

	public function clientCryptoIncomeVerification($id)
	{
		$this->admin_auth();
		$personalDataId = $id;

		$verificationData['personalData'] = $this->user_model->getPersonalDataById($personalDataId);

		// dd($verificationData['personalData']);
		// $steps = $verificationData['personalData']['steps_completed'];
		// $stepsCompleted = $this->checkStockSteps($steps);
		// $verificationData['personalData']['steps_completed'] = $stepsCompleted;
		// $this->dd($stepsCompleted);


		if (!empty($verificationData['personalData'])) {
			// $this->dd($verificationData['personalData']);
			// if ($verificationData['personalData']['steps_completed'] == 1) 
			// {
			// 	// echo "step 1 of divident completed";die;
			// 	$this->load->view('user/layout/header');
			// 	$this->load->view('user/stocks_verification', $verificationData);
			// 	$this->load->view('user/layout/footer');
			// }

			$existing_verf_data = $this->admin_model->fetchClientCryptoVerification($personalDataId);

			// dd($existing_verf_data);


			/* important code below for future reference
			*
			if($verificationData['personalData']['steps_completed'] == 2)
			{
				// echo "step 2 of divident completed";die;

				$stocksIncome = $this->user_model->fetchStocksWithCountry($personalDataId);
				

				$calculatedStocksList = $this->calculateListOfStocks($stocksIncome);
				// $this->dd($calculatedStocksList);

				$calculatedData2021 = $this->calculateStocks2021($calculatedStocksList);
				// $this->dd($calculatedData2021);

				$verificationData['calculatedDividentList'] = $calculatedStocksList;
				$verificationData['calculatedData2021'] = $calculatedData2021;

				$this->load->view('admin/layout/header');
				$this->load->view('admin/client_stocks_verification', $verificationData);
				$this->load->view('admin/layout/footer');
			}
			*/

			$cryptoIncome = $this->user_model->fetchCryptoWithCountry($personalDataId);
			$calculatedData2021 = $this->calculateCrypto2021($cryptoIncome); // $this->dd($calculatedData2021);

			if (!empty($existing_verf_data)) {
				// $this->dd($existing_verf_data);
				$verificationData['existingVerificationData'] = $existing_verf_data[0];

				//to fetch related ong data if added by user from frontend
				$arr = [
					'personal_data_id' 		=> $existing_verf_data[0]['personal_data_id'],
					'info_verification_id' 	=> $existing_verf_data[0]['id'],
					'info_verf_type' 		=> 'crypto',
				];
				$ong_data = $this->admin_model->getOngDataByVerification($arr);
				// $this->dd($ong_data);
				if (!empty($ong_data)) {
					$verificationData['ong_data'] = $ong_data;
				}
			}

			$verificationData['calculatedData2021'] = $calculatedData2021;

			$this->load->view('admin/layout/header');
			$this->load->view('admin/client_crypto_verification', $verificationData);
			$this->load->view('admin/layout/footer');
		}
	}

	/**
	 * save/update client crypto verification
	 */
	public function saveCryptoVerification()
	{
		$data = $this->input->post();
		// d($data);
		$id = $data['id'];
		$dataToUpdate = [];
		if (!empty($data['id'])) {
			$dataToUpdate['id'] = $data['id'];
		}

		$dataToUpdate['personal_data_id'] 				= $data['personal_data']['id'];
		$dataToUpdate['income_2021'] 					= $data['income_2021'];
		$dataToUpdate['taxable_income_2021'] 			= $data['taxable_income_2021'];
		$dataToUpdate['tax_2021'] 						= $data['tax_2021'];
		$dataToUpdate['total_income_for_health_2021'] 	= $data['total_income_for_health_2021'];
		$dataToUpdate['health_insurance_tax_2021'] 		= $data['health_insurance_tax_2021'];
		$dataToUpdate['to_be_paid_health_tax_2021'] 	= $data['to_be_paid_health_tax_2021'];
		$dataToUpdate['to_be_paid_tax_2021'] 			= $data['to_be_paid_tax_2021'];
		$dataToUpdate['created_at'] 					= date('Y-m-d H:i:s');

		if (!empty($data['ong_question'])) {
			$dataToUpdate['ong_question'] = $data['ong_question'];
		}
		if (!empty($data['ong_name']) && !empty($data['ong_registration_number']) && !empty($data['ong_bank_account'])) {
			$ong_data['ong_name'] 					= $data['ong_name'];
			$ong_data['ong_registration_number'] 	= $data['ong_registration_number'];
			$ong_data['ong_bank_account'] 			= $data['ong_bank_account'];
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

		if (empty($data['id'])) {
			// dd("no id found");
			$inserted_id = $this->user_model->saveCryptoVerification($dataToUpdate);
			if ($inserted_id) {
				if (!empty($ong_data)) {
					$ong_data['personal_data_id'] 		= $_SESSION['personal_data_id'];
					$ong_data['info_verification_id'] 	= $inserted_id;
					$ong_data['info_verf_type'] 		= 'crypto';
					$ong_data['created_by'] 			= $this->session->userdata('id');
					$ong_data['created_at'] 			= date("Y-m-d H:i:s");
					$this->user_model->saveOng($ong_data);
				}
				$step = $this->completeThisStep($dataToUpdate['personal_data_id'], 3, 'crypto');

				if ($this->user_model->stepThreeCompleted($dataToUpdate['personal_data_id'], $step)) {
					$this->session->set_flashdata('success', 'Information verification saved.');
					echo "<script>window.location.href='" . base_url('admin/clientCryptoIncomeVerification/' . $data['personal_data']['id']) . "';</script>";
					die;
				}
			} else {
				$this->session->set_flashdata('error', 'Unable to save your data.');
				echo "<script>window.location.href='" . base_url('admin/clientCryptoIncomeVerification/' . $data['personal_data']['id']) . "';</script>";
				die;
			}
		} else {
			// dd("id found");
			$inserted_id = $this->user_model->updateCryptoVerification($id, $dataToUpdate);
			if ($inserted_id) {
				// if(!empty($ong_data))
				// {
				// 	$ong_data['personal_data_id'] 		= $_SESSION['personal_data_id'];
				// 	$ong_data['info_verification_id'] 	= $inserted_id;
				// 	$ong_data['info_verf_type'] 		= 'crypto';
				// 	$ong_data['created_by'] 			= $this->session->userdata('id');
				// 	$ong_data['created_at'] 			= date("Y-m-d H:i:s");
				// 	$this->user_model->saveOng($ong_data);
				// }
				$step = $this->completeThisStep($dataToUpdate['personal_data_id'], 3, 'crypto');

				if ($this->user_model->stepThreeCompleted($dataToUpdate['personal_data_id'], $step)) {
					$this->session->set_flashdata('success', 'Information verification updated.');
					echo "<script>window.location.href='" . base_url('admin/clientCryptoIncomeVerification/' . $data['personal_data']['id']) . "';</script>";
					die;
				}
			} else {
				$this->session->set_flashdata('error', 'Unable to update your data.');
				echo "<script>window.location.href='" . base_url('admin/clientCryptoIncomeVerification/' . $data['personal_data']['id']) . "';</script>";
				die;
			}
		}
	}

	public function calculateCrypto2021($data)
	{
		// $this->dd($data);
		$calculateCrypto2021 = [];
		$minWagePreviousYear = $this->user_model->getMinWageForPreviousYear();
		if ($minWagePreviousYear) {
			$taxableIncome = $data[0]['SUM(var_final)'];

			$tax = round($taxableIncome * 0.1);
			$calculateCrypto2021['taxableincome2021'] = round($taxableIncome);
			$calculateCrypto2021['tax2021'] = round($tax);
			$calculateCrypto2021['totalIncomeForHealth2021'] = round($taxableIncome);
			$calculateCrypto2021['healthInsuranceTax2021'] = $calculateCrypto2021['totalIncomeForHealth2021'] > 12 * $minWagePreviousYear['value'] ? round(12 * $minWagePreviousYear['value'] * 0.1) : 0;
			$calculateCrypto2021['toBePaidHealthTax2021'] = $calculateCrypto2021['totalIncomeForHealth2021'] > 12 * $minWagePreviousYear['value'] ? round(12 * $minWagePreviousYear['value'] * 0.1) : 0;
			if ($calculateCrypto2021['toBePaidHealthTax2021'] == 0)
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

	public function clientDividentIncomeVerification($id)
	{
		$personalDataId = $id;
		$verificationData['personalData'] = $this->user_model->getPersonalDataById($personalDataId);

		// $this->dd($verificationData['personalData']);
		// $steps = $verificationData['personalData']['steps_completed'];
		// $stepsCompleted = $this->checkDividentSteps($steps);
		// $verificationData['personalData']['steps_completed'] = $stepsCompleted;
		// $this->dd($stepsCompleted);

		if (!empty($verificationData['personalData'])) {
			// $this->dd($verificationData['personalData']);
			// if ($verificationData['personalData']['steps_completed'] == 1) 
			// {
			// 	// echo "step 1 of divident completed";die;
			// 	$this->load->view('user/layout/header');
			// 	$this->load->view('user/divident_verification', $verificationData);
			// 	$this->load->view('user/layout/footer');
			// }

			$existing_verf_data = $this->admin_model->fetchClientDividentVerification($personalDataId);
			// if($verificationData['personalData']['steps_completed'] >= 2)
			// {

			// 	$dividentIncome = $this->user_model->fetchDividentWithCountry($personalDataId);
			// 	// $this->dd($dividentIncome);

			// 	$calculatedDividentList = $this->calculateListOfDivident($dividentIncome);
			// 	// $this->dd($calculatedDividentList);

			// 	$calculatedData2021 = $this->calculateDivident2021($calculatedDividentList);

			// 	$verificationData['calculatedDividentList'] = $calculatedDividentList;
			// 	$verificationData['calculatedData2021'] = $calculatedData2021;

			// 	$existingVerification = $this->user_model->fetchVerifiedDividentByPid($personalDataId);
			// 	if(!empty($existingVerification)) {
			// 		$verificationData['existingVerification'] = $existingVerification;
			// 	}

			// 	$this->load->view('user/layout/header');
			// 	$this->load->view('user/divident_verification', $verificationData);
			// 	$this->load->view('user/layout/footer');
			// }

			if (!empty($existing_verf_data)) {
				// $this->dd($existing_verf_data);
				$verificationData['existing_data'] = $existing_verf_data;
			}

			$dividentIncome = $this->user_model->fetchDividentWithCountry($personalDataId);
			// $this->dd($dividentIncome);

			$calculatedDividentList = $this->calculateListOfDivident($dividentIncome);
			// $this->dd($calculatedDividentList);

			$calculatedData2021 = $this->calculateDivident2021($calculatedDividentList);

			$verificationData['calculatedDividentList'] = $calculatedDividentList;
			$verificationData['calculatedData2021'] = $calculatedData2021;

			$existingVerification = $this->user_model->fetchVerifiedDividentByPid($personalDataId);
			if (!empty($existingVerification)) {
				$verificationData['existingVerification'] = $existingVerification;
			}

			$this->load->view('admin/layout/header');
			$this->load->view('admin/client_divident_verification', $verificationData);
			$this->load->view('admin/layout/footer');
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
		} else {
			$this->session->set_flashdata('error', 'Annual Exchange Rate for the year ' . $previous_year . ' is not found. Please contact admin.');
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
		if ($minWagePreviousYear) {
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

			if ($calculateDivident2021['toBePaidHealthTax2021'] == 0)
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

	public function saveClientDividentVerification()
	{
		$data = $this->input->post();
		// dd($data);

		if (!empty($data['id'])) {
			$dataToUpdate['id'] = $data['id'];
		}
		$dataToUpdate['personal_data_id'] 				= $data['personal_data']['id'];
		$dataToUpdate['income_2021'] 					= $data['income_2021'];
		$dataToUpdate['taxable_income_2021']			= $data['taxable_income_2021'];
		$dataToUpdate['tax_2021'] 						= $data['tax_2021'];
		$dataToUpdate['total_income_for_health_2021'] 	= $data['total_income_for_health_2021'];
		$dataToUpdate['health_insurance_tax_2021'] 		= $data['health_insurance_tax_2021'];
		$dataToUpdate['to_be_paid_health_tax_2021'] 	= $data['to_be_paid_health_tax_2021'];
		$dataToUpdate['to_be_paid_tax_2021'] 			= $data['to_be_paid_tax_2021'];

		isset($data['income_2022'])
			? $dataToUpdate['income_2022'] = $data['income_2022']
			: $dataToUpdate['income_2022'] = 0;
		isset($data['health_insurance_tax_2022'])
			? $dataToUpdate['health_insurance_tax_2022'] = $data['health_insurance_tax_2022']
			: $dataToUpdate['health_insurance_tax_2022'] = 0;
		isset($data['tax_2022'])
			? $dataToUpdate['tax_2022'] = $data['tax_2022']
			: $dataToUpdate['tax_2022'] = 0;

		$dataToUpdate['created_by'] = $this->session->userdata('id');
		$dataToUpdate['created_at'] = date("Y-m-d H:i:s");

		// dd($dataToUpdate);
		if (empty($data['id'])) {
			if ($this->user_model->saveDividentVerification($dataToUpdate)) {
				$step = $this->completeThisStep($dataToUpdate['personal_data_id'], 3, 'divident');

				if ($this->user_model->stepThreeCompleted($dataToUpdate['personal_data_id'], $step)) {
					$this->session->set_flashdata('success', 'Information verification saved.');
					echo "<script>window.location.href='" . base_url('admin/clientDividentIncomeVerification/' . $dataToUpdate['personal_data_id']) . "';</script>";
					die;
				}
			}
		} else {
			if ($this->db->replace('info_verification_dividents', $dataToUpdate)) {
				$this->session->set_flashdata('success', 'Record updated Successfully.');
				echo "<script>window.location.href='" . base_url('admin/clientDividentIncomeVerification/' . $data['personal_data']['id']) . "';</script>";
				die;
			}
		}
	}


	/**
	 * Admin Profile page
	 * 
	 * @desc renders admin profile page
	 */

	public function profile()
	{
		$this->admin_auth();
		$this->load->view('admin/layout/header');
		$this->load->view('admin/admin_profile');
		$this->load->view('admin/layout/footer');
	}

	/**
	 * Change password of admin
	 */

	public function updatePassword()
	{
		$data = array();
		$this->admin_auth();
		// print_r($this->session->userdata());die;
		$language = $this->session->userdata('language');
		foreach ($this->lang->language as $klang => $lng) {
			$data[$klang] = $lng;
		}
		$uid = $this->session->userdata('user_id');
		$adminData = $this->admin_model->getAdminDetailsByUserID($uid);
		// print_r($adminData);die;
		$oldPass = $adminData['password'];
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
						$result1 = $this->admin_model->updateLoginPassword($uid, $old_password, $new_password);
						// $result = $this->admin_model->updatePassword($uid, $old_password, $new_password);
						$this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black"><strong></strong> You have successfully changed your password.</div>');
						echo "<script>window.location.href='" . base_url('admin/profile') . "';</script>";
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
		// echo "<script>window.location.href='" . base_url('admin/profile') . "';</script>";
		// die;
	}

	/**
	 * Update Admin profile
	 */

	public function updateProfile()
	{
		$data = array();
		$uid = $this->session->userdata('user_id');
		$updata = array();
		$language = $this->session->userdata('language');
		foreach ($this->lang->language as $klang => $lng) {
			$data[$klang] = $lng;
		}
		$userInfo = $this->admin_model->getAdminDetailsByUserID($uid);
		// echo "<pre>";
		// print_r($userInfo) ;
		// print_r($_FILES);
		// print_r($this->input->post());
		// die();
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
			echo "<script>window.location.href='" . base_url('admin/profile') . "';</script>";
			die;
		} else {
			$updata['first_name'] = $first_name;
			$updata['last_name'] = $last_name;
			$updata['user_name'] = $first_name . " " . $last_name;
			if ($this->admin_model->updateAdminProfile($uid, $updata)) {
			}
			$_SESSION['first_name'] = $first_name;
			$_SESSION['last_name'] = $last_name;
			$_SESSION['user_name'] = $first_name . " " . $last_name;
			$this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black">Admin Profile Updated Successfully.</div>');
			echo "<script>window.location.href='" . base_url('admin/profile') . "';</script>";
			die;
		}
	}

	/**
	 * Add annual exchange rate
	 */

	public function addAnnualExchangeRate()
	{
		$data = $this->input->post();
		// echo "<pre>";
		// print_r($data);
		// die();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$config = [
			[
				'field' => 'value',
				'label' => 'Value',
				'rules' => 'required|trim'
			],
			[
				'field' => 'year',
				'label' => 'Year',
				'rules' => 'required|trim|max_length[4]'
			],
			[
				'field' => 'currency',
				'label' => 'Currency',
				'rules' => 'required|trim'
			]
		];
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run()) {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_at'] = date('Y-m-d H:i:s');
			// print_r($data);
			// die;
			if ($this->admin_model->fetchAnnualExchangeRate($data['currency'], $data['year'])) {
				$this->session->set_flashdata('error', "Exchange rate for " . $data['currency'] . " in the year " . $data['year'] . " already exists.");
				echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
				die;
			} else {
				if ($this->admin_model->createAnnualExchangeRate($data)) {
					$this->session->set_flashdata('success', 'Exchange rate Added Successfully.');
					$this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black">Exchange Rate Created Successfully.</div>');
					echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
					die;
				}
			}
		} else {
			$this->session->set_flashdata('error', 'Failed to create exchange rate.');
			echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
			die;
		}
	}

	/**
	 * Admin Currency Data page
	 * 
	 * @desc renders admin currency data page
	 */

	public function currency()
	{
		$this->admin_auth();
		$data['currencyData'] = $this->admin_model->getAllCurrency();
		// echo "<pre>";
		// print_r($currencyData);die;
		$this->load->view('admin/layout/header');
		$this->load->view('admin/admin_currency', $data);
		$this->load->view('admin/layout/footer');
	}

	/**
	 * Admin Users Data page
	 * 
	 * @desc renders admin users data page
	 */

	public function users()
	{
		$this->admin_auth();
		$data['users'] = $this->admin_model->getAllUsers();
		// echo "<pre>";
		// print_r($currencyData);die;
		$this->load->view('admin/layout/header');
		$this->load->view('admin/admin_users', $data);
		$this->load->view('admin/layout/footer');
	}

	public function addUser()
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
				'rules' => 'required|trim|min_length[8]'
			],
			[
				'field' => 'confirm_password',
				'label' => 'Confirm Password',
				'rules' => 'required|trim|matches[password]'
			],

		];





		$updata = array();
		$language = $this->session->userdata('language');

		foreach ($this->lang->language as $klang => $lng) {
			$data[$klang] = $lng;
		}

		// $message = $this->load->view('email/school_register', $mail_data, true);
		// $email = $data['email'];
		// $from = "donotreply@cognita.cymru";
		// $subject = "Cognita User Registration";
		// $headers  = "From: Cognita$from\r\n"; 
		// $headers .= "Content-type: text/html\r\n";
		// // mail($email, $subject, $msg, $headers);
		// if($this->sendmail_model->send_mail2("donotreply@cognita.cymru", "Cognita Cymru", $email, $subject, $message)){
		// 	$this->admin_model->add_school_data($users_data);
		// 	$this->admin_model->add_login_data($login_data);
		// 	if ($this->admin_model->add_school($data)) {
		// 		$this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black">Schools Added Successfully.</div>');
		// 		echo "<script>window.location.href='" . base_url('admin/schools_list') . "';</script>";
		// 		die;
		// 	}
		// }



		$this->load->library('form_validation');
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/users') . "';</script>";
			die;
		} else {
			// echo "validated";
			// die;
			$updata['user_id'] = $this->generateUserId();
			$updata['first_name'] = $this->input->post('first_name');
			$updata['last_name'] = $this->input->post('last_name');
			$updata['user_name'] = $updata['first_name'] . " " . $updata['last_name'];
			$updata['email'] = $this->input->post('email');
			$updata['password'] = hash('md5', $this->input->post('password'));
			$updata['created_at'] = date('Y-m-d H:i:s');

			if ($this->admin_model->createUser($updata)) {
			}
			$this->session->set_flashdata('success', 'User has been added successfully.');
			echo "<script>window.location.href='" . base_url('admin/users') . "';</script>";
			die;
		}
	}

	/**
	 * this method is used to send data to curreny on edit currency ajax req
	 */

	public function getUserById()
	{
		// var_dump($this->input->post());
		// die;
		$id = $this->input->post('id');
		$id = (int)$id;
		$data['user'] = $this->admin_model->fetchUserById($id);
		echo json_encode($data['user']);
	}

	/**
	 * delete User by id
	 */
	public function deleteUserById()
	{
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			if ($this->admin_model->deleteUserById($id))
				return true;
			return false;
		}
	}

	public function editUser()
	{
		$data = $this->input->post();

		$id = $this->input->post('id');
		// echo "<pre>";
		// print_r($data);
		// die;

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
				'rules' => 'required|trim|valid_email'
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
			echo validation_errors();
			die;
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" style="color:black">' . validation_errors() . '</div>');
			echo "<script>window.location.href='" . base_url('admin/users') . "';</script>";
			die;
		} else {
			// echo "validated";
			// die;
			$updata['first_name'] = $this->input->post('first_name');
			$updata['last_name'] = $this->input->post('last_name');
			$updata['email'] = $this->input->post('email');
			$updata['user_name'] = $updata['first_name'] . " " . $updata['last_name'];

			if ($this->admin_model->updateUser($id, $updata)) {
			}
			$this->session->set_flashdata('success', 'User has been updated successfully!!');
			echo "<script>window.location.href='" . base_url('admin/users') . "';</script>";
			die;
		}
	}

	/**
	 * update users' status
	 */

	public function updateUserStatus()
	{
		$id = $this->input->post('user_id');
		$status = $this->input->post('value');
		echo $this->admin_model->updateUserStatus($id, $status);
	}


	/**
	 * ----------------------------------
	 * Add Currency
	 * ----------------------------------
	 * 
	 */
	public function addCurrency()
	{
		$data = $this->input->post();
		// echo "<pre>";
		// print_r($data);
		// die();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('Regex');

		$config = [
			[
				'field' => 'currency_code',
				'label' => 'Currency Code',
				'rules' => 'required|trim|max_length[3]|is_unique[currencies.currency_code]'
			],
			[
				'field' => 'currency_name',
				'label' => 'Currency Name',
				'rules' => 'required|trim|is_unique[currencies.currency_name]'
			]
		];
		$this->form_validation->set_rules($config);
		// print_r($this->form_validation->run());
		// echo validation_errors();
		// die;
		if ($this->form_validation->run()) {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_at'] = date('Y-m-d H:i:s');
			// print_r($data);
			// die;
			if ($this->admin_model->addCurrency($data)) {
				$this->session->set_flashdata('success', 'Currency Added Successfully.');
				echo "<script>window.location.href='" . base_url('admin/currency') . "';</script>";
				die;
			}
		} else {
			$this->session->set_flashdata('error', 'Failed to add currency.');
			echo "<script>window.location.href='" . base_url('admin/currency') . "';</script>";
			// $this->session->set_flashdata('msg', '<div class="alert alert-success" style="color:black">Exchange Rate Created Successfully.</div>');
			// echo "<script>window.location.href='" . base_url('admin/currency') . "';</script>";
			die;
		}
	}

	/**
	 * ----------------------------------
	 * Add Minimum Wage
	 * ----------------------------------
	 * 
	 */
	public function addMinimumWage()
	{
		$data = $this->input->post();
		// echo "<pre>";
		// print_r($data);
		// die();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('Regex');

		$config = [
			[
				'field' => 'value',
				'label' => 'Value',
				'rules' => 'required|trim',
			],
			[
				'field' => 'year',
				'label' => 'Year',
				'rules' => 'required|trim|is_unique[minimum_wages.year]',
				'errors' => [
					'is_unique' => 'Year ' . $data['year'] . ' has already a value.'
				]
			]
		];
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_at'] = date('Y-m-d H:i:s');

			if ($this->admin_model->addMinimumWage($data)) {
				$this->session->set_flashdata('success', 'Minimum wage Added Successfully.');
				echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to add minimum wage.');
				echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
			}
		} else {
			$this->session->set_flashdata('min_wage_validation_error', validation_errors());
			echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";

			die;
		}
	}

	/**
	 * this method is used to send data to system config on edit exchange rate ajax req
	 */

	public function getExchangeRateById()
	{
		$id = $this->input->post('value');
		$id = (int)$id;
		$data['exchange_rate'] = $this->admin_model->fetchAnnualExchangeRateById($id);
		echo json_encode($data['exchange_rate']);
	}

	public function editAnnualExchangeRate()
	{
		$data = $this->input->post();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('Regex');

		$id = $data['id'];
		$config = [
			[
				'field' => 'value',
				'label' => 'Value',
				'rules' => 'required|trim',
			],
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$dataToUpdate['value'] = $this->input->post('value');
			$dataToUpdate['updated_by'] = $this->session->userdata('id');
			$dataToUpdate['updated_at'] = date('Y-m-d H:i:s');
			// print_r($data);
			// die;
			if ($this->admin_model->updateAnnualExchangeRate($id, $dataToUpdate)) {
				$this->session->set_flashdata('success', 'Data updated Successfully.');
				echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to update data.');
				echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
			}
		} else {
			// echo validation_errors();die;
			// $this->session->set_flashdata('validation_error', validation_errors());
			// echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
			$this->session->set_flashdata('min_wage_validation_error', validation_errors());
			echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";

			die;
		}
	}


	/**
	 * delete exchange rate by id
	 */
	public function deleteExchangeRateById()
	{
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			if ($this->admin_model->deleteExchangeRateById($id))
				return true;
			return false;
		}
	}




	/**
	 * this method is used to send data to system config on edit exchange rate ajax req
	 */

	public function getMinWageById()
	{
		$id = $this->input->post('value');
		$id = (int)$id;
		$data['min_wage'] = $this->admin_model->fetchMinimumWageById($id);
		echo json_encode($data['min_wage']);
	}

	/**
	 * update minimum wage 
	 */
	public function editMinWage()
	{
		$data = $this->input->post();
		// var_dump($data);
		// die;
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('Regex');

		$id = $data['id'];
		$config = [
			[
				'field' => 'value',
				'label' => 'Value',
				'rules' => 'required|trim',
			],
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$dataToUpdate['value'] = $this->input->post('value');
			$dataToUpdate['updated_by'] = $this->session->userdata('id');
			$dataToUpdate['updated_at'] = date('Y-m-d H:i:s');
			// print_r($data);
			// die;
			if ($this->admin_model->updateMinimumWage($id, $dataToUpdate)) {
				$this->session->set_flashdata('success', 'Data updated Successfully.');
				echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to update data.');
				echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
			}
		} else {
			// echo validation_errors();die;
			// $this->session->set_flashdata('validation_error', validation_errors());
			// echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
			$this->session->set_flashdata('min_wage_validation_error', validation_errors());
			echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";

			die;
		}
	}

	/**
	 * delete minimum wage by id
	 */
	public function deleteMinWageById()
	{
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			if ($this->admin_model->deleteMinWageById($id))
				return true;
			return false;
		}
	}

	/**
	 * save bnr exchange rate
	 */
	public function saveBNRExchangeRate()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$upload_status =  $this->uploadxlsxDoc();
			if ($upload_status != false) {
				$inputFileName = FCPATH . 'upload/imports/' . $upload_status;
				// $this->dd($inputFileName);

				$inputTileType = IOFactory::identify($inputFileName);
				$reader = IOFactory::createReader($inputTileType);
				$spreadsheet = $reader->load($inputFileName);
				$sheet = $spreadsheet->getSheet(0);
				$count_Rows = 0;
				foreach ($sheet->getRowIterator() as $row) {
					if ($row->getRowIndex() > 3) {
						$dateValue = $spreadsheet->getActiveSheet()->getCell('A' . $row->getRowIndex())->getValue();
						$date_inUnixTimestamp = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToTimestamp($dateValue);
						$date = gmdate("Y-m-d", $date_inUnixTimestamp);

						$rateBnrUsd = $spreadsheet->getActiveSheet()->getCell('B' . $row->getRowIndex())->getValue();

						$rateBnrEuro = $spreadsheet->getActiveSheet()->getCell('C' . $row->getRowIndex())->getValue();

						// $this->dd($date);

						$data = array(
							'date' => $date,
							'rate_bnr_usd' => $rateBnrUsd,
							'rate_bnr_euro' => $rateBnrEuro,
						);
						// $this->dd($data);

						if ($this->user_model->fetchBNR($data)) {
							continue;
						} else {
							$this->db->insert('bnr_exchange_rates', $data);
							$count_Rows++;
						}
					}
				}
				$this->session->set_flashdata('success', 'Successfully imported data');
				echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
			} else {
				$this->session->set_flashdata('error', 'File is not uploaded');
				echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
			}
		} else {
			$this->load->view('admin/layout/header');
			$this->load->view('admin/system_configration');
			$this->load->view('admin/layout/footer');
		}
	}

	function uploadxlsxDoc()
	{
		$uploadPath = './upload/imports/';
		if (!is_dir($uploadPath)) {
			mkdir($uploadPath, 0777, TRUE); // FOR CREATING DIRECTORY IF ITS NOT EXIST
		}

		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'csv|xlsx|xls';
		$config['max_size'] = 1000000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('upload_excel')) {
			$fileData = $this->upload->data();
			return $fileData['file_name'];
		} else {
			return false;
		}
	}


	/**
	 * delete currency by id
	 */
	public function deleteCurrencyById()
	{
		var_dump($this->input->post());
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			if ($this->admin_model->deleteCurrencyById($id))
				return true;
			return false;
		}
	}

	/**
	 * this method is used to send data to curreny on edit currency ajax req
	 */

	public function getCurrencyById()
	{
		// var_dump($this->input->post());
		// die;
		$id = $this->input->post('id');
		$id = (int)$id;
		$data['currency'] = $this->admin_model->fetchCurrencyById($id);
		echo json_encode($data['currency']);
	}

	/**
	 * update currency 
	 */
	public function editCurrency()
	{
		$data = $this->input->post();
		// var_dump($data);
		// die;
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('Regex');

		$id = $data['id'];
		$config = [
			[
				'field' => 'currency_code',
				'label' => 'Currency Code',
				'rules' => 'required|trim|max_length[3]'
			],
			[
				'field' => 'currency_name',
				'label' => 'Currency Name',
				'rules' => 'required|trim'
			]
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$dataToUpdate['currency_code'] = $this->input->post('currency_code');
			$dataToUpdate['currency_name'] = $this->input->post('currency_name');
			$dataToUpdate['updated_by'] = $this->session->userdata('id');
			$dataToUpdate['updated_at'] = date('Y-m-d H:i:s');
			// print_r($data);
			// die;
			if ($this->admin_model->updateCurrency($id, $dataToUpdate)) {
				$this->session->set_flashdata('success', 'Data updated Successfully.');
				echo "<script>window.location.href='" . base_url('admin/currency') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to update data.');
				echo "<script>window.location.href='" . base_url('admin/currency') . "';</script>";
			}
		} else {
			// echo validation_errors();die;
			// $this->session->set_flashdata('validation_error', validation_errors());
			// echo "<script>window.location.href='" . base_url('admin/system_configration') . "';</script>";
			$this->session->set_flashdata('validation_error', validation_errors());
			echo "<script>window.location.href='" . base_url('admin/currency') . "';</script>";

			die;
		}
	}

	/**
	 * generate random user ID
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
	 * -----------------------------
	 * 	add rental master
	 * -----------------------------
	 */
	public function addRental()
	{
		// $this->dd($this->input->post());
		$data = $this->input->post();

		$config = [
			[
				'field' => 'number_of_modules',
				'label' => 'No. of Modules',
				'rules' => 'required|trim|numeric|is_unique[master_pricing_rentals.number_of_modules]',
				'errors' => [
					'is_unique' => 'Given number of modules already created!'
				]
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required|trim|numeric',
			]
		];

		$data['sku'] = $this->generateSku("REN");
		// $this->dd($data);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_at'] = date('Y-m-d H:i:s');

			if ($this->admin_model->savePricingRental($data)) {
				$this->session->set_flashdata('success', 'Rental module Added Successfully.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to add rental module.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			}
		} else {
			$this->session->set_flashdata('rental_validation_error', validation_errors());
			echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";

			die;
		}
	}

	/**
	 * delete rental by id
	 */
	public function deleteRentalById()
	{
		// $this->dd($this->input->post());
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			if ($this->admin_model->deleteDataById('master_pricing_rentals', $id))
				return true;
			return false;
		}
	}

	/**
	 * this method is used to send data to pricing on edit rental ajax req
	 */

	public function getRentalById()
	{
		// var_dump($this->input->post());
		// die;
		$id = $this->input->post('id');
		$id = (int)$id;
		$data['rental'] = $this->admin_model->fetchDataById('master_pricing_rentals', $id);
		echo json_encode($data['rental']);
	}

	/**
	 * update rental 
	 */
	public function editRental()
	{
		$data = $this->input->post();
		// var_dump($data);
		// die;
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('Regex');

		$id = $data['id'];
		$config = [
			[
				'field' => 'number_of_modules',
				'label' => 'No. of Modules',
				'rules' => 'required|trim|numeric',
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required|trim|numeric',
			]
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$dataToUpdate['number_of_modules'] = $this->input->post('number_of_modules');
			$dataToUpdate['price'] = $this->input->post('price');
			$dataToUpdate['updated_by'] = $this->session->userdata('id');
			$dataToUpdate['updated_at'] = date('Y-m-d H:i:s');
			// print_r($data);
			// die;
			if ($this->admin_model->updateData('master_pricing_rentals', $id, $dataToUpdate)) {
				$this->session->set_flashdata('success', 'Data updated Successfully.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to update data.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			}
		} else {
			$this->session->set_flashdata('error', 'Failed to update data.');
			echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";

			die;
		}
	}

	/**
	 * -----------------------------
	 * 	add divident master
	 * -----------------------------
	 */
	public function addDivident()
	{
		// $this->dd($this->input->post());
		$data = $this->input->post();

		$config = [
			[
				'field' => 'number_of_modules',
				'label' => 'No. of Modules',
				'rules' => 'required|trim|numeric|is_unique[master_pricing_dividents.number_of_modules]',
				'errors' => [
					'is_unique' => 'Given number of modules already created!'
				]
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required|trim|numeric',
			]
		];

		$data['sku'] = $this->generateSku("DIV");
		// $this->dd($data);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_at'] = date('Y-m-d H:i:s');

			if ($this->admin_model->saveRecord('master_pricing_dividents', $data)) {
				$this->session->set_flashdata('success', 'Divident module Added Successfully.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to add divident module.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			}
		} else {
			$this->session->set_flashdata('rental_validation_error', validation_errors());
			echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";

			die;
		}
	}

	/**
	 * delete divident by id
	 */
	public function deleteDividentById()
	{
		// $this->dd($this->input->post());
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			if ($this->admin_model->deleteDataById('master_pricing_dividents', $id))
				return true;
			return false;
		}
	}

	/**
	 * this method is used to send data to pricing on edit divident ajax req
	 */

	public function getDividentById()
	{
		// var_dump($this->input->post());
		// die;
		$id = $this->input->post('id');
		$id = (int)$id;
		$data['divident'] = $this->admin_model->fetchDataById('master_pricing_dividents', $id);
		echo json_encode($data['divident']);
	}

	/**
	 * update divident 
	 */
	public function editDivident()
	{
		$data = $this->input->post();
		// var_dump($data);
		// die;
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('Regex');

		$id = $data['id'];
		$config = [
			[
				'field' => 'number_of_modules',
				'label' => 'No. of Modules',
				'rules' => 'required|trim|numeric',
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required|trim|numeric',
			]
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$dataToUpdate['number_of_modules'] = $this->input->post('number_of_modules');
			$dataToUpdate['price'] = $this->input->post('price');
			$dataToUpdate['updated_by'] = $this->session->userdata('id');
			$dataToUpdate['updated_at'] = date('Y-m-d H:i:s');
			// print_r($data);
			// die;
			if ($this->admin_model->updateData('master_pricing_dividents', $id, $dataToUpdate)) {
				$this->session->set_flashdata('success', 'Data updated Successfully.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to update data.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			}
		} else {
			$this->session->set_flashdata('error', 'Failed to update data.');
			echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";

			die;
		}
	}


	/**
	 * -----------------------------
	 * 	add stock master
	 * -----------------------------
	 */
	public function addStock()
	{
		// $this->dd($this->input->post());
		$data = $this->input->post();

		$config = [
			[
				'field' => 'number_of_modules',
				'label' => 'No. of Modules',
				'rules' => 'required|trim|numeric|is_unique[master_pricing_stocks.number_of_modules]',
				'errors' => [
					'is_unique' => 'Given number of modules already created!'
				]
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required|trim|numeric',
			]
		];

		$data['sku'] = $this->generateSku("STO");
		// $this->dd($data);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_at'] = date('Y-m-d H:i:s');

			if ($this->admin_model->saveRecord('master_pricing_stocks', $data)) {
				$this->session->set_flashdata('success', 'Stock module Added Successfully.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to add stock module.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			}
		} else {
			$this->session->set_flashdata('rental_validation_error', validation_errors());
			echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";

			die;
		}
	}

	/**
	 * delete stock by id
	 */
	public function deleteStockById()
	{
		// $this->dd($this->input->post());
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			if ($this->admin_model->deleteDataById('master_pricing_stocks', $id))
				return true;
			return false;
		}
	}

	/**
	 * this method is used to send data to pricing on edit stock ajax req
	 */

	public function getStockById()
	{
		// var_dump($this->input->post());
		// die;
		$id = $this->input->post('id');
		$id = (int)$id;
		$data['stock'] = $this->admin_model->fetchDataById('master_pricing_stocks', $id);
		echo json_encode($data['stock']);
	}

	/**
	 * update stock 
	 */
	public function editStock()
	{
		$data = $this->input->post();
		// var_dump($data);
		// die;
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('Regex');

		$id = $data['id'];
		$config = [
			[
				'field' => 'number_of_modules',
				'label' => 'No. of Modules',
				'rules' => 'required|trim|numeric',
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required|trim|numeric',
			]
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$dataToUpdate['number_of_modules'] = $this->input->post('number_of_modules');
			$dataToUpdate['price'] = $this->input->post('price');
			$dataToUpdate['updated_by'] = $this->session->userdata('id');
			$dataToUpdate['updated_at'] = date('Y-m-d H:i:s');
			// print_r($data);
			// die;
			if ($this->admin_model->updateData('master_pricing_stocks', $id, $dataToUpdate)) {
				$this->session->set_flashdata('success', 'Data updated Successfully.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to update data.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			}
		} else {
			$this->session->set_flashdata('error', 'Failed to update data.');
			echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";

			die;
		}
	}

	/**
	 * -----------------------------
	 * 	add crypto master
	 * -----------------------------
	 */
	public function addCrypto()
	{
		// $this->dd($this->input->post());
		$data = $this->input->post();

		$config = [
			[
				'field' => 'number_of_modules',
				'label' => 'No. of Modules',
				'rules' => 'required|trim|numeric|is_unique[master_pricing_cryptos.number_of_modules]',
				'errors' => [
					'is_unique' => 'Given number of modules already created!'
				]
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required|trim|numeric',
			]
		];

		$data['sku'] = $this->generateSku("CRP");
		// $this->dd($data);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_at'] = date('Y-m-d H:i:s');

			if ($this->admin_model->saveRecord('master_pricing_cryptos', $data)) {
				$this->session->set_flashdata('success', 'Crypto module Added Successfully.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to add crypto module.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			}
		} else {
			$this->session->set_flashdata('rental_validation_error', validation_errors());
			echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			die;
		}
	}

	/**
	 * delete crypto by id
	 */
	public function deleteCryptoById()
	{
		// $this->dd($this->input->post());
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			if ($this->admin_model->deleteDataById('master_pricing_cryptos', $id))
				return true;
			return false;
		}
	}

	/**
	 * this method is used to send data to pricing on edit crypto ajax req
	 */

	public function getCryptoById()
	{
		// var_dump($this->input->post());
		// die;
		$id = $this->input->post('id');
		$id = (int)$id;
		$data['crypto'] = $this->admin_model->fetchDataById('master_pricing_cryptos', $id);
		echo json_encode($data['crypto']);
	}

	/**
	 * update crypto 
	 */
	public function editCrypto()
	{
		$data = $this->input->post();
		// var_dump($data);
		// die;
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('Regex');

		$id = $data['id'];
		$config = [
			[
				'field' => 'number_of_modules',
				'label' => 'No. of Modules',
				'rules' => 'required|trim|numeric',
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required|trim|numeric',
			]
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$dataToUpdate['number_of_modules'] = $this->input->post('number_of_modules');
			$dataToUpdate['price'] = $this->input->post('price');
			$dataToUpdate['updated_by'] = $this->session->userdata('id');
			$dataToUpdate['updated_at'] = date('Y-m-d H:i:s');
			// print_r($data);
			// die;
			if ($this->admin_model->updateData('master_pricing_cryptos', $id, $dataToUpdate)) {
				$this->session->set_flashdata('success', 'Data updated Successfully.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to update data.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			}
		} else {
			$this->session->set_flashdata('error', 'Failed to update data.');
			echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";

			die;
		}
	}

	/**
	 * -----------------------------
	 * 	add rental regim master
	 * -----------------------------
	 */
	public function addRentalRegim()
	{
		$data = $this->input->post();

		$config = [
			[
				'field' => 'number_of_modules',
				'label' => 'No. of Modules',
				'rules' => 'required|trim|numeric|is_unique[master_pricing_rental_regimes.number_of_modules]',
				'errors' => [
					'is_unique' => 'Given number of modules already created!'
				]
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required|trim|numeric',
			]
		];

		$data['sku'] = $this->generateSku("HOT");
		// $this->dd($data);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$data['created_by'] = $this->session->userdata('id');
			$data['created_at'] = date('Y-m-d H:i:s');

			if ($this->admin_model->saveRecord('master_pricing_rental_regimes', $data)) {
				$this->session->set_flashdata('success', 'Regim module Added Successfully.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to add regim module.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			}
		} else {
			$this->session->set_flashdata('rental_validation_error', validation_errors());
			echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			die;
		}
	}

	/**
	 * delete rental regime by id
	 */
	public function deleteRentalRegimById()
	{
		// $this->dd($this->input->post());
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			if ($this->admin_model->deleteDataById('master_pricing_rental_regimes', $id))
				return true;
			return false;
		}
	}

	/**
	 * this method is used to send data to pricing on edit regim ajax req
	 */

	public function getRegimById()
	{
		// var_dump($this->input->post());
		// die;
		$id = $this->input->post('id');
		$id = (int)$id;
		$data['crypto'] = $this->admin_model->fetchDataById('master_pricing_rental_regimes', $id);
		echo json_encode($data['crypto']);
	}

	/**
	 * update regim
	 */
	public function editRegim()
	{
		$data = $this->input->post();
		// var_dump($data);
		// die;
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->helper('Regex');

		$id = $data['id'];
		$config = [
			[
				'field' => 'number_of_modules',
				'label' => 'No. of Modules',
				'rules' => 'required|trim|numeric',
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'required|trim|numeric',
			]
		];

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$dataToUpdate['number_of_modules'] = $this->input->post('number_of_modules');
			$dataToUpdate['price'] = $this->input->post('price');
			$dataToUpdate['updated_by'] = $this->session->userdata('id');
			$dataToUpdate['updated_at'] = date('Y-m-d H:i:s');
			// print_r($data);
			// die;
			if ($this->admin_model->updateData('master_pricing_rental_regimes', $id, $dataToUpdate)) {
				$this->session->set_flashdata('success', 'Data updated Successfully.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to update data.');
				echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";
			}
		} else {
			$this->session->set_flashdata('error', 'Failed to update data.');
			echo "<script>window.location.href='" . base_url('admin/pricing') . "';</script>";

			die;
		}
	}



	/**
	 * generate SKU
	 */

	public function generateSku($module)
	{
		$alphabet = "1234567890ABCDEFGHIJKLMNOPQRSTUWXYZ";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 6; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		$id = implode($pass); //turn the array into a string
		$year = date("ymdHi");
		$sku = $module . $year . $id;
		return $sku;
	}

	public function getPersonalDataById()
	{

		// var_dump($this->input->post());
		// die;
		$id = $this->input->post('id');
		$id = (int)$id;
		// $this->dd($id);
		$pData = $this->admin_model->fetchDataById('personal_data', $id);
		$data['personal_data'] = $pData[0];
		// print_r($data['personal_data']);
		$address = json_decode($data['personal_data']['address']);
		$data['personal_data']['address'] = [];
		$data['personal_data']['address']['city'] = $address->city;
		$data['personal_data']['address']['area'] = $address->area;
		$data['personal_data']['address']['address_other_details'] = $address->address_other_details;
		echo json_encode($data['personal_data']);
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
				'rules' => 'required|trim|min_length[10]|max_length[11]'
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
				'rules' => 'required|trim'
			],
			[
				'field' => 'area',
				'label' => 'Area',
				'rules' => 'required|trim'
			],
			[
				'field' => 'address_other_details',
				'label' => 'Address Details',
				'rules' => 'required|trim'
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
			$dataToUpdate['city'] 					= $data['city'];
			$dataToUpdate['area'] 					= $data['area'];
			$dataToUpdate['address'] 				= $data['address_other_details'];

			// echo "DAta to update";
			// $this->dd($dataToUpdate);
			if ($this->admin_model->updateData('personal_data', $id, $dataToUpdate)) {
				$this->session->set_flashdata('success', 'Data updated Successfully.');
				echo "<script>window.location.href='" . base_url('admin/client') . "';</script>";
				die;
			} else {
				$this->session->set_flashdata('error', 'Failed to update data.');
				echo "<script>window.location.href='" . base_url('admin/client') . "';</script>";
			}
		} else {
			// echo validation_errors();
			// die;
			$this->session->set_flashdata('error', 'Failed to update data.');
			echo "<script>window.location.href='" . base_url('admin/client') . "';</script>";

			die;
		}
	}

	/**
	 * delete client by id
	 */
	public function deleteClientById()
	{
		// $this->dd($this->input->post());
		if (!empty($this->input->post())) {
			$id = $this->input->post('id');
			$deleted = $this->admin_model->deleteClientById($id);
			if ($deleted)
				return true;
			return false;
		}
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
		} elseif ($step == 4) {
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


	public function clientPersonalData($id)
	{
		// $this->dd($id);
		$data['personal_data'] = $this->user_model->getPersonalDataById($id);

		$this->load->view('admin/layout/header');
		$this->load->view('admin/client_personalData', $data);
		$this->load->view('admin/layout/footer');
	}


	/**------------------------------------------------------------------------- */

	public function generate_pdf()
	{

		$receipt_url = '';
		$user_id = '';

		if (isset($_REQUEST['payment_intent']) && $_REQUEST['payment_intent'] != null) {

			// here we will check status of the transaction with payment_intents from stripe server
			$get_url = 'https://api.stripe.com/v1/payment_intents/' . $_REQUEST['payment_intent'];

			$get_headers = [
				'Authorization: Bearer ' . 'sk_test_51LOKadSAcwI89CCbZ1428GYuleP8H6Vx98iVsGOg2nLzD8t5IYW2racNBeCqb1gbFrluh9LTSFevvZb0z76ZeMcq00i8XPM0uX'
			];

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $get_url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $get_headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$get_response = curl_exec($ch);

			curl_close($ch);

			$get_data = json_decode($get_response, 1);
			$user_id =   $this->session->userdata('user_id');


			$receipt_url = $get_data['charges']['data'][0]['receipt_url'];

		}
		$data['user_id'] = $user_id;
		$data['receipt_url'] = $receipt_url;

		$this->load->view('admin/layout/header');
		$this->load->view('admin/generate_pdf', $data);
		$this->load->view('admin/layout/footer');
	}

	public function randomPassword()
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

	public function uploadCSV()
	{

		// dd("here");

		$uploadPath = './upload/imports/';
		if (!is_dir($uploadPath)) {
			mkdir($uploadPath, 0777, TRUE); // FOR CREATING DIRECTORY IF ITS NOT EXIST
		}

		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'csv';
		$config['max_size'] = 1000000000000000000000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('upload')) {
			$fileData = $this->upload->data();
			// dd($fileData);
			return $fileData['file_name'];
		} else {
			return false;
		}
	}
	
	public function uploadxlsx()
	{

		// dd("here");

		$uploadPath = './upload/imports/';
		if (!is_dir($uploadPath)) {
			mkdir($uploadPath, 0777, TRUE); // FOR CREATING DIRECTORY IF ITS NOT EXIST
		}

		$config['upload_path'] = $uploadPath;
		$config['allowed_types'] = 'xlsx';
		$config['max_size'] = 1000000000000000000000;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ($this->upload->do_upload('upload')) {
			$fileData = $this->upload->data();
			// dd($fileData);
			return $fileData['file_name'];
		} else {
			return false;
		}
	}
}
