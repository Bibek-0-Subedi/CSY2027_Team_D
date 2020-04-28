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
    public function selectTutor(){
        $this->db->where('staff_id', $this->session->userdata('id'));
        $result = $this->db->get('staff');
        return $result->row_array();

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
	public function grade($module_id, $student_id)
	{    
    $result = $this->db->where('module_code', $module_id)->where('student_id', $student_id)->get('assignments');
    return $result->result_array();
	}
    public function selectStudentPat(){
    	$this->db->join('admissions', 'admissions.assigned_id = students.assigned_id', 'left');
    	$result = $this->db->where('pat_tutor', $this->session->userdata('id'))->get('students');
        return $result->result_array();
    }
    public function patInfo($id){
    	$result = $this->db->where('student_id', $id)->get('pat');
        return $result->result_array();
    }
    public function selectInfo($id){
    	$result = $this->db->where('pat_id', $id)->get('pat');
        return $result->row_array();
    }
    public function addInfo($id){
    	 $data = array(
            'pat_information' => $this->input->post('information') ,
            'staff_id' => $this->session->userdata('id') ,
            'student_id' => $this->input->post('student_id'),
        );
        return $this->db->where('student_id', $id)->insert('pat', $data);
    }
    public function updateInfo($id){
    	 $data = array(
            'pat_information' => $this->input->post('information') ,
            'staff_id' => $this->session->userdata('id') ,
            'student_id' => $this->input->post('student_id'),
        );
		return $this->db->where('pat_id', $id)->update('pat', $data);    	 
    }
    public function selectDiary(){
    	$result = $this->db->where('staff_id', $this->session->userdata('id') )->get('diaries');
    	return $result->result_array();
    }
    public function insertDiary(){
    	 $data = array(
            'description' => $this->input->post('information') ,
            'staff_id' => $this->session->userdata('id') ,
        );
        return $this->db->insert('diaries', $data);
    }
    public function updateDiary($id){
         $data = array(
            'description' => $this->input->post('information') ,
            'staff_id' => $this->session->userdata('id') ,
        );
        return $this->db->where('diary_id', $id)->update('diaries', $data);
    }
}   


