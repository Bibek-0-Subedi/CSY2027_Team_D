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
}

