 <?php include('header.php'); ?>
	
<hr style="margin-top: 0px !important; border-top: 1px solid black;">
<div class="container-fluid" style=" margin-top: -10px !important; ">
<div class="row">



    <!-- Table face -->

 
		 <div class="col-12 col-md-12">

				  <table class="table table-hover text-left" id="tableMain">
						   <thead>
						       <tr>
                   <th>   
                    <span id="display_assets" class="fa fa-plus-circle " aria-hidden="true" data-toggle="modal" data-target="#showTotalData">
                    </span>
                  </th>
      
                     <th >
                          <div class="input-group ">
                          <input type="search" id="search-inp" class="form-control" placeholder="Search Assets" >
                           </div>
                    </th> 

						        <th >Qty.</th>
						        <th >Avg. Price / NAV</th>
						        <th >Amt. Inv.</th>
						        <th >LTP</th>
						        <th >Current Value</th>
						        <th >Today's Gain / Gain %</th>
						        <th >Notional Gain / Gain %</th>
						      </tr>
						    </thead>

						    <tbody ></tbody>
					      <tfoot>
                   <tr id="networth">
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                   </tr>
                </tfoot>
						     
				  </table>

		</div>
</div>  
</div>



<!--  second table code inside modal -->
<div class="modal fade" id="showTotalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog front-modal-table-size" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >All Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

             <table class="table table-hover text-left" id="tableMain2">
               <thead >
                   <tr>
                   <th class="sorting_disabled"></th>      
                   <th>
                          <div class="input-group ">
                          <input type="search" id="search-inp2" class="form-control" placeholder="Search Assets" >
                           </div>
                    </th> 
                    <th >Qty.</th>
                    <th >Avg. Price / NAV</th>
                    <th >Amt. Inv.</th>
                    <th>LTP</th>
                    <th >Current Value</th>
                    <th >Today's Gain / Gain %</th>
                     <th >Notional Gain / Gain %</th>
                  </tr>
                </thead>
                <tbody></tbody>
             
          </table>


      </div> 
      </div>
    </div>
  </div> <!--  modal close here .... -->


 

<!-- add Portfolio modal body -->
<div class="modal fade bd-example-modal-lg" id="addPortfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Portfolio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="overflow-y:scroll;height:600px ;">
      	   <div class="row">
                    <div class="col-md-12">
                   
                    <span id="port_alert-msg"></span>
                    
                    </div>
           </div>
          <form id="add_port_form" class="form_validation_class">
                
      <div class="row">
      	   <div class="col-md-6">

		          <div class="form-group">
		            <label  class="col-form-label">Portfolio Name:</label>
                <span id="portfolio_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		             <?php echo form_input(['type'=>'text','class'=>'form-control','maxlength'=> '15','placeholder'=>'Enter Portfolio Name','id'=>'portfolio_name','name'=>'portfolio_name','value'=>set_value('portfolio_name')]);?>
                              
                                  
                                  
		          </div>
		          <div class="form-group">
					 <label >D.O.B</label>
            <span id="port_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
					 <input type="date"  id="port_date" name="port_date" max="3000-12-31" min="1000-01-01" class="form-control">
				 </div>

				   <div class="form-group">
		            <label  class="col-form-label">Full Name:</label>
                 <span id="full_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		             <?php echo form_input(['type'=>'text','id'=>'full_name','class'=>'form-control','maxlength'=>'15','minlength'=>'3','required' => 'required','placeholder'=>'Enter Full Name','name'=>'full_name','value'=>set_value('full_name')]);?>
                              
                                  
		          </div>

		             <div class="form-group">
		                  <label for="recipient-name" class="col-form-label">Select Group:</label>
                       <span id="port_group_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		                   <select class="form-control chosen-search" name="port_group" id="port_group">
		                   <option value="Choose your group">Choose your group</option>
		                    <?php
                             foreach($show_group as $row)
                          {
                           echo '<option value="'.$row->group_name.'">'.$row->group_name.'</option>';
                          }
                      ?> 
		                  </select>
		            </div>

				   <div class="form-group">
		                  <label for="recipient-name" class="col-form-label">Gender:</label>
                       <span id="port_gender_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		                   <select class="form-control" name="port_gender" id="port_gender" >
                        <option value="Choose gender">Choose gender</option>
		                   <option value="Male">Male</option>
		                   <option value="Female">Female</option>
		                   <option value="Other">Other</option>
		                  </select>
		            </div>

                   <div class="form-group">
		            <label  class="col-form-label">PRAN:</label>
                 <span id="pran_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		              <?php echo form_input(['type'=>'text','id'=>'pran','class'=>'form-control','maxlength' => '15','placeholder'=>'Enter PRAN','name'=>'pran','value'=>set_value('pran')]);?>
                              
                                  
		          </div>


                   <div class="form-group">
		            <label  class="col-form-label">eInsurances No. :</label>
                 <span id="einsurance_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		              <?php echo form_input(['type'=>'text','id'=>'einsurance_no','maxlength' => '15','class'=>'form-control','placeholder'=>'Enter eInsurances No','name'=>'einsurance_no','value'=>set_value('einsurance_no')]);?>
                              
                                  
                            
		          </div>

		  </div>
		  
		  <div class="col-md-6" style="background-color: rgb(238,238,238);">

		           <div class="form-group">
		            <label  class="col-form-label">Address:</label>
                 <span id="port_address_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		              <textarea class="form-control" placeholder="Enter Address" id ="port_address" name="port_address" rows="3"></textarea>
		          </div>

		           <div class="form-group">
		            <label  class="col-form-label">City:</label>
                 <span id="port_city_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		              <?php echo form_input(['type'=>'text','id'=>'port_city','class'=>'form-control','placeholder'=>'Enter City','name'=>'port_city','value'=>set_value('port_city')]);?>
                              
                                  
                                    
		          </div>
		           <div class="form-group">
		            <label  class="col-form-label">Country:</label>
                 <span id="port_country_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		             <?php echo form_input(['type'=>'text','id'=>'port_country','class'=>'form-control','placeholder'=>'Enter Country','name'=>'port_country','value'=>set_value('port_country')]);?>
                              
                                  
		          </div>
		            <div class="form-group">
		            <label  class="col-form-label">Pin Code:</label>
                 <span id="pin_code_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		             <?php echo form_input(['type'=>'text','id'=>'pin_code','maxlength' => '6','class'=>'form-control','placeholder'=>'Enter Pin Code','name'=>'pin_code','value'=>set_value('pin_code')]);?>
                              
                                 
		          </div>
		          <div class="form-group">
		            <label  class="col-form-label">PAN:</label>
                 <span id="pan_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		            <?php echo form_input(['type'=>'text','id'=>'pan','maxlength' => '10','class'=>'form-control','placeholder'=>'Enter PAN No.','name'=>'pan','value'=>set_value('pan')]);?>
                              
                               
		          </div>
           <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $this->session->userdata('id');?>">
    	   </div>

      </div>
        </form>
      </div>
      <div class="modal-footer">
        <?php echo form_submit(['type'=>'submit','id'=>'add_portfolio_submit','class'=>'btn btn-primary','value'=>'Save']);?>
         <button type="button" class="btn btn-secondary" id="portf_cancel" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>





<!-- edit Portfolio modal body -->
<div class="modal fade bd-example-modal-lg" id="editPortfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit Portfolio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
           <div class="row">
                    <!--<div class="col-md-12">-->
                   
                    <!--<span id="update_port_alert-msg"></span>-->
                    
                    <!--</div>-->
           </div>
        <form class="form_validation_class" id="edit_port_form">
              <div class="form-group">
                        <label  class="col-form-label">Portfolio Name:</label>
                        <span id="update_portfolio_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                        <select class="form-control" id="update_portfolio_name"name="update_portfolio_name" >
                                       <option value="Choose portfolio name">Choose portfolio name</option>              
                             <?php
                                     foreach($show_portfolio as $row)
                                  {
                                   echo '<option value="'.$row->portfolio_name.'">'.$row->portfolio_name.'</option>';
                                  }
                              ?>
                        </select>
                      </div>

         <div class="row">
       
               <div class="col-md-6">
                     <input type="hidden" class="form-control" name="hide_portname" id="hide_portname" >
                       <div class="form-group">
                         <label >D.O.B</label>
                             
                         <input type="date" id="update_port_date" name="port_date" max="3000-12-31" min="1000-01-01" class="form-control">
                       </div>

                       <div class="form-group">
                          <label  class="col-form-label">Full Name:</label>
                           
                          <input type="text" class="form-control"  maxlength="15" id="update_full_name" name="update_full_name" required>
                        </div>
                          <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Gender:</label>
                       
                       <select class="form-control" name="port_gender" id="update_port_gender"  >
                        <option value="">Choose Gender</option>
                       <option value="Male">Male</option>
                       <option value="Female">Female</option>
                       <option value="Other">Other</option>
                      </select>
                      </div>

                         <div class="form-group">
                          <label  class="col-form-label">Address:</label>
                          
                         <textarea class="form-control" id="update_port_address" name="update_port_address" rows="3"></textarea>
                        </div>
                         <div class="form-group">
                          <label  class="col-form-label">City:</label>
                            
                          <input type="text" class="form-control" id="update_port_city" >
                        </div>
                                        

               </div>

               <div class="col-md-6" style="background-color: rgb(238,238,238);">
                       <div class="form-group">
                          <label  class="col-form-label">PRAN:</label>
                            
                          <input type="text" class="form-control" maxlength="15" id="update_pran" name="update_pran">
                        </div>   
                        <div class="form-group">
                          <label  class="col-form-label">eInsurances No. :</label>
                         
                          <input type="text" class="form-control" maxlength="15" id="update_einsurance_no" name="update_einsurance_no">
                        </div>
                         <div class="form-group">
                          <label  class="col-form-label">Country:</label>
                            
                          <input type="text" class="form-control" id="update_port_country" name="update_port_country" >
                        </div>
                          <div class="form-group">
                          <label  class="col-form-label">Pin Code:</label>
                          
                          <input type="text" class="form-control" maxlength="6" id="update_pin_code" name="update_pin_code" >
                        </div>
                        <div class="form-group">
                          <label  class="col-form-label">PAN:</label>
                       
                          <input type="text" class="form-control" maxlength="10" id="update_pan" name="update_pan" >
                        </div>

                      
              </div>
     </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="update_port">Update</button>
        <button type="button" class="btn btn-danger" id="delete_port">Delete</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal" id="edit_port_cancel">Cancle</button>
      </div>
    </div>
  </div>
</div>





<!-- add Group modal body -->
<div class="modal fade bd-example-modal-lg" id="addGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
                  
                    <!--<div class="row">-->
                    <!--<div class="col-md-12">-->
                   
                    <!--<span id="alert-msg"></span>-->
                    
                    <!--</div>-->
                    <!--</div>-->


         <form name="groupform"  class="form_validation_class" id="grpform" >
       
          
          <div class="container-fluid">
          	<div class="row" style="width: 850px; padding-left: 300px;">
          		<div class="col-md-12" >
          			
          		
		         <div class="form-group" class="form_validation_class" id="grpform">
		            <label  class="col-form-label">Group Name:</label>
		             <span id="astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		             <?php echo form_input(['type'=>'text','class'=>'form-control','maxlength' => '15','placeholder'=>'Enter Group Name','id'=>'group_name','name'=>'group_name','value'=>set_value('group_name')]);?> 

		            
		          </div>
                         
		          </div>
          	</div>

          </div>
           
       </form>
      </div>
      <div class="modal-footer">
   <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Save','id'=>'group_submit']);?>
         <button type="button" class="btn btn-secondary" id="grp_cancel" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>


<!-- edit Group modal body -->
<div class="modal fade bd-example-modal-lg" id="editGroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Edit Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
           <!--<div class="row">-->
           <!--         <div class="col-md-12">-->
                   
           <!--         <span id="update-alert-msg"></span>-->
                    
           <!--         </div>-->
           <!--</div>-->
        <form id="update_grp_form" class="form_validation_class">
          
          <div class="container-fluid">
          	<div class="row" style="width: 850px; padding-left: 300px;">
          		<div class="col-md-12" >
          			
                      <div class="form-group">
						<label  class="col-form-label">Group Name:</label>
            <span id="update_group_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
						    <select class="form-control" id="update_group_name" name="update_group_name" >
                  <option value="">Choose group name</option>
						         <?php
                             foreach($show_group as $row)
                          {
                           echo '<option value="'.$row->group_name.'">'.$row->group_name.'</option>';
                          }
                      ?>
							             
						    </select>
					  </div>
          		
		         <div class="form-group">
		            <label  class="col-form-label">New Group Name:</label>
                <span id="update_group_value_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		            <input type="text" class="form-control" id="update_group_value"name="update_group_value" placeholder="">
		          </div>

		          </div>
          	</div>

          </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="update_group_submit" >Save</button>
         <button type="button" class="btn btn-secondary" id="grp_update_cancle" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>



