<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function isvalidate($email,$password)
	{
       $q=$this->db->where(['email'=>$email,'password'=>$password])->get('register');
        if($q->num_rows())
         {
            return $q->row()->user_id; // yeh id return karega
         }
         else
         {
             return false;
         }
	}
	
	
   public function forgot_pass($email)
    { 
 
            $que=$this->db->where(['email'=>$email])->get('register');
            
             if($que->num_rows()==0)
         {
            return false; 
         }
         else{
               
                $user_email=$que->row()->email;
                if((!strcmp($email, $user_email))){
                $pass=$que->row()->password;
                
                  $to = $user_email;
                  $subject = "Reset Password";
                  $txt = "Your password is $pass .". "\r\n\r\n"."Click this below link for login....". "\r\n".base_url()."Login";
                  $headers = "From: neplarmoney@gmail.com" . "\r\n";

                  mail($to,$subject,$txt,$headers);
                  return true;
                  }
                else
                {
                    return false;
                }
          }
    }



}
