
<script type="text/javascript">

   function add_to_nps_invetment_table(temp_stock_id) { 
          if(temp_stock_id != "")
         { // alert(temp_stock_id); exit();
       
          $.ajax({
              url:"<?php echo base_url(); ?>Add_details/add_to_nps_invetment_table",
              type: 'POST',
              data: {temp_stock_id:temp_stock_id},
              success: function(msg) {             
                $("#nps_table_data").DataTable().ajax.reload();
              }
          });

          }
         else{alert("data is not added..!!");}      
   }

     function del_to_temp_nps_investmenttable(temp_stock_id) { 
          if(temp_stock_id != "")
         {  //alert(temp_stock_id); exit();
       
          $.ajax({
              url:"<?php echo base_url(); ?>Add_details/del_to_temp_nps_investmenttable",
              type: 'POST',
              data: {temp_stock_id:temp_stock_id},
              success: function(msg) {             
                $("#nps_table_data").DataTable().ajax.reload();
              }
          });

          }
         else{alert("data is not deleted..!!");}      
   }


   function add_to_mutualfundinvetment_table(temp_stock_id) { 
          if(temp_stock_id != "")
         { // alert(temp_stock_id); exit();
       
          $.ajax({
              url:"<?php echo base_url(); ?>Add_details/add_to_mutualfundinvetment_table",
              type: 'POST',
              data: {temp_stock_id:temp_stock_id},
              success: function(msg) {             
                $("#mutualfund_table_data").DataTable().ajax.reload();
              }
          });

          }
         else{alert("data is not added..!!");}      
   }


  function del_to_temp_mutualfundtable(temp_stock_id) { 
          if(temp_stock_id != "")
         {  //alert(temp_stock_id); exit();
       
          $.ajax({
              url:"<?php echo base_url(); ?>Add_details/del_to_temp_mutualfundtable",
              type: 'POST',
              data: {temp_stock_id:temp_stock_id},
              success: function(msg) {             
                $("#mutualfund_table_data").DataTable().ajax.reload();
              }
          });

          }
         else{alert("data is not deleted..!!");}      
   }



   function add_to_bondtable(temp_stock_id) { 
          if(temp_stock_id != "")
         { // alert(temp_stock_id); exit();
       
          $.ajax({
              url:"<?php echo base_url(); ?>Add_details/temp_del_add_bond",
              type: 'POST',
              data: {temp_stock_id:temp_stock_id},
              success: function(msg) {             
                $("#bond_table_data").DataTable().ajax.reload();
              }
          });

          }
         else{alert("data is not added..!!");}      
   }

  function del_to_tempbondtable(temp_stock_id) { 
          if(temp_stock_id != "")
         {  //alert(temp_stock_id); exit();
       
          $.ajax({
              url:"<?php echo base_url(); ?>Add_details/temp_bond_del_record",
              type: 'POST',
              data: {temp_stock_id:temp_stock_id},
              success: function(msg) {             
                $("#bond_table_data").DataTable().ajax.reload();
              }
          });

          }
         else{alert("data is not deleted..!!");}      
   }

   function add_to_stocktable(temp_stock_id) { 
          if(temp_stock_id != "")
         { // alert(temp_stock_id); exit();
       
          $.ajax({
              url:"<?php echo base_url(); ?>Add_details/temp_del_add_stock",
              type: 'POST',
              data: {temp_stock_id:temp_stock_id},
              success: function(msg) {             
                $("#stock_table_data").DataTable().ajax.reload();
              }
          });

          }
         else{alert("data is not added..!!");}      
   }

      function del_to_tempstocktable(temp_stock_id) { 
          if(temp_stock_id != "")
         { // alert(temp_stock_id); exit();
       
          $.ajax({
              url:"<?php echo base_url(); ?>Add_details/temp_stock_del_record",
              type: 'POST',
              data: {temp_stock_id:temp_stock_id},
              success: function(msg) {             
                $("#stock_table_data").DataTable().ajax.reload();
              }
          });

          }
         else{alert("data is not deleted..!!");}      
   }
</script>





 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
  $(document).ready(function() {
    $('#stock_table_data').DataTable({
        "ajax" : "<?php echo base_url(); ?>Add_details/fetch_all_stocks",
        "pageLength": 5, 
       
      });

      $('#sgb_table_data').DataTable({
        "ajax" : "<?php echo base_url(); ?>Add_details/fetch_all_sgb", 
        "pageLength": 5,
        "aaSorting": [[ 0, "desc" ]],
       
      });

      $('#bond_table_data').DataTable({
        "ajax" : "<?php echo base_url(); ?>Add_details/fetch_all_bond", 
        "pageLength": 5,
       
      });

     $('#addedfloatrate').DataTable({
                  "ajax" : "<?php echo base_url(); ?>Add_details/fetch_all_floatrate", 
                    "pageLength": 5,
     });

     $('#mutualfund_table_data').DataTable({
                  "ajax" : "<?php echo base_url(); ?>Add_details/fetch_all_mutualfund", 
                    "pageLength": 5,
     });

      $('#nps_table_data').DataTable({
                  "ajax" : "<?php echo base_url(); ?>Add_details/fetch_all_nps", 
                    "pageLength": 5,
     });

 // dropdown code start -----
$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
// dropdown code end here -----


// Add transaction select button code ----
$('#select_portfolio_astrik').hide();
$('#select_assets_astrik').hide();
  $('#select_sub_Assets_astrik').hide();

$('#select_transaction').click(function(){

  //add transaction select portfolio field validation start
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
   var select_sub_Assets = $('#select_sub_Assets').val();
   if(select_portfolio_name=="")
   {
     $('#select_portfolio_name').css('border', '1px solid red');
      $('#select_portfolio_astrik').show();
      return false;
   }else{
    $('#select_portfolio_name').css('border', '');
    $('#select_portfolio_astrik').hide();
   }
     if(select_assets=="")
   {
     $('#select_assets').css('border', '1px solid red');
      $('#select_assets_astrik').show();
      return false;
   }else{
    $('#select_assets').css('border', '');
    $('#select_assets_astrik').hide();
   }
   if(select_sub_Assets=="")
   {
     $('#select_sub_Assets').css('border', '1px solid red');
      $('#select_sub_Assets_astrik').show();
      return false;
   }else{
    $('#select_sub_Assets').css('border', '');
    $('#select_sub_Assets_astrik').hide();
   }
  
  var valu = $('#select_sub_Assets').val();

  //Investment
    if (valu == "ETF") { $('#addETF').modal('show'); }
    else if (valu == "NPS / National Pension System") {  $('#addNPS').modal('show'); }
    else if (valu == "SCSS / Senior Citizen Saving Scheme") { $('#addSCSS').modal('show'); }
    else if (valu == "FD / Fixed Deposit") { $('#addFD').modal('show'); }
    else if (valu == "RD / Recurring Deposit") { $('#addRD').modal('show'); }
    else if (valu == "Private Equity / Startup") { $('#addPrivateEquity').modal('show'); }
    else if (valu == "NCD / Debenture") { $('#addNCDebenture').modal('show'); }
    else if (valu == "Bond / Corporate Bond")
     {
        $("#sgbheading").empty(); 
        $('#addSGB').modal('show'); 
        $("#sgbheading").append(valu);
        $('#bond_table_data').show();

      $("#bond_table_data_length").show();
      $("#bond_table_data_info").show();
      $("#bond_table_data_filter").show();
      $("#bond_table_data_paginate").show();

      $('#sgb_table_data').hide();
      $("#sgb_table_data_length").hide();
      $("#sgb_table_data_info").hide();
      $("#sgb_table_data_filter").hide();
      $("#sgb_table_data_paginate").hide();
    }

     else if (valu == "Stock / Share") { $('#addStock').modal('show'); }
    else if (valu == "MF / Mutual Fund") { $('#addMutualFund').modal('show'); }
    else if (valu == "KVP / Kishan Vikas Patra") { $('#addKisanVikasPatra').modal('show'); }
    else if (valu == "NSC / National Saving Certificate") { $('#addNSC').modal('show'); }
     else if (valu == "PPF / Public Provident Fund") { $('#addPPF').modal('show'); }
      else if (valu == "EPF / Employee Provident Fund") { $('#addEPF').modal('show'); }
     else if (valu == "SSY / Sukanya Samriddhi Yojana") { $('#addSukanya').modal('show'); }
     else if (valu == "SGB / Sovereign Gold Bond") {
       $("#sgbheading").empty(); 
       $('#addSGB').modal('show');
       $("#sgbheading").append(valu);   
      $('#sgb_table_data').show();
      $("#sgb_table_data_length").show();
      $("#sgb_table_data_info").show();
      $("#sgb_table_data_filter").show();
      $("#sgb_table_data_paginate").show();

      $('#bond_table_data').hide();
      $("#bond_table_data_length").hide();
      $("#bond_table_data_info").hide();
      $("#bond_table_data_filter").hide();
      $("#bond_table_data_paginate").hide();
     }


// Assets
   else if (valu == "Agricultural Land") { $("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu); }
   else if (valu == "Art") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu); }
    else if (valu == "Bike") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu); }
    else if (valu == "Car") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu); }
  else if (valu == "Commercial Land") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu);}
  else if (valu == "Commercial Property") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu); }
  else if (valu == "Commercial Vehicle") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu);}
  else if (valu == "Digital Property") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu);}
     else if (valu == "Gold") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu);}
    else if (valu == "House") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu); }
    else if (valu == "Jewellery") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu); }
    else if (valu == "Platinum") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu);}
    else if (valu == "Plot") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu); }
     else if (valu == "Precious Stone") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu); }
     else if (valu == "Silver") {$("#assetheading").empty(); $('#addAsset').modal('show'); $("#assetheading").append(valu); }


   //Emergency Fund
     else if (valu == "Cash in Hand") {$("#EmergencyFundheading").empty(); $('#addEmergencyfund').modal('show'); $("#EmergencyFundheading").append(valu); $("#hidebankname").hide();}
     else if (valu == "Cash in post office saving A/c") {$("#EmergencyFundheading").empty(); $('#addEmergencyfund').modal('show');  $("#EmergencyFundheading").append(valu); $("#hidebankname").hide(); } 
     else if (valu == "Cash in Saving A/C") {$("#EmergencyFundheading").empty(); $('#addEmergencyfund').modal('show');  $("#EmergencyFundheading").append(valu); $("#hidebankname").show();  
       $("#changeheading").html("Bank / NBFC name");
   }
     else if (valu == "Cash in wallet") {$("#EmergencyFundheading").empty(); $('#addEmergencyfund').modal('show');  $("#EmergencyFundheading").append(valu); $("#hidebankname").show();
      $("#changeheading").html("Wallet Name");
   }

   
   //Insurance code 
     else if (valu == "Bike Insurance") {
     $("#bikecarhomeheading").empty();
     $("#changebikecarhomevalue").empty();
     $('#addBikeCarHomeInsurance').modal('show');
        $("#bikecarhomeheading").append(valu);
        $("#changebikecarhomevalue").html("Bike Insured Value"); }

    else if (valu == "Car Insurance") { 
      $("#bikecarhomeheading").empty();
      $("#changebikecarhomevalue").empty();
     $('#addBikeCarHomeInsurance').modal('show'); 
      $("#bikecarhomeheading").append(valu);
    $("#changebikecarhomevalue").html("Car Insured Value");}

    else if (valu == "Home Insurance") {
      $("#bikecarhomeheading").empty();
      $("#changebikecarhomevalue").empty();
       $('#addBikeCarHomeInsurance').modal('show');
      $("#bikecarhomeheading").append(valu);
      $("#changebikecarhomevalue").html("Home Insured Value"); } 



    else if (valu == "Health Insurance")
     { 
      $("#bikecarhomeheading").empty();
      $("#changebikecarhomevalue").empty();
       $('#addBikeCarHomeInsurance').modal('show');
      $("#bikecarhomeheading").append(valu);
      $("#changebikecarhomevalue").html("Health Insured Value");

      $('#addBikeCarHomeInsurance').modal('show');
       $('#healthhidecolumn').show();

       }

     else if (valu == "Travel Insurance") {
         
          $('#Addtravelinsurancedata').modal('show');
        
      }

        else if (valu == "Life Insurance (Endowment)")
       {
        $("#lifechangeheading").empty();
        $('#addLifeInsuranceEndowment').modal('show');
        $("#lifechangeheading").append(valu);
         $('#hidemoneyback').hide();
       } 

      else if (valu == "Life Insurance (Money Back)")
       {
          $("#lifechangeheading").empty();
        $('#addLifeInsuranceEndowment').modal('show');
          $("#lifechangeheading").append(valu);
        $('#hidemoneyback').show();
       }

        else if (valu == "Term Plan")
       {   $("#bikecarhomeheading").empty();
           $("#changebikecarhomevalue").empty();
           $('#addBikeCarHomeInsurance').modal('show');
           $("#bikecarhomeheading").append(valu);
           $("#changebikecarhomevalue").html("Term Plan Value");
            $('#travelandTermplanhidecolumn').show();
      }

      else if (valu == "ULIP")
     {
        $('#addULIPInsurance').modal('show');
 
     }  

   //Libality Loans  
       else if (valu == "Appliance Loan") {
        $("#loanheading").empty(); 
         $("#loanheading").append(valu);
       $('#addLoan').modal({ backdrop: 'static', keyboard: false });}
        else if (valu == "Bike Loan") {$("#loanheading").empty();  $('#addLoan').modal({ backdrop: 'static', keyboard: false }); $("#loanheading").append(valu); }
        else if (valu == "Car Loan") {$("#loanheading").empty();  $('#addLoan').modal({ backdrop: 'static', keyboard: false }); $("#loanheading").append(valu); }
       else if (valu == "Home Loan") {$("#loanheading").empty();  $('#addLoan').modal({ backdrop: 'static', keyboard: false }); $("#loanheading").append(valu); }
        else if (valu == "Mortgage Loan") {$("#loanheading").empty();  $('#addLoan').modal({ backdrop: 'static', keyboard: false }); $("#loanheading").append(valu); }
       else if (valu == "Personal Loan") {$("#loanheading").empty();  $('#addLoan').modal({ backdrop: 'static', keyboard: false }); $("#loanheading").append(valu); }



     else if (valu == "Select Sub Assets") { alert("Select atleast one sub assets ..!!");  } 
     else{ alert("No Form is Avaliable yet..!!");}
});



// dynamic Loan form textbox code start here ------
   $(function () {  $("#fixedtxtbox").hide(); $("#floattxtbox").hide(); $("#addedfloatrate").hide();
    $("#floattableheading").hide(); 

     $("#addedfloatrate_filter").hide();
      $("#addedfloatrate_length").hide();
      $("#addedfloatrate_info").hide();
      $("#addedfloatrate_paginate").hide();

        $("#loan_Interest_rate_type").change(function () {
            if ($(this).val() == "Fixed") {
              $("#fixedtxtbox").show();$("#floattxtbox").hide();$("#addedfloatrate").hide(); $("#floattableheading").hide();
                       $("#addedfloatrate_filter").hide();
      $("#addedfloatrate_length").hide();
      $("#addedfloatrate_info").hide();
      $("#addedfloatrate_paginate").hide();
  
            }
            else if ($(this).val() == "Floating") {
                $("#floattxtbox").show();  $(".add-more").show(); $("#addedfloatrate").show(); $("#fixedtxtbox").hide();
              $('#loan_fixed_rate_value').val("");

                $("#floattableheading").show();

                 $("#addedfloatrate_filter").show();
                  $("#addedfloatrate_length").show();
                  $("#addedfloatrate_info").show();
                  $("#addedfloatrate_paginate").show();

             
            }  
            else {
                $("#fixedtxtbox").hide(); $("#floattxtbox").hide();$("#addedfloatrate").hide();   $("#floattableheading").hide();   $('#loan_fixed_rate_value').val("");   
          
                $("#addedfloatrate_filter").hide();
                $("#addedfloatrate_length").hide();
                $("#addedfloatrate_info").hide();
                $("#addedfloatrate_paginate").hide();
     
            }
        });
    });

     $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after("<tr>"+html+"</tr>");
      });

     $("body").on("click",".remove-one",function(){ 
          $(this).parents("tr").remove();
          //$(this).closest('tr').remove();
      });
// dynamic Loan textbox code ends here ------



// dynamic RD form Type field textbox code start here ------
   $(function () {  $("#Banktxtbox").hide(); $("#officetxtbox").hide();$("#CorporateRDtxtbox").hide();
        $("#DynamicLoanType").change(function () {
            if ($(this).val() == "Bank") {
                $("#Banktxtbox").show();$("#officetxtbox").hide();$("#CorporateRDtxtbox").hide();
            }
            else if ($(this).val() == "Post Office") {
                $("#officetxtbox").show();$("#Banktxtbox").hide();$("#CorporateRDtxtbox").hide();
            } 
             else if ($(this).val() == "Corporate RD") {
                $("#CorporateRDtxtbox").show();$("#Banktxtbox").hide();$("#officetxtbox").hide();
            }  
            else {
             $("#Banktxtbox").hide(); $("#officetxtbox").hide();$("#CorporateRDtxtbox").hide();
            }
        });
    });
// dynamic Loan textbox code ends here ------


//add_group code start.........

$('#astrik').hide();

