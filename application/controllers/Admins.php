<?php

class Admins extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin');
    }


    public function loadViews($page, $title, $data = [])
    {
        $this->load->view('layouts/header', ['title' => $title]);
        $this->load->view('layouts/adminNav');
        $this->load->view('admin/' . $page, $data);

        $this->load->view('layouts/adminfooter');
    }

    public function index()
    {
        $title['title'] = 'admin';
    }

    public function dashboard()
    {
        $this->loadViews('dashboard', 'Dashboard');
    }

    public function admission()
    {

        $data['admissions'] = $this->Admin->tableGenerator();
        $this->loadViews('admission', 'Admission', $data);
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layouts/header');
            $this->load->view('layouts/siteNav');
            $this->load->view('page/adminlogin');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $staff_id = $this->admin->login($email, $password);

            if ($staff_id) {
                $staff_data = array(
                    'id' => $staff_id['id'],
                    'name' => $staff_id['firstname'],
                    'email' => $email,
                    'type' => $staff_id['type']
                );
                $this->session->set_userdata($staff_data);
                switch ($staff_id['type']) {
                    case '1':
                        redirect('admin/dashboard');
                        break;
                    case '2':
                        redirect('leader/dashboard');
                        break;
                    case '3':
                        redirect('tutor/dashboard');
                        break;
                }
            } else {
                redirect('admin/login');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('type');

        redirect('/');
    }

    public function student()
    {
        $this->loadViews('student', 'Student');
    }

    public function staff()
    {
        $this->loadViews('staff', 'Staff');
    }

    public function course()
    {
        $this->loadViews('course', 'Course');
    }

    public function module()
    {
        $this->loadViews('module', 'Module');
    }

    public function uploadCSV()
    {
        if ($this->input->post('upload')) {
            $csvFileName = explode(".", $_FILES['UCASDetail']['name']);
            if (end($csvFileName) == "csv") {
                $this->Admin->csvUpload($_FILES['UCASDetail']);
            }
        }
        redirect('admin/admission');
    }
}
