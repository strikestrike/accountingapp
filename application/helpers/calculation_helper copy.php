<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calculation{

	public function __construct()
	{
		$this->load->helper(['form', 'url', 'file', 'string']);
		$this->load->library(['form_validation', 'session']);
		$this->load->model('User_Model');
		$this->load->model('Admin_Model');

		$this->load->database();
	}


	/**
	 * --------------------------------------
	 * 	Generate Net Income 
	 * --------------------------------------
	 * @param $data | array
	 * @return $netIncome | int
	 * 
	 * abbreviations used:
	 * CSD - Contract Start Date
	 * CED - Contract End Date
	 */
	public function calculateNetIncome($data)
	{
		/**
		 	
		 */
		$rent_value = $data['rent_value'];
		$contract_start_date = $data['contract_start_date'];
		$currency = $data['currency'];
		$contract_end_date = '';
		
		if(!empty($data['contract_end_date']))
			$contract_end_date = $data['contract_end_date'];

		$no_of_days_in_CSDmonth = cal_days_in_month(CAL_GREGORIAN,$this->getDMY('m',$contract_start_date),$this->getDMY('y',$contract_start_date)); //number of days that the selected month has (month found in “Contract start date”) 

		$remaining_days_CSDmonth = $no_of_days_in_CSDmonth - $this->getDMY('d', $contract_start_date); //number of days remained from that particular month (month found in “Contract start date”) (total days of the month – the day selected by user in Contract Start Date)

		$no_of_days_in_CEDmonth = cal_days_in_month(CAL_GREGORIAN,$this->getDMY('m',$contract_start_date),$this->getDMY('y',$contract_start_date)); //number of days that the selected month has (month found in “Contract End date”) 

		$passed_days_in_CEDmonth = $this->getDMY('d', $contract_end_date);

		$previous_year = date("Y",strtotime("-1 year"));
		$current_year = date("Y");
		$no_of_months = '';

		if($this->getDMY('y',$contract_end_date) > $previous_year){
			$no_of_months = 12 - $this->getDMY('m',$contract_start_date);
		}elseif($this->getDMY('y',$contract_end_date) == $previous_year){
			$no_of_months = $this->getDMY('m',$contract_end_date) - $this->getDMY('m',$contract_start_date);
		}else{
			$no_of_months = 12 - $this->getDMY('m',$contract_start_date);
		}

		$result = $rent_value / $no_of_days_in_CSDmonth * $remaining_days_CSDmonth + $rent_value * $no_of_months + $rent_value / $no_of_days_in_CEDmonth * $passed_days_in_CEDmonth;

		$annualExchangeRate = $this->admin_model->fetchAnnualExchangeRate($currency,$this->getDMY('y',$contract_end_date));

		$netIncome = $annualExchangeRate * $result;

		return $netIncome;
	}

	/**
	 * ------------------------------------------
	 * 	Get Days, Months or Year
	 * ------------------------------------------
	 *  this function returns days or month or year from given date
	 * @param $ret | string : d to get days, m to get month, y to get year
	 * @return string
	 */
	public function getDMY($ret = '',$givenDate)
	{
		if(empty($givenDate))
		{
			return 0;
		}
		else
		{
			$date  = strtotime($givenDate);
			if($ret == 'd')
				return date('d',$date);
			elseif($ret == 'm')
				return date('m',$date);
			elseif($ret == 'y')
				return date('Y',$date);
			else return;	
		}
	}
}
