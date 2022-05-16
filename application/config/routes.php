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
$route['default_controller'] = 'My_controller/userlogin';
$route['login'] = 'My_controller/loginUser';
$route['Alogout'] = 'My_controller/logout';
$route['dashBoard'] = 'My_controller/dashBoard';
$route['home'] = 'My_controller/home';
$route['addProduct'] = 'My_controller/addProduct';
$route['insertProduct'] = 'My_controller/productAdd';
$route['menu'] = 'My_controller/groupMenu';
$route['search'] = 'My_controller/searchResult';
$route['checkout'] = 'My_controller/checkout';
$route['product'] = 'My_controller/displayProduct';
$route['editProduct'] = 'My_controller/editProduct';
$route['userlogin'] = 'My_controller/userlogin';
$route['forgotpassword'] = "My_controller/forgotpass";
$route['changepass'] = "My_controller/changepass";
$route['savepassword'] = 'My_controller/savepassword';
$route['sendrecovery_token'] ="My_controller/sendrecovery_token";
$route['crud'] = 'My_controller/crud';
$route['orders'] = "My_controller/orders";
$route['criticalStock']='My_controller/criticalStock';
$route['addStock'] ='My_controller/addStock';
$route['menu_type'] = 'My_controller/menu_type';
$route['cashier'] ='My_controller/pos';
$route['report'] ='My_controller/report';
$route['adminInfo'] = 'My_controller/adminInfo';
$route['cashierInfo'] = 'My_controller/cashierInfo';
$route['(:any)'] = 'My_controller/userlogin/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
