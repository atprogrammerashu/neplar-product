<?php
class Chart extends CI_Model { 

	public function getTotalCurrentValue()
	{   
		$this->load->model('CommonModel');
         $Stock_total_current_value =$this->CommonModel->global_getSumdata("stock_details","stock","current_value","stock_name");
          $MutualEquitytotal_current_value =$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","current_value","mutual_scheme","Equity");
           $MutualDepttotal_current_value =$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","current_value","mutual_scheme","Debt");
           $Bondtotal_current_value =$this->CommonModel->global_getSumdata("bond_ltp","bond","current_value","stock_name");
           $Alltotal = $Stock_total_current_value + $MutualEquitytotal_current_value + $MutualDepttotal_current_value + $Bondtotal_current_value ;
           return number_format($Alltotal, 2, '.', ',');

	}
	
	public function fetch_all_data()
	{
		$this->load->model('CommonModel');
		$id=$this->session->userdata('id');
		$data = [];
		$All_assets = array("Insurance","Mutual Funds (Equity)", "Stocks" ,"Mutual Funds (Debt)", "Traded Bonds");
		
		foreach ($All_assets as $value)
		{
			if($value == 'Stocks')
			{
				$tname = 'stock';
				$data1 = $this->CommonModel->fetch_stock_share_subdata($tname);
			    $total_stock_qty=$this->CommonModel->global_getSumdata("stock_details","stock","stock_qty","stock_name");
			    $total_amt_invested=$this->CommonModel->global_getSumdata("stock_details","stock","amt_invested","stock_name");
			    $total_overall_gain=$this->CommonModel->global_getSumdata("stock_details","stock","overall_gain","stock_name");
			    $total_gain_percentage =$this->CommonModel->global_getSumdata("stock_details","stock","gain_percentage","stock_name");
			    $total_current_value =$this->CommonModel->global_getSumdata("stock_details","stock","current_value","stock_name");
			    $total_holding =$this->CommonModel->global_getSumdata("stock_details","stock","holding","stock_name");

				$data[] = array(
					"stock_name" => "Stock / Share",
					"stock_qty" => $total_stock_qty,
					"amt_invested" => $total_amt_invested ,				
					"overall_gain" => $total_overall_gain,
					"gain_percentage" => $total_gain_percentage."%",
					"current_value" => $total_current_value,
					"holding" => $total_holding." %",
					"kk" => $data1,
				);
			}
			
			else if($value == 'Mutual Funds (Equity)')
			{
				$tname = 'mutual_fund_investment_equity';
				$data1 = $this->CommonModel->fetch_stock_share_subdata($tname);

			   $total_mutual_quantity=$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","mutual_quantity","mutual_scheme","Equity");
			    $total_amt_invested=$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","amt_invested","mutual_scheme","Equity");
			    $total_overall_gain=$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","overall_gain","mutual_scheme","Equity");
			    $total_gain_percentage =$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","gain_percentage","mutual_scheme","Equity");
			    $total_current_value =$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","current_value","mutual_scheme","Equity");
			    $total_holding =$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","holding","mutual_scheme","Equity");
				
				$data[] = array(
					"stock_name" => "Mutual Funds (Equity)",
					"stock_qty" => $total_mutual_quantity,
					"amt_invested" => $total_amt_invested ,
				
					"overall_gain" => $total_overall_gain,
					"gain_percentage" => $total_gain_percentage."%",
					"current_value" => $total_current_value,
					"holding" => $total_holding." %",
					"kk" => $data1
				);
			}
			else if($value == 'Mutual Funds (Debt)')
			{
				$tname = 'mutual_fund_investment_debt';
				$data1 =  $this->CommonModel->fetch_stock_share_subdata($tname);
				 $total_mutual_quantity=$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","mutual_quantity","mutual_scheme","Debt");
			    $total_amt_invested=$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","amt_invested","mutual_scheme","Debt");
			    $total_overall_gain=$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","overall_gain","mutual_scheme","Debt");
			    $total_gain_percentage =$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","gain_percentage","mutual_scheme","Debt");
			    $total_current_value =$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","current_value","mutual_scheme","Debt");
			    $total_holding =$this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","holding","mutual_scheme","Debt");

				$data[] = array(
					"stock_name" => "Mutual Funds (Debt)",
					"stock_qty" => $total_mutual_quantity,
					"amt_invested" => $total_amt_invested ,
				
					"overall_gain" => $total_overall_gain,
					"gain_percentage" => $total_gain_percentage."%",
					"current_value" => $total_current_value,
					"holding" => $total_holding." %",
					"kk" => $data1
				);
			}
			else if($value == 'Traded Bonds')
			{
				$tname = 'bond';
				$data1 = $this->CommonModel->fetch_stock_share_subdata($tname);

				 $total_bond_qty=$this->CommonModel->global_getSumdata("bond_ltp","bond","stock_qty","stock_name");
			    $total_amt_invested=$this->CommonModel->global_getSumdata("bond_ltp","bond","amt_invested","stock_name");
			    $total_overall_gain=$this->CommonModel->global_getSumdata("bond_ltp","bond","overall_gain","stock_name");
			    $total_gain_percentage =$this->CommonModel->global_getSumdata("bond_ltp","bond","gain_percentage","stock_name");
			    $total_current_value =$this->CommonModel->global_getSumdata("bond_ltp","bond","current_value","stock_name");
			    $total_holding =$this->CommonModel->global_getSumdata("bond_ltp","bond","holding","stock_name");
				
				$data[] = array(
					"stock_name" => "Traded Bonds",
					"stock_qty" => $total_bond_qty,
					"amt_invested" => $total_amt_invested ,	
	                "overall_gain" => $total_overall_gain,
					"gain_percentage" => $total_gain_percentage."%",
					"current_value" => $total_current_value,
					"holding" => $total_holding." %",
					"kk" => $data1
				);
			}
		}
		$result = array(
			"recordsTotal" => count($All_assets),
			"recordsFiltered" => count($All_assets),
			"data" => $data
		);
		echo json_encode($result);
		
	}

