<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tests extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('unit_test');
    }
    

    public function index()
    {
        $this->load->model('student');
        $this->load->model('admin');
        
        $this->unit->run($this->student->login('abcd','abcd'), false, "When invalid values submitted during Student Login");

        $this->unit->run($this->admin->login('',''), false, "When invalid values submitted during Admin Login");

        $this->unit->run($this->admin->login('adam.blake@woodland.com','adam123'), true, "When valid values submitted during Admin Login (Email: adam.blake@woodland.com, Password: adam123)");

        $this->unit->run($this->admin->deleteCourse('abc'), false, "Error When invalid course code provided while deleting course");
        
        $this->load->view('page/tests');

    }

}

/* End of file TestUnit.php */


?>