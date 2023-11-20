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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['novice'] = 'NoviceController';
$route['galerija'] = 'GalerijaController';
$route['onas'] = 'OnasController';
$route['navrhu'] = 'NavrhuController';
$route['dogodki'] = 'DogodkiController';
$route['formcontroller/validateLoginData'] = 'FormController/validateLoginData';
$route['formcontroller/logOut'] = 'FormController/logOut';
$route['event/(:any)'] = 'DogodkiController/load_specific_event/$1';
$route['signin'] = 'FormController/signin';
$route['validateSingnin'] = 'FormController/validateSigninData';
$route['form_event'] = 'FormController/form_event';
$route['create_event'] = 'DogodkiController/create';
$route['addEventComment/(:any)'] = 'DogodkiController/add_comment/$1';
$route['forum_post/(:any)'] = 'NavrhuController/load_specific_post/$1';
$route['addPostComment/(:any)'] = 'NavrhuController/add_comment/$1';
$route['form_post'] = 'FormController/form_post';
$route['create_post'] = 'NavrhuController/create';