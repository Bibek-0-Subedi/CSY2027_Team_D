<?php

class Students extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        if($this->router->fetch_method() != 'login' && !$this->session->userdata('student_logged')){
            redirect('student/login');
        }
    }
    

    public function loadViews($page, $title, $data = []){
        
        $this->load->view('layouts/header', ['title' => $title]);
        $this->load->view('layouts/siteNav');
        $this->load->view('student/'.$page, $data);
        if($page == 'login'){
            $this->load->view('layouts/footer');
        }
    }
    public function dashboard(){
        $data['student'] = $this->student->getStudent($this->session->userdata('student_id'));
        $this->loadViews('dashboard', 'Dashboard', $data);
    }

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
                redirect('student/login');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('student_logged');

        redirect('/');
    }

    public function modules()
    {
        $data['modules'] = $this->student->modules();
        $this->loadViews('modules', 'Student Modules', $data);
    }
    
    public function module($id)
    {
        if(!isset($id) || empty($id)){
            redirect('student/modules');
        }

        $data['module'] = $this->student->module($id);
        $data['module_files'] = $this->student->module_files($id);

        if(!$data['module']){
            redirect('student/modules');
        }

        $this->loadViews('module', $data['module']['module_name'].' Module', $data);

    }

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

}