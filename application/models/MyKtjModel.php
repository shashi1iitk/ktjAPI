<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MyKtjModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function getuserdetails($userid)
    {
        $q = "SELECT 
            user.name as Name ,
            user.email as Email, 
            user.mobile as Mobile, 
            member_id as KTJ_Id, 
            colleges.college_name as College,
            cities.name as City, 
            states.name as State 
            FROM user,colleges, cities, states 
            WHERE user.id = $userid
            AND user.college = colleges.id 
            AND user.city = cities.id 
            AND user.state = states.id
        ";

        $query = $this->db->query($q);
        return $query->result()[0];
    }

    public function geteventsbyuserid($userid)
    {
        $q = "SELECT events.id as eventid,genre.name as genre, events.name as event FROM events,event_user,genre
        WHERE event_user.user_id = $userid AND events.id = event_user.event_id AND events.genre = genre.id";
        $query = $this->db->query($q);
        return $query->result();
    }

    public function getworkshopsbyuserid($userid)
    {
        $q = "SELECT workshop.id as workshopid, workshop.name as workshop FROM workshop,workshop_user WHERE workshop_user.user_id = $userid AND workshop.id = workshop_user.workshop_id";

        $query = $this->db->query($q);
        return $query->result();
    }

    public function getteamsbyuserid($userid)
    {
        // $q = "SELECT teamid,events.name as event FROM event_team,events WHERE (captain = $userid or member1 = $userid or member2 = $userid or member3 = $userid or member4 = $userid or member5 = $userid) AND event_team.eventid = events.id";
        // $query = $this->db->query($q);
        //return $query->result();

        $q = "SELECT captain, member1, member2, member3, member4, member5, teamid,events.name as event 
                FROM event_team,events
                WHERE (captain = $userid or member1 = $userid or member2 = $userid or member3 = $userid or member4 = $userid or member5 = $userid) 
                AND event_team.eventid = events.id";
        $query = $this->db->query($q);
        $res = [];
        foreach ($query->result_array() as $key => $value) 
        {
            $members = array(
                 $this->UserModel->getname($value['captain']),
                 $this->UserModel->getname($value['member1']),
                 $this->UserModel->getname($value['member2']),
                 $this->UserModel->getname($value['member3']),
                 $this->UserModel->getname($value['member4']),
                 $this->UserModel->getname($value['member5']),
            );

            $val = array(
                'teamid' => $value['teamid'],
                'event'  => $value['event'],
                'members'=> $members
            );
            array_push($res, $val);
        }
        return $res;
    }

    public function deregister($userid, $eventid)
    {
        $q = "DELETE FROM event_user WHERE event_user.user_id = $userid AND event_user.event_id = $eventid";
        $query = $this->db->query($q);
        return $query;
    }

    public function getteambyusereventid($userid, $eventid)
    {
        $q = "SELECT teamid FROM event_team WHERE (captain = $userid or member1 = $userid or member2 = $userid or member3 = $userid or member4 = $userid or member5 = $userid) AND event_team.eventid = $eventid";
        $query = $this->db->query($q);
        if($query->num_rows() == 0)
        {
            return 0;
        }
        else{        
            return $query->result()[0];
        }
    }

    public function leaveteam($userid, $teamid)
    {
        $coltobedel = '';
        $q = "SELECT * FROM `event_team` WHERE teamid = '$teamid'";
        $query = $this->db->query($q);
        $teamdata = $query->result_array()[0];
        // var_dump($query->result_array()[0]);
        for($i = 1; $i <=5; $i++)
        {
            if($teamdata['member'.$i] == $userid)
            {
                $coltobedel = 'member'.$i;
            }
        }
        if($coltobedel == '')
        {
            if ($teamdata['captain'] == $userid) 
            {
                $coltobedel = 'captain';
            } else 
            {
                $coltobedel = '';
            }
        }
        if($coltobedel != '')
        {
            $q = "UPDATE event_team SET $coltobedel = 0 WHERE $coltobedel = $userid AND teamid = '$teamid'";
            $query = $this->db->query($q);
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
        die();
	}
	
	public function leaveworkshop($userid, $workshopid)
	{
		$q = "DELETE FROM workshop_user WHERE workshop_user.user_id = $userid AND workshop_user.workshop_id = $workshopid";
		$query = $this->db->query($q);
		return $query;
	}

}
