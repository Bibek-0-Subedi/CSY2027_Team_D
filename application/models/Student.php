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
                'email' => $email,
                'password' => $password
            ));
            //checking the number of rows of the checked credentials and returning the id to the controller
            if ($student->num_rows() == 1) {
                return $student->row_array(0);
            }
            else {
                return false;
            }
        }
    }

/* End of file Student.php */


?>

