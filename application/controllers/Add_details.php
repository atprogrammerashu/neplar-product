<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_details extends CI_Controller {

	public function index()
	{
		
	}

	public function add_group()
	{
		$this->form_validation->set_rules('group_name', 'Group Name', 'required');
       
		     if ($this->form_validation->run() == FALSE)
        {   
            echo validation_errors();
        }
        else
	    {
		
			 $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_group($post);
            if($data)
            {
                echo "YES";
            }
            else
            {
            	
              //  $this->session->set_flashdata('Group_error','Server, Error group is not added..!!');
               echo "NO";
            }

	
		}
		
	}

	public function add_portfolio()
	{
         
		$this->form_validation->set_rules('portfolio_name', 'Portfolio Name', 'required|is_unique[portfolio.port_group]|is_unique[portfolio.portfolio_name]');
		$this->form_validation->set_rules('port_date','Date','required');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('port_group', 'Group', 'required');
        $this->form_validation->set_rules('port_gender', 'Gender', 'required');
        $this->form_validation->set_rules('pran', 'PRAN', 'required');
        $this->form_validation->set_rules('einsurance_no', 'eInsurance No', 'required');
        $this->form_validation->set_rules('port_address', 'Address', 'required');
        $this->form_validation->set_rules('port_city', 'City', 'required');
        $this->form_validation->set_rules('port_country', 'Country', 'required');
        $this->form_validation->set_rules('pin_code', 'Pin Code', 'required');
        $this->form_validation->set_rules('pan', 'PAN', 'required');
       
		if ($this->form_validation->run() == FALSE)
        { echo validation_errors();}
        else
	      {
			      $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_portfolio($post);
            if($data)
            {    echo "YES"; }
            else
            {  echo "NO"; }
		    }	

	 }


        public function add_assets_details()
    {
        $this->form_validation->set_rules('assets_transaction_type', 'Transaction Type', 'required');
        $this->form_validation->set_rules('assets_date','Date','required');
        $this->form_validation->set_rules('assets_quantity', 'Quantity', 'required|integer');
        $this->form_validation->set_rules('assets_amt_invested', 'Amt Invested', 'required|integer');
        $this->form_validation->set_rules('assets_present_value', 'Present Value', 'required|integer');
        
        if ($this->form_validation->run() == FALSE)
        {   echo validation_errors(); }
        else
        {
             $sub_assets_name =$this->input->post('sub_assets_name');
             $post=$this->input->post(); 
              $this->load->model('Details');
             $data = $this->Details->add_assets_detail($sub_assets_name,$post);
            
            if($data)
            {    echo "YES"; }
            else
            {   echo "NO"; }
        }   

    }

    public function add_all_emergencydata()
    {        
        $this->form_validation->set_rules('cashinhand_date', 'Date', 'required');
        $this->form_validation->set_rules('cash_amt_invested','Amt Invested','required|integer');
        $this->form_validation->set_rules('cash_current_value', 'Current Value', 'required|integer');
   
        if ($this->form_validation->run() == FALSE)
        {        echo validation_errors(); }
        else
        {
             $sub_assets_name =$this->input->post('sub_assets_name');
             $post=$this->input->post(); 
              $this->load->model('Details');
             $data = $this->Details->add_all_emergencydata($sub_assets_name,$post);
            
            if($data)
            {     echo "YES";  }
            else
            {    echo "NO";  }
        }   
    }

        public function add_all_Insurancedata()
    {
         
        $this->form_validation->set_rules('insurance_company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('insurance_policy_name','Policy Name','required');

     //    $this->form_validation->set_rules('insurance_sum_assured','Sum Assured','required');
     //    $this->form_validation->set_rules('insurance_no_claim','No Claim','required');

        $this->form_validation->set_rules('insurance_policy_no', 'Policy No', 'required');
      //  $this->form_validation->set_rules('insurance_value','Value','required');
        $this->form_validation->set_rules('insurance_policy_start_date','Policy Start Date','required');
        $this->form_validation->set_rules('insurance_maturity_date','Maturity Date','required');
        $this->form_validation->set_rules('insurance_premium_date','Premium Date','required');

     $this->form_validation->set_rules('insurance_premium_amt','insurance_premium_amt','required|integer');
        $this->form_validation->set_rules('insurance_frequency','Frequency','required');
         $this->form_validation->set_rules('insurance_nextpremium_date','Nextpremium Date','required');
         $this->form_validation->set_rules('insurance_premium_tenure','Premium Tenure','required|integer');


        if ($this->form_validation->run() == FALSE)
        {        echo validation_errors();  }
        else
        {
             $sub_assets_name =$this->input->post('sub_assets_name');
             $post=$this->input->post(); 
              $this->load->model('Details');
             $data = $this->Details->add_all_Insurancedata($sub_assets_name,$post);   
            if($data)
            {     echo "YES";    }
            else
            {    echo "NO"; }
        }   
    }

   public function update_group()
   {
      $this->form_validation->set_rules('group_name', 'Choose Group Name', 'required');
        $this->form_validation->set_rules('update_group_value','Group Name','required');

            if ($this->form_validation->run() == FALSE)
        {   
            echo validation_errors();
        }
        else
        {
             $group_name =$this->input->post('group_name');

             $post=$this->input->post('update_group_value'); 
              $this->load->model('Details');
             $data = $this->Details->update_groups($group_name,$post);
            
            if($data)
            {
                echo "YES";
            }
            else
            {    
              //  $this->session->set_flashdata('Group_error','Server, Error group is not added..!!');
               echo "NO";
            }
           

        }
   }

    
    public function fetch_edit_portfolio()
    {
         if($this->input->post('portfolio_name'))
          { 
            $this->load->model('Details');
           echo  $this->Details->fetch_edit_portfolio($this->input->post('portfolio_name'));
          }
    }

    public function update_portfolio()
    {
        
        $this->form_validation->set_rules('port_date','Date','required');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
       // $this->form_validation->set_rules('update_port_group', 'Group', 'required');
        $this->form_validation->set_rules('port_gender', 'Gender', 'required');
        $this->form_validation->set_rules('pran', 'PRAN', 'required');
        $this->form_validation->set_rules('einsurance_no', 'eInsurance No', 'required');
        $this->form_validation->set_rules('port_address', 'Address', 'required');
        $this->form_validation->set_rules('port_city', 'City', 'required');
        $this->form_validation->set_rules('port_country', 'Country', 'required');
        $this->form_validation->set_rules('pin_code', 'Pin Code', 'required');
        $this->form_validation->set_rules('pan', 'PAN', 'required');
       
        if ($this->form_validation->run() == FALSE)
        {   
            echo validation_errors();
        }
        else
        {
            $port_name =$this->input->post('id');
             $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->update_portfolio($port_name,$post);
            if($data)
            {
                echo "YES";
            }
            else
            {
                
              //  $this->session->set_flashdata('Group_error','Server, Error group is not added..!!');
               echo "NO";
            }
        }   

    }

   
     public function delete_portfolio()
    {
         $port_id =$this->input->post('del_id');        
            $this->load->model('Details');
             $data = $this->Details->delete_portfolio($port_id);
            if($data)
            {    echo "YES";    }
            else
            {   echo "NO";   }       
    }

    public function add_epf()
     {       
        $this->form_validation->set_rules('epf_transaction_type', 'Transaction Type', 'required');
        $this->form_validation->set_rules('epf_account_no','Account No','required');
        $this->form_validation->set_rules('epf_start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('epf_maturity_date', 'Maturity Date', 'required');
     
       if ($this->form_validation->run() == FALSE)
          {   echo validation_errors(); }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_epf($post);
            if($data)
            {   echo "YES"; }
            else
            {  echo "NO";  }
         } 
     }

      public function fetch_epf_interestrate()
     {
         $this->load->model('Details');
         $post=$this->input->post("epf_contribution_date"); 
        echo $this->Details->fetch_epf_interestrate($post); 
     }

       public function add_nps()
     {       
        $this->form_validation->set_rules('nps_opening_date', 'Opening Date', 'required');
        $this->form_validation->set_rules('nps_type','Nps Type','required');
        $this->form_validation->set_rules('nps_pran_no', 'Pran No', 'required');
        $this->form_validation->set_rules('nps_scheme', 'Nps Scheme', 'required');
        $this->form_validation->set_rules('nps_transaction_type', 'Transaction Type', 'required');
         $this->form_validation->set_rules('nps_date', 'Date', 'required');
         $this->form_validation->set_rules('nps_qty', 'Nps Qty', 'required|integer');
         $this->form_validation->set_rules('nps_purchase_price', 'Purchase Price', 'required|integer');
         $this->form_validation->set_rules('nps_amt_invested', 'Amt Invested', 'required|integer');
     
       if ($this->form_validation->run() == FALSE)
          {   echo validation_errors(); }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_nps($post);
            if($data)
            {   echo "YES"; }
            else
            {  echo "NO";  }
         } 

     }

        public function add_fd()
     {       
        $this->form_validation->set_rules('fd_type', 'Type', 'required');
        $this->form_validation->set_rules('fd_account_no','Account No','required');
        $this->form_validation->set_rules('fd_transaction_type', 'Transaction Type', 'required'); 
         $this->form_validation->set_rules('fd_interest_rate', 'Interest Rate', 'required|integer');
          $this->form_validation->set_rules('fd_maturity_date', 'Maturity Date', 'required');
         $this->form_validation->set_rules('fd_amt_invested', 'Amt Invested', 'required|integer');
     
       if ($this->form_validation->run() == FALSE)
          {   echo validation_errors(); }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_fd($post);
            if($data)
            {   echo "YES"; }
            else
            {  echo "NO";  }
         } 
     }

        public function add_kisanvikaspatara()
     {       
        $this->form_validation->set_rules('kisan_transaction_type', 'Type', 'required');
        $this->form_validation->set_rules('kisan_account_no','Account No','required');
        $this->form_validation->set_rules('kisan_start_date', 'Start Date', 'required');         
        $this->form_validation->set_rules('kisan_muturity_date', 'Maturity Date', 'required');
        $this->form_validation->set_rules('kisan_amt_invested', 'Amt Invested', 'required|integer');
        $this->form_validation->set_rules('kisan_maturity_amt', 'Maturity Amt', 'required|integer');
        $this->form_validation->set_rules('kisan_interest_rate', 'Interest Rate', 'required|integer');
     
       if ($this->form_validation->run() == FALSE)
          {   echo validation_errors(); }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_kisanvikaspatara($post);
            if($data)
            {   echo "YES"; }
            else
            {  echo "NO";  }
         } 
     }

            public function add_mutual_fund()
      {
          $this->form_validation->set_rules('mutual_company_name', 'MF Name', 'required');
        $this->form_validation->set_rules('mutual_scheme','Mutual Scheme','required');
        $this->form_validation->set_rules('mutual_folio_no', 'Folio No', 'required');
        $this->form_validation->set_rules('mutual_transaction', 'Mutual Transaction', 'required');
        $this->form_validation->set_rules('mutual_type', 'Mutual Type', 'required');
        $this->form_validation->set_rules('mutual_date', 'Mutual Date', 'required');
        $this->form_validation->set_rules('mutual_quantity', 'Quantity', 'required|integer');
        $this->form_validation->set_rules('mutual_nav', 'NAV', 'required');
        $this->form_validation->set_rules('mutual_amt_invested', 'Amt Invested', 'required|integer');

       
       if ($this->form_validation->run() == FALSE)
          {   
              echo validation_errors();
          }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_mutual_fund($post);
            if($data)
            {  echo "YES";}
            else
            { echo "NO";}
         }     
     }

         public function add_ncd()
      {
         $this->form_validation->set_rules('ncd_type', 'Type', 'required');
         $this->form_validation->set_rules('ncd_name', 'Name', 'required');
         $this->form_validation->set_rules('ncd_transaction_type', 'Transaction Type', 'required');
         $this->form_validation->set_rules('ncd_date', 'Date', 'required');
         $this->form_validation->set_rules('ncd_purchase_price', 'Purchase Price', 'required|integer');
         $this->form_validation->set_rules('ncd_quantity','Quantity','required|integer');
         $this->form_validation->set_rules('ncd_amt_invested', 'Amt Invested', 'required|integer'); 
         $this->form_validation->set_rules('ncd_interest_payout', 'Interest Payout', 'required');    
         $this->form_validation->set_rules('ncd_interest_rate', 'Interest Rate', 'required|integer');
         $this->form_validation->set_rules('ncd_interest_payable', 'Interest Payable', 'required');
         $this->form_validation->set_rules('ncd_maturity_date', 'Maturity Date', 'required');
      
       if ($this->form_validation->run() == FALSE)
          {   
              echo validation_errors();
          }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_ncd($post);
            if($data)
            {  echo "YES";}
            else
            { echo "NO";}
         }     
     }

        public function add_nsc()
     {       
        $this->form_validation->set_rules('nsc_transaction_type', 'Transaction Type', 'required');
        $this->form_validation->set_rules('nsc_account_no','Account No','required');
        $this->form_validation->set_rules('nsc_type', 'Type', 'required');
        $this->form_validation->set_rules('nsc_opening_date', 'Opening Date', 'required');               
        $this->form_validation->set_rules('nsc_amt_invested', 'Amt Invested', 'required|integer');
        $this->form_validation->set_rules('nsc_interest_rate', 'Interest Rate', 'required|integer');
        $this->form_validation->set_rules('nsc_maturity_date', 'Maturity Date', 'required');
        $this->form_validation->set_rules('nsc_maturity_amt', 'Maturity Amt', 'required|integer');
     
       if ($this->form_validation->run() == FALSE)
          {   echo validation_errors(); }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_nsc($post);
            if($data)
            {   echo "YES"; }
            else
            {  echo "NO";  }
         } 
     }

        public function add_ppf()
     {       
        $this->form_validation->set_rules('ppf_transaction_type', 'Transaction Type', 'required');
        $this->form_validation->set_rules('ppf_account_no','Account No','required');      
        $this->form_validation->set_rules('ppf_opening_date', 'Opening Date', 'required');  
         $this->form_validation->set_rules('ppf_date', 'Date', 'required');             
          $this->form_validation->set_rules('ppf_maturity_date', 'Maturity Date', 'required');
        $this->form_validation->set_rules('ppf_amt_invested', 'Amt Invested', 'required|integer');
        $this->form_validation->set_rules('ppf_interest_rate', 'Interest Rate', 'required|integer');
     
       if ($this->form_validation->run() == FALSE)
          {   echo validation_errors(); }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_ppf($post);
            if($data)
            {   echo "YES"; }
            else
            {  echo "NO";  }
         } 
     }

        public function add_PrivateEquity()
     {       
        $this->form_validation->set_rules('pe_asset_name', 'Asset Name', 'required');
        $this->form_validation->set_rules('pe_startup','Startup','required');
        $this->form_validation->set_rules('pe_start_date', 'Start Date', 'required'); 
         $this->form_validation->set_rules('pe_transaction_type', 'Transaction Type', 'required'); 
          $this->form_validation->set_rules('pe_date', 'Date', 'required'); 
           $this->form_validation->set_rules('pe_qty_purchase', 'Qty Purchase', 'required|integer'); 
         $this->form_validation->set_rules('pe_purchase_rate', 'Purchase Rate', 'required|integer');      
         $this->form_validation->set_rules('pe_amt_invested', 'Amt Invested', 'required|integer');
     
       if ($this->form_validation->run() == FALSE)
          {   echo validation_errors(); }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_PrivateEquity($post);
            if($data)
            {   echo "YES"; }
            else
            {  echo "NO";  }
         } 
     }

           public function add_RD()
     {       
        $this->form_validation->set_rules('rd_type', 'Type', 'required');
        $this->form_validation->set_rules('rd_account_no','Account No','required');
        $this->form_validation->set_rules('rd_transaction_type', 'Transaction Type', 'required'); 
         $this->form_validation->set_rules('rd_interest_rate', 'Interest Rate', 'required|integer');
          $this->form_validation->set_rules('rd_maturity_date', 'Maturity Date', 'required');
         $this->form_validation->set_rules('rd_amt_invested', 'Amt Invested', 'required|integer');
     
       if ($this->form_validation->run() == FALSE)
          {   echo validation_errors(); }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_RD($post);
            if($data)
            {   echo "YES"; }
            else
            {  echo "NO";  }
         } 
     }

    public function add_SCSS()
     {       
        $this->form_validation->set_rules('scss_transaction_type', 'Type', 'required');
        $this->form_validation->set_rules('scss_account_no','Account No','required');
        $this->form_validation->set_rules('scss_muturity_date', 'Maturity Date', 'required');
        $this->form_validation->set_rules('scss_lockin_period', 'Lock in Period', 'required');
        $this->form_validation->set_rules('scss_date', 'Start Date', 'required');                
        $this->form_validation->set_rules('scss_amt_invested', 'Amt Invested', 'required|integer');
          
       if ($this->form_validation->run() == FALSE)
          {   echo validation_errors(); }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_SCSS($post);
            if($data)
            {   echo "YES"; }
            else
            {  echo "NO";  }
         } 
     }

     public function add_sukanya()
     {       
        $this->form_validation->set_rules('sukanya_transaction_type', 'Transaction Type', 'required');
        $this->form_validation->set_rules('sukanya_account_no','Account No','required');
        $this->form_validation->set_rules('sukanya_opening_date', 'Opening Date', 'required');
        $this->form_validation->set_rules('sukanya_maturity_date', 'Maturity Date', 'required');
        $this->form_validation->set_rules('sukanya_date', 'Date', 'required');
         $this->form_validation->set_rules('sukanya_amt_invested', 'Amt Invested', 'required|integer');
         $this->form_validation->set_rules('sukanya_interest_rate', 'Interest Rate', 'required|integer');
     
       if ($this->form_validation->run() == FALSE)
          {   echo validation_errors(); }
          else
          {
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_sukanya($post);
            if($data)
            {   echo "YES"; }
            else
            {  echo "NO";  }
         } 
     }

   //stock and sgb same method is used....
    public function add_stock()
     {       
        $this->form_validation->set_rules('stock_name', 'Stock Name', 'required');
        $this->form_validation->set_rules('stock_transaction_type','Stock Transaction','required');
        $this->form_validation->set_rules('stock_broker', 'Stock Broker', 'required');
        $this->form_validation->set_rules('stock_date', 'Stock Date', 'required');
     
        $this->form_validation->set_rules('stock_qty', 'Stock QTY', 'required');
        $this->form_validation->set_rules('stock_purchase_price', 'Purchase Price', 'required');
        $this->form_validation->set_rules('stock_amt_invested', 'Amt Invested', 'required');
       
        $this->form_validation->set_rules('stock_net_rate', 'Net Rate', 'required');
           $this->form_validation->set_rules('stock_net_amt', 'Net Amt', 'required');

       
       if ($this->form_validation->run() == FALSE)
          {   
              echo validation_errors();
          }
          else
          {
             $sub_assets_name =$this->input->post('sub_assets_name');
            $post=$this->input->post(); 
            $this->load->model('Details');
             $data = $this->Details->add_stock($sub_assets_name,$post);
            if($data)
            {
                echo "YES";
            }
            else
            {
               echo "NO";
            }
         } 

     }

      public function delete_stock()
      {
            $stock_id =$this->input->post('del_id');
            $this->load->model('Details');
             $data = $this->Details->delete_stock($stock_id);
            if($data)
            {  echo "YES"; }
            else
            {  echo "NO"; }      
     }
   


   public function fetch_all_stocks()
   {
       $this->load->model('Details');
      $this->Details->fetch_all_stock();       
   }

   public function fetch_all_sgb()
   {
       $this->load->model('Details');
      $this->Details->fetch_all_sgb(); 
        
   }
      public function fetch_all_bond()
   {
       $this->load->model('Details');
      $this->Details->fetch_all_bond(); 
        
   }


   public function fetch_all_floatrate()
   {
       $this->load->model('Details');
      $this->Details->fetch_all_floatrate(); 
        
   }
   
   public function fetch_all_mutualfund()
   {
       $this->load->model('Details');
      $this->Details->fetch_all_mutualfund(); 
        
   }

    public function fetch_all_nps()
   {
       $this->load->model('Details');
      $this->Details->fetch_all_nps(); 
        
   }

        public function add_to_nps_invetment_table()
      {
            $temp_stock_id =$this->input->post('temp_stock_id');
            $this->load->model('Details');
             $data = $this->Details->add_to_nps_invetment_table($temp_stock_id);
            if($data)
            {  echo "YES"; }
            else
            {  echo "NO"; }      
     }

           public function del_to_temp_nps_investmenttable()
      {
            $temp_stock_id =$this->input->post('temp_stock_id');
            $this->load->model('Details');
             $data = $this->Details->del_to_temp_nps_investmenttable($temp_stock_id);
            if($data)
            {  echo "YES"; }
            else
            {  echo "NO"; }      
     }

          public function add_to_mutualfundinvetment_table()
      {
            $temp_stock_id =$this->input->post('temp_stock_id');
            $this->load->model('Details');
             $data = $this->Details->add_to_mutualfundinvetment_table($temp_stock_id);
            if($data)
            {  echo "YES"; }
            else
            {  echo "NO"; }      
     }

       public function del_to_temp_mutualfundtable()
      {
            $temp_stock_id =$this->input->post('temp_stock_id');
            $this->load->model('Details');
             $data = $this->Details->del_to_temp_mutualfundtable($temp_stock_id);
            if($data)
            {  echo "YES"; }
            else
            {  echo "NO"; }      
     }

 

        public function temp_del_add_stock()
      {
            $temp_stock_id =$this->input->post('temp_stock_id');
            $this->load->model('Details');
             $data = $this->Details->temp_del_add_stock($temp_stock_id);
            if($data)
            {  echo "YES"; }
            else
            {  echo "NO"; }      
     }

           public function temp_stock_del_record()
      {
            $temp_stock_id =$this->input->post('temp_stock_id');
            $this->load->model('Details');
             $data = $this->Details->temp_stock_del_record($temp_stock_id);
            if($data)
            {  echo "YES"; }
            else
            {  echo "NO"; }      
     }

           public function temp_del_add_bond()
      {
            $temp_stock_id =$this->input->post('temp_stock_id');
            $this->load->model('Details');
             $data = $this->Details->temp_del_add_bond($temp_stock_id);
            if($data)
            {  echo "YES"; }
            else
            {  echo "NO"; }      
     }

              public function temp_bond_del_record()
      {
            $temp_stock_id =$this->input->post('temp_stock_id');
            $this->load->model('Details');
             $data = $this->Details->temp_bond_del_record($temp_stock_id);
            if($data)
            {  echo "YES"; }
            else
            {  echo "NO"; }      
     }




       public function add_all_Loan()
       {
         
        $this->form_validation->set_rules('loan_bank_name', 'Bank Name', 'required');
        $this->form_validation->set_rules('loan_account_no','Account No','required');
        $this->form_validation->set_rules('loan_start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('loan_amount', 'Loan Amount', 'required|integer');
        $this->form_validation->set_rules('loan_period', 'loan Period', 'required|integer');
        $this->form_validation->set_rules('loan_emi_amt', 'EMI Amt', 'required|integer');
        $this->form_validation->set_rules('loan_emi_date', 'EMI Date', 'required');
        $this->form_validation->set_rules('loan_downpayment_amt', 'Downpayment Amt', 'required|integer');
       
        if ($this->form_validation->run() == FALSE)
        {   
            echo validation_errors();
        }
        else
        {
             $sub_assets_name =$this->input->post('sub_assets_name');
             $post=$this->input->post(); 
              $this->load->model('Details');
             $data = $this->Details->add_all_Loan($sub_assets_name,$post);
            
            if($data)
            {   echo "YES"; }
            else
            {   echo "NO"; }         

        }   
    }

     
       public function addLoan_floatingRate()
       {
         
        $this->form_validation->set_rules('floating_date_from', 'Date From', 'required');
        $this->form_validation->set_rules('floating_date_to','Date To','required');
        $this->form_validation->set_rules('loan_floating_value', 'Rate', 'required');
  
       
        if ($this->form_validation->run() == FALSE)
        {   
            echo validation_errors();
        }
        else
        {
             $sub_assets_name =$this->input->post('sub_assets_name');
             $floating_date_from =$this->input->post('floating_date_from');
             $floating_date_to =$this->input->post('floating_date_to');
             $loan_floating_value =$this->input->post('loan_floating_value');
          
              $this->load->model('Details');
             $data = $this->Details->addLoan_floatingRate($sub_assets_name,$floating_date_from,$floating_date_to,$loan_floating_value);
            
            if($data)
            {   echo "YES"; }
            else
            {   echo "NO"; }         

        }   
    }

}

?>