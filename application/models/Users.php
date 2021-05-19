<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Model {
    
    function insert_into($tbl,$data)
    {
        if($this->db->insert($tbl,$data))
        {
            return TRUE;
        }
    }
    
    function get_user_where($where) 
    {
        if (!empty($where)) 
        {
            $this->db->where($where);
        }
        
        $query = $this->db->get('register')->row();
        return $query;
    }
    
    function Get_all_records($table)
    {
       $query = $this->db->get($table); 
       return $query->result();
    }
    
    function Get_all_where($tbl,$where)
    {
       $query = $this->db->get_where($tbl,$where);
       return $query->result();
    }
    
    function Get_single_record($tbl,$where)
    {
       $query = $this->db->get_where($tbl,$where);
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
    
    function get_all_records_orders($table, $where, $oderBy = '') 
    {
        $this->db->select('*');
        if (!empty($where)) 
        {
            $this->db->where($where);
        }
        if (!empty($oderBy)) 
        {
            $this->db->from($table);
            $this->db->order_by($oderBy, 'DESC');
            $query = $this->db->get();
            return $query->result();
        } else {
            $query = $this->db->get($table)->result();
            return $query;
        }
    }
    
}