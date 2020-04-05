<?php

    class Admin extends CI_Model{
        public function __construct()
        {
            $this->load->database();
            
        }

        public function login($email, $password)
        {
            // extracting the staff with given email and password
            $staff = $this->db->get_where('staff', array(
                'email' => $email
            ));
            //checking the number of rows of the checked credentials and returning the id to the controller
            if ($staff->num_rows() == 1) {
                if($staff->row(0)->role == 1){
                    if(password_verify($password, $staff->row(0)->password)){
                        return $staff->row_array(0);
                    }else{
                        return false;
                    }
                }elseif($staff->row(0)->role == 2){
                    if(password_verify($password, $staff->row(0)->password)){
                        return $staff->row_array(0);
                    }else{
                        return false;
                    }
                }elseif($staff->row(0)->role == 3){
                    if(password_verify($password, $staff->row(0)->password)){
                        return $staff->row_array(0);
                    }else{
                        return false;
                    }
                }

                else{
                    return false;
                }
            }
            else {
                return false;
            }
        }

    public function csvUpload($csvFile){
        $csvHandle = fopen($csvFile['tmp_name'], "r");
        $mydata = fgetcsv($csvHandle);
        while($data = fgetcsv($csvHandle) ){
            $arr = [];
            $count = 0;
            foreach($data as $key => $value){
                $arr[$mydata[$count]] = $value;
                $count++;
            }
            $this->db->replace('admissions',$arr);
        }
 
    }

    public function getAdmissions()
    {
        $result = $this->db->get('admissions');
        return $result->result_array();
        
    }
    
    public function tableGenerator($data)
    {
        $tableHead = [
            'Id',
            'Assigned Id',
            'Status',
            'Firstname',
            'Middle',
            'Surname',
            'Temporary Address  ',
            'Permanent Address',
            'Contact',
            'Course Code',
            'Email',
            'qualification',
        ];
        
        $this->load->model('TableGenerator');

        $this->TableGenerator->setHeadings($tableHead);
            
        foreach($data as $row){
            if(is_string(key($row))){
                $this->TableGenerator->addRow($row);
            }       
        }
        return $this->TableGenerator->getHTML();
    }

    public function getStudentData($id)
    {
        $this->db->join('courses', 'courses.course_code = admissions.course_code', 'left');
        $result = $this->db->where('admission_id', $id)->get('admissions');
        return $result->row_array();
        
    }

    public function getStudents()
    {
        $result = $this->db->where('assigned_id != 0')->get('admissions'); //Students table should be used
        return $result->result_array();
    }

    public function add()
    {
        $result = $this->db->get('courses');
        return $result->result_array();
    }

    public function addStudent()
    {
        $data = [
            'assigned_id' => '0',
            'status' => 'A',
            'firstname' => $this->input->post('firstname'),
            'middlename' => $this->input->post('middlename'),
            'surname' => $this->input->post('surname'),
            'temporary_address' => $this->input->post('tempAddress'),
            'permanent_address' => $this->input->post('permAddress'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'qualification' => $this->input->post('qualification'),
            'course_code' => $this->input->post('courseCode'),
        ];

        $this->db->insert('admissions', $data); // Not sure could be students table too
    }
    public function getTable($field = false, $value = false, $table)
    {
        if($field){
            $result = $this->db->where($field, $value)->get($table);
        }
        else{
            $result = $this->db->get($table);
        }
        return $result->result_array();
    }
    public function getTableData($id, $field , $table)
    {
        $result = $this->db->where($field, $id)->get($table);
        return $result->row_array();
    }
    public function addStaff(){
        $data =[
            'staff_id' => $this->input->post('staff_id'),
            'status' => $this->input->post('status'),
            'firstname' => $this->input->post('firstname'),
            'middlename' => $this->input->post('middlename'),
            'surname' => $this->input->post('surname'),
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'address' => $this->input->post('address'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'role' => $this->input->post('role'),
            'approval' => '0'
        ];
        $this->db->insert('staff', $data);
    }
    public function updateStaff($id){
        $data =[
            'status' => $this->input->post('status'),
            'firstname' => $this->input->post('firstname'),
            'middlename' => $this->input->post('middlename'),
            'surname' => $this->input->post('surname'),
            'address' => $this->input->post('address'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'role' => $this->input->post('role'),
        ];
        
        $this->db->where('staff_id', $id)->update('staff', $data);
    }
    public function assign_archive_staff($id , $data){
        $this->db->where('staff_id', $id)->update('staff', $data);
    }
    
    public function addCourse(){
        $data =[
            'course_code' => $this->input->post('course_code'),
            'course_name' => $this->input->post('course_name'),
            'course_duration' => $this->input->post('course_duration'),
            'department_id' => $this->input->post('department_id')
        ];
        $this->db->insert('courses', $data);
    }
    public function updateCourse($id){
        $data =[
            'course_name' => $this->input->post('course_name'),
            'course_duration' => $this->input->post('course_duration'),
            'department_id' => $this->input->post('department_id')
        ];
        $this->db->where('course_code', $id)->update('courses', $data);
    }
    public function archiveCourse($id , $data){
        $this->db->where('course_code', $id)->update('courses', $data);
    }
    public function deleteCourse($id){
        $this->db->where('course_code', $id)->delete('courses');
    }

    public function addModule(){
        $data =[
            'module_code' => $this->input->post('module_code'),
            'module_name' => $this->input->post('module_name'),
            'module_duration' => $this->input->post('module_duration'),
            'course_code' => $this->input->post('course_code')
        ];
        $this->db->insert('modules', $data);
    }
    public function updateModule($id){
        $data =[
            'module_name' => $this->input->post('module_name'),
            'module_duration' => $this->input->post('module_duration'),
            'course_code' => $this->input->post('course_code')
        ];
        $this->db->where('module_code', $id)->update('modules', $data);
    }
    public function archiveModule($id , $data){
        $this->db->where('module_code', $id)->update('modules', $data);
    }
    public function deleteModule($id){
        $this->db->where('module_code', $id)->delete('modules');
    }
}

/* End of file Admin.php */


?>