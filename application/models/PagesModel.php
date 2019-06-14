<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PagesModel extends CI_Model 
{
    public function getnotices()
    {
        $q = "SELECT * FROM notices ORDER BY time DESC";
        $query = $this->db->query($q);
        return $query->result();
    }
}
