<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUserManageController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/AdminUserManageModel');
        $this->load->library('session');
    }

    public function index()
    {
        if (!isset($this->session->userdata['logged_in'])) 
        {
            redirect('/');
        }
        $data['users'] = $this->AdminUserManageModel->getAll();

        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidenav');
        $this->load->view('admin/user', $data);
        $this->load->view('admin/templates/footer');
    }
}
