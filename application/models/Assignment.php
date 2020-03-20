<?php 

class Assignment extends CI_model{
	
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
}