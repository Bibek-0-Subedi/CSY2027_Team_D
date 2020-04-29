<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] = 'admins/index';
$route['admin/dashboard'] = 'admins/dashboard';
$route['admin/admission'] = 'admins/admission';
$route['admin/casefile/(:any)'] = 'admins/casefile/$1';
$route['admin/createCaseFile/(:any)'] = 'admins/createCaseFile/$1';
$route['admin/login'] = 'admins/login';
$route['admin/logout'] = 'admins/logout';
$route['admin/student'] = 'admins/student';
$route['admin/studentDetail'] = 'admins/studentDetail';
$route['admin/studentDetail/(:any)'] = 'admins/studentDetail/$1';
$route['admin/student/(:any)'] = 'admins/student/$1';
$route['admin/staff'] = 'admins/staff';
$route['admin/staff/(:any)'] = 'admins/staff/$1';
$route['admin/course'] = 'admins/course';
$route['admin/course/(:any)'] = 'admins/course/$1';
$route['admin/module'] = 'admins/module';
$route['admin/module/(:any)'] = 'admins/module/$1';
$route['admin/announcement'] = 'admins/announcement';
$route['admin/addAnnouncement'] = 'admins/addAnnouncement';
$route['admin/deleteAnnouncement/(:any)'] = 'admins/deleteAnnouncement/$1';
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
$route['admin/archivemodule'] = 'admins/archiveModule';

//route for TimeTable
$route['admin/timeTable'] = 'admins/timeTable';
$route['admin/timeTable/(:any)'] = 'admins/timeTable/$1';
$route['admin/editTimeTable/(:any)'] = 'admins/editTimeTable/$1';
$route['admin/createTimeTable/(:any)'] = 'admins/createTimeTable/$1';
$route['admin/timeTableView/(:any)'] = 'admins/timeTableView/$1';

//student pages
$route['student/dashboard'] = 'students/dashboard';
$route['student/updateData'] = 'students/updateData';
$route['student/modules'] = 'students/modules';
$route['student/grades'] = 'students/grades';
$route['student/patRequest'] = 'students/patRequest';
$route['student/module/assignment/(:any)'] = 'students/assignment/$1';
$route['student/module/uploadAssignment'] = 'students/uploadAssignment';
$route['student/module/attendance/(:any)'] = 'students/attendance/$1';
$route['student/module/announcement/(:any)'] = 'students/announcement/$1';
$route['student/module/(:any)'] = 'students/module/$1';
$route['student/login'] = 'students/login';
$route['student/logout'] = 'students/logout';
// $route['student/attendance'] = 'students/attendance';
$route['student/logout'] = 'students/logout';

//route for the pages
$route['(:any)'] = 'pages/view/$1';


//tutor pages
$route['tutor/dashboard'] = 'tutors/dashboard';
$route['tutor/announcement'] = 'tutors/announcement';
$route['tutor/addAnnouncement'] = 'tutors/addAnnouncement';
$route['tutor/deleteAnnouncement/(:any)'] = 'tutors/deleteAnnouncement/$1';
$route['tutor/profile'] = 'tutors/profile';
$route['tutor/module/addAttendance'] = 'modules/addAttendance';
$route['tutor/module/takeAttendance/(:any)/(:any)'] = 'modules/attendance/$1/$2';
$route['tutor/module/attendance/(:any)/(:any)'] = 'tutors/attendance/$1/$2';
$route['tutor/modules'] = 'tutors/modules';

//route for assignment
$route['tutor/module/assignment/index/(:any)'] = 'assignments/index/$1';
$route['tutor/module/assignment/index/(:any)/(:any)'] = 'assignments/index/$1/$2';
$route['tutor/module/assignment/add/(:any)'] = 'assignments/add/$1';
$route['tutor/module/assignment/edit/(:any)/(:any)'] = 'assignments/update/$1/$2';
$route['tutor/module/assignment/view/(:any)'] = 'assignments/view/$1';
$route['tutor/module/assignment/view/(:any)/(:any)'] = 'assignments/view/$1/$2';
$route['tutor/module/assignment/upload'] = 'assignments/upload';
$route['tutor/module/assignment/grade/(:any)/(:any)'] = 'assignments/grade/$1/$2';
$route['tutor/module/studentList/(:any)'] = 'tutors/studentList/$1';
$route['tutor/module/grade/(:any)/(:any)'] = 'tutors/grade/$1/$2';
$route['tutor/module/update/(:any)/(:any)'] = 'modules/update/$1/$2';
$route['tutor/module/add/(:any)'] = 'modules/add/$1';
$route['tutor/module/(:any)/(:any)'] = 'modules/view/$1/$2';

// $route['tutor/module/(:any)'] = 'tutors/module/$1';
$route['tutor/getForm'] = 'tutors/getForm';
$route['tutor/add/(:any)'] = 'tutors/add/$1';
$route['tutor/updateData'] = 'tutors/updateData';


//tutor pat pages
$route['tutor/pat'] = 'tutors/patList';
$route['tutor/pat/view/(:any)'] = 'tutors/patInfo/$1';
$route['tutor/pat/add/(:any)'] = 'tutors/addPat/$1';
$route['tutor/pat/edit/(:any)/(:any)'] = 'tutors/editPat/$1/$2';

//tutor diary pages
$route['tutor/diary'] = 'tutors/diaryList';
$route['tutor/diary/add'] = 'tutors/addDiary';
$route['tutor/diary/edit/(:any)'] = 'tutors/editDiary/$1';

//module pages
$route['tutor/module/(:any)'] = 'modules/view/$1';

//module tutor pages


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
