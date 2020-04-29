<?php

class Admin extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function login($email, $password){
        // extracting the staff with given email and password
        $staff = $this->db->get_where('staff', array(
            'email' => $email
        ));
        //checking the number of rows of the checked credentials and returning the id to the controller
        if ($staff->num_rows() == 1) {
            if(password_verify($password, $staff->row(0)->password)){
                return $staff->row_array(0);
            }else{
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

    public function getAdmissions(){
        $result = $this->db->where("status != 3")->get('admissions');
        return $result->result_array();
        
    }

    public function createCaseFile($id){

        $this->db->set('assigned_id', rand(1000,1999).substr(time(), 6));
        $this->db->set('status', 1);
        $this->db->where('admission_id', $id);
        if($this->db->update('admissions')){
            return true;
        }
    }

    public function liveDormant($id)
    {
        if($this->input->post('liveDor') == 'live'){
            $info = $this->getStudentData($id);

            $data = [
                'student_id' =>$info['assigned_id'],
                'assigned_id' => $info['assigned_id'],
                'email' => $info['email'],
                'password' => password_hash($info['assigned_id'], PASSWORD_DEFAULT)
            ];

            $this->db->insert('students', $data);
            $this->db->reset_query();
            $this->db->set('status', 3);
            $this->admission->acceptance_letter($info['firstname'], $info['assigned_id'], $info['assigned_id'], $info['email']);

        }else if($this->input->post('liveDor') == 'dormant'){
            $this->db->set('status', 2);
        }

        $this->db->where('admission_id', $id);
        if($this->db->update('admissions')){
            return true;
        }
    }

    public function rejectApplication($id)
    {
        $info = $this->getStudentData($id);
        $this->db->where('admission_id', $id)->delete('admissions');
        $this->admission->rejection_letter($info['firstname'], $info['course_name'], $info['email']);
    }
    
    public function tableGenerator($data){
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

    public function getStudentData($id){
        $this->db->join('courses', 'courses.course_code = admissions.course_code', 'left');
        $result = $this->db->where('admission_id', $id)->get('admissions');
        return $result->row_array();
        
    }

    public function getStudents(){
        $result = $this->db->where('status = 3')->get('admissions'); //Students table should be used
        return $result->result_array();
    }

    public function add(){
        $result = $this->db->get('courses');
        return $result->result_array();
    }

    public function addStudent(){
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

    public function getTable($field = false, $value = false, $table){
        if($field){
            $result = $this->db->where($field, $value)->get($table);
        }
        else{
            $result = $this->db->get($table);
        }
        return $result->result_array();
    }

    public function getTableData($id, $field , $table){
        $result = $this->db->where($field, $id)->get($table);
        return $result->row_array();
    }

    public function staff(){
        $this->db->join('courses', 'courses.course_code=staff.subject', 'left');
        $this->db->join('modules', 'modules.module_code=staff.subject', 'left');
        $staff = $this->db->get_where('staff', ['staff.archive'=> 0, ]);
        return $staff->result_array();
    }

    public function filterStaff($status, $sub, $role){
        $this->db->join('courses', 'courses.course_code=staff.subject', 'left');
        $this->db->join('modules', 'modules.module_code=staff.subject', 'left');
        if($status == 'null' && $sub == 'null' && $role == 'null'){
            $staff = $this->db->get_where('staff', ['staff.archive'=> 0, ]);
        }
        else if ($status == 'null' && $sub == 'null' && $role != 'null') {
            $staff = $this->db->get_where('staff', ['staff.archive'=> 0, 'staff.role' => $role]);
        }
        else if ($status == 'null' && $sub != 'null' && $role == 'null') {
            $staff = $this->db->get_where('staff', ['staff.archive'=> 0, 'staff.subject' => $sub]);
        }
        else if ($status != 'null' && $sub == 'null' && $role == 'null') {
            $staff = $this->db->get_where('staff', ['staff.archive'=> 0, 'staff.status' => $status]);
        }
        else if ($status != 'null' && $sub != 'null' && $role == 'null') {
           $staff = $this->db->get_where('staff', ['staff.archive'=> 0,'staff.status' => $status, 'staff.subject' => $sub]);
        }
        else if ($status != 'null' && $sub == 'null' && $role != 'null') {
           $staff = $this->db->get_where('staff', ['staff.archive'=> 0,'staff.status' => $status, 'staff.role' => $role]);
        }
        else if ($status == 'null' && $sub != 'null' && $role != 'null') {
           $staff = $this->db->get_where('staff', ['staff.archive'=> 0, 'staff.subject' => $sub,'staff.role' => $role]);
        }
        else if ($status != 'null' && $sub != 'null' && $role != 'null') {
           $staff = $this->db->get_where('staff', ['staff.archive'=> 0,'staff.status' => $status, 'staff.subject' => $sub,'staff.role' => $role]);
        }
 
        return $staff->result_array();
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

        if($this->input->post('changeApproved')){
            $data['approval'] = 0;
            $data['changes'] = null;
            $stf = $this->db->where('staff_id', $id)->select('email, firstname')->get('staff');
            $staffInfo = $stf->row_array();
            $this->admission->changeApproved($staffInfo['firstname'], $staffInfo['email']);
        }

        if(!empty(trim($this->input->post('password')))){
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }
        
        $this->db->where('staff_id', $id)->update('staff', $data);
    }

    public function assign_archive_staff($id , $data){
        $this->db->where('staff_id', $id)->update('staff', $data);
    }

    public function course($dpt = false){
        $this->db->join('departments', 'departments.department_id=courses.department_id', 'left');
        $this->db->join('staff', 'staff.staff_id=courses.course_leader', 'left');
        if($dpt){
            $courses = $this->db->get_where('courses', ['courses.archive'=> 0, 'courses.department_id' => $dpt]);
        }
        else{
            $courses = $this->db->get_where('courses', ['courses.archive'=> 0]);
        }
        return $courses->result_array();
    }

    public function assign_to_staff($staff_id, $staff_data, $course_code, $course_data){
        $this->db->where('staff_id', $staff_id)->update('staff', $staff_data);
        $this->db->where('course_code', $course_code)->update('courses', $course_data);
    }
    
    public function assignModule($staff_id, $staff_data, $module_code, $module_data){
        $this->db->where('staff_id', $staff_id)->update('staff', $staff_data);
        $this->db->where('module_code', $module_code)->update('modules', $module_data);
    }

    public function getAssignableCourse(){
        $result = $this->db->where('archive', 0)->get('courses');
        return $result->result_array();
    }

    public function getAssignableStaff($role, $id = false){
        if($id){
            $this->db->where('subject', $id);
        }else{
            $this->db->where('subject', 0);
        }
        $this->db->where('role', $role);
        $this->db->where('archive', 0);
        $result = $this->db->get('staff');
        return $result->result_array();
    }

    public function addCourse(){
        $course_leader = $this->input->post('course_leader');
        if($course_leader){
            $data =[
                'course_code' => $this->input->post('course_code'),
                'course_name' => $this->input->post('course_name'),
                'course_duration' => $this->input->post('course_duration'),
                'course_leader' => $this->input->post('course_leader'),
                'department_id' => $this->input->post('department_id')
            ];
            $subject = ['subject' => $this->input->post('course_code')];
            $this->assign_archive_staff($course_leader, $subject);
        }else{
            $data =[
                'course_code' => $this->input->post('course_code'),
                'course_name' => $this->input->post('course_name'),
                'course_duration' => $this->input->post('course_duration'),
                'department_id' => $this->input->post('department_id')
            ];    
        }
        $this->db->insert('courses', $data);
    }

    public function updateCourse($id){
        $course_leader = $this->input->post('course_leader');
        if($course_leader){
            $data =[
                'course_name' => $this->input->post('course_name'),
                'course_duration' => $this->input->post('course_duration'),
                'course_leader' => $this->input->post('course_leader'),
                'department_id' => $this->input->post('department_id')
            ];
        }
        else{
            $data =[
                'course_name' => $this->input->post('course_name'),
                'course_duration' => $this->input->post('course_duration'),
                'department_id' => $this->input->post('department_id')
            ];
        }
        $this->db->where('course_code', $id)->update('courses', $data);
    }

    public function archiveCourse($id , $data){
        $this->db->where('course_code', $id)->update('courses', $data);
    }

    public function deleteCourse($id){
        $this->db->where('course_code', $id)->delete('courses');
    }

    public function module($course = false){
        $this->db->join('courses', 'courses.course_code=modules.course_code', 'left');
        $this->db->join('staff', 'staff.staff_id=modules.module_leader', 'left');
        if($course){
            $courses = $this->db->get_where('modules', ['modules.archive'=> 0, 'modules.course_code' => $course]);
        }
        else{
            $courses = $this->db->get_where('modules', ['modules.archive'=> 0]);
        }
        return $courses->result_array();
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
        $module_leader = $this->input->post('module_leader');
        if($module_leader){
            $data =[
                'module_name' => $this->input->post('module_name'),
                'module_duration' => $this->input->post('module_duration'),
                'module_leader' => $this->input->post('module_leader'),
                'course_code' => $this->input->post('course_code')
            ];
            $this->db->where('module_code', $id)->update('modules', $data);
        }
        else{
            $data =[
                'module_name' => $this->input->post('module_name'),
                'module_duration' => $this->input->post('module_duration'),
                'course_code' => $this->input->post('course_code')
            ];
            $this->db->where('module_code', $id)->update('modules', $data);
        }

    }

    public function archiveModule($id , $data){
        $this->db->where('module_code', $id)->update('modules', $data);
    }

    public function deleteModule($id){
        $this->db->where('module_code', $id)->delete('modules');
    }

    public function staffRequests()
    {
        $result = $this->db->where('approval', 1)->select('staff_id, changes, firstname, surname')->get('staff');
        return $result->result_array();
        
    }

    public function studentRequests()
    {
        $this->db->join('admissions', 'admissions.assigned_id = students.assigned_id', 'left');
        $result = $this->db->where('approval', 1)->select('admission_id, changes, firstname, surname')->get('students');
        return $result->result_array();
        
    }

    public function addAnnouncement()
    {
        $data = [
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'announced_from' => $this->session->userdata('type')
        ];

        $this->db->insert('announcements', $data);
        
    }

}

/* End of file Admin.php */


?>

