<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegexValidation
{
	public function currencyCodeRegex($currencyCode)
	{
		if (preg_match('/^[A-Z]{3}+$/', $currencyCode)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
