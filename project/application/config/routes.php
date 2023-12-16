<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['events'] = 'EventsController';
$route['alpine'] = 'AlpineSchoolController';
$route['onas'] = 'OnasController';
$route['navrhu'] = 'NavrhuController';
$route['reports'] = 'ReportsController';
$route['formcontroller/validateLoginData'] = 'FormController/validateLoginData';
$route['formcontroller/logOut'] = 'FormController/logOut';
$route['report/(:any)'] = 'ReportsController/load_specific_report/$1';
$route['signin'] = 'FormController/signin';
$route['validateSingnin'] = 'FormController/validateSigninData';
$route['form_report'] = 'FormController/form_report';
$route['create_report'] = 'ReportsController/create';
$route['addReportComment/(:any)'] = 'ReportsController/add_comment/$1';
$route['form_event'] = 'FormController/form_event';
$route['create_event'] ='EventsController/create';
$route['event/(:any)'] = 'EventsController/load_specific_event/$1';
$route['alpine/(:any)'] = 'AlpineSchoolController/load_specific_alpine/$1';
$route['form_alpine'] = 'FormController/form_alpine';
$route['create_alpine'] ='AlpineSchoolController/create';
$route['users_view'] = 'UserController/view_users';
$route['delete/(:any)'] = 'UserController/delete_user/$1';
$route['makeAdmin/(:any)'] = 'UserController/make_admin/$1';
$route['confirmUser/(:any)'] = 'UserController/confirm_user/$1';
$route['routes'] = 'RoutesController';
$route['form_route']='FormController/form_route';
$route['createRoute']='RoutesController/create';
$route['export_routes'] = 'RoutesController/export_csv';