<!-- add Stock modal body -->
<div class="modal fade bd-example-modal-lg" id="addStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Stock / ETF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  style="overflow-y:scroll;height:600px ;">
           <div class="row">
                    <div class="col-md-12">
                   
                    <span id="stock_alert-msg"></span>
                    
                    </div>
                    </div>
        <form class="form_validation_class" id="stock_form" name="stock_form" role="form">
        <div class="row">
        	<div class="col-md-3">
        		  <input type="hidden" class="form-control"  id="stock_user_id" name="stock_user_id" value="<?php echo $this->session->userdata('id');?>">
              <div class="form-group">
            <label  class="col-form-label">Stock Name</label>
               <span id="stock_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
             <select class="form-control" id="stock_name" name="stock_name" >
                   <option value="">Choose Stock</option>
                    <?php
                             foreach($stock_name as $row)
                          {
                           echo '<option value="'.$row->stock_name.'">'.$row->stock_name.'</option>';
                          }
                      ?>
               </select>

          </div>

         <div class="form-group">
            <label  class="col-form-label">Trans. Type </label>
               <span id="stock_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
               <select class="form-control" id="stock_transaction_type" name="stock_transaction_type" >
                   <option value="">Choose</option>
	               <option value="Buy">Buy</option>
	               <option value="Sell">Sell</option>
               </select>
          </div>

       
           <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Broker:</label>
                     <span id="stock_broker_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                   <select class="form-control" id="stock_broker" name="stock_broker" >
                   <option value="">Select Broker</option>
                    <?php
                             foreach($broker_name as $row)
                          {
                           echo '<option value="'.$row->broker_name.'">'.$row->broker_name.'</option>';
                          }
                      ?>
                  </select>
            </div>

          <div class="form-group">
			 <label >Date</label>
          <span id="stock_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			 <input type="date" id="stock_date" name="stock_date" max="31-12-3000" min="01-01-1000" class="form-control">
		 </div>

         <div class="form-group">
            <label  class="col-form-label">Contract Note no.</label>
          
            <input type="text" class="form-control" id="stock_contract_no" name="stock_contract_no" placeholder="">
          </div>

            <div class="form-group">
            <label  class="col-form-label">Settlement no.</label>
            
            <input type="text" class="form-control" id="stock_settlement_no" name="stock_settlement_no"  placeholder="">
          </div>


 	   </div>

         <div class="col-md-3">
         	           	
                  <div class="form-group">
		            <label  class="col-form-label">Quantity</label>
                   <span id="stock_qty_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		            <input type="text"  id="stock_qty" name="stock_qty" class="form-control prc"  placeholder="">
		          </div>

		           <div class="form-group">
		            <label  class="col-form-label">Purchase Price</label>
                   <span id="stock_purchase_price_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		            <input type="text" class="form-control prc" id="stock_purchase_price" name="stock_purchase_price" placeholder="">
		          </div>

		            <div class="form-group">
		            <label  class="col-form-label">Amt. Invested</label>
                   <span id="stock_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		            <input type="text" class="form-control prc" id="stock_amt_invested" name="stock_amt_invested" placeholder="">
		          </div>

		           <div class="form-group">
		            <label  class="col-form-label">Brokerage</label>
               
		            <input type="text" class="form-control prc" id="stock_brokerage"value="0" name="stock_brokerage" placeholder="">
		          </div>

		            <div class="form-group">
		            <label  class="col-form-label">Net Rate</label>
                   <span id="stock_net_rate_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		            <input type="text" class="form-control prc" id="stock_net_rate"value="0" name="stock_net_rate" placeholder="">
		          </div>

		         

         </div>

 	      <div class="col-md-3" style="background-color: rgb(238,238,238);">

 	      	        <div class="form-group">
		            <label  class="col-form-label">Taxable Value of Supply</label>
             
		            <input type="text" class="form-control prc" id="stock_tax_value"value="0" name="stock_tax_value" placeholder="">
		          </div>

		         

		           <div class="form-group">
		            <label  class="col-form-label">CGST</label>
              
		               <div class="input-group-prepend">
				           <input type="text" class="form-control" id="stock_cgst" name="stock_cgst" placeholder="">
				              <div class="input-group-text">%</div>
				        </div>
		          </div>

                  <div class="form-group">
		            <label  class="col-form-label">SGST</label>
              
		               <div class="input-group-prepend">
				           <input type="text" class="form-control" id="stock_sgst" name="stock_sgst" placeholder="">
				              <div class="input-group-text">%</div>
				        </div>
		          </div>

		           <div class="form-group">
		               <label  class="col-form-label">IGST</label>
                    
		               <div class="input-group-prepend">
				           <input type="text" class="form-control prc" id="stock_igst"value="0" name="stock_igst" placeholder="">
				              <div class="input-group-text">%</div>
				        </div>
		          </div>

		              <div class="form-group">
		            <label  class="col-form-label">Exchange Trans. Charge</label>
           
		            <input type="text" class="form-control prc" id="stock_exchange_transaction"value="0" name="stock_exchange_transaction" placeholder="">
		          </div>
                
             
 	      </div>

 	      <div class="col-md-3" style="background-color: rgb(238,238,238);">

 	      	        <div class="form-group">
		            <label  class="col-form-label">STT</label>
               
		            <input type="text" class="form-control prc" id="stock_stt"value="0" name="stock_stt" placeholder="">
		          </div>

 	      	     <div class="form-group">
		            <label  class="col-form-label">SEBI Turnover Fees</label>
              
		            <input type="text" class="form-control prc" id="stock_sebi_fee"value="0" name="stock_sebi_fee" placeholder="">
		          </div>

                  <div class="form-group">
		            <label  class="col-form-label">Stamp Duty</label>
              
		            <input type="text" class="form-control prc" id="stock_stamp_duty"value="0" name="stock_stamp_duty" placeholder="">
		          </div>

		          <div class="form-group">
		            <label  class="col-form-label">Net Amount Payable</label>
                   <span id="stock_net_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		            <input type="text" class="form-control prc" id="stock_net_amt" name="stock_net_amt" placeholder="">
		          </div>

		        

 	      </div>
      </div>

      </form>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" id="apply_stock">Add</button>
       
         <button type="button" class="btn btn-secondary" id="can_stock" data-dismiss="modal">Cancle</button>
      </div>

      <div class="container-fluid">
            <table class="" id="stock_table_data" style="width:100% !important;" >
               <thead>
                  <tr class="">
                      <th class=""  >Stock name</th>
                
                    <th class="">Trans.</th>
                  <th class="">Broker</th>
                    <th class="">Date</th> 

                   <th class="">Qty</th>
                   <th class="">Purchase price</th>
                   <th>Click</th>
                  </tr>
                </thead>

                 <tbody>

              
                </tbody>
          </table>
      </div>



    </div>
  </div>
</div>



<!-- add Mutual Fund modal body -->
<div class="modal fade" id="addMutualFund" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Mutual Fund</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
                   <div class="col-md-12">
                   
                    <span id="mutual_fund_alert-msg"></span>
                    
                    </div>
                  
        <form  class="form_validation_class" id="mutual_form">
        
        <div class="row">

        	  <div class="col-md-6">

          <input type="hidden" class="form-control"  id="mutual_user_id" name="mutual_user_id" value="<?php echo $this->session->userdata('id');?>">
			         <div class="form-group">
			            <label  class="col-form-label">M.F. Company</label>
                 <span id="mutual_company_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			               <select class="form-control" id="mutual_company_name" name="mutual_company_name" >
			                   <option value="">Choose</option>
                    <?php
                             foreach($mutualfund_name as $row)
                          {
                           echo '<option value="'.$row->mutual_fund_name.'">'.$row->mutual_fund_name.'</option>';
                          }
                      ?>
			               </select>
			          </div> 	

			        <div class="form-group">
			            <label  class="col-form-label">M.F. Scheme</label>
                     <span id="mutual_scheme_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			               <select class="form-control" id="mutual_scheme" name="mutual_scheme" >
			                   <option value="">Choose</option>
				                 <?php
                             foreach($mutual_scheme_name as $row)
                          {
                           echo '<option style="font-size:12px; font-weight:600px;" value="'.$row->mutual_scheme.'">'.$row->mutual_scheme.'</option>';
                          }
                      ?>
			               </select>
			          </div>


			            <div class="form-group">
			            <label  class="col-form-label">Folio Number</label>
                     <span id="mutual_folio_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			              <input type="text" class="form-control" id="mutual_folio_no" name="mutual_folio_no" placeholder="">
			          </div>
			          
			           <div class="form-group">
			            <label  class="col-form-label">Trans. Type </label>
                     <span id="mutual_transaction_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			               <select class="form-control" id="mutual_transaction" name="mutual_transaction" >
			                   <option value="">Choose</option>
				               <option value="Buy / Purchase">Buy / Purchase</option>
				               <option value="Sell / Redeem">Sell / Redeem</option>
				               <option value="Switch">Switch</option>
				              <option value="Divident Reinvest">Divident Reinvest</option>

				            
			               </select>
			          </div>

			          <div class="form-group">
			            <label  class="col-form-label">Type of M.F.</label>
                     <span id="mutual_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			               <select class="form-control" id="mutual_type" name="mutual_type" >
			                   <option value="">Choose</option>
				               <option value="Equity">Equity</option>
				               <option value="Debt">Debt</option>
			               </select>
			          </div>

             <div class="form-group">
             <label >SIP Date</label>
                <span id="mutual_sip_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
             <input type="date" id="mutual_sip_date" name="mutual_sip_date" max="3000-12-31" min="1000-01-01" class="form-control">
           </div>


          </div>


        <div class="col-md-6" style="background-color: rgb(238,238,238);">

              <div class="form-group">
                <label  class="col-form-label">Advisor</label>
                   <select class="form-control" id="mutual_advisor" name="mutual_advisor" >
                       <option value="">Choose</option>
                     <option value="Direct">Direct</option>
                     <option value="Regular">Regular</option>
                   </select>
              </div>

                <div class="form-group">
             <label >Date</label>
                <span id="mutual_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
             <input type="date" id="mutual_date" name="mutual_date" max="3000-12-31" min="1000-01-01" class="form-control">
           </div>

		        	 <div class="form-group">
		              <label  class="col-form-label">Quantity Purchase</label>
                   <span id="mutual_quantity_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
				             <div class="input-group-prepend">
						           <input type="text" class="form-control" id="mutual_quantity" name="mutual_quantity" placeholder="">
						              <div class="input-group-text">Unit</div>
						      </div>
				     </div>
		          
		         <div class="form-group">
		            <label  class="col-form-label">NAV</label>
                   <span id="mutual_nav_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		            <input type="text" class="form-control" id="mutual_nav" name="mutual_nav"  placeholder="">
		          </div>
             

		           <div class="form-group">
		            <label  class="col-form-label">Amount Invested</label>
                   <span id="mutual_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
		            <input type="text" class="form-control" id="mutual_amt_invested" name="mutual_amt_invested" placeholder="">
		          </div>

               
		            <div class="form-group">
		            <label  class="col-form-label">Stamp Charges</label>
		            <input type="text" class="form-control" id="mutual_stamp_charge" name="mutual_stamp_charge"  placeholder="">
		          </div>

		           <div class="form-group">
                <label  class="col-form-label">Exit Load</label>
                   <div class="input-group-prepend">
                   <input type="text" class="form-control" id="mutual_exit_load" name="mutual_exit_load"  placeholder="">
                      <div class="input-group-text">%</div>
                </div>
              </div>
                    
                  <div class="form-group">
		            <label  class="col-form-label">Net Amount Invested</label>
                    <input type="text" class="form-control" id="mutual_net_amt_invested" name="mutual_net_amt_invested" placeholder="">
		          </div>	    

         </div>

      </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="apply_mutual_fund" >add</button>
         <button type="button" class="btn btn-secondary" id="can_mutual" data-dismiss="modal">Cancle</button>
      </div>

 <div class="container-fluid">
            <table class="" id="mutualfund_table_data" style="width:100% !important;" >
               <thead>
                  <tr class="">
                      <th>Mutual Fund Scheme</th>
                      <th class="">Folio No.</th>
                    <th class="">Qty Pur.</th>
                  <th class="">NAV</th>
                    <th class="">Date</th> 
                   <th class="">Amt Invested</th>
                   <th>Click</th>
                  </tr>
                </thead>

                 <tbody>

              
                </tbody>
          </table>
      </div>

    </div>
  </div>
</div>



