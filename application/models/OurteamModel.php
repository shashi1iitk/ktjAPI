<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OurteamModel extends CI_Model
{
    public function getbytype($type)
    {
        if($type != 'all' ){
            $q = "SELECT * FROM team WHERE type = '$type'";
            $query = $this->db->query($q);
            return $query->result();
        }
        else {
            $q = "SELECT * FROM team";
            $query = $this->db->query($q);
            return $query->result();
        }
    }
    
}
