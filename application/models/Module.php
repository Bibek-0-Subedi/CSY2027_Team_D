<?php 

class Module extends CI_model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function select(){

		$this->db->where('module_leader', $this->session->userdata('id'));
		$result = $this->db->get('modules');
		return $result->result_array();
	}

	public function selectTable($field1 = false, $table, $field2 = false, $id = false){

			$this->db->select($field1);
			$this->db->from($table);
			$this->db->where($field2, $this->session->userdata('id'));
			$result = $this->db->get();
		return $result->result_array();
	}

	public function joinTable($id)
    {
        $this->db->select('*');
      $this->db->from('modules');
      $this->db->join('module_files', 'modules.module_code = module_files.module_id');
      $this->db->where('modules.module_leader', $this->session->userdata('id'));
      $result = $this->db->get();
        return $result->result_array();
        
    }

	public function addMaterials(){

			$config['upload_path'] = './materials/module/';
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc';
			
			$this->load->library('upload', $config);
	
			if($this->upload->do_upload('files')){
				$uploadData = $this->upload->data();
				$file= $uploadData['file_name'];
			}
			else{
				echo 'file not uploaded';
			}

    	$data = array(
    		'module_id' => $this->input->post('module_code'),
    		'module_leader' => $this->input->post('staff_id'),
    		'filename' => $file
    	);
    	return $this->db->insert('module_files', $data);
    }
}