<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEventDetailController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('admin/AdminEventDetailModel');
		$this->load->helper('text');
    }

    public function index()
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } else {
			$data['alleventdetails'] = $this->AdminEventDetailModel->getAll();
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/eventdetail/all', $data);
            $this->load->view('admin/templates/footer');
        }
    }

    public function update($id)
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } else {

            $data['eventdetail'] = $this->AdminEventDetailModel->getbyid($id);
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/eventdetail/each', $data);
            $this->load->view('admin/templates/footer');
        }
    }

    public function updateevent($id)
    {
        if (!isset($this->session->userdata['logged_in'])) {
            echo "You are not logged in!";
        } else {
            $this->form_validation->set_rules('about',          'about',        'trim');
            $this->form_validation->set_rules('rules',          'rules',        'trim');
            $this->form_validation->set_rules('ps',             'ps',           'trim');
            $this->form_validation->set_rules('contact',        'contact',      'trim');

            if ($this->form_validation->run() == true) {

                $data = [
                    'id' => $id,
                    'about' => $this->input->post('about'),
                    'rules' => $this->input->post('rules'),
                    'ps' => $this->input->post('ps'),
                    'contact' => $this->input->post('contact'),
                ];

                $result = $this->AdminEventDetailModel->update($data);

                if ($result == true) {
                    $data['alleventdetails'] = $this->AdminEventDetailModel->getAll();
                    $this->load->view('admin/templates/header');
                    $this->load->view('admin/templates/sidenav');
                    $this->load->view('admin/eventdetail/all', $data);
                    $this->load->view('admin/templates/footer');
                } else {
                    $data['message'] = 'Error';
                    $data['eventdetail'] = $this->AdminEventDetailModel->getbyid($id);
                    $this->load->view('admin/templates/header');
                    $this->load->view('admin/templates/sidenav');
                    $this->load->view('admin/eventdetail/each', $data);
                    $this->load->view('admin/templates/footer');
                }
            } else {
                $data['alleventdetails'] = $this->AdminEventDetailModel->getAll();
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidenav');
                $this->load->view('admin/eventdetail/all', $data);
                $this->load->view('admin/templates/footer');
            }
        }
    }
    
}
