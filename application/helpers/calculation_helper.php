<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('calculateIncome2021')) {
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

		if (!empty($data['contract_end_date']))
			$contract_end_date = $data['contract_end_date'];

		$no_of_days_in_CSDmonth = cal_days_in_month(CAL_GREGORIAN, getDMY('m', $contract_start_date), getDMY('y', $contract_start_date)); //number of days that the selected month has (month found in “Contract start date”) 

		$remaining_days_CSDmonth = $no_of_days_in_CSDmonth - getDMY('d', $contract_start_date); //number of days remained from that particular month (month found in “Contract start date”) (total days of the month – the day selected by user in Contract Start Date)

		$no_of_days_in_CEDmonth = cal_days_in_month(CAL_GREGORIAN, getDMY('m', $contract_end_date), getDMY('y', $contract_end_date)); //number of days that the selected month has (month found in “Contract End date”) 

		$passed_days_in_CEDmonth = getDMY('d', $contract_end_date); // passed days in month of contract end date

		$previous_year = date("Y", strtotime("-1 year"));

		$current_year = date("Y");

		$no_of_months = '';

		if (getDMY('y', $contract_end_date) > $previous_year) {
			$no_of_months = 12 - getDMY('m', $contract_start_date);
		} elseif (getDMY('y', $contract_end_date) == $previous_year) {
			$no_of_months = getDMY('m', $contract_end_date) - getDMY('m', $contract_start_date);
		} else {
			$no_of_months = 12 - getDMY('m', $contract_start_date);
		}

		$result = $rent_value / $no_of_days_in_CSDmonth * $remaining_days_CSDmonth + $rent_value * $no_of_months + $rent_value / $no_of_days_in_CEDmonth * $passed_days_in_CEDmonth;

		return abs(round($result));
	}
}

