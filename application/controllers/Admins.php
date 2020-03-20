<?php

class Admins extends CI_Controller {
    
    public function loadViews($page, $title, $data = []){
        $this->load->view('layouts/header', ['title' => $title]);
<<<<<<< HEAD
        $this->load->view('layouts/adminNav');
=======
>>>>>>> 7359380c773338f9ab35b1666daef9f542e32578
        $this->load->view('admin/'.$page, $data);
        $this->load->view('layouts/footer');
    }

    public function index() {
        $title['title'] = 'admin';
    }

    public function dashboard() {
        $this->loadViews('dashboard', 'Dashboard');
    }

    public function admission() {
        $this->loadViews('admission', 'Admission');
    }

    public function login() {
<<<<<<< HEAD
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
=======
        $this->loadViews('admission', 'Admission');
>>>>>>> 7359380c773338f9ab35b1666daef9f542e32578
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

    


}



?>