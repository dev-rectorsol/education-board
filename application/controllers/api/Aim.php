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
class Aim extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->helper('date');
        $this->load->model('Common_model');
        $this->load->helper('url');

    }

 public function index_get($id=NULL)
    {
        $id= $this->get('id');
      if ($id === NULL)
        {

           $aim=  $this->Common_model->select('aim');
           if (!empty($aim))
            {
                $this->response($aim, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
            }
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'No data found'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }
         }
         else
        {
             $aim=  $this->Common_model->select_option($id,'id','aim');
        if (!empty($aim))
        {
            $this->response($aim, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'Address not found'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }
        }
    }
    //Insert User Address
    public function index_post()
    {
        $title= $this->post('title');


          if (!$title)
        {

            $this->response([
                'status' => FALSE,
                'message' => 'Invalid parameter'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }
        else
        {
             $aim=[
            'title' => $title,

        ];
            if ($this->Common_model->insert($aim,'aim'))
        {
            $this->response([
                'status' => TRUE,
                'message' => "Data Inserted Successfully"
            ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'Could not save'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }
     }
        // Insert the new key

    }
//Update User Address
    public function index_put($id=0)
    {
         $address=[
            'title' => $this->put('title')

        ];
         $id= $this->put('id');
          if (!$id)
        {

            $this->response([
                'status' => FALSE,
                'message' => 'Invalid Id'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }
        else
        {
            if ($this->Common_model->update($address,'id',$id,'aim'))
        {
            $this->response([
                'status' => TRUE,
                'message' => "Updated"
            ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        }
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'Could not save'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }
        }
        // Insert the new key

    }
    //Delete User Address
    public function index_delete($id=0)
    {
        $id = (int) $this->delete('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response([
            'status' => false,
            'message' => 'Invalid Parameter'
        ], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        $data1=['id'=> $id];
       $this->Common_model->delete($data1,'aim');

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_OK);
    }




}
