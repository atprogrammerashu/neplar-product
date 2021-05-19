<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff_model extends CI_Model {
    
    function insert_data_to($table,$data)
    {
       if($this->db->insert($table, $data))
       {
           return TRUE;
       }
    }
    
    function login_auth($staff_id)
    {
       $query = $this->db->query("SELECT * FROM `staffs` WHERE `staff_id` = '$staff_id'");
	   return $data = $query->row(); 
    }
    
    function fetch_all_records($table)
    {
       $this->db->select("*");
       $this->db->from($table);
       $query = $this->db->get();
       return $query->result();
    }
    
    function Count_records($table)
    {
       $this->db->select("*");
       $this->db->from($table);
       $query = $this->db->get();
       return $query->num_rows();
    }
    
    function Get_specific_coloums($tbl,$cols,$where)
    {
        $this->db->select($cols);
        $this->db->where($where);
        $query = $this->db->get($tbl);
        return $query->row();
    }
    
    function Get_last_record_date($table)
    {
        $this->db->select("cdate");
        $this->db->order_by("id","DESC");
        $query = $this->db->get($table);
        return $query->row(); 
    }
    
    
    function Update_where($table,$where,$data)
    {
        $this->db->where($where);
        if($this->db->update($table, $data))
        {
            return TRUE;
        }
    }
    
    function Delete_Records($table,$id)
    {
        if($this->db->delete($table, array('id' => $id)))
        {
            return TRUE;
        }
    }
    
    
/*Main Class*/    
}