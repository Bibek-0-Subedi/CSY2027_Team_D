<?php 

class Module extends CI_model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// public function select(){

	// 	$this->db->where('module_leader', $this->session->userdata('id'));
	// 	$result = $this->db->get('modules');
	// 	return $result->result_array();
	// }

	public function insert(){

		$this->db->insert();
	}
 

}