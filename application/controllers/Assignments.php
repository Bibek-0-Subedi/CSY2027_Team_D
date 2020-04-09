<?php 
	
class Assignments extends CI_Controller {

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('Assignment');
    }

	 public function loadViews($page, $title, $data = []) {
        $this->load->view('layouts/header', ['title' => $title]);

        $this->load->view('layouts/adminNav');
        $this->load->view('assignment/'.$page, $data);
        $this->load->view('layouts/adminfooter');
    }
     public function index($id = false)
    {
        if($id){
            if (isset($_POST['archive'])) {
                $data = ['archive' => '1'];
                $this->admin->archiveModule($id , $data);
                redirect('admin/module');
            }elseif(isset($_POST['delete'])){
                $this->admin->deleteModule($id);
                redirect('admin/module');            
            }
        }
        $data['assignments'] = $this->Assignment->getTable('staff_id', $this->session->userdata('id'), 'assignments');
        $this->loadViews('index', 'Assignment' , $data);
    }
    public function view($id = false)
    {
        if($id){
            if (isset($_POST['archive'])) {
                $data = ['archive' => '1'];
                $this->admin->archiveModule($id , $data);
                redirect('admin/module');
            }elseif(isset($_POST['delete'])){
                $this->admin->deleteModule($id);
                redirect('admin/module');            
            }
        }
        $data['assignments'] = $this->Assignment->getTable('staff_id', $this->session->userdata('id'), 'assignments');
        $this->loadViews('view', 'Assignment View' , $data);
    }
     public function add($id = false)
    {
        $assignment = $this->Assignment->getTableData($id, 'assignment_id', 'assignments');

        $this->form_validation->set_rules('assignment_name', 'Assignment Name', 'required');
        $this->form_validation->set_rules('file', 'File', 'required');
        // if ($id && isset($_POST['add'])) {
        //     if ($module['module_code'] != $_POST['module_code']) {
        //         $this->form_validation->set_rules('module_code', 'Module Code', 'required|integer|is_unique[modules.module_code]');
        //     }      
        // }          
        // else{
        //     $this->form_validation->set_rules('module_code', 'Module Code', 'required|integer|is_unique[modules.module_code]');
        // }
        if ($this->form_validation->run() === FALSE) {
            $course  = $this->Assignment->getTable('','','courses');
            $module  = $this->Assignment->getTable('module_leader', $this->session->userdata('id'),'modules');

            if ($id) {
                $data = [
                    'assignment' => $assignment,
                    'course' => $course
                ];
                $this->loadViews('add', 'Edit Assignment', $data);    
            } else {
                $assignmentNull = ['assignment_id' => '', 'assignment_name' => '' , 'deadline' => '', 'assignment_leader' => '', 'module_code' => '', 'course_code' => ''];
                $data =[
                    'assignment' => $assignmentNull,
                    'course' => $course,
                    'module' => $module

                ];
                $this->loadViews('add', 'Add Assignment', $data);    
            }
        }
        elseif($id){
            $this->Assignment->updateAssignment($id);
            redirect('assignment/index');
        }
        else{
            $this->Assignment->addMaterials();
            redirect('assignment/index');
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
