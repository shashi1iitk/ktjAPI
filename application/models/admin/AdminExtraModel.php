<?php

class AdminExtraModel extends CI_Model
{
	public function getrelicusers()
	{
		$q = "SELECT id FROM relic ORDER BY id DESC";
		$query = $this->db->query($q);

		$result = $query->result()[0];
		return $result->id;
	}

	public function putusers($lastuser)
	{
		$q = "SELECT name, email, member_id as ktj_id from user where id > $lastuser";
		$query = $this->db->query($q);

		$result = $query->result();
		// var_dump($result);

		foreach ($result as $key => $user) {
			$data['name']=$user->name;
			$data['email']=$user->email;
			$data['ktj_id']=$user->ktj_id;
			$data['q_on'] = 1;
			$data['last_time']= time();
			$data['score'] = 0;
			$data['rank'] = 0;
			$this->db->insert('relic', $data);
		}
	}
	public function toppruser()
	{
		$q = "SELECT DISTINCT name, classs, school, city, mobile FROM toppr";
		$query = $this->db->query($q);		
		$result = $query->result();
		return $result;
	}
	
}
