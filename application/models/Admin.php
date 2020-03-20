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
                'email' => $email,
                'password' => $password
            ));
            //checking the number of rows of the checked credentials and returning the id to the controller
            if ($staff->num_rows() == 1) {
                return $staff->row_array(0);
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
    
    public function tableGenerator()
    {
        $tableHead = [
            'Id',
            'Assigned Id',
            'Status',
            'Firstname',
            'Middle',
            'Surname',
            'Temporary Address	',
            'Permanent Address',
            'Contact',
            'Course Code',
            'Email',
            'qualification',
        ];
        
        $this->load->model('TableGenerator');

        $this->TableGenerator->setHeadings($tableHead);

        $data = $this->getAdmissions();
            
        foreach($data as $row){
            if(is_string(key($row))){
                $this->TableGenerator->addRow($row);
            }       
        }
        return $this->TableGenerator->getHTML();
    }

}

/* End of file Admin.php */


?>

