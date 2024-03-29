<?php 

class Assignment extends CI_model{
    
     //function to load the database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
    public function getTable($field = false, $value = false,$order ,$table)
    {
        $this->db->join('module_files', 'module_files.module_id = '.$table.'.module_code', 'left');
        if($field){
            $result = $this->db->where($field, $value)->where('type',1)->order_by($order,'DESC')->get($table);
        }
        else{
            $result = $this->db->get($table);
        }
        return $result->result_array();
    }
    //function to select all the assignment files from the assignments table and order them in decending order
    public function assignmentFiles($module_id)
    {
        $this->db->join('module_files', 'module_files.module_id = assignments.module_code', 'left');
        $result = $this->db->where('module_code', $module_id)->where('type',1)->order_by('assignment_id','DESC')->get('assignments');
        return $result->result_array();
    }
    public function getTableData($id, $field , $table)
    {
        $this->db->join('module_files', 'module_files.module_id = '.$table.'.module_code', 'left');
        $result = $this->db->where($field, $id)->where('type',1)->get($table);
        return $result->row_array();
    }
     //function to select the module from the modules table
    public function selectModule($id){

        $this->db->where('module_code', $id);
        $result = $this->db->get('modules');
        return $result->row_array();
    }
    //function to select the module files from the module_files table
    public function selectFile($id){

        $this->db->where('file_id', $id);
        $result = $this->db->get('module_files');
        return $result->row_array();
    }
    //function to select all the assignment files from the module_files table and order them in decending order
   public function viewAssignment($assignment)
   {
        $assignments = $this->db->where('type', 1)->order_by('file_id', 'DESC')->get_where('module_files', array(
            'module_id' => $assignment
        ));
        return $assignments->result_array();
   }
   //function to add/insert assignment files into the module_files table
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
    //function to update the assignment file from the module_files table
    public function update($module_id, $file_id){

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

        $data =[
            'type' => 1,
            'module_id' => $module_id,
            'filename' => $this->input->post('name'),
            'deadline' => $this->input->post('description'),
            'file' => $file
        ];
        $this->db->where('file_id', $file_id)->update('module_files', $data);
    }
    //function to grade the assignment file from the assignments table
    public function grade($id){
        $data = array(
            'grade' => $this->input->post('grade')
        );
        $this->db->where('assignment_id', $id);
        $this->db->update('assignments', $data);
    }
    //function to delete the assignment file from the module_files table
    public function deleteFile($id){
        $result = $this->db->where('file_id', $id)->get('module_files');
        $rows = $result->result_array();
        foreach ($rows as $row) {
           unlink("./assets/module_files/". $row['file']);
        }
        $this->db->where('file_id', $id)->delete('module_files');
    }
    //function to archive the assignment file from the module_files table
    public function archiveFile($id , $data){
        $this->db->where('file_id', $id)->update('module_files', $data);
    }
    //function to delete the assignment file from the assignments table
     public function deleteAssignment($id){
       $result = $this->db->where('assignment_id', $id)->get('assignments');
        $rows = $result->result_array();
        foreach ($rows as $row) {
           unlink("./assets/assignment_submissions/". $row['assignment_file']);
        }
        $this->db->where('assignment_id', $id)->delete('assignments');
    }
}