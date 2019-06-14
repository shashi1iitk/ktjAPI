<?php defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model
{    
    public function register($data)
    {
        $this->db->from('user')->where('email', $data['email'])->limit(1);
        $query = $this->db->get();
        
        if($query->num_rows() == 0)
        {
            $this->db->insert('user', $data);
            if($this->db->affected_rows() > 0)
            {
                return TRUE;
            }
        }
        else 
        {
            return FALSE;
        }
    }

    public function login($data)
    {
        $this->db->from('user')->where('email', $data['email'])->limit(1);
        // This gets the whole query 
        $query = $this->db->get();
        
        if($query->num_rows() == 1)         // email matched
        {
            // Use the result method to get the data
            $user = $query->result();
            $hashedpassword = $user[0]->password;
            // password_verify is used to verify the password
            if(password_verify($data['password'], $hashedpassword) == TRUE)     /// password matched
            {
                return array(
                    'login' => TRUE,
                    'userinfo' => $user[0]
                );
            }
            else    //password did not match
            {
                return array(
                    'login' => FALSE,
                    'userinfo' => ''
                );
            }
        }
        else      // email not found
        {
            return array(
                'login' => FALSE,
                'userinfo' => ''
            );
        }
    }

    public function getlastid()
    {
        $this->db->select('id')->from('user')->order_by('id', 'DESC')->limit(1);
        $query = $this->db->get();
        return $query->result()[0]->id;
    }

    public function getuserid($memberid)
    {
        if($memberid == null)
        {
            return 0;
        }
        $q = "SELECT * FROM user WHERE (member_id = '$memberid' OR email = '$memberid')";
        //$this->db->select('id')->from('user')->where('member_id', $memberid);
        $query = $this->db->query($q);
        // $query = $this->db->get();
        if($query->result())
        {
            return $query->result()[0]->id;
        } 
        else {
            return -1;
        }
    }

    public function getmemberid($userid)
    {
        if ($userid == null || $userid == 0 || $userid == -1) 
        {
            return '';
        }
        $this->db->select('email')->from('user')->where('id', $userid);
        $query = $this->db->get();
        return $query->result()[0]->email;
    }

    public function getname($userid)
    {
        if ($userid == null || $userid == 0) {
            return '';
        }
        $this->db->select('name')->from('user')->where('id', $userid);
        $query = $this->db->get();
        return $query->result()[0]->name;
    }

    public function getmemid($userid)
    {
        if ($userid == null || $userid == 0 || $userid == -1) {
            return '';
        }
        $this->db->select('member_id')->from('user')->where('id', $userid);
        $query = $this->db->get();
        return $query->result()[0]->member_id;
    }
}
