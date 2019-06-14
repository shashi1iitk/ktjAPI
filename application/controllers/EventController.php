<?php defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class EventController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('EventModel');
        $this->load->helper('security');
    }
    public function index($genreid)
    {
        $data['events'] = $this->EventModel->geteventbygenre($genreid);

        // For sending the data in json format
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST');
        header('Content-Type: application/json');
        echo json_encode($data['events']);

        // For loading the view. This is not required as for now.
        // $this->load->view('templates/header');
        // $this->load->view('events/index');
        // $this->load->view('templates/footer');
    }
    public function add()
    {
        $data = array(
            'name'      => $this->input->post('name'),
            'genre'     => $this->input->post('genre'),
            'description'=>$this->input->post('description'),
            'rules'     => $this->input->post('rules')
        );

        $result = $this->EventModel->store($data);

        if($result == TRUE)
        {
            echo json_encode(array('response' => 'Successfully Added'));
        }
        else
        {
            echo json_encode(array('response' => 'Error Occured'));
        }
    }


    public function register()
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST');
        
        $tokenval = $this->input->post('tokenval');
        $eventid  = $this->input->post('eventid');

        if($tokenval == '' || $eventid == '')
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
                    'event_id' => $eventid,
                    'user_id' => $DecodedDataArray->data->id,
                ];

                $result = $this->EventModel->register($data);

                if ($result == 1) 
                {
                    header('Content-Type: application/json');
                    echo json_encode(array('message' => 'Successfully registered :-)'));
                } else if($result == 2)
                {
                    header('Content-Type: application/json');
                    echo json_encode(array('message' => 'Could not register !!'));
                }else 
                {
                    header('Content-Type: application/json');
                    echo json_encode(array('message' => 'You are already registered :-)'));
                }

            }catch(Exception $e){
                header('Content-Type: application/json');
                echo json_encode(array('message' => 'Please Logout and re-login.'));
            }
            
        }
    }
    public function gamefestregister()
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST');
        
        $tokenval 		= $this->input->post('tokenval');
        $eventid  		= $this->input->post('eventid');
		$transactionid 	= $this->input->post('transactionid');
		$steamid 		= $this->input->post('steamid');
		$playerid 		= $this->input->post('playerid');

        if($tokenval == '' || $eventid == '')
        {
            header('Content-Type: application/json');
            echo json_encode(array('message' => 'You are not Logged In !!'));
		}
		else if($transactionid == '' || $transactionid == NULL)
		{
			header('Content-Type: application/json');
			echo json_encode(array('message' => 'Transaction-id or Player-id is missing !!'));
		}
        else
        {
            $secretKey = base64_decode('some_secret_key');
            try
            {
                $DecodedDataArray = JWT::decode($tokenval, $secretKey, array('HS512'));
                $data = [
                    'event_id'       => $eventid,
                    'user_id'        => $DecodedDataArray->data->id,
					'transaction_id' => $transactionid,
					'steam_id' 		 => $steamid,
					'player_id'		 => $playerid
                ];

                $result = $this->EventModel->gamefestregister($data);

                if ($result == 1) 
                {
                    header('Content-Type: application/json');
                    echo json_encode(array('message' => 'Successfully registered :-)'));
				} 
				else if($result == 2)
                {
                    header('Content-Type: application/json');
                    echo json_encode(array('message' => 'Could not register !!'));
				}
				else 
                {
                    header('Content-Type: application/json');
                    echo json_encode(array('message' => 'You are already registered :-)'));
                }

            }catch(Exception $e){
                header('Content-Type: application/json');
                echo json_encode(array('message' => 'Please Logout and re-login.'));
            }
            
        }
    }

    public function gamefestcheck()
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST');
        
        $tokenval = $this->input->post('tokenval');
        $eventid  = $this->input->post('eventid');

        if($tokenval == '' || $eventid == '')
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
                    'event_id'       => $eventid,
                    'user_id'        => $DecodedDataArray->data->id,
                ];

                $result = $this->EventModel->gamefestcheck($data);

                if ($result == 1) 
                {
                    header('Content-Type: application/json');
		    echo json_encode(array(
			    'message' => 'Not Registered',
			    'status'  => 0
		    ));
		} 
                else 
                {
                    header('Content-Type: application/json');
		    echo json_encode(array(
			    'message' => 'You are already registered :-)',
			    'status'  =>  1
		    ));
                }

            }catch(Exception $e){
                header('Content-Type: application/json');
                echo json_encode(array('message' => 'Please Logout and re-login.'));
            }
            
        }
    }

}
