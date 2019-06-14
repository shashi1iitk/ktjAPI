<?php defined('BASEPATH') or exit('No direct script access allowed');

class AdminLoginModel extends CI_Model
{
    public function login($data)
    {
        $this->db->from('admin')->where('email', $data['email'])->limit(1);
        // This gets the whole query 
        $query = $this->db->get();

        if ($query->num_rows() == 1)         // email matched
        {
            // Use the result method to get the data
            $admin = $query->result();
            $password = $admin[0]->password;
            // password_verify is used to verify the password
            if ($password == $data['password'])     /// password matched
            {
                return array(
                    'login' => true,
                    'userinfo' => $admin[0]
                );
            } else    //password did not match
            {
                return array(
                    'login' => false,
                    'userinfo' => ''
                );
            }
        } else      // email not found
        {
            return array(
                'login' => false,
                'userinfo' => ''
            );
        }
    }

}
