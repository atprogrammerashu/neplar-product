<?
$uri_segment = $this->uri->segment(1);
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap CSS -->
<link href="<?=base_url('asstes/css/chosen.css');?>" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?=base_url('asstes/css/jquery.dataTables.css');?>">
<link href="<?=base_url('asstes/css/style.css');?>" rel="stylesheet">
<link href="<?=base_url('asstes/css/custom.css');?>" rel="stylesheet">
<link href="<?=base_url('asstes/toast/build/toastr.min.css');?>" rel="stylesheet">
<link rel="icon" href="<?=base_url('asstes/img/logo1.jpg');?>" type="image/x-icon">	
</head>
<body>


<div class="mynav">
	<nav class="navbar navbar-expand-lg navbar-light" style="padding: 0px !important;">&nbsp;&nbsp;
						  <a class="navbar-brand text-white" href="#" >
						   <img src="<?=base_url('asstes/img/logo1.jpg');?>" width="35" height="30" class="d-inline-block align-top" alt="">
						  <b> Neplar Product</b>
						  </a>
       <div class="navbar-collapse collapse justify-content-between">

		    <ul class="navbar-nav ml-auto" style="margin-right: 50px;">

      <li class="nav-item"> <a class="nav-link text-white" href="<?=base_url('/Charts');?>"  data-target="#" >Dashboard</a></li>  
       

<?
if($uri_segment=="Dashboard"):
?>
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Function
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
           <div class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Transaction</a>
             <ul class="dropdown-menu">
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addtransaction" id="add">Add Transaction</a>
                 <a class="dropdown-item" href="#">View Last Transaction</a>
            </ul>
          </div>
          <div class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Portfolio</a>
            <ul class="dropdown-menu">
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addPortfolio"id="port_anchor" >Add Portfolio</a>
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editPortfolio" >Edit Portfolio</a>
            </ul>
            <div class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Group</a>
            <ul class="dropdown-menu">
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#addGroup"id="add_Group_reset" >Add Group</a>
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editGroup" id="edit_group_anchorvalid_reset" >Edit Group</a>
            </ul>
            <!--<a class="dropdown-item" href="#"  data-target="#" >Financial Data</a>-->
               <a class="dropdown-item" href="http://162.241.114.49/"  data-target="#" >Import</a>
             <a class="dropdown-item" href="#"  data-target="#" >Auto Import</a>
          </div>
        </ul>
      </li>
<?endif?>


       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          More
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuMore">    
            <a class="dropdown-item neplar-money-report" href="<?=base_url('Reports')?>" id="reports">Report</a>
            <a class="dropdown-item" href="<?=base_url('Set_reminder')?>">Set Reminder</a>
            <!--a class="dropdown-item" href="#">Calculator</a-->
            <a class="dropdown-item" href="#">Set Goal</a>
            <!--a class="dropdown-item" href="#">Tax Calculator</a-->  
            <!--a class="dropdown-item" href="#">Portfolio Rebalance</a--> 
            <a class="dropdown-item" href="<?=base_url('budget')?>">Budget</a>    
        </ul>
      </li>

                

				      <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				           <?php
                                foreach($user_info as $detail)
                                {
                                  if($detail->profile_picture == "")
                                  {
                                    echo "<span class='fa fa-user' style='font-size:25px;color:white;padding-right:5px'></span>";
                                  }
                                  else{
                                      echo "<img class='avatar' src=".$detail->profile_picture." />";
                                   }
                                  echo "<span class='username'>".$detail->user_name."</span>";
                                }
                            ?>
				        </a>

				        <div class="dropdown-menu dropdown-menu-side " aria-labelledby="navbarDropdownMenuLink" id="navbarNavDropdown">
							          <a class="dropdown-item pull-right" href="<?=base_url('my_account')?>">My Account</a>
							        
							          <a class="dropdown-item" href="#">Contact Support</a>
							  
                        <?php  
                     if($this->session->userdata('id'))
                     {
                      ?>
							          <a href="<?= base_url('Dashboard/logout'); ?>" class="dropdown-item" >Logout</a>

                        <?php
                     }  ?>
							          <div class="dropdown-divider"></div>
					                         <a class="dropdown-item" href="#">Product v 2021.01.01</a>
					    </div>
		              </li>

              </ul>
		 </div>



	</nav>	 
