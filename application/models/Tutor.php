<?php 

class Tutor extends CI_model{

	//function to load the database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//function to select all the modules the tutor is assigned to from the modules table
	public function select(){
		$this->db->where('module_leader', $this->session->userdata('id'));
		$result = $this->db->get('modules');
		return $result->result_array();

	}
	//function to select all the courses the tutor is assigned to from the courses and staff table  
	public function selectTutor(){
		$this->db->join('courses', 'courses.course_code = staff.subject', 'left');
		$this->db->where('staff_id', $this->session->userdata('id'));
		$result = $this->db->get('staff');
		return $result->row_array();

	}
	//function to select the student and student details assigned to the module
	public function selectStudent($id){
		$this->db->join('students', 'students.student_id = student_modules.student_id', 'left');
		$this->db->join('admissions', 'admissions.assigned_id = students.assigned_id', 'left');
    	$result = $this->db->where('module_code', $id)->get('student_modules');
        return $result->result_array();
	}
	//function to insert updated or requested data
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
	
	//function to get student attendance records from the attendance table
	public function attendance($id)
	{    
		$result = $this->db->where('student_id', $id)->get('attendence');
		return $result->result_array();
	}
	//function to get all the student grade records from the assignments table
	public function grade($module_id, $student_id)
	{    
		$result = $this->db->where('module_code', $module_id)->where('student_id', $student_id)->get('assignments');
		return $result->result_array();
	}
	//function to get all the student assigned to the pat tutor and their student details from the admission table
    public function selectStudentPat(){
    	$this->db->join('admissions', 'admissions.assigned_id = students.assigned_id', 'left');
    	$result = $this->db->where('pat_tutor', $this->session->userdata('id'))->get('students');
        return $result->result_array();
    }
    //function to get all the pat information of the student from the pat table and order them in decending order in the pat information view page
    public function patInfo($id){
    	$result = $this->db->where('student_id', $id)->order_by('pat_id', 'DESC')->get('pat');
        return $result->result_array();
    }
    //function to get the pat information of the student from the pat table
    public function selectInfo($id){
    	$result = $this->db->where('pat_id', $id)->get('pat');
        return $result->row_array();
    }
    //function to insert the pat information of the student into the pat table
    public function addInfo($id){

		$this->changePatRequest($id);

    	 $data = array(
            'pat_information' => $this->input->post('information') ,
            'staff_id' => $this->session->userdata('id') ,
            'student_id' => $this->input->post('student_id'),
        );
		$this->db->where('student_id', $id)->insert('pat', $data);
	
		
	}
	
	public function changePatRequest($id)
	{
		$this->db->set('pat_request', '0');
		$this->db->where('assigned_id', $id);
		$this->db->update('students');
	}
    //function to update the pat information of the student in the pat table
    public function updateInfo($id){
    	 $data = array(
            'pat_information' => $this->input->post('information') ,
            'staff_id' => $this->session->userdata('id') ,
            'student_id' => $this->input->post('student_id'),
        );
		return $this->db->where('pat_id', $id)->update('pat', $data);    	 
	}
	
	public function getDiary($id)
	{
		$result = $this->db->where('diary_id', $id)->get('diaries');
		return $result->row_array();
	}
    //function to get all the diary information added by the tutor and order them in decending order in the diary information view page
    public function selectDiary(){
    	$result = $this->db->where('staff_id', $this->session->userdata('id'))->order_by('diary_id', 'DESC')->get('diaries');
    	return $result->result_array();
    }
    //function to insert the diary information into the diary table
    public function insertDiary(){
    	 $data = array(
    	 	'title' => $this->input->post('title'),
            'description' => $this->input->post('information') ,
            'staff_id' => $this->session->userdata('id') ,
        );
        return $this->db->insert('diaries', $data);
    }
    //function to update the diary information of the student in the pat table
    public function updateDiary($id){
         $data = array(
         	'title' => $this->input->post('title'),
            'description' => $this->input->post('information') ,
            'staff_id' => $this->session->userdata('id') ,
        );
        return $this->db->where('diary_id', $id)->update('diaries', $data);
    }
    //function to insert the announcement into the announcements table
	public function addAnnouncement()
    {
        $data = [
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
			'announced_from' => $this->session->userdata('type'),
			'module_code' => $this->input->post('module'),
			'staff' => $this->session->userdata('id')
        ];

        $this->db->insert('announcements', $data);
        
	}
	//function to get all the announcements from the announcement table
	public function getAnnouncement()
	{
		$this->db->order_by('announcements.created_at', 'DESC');
		$result = $this->db->where('announced_from', 1)->get('announcements');

		return $result->result_array();
		
	}
	//function to get all the announcements made by the tutor from the announcements table
	public function getTutorAnnouncement()
	{
		$this->db->join('modules', 'modules.module_code = announcements.module_code', 'left');
		$this->db->order_by('announcements.created_at', 'DESC');
		$result = $this->db->where('announced_from', '3')->where('staff',$this->session->userdata('id'))->get('announcements');

		return $result->result_array();
	}
	//function to delete the announcement from the announcement table
	public function deleteAnnouncement($id)
	{
		$this->db->where('id', $id)->delete('announcements');
		
	}

	public function getStaff($id)
	{
		$staff = $this->db->get_where('staff', ['staff_id' => $id]);
		return $staff->row_array();
	}
	
	public function getTimeTable($id)
	{
		$course = $this->getStaff($id);
		$timetable = $this->db->get_where('timetables', ['course_name' => $course['subject']]);
		return $timetable->result_array();
	}

	public function getTimeTableData($id)
	{
		$timetable = $this->db->get_where('timetables', ['routine_id' => $id]);
		return $timetable->row_array();
	}
}   


