<?php

class Admins extends CI_Controller
{
    //contructor to load the model
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Admin');

         
        // This section works but commented for now
        
        if($this->router->fetch_method() != 'login'){
            if(!($this->session->userdata('type') == 1 || $this->session->userdata('type') == 2)){
                header('Location: login');
            }
        }
    }
    //loads the view page of the admin
    public function loadViews($page, $title, $data = [])
    {
        $this->load->view('layouts/header', ['title' => $title]);
        if($this->session->userdata('type') == 1 || $this->session->userdata('type') == 2){
            $this->load->view('layouts/adminNav');
        }else{
            $this->load->view('layouts/siteNav');
        }
        $this->load->view('admin/' . $page, $data);
        if($page == 'login'){
            $this->load->view('layouts/footer');
        }else{
            $this->load->view('layouts/adminfooter');
        }
    }
    //loads the index page of the admin
    public function index()
    {
        
    }
    //function to show all the announcements, student/staff request data or any notifications in the dashboard
    public function dashboard()
    {     
        $data['staffRequests'] = $this->admin->staffRequests();
        $data['studentRequests'] = $this->admin->studentRequests();
        $this->loadViews('dashboard', 'Dashboard', $data);
    }
    //function to load admission
    public function admission()
    {
        // $data['admissions'] = $this->admin->tableGenerator($this->admin->getAdmissions());
        $data['courses'] = $this->admin->getAssignableCourse();
        if (isset($_POST['filter'])){
            if($_POST['assigned'] == 3){
                $assigned = "null";
            }
            else{
                $assigned = $_POST['assigned'];
            }
            if($_POST['status'] == 3 ){
                $status = "null";
            }
            else{
                $status = $_POST['status'];
            }
            if($_POST['course'] == 0){
                $course = "null";
            }
            else{
                $course = $_POST['course'];
            }
            $data['admissions'] = $this->admin->filterAdmission($assigned, $status, $course);
            $this->loadViews('admission', 'Admission', $data);
        }
        else{
            $data['admissions'] = $this->admin->getAdmissions();
            $this->loadViews('admission', 'Admission', $data);
        }
    }
    //function to login to the system
    public function login()
    {
        if($this->session->userdata('type') == 1 || $this->session->userdata('type') == 2){
            header('Location:dashboard');
        }

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->loadViews('login', 'Staff LogIn');

        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $staff_id = $this->admin->login($email, $password);

            if ($staff_id) {
                $staff_data = array(
                    'id' => $staff_id['staff_id'],
                    'name' => $staff_id['firstname'],
                    'middlename' => $staff_id['middlename'],
                    'surname' => $staff_id['surname'],
                    'address' => $staff_id['address'],
                    'subject' => $staff_id['subject'],
                    'contact' => $staff_id['contact'],
                    'email' => $email,
                    'type' => $staff_id['role']
                );
                $this->session->set_userdata($staff_data);
                switch ($staff_data['type']) {
                    case '1':
                        redirect('admin/dashboard');
                        break;
                    case '2':
                        redirect('admin/dashboard');
                        break;
                    case '3':
                        redirect('tutor/dashboard');
                        break;
                }
            } else {
                $this->session->set_flashdata('invalid', 'Email or password is incorrect ! Try Again');
                redirect('admin/login');
            }
        }
    }
    //function to logout from the system
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('type');

        redirect('/');
    }
    //function to list all the students in the student view page of admin
    public function student($id = false)
    {
        //to archive the student
        if($id){
            if (isset($_POST['archive'])) {
                $archive = ['archive' => '1'];
                $this->admin->assign_archive_student($id , $archive);
                $this->session->set_flashdata('archived', 'Student Detail Archived Successfully !');
                redirect('admin/student');
            }
        }
        //to assign the pat tutor to the student
        elseif(isset($_POST['assignPatTutor'])){
            $id = $this->input->post('student_id'); 
            $assign = ['pat_tutor' => $this->input->post('pat_tutor')];
            $this->admin->assign_archive_student($id , $assign);
            $this->session->set_flashdata('assigned', 'Pat Tutor Assigned Successfully !');
            redirect('admin/student'); 
        //to filter the student according to the status           
        }elseif (isset($_POST['filter'])){
            if($_POST['status'] == 3){
                $status = "null";
            }
            else{
                $status = $_POST['status'];
            }
            if($_POST['course'] == 'null'){
                $course = "null";
            }
            else{
                $course = $_POST['course'];
            }

            $data['tutors'] = $this->admin->getAssignablePatTutor();
            $data['courses'] = $this->admin->getAssignableCourse();
            $data['students'] = $this->admin->filterStudent($status, $course);
           $this->loadViews('student', 'students', $data);
        }else{
            $data['tutors'] = $this->admin->getAssignablePatTutor();
            $data['courses'] = $this->admin->getAssignableCourse();
            $data['students'] = $this->admin->getStudents();
            $this->loadViews('student', 'Students', $data);    
        }    
    }
    //function to add and edit the student details 
    public function studentDetail($id = false)
    {
        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
        $this->form_validation->set_rules('middlename', 'Middlename', 'trim');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|required');
        $this->form_validation->set_rules('tempAddress', 'Temporary Address', 'trim|required');
        $this->form_validation->set_rules('permAddress', 'Permanent Address', 'trim|required');
        $this->form_validation->set_rules('contact', 'Contact', 'trim|required');
        $this->form_validation->set_rules('qualification', 'Qualifications', 'trim|required');
        $this->form_validation->set_rules('courseCode', 'Course Code', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            $data['courses'] = $this->admin->add();
            if($id){
                $data['student'] = $this->admin->studentEditData($id);
                $this->loadViews('studentDetail', 'Edit Student', $data);
            }
            else{
                $data['student'] = ['student_id' => '', 'firstname' => '', 'middlename' => '' , 'surname' => '', 'temporary_address' => '', 'permanent_address' => '', 
                'contact' => '', 'email' => '','qualification' => '', 'courseCode' => ''];
                $this->loadViews('studentDetail', 'Add Student', $data);
            }
        }elseif ($id) {
            $this->admin->updateStudent($id);
            $this->session->set_flashdata('edited', 'Student Detail Updated Successfully !');
            redirect('admin/student');
        }
        else{
            $add = $this->admin->addStudent();
            $this->session->set_flashdata('added', 'Student Detail Added Successfully !');
            redirect('admin/admission');
        }
    }
    //function to upload the csv
    public function uploadCSV()
    {
        if ($this->input->post('upload')) {
            $csvFileName = explode(".", $_FILES['UCASDetail']['name']);
            if (end($csvFileName) == "csv") {
                $this->admin->csvUpload($_FILES['UCASDetail']);
            }
        }
        redirect('admin/admission');
    }

    //function to create the casefile
    public function casefile($id)
    {
        $data = $this->admin->getStudentData($id);

        if($this->input->post('createCaseFile')){
            $this->admin->createCaseFile($id);
            redirect('admin/admission');
        }else if($this->input->post('rejectApplication')){
            $this->admin->rejectApplication($id);
            redirect('admin/admission');
        }else if($this->input->post('conditional')){
            if($this->input->post('offer') == 'conditional'){
                $this->admission->conditional_letter($data['firstname'], $data['course_name'], date("Y/m/d", strtotime("+1 week")), $data['email']);
            }else if($this->input->post('offer') == 'unconditional'){
                $this->admission->non_conditional_letter($data['firstname'], $data['course_name'], date("Y/m/d", strtotime("+1 week")), $data['email']);
            }
            redirect('admin/casefile/'.$id);
        }else if($this->input->post('liveDormant')){
            $this->admin->liveDormant($id);
            redirect('admin/admission');
        }else if($this->input->post('sendFollowUpEmail')){
            $this->admission->follow_up_letter($data['firstname'], $data['course_name'], date("Y/m/d", strtotime("+2 weeks")),  $data['email']);
            redirect('admin/casefile/'.$id);
        }else{
            $this->loadViews('casefile', 'Case File',$data);
        }

    }
    //function to create the case file
    public function createCaseFile($id)
    {
        
        // $this->loadViews('casefile', 'Case File',$data);
    }
    //function to upload the documents
    public function uploadDoc()
    {
        if($this->input->post('studentDoc')){
            $this->admission->docUpload($_FILES['studentDoc']);
        }
    }
    //function to list all the staff in the staff view page of admin
    public function staff($id = false)
    {
        //to archive the student
        if($id){
            if (isset($_POST['archive'])) {
                $archive = ['archive' => '1'];
                $this->admin->assign_archive_staff($id , $archive);
                $this->session->set_flashdata('archived', 'Data Archived Successfully !');
                redirect('admin/staff');   
            }
        }
        //to assign the course to the staff
        elseif(isset($_POST['assignCourse'])){
            $id = $this->input->post('staff_id'); 
            $assign = ['subject' => $this->input->post('subject')];
            $this->admin->assign_archive_staff($id , $assign);
            $this->session->set_flashdata('assigned', 'Course Assigned Successfully !');
            redirect('admin/staff'); 
        //to filter according to the status           
        }elseif (isset($_POST['filter'])){
            if($_POST['status'] == 3){
                $status = "null";
            }
            else{
                $status = $_POST['status'];
            }
            if($_POST['subject'] == 'null'){
                $sub = "null";
            }
            else{
                $sub = $_POST['subject'];
            }
            if($_POST['role'] == 0){
                $role = "null";
            }
            else{
                $role = $_POST['role'];
            }

            $data['staff'] = $this->admin->filterStaff($status, $sub, $role);
            $data['course'] = $this->admin->getAssignableCourse();
            $this->loadViews('staff', 'Staff', $data);
        } else{
            $data['staff'] = $this->admin->staff();
            $data['course'] = $this->admin->getAssignableCourse();
            $this->loadViews('staff', 'Staff', $data);
        }
    }
    //function to add and edit the staff details 
    public function staffDetail($id = false)
    {

        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('firstname', 'Firstname', 'required');
        $this->form_validation->set_rules('surname', 'Surname', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        if ($id && isset($_POST['add'])) {
            $staff = $this->admin->getTableData($id, 'staff_id', 'staff');
            if ($staff['staff_id'] != $_POST['staff_id']) {
                $this->form_validation->set_rules('staff_id', 'Staff id', 'required|integer|is_unique[staff.staff_id]');
            }            
            if ($staff['email'] == $_POST['email']) {
                $this->form_validation->set_rules('email', 'Email', 'required');
            }
            else {
                $this->form_validation->set_rules('email', 'Email', 'required|is_unique[staff.email]');
            }
        }else{
            $this->form_validation->set_rules('staff_id', 'Staff id', 'required|integer|is_unique[staff.staff_id]');
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[staff.email]');
            $this->form_validation->set_rules('password', 'Password', 'required');        
        }

        if ($this->form_validation->run() === FALSE) {
            $data['staff'] = $this->admin->getTableData($id, 'staff_id', 'staff');
            $data['courses'] = $this->admin->getTable('archive', 0, 'courses');    
            if ($id) {
                $this->loadViews('staffDetail', 'Edit Staff', $data);    
            } else {
                $data['staff'] = ['staff_id' => '', 'status' => '3' , 'firstname' => '', 'middlename' => '', 'surname' => '', 
                'address' => '', 'contact' => '', 'email' => '','password' => '', 'subject' => '', 'role' => ''];
                $this->loadViews('staffDetail', 'Add Staff', $data);
            }
        }elseif($id) {
            $this->admin->updateStaff($id);
            $this->session->set_flashdata('edited', 'Staff Updated Successfully !');
            redirect('admin/staff');
        }
        else{
            $this->admin->addStaff();
            $this->session->set_flashdata('added', 'Staff Added Successfully !');
            redirect('admin/staff');
        }
    }
    //function to list all the courses in the course view page of admin
    public function course($id = false)
    {
        //to archive the course
        if($id){
            if (isset($_POST['archive'])) {
                $data = ['archive' => '1'];
                $this->admin->archiveCourse($id , $data);
                $this->session->set_flashdata('archived', 'Course Archived Successfully !');
                redirect('admin/course');
                //to delete the course
            }elseif(isset($_POST['delete'])){
                $delete  = $this->admin->deleteCourse($id); 
                if($delete){
                    // $this->session->set_flashdata('cannotDelete', 'Course could not be Deleted  !');
                    exit();
                }
                else{
                    $this->session->set_flashdata('deleted', 'Course Deleted Successfully !');
                }
                redirect('admin/course');            
            }
        }
        //to filer
        elseif (isset($_POST['filter'])) {
            if($_POST['department_id'] == 0){
                $department = "";
            }
            else{
                $department = $_POST['department_id'];
            }
            $data['department'] = $this->admin->getTable('','','departments');
            $data['courses'] = $this->admin->course($department);
            $this->loadViews('course', 'Course' , $data);
        }
        else{
            $data['department'] = $this->admin->getTable('','','departments');
            $data['courses'] = $this->admin->course();
            $this->loadViews('course', 'Course' , $data);
        }
    }
    //to add or edit the course details
    public function courseDetail($id = false)
    {
        $course = $this->admin->getTableData($id, 'course_code', 'courses');

        $this->form_validation->set_rules('course_name', 'Course Name', 'required');
        $this->form_validation->set_rules('course_duration', 'Course Duration', 'required');
        $this->form_validation->set_rules('department_id', 'Department', 'required');

        if ($id && isset($_POST['add'])) {
            if ($course['course_code'] != $_POST['course_code']) {
                $this->form_validation->set_rules('course_code', 'Course Code', 'required|integer|is_unique[courses.course_code]');
            }      
        }          
        else{
            $this->form_validation->set_rules('course_code', 'Course Code', 'required|integer|is_unique[courses.course_code]');
        }
        if ($this->form_validation->run() === FALSE) {
            $department = $this->admin->getTable('','', 'departments');
            if ($id) {
                $courseLeader = $this->admin->getAssignableStaff('2', $id);
                $data = [
                    'course' => $course,
                    'department' => $department,
                    'courseLeader' => $courseLeader
                ];
                $this->loadViews('courseDetail', 'Edit Course', $data);    
            } else {
                $courseLeader = $this->admin->getAssignableStaff('2');
                $courseNull = ['course_code' => '', 'course_name' => '' , 'course_duration' => '', 'department_id' => '', 'course_leader' => ''];
                $data = [
                    'course' => $courseNull,
                    'department' => $department,
                    'courseLeader' => $courseLeader
                ];
                $this->loadViews('courseDetail', 'Add Course ', $data);    
            }
        }
        elseif($id){
            $this->admin->updateCourse($id);
            $this->session->set_flashdata('edited', 'Course Edited Successfully !');
            redirect('admin/course');
        }
        else{
            $this->admin->addCourse();
            $this->session->set_flashdata('added', 'Course Added Successfully !');
            redirect('admin/course');
        }
    }
    //function to list all the modules in the module view page of the admin
    public function module($id = false)
    {
        if($id){
            if (isset($_POST['archive'])) {
                $data = ['archive' => '1'];
                $this->admin->archiveModule($id , $data);
                $this->session->set_flashdata('archived', 'Module Archived Successfully !');
                redirect('admin/module');
            }elseif(isset($_POST['delete'])){
                $this->admin->deleteModule($id);
                $this->session->set_flashdata('archived', 'Module Deleted Successfully !');
                redirect('admin/module');            
            }
        }elseif (isset($_POST['filter'])) {
            if($_POST['course_code'] == 'null'){
                $course = "";
            }
            else{
                $course = $_POST['course_code'];
            }
            $data['course'] = $this->admin->course();        
            $data['modules'] = $this->admin->module($course);
            $this->loadViews('module', 'Module' , $data);    
        }
        else{
            $data['course'] = $this->admin->course();        
            $data['modules'] = $this->admin->module();
            $this->loadViews('module', 'Module' , $data);    
        }
    }
    //function to add or edit the module details
    public function moduleDetail($id = false)
    {
        $module = $this->admin->getTableData($id, 'module_code', 'modules');
    
        $this->form_validation->set_rules('module_name', 'Module Name', 'required');
        $this->form_validation->set_rules('module_duration', 'Module Duration', 'required');
        $this->form_validation->set_rules('course_code', 'Course', 'required');
        if ($id && isset($_POST['add'])) {
            if ($module['module_code'] != $_POST['module_code']) {
                $this->form_validation->set_rules('module_code', 'Module Code', 'required|integer|is_unique[modules.module_code]');
            }      
        }          
        else{
            $this->form_validation->set_rules('module_code', 'Module Code', 'required|integer|is_unique[modules.module_code]');
        }
        if ($this->form_validation->run() === FALSE) {
            $course  = $this->admin->getTable('','','courses');
            if ($id) {
                $moduleLeader = $this->admin->getAssignableStaff('3', $module['course_code']);
                $data = [
                    'module' => $module,
                    'course' => $course,
                    'moduleLeader' => $moduleLeader
                ];
                $this->loadViews('moduleDetail', 'Edit Module', $data);    
            } else {
                $moduleNull = ['module_code' => '', 'module_name' => '' , 'module_duration' => '', 'module_leader' => '', 'course_code' => ''];
                $data =[
                    'module' => $moduleNull,
                    'course' => $course
                ];
                $this->loadViews('moduleDetail', 'Add Module ', $data);    
            }
        }
        elseif($id){
            $this->admin->updateModule($id);
            $this->session->set_flashdata('edited', 'Module Edited Successfully !');
            redirect('admin/module');
        }
        else{
            $this->admin->addModule();
            $this->session->set_flashdata('added', 'Module Added Successfully !');
            redirect('admin/module');
        }
    }
    //function to list the timetable in the timetable view page of the admin
    public function timeTable($id = false){
        //to archive
        if($id){
            if (isset($_POST['archive'])) {
                $data = ['archive' => '1'];
                $this->admin->archiveTimeTable($id , $data);
                $this->session->set_flashdata('archived', 'TimeTable Archived Successfully !');
                redirect('admin/timeTable');
                //to delete
            }elseif(isset($_POST['delete'])){
                $this->admin->deleteTimeTable($id);
                $this->session->set_flashdata('archived', 'TimeTable Deleted Successfully !');
                redirect('admin/timeTable');            
            }
            //to create
        }elseif (isset($_POST['createTimetable'])) {
            unset($_POST['createTimetable']);
            
            $this->admin->addTimeTable();
            $this->session->set_flashdata('added', 'Time Table Added Successfully ! You can now create schedule');
            redirect('admin/timeTable');
        }
        else{
            $data['courses'] = $this->admin->course();
            $data['timetables'] = $this->admin->timetable();  

            //to load the pages
            $this->loadViews('timetable', 'Time Table', $data);
        }
    }
    //function to add the timetable
    public function addTimeTable(){
            $this->admin->addTimeTable();
    }
    //function to create the timetable
    public function createTimeTable($id){
        if(isset($_POST['createTable'])){
            unset($_POST['createTable']);

            $this->admin->createTimeTable($id);
            $this->session->set_flashdata('created', 'Time Table Created Successfully ! You can now view schedule');
            redirect('admin/timeTable');
        }
        $timetable = $this->admin->getTableData($id, 'routine_id', 'timetables');
        $module = $this->admin->module($timetable['course_name']);
        $data['timetable'] = $timetable;
        $data['modules'] = $module;
        $this->loadViews('createTimeTable', 'Create Table', $data);
    }
    //function to edit the timetable
    public function editTimeTable($id){
        if(isset($_POST['editTable'])){
            unset($_POST['editTable']);

            $this->admin->createTimeTable($id);
            $this->session->set_flashdata('edited', 'Time Table edited Successfully ! You can now view schedule');
            redirect('admin/timeTable');
        }
        $timetable = $this->admin->getTableData($id, 'routine_id', 'timetables');
        $deser_timetable = unserialize($timetable['timetable']); 
        $module = $this->admin->module($timetable['course_name']);
        $data =[
            'schedule' => $deser_timetable,
            'timetable' => $timetable,
            'modules' => $module
        ];     
        $this->loadViews('editTimeTable', 'Edit TimeTable', $data);
    }
    //function to view the timetable
    public function timeTableView($id){

        $timetable = $this->admin->getTableData($id,'routine_id',  'timetables');
        $deser_timetable = unserialize($timetable['timetable']); 
        $data =['timetable' => $deser_timetable]; 
        $this->loadViews('timeTableView', 'View Table', $data);
    }
    //function to list all the announcements added by the tutor
    public function announcement()
    {
        $data['announcements'] = $this->tutor->getAnnouncement();
        $this->loadViews('announcement', 'Announcements' , $data);
    }
    //function to add the announcements
    public function addAnnouncement()
    {
        $this->admin->addAnnouncement();
        redirect('admin/announcement');
    }
    //function to delete the added announcements
    public function deleteAnnouncement($id)
    {
        $this->tutor->deleteAnnouncement($id);
        redirect('admin/announcement');
    }

}
