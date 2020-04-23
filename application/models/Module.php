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
   		 $module_files = $this->db->where('type', 1)->get_where('module_files', array(
        	'module_id' => $module
    	));
    	return $module_files->result_array();
	}

	public function addMaterials(){

			$config['upload_path'] = './assets/module_files/';
			$config['allowed_types'] = 'jpg|jpeg|png|.pdf|doc|zip|.ppt|.pptx';
            
            $this->load->library('upload', $config);
			
			if($this->upload->do_upload('file')){
				echo 'file not uploaded';
			}
			else{
                $uploadData = $this->upload->data();
                $file = $uploadData['file_name'];
			}

    	$data = array(
            'type' => $this->input->post('type'),
    		'module_id' => $this->input->post('module_code'),
    		'filename' => $this->input->post('module_date'),
    		'description' => $this->input->post('description'),
    		'file' => $file
    	);
    	return $this->db->insert('module_files', $data);
    }
    public function updateMaterials($id){
        
            $config['upload_path'] = './assets/module_files/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|zip|ppt|pptx';
            
            $this->load->library('upload', $config);

            if($this->upload->do_upload('file')){
                echo 'file not uploaded';
            }
            else{
               $uploadData = $this->upload->data();
                $file = $uploadData['file_name'];
            }

        $data =[
           	'module_id' => $this->input->post('module_code'),
    		'filename' => $this->input->post('module_date'),
    		'description' => $this->input->post('description'),
    		'file' => $file
        ];
        $this->db->where('file_id', $id)->update('module_files', $data);
    }
    public function deleteFile($id){
        $this->db->where('file_id', $id)->delete('module_files');
    }
    public function archiveFile($id , $data){
        $this->db->where('file_id', $id)->update('module_files', $data);
    }
}