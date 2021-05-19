<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function fetch_Assets()
	{
		$this->db->order_by("Assets","ASC");
		$q=$this->db->get('all_assets');
		return $q->result();
	}
  
	public function sub_Assets($assets_id)
	{
		  $this->db->where('assets_id', $assets_id);
		  $this->db->order_by('sub_assets', 'ASC');
		  $query = $this->db->get('sub_assets');
		  $output = '<option value="">Select Sub Assets</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->sub_assets.'">'.$row->sub_assets.'</option>';
		  }
		  return $output;
	}
  
     public function user_detail()
     {
     	$id=$this->session->userdata('id');
		$q=$this->db->select('*')->from('register')->where(['id'=>$id])->get();
		return $q->result();
     }

     	public function show_groups()
	{  
	    $user_id=$this->session->userdata('id');
		$q=$this->db->select('*')->from('user_group')->where(['user_id'=>$user_id])->get();
	
		return $q->result();
	}
	   public function show_portfolio()
	{
	    $user_id=$this->session->userdata('id');
		$q=$this->db->select('*')->from('portfolio')->where(['user_id'=>$user_id])->get();
		return $q->result();
	}

	public function fetch_portfolio($group_name)
	{ 
       
		  $user_id=$this->session->userdata('id');
		  $this->db->where('port_group', $group_name);
		  $this->db->order_by('portfolio_name', 'ASC');
		   $query = $this->db->get('portfolio');

		   $afftectedRows=$this->db->affected_rows();
		   if($afftectedRows==0)
		   	{  $output="NO"; return $output;}
		   else{
		  foreach($query->result() as $row)
		  {
		    echo $output = '<a href="#" class="btn btn-success btn-sm">'.$row->portfolio_name.'</a>&nbsp;';
		  }
		 
		 
		  return $output;
		}
		
	}

	public function Dashboard_search($search_value)
	{
        $user_id=$this->session->userdata('id');
		$q=$this->db->select('*')->from('portfolio')->where(['user_id'=>$user_id])
		->like('portfolio_name', $search_value)->get();
		
		   $afftectedRows=$this->db->affected_rows();
		   if($afftectedRows==0)
		   	{  $output="NO"; return $output;}
		   else
		   {
				  foreach($q->result() as $row)
				  {
				    echo $output = '<a href="#" class="btn btn-success btn-sm">'.$row->portfolio_name.'</a>&nbsp;';
				  }
		 
		 
		  return $output;
	      }

   }


	 public function type_stockname()
	    {
	   
	   $q=$this->db->select('*')->order_by('stock_name','desc')->from('stock_details')->get();
			return $q->result();
	    }

     public function type_broker()
    {        
   $q=$this->db->select('*')->order_by('broker_name','asc')->from('broker_details')->get();
		return $q->result();
    }
   
   	public function fetch_Mutualfund_name()
	{
		$this->db->order_by("mutual_fund_name","ASC");
		$q=$this->db->get('mutual_fund_name');
		return $q->result();
	}

	  public function mutual_scheme_name()
    {        
          $q=$this->db->select('*')->order_by('mutual_scheme','asc')->from('mutual_scheme')->get();
		return $q->result();
    }
       public function nps_scheme_name()
    {        
          $q=$this->db->select('*')->order_by('scheme_name','asc')->from('nps_scheme')->get();
		return $q->result();
    }

       public function get_subdetails($table_name)
		 {    $data1 = [];
              $user_id=$this->session->userdata('id'); 
		    
	if($table_name == 'cash_in_hand' || $table_name == 'cash_in_post_office' || $table_name == 'cash_in_saving' || $table_name == 'cash_in_wallet')	
		    {
                     $q=$this->db->select('*,Sum(amt_invested) as total_amt_invested,Sum(current_value) as total_current_value')->from($table_name)->where(['user_id'=>$user_id])->group_by('portfolio_name')->get();
				       
				         foreach ($q->result() as $val)
				         {
                      $data1[] = array(  "sub_portfolio_name" =>   $val->portfolio_name,		   "sub_assets_amt_invested" => $val->total_amt_invested,
						      "current_value" => $val->total_current_value,
						       "sub_assets_name" => $val->sub_assets_name);
				         }
		    }
		    else if($table_name == 'stock' || $table_name == 'bond' || $table_name == 'mutual_fund_investment' || $table_name == 'nps_investment' || $table_name == 'sgb_temp' || $table_name == 'ncd_investment' ||$table_name == 'private_equity_investment' || $table_name == 'rd_investment')
		    { 
                    $q=$this->db->select('portfolio_name,Sum(amt_invested) as total_amt_invested,sub_assets_name')->from($table_name)->where(['user_id'=>$user_id])->group_by('portfolio_name')->get();
				       
				         foreach ($q->result() as $val)
				         {
                      $data1[] = array(  "sub_portfolio_name" =>   $val->portfolio_name,		   "sub_assets_amt_invested" => $val->total_amt_invested,
						      "current_value" => "",
						       "sub_assets_name" => $val->sub_assets_name);
				         }
		    }
		    else
		    {	     	
              $q=$this->db->select('*,Sum(assets_quantity) as total_assets_quantity,Sum(assets_avg_price) as total_assets_avg_price,Sum(assets_amt_invested) as total_assets_amt_invested')->from($table_name)->where(['user_id'=>$user_id])->group_by('portfolio_name')->get();
				       
				         foreach ($q->result() as $val)
				         {
                         $data1[] = array(  "sub_portfolio_name" =>   $val->portfolio_name,
							     "sub_assets_quantity" =>  $val->total_assets_quantity,
				    		     "sub_assets_avg_price" =>    $val->total_assets_avg_price,
						      "sub_assets_amt_invested" => $val->total_assets_amt_invested);
				         }
            } 
		   return $data1;
		 } 

		  public function get_totaldetails($tname)
		 { 	$user_id=$this->session->userdata('id'); 
		   if($tname=='cash_in_hand' || $tname == 'cash_in_post_office' || $tname == 'cash_in_saving' || $tname == 'cash_in_wallet' || $tname == 'cash_in_wallet')
		    {            
              $q=$this->db->select('SUM(amt_invested) as amt_invest,SUM(current_value) as current_value')->from($tname)->where(['user_id'=>$user_id])->get();
				  foreach($q->result() as $value)
				  {    
				    $amt_invest = $value->amt_invest;				                      
					$current_value = $value->current_value;
				  }
				   return array($amt_invest,$current_value);
		   }
		  else if($tname=='stock' || $tname == 'bond' || $tname == 'mutual_fund_investment' || $tname == 'nps_investment' || $tname == 'sgb_temp' || $tname == 'ncd_investment' ||$tname == 'private_equity_investment')
		    {
                $q=$this->db->select('SUM(amt_invested) as amt_invest')->from($tname)->where(['user_id'=>$user_id])->get();
				  foreach($q->result() as $value)
				  {    
				    $amt_invest = $value->amt_invest;				                      
				
				   }
				   return array($amt_invest);
		    }
		   else
		   {	
		 	$user_id=$this->session->userdata('id'); 
            $q=$this->db->select('SUM(assets_quantity) as qty,SUM(assets_avg_price) as avg_price,SUM(assets_amt_invested) as amt_invest')->from($tname)->where(['user_id'=>$user_id])->get();
				  foreach($q->result() as $value)
				  {    
                    $qty = $value->qty;
					$avg_price = $value->avg_price;
				    $amt_invest = $value->amt_invest;
				   }
				   return array($qty,$avg_price,$amt_invest);
		    }		   
			
			
		 }

		public function fetch_maintable()
		 { 
		 	$qty = "10.00";
		 	$avg_price = "12.34";
		 	$amt_invest = "11.22";
		 	$ltp = "&nbsp;&nbsp;&nbsp;&nbsp;";
		 	$current_value = "10,000";
		 	$today_gain = "10,000";
            $national_gain = "10,0000";
   
		     	$data = [];
		        $data1 = [];
               
		         $query = $this->db->select('*')->from('sub_assets')->get();        
        
		          foreach ($query->result() as $value)
				     {

				     	if($value->sub_assets == 'Agricultural Land')
				     	{     $tname = 'agricultural_land';
				              $data1 = $this->get_subdetails($tname);
		                      $a = $this->get_totaldetails($tname);
		                      $bottom_data='45.98';
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => array($value->href='<p class="top-data">'.$national_gain.'</p>',
							           $value->href='<p class="bottom-data">'.$bottom_data.'</p>' ) ,
                                  "kk" => $data1
							   );
                        
                         }
                         elseif ($value->sub_assets == 'Art') {
                         	 $tname = 'art';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                             elseif ($value->sub_assets == 'Bike') {
                         	 $tname = 'bike';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }

                             elseif ($value->sub_assets == 'Car') {
                         	 $tname = 'car';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                            elseif ($value->sub_assets == 'Commercial Land') {
                         	 $tname = 'commercial_land';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                          elseif ($value->sub_assets == 'Commercial Property') {
                         	 $tname = 'commercial_property';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                            elseif ($value->sub_assets == 'Commercial Vehicle') {
                         	 $tname = 'commercial_vehicle';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                         elseif ($value->sub_assets == 'Digital Property') {
                         	 $tname = 'digital_property';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                          elseif ($value->sub_assets == 'Gold') {
                         	 $tname = 'gold';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                           elseif ($value->sub_assets == 'House') {
                         	 $tname = 'house';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                          elseif ($value->sub_assets == 'Jewellery') {
                         	 $tname = 'jewellery';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                           elseif ($value->sub_assets == 'Platinum') {
                         	 $tname = 'platinum';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
	 						     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                          elseif ($value->sub_assets == 'Precious Stone') {
                         	 $tname = 'precious_stone';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                          elseif ($value->sub_assets == 'Silver') {
                         	 $tname = 'silver';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => $a[0],
				    		       "avg_price" => $a[1],
						        "amt_invest" => $a[2],
					   	         "ltp" => $ltp,
					             "current_value" => $current_value,
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                        
                        //Emergency fund ....

                      
                         elseif ($value->sub_assets == 'Cash in Hand') {
                         	 $tname = 'cash_in_hand';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => $a[1],
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                            
                         elseif ($value->sub_assets == 'Cash in Hand') {
                         	 $tname = 'cash_in_hand';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => $a[1],
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                      
                           elseif ($value->sub_assets == 'Cash in post office saving A/c') {
                         	 $tname = 'cash_in_post_office';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => $a[1],
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }

                          elseif ($value->sub_assets == 'Cash in Saving A/C') {
                         	 $tname = 'cash_in_saving';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => $a[1],
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }

                              elseif ($value->sub_assets == 'Cash in wallet') {
                         	 $tname = 'cash_in_wallet';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => $a[1],
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                        //investment
                    
                            elseif ($value->sub_assets == 'Stock / Share') {
                         	 $tname = 'stock';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => '',
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                        
                        
                   
                            elseif ($value->sub_assets == 'Bond / Corporate Bond') {
                         	 $tname = 'bond';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => '',
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
  
                               elseif ($value->sub_assets == 'MF / Mutual Fund') {
                         	 $tname = 'mutual_fund_investment';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => '',
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                      
                             elseif ($value->sub_assets == 'NPS / National Pension System') {
                         	 $tname = 'nps_investment';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => '',
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                      
                             elseif ($value->sub_assets == 'SGB / Sovereign Gold Bond') {
                         	 $tname = 'sgb_temp';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => '',
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }

                          elseif ($value->sub_assets == 'NCD / Debenture') {
                         	 $tname = 'ncd_investment';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => '',
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }

                         elseif ($value->sub_assets == 'Private Equity / Startup') {
                         	 $tname = 'private_equity_investment';
				             $data1 = $this->get_subdetails($tname);
		                     $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => $a[0],
					   	         "ltp" => $ltp,
					             "current_value" => '',
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }
                       

                         elseif ($value->sub_assets == 'RD / Recurring Deposit') {
                         	 $tname = 'rd_investment';
				             $data1 = $this->get_subdetails($tname);
		                    // $a = $this->get_totaldetails($tname);
		                     
						     $data[] = array(
				        
							     "sub_assets" => $value->sub_assets,
							      "qty" => '',
				    		       "avg_price" => '',
						        "amt_invest" => '',
					   	         "ltp" => $ltp,
					             "current_value" => '',
						          "today_gain" => $today_gain,
							      "national_gain" => $national_gain,
                                  "kk" => $data1
							   );
                         }

				     }


		    $result = array(
		    "recordsTotal" => $query->num_rows(),
		    "recordsFiltered" => $query->num_rows(),
		    "data" => $data
		     );
		     echo json_encode($result);
		    
		     }


    
      public function assetstotal_qty()
     {
     	 $id=$this->session->userdata('id');
       $query = $this->db->query("SELECT 
								    (SELECT SUM(assets_quantity) FROM agricultural_land where user_id=$id) + 
								    (SELECT SUM(assets_quantity ) FROM art where user_id=$id) + 
								    (SELECT SUM(assets_quantity) FROM bike where user_id=$id) +
								    (SELECT SUM(assets_quantity) FROM car where user_id=$id) +
								  (SELECT SUM(assets_quantity) FROM commercial_land where user_id=$id) +
							   (SELECT SUM(assets_quantity) FROM commercial_property where user_id=$id) +
							    (SELECT SUM(assets_quantity) FROM commercial_vehicle where user_id=$id) +
							    (SELECT SUM(assets_quantity) FROM digital_property where user_id=$id) +
							    (SELECT SUM(assets_quantity) FROM gold where user_id=$id) +  
							    (SELECT SUM(assets_quantity) FROM house where user_id=$id) +
							    (SELECT SUM(assets_quantity) FROM jewellery where user_id=$id) +
							    (SELECT SUM(assets_quantity) FROM platinum where user_id=$id) as total_qty");

         foreach($query->result() as $value)
		  { $total_sum = $value->total_qty;  }

		return $total_sum;

     }

   

    

   public function displayassets()
    { 
        $data = [];
         $query = $this->db->select('*')->from('all_assets')->get();
         
	    foreach ($query->result() as $value)
        {
        	if($value->Assets=='Assets')
        	{
        		$a = $this->assetstotal_qty();
                $data[] = array(
                     $value->href="",
					 $value->Assets,
				     $a,
				     $value->href="100",
					 $value->href="100",
					 $value->href="100",
					 $value->href="100",
					 $value->href="100",
					 $value->href="100"  
							   );    
        	}
        	else{
        		   $data[] = array(
                     $value->href="",
					 $value->Assets,
				     $value->href="100",
				     $value->href="100",
					 $value->href="100",
					 $value->href="100",
					 $value->href="100",
					 $value->href="100",
					 $value->href="100"  
							   ); 

        	}
       }
         	    $result = array(
		    "recordsTotal" => $query->num_rows(),
		    "recordsFiltered" => $query->num_rows(),
		    "data" => $data
		     );
		     echo json_encode($result);
    }







}
