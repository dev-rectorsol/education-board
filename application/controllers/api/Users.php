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
class Users extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->load->helper('date');
         $this->load->model('Common_model');
        $this->load->helper('url');

    }
// Get All Users Detail
    public function index_get()
    {
        // Users from a data store e.g. database

        $id = $this->get('id');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            $users = $this->Common_model->select_user();

            // Check if the users data store contains users (in case the database result returns NULL)
            if ($users)
            {
                foreach ($users as $key ){
                     $message[]=[
                   'UserId' =>$key['logid'],
                   'Phone' =>$key['phone'],
                   'Email' =>$key['email'],
                   'Password' =>$key['password'],
                   'Role' =>$key['role'],
                    'Status' =>$key['status'],
                    'JoinDate' =>$key['joindate'],
                    'Name' =>$key['name'],
                    'Details' =>$key['details'],
                    'Mobile' =>$key['mobile'],
               ];
                }

                $this->response($message, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if (!$id)
        {
            // Invalid id, set the response and exit.
            $this->response([
                    'status' => FALSE,
                    'message' => 'Invalid Parameter'
                ], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $user = $this->Common_model->select_user_option($id);



        if (!empty($user))
        {
            // print_r($user);exit;
            $message=[
                   'UserId' =>$user[0]['logid'],
                   'Phone' =>$user[0]['phone'],
                   'Email' =>$user[0]['email'],
                   'Password' =>$user[0]['password'],
                   'Role' =>$user[0]['role'],
                    'Status' =>$user[0]['status'],
                    'JoinDate' =>$user[0]['joindate'],
                    'Name' =>$user[0]['name'],

                     'Details' =>$user[0]['details'],
                    'Mobile' =>$user[0]['mobile'],
               ];
            $this->set_response($message, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
    //Insert new User Details
    public function index_post($id=0)
    {
        $message = [

            'name' => $this->post('name'),

            'mobile' => $this->post('mobile'),
            'details' => $this->post('details'),
            'user_id' => $this->post('id'),

        ];
        $str = $this->Common_model->insert($message,'user_details');

        if($str)

            {
                $this->set_response("Data Inserted", REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
            }
         else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'OOps Something went wrong'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

    }
//Delete new User Details
    public function Index_delete($id=0)
    {
        $id = (int) $this->delete('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response([
                    'status' => FALSE,
                    'message' => 'Invalid Parameter'
                ], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }else{
              $user = $this->Common_model->select_user_option($id);
             if ($user)
            {
            $data1=['user_id'=> $id];
        $str = $this->Common_model->delete($data1,'user_details');
        $data2=['logid'=> $id];
        $str = $this->Common_model->delete($data2,'logme');
        // $this->some_model->delete_something($id);


        $this->set_response([
            'id' => $id,
            'message' => 'Deleted the resource'
        ], REST_Controller::HTTP_OK);
        }else{
             $this->response([
                    'status' => FALSE,
                    'message' => 'Invalid User Id'
                ], REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        }
    }
    //Update new User Details
    public function index_put($id=0)
    {
         $data = [

            'name' => $this->put('name'),

            'mobile' => $this->put('mobile'),
            'details' => $this->put('details'),

        ];
        $id= $this->put('id');
        // Insert the new key
        $user = $this->Common_model->select_user_option($id);
             if ($user)
            {
        if ($this->Common_model->update($data,'user_id',$id,'user_details'))
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
                'message' => 'Could not save '
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }
        }
        else
        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid User Id'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }
    }
//Get User Address
    public function address_get($id=0)
    {

        $id= $this->get('id');

       if (!$id)
        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid Parameter'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code


        // Insert the new key

         }
         else
        {
             $address=  $this->Common_model->select_option($id,'user_id','address');
        if (!empty($address))
        {
            $this->response($address, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
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
    public function address_post($id=0)
    {
        $id= $this->post('id');


          if (!$id)
        {


            $this->response([
                'status' => FALSE,
                'message' => 'Invalid Id'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }


        else
        {
             $address=[
            'house'=> $this->put('house'),
            'post'=> $this->put('post'),
            'dist'=> $this->put('dist'),
            'state'=> $this->put('state'),
            'city'=> $this->put('city'),
            'country'=> $this->put('country'),
            'pincode'=> $this->put('pincode'),
             'user_id' => $id,

        ];
            if ($this->Common_model->insert($address,'address'))
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
    public function address_put($id=0)
    {
         $address=[
            'house'=> $this->put('house'),
            'post'=> $this->put('post'),
            'dist'=> $this->put('dist'),
            'state'=> $this->put('state'),
            'city'=> $this->put('city'),
            'country'=> $this->put('country'),
            'pincode'=> $this->put('pincode'),

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
            if ($this->Common_model->update($address,'user_id',$id,'address'))
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
    public function address_delete($id=0)
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        $data1=['user_id'=> $id];
        $str = $this->Common_model->delete($data1,'address');

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_OK); // NO_CONTENT (204) being the HTTP response code
    }
//Get User Aim
    public function aim_get($id=0)
    {

        $id= $this->get('id');

       if (!$id)
        {
            $this->response([
                'status' => FALSE,
                'message' => 'Invalid Parameter'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code


         }
         else
        {
             $aim=  $this->Common_model->select_option($id,'user_id','user_aim');
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
    public function aim_post($id=0)
    {
        $id= $this->post('id');


          if (!$id)
        {

            $this->response([
                'status' => FALSE,
                'message' => 'Invalid Id'
            ], REST_Controller::HTTP_INTERNAL_SERVER_ERROR); // INTERNAL_SERVER_ERROR (500) being the HTTP response code
        }
        else
        {
             $aim=[
            'aim_id' => $this->post('aim_id'),
             'user_id' => $id,

        ];
            if ($this->Common_model->insert($aim,'user_aim'))
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
    public function aim_put($id=0)
    {
         $address=[
            'aim_id' => $this->put('aim_id')

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
            if ($this->Common_model->update($address,'user_id',$id,'user_aim'))
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
    public function aim_delete($id=0)
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }
        $data1=['user_id'=> $id];
        $str = $this->Common_model->delete($data1,'user_aim');

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_OK); // NO_CONTENT (204) being the HTTP response code
    }
}
