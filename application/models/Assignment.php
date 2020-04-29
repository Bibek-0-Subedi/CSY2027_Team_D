<?php 

class Assignment extends CI_model{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
    public function getTable($field = false, $value = false, $table)
    {
        $this->db->join('module_files', 'module_files.module_id = '.$table.'.module_code', 'left');
        if($field){
            $result = $this->db->where($field, $value)->where('type',1)->get($table);
        }
        else{
            $result = $this->db->get($table);
        }
        return $result->result_array();
    }
    public function getTableData($id, $field , $table)
    {
        $this->db->join('module_files', 'module_files.module_id = '.$table.'.module_code', 'left');
        $result = $this->db->where($field, $id)->where('type',1)->get($table);
        return $result->row_array();
    }
    public function selectModule($id){

        $this->db->where('module_code', $id);
        $result = $this->db->get('modules');
        return $result->row_array();
    }
    public function selectFile($id){

        $this->db->where('file_id', $id);
        $result = $this->db->get('module_files');
        return $result->row_array();
    }

    
   public function viewAssignment($assignment)
   {
        $assignments = $this->db->where('type', 1)->get_where(
            'module_files', array(
            'module_id' => $assignment)
        );
        return $assignments->result_array();
   }
    public function add(){

        $config['upload_path'] = './assets/module_files/';
        $config['allowed_types'] = 'jpg|png|pdf|zip|doc|docx|ppt|pptx';
        $config['max_size'] = '4096';

        
        $this->load->library('upload', $config);
        
        if(!$this->upload->do_upload('assignmentFile')){
            echo 'file not uploaded'; //Change this line to something else
        }
        else{
            $uploadData = $this->upload->data();
            $file = $uploadData['file_name'];
        }

        $data = array(
            'type' => 1,
            'module_id' => $this->input->post('module_code'),
            'filename' => $this->input->post('name'),
            'deadline' => $this->input->post('description'),
            'file' => $file
        );
        return $this->db->insert('module_files', $data);
    }
    public function update($module_id, $file_id){

            $config['upload_path'] = './assets/module_files/';
            $config['allowed_types'] = '.jpg|.jpeg|.png|.pdf|.doc|.zip|.ppt|.pptx';
            
            $this->load->library('upload', $config);

            if($this->upload->do_upload('file')){
                echo 'file not uploaded';
            }
            else{
               $uploadData = $this->upload->data();
                $file = $uploadData['file_name'];
            }

        $data =[
            'type' => 1,
            'module_id' => $module_id,
            'filename' => $this->input->post('name'),
            'deadline' => $this->input->post('description'),
            'file' => $file
        ];
        $this->db->where('file_id', $file_id)->update('module_files', $data);
    }
    public function grade($id){
        $data = array(
            'grade' => $this->input->post('grade')
        );
        $this->db->where('assignment_id', $id);
        $this->db->update('assignments', $data);
    }
    public function deleteFile($id){
        $this->db->where('file_id', $id)->delete('module_files');
    }
    public function archiveFile($id , $data){
        $this->db->where('file_id', $id)->update('module_files', $data);
    }
    public function deleteAssignment($id){
        $this->db->where('assignment_id', $id)->delete('assignments');
    }
}