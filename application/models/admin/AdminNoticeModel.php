<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminNoticeModel extends CI_Model
{
    public function getAll()
    {
        $q = "SELECT * FROM notices ORDER BY time DESC";
        $query = $this->db->query($q);
        return $query->result();
    }
    public function add($data)
    {
        $this->db->insert('notices', $data);
        if ($this->db->affected_rows() > 0) 
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    public function getbyid($id)
    {
        $q = "SELECT * FROM notices WHERE id = $id";
        $query = $this->db->query($q);
        return $query->result()[0];
    }

    public function update($data)
    {
		$this->db->where('id', $data['id']);
		$this->db->update('notices', $data);
		return 1;
    }
}
