<?php defined('BASEPATH') OR exit('No direct script access allowed');

class TeamController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TeamModel');
        $this->load->model('UserModel');
        $this->load->model('EventModel');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['events'] = $this->EventModel->getAll();
        $this->load->view('templates/header');
        $this->load->view('team_create', $data);
        $this->load->view('templates/footer');
    }

    public function register()
    {
        /*
            Checking/ Validation
        */   
        $this->form_validation->set_rules('captain',    'Captain',      'trim|required');
        $this->form_validation->set_rules('event',      'Event Name',   'trim|required');
        $this->form_validation->set_rules('member1',    'Member1',      'trim');
        $this->form_validation->set_rules('member2',    'Member2',      'trim');
        $this->form_validation->set_rules('member3',    'Member3',      'trim');
        $this->form_validation->set_rules('member4',    'Member4',      'trim');
        $this->form_validation->set_rules('member5',    'Member5',      'trim');


        /*
            Creating a teamid based on last team id
        */  
        $team_id = $this->TeamModel->getlastteamid();
        $team_id = strtoupper(str_pad(dechex($team_id + 1), 4, '0', STR_PAD_LEFT));
        $teamid = 'TM19' . $team_id;

        /*
            $arrayofmembers array collects userid of the members as per user table in database
            Returns -1 if not registered to the ktj database
        */  
        $arrayofmembers = array(
            $this->UserModel->getuserid($this->input->post('captain')),
            $this->UserModel->getuserid($this->input->post('member1')),
            $this->UserModel->getuserid($this->input->post('member2')),
            $this->UserModel->getuserid($this->input->post('member3')),
            $this->UserModel->getuserid($this->input->post('member4')),
            $this->UserModel->getuserid($this->input->post('member5')),
        );

        /*
            Checking if guy is registered in ktj database or not, if not send error.
        */  
        $check = 0;
        foreach ($arrayofmembers as $memb) 
        {
            if($memb == -1)
            {
                $data['events'] = $this->EventModel->getAll();
                $data['message'] = 'You have not registered for Kshitij 2019.';
                $this->load->view('templates/header');
                $this->load->view('team_create', $data);
                $this->load->view('templates/footer');
                $check = 1;
                break;
            }
        }

        if($check == 0)
        {
            /*
                For validation of the form
            */  
            if($this->form_validation->run() == FALSE)
            {
                $data['events'] = $this->EventModel->getAll();
                $this->load->view('templates/header');
                $this->load->view('team_create', $data);
                $this->load->view('templates/footer');
            }
            else 
            {
                /*
                    Check if members are already registered in event or not       
                */
                $notreg = $this->isregisterdinevent($arrayofmembers, $this->input->post('event'));
                /*
                    Checking if members are already in any other team of same event
                */
                $already = $this->alreadymember($arrayofmembers, $this->input->post('event'));

                /*
                    
                */
                if ($this->is_array_not_empty($notreg)) {
                    $notregreturn = array(
                        $this->UserModel->getmemberid($notreg[0]),
                        $this->UserModel->getmemberid($notreg[1]),
                        $this->UserModel->getmemberid($notreg[2]),
                        $this->UserModel->getmemberid($notreg[3]),
                        $this->UserModel->getmemberid($notreg[4]),
                        $this->UserModel->getmemberid($notreg[5])
                    );
                    $data['message'] = "
                        $notregreturn[0], $notregreturn[1], $notregreturn[2], $notregreturn[3], $notregreturn[4],$notregreturn[5] are not registered in this event !";

                    $data['events'] = $this->EventModel->getAll();
                    $this->load->view('templates/header');
                    $this->load->view('team_create', $data);
                    $this->load->view('templates/footer');
                }

                

                /*
                    In case they are in any other team send them error
                */  
                else if($this->is_array_not_empty($already))
                {
                    $alreadyreturn = array(
                        $this->UserModel->getmemberid($already[0]),
                        $this->UserModel->getmemberid($already[1]),
                        $this->UserModel->getmemberid($already[2]),
                        $this->UserModel->getmemberid($already[3]),
                        $this->UserModel->getmemberid($already[4]),
                        $this->UserModel->getmemberid($already[5])
                    );
                    $data['message'] = "
                        $alreadyreturn[0], $alreadyreturn[1], $alreadyreturn[2], $alreadyreturn[3], $alreadyreturn[4],$alreadyreturn[5] are already registered in other team!";

                    $data['events'] = $this->EventModel->getAll();
                    $this->load->view('templates/header');
                    $this->load->view('team_create', $data);
                    $this->load->view('templates/footer');
                }

                /*
                    Here they are successfully registered.
                */  
                else
                {
                    $data = array(
                        'captain'   => $arrayofmembers[0],
                        'teamid'    => $teamid,
                        'eventid'   => $this->input->post('event'),
                        'member1'   => $arrayofmembers[1],
                        'member2'   => $arrayofmembers[2],
                        'member3'   => $arrayofmembers[3],
                        'member4'   => $arrayofmembers[4],
                        'member5'   => $arrayofmembers[5],
                    );

                    $result = $this->TeamModel->register($data);

                    if ($result == TRUE) 
                    {
                        $data['message'] = 'Successfully Registered !!';
                        $this->load->view('templates/header');
                        $this->load->view('team_final', $data);
                        $this->load->view('templates/footer');
                    }
                    else 
                    {
                        $data['message'] = '';
                    }
                }
            }
        }
    }

    public function isregisterdinevent($arrayofmembers, $eventid)
    {
        $uid = [];
		if($eventid >= 32 && $eventid <= 36)
		{
			foreach ($arrayofmembers as $member) 
        	{
            	if ($this->EventModel->gamefestcontains($member, $eventid) == 0) 
            	{
                	array_push($uid, $member);
            	} else 
            	{
                	array_push($uid, null);
            	}
			}
		}
		else
		{
			foreach ($arrayofmembers as $member) 
        	{
            	if ($this->EventModel->contains($member, $eventid) == 0) 
            	{
                	array_push($uid, $member);
            	} else 
            	{
                	array_push($uid, null);
            	}
        	}
		}
        return $uid;
    }

    private function alreadymember($arrayofmembers, $eventid)
    {
        $uid = [];
        foreach ($arrayofmembers as $member) 
        {
            if($this->TeamModel->contains($member, $eventid) == 1)
            {
                array_push($uid, $member);
            }
            else {
                array_push($uid, null);
            }
        }
        return $uid;
    }

    private function is_array_not_empty($arr)
    {
        if (is_array($arr)) {
            foreach ($arr as $key => $value) {
                if (!empty($value) || $value != null || $value != "") {
                    return true;
                    break;//stop the process we have seen that at least 1 of the array has value so its not empty
                }
            }
            return false;
        }
    }
}
