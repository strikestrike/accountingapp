<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'User';

/**
 * Users Routes
 */
$route['register'] = 'user/register';
$route['registerUser'] = 'user/registerUser';
$route['showPdf'] = 'user/showPdf';
$route['processPayment'] = 'user/processPayment';
$route['process-xml'] = 'user/processXml';

$route['user/normaIncome'] = 'user/normaIncome';
// $route['user/saveNormaIncome'] = 'user/saveNormaIncome';
$route['user/submitNormaIncome'] = 'user/submitNormaIncome';


/**
 * Admin Routes
 */
$route['admin'] = 'admin/login';
$route['forgot_password'] = 'admin/forgot_password';
$route['system_configration'] = 'admin/system_configration';
$route['pricing'] = 'admin/pricing';
$route['ong'] = 'admin/ong';
$route['client'] = 'admin/client';
$route['profile'] = 'admin/profile';
$route['currency'] = 'admin/currency';
$route['users'] = 'admin/users';
$route['updatePassword'] = 'admin/updatePassword';
$route['updateProfile'] = 'admin/updateProfile';
$route['addAnnualExchangeRate'] = 'admin/addAnnualExchangeRate';
$route['getExchangeRateById'] = 'admin/getExchangeRateById';
$route['editAnnualExchangeRate'] = 'admin/editAnnualExchangeRate';
$route['deleteExchangeRateById'] = 'admin/deleteExchangeRateById';
$route['deleteMinWageById'] = 'admin/deleteMinWageById';
$route['getMinWageById'] = 'admin/getMinWageById';
$route['editMinWage'] = 'admin/editMinWage';
$route['deleteCurrencyById'] = 'admin/deleteCurrencyById';
$route['editCurrency'] = 'admin/editCurrency';
$route['addUser'] = 'admin/addUser';
$route['editUser'] = 'admin/editUser';
$route['deleteUserById'] = 'admin/deleteUserById';
$route['updateUserStatus'] = 'admin/updateUserStatus';

/**
 * ######## County ########
 */
$route['admin/county'] = 'county/index';
$route['admin/deleteCountyById'] = 'county/destroy';
$route['admin/county/update'] = 'county/update';
$route['admin/county/insert'] = 'county/insert';

/**
 * ######## CAEN ########
 */
$route['admin/caen'] = 'caen/index';
$route['admin/deleteCaenById'] = 'caen/destroy';
$route['admin/caen/update'] = 'caen/update';
$route['admin/caen/insert'] = 'caen/insert';

/**
 * ######## Variables ########
 */
$route['admin/variables'] = 'variable/index';
$route['admin/view_variable/(:num)'] = 'variable/view/$1';
$route['admin/fetchVariants'] = 'variable/fetchVariantsByVariableId';

/**
 * ######## Income norms ########
 */
$route['admin/income_norms'] = 'IncomeNorms/index';
$route['admin/process_income_norms'] = 'IncomeNorms/processIncomeNorms';
$route['admin/columns_added_success'] = 'IncomeNorms/columns_added_success';
$route['admin/uploadColumnExcel'] = 'IncomeNorms/uploadColumnExcel';
$route['admin/saveTemplate'] = 'IncomeNorms/saveTemplate';
$route['admin/submitTemplate'] = 'IncomeNorms/submitTemplate';
$route['admin/savedTemplateSuccess'] = 'IncomeNorms/savedTemplateSuccess';
$route['admin/view_template/(:num)'] = 'IncomeNorms/viewTemplate/$1';
$route['admin/updateTemplateInfo'] = 'IncomeNorms/updateTemplate';
$route['admin/templateUpdateSuccess'] = 'IncomeNorms/templateUpdateSuccess';
$route['admin/fetchColumnById'] = 'IncomeNorms/fetchColumnById';
$route['admin/updateColumnDetails'] = 'IncomeNorms/updateColumnDetails';
$route['admin/deleteColumnDetailsById'] = 'IncomeNorms/deleteColumnDetailsById';
$route['admin/deleteTemplateById'] = 'IncomeNorms/deleteTemplateById';
$route['admin/updateTemplate'] = 'IncomeNorms/updateTemplateDetails';
$route['admin/updateIncomeNormTemplate'] = 'IncomeNorms/updateIncomeNormTemplate';


/**
 * ######## Correction coefficients ########
 */
$route['admin/correction_coefficients'] = 'coefficient/index';
$route['admin/saveCoef'] = 'coefficient/store';
$route['admin/coeffSavedSuccess'] = 'coefficient/coeffSavedSuccess';
$route['admin/deleteCoeffById'] = 'coefficient/deleteCoeffById';
$route['admin/editCoeff/(:num)'] = 'coefficient/editCoeff/$1';
$route['admin/updateCoef'] = 'coefficient/update';
$route['admin/coeffUpdatedSuccess'] = 'coefficient/updateSuccess';

/**
 * ######## Information blocks ########
 */
 $route['admin/blocks'] = 'InfoBlocks/index';
 $route['admin/saveInfoBlock'] = 'InfoBlocks/savePensionMandatory';
 $route['admin/saveTIPO'] = 'InfoBlocks/savePensionOptional';
 $route['admin/saveTIHM'] = 'InfoBlocks/saveHealthMandatory';
 $route['admin/saveTIHO'] = 'InfoBlocks/saveHealthOptional';
 $route['admin/savePFAData'] = 'InfoBlocks/savePFAdata';
 $route['admin/pfaDataSuccess'] = 'InfoBlocks/pfaDataSuccess';
 $route['admin/savePFASpecData'] = 'InfoBlocks/savePFASpecdata';


 /**
 * ######## Field Mappings ########
 */
$route['admin/fieldmappings'] = 'FieldMapping/index';
$route['admin/fetchMapping'] = 'FieldMapping/fetchMapping';
$route['admin/autoFillMapping'] = 'FieldMapping/autoFillMapping';
$route['admin/deleteMappingById'] = 'FieldMapping/destroyMapping';
$route['admin/updateMapping'] = 'FieldMapping/updateMapping';
$route['admin/insertMapping'] = 'FieldMapping/insertMapping';

/**
 * ######## Mapping Rule ########
 */
$route['admin/mappingrule'] = 'FieldMapping/mappingRule';
$route['admin/editrule'] = 'FieldMapping/editrule';
$route['admin/deleteMappingRuleById'] = 'FieldMapping/destroyMappingRule';

$route['admin/deletePdfRule'] = 'FieldMapping/deletePdfRule';
$route['admin/saveMappingRule'] = 'FieldMapping/saveMappingRule';

$route['admin/deleteXmlRule'] = 'FieldMapping/deleteXmlRule';
$route['admin/updateXmlRule'] = 'FieldMapping/updateXmlRule';
$route['admin/insertXmlRule'] = 'FieldMapping/insertXmlRule';

$route['user/getDownloadLink'] = 'user/getDownloadLink';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
 * ######## Admin Country List ########
 */
$route['admin/country'] = 'AdminCountry/index';
$route['admin/country/delete'] = 'AdminCountry/delete';
$route['admin/country/import'] = 'AdminCountry/import';
