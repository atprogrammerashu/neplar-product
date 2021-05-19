<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Model {

    public function add_group($array)
  {
     return $this->db->insert('user_group',$array);
  }

   public function add_portfolio($array)
  {
     return $this->db->insert('portfolio',$array);
  }	

    public function add_assets_detail($table_name,$array)
  {
    if($table_name=="Agricultural Land")
    {
     return $this->db->insert('agricultural_land',$array);
    }
    else if($table_name=="Art")
    {
      return $this->db->insert('art',$array);
    } 
      else if($table_name=="Bike")
    {
      return $this->db->insert('bike',$array);
    }
       else if($table_name=="Car")
    {
      return $this->db->insert('car',$array);
    }
       else if($table_name=="Commercial Land")
    {
      return $this->db->insert('commercial_land',$array);
    }
       else if($table_name=="Commercial Property")
    {
      return $this->db->insert('commercial_property',$array);
    }
       else if($table_name=="Commercial Vehicle")
    {
      return $this->db->insert('commercial_vehicle',$array);
    }
       else if($table_name=="Digital Property")
    {
      return $this->db->insert('digital_property',$array);
    }
       else if($table_name=="Gold")
    {
      return $this->db->insert('gold',$array);
    }
       else if($table_name=="House")
    {
      return $this->db->insert('house',$array);
    }
      else if($table_name=="Jewellery")
    {
      return $this->db->insert('jewellery',$array);
    }
      else if($table_name=="Platinum")
    {
      return $this->db->insert('platinum',$array);
    }
      else if($table_name=="Precious Stone")
    {
      return $this->db->insert('precious_stone',$array);
    }
      else if($table_name=="Silver")
    {
      return $this->db->insert('silver',$array);
    }

  }

   public function add_all_emergencydata($table_name,$array)
  {
    if($table_name=="Cash in Hand")
    {
     return $this->db->insert('cash_in_hand',$array);
    }
   else  if($table_name=="Cash in post office saving A/c")
    {
     return $this->db->insert('cash_in_post_office',$array);
    }
     else  if($table_name=="Cash in Saving A/C")
    {
     return $this->db->insert('cash_in_saving',$array);
    }
    else  if($table_name=="Cash in wallet")
    {
     return $this->db->insert('cash_in_wallet',$array);
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
    
      $output = '<div class="row">';
       
      foreach($q->result() as $row)
      {
       $output .= '<div class="col-md-6">
                       <input type="hidden" class="form-control" name="hide_portname" id="hide_portname" value='.$row->id.' >
                       <div class="form-group">
                         <label >D.O.B</label>
                             <span id="update_port_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                         <input type="date" value='.$row->port_date.' id="update_port_date" name="port_date" max="3000-12-31" min="1000-01-01" class="form-control">
                       </div>

                       <div class="form-group">
                          <label  class="col-form-label">Full Name:</label>
                           <span id="update_full_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                          <input type="text" class="form-control" value='.$row->full_name.' id="update_full_name" placeholder="">
                        </div>
                          <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Gender:</label>
                       <span id="update_port_gender_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                       <select class="form-control" name="port_gender" id="update_port_gender"  >
                        <option value='.$row->port_gender.'>'.$row->port_gender.'</option>
                       <option value="Male">Male</option>
                       <option value="Female">Female</option>
                       <option value="Other">Other</option>
                      </select>
                      </div>

                         <div class="form-group">
                          <label  class="col-form-label">Address:</label>
                           <span id="update_port_address_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                            <textarea class="form-control" value="" id="update_port_address" placeholder="" rows="3">'.$row->port_address.'</textarea>
                        </div>
                         <div class="form-group">
                          <label  class="col-form-label">City:</label>
                            <span id="update_port_city_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                          <input type="text" class="form-control" id="update_port_city" value='.$row->port_city.' placeholder="">
                        </div>
                                        

               </div>

               <div class="col-md-6" style="background-color: rgb(238,238,238);">
                       <div class="form-group">
                          <label  class="col-form-label">PRAN:</label>
                             <span id="update_pran_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                          <input type="text" class="form-control" id="update_pran" value='.$row->pran.' placeholder="">
                        </div>   
                        <div class="form-group">
                          <label  class="col-form-label">eInsurances No. :</label>
                          <span id="update_einsurance_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                          <input type="text" class="form-control" id="update_einsurance_no" value='.$row->einsurance_no.'  placeholder="">
                        </div>
                         <div class="form-group">
                          <label  class="col-form-label">Country:</label>
                           <span id="update_port_country_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                          <input type="text" class="form-control" id="update_port_country" value='.$row->port_country.' placeholder="">
                        </div>
                          <div class="form-group">
                          <label  class="col-form-label">Pin Code:</label>
                           <span id="update_pin_code_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                          <input type="text" class="form-control" id="update_pin_code" value='.$row->pin_code.'  placeholder="">
                        </div>
                        <div class="form-group">
                          <label  class="col-form-label">PAN:</label>
                           <span id="update_pan_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                          <input type="text" class="form-control" id="update_pan" value='.$row->pan.' placeholder="">
                        </div>

                      
             </div>

                        ';
                      
     
      }
     $output .= '</div>';
      
      return $output;
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

      public function add_epf($array)
  {        
     return $this->db->insert('epf_investment',$array); 
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

  public function add_fd($array)
  {        
     return $this->db->insert('fd_investment',$array); 
  }
   public function add_kisanvikaspatara($array)
  {        
     return $this->db->insert('kisanvikaspatra_investment',$array); 
  }

   public function add_mutual_fund($array)
  {
     return $this->db->insert('temp_mutual_fund',$array);
  } 
   public function add_ncd($array)
  {
     return $this->db->insert('ncd_investment',$array);
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

    public function add_stock($table_name,$array)
  { 
     if($table_name=="Stock / Share")
    {
      return $this->db->insert('stock_temp',$array);
    }
     else  if($table_name=="SGB / Sovereign Gold Bond")
    { 
     return $this->db->insert('sgb_temp',$array);
    }
    else  if($table_name=="Bond / Corporate Bond")
    {
     return $this->db->insert('bond_temp',$array);
    }
  } 

      public function delete_stock($stock_id)
  {  $user_id=$this->session->userdata('id'); 
      return $this->db->delete('stock',['id'=>$stock_id,'user_id'=>$user_id]);
  }

    public function temp_del_add_stock($temp_stock_id)
  {
      $user_id=$this->session->userdata('id');
    $q=$this->db->select('*')->from('stock_temp')->where(['user_id'=>$user_id,'id'=>$temp_stock_id])->get();
     foreach($q->result() as $row)
      {
          $data = array(
            'user_id' => $user_id,
            'portfolio_name' => $row->portfolio_name,
            'assets_name' => $row->assets_name,
            'sub_assets_name' => $row->sub_assets_name,
            'stock_name' => $row->stock_name,
            'stock_transaction_type' => $row->stock_transaction_type,
            'stock_broker' =>$row->stock_broker,
            'stock_date' =>$row->stock_date,
            'stock_contract_no' =>$row->stock_contract_no,
            'stock_settlement_no' =>$row->stock_settlement_no,
            'stock_qty' =>$row->stock_qty,
            'stock_purchase_price' =>$row->stock_purchase_price,
            'stock_amt_invested' =>$row->stock_amt_invested,
            'stock_brokerage' =>$row->stock_brokerage,
            'stock_net_rate' =>$row->stock_net_rate,
            'stock_tax_value' =>$row->stock_tax_value,
            'stock_cgst' =>$row->stock_cgst,
            'stock_sgst' =>$row->stock_sgst,
            'stock_igst' =>$row->stock_igst,
            'stock_exchange_transaction' =>$row->stock_exchange_transaction,
            'stock_stt' =>$row->stock_stt,
            'stock_sebi_fee' =>$row->stock_sebi_fee,
            'stock_stamp_duty' =>$row->stock_stamp_duty,
            'stock_net_amt' =>$row->stock_net_amt
          );
      }
  
     $this->db->insert('stock',$data);
   return $this->db->delete('stock_temp',['id'=>$temp_stock_id,'user_id'=>$user_id]);
      
  } 

   public function temp_stock_del_record($temp_stock_id)
     {  $user_id=$this->session->userdata('id');
      return $this->db->delete('stock_temp',['id'=>$temp_stock_id,'user_id'=>$user_id]);
     }


  public function temp_del_add_bond($temp_stock_id)
  {
      $user_id=$this->session->userdata('id');
    $q=$this->db->select('*')->from('bond_temp')->where(['user_id'=>$user_id,'id'=>$temp_stock_id])->get();
     foreach($q->result() as $row)
      {
          $data = array(
            'user_id' => $user_id,
            'portfolio_name' => $row->portfolio_name,
            'assets_name' => $row->assets_name,
            'sub_assets_name' => $row->sub_assets_name,
            'stock_name' => $row->stock_name,
            'stock_transaction_type' => $row->stock_transaction_type,
            'stock_broker' =>$row->stock_broker,
            'stock_date' =>$row->stock_date,
            'stock_contract_no' =>$row->stock_contract_no,
            'stock_settlement_no' =>$row->stock_settlement_no,
            'stock_qty' =>$row->stock_qty,
            'stock_purchase_price' =>$row->stock_purchase_price,
            'stock_amt_invested' =>$row->stock_amt_invested,
            'stock_brokerage' =>$row->stock_brokerage,
            'stock_net_rate' =>$row->stock_net_rate,
            'stock_tax_value' =>$row->stock_tax_value,
            'stock_cgst' =>$row->stock_cgst,
            'stock_sgst' =>$row->stock_sgst,
            'stock_igst' =>$row->stock_igst,
            'stock_exchange_transaction' =>$row->stock_exchange_transaction,
            'stock_stt' =>$row->stock_stt,
            'stock_sebi_fee' =>$row->stock_sebi_fee,
            'stock_stamp_duty' =>$row->stock_stamp_duty,
            'stock_net_amt' =>$row->stock_net_amt
          );
      }
  
     $this->db->insert('bond',$data);
   return $this->db->delete('bond_temp',['id'=>$temp_stock_id,'user_id'=>$user_id]);
      
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
      $user_id=$this->session->userdata('id');
    $q=$this->db->select('*')->from('temp_mutual_fund')->where(['user_id'=>$user_id,'id'=>$temp_stock_id])->get();
     foreach($q->result() as $row)
      {
          $data = array(
            'user_id' => $user_id,
            'portfolio_name' => $row->portfolio_name,
            'assets_name' => $row->assets_name,
            'sub_assets_name' => $row->sub_assets_name,
            'mutual_company_name' => $row->mutual_company_name,
            'mutual_scheme' =>$row->mutual_scheme,
            'mutual_folio_no' =>$row->mutual_folio_no,
            'mutual_transaction' =>$row->mutual_transaction,
            'mutual_type' =>$row->mutual_type,
            'mutual_sip_date' =>$row->mutual_sip_date,
            'mutual_date' =>$row->mutual_date,
            'mutual_quantity' =>$row->mutual_quantity,
            'mutual_nav' =>$row->mutual_nav,
            'mutual_amt_invested' =>$row->mutual_amt_invested,
            'mutual_stamp_charge' =>$row->mutual_stamp_charge,
            'mutual_exit_load' =>$row->mutual_exit_load,
            'mutual_advisor' =>$row->mutual_advisor
            
          );
      }
  
     $this->db->insert('mutual_fund_investment',$data);
   return $this->db->delete('temp_mutual_fund',['id'=>$temp_stock_id,'user_id'=>$user_id]);
      
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
            'sub_assets_name' => $row->sub_assets_name,
            'nps_opening_date' => $row->nps_opening_date,
            'nps_type' =>$row->nps_type,
            'nps_pran_no' =>$row->nps_pran_no,
            'nps_scheme' =>$row->nps_scheme,
            'nps_transaction_type' =>$row->nps_transaction_type,
            'nps_date' =>$row->nps_date,
            'nps_qty' =>$row->nps_qty,
            'nps_purchase_price' =>$row->nps_purchase_price,
            'nps_amt_invested' =>$row->nps_amt_invested
            
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