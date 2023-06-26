<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{

	//Get Login Detail of super admin
	public function get_admin_login_detail($user_uid = null)
	{

		$q = $this->db->get_where('admins', array('email' => $user_uid['email'], 'password' => $user_uid['password'], 'status' => 1));

		if ($q->num_rows() > 0) {
			$adminDetails = $q->result_array();
			$adminDetails[0]['role'] = 1;
			return $adminDetails;
		} else {
			return FALSE;
		}
	}
	public function saveData($table, $data)
	{
		$qry = $this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	/**
	 * fetch admin details
	 */
	public function getAdminDetailsByUserID($user_id)
	{
		$q = $this->db->get_where('admins', ['user_id' => $user_id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	/**
	 * Update Admin profile
	 */

	public function updateAdminProfile($uid, $data)
	{
		$this->db->where('user_id', $uid);
		return $this->db->update('admins', $data);
	}

	// public function getData($table_name, $cond, $id = false) {
	//     if(!empty($id)) {
	//         $query = $this->db
	//             ->select('*')
	//             ->from($table_name)
	//             ->where($cond)
	//             ->get() 
	//             ->row_array();
	//     } else {
	//         $query  = $this->db
	//             ->select('*')
	//             ->from($table_name)
	//             ->where($cond)
	//             ->get()
	//             ->result_array();
	//     }
	//     return $query;
	// }

	/**
	 * Change admin password
	 */
	public function updateLoginPassword($uid, $oldPass, $new_password)
	{
		$value = array('password' => $new_password);
		$this->db->where(array('user_id' => $uid, 'password' => $oldPass));
		return $this->db->update('admins', $value);
	}

	/**
	 * save reset code 
	 */
	public function putresetcode($email, $info)
	{
		$this->db->where('email', $email);
		return $this->db->update('admins', $info);
	}

	/**
	 * fetch user info by reset code
	 */

	public function getAdminInfoByResetCode($reset_code)
	{
		$q = $this->db->get_where('admins', ['reset_code' => $reset_code]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	/**
	 * reset user password
	 */
	public function reset_password($uid, $new_password)
	{
		// echo($new_password);die;
		$value = array('password' => $new_password);
		$this->db->where(array('user_id' => $uid));
		return $this->db->update('admins', $value);
	}


	/**
	 * Create annual exchange rate
	 */
	public function createAnnualExchangeRate($data)
	{
		$this->db->insert('annual_exchange_rates', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Fetch all records of annual exchange rates
	 */

	public function getAllAnnualExchangeRate()
	{
		$q = $this->db->get_where('annual_exchange_rates', ['status' => 1]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * Fetch annual exchange rate by year and currency
	 */
	public function fetchAnnualExchangeRate($currency, $year)
	{
		// echo $currency, $year;die;
		$q = $this->db->get_where('annual_exchange_rates', ['currency' => $currency, 'year' => $year]);
		if ($q->num_rows() > 0) {
			// print_r($q->result_array());die;
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * Fetch annual exchange rate by id
	 */
	public function fetchAnnualExchangeRateById($id)
	{
		$q = $this->db->get_where('annual_exchange_rates', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * update annual exchange rate
	 */
	public function updateAnnualExchangeRate($id, $data)
	{
		$this->db->where(array('id' => $id));
		return $this->db->update('annual_exchange_rates', $data);
	}

	/**
	 * delete exchange rate by id
	 */

	public function deleteExchangeRateById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('annual_exchange_rates');
	}



	/**
	 * save currency data in currencies table
	 */
	public function addCurrency($data)
	{
		$this->db->insert('currencies', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Fetch all currency data whose status are active
	 */
	public function getAllCurrency()
	{
		$q = $this->db->get_where('currencies', ['status' => 1]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * Fetch currency by name and currency code
	 */
	public function fetchCurrency($currency, $year)
	{
		$q = $this->db->get_where('currencies', ['currency' => $currency, 'year' => $year]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * save minimum wage data in minimum_wages table
	 */
	public function addMinimumWage($data)
	{
		$this->db->insert('minimum_wages', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Fetch all min wage data whose status are active
	 */
	public function getAllMinimumWages()
	{
		$q = $this->db->get_where('minimum_wages', ['status' => 1]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * Fetch annual exchange rate by id
	 */
	public function fetchMinimumWageById($id)
	{
		$q = $this->db->get_where('minimum_wages', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}


	/**
	 * update annual exchange rate
	 */
	public function updateMinimumWage($id, $data)
	{
		$this->db->where(array('id' => $id));
		return $this->db->update('minimum_wages', $data);
	}


	/**
	 * delete min wage by id
	 */

	public function deleteMinWageById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('minimum_wages');
	}


	/**
	 * Fetch currency by id
	 */
	public function fetchCurrencyById($id)
	{
		$q = $this->db->get_where('currencies', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * delete currency by id
	 */

	public function deleteCurrencyById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('currencies');
	}

	/**
	 * update annual exchange rate
	 */
	public function updateCurrency($id, $data)
	{
		$this->db->where(array('id' => $id));
		return $this->db->update('currencies', $data);
	}

	/**
	 * create users
	 */

	public function createUser($data)
	{
		$this->db->insert('users', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Fetch all users data
	 */
	public function getAllUsers()
	{
		$q = $this->db->get('users');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * Fetch user by id
	 */
	public function fetchUserById($id)
	{
		$q = $this->db->get_where('users', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * delete user by id
	 */

	public function deleteUserById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('users');
	}

	public function updateUser($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	}

	/**
	 * update users' status
	 */

	public function updateUserStatus($id, $status)
	{
		$this->db->where('id', $id);
		return $this->db->update('users', ['status' => $status]);
	}

	/**
	 * save pricing rental in master_pricing_rentals table
	 */
	public function savePricingRental($data)
	{
		$this->db->insert('master_pricing_rentals', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Fetch all rental pricing data
	 */
	public function getAllRental()
	{
		$q = $this->db->get('master_pricing_rentals');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * Fetch all records from any table
	 */
	public function getAllData($table)
	{
		$q = $this->db->get($table);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * delete data by id from any table
	 */

	public function deleteDataById($table, $id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($table);
	}

	/**
	 * Fetch data from any table by id
	 */
	public function fetchDataById($table, $id)
	{
		$q = $this->db->get_where($table, ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
		return FALSE;
	}

	/**
	 * update data in any table using id
	 */
	public function updateData($table, $id, $data)
	{
		// echo $id;die;
		$this->db->where(array('id' => $id));
		return $this->db->update($table, $data);
	}

	/**
	 * save in any table
	 */
	public function saveRecord($table, $data)
	{
		$this->db->insert($table, $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	public function fetchClients()
	{
		$q = $this->db->query('SELECT id,name, personal_number FROM personal_data');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	/**
	 * delete Client data by personal_id
	 */

	public function deleteClientById($id)
	{
		// echo $id;die;
		$this->db->where('personal_data.id', $id);
		$this->db->delete('personal_data');
		$this->db->where('personal_data_id', $id);
		$deleted = $this->db->delete([
			'rent_income_type', 'crypto_income_type', 'divident_income_type', 'hotel_rental_income_type', 'stocks_income_type',
			'info_verification_dividents', 'info_verification_crypto', 'info_verification_hotels', 'info_verification_rentals', 'info_verification_stocks', 'ong_lists'
		]);
		if ($deleted)
			return true;
		return false;
	}
	/**
	 * update ONG approval
	 */

	public function approveOng($id, $status)
	{
		$this->db->where('id', $id);
		return $this->db->update('ong_lists', ['approved' => $status]);
	}

	public function getAllBnrData()
	{
		$q = $this->db->get('bnr_exchange_rates');
		if ($q->num_rows() > 0)
			return $q->result_array();
		return false;
	}

	public function fetchBnrById($id)
	{
		$q = $this->db->get_where('bnr_exchange_rates', ['id' => $id]);
		if ($q->num_rows() > 0)
			return $q->result_array();
		return false;
	}

	public function updateBNR($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('bnr_exchange_rates', $data);
	}

	public function deleteBNRById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('bnr_exchange_rates');
	}

	public function fetchClientRentIncome($personal_data_id)
	{
		$q = $this->db->query('SELECT * FROM rent_income_type WHERE personal_data_id = ' . $personal_data_id . ' ORDER BY id DESC');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchClientRentIncomeById($id)
	{
		$q = $this->db->query('SELECT * FROM rent_income_type WHERE id = ' . $id);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function updateClientRentIncome($data)
	{
		// echo "<pre>";print_r($data);
		// var_dump($this->db->update_batch('rent_income_type', $data, 'id'));die;
		if ($this->db->update_batch('rent_income_type', $data, 'id')) {
			return true;
		}
		return false;
	}

	public function fetchClientRentVerification($id)
	{
		$q = $this->db->query('SELECT * FROM info_verification_rentals WHERE personal_data_id = ' . $id);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchClientHotelIncome($personal_data_id)
	{
		$q = $this->db->query('SELECT * FROM hotel_rental_income_type WHERE personal_data_id = ' . $personal_data_id . ' ORDER BY id DESC');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function updateClientHotelIncome($data)
	{
		// echo "<pre>";print_r($data);
		// var_dump($this->db->update_batch('rent_income_type', $data, 'id'));die;
		if ($this->db->update_batch('hotel_rental_income_type', $data, 'id')) {
			return true;
		}
		return false;
	}

	public function fetchClientHotelVerification($id)
	{
		$q = $this->db->query('SELECT * FROM info_verification_hotels WHERE personal_data_id = ' . $id);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchCryptoIncome($id)
	{
		$q = $this->db->query('SELECT * FROM crypto_income_type WHERE personal_data_id = ' . $id . ' ORDER BY id DESC');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchDividentIncome($id)
	{
		$q = $this->db->query('SELECT * FROM divident_income_type WHERE personal_data_id = ' . $id . ' ORDER BY id DESC');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchClientStockVerification($id)
	{
		$q = $this->db->query('SELECT * FROM info_verification_stocks WHERE personal_data_id = ' . $id);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchClientDividentVerification($id)
	{
		$q = $this->db->query('SELECT * FROM info_verification_dividents WHERE personal_data_id = ' . $id);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function fetchClientCryptoVerification($id)
	{
		$q = $this->db->query('SELECT * FROM info_verification_crypto WHERE personal_data_id = ' . $id);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function	getOngDataByVerification($data)
	{
		$personal_data_id = $data['personal_data_id'];
		$info_verification_id = $data['info_verification_id'];
		$info_verf_type = $data['info_verf_type'];
		$q = $this->db->query("SELECT * FROM info_verification_ong WHERE (`personal_data_id` LIKE '$personal_data_id') AND (`info_verification_id` LIKE '$info_verification_id') AND (`info_verification_type` LIKE '$info_verf_type')");
		if ($q->num_rows() > 0) {
			$d = $q->row_array();
			$ong = $this->fetchOngById($d['ong_id']);
			return $ong;
		} else {
			return FALSE;
		}
	}

	public function fetchOngById($id)
	{
		$q = $this->db->get_where('ong_lists', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function update_ong($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('ong_lists', $data);
	}

	public function importCounty($record)
	{
		// dd($record);
		if (count($record) > 0) {

			// Check existing record
			$this->db->select('*');
			$this->db->where(['county_name' => $record[0], 'city_name' => $record[1]]);
			$q = $this->db->get('counties');
			$response = $q->result_array();
			// dd($response);

			// Insert record
			if (count($response) == 0) {
				$county = array(
					"county_name" => trim($record[0]),
					"city_name" => trim($record[1]),
					"created_at" => date("Y-m-d H:i:s"),
				);

				$this->db->insert('counties', $county);
			}
		}
	}

	public function getCountyData()
	{
		$q = $this->db->get('counties');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function deleteCountyById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('counties');
	}

	public function fetchCounty($data)
	{
		$q = $this->db->get_where('counties', $data);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function fetchCountyById($id)
	{
		$q = $this->db->get_where('counties', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function updateCounty($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('counties', $data);
	}

	public function insertCounty($data)
	{
		$this->db->insert('counties', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	public function updateCountyStatus($id, $value)
	{
		$this->db->where('id', $id);
		return $this->db->update('counties', ['status' => $value]);
	}


	public function deactivateCounty($record)
	{
		if (count($record) > 0) {

			// Check existing record
			$this->db->select('*');
			$this->db->where(['county_name' => $record[0], 'city_name' => $record[1]]);
			return $this->db->update('counties', ['status' => 0]);
		}
	}

	public function activateCounty($record)
	{
		if (count($record) > 0) {
			// Check existing record
			$this->db->select('*');
			$this->db->where(['county_name' => $record[0], 'city_name' => $record[1]]);
			return $this->db->update('counties', ['status' => 1]);
		}
	}

	public function updateCountyCSV($record)
	{
		// Check existing record
		$this->db->select('*');
		$this->db->where(['id' => $record[0]]);
		return $this->db->update('counties', ['county_name' => $record[1], 'city_name' => $record[2]]);
	}

	public function deleteAllCounties()
	{
		return $this->db->empty_table('counties');
	}

	/**
	 * 
	 * ########## CAEN Code ##########
	 * 
	 */

	public function getCaenData()
	{
		$q = $this->db->get('caen_codes');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function importCaenCodes($record)
	{
		if (count($record) > 0) {

			// Check existing record
			$this->db->select('*');
			$this->db->where('code', $record[0]);
			$q = $this->db->get('caen_codes');
			$response = $q->result_array();

			// Insert record
			if (count($response) == 0) {
				$caen = array(
					"code" => preg_replace('/[^0-9]/', '', $record[0]),
					"description" => trim($record[1]),
					"created_at" => date("Y-m-d H:i:s"),
				);

				$this->db->insert('caen_codes', $caen);
			}
		}
	}
	

	public function updateCaenCSV($record)
	{
		// Check existing record
		$this->db->select('*');
		$this->db->where(['id' => $record[0]]);
		return $this->db->update('caen_codes', ['code' => $record[1], 'description' => $record[2]]);
	}

	public function deleteAllCaen()
	{
		return $this->db->empty_table('caen_codes');
	}

	public function deactivateCaen($record)
	{
		if (count($record) > 0) {

			$this->db->where(['caen_code' => $record[0]]);
			$this->db->update('income_norms_tax', ['status' => 0]);
			// Check existing record
			$this->db->select('*');
			$this->db->where(['code' => $record[0]]);
			return $this->db->update('caen_codes', ['status' => 0]);
		}
	}

	public function activateCaen($record)
	{
		if (count($record) > 0) {

			$this->db->where(['caen_code' => $record[0]]);
			$this->db->update('income_norms_tax', ['status' => 1]);
			// Check existing record
			$this->db->select('*');
			$this->db->where(['code' => $record[0]]);
			return $this->db->update('caen_codes', ['status' => 1]);
		}
	}

	public function fetchCaenById($id)
	{
		$q = $this->db->get_where('caen_codes', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function updateCaen($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('caen_codes', $data);
	}

	public function deleteCaenById($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('caen_codes');
	}

	public function insertCaen($data)
	{
		$this->db->insert('caen_codes', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	public function updateCaenStatus($id, $value)
	{
		$this->db->where('id', $id);
		return $this->db->update('caen_codes', ['status' => $value]);
	}

	/**
	 * ============== Variables ==============
	 */
	public function save_variables($data)
	{
		$this->db->insert('variables', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	public function getVariablesList()
	{
		$q = $this->db->get('variables');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function save_variant($data)
	{
		$this->db->insert('variants', $data);
		if ($this->db->affected_rows() == '1') {
			return $this->db->insert_id();
		}
		return FALSE;
	}

	public function getVariantsList()
	{
		$q = $this->db->get('variants');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function deleteVariantById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('variants');
	}

	public function deleteVariableById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('variables');
	}

	public function getVariantById($id)
	{
		$q = $this->db->get_where('variants', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function getVariableById($id)
	{
		$q = $this->db->get_where('variables', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function update_variable($id, $data)
	{
		// dd($data);
		$this->db->where('id', $id);
		return $this->db->update('variables', $data);
	}

	public function update_variant($id, $data)
	{
		// dd($data);
		$this->db->where('id', $id);
		return $this->db->update('variants', $data);
	}

	public function getCountiesNames()
	{
		$q = $this->db->query("SELECT county_name FROM counties GROUP BY county_name ORDER BY county_name");
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchCitiesByCounty($county)
	{
		// dd($county);
		$q = $this->db->query("SELECT city_name FROM counties WHERE county_name = '$county'");
		if ($q->num_rows() > 0) {
			$array1 = $q->result_array();
			$arr = array_map(function ($value) {
				return $value['city_name'];
			}, $array1);
			return $arr;
		} else {
			return FALSE;
		}
	}

	public function getPendingVariable()
	{
		$q = $this->db->query("SELECT * FROM variables WHERE `has_variants` = 0 ORDER BY id DESC LIMIT 1");
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function saveVariableVariantRelation($data)
	{
		$this->db->insert('variable_variants', $data);
		if ($this->db->affected_rows() == '1') {
			return $this->db->insert_id();
		}
		return FALSE;
	}

	public function checkVariableHasVariant($variable_id)
	{
		$q = $this->db->query("SELECT * FROM variable_variants WHERE `variable_id` = $variable_id");
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function finalSubmitVariable($variable_id)
	{
		// dd($variable_id);
		$this->db->where('id', $variable_id);
		return $this->db->update('variables', ['has_variants' => 1]);
	}

	public function getVariableVariant($variant_id)
	{
		$q = $this->db->get_where('variable_variants', ['variant_id' => $variant_id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function fetchIncomeNormsTax($data)
	{
		$q = $this->db->get_where('income_norms_tax', $data);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function getImportCompletedColumns()
	{
		$q = $this->db->query("SELECT * FROM income_norms_column_details WHERE `has_template` = 0 AND `has_caen_tax_import` = 1 GROUP BY `column_name` DESC");
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function getPendingColumn()
	{
		$q = $this->db->query("SELECT * FROM income_norms_column_details WHERE `has_template` = 0 AND `has_caen_tax_import` = 0 GROUP BY `column_name` DESC");
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function updateColumnDetails($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('income_norms_column_details', $data);
	}

	public function getColDetailsByCountyCity($county, $city)
	{
		$q = $this->db->get_where('income_norms_column_details', ['county_name' => $county, 'city_name' => $city]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function getVariantsByVariableId($variable_id)
	{
		// dd($variable_id);
		$q = $this->db->query("SELECT variable_variants.id as vvid, variable_variants.variable_id, variable_variants.variant_id, variants.* FROM variable_variants 
									INNER JOIN variants 
										ON variable_variants.variant_id = variants.id 
									WHERE variable_variants.variable_id = $variable_id");
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function saveTemplate($data)
	{
		$columnDetails = json_decode($data['columnDetails']);
		$insrtCols = [];
		// d($columnDetails);
		// dd($data);

		if ($data['template_name']) {
			// insert template info (table : income_norms_templates)
			$this->db->insert('income_norms_templates', ['template_name' => $data['template_name'], 'created_at' => date('Y-m-d H:i:s')]);
			$inserted_id = $this->db->insert_id();
			if ($inserted_id) {
				// now add column details into db (table : income_norms_column_details)
				if (count($columnDetails) > 0) {
					foreach ($columnDetails as $column) {
						foreach ($column->counties_cities as $c) {
							if(is_array($c)){
								array_push($insrtCols, ['county_name' => $c[0], 'city_name' => $c[1], 'column_name' => $column->column_name, 'template_id' => $inserted_id, 'created_at' => date('Y-m-d H:i:s')]);
							}
							else {
								array_push($insrtCols, ['county_name' => $c->county_name, 'city_name' => $c->city_name, 'column_name' => $column->column_name, 'template_id' => $inserted_id, 'created_at' => date('Y-m-d H:i:s')]);
							}
						}
					}
					if ($insrtCols) {
						$countBatch = count($insrtCols);
						$this->db->insert_batch('income_norms_column_details', $insrtCols);
						$first_id = $this->db->insert_id();
						$last_id = $first_id + ($countBatch - 1);
						// when columns are inserted, get their IDs and put in db (table : column_details_template_map)
						$temp_cols = [];
						for ($i = $first_id; $i <= $last_id; $i++) {
							array_push($temp_cols, ['template_id' => $inserted_id, 'column_details_id' => $i]);
						}
						if (count($temp_cols) > 0) {
							$this->db->insert_batch('column_details_template_map', $temp_cols);
							return ['template_id' => $inserted_id,'col_details_first_id' => $first_id, 'col_details_last_id' => $last_id];
						}
					}
				} 
				else {
					return false;
				}
				return TRUE;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function getTemplatesList()
	{
		$query = 'SELECT income_norms_templates.id as templt_pkey, income_norms_templates.*, income_norms_column_details.id as col_detls_pkey, income_norms_column_details.* 
					FROM income_norms_templates
					INNER JOIN income_norms_column_details ON income_norms_templates.id = income_norms_column_details.template_id';
		$q = $this->db->query($query);
		if ($q->num_rows() > 0) {
			$templates =  $q->result_array();
			return $templates;
		} else {
			return FALSE;
		}
	}

	public function getTemplateById($id)
	{
		$q = $this->db->get_where('income_norms_templates', ['id' => $id]);
		if ($q->num_rows() > 0) {
			// return $q->row_array();
			// dd($q->row_array());
			$templateInfo = $q->row_array();
			if($templateInfo) {
				$temp_id = $templateInfo['id'];
				$q2 = $this->db->query("SELECT * FROM income_norms_column_details
											WHERE template_id = $temp_id
												GROUP BY income_norms_column_details.column_name
											");
				if($q2->num_rows() > 0) {
					$temp_cols = $q2->result_array();
					// dd($temp_cols);
					foreach ($temp_cols as $t) {
						$q3 = $this->db->query("SELECT income_norms_column_details.county_name, income_norms_column_details.city_name FROM income_norms_column_details 
													WHERE template_id = $temp_id 
													AND income_norms_column_details.column_name = ".$t['column_name']
												);
						$col_cc = $q3->result_array();
						$templateInfo['col_details'][] = ['column_name' => $t['column_name'], 'counties_cities' => $col_cc];
					}
					// dd($templateInfo);
					// $templateInfo['col_details'] = $temp_cols;

					return $templateInfo;
				}				
			}
			else {
				return false;
			}
		} else {
			return FALSE;
		}
	}

	public function updateTemplate($data)
	{
		$this->db->where('id', $data['id']);
		return $this->db->update('income_norms_templates', ['template_name' => $data['template_name']]);
	}

	public function getTemplateColumnsColumns($template_id)
	{
		$query = 'SELECT income_norms_column_details.* FROM template_columns
						INNER JOIN income_norms_column_details 
							ON template_columns.column_details_id = income_norms_column_details.id
						WHERE template_columns.template_id = ' . $template_id;
		$q = $this->db->query($query);
		if ($q->num_rows() > 0) {
			$templates =  $q->result_array();
			// dd($templates);
			return $templates;
		} else {
			return FALSE;
		}
	}

	public function getCoeffVariableForNormaIncome($data)
	{
		// d("in model");
		// dd($data);
		$finalData = [];
		$query = 'SELECT * FROM coefficient_variables
						INNER JOIN coeff_county_cities 
							ON coefficient_variables.id = coeff_county_cities.coeff_id
						INNER JOIN coeff_caen 
							ON coefficient_variables.id = coeff_caen.coeff_id
						WHERE coeff_county_cities.county_name = "'.$data['county'].'"
							AND coeff_county_cities.city_name = "'.$data['city'].'" 
							AND coeff_caen.caen_code = '.$data['caen'].'
						';
						
						// INNER JOIN coeff_variable_variants 
						// 	ON coefficient_variables.id = coeff_variable_variants.coeff_id';
						// WHERE template_columns.template_id = ' . $template_id;
		$q = $this->db->query($query);
		if ($q->num_rows() > 0) {
			$templates =  $q->result_array();
			$finalData['coeffDetails'] = $templates;
			
			$q2 = $this->db->query('SELECT * FROM coefficient_variables 
						INNER JOIN coeff_variable_variants
							ON coefficient_variables.id = coeff_variable_variants.coeff_id
						INNER JOIN variables
							ON coeff_variable_variants.variable_id = variables.id
						WHERE coefficient_variables.coef_option = "Decrease"
						GROUP BY variable_id
						LIMIT 2
					');
			$finalData['dec_variables'] = [];
			if($q2->num_rows() > 0) {
				$dec_variables = $q2->result_array();
				$finalData['dec_variables'] = $dec_variables;
			}
			
			$q21 = $this->db->query('SELECT * FROM coefficient_variables 
						INNER JOIN coeff_variable_variants
							ON coefficient_variables.id = coeff_variable_variants.coeff_id
						INNER JOIN variables
							ON coeff_variable_variants.variable_id = variables.id
						WHERE coefficient_variables.coef_option = "Increase"
						GROUP BY variable_id
						LIMIT 2
					');
			$finalData['inc_variables'] =[];
			if($q21->num_rows() > 0) {
				$inc_variables = $q21->result_array();
				$finalData['inc_variables'] = $inc_variables;
			}
			
			$q3 = $this->db->query('SELECT * FROM coefficient_variables
						INNER JOIN coeff_variable_variants
							ON coefficient_variables.id = coeff_variable_variants.coeff_id
						INNER JOIN variants
							ON coeff_variable_variants.variant_id = variants.id
						WHERE coefficient_variables.coef_option = "Decrease"
							AND variants.display_on_frontend=\'Always_Yes\'
							OR variants.display_on_frontend=\'Yes\'
						ORDER BY coeff_variable_variants.variable_id, variants.name
					');
			if($q3->num_rows() > 0) {
				$variants = $q3->result_array();
				$finalData['variants'] = $variants;
			}
			else {
				return false;
			}

			return $finalData;


		} else {
			return FALSE;
		}
	}

	public function fetchColumnDetailsById($id)
	{
		$q = $this->db->get_where('income_norms_column_details', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function updateColumnDetailsById($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('income_norms_column_details', $data);
	}

	public function deleteColumnDetailsById($id)
	{
		$this->db->where('column_details_id', $id);
		$this->db->delete('column_details_template_map');

		$this->db->where('id', $id);
		return $this->db->delete('income_norms_column_details');
	}

	public function deleteTemplateById($template_id)
	{
		$this->db->where('template_id', $template_id);
		$this->db->delete('column_details_template_map');

		$this->db->where('template_id', $template_id);
		return $this->db->delete('income_norms_column_details');
		
		$this->db->where('template_id', $template_id);
		$this->db->delete('income_norms_tax');

		$this->db->where('id', $template_id);
		return $this->db->delete('income_norms_templates');
	}

	public function getCaenCodesList()
	{
		$query = 'SELECT * FROM caen_codes WHERE `status`=1 ORDER BY code';
		$q = $this->db->query($query);
		if ($q->num_rows() > 0) {
			$codes =  $q->result_array();
			return $codes;
		} else {
			return FALSE;
		}
	}
	
	public function getAllCaenCodes()
	{
		$query = 'SELECT * FROM caen_codes ORDER BY code';
		$q = $this->db->query($query);
		if ($q->num_rows() > 0) {
			$codes =  $q->result_array();
			return $codes;
		} else {
			return FALSE;
		}
	}

	public function getNormaIncome($data)
	{
		$data = (object)$data;
		// dd($data);
		$qn = $this->db->query("SELECT * FROM `income_norms_tax_columns` 
									INNER JOIN income_norms_column_details 
										ON income_norms_tax_columns.column_details_id = income_norms_column_details.id 
									INNER JOIN income_norms_tax 
										ON income_norms_tax_columns.tax_id = income_norms_tax.id 
									WHERE income_norms_column_details.county_name='$data->county' 
										AND income_norms_column_details.city_name='$data->city' 
										AND income_norms_tax.caen_code='$data->caen' 
										AND income_norms_tax.status='1'
									LIMIT 1
									");
		if ($qn->num_rows() > 0) {
			$incomeN =  $qn->row_array();
			return $incomeN;
		} else {
			return FALSE;
		}
	}

	public function saveCoeffDetails($data)
	{
		// dd($data);
		$qry = $this->db->insert('coefficient_variables', $data);
		return $this->db->insert_id();
	}

	public function getCoefficientsList()
	{
		$q = $this->db->get('coefficient_variables');
		if ($q->num_rows() > 0) {
			$codes =  $q->result_array();
			return $codes;
		} else {
			return FALSE;
		}
	}

	function getCoeffCaen($coeff_id)
	{
		// $q = $this->db->get_where('coeff_caen', ['coeff_id' => $coeff_id]);
		$q = $this->db->query("SELECT coeff_caen.id, coeff_caen.coeff_id, LPAD(caen_code, 4, '0') AS caen_code, coeff_caen.status FROM coeff_caen WHERE coeff_id=$coeff_id");
		if ($q->num_rows() > 0) {
			$codes =  $q->result_array();
			// dd($codes);
			return $codes;
		} else {
			return FALSE;
		}
	}

	function getCoeffCountyCities($coeff_id)
	{
		// $q = $this->db->get_where('coeff_county_cities', ['coeff_id' => $coeff_id]);
		$q = $this->db->query("SELECT * FROM coeff_county_cities WHERE coeff_id = $coeff_id GROUP BY `county_name`");
		if ($q->num_rows() > 0) {
			$codes =  $q->result_array();
			return $codes;
		} else {
			return FALSE;
		}
	}
	
	function getCoeffCities($coeff_id)
	{
		// $q = $this->db->get_where('coeff_county_cities', ['coeff_id' => $coeff_id]);
		$q = $this->db->query("SELECT city_name FROM coeff_county_cities WHERE coeff_id = $coeff_id");
		if ($q->num_rows() > 0) {
			$codes =  $q->result_array();
			return $codes;
		} else {
			return FALSE;
		}
	}

	function getCoeffVariables($coeff_id)
	{
		// $q = $this->db->get_where('coeff_variable_variants', ['coeff_id' => $coeff_id]);
		$q = $this->db->query("SELECT * FROM coeff_variable_variants INNER JOIN variables ON coeff_variable_variants.variable_id = variables.id WHERE coeff_variable_variants.coeff_id = $coeff_id GROUP BY variables.name");
		if ($q->num_rows() > 0) {
			$codes =  $q->result_array();
			return $codes;
		} else {
			return FALSE;
		}
	}

	function getCoeffVariants($coeff_id)
	{
		// $q = $this->db->get_where('coeff_variable_variants', ['coeff_id' => $coeff_id]);
		$q = $this->db->query("SELECT * FROM coeff_variable_variants RIGHT JOIN variants ON coeff_variable_variants.variant_id = variants.id WHERE coeff_variable_variants.coeff_id = $coeff_id");
		if ($q->num_rows() > 0) {
			$codes =  $q->result_array();
			return $codes;
		} else {
			return FALSE;
		}
	}

	/**
	 * Delete coefficient details by id
	 *
	 * @param int $id
	 * @return boolean
	 */
	public function deleteCoefficientDetailsById($id)
	{
		$this->db->where('coeff_id', $id);
		$this->db->delete('coeff_variable_variants');

		$this->db->where('coeff_id', $id);
		$this->db->delete('coeff_caen');

		$this->db->where('coeff_id', $id);
		$this->db->delete('coeff_county_cities');

		$this->db->where('id', $id);
		return $this->db->delete('coefficient_variables');
	}

	public function updateCoeffDetails($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('coefficient_variables', $data);
	}

	public function saveInfoBlock($data)
	{
		// dd($data);
		$inserted_id = '';

		$pensionData['calculation_method_name'] = $data['calculation_method_name'];
		$pensionData['frontend_block_name'] = $data['frontend_block_name'];
		$pensionData['frontend_position'] = $data['frontend_position'];

		if (!empty($data['id'])) {
			$this->db->where('id', $data['id']);
			$this->db->update('pension_mandatory_blocks', $pensionData);
			$inserted_id = $data['id'];
			$this->db->truncate('pension_mandatory_income_types');
		} else {
			$pensionData['created_at'] = date("Y-m-d H:i:s");
			$qry = $this->db->insert('pension_mandatory_blocks', $pensionData);
			$inserted_id = $this->db->insert_id();
		}


		$income_type = $data['incomeTypeTIPM'];
		$countIncomes = count($income_type);

		$insrtdCount = 0;
		$notInserted = [];

		foreach ($income_type as $income) {
			$relData['pension_id'] = $inserted_id;
			$relData['income_name'] = $income;
			$relData['income_field'] = $data[strtolower($income) . '_field'];
			$relData['created_at'] = date('Y-m-d H:i:s');

			$qry2 = $this->db->insert('pension_mandatory_income_types', $relData);
			if ($this->db->affected_rows() == '1') {
				$insrtdCount++;
			}
		}

		if ($insrtdCount == $countIncomes) {
			return true;
		} else {
			return $notInserted;
		}
	}

	public function getPensionMandatory()
	{
		$q = $this->db->get('pension_mandatory_blocks');
		if ($q->num_rows() > 0) {
			$data = $q->row_array();

			$q2 = $this->db->get('pension_mandatory_income_types');
			if ($q2->num_rows() > 0) {
				$data['incomes'] = $q2->result_array();
			}
			return $data;
		} else {
			return FALSE;
		}
	}


	public function savePensionOptionalBlock($data)
	{
		// dd($data);	
		$inserted_id = '';

		$pensionData['calculation_method_name'] = $data['calculation_method_name'];
		$pensionData['frontend_block_name'] = $data['frontend_block_name'];
		$pensionData['frontend_position'] = $data['frontend_position'];

		if (!empty($data['id'])) {
			$this->db->where('id', $data['id']);
			$this->db->update('pension_optional_blocks', $pensionData);
			$inserted_id = $data['id'];
			$this->db->truncate('pension_optional_income_types');
		} else {
			$pensionData['created_at'] = date("Y-m-d H:i:s");
			$qry = $this->db->insert('pension_optional_blocks', $pensionData);
			$inserted_id = $this->db->insert_id();
		}


		$income_type = $data['incomeTypeTIPO'];
		$countIncomes = count($income_type);

		$insrtdCount = 0;
		$notInserted = [];

		foreach ($income_type as $income) {
			$relData['pension_id'] = $inserted_id;
			$relData['income_name'] = $income;
			$relData['income_field'] = $data[strtolower($income) . '_field'];
			$relData['created_at'] = date('Y-m-d H:i:s');

			$qry2 = $this->db->insert('pension_optional_income_types', $relData);
			if ($this->db->affected_rows() == '1') {
				$insrtdCount++;
			}
		}

		if ($insrtdCount == $countIncomes) {
			return true;
		} else {
			return $notInserted;
		}
	}

	public function getPensionOptional()
	{
		$q = $this->db->get('pension_optional_blocks');
		if ($q->num_rows() > 0) {
			$data = $q->row_array();

			$q2 = $this->db->get('pension_optional_income_types');
			if ($q2->num_rows() > 0) {
				$data['incomes'] = $q2->result_array();
			}
			return $data;
		} else {
			return FALSE;
		}
	}


	public function saveHealthMandatoryBlock($data)
	{
		// dd($data);
		$inserted_id = '';

		$pensionData['calculation_method_name'] = $data['calculation_method_name'];
		$pensionData['frontend_block_name'] = $data['frontend_block_name'];
		$pensionData['frontend_position'] = $data['frontend_position'];

		if (!empty($data['id'])) {
			$this->db->where('id', $data['id']);
			$this->db->update('health_mandatory_blocks', $pensionData);
			$inserted_id = $data['id'];
			$this->db->truncate('health_mandatory_income_types');
		} else {
			$pensionData['created_at'] = date("Y-m-d H:i:s");
			$qry = $this->db->insert('health_mandatory_blocks', $pensionData);
			$inserted_id = $this->db->insert_id();
		}


		$income_type = $data['incomeTypeTIHM'];
		$countIncomes = count($income_type);

		$insrtdCount = 0;
		$notInserted = [];

		foreach ($income_type as $income) {
			$relData['health_id'] = $inserted_id;
			$relData['income_name'] = $income;
			$relData['income_field'] = $data[strtolower($income) . '_field'];
			$relData['created_at'] = date('Y-m-d H:i:s');

			$qry2 = $this->db->insert('health_mandatory_income_types', $relData);
			if ($this->db->affected_rows() == '1') {
				$insrtdCount++;
			}
		}

		if ($insrtdCount == $countIncomes) {
			return true;
		} else {
			return $notInserted;
		}
	}

	public function getHealthMandatory()
	{
		$q = $this->db->get('health_mandatory_blocks');
		if ($q->num_rows() > 0) {
			$data = $q->row_array();

			$q2 = $this->db->get('health_mandatory_income_types');
			if ($q2->num_rows() > 0) {
				$data['incomes'] = $q2->result_array();
			}
			return $data;
		} else {
			return FALSE;
		}
	}


	public function saveHealthOptionalBlock($data)
	{
		// dd($data);
		$inserted_id = '';

		$pensionData['calculation_method_name'] = $data['calculation_method_name'];
		$pensionData['frontend_block_name'] = $data['frontend_block_name'];
		$pensionData['frontend_position'] = $data['frontend_position'];

		if (!empty($data['id'])) {
			$this->db->where('id', $data['id']);
			$this->db->update('health_optional_blocks', $pensionData);
			$inserted_id = $data['id'];
			$this->db->truncate('health_optional_income_types');
		} else {
			$pensionData['created_at'] = date("Y-m-d H:i:s");
			$qry = $this->db->insert('health_optional_blocks', $pensionData);
			$inserted_id = $this->db->insert_id();
		}


		$income_type = $data['incomeTypeTIHO'];
		$countIncomes = count($income_type);

		$insrtdCount = 0;
		$notInserted = [];

		foreach ($income_type as $income) {
			$relData['health_id'] = $inserted_id;
			$relData['income_name'] = $income;
			$relData['income_field'] = $data[strtolower($income) . '_field'];
			$relData['created_at'] = date('Y-m-d H:i:s');

			$qry2 = $this->db->insert('health_optional_income_types', $relData);
			if ($this->db->affected_rows() == '1') {
				$insrtdCount++;
			}
		}

		if ($insrtdCount == $countIncomes) {
			return true;
		} else {
			return $notInserted;
		}
	}


	public function getHealthOptional()
	{
		$q = $this->db->get('health_optional_blocks');
		if ($q->num_rows() > 0) {
			$data = $q->row_array();

			$q2 = $this->db->get('health_optional_income_types');
			if ($q2->num_rows() > 0) {
				$data['incomes'] = $q2->result_array();
			}
			return $data;
		} else {
			return FALSE;
		}
	}

	public function savePFABlock($data)
	{
		// dd($data);

		$inserted_id = '';

		$pfaData['frontend_block_name'] = $data['frontend_block_name'];
		$pfaData['frontend_position'] = $data['frontend_position'];

		if (!empty($data['id'])) {
			// dd('here');
			$this->db->where('id', $data['id']);
			$this->db->update('pfa_data_blocks', $pfaData);
			$inserted_id = $data['id'];
			$this->db->truncate('pfa_data_income_types');
			$this->db->truncate('pfa_data_variable_variants');
			$this->db->truncate('pfa_data_variant_dd_options');
		} else {
			$pfaData['created_at'] = date("Y-m-d H:i:s");
			$qry = $this->db->insert('pfa_data_blocks', $pfaData);
			$inserted_id = $this->db->insert_id();
		}


		$income_type = $data['income_types'];
		$countIncomes = count($income_type);

		$insrtdCount = 0;
		$notInserted = [];


		foreach ($income_type as $income) {
			$relData['pfa_data_id'] = $inserted_id;
			$relData['income_name'] = $income;
			$relData['created_at'] = date('Y-m-d H:i:s');

			$qry2 = $this->db->insert('pfa_data_income_types', $relData);
			if ($this->db->affected_rows() == '1') {
				$insrtdCount++;
			}
		}

		$vrbls_vrnts = $data['variables_and_variants'];
		$insrtVrbArr = [];
		foreach ($vrbls_vrnts as $v) {
			$relVrbData['pfa_data_id'] = $inserted_id;
			$relVrbData['variable_id'] = $v->variable_id;
			$relVrbData['variant_id'] = $v->variant_id;
			$relVrbData['created_at'] = date('Y-m-d H:i:s');

			array_push($insrtVrbArr, $relVrbData);
		}

		$this->db->insert_batch('pfa_data_variable_variants', $insrtVrbArr);

		$vrntsOpts = [];
		foreach ($data['variants_dd_options'] as $d) {
			$relDDdata['variant_id'] = $d->variant_id;
			$relDDdata['variant_dd_option'] = $d->variant_dd_option;
			$relDDdata['created_at'] = date('Y-m-d H:i:s');

			array_push($vrntsOpts, $relDDdata);
		}

		$this->db->insert_batch('pfa_data_variant_dd_options', $vrntsOpts);

		return true;
	}

	public function savePFASpecBlock($data)
	{
		// dd($data);

		$inserted_id = '';

		$pfaData['frontend_block_name'] = $data['frontend_block_name'];
		$pfaData['frontend_position'] = $data['frontend_position'];

		if (!empty($data['id'])) {
			// dd('here');
			$this->db->where('id', $data['id']);
			$this->db->update('pfa_spec_data_blocks', $pfaData);
			$inserted_id = $data['id'];
			$this->db->truncate('pfa_spec_data_income_types');
			$this->db->truncate('pfa_spec_data_variable_variants');
			$this->db->truncate('pfa_spec_data_variant_dd_options');
		} else {
			$pfaData['created_at'] = date("Y-m-d H:i:s");
			$qry = $this->db->insert('pfa_spec_data_blocks', $pfaData);
			$inserted_id = $this->db->insert_id();
		}


		$income_type = $data['income_types'];
		$countIncomes = count($income_type);

		$insrtdCount = 0;
		$notInserted = [];


		foreach ($income_type as $income) {
			$relData['pfa_data_id'] = $inserted_id;
			$relData['income_name'] = $income;
			$relData['created_at'] = date('Y-m-d H:i:s');

			$qry2 = $this->db->insert('pfa_spec_data_income_types', $relData);
			if ($this->db->affected_rows() == '1') {
				$insrtdCount++;
			}
		}

		$vrbls_vrnts = $data['variables_and_variants'];
		$insrtVrbArr = [];
		foreach ($vrbls_vrnts as $v) {
			$relVrbData['pfa_data_id'] = $inserted_id;
			$relVrbData['variable_id'] = $v->variable_id;
			$relVrbData['variant_id'] = $v->variant_id;
			$relVrbData['created_at'] = date('Y-m-d H:i:s');

			array_push($insrtVrbArr, $relVrbData);
		}

		$this->db->insert_batch('pfa_spec_data_variable_variants', $insrtVrbArr);

		$vrntsOpts = [];
		foreach ($data['variants_dd_options'] as $d) {
			$relDDdata['variant_id'] = $d->variant_id;
			$relDDdata['variant_dd_option'] = $d->variant_dd_option;
			$relDDdata['created_at'] = date('Y-m-d H:i:s');

			array_push($vrntsOpts, $relDDdata);
		}

		$this->db->insert_batch('pfa_spec_data_variant_dd_options', $vrntsOpts);

		return true;
	}

	public function getPfaData()
	{
		$q = $this->db->get('pfa_data_blocks');
		if ($q->num_rows() > 0) {
			$data = $q->row_array();

			$q2 = $this->db->get('pfa_data_income_types');
			if ($q2->num_rows() > 0) {
				$data['incomes'] = $q2->result_array();
			}

			$q3 = $this->db->get('pfa_data_variable_variants');
			if ($q3->num_rows() > 0) {
				$data['variables_variants'] = $q3->result_array();
			}

			$q4 = $this->db->get('pfa_data_variant_dd_options');
			if ($q4->num_rows() > 0) {
				$data['variants_dd_options'] = $q4->result_array();
			}
			
			$q5 = $this->db->query('SELECT variant_id FROM pfa_data_variable_variants');
			if ($q5->num_rows() > 0) {
				$data['variants'] = [];
				$variants = $q5->result_array();
				foreach($variants as $v) {
					$data['variants'][] = $v['variant_id'];
				}				
			}

			return $data;
			// dd($data);
		} else {
			return FALSE;
		}
	}

	public function getPfaSpecData()
	{
		$q = $this->db->get('pfa_spec_data_blocks');
		if ($q->num_rows() > 0) {
			$data = $q->row_array();

			$q2 = $this->db->get('pfa_spec_data_income_types');
			if ($q2->num_rows() > 0) {
				$data['incomes'] = $q2->result_array();
			}

			$q3 = $this->db->get('pfa_spec_data_variable_variants');
			if ($q3->num_rows() > 0) {
				$data['variables_variants'] = $q3->result_array();
			}

			$q4 = $this->db->get('pfa_spec_data_variant_dd_options');
			if ($q4->num_rows() > 0) {
				$data['variants_dd_options'] = $q4->result_array();
			}

			return $data;
			// dd($data);
		} else {
			return FALSE;
		}
	}

	public function getPensionMandatoryIncomes()
	{
		$query = $this->db->query('SELECT income_name from pension_mandatory_income_types');
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
		}
		return $data;
	}
	
	public function getPensionOptionalIncomes()
	{
		$query = $this->db->query('SELECT income_name from pension_optional_income_types');
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
		}
		return $data;
	}
	
	public function getHealthMandatoryIncomes()
	{
		$query = $this->db->query('SELECT income_name from health_mandatory_income_types');
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
		}
		return $data;
	}
	
	public function getHealthOptionalIncomes()
	{
		$query = $this->db->query('SELECT income_name from health_optional_income_types');
		if ($query->num_rows() > 0) {
			$data = $query->result_array();
		}
		return $data;
	}

	public function getvarCAS($incomes, $personal_data_id, $venit_impozabil)
	{
		$varCAS = 0;
		if(count($incomes) > 0) {
			if(in_array('Rental', $incomes)) {
				$query = $this->db->query('SELECT taxable_income_2022 from info_verification_rentals WHERE personal_data_id='.$personal_data_id);
				if ($query->num_rows() > 0) {
					$rentalData = $query->row_array();
				}
				$varCAS += $rentalData['taxable_income_2022'] ?? 0;
			}
			if(in_array('Divident', $incomes)) {
				$query1 = $this->db->query('SELECT income_2022 from info_verification_dividents WHERE personal_data_id='.$personal_data_id);
				if ($query1->num_rows() > 0) {
					$divData = $query1->row_array();
				}
				$varCAS += $divData['income_2022'] ?? 0;
			}
			if(in_array('Stock', $incomes)) {
				$query2 = $this->db->query('SELECT income_2022 from info_verification_stocks WHERE personal_data_id='.$personal_data_id);
				if ($query2->num_rows() > 0) {
					$divData = $query2->row_array();
				}
				$varCAS += $divData['income_2022'] ?? 0;
			}
			if(in_array('Crypto', $incomes)) {
				$query3 = $this->db->query('SELECT income_2022 from info_verification_crypto WHERE personal_data_id='.$personal_data_id);
				if ($query3->num_rows() > 0) {
					$cryptoData = $query3->row_array();
				}
				$varCAS += $cryptoData['income_2022'] ?? 0;
			}
			if(in_array('Hotel', $incomes)) {
				$query4 = $this->db->query('SELECT income_estimation_2022 from info_verification_hotels WHERE personal_data_id='.$personal_data_id);
				if ($query4->num_rows() > 0) {
					$hotelData = $query4->row_array();
				}
				$varCAS += $hotelData['income_estimation_2022'] ?? 0;
			}

			$varCAS += $venit_impozabil;
			
			return $varCAS;
		}
	}

	/**
	 * Country List
	 */
	public function getCountryList() {
		$q = $this->db->get('country_list');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return [];
		}
	}

	public function deleteCountryById($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('country_list');
	}

	public function insertCountryDataFromExcel($data) {
		$this->db->truncate('country_list');

		$res = $this->db->insert_batch('country_list', $data);

		if($res){
			return true;
		}else {
			return false;
		}
	}

	/**
	 * 
	 * ########## Field Mappings ##########
	 * 
	 */

	 public function getAllFieldMapping()
	 {
		 $q = $this->db->get('field_mappings');
		 if ($q->num_rows() > 0) {
			 return $q->result_array();
		 } else {
			 return FALSE;
		 }
	 }

	public function fetchMappingById($id)
	{
		$q = $this->db->get_where('field_mappings', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function insertMapping($data)
	{
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->db->insert('field_mappings', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	public function updateMapping($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('field_mappings', $data);
	}

	public function deleteMappingById($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('field_mappings');
	}

	public function getAllMappingRule()
	{
		$q = $this->db->get('mapping_rules');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function getMappingRulesByDocType($doc_type)
	{
		$this->db->where('document_type', $doc_type);
		$q = $this->db->get('mapping_rules');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchMappingRuleById($id)
	{
		$q = $this->db->get_where('mapping_rules', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function insertRule($data)
	{
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->db->insert('mapping_rules', $data);
		return $this->db->insert_id();
	}

	public function updateRule($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update('mapping_rules', $data);
	}

	public function deleteRuleById($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('mapping_rules');
	}

	public function insertCondition($data)
	{
		$this->db->insert('rule_conditions', $data);
	}

	public function insertWebPath($data)
	{
		$this->db->insert('web_pdf_mapping', $data);
	}

	public function fetchConditionsByRuleId($rule_id)
	{
		$q = $this->db->get_where('rule_conditions', ['mapping_rules_id' => $rule_id]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return [];
		}
	}

	public function fetchPathsByRuleId($rule_id)
	{
		$q = $this->db->get_where('web_pdf_mapping', ['rule_id' => $rule_id]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return [];
		}
	}

	public function deleteConditionsByRuleId($rule_id)
	{
		$this->db->where('mapping_rules_id', $rule_id);
		$this->db->delete('rule_conditions');
	}

	public function deletePathsByRuleId($rule_id)
	{
		$this->db->where('rule_id', $rule_id);
		$this->db->delete('web_pdf_mapping');
	}
}