<!-- add NCD /Debenture modal body -->
<div class="modal fade bd-example-modal-lg" id="addNCDebenture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add NCD / Debenture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form  class="form_validation_class" id="ncd_form">

        <div class="row">
                    <div class="col-md-12">
                   
                    <span id="NCD_alert-msg"></span>
                    
                    </div>

        	 <div class="col-md-6">
        	       				        
			          <div class="form-group">
						<label  class="col-form-label">Type</label>
             <span id="ncd_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
						    <select class="form-control" id="ncd_type" name="ncd_type" >
						                   <option value="">Choose</option>
							               <option value="Debenture">Debenture</option>
							               <option value="Non Convertible Debenture">Non Convertible Debenture</option>
						    </select>
					  </div>


			          <div class="form-group">
						<label  class="col-form-label">Select NCD Name</label>
           <span id="ncd_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
						    <select class="form-control" id="ncd_name" name="ncd_name" >
						                   <option value="">Choose</option>
							                  <option value="testing">testing</option>
						    </select>
					  </div>

					  <div class="form-group">
									<label  class="col-form-label">Transaction type:</label>
               <span id="ncd_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
									    <select class="form-control" id="ncd_transaction_type" name="ncd_transaction_type" >
									                   <option value="">Choose</option>
										               <option value="Buy">Buy</option>
										               <option value="Sell">Sell</option>
									    </select>
					  </div>

					    <div class="form-group">
									 <label >Date</label>
                 <span id="ncd_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
									 <input type="date" id="ncd_date" id="ncd_type" name="ncd_type" max="3000-12-31" min="1000-01-01" class="form-control">
					    </div>
			          
                       <div class="form-group">
			            <label  class="col-form-label">Purchase Price:</label>
                 <span id="ncd_purchase_price_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="ncd_purchase_price" name="ncd_purchase_price" placeholder="">
			          </div>
			          

			            <div class="form-group">
			            <label  class="col-form-label">Quantity:</label>
                 <span id="ncd_quantity_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="ncd_quantity" name="ncd_quantity" placeholder="">
			          </div>		            
          
        </div>

        <div class="col-md-6" style="background-color: rgb(238,238,238);">

        	       <div class="form-group">
			            <label  class="col-form-label">Amt. Invested:</label>
               <span id="ncd_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="ncd_amt_invested" name="ncd_amt_invested" placeholder="">
			        </div>

		           <div class="form-group">
							<label  class="col-form-label">Interest Payout</label>
           <span id="ncd_interest_payout_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="ncd_interest_payout" name="ncd_interest_payout" >
							                   <option value="">Choose</option>
								               <option value="Cumulative">Cumulative</option>
								               <option value="Payout">Payout</option>
							    </select>
				   </div>

				     <div class="form-group">
				            <label  class="col-form-label">Interest rate:</label>
                 <span id="ncd_interest_rate_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
				               <div class="input-group-prepend" >
						           <input type="text" class="form-control" id="ncd_interest_rate" name="ncd_interest_rate" placeholder="">
						              <div class="input-group-text">%</div>
						        </div>
				     </div>

				        <div class="form-group">
							<label  class="col-form-label">Interest Payable</label>
             <span id="ncd_interest_payable_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="ncd_interest_payable" name="ncd_interest_payable" >
							                   <option value="">Choose</option>
								               <option value="Quarterly">Quarterly</option>
								               <option value="Monthly">Monthly</option>
								               <option value="Half Yearly">Half Yearly</option>
								               <option value="Yearly">Yearly</option>
							    </select>
				     </div>

		              <div class="form-group">
								 <label >Maturity date</label>
               <span id="ncd_maturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="ncd_maturity_date" name="ncd_maturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>
                     
				      <div class="form-group">
								 <label >Locking period</label>
								 <input type="date" id="ncd_locking_period"name="ncd_locking_period" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>

           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addNCDdata" >Save</button>
         <button type="button" class="btn btn-secondary" id="can_ncd" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>



<!-- add Bond modal body -->
<div class="modal fade bd-example-modal-lg" id="addbond" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Bond</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  style="overflow-y:scroll;height:600px ;">
        <form  class="form_validation_class" id="bond_form">
        <div class="row">
        	<div class="col-md-3">
        		
              <div class="form-group">
            <label  class="col-form-label">Bond Name</label>
             <select class="form-control"  >
                   <option value="">Choose</option>
	              
               </select>
          </div>

         <div class="form-group">
            <label  class="col-form-label">Trans. Type </label>
               <select class="form-control"  >
                   <option value="">Choose</option>
	               <option value="">Buy</option>
	               <option value="">Sell</option>
               </select>
          </div>

       
           <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Broker:</label>
                   <select class="form-control"  >
                   <option value="">Select Broker</option>
               
                  </select>
            </div>

          <div class="form-group">
			 <label >Date</label>
			 <input type="date" name="" max="3000-12-31" min="1000-01-01" class="form-control">
		 </div>

         <div class="form-group">
            <label  class="col-form-label">Contract Note no.</label>
            <input type="text" class="form-control"  placeholder="">
          </div>

            <div class="form-group">
            <label  class="col-form-label">Settlement no.</label>
            <input type="text" class="form-control"  placeholder="">
          </div>


 	   </div>

         <div class="col-md-3">
         	    
         	
                  <div class="form-group">
		            <label  class="col-form-label">Quantity</label>
		            <input type="text" class="form-control"  placeholder="">
		          </div>

		           <div class="form-group">
		            <label  class="col-form-label">Purchase Price</label>
		            <input type="text" class="form-control"  placeholder="">
		          </div>

		            <div class="form-group">
		            <label  class="col-form-label">Amt. Invested</label>
		            <input type="text" class="form-control"  placeholder="">
		          </div>

		           <div class="form-group">
		            <label  class="col-form-label">Brokerage</label>
		            <input type="text" class="form-control"  placeholder="">
		          </div>

		            <div class="form-group">
		            <label  class="col-form-label">Net Rate</label>
		            <input type="text" class="form-control"  placeholder="">
		          </div>

		         

         </div>

 	      <div class="col-md-3" style="background-color: rgb(238,238,238);">

 	      	        <div class="form-group">
		            <label  class="col-form-label">Taxable Value of Supply</label>
		            <input type="text" class="form-control"  placeholder="">
		          </div>

		         

		           <div class="form-group">
		            <label  class="col-form-label">CGST</label>
		               <div class="input-group-prepend">
				           <input type="text" class="form-control"  placeholder="">
				              <div class="input-group-text">%</div>
				        </div>
		          </div>

                  <div class="form-group">
		            <label  class="col-form-label">SGST</label>
		               <div class="input-group-prepend">
				           <input type="text" class="form-control"  placeholder="">
				              <div class="input-group-text">%</div>
				        </div>
		          </div>

		           <div class="form-group">
		               <label  class="col-form-label">IGST</label>
		               <div class="input-group-prepend">
				           <input type="text" class="form-control"  placeholder="">
				              <div class="input-group-text">%</div>
				        </div>
		          </div>

		              <div class="form-group">
		            <label  class="col-form-label">Exchange Transaction Charge</label>
		            <input type="text" class="form-control"  placeholder="">
		          </div>
                
             
 	      </div>

 	      <div class="col-md-3" style="background-color: rgb(238,238,238);">

 	      	        <div class="form-group">
		            <label  class="col-form-label">STT</label>
		            <input type="text" class="form-control"  placeholder="">
		          </div>

 	      	     <div class="form-group">
		            <label  class="col-form-label">SEBI Turnover Fees</label>
		            <input type="text" class="form-control"  placeholder="">
		          </div>

                  <div class="form-group">
		            <label  class="col-form-label">Stamp Duty</label>
		            <input type="text" class="form-control"  placeholder="">
		          </div>

		          <div class="form-group">
		            <label  class="col-form-label">Net Amount Payable</label>
		            <input type="text" class="form-control"  placeholder="">
		          </div>

		        

 	      </div>
      </div>

      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save</button>
         <button type="button" class="btn btn-secondary" id="can_bond" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>



<!-- add FD body -->
<div class="modal fade bd-example-modal-lg" id="addFD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add FD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form  class="form_validation_class" id="fd_form">

        <div class="row">

                   <div class="col-md-12">
                   
                    <span id="fd_alert-msg"></span>
                    
                    </div>

        	 <div class="col-md-6">
        	       	
			        
			          <div class="form-group">
						<label  class="col-form-label">Type</label>
                 <span id="fd_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
						    <select class="form-control" id="fd_type" name="fd_type" >
						                   <option value="">Choose</option>
							               <option value="Bank">Bank</option>
							               <option value="Post Office">Post Office</option>
							                <option value="Corporate FD">Corporate FD</option>
						    </select>
					  </div>


                 <div class="form-group">
                  <label  class="col-form-label">A/c No.</label>
                 <span id="fd_account_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="fd_account_no"name="fd_account_no" placeholder="">
              </div>

					  <div class="form-group">
									<label  class="col-form-label">Transaction type:</label>
               <span id="fd_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
									    <select class="form-control" id="fd_transaction_type" name="fd_transaction_type" >
									                   <option value="">Choose</option>
										               <option value="Buy">Buy</option>
										               <option value="Sell">Sell</option>
									    </select>
					  </div>


					   <div class="form-group">
							<label  class="col-form-label">Interest Payout</label>
							    <select class="form-control" id="fd_interest_payout" name="fd_interest_payout" >
							                   <option value="">Choose</option>
								               <option value="Cumulative">Cumulative</option>
								               <option value="Payout">Payout</option>
							    </select>
				     </div>
				
					   <div class="form-group">
							<label  class="col-form-label">Interest Payment</label>
							    <select class="form-control" id="fd_interest_payment"name="fd_interest_payment" >
							                   <option value="">Choose</option>
								               <option value="Quarterly">Quarterly</option>
								               <option value="Monthly">Monthly</option>
								               <option value="Half Yearly">Half Yearly</option>
								               <option value="Yearly">Yearly</option>
							    </select>
				     </div>   

          <div class="form-group">
              <label  class="col-form-label">Interest Type</label>
                  <select class="form-control" id="fd_interest_type" name="fd_interest_type" >
                                 <option value="">Choose</option>
                                 <option value="Simple">Simple</option>
                               <option value="Compound">Compound</option>
                               
                  </select>
           </div> 
          
        </div>

        <div class="col-md-6" style="background-color: rgb(238,238,238);">

             <div class="form-group">
                 <label >Start Date</label>
                <span id="fd_start_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="fd_start_date"name="fd_start_date" max="3000-12-31" min="1000-01-01" class="form-control">
                  </div>                
                   
              <div class="form-group">
                  <label  class="col-form-label">Amt. Invested:</label>
                  <span id="fd_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="fd_amt_invested" name="fd_amt_invested" placeholder="">
              </div>
  
              
                <div class="form-group">
                 <label >Maturity Amount</label>
                         <input type="text" class="form-control" id="fd_maturity_amt" name="fd_maturity_amt" placeholder="">
                 </div>


		          <div class="form-group">
								 <label >Maturity date</label>
                  <span id="fd_maturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="fd_maturity_date" name="fd_maturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>


               <div class="form-group">
                    <label  class="col-form-label">Interest rate:</label>
                     <span id="fd_interest_rate_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                       <div class="input-group-prepend">
                       <input type="text" class="form-control" id="fd_interest_rate" name="fd_interest_rate" placeholder="">
                          <div class="input-group-text">%</div>
                    </div>
             </div>

           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addfddata">Save</button>
         <button type="button" class="btn btn-secondary" id="can_fd" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>



<!-- add  RD body -->
<div class="modal fade bd-example-modal-lg" id="addRD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add RD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body" >
        <form  class="form_validation_class" id="rd_form">

        <div class="row">
                  <div class="col-md-12">
                   
                    <span id="RD_alert-msg"></span>
                    
                    </div>

        	 <div class="col-md-6">
        	       	
			        
			      <div class="form-group">
            <label  class="col-form-label">Type</label>
                 <span id="rd_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <select class="form-control" id="rd_type" name="rd_type" >
                               <option value="">Choose</option>
                             <option value="Bank">Bank</option>
                             <option value="Post Office">Post Office</option>
                              <option value="Corporate FD">Corporate FD</option>
                </select>
            </div>


                 <div class="form-group">
                  <label  class="col-form-label">A/c No.</label>
                 <span id="rd_account_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="rd_account_no" name="rd_account_no" placeholder="">
              </div>

            <div class="form-group">
                  <label  class="col-form-label">Transaction type:</label>
               <span id="rd_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                      <select class="form-control" id="rd_transaction_type" name="rd_transaction_type" >
                                     <option value="">Choose</option>
                                   <option value="Buy">Buy</option>
                                   <option value="Sell">Sell</option>
                      </select>
            </div>


             <div class="form-group">
              <label  class="col-form-label">Interest Payout</label>
                  <select class="form-control" id="rd_interest_payout" name="rd_interest_payout" >
                                 <option value="">Choose</option>
                               <option value="Cumulative">Cumulative</option>
                               <option value="Payout">Payout</option>
                  </select>
             </div>
        
             <div class="form-group">
              <label  class="col-form-label">Interest Payment</label>
                  <select class="form-control" id="rd_interest_payment"name="rd_interest_payment" >
                                 <option value="">Choose</option>
                               <option value="Quarterly">Quarterly</option>
                               <option value="Monthly">Monthly</option>
                               <option value="Half Yearly">Half Yearly</option>
                               <option value="Yearly">Yearly</option>
                  </select>
             </div>  

                         <div class="form-group">
              <label  class="col-form-label">Interest Type</label>
                  <select class="form-control" id="rd_interest_type" name="rd_interest_type" >
                                 <option value="">Choose</option>
                                 <option value="Simple">Simple</option>
                               <option value="Compound">Compound</option>
                               
                  </select>
           </div>  
          
          
        </div>

        <div class="col-md-6" style="background-color: rgb(238,238,238);">			   

		               <div class="form-group">
                 <label >Start Date</label>
                <span id="rd_start_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="rd_start_date"name="rd_start_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>
                   
              <div class="form-group">
                  <label  class="col-form-label">Amt. Invested:</label>
                  <span id="rd_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="rd_amt_invested" name="rd_amt_invested" placeholder="">
              </div>

                <div class="form-group">
                 <label >Maturity Amount</label>
                         <input type="text" class="form-control" id="rd_maturity_amt" name="rd_maturity_amt" placeholder="">
            </div>


             <div class="form-group">
                 <label >Maturity date</label>
                  <span id="rd_maturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="rd_maturity_date" name="rd_maturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>

               <div class="form-group">
                    <label  class="col-form-label">Interest rate:</label>
                     <span id="rd_interest_rate_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                       <div class="input-group-prepend">
                       <input type="text" class="form-control" id="rd_interest_rate" name="rd_interest_rate" placeholder="">
                          <div class="input-group-text">%</div>
                    </div>
             </div>

  
           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="RDaddddata" >Save</button>
         <button type="button" class="btn btn-secondary" id="can_rd" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>


