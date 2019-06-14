<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OtherController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OtherModel');
    }

    public function toppr()
    {
        $this->load->view('toppr/index');
    }

    public function topprsignup()
    {
        $this->form_validation->set_rules('name',       'Name',     'trim|required');
        $this->form_validation->set_rules('mobile',     'Mobile',   'trim|required|is_natural');
        $this->form_validation->set_rules('school',     'School',   'trim|required');
        $this->form_validation->set_rules('classs',     'Class',    'trim|required');
        $this->form_validation->set_rules('city',       'City',     'trim|required');

        //Temporary
        $member_id = $this->OtherModel->getlastid();
        $member_id = strtoupper(str_pad(dechex($member_id + 1), 4, '0', STR_PAD_LEFT));
        $memid = '19TPR' . $member_id;

        if ($this->form_validation->run() == false) 
        {
            $this->load->view('toppr/index');
        } else 
        {
            $data = array(
                'name' => $this->input->post('name'),
                'mobile' => $this->input->post('mobile'),
                'school' => $this->input->post('school'),
                'classs' => $this->input->post('classs'),
                'city' => $this->input->post('city'),
                'member_id' => $memid
            );
            //$data = html_escape($data);

            $result = $this->OtherModel->register($data);

            if ($result == true) {
                $this->load->view('toppr/success', $data);
            } 
            else 
            {
                $this->load->view('toppr/index');
            }
        }
    }
    
}
