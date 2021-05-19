<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPassword extends CI_Controller {

 function __construct()
  {
    parent::__construct();  
  }

	public function index()
	{
	     if($this->input->post('forgot_pass'))
    {
            $email=$this->input->post('email');
           $this->load->model('Login_model');
                    
        if($this->Login_model->forgot_pass($email))
          {
              $this->session->set_flashdata('msg','You will got your password in your registered Email , within 10 minutes..!!');
               $this->session->set_flashdata('msg_class','alert-success');  
              redirect('ForgotPassword'); 
            
          }
            $this->session->set_flashdata('msg','This Email is not registered Please try again!!');
              $this->session->set_flashdata('msg_class','alert-danger');
             redirect('ForgotPassword'); 
    }
    else{
           $this->load->view('forgot'); 
      }

	}


              



}
