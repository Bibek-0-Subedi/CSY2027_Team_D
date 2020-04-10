<?php

class Modules extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Module');
    }

    public function loadViews($page, $title, $data = []){

        if(($this->session->userdata('type')) != 3){
            redirect('admin/login');
        }
        $this->load->view('layouts/header', ['title' => $title]);
        $this->load->view('layouts/adminNav');
        $this->load->view('module/'.$page, $data);
        $this->load->view('layouts/adminfooter');
    }

    public function view($id){
        $module_files = $this->Module->module_files($id);
        $module = $this->Module->select($id);
        $data = [
            'module_files' => $module_files,
            'modules' => $module
        ];

        $this->loadViews('view', 'View Module', $data);
    }

   public function add($id) {

        $this->form_validation->set_rules('module_date', 'Title', 'required');
         $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() === FALSE) {

            $modules = $this->Module->select($id);
            $moduleF = $this->Module->module_files($id);

            $data = [
                'modules' => $modules,
                'modules_file' => $moduleF
            ];

            $this->loadViews('add', 'Add Module', $data);
        }
        else {
            $success = $this->Module->addMaterials();
            if($success){
            redirect('module/view/' . $id);
            }
        }
    }

    public function attendance()
    {
        $moduleCode = $this->uri->segment(3);

        $attendanceDate = $this->uri->segment(4);
        
        if(!(bool)strtotime($attendanceDate)){
            redirect('tutor/module');
        }

        

        if(empty($attendanceDate)){
            $attendanceDate = date('Y-m-d');
        }

        $data['students'] = $this->Module->attendance($moduleCode, $attendanceDate);
        $data['attendance'] = $this->Module->getAttendance($moduleCode, $attendanceDate);
        
        $this->loadViews('attendance', 'Attendance', $data);
    }

    public function addAttendance()
    {
        // $this->form_validation->set_rules('module_code', 'Module Code', 'trim|required');
        // $this->form_validation->set_rules('student_id', 'Student Id', 'trim|required|');
        // $this->form_validation->set_rules('staff_id', 'Staff Id', 'trim|required');
        // $this->form_validation->set_rules('date', 'Date', 'trim|required');
        // $this->form_validation->set_rules('status', 'Status', 'trim|required');

        $time = strtotime($this->input->post('date'));
        $date = date('Y-m-d',$time);

        $this->Module->addAttendance($date);

        // if ($this->form_validation->run() === FALSE) {
        //     $data['info'] = 'failed';
        // }else{
        //     $time = strtotime($this->input->post('date'));
        //     $date = date('Y-m-d',$time);

        //     $data['info'] = [
        //         'module_code' => $this->input->post('module_code'),
        //         'student_id' => $this->input->post('student_id'),
        //         'staff_id' => $this->input->post('staff_id'),
        //         'date' => $date,
        //         'status' => $this->input->post('status')
        //     ];

        //     $this->Module->addAttendance($data);
        // }

        $this->loadViews('addAttendance', 'Add Attendance');
    }
}

