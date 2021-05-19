<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {


  public function __construct()
  {
    parent::__construct();
    if( ! $this->session->userdata('id') )
      return redirect('login');
    
  }
  
  public function index() 
  {
   $this->load->model('Chart');
   $this->load->model('Dashboard_model');
   $data['all_total_current_value'] = $this->Chart->dashboard_total_current_value();
   $data['all_total_amt_invested'] = $this->Chart->dashboard_total_amt_invested();
   $data['all_total_overall_gain'] = $this->Chart->dashboard_total_overall_gain();
   $data['all_total_overall_gain_percent'] = $this->Chart->dashboard_total_overall_gain_percent();
   $data['user_info']=$this->Dashboard_model->user_detail();
   $data['show_group']=$this->Dashboard_model->show_groups();
   $data['show_portfolio']=$this->Dashboard_model->show_portfolio();
   $this->load->view('charts',$data);
 }

  public function fetch_piChart_stockData(){
    $chart_value = $this->input->post('chart_value');
   $this->load->model('Chart');
   $this->Chart->fetch_piChart_stockData($chart_value); 
  }

 public function fetch_all_data(){

   $this->load->model('Chart');
   $this->Chart->fetch_all_data(); 

 }

 public function showPortfolioWise_data(){
  $Assets_value = $this->input->post('Assets_value');
  $portfoliowise_name = $this->input->post('portfoliowise_name');
   $this->load->model('Chart');
   $this->Chart->showPortfolioWise_data($Assets_value, $portfoliowise_name); 

 }

  public function fetch_piChart_PortfolioWise(){
     $Assets_value = $this->input->post('Assets_value');
  $portfoliowise_name = $this->input->post('portfoliowise_name');
   $this->load->model('Chart');
   $this->Chart->fetch_piChart_PortfolioWise($Assets_value, $portfoliowise_name); 
  }


public function fetch_onload_piechart()
  { 
   $this->load->model('Chart');
   $this->Chart->fetch_onload_chart(); 
  }




}

