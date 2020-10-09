<?php

defined('BASEPATH') or exit('No direct script access allowed');

class  Common_model  extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get client object based on passed clientid if not passed clientid return array of all clients
     * @param  mixed $id    client id
     * @param  array  $where
     * @return mixed
     */
    
    function updatedata($table,$data,$where){
        $uptdata=$this->db->update($table, $data , $where); 
        return $uptdata; 
    }

    function selectrow($table,$condition = [] ,$selectField = '*',$orderby = []){
        $this->db->select($selectField);
        $this->db->from($table);
        if(isset($condition) && !empty($condition)){
            $this->db->where($condition);
        }
        if(isset($orderby) && !empty($orderby)){
             $this->db->order_by($orderby[0],$orderby[1]);
        }
        $query = $this->db->get();

        if($query !== false)
        {
        return  $query->row();
        }
        else
        {
        return false;
        }
    }

    function select($table,$condition = [] ,$selectField = '*',$condition2 = [],$whereIn=[],$orderby=[]){
        $this->db->select($selectField);
        $this->db->from($table);
        if(isset($condition) && !empty($condition)){
            $this->db->where($condition);
        }
        if(isset($condition2) && !empty($condition2)){
            $this->db->where($condition2);
        }
        if(isset($whereIn) && !empty($whereIn)){
            $this->db->where_in($whereIn);
        }

        if(isset($orderby) && !empty($orderby)){
            $this->db->order_by($orderby[0],$orderby[1]);
        }

        $query = $this->db->get();
        //if($query->num_rows()>=1) {
        return  $query->result();
       // }
        //else{
        //return false;
        //}
    }

    function insert($table,$data){
        $insdata=$this->db->insert($table, $data);
        if($insdata){
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }
    }

    
   function delete_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
		return true;

    } //delete_data closed
	

}
