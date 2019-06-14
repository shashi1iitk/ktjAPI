<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEventModel extends CI_Model
{
    public function getAllEvents()
    {
       $q = "SELECT events.id as id, events.name as name, genre.name as genre, team_size FROM events, genre WHERE events.genre = genre.id AND events.name NOT IN ('CS:GO', 'PUBG', 'FIFA19', 'DOTA 2', 'NFS Payback')";
       //$q = "SELECT events.id as id, events.name as name, genre.name as genre, team_size FROM events, genre WHERE events.genre = genre.id";
       $query = $this->db->query($q);
       return $query->result(); 
	}
	public function getAll()
	{
		
       $q = "SELECT events.id as id, events.name as name, genre.name as genre, team_size FROM events, genre WHERE events.genre = genre.id";
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
            colleges.college_name as college,
            cities.name as city, 
            states.name as state 
            FROM user,event_user,colleges, cities, states 
            WHERE user.id = event_user.user_id 
            AND event_user.event_id = $id 
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
