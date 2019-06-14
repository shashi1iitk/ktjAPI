<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PasswordResetModel extends CI_Model
{
	public function checkmail($email)
	{
		$this->db->from('user')->where('email', $email);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
    public function insert($data)
    {
        $this->db->insert('password_reset', $data);
        if ($this->db->affected_rows() > 0) 
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }

    public function check($data)
    {
        $this->db->from('password_reset')->where('email', $data['email'])->where('token', $data['token'])->limit(1);
        $query = $this->db->get();

        if($query->num_rows() == 1)
        {
			$email = $data['email'];
			$token = $data['token'];
			$q = "DELETE FROM password_reset WHERE email='$email' AND token='$token'";
			$query = $this->db->query($q);
            return TRUE;
        }
        else 
        {
            return FALSE;   
        }
    }

    public function passwordchange($data)
    {
        $this->db->where('email', $data['email'])->update('user', $data);
        if ($this->db->affected_rows() > 0) 
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }
}
