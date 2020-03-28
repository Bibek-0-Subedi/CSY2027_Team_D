<?php

class Admins extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Admin');

         
        // This section works but commented for now
        
        if($this->router->fetch_method() != 'login' && $this->session->userdata('type') != 1){
            header('Location: login');
        } 
        
        
    }


    public function loadViews($page, $title, $data = [])
    {
        $this->load->view('layouts/header', ['title' => $title]);
        if($this->session->userdata('type') == 1){
            $this->load->view('layouts/adminNav');
        }else{
            $this->load->view('layouts/siteNav');
        }
        $this->load->view('admin/' . $page, $data);
        $this->load->view('layouts/adminfooter');
        $this->load->view('layouts/footer');
    }

    public function index()
    {
        
    }

    public function dashboard()
    {
        $this->loadViews('dashboard', 'Dashboard');
    }

    public function admission()
    {
        $data['admissions'] = $this->admin->tableGenerator($this->admin->getAdmissions());
        $this->loadViews('admission', 'Admission', $data);
    }

    public function login()
    {
        if($this->session->userdata('type') == 1){
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
        $data['students'] = $this->admin->tableGenerator($this->admin->getStudents());
        $this->loadViews('student', 'Students', $data);
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

    public function add()
    {
        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
        $this->form_validation->set_rules('middlename', 'Middlename', 'trim|required');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|required');
        $this->form_validation->set_rules('tempAddress', 'Temporary Address', 'trim|required');
        $this->form_validation->set_rules('permAddress', 'Permanent Address', 'trim|required');
        $this->form_validation->set_rules('contact', 'Contact', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('qualification', 'Qualifications', 'trim|required');
        $this->form_validation->set_rules('courseCode', 'Course Code', 'trim|required');
        
        if ($this->form_validation->run() === FALSE) {
            $data['courses'] = $this->admin->add();
            $this->loadViews('add', 'Add Student', $data);

        }else{
            $add = $this->admin->addStudent();
            if($add){
                redirect('admin/admission');
            }else{
                redirect('admin/add');
            }
        }
    }

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

    public function casefile($id)
    {
        $data = $this->admin->getStudentData($id);

        $this->loadViews('casefile', 'Case File',$data);
    }

    public function uploadDoc()
    {
        if($this->input->post('studentDoc')){
            $this->admission->docUpload($_FILES['studentDoc']);
        }
    }
}
