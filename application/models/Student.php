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
    }
/* End of file Student.php */


?>