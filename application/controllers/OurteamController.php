<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OurteamController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OurteamModel');
    }
    
    public function index($type)
    {
        $data['members'] = $this->OurteamModel->getbytype($type);

        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST');
        header('Content-Type: application/json');
        echo json_encode($data['members']);
    }
}
