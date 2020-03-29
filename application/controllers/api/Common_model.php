<?php
class Common_model extends CI_Model {
public function __construct()
        {
                $this->load->database();
        }
    //-- insert function
	public function insert($data,$table){
        $this->db->insert($table,$data);
        return $this->db->insert_id();
    }

    public function Login_check($data){
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'AND role='".$data['role']."'" ;
            $this->db->select('*');
            $this->db->from('logme');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
            return $query->result_array();
            } else {
            return false;
            }
        }
    public function Login_check_mobile($data){
        $condition = "phone =" . "'" . $data['mobile']."'AND role='s'" ;
            $this->db->select('*');
            $this->db->from('logme');
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();
           
            if ($query->num_rows() == 1) {
            return $query->result_array();
            } else {
            return false;
            }
        }
        public function get_otp($data){
      
            $this->db->select('*');
            $this->db->from('message');
            $this->db->where('key',$data['mobile']);
            $this->db->limit(1);
            $query = $this->db->get();
          
            if ($query->num_rows() == 1) {
            return $query->result_array();
            } else {
            return false;
            }
        }
public function check_otp($data){
      
            $this->db->select('*');
            $this->db->from('message');
            $this->db->where('key',$data['mobile']);
            $this->db->where('code',$data['code']);
            $this->db->limit(1);
            $query = $this->db->get();
          // echo $this->db->last_query();exit;
            if ($query->num_rows() == 1) {
            return true;
            } 
        }
    //-- edit function
    function edit_option($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    }

    //-- update function
    function update($action,$field, $id, $table){
        $this->db->where($field,$id);
        $this->db->update($table,$action);
         
        return true;
    }

    //-- delete function
    function delete($data,$table){

        $this->db->delete($table, $data);
        return;
    }
    
    function select_value($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where(array('id' => $id));
        $query = $this->db->get();
        //echo $this->db->last_query();exit;
        $query = $query->result_array();
        return $query;
    }

    //-- user role delete function
      function delete_user_role($id,$table){
        $this->db->delete($table, array('user_id' => $id));
        return;
    }
  function select_user(){
        $this->db->select();
        $this->db->from('logme l');
        $this->db->order_by('logid','ASC');
        $this->db->join('user_details u','l.logid = u.user_id','INNER');
       
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
function select_user_option($id){
        $this->db->select();
        $this->db->from('logme l');
        $this->db->order_by('logid','ASC');
        $this->db->join('user_details u','l.logid = u.user_id','INNER');
        
        $this->db->where('logid', $id);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
    //-- select function
    function select($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }
function getMaxUserId(){
        $this->db->select('max(logid) as id');
        $this->db->from('logme');
        
        $query = $this->db->get();
        return $query->row('id');
       
    }
    //-- select by id
    function select_option($id,$field,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where($field, $id);
        $query = $this->db->get();
        $query = $query->result_array();
        return $query;
    }

   
   
    

    
   


}
