<?php

class Tutors extends CI_Controller {
    
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

}