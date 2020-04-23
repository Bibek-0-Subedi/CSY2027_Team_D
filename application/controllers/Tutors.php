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
        $data['tutor'] = $this->tutor->select();
        $this->loadViews('dashboard', 'Dashboard', $data);
    }

    public function profile($id){
        $this->loadViews('profile', 'Profile');
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
    public function updateData($id){
        $data['id'] = $id;

        $this->form_validation->set_rules('firstname', ' Name', 'required');

        if($this->form_validation->run() === FALSE){
                $this->loadViews('updateData', 'Edit Staff', $data);
        }   
        else{   
              if($this->session->userdata('approval') == 0){
                  $this->Tutor->updateData($id); 
                     redirect('tutor/dashboard');
              }
              else{
                    echo "Request has been sent!";
              }
        }
    }
    public function attendance($id)
    {
        $data['attendances'] = $this->Tutor->attendance($id);
        $this->loadViews('attendanceRecord', 'Attendance Record', $data);
    }
    public function grade($id)
    {
        $data['grades'] = $this->Tutor->grade($id);
        $this->loadViews('gradeRecord', 'Grade Record', $data);
    } 
}