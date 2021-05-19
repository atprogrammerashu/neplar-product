<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Budget extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Users','objuser');
    if( ! $this->session->userdata('id') )
    return redirect('login');
    
  }
  
  function index()
  {
    $budget_arr = array();  
    $this->load->model('Dashboard_model');
	$data['user_info']=$this->Dashboard_model->user_detail();
	$data['show_group']=$this->Dashboard_model->show_groups();
	$data['show_portfolio']=$this->Dashboard_model->show_portfolio();  
	$data['expences']=$this->objuser->get_all_records_orders('expences',$where="",$order="id");
	$data['income_arr']=$this->objuser->get_all_records_orders('income_list',$where="",$order="income_id");
	$where = array('user_id'=>$this->session->userdata('id'));
	$budget = $this->objuser->get_all_records_orders('budgets',$where,$order="id");
	$data['income_data'] = $this->objuser->get_all_records_orders('users_income',$where,$order="id");
	foreach($budget as $key=>$value)
	{
	    $exp_id = $value->expence_id;
	    $sbexp_id = $value->sub_expence_id;
	    $exp_arr = $this->objuser->Get_single_record('expences',$where=array('id'=>$exp_id));
	    $sexp_arr = $this->objuser->Get_single_record('sub_expences',$where=array('id'=>$sbexp_id));
	    $budget_arr[$key]['budget_id'] = $value->id;
	    $budget_arr[$key]['expence'] = $exp_arr->name;
	    $budget_arr[$key]['sub_expence'] = $sexp_arr->name;
	    $budget_arr[$key]['amount'] = $value->expence_amt;
	    $budget_arr[$key]['date'] = $value->date;
	}
	/*echo "<pre>";
	print_r($budget_arr);die;*/
	$data['budget_arr'] = $budget_arr;
    $this->load->view('budget/index',$data); 
  }
  
  function get_sub_expences()
  {
    $exp_id = $this->input->post('expence');  
    $where = array('expences_id'=>$exp_id);
    $array = $this->objuser->get_all_records_orders('sub_expences',$where,$order="id");
    if(!empty($array))
    {
        foreach($array as $row)
        {
            echo '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
    }
  }
  
  function add_new_budget()
  {
    $input_data = $this->input->post();
    $data['user_id'] = $this->session->userdata('id'); 
    $data['expence_id'] = $input_data['expence_id'];
    $data['sub_expence_id'] = $input_data['sub_expence_id'];
    $data['expence_amt'] = $input_data['expence_amt'];
    $data['date'] = $input_data['date'];
    if($this->objuser->insert_into('budgets',$data))
    {
        $res['responseData'] = "new budget added successfully";
        echo json_encode($res);
        die();
    }
  }
  
  function add_new_income()
  {
    $input_data = $this->input->post();
    $data['user_id'] = $this->session->userdata('id'); 
    $data['income_source_name'] = $input_data['income_source_name'];
    $data['income_amount'] = $input_data['income_amount'];
    $data['date'] = $input_data['date'];
    if($this->objuser->insert_into('users_income',$data))
    {
        $res['responseData'] = "new budget added successfully";
        echo json_encode($res);
        die();
    }
  }
  
  
  
  
 
/*Main Class*/
}