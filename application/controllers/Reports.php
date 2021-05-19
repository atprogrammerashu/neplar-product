<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

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
    $this->load->view('reports/index',$data); 
  }
  
  
  
  
 
/*Main Class*/
}