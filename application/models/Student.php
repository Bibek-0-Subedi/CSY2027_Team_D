<?php

class Student extends CI_Model{
    //function to load the database
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
    //function to get all the students
    public function getStudent($id)
    {
        $this->db->join('admissions', 'admissions.assigned_id = students.assigned_id', 'left');
        $this->db->join('courses', 'courses.course_code = admissions.course_code', 'left');
        $student = $this->db->get_where('students', ['student_id' => $id]);
        return $student->row_array();
    }
    //function to get timetable assigned to the course
    public function getTimeTable($id){
        $course = $this->getStudent($id);
        $timetable = $this->db->get_where('timetables', ['course_name' => $course['course_code']]);
        return $timetable->result_array();
    }
    //function to load all the modules assigned to the student
    public function modules()
    {
        $this->db->join('modules', 'modules.module_code = student_modules.module_code', 'left');
        $result = $this->db->where('student_id', $this->session->userdata('student_id'))->get('student_modules');
        return $result->result_array();
    }
    //function to get all the modules
    public function module($code)
    {
        $module = $this->db->get_where('modules', array(
            'module_code' => $code
        ));

        return $module->row_array();
    }
    //function to get all the module files
    public function module_files($module)
    {
        $module_files = $this->db->get_where('module_files', array(
            'module_id' => $module,
            'type' => 0
        ));
        return $module_files->result_array();
    }
    //function to view all the attendance record from the attendance table
    public function attendance($id, $module)
    {    
        $result = $this->db->where('student_id', $id)->where('module_code', $module)->get('attendence');
        return $result->result_array();
        
        
    }
    //function to send request
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
    //function to get all the grades from the assignment table graded by the tutor to the student
    public function getAllGrades()
    {
        $this->db->join('modules', 'modules.module_code = assignments.module_code', 'left');
        $result = $this->db->where('student_id', $this->session->userdata('student_id'))->get('assignments');
     
        return $result->result_array();
    }

    //function to get assignment from the assignment table
	public function getAssignment($module_code)
    {
        $this->db->join('modules', 'modules.module_code = assignments.module_code', 'left');
        // $this->db->join('module_files', 'module_files.module_id = assignments.module_code', 'right');
        
        $result = $this->db->where('student_id', $this->session->userdata('student_id'))->where('assignments.module_code',$module_code)->get('assignments');
        return $result->row_array();
    }
    //function to get all the assignment files from the module files table
    public function getAssignmentFileInfo($module_code)
    {
        $this->db->join('modules', 'modules.module_code = module_files.module_id', 'left');
        $result = $this->db->select('module_files.*, modules.module_code, modules.module_name')->where('module_id', $module_code)->where('type', 1)->get('module_files');
        return $result->row_array();
        // return $this->db->last_query();
        
    }
    //function to send the pat request by updating pat request value in the students table
    public function patRequest($id)
    {
        $this->db->where('student_id', $id)->update('students', ['pat_request' => 1]);
        
    }
    //function to get all the announcements from the announcement table in the dashboard
    public function getAnnouncement()
	{
		$result = $this->db->where('announced_from', 1)->get('announcements');

		return $result->result_array();
		
	}
    //function to get all the announcements made by the tutor in the module from the announcements table
    public function getModuleAnnouncement($module_code)
	{
        $this->db->join('modules', 'modules.module_code = announcements.module_code', 'left');
        $this->db->order_by('announcements.created_at', 'DESC');
		$result = $this->db->where('announcements.module_code', $module_code)->get('announcements');

		return $result->result_array();
    }
    //function to get all the diary information added by the student and order them in decending order in the diary information view page
    public function selectDiary(){
        $result = $this->db->where('student_id', $this->session->userdata('id'))->order_by('diary_id', 'DESC')->get('diaries');
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
}
/* End of file Student.php */


?>