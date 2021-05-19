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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Staff Section*/
$route['staff-dashboard'] = 'staff/Staff/index';
$route['staffs-management'] = 'staff/Staff/staffs_list';
$route['staff-logout'] = 'staff/Staff/logout';
$route['staff-login'] = 'staff/Login/index';
$route['staff/mutual-fund-nav']='staff/Staff/MUTUAL_FUND_NAV';
$route['staff/add-mutual-fund-nav-record']='staff/Staff/ADD_MUTUAL_FUND_NAV';
$route['staff/add-excel']='staff/Staff/exceladd';
$route['staff/stock-ltp']='staff/Staff/STOCK_LTP';
$route['staff/new-pension-system-nav']='staff/Staff/NEW_PENSION_SYSTEM_NAV';
$route['staff/bond-ltp']='staff/Staff/BOND_LTP';
$route['staff/non-convertible-debenture-ltp']='staff/Staff/NON_CONVERTIBLE_DEBENTURE_LTP';
$route['staff/sovergine-gold-bond-ltp']='staff/Staff/SOVERGINE_GOLD_BOND_LTP';
$route['staff/employee-provident-fund-int']='staff/Staff/EMPLOYEE_PROVIDENT_FUND_INT';
$route['staff/public-provident-fund-int']='staff/Staff/PUBLIC_PROVIDENT_FUND_INT';
$route['staff/sukanya-samriddhi-yojna-int']='staff/Staff/SUKANYA_SAMRIDDHI_YOJANA_INT';
$route['staff/senior-citizen-scheme-in']='staff/Staff/SENIOR_CITIZEN_SAVING_SCHEME_IN';
$route['staff/national-saving-certificate-int']='staff/Staff/NATIONAL_SAVING_CERTIFICATE_INT';
$route['staff/kishan-vikash-patra-int']='staff/Staff/KISHAN_VIKASH_PATRA_INT';
$route['staff/bond-name']='staff/Staff/Bond_Name';
$route['staff/mutual-fund-companies']='staff/Staff/Mutual_Fund_Companies';
$route['staff/mutual-fund-scheme']='staff/Staff/Mutual_Fund_Scheme';
$route['staff/ncd-name']='staff/Staff/NCD_Name';
$route['staff/nsp-scheme']='staff/Staff/NPS_Scheme';
$route['staff/stock-name']='staff/Staff/Stock_Name';
$route['staff/sgb-name']='staff/Staff/SGB_Name';
$route['staff/brokers']='staff/Staff/Brokers';
$route['staff/crypto-currency']='staff/Staff/crypto_currency';
$route['staff/currency']='staff/Staff/currency';
$route['staff/commodity']='staff/Staff/commodity';
$route['staff/index-table']='staff/Staff/index_table';


