<?php

class Admins extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin');
    }
    

    public function loadViews($page, $title, $data = []){
        $this->load->view('layout/header', ['title' => $title]);
        $this->load->view('layout/adminNav');
        $this->load->view('admin/'.$page, $data);
        $this->load->view('layout/footer');
    }

    public function index() {
        $title['title'] = 'admin';
    }

    public function dashboard() {
        $this->loadViews('dashboard', 'Dashboard');
    }

    public function admission() {
        
        $data['admissions'] = $this->Admin->tableGenerator();
        $this->loadViews('admission', 'Admission',$data);
    }

    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->loadViews('admission', 'Admission');
        }
        else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $staff_id = $this->admin->login($email,$password);

            if ($staff_id) {
                echo 'good till now';
            }
        }

        $this->loadViews('admission', 'Admission');

    }

    public function student() {
        $this->loadViews('student', 'Student');
    }

    public function staff() {
        $this->loadViews('staff', 'Staff');
    }

    public function course() {
        $this->loadViews('course', 'Course');
    }

    public function module() {
        $this->loadViews('module', 'Module');
    }

    public function uploadCSV()
    {
        if($this->input->post('upload')){
            $csvFileName = explode(".", $_FILES['UCASDetail']['name']);
            if(end($csvFileName) == "csv"){
                $this->Admin->csvUpload($_FILES['UCASDetail']);
            }
        }
        redirect('admin/admission');
    }
}



?>
