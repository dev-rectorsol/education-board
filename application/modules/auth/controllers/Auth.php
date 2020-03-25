<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
    $this->load->library('session');
    }


    public function index(){
        
          $this->load->view('Login');
       
    }

    public function log(){

        $result= self::native_curl($_POST['username'], $_POST['password']);
        
        $data = array();
        if($_POST){
           // $query = $this->login_model->validate_user();
            //-- if valid
            if($result !='Not Found'){
              // echo "<pre>";
              // echo print_r($query);exit;
               $data = array();
               $i=1;
                foreach($result as $row){
                   
                   if($i>1){
                   break;
                   }
                   else{
                    $data = [
                        'id' => $row->logid,
                        'phone' => $row->phone ,
                        'email' => $row->email ,
                        'status' => $row->status,
                        'role' => $row->role,
                        'lang' =>$row->language,
                        
                    ];
                   }
                    
                    $i++;
                }
            //          echo "<pre>";
            //  echo print_r($data);exit;
                   
                  $this->session->set_userdata($data);
                   $url = 'admin/dashboard';
                 
                    
                
				 redirect(base_url() . $url, 'refresh');
            }else{
               redirect(base_url() . 'auth', 'refresh');
            }

        }else{
            redirect(base_url() . 'auth', 'refresh');
        }
    }


    function logout(){
        $this->session->sess_destroy();
        redirect(base_url() . 'auth', 'refresh');
    }


    function native_curl($email, $pass)
{
    $username = 'admin';
    $password = '1234';
     
    // Alternative JSON version
    // $url = 'http://twitter.com/statuses/update.json';
    // Set up and execute the curl process
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, 'http://localhost/education_board/kalka/api/Login');
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handle, CURLOPT_POST, 1);
    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
        'email'     => $email,
        'password'  => $pass,
        'role'      => 'a'
    ));
     
    // Optional, delete this line if your API is open
    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
     
    $buffer = curl_exec($curl_handle);
    curl_close($curl_handle);
     
    $result = json_decode($buffer);
    
    if(isset($result) && $result->message =='User Found')
    {
       
        return $result;
    }
     
    else
    {
        return 'Not Found';
    }
}
}
