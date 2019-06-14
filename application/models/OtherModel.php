<?php

class OtherModel extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('toppr', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getlastid()
    {
        $this->db->select('id')->from('toppr')->order_by('id', 'DESC')->limit(1);
        $query = $this->db->get();
        return $query->result()[0]->id;
    }
}