<!-- add  SCSS body -->
<div class="modal fade bd-example-modal-lg" id="addSCSS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Senior Citizen Saving Scheme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form_validation_class" id="scss_form">

        <div class="row">
                   <div class="col-md-12">
                   
                    <span id="SCSS_alert-msg"></span>
                    
                    </div>
           <div class="col-md-6">


             <div class="form-group">
              <label  class="col-form-label">Transaction Type</label>
            <span id="scss_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <select class="form-control" id="scss_transaction_type" name="scss_transaction_type" >
                                 <option value="">Choose</option>
                                 <option value="Buy">Buy</option>
                               <option value="Sell">Sell</option>
                           
                  </select>
           </div>
 
             <div class="form-group">
                  <label  class="col-form-label">A/c No.</label>
              <span id="scss_account_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="scss_account_no" name="scss_account_no" placeholder="">
              </div>

             <div class="form-group">
                 <label >Maturity Date</label>
                <span id="scss_muturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="scss_muturity_date" name="scss_muturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>
                  
           <div class="form-group">
                 <label >Lock in period</label>
                 <span id="scss_lockin_period_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="scss_lockin_period" name="scss_lockin_period" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>

               <div class="form-group">
                 <label >Date</label>
                <span id="scss_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="scss_date" name="scss_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>

             <div class="form-group">
                  <label  class="col-form-label">Amt. Invested:</label>
                <span id="scss_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="scss_amt_invested" name="scss_amt_invested" placeholder="">
              </div>

        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">        

             <div class="form-group">
                    <label  class="col-form-label">Interest rate:</label>
                       <div class="input-group-prepend">
                       <input type="text" class="form-control" id="scss_interest_rate" name="scss_interest_rate" placeholder="">
                          <div class="input-group-text">%</div>
                    </div>
             </div>  

            <div class="form-group">
              <label  class="col-form-label">Interest Type</label>
                  <select class="form-control" id="scss_interest_type" name="scss_interest_type" >
                                 <option value="">Choose</option>
                                 <option value="Simple">Simple</option>
                               <option value="Compound">Compound</option>
                               
                  </select>
           </div>
           
                       <div class="form-group">
              <label  class="col-form-label">Interest Payment</label>
                  <select class="form-control" id="scss_interest_payment" name="scss_interest_payment" >
                                 <option value="">Choose</option>
                               <option value="Quarterly">Quarterly</option>
                               <option value="Monthly">Monthly</option>
                               <option value="Half Yearly">Half Yearly</option>
                               <option value="Yearly">Yearly</option>
                  </select>
             </div>

          <div class="form-group">
              <label  class="col-form-label">Interest Payout</label>
                  <select class="form-control" id="scss_interest_payout" name="scss_interest_payout" >
                                 <option value="">Choose</option>
                               <option value="Cumulative">Cumulative</option>
                               <option value="Payout">Payout</option>
                  </select>
           </div>

             <div class="form-group">
                  <label  class="col-form-label">Maturity Amt.</label>
                  <input type="text" class="form-control" id="scss_maturity_amt" name="scss_maturity_amt" placeholder="">
              </div>
  
           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addscssdata">Save</button>
         <button type="button" class="btn btn-secondary" id="can_scss" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>




<!-- add  Private Equity / startup body -->
<div class="modal fade bd-example-modal-lg" id="addPrivateEquity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Private Equity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body" >
        <form  class="form_validation_class" id="private_form">

        <div class="row">
                     
                   <div class="col-md-12">
                   
                    <span id="privateEquity_alert-msg"></span>
                    
                    </div>

           <div class="col-md-6">
                  
            <div class="form-group">
            <label  class="col-form-label">Asset Name</label>
         <span id="pe_asset_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <select class="form-control" id="pe_asset_name" name="pe_asset_name" >
                               <option value="">Choose</option>
                             <option value="Startup">Startup</option>
                             <option value="Private Equity">Private Equity</option>
                              
                </select>
            </div>

          <div class="form-group">
                  <label  class="col-form-label">Private Equity / Startup</label>
                <span id="pe_startup_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="pe_startup" name="pe_startup" placeholder="">
              </div>

           <div class="form-group">
                 <label >Startup Start Date</label>
             <span id="pe_start_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="pe_start_date" name="pe_start_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>

              
           <div class="form-group">
            <label  class="col-form-label">Transaction Type</label>
             <span id="pe_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <select class="form-control" id="pe_transaction_type" name="pe_transaction_type" >
                               <option value="">Choose</option>
                             <option value="Buy">Buy</option>
                             <option value="Sell">Sell</option>
                </select>
            </div>
          
        </div>

        <div class="col-md-6" style="background-color: rgb(238,238,238);">           
         
            <div class="form-group">
                 <label >Date</label>
                 <span id="pe_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="pe_date" name="pe_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>  

              <div class="form-group" >
                  <label  class="col-form-label">Qty Purchase</label>
               <span id="pe_qty_purchase_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="pe_qty_purchase" name="pe_qty_purchase" placeholder="">
              </div>         

                   <div class="form-group">
                  <label  class="col-form-label">Purchase Rate</label>
               <span id="pe_purchase_rate_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="pe_purchase_rate" name="pe_purchase_rate" placeholder="">
              </div>

                <div class="form-group" >
                  <label  class="col-form-label">Amt Invested</label>
               <span id="pe_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="pe_amt_invested" name="pe_amt_invested" placeholder="">
              </div>
        
                   <div class="form-group">
                  <label  class="col-form-label">Current Rate</label>
                  <input type="text" class="form-control" id="pe_current_rate" name="pe_current_rate" placeholder="">
              </div>

    

              <div class="form-group" id="officetxtbox">
                  <label  class="col-form-label">Present Value</label>
                  <input type="text" class="form-control" id="pe_present_value" name="pe_present_value" placeholder="">
              </div>

            
  
           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addprivateequitydata" >Save</button>
         <button type="button" class="btn btn-secondary" id="can_private" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>


<!-- add  NPS body -->
<div class="modal fade bd-example-modal-lg" id="addNPS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add NPS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form  class="form_validation_class" id="nps_form">

        <div class="row">

                   <div class="col-md-12">
                   
                    <span id="nps_alert-msg"></span>
                    
                    </div>

        	 <div class="col-md-6">
        	       	
			    
              <div class="form-group">
                 <label >PRAN No.</label>
                <span id="nps_pran_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                     <input type="text" class="form-control" id="nps_pran_no" name="nps_pran_no" placeholder=""> 
            </div>

				   <div class="form-group">
								 <label >A/c Opening Date</label>
              <span id="nps_opening_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="nps_opening_date"name="nps_opening_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>
			            

					  <div class="form-group">
									<label  class="col-form-label">NPS type:</label>
                <span id="nps_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
									    <select class="form-control" id="nps_type"name="nps_type" >
									                   <option value="">Choose</option>
										               <option value="Tier I">Tier I</option>
										               <option value="Tier II">Tier II</option>
									    </select>
					  </div>


					   <div class="form-group">
							<label  class="col-form-label">Scheme</label>
            <span id="nps_scheme_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="nps_scheme" name="nps_scheme" >
							                   <option value="">Choose</option>
								      <?php
                             foreach($nps_scheme_name as $row)
                          {
                           echo '<option value="'.$row->scheme_name.'">'.$row->scheme_name.'</option>';
                          }
                      ?>
							    </select>
				     </div>

				     <div class="form-group">
							<label  class="col-form-label">Transaction Type</label>
          <span id="nps_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="nps_transaction_type" name="nps_transaction_type" >
							                   <option value="">Choose</option>
							                   <option value="Buy / Contribution">Buy / Contribution</option>
								               <option value="Sell / withdrawel">Sell / withdrawel</option>
								             <option value="Scheme Change">Scheme Change</option>  
							    </select>
				   </div>

				 
			            
          
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">			   

		        
                     <div class="form-group">
								 <label >Date</label>
            <span id="nps_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="nps_date" name="nps_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>
				  

				    <div class="form-group">
				            <label  class="col-form-label">Qty</label>
            <span id="nps_qty_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
				               <div class="input-group-prepend">
						           <input type="text" class="form-control" id="nps_qty" name="nps_qty" placeholder="">
						              <div class="input-group-text">Unit</div>
						        </div>
		            </div>

                   <div class="form-group">
								 <label >Purchase Price / NAV</label>
          <span id="nps_purchase_price_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							       <input type="text" class="form-control" id="nps_purchase_price" name="nps_purchase_price" placeholder="">	
				    </div>

				     <div class="form-group">
			            <label  class="col-form-label">Amt. Invested:</label>
          <span id="nps_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="nps_amt_invested" name="nps_amt_invested" placeholder="">
			        </div>

	
           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addnpsdata">Add</button>
         <button type="button" class="btn btn-secondary" id="can_nps" data-dismiss="modal">Cancle</button>
      </div>


 <div class="container-fluid">
            <table class="" id="nps_table_data" style="width:100% !important;" >
               <thead>
                  <tr class="">
                      <th>Nps Type</th>
                      <th class="">Scheme</th>
                    <th class="">Tran. Type</th>
                  <th class="">Qty</th>
                    <th class="">Date</th> 
                   <th>Click</th>
                  </tr>
                </thead>

                 <tbody>

              
                </tbody>
          </table>
      </div>
    </div>
  </div>
</div>



<!-- add  Kisan Vikas Patra body -->
<div class="modal fade bd-example-modal-lg" id="addKisanVikasPatra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Kisan Vikas Patra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form  class="form_validation_class" id="kisan_form">

        <div class="row">
                   <div class="col-md-12">
                   
                    <span id="kisanvikas_alert-msg"></span>
                    
                    </div>
        	 <div class="col-md-6">


				     <div class="form-group">
							<label  class="col-form-label">Transaction Type</label>
            <span id="kisan_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="kisan_transaction_type" name="kisan_transaction_type" >
							                   <option value="">Choose</option>
							                   <option value="Buy">Buy</option>
								               <option value="Sell">Sell</option>
								           
							    </select>
				   </div>
 
             <div class="form-group">
                  <label  class="col-form-label">A/c No.</label>
              <span id="kisan_account_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="kisan_account_no" name="kisan_account_no" placeholder="">
              </div>


				   <div class="form-group">
								 <label >Start Date</label>
                <span id="kisan_start_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="kisan_start_date" name="kisan_start_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>

				     <div class="form-group">
								 <label >Maturity Date</label>
                <span id="kisan_muturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="kisan_muturity_date" name="kisan_muturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>
			            
          
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">			   

             <div class="form-group">
                 <label >Lock in period</label>
                 <input type="date" id="kisan_lockin_period" name="kisan_lockin_period" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>

		         <div class="form-group">
			            <label  class="col-form-label">Amt. Invested:</label>
                <span id="kisan_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="kisan_amt_invested" name="kisan_amt_invested" placeholder="">
			        </div>


             <div class="form-group">
                  <label  class="col-form-label">Maturity Amt.</label>
                <span id="kisan_maturity_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="kisan_maturity_amt" name="kisan_maturity_amt" placeholder="">
              </div>

			        <div class="form-group">
				            <label  class="col-form-label">Interest rate:</label>
                  <span id="kisan_interest_rate_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
				               <div class="input-group-prepend">
						           <input type="text" class="form-control" id="kisan_interest_rate" name="kisan_interest_rate" placeholder="">
						              <div class="input-group-text">%</div>
						        </div>
				     </div>  				

	
           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addkisanvikasdata">Save</button>
         <button type="button" class="btn btn-secondary" id="can_kisan" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>



