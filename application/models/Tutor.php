<?php 

class Tutor extends CI_model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function select(){

		$this->db->where('module_leader', $this->session->userdata('id'));
		$result = $this->db->get('modules');
		return $result->result_array();
	}

	public function insert(){

		$this->db->insert();
	}
 	
 	 public function updateData($id){
    	$data = array(
    		'firstname' => $this->input->post('firstname'),
    		'middlename' => $this->input->post('middlename'),
    		'surname' => $this->input->post('surname'),
    		'address' => $this->input->post('address'),
    		'contact' => $this->input->post('contact'),
    	);
    	$this->db->where('staff_id', $id);
    	$this->db->update('staff', $data);
    }
}