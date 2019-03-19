<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model{

  // private $users;
    function __construct() {
        $this->users = 'users';
    }
    /*
     * get rows from the users table
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->users);

        //fetch data by conditions
        if(array_key_exists("conditions",$params)){
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key,$value);
            }
        }

        if(array_key_exists("id",$params)){
            $this->db->where('id',$params['id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            $query = $this->db->get();
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $query->num_rows();
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
            }else{
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }

    /*
     * Insert user information
     */
    public function insert($data = array()) {
        //add created and modified data if not included
        if(!array_key_exists("accessLevel", $data)){
            $data['accessLevel'] = 1;
        }
        if(!array_key_exists("created", $data)){
            $data['createdAt'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['updatedAt'] = date("Y-m-d H:i:s");
        }
        print_r($this->users);
        //insert user data to users table
        $insert = $this->db->insert($this->users, $data);

        //return the status
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    function fetch_data() {
        $query = $this->db->get($this->users);

        return $query;
    }

    public function fetchByEmail($table_email, $table_name) {
        $this->db->where('email', $table_email);
        $currentData = $this->db->get($table_name);

        return $currentData;
    }

}
