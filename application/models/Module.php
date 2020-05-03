<?php 

class Module extends CI_model{

    //function to load the database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
    //function to select the module from the modules table
	public function select($id){

		$result = $this->db->where('module_code', $id)->get('modules');
		return $result->row_array();
	}
    //function to select the module files from the module_files table
	public function selectFile($id){

		$this->db->where('file_id', $id);
		$result = $this->db->get('module_files');
		return $result->row_array();
	}
    //function to select all the module files from the module_files table and order them in decending order
	public function module_files($module)
	{
   		 $module_files = $this->db->where('type', 0)->order_by('file_id', 'DESC')->get_where('module_files', array(
        	'module_id' => $module
    	));
    	return $module_files->result_array();
	}
    //function to add/insert module files into the module_files table
	public function addMaterials(){

        $config['upload_path'] = './assets/module_files/';
        $config['allowed_types'] = 'jpg|png|pdf|zip|doc|docx|ppt|pptx';
        $config['max_size'] = '4096';

        $this->load->library('upload', $config);
        
        if(!$this->upload->do_upload('moduleFile')){
             echo 'file not uploaded'; //Change this line to something else
        }
        else{
             $uploadData = $this->upload->data();
            $file = $uploadData['file_name'];
        }

        $data = array(
            'type' => 0,
            'module_id' => $this->input->post('module_code'),
            'filename' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'file' => $file
        );
        return $this->db->insert('module_files', $data);
    }
    //function to update the module file from the module_files table
    public function updateMaterials($id){
        $config['upload_path'] = './assets/module_files/';
        $config['allowed_types'] = 'jpg|png|pdf|zip|doc|docx|ppt|pptx';
        $config['max_size'] = '4096';

        $this->load->library('upload', $config);
        
        if(!$this->upload->do_upload('moduleFile')){
             echo 'file not uploaded'; //Change this line to something else
        }
        else{
             $uploadData = $this->upload->data();
            $file = $uploadData['file_name'];
        }

        $data = array(
            'type' => 0,
            'module_id' => $this->input->post('module_code'),
            'filename' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'file' => $file
        );
        $this->db->where('file_id', $id)->update('module_files', $data);
    }
    //function to delete the module file from the module_files table
    public function deleteFile($id){
        $result = $this->db->where('file_id', $id)->get('module_files');
        $rows = $result->result_array();
        foreach ($rows as $row) {
           unlink("./assets/module_files/". $row['file']);
        }
        $this->db->where('file_id', $id)->delete('module_files');
    }
    //function to archive the module file from the module_files table
    public function archiveFile($id , $data){
        $this->db->where('file_id', $id)->update('module_files', $data);
	}
    //function to get all the attendance record
	public function attendance($moduleCode, $attendanceDate)
	{
		$this->db->join('students', 'students.student_id = student_modules.student_id', 'left');
		$this->db->join('admissions', 'admissions.assigned_id = students.assigned_id', 'left');

		$students = $this->db->where('module_code', $moduleCode)->get('student_modules');
		return $students->result_array();
	}
    //function to get all the attendance record from attendances table
	public function getAttendance($moduleCode, $date)
	{
		$result = $this->db->get_where('attendence',['module_code' => $moduleCode, 'date' => $date]);
		return $result->result_array();
	}
    //function to insert the attendance record into the attendance table
	public function addAttendance($date)
	{
		$module_code = $this->input->post('module_code');
		$student_id = $this->input->post('student_id');
		$staff_id = $this->input->post('staff_id');

		$data = [
            'attendance_id' => $module_code.$student_id.$staff_id.$date,
            'module_code' => $this->input->post('module_code'),
            'student_id' => $this->input->post('student_id'),
            'staff_id' => $this->input->post('staff_id'),
            'date' => $date,
            'status' => $this->input->post('status')
		];

		$this->db->replace('attendence', $data);

		// $this->db->set('status', '2');
		// $this->db->where('staff_id', '2');
		// $this->db->update('staff');
	}
	
}