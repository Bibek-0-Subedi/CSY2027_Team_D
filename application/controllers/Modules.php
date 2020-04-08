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
        $this->load->view('layouts/siteNav');
        $this->load->view('module/'.$page, $data);
        $this->load->view('layouts/footer');
    }

   public function add($id) {

        $this->form_validation->set_rules('module_code', 'Module Code', 'required');

        if ($this->form_validation->run() === FALSE) {

            $modules = $this->Module->selectTable('module_code', 'modules', 'module_leader', $id);
            $moduleF = $this->Module->selectTable('module_file', 'module_files', 'module_leader', $id);

            $data = [
                'modules' => $modules,
                'modules_file' => $moduleF
            ];

            $this->loadViews('add', 'Add Module', $data);
        }
        else {
            $success = $this->Module->addMaterials();
            if($success){
            redirect('tutor/module');
            }
        }
    } 
}