<!-- add  NSC body -->
<div class="modal fade bd-example-modal-lg" id="addNSC" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add NSC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form  class="form_validation_class" id="nsc_form">

        <div class="row">
              <div class="col-md-12">
                   
                    <span id="nsc_alert-msg"></span>
                    
                    </div>

        	 <div class="col-md-6">


				     <div class="form-group">
							<label  class="col-form-label">Transaction Type</label>
          <span id="nsc_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="nsc_transaction_type" name="nsc_transaction_type" >
							                   <option value="">Choose</option>
							                   <option value="Buy">Buy</option>
								               <option value="Sell">Sell</option>
								           
							    </select>
				   </div>

         <div class="form-group">
                  <label  class="col-form-label">A/c No.</label>
            <span id="nsc_account_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="nsc_account_no" name="nsc_account_no" placeholder="">
              </div>

				    <div class="form-group">
							<label  class="col-form-label">NSC Type</label>
        <span id="nsc_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="nsc_type" name="nsc_type" >
							                   <option value="">Choose</option>
							                   <option value="NSC 7">NSC 7</option>
								               <option value="NSC 8">NSC 8</option>
								               <option value="NSC 9">NSC 9</option>
							    </select>
				   </div>

				   <div class="form-group">
								 <label >A/c Opening Date</label>
                 <span id="nsc_opening_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="nsc_opening_date" name="nsc_opening_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>
        

            <div class="form-group">
                 <label >Lock in period</label>
                 <input type="date" id="nsc_lockin_period"name="nsc_lockin_period" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">			   


		         <div class="form-group">
			            <label  class="col-form-label">Amt. Invested:</label>
            <span id="nsc_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="nsc_amt_invested" name="nsc_amt_invested" placeholder="">
			        </div>

			        <div class="form-group">
				            <label  class="col-form-label">Interest rate:</label>
                <span id="nsc_interest_rate_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
				               <div class="input-group-prepend">
						           <input type="text" class="form-control" id="nsc_interest_rate" name="nsc_interest_rate" placeholder="">
						              <div class="input-group-text">%</div>
						        </div>
				     </div>   

             <div class="form-group">
                 <label >Maturity Date</label>
                 <span id="nsc_maturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="nsc_maturity_date" name="nsc_maturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>
				
					   <div class="form-group">
                  <label  class="col-form-label">Maturity Amt.</label>
            <span id="nsc_maturity_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="nsc_maturity_amt" name="nsc_maturity_amt" placeholder="">
              </div>

	
           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addnscdata" >Save</button>
         <button type="button" class="btn btn-secondary" id="can_nsc" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>


<!-- add  PPF body -->
<div class="modal fade bd-example-modal-lg" id="addPPF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add PPF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form  class="form_validation_class" id="ppf_form">

        <div class="row">
             <div class="col-md-12">
                   
                    <span id="ppf_alert-msg"></span>
                    
                    </div>

        	 <div class="col-md-6">


				     <div class="form-group">
							<label  class="col-form-label">Transaction Type</label>
              <span id="ppf_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="ppf_transaction_type" name="ppf_transaction_type" >
							                   <option value="">Choose</option>
							                   <option value="Buy / Invest">Buy / Invest</option>
								               <option value="Sell / Withdraw">Sell / Withdraw</option>
								           
							    </select>
				   </div>

            <div class="form-group">
                  <label  class="col-form-label">A/c No.</label>
              <span id="ppf_account_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="ppf_account_no" name="ppf_account_no" placeholder="">
              </div>


				   <div class="form-group">
								 <label >A/c Opening Date</label>
              <span id="ppf_opening_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="ppf_opening_date" name="ppf_opening_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>

				     <div class="form-group">
								 <label >Maturity Date</label>
                 <span id="ppf_maturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="ppf_maturity_date" name="ppf_maturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>            
          
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">			   

	
            <div class="form-group">
                 <label >Lock in period</label>
                 <input type="date" id="ppf_lockin_period" name="ppf_lockin_period" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>

				       <div class="form-group">
								 <label >Date</label>
                 <span id="ppf_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="ppf_date"name="ppf_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>


		         <div class="form-group">
			            <label  class="col-form-label">Amt. Invested:</label>
                  <span id="ppf_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="ppf_amt_invested" name="ppf_amt_invested" placeholder="">
			        </div>

			          <div class="form-group">
				            <label  class="col-form-label">Interest rate:</label>
                    <span id="ppf_interest_rate_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
				               <div class="input-group-prepend">
						           <input type="text" class="form-control" id="ppf_interest_rate" name="ppf_interest_rate" placeholder="">
						              <div class="input-group-text">%</div>
						        </div>
				     </div> 

	
           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addppfdata" >Save</button>
         <button type="button" class="btn btn-secondary" id="can_ppf" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>


<!-- add  EPF body -->
<div class="modal fade bd-example-modal-lg" id="addEPF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add EPF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form  class="form_validation_class" id="epf_form">

        <div class="row">
                  <div class="col-md-12">
                   
                    <span id="epf_alert-msg"></span>
                    
                    </div>

        	 <div class="col-md-6">

				     <div class="form-group">
							<label  class="col-form-label">Transaction Type</label>
       <span id="epf_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="epf_transaction_type" name="epf_transaction_type" >
							                   <option value="">Choose</option>
							                   <option value="Buy / Invest">Buy / Invest</option>
								               <option value="Sell / Withdraw">Sell / Withdraw</option>
								           
							    </select>
				     </div>


             <div class="form-group">
                  <label  class="col-form-label">A/c No.</label>
          <span id="epf_account_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="epf_account_no" name="epf_account_no" placeholder="">
              </div>


				   <div class="form-group">
								 <label >Start Date</label>
              <span id="epf_start_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" name="epf_start_date" max="3000-12-31" min="1000-01-01" id="epf_start_date"  class="form-control">
				    </div>

				     <div class="form-group">
								 <label >Maturity Date</label>
               <span id="epf_maturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" name="" max="3000-12-31" id="epf_maturity_date" name="epf_maturity_date" min="1000-01-01" class="form-control">
				    </div>

                     <div class="form-group">
								 <label >Lock in period</label>
								 <input type="date" name="" max="3000-12-31" id="epf_lockin_date"   name="epf_lockin_date" min="1000-01-01" class="form-control">
				    </div>
                 
			            
          
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">			   

           <div class="form-group">
                 <label>Contribution Date</label>
                 <input type="date" name="" max="3000-12-31" id="epf_contribution_date" name="epf_contribution_date" min="1000-01-01" class="form-control">
            </div>

					     <div class="form-group">
				            <label  class="col-form-label">Interest rate:</label>
				               <div class="input-group-prepend">
						           <input type="text" class="form-control" id="epf_interest_rate" name="epf_interest_rate"  placeholder="">
						              <div class="input-group-text">%</div>
						        </div>
				        </div> 

		         <div class="form-group">
			            <label  class="col-form-label">Employee Contribution:</label>
			            <input type="text" class="form-control" id="epf_employee_contribution" name="epf_employee_contribution"  placeholder="">
			        </div>

               <div class="form-group">
			            <label  class="col-form-label">Employer Contribution:</label>
			            <input type="text" class="form-control" id="epf_employer_contribution"name="epf_employer_contribution" placeholder="">
			        </div>

                <div class="form-group">
                  <label  class="col-form-label">Total Contribution:</label>
                  <input type="text" class="form-control" id="epf_total_contribution"name="epf_total_contribution" placeholder="">
              </div>

	
           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addepfdata">Save</button>
         <button type="button" class="btn btn-secondary" id="can_epf" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>



<!-- add Sukanya body -->
<div class="modal fade bd-example-modal-lg" id="addSukanya" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Sukanya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form_validation_class"id="sukanya_form">

        <div class="row">
                 <div class="col-md-12">
                   
                    <span id="sukanya_alert-msg"></span>
                    
                    </div>

        	 <div class="col-md-6">


				     <div class="form-group">
							<label  class="col-form-label">Transaction Type</label>
          <span id="sukanya_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="sukanya_transaction_type" name="sukanya_transaction_type" >
							                   <option value="">Choose</option>
							                   <option value="Buy">Buy</option>
								               <option value="Sell">Sell</option>
								           
							    </select>
				   </div>

               <div class="form-group">
                  <label  class="col-form-label">A/c No.</label>
                <span id="sukanya_account_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="sukanya_account_no"name="sukanya_account_no" placeholder="">
              </div>

				   <div class="form-group">
								 <label >A/c Opening Date</label>
                <span id="sukanya_opening_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="sukanya_opening_date" name="sukanya_opening_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>

				     <div class="form-group">
								 <label >Maturity Date</label>
                <span id="sukanya_maturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="sukanya_maturity_date" name="sukanya_maturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>

			            
          
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">			


             <div class="form-group">
                 <label >Lock in period</label>
                 <input type="date" id="sukanya_lockin_period" name="sukanya_lockin_period" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>
                    

				       <div class="form-group">
								 <label >Date</label>
                <span id="sukanya_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="sukanya_date" name="sukanya_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>


		         <div class="form-group">
			            <label  class="col-form-label">Amt. Invested / Withdrawl</label>
                <span id="sukanya_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="sukanya_amt_invested" name="sukanya_amt_invested" placeholder="">
			        </div>

			          <div class="form-group">
				            <label  class="col-form-label">Interest rate:</label>
                <span id="sukanya_interest_rate_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
				               <div class="input-group-prepend">
						           <input type="text" class="form-control" id="sukanya_interest_rate" name="sukanya_interest_rate" placeholder="">
						              <div class="input-group-text">%</div>
						        </div>
				     </div> 

	
           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="sukanyaadddata" >Save</button>
         <button type="button" class="btn btn-secondary" id="can_sukanya" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>





<!-- add  Loan body -->
<div class="modal fade bd-example-modal-lg" id="addLoan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loanheading" ></h5>
        <button type="button" class="close" data-dismiss="modal" id="loanclose" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form_validation_class"id="loan_form">
                   <div class="col-md-12">
                   
                    <span id="loan_alert-msg"></span>
                    
                    </div>
        <div class="row">

        	 <div class="col-md-5">
             
              <div class="form-group">
                  <label  class="col-form-label">Bank / Company Name</label>
               <span id="loan_bank_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="loan_bank_name" name="loan_bank_name" placeholder="">
              </div>
               <div class="form-group">
                  <label  class="col-form-label">Loan A/c No.</label>
              <span id="loan_account_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="loan_account_no" name="loan_account_no"  placeholder="">
              </div>
				   <div class="form-group">
								 <label >Loan Start Date</label>
              <span id="loan_start_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="loan_start_date" name="loan_start_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>
 
		            <div class="form-group">        
			            <label  class="col-form-label">Loan Amount</label>
                 <span id="loan_amount_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="loan_amount" name="loan_amount"  placeholder="">
			        </div>

			        <div class="form-group">         
			            <label  class="col-form-label">Loan Period</label>
                    <span id="loan_period_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="loan_period" name="loan_period" placeholder="">
			        </div>
                 
			          <div class="form-group">
                 <label >Loan End Date</label>
                 <input type="date" id="loan_end_date" name="loan_end_date" max="3000-12-31" min="1000-01-01" class="form-control">
              </div>     
              
               <div class="form-group">
                  <label  class="col-form-label">EMI Amt</label>
          <span id="loan_emi_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="loan_emi_amt" name="loan_emi_amt" placeholder="">
              </div>

               <div class="form-group">
                 <label >EMI Date</label>
          <span id="loan_emi_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="loan_emi_date" name="loan_emi_date" max="3000-12-31" min="1000-01-01" class="form-control">
              </div>  

                <div class="form-group">
                  <label  class="col-form-label">Total EMI Paid</label>
                  <input type="text" class="form-control" id="loan_total_emipaid" name="loan_total_emipaid" placeholder="">
              </div> 

                <div class="form-group">
                  <label  class="col-form-label">Loan Processing Fees</label>
                  <input type="text" class="form-control" id="loan_processing_fees" name="loan_processing_fees" placeholder="">
              </div> 

        </div>

        <div class="col-md-7"  style="background-color: rgb(238,238,238);">

        
                <div class="form-group">
                  <label  class="col-form-label">Loan Down Payment Amt</label>
            <span id="loan_downpayment_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="loan_downpayment_amt" name="loan_downpayment_amt" placeholder="">
              </div> 	

                <div class="form-group">
                  <label  class="col-form-label">Loan Balance Amt</label>
                  <input type="text" class="form-control" id="loan_balance_amt" name="loan_balance_amt" placeholder="">
              </div> 

                <div class="form-group">
                  <label  class="col-form-label">Pre EMI Amt</label>
                  <input type="text" class="form-control" id="loan_pre_emi_amt" name="loan_pre_emi_amt" placeholder="">
              </div> 

                <div class="form-group">
                  <label  class="col-form-label">Loan Topup Amt</label>
                  <input type="text" class="form-control" id="loan_topup_amt" name="loan_topup_amt" placeholder="">
              </div> 		   

					   <div class="form-group">
							<label  class="col-form-label">Interest Rate Type:</label>
          <span id="loan_Interest_rate_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="loan_Interest_rate_type" name="loan_Interest_rate_type" >
							                   <option value="">Choose</option>
								               <option value="Fixed">Fixed</option>
								               <option value="Floating">Floating</option>
							    </select>
				     </div>
				

			        <div class="form-group" id="fixedtxtbox">
			            <label  class="col-form-label">Rate For Fixed</label>
            <span id="loan_fixed_rate_value_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="loan_fixed_rate_value" name="loan_fixed_rate_value" placeholder="">
			        </div>


			      
                    <div style="overflow-y:scroll !important; height:400px; ">

	             

			         <table class="table table-hover" id="floattxtbox"  >
			         	  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">From</th>
								      <th scope="col">To</th>
								      <th scope="col">Interest Rate</th>
                      <th scope="col">Click</th>
								    </tr>
						 </thead>
						  <tbody>

								    <tr>
								      <td>*</td>
								      <td> <input type="date"  id="floating_date_from" name="floating_date_from" max="3000-12-31" min="1000-01-01" class="form-control"></td>
								      <td> <input type="date" id="floating_date_to" name="floating_date_to" max="3000-12-31" min="1000-01-01" class="form-control"></td>
								      <td> 
  								        <div class="input-group-prepend">
  						           <input type="text" class="form-control" id="loan_floating_value" name="loan_floating_value" placeholder="">
  						            <div class="input-group-text">%</div>
  						           </div>
                        
						          </td>
						           <td> <button type="button" class="btn btn-primary" id="addfloatdata">Add</button></td>
								    </tr>
                             
						 </tbody>
						    <br>

			         </table>

              <div class="container-fluid">
                 <h6 class="text-center" id="floattableheading">Data Added Below</h6>
                   <table class="table table-hover" id="addedfloatrate" style="width:100% !important;" >
                  <thead>
                    <tr>
                  
                      <th scope="col">From</th>
                      <th scope="col">To</th>
                      <th scope="col">Interest Rate</th>
                    </tr>
             </thead>
              <tbody>
                </tbody>
                 
               </table>
          </div>

			     </div>
    
           </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary addAllLoans" id="addAllLoans">Save</button>
         <button type="button" class="btn btn-secondary" data-dismiss="modal" id="loancancle">Cancle</button>
      </div>
    </div>
  </div>
