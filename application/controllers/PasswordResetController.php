<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PasswordResetController extends CI_Controller
{
	public $mail;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('PasswordResetModel');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('email');
    }

    public function index()
    {
        $this->load->view('passwordreset/password_reset');
        $this->load->view('templates/footer');
    }

    public function sendtoken()
    {
        // Email where the password reset link will be sent
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if($this->form_validation->run() == TRUE && $this->PasswordResetModel->checkmail($this->input->post('email')))
        {
            // Generate a unique random token of 50 length
            $token = bin2hex(random_bytes(25));
            
            // Sending mail to the email given
            $subject = 'Password Reset for your Kshitij account';
            //$message = 'Your secure token is '.$token;
            $message = 'Click the given link to reset your password. <a href="'.
                        site_url('validatetoken?email='.$this->input->post('email').'&token='.$token)
                        .'">Link</a>';

            $data = array(
                'email' => $this->input->post('email'),
                'token' => $token
            );

            $res = $this->PasswordResetModel->insert($data);

            if($res == TRUE)
            {
                $result = $this->email
                    ->from('raj.shekhar@ktj.in')
                    ->to($this->input->post('email'))
                    ->subject($subject)
                    ->message($message)
                    ->send();
                $data['message'] = 'A token has been sent to mail. Please check your mail.';
                $this->load->view('passwordreset/password_reset_token', $data);
                $this->load->view('templates/footer');
            }
            else 
            {
				$this->load->view('passwordreset/password_reset');
				$this->load->view('templates/footer');
            }
        }

    }

    public function checktoken()
    {
        $data = array(
            'email' => $this->input->get('email'),
            'token' => $this->input->get('token')
        );
        if($this->PasswordResetModel->check($data) == TRUE)
        {
			$data['mail'] = $this->input->get('email');
            $this->load->view('passwordreset/password_new', $data);
            $this->load->view('templates/footer');
        }
        else {
            echo 'Wrong token';
        }
    }

    public function newpassword()
    {
        $this->form_validation->set_rules('password',   'Password',     'trim|required|min_length[8]');
        $this->form_validation->set_rules('passconf',   'Pass Conf',    'trim|required|matches[password]');

        if($this->form_validation->run() == TRUE)
        {
            $data = array(
                'email'    => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );

            $result = $this->PasswordResetModel->passwordchange($data);
            
            if($result == TRUE)
            {
                $data['message'] = 'Password successfully changed';
				$this->load->view('passwordreset/password_reset_token', $data);
				$this->load->view('templates/footer');
            }
		}
		else {
			$this->load->view('passwordreset/password_new');
			$this->load->view('templates/footer');
		}
    }
}
