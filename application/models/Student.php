<?php

class Student extends CI_Model{
    public function __construct()
    {
        $this->load->database();    
    }
    public function login($email, $password)
    {
        // extracting the student with given email and password
        $student = $this->db->get_where('students', array(
            'email' => $email
        ));
        //checking the number of rows of the checked credentials and returning the id to the controller
        if ($student->num_rows() == 1) {
            if(password_verify($password, $student->row(0)->password)){
                return $student->row_array(0);
            }else{
                return false;
            }
            // return $student->row_array(0);
        }
        else {
            return false;
        }
    }

    public function getStudent($id)
    {
        $this->db->join('admissions', 'admissions.assigned_id = students.assigned_id', 'left');
        $this->db->join('courses', 'courses.course_code = admissions.course_code', 'left');
        $student = $this->db->get_where('students', ['student_id' => $id]);
        return $student->row_array();
    }

    public function modules()
    {
        $this->db->join('modules', 'modules.module_code = student_modules.module_code', 'left');
        $result = $this->db->where('student_id', $this->session->userdata('student_id'))->get('student_modules');
        return $result->result_array();
    }

    public function module($code)
    {
        $module = $this->db->get_where('modules', array(
            'module_code' => $code
        ));

        return $module->row_array();
    }
    public function module_files($module)
    {
        $module_files = $this->db->get_where('module_files', array(
            'module_id' => $module
        ));
        return $module_files->result_array();
    }

    public function attendance($id, $module)
    {    
        $result = $this->db->where('student_id', $id)->where('module_code', $module)->get('attendence');
        return $result->result_array();
        
        
    }


    public function sendRequest($id){
		$firstname = $middlename = $surname = $address = $contact = $email = $password = $subject = '';

		$data = $this->getStudent($id);
		
		if($this->input->post('firstname') != $data['firstname']){
			$firstname = 'Firstname : '.$this->input->post('firstname').'<br>';
		}
		
		if(!empty($this->input->post('middlename')) && $this->input->post('middlename') != $data['middlename']){
			$middlename = 'Middlename : '.$this->input->post('middlename').'<br>';
		}
		
		if($this->input->post('surname') != $data['surname']){
			$surname = 'surname : '.$this->input->post('surname').'<br>';
		}
		
		if($this->input->post('permanent_address') != $data['permanent_address']){
			$permanent_address = 'Permanent Address : '.$this->input->post('permanent_address').'<br>';
		}
		
		if($this->input->post('contact') != $data['contact']){
			$contact = 'Contact : '.$this->input->post('contact').'<br>';
		}
		
		if($this->input->post('email') != $data['email']){
			$email = 'Email : '.$this->input->post('email').'<br>';
		}

		if(!empty($this->input->post('password')) && $this->input->post('password') != $data['password']){
			$password = 'Password : '.$this->input->post('password').'<br>';
		}
		$result = $firstname.$middlename.$surname.$permanent_address.$contact.$email.$password.$subject;

		$this->db->set('changes', $result);
		$this->db->set('approval', '1');
    	$this->db->where('student_id', $id);
		$this->db->update('students');
		
		$this->admission->requestChange($data['firstname'].' '.$data['surname'], 'Student', $result, $data['email']);
    }
    
    public function getAllGrades()
    {
        $this->db->join('modules', 'modules.module_code = assignments.module_code', 'left');
        $result = $this->db->where('student_id', $this->session->userdata('student_id'))->get('assignments');
     
        return $result->result_array();
    }

    
	public function getAssignment($module_code)
    {
        $this->db->join('modules', 'modules.module_code = assignments.module_code', 'left');
        // $this->db->join('module_files', 'module_files.module_id = assignments.module_code', 'right');
        
        $result = $this->db->where('student_id', $this->session->userdata('student_id'))->where('assignments.module_code',$module_code)->get('assignments');
        return $result->row_array();
    }

    public function getAssignmentFileInfo($module_code)
    {
        $this->db->join('modules', 'modules.module_code = module_files.module_id', 'left');
        $result = $this->db->select('module_files.*, modules.module_code, modules.module_name')->where('module_id', $module_code)->where('type', 1)->get('module_files');
        return $result->row_array();
        // return $this->db->last_query();
        
    }

    public function patRequest($id)
    {
        $this->db->where('student_id', $id)->update('students', ['pat_request' => 1]);
        
    }

    public function getAnnouncement()
	{
		$result = $this->db->where('announced_from', 1)->get('announcements');

		return $result->result_array();
		
	}
    
    public function getModuleAnnouncement($module_code)
	{
		$result = $this->db->where('module_code', $module_code)->get('announcements');

		return $result->result_array();
		
	}
}
/* End of file Student.php */


?>