</div>






<!-- add  Assets fund body -->
<div class="modal fade bd-example-modal-lg" id="addAsset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add <span id="assetheading"></span> </h5>
        <button type="button" id="asstesClose" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
           <!--<div class="row">-->
           <!--         <div class="col-md-12">-->
                   
           <!--         <span id="assets_alert-msg"></span>-->
                    
           <!--         </div>-->
           <!--</div>-->
        <form id="asset_cancel_form" class="form_validation_class">

        <div class="row">

        	 <div class="col-md-6">
          
				       <div class="form-group">
							<label  class="col-form-label">Transaction Type</label>
              <span id="assets_transaction_type_astrik" class="text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="assets_transaction_type"  name="select_valid" >
							                   <option value="">Choose</option>
							                   <option value="Buy">Buy</option>
								               <option value="Sell">Sell</option>
								           
							    </select>
				      </div>

				   <div class="form-group">
								 <label >Date</label>
               <span id="assets_date_astrik" class="text-danger" style="font-size:20px;">*</span>
								 <input type="date" name="" max="3000-12-31" min="1000-01-01" id="assets_date" name="assets_date" class="form-control">
				    </div>

                 <div class="form-group">
                  <label  class="col-form-label">Avg. Price</label>
               <span id="assets_avg_price_astrik" class="text-danger" style="font-size:20px;">*</span> 
                  <input type="text" class="form-control" maxlength="9" name="assets_avg_price" id="assets_avg_price"  placeholder="">
              </div>
       
          
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">			   
               	      <div class="form-group">
			            <label  class="col-form-label">Quantity</label>
               <span id="assets_quantity_astrik" class="text-danger" style="font-size:20px;">*</span> 
			            <input type="text" class="form-control" id="assets_quantity" maxlength="6" name="assets_quantity"  placeholder="">
			        </div>
 
		          <div class="form-group">
			            <label  class="col-form-label">Amt. Invested:</label>
              <span id="assets_amt_invested_astrik" class="text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="assets_amt_invested" maxlength="9" name="assets_amt_invested"  placeholder="">
			        </div>

			        <div class="form-group">
			            <label  class="col-form-label">Present Value</label>
              <span id="assets_present_value_astrik" class="text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="assets_present_value" maxlength="6" name="assets_present_value" placeholder="">
			        </div>
	

	
        </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="Asstes_submit">Save</button>
         <button type="button" class="btn btn-secondary" id="assetsCancle" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>






<!-- add  Emergency fund body -->
<div class="modal fade bd-example-modal-lg" id="addEmergencyfund" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EmergencyFundheading"></h5>
        <button type="button" id="emergencyclose" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form_validation_class" id="emerge_cancel_form">

        <div class="row">
                   <!--<div class="col-md-12">-->
                   
                   <!-- <span id="emergency_alert-msg"></span>-->
                    
                   <!-- </div>-->
                 
        	 <div class="col-md-6">


				     <div class="form-group" id="hidebankname">
							<label  class="col-form-label" id="changeheading"></label>
           <span id="cash_bank_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="cash_bank_name"name="select_valid" >
							                   <option value="">Choose</option>
							                  <option value="SBI">SBI</option>
							    </select>
				   </div>


				   <div class="form-group">
								 <label >Date</label>
                   <span id="cashinhand_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="cashinhand_date" name="cashinhand_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>
 
		          <div class="form-group">
			            <label  class="col-form-label">Amt. Invested:</label>
                    <span id="cash_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" maxlength="8" name="amt_invested" id="amt_invested" placeholder="">
			        </div>
    
             <div class="form-group">
            <span id="cash_current_value_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <label  class="col-form-label">Current Value:</label>
                  <input type="text" class="form-control" maxlength="9" name="current_value" id="current_value" placeholder="">
              </div>
			            
          
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">			   
            
                   <div class="form-group">
				            <label  class="col-form-label">Interest rate:</label>
				               <div class="input-group-prepend">
						           <input type="text" class="form-control" id="cash_interest_rate" name="cash_interest_rate" placeholder="">
						              <div class="input-group-text">%</div>
						        </div>
				     </div>
		          
                    <div class="form-group">
							<label  class="col-form-label">Interest Type</label>
							    <select class="form-control" id="cash_interest_type" name="select_valid" >
							                   <option value="">Choose</option>
							                   <option value="Simple">Simple</option>
								               <option value="Compound">Compound</option>
								               
							    </select>
				   </div>
			     
                       <div class="form-group">
							<label  class="col-form-label">Interest Payment</label>
							    <select class="form-control" id="cash_interest_payment" name="select_valid" >
							                   <option value="">Choose</option>
								               <option value="Quarterly">Quarterly</option>
								               <option value="Monthly">Monthly</option>
								               <option value="Half Yearly">Half Yearly</option>
								               <option value="Yearly">Yearly</option>
							    </select>
				     </div>

	

	
        </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="add_emergency">Save</button>
         <button type="button" class="btn btn-secondary" id="emergencycancle" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>





<!-- add  SGB fund body -->
<div class="modal fade bd-example-modal-lg" id="addSGB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add SGB<span id="sgbheading"></span></h5>
        <button type="button" class="close" id="closesgb" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
          <form  class="form_validation_class" id="sgb_form">
        <div class="row">
                     <div class="col-md-12">
                   
                    <span id="sgb_alert-msg"></span>
                    
                    </div>
          
  <div class="col-md-3">
              <input type="hidden" class="form-control"  id="sgb_user_id" value="<?php echo $this->session->userdata('id');?>">
              <div class="form-group">
            <label  class="col-form-label">Scheme Name</label>
               <span id="sgb_stock_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
             <select class="form-control" id="sgb_stock_name" name="sgb_stock_name" >
                   <option value="">Choose Scheme</option>
                  <?php
                             foreach($scheme_name_sgb as $row)
                          {
                           echo '<option value="'.$row->scheme_name.'">'.$row->scheme_name.'</option>';
                          }
                      ?>
               </select>

          </div>

         <div class="form-group">
            <label  class="col-form-label">Trans. Type </label>
               <span id="sgb_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
               <select class="form-control" id="sgb_transaction_type" name="sgb_transaction_type" >
                   <option value="">Choose</option>
                 <option value="Buy">Buy</option>
                 <option value="Sell">Sell</option>
               </select>
          </div>

       
           <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Broker:</label>
                     <span id="sgb_broker_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                   <select class="form-control" id="sgb_broker" name="sgb_broker" >
                   <option value="">Select Broker</option>
                    <?php
                             foreach($broker_name as $row)
                          {
                           echo '<option value="'.$row->broker_name.'">'.$row->broker_name.'</option>';
                          }
                      ?>
                  </select>
            </div>
 
          <div class="form-group">
       <label >Date</label>
          <span id="sgb_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
       <input type="date" id="sgb_date" name="sgb_date" max="31-12-3000" min="01-01-1000" class="form-control">
     </div>

         <div class="form-group">
            <label  class="col-form-label">Contract Note no.</label>
          
            <input type="text" class="form-control" id="sgb_contract_no" name="sgb_contract_no" placeholder="">
          </div>

            <div class="form-group">
            <label  class="col-form-label">Settlement no.</label>
            
            <input type="text" class="form-control" id="sgb_settlement_no" name="sgb_settlement_no"  placeholder="">
          </div>


     </div>

         <div class="col-md-3">
              
          
                  <div class="form-group">
                <label  class="col-form-label">Quantity</label>
                   <span id="sgb_qty_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <input type="text"  id="sgb_qty" name="sgb_qty" class="form-control prc"  placeholder="">
              </div>

               <div class="form-group">
                <label  class="col-form-label">Purchase Price</label>
                   <span id="sgb_purchase_price_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <input type="text" class="form-control prc" id="sgb_purchase_price" name="sgb_purchase_price" placeholder="">
              </div>

                <div class="form-group">
                <label  class="col-form-label">Amt. Invested</label>
                   <span id="sgb_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <input type="text" class="form-control prc" id="sgb_amt_invested" name="sgb_amt_invested" placeholder="">
              </div>

               <div class="form-group">
                <label  class="col-form-label">Brokerage</label>            
                <input type="text" class="form-control prc" id="sgb_brokerage" name="sgb_brokerage" placeholder="">
              </div>

                <div class="form-group">
                <label  class="col-form-label">Net Rate</label>
                   <span id="sgb_net_rate_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <input type="text" class="form-control prc" value="0" id="sgb_net_rate" name="sgb_net_rate" placeholder="">
              </div>

         </div>

        <div class="col-md-3" style="background-color: rgb(238,238,238);">

                  <div class="form-group">
                <label  class="col-form-label">Taxable Value of Supply</label>             
                <input type="text" class="form-control prc" id="sgb_tax_value" name="sgb_tax_value" placeholder="">
              </div>

             
               <div class="form-group">
                <label  class="col-form-label">CGST</label>
              
                   <div class="input-group-prepend">
                   <input type="text" class="form-control" id="sgb_cgst" name="sgb_cgst" placeholder="">
                      <div class="input-group-text">%</div>
                </div>
              </div>

                  <div class="form-group">
                <label  class="col-form-label">SGST</label>
              
                   <div class="input-group-prepend">
                   <input type="text" class="form-control" id="sgb_sgst" name="sgb_sgst" placeholder="">
                      <div class="input-group-text">%</div>
                </div>
              </div>

               <div class="form-group">
                   <label  class="col-form-label">IGST</label>
                    
                   <div class="input-group-prepend">
                   <input type="text" class="form-control prc" id="sgb_igst" name="sgb_igst" placeholder="">
                      <div class="input-group-text">%</div>
                </div>
              </div>

                  <div class="form-group">
                <label  class="col-form-label">Exchange Trans. Charge</label>
           
                <input type="text" class="form-control prc" id="sgb_exchange_transaction" name="sgb_exchange_transaction" placeholder="">
              </div>
                
             
        </div>

        <div class="col-md-3" style="background-color: rgb(238,238,238);">

              <div class="form-group">
                <label  class="col-form-label">STT</label>              
                <input type="text" class="form-control prc" id="sgb_stt" name="sgb_stt" placeholder="">
              </div>

               <div class="form-group">
                <label  class="col-form-label">SEBI Turnover Fees</label>             
                <input type="text" class="form-control prc" id="sgb_sebi_fee"name="sgb_sebi_fee" placeholder="">
              </div>

                  <div class="form-group">
                <label  class="col-form-label">Stamp Duty</label>            
                <input type="text" class="form-control prc" id="sgb_stamp_duty" name="sgb_stamp_duty" placeholder="">
              </div>

              <div class="form-group">
                <label  class="col-form-label">Net Amount Payable</label>
                   <span id="sgb_net_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <input type="text" class="form-control prc"value="0" id="sgb_net_amt" name="sgb_net_amt" placeholder="">
              </div>            

        </div>
        </div>
        <form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addSGBdata">Add</button>
         <button type="button" class="btn btn-secondary" id="sgbcancle" data-dismiss="modal">Cancle</button>
      </div>

      <div class="container-fluid">
            <table class="" id="sgb_table_data" style="width:100% !important;" >
               <thead>
                  <tr class="">
                      <th class=""  >Stock name</th>
                
                    <th class="">Trans.</th>
                  <th class="">Broker</th>
                    <th class="">Date</th> 

                   <th class="">Qty</th>
                   <th class="">Purchase price</th>
              
                  </tr>
                </thead>

                 <tbody>

              
                </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

