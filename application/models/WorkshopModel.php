<?php

class WorkshopModel extends CI_Model
{
    public function getAll()
    {
        $q = "SELECT * FROM workshop";
        $query = $this->db->query($q);

        return $query->result();
    }
    public function register($data)
    {
        $this->db->from('workshop_user')->where('workshop_id', $data['workshop_id'])->where('user_id', $data['user_id'])->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() != 0) 
        {
            return 0;
        } 
        else 
        {
            $this->db->insert('workshop_user', $data);
            if ($this->db->affected_rows() > 0) 
            {
                return 1;
            } 
            else 
            {
                return 2;
            }
        }
    }

    public function getbyid($id)
    {
        $q = "SELECT * FROM workshop WHERE id=$id";
        $query = $this->db->query($q);

        return $query->result()[0];
    }

    public function getuserbyworkshopid($id)
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
            FROM user,workshop_user,colleges, cities, states 
            WHERE user.id = workshop_user.user_id 
            AND workshop_user.workshop_id = $id 
            AND user.college = colleges.id 
            AND user.city = cities.id 
            AND user.state = states.id 
        ";
        $query = $this->db->query($q);
        return $query->result(); 
    }
    public function update($data)
    {
		$this->db->where('id', $data['id']);
		$this->db->update('workshop', $data);
		return 1;
    }
}
