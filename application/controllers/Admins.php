<?php

class Admins extends CI_Controller {
    
    public function loadViews($page, $title, $data = []){
        $this->load->view('layouts/header', ['title' => $title]);
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

    


}



?>