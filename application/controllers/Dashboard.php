<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 public function __construct()
  {
    parent::__construct();
    
    if( ! $this->session->userdata('id') ) 
    return redirect('login');
    
  }
 
	public function index()
	{ 
		$this->load->model('Dashboard_model');
		$data['Assets']=$this->Dashboard_model->fetch_Assets();
		$data['user_info']=$this->Dashboard_model->user_detail();
		$data['show_group']=$this->Dashboard_model->show_groups();
		$data['show_portfolio']=$this->Dashboard_model->show_portfolio();
		$data['stock_name']=$this->Dashboard_model->type_stockname();
		$data['broker_name']=$this->Dashboard_model->type_broker();
	    $data['mutualfund_name']=$this->Dashboard_model->fetch_Mutualfund_name();
	    $data['mutual_scheme_name']=$this->Dashboard_model->mutual_scheme_name();
	    $data['nps_scheme_name']=$this->Dashboard_model->nps_scheme_name();
		 $this->load->view('Dashboard_view',$data);
       
	}

	

	 public function fetch_sub_asstes()
	{
	     if($this->input->post('assets_id'))
		  { 
		  	$this->load->model('Dashboard_model');
		    echo $this->Dashboard_model->sub_Assets($this->input->post('assets_id'));
		  }
	}



	public function fetch_portfolio()
	{
         $group_name= $this->input->post('group_name'); 
	    
		  	$this->load->model('Dashboard_model');
		    $this->Dashboard_model->fetch_portfolio($group_name);
		  
	}

	public function dashboard_search()
	{
		$myinput= $this->input->post('myinput');
		$this->load->model('Dashboard_model');
	   $this->Dashboard_model->Dashboard_search($myinput); 
	}


    public function fetch_maintable()
     {
         $this->load->model('Dashboard_model');
         echo $this->Dashboard_model->fetch_maintable(); 
     }

     	public function displayassets()
	{
		$this->load->model('Dashboard_model');
	   $this->Dashboard_model->displayassets(); 
	}



  public function logout()
    {
           $this->session->unset_userdata('id');
           return redirect('login');
    }

}

/* End of file Dashboard_controller.php */
/* Location: ./application/controllers/admin/Dashboard_controller.php */