$('#group_submit').click(function() {
   var group_name = $('#group_name').val();

    if(group_name==""){
      $('#group_name').css('border', '1px solid red');
      $('#astrik').show();
      return false;
    }else{
       $('#group_name').css('border', '');
      $('#astrik').hide();
    }

    var form_data = {
        user_id: $('#user_id').val(),
        group_name: $('#group_name').val()
    };
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_group",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#alert-msg').html('<div class="alert alert-success text-center">Your Group has been added successfully!</div>');    $("#addGroup").modal('hide'); location.reload(true);}
            else if (msg == 'NO'){
                $('#alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });
    return false;
});
//add group code end....

//edit group code start....
 $('#update_group_name_astrik').hide();
 $('#update_group_value_astrik').hide();

$('#update_group_submit').click(function() {
   var update_group_name = $('#update_group_name').val();
   var update_group_value = $('#update_group_value').val();
   // var grp_id = $('#update_group_name #grp_id').html(); alert(grp_id); exit();
      if(update_group_name==""){
      $('#update_group_name').css('border', '1px solid red');
      $('#update_group_name_astrik').show();
      return false;
    }else{
       $('#update_group_name').css('border', '');
      $('#update_group_name_astrik').hide();
    }
    if(update_group_value==""){
      $('#update_group_value').css('border', '1px solid red');
      $('#update_group_value_astrik').show();
      return false;
    }else{
       $('#update_group_value').css('border', '');
      $('#update_group_value_astrik').hide();
    }

    var form_data = {
        user_id: $('#user_id').val(),
        group_name:$('#update_group_name').val(),
        update_group_value: $('#update_group_value').val()
    };
   $.ajax({
        url:"<?php echo base_url(); ?>Add_details/update_group",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#update-alert-msg').html('<div class="alert alert-success text-center">Your Group has been added successfully!</div>');    $("#editGroup").modal('hide');  location.reload(true);
              }
            else if (msg == 'NO'){
                $('#update-alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#update-alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });
    return false;
});
//edit group code end....

//add_portfolio code start.........

 $('#portfolio_name_astrik').hide();
$('#port_date_astrik').hide();
 $('#full_name_astrik').hide();
 $('#port_group_astrik').hide();
 $('#port_gender_astrik').hide();
 $('#pran_astrik').hide();
 $('#einsurance_no_astrik').hide();
  $('#port_address_astrik').hide();
$('#port_city_astrik').hide();
$('#port_country_astrik').hide();
$('#pin_code_astrik').hide();
$('#pan_astrik').hide();

$('#add_portfolio_submit').click(function() {

 var portfolio_name= $('#portfolio_name').val();
   var   port_date= $('#port_date').val();
   var  full_name= $('#full_name').val();
   var    port_group= $('#port_group').val();
   var     port_gender= $('#port_gender').val();
   var     pran= $('#pran').val();
    var    einsurance_no= $('#einsurance_no').val();
   var     port_address= $('#port_address').val();
   var     port_city= $('#port_city').val();
    var    port_country= $('#port_country').val();
    var    pin_code= $('#pin_code').val();
    var    pan= $('#pan').val();

 if(portfolio_name==""){
      $('#portfolio_name').css('border', '1px solid red');
      $('#portfolio_name_astrik').show();
      return false;
    }else{
      $('#portfolio_name').css('border', '');
      $('#portfolio_name_astrik').hide();
    }

   if(port_date=="")
    {
      $('#port_date').css('border', '1px solid red');
      $('#port_date_astrik').show();
      return false;
    }
    else{
        $('#port_date').css('border', '');
      $('#port_date_astrik').hide();
    }

   if(full_name=="")
    {
        $('#full_name').css('border', '1px solid red');
      $('#full_name_astrik').show();
      return false;
    }
    else{
        $('#full_name').css('border', '');
      $('#full_name_astrik').hide();
    }
     if(port_group=="")
    {
       $('#port_group').css('border', '1px solid red');
      $('#port_group_astrik').show();
      return false;
    }
    else{
      $('#port_group').css('border', '');
      $('#port_group_astrik').hide();
    }

    if(port_gender=="")
    {
       $('#port_gender').css('border', '1px solid red');
      $('#port_gender_astrik').show();
      return false;
    }
    else{
        $('#port_gender').css('border', '');
      $('#port_gender_astrik').hide();
    }
    if(pran=="")
    {
       $('#pran').css('border', '1px solid red');
      $('#pran_astrik').show();
      return false;
    }
    else{
      $('#pran').css('border', '');
      $('#pran_astrik').hide();
    }
    if(einsurance_no=="")
    {
       $('#einsurance_no').css('border', '1px solid red');
      $('#einsurance_no_astrik').show();
      return false;
    }
    else{
      $('#einsurance_no').css('border', '');
      $('#einsurance_no_astrik').hide();
    }
    if(port_address=="")
    {
       $('#port_address').css('border', '1px solid red');
      $('#port_address_astrik').show();
      return false;
    }
    else{
      $('#port_address').css('border', '');
      $('#port_address_astrik').hide();
    }
    if(port_city=="")
    {
       $('#port_city').css('border', '1px solid red');
      $('#port_city_astrik').show();
      return false;
    }
    else{
       $('#port_city').css('border', '');
      $('#port_city_astrik').hide();
    }
    if(port_country=="")
    {
       $('#port_country').css('border', '1px solid red');
      $('#port_country_astrik').show();
      return false;
    }
    else{
       $('#port_country').css('border', '');
      $('#port_country_astrik').hide();
    }
    if(pin_code=="")
    {
       $('#pin_code').css('border', '1px solid red');
      $('#pin_code_astrik').show();
      return false;
    }
    else{
        $('#pin_code').css('border', '');
      $('#pin_code_astrik').hide();
    }
    if(pan=="")
    {
       $('#pan').css('border', '1px solid red');
      $('#pan_astrik').show();
      return false;
    }else{
       $('#pan').css('border', '');
      $('#pan_astrik').hide();
    }


    var form_data = {
        user_id: $('#user_id').val(),
        portfolio_name: $('#portfolio_name').val(),
        port_date: $('#port_date').val(),
        full_name: $('#full_name').val(),
        port_group: $('#port_group').val(),
        port_gender: $('#port_gender').val(),
        pran: $('#pran').val(),
        einsurance_no: $('#einsurance_no').val(),
        port_address: $('#port_address').val(),
        port_city: $('#port_city').val(),
        port_country: $('#port_country').val(),
        pin_code: $('#pin_code').val(),
        pan: $('#pan').val()
    };
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_portfolio",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#port_alert-msg').html('<div class="alert alert-success text-center">Your Group has been added successfully!</div>');    $("#addPortfolio").modal('hide');  location.reload(true);}
            else if (msg == 'NO'){
                $('#port_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#port_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');}
        }
    });
    return false;
});



//edit portfolio fetch code start.........


$('#update_portfolio_name').change(function()
 {  var portfolio_name = $('#update_portfolio_name').val();
    
   if(portfolio_name != '')
  { 
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/fetch_edit_portfolio",
        type: 'POST',
        data: {portfolio_name:portfolio_name},
        success: function(msg) {
         
                $('#hideblankdata').remove();
                             $('#fetchport_data').html(msg);  
        }
       });
       }
        else
        { 
           alert("Server error..!!!");
        }
});
// end of edit portfolio fetch data....

//update_portfolio code start.........
$('#update_portfolio_name_astrik').hide();
$('#update_port').click(function() {

var oldportfolio_name= $('#update_portfolio_name').val();
   var   port_date= $('#update_port_date').val();
  // var    port_group= $('#update_port_group').val();
 var  full_name= $('#update_full_name').val();
   var     port_gender= $('#update_port_gender').val();
   var     pran= $('#update_pran').val();
    var    einsurance_no= $('#update_einsurance_no').val();
   var     port_address= $('#update_port_address').val();
   var     port_city= $('#update_port_city').val();
    var    port_country= $('#update_port_country').val();
    var    pin_code= $('#update_pin_code').val();
    var    pan= $('#update_pan').val();
 
  if(oldportfolio_name==""){
      $('#update_portfolio_name').css('border', '1px solid red');
      $('#update_portfolio_name_astrik').show();
      return false;
    }else{
      $('#update_portfolio_name').css('border', '');
      $('#update_portfolio_name_astrik').hide();
    }

   if(port_date=="")
    {
      $('#update_port_date').css('border', '1px solid red');
      $('#update_port_date_astrik').show();
      return false;
    }
    else{
        $('#update_port_date').css('border', '');
      $('#update_port_date_astrik').hide();
    }

      if(full_name=="")
    {
        $('#update_full_name').css('border', '1px solid red');
      $('#update_full_name_astrik').show();
      return false;
    }
    else{
        $('#update_full_name').css('border', '');
      $('#update_full_name_astrik').hide();
    }

   /*  if(port_group=="")
    {
       $('#update_port_group').css('border', '1px solid red');
      $('#update_port_group_astrik').show();
      return false;
    }
    else{
      $('#update_port_group').css('border', '');
      $('#update_port_group_astrik').hide();
    }*/

    if(port_gender=="")
    {
       $('#update_port_gender').css('border', '1px solid red');
      $('#update_port_gender_astrik').show();
      return false;
    }
    else{
        $('#update_port_gender').css('border', '');
      $('#update_port_gender_astrik').hide();
    }
    if(pran=="")
    {
       $('#update_pran').css('border', '1px solid red');
      $('#update_pran_astrik').show();
      return false;
    }
    else{
      $('#update_pran').css('border', '');
      $('#update_pran_astrik').hide();
    }
    if(einsurance_no=="")
    {
       $('#update_einsurance_no').css('border', '1px solid red');
      $('#update_ance_no_astrik').show();
      return false;
    }
    else{
      $('#update_einsurance_no').css('border', '');
      $('#update_einsurance_no_astrik').hide();
    }
    if(port_address=="")
    {
       $('#update_port_address').css('border', '1px solid red');
      $('#update_port_address_astrik').show();
      return false;
    }
    else{
      $('#update_port_address').css('border', '');
      $('#update_port_address_astrik').hide();
    }
    if(port_city=="")
    {
       $('#update_port_city').css('border', '1px solid red');
      $('#update_port_city_astrik').show();
      return false;
    }
    else{
       $('#update_port_city').css('border', '');
      $('#update_port_city_astrik').hide();
    }
    if(port_country=="")
    {
       $('#update_port_country').css('border', '1px solid red');
      $('#update_port_country_astrik').show();
      return false;
    }
    else{
       $('#update_port_country').css('border', '');
      $('#update_port_country_astrik').hide();
    }
    if(pin_code=="")
    {
       $('#update_pin_code').css('border', '1px solid red');
      $('#update_pin_code_astrik').show();
      return false;
    }
    else{
        $('#update_pin_code').css('border', '');
      $('#update_pin_code_astrik').hide();
    }
    if(pan=="")
    {
       $('#update_pan').css('border', '1px solid red');
      $('#update_pan_astrik').show();
      return false;
    }else{
       $('#update_pan').css('border', '');
      $('#update_pan_astrik').hide();
    }

    var form_data = {
        user_id: $('#user_id').val(),
        id: $('#hide_portname').val(),
        port_date: $('#update_port_date').val(),
        full_name: $('#update_full_name').val(),
        port_gender: $('#update_port_gender').val(),
        pran: $('#update_pran').val(),
        einsurance_no: $('#update_einsurance_no').val(),
        port_address: $('#update_port_address').val(),
        port_city: $('#update_port_city').val(),
        port_country: $('#update_port_country').val(),
        pin_code: $('#update_pin_code').val(),
        pan: $('#update_pan').val()
    };
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/update_portfolio",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                  $("#editPortfolio").modal('hide');  location.reload(true); }
            else if (msg == 'NO'){
                $('#update_port_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#update_port_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');}
        }
    });
    return false;
});
// edit portfolio update code ....

//delete portfolio code start here ....
 $("#delete_port").on('click',function(){
     var del_id= $('#hide_portname').val();
     var oldportfolio_name= $('#update_portfolio_name').val();

       if(oldportfolio_name==""){
      $('#update_portfolio_name').css('border', '1px solid red');
      $('#update_portfolio_name_astrik').show();
      return false;
    }else{
      $('#update_portfolio_name').css('border', '');
      $('#update_portfolio_name_astrik').hide();
    }

        if(confirm('Are you sure you want to delete this record ?'))
        {
           
        if(del_id != '')
        { 
         $.ajax({
          url:"<?php echo base_url(); ?>Add_details/delete_portfolio",
          method:"POST",
          data:{del_id:del_id},
          success:function(data)
          {
            if(data=="NO")
            { alert("Not deleted");  }
            else{ 
             $("#editPortfolio").modal('hide'); // location.reload(true); 

            }
          }
             
         });
        }
        else
        { 
           alert("Server error..!!!");
        }
      }
   });


//delete stock code start here ....
 



           $("body").on("click","#stock_del",function(){ 
          $(this).parents("tr").remove();

    $('#stock_name').val("");
   $('#stock_transaction_type').val("");
    $('#stock_broker').val("");
 $('#stock_date').val("");
  $('#stock_contract_no').val("");
   $('#stock_settlement_no').val("");
   $('#stock_qty').val("");
    $('#stock_purchase_price').val("");
     $('#stock_amt_invested').val("");
   $('#stock_brokerage').val("");
   $('#stock_net_rate').val("");
  $('#stock_tax_value').val("");
    $('#stock_cgst').val("");
   $('#stock_sgst').val(""); 
   $('#stock_igst').val("");
   $('#stock_exchange_transaction').val("");
    $('#stock_stt').val("");
    $('#stock_sebi_fee').val("");
   $('#stock_stamp_duty').val("");
 $('#stock_net_amt').val("");

          //$(this).closest('tr').remove();
      });


//delete stock code end here ....



//3rd search code start here ....
 $("#search_goback").hide();
  $("#search_nodata").hide(); 
 $("#search_submit").on('click',function(){
     var myinput= $('#myinput').val();
       if(myinput==""){
         $('#myinput').css('border', '1px solid red');    
            return false;
       } else{
        $('#myinput').css('border', ''); 
       }   

        if(myinput != '')
        { 
         $.ajax({
          url:"<?php echo base_url(); ?>Dashboard/dashboard_search",
          method:"POST",
          data:{myinput:myinput},
          success:function(data)
          {
            if(data=="NO")
            { alert("hello");  }
            else if(data==""){
               $("#search_nodata").show();
                $("#search_nodata").html('No data'); 
                $("#search_goback").show(); 
            $("#search_goback").html('Go Back'); 
                 jQuery('#group_hide').remove();
              jQuery('#goback').remove();jQuery('#clickgroupdata').remove();
            }
            else{ 
               $("#search_nodata").hide(); 
             $('#fetch_search_Portfolio').html(data);
               
            $("#search_goback").show(); 
            $("#search_goback").html('Go Back'); 
                 jQuery('#group_hide').remove();
              jQuery('#goback').remove();jQuery('#clickgroupdata').remove();

            }
          }
             
         });
        }
        else
        { 
           alert("Server error..!!!");
        }
   });


//3rd toolbar portfolio fect code ......

  $(".aa a").on('click',function(){
      var group_name =  $(this).text();

        if(group_name != '')
        { 
         $.ajax({
          url:"<?php echo base_url(); ?>Dashboard/fetch_portfolio",
          method:"POST",
          data:{group_name:group_name},
          success:function(data)
          {
            if(data=="NO")
            {   }
            else{ 
             
             $('#fetch_Portfolio').html(data);
               jQuery('#clickgroupdata').html(group_name).toggle('show');
            }
          }
             
         });
        }
        else
        { 
           alert("Server error..!!!");
        }
   });
      
      $("#goback").hide(); $("#clickgroupdata").hide(); 
    jQuery('.aa #group_value').on('click', function(event) { 
           jQuery('#goback').html('Go Back').toggle('show');
          
         
         jQuery('.aa #group_value').toggle('hide');
      });

    jQuery('#goback').on('click', function(event) {
       $("#goback").hide(); $("#clickgroupdata").hide(); jQuery('#fetch_Portfolio').toggle('hide');
       location.reload(true);
    });

    jQuery('#clickgroupdata').on('click', function(event) {
      $("#clickgroupdata").show(); 
    });

     jQuery('#search_goback').on('click', function(event) {
      location.reload(true);
      $("#search_goback").hide(); $("#search_nodata").hide(); 
    });

     

//3rd toolbar portfolio fetch code finish here ......
 
//add transaction sub asstes fetch code start here ......
  $('#select_assets').change(function(){
      var assets_id = $('#select_assets').val();

        if(assets_id != '')
        { 
         $.ajax({
          url:"<?php echo base_url(); ?>Dashboard/fetch_sub_asstes",
          method:"POST",
          data:{assets_id:assets_id},
          success:function(data)
          {
           $('#select_sub_Assets').html(data);
          }
             
         });
        }
        else
        { 
         $('#select_sub_Assets').html('<option value="">Select sub assets</option>');
        }
   });
  //add transaction sub asstes fetch code ends here ......


// add asstes agriculture land code start here ...

  $('#assets_avg_price').keypress(function(e) {
      if (e.shiftKey || e.ctrlKey || e.altKey) {
        e.preventDefault();
      } else {
      /*  var key = e.keyCode;
        if (!( key < 97 || key > 122 )) {
          e.preventDefault();
        }*/
          var inputValue = e.charCode;
        //alert(inputValue);
        if(!((inputValue > 47 && inputValue < 58) ||(inputValue==32) || (inputValue==0))){
            event.preventDefault();
             $('#assets_avg_price_astrik').css('font-size','15px');
             $('#assets_avg_price').css('border', '1px solid red');
            $('#assets_avg_price_astrik').show();
            $('#assets_avg_price_astrik').html("&nbsp;Only Number");
        }
        else{
          $('#assets_avg_price_astrik').hide();
          $('#assets_avg_price').css('border', '');
        }
        
      } 
    });


  $('#assets_quantity').keypress(function(e) {
      if (e.shiftKey || e.ctrlKey || e.altKey) {
        e.preventDefault();
      } else {
      /*  var key = e.keyCode;
        if (!( key < 97 || key > 122 )) {
          e.preventDefault();
        }*/
          var inputValue = e.charCode;
        //alert(inputValue);
        if(!((inputValue > 47 && inputValue < 58) ||(inputValue==32) || (inputValue==0))){
            event.preventDefault();
             $('#assets_quantity_astrik').css('font-size','15px');
             $('#assets_quantity').css('border', '1px solid red');
            $('#assets_quantity_astrik').show();
            $('#assets_quantity_astrik').html("&nbsp;Only Number");
        }
        else{
          $('#assets_quantity_astrik').hide();
          $('#assets_quantity').css('border', '');
        }
        
      } 
    });

     $('#assets_amt_invested').keypress(function(e) {
      if (e.shiftKey || e.ctrlKey || e.altKey) {
        e.preventDefault();
      } 
      else
       {

          var inputValue = e.charCode;
        if(!((inputValue > 47 && inputValue < 58) ||(inputValue==32) || (inputValue==0))){
            event.preventDefault();
             $('#assets_amt_invested_astrik').css('font-size','15px');
             $('#assets_amt_invested').css('border', '1px solid red');
              $('#assets_amt_invested_astrik').show();
              $('#assets_amt_invested_astrik').html("&nbsp;Only Number");
        }
        else{
          $('#assets_amt_invested_astrik').hide();
          $('#assets_amt_invested').css('border', '');
        }
        
      } 
    });

     $('#assets_present_value').keypress(function(e) {
      if (e.shiftKey || e.ctrlKey || e.altKey) {
        e.preventDefault();
      } 
      else
       {
         var inputValue = e.charCode;
        if(!((inputValue > 47 && inputValue < 58) ||(inputValue==32) || (inputValue==0))){
            event.preventDefault();
             $('#assets_present_value_astrik').css('font-size','15px');
             $('#assets_present_value').css('border', '1px solid red');
             $('#assets_present_value_astrik').show();
             $('#assets_present_value_astrik').html("&nbsp;Only Number");
        }
        else{
          $('#assets_present_value_astrik').hide();
          $('#assets_present_value').css('border', '');
        }
        
      } 
    });

