<?php

class Tutors extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tutor');
        $this->load->model('Module');
    }

    public function loadViews($page, $title, $data = []){

        if(($this->session->userdata('type')) != 3){
            redirect('admin/login');
        }
        $this->load->view('layouts/header', ['title' => $title]);
        $this->load->view('layouts/siteNav');
        $this->load->view('tutor/'.$page, $data);
        $this->load->view('layouts/footer');
    }
    public function dashboard() {
        $this->loadViews('dashboard', 'Dashboard');
    }

    public function module($id) {

            $module = $this->Module->select();
            $modules = $this->Module->joinTable($id);

            $data = [
                'modules' => $modules,
                'mod' => $module
            ];

        $this->loadViews('module', 'Module', $data);
        
    }

    public function getForm() {

        $data['module'] = $this->Tutor->select();
        $this->loadViews('module', 'Module', $data);
    }

    public function updateData($id){
        $data['id'] = $id;

        $this->form_validation->set_rules('firstname', ' Name', 'required');

        if($this->form_validation->run() === FALSE){
                $this->loadViews('updateData', 'Edit Staff', $data);
        }   
        else{   
              if($this->session->userdata('approval') == 1){
                  $this->Tutor->updateData($id); 
                     redirect('tutor/dashboard');
              }
              else{
                    echo "Request has been sent!";
              }
        }
    }
   
}