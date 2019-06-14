<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminUserManageModel extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAll()
    {
        $query = $this->db->query("SELECT `name`, `member_id`, `email`, `mobile`, `gender`, `college_name`, `state`, `department`, `college_id` FROM `user`, `colleges` WHERE user.college = colleges.id");
        return $query->result();
    }

    
}