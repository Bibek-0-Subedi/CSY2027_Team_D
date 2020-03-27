<?php 

class Assignment extends CI_model{
	
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function update($id){
    	$data = array(
    		'assignment_name' => $this->input->post('name'),
    		// 'deadline' => $this->input->post('deadline'),
    		// 'module_code' => $this->input->post('module_id'),
    		// 'staff_id' => $this->input->post('staff_id')
    		// '' => $this->input->post('');

    	);

    	$this->db->where('assignment_id', $id);
    	$this->db->update('assignments', $data);

    }

    public function grade($id){
    	$data = array(
    		'grade' => $this->input->post('grade')
    	);
    	$this->db->where('assignment_id', $id);
    	$this->db->update('assignments', $data);
    }

    public function delete($id){
        $this->db->where('assignment_id', $id);
        $this->db->delete('assignments');
    }

    public function insert(){

    	$data = array(
    		'assignment_name' => $this->input->post('name'),
    		'deadline' => $this->input->post('deadline'),
    		'module_code' => $this->input->post('module_id'),
    		'staff_id' => $this->input->post('staff_id')
    		// '' => $this->input->post('');

    	);

    	return $this->db->insert('assignments', $data);

    }

    public function getAssignment()
    {
    	$this->db->select('assignment_id, assignment_name, deadline, module_code, assignment_file, created_date' );
        $this->db->where('staff_id', $this->session->userdata('id'));
    	$result = $this->db->get('assignments');
        return $result->result_array();
    }

    public function getAllAssignment()
    {   
        $this->db->where('staff_id', $this->session->userdata('id'));
    	 $result = $this->db->get('assignments');
        return $result->result_array();
    }


    public function allTableGenerator()
    {
        $tableHead = [
            'Id',
            'Name',
            'Deadline',
            'Module Code',
            'Assignment File',
            'Created Date',
            'Edit' 
        ];
        
        $this->load->model('TableGenerator');

        $this->TableGenerator->setHeadings($tableHead);

        $data = $this->getAssignment();
            
        foreach($data as $row){
            if(is_string(key($row))){
                $this->TableGenerator->addRow($row);
            }       
        }
        return $this->TableGenerator->getHTML();
    }

    public function tableGenerator()
    {
        $tableHead = [
            'Id',
            'Name',
            'Deadline',
            'Grade',
            'Module Code',
            'Course Code',
            'Staff Code',
            'Student Id',
            'Assignment File',
            'Submission Date',
            'Created Date' 
        ];
        
        $this->load->model('TableGenerator');

        $this->TableGenerator->setHeadings($tableHead);

        $data = $this->getAllAssignment();
            
        foreach($data as $row){
            if(is_string(key($row))){
                $this->TableGenerator->addRow($row);
            }       
        }
        return $this->TableGenerator->getHTML();
    }
}