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
    public function index($module_id = false, $file_id = false)
    {
         if($file_id){
            if(isset($_POST['archive'])) {
                $data = ['archive' => '1'];
                $this->Assignment->archiveFile($file_id , $data);
                redirect('tutor/module/assignment/index/' . $module_id);
           }elseif(isset($_POST['unarchive'])) {
                $data = ['archive' => '0'];
                $this->Assignment->archiveFile($file_id , $data);
                redirect('tutor/module/assignment/index/' . $module_id);
            }elseif(isset($_POST['delete'])){
                $this->Assignment->deleteFile($file_id);
                redirect('tutor/module/assignment/index/' . $module_id);             
            }
        }
        $assignment = $this->Assignment->viewAssignment($module_id);
        $module = $this->Assignment->selectModule($module_id);
        $data = [
            'assignments' => $assignment,
            'modules' => $module
        ];
        $this->loadViews('index', 'Assignment' , $data);
    }
    public function view($id = false, $file_id = false)
    {
        if($file_id){
           if(isset($_POST['delete'])){
                $this->Assignment->deleteAssignment($file_id);
                redirect('tutor/module/assignment/view/' . $id);             
            }
        }
        $data['assignments'] = $this->Assignment->getTable('module_code', $id, 'assignments');
        $this->loadViews('view', 'Assignment View' , $data);
    }
    public function add($id) {

        $this->form_validation->set_rules('name', 'Assignment Name', 'required');
        $this->form_validation->set_rules('description', 'Deadline', 'required');
         // $this->form_validation->set_rules('file', 'File', 'required');

        if ($this->form_validation->run() === FALSE) {

            $modules = $this->Assignment->selectModule($id);
            $moduleF = $this->Assignment->viewAssignment($id);

            $data = [
                'modules' => $modules,
                'assignments' => $moduleF
            ];

            $this->loadViews('add', 'Add Assignment', $data);
        }
        else {
            $success = $this->Assignment->add();
            if($success){
            redirect('tutor/module/assignment/index/' . $id);
            }
        }
    }
    public function update($module_id, $file_id){
    
        $this->form_validation->set_rules('name', 'Assignment Name', 'required');
         $this->form_validation->set_rules('description', 'Deadline', 'required');

        if($this->form_validation->run() === FALSE){
                 $moduleF = $this->Assignment->selectFile($file_id);

            $data = [
                'modules' => $moduleF,
                'module_id' => $module_id
            ];
                $this->loadViews('edit', 'Edit File', $data);
        }   
        else{   
                  $this->Assignment->update($module_id, $file_id); 
                     redirect('tutor/module/assignment/index/' . $module_id);
        }
    }
    public function grade($module_id, $file_id) {

        $data = [
            'id' => $file_id,
            'module_id' => $module_id
        ]; 
    
        $this->form_validation->set_rules('grade', 'Grade', 'required');
     

        if ($this->form_validation->run() === FALSE) {
            $this->loadViews('grade', 'Assignment Upload', $data);
        }
        else {
             $this->Assignment->grade($file_id);
            redirect('tutor/module/assignment/view/' . $module_id);    
       }    
        
    }
}
