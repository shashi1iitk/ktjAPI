<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PagesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
        $this->load->model('PagesModel');
    }

    public function index()
    {
        header('location: https://www.ktj.in');
    }
    
    public function schedule()
    {
        $this->load->view('templates/header');
        $this->load->view('schedule');
        $this->load->view('templates/footer');
    }

    public function accomodation()
    {
        $this->load->view('templates/header');
        $this->load->view('accomodation');
        $this->load->view('templates/footer');
    }

    public function notices()
    {
        $data['notices'] = $this->PagesModel->getnotices();
        $this->load->view('templates/header');
        $this->load->view('notices', $data);
        $this->load->view('templates/footer');
    }

    public function privacy()
    {
        $this->load->view('templates/header');
        $this->load->view('privacy');
        $this->load->view('templates/footer');
    }

    public function contact()
    {
        $this->load->view('templates/header');
        $this->load->view('contact');
        $this->load->view('templates/footer');
    }

}
