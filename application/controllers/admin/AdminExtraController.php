<?php

class AdminExtraController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/AdminExtraModel');
	}

	public function relicadd()
	{
		$relicusers = $this->AdminExtraModel->getrelicusers();

		echo $relicusers;

		$res = $this->AdminExtraModel->putusers($relicusers);
		
	}
	public function toppr()
	{
		
	
		if (!isset($this->session->userdata['logged_in'])) 
		{
            echo "You are not logged in!";
        } 
		else 
		{
			$data['students'] = $this->AdminExtraModel->toppruser();
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidenav');
            $this->load->view('admin/toppr', $data);
            $this->load->view('admin/templates/footer');
		}
	}
}
