<?php 
    
class Assignments extends CI_Controller {

    //contructor to load the model
     public function __construct()
    {
        parent::__construct();
        $this->load->model('Assignment');
    }
    //loads the view page of the assignment
     public function loadViews($page, $title, $data = []) {
        $this->load->view('layouts/header', ['title' => $title]);

        $this->load->view('layouts/adminNav');
        $this->load->view('assignment/'.$page, $data);
        $this->load->view('layouts/adminfooter');
    }
    //function to list assignment files of module in the module-assignment view page 
    public function index($module_id = false, $file_id = false)
    {
        //to archive the assignment file
         if($file_id){
            if(isset($_POST['archive'])) {
                $data = ['archive' => '1'];
                $this->Assignment->archiveFile($file_id , $data);
                $this->session->set_flashdata('archived', 'Assignment Archived Successfully !');
                redirect('tutor/module/assignment/index/' . $module_id);
                //to unarchive the assignment file
           }elseif(isset($_POST['unarchive'])) {
                $data = ['archive' => '0'];
                $this->Assignment->archiveFile($file_id , $data);
                $this->session->set_flashdata('unarchived', 'Assignment Unarchived Successfully !');
                redirect('tutor/module/assignment/index/' . $module_id);
                //to delete the assignment file
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

        //to load the view page
        $this->loadViews('index', 'Assignment' , $data);
    }
    //function to list all submitted assignment files of module in the assignment-uploaded view page 
    public function view($id = false, $file_id = false)
    {
        //to grade the assignment 
        if(isset($_POST['gradeStudent'])) {
                $file_id = $this->input->post('assignment_id');
                $this->session->set_flashdata('deleted', 'Assignment Graded Successfully !');
                $this->Assignment->grade($file_id);           
            }
           //to delete the assignment file 
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
    //function to add the assignment file and load assignment file add page 
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
    //function to update the assignment file and load assignment file edit page 
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