if (!function_exists('calculateIncome2022')) {

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

		if (!empty($data['contract_end_date']))
			$contract_end_date = $data['contract_end_date'];

		$n = '';

		$no_of_days_in_CSDmonth = cal_days_in_month(CAL_GREGORIAN, getDMY('m', $contract_start_date), getDMY('y', $contract_start_date)); //number of days that the selected month has (month found in “Contract start date”) 
		
		$no_of_days_in_CEDmonth = cal_days_in_month(CAL_GREGORIAN, getDMY('m', $contract_end_date), getDMY('y', $contract_end_date)); //number of days that the selected month has (month found in “Contract End date”) 

		$previous_year = date("Y", strtotime("-1 year"));

		$current_year = date("Y");

		$n = ''; //no of months

		if (getDMY('y', $contract_start_date) == $previous_year && getDMY('y', $contract_end_date) == $current_year) {
			$n = getDMY('m', $contract_end_date) - 1;
		} elseif (getDMY('y', $contract_start_date) == $previous_year && getDMY('y', $contract_end_date) > $current_year) {
			$n = 12;
		} else {
			$n = getDMY('m', $contract_end_date) - 1;
		}

		// echo $contract_start_date;die;
		// echo "No of months = ". $n;die;
		// echo $rent_value." * ".$n." * ".$annual_exch_rate." + ".getDMY('m', $contract_start_date)." * ".$rent_value. " / ". $no_of_days_in_CSDmonth . " * ".$annual_exch_rate." + ".getDMY('d', $contract_end_date)." * ".$rent_value." / ".$no_of_days_in_CEDmonth." * ".$annual_exch_rate;
		// die;
		$result = $rent_value * $n * $annual_exch_rate + getDMY('m', $contract_start_date) * $rent_value / $no_of_days_in_CSDmonth * $annual_exch_rate + getDMY('d', $contract_end_date) * $rent_value / $no_of_days_in_CEDmonth * $annual_exch_rate;

		return abs(round($result));
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
	function getDMY($ret, $givenDate)
	{
		if (empty($givenDate)) {
			return 0;
		} else {
			$date  = strtotime($givenDate);
			if ($ret == 'd')
				return date('d', $date);
			elseif ($ret == 'm')
				return date('m', $date);
			elseif ($ret == 'y')
				return date('Y', $date);
			else return;
		}
	}
	
	/**
	 * ------------------------------------------
	 * 	Get remaining days in the Year
	 * ------------------------------------------
	 *  this function returns number of days in the year from given date
	 * @param $givenDate date from which to get the remaining days
	 * @return string
	 */
	function getDays($startDate, $endDate = "")
	{
		$date = new DateTime($startDate);

		$endOfYear = new DateTime($date->format('Y-12-31'));
		
		if($endDate != "") {
			$endOfYear = new DateTime($endDate);
		}

		$interval = $endOfYear->diff($date);

		$daysRemaining = $interval->format('%a');
		return $daysRemaining;
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

	/**
	 * --------------------------------------------------------------------
	 * Calculate Norma Ajustata for Norma de venit Information Verfication
	 * --------------------------------------------------------------------
	 * 
	 * @algo :-		Text box in frontend “Norma Ajustata” having as value: Value3 computed as following:
	 *				o	Starting the value displayed here = we consider this value as being Value1, we would add maximum of the values found at “Increase factors” as following Value1 + Value1*(“High increase”)*Computed variable for same variable  = Value2 
	 * 				o	Starting Value2, we would deduct the maximum of the values found at “Decrease factors” as following: Value2 – Value2*(“High Decrease”)* Computed variable for same variable = Value3, rounded, no decimals.
	 */
	if (!function_exists('compute_norma_ajustata')) {
		function compute_norma_ajustata($norma_value, $high_increase = 0, $high_decrease = 0, $computed_variable = 1)
		{
			$value2 = $norma_value + $norma_value * $high_increase * $computed_variable;

			$result = $value2 - $value2 * $high_decrease;

			return $result;
		}
	}

	/**
	 * --------------------------------------------------------------------
	 * Calculate Venit net anual for Norma de venit Information Verfication
	 * --------------------------------------------------------------------
	 * 
	 * @algo :-		Text box in frontend “Venit net anual” having as value: Value5 computed as following: 
	 * 				o	Starting with Value 3* Computed variable from variable selected and assigned to ”Nr zile lucrate” / 365 = Value5
	 * 
	 */
	if (!function_exists('compute_venit_net_anual')) {
		function compute_venit_net_anual($value3, $start_date = "", $end_date = "", $computed_variable = 0)
		{
			
			$result = 0;
			//  If year for the selected date is previous to current year and end month of the selected date is in previous year the value is 0.
			if(getDMY('y', $start_date) == date("Y",strtotime("-1 year")) && ($end_date != "" && getDMY('Y', $end_date) == date("Y",strtotime("-1 year")))) {
				$result = 0;
			}
			
			//  If year for the selected date is previous to current year and end date is in current year, the system counts the number of days from 1st January included to selected end day, including the end day. 
			if(getDMY('y', $start_date) == date("Y",strtotime("-1 year")) && ($end_date != "" && getDMY('Y', $end_date) == date("Y"))) {
				$days = getDays(getDMY('y', $end_date)."-01-01", $end_date);
				if($computed_variable != null) {
					if($computed_variable == 'Inside_+1') {
						$days += 1; 
					}
					if($computed_variable == 'Inside_+2') {
						$days += 2; 
					}
					if($computed_variable == 'Outside_0') {
						$days = 365 - $days; 
					}
					if($computed_variable == 'Outside_-1') {
						$days = 365 - $days - 1; 
					}
					if($computed_variable == 'Outside_-2') {
						$days = 365 - $days - 2; 
					}
				}
				$result = $value3 * $days/365;
			}
			
			//  For multiple intervals in current year, count for each interval from starting day current year (excluded), to end date day current year, for all new intervals added, ending date day included. (all are done for current year)
			if(getDMY('y', $start_date) == date('Y') && ($end_date != "" && getDMY('Y', $end_date) == date('Y'))) {
				$days = getDays($start_date, $end_date);
				if($computed_variable != null) {
					if($computed_variable == 'Inside_+1') {
						$days += 1; 
					}
					if($computed_variable == 'Inside_+2') {
						$days += 2; 
					}
					if($computed_variable == 'Outside_0') {
						$days = 365 - $days; 
					}
					if($computed_variable == 'Outside_-1') {
						$days = 365 - $days - 1; 
					}
					if($computed_variable == 'Outside_-2') {
						$days = 365 - $days - 2; 
					}
				}
				$result = $value3 * $days/365;
			}
			
			//  If year for the selected day is current year and end day is in next year or no ending date, the system counts the number of days including the starting day to 31 December, including 31 December.
			if(getDMY('y', $start_date) == date('Y') && ($end_date == "" || getDMY('Y', $end_date) == date('Y'))) {
				$days = getDays($start_date);
				if($computed_variable != null) {
					if($computed_variable == 'Inside_+1') {
						$days += 1; 
					}
					if($computed_variable == 'Inside_+2') {
						$days += 2; 
					}
					if($computed_variable == 'Outside_0') {
						$days = 365 - $days; 
					}
					if($computed_variable == 'Outside_-1') {
						$days = 365 - $days - 1; 
					}
					if($computed_variable == 'Outside_-2') {
						$days = 365 - $days - 2; 
					}
				}
				$result = $value3 * $days/365;
			}
			
			//  If year for the selected day is in previous years and end day is in next year or no ending date, the system counts the number of days from 1st January to 31 December, including 1st January and 31 December. 
			if(getDMY('y', $start_date) == date("Y",strtotime("-1 year")) && ($end_date == "" || getDMY('Y', $end_date) == date("Y",strtotime("+1 year")))) {
				// dd("here");
				$result = $value3 * 365/365;
			}
			return round($result);
		}
	}

	/**
	 * --------------------------------------------------------------------
	 * Calculate Venit impozabil for Norma de venit Information Verfication
	 * --------------------------------------------------------------------
	 * 
	 * @algo :-			Text box in frontend “Venit impozabil” having as value: Value6 computed as following:
	 * 					o	If the user selected “Nu”, on the variable option “Da/Nu” for the variable that is assigned to the variable. 
	 * 						a.	Value 6= Value5 / 365* Computed variable from variable selected and assigned to ”Nr zile lucrate”
	 * 					o	If the user selected “Da”, on the variable option “Da/Nu” for the variable that is assigned to the variable. 
	 * 						a.   Value 6= Value5 / 365* Computed variable from variable selected and assigned to ” Nr zile fara handicap”
	 * 
	 */
	if (!function_exists('compute_venit_impozabil')) {
		function compute_venit_impozabil($value5, $computed_variable = 1)
		{
			$result = $value5 / 365 * 365;

			return $result;
		}
	}

	/**
	 * --------------------------------------------------------------------
	 * Calculate Impozit for Norma de venit Information Verfication
	 * --------------------------------------------------------------------
	 * 
	 * @algo :-				Text box “Impozit” and next the number Value7 computed as following:
	 *						a.	Value6*0.1= Value7 rounded, no decimals
	 *
	 */
	if (!function_exists('compute_impozit')) {
		function compute_impozit($value6)
		{
			$result = $value6 * 0.1;

			return $result;
		}
	}

	/**
	 * --------------------------------------------------------------------
	 * Calculate pfa data block for Norma de venit Information Verfication
	 * --------------------------------------------------------------------
	 * 
	 * @algo :-				The block is displayed if summing all variables selected at point b. = Var CAS satisfy following condition: “Var CAS“ / ” computed date variable for variable “Nr luni Pensionar” from here” * 12 > = 12*minimum wage for current year. If block is displayed, we proceed with bellow: 
	 * 						The system checks if 
	 * 						- “Var CAS“/”computed date variable for variable “Nr luni Pensionar” from here*12 > = 24*minimum wage for current year, the value to be displayed in the frontend for client is “Valoare impozabila pentru pensie:” is 2* computed date variable for variable “Nr luni Pensionar” from here* minimum wage for current year. The “Valoare impozabila pentru pensie:” can be edited by the user only by increasing the value, it cannot be decreased. The value displayed for “Taxa” is “Valoare impozabila pentru pensie:” * 25% (if the user is changing the value for “Valoare impozabila pentru pensie:” the new value for field “Taxa” would be the value edited by the user *25%. If the user is trying to decrease the value an eror message is shown “Valoarea minima nu poate fi scazuta, poate fi doar crescuta” ( value can be only increased not decreased)
	 *
	 */
	if (!function_exists('compute_pension_mandatory')) {
		function compute_pension_mandatory($var_CAS, $min_wage, $computed_variable = 1)
		{
			$value = $var_CAS / $computed_variable * 12;

			if ($value >= 12 * $min_wage) {
				if ($value >= 24 * $min_wage) {
					$valoare = 2 * $computed_variable * $min_wage;
					$taxa = $valoare * 25 / 100;
				}
				return ['visible' => true , 'valoare' => $valoare, 'taxa' => $taxa];
			} else {
				return ['visible' => false ,'valoare' => 0, 'taxa' => 0];
			}
		}
	}


	/**
	 * --------------------------------------------------------------------
	 * Calculate pfa specific data block for Norma de venit Information Verfication
	 * --------------------------------------------------------------------
	 * 
	 * @algo :-				The block is displayed if summing all variables selected at point b. = Var CAS satisfy following condition: “Var CAS“ / ” computed date variable for variable “Nr luni Pensionar” from here” * 12 > = 12*minimum wage for current year. If block is displayed, we proceed with bellow: 
	 * 						The system checks if 
	 * 						- “Var CAS“/”computed date variable for variable “Nr luni Pensionar” from here*12 > = 24*minimum wage for current year, the value to be displayed in the frontend for client is “Valoare impozabila pentru pensie:” is 2* computed date variable for variable “Nr luni Pensionar” from here* minimum wage for current year. The “Valoare impozabila pentru pensie:” can be edited by the user only by increasing the value, it cannot be decreased. The value displayed for “Taxa” is “Valoare impozabila pentru pensie:” * 25% (if the user is changing the value for “Valoare impozabila pentru pensie:” the new value for field “Taxa” would be the value edited by the user *25%. If the user is trying to decrease the value an eror message is shown “Valoarea minima nu poate fi scazuta, poate fi doar crescuta” ( value can be only increased not decreased)
	 *
	 */
	if (!function_exists('compute_pension_optional')) {
		function compute_pension_optional($var_CAS, $min_wage, $computed_variable = 1)
		{
			$value = $var_CAS / $computed_variable * 12;

			if ($value < 12 * $min_wage) {

				$valoare = $computed_variable * $min_wage;
				$taxa = $valoare * 25 / 100;

				return ['valoare' => $valoare, 'taxa' => $taxa];
			} else {
				return ['valoare' => 0, 'taxa' => 0];
			}
		}
	}


	/**
	 * --------------------------------------------------------------------
	 * Calculate total income for health mandatory block for Norma de venit Information Verfication
	 * --------------------------------------------------------------------
	 * 
	 * @algo :-				The block is displayed if summing all variables selected at point b. = Var CAS satisfy following condition: “Var CAS“ / ” computed date variable for variable “Nr luni Pensionar” from here” * 12 > = 12*minimum wage for current year. If block is displayed, we proceed with bellow: 
	 * 						The system checks if 
	 * 						- “Var CAS“/”computed date variable for variable “Nr luni Pensionar” from here*12 > = 24*minimum wage for current year, the value to be displayed in the frontend for client is “Valoare impozabila pentru pensie:” is 2* computed date variable for variable “Nr luni Pensionar” from here* minimum wage for current year. The “Valoare impozabila pentru pensie:” can be edited by the user only by increasing the value, it cannot be decreased. The value displayed for “Taxa” is “Valoare impozabila pentru pensie:” * 25% (if the user is changing the value for “Valoare impozabila pentru pensie:” the new value for field “Taxa” would be the value edited by the user *25%. If the user is trying to decrease the value an eror message is shown “Valoarea minima nu poate fi scazuta, poate fi doar crescuta” ( value can be only increased not decreased)
	 *
	 */
	if (!function_exists('compute_health_mandatory_block')) {
		function compute_health_mandatory_block($var_CAS, $min_wage)
		{
			if ($var_CAS > 6 * $min_wage) {
				return ['visible' => true ,'valoare' => 6 * $min_wage, 'taxa' => 6 * $min_wage * 0.1];
			} else if ($var_CAS > 24 * $min_wage) {
				return ['visible' => true ,'valoare' => 24 * $min_wage, 'taxa' => 24 * $min_wage * 0.1];
			} else if ($var_CAS > 12 * $min_wage) {
				return ['visible' => true ,'valoare' => 12 * $min_wage, 'taxa' => 12 * $min_wage * 0.1];
			} else {
				return ['visible' => false, 'valoare' => 0, 'taxa' => 0];
			}
		}
	}

	/**
	 * --------------------------------------------------------------------
	 * Calculate total income for health optional block for Norma de venit Information Verfication
	 * --------------------------------------------------------------------
	 * 
	 * @algo :-				The block is displayed if summing all variables selected at point b. = Var CAS satisfy following condition: “Var CAS“ / ” computed date variable for variable “Nr luni Pensionar” from here” * 12 > = 12*minimum wage for current year. If block is displayed, we proceed with bellow: 
	 * 						The system checks if 
	 * 						- “Var CAS“/”computed date variable for variable “Nr luni Pensionar” from here*12 > = 24*minimum wage for current year, the value to be displayed in the frontend for client is “Valoare impozabila pentru pensie:” is 2* computed date variable for variable “Nr luni Pensionar” from here* minimum wage for current year. The “Valoare impozabila pentru pensie:” can be edited by the user only by increasing the value, it cannot be decreased. The value displayed for “Taxa” is “Valoare impozabila pentru pensie:” * 25% (if the user is changing the value for “Valoare impozabila pentru pensie:” the new value for field “Taxa” would be the value edited by the user *25%. If the user is trying to decrease the value an eror message is shown “Valoarea minima nu poate fi scazuta, poate fi doar crescuta” ( value can be only increased not decreased)
	 *
	 */
	if (!function_exists('compute_health_optional_block')) {
		function compute_health_optional_block($var_CAS, $min_wage)
		{
			$curr_date = date('Y-m-d');
			if ($var_CAS == 0) {
				$value = 6 * $min_wage;
				return ['valoare' => $value, 'taxa' => $value * 10 / 100];
			}
			if ($var_CAS > 0 && $curr_date < date('Y') . '-05-25') {
				$value = 6 * $min_wage;
				return ['valoare' => $value, 'taxa' => $value * 10 / 100];
			}
			if ($var_CAS > 0 && $curr_date > date('Y') . '-05-25') {

				$date1 = date('Y-m-d');
				$date2 = date('Y', strtotime('+1 year')).'-05-20';

				$ts1 = strtotime($date1);
				$ts2 = strtotime($date2);

				$year1 = date('Y', $ts1);
				$year2 = date('Y', $ts2);

				$month1 = date('m', $ts1);
				$month2 = date('m', $ts2);

				$diff = (($year2 - $year1) * 12) + ($month2 - $month1);

				$value = $diff * $min_wage;
				
				return ['valoare' => $value, 'taxa' => $value * 10 / 100];
			}
		}
	}
}
