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
                $this->session->set_flashdata('archived', 'Assignment Archived Successfully !');
                redirect('tutor/module/assignment/index/' . $module_id);
           }elseif(isset($_POST['unarchive'])) {
                $data = ['archive' => '0'];
                $this->Assignment->archiveFile($file_id , $data);
                $this->session->set_flashdata('unarchived', 'Assignment Unarchived Successfully !');
                redirect('tutor/module/assignment/index/' . $module_id);
            }elseif(isset($_POST['delete'])){
                $this->Assignment->deleteFile($file_id);
                $this->session->set_flashdata('deleted', 'Assignment Deleted Successfully !');
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
        if(isset($_POST['gradeStudent'])) {
                $file_id = $this->input->post('assignment_id');
                $this->session->set_flashdata('deleted', 'Assignment Graded Successfully !');
                $this->Assignment->grade($file_id);           
            }
        elseif(isset($_POST['delete'])){
                $this->Assignment->deleteAssignment($file_id);
                $this->session->set_flashdata('deleted', 'Assignment Deleted Successfully !');
                redirect('tutor/module/assignment/view/' . $id);             
            } 
        $data = [
            'assignments' => $this->Assignment->assignmentFiles($id),
            'id' => $file_id,
            'module_id' => $id ];
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
            $this->Assignment->add();
            $this->session->set_flashdata('added', 'Assignments Added Successfully !');
            redirect('tutor/module/assignment/index/' . $id);
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
                  $this->session->set_flashdata('edited', 'Assignment Updated Successfully !');
                     redirect('tutor/module/assignment/index/' . $module_id);
        }
    }
}
