<?php

class Tutors extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tutor');
    }
    public function loadViews($page, $title, $data = []){

        if(($this->session->userdata('type')) != 3){
            redirect('admin/login');
        }
        $this->load->view('layouts/header', ['title' => $title]);
        $this->load->view('layouts/adminNav');
        $this->load->view('tutor/'.$page, $data);
        $this->load->view('layouts/adminfooter');
    }
    public function dashboard(){
        $data['announcements'] = $this->tutor->getAnnouncement();
        $this->loadViews('dashboard', 'Dashboard', $data);
    }

    public function profile($id){
        $data['tutor'] = $this->tutor->selectTutor();
        $this->loadViews('profile', 'Profile',$data);
    }
    public function modules(){

            $module = $this->tutor->select();
            $data = [
                'modules' => $module
            ];
        $this->loadViews('module', 'Module', $data);
    }

    public function module(){
        $module = $this->tutor->select();
        $data = [
            'modules' => $module
        ];
        $this->loadViews('module', 'Module', $data);
    }

     public function student(){
            $module = $this->tutor->selectStudent();
            $data = [
                'modules' => $module
            ];
        $this->loadViews('student', 'Student', $data); 
    }
     public function studentList($id){
            $module = $this->tutor->selectStudent($id);
            $data = [
                'students' => $module
            ];
        $this->loadViews('studentList', 'Student List', $data); 
    }
    public function getForm() {

        $data['module'] = $this->Tutor->select();
        $this->loadViews('module', 'Module', $data);
    }
    public function updateData(){
        $data = $this->tutor->selectTutor();
        $data['courses'] = $this->admin->getTable('archive', 0, 'courses');    
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('surname', 'Surname', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');

        if($this->form_validation->run() === FALSE){
                $this->loadViews('updateData', 'Edit Data', $data);
        }   
        else{   
              if($this->session->userdata('approval') == 0){
                  $this->Tutor->sendRequest($data['staff_id']); 
                     redirect('tutor/dashboard');
              }
              else{
                    echo "Request has been sent!";
              }
        }
    }
    // public function attendance($id)
    // {
    //     $data['attendances'] = $this->Tutor->attendance($id);
    //     $this->loadViews('attendanceRecord', 'Attendance Record', $data);
    // }

    public function attendance()
    {
        
        $studentId = $this->uri->segment(4);
        $moduleCode = $this->uri->segment(5);
        // if(!empty($id)){
            $data['module'] = $this->student->module($moduleCode);
            $data['student'] = $this->student->getStudent($studentId);
            $data['attendances'] = $this->student->attendance($studentId, $moduleCode);
            $this->loadViews('attendance', 'Attendance', $data);
        // }


        
    }


    public function grade($id)
    {
        $data['module'] = $this->Tutor->select($id);
        $this->loadViews('gradeRecord', 'Grade Record', $data);
    } 

    public function announcement()
    {
        $data['modules'] = $this->tutor->select();
        $this->loadViews('announcement', 'Announcements' , $data);
    }

    public function addAnnouncement()
    {
        $this->tutor->addAnnouncement();
        redirect('tutor/announcement');
    }

}