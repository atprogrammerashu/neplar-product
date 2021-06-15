<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Model {

    public function add_group($array)
  {
     $id = $this->session->userdata('id');
    $groupname = $array['group_name'];
    $query = $this->db->select('*')->from("portfolio")->where(['portfolio_name' => $groupname, "user_id" => $id])->get();

    if ($query->num_rows() > 0) {
      return false;
    } else {

      return $this->db->insert('user_group', $array);
    }
  }

   public function add_portfolio($array)
  {
     $id = $this->session->userdata('id');
    $portfolio_name = $array['portfolio_name'];
    $groupname = $array['port_group'];

    $a = $this->db->query('select portfolio_name,port_group from portfolio where user_id ="' . $id . '" AND  port_group = "' . $groupname . '"');

    $query = $this->db->select('*')->from("user_group")->where(['group_name' => $portfolio_name, "user_id" => $id])->get();

    if ($a->num_rows() >= 10 || $query->num_rows() > 0) {
      return false;
    } else {
      return $this->db->insert('portfolio', $array);
    }
  }	

  public function global_findAssetName($portfolio_name,$whereid)
  {
    $q = $this->db->select('*')->from('all_assets')->where(['id' => $whereid])->get();
    $m = $this->db->select('port_group')->from('portfolio')->where(['portfolio_name' => $portfolio_name])->get();
    $assetsname='';
    $port_group='';
    foreach ($q->result() as $val) {
      $assetsname = $val->Assets;
    }
    

    foreach ($m->result() as $val) {
      $port_group = $val->port_group;
    }
    return array($port_group,$assetsname);

  }

//   public function global_Portgroup($table_name, $portfolio_name)
//   {
//     $q = $this->db->select('port_group')->from($table_name)->where(['portfolio_name' => $portfolio_name])->get();

//     foreach ($q->result() as $val) {
//       $port_group = $val->port_group;
//     }
//     return $port_group;
//   }




  public function add_assets_detail($table_name, $post)
  {
    if ($table_name == "Agricultural Land") {
      return $this->db->insert('agricultural_land', $post);
    } else if ($table_name == "Art") {
      return $this->db->insert('art', $post);
    } else if ($table_name == "Bike") {
      return $this->db->insert('bike', $post);
    } else if ($table_name == "Car") {
      return $this->db->insert('car', $post);
    } else if ($table_name == "Commercial Land") {
      return $this->db->insert('commercial_land', $post);
    } else if ($table_name == "Commercial Property") {
      return $this->db->insert('commercial_property', $post);
    } else if ($table_name == "Commercial Vehicle") {
      return $this->db->insert('commercial_vehicle', $post);
    } else if ($table_name == "Digital Property") {
      return $this->db->insert('digital_property', $post);
    } else if ($table_name == "Gold") {
      return $this->db->insert('gold', $post);
    } else if ($table_name == "House") {
      return $this->db->insert('house', $post);
    } else if ($table_name == "Jewellery") {
      return $this->db->insert('jewellery', $post);
    } else if ($table_name == "Platinum") {
      return $this->db->insert('platinum', $post);
    } else if ($table_name == "Precious Stone") {
      return $this->db->insert('precious_stone', $post);
    } else if ($table_name == "Silver") {
      return $this->db->insert('silver', $post);
    }
  }

  





  public function add_all_emergencydata($table_name, $array)
  {
    if ($table_name == "Cash in Hand") {
      return $this->db->insert('cash_in_hand', $array);
      
    } else  if ($table_name == "Cash in post office saving A/c") {
      return $this->db->insert('cash_in_post_office', $array);

    } else  if ($table_name == "Cash in Saving A/C") {
      return $this->db->insert('cash_in_saving', $array);

    } else  if ($table_name == "Cash in wallet") {
      return $this->db->insert('cash_in_wallet', $array);
    }
  }

    public function add_all_Insurancedata($table_name,$array)
  {
    if($table_name=="Bike Insurance")
    {
     return $this->db->insert('bike_insurance',$array);
    }
     else  if($table_name=="Car Insurance")
    {
     return $this->db->insert('car_insurance',$array);
    }
     else  if($table_name=="Home Insurance")
    {
     return $this->db->insert('home_insurance',$array);
    }
     else  if($table_name=="Health Insurance")
    {
     return $this->db->insert('health_insurance',$array);
    }
    else  if($table_name=="Travel Insurance")
    {
     return $this->db->insert('travel_insurance',$array);
    }
     else  if($table_name=="Term Plan")
    {
     return $this->db->insert('term_plan_insurance',$array);
    }
     else  if($table_name=="Life Insurance (Endowment)")
    {
     return $this->db->insert('life_insurance_endowment',$array);
    }
     else  if($table_name=="Life Insurance (Money Back)")
    {
     return $this->db->insert('life_insurance_moneyback',$array);
    }
     else  if($table_name=="ULIP")
    {
     return $this->db->insert('ulip_insurance',$array);
    }

  }

    public function addLoan_floatingRate($table_name,$floating_date_from,$floating_date_to,$loan_floating_value)
  {
        $user_id=$this->session->userdata('id');
        $q= $this->db->select('id')->from('appliance_loan')->where(['user_id'=>$user_id])->order_by('id', 'desc')->limit(1)->get();
         foreach($q->result() as $row)
      {
         $froigen_id = $row->id+1;
      }
    

         if($table_name=="Appliance Loan" || $table_name=="Bike Loan" || $table_name=="Car Loan" || $table_name=="Home Loan" || $table_name=="Mortgage Loan" || $table_name=="Personal Loan")
       {
             $data = array(
               'floating_id' => $froigen_id,
               'user_id' => $user_id,
               'sub_assets_name' => $table_name,
               'floating_date_from' => $floating_date_from,
               'floating_date_to' => $floating_date_to,
               'loan_floating_value' => $loan_floating_value
             );
            
        return $this->db->insert('loan_floating_rate',$data);
       }

  }


    public function add_all_Loan($table_name,$array)
  {
      if($table_name=="Appliance Loan")
    {
     return $this->db->insert('appliance_loan',$array);
    }
     else  if($table_name=="Bike Loan")
    {
     return $this->db->insert('bike_loan',$array);
    }
      else  if($table_name=="Car Loan")
    {
     return $this->db->insert('car_loan',$array);
    }
      else  if($table_name=="Home Loan")
    {
     return $this->db->insert('home_loan',$array);
    }
      else  if($table_name=="Mortgage Loan")
    {
     return $this->db->insert('mortgage_loan',$array);
    }
     else  if($table_name=="Personal Loan")
    {
     return $this->db->insert('personal_loan',$array);
    }

  }

  public function update_groups($group_name,$update_array)
  { $user_id=$this->session->userdata('id');
   
    return $this->db->set('group_name', $update_array)->where(['user_id'=>$user_id,'group_name'=>$group_name])->update('user_group');
  }

       public function fetch_edit_portfolio($fetch_port_name)
  {
      $user_id=$this->session->userdata('id');
    $q=$this->db->select('*')->from('portfolio')->where(['user_id'=>$user_id,'portfolio_name'=>$fetch_port_name])->get();
     return $q->row();  
     
  }


  public function update_portfolio($port_id,$update_array)
  { 
    $user_id=$this->session->userdata('id'); 
    return $this->db->where(['id'=>$port_id,'user_id'=>$user_id])->update('portfolio',$update_array);
  }

 public function delete_portfolio($port_id)
  {  $user_id=$this->session->userdata('id'); 
      return $this->db->delete('portfolio',['id'=>$port_id,'user_id'=>$user_id]);
  }


  //EPF LEFT COLUMN NAME RIGHT POST VARIABLES

  public function add_epf($post)
  {
    return $this->db->insert('epf_investment', $post);
  }
     public function fetch_epf_interestrate($interest_date)
    {
           $query = $this->db->select('interest_rate')->from('epf_interest_rate')->where('date BETWEEN "'. date('Y-m-01', strtotime($interest_date)). '" and "'. date('Y-m-t', strtotime($interest_date)).'"')->get();      
               foreach($query->result() as $row)
              {
                 $interest_rate = $row->interest_rate;
              }

      return $interest_rate;
    }

   public function add_nps($array)
  {        
     return $this->db->insert('temp_nps_investment',$array); 
  }

 //fd variables 

  public function add_fd($post)
  {

    return $this->db->insert('fd_investment', $post);
  }
   public function add_kisanvikaspatara($array)
  {        
     return $this->db->insert('kisanvikaspatra_investment',$array); 
  }
  
  
  


  public function add_mutual_fund($post)
  {

    return $this->db->insert('temp_mutual_fund', $post);
  }

  public function add_ncd($array)
  {
    return $this->db->insert('ncd_investment', $array);
  }


    public function add_nsc($array)
  {
     return $this->db->insert('nsc_investment',$array);
  } 

    public function add_ppf($array)
  {
     return $this->db->insert('ppf_investment',$array);
  } 

  public function add_PrivateEquity($array)
  {        
     return $this->db->insert('private_equity_investment',$array); 
  }

    public function add_RD($array)
  {        
     return $this->db->insert('rd_investment',$array); 
  }

    public function add_SCSS($array)
  {        
     return $this->db->insert('scss_investment',$array); 
  }

    public function add_sukanya($array)
  {        
     return $this->db->insert('sukanya_investment',$array); 
  }



   public function globalFormValidation($user_id,$stock_transaction_type,$stock_broker,$portfolio_name,$tname,$post,$col_tran_type,$col_broker,$col_qty,$col_name)
  {
   

    $m=$this->db->query('SELECT * FROM `'.$tname.'` WHERE user_id= '.$user_id.' AND portfolio_name= "'.$portfolio_name.'" AND '.$col_tran_type.' ="Buy" AND '.$col_broker.' ="'.$stock_broker.'"');
    
     
    if( $m->num_rows()>0)
        {
          if($stock_transaction_type == "Buy")//2nd time buy
          {
            $a = $this->db->insert($tname, $post);  
              if($a)
              {
                return  4;
              }
              else{
                return  5;
              }                   
          }
          else if($stock_transaction_type == "Sell")
          {
             //Starting ==> 2nd time sale yaha user ko buy record milegaya phele se...
              
           $Buy = $this->db->select('SUM('.$col_qty.') as total_Buy_qty')->from($tname)->where(['user_id' => $user_id,
            'portfolio_name' => $post['portfolio_name'],
            $col_name=>$post[$col_name],
            $col_tran_type=>'Buy',
            $col_broker=>$post[$col_broker]])->get();
          
             foreach($Buy->result() as $dataBuy)
              {
                 $total_Buyquantity = $dataBuy->total_Buy_qty;
              }
               
              
             $Sell = $this->db->select('SUM('.$col_qty.') as total_Sell_qty')->from($tname)->where(['user_id' => $user_id,
             'portfolio_name' => $post['portfolio_name'],
             $col_name=>$post[$col_name],
             $col_tran_type=>'Sell',
             $col_broker=>$post[$col_broker]])->get();

              foreach($Sell->result() as $dataSell)
              {
                 $total_Sellquantity = $dataSell->total_Sell_qty;
              }
                                       //50 - 40
              $total_rest_quantity = $total_Buyquantity - $total_Sellquantity;
               
                // back - 10 > front - 20 
              if($total_rest_quantity >= $post[$col_qty])
              {
                    $a = $this->db->insert($tname, $post);
                    if($a)
                    {
                      return  6;
                    }
                    else{
                      return  7;
                    }
              }
              else
              {
                return 8;
              }
            
          }
          
        }
        else
        {
           
              if($stock_transaction_type == "Buy")//First time buy
              {
                $a = $this->db->insert($tname, $post);
                if($a)
                {
                  return 2;
                }
                else{
                  return 3;
                }
                
              }
              else if($stock_transaction_type == "Sell")
              {   //First time sale              
                  return 1;
                  // return "First Buy the share of this company Than You will sale..!";
              }

        }
     



  }


  public function add_stock($table_name, $post)
  {
    if ($table_name == "Stock / Share")
     { 
       $tname = "stock_temp";
      $user_id=$post['user_id'];
      $stock_transaction_type =$post['stock_transaction_type'];
      $stock_broker =$post['stock_broker'];
      $portfolio_name =$post['portfolio_name'];

 return $this->globalFormValidation($user_id,$stock_transaction_type,$stock_broker,$portfolio_name,$tname,$post,"stock_transaction_type","stock_broker","stock_qty","stock_name");
    
    } 
    else  if ($table_name == "SGB / Sovereign Gold Bond")
     {
      $tname = "sgb_temp";
      $user_id=$post['user_id'];
      $stock_transaction_type =$post['stock_transaction_type'];
      $stock_broker =$post['stock_broker'];
      $portfolio_name =$post['portfolio_name'];
      return $this->globalFormValidation($user_id,$stock_transaction_type,$stock_broker,$portfolio_name,$tname,$post,"stock_transaction_type","stock_broker","stock_qty","stock_name");
      // return $this->db->insert('sgb_temp', $post);
    } else  if ($table_name == "Bond / Corporate Bond") {

      $tname = "bond_temp";
      $user_id=$post['user_id'];
      $stock_transaction_type =$post['stock_transaction_type'];
      $stock_broker =$post['stock_broker'];
      $portfolio_name =$post['portfolio_name'];
      return $this->globalFormValidation($user_id,$stock_transaction_type,$stock_broker,$portfolio_name,$tname,$post,"stock_transaction_type","stock_broker","stock_qty","stock_name");
    }


  }

      public function delete_stock($stock_id)
  {
      $user_id=$this->session->userdata('id'); 
      return $this->db->delete('stock',['id'=>$stock_id,'user_id'=>$user_id]);
  }

public function temp_del_add_stock($temp_stock_id)
  {
    $user_id = $this->session->userdata('id');
    $q = $this->db->select('*')->from('stock_temp')->where(['user_id' => $user_id, 'id' => $temp_stock_id])->get();
    foreach ($q->result() as $row) {
      $data = array(
        'user_id' => $user_id,
        'group_name'=>$row->group_name,
        'portfolio_name' => $row->portfolio_name,
        'assets_name' => $row->assets_name,
        'sub_assets_name' => $row->sub_assets_name,
        'stock_name' => $row->stock_name,
        'stock_transaction_type' => $row->stock_transaction_type,
        'stock_broker' => $row->stock_broker,
        'stock_date' => $row->stock_date,
        'stock_contract_no' => $row->stock_contract_no,
        'stock_settlement_no' => $row->stock_settlement_no,
        'stock_qty' => $row->stock_qty,
        'stock_purchase_price' => $row->stock_purchase_price,
        'amt_invested' => $row->amt_invested,
        'stock_brokerage' => $row->stock_brokerage,
        'stock_net_rate' => $row->stock_net_rate,
        'stock_tax_value' => $row->stock_tax_value,
        'stock_cgst' => $row->stock_cgst,
        'stock_sgst' => $row->stock_sgst,
        'stock_igst' => $row->stock_igst,
        'stock_exchange_transaction' => $row->stock_exchange_transaction,
        'stock_stt' => $row->stock_stt,
        'stock_sebi_fee' => $row->stock_sebi_fee,
        'stock_stamp_duty' => $row->stock_stamp_duty,
        'stock_net_amt' => $row->stock_net_amt
      );
    }

    $this->db->insert('stock', $data);
    return $this->db->delete('stock_temp', ['id' => $temp_stock_id, 'user_id' => $user_id]);
  }

   public function temp_stock_del_record($temp_stock_id)
     {
         $user_id=$this->session->userdata('id');
      return $this->db->delete('stock_temp',['id'=>$temp_stock_id,'user_id'=>$user_id]);
     }


  public function temp_del_add_bond($temp_stock_id)
  {
    $user_id = $this->session->userdata('id');
    $q = $this->db->select('*')->from('bond_temp')->where(['user_id' => $user_id, 'id' => $temp_stock_id])->get();
    foreach ($q->result() as $row) {
      $data = array(
        'user_id' => $user_id,
        'portfolio_name' => $row->portfolio_name,
        'group_name'=>$row->group_name,
        'assets_name' => $row->assets_name,
        'sub_assets_name' => $row->sub_assets_name,
        'stock_name' => $row->stock_name,
        'stock_transaction_type' => $row->stock_transaction_type,
        'stock_broker' => $row->stock_broker,
        'stock_date' => $row->stock_date,
        'stock_contract_no' => $row->stock_contract_no,
        'stock_settlement_no' => $row->stock_settlement_no,
        'stock_qty' => $row->stock_qty,
        'stock_purchase_price' => $row->stock_purchase_price,
        'amt_invested' => $row->amt_invested,
        'stock_brokerage' => $row->stock_brokerage,
        'stock_net_rate' => $row->stock_net_rate,
        'stock_tax_value' => $row->stock_tax_value,
        'stock_cgst' => $row->stock_cgst,
        'stock_sgst' => $row->stock_sgst,
        'stock_igst' => $row->stock_igst,
        'stock_exchange_transaction' => $row->stock_exchange_transaction,
        'stock_stt' => $row->stock_stt,
        'stock_sebi_fee' => $row->stock_sebi_fee,
        'stock_stamp_duty' => $row->stock_stamp_duty,
        'stock_net_amt' => $row->stock_net_amt
      );
    }

    $this->db->insert('bond', $data);
    return $this->db->delete('bond_temp', ['id' => $temp_stock_id, 'user_id' => $user_id]);
  }






       public function temp_bond_del_record($temp_stock_id)
     {  $user_id=$this->session->userdata('id');
      return $this->db->delete('bond_temp',['id'=>$temp_stock_id,'user_id'=>$user_id]);
     }

      public function fetch_all_stock()
     {  $user_id=$this->session->userdata('id'); 
         $query = $this->db->select('*')->from('stock_temp')->where(['user_id'=>$user_id])->get();
        
            $data = [];

    foreach ($query->result() as $value) {

      $data[] = array(
        $value->stock_name,
        $value->stock_transaction_type,
        $value->stock_broker,
        $value->stock_date,
        $value->stock_qty,
        $value->stock_purchase_price,
         $value->href='<a class="btn btn-primary" onClick="add_to_stocktable('.$value->id.')">Save</a>&nbsp;&nbsp;<a class="btn btn-danger" onClick="del_to_tempstocktable('.$value->id.')">Delete</a>'
      
      );
    }

    $result = array(
    "recordsTotal" => $query->num_rows(),
    "recordsFiltered" => $query->num_rows(),
    "data" => $data
);
     echo json_encode($result);
    
     }

       public function fetch_all_sgb()
     {  $user_id=$this->session->userdata('id'); 
         $query = $this->db->select('*')->from('sgb_temp')->where(['user_id'=>$user_id])->get();
        
            $data = [];

    foreach ($query->result() as $value) {

      $data[] = array(
        $value->stock_name,
        $value->stock_transaction_type,
        $value->stock_broker,
        $value->stock_date,
        $value->stock_qty,
        $value->stock_purchase_price
     
      
      );
    }

    $result = array(
    "recordsTotal" => $query->num_rows(),
    "recordsFiltered" => $query->num_rows(),
    "data" => $data
);
     echo json_encode($result);
    
     }

       public function fetch_all_bond()
     {  $user_id=$this->session->userdata('id'); 
         $query = $this->db->select('*')->from('bond_temp')->where(['user_id'=>$user_id])->get();
        
            $data = [];

    foreach ($query->result() as $value) {

      $data[] = array(
        $value->stock_name,
        $value->stock_transaction_type,
        $value->stock_broker,
        $value->stock_date,
        $value->stock_qty,
        $value->stock_purchase_price,
         $value->href='<a class="btn btn-primary" onClick="add_to_bondtable('.$value->id.')">Save</a>&nbsp;&nbsp;<a class="btn btn-danger" onClick="del_to_tempbondtable('.$value->id.')">Delete</a>'
      
      );
    }

    $result = array(
    "recordsTotal" => $query->num_rows(),
    "recordsFiltered" => $query->num_rows(),
    "data" => $data
);
     echo json_encode($result);
    
     }

          public function fetch_all_floatrate()
     {  $user_id=$this->session->userdata('id'); 
         $query = $this->db->select('*')->from('loan_floating_rate')->where(['user_id'=>$user_id])->order_by('id', 'desc')->get();
        
            $data = [];

    foreach ($query->result() as $value) {

      $data[] = array(
        $value->floating_date_from,
        $value->floating_date_to,
        $value->loan_floating_value
      );
    }

    $result = array(
    "recordsTotal" => $query->num_rows(),
    "recordsFiltered" => $query->num_rows(),
    "data" => $data
);
     echo json_encode($result);
    
     }

      public function fetch_all_mutualfund()
     {  $user_id=$this->session->userdata('id'); 
         $query = $this->db->select('*')->from('temp_mutual_fund')->where(['user_id'=>$user_id])->get();
        
            $data = [];

    foreach ($query->result() as $value) {

      $data[] = array(
        $value->mutual_scheme,
        $value->mutual_folio_no,
        $value->mutual_quantity,
        $value->mutual_nav,
        $value->mutual_date,
        $value->mutual_amt_invested,
          $value->href='<a class="btn btn-primary btn-sm" onClick="add_to_mutualfundinvetment_table('.$value->id.')">Save</a><a class="btn btn-danger btn-sm" onClick="del_to_temp_mutualfundtable('.$value->id.')">Del</a>'
      
      );
    }

    $result = array(
    "recordsTotal" => $query->num_rows(),
    "recordsFiltered" => $query->num_rows(),
    "data" => $data
);
     echo json_encode($result);
    
     }

 public function add_to_mutualfundinvetment_table($temp_stock_id)
  {
    $user_id = $this->session->userdata('id');
    $q = $this->db->select('*')->from('temp_mutual_fund')->where(['user_id' => $user_id, 'id' => $temp_stock_id])->get();
    foreach ($q->result() as $row) {
      $data = array(
        'user_id' => $user_id,
        'portfolio_name' => $row->portfolio_name,
        'assets_name' => $row->assets_name,
        'group_name' => $row->group_name,
        'sub_assets_name' => $row->sub_assets_name,
        'mutual_company_name' => $row->mutual_company_name,
        'mutual_scheme' => $row->mutual_scheme,
        'mutual_folio_no' => $row->mutual_folio_no,
        'mutual_transaction' => $row->mutual_transaction,
        'mutual_type' => $row->mutual_type,
        'mutual_sip_date' => $row->mutual_sip_date,
        'mutual_date' => $row->mutual_date,
        'mutual_quantity' => $row->mutual_quantity,
        'mutual_nav' => $row->mutual_nav,
        'amt_invested' => $row->mutual_amt_invested,
        'mutual_stamp_charge' => $row->mutual_stamp_charge,
        'mutual_exit_load' => $row->mutual_exit_load,
        'mutual_advisor' => $row->mutual_advisor

      );
    }

    $this->db->insert('mutual_fund_investment', $data);
    return $this->db->delete('temp_mutual_fund', ['id' => $temp_stock_id, 'user_id' => $user_id]);
  }

  public function del_to_temp_mutualfundtable($temp_stock_id)
     {  $user_id=$this->session->userdata('id');
      return $this->db->delete('temp_mutual_fund',['id'=>$temp_stock_id,'user_id'=>$user_id]);
     }

  
      public function fetch_all_nps()
     {  $user_id=$this->session->userdata('id'); 
         $query = $this->db->select('*')->from('temp_nps_investment')->where(['user_id'=>$user_id])->get();
        
            $data = [];

    foreach ($query->result() as $value) {

      $data[] = array(
        $value->nps_type,
        $value->nps_scheme,
        $value->nps_transaction_type,
        $value->nps_qty,
        $value->nps_date,
          $value->href='<a class="btn btn-primary btn-sm" onClick="add_to_nps_invetment_table('.$value->id.')">Save</a>&nbsp;&nbsp;<a class="btn btn-danger btn-sm" onClick="del_to_temp_nps_investmenttable('.$value->id.')">Delete</a>'
      
      );
    }

    $result = array(
    "recordsTotal" => $query->num_rows(),
    "recordsFiltered" => $query->num_rows(),
    "data" => $data
);
     echo json_encode($result);
    
     }


          public function add_to_nps_invetment_table($temp_stock_id)
  {
      $user_id=$this->session->userdata('id');
    $q=$this->db->select('*')->from('temp_nps_investment')->where(['user_id'=>$user_id,'id'=>$temp_stock_id])->get();
     foreach($q->result() as $row)
      {
          $data = array(
            'user_id' => $user_id,
            'portfolio_name' => $row->portfolio_name,
            'assets_name' => $row->assets_name,
            'group_name' => $row->group_name,
            'sub_assets_name' => $row->sub_assets_name,
            'nps_opening_date' => $row->nps_opening_date,
            'nps_type' =>$row->nps_type,
            'nps_pran_no' =>$row->nps_pran_no,
            'nps_scheme' =>$row->nps_scheme,
            'nps_transaction_type' =>$row->nps_transaction_type,
            'nps_date' =>$row->nps_date,
            'nps_qty' =>$row->nps_qty,
            'nps_purchase_price' =>$row->nps_purchase_price,
            'amt_invested' =>$row->nps_amt_invested
            
          );
      }
  
     $this->db->insert('nps_investment',$data);
   return $this->db->delete('temp_nps_investment',['id'=>$temp_stock_id,'user_id'=>$user_id]);
      
  } 

  public function del_to_temp_nps_investmenttable($temp_stock_id)
     {  $user_id=$this->session->userdata('id');
      return $this->db->delete('temp_nps_investment',['id'=>$temp_stock_id,'user_id'=>$user_id]);
     }

    
}

?>