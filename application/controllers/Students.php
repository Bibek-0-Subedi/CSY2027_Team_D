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
        $data['announcements'] = $this->student->getAnnouncement();
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
        $data['assignment'] = $this->student->getAssignmentFileInfo($id);

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

    public function grades()
    {
        $data['grades'] = $this->student->getAllGrades();
        $this->loadViews('grades', 'Grades', $data);
    }

    
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

    public function patRequest()
    {
        $this->student->patRequest($this->session->userdata('student_id'));
        redirect('student/dashboard');
    }

    public function announcement($model_code){
        $data['announcements'] = $this->student->getModuleAnnouncement($model_code);
        $this->loadViews('announcement', 'Announcments', $data);
    }
}