// asstes add code start here ....
$('#assetsCancle, #asstesClose').click(function() { 

$('#assets_transaction_type').val("");
 $('#assets_date').val("");
 $('#assets_avg_price').val("");
  $('#assets_quantity').val("");
    $('#assets_amt_invested').val("");
  $('#assets_present_value').val(""); 

});


$('#assets_transaction_type_astrik').hide();
$('#assets_date_astrik').hide();
$('#assets_avg_price_astrik').hide();
$('#assets_quantity_astrik').hide();
$('#assets_amt_invested_astrik').hide();
$('#assets_present_value_astrik').hide();

$('#Asstes_submit').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  

   var assets_transaction_type = $('#assets_transaction_type').val();
   var assets_date = $('#assets_date').val();
    var assets_avg_price = $('#assets_avg_price').val();
   var assets_quantity = $('#assets_quantity').val();
   var assets_amt_invested = $('#assets_amt_invested').val();
   var assets_present_value = $('#assets_present_value').val();
     
   
    if(assets_transaction_type==""){
      $('#assets_transaction_type').css('border', '1px solid red');
      $('#assets_transaction_type_astrik').show();
      return false;
    }else{
     $('#assets_transaction_type').css('border', '');
      $('#assets_transaction_type_astrik').hide();
    }
      if(assets_date==""){
      $('#assets_date').css('border', '1px solid red');
      $('#assets_date_astrik').show();
      return false;
    }else{
     $('#assets_date').css('border', '');
      $('#assets_date_astrik').hide();
    }
       if(assets_avg_price==""){
      $('#assets_avg_price').css('border', '1px solid red');
      $('#assets_avg_price_astrik').show();
      return false;
    }else{
     $('#assets_avg_price').css('border', '');
      $('#assets_avg_price_astrik').hide();
    }
      if(assets_quantity==""){
      $('#assets_quantity').css('border', '1px solid red');
      $('#assets_quantity_astrik').show();
      return false;
    }
    else{
     $('#assets_quantity').css('border', '');
      $('#assets_quantity_astrik').hide();
    }
      if(assets_amt_invested==""){
      $('#assets_amt_invested').css('border', '1px solid red');
      $('#assets_amt_invested_astrik').show();
      return false;
    }else{
     $('#assets_amt_invested').css('border', '');
      $('#assets_amt_invested_astrik').hide();
    }
      if(assets_present_value==""){
      $('#assets_present_value').css('border', '1px solid red');
      $('#assets_present_value_astrik').show();
      return false;
    }else{
     $('#assets_present_value').css('border', '');
      $('#assets_present_value_astrik').hide();
    }

   if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
        assets_transaction_type : $('#assets_transaction_type').val(),
       assets_date : $('#assets_date').val(),
       assets_avg_price : $('#assets_avg_price').val(),
       assets_quantity : $('#assets_quantity').val(),
       assets_amt_invested : $('#assets_amt_invested').val(),
       assets_present_value : $('#assets_present_value').val()
    };

   

   if(valu != "")
   {
   // alert(select_portfolio_name+""+select_assets+""+valu+""+transaction_type+""+agriculture_date);

    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_assets_details",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#assets_alert-msg').html('<div class="alert alert-success text-center">Your Group has been added successfully!</div>');    $("#addAsset").modal('hide'); location.reload(true);
              }
            else if (msg == 'NO'){
                $('#assets_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#assets_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});

// emergency asstes code start ....
$('#emergencyclose, #emergencycancle').click(function() { 

$('#cash_bank_name').val("");
 $('#cashinhand_date').val("");
 $('#cash_amt_invested').val("");
  $('#cash_current_value').val("");
    $('#cash_interest_rate').val("");
  $('#cash_interest_type').val(""); 
 $('#cash_interest_payment').val("");
});

$('#cash_bank_name_astrik').hide();
$('#cashinhand_date_astrik').hide();

$('#cash_amt_invested_astrik').hide();

$('#cash_current_value_astrik').hide();

$('#add_emergency').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
  var cash_bank_name = $('#cash_bank_name').val();
   var cashinhand_date = $('#cashinhand_date').val();
   var cash_amt_invested = $('#cash_amt_invested').val();
    var cash_current_value = $('#cash_current_value').val();
   var cash_interest_rate = $('#cash_interest_rate').val();
   var cash_interest_type = $('#cash_interest_type').val();
   var cash_interest_payment = $('#cash_interest_payment').val();
   
  if(cashinhand_date==""){
      $('#cashinhand_date').css('border', '1px solid red');
      $('#cashinhand_date_astrik').show();
      return false;
    }else{
     $('#cashinhand_date').css('border', '');
      $('#cashinhand_date_astrik').hide();
    }
     if(cash_amt_invested==""){
      $('#cash_amt_invested').css('border', '1px solid red');
      $('#cash_amt_invested_astrik').show();
      return false;
    }else{
     $('#cash_amt_invested').css('border', '');
      $('#cash_amt_invested_astrik').hide();
    }
     if(cash_current_value==""){
      $('#cash_current_value').css('border', '1px solid red');
      $('#cash_current_value_astrik').show();
      return false;
    }else{
     $('#cash_current_value').css('border', '');
      $('#cash_current_value_astrik').hide();
    }

    if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }


    if(valu == "Cash in post office saving A/c" || valu == "Cash in Hand")
   {  
     var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,

      cashinhand_date : $('#cashinhand_date').val(),
      cash_amt_invested : $('#cash_amt_invested').val(),
      cash_current_value : $('#cash_current_value').val(),
      cash_interest_rate : $('#cash_interest_rate').val(),
      cash_interest_type : $('#cash_interest_type').val(),
      cash_interest_payment : $('#cash_interest_payment').val()
    };
  }else if(valu == "Cash in Saving A/C" || valu == "Cash in wallet")
  {
      var cash_bank_name = $("#cash_bank_name").val();  
       if(cash_bank_name==""){
      $('#cash_bank_name').css('border', '1px solid red');
      $('#cash_bank_name_astrik').show();
      return false;
    }else{
     $('#cash_bank_name').css('border', '');
      $('#cash_bank_name_astrik').hide();
    }
       var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,

      bank_name : $('#cash_bank_name').val(),
      cashinhand_date : $('#cashinhand_date').val(),
      cash_amt_invested : $('#cash_amt_invested').val(),
      cash_current_value : $('#cash_current_value').val(),
      cash_interest_rate : $('#cash_interest_rate').val(),
      cash_interest_type : $('#cash_interest_type').val(),
      cash_interest_payment : $('#cash_interest_payment').val()
    };
  }

   if(valu != "")
   {

    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_all_emergencydata",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#emergency_alert-msg').html('<div class="alert alert-success text-center">Your data has been added successfully!</div>');    $("#addEmergencyfund").modal('hide'); location.reload(true);
              }
            else if (msg == 'NO'){
                $('#emergency_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#emergency_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});

//Emergency sub-assets stock code end here..... 


//Insurance sub asstes code start here....
$('#emergencyclose, #emergencycancle').click(function() { 

$('#cash_bank_name').val("");
 $('#cashinhand_date').val("");
 $('#cash_amt_invested').val("");
  $('#cash_current_value').val("");
    $('#cash_interest_rate').val("");
  $('#cash_interest_type').val(""); 
 $('#cash_interest_payment').val("");
});

$('#insurance_company_name_astrik').hide();
$('#insurance_policy_name_astrik').hide();

$('#insurance_policy_no_astrik').hide();

$('#insurance_value_astrik').hide();
$('#insurance_policy_start_date_astrik').hide();
$('#insurance_maturity_date_astrik').hide();
$('#insurance_premium_date_astrik').hide();
$('#insurance_premium_amt_astrik').hide();
$('#insurance_frequency_astrik').hide();
$('#insurance_nextpremium_date_astrik').hide();
$('#insurance_premium_tenure_astrik').hide();
 $('#healthhidecolumn').hide();
  $('#insurance_sum_assured_astrik').hide();
   $('#insurance_no_claim_astrik').hide();

 $('#travelandTermplanhidecolumn').hide();
  $('#travel_sum_assured_astrik').hide();

$('#add_insurance').click(function()
 {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
  var insurance_company_name = $('#insurance_company_name').val();
   var insurance_policy_name = $('#insurance_policy_name').val();

// health form two hide field columns....
    var insurance_sum_assured = $('#insurance_sum_assured').val();
    var insurance_no_claim = $('#insurance_no_claim').val();

    // travel form two hide field columns....
    var travel_sum_assured = $('#travel_sum_assured').val();

   var insurance_policy_no = $('#insurance_policy_no').val();
    var insurance_value = $('#insurance_value').val();
   var insurance_policy_start_date = $('#insurance_policy_start_date').val();
   var insurance_maturity_date = $('#insurance_maturity_date').val();

   var insurance_maturity_benifits = $('#insurance_maturity_benifits').val();
    var insurance_lockin_period = $('#insurance_lockin_period').val();

     var insurance_premium_date = $('#insurance_premium_date').val();
     var insurance_premium_amt = $('#insurance_premium_amt').val();
     var insurance_frequency = $('#insurance_frequency').val();
     var insurance_nextpremium_date = $('#insurance_nextpremium_date').val();
     var insurance_premium_tenure = $('#insurance_premium_tenure').val();

   
  if(insurance_company_name==""){
      $('#insurance_company_name').css('border', '1px solid red');
      $('#insurance_company_name_astrik').show();
      return false;
    }else{
     $('#insurance_company_name').css('border', '');
      $('#insurance_company_name_astrik').hide();
    }
     if(insurance_policy_name==""){
      $('#insurance_policy_name').css('border', '1px solid red');
      $('#insurance_policy_name_astrik').show();
      return false;
    }else{
     $('#insurance_policy_name').css('border', '');
      $('#insurance_policy_name_astrik').hide();
    }
     if(insurance_policy_no==""){
      $('#insurance_policy_no').css('border', '1px solid red');
      $('#insurance_policy_no_astrik').show();
      return false;
    }else{
     $('#insurance_policy_no').css('border', '');
      $('#insurance_policy_no_astrik').hide();
    }
    if(insurance_value==""){
      $('#insurance_value').css('border', '1px solid red');
      $('#insurance_value_astrik').show();
      return false;
    }else{
     $('#insurance_value').css('border', '');
      $('#insurance_value_astrik').hide();
    }
    if(insurance_policy_start_date==""){
      $('#insurance_policy_start_date').css('border', '1px solid red');
      $('#insurance_policy_start_date_astrik').show();
      return false;
    }else{
     $('#insurance_policy_start_date').css('border', '');
      $('#insurance_policy_start_date_astrik').hide();
    }
      if(insurance_maturity_date==""){
      $('#insurance_maturity_date').css('border', '1px solid red');
      $('#insurance_maturity_date_astrik').show();
      return false;
    }else{
     $('#insurance_maturity_date').css('border', '');
      $('#insurance_maturity_date_astrik').hide();
    }
    if(insurance_premium_date==""){
      $('#insurance_premium_date').css('border', '1px solid red');
      $('#insurance_premium_date_astrik').show();
      return false;
    }else{
     $('#insurance_premium_date').css('border', '');
      $('#insurance_premium_date_astrik').hide();
    }
     if(insurance_premium_amt==""){
      $('#insurance_premium_amt').css('border', '1px solid red');
      $('#insurance_premium_amt_astrik').show();
      return false;
    }else{
     $('#insurance_premium_amt').css('border', '');
      $('#insurance_premium_amt_astrik').hide();
    }
     if(insurance_frequency==""){
      $('#insurance_frequency').css('border', '1px solid red');
      $('#insurance_frequency_astrik').show();
      return false;
    }else{
     $('#insurance_frequency').css('border', '');
      $('#insurance_frequency_astrik').hide();
    }
       if(insurance_nextpremium_date==""){
      $('#insurance_nextpremium_date').css('border', '1px solid red');
      $('#insurance_nextpremium_date_astrik').show();
      return false;
    }else{
     $('#insurance_nextpremium_date').css('border', '');
      $('#insurance_nextpremium_date_astrik').hide();
    }
       if(insurance_premium_tenure==""){
      $('#insurance_premium_tenure').css('border', '1px solid red');
      $('#insurance_premium_tenure_astrik').show();
      return false;
    }else{
     $('#insurance_premium_tenure').css('border', '');
      $('#insurance_premium_tenure_astrik').hide();
    }


   if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }


   if(valu == "Bike Insurance" || valu == "Car Insurance" || valu == "Home Insurance")
   { 
     var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,

      insurance_company_name : $('#insurance_company_name').val(),
   insurance_policy_name : $('#insurance_policy_name').val(),
   insurance_policy_no : $('#insurance_policy_no').val(),
   insurance_value : $('#insurance_value').val(),
   insurance_policy_start_date : $('#insurance_policy_start_date').val(),
   insurance_maturity_date : $('#insurance_maturity_date').val(),

   insurance_maturity_benifits : $('#insurance_maturity_benifits').val(),
    insurance_lockin_period : $('#insurance_lockin_period').val(),

     insurance_premium_date : $('#insurance_premium_date').val(),
     insurance_premium_amt : $('#insurance_premium_amt').val(),
     insurance_frequency : $('#insurance_frequency').val(),
     insurance_nextpremium_date : $('#insurance_nextpremium_date').val(),
     insurance_premium_tenure : $('#insurance_premium_tenure').val()
    };

  }
  else if(valu == "Health Insurance")
  {

      if(insurance_sum_assured==""){
      $('#insurance_sum_assured').css('border', '1px solid red');
      $('#insurance_sum_assured_astrik').show();
      return false;
    }else{
     $('#insurance_sum_assured').css('border', '');
      $('#insurance_sum_assured_astrik').hide();
    }
      if(insurance_no_claim==""){
      $('#insurance_no_claim').css('border', '1px solid red');
      $('#insurance_no_claim_astrik').show();
      return false;
    }else{
     $('#insurance_no_claim').css('border', '');
      $('#insurance_no_claim_astrik').hide();
    }
  
   var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,

    insurance_company_name : $('#insurance_company_name').val(),
   insurance_policy_name : $('#insurance_policy_name').val(),

   insurance_sum_assured : $('#insurance_sum_assured').val(),
   insurance_no_claim : $('#insurance_no_claim').val(),

   insurance_policy_no : $('#insurance_policy_no').val(),
   insurance_value : $('#insurance_value').val(),
   insurance_policy_start_date : $('#insurance_policy_start_date').val(),
   insurance_maturity_date : $('#insurance_maturity_date').val(),

   insurance_maturity_benifits : $('#insurance_maturity_benifits').val(),
    insurance_lockin_period : $('#insurance_lockin_period').val(),

     insurance_premium_date : $('#insurance_premium_date').val(),
     insurance_premium_amt : $('#insurance_premium_amt').val(),
     insurance_frequency : $('#insurance_frequency').val(),
     insurance_nextpremium_date : $('#insurance_nextpremium_date').val(),
     insurance_premium_tenure : $('#insurance_premium_tenure').val()
    };
  }
    else if(valu == "Travel Insurance" || valu == "Term Plan")
  {

      if(travel_sum_assured==""){
      $('#travel_sum_assured').css('border', '1px solid red');
      $('#travel_sum_assured_astrik').show();
      return false;
    }else{
     $('#travel_sum_assured').css('border', '');
      $('#travel_sum_assured_astrik').hide();
    }
       var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,

    insurance_company_name : $('#insurance_company_name').val(),
   insurance_policy_name : $('#insurance_policy_name').val(),

   insurance_sum_assured : $('#travel_sum_assured').val(),

   insurance_policy_no : $('#insurance_policy_no').val(),
   insurance_value : $('#insurance_value').val(),
   insurance_policy_start_date : $('#insurance_policy_start_date').val(),
   insurance_maturity_date : $('#insurance_maturity_date').val(),

   insurance_maturity_benifits : $('#insurance_maturity_benifits').val(),
    insurance_lockin_period : $('#insurance_lockin_period').val(),

     insurance_premium_date : $('#insurance_premium_date').val(),
     insurance_premium_amt : $('#insurance_premium_amt').val(),
     insurance_frequency : $('#insurance_frequency').val(),
     insurance_nextpremium_date : $('#insurance_nextpremium_date').val(),
     insurance_premium_tenure : $('#insurance_premium_tenure').val()
    };
  }



   if(valu != "")
   {

    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_all_Insurancedata",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#insurance_alert-msg').html('<div class="alert alert-success text-center">Your data has been added successfully!</div>');    $("#addBikeCarHomeInsurance").modal('hide'); location.reload(true);
              }
            else if (msg == 'NO'){
                $('#insurance_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#insurance_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}

});

// Insurance endowment and money back code strat here ....
$('#life_company_name_astrik').hide();
$('#life_policy_name_astrik').hide();

$('#life_policy_no_astrik').hide();

$('#life_value_astrik').hide();
$('#life_policy_start_date_astrik').hide();
$('#life_maturity_date_astrik').hide();
$('#life_premium_date_astrik').hide();
$('#life_premium_amt_astrik').hide();
$('#life_frequency_astrik').hide();

$('#life_nextpremium_date_astrik').hide();
$('#life_premium_tenure_astrik').hide();

  $('#life_sum_assured_astrik').hide();
   $('#life_no_claim_astrik').hide();

  $('#life_sum_assured_astrik').hide();
   $('#life_bonus_accumulated_astrik').hide();
    $('#life_vasted_bonus_astrik').hide();

  $('#hidemoneyback').hide();
    $('#life_moneyback_amt_astrik').hide();
      $('#life_moneyback_date_astrik').hide();

   $('#hideULIP').hide();
      $('#insurance_topup_astrik').hide();
      $('#insurance_totalpremium_astrik').hide();

