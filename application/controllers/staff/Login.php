<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_model','staffobj');
    }

	public function index()
	{
	    $loggedIn = $this->session->userdata('loggedIn');
        if(!empty($loggedIn))
        {
            redirect("staff-dashboard");
        }else{
           $this->load->view('staff/login'); 
        }
		
	}
	
	function login_auth()
	{
	   $staff_id = $this->input->post("staff_id");
	   $data = $this->staffobj->login_auth($staff_id);
	   if(!empty($data))
	   {
	      $session_data = array('id' =>$data->id,'role'=>$data->role,'name'=>$data->name,'key'=>$data->staff_id,'logged_in' => true); 
	      $this->session->set_userdata('loggedIn', $session_data);
	      echo "loginscs";
	   }else{
	     echo "NOTEXISTS";  
	   }
	   
	}
	
/*Main Class Ended*/
}
