<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEventController extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/AdminEventModel');
    }
    public function index()
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } 
        else {
            $data['events'] = $this->AdminEventModel->getAllEvents();
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/events/all', $data);
            $this->load->view('admin/templates/footer');
        }
    }

    public function event($id)
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } 
        else 
        {
            $data['users'] = $this->AdminEventModel->getbyeventid($id);
            $data['eventname'] = $this->AdminEventModel->eventnamebyid($id);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/events/event', $data);
            $this->load->view('admin/templates/footer');
        }
    }
    
}
