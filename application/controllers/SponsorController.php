<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SponsorController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('security');
        $this->load->model('SponsModel');
    }
    public function index($year)
    {

        $data = array(
            'year'       => $year,
            'category'   => $this->SponsModel->getCategory(),
            'spons'      => $this->SponsModel->getSponsorRefine($year)
        );
        $this->load->view('templates/header');
        $this->load->view('sponsors', $data);
        $this->load->view('templates/footer');
    }
}