<!-- add  BOND modal starts from here -->
<div class="modal fade bd-example-modal-lg" id="addBond" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Bond<span id="bondheading"></span></h5>
        <button type="button" class="close" id="closebond" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
          <form  class="form_validation_class" id="bond_form">
        <div class="row">
                     <!-- <div class="col-md-12">
                   
                    <span id="bond_alert-msg"></span>
                    
                    </div> -->
           
  <div class="col-md-3">
              <input type="hidden" class="form-control"  id="bond_user_id" value="<?php echo $this->session->userdata('id');?>">
              <div class="form-group">
            <label  class="col-form-label">Bond Name</label>
               <span id="bond_stock_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
             <select class="form-control" id="bond_stock_name" name="bond_stock_name" >
                   <option value="">Choose Scheme</option>
                    <?php
                             foreach($scheme_name_bond as $row)
                          {
                           echo '<option value="'.$row->scheme_name_bond.'">'.$row->scheme_name_bond.'</option>';
                          }
                      ?>
               </select>

          </div>

         <div class="form-group">
            <label  class="col-form-label">Trans. Type </label>
               <span id="bond_transaction_type_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
               <select class="form-control" id="bond_transaction_type" name="bond_transaction_type" >
                   <option value="">Choose</option>
                 <option value="Buy">Buy</option>
                 <option value="Sell">Sell</option>
               </select>
          </div>

       
           <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Broker:</label>
                     <span id="bond_broker_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                   <select class="form-control" id="bond_broker" name="bond_broker" >
                   <option value="">Select Broker</option>
                    <?php
                             foreach($broker_name as $row)
                          {
                           echo '<option value="'.$row->broker_name.'">'.$row->broker_name.'</option>';
                          }
                      ?>
                  </select>
            </div>
 
          <div class="form-group">
       <label >Date</label>
          <span id="bond_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
       <input type="date" id="bond_date" name="bond_date" max="31-12-3000" min="01-01-1000" class="form-control">
     </div>

         <div class="form-group">
            <label  class="col-form-label">Contract Note no.</label>
          
            <input type="text" class="form-control" id="bond_contract_no" name="bond_contract_no" placeholder="">
          </div>

            <div class="form-group">
            <label  class="col-form-label">Settlement no.</label>
            
            <input type="text" class="form-control"  id="bond_settlement_no" name="bond_settlement_no"  placeholder="">
          </div>


     </div>

         <div class="col-md-3">
              
          
                  <div class="form-group">
                <label  class="col-form-label">Quantity</label>
                   <span id="bond_qty_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <input type="text"  id="bond_qty" name="bond_qty" class="form-control prc"  placeholder="">
              </div>

               <div class="form-group">
                <label  class="col-form-label">Purchase Price</label>
                   <span id="bond_purchase_price_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <input type="text" class="form-control  prc" id="bond_purchase_price" name="bond_purchase_price" placeholder="">
              </div>

                <div class="form-group">
                <label  class="col-form-label">Amt. Invested</label>
                   <span id="bond_amt_invested_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <input type="text" class="form-control prc" id="bond_amt_invested" name="bond_amt_invested" placeholder="">
              </div>

               <div class="form-group">
                <label  class="col-form-label">Brokerage</label>            
                <input type="text" class="form-control prc" id="bond_brokerage" value="0" name="bond_brokerage" placeholder="">
              </div>

                <div class="form-group">
                <label  class="col-form-label">Net Rate</label>
                   <span id="bond_net_rate_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <input type="text" class="form-control prc" id="bond_net_rate" value="0" name="bond_net_rate" placeholder="">
              </div>

         </div>

        <div class="col-md-3" style="background-color: rgb(238,238,238);">

                  <div class="form-group">
                <label  class="col-form-label">Taxable Value of Supply</label>             
                <input type="text" class="form-control prc" id="bond_tax_value"value="0" name="bond_tax_value" placeholder="">
              </div>

             
               <div class="form-group">
                <label  class="col-form-label">CGST</label>
              
                   <div class="input-group-prepend">
                   <input type="text" class="form-control" id="bond_cgst" name="bond_cgst" placeholder="">
                      <div class="input-group-text">%</div>
                </div>
              </div>

                  <div class="form-group">
                <label  class="col-form-label">SGST</label>
              
                   <div class="input-group-prepend">
                   <input type="text" class="form-control" id="bond_sgst" name="bond_sgst" placeholder="">
                      <div class="input-group-text">%</div>
                </div>
              </div>

               <div class="form-group">
                   <label  class="col-form-label">IGST</label>
                    
                   <div class="input-group-prepend">
                   <input type="text" class="form-control prc" id="bond_igst" name="bond_igst" placeholder="">
                      <div class="input-group-text">%</div>
                </div>
              </div>

                  <div class="form-group">
                <label  class="col-form-label">Exchange Trans. Charge</label>
           
                <input type="text" class="form-control prc" id="bond_exchange_transaction"value="0" name="bond_exchange_transaction" placeholder="">
              </div>
                
             
        </div>

        <div class="col-md-3" style="background-color: rgb(238,238,238);">

              <div class="form-group">
                <label  class="col-form-label">STT</label>              
                <input type="text" class="form-control prc" id="bond_stt"value="0" name="bond_stt" placeholder="">
              </div>

               <div class="form-group">
                <label  class="col-form-label">SEBI Turnover Fees</label>             
                <input type="text" class="form-control prc" id="bond_sebi_fee"value="0"  name="bond_sebi_fee" placeholder="">
              </div>

                  <div class="form-group">
                <label  class="col-form-label">Stamp Duty</label>            
                <input type="text" class="form-control prc" id="bond_stamp_duty"value="0" name="bond_stamp_duty" placeholder="">
              </div>

              <div class="form-group">
                <label  class="col-form-label">Net Amount Payable</label>
                   <span id="bond_net_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                <input type="text" class="form-control prc" id="bond_net_amt" value="0" name="bond_net_amt" placeholder="">
              </div>            

        </div>
        </div>
        <form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addbonddata">Add</button>
         <button type="button" class="btn btn-secondary" id="bondcancle" data-dismiss="modal">Cancle</button>
      </div>

      <div class="container-fluid">
            <table class="" id="bond_table_data" style="width:100% !important;" >
               <thead>
                  <tr class="">
                      <th class=""  >Stock name</th>
                
                    <th class="">Trans.</th>
                  <th class="">Broker</th>
                    <th class="">Date</th> 

                   <th class="">Qty</th>
                   <th class="">Purchase price</th>
              
                  </tr>
                </thead>

                 <tbody>

              
                </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

<!-- add  Bond Modal ends here-->


<!-- Insurances Forms -->



<!-- add  Car Insurance body -->
<div class="modal fade bd-example-modal-lg" id="addBikeCarHomeInsurance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  >Add <span id="bikecarhomeheading"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form_validation_class" id="insurance_form">

        <div class="row">
              <div class="col-md-12">
                   
                    <span id="insurance_alert-msg"></span>
                    
                    </div>

        	 <div class="col-md-6">

                 <div class="form-group">
							<label  class="col-form-label">Company Name</label>
           <span id="insurance_company_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control"  id="insurance_company_name" name="insurance_company_name" >
							          <option value="">Choose</option>
                         <option value="testing">testing co.</option>
							               
								           
							    </select>
				       </div>

                   <div class="form-group">
			            <label  class="col-form-label">Policy Name</label>
                   <span id="insurance_policy_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>

                    <select class="form-control"  id="insurance_policy_name"name="insurance_policy_name" >
                        <option value="">Choose</option>
                         <option value="testing Policy name">testing policy name.</option>
                             
                           
                  </select>
			        </div>

			          <div class="form-group">
			            <label  class="col-form-label">Policy Number</label>
                   <span id="insurance_policy_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="insurance_policy_no" name="insurance_policy_no" placeholder="">
			        </div>
          <div id="healthhidecolumn">
            <div class="form-group">
                  <label  class="col-form-label">Sum Assured</label>
                  <span id="insurance_sum_assured_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="insurance_sum_assured" name="insurance_sum_assured" placeholder="">
              </div>

                <div class="form-group">
                  <label  class="col-form-label">No Claim Bonus</label>
                  <span id="insurance_no_claim_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="insurance_no_claim" name="insurance_no_claim" placeholder="">
              </div>
         </div>

            <div id="travelandTermplanhidecolumn">
                  <div class="form-group">
                  <label  class="col-form-label">Sum Assured</label>
                  <span id="travel_sum_assured_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="travel_sum_assured" name="travel_sum_assured"  placeholder="">
              </div>
            </div>

				    <div class="form-group">
			            <label  class="col-form-label" id="changebikecarhomevalue"></label>
                   <span id="insurance_value_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="insurance_value" name="insurance_value" placeholder="">
			        </div>

             

				   <div class="form-group">
								 <label >Policy Starting Date</label>
                  <span id="insurance_policy_start_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="insurance_policy_start_date"name="insurance_policy_start_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>

				    <div class="form-group">
								 <label >Maturity Date</label>
                  <span id="insurance_maturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="insurance_maturity_date" name="insurance_maturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>

			        
				     
			        
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">	

           <div class="form-group">
              <label  class="col-form-label">Maturity Benefit</label>
                  <select class="form-control" id="insurance_maturity_benifits" name="insurance_maturity_benifits" >
                                 <option value="">Choose</option>
                                  <option value="Yes">Yes</option>
                               <option value="No">No</option>
                            
                  </select>
                </div>		   
            
			       <div class="form-group">
								 <label >Lock in period</label>
								 <input type="date" id="insurance_lockin_period" name="insurance_lockin_period" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>    
          

				      <div class="form-group">
								 <label >Premium Date</label>
                  <span id="insurance_premium_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="insurance_premium_date" name="insurance_premium_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>

				    <div class="form-group">
			            <label  class="col-form-label">Premium Amount</label>
                   <span id="insurance_premium_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" id="insurance_premium_amt" name="insurance_premium_amt" class="form-control"  placeholder="">
			        </div>


			           <div class="form-group">
							<label  class="col-form-label">Premium Frequency</label>
               <span id="insurance_frequency_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="insurance_frequency"name="insurance_frequency" >
							                   <option value="">Choose</option>
							                    <option value="Quarterly">Quarterly</option>
								               <option value="Monthly">Monthly</option>
								               <option value="Half Yearly">Half Yearly</option>
								               <option value="Yearly">Yearly</option>
								            <option value="Single Premium">Single Premium</option>
							    </select>
				        </div> 

				         <div class="form-group">
								 <label >Next Premium Date</label>
                  <span id="insurance_nextpremium_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="insurance_nextpremium_date" name="insurance_nextpremium_date" max="3000-12-31" min="1000-01-01" class="form-control">
				        </div> 


                   <div class="form-group">
				            <label  class="col-form-label">Premium Tenure</label>
         <span id="insurance_premium_tenure_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
				            <div class="input-group-prepend">
						     <input type="text" class="form-control" id="insurance_premium_tenure"name="insurance_premium_tenure" placeholder="">
						              <div class="input-group-text">Yr</div>
						        </div>
				     </div>
 
         
             
	
        </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="add_insurance">Save</button>
         <button type="button" class="btn btn-secondary" id="can_insurance_form" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>


