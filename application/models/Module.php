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

	public function module_files($module)
	{
   		 $module_files = $this->db->get_where('module_files', array(
        	'module_id' => $module
    	));
    	return $module_files->result_array();
	}

	public function addMaterials(){

			$config['upload_path'] = './assets/module_files/';
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc';
			
			$this->load->library('upload', $config);
	
			if($this->upload->do_upload('file')){
				$uploadData = $this->upload->data();
				$file= $uploadData['file_name'];
			}
			else{
				echo 'file not uploaded';
			}

    	$data = array(
    		'module_id' => $this->input->post('module_code'),
    		'filename' => $this->input->post('module_date'),
    		'description' => $this->input->post('description'),
    		'file' => $file
    	);
    	return $this->db->insert('module_files', $data);
    }
}