$('#AddIsuranceEndoMoney').click(function()
 {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
  var life_company_name = $('#life_company_name').val();
   var life_policy_name = $('#life_policy_name').val();

    var life_sum_assured = $('#life_sum_assured').val();


   var life_policy_no = $('#life_policy_no').val();
  
   var life_policy_start_date = $('#life_policy_start_date').val();
   var life_maturity_date = $('#life_maturity_date').val();

   var life_maturity_benifits = $('#life_maturity_benifits').val();
    var life_lockin_period = $('#life_lockin_period').val();

     var life_premium_date = $('#life_premium_date').val();
     var life_premium_amt = $('#life_premium_amt').val();
     var life_frequency = $('#life_frequency').val();
     var life_nextpremium_date = $('#life_nextpremium_date').val();
     var life_premium_tenure = $('#life_premium_tenure').val();

      var life_bonus_accumulated = $('#life_bonus_accumulated').val();
       var life_vasted_bonus = $('#life_vasted_bonus').val();

       var life_moneyback_amt = $('#life_moneyback_amt').val();
     var life_moneyback_date = $('#life_moneyback_date').val();


  if(life_company_name==""){
      $('#life_company_name').css('border', '1px solid red');
      $('#life_company_name_astrik').show();
      return false;
    }else{
     $('#life_company_name').css('border', '');
      $('#life_company_name_astrik').hide();
    }
     if(life_policy_name==""){
      $('#life_policy_name').css('border', '1px solid red');
      $('#life_policy_name_astrik').show();
      return false;
    }else{
     $('#life_policy_name').css('border', '');
      $('#life_policy_name_astrik').hide();
    }
         if(life_policy_no==""){
      $('#life_policy_no').css('border', '1px solid red');
      $('#life_policy_no_astrik').show();
      return false;
    }else{
     $('#life_policy_no').css('border', '');
      $('#life_policy_no_astrik').hide();
    }
      if(life_sum_assured==""){
      $('#life_sum_assured').css('border', '1px solid red');
      $('#life_sum_assured_astrik').show();
      return false;
    }else{
     $('#life_sum_assured').css('border', '');
      $('#life_sum_assured_astrik').hide();
    }

  
    if(life_policy_start_date==""){
      $('#life_policy_start_date').css('border', '1px solid red');
      $('#life_policy_start_date_astrik').show();
      return false;
    }else{
     $('#life_policy_start_date').css('border', '');
      $('#life_policy_start_date_astrik').hide();
    }
      if(life_maturity_date==""){
      $('#life_maturity_date').css('border', '1px solid red');
      $('#life_maturity_date_astrik').show();
      return false;
    }else{
     $('#life_maturity_date').css('border', '');
      $('#life_maturity_date_astrik').hide();
    }
    if(life_premium_date==""){
      $('#life_premium_date').css('border', '1px solid red');
      $('#life_premium_date_astrik').show();
      return false;
    }else{
     $('#life_premium_date').css('border', '');
      $('#life_premium_date_astrik').hide();
    }
     if(life_premium_amt==""){
      $('#life_premium_amt').css('border', '1px solid red');
      $('#life_premium_amt_astrik').show();
      return false;
    }else{
     $('#life_premium_amt').css('border', '');
      $('#life_premium_amt_astrik').hide();
    }
     if(life_frequency==""){
      $('#life_frequency').css('border', '1px solid red');
      $('#life_frequency_astrik').show();
      return false;
    }else{
     $('#life_frequency').css('border', '');
      $('#life_frequency_astrik').hide();
    }
       if(life_nextpremium_date==""){
      $('#life_nextpremium_date').css('border', '1px solid red');
      $('#life_nextpremium_date_astrik').show();
      return false;
    }else{
     $('#life_nextpremium_date').css('border', '');
      $('#life_nextpremium_date_astrik').hide();
    }
       if(life_premium_tenure==""){
      $('#life_premium_tenure').css('border', '1px solid red');
      $('#life_premium_tenure_astrik').show();
      return false;
    }else{
     $('#life_premium_tenure').css('border', '');
      $('#life_premium_tenure_astrik').hide();
    }

     if(life_bonus_accumulated==""){
      $('#life_bonus_accumulated').css('border', '1px solid red');
      $('#life_bonus_accumulated_astrik').show();
      return false;
    }else{
     $('#life_bonus_accumulated').css('border', '');
      $('#life_bonus_accumulated_astrik').hide();
    }
    if(life_vasted_bonus==""){
      $('#life_vasted_bonus').css('border', '1px solid red');
      $('#life_vasted_bonus_astrik').show();
      return false;
    }else{
     $('#life_vasted_bonus').css('border', '');
      $('#life_vasted_bonus_astrik').hide();
    }


   if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

 if(valu == "Life Insurance (Endowment)")
  {
      var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,

    insurance_company_name : $('#life_company_name').val(),
   insurance_policy_name : $('#life_policy_name').val(),

   insurance_sum_assured : $('#life_sum_assured').val(),

   insurance_policy_no : $('#life_policy_no').val(),

   insurance_policy_start_date : $('#life_policy_start_date').val(),
   insurance_maturity_date : $('#life_maturity_date').val(),

   insurance_maturity_benifits : $('#life_maturity_benifits').val(),
    insurance_lockin_period : $('#life_lockin_period').val(),

     insurance_premium_date : $('#life_premium_date').val(),
     insurance_premium_amt : $('#life_premium_amt').val(),
     insurance_frequency : $('#life_frequency').val(),
     insurance_nextpremium_date : $('#life_nextpremium_date').val(),
     insurance_premium_tenure : $('#life_premium_tenure').val(),
     insurance_bonus_accumulated : $('#life_bonus_accumulated').val(),
     insurance_vasted_bonus : $('#life_vasted_bonus').val()
    };

  }
   else
  {
    if(life_moneyback_amt==""){
      $('#life_moneyback_amt').css('border', '1px solid red');
      $('#life_moneyback_amt_astrik').show();
      return false;
    }else{
     $('#life_moneyback_amt').css('border', '');
      $('#life_moneyback_amt_astrik').hide();
    }
        if(life_moneyback_date==""){
      $('#life_moneyback_date').css('border', '1px solid red');
      $('#life_moneyback_date_astrik').show();
      return false;
    }else{
     $('#life_moneyback_date').css('border', '');
      $('#life_moneyback_date_astrik').hide();
    }

    var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,

    insurance_company_name : $('#life_company_name').val(),
   insurance_policy_name : $('#life_policy_name').val(),

   insurance_sum_assured : $('#life_sum_assured').val(),

   insurance_policy_no : $('#life_policy_no').val(),

   insurance_policy_start_date : $('#life_policy_start_date').val(),
   insurance_maturity_date : $('#life_maturity_date').val(),

   insurance_maturity_benifits : $('#life_maturity_benifits').val(),
    insurance_lockin_period : $('#life_lockin_period').val(),

     insurance_premium_date : $('#life_premium_date').val(),
     insurance_premium_amt : $('#life_premium_amt').val(),
     insurance_frequency : $('#life_frequency').val(),
     insurance_nextpremium_date : $('#life_nextpremium_date').val(),
     insurance_premium_tenure : $('#life_premium_tenure').val(),
     insurance_bonus_accumulated : $('#life_bonus_accumulated').val(),
     insurance_vasted_bonus : $('#life_vasted_bonus').val(),
      insurance_moneyback_amt : $('#life_moneyback_amt').val(),
       insurance_moneyback_date : $('#life_moneyback_date').val()
    };

  }

   if(valu != "")
   {

    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_all_Insurancedata",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#insuranceEndoMoney_alert-msg').html('<div class="alert alert-success text-center">Your data has been added successfully!</div>');    $("#addLifeInsuranceEndowment").modal('hide'); location.reload(true);
              }
            else if (msg == 'NO'){
                $('#insuranceEndoMoney_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#insuranceEndoMoney_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}

});


//Insurance Travel sub asstes code starts here..
$('#travel_company_name_astrik').hide();
$('#travel_policy_name_astrik').hide();

$('#travel_policy_no_astrik').hide();
  $('#trvlsum_assured_astrik').hide();
$('#travel_value_astrik').hide();
$('#travel_policy_start_date_astrik').hide();
$('#travel_maturity_date_astrik').hide();
$('#travel_premium_date_astrik').hide();
$('#travel_premium_amt_astrik').hide();
$('#travel_frequency_astrik').hide();
$('#travel_nextpremium_date_astrik').hide();
$('#travel_premium_tenure_astrik').hide();


$('#Addtrvlinsurance').click(function()
 {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
  var travel_company_name = $('#travel_company_name').val();
   var travel_policy_name = $('#travel_policy_name').val();

    var travel_sum_assured = $('#trvlsum_assured').val();

   var travel_policy_no = $('#travel_policy_no').val();
 
   var travel_policy_start_date = $('#travel_policy_start_date').val();
   var travel_maturity_date = $('#travel_maturity_date').val();

   var travel_maturity_benifits = $('#travel_maturity_benifits').val();
    var travel_lockin_period = $('#travel_lockin_period').val();

     var travel_premium_date = $('#travel_premium_date').val();
     var travel_premium_amt = $('#travel_premium_amt').val();
     var travel_frequency = $('#travel_frequency').val();
     var travel_nextpremium_date = $('#travel_nextpremium_date').val();
     var travel_premium_tenure = $('#travel_premium_tenure').val();

   
  if(travel_company_name==""){
      $('#travel_company_name').css('border', '1px solid red');
      $('#travel_company_name_astrik').show();
      return false;
    }else{
     $('#travel_company_name').css('border', '');
      $('#travel_company_name_astrik').hide();
    }
     if(travel_policy_name==""){
      $('#travel_policy_name').css('border', '1px solid red');
      $('#travel_policy_name_astrik').show();
      return false;
    }else{
     $('#travel_policy_name').css('border', '');
      $('#travel_policy_name_astrik').hide();
    }
     if(travel_policy_no==""){
      $('#travel_policy_no').css('border', '1px solid red');
      $('#travel_policy_no_astrik').show();
      return false;
    }else{
     $('#travel_policy_no').css('border', '');
      $('#travel_policy_no_astrik').hide();
    }
    if(travel_sum_assured==""){
      $('#trvlsum_assured').css('border', '1px solid red');
      $('#trvlsum_assured_astrik').show();
      return false;
    }else{
     $('#trvlsum_assured').css('border', '');
      $('#trvlsum_assured_astrik').hide();
    }

    if(travel_policy_start_date==""){
      $('#travel_policy_start_date').css('border', '1px solid red');
      $('#travel_policy_start_date_astrik').show();
      return false;
    }else{
     $('#travel_policy_start_date').css('border', '');
      $('#travel_policy_start_date_astrik').hide();
    }
      if(travel_maturity_date==""){
      $('#travel_maturity_date').css('border', '1px solid red');
      $('#travel_maturity_date_astrik').show();
      return false;
    }else{
     $('#travel_maturity_date').css('border', '');
      $('#travel_maturity_date_astrik').hide();
    }
    if(travel_premium_date==""){
      $('#travel_premium_date').css('border', '1px solid red');
      $('#travel_premium_date_astrik').show();
      return false;
    }else{
     $('#travel_premium_date').css('border', '');
      $('#travel_premium_date_astrik').hide();
    }
     if(travel_premium_amt==""){
      $('#travel_premium_amt').css('border', '1px solid red');
      $('#travel_premium_amt_astrik').show();
      return false;
    }else{
     $('#travel_premium_amt').css('border', '');
      $('#travel_premium_amt_astrik').hide();
    }
     if(travel_frequency==""){
      $('#travel_frequency').css('border', '1px solid red');
      $('#travel_frequency_astrik').show();
      return false;
    }else{
     $('#travel_frequency').css('border', '');
      $('#travel_frequency_astrik').hide();
    }
       if(travel_nextpremium_date==""){
      $('#travel_nextpremium_date').css('border', '1px solid red');
      $('#travel_nextpremium_date_astrik').show();
      return false;
    }else{
     $('#travel_nextpremium_date').css('border', '');
      $('#travel_nextpremium_date_astrik').hide();
    }
       if(travel_premium_tenure==""){
      $('#travel_premium_tenure').css('border', '1px solid red');
      $('#travel_premium_tenure_astrik').show();
      return false;
    }else{
     $('#travel_premium_tenure').css('border', '');
      $('#travel_premium_tenure_astrik').hide();
    }


   if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }



       var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,

    insurance_company_name : $('#travel_company_name').val(),
   insurance_policy_name : $('#travel_policy_name').val(),

   insurance_sum_assured : $('#trvlsum_assured').val(),

   insurance_policy_no : $('#travel_policy_no').val(),

   insurance_policy_start_date : $('#travel_policy_start_date').val(),
   insurance_maturity_date : $('#travel_maturity_date').val(),

   insurance_maturity_benifits : $('#travel_maturity_benifits').val(),
    insurance_lockin_period : $('#travel_lockin_period').val(),

     insurance_premium_date : $('#travel_premium_date').val(),
     insurance_premium_amt : $('#travel_premium_amt').val(),
     insurance_frequency : $('#travel_frequency').val(),
     insurance_nextpremium_date : $('#travel_nextpremium_date').val(),
     insurance_premium_tenure : $('#travel_premium_tenure').val()
    };
  



   if(valu != "")
   {

    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_all_Insurancedata",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#Travel_alert-msg').html('<div class="alert alert-success text-center">Your data has been added successfully!</div>');    $("#Addtravelinsurancedata").modal('hide'); location.reload(true);
              }
            else if (msg == 'NO'){
                $('#Travel_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#Travel_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}

});

//Insurance ULIP sub asstes code ...

$('#ulip_company_name_astrik').hide();
$('#ulip_policy_name_astrik').hide();

$('#ulip_policy_no_astrik').hide();

$('#ulip_value_astrik').hide();
$('#ulip_policy_start_date_astrik').hide();
$('#ulip_maturity_date_astrik').hide();
$('#ulip_premium_date_astrik').hide();
$('#ulip_premium_amt_astrik').hide();
$('#ulip_frequency_astrik').hide();

$('#ulip_nextpremium_date_astrik').hide();
$('#ulip_premium_tenure_astrik').hide();

  $('#ulip_sum_assured_astrik').hide();
   $('#ulip_no_claim_astrik').hide();

 $('#ulip_topup_astrik').hide();
$('#ulip_totalpremium_astrik').hide();

$('#addulipdata').click(function()
 {

     var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
  var ulip_company_name = $('#ulip_company_name').val();
   var ulip_policy_name = $('#ulip_policy_name').val();

    var ulip_sum_assured = $('#ulip_sum_assured').val();

   var ulip_policy_no = $('#ulip_policy_no').val();
  
   var ulip_policy_start_date = $('#ulip_policy_start_date').val();
   var ulip_maturity_date = $('#ulip_maturity_date').val();

   var ulip_maturity_benifits = $('#ulip_maturity_benifits').val();
    var ulip_lockin_period = $('#ulip_lockin_period').val();

     var ulip_premium_date = $('#ulip_premium_date').val();
     var ulip_premium_amt = $('#ulip_premium_amt').val();
     var ulip_frequency = $('#ulip_frequency').val();
     var ulip_nextpremium_date = $('#ulip_nextpremium_date').val();
     var ulip_premium_tenure = $('#ulip_premium_tenure').val();

     var ulip_topup = $('#ulip_topup').val();
     var ulip_totalpremium = $('#ulip_totalpremium').val();

        if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     if(ulip_company_name==""){
      $('#ulip_company_name').css('border', '1px solid red');
      $('#ulip_company_name_astrik').show();
      return false;
    }else{
     $('#ulip_company_name').css('border', '');
      $('#ulip_company_name_astrik').hide();
    }
     if(ulip_policy_name==""){
      $('#ulip_policy_name').css('border', '1px solid red');
      $('#ulip_policy_name_astrik').show();
      return false;
    }else{
     $('#ulip_policy_name').css('border', '');
      $('#ulip_policy_name_astrik').hide();
    }
         if(ulip_policy_no==""){
      $('#ulip_policy_no').css('border', '1px solid red');
      $('#ulip_policy_no_astrik').show();
      return false;
    }else{
     $('#ulip_policy_no').css('border', '');
      $('#ulip_policy_no_astrik').hide();
    }
      if(ulip_sum_assured==""){
      $('#ulip_sum_assured').css('border', '1px solid red');
      $('#ulip_sum_assured_astrik').show();
      return false;
    }else{
     $('#ulip_sum_assured').css('border', '');
      $('#ulip_sum_assured_astrik').hide();
    }

  
    if(ulip_policy_start_date==""){
      $('#ulip_policy_start_date').css('border', '1px solid red');
      $('#ulip_policy_start_date_astrik').show();
      return false;
    }else{
     $('#ulip_policy_start_date').css('border', '');
      $('#ulip_policy_start_date_astrik').hide();
    }
      if(ulip_maturity_date==""){
      $('#ulip_maturity_date').css('border', '1px solid red');
      $('#ulip_maturity_date_astrik').show();
      return false;
    }else{
     $('#ulip_maturity_date').css('border', '');
      $('#ulip_maturity_date_astrik').hide();
    }
    if(ulip_premium_date==""){
      $('#ulip_premium_date').css('border', '1px solid red');
      $('#ulip_premium_date_astrik').show();
      return false;
    }else{
     $('#ulip_premium_date').css('border', '');
      $('#ulip_premium_date_astrik').hide();
    }
     if(ulip_premium_amt==""){
      $('#ulip_premium_amt').css('border', '1px solid red');
      $('#ulip_premium_amt_astrik').show();
      return false;
    }else{
     $('#ulip_premium_amt').css('border', '');
      $('#ulip_premium_amt_astrik').hide();
    }
     if(ulip_frequency==""){
      $('#ulip_frequency').css('border', '1px solid red');
      $('#ulip_frequency_astrik').show();
      return false;
    }else{
     $('#ulip_frequency').css('border', '');
      $('#ulip_frequency_astrik').hide();
    }
       if(ulip_nextpremium_date==""){
      $('#ulip_nextpremium_date').css('border', '1px solid red');
      $('#ulip_nextpremium_date_astrik').show();
      return false;
    }else{
     $('#ulip_nextpremium_date').css('border', '');
      $('#ulip__nextpremium_date_astrik').hide();
    }
       if(ulip_premium_tenure==""){
      $('#ulip_premium_tenure').css('border', '1px solid red');
      $('#ulip_premium_tenure_astrik').show();
      return false;
    }else{
     $('#ulip_premium_tenure').css('border', '');
      $('#ulip_premium_tenure_astrik').hide();
    }

     if(ulip_topup==""){
      $('#ulip_topup').css('border', '1px solid red');
      $('#ulip_topup_astrik').show();
      return false;
    }else{
     $('#ulip_topup').css('border', '');
      $('#ulip_topup_astrik').hide();
    }
    if(ulip_totalpremium==""){
      $('#ulip_totalpremium').css('border', '1px solid red');
      $('#ulip_totalpremium_astrik').show();
      return false;
    }else{
     $('#ulip_totalpremium').css('border', '');
      $('#ulip_totalpremium_astrik').hide();
    }


  var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,

      insurance_company_name : $('#ulip_company_name').val(),
     insurance_policy_name : $('#ulip_policy_name').val(),

     insurance_sum_assured : $('#ulip_sum_assured').val(),

     insurance_policy_no : $('#ulip_policy_no').val(),

     insurance_policy_start_date : $('#ulip_policy_start_date').val(),
     insurance_maturity_date : $('#ulip_maturity_date').val(),

     insurance_maturity_benifits : $('#ulip_maturity_benifits').val(),
      insurance_lockin_period : $('#ulip_lockin_period').val(),

      insurance_premium_date : $('#ulip_premium_date').val(),
       insurance_premium_amt : $('#ulip_premium_amt').val(),
       insurance_frequency : $('#ulip_frequency').val(),
       insurance_nextpremium_date : $('#ulip_nextpremium_date').val(),
       insurance_premium_tenure : $('#ulip_premium_tenure').val(),
        insurance_topup : $('#ulip_topup').val(),
        insurance_totalpremium : $('#ulip_totalpremium').val()
    };

  

   if(valu != "")
   {

    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_all_Insurancedata",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#insuranceEndoMoney_alert-msg').html('<div class="alert alert-success text-center">Your data has been added successfully!</div>');    $("#addULIPInsurance").modal('hide'); location.reload(true);
              }
            else if (msg == 'NO'){
                $('#insuranceEndoMoney_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#insuranceEndoMoney_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}

 });

//Insurance sub-assets code end here..... 




//Investment sub-assets stock code start here..... 

//EPF codes starts heree .....
$("#epf_contribution_date").change(function () {
 var epf_contribution_date = $('#epf_contribution_date').val();
 
   if(epf_contribution_date != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/fetch_epf_interestrate",
        type: 'POST',
        data: {epf_contribution_date:epf_contribution_date},
        success: function(msg) {
                   $("#epf_interest_rate").val(msg);          
        }
    });
    return false;
  }
  else{alert("Error in server..!!");}

});
$("#epf_interest_rate").attr('disabled', true);   
$('#epf_transaction_type_astrik').hide();
$('#epf_account_no_astrik').hide();
$('#epf_start_date_astrik').hide();
$('#epf_maturity_date_astrik').hide();

