<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCollegeManageController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/AdminCollegeModel');
    }
    public function index()
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        }
        else {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/college_add');
            $this->load->view('admin/templates/footer');
        }

        
    }
    public function add()
    {
        if (!isset($this->session->userdata['logged_in'])) {
            redirect('/');
        }
        $this->form_validation->set_rules('college', 'College Name', 'trim|required');
        if ($this->form_validation->run() == TRUE)
        {
            $data = ['college_name' => $this->input->post('college')];  
            $result = $this->AdminCollegeModel->add($data);
            if($result == TRUE)
            {
                $data['message'] = 'College Added';
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidenav');
                $this->load->view('admin/college_add', $data);
                $this->load->view('admin/templates/footer');
            }
            else {
                $data['message'] = 'Error';
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidenav');
                $this->load->view('admin/college_add', $data);
                $this->load->view('admin/templates/footer');
            }
        }
        else {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/college_add');
            $this->load->view('admin/templates/footer');
        }
    }
}
