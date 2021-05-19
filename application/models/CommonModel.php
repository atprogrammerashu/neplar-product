<?php 
	
	class CommonModel extends CI_Model
	{

		//Methods for portfolio-wise data.....
		public function Global_joinquery_PortfolioWise($table1,$table2,$common_col,$portfolio_name)
		{
			$user_id=$this->session->userdata('id');
	        return $this->db->query('SELECT * FROM '.$table1.' as a JOIN '.$table2.' as b WHERE b.user_id = '.$user_id.' AND b.portfolio_name = "'.$portfolio_name.'" AND b.'.$common_col.' = a.'.$common_col.'');
		}

        public function Common_queryForMutualInvestment_PortfolioWise($table1,$table2,$common_col,$Equity_type,$portfolio_name)
		{
           $user_id=$this->session->userdata('id'); $data1 = [];
	        return $this->db->query('SELECT * FROM '.$table1.' as a JOIN '.$table2.' as b WHERE b.mutual_type = "'.$Equity_type.'"  AND b.portfolio_name = "'.$portfolio_name.'" AND b.user_id = '.$user_id.' AND a.'.$common_col.' = b.'.$common_col.'');               
			 	          
		}

			public function Common_query_bond_PortfolioWise($table1,$table2,$col1,$portfolio_name)
		{
           $user_id=$this->session->userdata('id'); $data1 = [];
	        return $this->db->query('SELECT * FROM '.$table1.' as a JOIN '.$table2.' as b WHERE b.user_id = '.$user_id.' AND b.portfolio_name = "'.$portfolio_name.'" AND b.'.$col1.' = a.'.$col1.'');
	                
		}



		// Methods for assets wise data.....

		public function Global_joinquery($table1,$table2,$common_col)
		{
			$user_id=$this->session->userdata('id');
	        return $this->db->query('SELECT * FROM '.$table1.' as a JOIN '.$table2.' as b WHERE b.user_id = '.$user_id.' AND b.'.$common_col.' = a.'.$common_col.'');
		}	

		public function Typewise_MutualInvestmentSumdata($tname1,$tanme2,$col_name,$common_col_name,$mutual_type)
		{
          $user_id=$this->session->userdata('id');
	      $q = $this->db->query('SELECT SUM(b.'.$col_name.') as total_value FROM '.$tname1.' as a JOIN '.$tanme2.' as b WHERE b.mutual_type = "'.$mutual_type.'" AND b.user_id = '.$user_id.' AND b.'.$common_col_name.' = a.'.$common_col_name.'');
          foreach ($q->result() as $value){ $total_val = $value->total_value; }
          return $total_val;
        }

		public function Common_queryForMutualInvestment($table1,$table2,$common_col,$Equity_type)
		{
           $user_id=$this->session->userdata('id'); $data1 = [];
	        return $this->db->query('SELECT * FROM '.$table1.' as a JOIN '.$table2.' as b WHERE b.mutual_type = "'.$Equity_type.'" AND b.user_id = '.$user_id.' AND a.'.$common_col.' = b.'.$common_col.'');               
			 	          
		}

		public function Common_query_bond($table1,$table2,$col1)
		{
           $user_id=$this->session->userdata('id'); $data1 = [];
	        return $this->db->query('SELECT * FROM '.$table1.' as a JOIN '.$table2.' as b WHERE b.user_id = '.$user_id.' AND b.'.$col1.' = a.'.$col1.'');
	                
		}

		public function fetch_stock_share_subdata($tname)
		{
          $user_id=$this->session->userdata('id');
		 	$data1 = [];
			 
		switch ($tname) {
			case 'stock':

			$this->insert_current_value('stock','stock_details','stock_name','current_price','stock_qty');
			  $this->insert_overall_gain('stock','stock_name');
		    $this->insert_gain_percentage('stock','stock_details','stock_name','amt_invested');
		    $this->insert_holding('stock','stock_details','stock_name','holding');
				           
				   	$q = $this->Global_joinquery('stock_details','stock','stock_name');
				   
						foreach($q->result() as $value)
						{
										$data1[] = array(
										"assets_name" => $value->assets_name,
										"stock_name" => $value->stock_name,
										"stock_qty" => $value->stock_qty,
										"amt_invested" => $value->amt_invested,
										"current_price"=>$value->current_price,
										"overall_gain"=>$value->overall_gain,
										"gain_percentage"=>$value->gain_percentage,
										"current_value"=>$value->current_value,
									     "holding" => $value->holding.' %'
							);
										
					   }
						 return $data1;
				
			case 'mutual_fund_investment_equity':

			$this->insert_current_value('mutual_fund_investment','mutual_scheme','mutual_scheme','today_nav','mutual_quantity');
			   $this->insert_overall_gain('mutual_fund_investment','mutual_scheme');
		      $this->insert_gain_percentage('mutual_fund_investment','mutual_scheme','mutual_scheme','amt_invested');
			  $this->insert_holding('mutual_fund_investment','mutual_scheme','mutual_scheme','holding');
			
                           $q = $this->Common_queryForMutualInvestment('mutual_scheme','mutual_fund_investment','mutual_scheme','Equity');

                              foreach($q->result() as $value)
							{
								$data1[] = array(
									"dummy_data" => "Mutual Funds (Equity)",
									"mutual_scheme" => $value->mutual_scheme,
									"mutual_quantity" => $value->mutual_quantity,
									"amt_invested" => $value->amt_invested,
									"current_price"=>$value->today_nav,
									"overall_gain"=>$value->overall_gain,
									"gain_percentage"=>$value->gain_percentage,
									"current_value"=>$value->current_value,
									 "holding" => $value->holding.' %'
								);
							}
							 return $data1;

			case 'mutual_fund_investment_debt':
			
                           $q = $this->Common_queryForMutualInvestment('mutual_scheme','mutual_fund_investment','mutual_scheme','Debt');
                                 foreach($q->result() as $value)
							{
								$data1[] = array(
									"dummy_data" => "Mutual Funds (Debt)",
									"mutual_scheme" => $value->mutual_scheme,
									"mutual_quantity" => $value->mutual_quantity,
									"amt_invested" => $value->amt_invested,
									"current_price"=>$value->today_nav,
									"overall_gain"=>$value->overall_gain,
									"gain_percentage"=>$value->gain_percentage,
									"current_value"=>$value->current_value,
									 "holding" => $value->holding.' %'
								);
							}
							 return $data1;

            case 'bond':

          
			$this->insert_current_value('bond','bond_ltp','stock_name','current_price','stock_qty');
			   $this->insert_overall_gain('bond','stock_name');
		     $this->insert_gain_percentage('bond','bond_ltp','stock_name','amt_invested');
		     $this->insert_holding('bond','bond_ltp','stock_name','holding');
			
            			   $q = $this->Common_query_bond('bond_ltp','bond','stock_name');

            			      foreach($q->result() as $value)
							{
								$data1[] = array(
									"dummy_data" => "Traded Bonds",
									"stock_name" => $value->stock_name,
									"stock_qty" => $value->stock_qty,
									"amt_invested" => $value->amt_invested,
									"current_price" => $value->current_price,
									"overall_gain"=>$value->overall_gain,
									"gain_percentage"=>$value->gain_percentage,
									"current_value"=>$value->current_value,
									 "holding" => $value->holding.' %'
												);
							}
				           return $data1;			
				default:
					echo "No case executed..!";
					break;
			}
		
		}

	
        public function insert_current_value($table1,$table2,$col1,$first_col,$second_col)
		{
			$user_id=$this->session->userdata('id');
			$q = $this->db->query('SELECT *, a.'.$first_col.'*b.'.$second_col.' AS update_current_value
	 							  FROM '.$table2.' as a
  					  			  JOIN '.$table1.' as b
	 							  WHERE b.user_id = '.$user_id.' AND b.'.$col1.' = a.'.$col1.'');

			foreach ($q->result() as $value)
			{ 
			    $this->db->query('UPDATE `'.$table1.'` SET `current_value`= '.$value->update_current_value.' WHERE '.$col1.'="'.$value->$col1.'" and user_id = '.$user_id.''); 
			
            }

         return ;
		}
		public function insert_overall_gain($table1,$col1)
		{
            $user_id=$this->session->userdata('id');
            $q=$this->db->query('SELECT *,current_value - amt_invested as update_overall_gain FROM '.$table1.' WHERE user_id = '.$user_id.'');
            foreach ($q->result() as $value)
			{ 
			  $this->db->query('UPDATE `'.$table1.'` SET `overall_gain`= '.$value->update_overall_gain.' WHERE '.$col1.'="'.$value->$col1.'" and user_id = '.$user_id.'');
				
            }
         return ;
		}
		 public function insert_gain_percentage($table1,$table2,$col1,$amt_invested)
		{
			$amt_sum = $this->global_getSumdata($table2,$table1,$amt_invested,$col1);
            $user_id=$this->session->userdata('id');
            $q=$this->db->query('SELECT *,overall_gain * 100 DIV '.$amt_sum.' as update_gain_percentage FROM '.$table1.' WHERE user_id = '.$user_id.'');
            foreach ($q->result() as $value)
			{
				
				  $this->db->query('UPDATE `'.$table1.'` SET `gain_percentage`= '.$value->update_gain_percentage.' WHERE '.$col1.'="'.$value->$col1.'" and user_id = '.$user_id.'');
            }
         return ;
		}

       	    public function insert_holding($table1,$table2,$col1,$holding)
		{
            $user_id=$this->session->userdata('id');
          $total_current_value=$this->global_getSumdata($table2,$table1,"current_value",$col1);
            
             $q = $this->db->query('SELECT *,b.current_value * 100  as update_holding FROM '.$table2.' as a JOIN '.$table1.' as b WHERE b.user_id = '.$user_id.' AND b.'.$col1.' = a.'.$col1.'');
             
              foreach ($q->result() as $value)			
			{ $a= $value->update_holding / $total_current_value;			   
               $this->db->query('UPDATE `'.$table1.'` SET `holding`= '.$a.' WHERE '.$col1.'="'.$value->$col1.'" and user_id = '.$user_id.'');	
            } 
         return ;
		}
		

		public function global_getSumdata($tname1,$tanme2,$col_name,$common_col_name)
		{
          $user_id=$this->session->userdata('id');
	      $q = $this->db->query('SELECT SUM(b.'.$col_name.') as total_value FROM '.$tname1.' as a JOIN '.$tanme2.' as b WHERE b.user_id = '.$user_id.' AND b.'.$common_col_name.' = a.'.$common_col_name.'');
          foreach ($q->result() as $value){ $total_val = $value->total_value; }
          return $total_val;
        }
      
      



}
?>