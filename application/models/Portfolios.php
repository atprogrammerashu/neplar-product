<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolios extends CI_Model {


   public function get_totalqty($table_name,$company_name)
     {  $id=$this->session->userdata('id');
        $query = $this->db->select('*,SUM(`stock_qty`) as total_plus, SUM(amt_invested) as totalBuy_invested')->from($table_name)->where(['stock_name'=>$company_name,'stock_transaction_type'=>'Buy','user_id'=>$id])->get();  
        foreach ($query->result() as $value)
     { $plus_amt = $value->total_plus; $totalBuy_invested=$value->totalBuy_invested;}

        $query2 = $this->db->select('*,SUM(`stock_qty`) as total_minus,SUM(amt_invested) as totalSell_invested')->from($table_name)->where(['stock_name'=>$company_name,'stock_transaction_type'=>'Sell','user_id'=>$id])->get();  
        foreach ($query2->result() as $value2)
     {$minus_amt = $value2->total_minus; $totalSell_invested=$value2->totalSell_invested;}

        $total_qty = $plus_amt - $minus_amt ;
        $total_amtinvested = $totalBuy_invested - $totalSell_invested;
        return  array($total_qty,$total_amtinvested);
     }

   public function get_subdetails($table_name,$company_name)
     {  
         $data1 = [];
          $user_id=$this->session->userdata('id'); 
       if($table_name=='stock' || $table_name=='bond' || $table_name== 'sgb_temp')
       {
         $q=$this->db->select('*')->from($table_name)->where(['stock_name'=>$company_name,'user_id'=>$user_id])->get();
               
                 foreach ($q->result() as $val)
                 {
                    if($val->stock_transaction_type=='Sell')
                    {
                         $data1[] = array( 
                          "transaction_type" =>   $val->stock_transaction_type,
                         "date" =>  $val->stock_date,
                        "qty" =>    "- ".$val->stock_qty,
                         "price" =>    "10",
                        "amt_invested" =>    $val->amt_invested,
                         "purchase_amt" => $val->stock_purchase_price
                        );
                    }
                    else{
                         $data1[] = array( 
                          "transaction_type" =>   $val->stock_transaction_type,
                         "date" =>  $val->stock_date,
                        "qty" =>    $val->stock_qty,
                         "price" =>    "10",
                        "amt_invested" =>    $val->amt_invested,
                         "purchase_amt" => $val->stock_purchase_price
                        );
                    }
                 }
       }
       elseif ($table_name=='mutual_fund_investment')
       {
          $q=$this->db->select('*')->from($table_name)->where(['mutual_company_name'=>$company_name,'user_id'=>$user_id])->get();
               
                 foreach ($q->result() as $val)
                 {
                         $data1[] = array( 
                          "transaction_type" =>   $val->mutual_transaction,
                         "date" =>  $val->mutual_date,
                        "qty" =>    $val->mutual_quantity,
                         "price" =>    "10",
                        "amt_invested" =>    $val->amt_invested,
                         "purchase_amt" => "??"
                        );
                 }
       }
       elseif ($table_name=='nps_investment')
       {
          $q=$this->db->select('*')->from($table_name)->where(['nps_scheme'=>$company_name,'user_id'=>$user_id])->get();
               
                 foreach ($q->result() as $val)
                 {
                         $data1[] = array( 
                          "transaction_type" =>   $val->nps_transaction_type,
                         "date" =>  $val->nps_date,
                        "qty" =>    $val->nps_qty,
                         "price" =>    "10",
                        "amt_invested" =>    $val->amt_invested,
                         "purchase_amt" => $val->nps_purchase_price
                        );
                 }
       }
      elseif ($table_name=='ncd_investment')
       {
          $q=$this->db->select('*')->from($table_name)->where(['ncd_name'=>$company_name,'user_id'=>$user_id])->get();
               
                 foreach ($q->result() as $val)
                 {
                         $data1[] = array( 
                          "transaction_type" =>   $val->ncd_transaction_type,
                         "date" =>  $val->ncd_date,
                        "qty" =>    $val->ncd_quantity,
                         "price" =>    "10",
                        "amt_invested" =>    $val->amt_invested,
                         "purchase_amt" => $val->ncd_purchase_price
                        );
                 }
       }
       elseif ($table_name=='private_equity_investment')
       {
          $q=$this->db->select('*')->from($table_name)->where(['pe_asset_name'=>$company_name,'user_id'=>$user_id])->get();
               
                 foreach ($q->result() as $val)
                 {
                         $data1[] = array( 
                          "transaction_type" =>   $val->pe_transaction_type,
                         "date" =>  $val->pe_date,
                        "qty" =>    $val->pe_qty_purchase,
                         "price" =>    "10",
                        "amt_invested" =>    $val->amt_invested,
                         "purchase_amt" => $val->pe_purchase_rate
                        );
                 }
       }
             
       return $data1;
     } 


	public function displayportfolio($subassets,$port_name)
	{   $tname;
      $current_value = "10,000";
      $today_gain = "10,000";
      $national_gain = "10,0000";
      $data = [];
      $id=$this->session->userdata('id');

      if($subassets == 'Stock / Share')
      {  $tname="stock";
          $query = $this->db->select('*')->from($tname)->where(['portfolio_name'=>$port_name,'user_id'=>$id])->group_by('stock_name')->get();
       
          foreach ($query->result() as $value)
          {           
            $data1 = $this->get_subdetails($tname,$value->stock_name);
            $data2 = $this->get_totalqty($tname,$value->stock_name);
               $data[] = array(
             
            "name" =>   $value->stock_name,
            "qty" =>  $data2[0],       
             "avg_price" => "10",
             "amt_invested" =>  $data2[1],
             "ltp" =>  "",
              "current_value" => $current_value,
               "today_gain" => $today_gain,
              "national_gain" => $national_gain,
             "kk" => $data1
         
                 );         
          }

      }
      else if($subassets == 'Bond / Corporate Bond')
       {
          $tname="bond";
         $query = $this->db->select('*')->from($tname)->where(['portfolio_name'=>$port_name,'user_id'=>$id])->group_by('stock_name')->get();
          $data1 = $this->get_subdetails($tname,$value->stock_name);
           
               $data[] = array(
             
            "name" =>   $value->stock_name,
            "qty" =>  $value->stock_qty,       
             "avg_price" => "10",
             "amt_invested" =>  $value->amt_invested,
             "ltp" =>  "",
              "current_value" => $current_value,
               "today_gain" => $today_gain,
              "national_gain" => $national_gain,
             "kk" => $data1
         
                 );         
          

       }
      else if($subassets == 'MF / Mutual Fund')
        {
          $tname="mutual_fund_investment";
            $query = $this->db->select('*')->from($tname)->where(['portfolio_name'=>$port_name,'user_id'=>$id])->group_by('mutual_company_name')->get();
       
          foreach ($query->result() as $value)
          {           
            $data1 = $this->get_subdetails($tname,$value->mutual_company_name);
           
               $data[] = array(
             
            "name" =>   $value->mutual_company_name,
            "qty" =>  $value->mutual_quantity,       
             "avg_price" => "10",
             "amt_invested" =>  $value->amt_invested,
             "ltp" =>  "",
              "current_value" => $current_value,
               "today_gain" => $today_gain,
              "national_gain" => $national_gain,
             "kk" => $data1
         
                 );         
          }

        }
      else if($subassets == 'NPS / National Pension System')
        {
           $tname="nps_investment";
           $query = $this->db->select('*')->from($tname)->where(['portfolio_name'=>$port_name,'user_id'=>$id])->group_by('nps_scheme')->get();
       
          foreach ($query->result() as $value)
          {           
            $data1 = $this->get_subdetails($tname,$value->nps_scheme);
           
               $data[] = array(
             
            "name" =>   $value->nps_scheme,
            "qty" =>  $value->nps_qty,       
             "avg_price" => "10",
             "amt_invested" =>  $value->amt_invested,
             "ltp" =>  "",
              "current_value" => $current_value,
               "today_gain" => $today_gain,
              "national_gain" => $national_gain,
             "kk" => $data1
         
                 );         
          }
        }
      else if($subassets == 'NCD / Debenture')
       {
          $tname="ncd_investment";
          $query = $this->db->select('*')->from($tname)->where(['portfolio_name'=>$port_name,'user_id'=>$id])->group_by('ncd_name')->get();
       
          foreach ($query->result() as $value)
          {           
            $data1 = $this->get_subdetails($tname,$value->ncd_name);
           
               $data[] = array(
             
            "name" =>   $value->ncd_name,
            "qty" =>  $value->ncd_quantity,       
             "avg_price" => "10",
             "amt_invested" =>  $value->amt_invested,
             "ltp" =>  "",
              "current_value" => $current_value,
               "today_gain" => $today_gain,
              "national_gain" => $national_gain,
             "kk" => $data1
         
                 );         
          }
       }
      else if($subassets == 'Private Equity / Startup')
        {
           $tname="private_equity_investment"; 
           $query = $this->db->select('*')->from($tname)->where(['portfolio_name'=>$port_name,'user_id'=>$id])->group_by('pe_asset_name')->get();
       
          foreach ($query->result() as $value)
          {           
            $data1 = $this->get_subdetails($tname,$value->pe_asset_name);
           
               $data[] = array(
             
            "name" =>   $value->pe_asset_name,
            "qty" =>  $value->pe_qty_purchase,       
             "avg_price" => "10",
             "amt_invested" =>  $value->amt_invested,
             "ltp" =>  "",
              "current_value" => $current_value,
               "today_gain" => $today_gain,
              "national_gain" => $national_gain,
             "kk" => $data1
         
                 );         
          }
        }
      else if($subassets == 'SGB / Sovereign Gold Bond')
       {
          $tname="sgb_temp"; 
            $query = $this->db->select('*')->from($tname)->where(['portfolio_name'=>$port_name,'user_id'=>$id])->group_by('stock_name')->get();
       
          foreach ($query->result() as $value)
          {           
            $data1 = $this->get_subdetails($tname,$value->stock_name);
           
               $data[] = array(
             
            "name" =>   $value->stock_name,
            "qty" =>  $value->stock_qty,       
             "avg_price" => "10",
             "amt_invested" =>  $value->amt_invested,
             "ltp" =>  "",
              "current_value" => $current_value,
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






}
 