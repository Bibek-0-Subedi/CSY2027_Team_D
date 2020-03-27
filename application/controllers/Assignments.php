<?php 
	
class Assignments extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('Assignment');
    }

	 public function loadViews($page, $title, $data = []) {
        $this->load->view('layouts/header', ['title' => $title]);

        $this->load->view('layouts/siteNav');
        $this->load->view('assignment/'.$page, $data);
        $this->load->view('layouts/footer');
    }

	public function index() {
		

		$data['assignments'] = $this->Assignment->allTableGenerator();
		
		$this->loadViews('index', 'Assignment Index', $data);
	}

	public function add() {

		$this->form_validation->set_rules('name', 'Email', 'required');
        $this->form_validation->set_rules('deadline', 'Password', 'required');
        $this->form_validation->set_rules('module_id', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
        	$this->loadViews('add', 'Assignment Addition');
        }
        else {
        	$success = $this->Assignment->insert();
        	if($success){
        	redirect('assignment/index');
        	}
        }


	}

	public function edit($id) {

		$data['id'] = $id;
		
        if ($this->form_validation->run() === FALSE) {
        	$this->loadViews('edit', 'Assignment Edition', $data);
        }
        else {
        	 $this->Assignment->update($id);
        	redirect('assignment/view');
        	
       }
	}

    public function delete($id) {

        $this->Assignment->delete($id);
        redirect('assignment/index');
        
    }

	public function view() {
		$data['assignments'] = $this->Assignment->tableGenerator();
		$this->loadViews('view', 'Assignment View', $data);
	}

	public function upload() {
		$this->loadViews('upload', 'Assignment Upload');
	}

	public function grade($id) {

		$data['id'] = $id;
	
		$this->form_validation->set_rules('grade', 'Grade', 'required');
     

        if ($this->form_validation->run() === FALSE) {
        	$this->loadViews('grade', 'Assignment Upload', $data);
        }
        else {
        	 $this->Assignment->grade($id);
        	redirect('assignment/view');
        	
       }	
		
	}


}
