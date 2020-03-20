<?php 
	
class Assignments extends CI_Controller {

	 public function loadViews($page, $title, $data = []) {
        $this->load->view('layout/header', ['title' => $title]);
        $this->load->view('layout/adminNav');
        $this->load->view('assignment/'.$page, $data);
        $this->load->view('layout/footer');
    }

	public function index() {
		$this->loadViews('index', 'Assignment Index');
	}

	public function add() {
		$this->loadViews('add', 'Assignment Addition');
	}

	public function edit() {
		$this->loadViews('edit', 'Assignment Edition');
	}
}
?>