<!-- add  Life Insurance Endowment and Money Back body -->
<div class="modal fade bd-example-modal-lg" id="addLifeInsuranceEndowment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add <span id="lifechangeheading"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form_validation_class" id="lifeInsuranceEnd_form">
                 <div class="col-md-12">
                   
                    <span id="insuranceEndoMoney_alert-msg"></span>
                    
                    </div>
        <div class="row">

        	 <div class="col-md-6">


                      <div class="form-group">
							<label  class="col-form-label">Company</label>
         <span id="life_company_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="life_company_name"name="life_company_name" >
							                   <option value="">Choose</option>
							                   <option value="test Company">test</option>
								           
							    </select>
				       </div>

                   <div class="form-group">
			            <label  class="col-form-label">Policy Name</label>
         <span id="life_policy_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			              <select class="form-control"  id="life_policy_name"name="life_policy_name" >
                        <option value="">Choose</option>
                         <option value="testing Policy name">testing policy name.</option>
                             
                           
                  </select>
			        </div>


			          <div class="form-group">
			            <label  class="col-form-label">Policy Number</label>
         <span id="life_policy_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="life_policy_no" placeholder="">
			        </div>

				    <div class="form-group">
			            <label  class="col-form-label">Sum Assured</label>
       <span id="life_sum_assured_astrik" class="text-right text-danger" style="font-size:20px;">*</span>           
			            <input type="text" class="form-control" id="life_sum_assured" name="life_sum_assured" placeholder="">
			        </div>

             

				   <div class="form-group">
								 <label >Policy Starting Date</label>
         <span id="life_policy_start_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>        
								 <input type="date" id="life_policy_start_date"name="life_policy_start_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>

				    <div class="form-group">
								 <label >Maturity Date</label>
        <span id="life_maturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="life_maturity_date"name="life_maturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>


             <div class="form-group">
              <label  class="col-form-label">Maturity Benefit</label>
                  <select class="form-control" id="life_maturity_benifits" name="life_maturity_benifits" >
                                 <option value="">Choose</option>
                                  <option value="Yes">Yes</option>
                               <option value="No">No</option>
                            
                  </select>
                </div>

			            <div class="form-group">
								 <label >Lock in period</label>
								 <input type="date" id="life_lockin_period" name="life_lockin_period" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>  
                

           
				     
          
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">			   
            
			   

				      <div class="form-group">
								 <label >Premium Date</label>
    <span id="life_premium_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="life_premium_date" name="life_premium_date" max="3000-12-31" min="1000-01-01" class="form-control">
				    </div>

				    <div class="form-group">
			            <label  class="col-form-label">Premium Amount</label>
      <span id="life_premium_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" id="life_premium_amt" name="life_premium_amt" class="form-control"  placeholder="">
			        </div>


			           <div class="form-group">
							<label  class="col-form-label">Premium Frequency</label>
    <span id="life_frequency_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
							    <select class="form-control" id="life_frequency"  >
							                   <option value="">Choose</option>
							                    <option value="Quarterly">Quarterly</option>
								               <option value="Monthly">Monthly</option>
								               <option value="Half Yearly">Half Yearly</option>
								               <option value="Yearly">Yearly</option>
								            <option value="Single Premium">Single Premium</option>
							    </select>
				        </div> 

				         <div class="form-group">
								 <label >Next Premium Date</label>
      <span id="life_nextpremium_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
								 <input type="date" id="life_nextpremium_date" name="life_nextpremium_date" max="3000-12-31" min="1000-01-01" class="form-control">
				        </div> 


                   <div class="form-group">
				            <label  class="col-form-label">Premium Tenure</label>
        <span id="life_premium_tenure_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
				               <div class="input-group-prepend">
						           <input type="text" class="form-control" id="life_premium_tenure" name="life_premium_tenure"  placeholder="">
						              <div class="input-group-text">Yr</div>
						        </div>
				     </div>
 
         
                  <div class="form-group">
			            <label  class="col-form-label" id="hidelabel">Bonus Accumulated</label>
          <span id="life_bonus_accumulated_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="life_bonus_accumulated" name="life_bonus_accumulated" placeholder="">
			        </div>

			           <div class="form-group">
			            <label  class="col-form-label" id="hidebonuslabel">Vasted Bonus</label>
          <span id="life_vasted_bonus_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="life_vasted_bonus" name="life_vasted_bonus"  placeholder="">
			        </div>

         <div id="hidemoneyback">
              <div class="form-group">
                  <label  class="col-form-label">Moneyback Amount</label>
              <span id="life_moneyback_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" id="life_moneyback_amt" name="life_moneyback_amt" class="form-control"  placeholder="">
              </div>

               <div class="form-group">
                 <label >Next Moneyback Date</label>
            <span id="life_moneyback_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="life_moneyback_date" max="3000-12-31" min="1000-01-01" class="form-control">
                </div> 
	       </div>
      

        </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="AddIsuranceEndoMoney" >Save</button>
         <button type="button" class="btn btn-secondary" id="can_lifeInsuranceEnd_form" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>


<!-- add  Travel Insurance  body -->
<div class="modal fade bd-example-modal-lg" id="Addtravelinsurancedata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add Travel Insurance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form_validation_class" id="trv_form">
                 <div class="col-md-12">
                   
                    <span id="Travel_alert-msg"></span>
                    
                    </div>
        <div class="row">

           <div class="col-md-6">


                      <div class="form-group">
              <label  class="col-form-label">Company</label>
         <span id="travel_company_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <select class="form-control" id="travel_company_name" name="travel_company_name" >
                                 <option value="">Choose</option>
                                 <option value="test Company">test</option>
                           
                  </select>
               </div>

                   <div class="form-group">
                  <label  class="col-form-label">Policy Name</label>
         <span id="travel_policy_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                    <select class="form-control"  id="travel_policy_name" name="travel_policy_name" >
                        <option value="">Choose</option>
                         <option value="testing Policy name">testing policy name.</option>
                             
                           
                  </select>
              </div>


                <div class="form-group">
                  <label  class="col-form-label">Policy Number</label>
         <span id="travel_policy_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="travel_policy_no" name="travel_policy_no" placeholder="">
              </div>

            <div class="form-group">
                  <label  class="col-form-label">Sum Assured</label>
       <span id="trvlsum_assured_astrik" class="text-right text-danger" style="font-size:20px;">*</span>           
                  <input type="text" class="form-control" id="trvlsum_assured" name="trvlsum_assured" placeholder="">
              </div>

             

           <div class="form-group">
                 <label >Policy Starting Date</label>
         <span id="travel_policy_start_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>        
                 <input type="date" id="travel_policy_start_date" name="travel_policy_start_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>

            <div class="form-group">
                 <label >Maturity Date</label>
        <span id="travel_maturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="travel_maturity_date"name="travel_maturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>           
             
          
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">        
            
                         <div class="form-group">
              <label  class="col-form-label">Maturity Benefit</label>
                  <select class="form-control" id="travel_maturity_benifits" name="travel_maturity_benifits" >
                                 <option value="">Choose</option>
                                  <option value="Yes">Yes</option>
                               <option value="No">No</option>
                            
                  </select>
                </div>

                  <div class="form-group">
                 <label >Lock in period</label>
                 <input type="date" id="travel_lockin_period" name="travel_lockin_period" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>  
                     

              <div class="form-group">
                 <label >Premium Date</label>
    <span id="travel_premium_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="travel_premium_date" name="travel_premium_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>

            <div class="form-group">
                  <label  class="col-form-label">Premium Amount</label>
      <span id="travel_premium_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" id="travel_premium_amt" name="travel_premium_amt" class="form-control"  placeholder="">
              </div>


                 <div class="form-group">
              <label  class="col-form-label">Premium Frequency</label>
    <span id="travel_frequency_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <select class="form-control" id="travel_frequency" name="travel_frequency"  >
                                 <option value="">Choose</option>
                                  <option value="Quarterly">Quarterly</option>
                               <option value="Monthly">Monthly</option>
                               <option value="Half Yearly">Half Yearly</option>
                               <option value="Yearly">Yearly</option>
                            <option value="Single Premium">Single Premium</option>
                  </select>
                </div> 

                 <div class="form-group">
                 <label >Next Premium Date</label>
      <span id="travel_nextpremium_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="travel_nextpremium_date" name="travel_nextpremium_date" max="3000-12-31" min="1000-01-01" class="form-control">
                </div> 


                   <div class="form-group">
                    <label  class="col-form-label">Premium Tenure</label>
        <span id="travel_premium_tenure_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                       <div class="input-group-prepend">
                       <input type="text" class="form-control" id="travel_premium_tenure" name="travel_premium_tenure" placeholder="">
                          <div class="input-group-text">Yr</div>
                    </div>
             </div>
 
         
         
       
      

        </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="Addtrvlinsurance" >Save</button>
         <button type="button" class="btn btn-secondary" id="can_trv_form" data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>


<!-- add  ULIP body -->
<div class="modal fade bd-example-modal-lg" id="addULIPInsurance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Add ULIP Insurance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form class="form_validation_class" id="ulip_form">
                 <div class="col-md-12">
                   
                    <span id="ulip_alert-msg"></span>
                    
                    </div>
        <div class="row">

        	 <div class="col-md-6">

              
                      <div class="form-group">
              <label  class="col-form-label">Company</label>
         <span id="ulip_company_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <select class="form-control" id="ulip_company_name" name="ulip_company_name">
                                 <option value="">Choose</option>
                                 <option value="test Company">test</option>
                           
                  </select>
               </div>

                   <div class="form-group">
                  <label  class="col-form-label">Policy Name</label>
         <span id="ulip_policy_name_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                    <select class="form-control"  id="ulip_policy_name" name="ulip_policy_name" >
                        <option value="">Choose</option>
                         <option value="testing Policy name">testing policy name.</option>
                             
                           
                  </select>
              </div>


                <div class="form-group">
                   <label  class="col-form-label">Policy Number</label>
         <span id="ulip_policy_no_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <input type="text" class="form-control" id="ulip_policy_no" name="ulip_policy_no" placeholder="">
              </div>

            <div class="form-group">
                  <label  class="col-form-label">Sum Assured</label>
       <span id="ulip_sum_assured_astrik" class="text-right text-danger" style="font-size:20px;">*</span>           
                  <input type="text" class="form-control" id="ulip_sum_assured" name="ulip_sum_assured" placeholder="">
              </div>

             

           <div class="form-group">
                 <label >Policy Starting Date</label>
         <span id="ulip_policy_start_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>        
                 <input type="date" id="ulip_policy_start_date"name="ulip_policy_start_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>

            <div class="form-group">
                 <label >Maturity Date</label>
        <span id="ulip_maturity_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="ulip_maturity_date" name="ulip_maturity_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>


             <div class="form-group">
              <label  class="col-form-label">Maturity Benefit</label>
                  <select class="form-control" id="ulip_maturity_benifits" name="ulip_maturity_benifits" >
                                 <option value="">Choose</option>
                                  <option value="Yes">Yes</option>
                               <option value="No">No</option>
                            
                  </select>
                </div>

                  <div class="form-group">
                 <label >Lock in period</label>
                 <input type="date" id="ulip_lockin_period" name="ulip_lockin_period" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>  
                
        </div>

        <div class="col-md-6"  style="background-color: rgb(238,238,238);">			   
         


              <div class="form-group">
                 <label >Premium Date</label>
    <span id="ulip_premium_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="ulip_premium_date" name="ulip_premium_date" max="3000-12-31" min="1000-01-01" class="form-control">
            </div>

            <div class="form-group">
                  <label  class="col-form-label">Premium Amount</label>
     
                  <input type="text" id="ulip_premium_amt" name="ulip_premium_amt" class="form-control"  placeholder="">
              </div>
 <span id="ulip_premium_amt_astrik" class="text-right text-danger" style="font-size:20px;">*</span>

                 <div class="form-group">
              <label  class="col-form-label">Premium Frequency</label>
    <span id="ulip_frequency_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                  <select class="form-control" id="ulip_frequency" name="ulip_frequency"  >
                                 <option value="">Choose</option>
                                  <option value="Quarterly">Quarterly</option>
                               <option value="Monthly">Monthly</option>
                               <option value="Half Yearly">Half Yearly</option>
                               <option value="Yearly">Yearly</option>
                            <option value="Single Premium">Single Premium</option>
                  </select>
                </div> 

                 <div class="form-group">
                 <label >Next Premium Date</label>
      <span id="ulip_nextpremium_date_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                 <input type="date" id="ulip_nextpremium_date" name="ulip_nextpremium_date" max="3000-12-31" min="1000-01-01" class="form-control">
                </div> 


                   <div class="form-group">
                    <label  class="col-form-label">Premium Tenure</label>
        <span id="ulip_premium_tenure_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
                       <div class="input-group-prepend">
                       <input type="text" class="form-control" id="ulip_premium_tenure" name="ulip_premium_tenure" placeholder="">
                          <div class="input-group-text">Yr</div>
                    </div>
             </div>

                   <div class="form-group">
			            <label  class="col-form-label">Top Up Premium</label>
          <span id="ulip_topup_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="ulip_topup" name="ulip_topup"  placeholder="">
			        </div>
                  <div class="form-group">
         
			            <label  class="col-form-label">Total Premium Paid</label>
       <span id="ulip_totalpremium_astrik" class="text-right text-danger" style="font-size:20px;">*</span>
			            <input type="text" class="form-control" id="ulip_totalpremium" name="ulip_totalpremium" placeholder="">
			        </div>
             
	
        </div>

        </div>
           
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="addulipdata">Save</button>
         <button type="button" class="btn btn-secondary" id="can_ulip_form"data-dismiss="modal">Cancle</button>
      </div>
    </div>
  </div>
</div>



 <?php include('footer.php'); ?>


