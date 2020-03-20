<?php

class Students extends CI_Controller {
    
    public function loadViews($page, $title, $data = []){
        if(!$this->session->userdata('student_logged')){
            redirect('student/login');
        }
        $this->load->view('layouts/header', ['title' => $title]);
        $this->load->view('layouts/siteNav');
        $this->load->view('student/'.$page, $data);
        $this->load->view('layouts/footer');
    }
    public function dashboard() {
        $this->loadViews('dashboard', 'Dashboard');
    }
    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layouts/header');
            $this->load->view('layouts/siteNav');
            $this->load->view('page/studentlogin');
        }
        else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $student = $this->student->login($email, $password);
            
            $student_data = array(
                'id' => $student['id'],
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

}