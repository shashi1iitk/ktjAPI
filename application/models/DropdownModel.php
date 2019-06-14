<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DropdownModel extends CI_Model
{
    public function getcities()
    {
        $this->db->from('cities')->where('state_id < 42');
        $query = $this->db->get();

        return $query->result();
    }
    public function getcolleges()
    {
        $this->db->from('colleges');
        $query = $this->db->get();

        return $query->result();
    }
    public function getstates()
    {
        $this->db->from('states');
        $query = $this->db->get();

        return $query->result();
    }
}
