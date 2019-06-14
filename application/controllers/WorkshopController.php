<?php defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class WorkshopController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('WorkshopModel');
    }
    public function index()
    {
        $data['workshops'] = $this->WorkshopModel->getAll();

        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST');
        header('Content-Type: application/json');
        echo json_encode($data['workshops']);
    }
    public function register()
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST');

        $tokenval = $this->input->post('tokenval');
        $workshopid = $this->input->post('workshopid');

        if ($tokenval == '' || $workshopid == '') 
        {
            header('Content-Type: application/json');
            echo json_encode(array('message' => 'You are not Logged In !!'));
        } 
        else 
        {
            $secretKey = base64_decode('some_secret_key');
            try 
            {
                $DecodedDataArray = JWT::decode($tokenval, $secretKey, array('HS512'));
                $data = [
                    'workshop_id' => $workshopid,
                    'user_id' => $DecodedDataArray->data->id,
                ];

                $result = $this->WorkshopModel->register($data);

                if ($result == 1) 
                {
                    header('Content-Type: application/json');
                    echo json_encode(array('message' => 'Successfully registered :-)'));
                } else if ($result == 2) 
                {
                    header('Content-Type: application/json');
                    echo json_encode(array('message' => 'Could not register !!'));
                } else 
                {
                    header('Content-Type: application/json');
                    echo json_encode(array('message' => 'You are already registered :-)'));
                }

            } 
            catch (Exception $e) 
            {
                header('Content-Type: application/json');
                echo json_encode(array('message' => 'Please Logout and re-login.'));
            }

        }
    }
}
