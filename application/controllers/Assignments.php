<?php 
	
class Assignments extends CI_Controller {

	 public function loadViews($page, $title, $data = []) {
        $this->load->view('layouts/header', ['title' => $title]);
<<<<<<< HEAD
        $this->load->view('layouts/siteNav');
=======
        $this->load->view('layouts/adminNav');
>>>>>>> b6e7c7a9c729bb2ca4f0ee0c330019c6283d66a1
        $this->load->view('assignment/'.$page, $data);
        $this->load->view('layouts/footer');
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

	public function view() {
		$this->loadViews('view', 'Assignment View');
	}

	public function upload() {
		$this->loadViews('upload', 'Assignment Upload');
	}
}