</div>

<?
if($uri_segment=="Dashboard"):
?>
<!-- second toolbar -->

<nav class="navbar navbar-expand-lg navbar-light tool2" >
  <div class="collapse navbar-collapse justify-content-left" style="color:#6610f2; " > 
  <?php foreach($AllSecondToolbarData as $row)
  {?> 
     <span style="font-weight: bold"><?php echo $row->index_name; ?> :&nbsp;</span>

     <span style="font-size: 16px; padding-top: 0px;font-weight: bold;"> <?php echo $row->today_value; ?></span>
      &nbsp;&nbsp;&nbsp;&nbsp;
   <?php } ?> 
  </div>
   <!--Dropdown code start here for group & portfolio-->
     <ul id="nav">       
        <li>
          <a id="showgrp" href="#">Show group</a>
            <ul>
              <span id="pp"><span>
            </ul>
       </li>
    </ul>
    <!--Dropdown code ends here for group & portfolio-->
</nav>

<!-- toolbar finish -->  


<?endif?>

<!-- add transaction modal body -->
<div class="modal fade bd-example-modal-lg" id="addtransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body" >

        <form id="form_add" class="form_validation_class" >
         
            <div class="form-group">
            <label  class="col-form-label">Portfolio:</label>
            <span id="select_portfolio_astrik" class="text-danger" style="font-size:20px;">*</span>
             <select class="form-control" id="select_portfolio_name" name="select_valid" >
                   <option value="Select Portfolio">Select Portfolio</option>
                       <?php
                          foreach($show_portfolio as $row)
                          {
                           echo '<option value="'.$row->portfolio_name.'">'.$row->portfolio_name.'</option>';
                          }
                    ?>
              </select>
            </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Asset Class:</label>
            <span id="select_assets_astrik" class="text-danger" style="font-size:20px;">*</span>
             <select class="form-control" id="select_assets" name="select_valid">
              <option value="Select Assets">Select Assets</option>
                <?php
                    foreach($Assets as $row)
                    {
                     echo '<option value="'.$row->id.'">'.$row->Assets.'</option>';
                    }
                ?>
       </select>
          </div>

           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Sub Class:</label>
            <span id="select_sub_Assets_astrik" class="text-danger" style="font-size:20px;">*</span>
             <select class="form-control" id="select_sub_Assets"name="select_valid" required="required" >
                   <option value="Select Sub Assets">Select Sub Assets</option>
              </select>
          </div>
    
        </form>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="select_transaction">Select</button>
         <button type="button" class="btn btn-secondary" id="close_add" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



 
<!-- add MyAccount modal body -->
<div class="modal fade bd-example-modal-lg" id="Myaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title text-white" >My Account</h6>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body" >
           <div class="row">
                <div class="col-md-6 bold">
                     <div>Email :</div>
                    <div>Display Name :</div>
                    <div>Product Plan :</div>
                    <div>Change Password :</div> 
                    <div>Delete Account :</div> 
                </div>
                 <div class="col-md-6">
                     <div>
                   <?php
                    foreach($user_info as $detail)
                    {
                     echo $detail->email;
                    }
                   ?>
                   </div>
                     <div> <?php
                    foreach($user_info as $detail)
                    {
                     echo $detail->user_name;
                    }
                   ?> &nbsp;<i class="fa fa-pencil" aria-hidden="true"></i></div>
                     <div>Free Plan</div>
                     <div><button type="button" id="btndesign" class="bttn">Click Here</button></div>
                     <div><button type="button" id="btndesign" class="bttn">Click Here</button></div>
                </div>
           </div>



     </div>
    
    </div>
  </div>
</div>







