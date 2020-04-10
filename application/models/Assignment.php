<?php 

class Assignment extends CI_model{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
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
   public function addMaterials(){

            $config['upload_path'] = './assets/assignment_files/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|zip';
            
            $this->load->library('upload', $config);
    
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $file= $uploadData['file_name'];
            }
            else{
                echo 'file not uploaded';
            }
           
        $data = array(
            'assignment_name' => $this->input->post('assignment_name'),
            'deadline' => $this->input->post('deadline'),
            'module_code' => $this->input->post('module_code'),
            'course_id' => $this->input->post('course_code'),
            'staff_id' => $this->input->post('staff_id'),
            'assignment_file' => $file
        );
        return $this->db->insert('assignments', $data);
    }
    public function updateAssignment($id){


            $config['upload_path'] = './assets/assignment_files/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|zip';
            
            $this->load->library('upload', $config);
    
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $file= $uploadData['file_name'];
            }
            else{
                echo 'file not uploaded';
            }

        $data =[
            'assignment_name' => $this->input->post('assignment_name'),
            'deadline' => $this->input->post('deadline'),
            'module_code' => $this->input->post('module_code'),
            'course_id' => $this->input->post('course_code'),
            'staff_id' => $this->input->post('staff_id'),
            'assignment_file' => $file
        ];
        $this->db->where('assignment_id', $id)->update('assignments', $data);
    }
    public function grade($id){
        $data = array(
            'grade' => $this->input->post('grade')
        );
        $this->db->where('assignment_id', $id);
        $this->db->update('assignments', $data);
    }
    public function deleteAssignment($id){
        $this->db->where('assignment_id', $id)->delete('assignments');
    }
}