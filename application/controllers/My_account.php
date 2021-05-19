<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_account extends CI_Controller {

	 public function __construct()
  {
    parent::__construct();
    $this->load->model('Users','objuser');
    if( ! $this->session->userdata('id') )
    return redirect('login');
    
  }
  
  function index()
  {
    $this->load->model('Dashboard_model');
	$data['user_info']=$this->Dashboard_model->user_detail();
	$data['show_group']=$this->Dashboard_model->show_groups();
	$data['show_portfolio']=$this->Dashboard_model->show_portfolio();  
    $user_id = $this->session->userdata('id'); 
    $where = array('id'=>$user_id);
    $data['states'] = $this->objuser->Get_all_records('states');
    $data['user_data'] = $this->objuser->get_user_where($where);
    $this->load->view('user-account',$data);
  }
  
  function get_city()
  {
      $where =array('state_id'=>$this->input->post('state_id'));
      $city = $this->objuser->Get_all_where('cities',$where);
      foreach($city as $row)
      {
          echo "<option value='".$row->city_name."'>".$row->city_name."</option>";
      }
  }
  
  function update_account_info()
  {
      $user_id = $this->session->userdata('id');
      $where = array("id"=>$user_id);
      $data = $this->input->post();
      if($this->objuser->Update_where('register',$where,$data))
      {
         $res['responseData'] = "updated successfully";
         echo json_encode($res);  
      }
      
  }
  
  
/*Main Class Ended*/  
}