$('#addepfdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
   var epf_transaction_type = $('#epf_transaction_type').val();
   var epf_account_no = $('#epf_account_no').val();
    var epf_start_date = $('#epf_start_date').val();
   var epf_maturity_date = $('#epf_maturity_date').val();
   var epf_lockin_date = $('#epf_lockin_date').val();
   var epf_interest_rate = $('#epf_interest_rate').val();
    var epf_contribution_date = $('#epf_contribution_date').val();
     var epf_employee_contribution = $('#epf_employee_contribution').val();
      var epf_employer_contribution = $('#epf_employer_contribution').val();
        var epf_total_contribution = $('#epf_total_contribution').val();
  
    if(epf_transaction_type==""){
      $('#epf_transaction_type').css('border', '1px solid red');
      $('#epf_transaction_type_astrik').show();
      return false;
    }else{
     $('#epf_transaction_type').css('border', '');
      $('#epf_transaction_type_astrik').hide();
    }
      if(epf_account_no==""){
      $('#epf_account_no').css('border', '1px solid red');
      $('#epf_account_no_astrik').show();
      return false;
    }else{
     $('#epf_account_no').css('border', '');
      $('#epf_account_no_astrik').hide();
    }
       if(epf_start_date==""){
      $('#epf_start_date').css('border', '1px solid red');
      $('#epf_start_date_astrik').show();
      return false;
    }else{
     $('#epf_start_date').css('border', '');
      $('#epf_start_date_astrik').hide();
    }
     if(epf_maturity_date==""){
      $('#epf_maturity_date').css('border', '1px solid red');
      $('#epf_maturity_date_astrik').show();
      return false;
    }else{
     $('#epf_maturity_date').css('border', '');
      $('#epf_maturity_date_astrik').hide();
    }

      if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
       epf_transaction_type : $('#epf_transaction_type').val(),
       epf_account_no : $('#epf_account_no').val(),
       epf_start_date : $('#epf_start_date').val(),
       epf_maturity_date : $('#epf_maturity_date').val(),
       epf_lockin_date : $('#epf_lockin_date').val(),
       epf_interest_rate : $('#epf_interest_rate').val(),
       epf_contribution_date : $('#epf_contribution_date').val(),
       epf_employee_contribution : $('#epf_employee_contribution').val(),
       epf_employer_contribution : $('#epf_employer_contribution').val(),
        epf_total_contribution : $('#epf_total_contribution').val()
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_epf",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#epf_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');    $('#epf_transaction_type').val("");
                       $('#epf_account_no').val("");
                       $('#epf_start_date').val("");
                        $('#epf_maturity_date').val("");
                        $('#epf_lockin_date').val("");
                         $('#epf_interest_rate').val(""); 
                          $('#epf_contribution_date').val("");
                         $('#epf_employee_contribution').val("");
                          $('#epf_employer_contribution').val(""); 
                          $('#epf_total_contribution').val("");
              }
            else if (msg == 'NO'){
                $('#epf_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#epf_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//epf code ends heree.....

//FD codes starts heres .....
   
$('#fd_type_astrik').hide();
$('#fd_account_no_astrik').hide();
$('#fd_transaction_type_astrik').hide();
$('#fd_interest_rate_astrik').hide();
$('#fd_maturity_date_astrik').hide();
$('#fd_start_date_astrik').hide();
$('#fd_amt_invested_astrik').hide();

$('#addfddata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
   var fd_type = $('#fd_type').val();
   var fd_account_no = $('#fd_account_no').val();
    var fd_transaction_type = $('#fd_transaction_type').val();
   var fd_interest_payout = $('#fd_interest_payout').val();
   var fd_interest_payment = $('#fd_interest_payment').val();
    var fd_interest_rate = $('#fd_interest_rate').val();
   var fd_interest_type = $('#fd_interest_type').val();
    var fd_maturity_amt = $('#fd_maturity_amt').val();   
      var fd_maturity_date = $('#fd_maturity_date').val();
        var fd_start_date = $('#fd_start_date').val();
      var fd_amt_invested = $('#fd_amt_invested').val();
  
  
    if(fd_type==""){
      $('#fd_type').css('border', '1px solid red');
      $('#fd_type_astrik').show();
      return false;
    }else{
     $('#fd_type').css('border', '');
      $('#fd_type_astrik').hide();
    }
      if(fd_account_no==""){
      $('#fd_account_no').css('border', '1px solid red');
      $('#fd_account_no_astrik').show();
      return false;
    }else{
     $('#fd_account_no').css('border', '');
      $('#fd_account_no_astrik').hide();
    }
       if(fd_transaction_type==""){
      $('#fd_transaction_type').css('border', '1px solid red');
      $('#fd_transaction_type_astrik').show();
      return false;
    }else{
     $('#fd_transaction_type').css('border', '');
      $('#fd_transaction_type_astrik').hide();
    }
     if(fd_interest_rate==""){
      $('#fd_interest_rate').css('border', '1px solid red');
      $('#fd_interest_rate_astrik').show();
      return false;
    }else{
     $('#fd_interest_rate').css('border', '');
      $('#fd_interest_rate_astrik').hide();
    }
         if(fd_maturity_date==""){
      $('#fd_maturity_date').css('border', '1px solid red');
      $('#fd_maturity_date_astrik').show();
      return false;
    }else{
     $('#fd_maturity_date').css('border', '');
      $('#fd_maturity_date_astrik').hide();
    }
        if(fd_start_date==""){
      $('#fd_start_date').css('border', '1px solid red');
      $('#fd_start_date_astrik').show();
      return false;
    }else{
     $('#fd_start_date').css('border', '');
      $('#fd_start_date_astrik').hide();
    }
     if(fd_amt_invested==""){
      $('#fd_amt_invested').css('border', '1px solid red');
      $('#fd_amt_invested_astrik').show();
      return false;
    }else{
     $('#fd_amt_invested').css('border', '');
      $('#fd_amt_invested_astrik').hide();
    }

      if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
       fd_type : $('#fd_type').val(),
       fd_account_no : $('#fd_account_no').val(),
       fd_transaction_type : $('#fd_transaction_type').val(),
       fd_interest_payout : $('#fd_interest_payout').val(),
       fd_interest_payment : $('#fd_interest_payment').val(),
       fd_interest_rate : $('#fd_interest_rate').val(),
       fd_interest_type : $('#fd_interest_type').val(),
       fd_maturity_amt : $('#fd_maturity_amt').val(),
       fd_maturity_date : $('#fd_maturity_date').val(),
       fd_start_date : $('#fd_start_date').val(),
       fd_amt_invested : $('#fd_amt_invested').val()
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_fd",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#fd_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');    $('#fd_type').val("");
                      $('#fd_account_no').val("");
                      $('#fd_transaction_type').val("");
                      $('#fd_interest_payout').val("");
                      $('#fd_interest_payment').val("");
                      $('#fd_interest_rate').val("");
                      $('#fd_interest_type').val("");
                      $('#fd_maturity_amt').val("");
                      $('#fd_maturity_date').val("");
                      $('#fd_start_date').val("");
                      $('#fd_amt_invested').val(""); 
              }
            else if (msg == 'NO'){
                $('#fd_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#fd_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//FD code ends heree.....



//KisanVikasPatra codes starts heres .....
   
$('#kisan_transaction_type_astrik').hide();
$('#kisan_account_no_astrik').hide();
$('#kisan_start_date_astrik').hide();
$('#kisan_muturity_date_astrik').hide();
$('#kisan_amt_invested_astrik').hide();
$('#kisan_maturity_amt_astrik').hide();
$('#kisan_interest_rate_astrik').hide();

$('#addkisanvikasdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
   var kisan_transaction_type = $('#kisan_transaction_type').val();
   var kisan_account_no = $('#kisan_account_no').val();
    var kisan_start_date = $('#kisan_start_date').val();
   var kisan_muturity_date = $('#kisan_muturity_date').val();
   var kisan_lockin_period = $('#kisan_lockin_period').val();
    var kisan_amt_invested = $('#kisan_amt_invested').val();
   var kisan_maturity_amt = $('#kisan_maturity_amt').val();
    var kisan_interest_rate = $('#kisan_interest_rate').val();   
     
  
  
    if(kisan_transaction_type==""){
      $('#kisan_transaction_type').css('border', '1px solid red');
      $('#kisan_transaction_type_astrik').show();
      return false;
    }else{
     $('#kisan_transaction_type').css('border', '');
      $('#kisan_transaction_type_astrik').hide();
    }
      if(kisan_account_no==""){
      $('#kisan_account_no').css('border', '1px solid red');
      $('#kisan_account_no_astrik').show();
      return false;
    }else{
     $('#kisan_account_no').css('border', '');
      $('#kisan_account_no_astrik').hide();
    }
       if(kisan_start_date==""){
      $('#kisan_start_date').css('border', '1px solid red');
      $('#kisan_start_date_astrik').show();
      return false;
    }else{
     $('#kisan_start_date').css('border', '');
      $('#kisan_start_date_astrik').hide();
    }
      if(kisan_muturity_date==""){
      $('#kisan_muturity_date').css('border', '1px solid red');
      $('#kisan_muturity_date_astrik').show();
      return false;
    }else{
     $('#kisan_muturity_date').css('border', '');
      $('#kisan_muturity_date_astrik').hide();
    }
       if(kisan_amt_invested==""){
      $('#kisan_amt_invested').css('border', '1px solid red');
      $('#kisan_amt_invested_astrik').show();
      return false;
    }else{
     $('#kisan_amt_invested').css('border', '');
      $('#kisan_amt_invested_astrik').hide();
    }
     if(kisan_maturity_amt==""){
      $('#kisan_maturity_amt').css('border', '1px solid red');
      $('#kisan_maturity_amt_astrik').show();
      return false;
    }else{
     $('#kisan_maturity_amt').css('border', '');
      $('#kisan_maturity_amt_astrik').hide();
    }
         if(kisan_interest_rate==""){
      $('#kisan_interest_rate').css('border', '1px solid red');
      $('#kisan_interest_rate_astrik').show();
      return false;
    }else{
     $('#kisan_interest_rate').css('border', '');
      $('#kisan_interest_rate_astrik').hide();
    }
 

      if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
       kisan_transaction_type : $('#kisan_transaction_type').val(),
       kisan_account_no : $('#kisan_account_no').val(),
       kisan_start_date : $('#kisan_start_date').val(),
       kisan_muturity_date : $('#kisan_muturity_date').val(),
       kisan_lockin_period : $('#kisan_lockin_period').val(),
       kisan_amt_invested : $('#kisan_amt_invested').val(),
       kisan_maturity_amt : $('#kisan_maturity_amt').val(),
       kisan_interest_rate : $('#kisan_interest_rate').val()
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_kisanvikaspatara",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#kisanvikas_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');   
                         $('#kisan_transaction_type').val("");
                         $('#kisan_account_no').val("");
                         $('#kisan_start_date').val("");
                         $('#kisan_muturity_date').val("");
                         $('#kisan_lockin_period').val("");
                         $('#kisan_amt_invested').val("");
                         $('#kisan_maturity_amt').val("");
                         $('#kisan_interest_rate').val("");  
              }
            else if (msg == 'NO'){
                $('#kisanvikas_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#kisanvikas_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//KisanVikasPatra code ends heree.....


//add mutual fund code start heress.....
 $('#mutual_company_name_astrik').hide();
$('#mutual_scheme_astrik').hide();
$('#mutual_folio_no_astrik').hide();
$('#mutual_transaction_astrik').hide();

$('#mutual_type_astrik').hide();
$('#mutual_sip_date_astrik').hide();
$('#mutual_date_astrik').hide();
$('#mutual_quantity_astrik').hide();

$('#mutual_amt_invested_astrik').hide();

$('#mutual_nav_astrik').hide();

$('#apply_mutual_fund').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
   var mutual_company_name = $('#mutual_company_name').val();
   var mutual_scheme = $('#mutual_scheme').val();
    var mutual_folio_no = $('#mutual_folio_no').val();
   var mutual_transaction = $('#mutual_transaction').val();
   var mutual_type = $('#mutual_type').val();
   var mutual_advisor = $('#mutual_advisor').val();
    var mutual_sip_date = $('#mutual_sip_date').val();
   var mutual_date = $('#mutual_date').val();
    var mutual_quantity = $('#mutual_quantity').val();
    var mutual_nav = $('#mutual_nav').val();
    var mutual_amt_invested = $('#mutual_amt_invested').val();
    var mutual_stamp_charge = $('#mutual_stamp_charge').val();
    var mutual_exit_load = $('#mutual_exit_load').val();
  

   
    if(mutual_company_name==""){
      $('#mutual_company_name').css('border', '1px solid red');
      $('#mutual_company_name_astrik').show();
      return false;
    }else{
     $('#mutual_company_name').css('border', '');
      $('#mutual_company_name_astrik').hide();
    }
      if(mutual_scheme==""){
      $('#mutual_scheme').css('border', '1px solid red');
      $('#mutual_scheme_astrik').show();
      return false;
    }else{
     $('#mutual_scheme').css('border', '');
      $('#mutual_scheme_astrik').hide();
    }
       if(mutual_folio_no==""){
      $('#mutual_folio_no').css('border', '1px solid red');
      $('#mutual_folio_no_astrik').show();
      return false;
    }else{
     $('#mutual_folio_no').css('border', '');
      $('#mutual_folio_no_astrik').hide();
    }
      if(mutual_transaction==""){
      $('#mutual_transaction').css('border', '1px solid red');
      $('#mutual_transaction_astrik').show();
      return false;
    }
    else{
     $('#mutual_transaction').css('border', '');
      $('#mutual_transaction_astrik').hide();
    }
    
   
       if(mutual_type==""){
      $('#mutual_type').css('border', '1px solid red');
      $('#mutual_type_astrik').show();
      return false;
    }else{
     $('#mutual_type').css('border', '');
      $('#mutual_type_astrik').hide();
    }
       if(mutual_date==""){
      $('#mutual_date').css('border', '1px solid red');
      $('#mutual_date_astrik').show();
      return false;
    }else{
     $('#mutual_date').css('border', '');
      $('#mutual_date_astrik').hide();
    }
       if(mutual_quantity==""){
      $('#mutual_quantity').css('border', '1px solid red');
      $('#mutual_quantity_astrik').show();
      return false;
    }else{
     $('#mutual_quantity').css('border', '');
      $('#mutual_quantity_astrik').hide();
    }
   
       if(mutual_nav==""){
      $('#mutual_nav').css('border', '1px solid red');
      $('#mutual_nav_astrik').show();
      return false;
    }else{
     $('#mutual_nav').css('border', '');
      $('#mutual_nav_astrik').hide();
    }
    
      if(mutual_amt_invested==""){
      $('#mutual_amt_invested').css('border', '1px solid red');
      $('#mutual_amt_invested_astrik').show();
      return false;
    }else{
     $('#mutual_amt_invested').css('border', '');
      $('#mutual_amt_invested_astrik').hide();
    }

   if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#mutual_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
    mutual_company_name : $('#mutual_company_name').val(),
    mutual_scheme : $('#mutual_scheme').val(),
    mutual_folio_no : $('#mutual_folio_no').val(),
    mutual_transaction : $('#mutual_transaction').val(),
    mutual_type : $('#mutual_type').val(),
    mutual_advisor : $('#mutual_advisor').val(),
    mutual_sip_date : $('#mutual_sip_date').val(),
    mutual_date : $('#mutual_date').val(),
    mutual_quantity : $('#mutual_quantity').val(),
    mutual_nav : $('#mutual_nav').val(),
    mutual_amt_invested : $('#mutual_amt_invested').val(),
    mutual_stamp_charge : $('#mutual_stamp_charge').val(),
    mutual_exit_load : $('#mutual_exit_load').val()
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_mutual_fund",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
          $('#mutual_fund_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');    
                        $('#mutual_company_name').val("");
                        $('#mutual_scheme').val("");
                        $('#mutual_folio_no').val("");
                        $('#mutual_transaction').val("");
                        $('#mutual_type').val("");
                        $('#mutual_advisor').val("");
                        $('#mutual_sip_date').val("");
                        $('#mutual_date').val("");
                        $('#mutual_quantity').val("");
                        $('#mutual_nav').val("");
                        $('#mutual_amt_invested').val("");
                        $('#mutual_stamp_charge').val("");
                        $('#mutual_exit_load').val("");
                        $("#mutualfund_table_data").DataTable().ajax.reload();
              }
            else if (msg == 'NO'){
                $('#mutual_fund_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#mutual_fund_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});

//add mutual fund code ends here......



//add NCD start heress.....
$('#ncd_type_astrik').hide();
$('#ncd_name_astrik').hide();
$('#ncd_transaction_type_astrik').hide();
$('#ncd_date_astrik').hide();
$('#ncd_purchase_price_astrik').hide();
$('#ncd_quantity_astrik').hide();
$('#ncd_amt_invested_astrik').hide();
$('#ncd_interest_payout_astrik').hide();
$('#ncd_interest_rate_astrik').hide();
$('#ncd_interest_payable_astrik').hide();
$('#ncd_maturity_date_astrik').hide();

$('#addNCDdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
    var ncd_type = $('#ncd_type').val();
    var ncd_name = $('#ncd_name').val();
    var ncd_transaction_type = $('#ncd_transaction_type').val();
    var ncd_date = $('#ncd_date').val();
    var ncd_purchase_price = $('#ncd_purchase_price').val();
    var ncd_quantity = $('#ncd_quantity').val();
    var ncd_amt_invested = $('#ncd_amt_invested').val();
    var ncd_interest_payout = $('#ncd_interest_payout').val();
    var ncd_interest_rate = $('#ncd_interest_rate').val();
    var ncd_interest_payable = $('#ncd_interest_payable').val();
    var ncd_maturity_date = $('#ncd_maturity_date').val();
    var ncd_locking_period = $('#ncd_locking_period').val();
   
    if(ncd_type==""){
      $('#ncd_type').css('border', '1px solid red');
      $('#ncd_type_astrik').show();
      return false;
    }else{
     $('#ncd_type').css('border', '');
      $('#ncd_type_astrik').hide();
    }
      if(ncd_name==""){
      $('#ncd_name').css('border', '1px solid red');
      $('#ncd_name_astrik').show();
      return false;
    }else{
     $('#ncd_name').css('border', '');
      $('#ncd_name_astrik').hide();
    }
       if(ncd_transaction_type==""){
      $('#ncd_transaction_type').css('border', '1px solid red');
      $('#ncd_transaction_type_astrik').show();
      return false;
    }else{
     $('#ncd_transaction_type').css('border', '');
      $('#ncd_transaction_type_astrik').hide();
    }
      if(ncd_date==""){
      $('#ncd_date').css('border', '1px solid red');
      $('#ncd_date_astrik').show();
      return false;
    }
    else{
     $('#ncd_date').css('border', '');
      $('#ncd_date_astrik').hide();
    }
       if(ncd_purchase_price==""){
      $('#ncd_purchase_price').css('border', '1px solid red');
      $('#ncd_purchase_price_astrik').show();
      return false;
    }else{
     $('#ncd_purchase_price').css('border', '');
      $('#ncd_purchase_price_astrik').hide();
    }
       if(ncd_quantity==""){
      $('#ncd_quantity').css('border', '1px solid red');
      $('#ncd_quantity_astrik').show();
      return false;
    }else{
     $('#ncd_quantity').css('border', '');
      $('#ncd_quantity_astrik').hide();
    }
       if(ncd_amt_invested==""){
      $('#ncd_amt_invested').css('border', '1px solid red');
      $('#ncd_amt_invested_astrik').show();
      return false;
    }else{
     $('#ncd_amt_invested').css('border', '');
      $('#ncd_amt_invested_astrik').hide();
    }
   
       if(ncd_interest_payout==""){
      $('#ncd_interest_payout').css('border', '1px solid red');
      $('#ncd_interest_payout_astrik').show();
      return false;
    }else{
     $('#ncd_interest_payout').css('border', '');
      $('#ncd_interest_payout_astrik').hide();
    }
    
      if(ncd_interest_rate==""){
      $('#ncd_interest_rate').css('border', '1px solid red');
      $('#ncd_interest_rate_astrik').show();
      return false;
    }else{
     $('#ncd_interest_rate').css('border', '');
      $('#ncd_interest_rate_astrik').hide();
    }
         if(ncd_interest_payable==""){
      $('#ncd_interest_payable').css('border', '1px solid red');
      $('#ncd_interest_payable_astrik').show();
      return false;
    }else{
     $('#ncd_interest_payable').css('border', '');
      $('#ncd_interest_payable_astrik').hide();
    }

     if(ncd_maturity_date==""){
      $('#ncd_maturity_date').css('border', '1px solid red');
      $('#ncd_maturity_date_astrik').show();
      return false;
    }else{
     $('#ncd_maturity_date').css('border', '');
      $('#ncd_maturity_date_astrik').hide();
    }


   if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#mutual_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
       ncd_type : $('#ncd_type').val(),
       ncd_name : $('#ncd_name').val(),
       ncd_transaction_type : $('#ncd_transaction_type').val(),
       ncd_date : $('#ncd_date').val(),
       ncd_purchase_price : $('#ncd_purchase_price').val(),
       ncd_quantity : $('#ncd_quantity').val(),
       ncd_amt_invested : $('#ncd_amt_invested').val(),
       ncd_interest_payout : $('#ncd_interest_payout').val(),
       ncd_interest_rate : $('#ncd_interest_rate').val(),
       ncd_interest_payable : $('#ncd_interest_payable').val(),
       ncd_maturity_date : $('#ncd_maturity_date').val(),
       ncd_locking_period : $('#ncd_locking_period').val()
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_ncd",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
          $('#NCD_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');    
                     
                 $('#ncd_type').val("");
                 $('#ncd_name').val("");
                 $('#ncd_transaction_type').val("");
                 $('#ncd_date').val("");
                 $('#ncd_purchase_price').val("");
                 $('#ncd_quantity').val("");
                 $('#ncd_amt_invested').val("");
                 $('#ncd_interest_payout').val("");
                 $('#ncd_interest_rate').val("");
                 $('#ncd_interest_payable').val("");
                 $('#ncd_maturity_date').val("");
                 $('#ncd_locking_period').val("");
              }
            else if (msg == 'NO'){
                $('#NCD_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#NCD_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});

//add NCD code ends here......



//NPS codes starts heres .....
   
$('#nps_opening_date_astrik').hide();
$('#nps_type_astrik').hide();
$('#nps_pran_no_astrik').hide();
$('#nps_scheme_astrik').hide();
$('#nps_transaction_type_astrik').hide();
$('#nps_date_astrik').hide();
$('#nps_qty_astrik').hide();
$('#nps_purchase_price_astrik').hide();
$('#nps_amt_invested_astrik').hide();

$('#addnpsdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
   var nps_opening_date = $('#nps_opening_date').val();
   var nps_type = $('#nps_type').val();
    var nps_pran_no = $('#nps_pran_no').val();
   var nps_scheme = $('#nps_scheme').val();
   var nps_transaction_type = $('#nps_transaction_type').val();
   var nps_date = $('#nps_date').val();
    var nps_qty = $('#nps_qty').val();
     var nps_purchase_price = $('#nps_purchase_price').val();
      var nps_amt_invested = $('#nps_amt_invested').val();
  
    if(nps_opening_date==""){
      $('#nps_opening_date').css('border', '1px solid red');
      $('#nps_opening_date_astrik').show();
      return false;
    }else{
     $('#nps_opening_date').css('border', '');
      $('#nps_opening_date_astrik').hide();
    }
      if(nps_type==""){
      $('#nps_type').css('border', '1px solid red');
      $('#nps_type_astrik').show();
      return false;
    }else{
     $('#nps_type').css('border', '');
      $('#nps_type_astrik').hide();
    }
       if(nps_pran_no==""){
      $('#nps_pran_no').css('border', '1px solid red');
      $('#nps_pran_no_astrik').show();
      return false;
    }else{
     $('#nps_pran_no').css('border', '');
      $('#nps_pran_no_astrik').hide();
    }
     if(nps_scheme==""){
      $('#nps_scheme').css('border', '1px solid red');
      $('#nps_scheme_astrik').show();
      return false;
    }else{
     $('#nps_scheme').css('border', '');
      $('#nps_scheme_astrik').hide();
    }
         if(nps_transaction_type==""){
      $('#nps_transaction_type').css('border', '1px solid red');
      $('#nps_transaction_type_astrik').show();
      return false;
    }else{
     $('#nps_transaction_type').css('border', '');
      $('#nps_transaction_type_astrik').hide();
    }
     if(nps_date==""){
      $('#nps_date').css('border', '1px solid red');
      $('#nps_date_astrik').show();
      return false;
    }else{
     $('#nps_date').css('border', '');
      $('#nps_date_astrik').hide();
    }
      if(nps_qty==""){
      $('#nps_qty').css('border', '1px solid red');
      $('#nps_qty_astrik').show();
      return false;
    }else{
     $('#nps_qty').css('border', '');
      $('#nps_qty_astrik').hide();
    }
    if(nps_purchase_price==""){
      $('#nps_purchase_price').css('border', '1px solid red');
      $('#nps_purchase_price_astrik').show();
      return false;
    }else{
     $('#nps_purchase_price').css('border', '');
      $('#nps_purchase_price_astrik').hide();
    }
     if(nps_amt_invested==""){
      $('#nps_amt_invested').css('border', '1px solid red');
      $('#nps_amt_invested_astrik').show();
      return false;
    }else{
     $('#nps_amt_invested').css('border', '');
      $('#nps_amt_invested_astrik').hide();
    }

      if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
      nps_opening_date : $('#nps_opening_date').val(),
      nps_type : $('#nps_type').val(),
      nps_pran_no : $('#nps_pran_no').val(),
      nps_scheme : $('#nps_scheme').val(),
      nps_transaction_type : $('#nps_transaction_type').val(),
      nps_date : $('#nps_date').val(),
      nps_qty : $('#nps_qty').val(),
      nps_purchase_price : $('#nps_purchase_price').val(),
      nps_amt_invested : $('#nps_amt_invested').val()

    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_nps",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#nps_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>'); $('#nps_opening_date').val("");
                   $('#nps_type').val("");
                   $('#nps_pran_no').val("");
                   $('#nps_scheme').val("");
                  $('#nps_transaction_type').val("");
                  $('#nps_date').val("");
                   $('#nps_qty').val("");
                   $('#nps_purchase_price').val("");
                   $('#nps_amt_invested').val(""); 
                   $("#nps_table_data").DataTable().ajax.reload();
              }
            else if (msg == 'NO'){
                $('#nps_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#nps_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//nps code ends heree.....



//NSC codes starts heres .....
   
$('#nsc_transaction_type_astrik').hide();
$('#nsc_account_no_astrik').hide();
$('#nsc_type_astrik').hide();
$('#nsc_opening_date_astrik').hide();
$('#nsc_amt_invested_astrik').hide();
$('#nsc_interest_rate_astrik').hide();
$('#nsc_maturity_date_astrik').hide();
$('#nsc_maturity_amt_astrik').hide();

$('#addnscdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
    var nsc_transaction_type = $('#nsc_transaction_type').val();
    var nsc_account_no = $('#nsc_account_no').val();
    var nsc_type = $('#nsc_type').val();
    var nsc_opening_date = $('#nsc_opening_date').val();
    var nsc_lockin_period = $('#nsc_lockin_period').val();
    var nsc_amt_invested = $('#nsc_amt_invested').val();
    var nsc_interest_rate = $('#nsc_interest_rate').val(); 
    var nsc_maturity_date = $('#nsc_maturity_date').val();
    var nsc_maturity_amt = $('#nsc_maturity_amt').val();     
  
    if(nsc_transaction_type==""){
      $('#nsc_transaction_type').css('border', '1px solid red');
      $('#nsc_transaction_type_astrik').show();
      return false;
    }else{
     $('#nsc_transaction_type').css('border', '');
      $('#nsc_transaction_type_astrik').hide();
    }
      if(nsc_account_no==""){
      $('#nsc_account_no').css('border', '1px solid red');
      $('#nsc_account_no_astrik').show();
      return false;
    }else{
     $('#nsc_account_no').css('border', '');
      $('#nsc_account_no_astrik').hide();
    }
       if(nsc_type==""){
      $('#nsc_type').css('border', '1px solid red');
      $('#nsc_type_astrik').show();
      return false;
    }else{
     $('#nsc_type').css('border', '');
      $('#nsc_type_astrik').hide();
    }
       if(nsc_opening_date==""){
      $('#nsc_opening_date').css('border', '1px solid red');
      $('#nsc_opening_date_astrik').show();
      return false;
    }else{
     $('#nsc_opening_date').css('border', '');
      $('#nsc_opening_date_astrik').hide();
    }
       if(nsc_amt_invested==""){
      $('#nsc_amt_invested').css('border', '1px solid red');
      $('#nsc_amt_invested_astrik').show();
      return false;
    }else{
     $('#nsc_amt_invested').css('border', '');
      $('#nsc_amt_invested_astrik').hide();
    }
     if(nsc_interest_rate==""){
      $('#nsc_interest_rate').css('border', '1px solid red');
      $('#nsc_interest_rate_astrik').show();
      return false;
    }else{
     $('#nsc_interest_rate').css('border', '');
      $('#nsc_interest_rate_astrik').hide();
    }
       if(nsc_maturity_date==""){
      $('#nsc_maturity_date').css('border', '1px solid red');
      $('#nsc_maturity_date_astrik').show();
      return false;
    }else{
     $('#nsc_maturity_date').css('border', '');
      $('#nsc_maturity_date_astrik').hide();
    }
     if(nsc_maturity_amt==""){
      $('#nsc_maturity_amt').css('border', '1px solid red');
      $('#nsc_maturity_amt_astrik').show();
      return false;
    }else{
     $('#nsc_maturity_amt').css('border', '');
      $('#nsc_maturity_amt_astrik').hide();
    }
   
 

      if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
        nsc_transaction_type : $('#nsc_transaction_type').val(),
        nsc_account_no : $('#nsc_account_no').val(),
        nsc_type : $('#nsc_type').val(),
        nsc_opening_date : $('#nsc_opening_date').val(),
        nsc_lockin_period : $('#nsc_lockin_period').val(),
        nsc_amt_invested : $('#nsc_amt_invested').val(),
        nsc_interest_rate : $('#nsc_interest_rate').val(), 
        nsc_maturity_date : $('#nsc_maturity_date').val(),
        nsc_maturity_amt : $('#nsc_maturity_amt').val()
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_nsc",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#nsc_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');   
                      $('#nsc_transaction_type').val("");
                      $('#nsc_account_no').val("");
                      $('#nsc_type').val("");
                      $('#nsc_opening_date').val("");
                      $('#nsc_lockin_period').val("");
                      $('#nsc_amt_invested').val("");
                      $('#nsc_interest_rate').val(""); 
                      $('#nsc_maturity_date').val("");
                      $('#nsc_maturity_amt').val("");  
              }
            else if (msg == 'NO'){
                $('#nsc_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#nsc_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//NSC code ends heree.....


//PPF codes starts heres .....
   
$('#ppf_transaction_type_astrik').hide();
$('#ppf_account_no_astrik').hide();

$('#ppf_opening_date_astrik').hide();
$('#ppf_date_astrik').hide();
$('#ppf_maturity_date_astrik').hide();
$('#ppf_amt_invested_astrik').hide();
$('#ppf_interest_rate_astrik').hide();

$('#addppfdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
    var ppf_transaction_type = $('#ppf_transaction_type').val();
    var ppf_account_no = $('#ppf_account_no').val();
    var ppf_opening_date = $('#ppf_opening_date').val();
     var ppf_date = $('#ppf_date').val();
    var ppf_lockin_period = $('#ppf_lockin_period').val();    
    var ppf_maturity_date = $('#ppf_maturity_date').val();
    var ppf_amt_invested = $('#ppf_amt_invested').val();
    var ppf_interest_rate = $('#ppf_interest_rate').val();
     
  
    if(ppf_transaction_type==""){
      $('#ppf_transaction_type').css('border', '1px solid red');
      $('#ppf_transaction_type_astrik').show();
      return false;
    }else{
     $('#ppf_transaction_type').css('border', '');
      $('#ppf_transaction_type_astrik').hide();
    }
      if(ppf_account_no==""){
      $('#ppf_account_no').css('border', '1px solid red');
      $('#ppf_account_no_astrik').show();
      return false;
    }else{
     $('#ppf_account_no').css('border', '');
      $('#ppf_account_no_astrik').hide();
    }

       if(ppf_opening_date==""){
      $('#ppf_opening_date').css('border', '1px solid red');
      $('#ppf_opening_date_astrik').show();
      return false;
    }else{
     $('#ppf_opening_date').css('border', '');
      $('#ppf_opening_date_astrik').hide();
    }
       if(ppf_maturity_date==""){
      $('#ppf_maturity_date').css('border', '1px solid red');
      $('#ppf_maturity_date_astrik').show();
      return false;
    }else{
     $('#ppf_maturity_date').css('border', '');
      $('#ppf_maturity_date_astrik').hide();
    }
       if(ppf_amt_invested==""){
      $('#ppf_amt_invested').css('border', '1px solid red');
      $('#ppf_amt_invested_astrik').show();
      return false;
    }else{
     $('#ppf_amt_invested').css('border', '');
      $('#ppf_amt_invested_astrik').hide();
    }
       if(ppf_interest_rate==""){
      $('#ppf_interest_rate').css('border', '1px solid red');
      $('#ppf_interest_rate_astrik').show();
      return false;
    }else{
     $('#ppf_interest_rate').css('border', '');
      $('#ppf_interest_rate_astrik').hide();
    }
     

      if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
        ppf_transaction_type : $('#ppf_transaction_type').val(),
        ppf_account_no : $('#ppf_account_no').val(),
        ppf_opening_date : $('#ppf_opening_date').val(),
        ppf_date : $('#ppf_date').val(),
        ppf_lockin_period : $('#ppf_lockin_period').val(),    
        ppf_maturity_date : $('#ppf_maturity_date').val(),
        ppf_amt_invested : $('#ppf_amt_invested').val(),
        ppf_interest_rate : $('#ppf_interest_rate').val()
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_ppf",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#ppf_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');   
                       $('#ppf_transaction_type').val("");
                       $('#ppf_account_no').val("");
                       $('#ppf_opening_date').val("");
                       $('#ppf_date').val("");
                       $('#ppf_lockin_period').val("");    
                       $('#ppf_maturity_date').val("");
                       $('#ppf_amt_invested').val("");
                       $('#ppf_interest_rate').val("");  
              }
            else if (msg == 'NO'){
                $('#ppf_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#ppf_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//PPF code ends heree.....



//Private Equity/ stratup codes starts heres .....
   
$('#pe_asset_name_astrik').hide();
$('#pe_startup_astrik').hide();
$('#pe_start_date_astrik').hide();
$('#pe_transaction_type_astrik').hide();
$('#pe_date_astrik').hide();
$('#pe_qty_purchase_astrik').hide();
$('#pe_purchase_rate_astrik').hide();
$('#pe_amt_invested_astrik').hide();

$('#addprivateequitydata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
    var pe_asset_name = $('#pe_asset_name').val();
    var pe_startup = $('#pe_startup').val();
    var pe_start_date = $('#pe_start_date').val();
    var pe_transaction_type = $('#pe_transaction_type').val();
    var pe_date = $('#pe_date').val();
    var pe_qty_purchase = $('#pe_qty_purchase').val();
    var pe_purchase_rate = $('#pe_purchase_rate').val();
    var pe_amt_invested = $('#pe_amt_invested').val();   
    var pe_current_rate = $('#pe_current_rate').val();
    var pe_present_value = $('#pe_present_value').val();
  
  
    if(pe_asset_name==""){
      $('#pe_asset_name').css('border', '1px solid red');
      $('#pe_asset_name_astrik').show();
      return false;
    }else{
     $('#pe_asset_name').css('border', '');
      $('#pe_asset_name_astrik').hide();
    }
      if(pe_startup==""){
      $('#pe_startup').css('border', '1px solid red');
      $('#pe_startup_astrik').show();
      return false;
    }else{
     $('#pe_startup').css('border', '');
      $('#pe_startup_astrik').hide();
    }
       if(pe_start_date==""){
      $('#pe_start_date').css('border', '1px solid red');
      $('#pe_start_date_astrik').show();
      return false;
    }else{
     $('#pe_start_date').css('border', '');
      $('#pe_start_date_astrik').hide();
    }
     if(pe_transaction_type==""){
      $('#pe_transaction_type').css('border', '1px solid red');
      $('#pe_transaction_type_astrik').show();
      return false;
    }else{
     $('#pe_transaction_type').css('border', '');
      $('#pe_transaction_type_astrik').hide();
    }
         if(pe_date==""){
      $('#pe_date').css('border', '1px solid red');
      $('#pe_date_astrik').show();
      return false;
    }else{
     $('#pe_date').css('border', '');
      $('#pe_date_astrik').hide();
    }
        if(pe_qty_purchase==""){
      $('#pe_qty_purchase').css('border', '1px solid red');
      $('#pe_qty_purchase_astrik').show();
      return false;
    }else{
     $('#pe_qty_purchase').css('border', '');
      $('#pe_qty_purchase_astrik').hide();
    }
     if(pe_purchase_rate==""){
      $('#pe_purchase_rate').css('border', '1px solid red');
      $('#pe_purchase_rate_astrik').show();
      return false;
    }else{
     $('#pe_purchase_rate').css('border', '');
      $('#pe_purchase_rate_astrik').hide();
    }
         if(pe_amt_invested==""){
      $('#pe_amt_invested').css('border', '1px solid red');
      $('#pe_amt_invested_astrik').show();
      return false;
    }else{
     $('#pe_amt_invested').css('border', '');
      $('#pe_amt_invested_astrik').hide();
    }
    
 

      if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
       pe_asset_name : $('#pe_asset_name').val(),
       pe_startup : $('#pe_startup').val(),
       pe_start_date : $('#pe_start_date').val(),
       pe_transaction_type : $('#pe_transaction_type').val(),
       pe_date : $('#pe_date').val(),
       pe_qty_purchase : $('#pe_qty_purchase').val(),
       pe_purchase_rate : $('#pe_purchase_rate').val(),
       pe_amt_invested : $('#pe_amt_invested').val(),   
       pe_current_rate : $('#pe_current_rate').val(),
       pe_present_value : $('#pe_present_value').val()
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_PrivateEquity",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#privateEquity_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');
                 $('#pe_asset_name').val("");
                 $('#pe_startup').val("");
                 $('#pe_start_date').val("");
                 $('#pe_transaction_type').val("");
                 $('#pe_date').val("");
                 $('#pe_qty_purchase').val("");
                 $('#pe_purchase_rate').val("");
                 $('#pe_amt_invested').val("");   
                 $('#pe_current_rate').val("");
                 $('#pe_present_value').val("");
              }
            else if (msg == 'NO'){
                $('#privateEquity_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#privateEquity_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//Private Equity/ startup code ends heree.....


//RD codes starts heres .....
 $('#rd_type_astrik').hide();
$('#rd_account_no_astrik').hide();
$('#rd_transaction_type_astrik').hide();
$('#rd_interest_rate_astrik').hide();
$('#rd_maturity_date_astrik').hide();
$('#rd_start_date_astrik').hide();
$('#rd_amt_invested_astrik').hide();

$('#RDaddddata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
    var rd_type = $('#rd_type').val();
    var rd_account_no = $('#rd_account_no').val();
    var rd_transaction_type = $('#rd_transaction_type').val();
    var rd_interest_payout = $('#rd_interest_payout').val();
    var rd_interest_payment = $('#rd_interest_payment').val();
    var rd_interest_rate = $('#rd_interest_rate').val();
    var rd_interest_type = $('#rd_interest_type').val();
    var rd_maturity_amt = $('#rd_maturity_amt').val();   
    var rd_maturity_date = $('#rd_maturity_date').val();
    var rd_start_date = $('#rd_start_date').val();
    var rd_amt_invested = $('#rd_amt_invested').val();
  
  
    if(rd_type==""){
      $('#rd_type').css('border', '1px solid red');
      $('#rd_type_astrik').show();
      return false;
    }else{
     $('#rd_type').css('border', '');
      $('#rd_type_astrik').hide();
    }
      if(rd_account_no==""){
      $('#rd_account_no').css('border', '1px solid red');
      $('#rd_account_no_astrik').show();
      return false;
    }else{
     $('#rd_account_no').css('border', '');
      $('#rd_account_no_astrik').hide();
    }
       if(rd_transaction_type==""){
      $('#rd_transaction_type').css('border', '1px solid red');
      $('#rd_transaction_type_astrik').show();
      return false;
    }else{
     $('#rd_transaction_type').css('border', '');
      $('#rd_transaction_type_astrik').hide();
    }
     if(rd_interest_rate==""){
      $('#rd_interest_rate').css('border', '1px solid red');
      $('#rd_interest_rate_astrik').show();
      return false;
    }else{
     $('#rd_interest_rate').css('border', '');
      $('#rd_interest_rate_astrik').hide();
    }
         if(rd_maturity_date==""){
      $('#rd_maturity_date').css('border', '1px solid red');
      $('#rd_maturity_date_astrik').show();
      return false;
    }else{
     $('#rd_maturity_date').css('border', '');
      $('#rd_maturity_date_astrik').hide();
    }
        if(rd_start_date==""){
      $('#rd_start_date').css('border', '1px solid red');
      $('#rd_start_date_astrik').show();
      return false;
    }else{
     $('#rd_start_date').css('border', '');
      $('#rd_start_date_astrik').hide();
    }
     if(rd_amt_invested==""){
      $('#rd_amt_invested').css('border', '1px solid red');
      $('#rd_amt_invested_astrik').show();
      return false;
    }else{
     $('#rd_amt_invested').css('border', '');
      $('#rd_amt_invested_astrik').hide();
    }

      if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
       rd_type : $('#rd_type').val(),
       rd_account_no : $('#rd_account_no').val(),
       rd_transaction_type : $('#rd_transaction_type').val(),
       rd_interest_payout : $('#rd_interest_payout').val(),
       rd_interest_payment : $('#rd_interest_payment').val(),
       rd_interest_rate : $('#rd_interest_rate').val(),
       rd_interest_type : $('#rd_interest_type').val(),
       rd_maturity_amt : $('#rd_maturity_amt').val(),
       rd_maturity_date : $('#rd_maturity_date').val(),
       rd_start_date : $('#rd_start_date').val(),
       rd_amt_invested : $('#rd_amt_invested').val()
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_RD",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#RD_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');    $('#rd_type').val("");
                      $('#rd_account_no').val("");
                      $('#rd_transaction_type').val("");
                      $('#rd_interest_payout').val("");
                      $('#rd_interest_payment').val("");
                      $('#rd_interest_rate').val("");
                      $('#rd_interest_type').val("");
                      $('#rd_maturity_amt').val("");
                      $('#rd_maturity_date').val("");
                      $('#rd_start_date').val("");
                      $('#rd_amt_invested').val(""); 
              }
            else if (msg == 'NO'){
                $('#RD_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#RD_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//RD code ends heree.....


//SCSS codes starts heres .....
   
$('#scss_transaction_type_astrik').hide();
$('#scss_account_no_astrik').hide();
$('#scss_muturity_date_astrik').hide();
$('#scss_lockin_period_astrik').hide();
$('#scss_date_astrik').hide();
$('#scss_amt_invested_astrik').hide();

$('#addscssdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
   var scss_transaction_type = $('#scss_transaction_type').val();
   var scss_account_no = $('#scss_account_no').val();
   var scss_muturity_date = $('#scss_muturity_date').val();
   var scss_lockin_period = $('#scss_lockin_period').val();
   var scss_date = $('#scss_date').val();
   var scss_amt_invested = $('#scss_amt_invested').val();

    var scss_interest_rate = $('#scss_interest_rate').val(); 
    var scss_interest_type = $('#scss_interest_type').val();
    var scss_interest_payment = $('#scss_interest_payment').val(); 
    var scss_interest_payout = $('#scss_interest_payout').val(); 
    var scss_maturity_amt = $('#scss_maturity_amt').val();    
  
    if(scss_transaction_type==""){
      $('#scss_transaction_type').css('border', '1px solid red');
      $('#scss_transaction_type_astrik').show();
      return false;
    }else{
     $('#scss_transaction_type').css('border', '');
      $('#scss_transaction_type_astrik').hide();
    }
      if(scss_account_no==""){
      $('#scss_account_no').css('border', '1px solid red');
      $('#scss_account_no_astrik').show();
      return false;
    }else{
     $('#scss_account_no').css('border', '');
      $('#scss_account_no_astrik').hide();
    }
      if(scss_muturity_date==""){
      $('#scss_muturity_date').css('border', '1px solid red');
      $('#scss_muturity_date_astrik').show();
      return false;
    }else{
     $('#scss_muturity_date').css('border', '');
      $('#scss_muturity_date_astrik').hide();
    }
      if(scss_lockin_period==""){
      $('#scss_lockin_period').css('border', '1px solid red');
      $('#scss_lockin_period_astrik').show();
      return false;
    }else{
     $('#scss_lockin_period').css('border', '');
      $('#scss_lockin_period_astrik').hide();
    }
       if(scss_date==""){
      $('#scss_date').css('border', '1px solid red');
      $('#scss_date_astrik').show();
      return false;
    }else{
     $('#scss_date').css('border', '');
      $('#scss_date_astrik').hide();
    }
    
    if(scss_amt_invested==""){
      $('#scss_amt_invested').css('border', '1px solid red');
      $('#scss_amt_invested_astrik').show();
      return false;
    }else{
     $('#scss_amt_invested').css('border', '');
      $('#scss_amt_invested_astrik').hide();
    }
 

      if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
        scss_transaction_type : $('#scss_transaction_type').val(),
        scss_account_no : $('#scss_account_no').val(),
        scss_muturity_date : $('#scss_muturity_date').val(),
        scss_lockin_period : $('#scss_lockin_period').val(),
        scss_date : $('#scss_date').val(),
        scss_amt_invested : $('#scss_amt_invested').val(),

        scss_interest_rate : $('#scss_interest_rate').val(), 
        scss_interest_type : $('#scss_interest_type').val(),
        scss_interest_payment : $('#scss_interest_payment').val(), 
        scss_interest_payout : $('#scss_interest_payout').val(), 
        scss_maturity_amt : $('#scss_maturity_amt').val()
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_SCSS",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#SCSS_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');   
                            $('#scss_transaction_type').val("");
                            $('#scss_account_no').val("");
                            $('#scss_muturity_date').val("");
                            $('#scss_lockin_period').val("");
                            $('#scss_date').val("");
                            $('#scss_amt_invested').val("");
                            $('#scss_interest_rate').val(""); 
                            $('#scss_interest_type').val("");
                            $('#scss_interest_payment').val(""); 
                            $('#scss_interest_payout').val(""); 
                            $('#scss_maturity_amt').val("");  
              }
            else if (msg == 'NO'){
                $('#SCSS_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#SCSS_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });  
    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//SCSS code ends heree.....


//add SGB code start heress.....

$('#closesgb, #sgbcancle').click(function() {
  
     $('#sgb_stock_name').val("");
     $('#sgb_transaction_type').val("");
     $('#sgb_broker').val("");
     $('#sgb_date').val("");
     $('#sgb_contract_no').val("");
     $('#sgb_settlement_no').val("");
     $('#sgb_qty').val("");
     $('#sgb_purchase_price').val("");
     $('#sgb_amt_invested').val("");
     $('#sgb_brokerage').val("");
     $('#sgb_net_rate').val("");
     $('#sgb_tax_value').val("");
     $('#sgb_cgst').val("");
     $('#sgb_sgst').val("");
     $('#sgb_igst').val("");
     $('#sgb_exchange_transaction').val("");
     $('#sgb_stt').val("");
     $('#sgb_sebi_fee').val("");
     $('#sgb_stamp_duty').val("");
     $('#sgb_net_amt').val("");

  });

 $('#sgb_stock_name_astrik').hide();
$('#sgb_transaction_type_astrik').hide();
$('#sgb_broker_astrik').hide();
$('#sgb_date_astrik').hide();
$('#sgb_qty_astrik').hide();
$('#sgb_purchase_price_astrik').hide();
$('#sgb_amt_invested_astrik').hide();
$('#sgb_net_rate_astrik').hide();
$('#sgb_net_amt_astrik').hide();
//table data hide of bond and sgb......
$('#sgb_table_data').hide();
$('#bond_table_data').hide();

$('#addSGBdata').click(function() {
    var valu = $('#select_sub_Assets').val();
    var select_portfolio_name = $('#select_portfolio_name').val();
    var select_assets = $('#select_assets').val();
  
    var sgb_stock_name = $('#sgb_stock_name').val();
    var sgb_transaction_type = $('#sgb_transaction_type').val();
    var sgb_broker = $('#sgb_broker').val();
    var sgb_date = $('#sgb_date').val();
    var sgb_contract_no = $('#sgb_contract_no').val();
    var sgb_settlement_no = $('#sgb_settlement_no').val();
    var sgb_qty = $('#sgb_qty').val();
    var sgb_purchase_price = $('#sgb_purchase_price').val();
    var sgb_amt_invested = $('#sgb_amt_invested').val();
    var sgb_brokerage = $('#sgb_brokerage').val();
    var sgb_net_rate = $('#sgb_net_rate').val();
    var sgb_tax_value = $('#sgb_tax_value').val();
    var sgb_cgst = $('#sgb_cgst').val();
    var sgb_sgst = $('#sgb_sgst').val();
    var sgb_igst = $('#sgb_igst').val();
    var sgb_exchange_transaction = $('#sgb_exchange_transaction').val();
    var sgb_stt = $('#sgb_stt').val();
    var sgb_sebi_fee = $('#sgb_sebi_fee').val();
    var sgb_stamp_duty = $('#sgb_stamp_duty').val();
    var sgb_net_amt = $('#sgb_net_amt').val();
   
    if(sgb_stock_name==""){
      $('#sgb_stock_name').css('border', '1px solid red');
      $('#sgb_stock_name_astrik').show();
      return false;
    }else{
     $('#sgb_stock_name').css('border', '');
      $('#sgb_stock_name_astrik').hide();
    }
      if(sgb_transaction_type==""){
      $('#sgb_transaction_type').css('border', '1px solid red');
      $('#sgb_transaction_type_astrik').show();
      return false;
    }else{
     $('#sgb_transaction_type').css('border', '');
      $('#sgb_transaction_type_astrik').hide();
    }
       if(sgb_broker==""){
      $('#sgb_broker').css('border', '1px solid red');
      $('#sgb_broker_astrik').show();
      return false;
    }else{
     $('#sgb_broker').css('border', '');
      $('#sgb_broker_astrik').hide();
    }
      if(sgb_date==""){
      $('#sgb_date').css('border', '1px solid red');
      $('#sgb_date_astrik').show();
      return false;
    }
    else{
     $('#sgb_date').css('border', '');
      $('#sgb_date_astrik').hide();
    }
    
       if(sgb_qty==""){
      $('#sgb_qty').css('border', '1px solid red');
      $('#sgb_qty_astrik').show();
      return false;
    }else{
     $('#sgb_qty').css('border', '');
      $('#sgb_qty_astrik').hide();
    }
       if(sgb_purchase_price==""){
      $('#sgb_purchase_price').css('border', '1px solid red');
      $('#sgb_purchase_price_astrik').show();
      return false;
    }else{
     $('#sgb_purchase_price').css('border', '');
      $('#sgb_purchase_price_astrik').hide();
    }
        if(sgb_amt_invested==""){
      $('#sgb_amt_invested').css('border', '1px solid red');
      $('#sgb_amt_invested_astrik').show();
      return false;
    }else{
     $('#sgb_amt_invested').css('border', '');
      $('#sgb_amt_invested_astrik').hide();
    }
       if(sgb_net_rate==""){
      $('#sgb_net_rate').css('border', '1px solid red');
      $('#sgb_net_rate_astrik').show();
      return false;
    }else{
     $('#sgb_net_rate').css('border', '');
      $('#sgb_net_rate_astrik').hide();
    }
   
       if(sgb_net_amt==""){
      $('#sgb_net_amt').css('border', '1px solid red');
      $('#sgb_net_amt_astrik').show();
      return false;
    }else{
     $('#sgb_net_amt').css('border', '');
      $('#sgb_net_amt_astrik').hide();
    }
    

   if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
       user_id: $('#sgb_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
  
        stock_name : $('#sgb_stock_name').val(),
        stock_transaction_type : $('#sgb_transaction_type').val(),
        stock_broker : $('#sgb_broker').val(),
        stock_date : $('#sgb_date').val(),
        stock_contract_no : $('#sgb_contract_no').val(),
        stock_settlement_no : $('#sgb_settlement_no').val(),
        stock_qty : $('#sgb_qty').val(),
        stock_purchase_price : $('#sgb_purchase_price').val(),
        stock_amt_invested : $('#sgb_amt_invested').val(),
        stock_brokerage : $('#sgb_brokerage').val(),
        stock_net_rate : $('#sgb_net_rate').val(),
        stock_tax_value : $('#sgb_tax_value').val(),
        stock_cgst : $('#sgb_cgst').val(),
        stock_sgst : $('#sgb_sgst').val(),
        stock_igst : $('#sgb_igst').val(),
        stock_exchange_transaction : $('#sgb_exchange_transaction').val(),
        stock_stt : $('#sgb_stt').val(),
        stock_sebi_fee : $('#sgb_sebi_fee').val(),
        stock_stamp_duty : $('#sgb_stamp_duty').val(),
        stock_net_amt : $('#sgb_net_amt').val()       

    };  

   if(valu != "")
   {
  
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_stock",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
            $('#sgb_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');  
            $("#sgb_table_data").DataTable().ajax.reload();
            $("#bond_table_data").DataTable().ajax.reload();

     $('#sgb_stock_name').val("");
     $('#sgb_transaction_type').val("");
     $('#sgb_broker').val("");
     $('#sgb_date').val("");
     $('#sgb_contract_no').val("");
     $('#sgb_settlement_no').val("");
     $('#sgb_qty').val("");
     $('#sgb_purchase_price').val("");
     $('#sgb_amt_invested').val("");
     $('#sgb_brokerage').val("");
     $('#sgb_net_rate').val("");
     $('#sgb_tax_value').val("");
     $('#sgb_cgst').val("");
     $('#sgb_sgst').val("");
     $('#sgb_igst').val("");
     $('#sgb_exchange_transaction').val("");
     $('#sgb_stt').val("");
     $('#sgb_sebi_fee').val("");
     $('#sgb_stamp_duty').val("");
     $('#sgb_net_amt').val("");
            }
            else if (msg == 'NO'){
                $('#sgb_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#sgb_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});

//add SGB code ends here......

//sukanya codes starts heres .....
   
$('#sukanya_transaction_type_astrik').hide();
$('#sukanya_account_no_astrik').hide();
$('#sukanya_opening_date_astrik').hide();
$('#sukanya_maturity_date_astrik').hide();
$('#sukanya_date_astrik').hide();
$('#sukanya_amt_invested_astrik').hide();
$('#sukanya_interest_rate_astrik').hide();

$('#sukanyaadddata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
    var sukanya_transaction_type = $('#sukanya_transaction_type').val();
    var sukanya_account_no = $('#sukanya_account_no').val();
   var sukanya_opening_date = $('#sukanya_opening_date').val();
   var sukanya_maturity_date = $('#sukanya_maturity_date').val();
   var sukanya_lockin_period = $('#sukanya_lockin_period').val();
    var sukanya_date = $('#sukanya_date').val();
   var sukanya_amt_invested = $('#sukanya_amt_invested').val();
    var sukanya_interest_rate = $('#sukanya_interest_rate').val();   
  
    if(sukanya_transaction_type==""){
      $('#sukanya_transaction_type').css('border', '1px solid red');
      $('#sukanya_transaction_type_astrik').show();
      return false;
    }else{
     $('#sukanya_transaction_type').css('border', '');
      $('#sukanya_transaction_type_astrik').hide();
    }
      if(sukanya_account_no==""){
      $('#sukanya_account_no').css('border', '1px solid red');
      $('#sukanya_account_no_astrik').show();
      return false;
    }else{
     $('#sukanya_account_no').css('border', '');
      $('#sukanya_account_no_astrik').hide();
    }
       if(sukanya_opening_date==""){
      $('#sukanya_opening_date').css('border', '1px solid red');
      $('#sukanya_opening_date_astrik').show();
      return false;
    }else{
     $('#sukanya_opening_date').css('border', '');
      $('#sukanya_opening_date_astrik').hide();
    }
     if(sukanya_maturity_date==""){
      $('#sukanya_maturity_date').css('border', '1px solid red');
      $('#sukanya_maturity_date_astrik').show();
      return false;
    }else{
     $('#sukanya_maturity_date').css('border', '');
      $('#sukanya_maturity_date_astrik').hide();
    }
         if(sukanya_date==""){
      $('#sukanya_date').css('border', '1px solid red');
      $('#sukanya_date_astrik').show();
      return false;
    }else{
     $('#sukanya_date').css('border', '');
      $('#sukanya_date_astrik').hide();
    }
        if(sukanya_amt_invested==""){
      $('#sukanya_amt_invested').css('border', '1px solid red');
      $('#sukanya_amt_invested_astrik').show();
      return false;
    }else{
     $('#sukanya_amt_invested').css('border', '');
      $('#sukanya_amt_invested_astrik').hide();
    }
     if(sukanya_interest_rate==""){
      $('#sukanya_interest_rate').css('border', '1px solid red');
      $('#sukanya_interest_rate_astrik').show();
      return false;
    }else{
     $('#sukanya_interest_rate').css('border', '');
      $('#sukanya_interest_rate_astrik').hide();
    }

      if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
       sukanya_transaction_type : $('#sukanya_transaction_type').val(),
       sukanya_account_no : $('#sukanya_account_no').val(),
       sukanya_opening_date : $('#sukanya_opening_date').val(),
       sukanya_maturity_date : $('#sukanya_maturity_date').val(),
       sukanya_lockin_period : $('#sukanya_lockin_period').val(),
       sukanya_date : $('#sukanya_date').val(),
       sukanya_amt_invested : $('#sukanya_amt_invested').val(),
       sukanya_interest_rate : $('#sukanya_interest_rate').val()   
 
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_sukanya",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#sukanya_alert-msg').html('<div class="alert alert-success text-center">Your Data has been added successfully!</div>');    
                   $('#sukanya_transaction_type').val("");
                   $('#sukanya_account_no').val("");
                   $('#sukanya_opening_date').val("");
                   $('#sukanya_maturity_date').val("");
                   $('#sukanya_lockin_period').val("");
                   $('#sukanya_date').val("");
                   $('#sukanya_amt_invested').val("");
                   $('#sukanya_interest_rate').val("");   
  
              }
            else if (msg == 'NO'){
                $('#sukanya_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#sukanya_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//sukanya code ends heree.....


//Stock sub assets code starts here....
 $('#stock_name_astrik').hide();
$('#stock_transaction_type_astrik').hide();
$('#stock_broker_astrik').hide();
$('#stock_date_astrik').hide();

$('#stock_qty_astrik').hide();
$('#stock_purchase_price_astrik').hide();
$('#stock_amt_invested_astrik').hide();

$('#stock_net_rate_astrik').hide();

$('#stock_net_amt_astrik').hide();

$('#apply_stock').click(function() {
   var valu = $('#select_sub_Assets').val();
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  

   var stock_name = $('#stock_name').val();
   var stock_transaction_type = $('#stock_transaction_type').val();
    var stock_broker = $('#stock_broker').val();
   var stock_date = $('#stock_date').val();
   var stock_contract_no = $('#stock_contract_no').val();
   var stock_settlement_no = $('#stock_settlement_no').val();
    var stock_qty = $('#stock_qty').val();
    var stock_purchase_price = $('#stock_purchase_price').val();
    var stock_amt_invested = $('#stock_amt_invested').val();
    var stock_brokerage = $('#stock_brokerage').val();
    var stock_net_rate = $('#stock_net_rate').val();
    var stock_tax_value = $('#stock_tax_value').val();
    var stock_cgst = $('#stock_cgst').val();
    var stock_sgst = $('#stock_sgst').val(); 
    var stock_igst = $('#stock_igst').val();
    var stock_exchange_transaction = $('#stock_exchange_transaction').val();
    var stock_stt = $('#stock_stt').val();
    var stock_sebi_fee = $('#stock_sebi_fee').val();
    var stock_stamp_duty = $('#stock_stamp_duty').val();
    var stock_net_amt = $('#stock_net_amt').val();
   
    if(stock_name==""){
      $('#stock_name').css('border', '1px solid red');
      $('#stock_name_astrik').show();
      return false;
    }else{
     $('#stock_name').css('border', '');
      $('#stock_name_astrik').hide();
    }
      if(stock_transaction_type==""){
      $('#stock_transaction_type').css('border', '1px solid red');
      $('#stock_transaction_type_astrik').show();
      return false;
    }else{
     $('#stock_transaction_type').css('border', '');
      $('#stock_transaction_type_astrik').hide();
    }
       if(stock_broker==""){
      $('#stock_broker').css('border', '1px solid red');
      $('#stock_broker_astrik').show();
      return false;
    }else{
     $('#stock_broker').css('border', '');
      $('#stock_broker_astrik').hide();
    }
      if(stock_date==""){
      $('#stock_date').css('border', '1px solid red');
      $('#stock_date_astrik').show();
      return false;
    }
    else{
     $('#stock_date').css('border', '');
      $('#stock_date_astrik').hide();
    }
    
   
       if(stock_qty==""){
      $('#stock_qty').css('border', '1px solid red');
      $('#stock_qty_astrik').show();
      return false;
    }else{
     $('#stock_qty').css('border', '');
      $('#stock_qty_astrik').hide();
    }
       if(stock_purchase_price==""){
      $('#stock_purchase_price').css('border', '1px solid red');
      $('#stock_purchase_price_astrik').show();
      return false;
    }else{
     $('#stock_purchase_price').css('border', '');
      $('#stock_purchase_price_astrik').hide();
    }
       if(stock_amt_invested==""){
      $('#stock_amt_invested').css('border', '1px solid red');
      $('#stock_amt_invested_astrik').show();
      return false;
    }else{
     $('#stock_amt_invested').css('border', '');
      $('#stock_amt_invested_astrik').hide();
    }
   
       if(stock_net_rate==""){
      $('#stock_net_rate').css('border', '1px solid red');
      $('#stock_net_rate_astrik').show();
      return false;
    }else{
     $('#stock_net_rate').css('border', '');
      $('#stock_net_rate_astrik').hide();
    }
    
      if(stock_net_amt==""){
      $('#stock_net_amt').css('border', '1px solid red');
      $('#stock_net_amt_astrik').show();
      return false;
    }else{
     $('#stock_net_amt').css('border', '');
      $('#stock_net_amt_astrik').hide();
    }

   if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
    stock_name : $('#stock_name').val(),
   stock_transaction_type : $('#stock_transaction_type').val(),
    stock_broker : $('#stock_broker').val(),
   stock_date : $('#stock_date').val(),
   stock_contract_no : $('#stock_contract_no').val(),
   stock_settlement_no : $('#stock_settlement_no').val(),
    stock_qty : $('#stock_qty').val(),
    stock_purchase_price : $('#stock_purchase_price').val(),
    stock_amt_invested : $('#stock_amt_invested').val(),
    stock_brokerage : $('#stock_brokerage').val(),
    stock_net_rate : $('#stock_net_rate').val(),
    stock_tax_value : $('#stock_tax_value').val(),
    stock_cgst : $('#stock_cgst').val(),
    stock_sgst : $('#stock_sgst').val(), 
    stock_igst : $('#stock_igst').val(),
    stock_exchange_transaction : $('#stock_exchange_transaction').val(),
    stock_stt : $('#stock_stt').val(),
    stock_sebi_fee : $('#stock_sebi_fee').val(),
    stock_stamp_duty : $('#stock_stamp_duty').val(),
    stock_net_amt : $('#stock_net_amt').val()
    };  

   if(valu != "")
   {
   // alert(select_portfolio_name+""+select_assets+""+valu+""+transaction_type+""+agriculture_date);
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_stock",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#stock_alert-msg').html('<div class="alert alert-success text-center">Your Stock has been added successfully!</div>');    $("#stock_table_data").DataTable().ajax.reload();
              }
            else if (msg == 'NO'){
                $('#stock_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#stock_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});


//Investment sub-assets stock code end here..... 


 

// original stock table add and delete from temp_stock end code here...

   //  $('#floattxtbox tbody').on('click', 'tr', function() {
          
   //     var currentRow=$(this).closest("tr");                 
   //     var floatfrom = currentRow.find("#floatfrom").val();
   //   var  floatto =  currentRow.find("#floatto").val();
   //   var floatval = currentRow.find("#floatval").val(); 

   //  // alert(floatfrom+" "+floatto+" "+floatval);
   // });



// All investment forms code ends here ... 


 

// Libality all loan forms code start heres....

$('#loan_bank_name_astrik').hide();
$('#loan_account_no_astrik').hide();
$('#loan_start_date_astrik').hide();

$('#loan_amount_astrik').hide();
$('#loan_period_astrik').hide();

  $('#loan_emi_amt_astrik').hide();
   $('#loan_emi_date_astrik').hide();

 $('#loan_downpayment_amt_astrik').hide();
$('#loan_Interest_rate_type_astrik').hide();
$('#loan_fixed_rate_value_astrik').hide();

$('#addAllLoans').click(function()
 {
     var valu = $('#select_sub_Assets').val();
     var select_portfolio_name = $('#select_portfolio_name').val();
     var select_assets = $('#select_assets').val();  

     var loan_bank_name = $('#loan_bank_name').val();
     var loan_account_no = $('#loan_account_no').val();
     var loan_start_date = $('#loan_start_date').val();
     var loan_amount = $('#loan_amount').val();  
     var loan_period = $('#loan_period').val();
     var loan_end_date = $('#loan_end_date').val();
     var loan_emi_amt = $('#loan_emi_amt').val();
     var loan_emi_date = $('#loan_emi_date').val();
     var loan_total_emipaid = $('#loan_total_emipaid').val();
     var loan_processing_fees = $('#loan_processing_fees').val();
     var loan_downpayment_amt = $('#loan_downpayment_amt').val();
     var loan_balance_amt = $('#loan_balance_amt').val();
     var loan_pre_emi_amt = $('#loan_pre_emi_amt').val();
     var loan_topup_amt = $('#loan_topup_amt').val();
     var loan_Interest_rate_type = $('#loan_Interest_rate_type').val();
     var loan_fixed_rate_value = $('#loan_fixed_rate_value').val();
  

   if(select_assets=="1"){select_assets="Investment";}
   else if(select_assets=="2"){select_assets="Insurance";}
   else if(select_assets=="3"){select_assets="Assets";}
   else if(select_assets=="4"){select_assets="Emergency Fund";}
   else{select_assets="Liability"; }

     if(loan_bank_name==""){
      $('#loan_bank_name').css('border', '1px solid red');
      $('#loan_bank_name_astrik').show();
      return false;
    }else{
     $('#loan_bank_name').css('border', '');
      $('#loan_bank_name_astrik').hide();
    }

    if(loan_account_no==""){
      $('#loan_account_no').css('border', '1px solid red');
      $('#loan_account_no_astrik').show();
      return false;
    }else{
     $('#loan_account_no').css('border', '');
      $('#loan_account_no_astrik').hide();
    }
         if(loan_start_date==""){
      $('#loan_start_date').css('border', '1px solid red');
      $('#loan_start_date_astrik').show();
      return false;
    }else{
     $('#loan_start_date').css('border', '');
      $('#loan_start_date_astrik').hide();
    }
     if(loan_amount==""){
      $('#loan_amount').css('border', '1px solid red');
      $('#loan_amount_astrik').show();
      return false;
    }else{
     $('#loan_amount').css('border', '');
      $('#loan_amount_astrik').hide();
    }
      if(loan_period==""){
      $('#loan_period').css('border', '1px solid red');
      $('#loan_period_astrik').show();
      return false;
    }else{
     $('#loan_period').css('border', '');
      $('#loan_period_astrik').hide();
    }
      if(loan_emi_amt==""){
      $('#loan_emi_amt').css('border', '1px solid red');
      $('#loan_emi_amt_astrik').show();
      return false;
    }else{
     $('#loan_emi_amt').css('border', '');
      $('#loan_emi_amt_astrik').hide();
    }
     if(loan_emi_date==""){
      $('#loan_emi_date').css('border', '1px solid red');
      $('#loan_emi_date_astrik').show();
      return false;
    }else{
     $('#loan_emi_date').css('border', '');
      $('#loan_emi_date_astrik').hide();
    }
     if(loan_downpayment_amt==""){
      $('#loan_downpayment_amt').css('border', '1px solid red');
      $('#loan_downpayment_amt_astrik').show();
      return false;
    }else{
     $('#loan_downpayment_amt').css('border', '');
      $('#loan_downpayment_amt_astrik').hide();
    }
     if(loan_Interest_rate_type==""){
      $('#loan_Interest_rate_type').css('border', '1px solid red');
      $('#loan_Interest_rate_type_astrik').show();
      return false;
    }else{
     $('#loan_Interest_rate_type').css('border', '');
      $('#loan_Interest_rate_type_astrik').hide();
    }
   

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name : select_assets,
       sub_assets_name : valu,
       
      loan_bank_name : $('#loan_bank_name').val(),
      loan_account_no : $('#loan_account_no').val(),
      loan_start_date : $('#loan_start_date').val(),
      loan_amount : $('#loan_amount').val(),  
      loan_period : $('#loan_period').val(),
      loan_end_date : $('#loan_end_date').val(),
      loan_emi_amt : $('#loan_emi_amt').val(),
      loan_emi_date : $('#loan_emi_date').val(),
      loan_total_emipaid : $('#loan_total_emipaid').val(),
      loan_processing_fees : $('#loan_processing_fees').val(),
      loan_downpayment_amt : $('#loan_downpayment_amt').val(),
      loan_balance_amt : $('#loan_balance_amt').val(),
      loan_pre_emi_amt : $('#loan_pre_emi_amt').val(),
      loan_topup_amt : $('#loan_topup_amt').val(),
      loan_Interest_rate_type : $('#loan_Interest_rate_type').val(),
      loan_fixed_rate_value : $('#loan_fixed_rate_value').val()
    };  



   if(valu != "")
   {
   

    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_all_Loan",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
          $('#loan_alert-msg').html('<div class="alert alert-success text-center">Your dat has been added successfully!</div>');    location.reload(true);  
              }
            else if (msg == 'NO'){
                $('#loan_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); }
            else
               {$('#loan_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});



$('#addfloatdata').click(function()
 {
     var valu = $('#select_sub_Assets').val();
     var floating_date_from = $('#floating_date_from').val();
     var floating_date_to = $('#floating_date_to').val();
     var loan_floating_value = $('#loan_floating_value').val(); 

     if(floating_date_from==""){
      $('#floating_date_from').css('border', '1px solid red');
      $('#floating_date_from_astrik').show();
      return false;
    }else{
     $('#floating_date_from').css('border', '');
      $('#floating_date_from_astrik').hide();
    }
      if(floating_date_to==""){
      $('#floating_date_to').css('border', '1px solid red');
      $('#floating_date_to_astrik').show();
      return false;
    }else{
     $('#floating_date_to').css('border', '');
      $('#floating_date_to_astrik').hide();
    }

    if(loan_floating_value==""){
      $('#loan_floating_value').css('border', '1px solid red');
      $('#loan_floating_value_astrik').show();
      return false;
    }else{
     $('#loan_floating_value').css('border', '');
      $('#loan_floating_value_astrik').hide();
    }

     var form_data = {
       sub_assets_name : valu,
      floating_date_from : $('#floating_date_from').val(),
      floating_date_to : $('#floating_date_to').val(),
      loan_floating_value : $('#loan_floating_value').val()
    }

   if(valu != "")
   {

    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/addLoan_floatingRate",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
              $('#floating_date_from').val("");
              $('#floating_date_to').val("");
              $('#loan_floating_value').val("");
               $("#addedfloatrate").DataTable().ajax.reload();
                 $("#loan_Interest_rate_type").attr('disabled', true);
                 $("#loancancle").attr('disabled', true);
                  $("#loanclose").attr('disabled', true);
              }
            else if (msg == 'NO'){ alert(msg); }
             
            else { alert(msg); }
        }
    });

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
// Libality all loan form code ENDS here....

});
</script>