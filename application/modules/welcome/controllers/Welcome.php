<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
        {
                parent::__construct();
							$this->load->model('Common_model');

        }
				public function index(){
					$this->Common_model->exyte();
				}
				// public function message($code,$mob)
				// {
				//
				// 				$text="Welcome to Kalka IAS, your Otp is ".$code."";
				//
				// 				$mobile_number=$mob;
				//
				// 				//Don't change below code use as it is
				// 				$url="http://bhashsms.com/api/sendmsg.php?user=FastHelps&pass=Fast123&sender=FSTHLP&phone=".$mobile_number."&text=".$text."&priority=ndnd&stype=normal";
				// 				$ch = curl_init();
				// 				curl_setopt($ch, CURLOPT_URL, $url);
				// 				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				//
				//
				// 				$result = curl_exec($ch);
				// 				 if(!$result){die("Connection Failure");}
				// 				curl_close($ch);
				//
				// }

				function callAPI($method, $url, $data){
			   $curl = curl_init();
			   switch ($method){
			      case "POST":
			         curl_setopt($curl, CURLOPT_POST, 1);
			         if ($data)
			            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			         break;
			      case "PUT":
			         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			         if ($data)
			            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			         break;
			      default:
			         if ($data)
			            $url = sprintf("%s?%s", $url, http_build_query($data));
			   }
			   // OPTIONS:
			   curl_setopt($curl, CURLOPT_URL, $url);
			   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
			      'APIKEY: 111111111111111111111',
			      'Content-Type: application/json',
			   ));
			   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			   // EXECUTE:
			   $result = curl_exec($curl);
			   if(!$result){die("Connection Failure");}
			   curl_close($curl);
			   return $result;
			}
				public function sms($code,$mob){
					$text=$code;
					$mobile_number=$mob;
					$url = "http://bhashsms.com/api/sendmsg.php?user=FastHelps&pass=Fast123&sender=FSTHLP&phone=".$mobile_number."&text=".$text."&priority=ndnd&stype=normal";
					$payload = file_get_contents($url);
					echo $payload;
				}
				public function message($code,$mob)
				{

								$text="Welcome to Kalka IAS, your Otp is ".$code."";
								$mobile_number=$mob;
								$url1 = "144.76.182.197";
								$url = "http://bhashsms.com/api/sendmsg.php?user=FastHelps&pass=Fast123&sender=FSTHLP&phone=".$mobile_number."&text=".$text."&priority=ndnd&stype=normal";
								echo $url;exit;
								$curl = curl_init();
								curl_setopt_array($curl, array(
							  CURLOPT_URL => $url,
							  CURLOPT_PROXY => $url1,
							  CURLOPT_RETURNTRANSFER => true,
							  CURLOPT_ENCODING => "",
							  CURLOPT_MAXREDIRS => 10,
							  CURLOPT_TIMEOUT => 0,
							  CURLOPT_FOLLOWLOCATION => true,
							  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							  CURLOPT_CUSTOMREQUEST => "GET",
							));

								$response = curl_exec($curl);
								if(curl_error($curl)){
									echo "Error: " . curl_error($curl);
								}
								curl_close($curl);
								echo $response;

				}


}
