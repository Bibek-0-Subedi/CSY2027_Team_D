<?php 

class Module extends CI_model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function select($id){

		$this->db->where('module_code', $id);
		$result = $this->db->get('modules');
		return $result->row_array();
	}
	public function selectFile($id){

		$this->db->where('file_id', $id);
		$result = $this->db->get('module_files');
		return $result->row_array();
	}
	public function module_files($module)
	{
   		 $module_files = $this->db->where('type', 0)->get_where('module_files', array(
        	'module_id' => $module
    	));
    	return $module_files->result_array();
	}

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
    public function deleteFile($id){
        $result = $this->db->where('file_id', $id)->get('module_files');
        $rows = $result->result_array();
        foreach ($rows as $row) {
           unlink("./assets/module_files/". $row['file']);
        }
        $this->db->where('file_id', $id)->delete('module_files');
    }
    public function archiveFile($id , $data){
        $this->db->where('file_id', $id)->update('module_files', $data);
	}
	public function attendance($moduleCode, $attendanceDate)
	{
		$this->db->join('students', 'students.student_id = student_modules.student_id', 'left');
		$this->db->join('admissions', 'admissions.assigned_id = students.assigned_id', 'left');

		$students = $this->db->where('module_code', $moduleCode)->get('student_modules');
		return $students->result_array();
	}

	public function getAttendance($moduleCode, $date)
	{
		$result = $this->db->get_where('attendence',['module_code' => $moduleCode, 'date' => $date]);
		return $result->result_array();
	}

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