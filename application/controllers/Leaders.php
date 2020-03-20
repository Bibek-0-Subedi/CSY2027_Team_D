<?php

class Leaders extends CI_Controller {
    
    public function loadViews($page, $title, $data = []){
        $this->load->view('layouts/header', ['title' => $title]);
        $this->load->view('layouts/siteNav');
        $this->load->view('leader/'.$page, $data);
        $this->load->view('layouts/footer');
    }
    public function dashboard() {
        $this->loadViews('dashboard', 'Dashboard');
    }

}