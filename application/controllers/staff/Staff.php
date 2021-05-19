<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_model','STFobj');
        $loggedIn = $this->session->userdata('loggedIn');
        if(empty($loggedIn))
        {
            redirect("staff-login");
        }
    }

	public function index()
	{
	    $this->data['last_update_sgb_ltp'] = $this->STFobj->Get_last_record_date("sovergine_gold_bond");
	    $this->data['to_sgb_ltp'] = $this->STFobj->Count_records("sovergine_gold_bond");
	    $this->data['last_update_mfnav'] = $this->STFobj->Get_last_record_date("mutual_scheme");
	    $this->data['to_mfnav'] = $this->STFobj->Count_records("mutual_scheme");
	    $this->data['last_update_stock_details'] = $this->STFobj->Get_last_record_date("stock_details");
	    $this->data['to_stock_details'] = $this->STFobj->Count_records("stock_details");
	    $this->data['last_update_ncd_ltp'] = $this->STFobj->Get_last_record_date("non_convertible_d_ltp");
	    $this->data['to_ncd_ltp'] = $this->STFobj->Count_records("non_convertible_d_ltp");
	    $this->data['last_update_bond_ltp'] = $this->STFobj->Get_last_record_date("bond_ltp");
	    $this->data['to_bond_ltp'] = $this->STFobj->Count_records("bond_ltp");
	    $this->data['last_update_broker_details'] = $this->STFobj->Get_last_record_date("broker_details");
	    $this->data['to_broker_details'] = $this->STFobj->Count_records("broker_details");
	    $this->data['last_update_mutual_fund_name'] = $this->STFobj->Get_last_record_date("mutual_fund_name");
	    $this->data['to_mutual_fund_name'] = $this->STFobj->Count_records("mutual_fund_name");
	    $this->data['last_update_nps_scheme'] = $this->STFobj->Get_last_record_date("nps_scheme");
	    $this->data['to_nps_scheme'] = $this->STFobj->Count_records("nps_scheme");
	    
	    $this->data['last_update_epfint'] = $this->STFobj->Get_last_record_date("employee_provident_fund_int");
	    $this->data['to_epfint'] = $this->STFobj->Count_records("employee_provident_fund_int");
	    
	    $this->data['last_update_ppfint'] = $this->STFobj->Get_last_record_date("public_provident_fund_int");
	    $this->data['to_ppfint'] = $this->STFobj->Count_records("public_provident_fund_int");
	    
	    $this->data['last_update_ssyint'] = $this->STFobj->Get_last_record_date("sukanya_samriddhi_yojna_int");
	    $this->data['to_ssyint'] = $this->STFobj->Count_records("sukanya_samriddhi_yojna_int");
	    
	    $this->data['last_update_scsc_int'] = $this->STFobj->Get_last_record_date("scsc_int");
	    $this->data['to_scsc_int'] = $this->STFobj->Count_records("scsc_int");
	    
	    $this->data['last_update_nsc_int'] = $this->STFobj->Get_last_record_date("national_saving_certificate_int");
	    $this->data['to_nsc_int'] = $this->STFobj->Count_records("national_saving_certificate_int");
	    
	    $this->data['last_update_kvpint'] = $this->STFobj->Get_last_record_date("kisan_vikas_patra_int");
	    $this->data['to_nsc_kvpint'] = $this->STFobj->Count_records("kisan_vikas_patra_int");
	    
	    $this->data['last_update_cc'] = $this->STFobj->Get_last_record_date("crypto_currency");
	    $this->data['to_nsc_cc'] = $this->STFobj->Count_records("crypto_currency");
	    
	    $this->data['last_update_c'] = $this->STFobj->Get_last_record_date("currency");
	    $this->data['to_nsc_c'] = $this->STFobj->Count_records("currency");
	    
	    $this->data['last_update_com'] = $this->STFobj->Get_last_record_date("commodity");
	    $this->data['to_nsc_com'] = $this->STFobj->Count_records("commodity");
	    
	    $this->data['last_update_it'] = $this->STFobj->Get_last_record_date("index_tbl");
	    $this->data['to_nsc_it'] = $this->STFobj->Count_records("index_tbl");
		$this->load->view('staff/index');
	}
	
	function staffs_list()
	{
	    $this->load->view('staff/staff-list');
	}
	
	function get_all_members()
	{
	  $result = $this->STFobj->fetch_all_records("staffs");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $cdate = date('d-m-Y',strtotime($row->created_at)); 
	         
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->name,
	             $row->staff_id,
	             $cdate,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_new_members()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("staffs",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_members()
	{
	   $data = $this->input->post();
	   $cols = "name,staff_id";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("staffs",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_members()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("staffs",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function logout()
	{
	   $this->session->unset_userdata('loggedIn');
	   redirect("staff-login"); 
	}
	
	function Delete_record_to()
	{
	   $data = $this->input->post();
	   $recid = $data['id'];
	   $table = $data['table'];
	   if($this->STFobj->Delete_Records($table,$recid))
	   {
	      $arr['responseData'] = 'records-deleted-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function MUTUAL_FUND_NAV()
	{
	   $this->load->view('staff/MFNav/index'); 
	}
	
	function get_mutual_fund_nav()
	{
	  $result = $this->STFobj->fetch_all_records("mutual_scheme");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->scheme_name,
	             $row->today_nav,
	             $row->previous_day_price,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	             
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_mutual_fund_nav()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("mutual_scheme",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_mutual_fund_nav()
	{
	   $data = $this->input->post();
	   $cols = "scheme_name,today_nav,previous_day_price";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("mutual_scheme",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_mutual_fund_nav()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("mutual_scheme",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_mutual_fund_nav()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['scheme_name'] = $elt[0];
                $data['today_nav'] = $elt[1];
                $data['previous_day_price'] = $elt[2];
                $this->STFobj->insert_data_to("mutual_scheme",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function STOCK_LTP()
	{
	   $this->load->view('staff/stockLTP/index'); 
	}
	
	function get_all_stock_ltp()
	{
	  $result = $this->STFobj->fetch_all_records("stock_details");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->stock_name,
	             $row->current_price,
	             $row->previous_day_price,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_stock_ltp()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("stock_details",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_stock_ltp()
	{
	   $data = $this->input->post();
	   $cols = "stock_name,current_price,previous_day_price";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("stock_details",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_stock_ltp()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("stock_details",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_stock_ltp()
	{
	    $list_arr = array();
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['stock_name'] = $elt[0];
                $data['current_price'] = $elt[1];
                $data['previous_day_price'] = $elt[2];
                $this->STFobj->insert_data_to("stock_details",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	
	function NEW_PENSION_SYSTEM_NAV()
	{
	    $this->load->view('staff/NSPScheme/index');  
	}
	
	function get_all_nps_scheme()
	{
	  $result = $this->STFobj->fetch_all_records("nps_scheme");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->scheme_name,
	             $row->today_nav,
	             $row->previous_day_price,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_nps_scheme()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("nps_scheme",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_nps_scheme()
	{
	   $data = $this->input->post();
	   $cols = "scheme_name,today_nav,previous_day_price";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("nps_scheme",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_nps_scheme()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("nps_scheme",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_nps_scheme()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['scheme_name'] = $elt[0];
                $data['today_nav'] = $elt[1];
                $data['previous_day_price'] = $elt[2];
                $this->STFobj->insert_data_to("nps_scheme",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function Mutual_Fund_Companies()
	{
	   $this->load->view('staff/MFCompanies/index');  
	}
	
	function get_all_Mutual_Fund_Companies()
	{
	  $result = $this->STFobj->fetch_all_records("mutual_fund_name");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->mutual_fund_name,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_Mutual_Fund_Companies()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("mutual_fund_name",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_Mutual_Fund_Companies()
	{
	   $data = $this->input->post();
	   $cols = "mutual_fund_name";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("mutual_fund_name",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_Mutual_Fund_Companies()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("mutual_fund_name",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_Mutual_Fund_Companies()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['mutual_fund_name'] = $elt[0];
                $this->STFobj->insert_data_to("mutual_fund_name",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function Brokers()
	{
	   $this->load->view('staff/Brokers/index');  
	}
	
	function get_all_Brokers()
	{
	  $result = $this->STFobj->fetch_all_records("broker_details");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->broker_name,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_Brokers()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("broker_details",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_Brokers()
	{
	   $data = $this->input->post();
	   $cols = "broker_name";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("broker_details",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_Brokers()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("broker_details",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_Brokers()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['broker_name'] = $elt[0];
                $this->STFobj->insert_data_to("broker_details",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function BOND_LTP()
	{
	  $this->load->view('staff/BondLTP/index');  
	}
	
	function get_all_BOND_LTP()
	{
	  $result = $this->STFobj->fetch_all_records("bond_ltp");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->scheme_name	,
	             $row->today_nav,
	             $row->previous_day_price,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_BOND_LTP()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("bond_ltp",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_BOND_LTP()
	{
	   $data = $this->input->post();
	   $cols = "scheme_name,today_nav,previous_day_price";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("bond_ltp",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_BOND_LTP()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("bond_ltp",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_BOND_LTP()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['scheme_name'] = $elt[0];
                $data['today_nav'] = $elt[1];
                $data['previous_day_price'] = $elt[2];
                $this->STFobj->insert_data_to("bond_ltp",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function NON_CONVERTIBLE_DEBENTURE_LTP()
	{
	   $this->load->view('staff/NCDLTP/index');  
	}
	
	function get_all_NON_CONVERTIBLE_DEBENTURE_LTP()
	{
	  $result = $this->STFobj->fetch_all_records("non_convertible_d_ltp");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->scheme_name,
	             $row->today_nav,
	             $row->previous_day_price,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_NON_CONVERTIBLE_DEBENTURE_LTP()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("non_convertible_d_ltp",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_NON_CONVERTIBLE_DEBENTURE_LTP()
	{
	   $data = $this->input->post();
	   $cols = "scheme_name,today_nav,previous_day_price";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("non_convertible_d_ltp",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_NON_CONVERTIBLE_DEBENTURE_LTP()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("non_convertible_d_ltp",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_NON_CONVERTIBLE_DEBENTURE_LTP()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['scheme_name'] = $elt[0];
                $data['today_nav'] = $elt[1];
                $data['previous_day_price'] = $elt[2];
                $this->STFobj->insert_data_to("non_convertible_d_ltp",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function SOVERGINE_GOLD_BOND_LTP()
	{
	   $this->load->view('staff/SGBLTP/index');  
	}
	
	function get_all_SOVERGINE_GOLD_BOND_LTP()
	{
	  $result = $this->STFobj->fetch_all_records("sovergine_gold_bond");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->scheme_name,
	             $row->today_nav,
	             $row->previous_day_price,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_SOVERGINE_GOLD_BOND_LTP()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("sovergine_gold_bond",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_SOVERGINE_GOLD_BOND_LTP()
	{
	   $data = $this->input->post();
	   $cols = "scheme_name,today_nav,previous_day_price";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("sovergine_gold_bond",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_SOVERGINE_GOLD_BOND_LTP()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("sovergine_gold_bond",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_SOVERGINE_GOLD_BOND_LTP()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['symbol'] = $elt[0];
                $data['issue_price'] = $elt[1];
                $data['prev_close'] = $elt[2];
                $data['ltp'] = $elt[3];
                $this->STFobj->insert_data_to("sovergine_gold_bond",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function EMPLOYEE_PROVIDENT_FUND_INT()
	{
	   $this->load->view('staff/EPFINT/index');
	}
	
	function get_all_EMPLOYEE_PROVIDENT_FUND_INT()
	{
	  $result = $this->STFobj->fetch_all_records("employee_provident_fund_int");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->from_date,
	             $row->to_date,
	             $row->interest_rate,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_EMPLOYEE_PROVIDENT_FUND_INT()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("employee_provident_fund_int",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_EMPLOYEE_PROVIDENT_FUND_INT()
	{
	   $data = $this->input->post();
	   $cols = "to_date,from_date,interest_rate";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("employee_provident_fund_int",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_EMPLOYEE_PROVIDENT_FUND_INT()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("employee_provident_fund_int",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_EMPLOYEE_PROVIDENT_FUND_INT()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['to_date'] = $elt[0];
                $data['from_date'] = $elt[1];
                $data['interest_rate'] = $elt[2];
                $this->STFobj->insert_data_to("employee_provident_fund_int",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}

	
	function PUBLIC_PROVIDENT_FUND_INT()
	{
	   $this->load->view('staff/PPFINT/index'); 
	}
	
	function get_all_PUBLIC_PROVIDENT_FUND_INT()
	{
	  $result = $this->STFobj->fetch_all_records("public_provident_fund_int");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->from_date,
	             $row->to_date,
	             $row->interest_rate,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_PUBLIC_PROVIDENT_FUND_INT()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("public_provident_fund_int",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_PUBLIC_PROVIDENT_FUND_INT()
	{
	   $data = $this->input->post();
	   $cols = "to_date,from_date,interest_rate";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("public_provident_fund_int",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_PUBLIC_PROVIDENT_FUND_INT()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("public_provident_fund_int",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_PUBLIC_PROVIDENT_FUND_INT()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['to_date'] = $elt[0];
                $data['from_date'] = $elt[1];
                $data['interest_rate'] = $elt[2];
                $this->STFobj->insert_data_to("public_provident_fund_int",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function SUKANYA_SAMRIDDHI_YOJANA_INT()
	{
	   $this->load->view('staff/SSYINT/index');
	}
	
	function get_all_SUKANYA_SAMRIDDHI_YOJANA_INT()
	{
	  $result = $this->STFobj->fetch_all_records("sukanya_samriddhi_yojna_int");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->from_date,
	             $row->to_date,
	             $row->interest_rate,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_SUKANYA_SAMRIDDHI_YOJANA_INT()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("sukanya_samriddhi_yojna_int",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_SUKANYA_SAMRIDDHI_YOJANA_INT()
	{
	   $data = $this->input->post();
	   $cols = "to_date,from_date,interest_rate";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("sukanya_samriddhi_yojna_int",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_SUKANYA_SAMRIDDHI_YOJANA_INT()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("sukanya_samriddhi_yojna_int",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_SUKANYA_SAMRIDDHI_YOJANA_INT()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['to_date'] = $elt[0];
                $data['from_date'] = $elt[1];
                $data['interest_rate'] = $elt[2];
                $this->STFobj->insert_data_to("sukanya_samriddhi_yojna_int",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function NATIONAL_SAVING_CERTIFICATE_INT()
	{
	   $this->load->view('staff/NSCINT/index');   
	}
	
	function get_all_NATIONAL_SAVING_CERTIFICATE_INT()
	{
	  $result = $this->STFobj->fetch_all_records("national_saving_certificate_int");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->from_date,
	             $row->to_date,
	             $row->interest_rate,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_NATIONAL_SAVING_CERTIFICATE_INT()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("national_saving_certificate_int",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_NATIONAL_SAVING_CERTIFICATE_INT()
	{
	   $data = $this->input->post();
	   $cols = "to_date,from_date,interest_rate";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("national_saving_certificate_int",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_NATIONAL_SAVING_CERTIFICATE_INT()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("national_saving_certificate_int",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_NATIONAL_SAVING_CERTIFICATE_INT()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['to_date'] = $elt[0];
                $data['from_date'] = $elt[1];
                $data['interest_rate'] = $elt[2];
                $this->STFobj->insert_data_to("national_saving_certificate_int",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function SENIOR_CITIZEN_SAVING_SCHEME_IN()
	{
	   $this->load->view('staff/SCSSINT/index');
	}
	
	function get_all_SCSSC_INT()
	{
	  $result = $this->STFobj->fetch_all_records("scsc_int");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->from_date,
	             $row->to_date,
	             $row->interest_rate,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_SCSSC_INT()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("scsc_int",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_SCSSC_INT()
	{
	   $data = $this->input->post();
	   $cols = "to_date,from_date,interest_rate";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("scsc_int",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_SCSSC_INT()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("scsc_int",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_SCSSC_INT()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['to_date'] = $elt[0];
                $data['from_date'] = $elt[1];
                $data['interest_rate'] = $elt[2];
                $this->STFobj->insert_data_to("scsc_int",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function KISHAN_VIKASH_PATRA_INT()
	{
	   $this->load->view('staff/KVPINT/index'); 
	}
	
	function get_all_KISHAN_VIKASH_PATRA_INT()
	{
	  $result = $this->STFobj->fetch_all_records("kisan_vikas_patra_int");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->from_date,
	             $row->to_date,
	             $row->interest_rate,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_KISHAN_VIKASH_PATRA_INT()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("kisan_vikas_patra_int",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_KISHAN_VIKASH_PATRA_INT()
	{
	   $data = $this->input->post();
	   $cols = "to_date,from_date,interest_rate";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("kisan_vikas_patra_int",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_KISHAN_VIKASH_PATRA_INT()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("kisan_vikas_patra_int",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_KISHAN_VIKASH_PATRA_INT()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['to_date'] = $elt[0];
                $data['from_date'] = $elt[1];
                $data['interest_rate'] = $elt[2];
                $this->STFobj->insert_data_to("kisan_vikas_patra_int",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function crypto_currency()
	{
	   $this->load->view('staff/cryptoCurrency/index'); 
	}
	
	function get_all_crypto_currency()
	{
	  $result = $this->STFobj->fetch_all_records("crypto_currency");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->currency,
	             $row->today_price,
	             $row->yesterday_price,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_crypto_currency()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("crypto_currency",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_crypto_currency()
	{
	   $data = $this->input->post();
	   $cols = "currency,today_price,yesterday_price";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("crypto_currency",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_crypto_currency()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("crypto_currency",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_crypto_currency()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['currency'] = $elt[0];
                $data['today_price'] = $elt[1];
                $data['yesterday_price'] = $elt[2];
                $this->STFobj->insert_data_to("crypto_currency",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function currency()
	{
	   $this->load->view('staff/currency/index');  
	}
	
	function get_all_currency()
	{
	  $result = $this->STFobj->fetch_all_records("currency");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->currency,
	             $row->today_price,
	             $row->yesterday_price,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_currency()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("currency",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_currency()
	{
	   $data = $this->input->post();
	   $cols = "currency,today_price,yesterday_price";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("currency",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_currency()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("currency",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_currency()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['currency'] = $elt[0];
                $data['today_price'] = $elt[1];
                $data['yesterday_price'] = $elt[2];
                $this->STFobj->insert_data_to("currency",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function commodity()
	{
	   $this->load->view('staff/commodity/index'); 
	}
	
	function get_all_commodity()
	{
	  $result = $this->STFobj->fetch_all_records("commodity");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->currency,
	             $row->today_price,
	             $row->yesterday_price,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_commodity()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("commodity",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_commodity()
	{
	   $data = $this->input->post();
	   $cols = "currency,today_price,yesterday_price";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("commodity",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_commodity()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("commodity",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_commodity()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['currency'] = $elt[0];
                $data['today_price'] = $elt[1];
                $data['yesterday_price'] = $elt[2];
                $this->STFobj->insert_data_to("commodity",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	function index_table()
	{
	   $this->load->view('staff/index_tbl/index');  
	}
	
	function get_all_index()
	{
	  $result = $this->STFobj->fetch_all_records("index_tbl");
	  if(!empty($result))
	  {
	      $list_arr = array();
	      $sr =1;
	      foreach($result as $key=>$row)
	      {
	         $list_arr['data'][] = array(
	             $sr++,
	             $row->index_name,
	             $row->today_value,
	             '<button type="button" class="btn btn-outline-info btn-sm" id="record-edit-btn" key="'.$row->id.'"><i class="nav-icon far fa-edit"></i></button>
	              <button type="button" class="btn btn-outline-danger btn-sm" id="record-delete-btn" key="'.$row->id.'"><i class="nav-icon far fa-trash-alt"></i></button>
	             '
	         ); 
	      }
	      echo json_encode($list_arr);
	  }
	}
	
	function insert_index()
	{
	   $data = $this->input->post();
	   if($this->STFobj->insert_data_to("index_tbl",$data))
	   {
	       $arr['responseData'] = 'record-inserted-scs';
	       echo json_encode($arr);
	   }
	}
	
	function edit_index()
	{
	   $data = $this->input->post();
	   $cols = "index_name,today_value";
	   $where = array("id"=>$data['id']);
	   $data = $this->STFobj->Get_specific_coloums("index_tbl",$cols,$where);
	   $arr['responseData'] = $data;
	   echo json_encode($arr);
	}
	
	function update_index()
	{
	   $data = $this->input->post();
	   $where = array("id"=>$data['id']);
	   if($this->STFobj->Update_where("index_tbl",$where,$data))
	   {
	      $arr['responseData'] = 'record-updated-scs';
	      echo json_encode($arr); 
	   }
	}
	
	function upload_excel_to_index()
	{
	   if(!empty($_FILES) && !empty($_FILES['excelfile'])) 
	   {
	      require_once( APPPATH . 'libraries/SimpleXLSX.php' );
	      if ( $xlsx = SimpleXLSX::parse($file = $_FILES['excelfile']['tmp_name']) )
          {
              foreach ($xlsx->rows() as $key=>$elt) 
              {
                $data['index_name'] = $elt[0];
                $data['today_value'] = $elt[1];
                $this->STFobj->insert_data_to("index_tbl",$data);
              }
              $res['responseData']="records-inserted-scs";
              echo json_encode($res);die;
          }else{
              $res['responseData'] = SimpleXLSX::parseError();
              echo json_encode($res);
          }
	   }
	}
	
	
	
	
	
	
/*Main Class Ended*/
}
