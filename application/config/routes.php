<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admins/index';
$route['admin/dashboard'] = 'admins/dashboard';
$route['admin/admission'] = 'admins/admission';
$route['admin/casefile/(:any)'] = 'admins/casefile/$1';
$route['admin/login'] = 'admins/login';
$route['admin/logout'] = 'admins/logout';
$route['admin/student'] = 'admins/student';
$route['admin/staff'] = 'admins/staff';
$route['admin/staff/(:any)'] = 'admins/staff/$1';
$route['admin/course'] = 'admins/course';
$route['admin/course/(:any)'] = 'admins/course/$1';
$route['admin/module'] = 'admins/module';
$route['admin/module/(:any)'] = 'admins/module/$1';
$route['admin/add'] = 'admins/add';


$route['admin/uploadCSV'] = 'admins/uploadCSV';

//route for staff
$route['admin/staffDetail'] = 'admins/staffDetail';
$route['admin/staffDetail/(:any)'] = 'admins/staffDetail/$1';
$route['admin/archiveStaff'] = 'admins/archiveStaff';

//route for Course
$route['admin/courseDetail'] = 'admins/courseDetail';
$route['admin/courseDetail/(:any)'] = 'admins/courseDetail/$1';
$route['admin/archiveCourse'] = 'admins/archiveCourse';

//route for Module
$route['admin/moduleDetail'] = 'admins/moduleDetail';
$route['admin/moduleDetail/(:any)'] = 'admins/moduleDetail/$1';
$route['admin/moduleCourse'] = 'admins/archiveModule';

//route for assignment
$route['assignment/index'] = 'assignments/index';
$route['assignment/add'] = 'assignments/add';
$route['assignment/edit/(:any)'] = 'assignments/edit/$1';
$route['assignment/view'] = 'assignments/view';
$route['assignment/upload'] = 'assignments/upload';
$route['assignment/grade/(:any)'] = 'assignments/grade/$1';
$route['assignment/update'] = 'assignments/update';



//route for the pages
$route['(:any)'] = 'pages/view/$1';


//student pages
$route['student/dashboard'] = 'students/dashboard';
$route['student/login'] = 'students/login';
$route['student/logout'] = 'students/logout';

//leader pages
$route['leader/dashboard'] = 'leaders/dashboard';

//tutor pages
$route['tutor/dashboard'] = 'tutors/dashboard';
$route['tutor/module/(:any)'] = 'tutors/module/$1';
$route['tutor/getForm'] = 'tutors/getForm';
$route['tutor/add/(:any)'] = 'tutors/add/$1';
$route['tutor/updateData/(:any)'] = 'tutors/updateData/$1';

//module pages
$route['module/add/(:any)'] = 'modules/add/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
