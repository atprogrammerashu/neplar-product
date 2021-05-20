<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


public function __construct()
  {
    parent::__construct();
    if( $this->session->userdata('id') )
    return redirect('Dashboard'); 
    
  }


	public function index() 
	{
    //Login with google code starts here ....
    include_once APPPATH . 'helpers/GoogleAuth.php';
    $google_client->setAccessType('online');
    $google_client->addScope('email');

    $google_client->addScope('profile');

    if(isset($_GET["code"]))
   {
     $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

         if(!isset($token["error"]))
         {
          $google_client->setAccessToken($token['access_token']);

          $this->session->set_userdata('access_token', $token['access_token']);

          $google_service = new Google_Service_Oauth2($google_client);

          $data = $google_service->userinfo->get();
         
          $current_datetime = date('Y-m-d H:i:s');

           $this->load->model('Login_model');
           $id = $this->Login_model->Is_already_register($data['id']);
          if($id)
          {
           //update data
           $user_data = array(
            'email' => $data['email'],
            'updated_at' => $current_datetime
           );

           $this->Login_model->Update_user_data($user_data, $data['id']);
           $this->session->set_userdata('id',$id);
          return redirect('Dashboard');
          }
           else
          {
            $number = rand(100,10000000);
                      $t=time();
                      $random = $number.''.$t;
          
           //insert data
           $user_data = array(
            'user_id' => $number,
            'login_oauth_uid' => $data['id'],
            'user_name' => $data['given_name']." ".$data['family_name'],
            'email'  => $data['email'],
            'profile_picture' => $data['picture'],
            'gender' => !empty($data['gender'])?$data['gender']:'',
            'address' => !empty($data['locale'])?$data['locale']:'',
            'plan' => 'Free',
            'plan_amt' => '0',
            'paymode' => 'Free',
            'password' => $number,
            'date_time'  => $current_datetime
           );

           $this->Login_model->Insert_user_data($user_data);
           $this->session->set_userdata('id',$number);
           return redirect('Dashboard');
          }

       }

  }
  
  $login_button = '<a class="btn btn-outline-dark" href="'.$google_client->createAuthUrl().'"><div class="col-md-12">
                                <img width="20px" alt="Google sign-in" 
                                    src='.base_url("asstes/img/GoogleLogo.png").' />
                                  &nbsp;&nbsp;  Login with Google
                            </div></a>';
  $data['login_button'] = $login_button;

  //Login with google code ends here ....
    

  //Normal Login code starts here ....  
  
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
                 return redirect('Login',$data);
            }

		} else {
			$this->load->view('Login_view',$data);
		}
	}


	

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */