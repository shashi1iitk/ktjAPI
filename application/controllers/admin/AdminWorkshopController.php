<?php

class AdminWorkshopController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('WorkshopModel');
    }
    public function index()
    {
        if (!isset($this->session->userdata['logged_in'])) 
        {
            echo "You are not logged in!";
        } 
        else 
        {
            $data['workshops'] = $this->WorkshopModel->getAll();
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/workshops/all', $data);
            $this->load->view('admin/templates/footer');
        }
    }

    public function get($id)
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } else {
            $data['users'] = $this->WorkshopModel->getuserbyworkshopid($id);
            $data['workshopname'] = $this->WorkshopModel->getbyid($id)->name;
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/workshops/users', $data);
            $this->load->view('admin/templates/footer');
        }
    }

    public function edit($id)
    {
        if (!isset($this->session->userdata['logged_in'])) 
        {
            echo "You are not logged in!";
        } else 
        {

            $data['workshop'] = $this->WorkshopModel->getbyid($id);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/workshops/each', $data);
            $this->load->view('admin/templates/footer');
        }
    }

    public function update($id)
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } else {
            $this->form_validation->set_rules('about', 'about', 'trim');
            $this->form_validation->set_rules('topic', 'topic', 'trim');
            $this->form_validation->set_rules('logo', 'logo', 'trim');
            $this->form_validation->set_rules('contact', 'contact', 'trim');

            if ($this->form_validation->run() == true) {

                $data = [
                    'id' => $id,
                    'about' => $this->input->post('about'),
                    'topic' => $this->input->post('topic'),
                    'logo' => $this->input->post('logo'),
                    'contact' => $this->input->post('contact'),
                ];

                $result = $this->WorkshopModel->update($data);

                if ($result == true) {
                    $data['workshops'] = $this->WorkshopModel->getAll();
                    $this->load->view('admin/templates/header');
                    $this->load->view('admin/templates/sidenav');
                    $this->load->view('admin/workshops/all', $data);
                    $this->load->view('admin/templates/footer');
                } else {
                    $data['message'] = 'Error';
                    $data['workshop'] = $this->WorkshopModel->getbyid($id);
                    $this->load->view('admin/templates/header');
                    $this->load->view('admin/templates/sidenav');
                    $this->load->view('admin/workshops/each', $data);
                    $this->load->view('admin/templates/footer');
                }
            } else {
                $data['workshops'] = $this->WorkshopModel->getAll();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidenav');
                $this->load->view('admin/workshops/all', $data);
                $this->load->view('admin/templates/footer');
            }
        }
    }
}
