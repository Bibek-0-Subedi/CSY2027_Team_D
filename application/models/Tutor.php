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
		$this->db->join('courses', 'courses.course_code = staff.subject', 'left');
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
	
 	public function sendRequest($id){
		$firstname = $middlename = $surname = $address = $contact = $email = $password = $subject = '';

		$data = $this->selectTutor();
		
		if($this->input->post('firstname') != $data['firstname']){
			$firstname = 'Firstname : '.$this->input->post('firstname').'<br>';
		}
		
		if(!empty($this->input->post('middlename')) && $this->input->post('middlename') != $data['middlename']){
			$middlename = 'Middlename : '.$this->input->post('middlename').'<br>';
		}
		
		if($this->input->post('surname') != $data['surname']){
			$surname = 'surname : '.$this->input->post('surname').'<br>';
		}
		
		if($this->input->post('address') != $data['address']){
			$address = 'Address : '.$this->input->post('address').'<br>';
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

		if($this->input->post('subject') != $data['subject']){
			$subject = 'Subject : '.$this->input->post('subject').'<br>';
		}

		$result = $firstname.$middlename.$surname.$address.$contact.$email.$password.$subject;

		$this->db->set('changes', $result);
		$this->db->set('approval', '1');
    	$this->db->where('staff_id', $id);
		$this->db->update('staff');
		
		$this->admission->requestChange($data['firstname'].' '.$data['surname'], 'Staff', $result, $data['email']);
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

	public function addAnnouncement()
    {
        $data = [
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
			'announced_from' => $this->session->userdata('type'),
			'module_code' => $this->input->post('module')
        ];

        $this->db->insert('announcements', $data);
        
	}
	
	public function getAnnouncement()
	{
		$result = $this->db->where('announced_from', 1)->get('announcements');

		return $result->result_array();
		
	}
}   

