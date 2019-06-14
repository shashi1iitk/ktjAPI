<?php defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class LoginController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel'); 
    }
    
    public function index()
    {
        
    }
    public function login()
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Methods: GET, POST');
        $data = array(
            'email'     =>   $this->input->post('email'),
            'password'  =>   $this->input->post('password')
        );

        $result = $this->UserModel->login($data);

        if ($result['login'] == true) {
            $tokenId = base64_encode(random_bytes(22));
            $issuedAt = time();
            $notBefore = $issuedAt + 0;                        //Adding 10 seconds
            $expire = $notBefore + 5184000;                        // Adding 2 months
            $serverName = base_url();                           // set your domain name 			
            /*
             * Create the token as an array
             */
            $data = [
                'iat' => $issuedAt,         // Issued at: time when the token was generated
                'jti' => $tokenId,          // Json Token Id: an unique identifier for the token
                'iss' => $serverName,       // Issuer
                'nbf' => $notBefore,        // Not before
                'exp' => $expire,           // Expire
                'data' => [                  // Data related to the logged user you can set your required data
                    'id' => $result['userinfo']->id,           // id from the users table
                    'name' => $result['userinfo']->name,     //  name
                ]
            ];
            $secretKey = base64_decode('some_secret_key');
                  /// Here we will transform this array into JWT:
            $jwt = JWT::encode(
                $data,                                   //Data to be encoded in the JWT
                $secretKey,                             // The signing key
                'HS512'                                 // Algorithm
            );
            $unencodedArray = ['jwt' => $jwt];
            $response = [
                'status' => 'success',
                'resp' => $unencodedArray,
                'name' => $result['userinfo']->name
            ];
            
            header('Content-Type: application/json');
            echo json_encode($response);

        } else {
            header('Content-Type: application/json');
            echo json_encode(array(
                'status' => 'Wrong Details',
            ));
        }
    }
}
