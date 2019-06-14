<?php

class AdminGFModel extends CI_Model
{
	
    public function getAll()
    {
		$q = "SELECT events.id as id, name, team_size FROM `events` WHERE name IN ('CS:GO', 'PUBG', 'FIFA19', 'DOTA 2')";
		$query = $this->db->query($q);
       	return $query->result(); 
    }

    public function getbyeventid($id)
    {
        $q = "SELECT 
            user.name as name ,
            user.email, 
            user.mobile, 
            user.gender, 
            member_id, 
			transaction_id,
			steam_id,
			player_id,
            colleges.college_name as college,
            cities.name as city, 
            states.name as state 
            FROM user,event_user_gamefest, colleges, cities, states 
            WHERE user.id = event_user_gamefest.user_id 
            AND event_user_gamefest.event_id = $id 
            AND user.college = colleges.id 
            AND user.city = cities.id 
            AND user.state = states.id 
        ";
        $query = $this->db->query($q);
        return $query->result(); 
    }
    public function eventnamebyid($id)
    {
        $q = "SELECT * FROM events WHERE events.id = $id";
        $query = $this->db->query($q);
        return $query->result()[0]->name; 
    }
}
