<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolios extends CI_Model {


  // public function get_totalqty($table_name,$company_name,$port_name)
   //   {  $id=$this->session->userdata('id');

   //      $query = $this->db->select('*,SUM(`stock_qty`) as total_plus, SUM(amt_invested) as totalBuy_invested')->from($table_name)->where(['stock_name'=>$company_name,'stock_transaction_type'=>'Buy','user_id'=>$id])->get();  
   //      foreach ($query->result() as $value)
   //   { $plus_amt = $value->total_plus; $totalBuy_invested=$value->totalBuy_invested;}

   //      $query2 = $this->db->select('*,SUM(`stock_qty`) as total_minus,SUM(amt_invested) as totalSell_invested')->from($table_name)->where(['stock_name'=>$company_name,'stock_transaction_type'=>'Sell','user_id'=>$id])->get();  
   //      foreach ($query2->result() as $value2)
   //   {$minus_amt = $value2->total_minus; $totalSell_invested=$value2->totalSell_invested;}

   //      $total_qty = $plus_amt - $minus_amt ;
   //      $total_amtinvested = $totalBuy_invested - $totalSell_invested;
   //      return  array($total_qty,$total_amtinvested);
   //   }

      public function get_subdetails_query($table1,$table2,$common_col_name,$company_name,$port_name)
     {
        
      $user_id=$this->session->userdata('id'); 
     return $q =  $this->db->query('SELECT a.current_price as ltp, b.stock_transaction_type, b.stock_date, b.stock_qty, b.amt_invested, b.stock_purchase_price,b.stock_name, b.stock_purchase_price, b.stock_qty*b.stock_purchase_price as amount
                              FROM '.$table1.' as a 
                              JOIN '.$table2.' as b 
                              WHERE b.user_id = '.$user_id.' AND b.'.$common_col_name.' = "'.$company_name.'" AND b.portfolio_name = "'.$port_name.'" AND b.'.$common_col_name.' = a.'.$common_col_name.' ORDER BY b.stock_date  ASC');
     
     }


   public function get_subdetails($table_name,$company_name,$port_name)
     {  
        
        $amt_invested = 0;
        $cumulative_qty = 0;
        $data1 = [];
        $user_id=$this->session->userdata('id'); 
       if($table_name=='stock')
       {
        $data = $this->Portfolios->get_subdetails_query('stock_details','stock','stock_name',$company_name,$port_name);
      
                 foreach ($data->result() as $val)
                 {
                     
                       if($val->stock_transaction_type=='Sell' && $val->stock_name == $company_name && $cumulative_qty > $val->stock_qty)
                    {
                        $amt_invested = ($amt_invested - $val->amount);
                        $cumulative_qty =  abs($cumulative_qty - $val->stock_qty);
                         $data1[] = array( 
                          "transaction_type" => $val->stock_transaction_type,
                           "date" =>  $val->stock_date,
                           "qty" =>   $val->stock_qty,
                           "purchase_price" =>   $val->stock_purchase_price,
                           "amount" => $val->amount,
                           "amt_invested" =>  $amt_invested,
                           "cumulative_qty" => $cumulative_qty
                        );
                    }  
                    else
                    {
                      $amt_invested = ($amt_invested + $val->amount);
                      $cumulative_qty =  abs($cumulative_qty + $val->stock_qty);
                         $data1[] = array( 
                         "transaction_type" =>   $val->stock_transaction_type,
                         "date" => $val->stock_date,
                         "qty" =>  $val->stock_qty,
                        "purchase_price" =>   $val->stock_purchase_price,
                        "amount" => $val->amount,
                         "amt_invested" =>  $amt_invested,
                         "cumulative_qty" => $cumulative_qty
                        );
                    }

                  }
       }

      return $data1;
     } 


  public function get_data($tname1,$tanme2,$col_name,$common_col_name,$port_name,$stock_name)
    {
    $user_id=$this->session->userdata('id');

     return $query = $this->db->query('SELECT SUM(b.'.$col_name.') as total_qty,SUM(b.amt_invested) as total_amt_invested, SUM(a.current_price) as total_ltp, SUM(a.previous_day_price) as total_previous_day_nav, a.current_price as ltp, a.previous_day_price as previous_day_nav, b.'.$common_col_name.'
                                FROM '.$tname1.' as a
                                 JOIN '.$tanme2.' as b  
                                 WHERE b.portfolio_name = "'.$port_name.'" AND b.'.$common_col_name.' = "'.$stock_name.'" AND b.user_id = '.$user_id.' AND b.'.$common_col_name.' = a.'.$common_col_name.'');

  
        }




public function calculate($tname1,$tanme2,$col_name,$common_col_name,$port_name,$stock_name)
{
   
   $q = $this->Portfolios->get_data($tname1,$tanme2,$col_name,$common_col_name,$port_name,$stock_name);
  
    foreach ($q->result() as $value)
    { 
      $data1 = $this->get_subdetails($tanme2,$value->stock_name,$port_name);
      $value1 = end( $data1 );
      $cumulative_qty = $value1['cumulative_qty'];
      $amt_invested =   $value1['amt_invested'];
      $ltp = $value->ltp;
      $total_ltp = $value->total_ltp;
      $previous_day_nav = $value->previous_day_nav;
      $total_qty = $value->total_qty;
      $total_amt_invested = $value->total_amt_invested;
     // $total_current_value = $value->total_current_value;
      $total_current_value = $total_ltp * $cumulative_qty;
      $today_gain = ($total_ltp * $cumulative_qty) - ($previous_day_nav * $cumulative_qty);
      $data1 = ($previous_day_nav * $cumulative_qty);
      if ($data1 > 0) 
      {
        $today_gain_percent = ($today_gain * (100)) / $data1 ;
      }
      else
      {
        $today_gain_percent =0;

      }


      $notional_gain = ($ltp * $cumulative_qty)-($amt_invested);
      $data2 = ($amt_invested);
      if ($data2 > 0) 
      {
         $notional_gain_percent = ($notional_gain * (100)) / $data2 ;
      }
      else
      {
        $notional_gain_percent = 0;
      }
     
    }
    return [$today_gain, $today_gain_percent, $notional_gain, $notional_gain_percent,$total_current_value,$amt_invested,$cumulative_qty];

}

 public function PortfolioWise_join($table1,$table2,$common_col,$portfolio_name)
    {
      $user_id=$this->session->userdata('id');
          return $this->db->query('SELECT * FROM '.$table1.' as a JOIN '.$table2.' as b WHERE b.user_id = '.$user_id.' AND b.portfolio_name = "'.$portfolio_name.'" AND b.'.$common_col.' = a.'.$common_col.' GROUP BY b.'.$common_col.' ');
    }


	public function displayportfolio($subassets,$port_name)
	{  
      $tname;
      $data = [];
      $id=$this->session->userdata('id');
      if($subassets == 'Stock / Share')
      {  $tname="stock";
        $this->load->model('Portfolios');
        $query = $this->Portfolios->PortfolioWise_join('stock_details','stock','stock_name',$port_name);
          foreach ($query->result() as $value)
          {           
            $data1 = $this->get_subdetails($tname,$value->stock_name,$port_name);

            $q = $this->Portfolios->get_data("stock_details","stock","stock_qty","stock_name",$port_name,$value->stock_name);
[$today_gain, $today_gain_percent, $notional_gain, $notional_gain_percent,$total_current_value,$amt_invested,$cumulative_qty] = $this->Portfolios->calculate("stock_details","stock","stock_qty","stock_name",$port_name,$value->stock_name);
            foreach ($q->result() as $row)
               {
                  $data[] = array(
                  "name" =>   $value->stock_name,
                  "qty" =>  $cumulative_qty,       
                  "avg_price" => "10",
                  "amt_invested" =>  $amt_invested,
                  "ltp" =>  $row->total_ltp,
                  "current_value" =>$total_current_value,
                  "today_gain" => $today_gain.'/'. number_format($today_gain_percent,2,'.',','),
                  "national_gain" => $notional_gain.'/'. number_format($notional_gain_percent,2,'.',','),
                  "kk" => $data1
                 );         

              }

              
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
 