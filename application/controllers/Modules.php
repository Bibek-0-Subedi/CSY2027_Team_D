<?php

class Modules extends CI_Controller {
    
    //contructor to load the model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Module');
    }
    //loads the view page of the module
    public function loadViews($page, $title, $data = []){

        if(($this->session->userdata('type')) != 3){
            redirect('admin/login');
        }
        $this->load->view('layouts/header', ['title' => $title]);
        $this->load->view('layouts/adminNav');
        $this->load->view('module/'.$page, $data);
        $this->load->view('layouts/adminfooter');
    }
    //function to list module files of module in the module view page 
    public function view($module_id = false, $file_id = false){
        //to archive the module file
        if($file_id){
            if(isset($_POST['archive'])) {
                $data = ['archive' => '1'];
                $this->Module->archiveFile($file_id , $data);
                $this->session->set_flashdata('archived', 'Module Materials Archived Successfully !');
                redirect('tutor/module/'. $module_id);
            //to unarchive the module file
           }elseif(isset($_POST['unarchive'])) {
                $data = ['archive' => '0'];
                $this->Module->archiveFile($file_id , $data);
                $this->session->set_flashdata('unarchived', 'Module Materials Unarchived Successfully !');
                redirect('tutor/module/'. $module_id);
            //to delete the module file
            }elseif(isset($_POST['delete'])){
                $this->Module->deleteFile($file_id);
                $this->session->set_flashdata('deleted', 'Module Materials Deleted Successfully !');
                redirect('tutor/module/'. $module_id);             
            }
        }
        $module_files = $this->Module->module_files($module_id);
        $module = $this->Module->select($module_id);
        $data = [
            'module_files' => $module_files,
            'modules' => $module
        ];

        //to load the view page
        $this->loadViews('view', 'View Module', $data);
    }
    //function to add the module file and load module file add page 
   public function add($id) {
        $this->form_validation->set_rules('name', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        // $this->form_validation->set_rules('file', 'File', 'required');

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
            $this->Module->addMaterials();
            $this->session->set_flashdata('added', 'Module Materials Added Successfully !');
            redirect('tutor/module/' . $id);
        }
    }
    //function to update the module file and load module file edit page 
    public function update($module_id, $file_id){
    
        $this->form_validation->set_rules('name', 'Title', 'required');
         $this->form_validation->set_rules('description', 'Description', 'required');

        if($this->form_validation->run() === FALSE){
                 $moduleF = $this->Module->selectFile($file_id);

            $data = [
                'modules' => $moduleF,
                'module_id' => $module_id
            ];
                $this->loadViews('update', 'Edit File', $data);
        }   
        else{   
                $this->Module->updateMaterials($file_id); 
                $this->session->set_flashdata('edited', 'Module Materials Updated Successfully !');
                redirect('tutor/module/' . $module_id);
            }
        }
    //function to load the attendance
    public function attendance()
    {
        $moduleCode = $this->uri->segment(4);

        $attendanceDate = $this->uri->segment(5);

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
    //function to add the attendance
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

