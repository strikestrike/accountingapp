<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('age_evaluation')) {
	function age_evaluation($pn)
	{
		$personalNumber = (string)$pn;
		$first3 = substr($personalNumber, 0, 3);
		$firstNumber = substr($first3, 0, 1);
		$lastTwo = substr($first3, 1, 2);
		$year = '';
		$currentYear = date('Y');
		if ($firstNumber == "1" || $firstNumber == '2') {
			$year = '19' . $lastTwo;
		}

		if ($firstNumber == "5" || $firstNumber == '6') {
			$year = '20' . $lastTwo;
		}

		$year = (int)$year;
		$age = $currentYear - $year;

		return $age;
	}
}

if (!function_exists('genre_evaluation')) {
	function genre_evaluation($pn)
	{
		$personalNumber = (string)$pn;
		$first3 = substr($personalNumber, 0, 3);
		$firstNumber = substr($first3, 0, 1);
		$genre = '';

		if ($firstNumber == "1" || $firstNumber == '5') {
			$genre = 'Barbat';
		}

		if ($firstNumber == "2" || $firstNumber == '6') {
			$genre = 'Femeie';
		}

		return $genre;
	}
}