  public function fetch_piChart_stockData($chart_value)
  {
  	  $data = [];
  	 $id=$this->session->userdata('id');
  	 $this->load->model('CommonModel');
  	 switch ($chart_value) {
  	 	case 'Stock / Share':
  	 		  $q = $this->CommonModel->Global_joinquery('stock_details','stock','stock_name');
  	 		   foreach($q->result() as $value)
		         {
		        	$data[] = array("stock_name" => $value->stock_name,
							 "holding" => $value->holding
							);
		         }
  	 		break;
  	 	case 'Mutual Funds (Equity)':
  	 		  $q = $this->CommonModel->Common_queryForMutualInvestment('mutual_scheme','mutual_fund_investment','mutual_scheme','Equity');
  	 		    foreach($q->result() as $value)
		         {
		        	$data[] = array("stock_name" => $value->mutual_scheme,
							 "holding" => $value->holding
							);
		         }
  	 		break;
  	 	case 'Mutual Funds (Debt)':
  	 		  $q = $this->CommonModel->Common_queryForMutualInvestment('mutual_scheme','mutual_fund_investment','mutual_scheme','Debt');
  	 		    foreach($q->result() as $value)
		         {
		        	$data[] = array("stock_name" => $value->mutual_scheme,
							 "holding" => $value->holding
							);
		         }
  	 		break;	
  	 	case 'Traded Bonds':
  	 		  $q = $this->CommonModel->Common_query_bond('bond_ltp','bond','stock_name');
  	 		    foreach($q->result() as $value)
		         {
		        	$data[] = array("stock_name" => $value->stock_name,
							 "holding" => $value->holding
							);
		         }
  	 		break;		
  	 	
  	 	default:
  	 		echo "No case executed...!";
  	 		break;
  	 }
    
     
 if($data == null)
     { 
       $data[] = array("stock_name" => "No Data Found",
							 "holding" => "1"
							);
       echo json_encode($data);
     }
     else{echo json_encode($data);}	 	 
  }


public function showPortfolioWise_data($Assets_value, $portfoliowise_name)
{
       $this->load->model('CommonModel');
		$data = [];
		
		if($Assets_value == 'Stock / Share')
			{
				
				$data1 = $this->CommonModel->Global_joinquery_PortfolioWise('stock_details','stock','stock_name',$portfoliowise_name);
			   
			     foreach ($data1->result() as $value)
					{
			
						$data[] = array(
							  $value->stock_name,
							 $value->stock_qty,
							 $value->amt_invested ,				
							 $value->overall_gain,
							$value->gain_percentage,
							 $value->current_value,
							 $value->holding
							 
						
						);
			        }

				     $result = array(
						"recordsTotal" => $data1->num_rows(),
						"recordsFiltered" => $data1->num_rows(),
						"data" => $data
					);
					
		   }

		   else	if($Assets_value == 'Mutual Funds (Equity)')
			{
				
				$data1 = $this->CommonModel->Common_queryForMutualInvestment_PortfolioWise('mutual_scheme','mutual_fund_investment','mutual_scheme','Equity',$portfoliowise_name);
			   
			     foreach ($data1->result() as $value)
					{
			
						$data[] = array(
							  $value->mutual_scheme,
							 $value->mutual_quantity,
							 $value->amt_invested ,				
							 $value->overall_gain,
							 $value->gain_percentage,
							 $value->current_value,
							 $value->holding
						
						);
			        }

				     $result = array(
						"recordsTotal" => $data1->num_rows(),
						"recordsFiltered" => $data1->num_rows(),
						"data" => $data
					);
					
		   }
		    else if($Assets_value == 'Mutual Funds (Debt)')
			{
			
				$data1 = $this->CommonModel->Common_queryForMutualInvestment_PortfolioWise('mutual_scheme','mutual_fund_investment','mutual_scheme','Debt',$portfoliowise_name);
			   
			     foreach ($data1->result() as $value)
					{
			
						$data[] = array(
							  $value->mutual_scheme,
							 $value->mutual_quantity,
							 $value->amt_invested ,				
							 $value->overall_gain,
							 $value->gain_percentage,
							 $value->current_value,
							 $value->holding
						
						);
			        }

				     $result = array(
						"recordsTotal" => $data1->num_rows(),
						"recordsFiltered" => $data1->num_rows(),
						"data" => $data
					);
					
		   }
			else if($Assets_value == 'Traded Bonds')
			{
				
				$data1 = $this->CommonModel->Common_query_bond_PortfolioWise('bond_ltp','bond','stock_name', $portfoliowise_name);
			   
			     foreach ($data1->result() as $value)
					{
			
						$data[] = array(
							  $value->stock_name,
							 $value->stock_qty,
							 $value->amt_invested ,				
							 $value->overall_gain,
							 $value->gain_percentage,
							 $value->current_value,
							 $value->holding
						
						);
			        }

				     $result = array(
						"recordsTotal" => $data1->num_rows(),
						"recordsFiltered" => $data1->num_rows(),
						"data" => $data
					);
					
		   }
		
		
		
		echo json_encode($result);

}



public function fetch_piChart_PortfolioWise($Assets_value, $portfoliowise_name)
  {
  	 $data = [];
  	 $id=$this->session->userdata('id');
  	 $this->load->model('CommonModel');
  	 switch ($Assets_value) {
  	 	case 'Stock / Share':
  	 		  $q = $this->CommonModel->Global_joinquery_PortfolioWise('stock_details','stock','stock_name',$portfoliowise_name);
  	 		   foreach($q->result() as $value)
		         {
		        	$data[] = array("stock_name" => $value->stock_name,
							 "holding" => $value->holding
							);
		         }
  	 		break;
  	 	case 'Mutual Funds (Equity)':
  	 		  $q = $this->CommonModel->Common_queryForMutualInvestment_PortfolioWise('mutual_scheme','mutual_fund_investment','mutual_scheme','Equity',$portfoliowise_name);
  	 		    foreach($q->result() as $value)
		         {
		        	$data[] = array("stock_name" => $value->mutual_scheme,
							 "holding" => $value->holding
							);
		         }
  	 		break;
  	 	case 'Mutual Funds (Debt)':
  	 		  $q = $this->CommonModel->CommonModel->Common_queryForMutualInvestment_PortfolioWise('mutual_scheme','mutual_fund_investment','mutual_scheme','Debt',$portfoliowise_name);
  	 		    foreach($q->result() as $value)
		         {
		        	$data[] = array("stock_name" => $value->mutual_scheme,
							 "holding" => $value->holding
							);
		         }
  	 		break;	
  	 	case 'Traded Bonds':
  	 		  $q = $this->CommonModel->Common_query_bond_PortfolioWise('bond_ltp','bond','stock_name', $portfoliowise_name);
  	 		    foreach($q->result() as $value)
		         {
		        	$data[] = array("stock_name" => $value->stock_name,
							 "holding" => $value->holding
							);
		         }
  	 		break;		
  	 	
  	 	default:
  	 		echo "No case executed...!";
  	 		break;
  	     }
    
    if($data == null)
     { 
       $data[] = array("stock_name" => "No Data Found",
							 "holding" => "1"
							);
       echo json_encode($data);
     }
     else{echo json_encode($data);}	 

     
  }

  //On load chart ...

  public function fetch_onload_piechart()
	{
		$this->load->model('CommonModel');
		$id=$this->session->userdata('id');
		$data = [];
	
		$All_assets =  array('Stocks / Shares' =>  $this->CommonModel->global_getSumdata("stock_details","stock","holding","stock_name") , 
	                         'Mutual Funds (Equity)' => $this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","holding","mutual_scheme","Equity"),
	                         'Mutual Funds (Debt)' =>  $this->CommonModel->Typewise_MutualInvestmentSumdata("mutual_scheme","mutual_fund_investment","holding","mutual_scheme","Debt"),
	                         'Traded Bonds' => $this->CommonModel->global_getSumdata("bond_ltp","bond","holding","stock_name")
	                          );
  

		foreach ($All_assets as $key=>$val)
		{
			  $data[] = array("stock_name" => $key,
							 "holding" => $val );
		 }

	 if($data == null)
     { 
       $data[] = array("stock_name" => "No Data Found",
							 "holding" => "1"
							);
       echo json_encode($data);
     }
     else{echo json_encode($data);}	 

     
  }







}
?>