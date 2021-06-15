<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

  public function getGroupOnhover()
     {  
     	$id=$this->session->userdata('id');
     	$q=$this->db->select('*')->from('user_group')->where(['user_id'=>$id])->get();
       $output ="<i>";
		foreach($q->result() as $row)
		  {
        $output .= "<li class='grpdataID'><a  href='javascript:void(0)'><span>".$row->group_name."</span></a>
        <span class='sub_data'><span></li>";
		  }
		  $output .= "</i>";
		  return $output;
     }



  public function getPortfolioOnhover($grpname)
     {  
     	$id=$this->session->userdata('id');
        $q=$this->db->select('*')->from('portfolio')->where(['user_id'=>$id,'port_group'=>$grpname])->get();
       $output ="<ul>";
		foreach($q->result() as $row)
		  { 
            $output .= "<li><a  href='javascript:void(0)'>".$row->portfolio_name."</a></li>";
		  }
		  $output .= "</ul>";
		  return $output;
     }

   public function AllSecondToolbarData()
     { $q=$this->db->select('*')->from('index_tbl')->get();
		return $q->result();
     }
     
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
		  $output = '<option value="Select Sub Assets">Select Sub Assets</option>';
		  foreach($query->result() as $row)
		  {
		   $output .= '<option value="'.$row->sub_assets.'">'.$row->sub_assets.'</option>';
		  }
		  return $output;
	}
  
     public function user_detail()
     {
     	$id=$this->session->userdata('id');
		$q=$this->db->select('*')->from('register')->where(['user_id'=>$id])->get();
		return $q->result();
     }

     	public function show_groups()
	{  
	    $user_id=$this->session->userdata('id');
		$q=$this->db->select('*')->from('user_group')->where(['user_id'=>$user_id])->order_by("group_name", "asc")->get();
	
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
	   
	   $q=$this->db->select('*')->order_by('stock_name','asc')->from('stock_details')->get();
			return $q->result();
	    }
	 public function type_sgb_stockname()
        {
        
        $q=$this->db->select('*')->order_by('scheme_name','asc')->from('sovergine_gold_bond')->get();
        	return $q->result();
        }
    public function type_bond_stockname()
        {
        
        $q=$this->db->select('*')->order_by('stock_name','asc')->from('bond_ltp')->get();
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
		 
		 public function getSum($tname1,$tanme2,$col_name,$common_col_name)
{
  $user_id=$this->session->userdata('id');
  $q = $this->db->query('SELECT SUM(a.'.$col_name.') as total_value FROM '.$tname1.' as a JOIN '.$tanme2.' as b WHERE b.user_id = '.$user_id.' AND b.'.$common_col_name.' = a.'.$common_col_name.'');
  foreach ($q->result() as $value){ $total_val = $value->total_value; }
  return $total_val; 
}

 public function fetch_table()
 {  
 	$this->load->model('CommonModel');
	//!empty()?:'',
    $data = [];
    $data1 = [];
    $query = $this->db->select('*')->from('sub_assets')->get(); 
    // echo "<pre>";
    // print_r($query->result()); exit;
    foreach ($query->result() as $value)
	{
		if($value->sub_assets == 'Stock / Share')
		 {    
	$ltp=$this->CommonModel->Dashboard_model->getSum("stock_details","stock","current_price","stock_name");
 	$previous_day_nav=$this->Dashboard_model->getSum("stock_details","stock","previous_day_price","stock_name");
 	$total_amt_invested=$this->CommonModel->global_getSumdata("stock_details","stock","amt_invested","stock_name");
 	$total_current_value =$this->CommonModel->global_getSumdata("stock_details","stock","current_value","stock_name");
 	$total_stock_qty=$this->CommonModel->global_getSumdata("stock_details","stock","stock_qty","stock_name");

 	$notional_gain = ($ltp * $total_stock_qty)-($total_amt_invested);
 	$notional_gain_percent = ($notional_gain * (100)) / ($total_amt_invested);
 	$today_gain = ($ltp * $total_stock_qty)-($previous_day_nav * $total_stock_qty);
 	$today_gain_percent = ($today_gain * (100)) / ($previous_day_nav * $total_stock_qty);

		  $tname = 'stock';
	      $data1 = $this->get_subdetails($tname);
	      $bottom_data='45.98';
	      $data[] = array(

		     "sub_assets" => $value->sub_assets,
		     "qty" => '',
		     "avg_price" => '',
	         "amt_invest" => $total_amt_invested,
		     "ltp" => '',
	         "current_value" => $total_current_value,
	         "today_gain" => $today_gain. '/' .number_format($today_gain_percent,2,'.',',').'%',
		     "national_gain" => array($value->href='<p class="top-data">'.$notional_gain.'/'.number_format($notional_gain_percent,2,'.',',').'%</p>',
		     $value->href='<p class="bottom-data">'.$bottom_data.'</p>' ),
	         "kk" => $data1
		   );
                
        }

  //       elseif ($value->sub_assets == 'MF / Mutual Fund') 
  //       {
  //   $ltp=$this->CommonModel->Dashboard_model->getSum("mutual_scheme","mutual_fund_investment","today_nav","mutual_scheme");
 	// $previous_day_nav=$this->Dashboard_model->getSum("mutual_scheme","mutual_fund_investment","previous_day_price","mutual_scheme");
 	// $total_amt_invested=$this->CommonModel->global_getSumdata("mutual_scheme","mutual_fund_investment","amt_invested","mutual_scheme");
 	// $total_current_value =$this->CommonModel->global_getSumdata("mutual_scheme","mutual_fund_investment","current_value","mutual_scheme");
 	// $total_stock_qty=$this->CommonModel->global_getSumdata("mutual_scheme","mutual_fund_investment","mutual_quantity","mutual_scheme");
 	// $notional_gain = ($ltp * $total_stock_qty)-($total_amt_invested);
 	// ;
 	// $today_gain = ($ltp * $total_stock_qty)-($previous_day_nav * $total_stock_qty);
 	// $today_gain_percent = ($today_gain * (100)) / ($previous_day_nav * $total_stock_qty);

 	// ($total_amt_invested == 0) ? $notional_gain_percent = ($notional_gain * (100)) / ($total_amt_invested)  : $notional_gain_percent =0;


		//   $tname = 'mutual_fund_investment';
	 //      $data1 = $this->get_subdetails($tname);
	 //      $bottom_data='45.98';
	 //      $data[] = array(

		//      "sub_assets" => $value->sub_assets,
		//      "qty" => '',
		//      "avg_price" => '',
	 //         "amt_invest" => $total_amt_invested,
		//      "ltp" => '',
	 //         "current_value" => $total_current_value,
	 //         "today_gain" => $today_gain. '/' .$today_gain_percent.'%',
		//      "national_gain" => array($value->href='<p class="top-data">'.$notional_gain.'/'.number_format($notional_gain_percent,2,'.',',').'%</p>',
		//      $value->href='<p class="bottom-data">'.$bottom_data.'</p>' ) ,
	 //         "kk" => $data1
		//    );
  //       }
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
