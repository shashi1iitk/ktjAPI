<?php

class AdminGFController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/AdminGFModel');
	}
	
    public function index()
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } 
        else {
            $data['events'] = $this->AdminGFModel->getAll();
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/gamefest/all', $data);
            $this->load->view('admin/templates/footer');
        }
    }

    public function show($id)
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } 
        else 
        {
            $data['users'] = $this->AdminGFModel->getbyeventid($id);
            $data['eventname'] = $this->AdminGFModel->eventnamebyid($id);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/gamefest/show', $data);
            $this->load->view('admin/templates/footer');
        }
    }
}
