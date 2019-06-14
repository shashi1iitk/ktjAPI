<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCollegeModel extends CI_Model
{
    public function add($collegename)
    {
        $this->db->insert('colleges',$collegename);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
}
