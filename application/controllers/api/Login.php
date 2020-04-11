<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Login extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->helper('date');
         $this->load->model('Common_model');
        $this->load->helper('url');

    }


    public function index_post()
    {
        // $this->some_model->update_user( ... );
        $message = [

            'email' => $this->post('email'),
            'password' => $this->post('password'),
             'role' => $this->post('role'),
        ];
        $str = $this->Common_model->Login_check($message);

        if($str)

            {

                $str['message'] = 'User Found';
                $data=[
                    'user_id'=> $str[0]['logid'],
                    'ip' => $_SERVER['REMOTE_ADDR'],
                    'lastlog' => date('Y-m-d:h-m-s')
                ];
                 $this->Common_model->insert($data,'log');
                $this->set_response($str, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
            }
         else{
              $this->set_response("User Not Found", REST_Controller::HTTP_NO_CONTENT);
         }


    }
  public function mobile_post()
    {

        $message = [

            'mobile' => $this->post('mobile'),

        ];

        $str = $this->Common_model->Login_check_mobile($message);

        if($str==false)

            {
                $this->set_response("User Not Found", REST_Controller::HTTP_NO_CONTENT);

            }
         else{
              $str['message'] = 'User Found';
                $data=[
                    'id'=> $str[0]['logid'],
                    'ip' => $this->post('ip'),
                    'lastlog' => date('Y-m-d:h-m-s')
                ];

                 $this->Common_model->insert($data,'log');

                 $str['otp'] =$data['code'];
                $this->set_response($str, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
         }


    }


}
