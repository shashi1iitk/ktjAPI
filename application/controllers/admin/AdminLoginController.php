<?php defined('BASEPATH') or exit('No direct script access allowed');

class AdminLoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/AdminLoginModel');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/home');
            $this->load->view('admin/templates/footer');
        } else {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/login_form');
            $this->load->view('admin/templates/footer');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            if (isset($this->session->userdata['logged_in'])) {
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidenav');
                $this->load->view('admin/home');
                $this->load->view('admin/templates/footer');
            } else {
                $this->load->view('admin/templates/header');
                $this->load->view('admin/login_form');
                $this->load->view('admin/templates/footer');
            }
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );

            $result = $this->AdminLoginModel->login($data);

            if ($result['login'] == true) {
                $session_data = array(
                    'email' => $this->input->post('email')
                );
                $data['userinfo'] = $result['userinfo'];
                $this->session->set_userdata('logged_in', $session_data);
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidenav');
                $this->load->view('admin/home', $data);
                $this->load->view('admin/templates/footer');
            } else {
                $data['message'] = "Invalid Username or Password";
                $this->load->view('admin/templates/header');
                $this->load->view('admin/login_form', $data);
                $this->load->view('admin/templates/footer');
            }
        }
    }

    public function logout()
    {
        $session_data = array(
            'email' => ''
        );

        $this->session->unset_userdata('logged_in', $session_data);
        $data['message'] = 'Successfully Logout';
        $this->load->view('admin/templates/header');
        $this->load->view('admin/login_form', $data);
        $this->load->view('admin/templates/footer');
    }
}
