<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Authentication extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Common_model');
        $this->load->library(['auth', 'session']);
        $this->load->library('form_validation');
    }


    public function index() {
      // echo print_r($this->session->userdata());exit;
      if(check()){
        redirect(base_url(), 'refresh');
      }
      if($_POST){
        $temp = $this->auth->login($_POST);
        if($temp['status']){
          redirect(base_url(), 'refresh');
        }else{
          $this->session->set_flashdata($temp);
          $this->load->view('Login');
        }
      }else {
        $this->load->view('Login');
      }
    }

    public function resetView() {
      $this->load->view('resetPass');
    }
    public function resetPass() {
      $pass = self::randomPassword();
      $data =  array('email' => $_POST['email']);
      $data = $this->
      self::send_email($data['email'],  $pass);

    }
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url() . 'authentication', 'refresh');
    }
     public function send_email($email = '', $password = '') {
         $data=array();
        $data['email']=$email;

        $data['password']=$password;
        //  echo print_r($data['value']);
        //  echo print_r($email);exit;
        //   $email = $email;
           $subject = 'Password Reset!!';

          $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'info@rectorsol.com', // change it to yours
            'smtp_pass' => 'shash#13', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
            );
          $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('info@rectorsol.com'); // change it to yours
          $this->email->to($email);// change it to yours
          $this->email->subject($subject);
          $this->email->set_mailtype('html');
         // $msg=$this->load->view('join/email');
          $this->email->message($this->load->view('email',$data,TRUE));
          $this->email->send();
    }
    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
