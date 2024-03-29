<?php

class Leaders extends CI_Controller
{
    //function to load view pages of the course leader
    public function loadViews($page, $title, $data = [])
    {
        if(($this->session->userdata('type')) != 2){
            redirect('admin/login');
        }
        $this->load->view('layouts/header', ['title' => $title]);
        $this->load->view('layouts/siteNav');
        $this->load->view('leader/' . $page, $data);
        $this->load->view('layouts/footer');
    }
    //function to load the dashboard of the course leader
    public function dashboard()
    {
        $this->loadViews('dashboard', 'Dashboard');
    }
}
