<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SponsModel extends CI_Model
{
    /* public function getSponsor($year)
    {   
        $this->db->from('sponsor')->where('year', $year);
        $query = $this->db->get();
        return $query->result();
    } */
    public function getCategory()
    {
		// $this->db->from('spons_category')->where('status','active');
		$this->db->from('spons_category');
        $query = $this->db->get();
        return $query->result();
    }
    public function getSponsorRefine($year)
    {
        $category = $this->getCategory();
        
        foreach ($category as $key=>$cat) {
			// $array = array('year' => $year, 'category_id' => $cat->category_id, 'status' => 'active');
			$array = array('year' => $year, 'category_id' => $cat->category_id);
			$spons[$cat->category_id] = $this->db->from('spons')->where($array)->get()->result();
        }
        // var_dump($spons[3]);
        return $spons;
    }
}
