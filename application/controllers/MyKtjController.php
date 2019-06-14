<?php defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class MyKtjController extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MyKtjModel');
        $this->load->model('UserModel');
    }
    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST');

        $tokenval = $this->input->post('tokenval');

        if ($tokenval == '') 
        {
            header('Content-Type: application/json');
            echo json_encode(array('message' => 'You are not Logged In !!'));
        } 
        else 
        {
            $secretKey = base64_decode('some_secret_key');

            $DecodedDataArray = JWT::decode($tokenval, $secretKey, array('HS512'));
            $data = [
                'user_id' => $DecodedDataArray->data->id,
            ];

            $profileresults = $this->MyKtjModel->getuserdetails($data['user_id']);
            $eventresults = $this->MyKtjModel->geteventsbyuserid($data['user_id']);
            $teamresults  = $this->MyKtjModel->getteamsbyuserid($data['user_id']);
            $workshopres  = $this->MyKtjModel->getworkshopsbyuserid($data['user_id']);
            $results = array(
				'Profile' => $profileresults, 
                'Events'     => $eventresults,
                'Teams'      => $teamresults,   
                'Workshops'  => $workshopres,
            );

            header('Content-Type: application/json');
            echo json_encode(array(
                'message'   => 'Successfully reached :-)',
                'userid'    => $data['user_id'],
                'userdata'  => $results,
            ));
        }
    }

    public function deregister()
    {
        /*
            Header checking and then storing input
        */
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST');

        $tokenval = $this->input->post('tokenval');
        $eventid  = $this->input->post('eventid');

        if ($tokenval == ''||$eventid == '') 
        {
            header('Content-Type: application/json');
            echo json_encode(array('message' => 'You are not Logged In !!'));
        } 
        else 
        {
            /*
                Decoding and verification of the token
            */
            $secretKey = base64_decode('some_secret_key');

            $DecodedDataArray = JWT::decode($tokenval, $secretKey, array('HS512'));
            $data = [
                'user_id' => $DecodedDataArray->data->id,
                'eventid' => $eventid,
            ];

            /*
                Deregistering the members and then 
                getting the team id based on userid and eventid
                returns '0' if not in team yet.
            */
            $result = $this->MyKtjModel->deregister($data['user_id'], $data['eventid']);
            $teamid = $this->MyKtjModel->getteambyusereventid($data['user_id'], $data['eventid']);
            if($result == TRUE && $teamid != '0')
            {
                header('Content-Type: application/json');
                echo json_encode(array(
                    'message' => 'Successfully deleted',
                    'userid' => $data['user_id'],
                    'teamid' => $teamid->teamid,
                ));
            }
            else {
                header('Content-Type: application/json');
                echo json_encode(array(
                    'message' => 'Successfully deleted',
                    'userid' => $data['user_id'],
                    'teamid' => 0
                ));
            }
        }
    }

    public function leaveteam()
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST');

        $tokenval = $this->input->post('tokenval');
        $teamid = $this->input->post('teamid');

        if ($tokenval == '' || $teamid == '') 
        {
            header('Content-Type: application/json');
            echo json_encode(array(
                'message' => 'You are not Logged In!!',
            ));
        } 
        else 
        {
            $secretKey = base64_decode('some_secret_key');

            $DecodedDataArray = JWT::decode($tokenval, $secretKey, array('HS512'));
            $data = [
                'user_id' => $DecodedDataArray->data->id,
                'teamid' => $teamid,
            ];

            $result = $this->MyKtjModel->leaveteam($data['user_id'], $data['teamid']);
            if ($result == true) {
                header('Content-Type: application/json');
                echo json_encode(array(
                    'message' => 'Successfully left the team.',
                    'userid' => $data['user_id'],
                ));
            }
        }   
	}

	public function leaveworkshop()
	{
        /*
            Header checking and then storing input
		 */
		header("Access-Control-Allow-Origin: *");
		header('Access-Control-Allow-Methods: GET, POST');

		$tokenval = $this->input->post('tokenval');
		$workshopid = $this->input->post('workshopid');

		if ($tokenval == '' || $workshopid == '') {
			header('Content-Type: application/json');
			echo json_encode(array('message' => 'You are not Logged In !!'));
		} else {
            /*
                Decoding and verification of the token
			 */
			$secretKey = base64_decode('some_secret_key');

			$DecodedDataArray = JWT::decode($tokenval, $secretKey, array('HS512'));
			$data = [
				'user_id' => $DecodedDataArray->data->id,
				'workshopid' => $workshopid,
			];

            /*
                Deregistering the members and then 
                getting the team id based on userid and workshopid
                returns '0' if not in team yet.
			 */
			$result = $this->MyKtjModel->leaveworkshop($data['user_id'], $data['workshopid']);
			if ($result == true) {
				header('Content-Type: application/json');
				echo json_encode(array(
					'message' => 'Successfully deleted',
					'userid' => $data['user_id'],
				));
			}
		}
	}
}
