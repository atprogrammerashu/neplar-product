<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {


public function __construct()
  { 
    parent::__construct();
    if( ! $this->session->userdata('id') )
    return redirect('login');
   
  }
	public function index()
	{ $data['assets_name'] = $this->input->get('var');
      $data['port_name'] = $this->input->get('var2');
       $this->load->model('Dashboard_model');
       	$data['show_group']=$this->Dashboard_model->show_groups();
		$data['show_portfolio']=$this->Dashboard_model->show_portfolio();
		$data['user_info']=$this->Dashboard_model->user_detail();
     $this->session->set_flashdata("subassets", $this->input->get('var')); 
    $this->session->set_flashdata("port_name", $this->input->get('var2'));

        $this->load->view('Portfolio',$data);

	}
	public function displayportfolio()
	{
		$this->load->model('portfolios');
		$this->portfolios->displayportfolio();
	}

  	public function userportfolio()
	{
	     $subassets = $this->session->flashdata('subassets');
         $port_name = $this->session->flashdata('port_name'); 
        $this->load->model('portfolios');
        $this->portfolios->displayportfolio($subassets,$port_name);
        

    }
	

}
