<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


public function __construct()
  {
    parent::__construct();
    if( $this->session->userdata('id') )
    return redirect('Dashboard'); //yadi session ki value h toh ha,e redirect karde dashborad me 
    
  }
	
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
       $this->form_validation->set_rules('pass', 'Password', 'required|min_length[5]|max_length[12]');
		$this->form_validation->set_error_delimiters("<div class='text-danger'>","</div>");
		
		if ($this->form_validation->run() == TRUE or FALSE) {
		
			$email=$this->input->post('email');
             $pass=$this->input->post('pass');
            $this->load->model('Login_model');
             $id = $this->Login_model->isvalidate($email,$pass);
            if($id)
            {
              // $this->load->library('session');
               $this->session->set_userdata('id',$id);
                return redirect('Dashboard');
            }
            else
            {
            	
                $this->session->set_flashdata('Login_failed','Invalid Email/Password');
                 return redirect('Login');
            }

		} else {
			$this->load->view('Login_view');
		}
	}


	

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */