<?php
/**
 * Created by PhpStorm.
 * User: Imaxinacion
 * Date: 5/18/2018
 * Time: 8:30 AM
 */

class AdminModel extends CI_Model {

    function __construct() {
        $this->category = 'category';
        $this->test_scores = 'test_scores';
        $this->exam_scores = 'exam_scores';
        $this->users = 'users';
    }

    function getUserRows($params = array()){
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

    function fetchUserData() {
        $query = $this->db->get($this->test_scores);

        return $query;
    }

    function fetchTestScore($columnName) {
        $query = $this->db->get($columnName);

        return $query;
    }

    public function insertAdminUser($data = array()) {
        //add created and modified data if not included
        if(!array_key_exists("accessLevel", $data)){
            $data['accessLevel'] = 2;
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

    public function updateAdminUser($id, $data = array()) {
        if(!array_key_exists("modified", $data)){
            $data['updatedAt'] = date("Y-m-d H:i:s");
        }

        $this->db->where('id', $id);
        $this->db->update($this->users, $data);
    }

    function deleteAdminUser($id, $columnName, $table_name) {
        $this->db->where($columnName, $id);
        $this->db->delete($table_name);
    }

    function getProductRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->products);

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

    function fetchProductData() {
        $query = $this->db->get($this->products);

        return $query;
    }

    public function insertProduct($data = array()) {

        if(!array_key_exists("created", $data)){
            $data['createdAt'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("updated", $data)){
            $data['updatedAt'] = date("Y-m-d H:i:s");
        }

        print_r($this->test_scores);
        //insert user data to users table
        echo '27';
        $insert = $this->db->insert($this->test_scores, $data);
        echo '28';
        //return the status
        if($insert){
            return $this->db->insert_id();
        }else{

            return false;
        }
    }

    public function insertExam($data = array()) {

        if(!array_key_exists("created", $data)){
            $data['createdAt'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("updated", $data)){
            $data['updatedAt'] = date("Y-m-d H:i:s");
        }

        print_r($this->test_scores);
        //insert user data to users table
        echo '27';
        $insert = $this->db->insert($this->exam_scores, $data);
        echo '28';
        //return the status
        if($insert){
            return $this->db->insert_id();
        }else{

            return false;
        }
    }

    public function updateProduct($id, $data) {

        $this->db->where('id', $id);
        $this->db->update($this->products, $data);
    }

    function selectAll($table) {
        $query = $this->db->get($table);

        return $query;
    }

    function getCategoryRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->category);

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

    function fetchCategoryData() {
        $query = $this->db->get($this->category);

        return $query;
    }

    public function insertCategory($data = array()) {

        print_r($this->category);
        //insert user data to users table
        $insert = $this->db->insert($this->category, $data);

        //return the status
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    function getScoreRows($id, $tableName){
            $this->db->select('*');
            $query = $this->db->get_where($tableName, array('id' => $id));

            return $query;
    }

    function updateCategory($id, $data){
        $this->db->where('id', $id);
        $this->db->update('category', $data);
    }

    public function updateData($id, $columnName, $data) {

        $this->db->where('id', $id);
        $this->db->update($columnName, $data);
    }

    function deleteData($id, $columnName, $table_name) {
        $this->db->where($columnName, $id);
        $this->db->delete($table_name);
    }

}