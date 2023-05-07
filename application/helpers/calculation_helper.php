<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('calculateIncome2021'))
{
	/**
	 * --------------------------------------
	 * 	Calculate Net Income 2021
	 * --------------------------------------
	 * @param $data | array
	 * @return $netIncome | int
	 * 
	 * abbreviations used:
	 * CSD - Contract Start Date
	 * CED - Contract End Date
	 */
	function calculateIncome2021($data)
	{
		$rent_value = $data['rent_value'];
		$contract_start_date = $data['contract_start_date'];
		$contract_end_date = '';
		
		if(!empty($data['contract_end_date']))
			$contract_end_date = $data['contract_end_date'];

		$no_of_days_in_CSDmonth = cal_days_in_month(CAL_GREGORIAN,getDMY('m',$contract_start_date),getDMY('y',$contract_start_date)); //number of days that the selected month has (month found in “Contract start date”) 

		$remaining_days_CSDmonth = $no_of_days_in_CSDmonth - getDMY('d', $contract_start_date); //number of days remained from that particular month (month found in “Contract start date”) (total days of the month – the day selected by user in Contract Start Date)

		$no_of_days_in_CEDmonth = cal_days_in_month(CAL_GREGORIAN,getDMY('m',$contract_end_date),getDMY('y',$contract_end_date)); //number of days that the selected month has (month found in “Contract End date”) 

		$passed_days_in_CEDmonth = getDMY('d', $contract_end_date); // passed days in month of contract end date

		$previous_year = date("Y",strtotime("-1 year"));
		
		$current_year = date("Y");
		
		$no_of_months = '';

		if(getDMY('y',$contract_end_date) > $previous_year) 
		{
			$no_of_months = 12 - getDMY('m',$contract_start_date);
		}
		elseif(getDMY('y',$contract_end_date) == $previous_year)
		{
			$no_of_months = getDMY('m',$contract_end_date) - getDMY('m',$contract_start_date);
		}
		else
		{
			$no_of_months = 12 - getDMY('m',$contract_start_date);
		}

		$result = $rent_value / $no_of_days_in_CSDmonth * $remaining_days_CSDmonth + $rent_value * $no_of_months + $rent_value / $no_of_days_in_CEDmonth * $passed_days_in_CEDmonth;

		return round($result);
	}
}

if(!function_exists('calculateIncome2022'))
{

	/**
	 * --------------------------------------
	 * 	Generate Net Income 2022
	 * --------------------------------------
	 * @param $data | array
	 * @return $netIncome | int
	 * 
	 * abbreviations used:
	 * CSD - Contract Start Date
	 * CED - Contract End Date
	 */
	function calculateIncome2022($data, $annual_exch_rate)
	{
		
		$rent_value = $data['rent_value'];
		$contract_start_date = $data['contract_start_date'];
		$contract_end_date = '';
		
		if(!empty($data['contract_end_date']))
			$contract_end_date = $data['contract_end_date'];

		$n = '';

		$no_of_days_in_CSDmonth = cal_days_in_month(CAL_GREGORIAN,getDMY('m',$contract_start_date),getDMY('y',$contract_start_date)); //number of days that the selected month has (month found in “Contract start date”) 

		$no_of_days_in_CEDmonth = cal_days_in_month(CAL_GREGORIAN,getDMY('m',$contract_end_date),getDMY('y',$contract_end_date)); //number of days that the selected month has (month found in “Contract End date”) 
		
		$previous_year = date("Y",strtotime("-1 year"));
		
		$current_year = date("Y");
		
		$n = ''; //no of months

		if(getDMY('y', $contract_start_date) == $previous_year && getDMY('y', $contract_end_date) == $current_year){
			$n = getDMY('m', $contract_end_date) - 1;
		}
		elseif(getDMY('y', $contract_start_date) == $previous_year && getDMY('y', $contract_end_date) > $current_year){
			$n = 12;
		}
		else{
			$n = getDMY('m', $contract_end_date) - 1;
		}

		// echo "No of months = ". $n;die;

		$result = $rent_value * $n * $annual_exch_rate + getDMY('d', $contract_start_date) * $rent_value / $no_of_days_in_CSDmonth * $annual_exch_rate + getDMY('d', $contract_end_date) * $rent_value / $no_of_days_in_CEDmonth * $annual_exch_rate;

		return round($result);
		// echo  round($result);die;
	}

	/**
	 * ------------------------------------------
	 * 	Calculate Hotel Income
	 * ------------------------------------------
	 *  this function returns days or month or year from given date
	 * @param $ret | string : d to get days, m to get month, y to get year
	 * @return string
	 */
	function calculateHotelIncome2021($data)
	{
		$rent_value = $data['rent_value'];
		
	}

	/**
	 * ------------------------------------------
	 * 	Get Days, Months or Year
	 * ------------------------------------------
	 *  this function returns days or month or year from given date
	 * @param $ret | string : d to get days, m to get month, y to get year
	 * @return string
	 */
	function getDMY($ret ,$givenDate)
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

	function dd($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		die;
	}
	function d($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}
