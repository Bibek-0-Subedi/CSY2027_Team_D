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
            $module_id = $this->Assignment->selectFile($id);
            if(isset($_POST['archive'])) {
                $data = ['archive' => '1'];
                $this->Assignment->archiveFile($id , $data);
                redirect('tutor/module/assignment/index/'.$module_id['module_id']);
           }elseif(isset($_POST['unarchive'])) {
                $data = ['archive' => '0'];
                $this->Assignment->archiveFile($id , $data);
                redirect('tutor/module/assignment/index/'.$module_id['module_id']);
            }elseif(isset($_POST['delete'])){
                $this->Assignment->deleteFile($id);
                redirect('tutor/module/assignment/index/'.$module_id['module_id']);             
            }
        }
        $assignment = $this->Assignment->viewAssignment($id);
        $module = $this->Assignment->selectModule($id);
        $data = [
            'assignments' => $assignment,
            'modules' => $module
        ];
        $this->loadViews('index', 'Assignment' , $data);
    }
    public function view($id = false)
    {
        if($id){
            $module_id = $this->Assignment->getTableData($id, 'assignment_id', 'assignments');
            if(isset($_POST['delete'])){
                $this->Assignment->deleteAssignment($id);
                redirect('tutor/module/assignment/view/'.$module_id['module_code']);             
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
    public function update($id){
    
        $this->form_validation->set_rules('name', 'Assignment Name', 'required');
         $this->form_validation->set_rules('description', 'Deadline', 'required');

        if($this->form_validation->run() === FALSE){
                 $moduleF = $this->Assignment->selectFile($id);

            $data = [
                'modules' => $moduleF
            ];
                $this->loadViews('edit', 'Edit File', $data);
        }   
        else{
            $module_id = $this->Assignment->selectFile($id);
            $this->Assignment->update($id); 
            redirect('tutor/module/assignment/index/'.$module_id['module_id']);
        }
    }
    public function grade($id) {

        $data['id'] = $id;
    
        $this->form_validation->set_rules('grade', 'Grade', 'required');
     

        if ($this->form_validation->run() === FALSE) {
            $this->loadViews('grade', 'Assignment Upload', $data);
        }
        else {
            $module_id = $this->Assignment->getTableData($id, 'assignment_id', 'assignments');
             $this->Assignment->grade($id);
            redirect('tutor/module/assignment/view/'.$module_id['module_code']);
            
       }    
        
    }
}
