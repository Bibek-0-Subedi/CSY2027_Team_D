<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admins/index';
$route['admin/dashboard'] = 'admins/dashboard';
$route['admin/admission'] = 'admins/admission';
$route['admin/student'] = 'admins/student';
$route['admin/staff'] = 'admins/staff';
$route['admin/course'] = 'admins/course';
$route['admin/module'] = 'admins/module';
<<<<<<< HEAD
$route['admin/login'] = 'admins/login';

//route for the pages
$route['(:any)'] = 'pages/view/$1';
=======
>>>>>>> 7359380c773338f9ab35b1666daef9f542e32578

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
