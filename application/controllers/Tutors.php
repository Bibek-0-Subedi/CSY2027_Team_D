<?php

class Tutors extends CI_Controller {
    
    //contructor to load the model 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tutor');
    }
    //loads the view page of the tutor
    public function loadViews($page, $title, $data = []){
        if(($this->session->userdata('type')) != 3){
            redirect('admin/login');
        }
        $this->load->view('layouts/header', ['title' => $title]);
        $this->load->view('layouts/adminNav');
        $this->load->view('tutor/'.$page, $data);
        $this->load->view('layouts/adminfooter');
    }
    //function to show all the announcements in the dashboard view page of the tutor
    public function dashboard(){
        $data['announcements'] = $this->tutor->getAnnouncement();
        $this->loadViews('dashboard', 'Dashboard', $data);
    }
    //function to show all the details in the profile view page of the tutor
    public function profile(){
        $data['tutor'] = $this->tutor->selectTutor();
        $this->loadViews('profile', 'Profile', $data);
    }
    //function to list modules which are assigned to the tutor in the tutor's module view page 
    public function modules(){
            $module = $this->tutor->select();
            $data = [
                'modules' => $module
            ];
        $this->loadViews('module', 'Module', $data);
    }
    //function to list modules which are assigned to the tutor in the tutor's module view page
    public function module(){
        $module = $this->tutor->select();
        $data = [
            'modules' => $module
        ];
        $this->loadViews('module', 'Module', $data);
    }
    //function to list the student which are assigned to the tutor  
    public function student(){
            $module = $this->tutor->selectStudent();
            $data = [
                'modules' => $module
            ];
        $this->loadViews('student', 'Student', $data); 
    }
    //function to list of student which are assigned to the module in the tutor's module student view page and 
    public function studentList($id){
            $module = $this->tutor->selectStudent($id);
            $data = [
                'students' => $module,
                'module_id' => $id
            ];
        $this->loadViews('studentList', 'Student List', $data); 
    }
    //function to load the form in order to update the data 
    public function getForm() {

        $data['module'] = $this->Tutor->select();
        $this->loadViews('module', 'Module', $data);
    }
    //function to update the data of the tutor
    public function updateData(){
        $data = $this->tutor->selectTutor();
        $data['courses'] = $this->admin->getTable('archive', 0, 'courses');    
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('surname', 'Surname', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('subject', 'Subject', 'required');

        if($this->form_validation->run() === FALSE){
                $this->loadViews('updateData', 'Edit Data', $data);
        }   
        else{   
              if($this->session->userdata('approval') == 0){
                  $this->Tutor->sendRequest($data['staff_id']); 
                     redirect('tutor/dashboard');
              }
              else{
                    echo "Request has been sent!";
              }
        }
    }
    // public function attendance($id)
    // {
    //     $data['attendances'] = $this->Tutor->attendance($id);
    //     $this->loadViews('attendanceRecord', 'Attendance Record', $data);
    // }

    //function to take the attendance
    public function attendance()
    {
        
        $studentId = $this->uri->segment(4);
        $moduleCode = $this->uri->segment(5);
        // if(!empty($id)){
            $data['module'] = $this->student->module($moduleCode);
            $data['student'] = $this->student->getStudent($studentId);
            $data['attendances'] = $this->student->attendance($studentId, $moduleCode);
            $this->loadViews('attendance', 'Attendance', $data);
        // }
    }
    //function to view all the grade records of the student assigned to the tutor's module in the student's grade record view page
    public function grade($module_id, $student_id)
    {
        $data['grades'] = $this->Tutor->grade($module_id, $student_id);
        $data['module'] = $this->module->select($module_id);
        $this->loadViews('gradeRecord', 'Grade Record', $data);
    } 
    //function to list the student which are assigned to the tutor as a pat tutor in the tutor's pat student view page
    public function patList()
    {
        $data['students'] = $this->Tutor->selectStudentPat();
        $this->loadViews('patList', 'PAT', $data);
    }
    //function to list the student pat information in the pat tutor's student pat information  view page
    public function patInfo($id)
    {
        $data = [
            'informations' => $this->Tutor->patInfo($id),
            'student_id' => $id
        ];

        $this->loadViews('viewPat','PAT Information', $data);
    }
    //function to add the pat information of the student
    public function addPat($id){
        $this->form_validation->set_rules('student_id', 'Student Id', 'required');
        $this->form_validation->set_rules('information', 'Information', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            
             $data = [
                        'students' => $this->Tutor->selectStudentPat(),
                        'student_id' => $id
                     ];
             $this->loadViews('pat', 'Send Information', $data); 

        }
        else {
            $this->Tutor->addInfo($id);
            $this->session->set_flashdata('added', 'PAT Information Added Successfully!');
            redirect('tutor/pat/');
        }
    }
    //function to edit the added pat information of the student
    public function editPat($student_id, $pat_id){
        $this->form_validation->set_rules('information', 'Information', 'required');
    
        if ($this->form_validation->run() === FALSE) {
             
             $data = [
                        'student' => $this->Tutor->selectInfo($pat_id),
                        'pat_id' => $pat_id,
                        'student_id' => $student_id

                     ];
             $this->loadViews('editPat', 'Edit Information', $data); 

        }
        else {
            $success = $this->Tutor->updateInfo($pat_id);
            $this->session->set_flashdata('added', 'PAT Information Updated Successfully!');
            redirect('tutor/pat');
        }
    }
    //function to list all the diary information added by the tutor
    public function diaryList()
    {
        $data['diaries'] = $this->Tutor->selectDiary();
        $this->loadViews('diaryList', 'Diary', $data);
    }
    //function to add the diary information
    public function addDiary(){
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('information', 'Information', 'required');
    
        if ($this->form_validation->run() === FALSE) {
             
             $data['diaries'] = $this->Tutor->selectDiary();
             $this->loadViews('diary', 'Add Information', $data); 

        }
        else {
            $this->Tutor->insertDiary();
            $this->session->set_flashdata('added', 'Diary Information Added Successfully!');
            redirect('tutor/diary');
            
        }
    }
    //function to edit the added diary information
    public function editDiary($id){
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('information', 'Information', 'required');
    
        if ($this->form_validation->run() === FALSE) {    
             $data = [
                    'diary_id' => $id
                ];
             $this->loadViews('editDiary', 'Edit Information', $data); 
        }
        else {
            $this->Tutor->updateDiary($id);
            $this->session->set_flashdata('edited', 'Diary Information Updated Successfully!');
            redirect('tutor/diary');
            }
    }
    //function to list all the announcements added by the tutor
    public function announcement()
    {
        $data['modules'] = $this->tutor->select();
        $data['announcements'] = $this->tutor->getTutorAnnouncement();
        $this->loadViews('announcement', 'Announcements' , $data);
    }
    //function to add the announcements
    public function addAnnouncement()
    {
        $this->tutor->addAnnouncement();
        redirect('tutor/announcement');
    }
    //function to delete the added announcements
    public function deleteAnnouncement($id)
    {
        $this->tutor->deleteAnnouncement($id);
        redirect('tutor/announcement');
    }

    public function timetable(){
        $data['timetable'] = $this->Tutor->getTimeTable($this->session->userdata('id'));
        $this->loadViews('timetable', 'Timetable' , $data);
    }

    public function viewTimeTable($id){

        $timetable = $this->Tutor->getTimeTableData($id);
        $deser_timetable = unserialize($timetable['timetable']); 
        $data =['timetable' => $deser_timetable]; 
        $this->loadViews('viewTimeTable', 'View Table', $data);
    }
}