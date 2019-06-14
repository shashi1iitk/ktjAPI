<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEventDetailModel extends CI_Model
{
    public function getAll()
    {
        $q = "SELECT events.id, events.name, event_detail.about, event_detail.rules, event_detail.ps, event_detail.contact FROM events, event_detail WHERE events.id = event_detail.event_id";
        $query = $this->db->query($q);
        return $query->result();
    }

    public function getbyid($id)
    {
        $q = "SELECT events.id, events.name, event_detail.about, event_detail.rules, event_detail.ps, event_detail.contact FROM events, event_detail WHERE events.id = event_detail.event_id AND event_detail.event_id = $id";
        $query = $this->db->query($q);
        return $query->result()[0]; 
    }

    public function update($data)
    {
		$this->db->where('id', $data['id']);
		$this->db->update('event_detail', $data);
        return 1;
    }
}
