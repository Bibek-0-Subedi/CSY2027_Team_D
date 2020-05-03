<?php

class Students extends CI_Controller {
    
    //contructor to load the model
    public function __construct()
    {
        parent::__construct();
        if($this->router->fetch_method() != 'login' && !$this->session->userdata('student_logged')){
            redirect('student/login');
        }
    }
    //loads the view page of the student
    public function loadViews($page, $title, $data = []){
        
        $this->load->view('layouts/header', ['title' => $title]);
        $this->load->view('layouts/siteNav');
        $this->load->view('student/'.$page, $data);
        if($page == 'login'){
            $this->load->view('layouts/footer');
        }
    }
    //function to show all the announcements, student data and timetable or any nofication in the dashboard view page of the student
    public function dashboard(){
        $data['timetable'] = $this->student->getTimeTable($this->session->userdata('student_id'));
        $data['student'] = $this->student->getStudent($this->session->userdata('student_id'));
        $data['announcements'] = $this->student->getAnnouncement();
        $this->loadViews('dashboard', 'Dashboard', $data);
    }
    //function to show the timetable
    public function viewTimeTable($id){

        $timetable = $this->admin->getTableData($id,'routine_id',  'timetables');
        $deser_timetable = unserialize($timetable['timetable']); 
        $data =['timetable' => $deser_timetable]; 
        $this->loadViews('viewTimeTable', 'View Table', $data);
    }
    //function to login to the system
    public function login() {

        if($this->session->userdata('student_logged')){
            header('Location:dashboard');
        }

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->loadViews('login','Student Login');
        }
        else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $student = $this->student->login($email, $password);
            
            $student_data = array(
                'student_id' => $student['student_id'],
                'name' => $student['firstname'],
                'email' => $email,
                'student_logged' => true
            );            
            if ($student) {
                $this->session->set_userdata($student_data);
                redirect('student/dashboard');
            }else {
                $this->session->set_flashdata('invalid', 'Email or password is incorrect ! Try Again');
                redirect('student/login');
            }
        }
    }
    //function to logout from the system
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('student_logged');

        redirect('/');
    }
    //function to list all the modules assigned to the student
    public function modules()
    {
        $data['modules'] = $this->student->modules();
        $this->loadViews('modules', 'Student Modules', $data);
    }
    //function to load modules and its files
    public function module($id)
    {
        if(!isset($id) || empty($id)){
            redirect('student/modules');
        }

        $data['module'] = $this->student->module($id);
        $data['module_files'] = $this->student->module_files($id);
        $data['assignment'] = $this->student->getAssignmentFileInfo($id);

        if(!$data['module']){
            redirect('student/modules');
        }

        $this->loadViews('module', $data['module']['module_name'].' Module', $data);

    }
    //function to load the attendance record
    public function attendance($id)
    {
        
        // $moduleCode = $this->uri->segment(3);
        // if(!empty($id)){
            $data['module'] = $this->student->module($id);
            $data['attendances'] = $this->student->attendance($this->session->userdata('student_id'), $id);
            $this->loadViews('attendance', 'Attendance', $data);
        // }

        // $attendanceDate = $this->uri->segment(4);

        
    }
    //function to update the data of the student
    public function updateData(){
        $data = $this->student->getStudent($this->session->userdata('student_id'));

        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('surname', 'Surname', 'required');
        $this->form_validation->set_rules('permanent_address', 'Address', 'required');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if($this->form_validation->run() === FALSE){
                $this->loadViews('updateData', 'Edit Data', $data);
        }   
        else{   
              if($this->session->userdata('approval') == 0){
                  $this->student->sendRequest($data['student_id']); 
                     redirect('student/dashboard');
              }
              else{
                    echo "Request has been sent!";
              }
        }
    }
    //function to list all the diary information added by the student
    public function diaryList()
    {
        $data['diaries'] = $this->student->selectDiary();
        $this->loadViews('diaryList', 'Diary', $data);
    }
    //function to add the diary information
    public function addDiary(){
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('information', 'Information', 'required');
    
        if ($this->form_validation->run() === FALSE) {
             
             $data['diaries'] = $this->student->selectDiary();
             $this->loadViews('diary', 'Add Information', $data); 

        }
        else {
            $success = $this->student->insertDiary();
            if($success){
            redirect('student/diary');
            }
        }
    }
    //function to edit the added diary information
    public function editDiary($id){
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('information', 'Information', 'required');
    
        if ($this->form_validation->run() === FALSE) {    
             $data = [
                    'diary_id' => $id
                ];
             $this->loadViews('editDiary', 'Edit Information', $data); 
        }
        else {
            $success = $this->Tutor->updateDiary($id);
            if($success){
            redirect('tutor/diary');
            }
        }
    }
    //function to view the student's grades
    public function grades()
    {
        $data['grades'] = $this->student->getAllGrades();
        $this->loadViews('grades', 'Grades', $data);
    }
    //function to view the assignments uploaded by the tutor
    public function assignment($module_code)
    {
        $data['assignment'] = $this->student->getAssignmentFileInfo($module_code);
        $data['submitted'] = $this->student->getAssignment($module_code);

        if($data['assignment']['archive'] == 0){
            $this->loadViews('assignment', $data['assignment']['module_name'].' Grade', $data);
        }else{
            redirect('student/module/'.$module_code);
        }
    }
    //function to upload/add the assignment
    public function uploadAssignment()
    {
        $config['upload_path'] = './assets/assignment_submissions/';
        $config['allowed_types'] = 'jpg|png|pdf|zip|doc|docx|ppt|pptx';
        $config['max_size'] = '4096';
        
        $this->load->library('upload', $config);
        
        if(!$this->upload->do_upload('assignmentFile')){
            $this->session->set_flashdata('assignmentUpload', 'Upload Failed');
        }
        else{
            $this->session->set_flashdata('assignmentUpload', 'Upload Successful');
            $uploadData = $this->upload->data();
            $file = $uploadData['file_name'];
        }

        $data = array(
            'grade' => null,
            'module_code' => $this->input->post('module_code'),
            'student_id' => $this->input->post('student_id'),
            'assignment_file' => $file
        );
        $this->db->insert('assignments', $data);

        redirect('student/module/assignment/'.$data['module_code']);
    }
    //function to send the request for the pat session
    public function patRequest()
    {
        $this->student->patRequest($this->session->userdata('student_id'));
        redirect('student/dashboard');
    }
    //function to view the announcements
    public function announcement($model_code){
        $data['announcements'] = $this->student->getModuleAnnouncement($model_code);
        $this->loadViews('announcement', 'Announcments', $data);
    }
}