<?php
date_default_timezone_set('Asia/Kolkata');
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{

	/**
	 * fetch details of user for authentication
	 */
	public function get_user_login_detail($data)
	{
		$q = $this->db->get_where('users', $data);
		if ($q->num_rows() > 0) {
			$userDetails = $q->row_array();
			$userDetails['role'] = 2;
			return $userDetails;
		} else {
			return FALSE;
		}
	}

	public function get_user_login_detail_by_email($email)
	{
		$q = $this->db->get_where('users', ['email' => $email]);
		if ($q->num_rows() > 0) {
			$userDetails = $q->row_array();
			$userDetails['role'] = 2;
			return $userDetails;
		} else {
			return FALSE;
		}
	}

	/**
	 * fetch details of user if forgot password
	 */

	public function forgot($email)
	{
		$this->db->select()->from('users')->where('email', $email);
		$q = $this->db->get();
		return $q->result_array();
	}

	public function saveData($table, $data)
	{

		$qry = $this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	/**
	 * save reset code 
	 */
	public function putresetcode($email, $info)
	{
		$this->db->where('email', $email);
		return $this->db->update('users', $info);
	}

	/**
	 * fetch user details
	 */
	public function getUserDetailsByUserID($user_id)
	{
		$q = $this->db->get_where('users', ['user_id' => $user_id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	/**
	 * fetch user details by email
	 */
	public function getUserDetailsByEmail($email)
	{
		$q = $this->db->get_where('users', ['email' => $email]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	/**
	 * Update User profile
	 */

	public function updateUserProfile($uid, $data)
	{
		$this->db->where('user_id', $uid);
		return $this->db->update('users', $data);
	}

	/**
	 * Change User password
	 */
	public function updateLoginPassword($uid, $oldPass, $new_password)
	{
		$value = array('password' => $new_password);
		$this->db->where(array('user_id' => $uid, 'password' => $oldPass));
		return $this->db->update('users', $value);
	}

	/**
	 * fetch user info by reset code
	 */

	public function getUserInfoByResetCode($reset_code)
	{
		$q = $this->db->get_where('users', ['reset_code' => $reset_code]);
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
		return $this->db->update('users', $value);
	}



	/**
	 * fetch all personal_data info 
	 * 
	 * @table personal_data
	 */
	public function fetchPersonalDataInfo($creator_id)
	{
		$q = $this->db->get_where('personal_data', ['created_by' => $creator_id]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}
	/**
	 * fetch user personal_data by creator's id with pending payment
	 * 
	 * @table personal_data
	 */
	public function getPersonalData($id)
	{
		$q = $this->db->query('SELECT * FROM personal_data WHERE created_by = ' . $id . ' AND payment_status = 0 ORDER BY id DESC');
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	/**
	 * fetch user personal_data by id(primary key)
	 * 
	 * @table personal_data
	 */
	public function getPersonalDataById($id)
	{
		$q = $this->db->get_where('personal_data', ['id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	/**
	 * save personal data
	 */
	public function savePersonalData($data)
	{
		$this->db->insert('personal_data', $data);
		if ($this->db->affected_rows() == '1') {
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}
		return FALSE;
	}

	/**
	 * final submit personal data
	 */
	public function finalSubmitPersonalData($id, $steps)
	{
		$this->db->where(array('id' => $id));
		return $this->db->update('personal_data', ['editable' => '0', 'steps_completed' => $steps]);
	}

	public function fetchStepCompleted($id)
	{
		$q = $this->db->query('SELECT * FROM personal_data WHERE id = ' . $id);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function stepTwoCompleted($id, $steps)
	{
		$this->db->where(array('id' => $id));
		return $this->db->update('personal_data', ['steps_completed' => $steps]);
	}

	public function stepThreeCompleted($id, $steps)
	{
		$this->db->where(array('id' => $id));
		return $this->db->update('personal_data', ['steps_completed' => $steps]);
	}

	/**
	 * fetch Rent Income Modules Price defined by admin in the backend
	 */

	public function fetchRentIncomeModulesPrice()
	{
		$q = $this->db->get('master_pricing_rentals');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchRentIncome($id, $personal_data_id)
	{
		$q = $this->db->query('SELECT * FROM rent_income_type WHERE created_by = ' . $id . ' AND personal_data_id = ' . $personal_data_id . ' ORDER BY id DESC');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchHotelIncome($id, $personal_data_id)
	{
		$q = $this->db->query('SELECT * FROM hotel_rental_income_type WHERE created_by = ' . $id . ' AND personal_data_id = ' . $personal_data_id . ' ORDER BY id DESC');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchDividentIncome($personal_data_id)
	{
		// echo $personal_data_id;die;
		$q = $this->db->query('SELECT * FROM divident_income_type WHERE personal_data_id = ' . $personal_data_id);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchDividentWithCountry($personal_data_id)
	{
		// echo $personal_data_id;die;
		$q = $this->db->query('SELECT country, SUM(divident) FROM divident_income_type WHERE personal_data_id = ' . $personal_data_id . ' Group By country');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function getMinWageForCurrentYear($currentYear)
	{
		$q = $this->db->get_where('minimum_wages', ['year' => $currentYear]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		}
		return FALSE;
	}

	public function getMinWageForPreviousYear()
	{
		$previous_year = date("Y", strtotime("-1 year"));
		$q = $this->db->get_where('minimum_wages', ['year' => $previous_year]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		}
		return FALSE;
	}


	public function saveFinalCost($data)
	{
		$this->db->insert('final_costs', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}
	public function updateFinalCost($data)
	{
		// print_r($data);die;
		$this->db->where(array('personal_data_id' => $data['personal_data_id']));

		return $this->db->update('final_costs', ['price' => $data['price']]);
	}

	public function saveRentVerification($data)
	{
		$this->db->insert('info_verification_rentals', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	public function updateRentVerification($id, $data)
	{
		$this->db->where(['id' => $id]);
		return $this->db->update('info_verification_rentals', $data);
	}

	public function fetchFinalCost($personal_data_id)
	{
		$q = $this->db->get_where('final_costs', ['personal_data_id' => $personal_data_id, 'status' => '0']);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function fetchVerifiedRentalByPersonalDataId($personal_data_id)
	{
		$q = $this->db->get_where('info_verification_rentals', ['personal_data_id' => $personal_data_id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function fetchHotelIncomeModulesPrice()
	{
		$q = $this->db->get('master_pricing_rental_regimes');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function saveHotelIncome($data)
	{
		// $this->db->insert('hotel_rental_income_type', $data);
		if ($this->db->insert_batch('hotel_rental_income_type', $data)) {
			return TRUE;
		}
		return FALSE;
	}

	public function fetchHotelRentIncome($id, $personal_data_id)
	{
		$q = $this->db->query('SELECT * FROM hotel_rental_income_type WHERE created_by = ' . $id . ' AND personal_data_id = ' . $personal_data_id . ' ORDER BY id DESC');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function saveHotelVerification($data)
	{
		$this->db->insert('info_verification_hotels', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	public function fetchVerifiedHotelByPersonalDataId($id)
	{
		$q = $this->db->get_where('info_verification_hotels', ['personal_data_id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function fetchVerifiedCryptoWithPersonalDataId($id)
	{
		$q = $this->db->get_where('info_verification_crypto', ['personal_data_id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function fetchVerifiedStocksByPid($id)
	{
		$q = $this->db->get_where('info_verification_stocks', ['personal_data_id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function fetchVerifiedDividentByPid($id)
	{
		$q = $this->db->get_where('info_verification_dividents', ['personal_data_id' => $id]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function updateHotelVerification($id, $data)
	{
		$this->db->where(['id' => $id]);
		return $this->db->update('info_verification_hotels', $data);
	}

	public function updateCryptoVerification($id, $data)
	{
		$this->db->where(['id' => $id]);
		return $this->db->update('info_verification_crypto', $data);
	}

	public function updateStocksVerification($id, $data)
	{
		$this->db->where(['id' => $id]);
		return $this->db->update('info_verification_stocks', $data);
	}

	public function updateDividentVerification($id, $data)
	{
		$this->db->where(['id' => $id]);
		return $this->db->update('info_verification_dividents', $data);
	}

	public function fetchApprovedOngList()
	{
		$q = $this->db->get_where('ong_lists', ['approved' => 1]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchMyOng($data)
	{
		$personal_data_id = $data['personal_data_id'];
		$info_verification_id = $data['info_verification_id'];
		$info_verf_type = $data['info_verf_type'];
		$q = $this->db->query("SELECT * FROM info_verification_ong WHERE (`personal_data_id` LIKE '$personal_data_id') AND (`info_verification_id` LIKE '$info_verification_id') AND (`info_verification_type` LIKE '$info_verf_type')");
		if ($q->num_rows() > 0) {
			return $q->row_array();
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

	public function updateOngById($id, $data)
	{
		$this->db->where(['id' => $id]);
		return $this->db->update('ong_lists', $data);
	}

	public function fetchBNR($data)
	{
		$date = $data['date'];
		$rate_usd = $data['rate_bnr_usd'];
		$rate_euro = $data['rate_bnr_euro'];
		$q = $this->db->query("SELECT * FROM bnr_exchange_rates WHERE (`date` LIKE '$date') AND (`rate_bnr_usd` LIKE '$rate_usd') AND (`rate_bnr_euro` LIKE '$rate_euro')");
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function dividentData($data)
	{
		$personal_data_id = $data['personal_data_id'];
		$country = $data['country'];
		$divident = $data['divident'];
		$q = $this->db->query("SELECT * FROM divident_income_type WHERE (`personal_data_id` LIKE '$personal_data_id') AND (`country` LIKE '$country') AND (`divident` LIKE '$divident')");
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function fetchDividentModulesPrice()
	{
		$q = $this->db->get('master_pricing_dividents');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}
	public function saveDividentVerification($data)
	{
		$q = $this->db->insert('info_verification_dividents', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	public function fetchStocksModulesPrice()
	{
		$q = $this->db->get('master_pricing_stocks');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}
	public function fetchCryptoModulesPrice()
	{
		$q = $this->db->get('master_pricing_cryptos');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function fetchBnrByDate($date)
	{
		$q = $this->db->get_where('bnr_exchange_rates', ['date' => $date]);
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function stocksData($data)
	{
		$personal_data_id = $data['personal_data_id'];
		$country = $data['country'];
		$var_final = $data['var_final'];
		$q = $this->db->query("SELECT * FROM stocks_income_type WHERE (`personal_data_id` LIKE '$personal_data_id') AND (`country` LIKE '$country') AND (`var_final` LIKE '$var_final')");
		if ($q->num_rows() > 0) {
			return $q->row_array();
		} else {
			return FALSE;
		}
	}

	public function fetchStocksWithCountry($personal_data_id)
	{
		// echo $personal_data_id;die;
		$q = $this->db->query('SELECT country, SUM(var_final) FROM stocks_income_type WHERE personal_data_id = ' . $personal_data_id . ' Group By country');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function saveStocksVerification($data)
	{
		$this->db->insert('info_verification_stocks', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	public function saveOng($data)
	{
		$q = $this->db->insert('ong_lists', $data);
		if ($this->db->affected_rows() == '1') {
			return $this->db->insert_id();
		}
		return FALSE;
	}

	public function saveOngRelation($data)
	{
		return $this->db->replace('info_verification_ong', $data);
	}

	public function fetchCryptoWithCountry($personal_data_id)
	{
		// echo $personal_data_id;die;
		$q = $this->db->query('SELECT personal_data_id, SUM(var_final) FROM crypto_income_type WHERE personal_data_id = ' . $personal_data_id . ' Group By personal_data_id');
		if ($q->num_rows() > 0) {
			return $q->result_array();
		} else {
			return FALSE;
		}
	}

	public function saveCryptoVerification($data)
	{
		$this->db->insert('info_verification_crypto', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	public function updateFinalCostStatus($id)
	{
		$this->db->where('personal_data_id', $id);
		return $this->db->update('final_costs', ['status' => 1]);
	}

	public function stepFourCompleted($id, $steps)
	{
		$this->db->where(array('id' => $id));
		return $this->db->update('personal_data', ['steps_completed' => $steps, 'payment_status' => 1]);
	}

	public function saveTransaction($data)
	{
		$q = $this->db->insert('transactions', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	public function getVariantsByVariableId($id)
	{
		// $q = $this->db->get_where('variable_variants', ['variable_id' => $id]);
		$q = $this->db->query("SELECT * FROM variable_variants
									INNER JOIN variants 
										ON variable_variants.variant_id = variants.id
									WHERE
										variable_variants.variable_id=$id
							");
		if ($q->num_rows() > 0) {
			$relData = $q->result_array();
			// dd($relData);
			return $relData;
		} else {
			return FALSE;
		}		
	}

	public function getPfaDataVrblsVrnts($income)
	{
		// dd("here");
		$q = $this->db->query("SELECT * FROM pfa_data_income_types
									INNER JOIN pfa_data_blocks 
										ON pfa_data_income_types.pfa_data_id = pfa_data_blocks.id
									WHERE pfa_data_income_types.income_name='$income'
							");
		if ($q->num_rows() > 0) {
			$relData = $q->row_array();
			
			if($relData) {
				$q2 = $this->db->query("SELECT * FROM pfa_data_variable_variants
											INNER JOIN variables 
												ON pfa_data_variable_variants.variable_id = variables.id
											WHERE pfa_data_variable_variants.pfa_data_id=".$relData['pfa_data_id'].
											" GROUP BY name"
									);
				$variablesData = $q2->result_array();
				$relData['variables'] = $variablesData;
				
				$q3 = $this->db->query("SELECT * FROM pfa_data_variable_variants
											INNER JOIN variants 
												ON pfa_data_variable_variants.variant_id = variants.id
											WHERE pfa_data_variable_variants.pfa_data_id=".$relData['pfa_data_id']
									);
				$variantsData = $q3->result_array();
				$relData['variants'] = $variantsData;

				// dd($relData);
				return $relData;
			}
			else {
				return false;
			}
		} else {
			return FALSE;
		}
	}
	
	public function getPfaSpecVrblsVrnts($income)
	{
		// dd($income);
		$q = $this->db->query("SELECT * FROM pfa_spec_data_income_types
									INNER JOIN pfa_spec_data_blocks 
										ON pfa_spec_data_income_types.pfa_data_id = pfa_spec_data_blocks.id
									WHERE pfa_spec_data_income_types.income_name='$income'
							");
		if ($q->num_rows() > 0) {
			$relData = $q->row_array();
			// dd($relData);
			if($relData) {
				$q2 = $this->db->query("SELECT * FROM pfa_spec_data_variable_variants
											INNER JOIN variables 
												ON pfa_spec_data_variable_variants.variable_id = variables.id
											WHERE pfa_spec_data_variable_variants.pfa_data_id=".$relData['pfa_data_id'].
											" GROUP BY name"
									);
				$variablesData = $q2->result_array();
				$relData['variables'] = $variablesData;
				
				$q3 = $this->db->query("SELECT * FROM pfa_spec_data_variable_variants
											INNER JOIN variants 
												ON pfa_spec_data_variable_variants.variant_id = variants.id
											WHERE pfa_spec_data_variable_variants.pfa_data_id=".$relData['pfa_data_id']
									);
				$variantsData = $q3->result_array();
				$relData['variants'] = $variantsData;

				// dd($relData);
				return $relData;
			}
			else {
				return false;
			}
		} else {
			return FALSE;
		}
	}

	public function submitNormaIncome($data)
	{
		$pid = $data['income'][0]['personal_data_id'];
		$this->db->where('personal_data_id', $pid);
		$this->db->delete('norma_income_type');
		return $this->db->insert_batch('norma_income_type', $data['income']);
	}

	public function getNormaIncome($personal_data_id)
	{
		$q = $this->db->get_where('norma_income_type', ['personal_data_id' => $personal_data_id]);
		if ($q->num_rows() > 0) {
			return $q->result_array();
		}
	}


	public function saveNormaInfoVerification($data)
	{
		if(!empty($data['pfaSpecRadio'])) {
			unset($data['pfaSpecRadio']);
		}
		$this->db->where('personal_data_id', $data['personal_data_id']);
		$this->db->delete('info_verification_norma');
		$q = $this->db->insert('info_verification_norma', $data);
		if ($this->db->affected_rows() == '1') {
			return TRUE;
		}
		return FALSE;
	}

	public function getRecommendedVariables()
	{
		$q = $this->db->query("SELECT * FROM variable_variants
									INNER JOIN variants 
										ON variable_variants.variant_id = variants.id
									WHERE variants.display_on_frontend = 'Always_Yes'
							");
		if ($q->num_rows() > 0) {
			$relData = $q->result_array();
			// dd($relData);
			return $relData;
		} else {
			return FALSE;
		}		
	}

	public function getPfaDataVariables($income)
	{
		$q = $this->db->get_where('pfa_data_income_types', ['income_name' => $income]);
		if ($q->num_rows() > 0) {
			$q2 = $this->db->query("SELECT * FROM pfa_data_variable_variants
									INNER JOIN variables 
										ON pfa_data_variable_variants.variable_id = variables.id
							");
			if ($q2->num_rows() > 0) {
				$varblData = $q2->result_array();
				// d($varblData);
				$q3 = $this->db->query("SELECT * FROM pfa_data_variable_variants
									INNER JOIN variants 
										ON pfa_data_variable_variants.variant_id = variants.id
							");
				if ($q3->num_rows() > 0) {
					$varntData = $q3->result_array();
					$return['variables'] = $varblData;
					$return['variants'] = $varntData;
					return $return;			
				}
				
			}
			
		} else {
			return FALSE;
		}
	}
}
