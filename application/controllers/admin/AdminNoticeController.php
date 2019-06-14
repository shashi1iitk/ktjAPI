<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminNoticeController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/AdminNoticeModel');
    }

    public function index()
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        }
        else {
            $data['allnotices'] = $this->AdminNoticeModel->getAll();
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/notices/all', $data);
            $this->load->view('admin/templates/footer');
        }
    }
    public function add()
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } else {
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/notices/add');
            $this->load->view('admin/templates/footer');
        }
    }
    public function addnotice()
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } 
        else {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('body', 'body', 'trim|required');
            $this->form_validation->set_rules('date', 'date', 'trim');

            if ($this->form_validation->run() == true) {

                $data = [
                    'title' => $this->input->post('title'),
                    'body'  => $this->input->post('body'),
                    'date'  => $this->input->post('date')
                ];

                $result = $this->AdminNoticeModel->add($data);

                if ($result == true) {
                    $data['message'] = 'Notice Added';
                    $data['allnotices'] = $this->AdminNoticeModel->getAll();
                    $this->load->view('admin/templates/header');
                    $this->load->view('admin/templates/sidenav');
                    $this->load->view('admin/notices/all', $data);
                    $this->load->view('admin/templates/footer');
                } 
                else {
                    $data['message'] = 'Error';
                    $this->load->view('admin/templates/header');
                    $this->load->view('admin/templates/sidenav');
                    $this->load->view('admin/notices/add', $data);
                    $this->load->view('admin/templates/footer');
                }
            }
            else {
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidenav');
                $this->load->view('admin/notices/add');
                $this->load->view('admin/templates/footer');
            }
        }
    }

    public function update($id)
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } else {

            $data['notice'] = $this->AdminNoticeModel->getbyid($id);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/notices/update', $data);
            $this->load->view('admin/templates/footer');
        }
    }
    public function updatenotice($id)
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } else {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('body', 'body', 'trim|required');

            if ($this->form_validation->run() == true) {

                $data = [
                    'id'    => $id,
                    'title' => $this->input->post('title'),
                    'body' => $this->input->post('body'),
                ];

                $result = $this->AdminNoticeModel->update($data);

                if ($result == true) {
                    $data['allnotices'] = $this->AdminNoticeModel->getAll();
                    $this->load->view('admin/templates/header');
                    $this->load->view('admin/templates/sidenav');
                    $this->load->view('admin/notices/all', $data);
                    $this->load->view('admin/templates/footer');
                } else {
                    $data['message'] = 'Error';
                    $this->load->view('admin/templates/header');
                    $this->load->view('admin/templates/sidenav');
                    $this->load->view('admin/notices/add', $data);
                    $this->load->view('admin/templates/footer');
                }
            } else {
                $data['allnotices'] = $this->AdminNoticeModel->getAll();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidenav');
                $this->load->view('admin/notices/all', $data);
                $this->load->view('admin/templates/footer');
            }
        }
    }
}
