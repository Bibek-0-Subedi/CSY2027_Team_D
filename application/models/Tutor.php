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
	public function selectStudent($id){
		$this->db->join('students', 'students.student_id = student_modules.student_id', 'left');
		$this->db->join('admissions', 'admissions.assigned_id = students.assigned_id', 'left');
    	$result = $this->db->where('module_code', $id)->get('student_modules');
        return $result->result_array();
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
	public function attendance($id)
	{    
    $result = $this->db->where('student_id', $id)->get('attendence');
    return $result->result_array();
	}
	public function grade($id)
	{    
    $result = $this->db->where('student_id', $id)->get('assignments');
    return $result->result_array();
	}
}   

