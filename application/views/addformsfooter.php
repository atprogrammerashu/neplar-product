
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
 <script src="<?= base_url('asstes/jqueryvalidation/dist/jquery.validate.min.js'); ?>"></script>
<script src="<?= base_url('asstes/toast/build/toastr.min.js'); ?>"></script>
<script src="<?= base_url('asstes/js/mytoastr.js'); ?>"></script>
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script>
  $(document).ready(function() {
     
     $('.form-group').on('input', '.prc', function(){
   
        $('.form-group .prc').each(function(){
           var num1=$('#stock_qty').val();          
           var num3=$('#stock_purchase_price').val();                    
          $('#stock_amt_invested').val(num1*num3);

          var num4=$('#sgb_qty').val();          
           var num5=$('#sgb_purchase_price').val();                    
          $('#sgb_amt_invested').val(num4*num5);
          
           var num6=$('#bond_qty').val();          
           var num7=$('#bond_purchase_price').val();                    
          $('#bond_amt_invested').val(num6*num7);
         
           
        });      
     });



    function gr_assetn() {
        var select_assets = $('#select_assets').val();
        var portfolio_name = $('#select_portfolio_name').val();
        var assetn, gr,res;
        $.ajax({
            async: false,
            url: "<?php echo base_url(); ?>Add_details/gr_assetn_cont",
            type: 'POST',
            data: {
                portfolio_name: portfolio_name,
                select_assets: select_assets
            },
            dataType: "JSON",
            success: function(data) {
                var s = JSON.stringify(data);
                res = JSON.parse(s);
                assetn = res[1];
                gr = res[0];
            }
        });

        return [gr, assetn];
    }
//start
//part-1
$('.sel_tr').click(function() {

    function_disable_text('#stock_net_rate','#stock_net_amt');
    
    function_disable_text('#sgb_net_rate','#sgb_net_amt');
    function_disable_text('#bond_net_rate','#bond_net_amt');

  });
//part-1 definition
function function_disable_text($net_rate,$net_amt) {
  $($net_rate).prop('disabled', true);
  $($net_amt).prop('disabled', true);
}
///end

///start part-1
var _stock1="#stock_amt_invested,#stock_purchase_price,#stock_qty, #stock_brokerage";
$(_stock1).on( 'change',function() {
  
  function_netrate("#stock_amt_invested","#stock_brokerage","#stock_net_rate",_stock1);
});
///part-2
var _stock_SGB="#sgb_amt_invested,#sgb_purchase_price,#sgb_qty, #sgb_brokerage";
$(_stock_SGB).on( 'change',function() {
  function_netrate('#sgb_amt_invested','#sgb_brokerage','#sgb_net_rate',_stock_SGB);
});
///part-3
var _stock_bond="#bond_amt_invested,#bond_purchase_price,#bond_qty, #bond_brokerage";
$(_stock_bond).on( 'change',function() {
  function_netrate('#bond_amt_invested','#bond_brokerage','#bond_net_rate',_stock_bond);
});
//part-1/2 definition
function function_netrate($amt_inv,$brokerage,$net_rate,$varb) {
  $($varb).change(function () {
  var st1=parseFloat($($amt_inv).val());
  var st2=parseFloat($($brokerage).val());
  
     
  var st3=st1+st2;

  if(!(isNaN(st1) || isNaN(st2))){
     $($net_rate).val(st3);
     
    }
     else if(isNaN(NaN)){          
      var st2=$($brokerage).val() || 0;
      $($net_rate).val(st1 + st2);    
     }
});
}
//////bond start 
$("#bond_sgst").change(function () {

$('#bond_igst').val(2*$('#bond_sgst').val());
$('#bond_cgst').val($('#bond_sgst').val());
             
});
$("#bond_cgst").change(function () {

$('#bond_igst').val(2*$('#bond_cgst').val());
$('#bond_sgst').val($('#bond_cgst').val());

});

$("#bond_igst").change(function () {

$('#bond_cgst').val($('#bond_igst').val() / 2);
$('#bond_sgst').val($('#bond_igst').val() / 2);

});
//////bond ends here 
///////staart STOCK
$("#stock_sgst").change(function () {

$('#stock_igst').val(2*$('#stock_sgst').val());
$('#stock_cgst').val($('#stock_sgst').val());
             
});
$("#stock_cgst").change(function () {

$('#stock_igst').val(2*$('#stock_cgst').val());
$('#stock_sgst').val($('#stock_cgst').val());
             
});

$("#stock_igst").change(function () {

$('#stock_cgst').val($('#stock_igst').val() / 2);
$('#stock_sgst').val($('#stock_igst').val() / 2);

});
///////end STOCK
//////FOR SGB/BOND
$("#sgb_sgst").change(function () {

$('#sgb_igst').val(2*$('#sgb_sgst').val());
$('#sgb_cgst').val($('#sgb_sgst').val());
             
});
$("#sgb_cgst").change(function () {

$('#sgb_igst').val(2*$('#sgb_cgst').val());
$('#sgb_sgst').val($('#sgb_cgst').val());

});

$("#sgb_igst").change(function () {

$('#sgb_cgst').val($('#sgb_igst').val() / 2);
$('#sgb_sgst').val($('#sgb_igst').val() / 2);

});
/////END

//////////part-1 start for stock
var _stock2="#stock_amt_invested,#stock_purchase_price,#stock_qty,#stock_igst, #stock_brokerage,#stock_net_rate, #stock_tax_value,#stock_exchange_transaction,#stock_stt,#stock_sebi_fee,#stock_stamp_duty,#stock_cgst,#stock_sgst";
$(_stock2).on( 'change',function() {
function_net_amt('#stock_amt_invested','#stock_purchase_price','#stock_qty','#stock_igst','#stock_brokerage','#stock_net_rate','#stock_tax_value','#stock_exchange_transaction','#stock_stt','#stock_sebi_fee','#stock_stamp_duty','#stock_net_amt','#stock_cgst','#stock_sgst',_stock2);
});
////part-2 for sgb
var _stock_SGB1="#sgb_amt_invested,#sgb_purchase_price,#sgb_qty,#sgb_igst, #sgb_brokerage,#sgb_net_rate, #sgb_tax_value,#sgb_exchange_transaction,#sgb_stt,#sgb_sebi_fee,#sgb_stamp_duty,#sgb_cgst,#sgb_sgst";
$(_stock_SGB1).on( 'change',function() {
function_net_amt('#sgb_amt_invested','#sgb_purchase_price','#sgb_qty','#sgb_igst','#sgb_brokerage','#sgb_net_rate','#sgb_tax_value','#sgb_exchange_transaction','#sgb_stt','#sgb_sebi_fee','#sgb_stamp_duty','#sgb_net_amt','#sgb_cgst','#sgb_sgst',_stock_SGB1);
});
////part-2 for bond
var _stock_bond="#bond_amt_invested,#bond_purchase_price,#bond_qty,#bond_igst, #bond_brokerage,#bond_net_rate, #bond_tax_value,#bond_exchange_transaction,#bond_stt,#bond_sebi_fee,#bond_stamp_duty,#bond_cgst,#bond_sgst";
$(_stock_bond).on( 'change',function() {
function_net_amt('#bond_amt_invested','#bond_purchase_price','#bond_qty','#bond_igst','#bond_brokerage','#bond_net_rate','#bond_tax_value','#bond_exchange_transaction','#bond_stt','#bond_sebi_fee','#bond_stamp_duty','#bond_net_amt','#bond_cgst','#bond_sgst',_stock_bond);
});
////part-1/2 definition
function function_net_amt($amt_inv,$pur_price,$qty,$igst,$brokerage,$net_rate,$tax,$ex_trans,$stt,$sebi,$stamp,$net_amt,$cgst,$sgst,$varb) {
  $($varb).change(function () {
      var net_rate0=parseFloat($($net_rate).val());
      var net_rate1=parseFloat($($tax).val());
      var net_rate2=parseFloat($($igst).val());
         
       
      var net_rate3=parseFloat($($ex_trans).val());
      var net_rate4=parseFloat($($stt).val());
      var net_rate5=parseFloat($($sebi).val());
      var net_rate6=parseFloat($($stamp).val());
    
      var net_rat=net_rate0 + net_rate1 + net_rate2 + net_rate3 + net_rate4 + net_rate5 + net_rate6;
      
      
if(!(isNaN(net_rate0) || isNaN(net_rate1) || isNaN(net_rate2)|| isNaN(net_rate3)|| isNaN(net_rate4)|| isNaN(net_rate5)|| isNaN(net_rate6) )){
     $($net_amt).val(net_rat);     
    }
     else if(isNaN(NaN)){          
      //  alert(isNaN(net_rate6));
      var net_rate1=parseFloat($($tax).val()) || 0;      
      var net_rate2=parseFloat($($igst).val()) || 0;      
      var net_rate3=parseFloat($($ex_trans).val())|| 0;
      var net_rate4=parseFloat($($stt).val())|| 0;
      var net_rate5=parseFloat($($sebi).val())|| 0;
      var net_rate6=parseFloat($($stamp).val())|| 0;
      //     
      $($net_amt).val(net_rate0 + net_rate1+ net_rate2+ net_rate3+ net_rate4 + net_rate5 + net_rate6);       
     }  
}); 

}
/////////////END
    
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
//validation code starts from here
jQuery.getScript('http://shubh.neplar.in/asstes/js/custom_validate.js');

//validation code ends from here
//pan uppercase
$('#pan').keyup(function() {
  $(this).val($(this).val().toUpperCase());
});
$('#update_pan').keyup(function() {
  $(this).val($(this).val().toUpperCase());
});
// pan ends here
//letters only
 jQuery.validator.addMethod("lettersonly", function(value, element) {
      return this.optional(element) || /^[a-z\s]+$/i.test(value);
    }, "Only alphabetical characters");
//ends here letters
// Add transaction select button code ----
$('#select_portfolio_astrik').hide();
$('#select_assets_astrik').hide();
  $('#select_sub_Assets_astrik').hide();
  
 var sel_trans = '#select_portfolio_name,#select_assets,#select_sub_Assets';
 var sel_ast='#select_portfolio_astrik,#select_assets_astrik,#select_sub_Assets_astrik';
    $(sel_trans).keyup(function(e) {
      $(sel_trans).css('border', '');
      $(sel_ast).hide();
    })
    ////////////////////////
$(sel_trans).on('change', function() {
      $(sel_trans).css('border', '');
      $(sel_ast).hide();
    })

$('#select_transaction').click(function(){

  //add transaction select portfolio field validation start
   var select_portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
   var select_sub_Assets = $('#select_sub_Assets').val();
     if ('Select Portfolio' == $('#select_portfolio_name').val()) {
        $('#select_portfolio_name').css('border', '1px solid red');
        $('#select_portfolio_astrik').show();
        $('#select_portfolio_name').focus();
        return false;
      } else {
        $('#select_portfolio_name').css('border', '');
        $('#select_portfolio_astrik').hide();
      }
       if ("Select Assets" == $('#select_assets').val()) {
        $('#select_assets').css('border', '1px solid red');
        $('#select_assets').focus();
        $('#select_assets_astrik').show();
        return false;
      } else {
        $('#select_assets').css('border', '');
        $('#select_assets_astrik').hide();
      }
      if ("Select Sub Assets" == $('#select_sub_Assets').val()) {
        $('#select_sub_Assets').css('border', '1px solid red');
        $('#select_sub_Assets').focus();
        $('#select_sub_Assets_astrik').show();
        return false;
      } else {
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
    //     $("#sgbheading").empty(); 
            $('#addBond').modal('show');  
   
    }

     else if (valu == "Stock / Share") { $('#addStock').modal('show'); }
    else if (valu == "MF / Mutual Fund") { $('#addMutualFund').modal('show'); }
    else if (valu == "KVP / Kishan Vikas Patra") { $('#addKisanVikasPatra').modal('show'); }
    else if (valu == "NSC / National Saving Certificate") { $('#addNSC').modal('show'); }
     else if (valu == "PPF / Public Provident Fund") { $('#addPPF').modal('show'); }
      else if (valu == "EPF / Employee Provident Fund") { $('#addEPF').modal('show'); }
     else if (valu == "SSY / Sukanya Samriddhi Yojana") { $('#addSukanya').modal('show'); }
     else if (valu == "SGB / Sovereign Gold Bond") {
    //   $("#sgbheading").empty(); 
      $('#addSGB').modal('show');

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
//group key/change code
$('#astrik').hide();
      $('#group_name').on('change', function() {
      $('#group_name').css('border', '');
      $('#astrik').hide();
    })
$('#group_name').keyup(function(e) {
      $('#group_name').css('border', '');
      $('#astrik').hide();
    })

$('#group_submit').click(function() {
   var group_name = $('#group_name').val();

    if(group_name==""){
      $('#group_name').css('border', '1px solid red');
      $('#group_name').focus();
      $('#astrik').show();
      return false;
    }else{
       $('#group_name').css('border', '');
      $('#astrik').hide();
    }
 if (group_name != "") {
    var form_data = {
        user_id: $('#user_id').val(),
        group_name: $('#group_name').val()
    };
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_group",
        type: 'POST',
        data: form_data,
       success: function(msg) {
              if (msg == 'YES') {

                $("#addGroup").modal('hide');
                $('#addGroup').on('hidden.bs.modal', function() {
                  $(this).find('form').trigger('reset');
                })
                toastr.success(group_name + " has been added successfully!!");
              } 
              else if (msg == 'NO') {
                toastr.error(msg);
              } else {
                toastr.error(msg);
              }
            }
    });
 }
    return false;
});
//add group code end....

//edit group code start....
 $('#update_group_name_astrik').hide();
 $('#update_group_value_astrik').hide();
 
var up = '#update_group_name,#update_group_value';
var as='#update_group_name_astrik,#update_group_value_astrik';
$(up).on('change', function() {
  $(up).css('border', '');
  $(as).hide();     
})
///////////////////////////////
$(up).keyup(function(e) {
  $(up).css('border', '');
  $(as).hide();
  })

$('#update_group_submit').click(function() {
   var update_group_name = $('#update_group_name').val();
   var update_group_value = $('#update_group_value').val();
   // var grp_id = $('#update_group_name #grp_id').html(); alert(grp_id); exit();
      if(update_group_name==""){
      $('#update_group_name').css('border', '1px solid red');
      $('#update_group_name_astrik').show();
      $('#update_group_name').focus();
      return false;
    }else{
       $('#update_group_name').css('border', '');
      $('#update_group_name_astrik').hide();
    }
    if(update_group_value==""){
      $('#update_group_value').css('border', '1px solid red');
      $('#update_group_value_astrik').show();
      $('#update_group_value').focus();
      return false;
    }else{
       $('#update_group_value').css('border', '');
      $('#update_group_value_astrik').hide();
    }
    if (update_group_name != "" && update_group_value != "") {
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
              $('#update_grp_form').trigger("reset");
              $("#editGroup").modal('hide');
              toastr.success(msg);
                          }
            else if (msg == 'NO'){
                  toastr.error(msg);
                }
            else
               {toastr.error(msg);
           }
        }
    });
   }
    return false;
});
//edit group code end....

//add_portfolio code start.........
//add port astrik hide
var portfolio_all_var_ast='#portfolio_name_astrik,#port_date_astrik,#full_name_astrik,#port_group_astrik,#port_gender_astrik,#pran_astrik,#einsurance_no_astrik,#port_address_astrik,#port_city_astrik,#port_country_astrik,#pin_code_astrik,#pan_astrik';
$(portfolio_all_var_ast).hide();
//add port astrik hide ends here

//hiding border/astrik color while typing
var portfolio_all_var = "#portfolio_name, #full_name,#pan,#pin_code,#port_country,#port_city,#port_address,#port_date,#einsurance_no,#pran,#port_group,#port_gender,#port_group_chosen";
var portfolio_all_var_ast='#portfolio_name_astrik,#full_name_astrik,#pan_astrik,#pin_code_astrik,#port_country_astrik,#port_city_astrik,#port_address_astrik,#port_date_astrik,#einsurance_no_astrik,#pran_astrik,#port_group_astrik,#port_gender_astrik';
$(portfolio_all_var).keyup(function(e) {
  
  $(portfolio_all_var).css('border', '');
  $(portfolio_all_var_ast).hide();
});

$(portfolio_all_var).on('change', function() {

  $(portfolio_all_var).css('border', '');
  $(portfolio_all_var_ast).hide();
})
//hiding border/astrik color ends here while typing

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
      $('#portfolio_name').focus();
      return false;
    }else{
      $('#portfolio_name').css('border', '');
      $('#portfolio_name_astrik').hide();
    }

   if(port_date=="")
    {
      $('#port_date').css('border', '1px solid red');
      $('#port_date_astrik').show();
      $('#port_date').focus();
      
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
      $('#full_name').focus();
      return false;
    }
    else{
        $('#full_name').css('border', '');
      $('#full_name_astrik').hide();
        }
        
    if ('Choose your group' == $('#port_group').val()) {
        $('#port_group_chosen').css('border', '1px solid red');
        $('#port_group_astrik').show();
        $('#port_group').focus();
    return false;
    } else {
        $('#port_group').css('border', '');
        $('#port_group_astrik').hide();
    }

  if ('Choose gender' == $('#port_gender').val()) {
        $('#port_gender').css('border', '1px solid red');
        $('#port_gender_astrik').show();
        $('#port_gender').focus();
    return false;
  } else {
        $('#port_gender').css('border', '');
        $('#port_gender_astrik').hide();
  }

    if(port_address=="")
    {
       $('#port_address').css('border', '1px solid red');
      $('#port_address_astrik').show();
      $('#port_address').focus();
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
      $('#port_city').focus();
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
      $('#port_country').focus();
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
       $('#pin_code').focus();
      return false;
    }
    else{
        $('#pin_code').css('border', '');
      $('#pin_code_astrik').hide();
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
                 $("#addPortfolio").modal('hide'); 
                 toastr.success(msg, "New Portfolio has been addedd successfully!!");
                    $('#add_port_form').trigger("reset");
                    var validator_add_port = $( "#add_port_form" ).validate();
                    validator_add_port.resetForm();
                         }
            else if (msg == 'NO'){
                toastr.error(msg);
            }
            else
               { toastr.error(msg);
               }
        }
    });
    return false;
});



//edit portfolio fetch code start.........
  

$('#update_portfolio_name').change(function() {
    var portfolio_name = $('#update_portfolio_name').val();
    
   if(portfolio_name != '')
  { 
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/fetch_edit_portfolio",
        type: 'POST',
        data: {portfolio_name:portfolio_name},
        dataType: "JSON",
        success: function(jsonStr) {
             var res_data = JSON.stringify(jsonStr);
             var response = JSON.parse(res_data);
             var responseData = response['responseData'];
                if ((responseData != null)) 
                 { 
                   $("#hide_portname").val(responseData['id']);
                   $("#update_port_date").val(responseData['port_date']);
                   $("#update_full_name").val(responseData['full_name']);  
                   $("#update_port_gender").val(responseData['port_gender']);  
                   $("#update_port_address").val(responseData['port_address']); 
                   $("#update_port_city").val(responseData['port_city']); 
                   $("#update_pran").val(responseData['pran']); 
                   $("#update_einsurance_no").val(responseData['einsurance_no']); 
                   $("#update_port_country").val(responseData['port_country']); 
                   $("#update_pin_code").val(responseData['pin_code']); 
                   $("#update_pan").val(responseData['pan']); 
                 }  
        }
       });
       }
        else
        { 
           alert("Server error..!!!");
        }
});
// end of edit portfolio fetch data....
 //update portfolio key/change code while typing
var up_ch='#update_portfolio_name,#update_port_date,#update_full_name,#update_port_gender,#update_port_address,#update_port_city,#update_port_country,#update_pin_code';
var up_pkey="#update_port_gender_astrik,#update_port_address_astrik,#update_port_city_astrik,#update_port_country_astrik,#update_full_name_astrik,#update_port_date_astrik";
$(up_ch).on('change', function() {
  $(up_ch).css('border', '');
  $(up_pkey).hide();      
})

$(up_ch).keyup(function(e) {
  $(up_ch).css('border', '');
  $(up_pkey).hide();
})
  //update portfolio key/change code while typing ends here
  
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
 
if ('Choose portfolio name' == oldportfolio_name) {
    $('#update_portfolio_name').css('border', '1px solid red');
    $('#update_portfolio_name').focus();
    return false;
  } else {
  }

  if (port_date == "") {
    $('#update_port_date').css('border', '1px solid red');
    $('#update_port_date_astrik').show();
    $('#update_port_date').focus();
    return false;
  } else {
  }

  if (full_name == "") {
    $('#update_full_name').css('border', '1px solid red');
    $('#update_full_name_astrik').show();
    $('#update_full_name').focus();
    return false;
  } else {
  }  

  if (port_gender == "") {
    $('#update_port_gender').css('border', '1px solid red');
    $('#update_port_gender_astrik').show();
    $('#update_port_gender').focus();
    return false;
  } else {       
  }

  if (port_address == "") {
    $('#update_port_address').css('border', '1px solid red');
    $('#update_port_address_astrik').show();
    $('#update_port_address').focus();
    return false;
  } else {
  
  }
  if (port_city == "") {
    $('#update_port_city').css('border', '1px solid red');
    $('#update_port_city_astrik').show();
    $('#update_port_city').focus();
    return false;
  } else {
  
  }
  if (port_country == "") {
    $('#update_port_country').css('border', '1px solid red');
    $('#update_port_country_astrik').show();
    $('#update_port_country').focus();
    return false;
  } else {
 
  }
  if (pin_code == "") {
    $('#update_pin_code').css('border', '1px solid red');
    $('#update_pin_code_astrik').show();
    $('#update_pin_code').focus();
    return false;
  } else {
  
  }
  
      if (oldportfolio_name != "" && port_date != "" && full_name !== "" &&
        port_group != "" && port_gender !== "" &&
        port_address !== "" && port_city != "" &&
        port_country !== "" && pin_code !== "") {

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
                  $("#editPortfolio").modal('hide');
                  $("#edit_port_form").trigger("reset");
                  toastr.success(msg);
                //   location.reload(true);
                             }
            else if (msg == 'NO'){
                  toastr.error(msg);
           
                
            }
            else
               {
                     toastr.error(msg);
               
               }
        }
    });
}
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
            {  toastr.error(data);  }
            else{ 
             toastr.error(data, oldportfolio_name+"    Portfolio successfully deleted"); 
             $("#editPortfolio").modal('hide'); 

            }
          }
             
         });
        }
        else
        { 
             toastr.error(data);
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



//assets transaction astrik hide
  var all_assets_astrik_var = '#assets_transaction_type_astrik,#assets_date_astrik,#assets_avg_price_astrik,#assets_quantity_astrik,#assets_amt_invested_astrik,#assets_present_value_astrik';
  $(all_assets_astrik_var).hide();

  ///trigger reset/validate reset on cancel/close click of all forms
  var cancle_of_all = " #can_epf, #can_ppf,#can_ulip_form, #can_nsc, #can_insurance_form,#can_trv_form, #can_lifeInsuranceEnd_form, #closesgb, #sgbcancle,#bondcancle, #can_kisan, #loancancle, #can_sukanya, #can_stock, #can_mutual, #can_nps, #can_ncd, #can_bond, #can_fd, #can_private, #can_scss, #can_rd, #grp_cancel, #assetsCancle, #asstesClose, #portf_cancel, #edit_port_cancel,#grp_update_cancle,#emergencycancle,#emergencyclose";
  
   $('#close_add').on('click', function() {
          var a = $('#form_add').trigger("reset");
          var sel_port_var = '#select_portfolio_name,#select_assets,#select_sub_Assets';
          var sel_port_ast = '#select_portfolio_astrik,#select_assets_astrik,#select_sub_Assets_astrik';
    if (a) {
      $(sel_port_var).css('border', '');
      $(sel_port_ast).hide();
    }
   });

  $(cancle_of_all).on('click', function() {

    //add transaction ke pehle form ka cancel button(close add)
    // $(".form_validation_class").data('validator').resetForm();
 
    
    
    // group cancel ki cancel button ka code(grp cancle)
    var b = $('#grpform').trigger("reset");
    var validator_grp = $( "#grpform" ).validate();
    validator_grp.resetForm();
    if (b) {
      $('#group_name').css('border', '');
      $('#astrik').hide();
    }

    //(grp update cancle)
    var grp = $('#update_grp_form').trigger("reset");
    if (grp) {
      $('#update_group_value_astrik').hide();
      $('#update_group_name_astrik').hide();
      $('#update_group_value').css('border', '');
      $('#update_group_name').css('border', '');
      var validator_up_grp = $( "#update_grp_form" ).validate();
      validator_up_grp.resetForm();
    }

    //asset form ki cancle button ka code (assets cancle)
    var c = $('#asset_cancel_form').trigger("reset");
    if (c) {
      $(all_assets_astrik_var).hide();
      $(all_assets_var).css('border', '');
      var validator_asset = $( "#asset_cancel_form" ).validate();
      validator_asset.resetForm();
      

    }

    //emerge form ki validate reset ka code
    var emerge_only_var = '#cash_bank_name,#cashinhand_date,#amt_invested,#current_value';        
    var emerge_ast_var = '#cashinhand_date_astrik,#cash_amt_invested_astrik,#cash_current_value_astrik';
    var d = $('#emerge_cancel_form').trigger("reset");
    if (d) {
      $(emerge_only_var).css('border', '');
      $(emerge_ast_var).hide();
      var validator_emerge = $( "#emerge_cancel_form" ).validate();
      validator_emerge.resetForm();

    }

    //add portfolio ki cancel button ka code (portf_cancel)
    var m = $('#add_port_form').trigger("reset");
    var validator_add_port = $( "#add_port_form" ).validate();
    validator_add_port.resetForm();
    if (m) {
      $(portfolio_all_var).css('border', '');
      $(portfolio_all_var_ast).hide();

    }

    //edit portfolio ki cancel button ka code(edit port)
    var up_port_all_var = '#update_portfolio_name,#update_port_date,#update_full_name,#update_port_gender,#update_port_address,#update_port_city,#update_port_country,#update_pin_code';
    var up_port_ast_var = "#update_port_gender_astrik,#update_port_address_astrik,#update_port_city_astrik,#update_port_country_astrik,#update_full_name_astrik,#update_port_date_astrik";
    var q = $('#edit_port_form').trigger("reset");
    var validator_edit_port = $( "#edit_port_form" ).validate();
    validator_edit_port.resetForm();
    if (q) {
      $(up_port_all_var).css('border', '');
    }
    

   //Insurance ki cancel button ka code
    var ins_ast="#insurance_company_name_astrik,#travel_sum_assured_astrik,#insurance_no_claim_astrik,#insurance_sum_assured_astrik,#insurance_premium_tenure_astrik,#insurance_nextpremium_date_astrik,#insurance_frequency_astrik,#insurance_premium_amt_astrik,#insurance_policy_name_astrik,#insurance_policy_no_astrik,#insurance_value_astrik,#insurance_policy_start_date_astrik,#insurance_maturity_date_astrik,#insurance_premium_date_astrik";
    var ins_val="#insurance_company_name,#insurance_nextpremium_date,#insurance_sum_assured,#insurance_no_claim,#insurance_frequency,#insurance_maturity_date,#insurance_maturity_benifits,#insurance_lockin_period,#insurance_premium_date,#insurance_premium_amt,#insurance_premium_tenure,#insurance_policy_start_date,#insurance_value,#insurance_policy_no,#travel_sum_assured,#insurance_policy_name";
    var ins = $('#insurance_form').trigger("reset");
    // var validator_insurance = $( "#insurance_form" ).validate();
    // validator_insurance.resetForm();
    if (ins) {
      $(ins_val).css('border', '');
       $(ins_ast).hide();
    }
    //lifeInsuranceEnd_form ki cancel button ka code
    var life_var_ast="#life_company_name_astrik,#life_moneyback_date_astrik,#insurance_totalpremium_astrik,#insurance_topup_astrik,#life_moneyback_amt_astrik,#life_vasted_bonus_astrik,#life_bonus_accumulated_astrik,#life_sum_assured_astrik,#life_no_claim_astrik,#life_sum_assured_astrik,#life_premium_tenure_astrik,#life_nextpremium_date_astrik,#life_frequency_astrik,#life_premium_amt_astrik,#life_premium_date_astrik,#life_maturity_date_astrik,#life_policy_start_date_astrik,#life_policy_name_astrik,#life_policy_no_astrik,#life_value_astrik";
    var life_var="#life_company_name, #life_moneyback_amt, #life_frequency,#life_moneyback_date, #life_nextpremium_date, #life_premium_tenure, #life_bonus_accumulated, #life_vasted_bonus, #life_policy_name, #life_policy_no, #life_sum_assured, #life_policy_start_date, #life_maturity_date, #life_premium_date, #life_premium_amt";
    var lifeIns = $('#lifeInsuranceEnd_form').trigger("reset");
    var validator_lifeInsuranceEnd = $( "#lifeInsuranceEnd_form" ).validate();
    validator_lifeInsuranceEnd.resetForm();
    if (lifeIns) {
      $( life_var).css('border', '');
       $(life_var_ast).hide();
    }
    //trv_form ki cancel button ka code
    var tra_var_ast="#travel_company_name_astrik, #travel_policy_name_astrik, #travel_policy_no_astrik, #trvlsum_assured_astrik, #travel_value_astrik, #travel_policy_start_date_astrik, #travel_maturity_date_astrik, #travel_premium_date_astrik, #travel_premium_amt_astrik, #travel_frequency_astrik, #travel_premium_tenure_astrik, #travel_nextpremium_date_astrik";
    var tra_var="#travel_company_name, #travel_policy_name, #travel_policy_no, #trvlsum_assured, #travel_policy_start_date, #travel_maturity_date, #travel_premium_date, #travel_premium_amt, #travel_frequency, #travel_nextpremium_date, #travel_premium_tenure";
    var trv = $('#trv_form').trigger("reset");
    var validator_trv = $( "#trv_form" ).validate();
    validator_trv.resetForm();
    if (trv) {
      $(tra_var).css('border', '');
       $(tra_var_ast).hide();
    }
    //ulip_form ki cancel button ka code
    var ulip_var_ast="#ulip_totalpremium_astrik,#ulip_company_name_astrik,#ulip_policy_name_astrik,#ulip_policy_no_astrik,#ulip_value_astrik,#ulip_policy_start_date_astrik,#ulip_maturity_date_astrik,#ulip_premium_date_astrik,#ulip_premium_amt_astrik,#ulip_frequency_astrik,#ulip_topup_astrik,#ulip_no_claim_astrik,#ulip_sum_assured_astrik,#ulip_premium_tenure_astrik,#ulip_nextpremium_date_astrik ";
    var ulip_var="#ulip_company_name,#ulip_policy_name,#ulip_policy_no,#ulip_sum_assured,#ulip_policy_start_date,#ulip_maturity_date,#ulip_premium_date,#ulip_premium_amt,#ulip_frequency,#ulip_nextpremium_date,#ulip_premium_tenure,#ulip_topup,#ulip_totalpremium";
    var ulip = $('#ulip_form').trigger("reset");
    var validator_ulip = $( "#ulip_form" ).validate();
    validator_ulip.resetForm();
    if (ulip) {
      $(ulip_var).css('border', '');
       $( ulip_var_ast).hide();
    }
    //sgb_form ki cancel button ka code
    var sgb_var_ast="#sgb_stock_name_astrik,#sgb_transaction_type_astrik,#sgb_broker_astrik,#sgb_date_astrik,#sgb_qty_astrik,#sgb_purchase_price_astrik,#sgb_amt_invested_astrik,#sgb_net_rate_astrik,#sgb_net_amt_astrik";
    var sgb_var="#sgb_stock_name,#sgb_transaction_type,#sgb_broker,#sgb_date,#sgb_qty,#sgb_purchase_price,#sgb_amt_invested,#sgb_net_rate,#sgb_net_amt";
    var sgb = $('#sgb_form').trigger("reset");
    var validator_sgb = $( "#sgb_form" ).validate();
    validator_sgb.resetForm();
    if (sgb) {
      $(sgb_var).css('border', '');
       $(sgb_var_ast).hide();
    }
    //bond_form ki cancel button ka code
    var bond_var_ast="#bond_stock_name_astrik,#bond_transaction_type_astrik,#bond_broker_astrik,#bond_date_astrik,#bond_qty_astrik,#bond_purchase_price_astrik,#bond_amt_invested_astrik,#bond_net_rate_astrik,#bond_net_amt_astrik";
    var bond_var="#bond_stock_name,#bond_transaction_type,#bond_broker,#bond_date,#bond_qty,#bond_purchase_price,#bond_amt_invested,#bond_net_rate,#bond_net_amt";
    var bond = $('#bond_form').trigger("reset");
    var validator_bond = $( "#bond_form" ).validate();
    validator_bond.resetForm();
    if (bond) {
      $(bond_var).css('border', '');
       $(bond_var_ast).hide();
    }
    //loan_form ki cancel button ka code
    var loan_var_ast="#loan_bank_name_astrik,#loan_account_no_astrik,#loan_start_date_astrik,#loan_amount_astrik,#loan_period_astrik,#loan_emi_amt_astrik,#loan_emi_date_astrik,#loan_downpayment_amt_astrik,#loan_Interest_rate_type_astrik,#loan_fixed_rate_value_astrik";
    var loan_var="#loan_bank_name, #loan_account_no, #loan_topup_amt, #loan_fixed_rate_value, #loan_balance_amt, #loan_pre_emi_amt, #loan_end_date, #loan_processing_fees, #loan_total_emipaid, #loan_start_date, #loan_amount, #loan_period, #loan_emi_amt, #loan_emi_date, #loan_downpayment_amt, #loan_Interest_rate_type";
    var loan = $('#loan_form').trigger("reset");
    var validator_loan = $( "#loan_form" ).validate();
    validator_loan.resetForm();
    if (loan) {
      $(loan_var).css('border', '');
       $(loan_var_ast).hide();
    }
    //sukanya_form ki cancel button ka code
    var sukanya_ast="#sukanya_transaction_type_astrik,#sukanya_account_no_astrik,#sukanya_opening_date_astrik,#sukanya_maturity_date_astrik,#sukanya_date_astrik,#sukanya_amt_invested_astrik,#sukanya_interest_rate_astrik";
    var sukanya_var="#sukanya_transaction_type, #sukanya_account_no, #sukanya_opening_date, #sukanya_maturity_date, #sukanya_date, #sukanya_amt_invested, #sukanya_interest_rate";
    var sukanya = $('#sukanya_form').trigger("reset");
    var validator_sukanya = $( "#sukanya_form" ).validate();
    validator_sukanya.resetForm();
    if (sukanya) {
      $(sukanya_var).css('border', '');
       $(sukanya_ast).hide();
    }
    //epf_form ki cancel button ka code
    var epf_var_ast="#epf_transaction_type_astrik,#epf_account_no_astrik,#epf_start_date_astrik,#epf_maturity_date_astrik";
    var epf_var="#epf_transaction_type,#epf_account_no,#epf_start_date,#epf_maturity_date";
    var epf = $('#epf_form').trigger("reset");
    var validator_epf = $( "#epf_form" ).validate();
    validator_epf.resetForm();
    if (epf) {
      $( epf_var).css('border', '');
       $(epf_var_ast).hide();
    }
    //ppf_form ki cancel button ka code
    var ppf_var_ast="#ppf_transaction_type_astrik,#ppf_account_no_astrik,#ppf_opening_date_astrik,#ppf_date_astrik,#ppf_maturity_date_astrik,#ppf_amt_invested_astrik,#ppf_interest_rate_astrik";
    var ppf_var="#ppf_transaction_type,#ppf_account_no,#ppf_date,#ppf_opening_date,#ppf_maturity_date,#ppf_amt_invested,#ppf_interest_rate";
    var ppf = $('#ppf_form').trigger("reset");
    var validator_ppf = $( "#ppf_form" ).validate();
    validator_ppf.resetForm();
    if (ppf) {
      $(ppf_var).css('border', '');
       $(ppf_var_ast).hide();
    }
    //nsc_form ki cancel button ka code
    var nsc_var_ast="#nsc_transaction_type_astrik,#nsc_account_no_astrik,#nsc_type_astrik,#nsc_opening_date_astrik,#nsc_amt_invested_astrik,#nsc_interest_rate_astrik,#nsc_maturity_date_astrik,#nsc_maturity_amt_astrik";
    var nsc_var="#nsc_transaction_type,#nsc_account_no,#nsc_type,#nsc_opening_date,#nsc_amt_invested,#nsc_interest_rate,#nsc_maturity_date,#nsc_maturity_amt";
    var nsc = $('#nsc_form').trigger("reset");
    var validator_nsc = $( "#nsc_form" ).validate();
    validator_nsc.resetForm();
    if (nsc) {
      $(nsc_var).css('border', '');
       $(nsc_var_ast).hide();
    }
    //kisan_form ki cancel button ka code
    var kisan_var_ast="#kisan_transaction_type_astrik,#kisan_account_no_astrik,#kisan_start_date_astrik,#kisan_muturity_date_astrik,#kisan_amt_invested_astrik,#kisan_maturity_amt_astrik,#kisan_interest_rate_astrik";
    var kisan_var="#kisan_transaction_type,#kisan_account_no,#kisan_start_date,#kisan_muturity_date,#kisan_amt_invested,#kisan_maturity_amt,#kisan_interest_rate";
    var kisan = $('#kisan_form').trigger("reset");
    var validator_kisan = $( "#kisan_form" ).validate();
    validator_kisan.resetForm();
    if (kisan) {
      $( kisan_var).css('border', '');
       $(kisan_var_ast).hide();
    }
    //nps_form ki cancel button ka code
    var nps_var_ast="#nps_opening_date_astrik,#nps_type_astrik,#nps_pran_no_astrik,#nps_scheme_astrik,#nps_transaction_type_astrik,#nps_date_astrik,#nps_qty_astrik,#nps_purchase_price_astrik,#nps_amt_invested_astrik";
    var nps_var="#nps_opening_date,#nps_type,#nps_pran_no,#nps_scheme,#nps_transaction_type,#nps_date,#nps_qty,#nps_purchase_price,#nps_amt_invested";
    var nps = $('#nps_form').trigger("reset");
    var validator_nps = $( "#nps_form" ).validate();
    validator_nps.resetForm();
    if (nps) {
      $( nps_var).css('border', '');
       $(nps_var_ast).hide();
    }
    //private_form ki cancel button ka code
    var pe_var_ast="#pe_asset_name_astrik,#pe_startup_astrik,#pe_start_date_astrik,#pe_transaction_type_astrik,#pe_date_astrik,#pe_qty_purchase_astrik,#pe_purchase_rate_astrik,#pe_amt_invested_astrik";
    var pe_var="#pe_asset_name,#pe_startup,#pe_start_date,#pe_transaction_type,#pe_date,#pe_qty_purchase,#pe_purchase_rate,#pe_amt_invested";
    var priv = $('#private_form').trigger("reset");
    var validator_private = $( "#private_form" ).validate();
    validator_private.resetForm();
    if (priv ) {
      $(pe_var).css('border', '');
       $(pe_var_ast).hide();
    }
    //scss_form ki cancel button ka code
    var scss_var_ast="#scss_transaction_type_astrik, #scss_account_no_astrik, #scss_muturity_date_astrik, #scss_lockin_period_astrik, #scss_date_astrik, #scss_amt_invested_astrik";
    var scss_var="#scss_transaction_type,#scss_account_no,#scss_muturity_date,#scss_lockin_period,#scss_date,#scss_amt_invested";
    var scss = $('#scss_form').trigger("reset");
    var validator_scss = $( "#scss_form" ).validate();
    validator_scss.resetForm();
    if (scss) {
      $(scss_var).css('border', '');
       $(scss_var_ast).hide();
    }
    //rd_form ki cancel button ka code
    var rd_ast_var="#rd_type_astrik,#rd_account_no_astrik,#rd_transaction_type_astrik,#rd_interest_rate_astrik,#rd_maturity_date_astrik,#rd_start_date_astrik,#rd_amt_invested_astrik";
    var rd_var="#rd_type,#rd_account_no,#rd_transaction_type,#rd_interest_rate,#rd_maturity_date,#rd_start_date,#rd_amt_invested";
    var rd = $('#rd_form').trigger("reset");
    var validator_rd = $( "#rd_form" ).validate();
    validator_rd.resetForm();
    if (rd) {
      $(rd_var).css('border', '');
       $(rd_ast_var).hide();
    }
    //fd_form ki cancel button ka code
    var fd_var_ast="#fd_type_astrik,#fd_account_no_astrik,#fd_transaction_type_astrik,#fd_interest_rate_astrik,#fd_maturity_date_astrik,#fd_start_date_astrik,#fd_amt_invested_astrik";
    var fd_var="#fd_type,#fd_account_no,#fd_transaction_type,#fd_interest_rate,#fd_maturity_date,#fd_start_date,#fd_amt_invested";
    var fd = $('#fd_form').trigger("reset");
    var validator_fd = $( "#fd_form" ).validate();
    validator_fd.resetForm();
    if (fd) {
      $(fd_var).css('border', '');
       $(fd_var_ast).hide();
    }
    //ncd_form ki cancel button ka code
    var ncd_var_ast="#ncd_type_astrik,#ncd_name_astrik,#ncd_transaction_type_astrik,#ncd_date_astrik,#ncd_purchase_price_astrik,#ncd_quantity_astrik,#ncd_amt_invested_astrik,#ncd_interest_payout_astrik,#ncd_interest_rate_astrik,#ncd_interest_payable_astrik,#ncd_maturity_date_astrik";
    var ncd_var="#ncd_type,#ncd_name,#ncd_transaction_type,#ncd_date,#ncd_purchase_price,#ncd_quantity,#ncd_amt_invested,#ncd_interest_payout,#ncd_interest_rate,#ncd_interest_payable,#ncd_maturity_date";
    var ncd = $('#ncd_form').trigger("reset");
    var validator_ncd = $( "#ncd_form" ).validate();
    validator_ncd.resetForm();
    if (ncd) {
      $(ncd_var).css('border', '');
       $(ncd_var_ast).hide();
    }
    //mutual_form ki cancel button ka code
    var mut_var_ast="#mutual_company_name_astrik,#mutual_scheme_astrik,#mutual_folio_no_astrik,#mutual_transaction_astrik,#mutual_type_astrik,#mutual_sip_date_astrik,#mutual_date_astrik,#mutual_quantity_astrik,#mutual_amt_invested_astrik,#mutual_nav_astrik";
    var mut_var="#mutual_company_name,#mutual_scheme,#mutual_folio_no,#mutual_transaction,#mutual_type,#mutual_date,#mutual_quantity,#mutual_nav,#mutual_amt_invested";
    var mutual = $('#mutual_form').trigger("reset");
    var validator_mutual = $( "#mutual_form" ).validate();
    validator_mutual.resetForm();
    if (mutual) {
      $(mut_var).css('border', '');
       $(mut_var_ast).hide();
    }
    //stock_form ki cancel button ka code
    var stok_var_ast="#stock_net_amt_astrik, #stock_name_astrik, #stock_transaction_type_astrik, #stock_broker_astrik, #stock_date_astrik, #stock_qty_astrik, #stock_net_rate_astrik, #stock_amt_invested_astrik, #stock_purchase_price_astrik";
    var stok_var="#stock_name,#stock_transaction_type,#stock_broker,#stock_date,#stock_qty,#stock_purchase_price,#stock_amt_invested,#stock_net_rate,#stock_net_amt";
    var stoc = $('#stock_form').trigger("reset");
    $("#stock_form")[0].reset();
    var validator_stock = $( "#stock_form" ).validate();
    validator_stock.resetForm();
    if (stoc) {
      $(stok_var).css('border', '');
       $(stok_var_ast).hide();
    }
   
    
  })
  
var all_assets_var = '#assets_transaction_type,#assets_date,#assets_avg_price,#assets_quantity,#assets_amt_invested,#assets_present_value';
  $(all_assets_var).on('change', function() {
    $(all_assets_var).css('border', '');
    $(all_assets_astrik_var).hide();
  })

  $(all_assets_var).keyup(function(e) {
    $(all_assets_var).css('border', '');
    $(all_assets_astrik_var).hide();
  })
 
$('#Asstes_submit').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  

   var assets_transaction_type = $('#assets_transaction_type').val();
   var assets_date = $('#assets_date').val();
    var assets_avg_price = $('#assets_avg_price').val();
   var assets_quantity = $('#assets_quantity').val();
   var assets_amt_invested = $('#assets_amt_invested').val();
   var assets_present_value = $('#assets_present_value').val();
    grp_asset=gr_assetn()
 

if (assets_transaction_type == "") {
      $('#assets_transaction_type').css('border', '1px solid red');
      $('#assets_transaction_type_astrik').show();
      $('#assets_transaction_type').focus();
      return false;
    } else {
    }

    if (assets_date == "") {
      $('#assets_date').css('border', '1px solid red');
      $('#assets_date_astrik').show();
      $('#assets_date').focus();
      return false;
    } else {
    }
    if (assets_avg_price == "") {
      $('#assets_avg_price').css('border', '1px solid red');
      $('#assets_avg_price_astrik').show();
      $('#assets_avg_price').focus();
      return false;
    } else {
    }
    if (assets_quantity == "") {
      $('#assets_quantity').css('border', '1px solid red');
      $('#assets_quantity_astrik').show();
      $('#assets_quantity').focus();
      return false;
    } else {
    }
    if (assets_amt_invested == "") {
      $('#assets_amt_invested').css('border', '1px solid red');
      $('#assets_amt_invested_astrik').show();
      $('#assets_amt_invested').focus();
      return false;
    } else {
    }
    if (assets_present_value == "") {
      $('#assets_present_value').css('border', '1px solid red');
      $('#assets_present_value_astrik').show();
      $('#assets_present_value').focus();
      return false;
    } else {
    }


     var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
                toastr.success(msg, "Asset form submitted successfully!!");
                $("#addAsset").modal('hide');
                var validator_asset = $( "#asset_cancel_form" ).validate();
                validator_asset.resetForm();
                $(all_assets_var).val('');

              }
            else if (msg == 'NO'){
                   toastr.error(msg);
                // $('#assets_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>');
                }
            else
               {   toastr.error(msg);
                //   $('#assets_alert-msg').html('<div class="alert alert-danger text-center">' + msg + '</div>');
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});


var emerge_ast_var = '#cashinhand_date_astrik,#cash_amt_invested_astrik,#cash_current_value_astrik,#cash_bank_name_astrik';
  $(emerge_ast_var).hide();
  
  var emerge_only_var = '#cash_bank_name,#cashinhand_date,#amt_invested,#current_value,#cash_interest_rate,#cash_interest_type,#cash_interest_payment';

  $(emerge_only_var).on('change', function() {
    $(emerge_only_var).css('border', '');
    $(emerge_ast_var).hide();
  });
  $(emerge_only_var).keyup(function(e) {
    $(emerge_only_var).css('border', '');
    $(emerge_ast_var).hide();
  });

$('#add_emergency').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
  var cash_bank_name = $('#cash_bank_name').val();
   var cashinhand_date = $('#cashinhand_date').val();
   var amt_invested = $('#amt_invested').val();
    var current_value = $('#current_value').val();
   var cash_interest_rate = $('#cash_interest_rate').val();
   var cash_interest_type = $('#cash_interest_type').val();
   var cash_interest_payment = $('#cash_interest_payment').val();
    var grp_asset = gr_assetn();
    
    // if (cash_bank_name == "") {
    //         $('#cash_bank_name').css('border', '1px solid red');
    //         $('#cash_bank_name_astrik').show();
    //         $('#cash_bank_name').focus();
    //         return false;
    //       } else {
    //         $('#cash_bank_name').css('border', '');
    //         $('#cash_bank_name_astrik').hide();
    //       }

if (cashinhand_date == "") {
      $('#cashinhand_date').css('border', '1px solid red');
      $('#cashinhand_date_astrik').show();
      $('#cashinhand_date').focus();
      return false;
    } else {
    }
    
    if (amt_invested == "") {
      $('#amt_invested').css('border', '1px solid red');
      $('#cash_amt_invested_astrik').show();
      $('#amt_invested').focus();
      return false;
    } else {
    }
    
    if (current_value == "") {
      $('#current_value').css('border', '1px solid red');
      $('#cash_current_value_astrik').show();
      $('#current_value').focus();
      return false;
    } else {
    }
    



    if(valu == "Cash in post office saving A/c" || valu == "Cash in Hand")
   {  
     var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
        assets_name: grp_asset[1],
         group_name: grp_asset[0],
       sub_assets_name : valu,

      cashinhand_date : $('#cashinhand_date').val(),
      amt_invested : $('#amt_invested').val(),
      current_value : $('#current_value').val(),
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
      $('#cash_bank_name').focus();
      return false;
    }else{
    }
       var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
       group_name: grp_asset[0],
       sub_assets_name : valu,
      bank_name : $('#cash_bank_name').val(),
      cashinhand_date : $('#cashinhand_date').val(),
      amt_invested : $('#amt_invested').val(),
      current_value : $('#current_value').val(),
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
                 $("#addEmergencyfund").modal('hide');
                toastr.success(msg, "Emergency fund form has been submitted successfully!!");
                 var validator_emerge = $( "#emerge_cancel_form" ).validate();
                 validator_emerge.resetForm();
                 $(emerge_only_var).val('');
                
                  
              }
            else if (msg == 'NO'){
                toastr.error(msg);
              
                }
            else
               {
                toastr.error(msg);
            
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});

$('#travelandTermplanhidecolumn').hide();
$('#healthhidecolumn').hide();
var ins_ast="#insurance_company_name_astrik,#travel_sum_assured_astrik,#insurance_no_claim_astrik,#insurance_sum_assured_astrik,#insurance_premium_tenure_astrik,#insurance_nextpremium_date_astrik,#insurance_frequency_astrik,#insurance_premium_amt_astrik,#insurance_policy_name_astrik,#insurance_policy_no_astrik,#insurance_value_astrik,#insurance_policy_start_date_astrik,#insurance_maturity_date_astrik,#insurance_premium_date_astrik";
$(ins_ast).hide();
var ins_val="#insurance_company_name,#insurance_nextpremium_date,#insurance_sum_assured,#insurance_no_claim,#insurance_frequency,#insurance_maturity_date,#insurance_maturity_benifits,#insurance_lockin_period,#insurance_premium_date,#insurance_premium_amt,#insurance_premium_tenure,#insurance_policy_start_date,#insurance_value,#insurance_policy_no,#travel_sum_assured,#insurance_policy_name";



     $(ins_val).on('change', function() {
                  $(ins_ast).hide();
                  $(ins_val).css('border', '');
    });
    $(ins_val).keyup(function(e) {
                  $(ins_ast).hide();
                  $(ins_val).css('border', '');
    });


$('#add_insurance').click(function()
 {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
     var grp_asset = gr_assetn();
   
   if (insurance_company_name == "") {
            $('#insurance_company_name').css('border', '1px solid red');
            $('#insurance_company_name').focus();
            $('#insurance_company_name_astrik').show();
            return false;
        } else {
            $('#insurance_company_name').css('border', '');
            $('#insurance_company_name_astrik').hide();
        }
        if (insurance_policy_name == "") {
            $('#insurance_policy_name').css('border', '1px solid red');
            $('#insurance_policy_name').focus();
            $('#insurance_policy_name_astrik').show();
            return false;
        } else {
            $('#insurance_policy_name').css('border', '');
            $('#insurance_policy_name_astrik').hide();
        }
        // if (insurance_sum_assured == "") {
        //     $('#insurance_sum_assured').css('border', '1px solid red');
        //     $('#insurance_sum_assured').focus();
        //     $('#insurance_sum_assured_astrik').show();
        //     return false;
        // } else {
        //     $('#insurance_sum_assured').css('border', '');
        //     $('#insurance_sum_assured_astrik').hide();
        // }
        // if (insurance_no_claim == "") {
        //     $('#insurance_no_claim').css('border', '1px solid red');
        //     $('#insurance_no_claim').focus();
        //     $('#insurance_no_claim_astrik').show();
        //     return false;
        // } else {
        //     $('#insurance_no_claim').css('border', '');
        //     $('#insurance_no_claim_astrik').hide();
        // }
        if (insurance_policy_no == "") {
            $('#insurance_policy_no').css('border', '1px solid red');
            $('#insurance_policy_no').focus();
            $('#insurance_policy_no_astrik').show();
            return false;
        } else {
            $('#insurance_policy_no').css('border', '');
            $('#insurance_policy_no_astrik').hide();
        }
        if (insurance_value == "") {
            $('#insurance_value').css('border', '1px solid red');
            $('#insurance_value').focus();
            $('#insurance_value_astrik').show();
            return false;
        } else {
            $('#insurance_value').css('border', '');
            $('#insurance_value_astrik').hide();
        }
        if (insurance_policy_start_date == "") {
            $('#insurance_policy_start_date').css('border', '1px solid red');
            $('#insurance_policy_start_date').focus();
            $('#insurance_policy_start_date_astrik').show();
            return false;
        } else {
            $('#insurance_policy_start_date').css('border', '');
            $('#insurance_policy_start_date_astrik').hide();
        }
        if (insurance_maturity_date == "") {
            $('#insurance_maturity_date').css('border', '1px solid red');
            $('#insurance_maturity_date').focus();
            $('#insurance_maturity_date_astrik').show();
            return false;
        } else {
            $('#insurance_maturity_date').css('border', '');
            $('#insurance_maturity_date_astrik').hide();
        }
        if (insurance_premium_date == "") {
            $('#insurance_premium_date').css('border', '1px solid red');
            $('#insurance_premium_date').focus();
            $('#insurance_premium_date_astrik').show();
            return false;
        } else {
            $('#insurance_premium_date').css('border', '');
            $('#insurance_premium_date_astrik').hide();
        }
        if (insurance_premium_amt == "") {
            $('#insurance_premium_amt').css('border', '1px solid red');
            $('#insurance_premium_amt').focus();
            $('#insurance_premium_amt_astrik').show();
            return false;
        } else {
            $('#insurance_premium_amt').css('border', '');
            $('#insurance_premium_amt_astrik').hide();
        }
        if (insurance_frequency == "") {
            $('#insurance_frequency').css('border', '1px solid red');
            $('#insurance_frequency').focus();
            $('#insurance_frequency_astrik').show();
            return false;
        } else {
            $('#insurance_frequency').css('border', '');
            $('#insurance_frequency_astrik').hide();
        }
        if (insurance_nextpremium_date == "") {
            $('#insurance_nextpremium_date').css('border', '1px solid red');
            $('#insurance_nextpremium_date').focus();
            $('#insurance_nextpremium_date_astrik').show();
            return false;
        } else {
            $('#insurance_nextpremium_date').css('border', '');
            $('#insurance_nextpremium_date_astrik').hide();
        }
        if (insurance_premium_tenure == "") {
            $('#insurance_premium_tenure').css('border', '1px solid red');
            $('#insurance_premium_tenure').focus();
            $('#insurance_premium_tenure_astrik').show();
            return false;
        } else {
            $('#insurance_premium_tenure').css('border', '');
            $('#insurance_premium_tenure_astrik').hide();
        }


   if(valu == "Bike Insurance" || valu == "Car Insurance" || valu == "Home Insurance")
   { 
     var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
        group_name:grp_asset[0],    
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
      $('#insurance_sum_assured').focus();
      $('#insurance_sum_assured_astrik').show();
      return false;
    }else{
     $('#insurance_sum_assured').css('border', '');
      $('#insurance_sum_assured_astrik').hide();
    }
      if(insurance_no_claim==""){
      $('#insurance_no_claim').css('border', '1px solid red');
      $('#insurance_no_claim').focus();
      $('#insurance_no_claim_astrik').show();
      return false;
    }else{
     $('#insurance_no_claim').css('border', '');
      $('#insurance_no_claim_astrik').hide();
    }
  
   var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
      $('#travel_sum_assured').focus();
      $('#travel_sum_assured_astrik').show();
      return false;
    }else{
     $('#travel_sum_assured').css('border', '');
      $('#travel_sum_assured_astrik').hide();
    }
       var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
                toastr.success("Insurance Form has been submitted successfully!!");
                // $('#insurance_alert-msg').html('<div class="alert alert-success text-center">Your data has been added successfully!</div>');  
                  $("#addBikeCarHomeInsurance").modal('hide'); 
                  $(ins_val).val('');
              
              }
              
            else if (msg == 'NO'){
                 toastr.error(msg);
                // $('#insurance_alert-msg').html('<div class="alert alert-danger text-center">Error in server ! Please try again later.</div>'); 
                
            }
            else
               {toastr.error(msg);
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}

});

// Insurance endowment and money back code strat here ....
var life_var_ast="#life_company_name_astrik,#insurance_totalpremium_astrik,#life_moneyback_date_astrik,#insurance_topup_astrik,#life_moneyback_amt_astrik,#life_vasted_bonus_astrik,#life_bonus_accumulated_astrik,#life_sum_assured_astrik,#life_no_claim_astrik,#life_sum_assured_astrik,#life_premium_tenure_astrik,#life_nextpremium_date_astrik,#life_frequency_astrik,#life_premium_amt_astrik,#life_premium_date_astrik,#life_maturity_date_astrik,#life_policy_start_date_astrik,#life_policy_name_astrik,#life_policy_no_astrik,#life_value_astrik";
$(life_var_ast).hide();
var life_var="#life_company_name, #life_moneyback_amt, #life_maturity_benifits,#life_lockin_period,#life_moneyback_date, #life_frequency, #life_nextpremium_date, #life_premium_tenure, #life_bonus_accumulated, #life_vasted_bonus, #life_policy_name, #life_policy_no, #life_sum_assured, #life_policy_start_date, #life_maturity_date, #life_premium_date, #life_premium_amt";
    $(life_var).on('change', function() {
        $(life_var).css('border', '');
        $(life_var_ast).hide();
        
    });
    
     $(life_var).keyup(function(e) {
        $(life_var).css('border', '');
        $(life_var_ast).hide();
    });
$('#hidemoneyback').hide();
$('#hideULIP').hide();


$('#AddIsuranceEndoMoney').click(function()
 {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
     var grp_asset = gr_assetn();


  if(life_company_name==""){
      $('#life_company_name').css('border', '1px solid red');
      $('#life_company_name').focus();
      $('#life_company_name_astrik').show();
      return false;
    }else{
     $('#life_company_name').css('border', '');
      $('#life_company_name_astrik').hide();
    }
     if(life_policy_name==""){
      $('#life_policy_name').css('border', '1px solid red');
      $('#life_policy_name').focus();
      $('#life_policy_name_astrik').show();
      return false;
    }else{
     $('#life_policy_name').css('border', '');
      $('#life_policy_name_astrik').hide();
    }
         if(life_policy_no==""){
      $('#life_policy_no').css('border', '1px solid red');
      $('#life_policy_no').focus();
      $('#life_policy_no_astrik').show();
      return false;
    }else{
     $('#life_policy_no').css('border', '');
      $('#life_policy_no_astrik').hide();
    }
      if(life_sum_assured==""){
      $('#life_sum_assured').css('border', '1px solid red');
      $('#life_sum_assured').focus();
      $('#life_sum_assured_astrik').show();
      return false;
    }else{
     $('#life_sum_assured').css('border', '');
      $('#life_sum_assured_astrik').hide();
    }

  
    if(life_policy_start_date==""){
      $('#life_policy_start_date').css('border', '1px solid red');
      $('#life_policy_start_date').focus();
      $('#life_policy_start_date_astrik').show();
      return false;
    }else{
     $('#life_policy_start_date').css('border', '');
      $('#life_policy_start_date_astrik').hide();
    }
      if(life_maturity_date==""){
      $('#life_maturity_date').css('border', '1px solid red');
      $('#life_maturity_date').focus();
      $('#life_maturity_date_astrik').show();
      return false;
    }else{
     $('#life_maturity_date').css('border', '');
      $('#life_maturity_date_astrik').hide();
    }
    if(life_premium_date==""){
      $('#life_premium_date').css('border', '1px solid red');
      $('#life_premium_date').focus();
      $('#life_premium_date_astrik').show();
      return false;
    }else{
     $('#life_premium_date').css('border', '');
      $('#life_premium_date_astrik').hide();
    }
     if(life_premium_amt==""){
      $('#life_premium_amt').css('border', '1px solid red');
      $('#life_premium_amt').focus();
      $('#life_premium_amt_astrik').show();
      return false;
    }else{
     $('#life_premium_amt').css('border', '');
      $('#life_premium_amt_astrik').hide();
    }
     if(life_frequency==""){
      $('#life_frequency').css('border', '1px solid red');
      $('#life_frequency').focus();
      $('#life_frequency_astrik').show();
      return false;
    }else{
     $('#life_frequency').css('border', '');
      $('#life_frequency_astrik').hide();
    }
       if(life_nextpremium_date==""){
      $('#life_nextpremium_date').css('border', '1px solid red');
      $('#life_nextpremium_date').focus();
      $('#life_nextpremium_date_astrik').show();
      return false;
    }else{
     $('#life_nextpremium_date').css('border', '');
      $('#life_nextpremium_date_astrik').hide();
    }
       if(life_premium_tenure==""){
      $('#life_premium_tenure').css('border', '1px solid red');
      $('#life_premium_tenure').focus();
      $('#life_premium_tenure_astrik').show();
      return false;
    }else{
     $('#life_premium_tenure').css('border', '');
      $('#life_premium_tenure_astrik').hide();
    }

     if(life_bonus_accumulated==""){
      $('#life_bonus_accumulated').css('border', '1px solid red');
      $('#life_bonus_accumulated').focus();
      $('#life_bonus_accumulated_astrik').show();
      return false;
    }else{
     $('#life_bonus_accumulated').css('border', '');
      $('#life_bonus_accumulated_astrik').hide();
    }
    if(life_vasted_bonus==""){
      $('#life_vasted_bonus').css('border', '1px solid red');
      $('#life_vasted_bonus').focus();
      $('#life_vasted_bonus_astrik').show();
      return false;
    }else{
     $('#life_vasted_bonus').css('border', '');
      $('#life_vasted_bonus_astrik').hide();
    }




 if(valu == "Life Insurance (Endowment)")
  {
      var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
      $('#life_moneyback_amt').focus();
      $('#life_moneyback_amt_astrik').show();
      return false;
    }else{
     $('#life_moneyback_amt').css('border', '');
      $('#life_moneyback_amt_astrik').hide();
    }
        if(life_moneyback_date==""){
      $('#life_moneyback_date').css('border', '1px solid red');
      $('#life_moneyback_date').focus();
      $('#life_moneyback_date_astrik').show();
      return false;
    }else{
     $('#life_moneyback_date').css('border', '');
      $('#life_moneyback_date_astrik').hide();
    }

    var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
                toastr.success("Your form submitted successfully!!");
                $("#addLifeInsuranceEndowment").modal('hide');
                $(life_var).val('');
                
              }
            else if (msg == 'NO'){
               toastr.error(msg);}
            else
               {toastr.error(msg);
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}

});


//Insurance Travel sub asstes code starts here..

var tra_var_ast="#travel_company_name_astrik, #travel_policy_name_astrik, #travel_policy_no_astrik, #trvlsum_assured_astrik, #travel_value_astrik, #travel_policy_start_date_astrik, #travel_maturity_date_astrik, #travel_premium_date_astrik, #travel_premium_amt_astrik, #travel_frequency_astrik, #travel_premium_tenure_astrik, #travel_nextpremium_date_astrik";
$(tra_var_ast).hide();
var tra_var="#travel_company_name, #travel_policy_name, #travel_policy_no, #trvlsum_assured, #travel_policy_start_date, #travel_maturity_date, #travel_premium_date, #travel_premium_amt, #travel_frequency, #travel_nextpremium_date, #travel_premium_tenure";
$(tra_var).on('change', function() {
    $(tra_var_ast).hide();
    $(tra_var).css('border', '');
    
});
$(tra_var).keyup(function(e) {
    $(tra_var_ast).hide();
     $(tra_var).css('border', '');
    
});
$('#Addtrvlinsurance').click(function()
 {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
    var grp_asset = gr_assetn();
   
  if(travel_company_name==""){
      $('#travel_company_name').css('border', '1px solid red');
      $('#travel_company_name').focus();
      $('#travel_company_name_astrik').show();
      return false;
    }else{
     $('#travel_company_name').css('border', '');
      $('#travel_company_name_astrik').hide();
    }
     if(travel_policy_name==""){
      $('#travel_policy_name').css('border', '1px solid red');
      $('#travel_policy_name').focus();
      $('#travel_policy_name_astrik').show();
      return false;
    }else{
     $('#travel_policy_name').css('border', '');
      $('#travel_policy_name_astrik').hide();
    }
     if(travel_policy_no==""){
      $('#travel_policy_no').css('border', '1px solid red');
      $('#travel_policy_no').focus();
      $('#travel_policy_no_astrik').show();
      return false;
    }else{
     $('#travel_policy_no').css('border', '');
      $('#travel_policy_no_astrik').hide();
    }
    if(travel_sum_assured==""){
      $('#trvlsum_assured').css('border', '1px solid red');
      $('#trvlsum_assured').focus();
      $('#trvlsum_assured_astrik').show();
      return false;
    }else{
     $('#trvlsum_assured').css('border', '');
      $('#trvlsum_assured_astrik').hide();
    }

    if(travel_policy_start_date==""){
      $('#travel_policy_start_date').css('border', '1px solid red');
      $('#travel_policy_start_date').focus();
      $('#travel_policy_start_date_astrik').show();
      return false;
    }else{
     $('#travel_policy_start_date').css('border', '');
      $('#travel_policy_start_date_astrik').hide();
    }
      if(travel_maturity_date==""){
      $('#travel_maturity_date').css('border', '1px solid red');
      $('#travel_maturity_date').focus();
      $('#travel_maturity_date_astrik').show();
      return false;
    }else{
     $('#travel_maturity_date').css('border', '');
      $('#travel_maturity_date_astrik').hide();
    }
    if(travel_premium_date==""){
      $('#travel_premium_date').css('border', '1px solid red');
      $('#travel_premium_date').focus();
      $('#travel_premium_date_astrik').show();
      return false;
    }else{
     $('#travel_premium_date').css('border', '');
      $('#travel_premium_date_astrik').hide();
    }
     if(travel_premium_amt==""){
      $('#travel_premium_amt').css('border', '1px solid red');
      $('#travel_premium_amt').focus();
      $('#travel_premium_amt_astrik').show();
      return false;
    }else{
     $('#travel_premium_amt').css('border', '');
      $('#travel_premium_amt_astrik').hide();
    }
     if(travel_frequency==""){
      $('#travel_frequency').css('border', '1px solid red');
      $('#travel_frequency').focus();
      $('#travel_frequency_astrik').show();
      return false;
    }else{
     $('#travel_frequency').css('border', '');
      $('#travel_frequency_astrik').hide();
    }
       if(travel_nextpremium_date==""){
      $('#travel_nextpremium_date').css('border', '1px solid red');
      $('#travel_nextpremium_date').focus();
      $('#travel_nextpremium_date_astrik').show();
      return false;
    }else{
     $('#travel_nextpremium_date').css('border', '');
      $('#travel_nextpremium_date_astrik').hide();
    }
       if(travel_premium_tenure==""){
      $('#travel_premium_tenure').css('border', '1px solid red');
      $('#travel_premium_tenure').focus();
      $('#travel_premium_tenure_astrik').show();
      return false;
    }else{
     $('#travel_premium_tenure').css('border', '');
      $('#travel_premium_tenure_astrik').hide();
    }





       var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
                toastr.success("Your form submitted successfully!!");
                $("#Addtravelinsurancedata").modal('hide'); 
                $(tra_var).val('');
              
              }
            else if (msg == 'NO'){
                toastr.error(msg); }
            else
               {toastr.error(msg);
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}

});

//Insurance ULIP sub asstes code ...


var ulip_var_ast="#ulip_totalpremium_astrik,#ulip_company_name_astrik,#ulip_policy_name_astrik,#ulip_policy_no_astrik,#ulip_value_astrik,#ulip_policy_start_date_astrik,#ulip_maturity_date_astrik,#ulip_premium_date_astrik,#ulip_premium_amt_astrik,#ulip_frequency_astrik,#ulip_topup_astrik,#ulip_no_claim_astrik,#ulip_sum_assured_astrik,#ulip_premium_tenure_astrik,#ulip_nextpremium_date_astrik ";
$(ulip_var_ast).hide();
var ulip_var="#ulip_company_name,#ulip_policy_name,#ulip_policy_no,#ulip_sum_assured,#ulip_policy_start_date,#ulip_maturity_date,#ulip_premium_date,#ulip_premium_amt,#ulip_frequency,#ulip_nextpremium_date,#ulip_premium_tenure,#ulip_topup,#ulip_totalpremium";
$(ulip_var).on('change', function() {
    $(ulip_var_ast).hide();
    $(ulip_var).css('border', '');
    
});
$(ulip_var).keyup(function(e) {
    $(ulip_var_ast).hide();
    $(ulip_var).css('border', '');
});
$('#addulipdata').click(function()
 {

     var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
     var grp_asset = gr_assetn();



     if(ulip_company_name==""){
      $('#ulip_company_name').css('border', '1px solid red');
      $('#ulip_company_name').focus();
      $('#ulip_company_name_astrik').show();
      return false;
    }else{
     $('#ulip_company_name').css('border', '');
      $('#ulip_company_name_astrik').hide();
    }
     if(ulip_policy_name==""){
      $('#ulip_policy_name').css('border', '1px solid red');
      $('#ulip_policy_name').focus();
      $('#ulip_policy_name_astrik').show();
      return false;
    }else{
     $('#ulip_policy_name').css('border', '');
      $('#ulip_policy_name_astrik').hide();
    }
         if(ulip_policy_no==""){
      $('#ulip_policy_no').css('border', '1px solid red');
      $('#ulip_policy_no').focus();
      $('#ulip_policy_no_astrik').show();
      return false;
    }else{
     $('#ulip_policy_no').css('border', '');
      $('#ulip_policy_no_astrik').hide();
    }
      if(ulip_sum_assured==""){
      $('#ulip_sum_assured').css('border', '1px solid red');
      $('#ulip_sum_assured').focus();
      $('#ulip_sum_assured_astrik').show();
      return false;
    }else{
     $('#ulip_sum_assured').css('border', '');
      $('#ulip_sum_assured_astrik').hide();
    }

  
    if(ulip_policy_start_date==""){
      $('#ulip_policy_start_date').css('border', '1px solid red');
      $('#ulip_policy_start_date').focus();
      $('#ulip_policy_start_date_astrik').show();
      return false;
    }else{
     $('#ulip_policy_start_date').css('border', '');
      $('#ulip_policy_start_date_astrik').hide();
    }
      if(ulip_maturity_date==""){
      $('#ulip_maturity_date').css('border', '1px solid red');
      $('#ulip_maturity_date').focus();
      $('#ulip_maturity_date_astrik').show();
      return false;
    }else{
     $('#ulip_maturity_date').css('border', '');
      $('#ulip_maturity_date_astrik').hide();
    }
    if(ulip_premium_date==""){
      $('#ulip_premium_date').css('border', '1px solid red');
      $('#ulip_premium_date').focus();
      $('#ulip_premium_date_astrik').show();
      return false;
    }else{
     $('#ulip_premium_date').css('border', '');
      $('#ulip_premium_date_astrik').hide();
    }
     if(ulip_premium_amt==""){
      $('#ulip_premium_amt').css('border', '1px solid red');
      $('#ulip_premium_amt').focus();
      $('#ulip_premium_amt_astrik').show();
      return false;
    }else{
     $('#ulip_premium_amt').css('border', '');
      $('#ulip_premium_amt_astrik').hide();
    }
     if(ulip_frequency==""){
      $('#ulip_frequency').css('border', '1px solid red');
      $('#ulip_frequency').focus();
      $('#ulip_frequency_astrik').show();
      return false;
    }else{
     $('#ulip_frequency').css('border', '');
      $('#ulip_frequency_astrik').hide();
    }
       if(ulip_nextpremium_date==""){
      $('#ulip_nextpremium_date').css('border', '1px solid red');
      $('#ulip_nextpremium_date').focus();
      $('#ulip_nextpremium_date_astrik').show();
      return false;
    }else{
     $('#ulip_nextpremium_date').css('border', '');
      $('#ulip__nextpremium_date_astrik').hide();
    }
       if(ulip_premium_tenure==""){
      $('#ulip_premium_tenure').css('border', '1px solid red');
      $('#ulip_premium_tenure').focus();
      $('#ulip_premium_tenure_astrik').show();
      return false;
    }else{
     $('#ulip_premium_tenure').css('border', '');
      $('#ulip_premium_tenure_astrik').hide();
    }

     if(ulip_topup==""){
      $('#ulip_topup').css('border', '1px solid red');
      $('#ulip_topup').focus();
      $('#ulip_topup_astrik').show();
      return false;
    }else{
     $('#ulip_topup').css('border', '');
      $('#ulip_topup_astrik').hide();
    }
    if(ulip_totalpremium==""){
      $('#ulip_totalpremium').css('border', '1px solid red');
      $('#ulip_totalpremium').focus();
      $('#ulip_totalpremium_astrik').show();
      return false;
    }else{
     $('#ulip_totalpremium').css('border', '');
      $('#ulip_totalpremium_astrik').hide();
    }


  var form_data = {
        user_id: $('#user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
              assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
                toastr.success("Your form submitted successfully!!"); 
                $("#addULIPInsurance").modal('hide'); 
                $(ulip_var).val('');
              }
            else if (msg == 'NO'){
                toastr.error(msg); }
            else
               {toastr.error(msg);
                 
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


var epf_var_ast="#epf_transaction_type_astrik,#epf_account_no_astrik,#epf_start_date_astrik,#epf_maturity_date_astrik";
$(epf_var_ast).hide();
var epf_var="#epf_transaction_type, #epf_account_no, #epf_start_date, #epf_maturity_date, #epf_lockin_date, #epf_contribution_date, #epf_employee_contribution, #epf_employer_contribution, #epf_total_contribution, #epf_interest_rate";
$(epf_var).on('change', function(){
    $(epf_var_ast).hide();
    $(epf_var).css('border', '');
});
$(epf_var).keyup(function(e){
    $(epf_var_ast).hide();
    $(epf_var).css('border', '');
});
$('#addepfdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
        var grp_asset = gr_assetn();
  
    if(epf_transaction_type==""){
      $('#epf_transaction_type').css('border', '1px solid red');
      $('#epf_transaction_type').focus();
      $('#epf_transaction_type_astrik').show();
      return false;
    }else{
     $('#epf_transaction_type').css('border', '');
      $('#epf_transaction_type_astrik').hide();
    }
      if(epf_account_no==""){
      $('#epf_account_no').css('border', '1px solid red');
      $('#epf_account_no').focus();
      $('#epf_account_no_astrik').show();
      return false;
    }else{
     $('#epf_account_no').css('border', '');
      $('#epf_account_no_astrik').hide();
    }
       if(epf_start_date==""){
      $('#epf_start_date').css('border', '1px solid red');
      $('#epf_start_date').focus();
      $('#epf_start_date_astrik').show();
      return false;
    }else{
     $('#epf_start_date').css('border', '');
      $('#epf_start_date_astrik').hide();
    }
     if(epf_maturity_date==""){
      $('#epf_maturity_date').css('border', '1px solid red');
      $('#epf_maturity_date').focus();
      $('#epf_maturity_date_astrik').show();
      return false;
    }else{
     $('#epf_maturity_date').css('border', '');
      $('#epf_maturity_date_astrik').hide();
    }



     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
        assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
                $('#addEPF').modal('hide');
                toastr.success("Your form submitted successfully!!");
                $(epf_var).val('');
            //           $('#epf_account_no').val("");
            //           $('#epf_start_date').val("");
            //             $('#epf_maturity_date').val("");
            //             $('#epf_lockin_date').val("");
            //              $('#epf_interest_rate').val(""); 
            //               $('#epf_contribution_date').val("");
            //              $('#epf_employee_contribution').val("");
            //               $('#epf_employer_contribution').val(""); 
            //               $('#epf_total_contribution').val("");
              }
            else if (msg == 'NO'){
                toastr.error(msg); }
            else
               {toastr.error(msg);
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//epf code ends heree.....

//FD codes starts heres .....
   


var fd_var_ast="#fd_type_astrik,#fd_account_no_astrik,#fd_transaction_type_astrik,#fd_interest_rate_astrik,#fd_maturity_date_astrik,#fd_start_date_astrik,#fd_amt_invested_astrik";
$(fd_var_ast).hide();
var fd_var="#fd_type,#fd_account_no,#fd_transaction_type,#fd_interest_rate,#fd_maturity_date,#fd_start_date,#fd_amt_invested";

$(fd_var).on('change', function(){
    $(fd_var_ast).hide();
    $(fd_var).css('border', '');
});
$(fd_var).keyup(function(e){
    $(fd_var_ast).hide();
    $(fd_var).css('border', '');
});
$('#addfddata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
      var grp_asset = gr_assetn();
  
  
    if(fd_type==""){
      $('#fd_type').css('border', '1px solid red');
      $('#fd_type').focus();
      $('#fd_type_astrik').show();
      return false;
    }else{
     $('#fd_type').css('border', '');
      $('#fd_type_astrik').hide();
    }
      if(fd_account_no==""){
      $('#fd_account_no').css('border', '1px solid red');
      $('#fd_account_no').focus();
      $('#fd_account_no_astrik').show();
      return false;
    }else{
     $('#fd_account_no').css('border', '');
      $('#fd_account_no_astrik').hide();
    }
       if(fd_transaction_type==""){
      $('#fd_transaction_type').css('border', '1px solid red');
      $('#fd_transaction_type').focus();
      $('#fd_transaction_type_astrik').show();
      return false;
    }else{
     $('#fd_transaction_type').css('border', '');
      $('#fd_transaction_type_astrik').hide();
    }
     if(fd_interest_rate==""){
      $('#fd_interest_rate').css('border', '1px solid red');
      $('#fd_interest_rate').focus();
      $('#fd_interest_rate_astrik').show();
      return false;
    }else{
     $('#fd_interest_rate').css('border', '');
      $('#fd_interest_rate_astrik').hide();
    }
         if(fd_maturity_date==""){
      $('#fd_maturity_date').css('border', '1px solid red');
      $('#fd_maturity_date').focus();
      $('#fd_maturity_date_astrik').show();
      return false;
    }else{
     $('#fd_maturity_date').css('border', '');
      $('#fd_maturity_date_astrik').hide();
    }
        if(fd_start_date==""){
      $('#fd_start_date').css('border', '1px solid red');
      $('#fd_start_date').focus();
      $('#fd_start_date_astrik').show();
      return false;
    }else{
     $('#fd_start_date').css('border', '');
      $('#fd_start_date_astrik').hide();
    }
     if(fd_amt_invested==""){
      $('#fd_amt_invested').css('border', '1px solid red');
      $('#fd_amt_invested').focus();
      $('#fd_amt_invested_astrik').show();
      return false;
    }else{
     $('#fd_amt_invested').css('border', '');
      $('#fd_amt_invested_astrik').hide();
    }



     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
            group_name:grp_asset[0],
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
                $('#addFD').modal('hide');
                 toastr.success("Your form submitted successfully!!");
                 $(fd_var).val('');
                    //   $('#fd_account_no').val("");
                    //   $('#fd_transaction_type').val("");
                    //   $('#fd_interest_payout').val("");
                    //   $('#fd_interest_payment').val("");
                    //   $('#fd_interest_rate').val("");
                    //   $('#fd_interest_type').val("");
                    //   $('#fd_maturity_amt').val("");
                    //   $('#fd_maturity_date').val("");
                    //   $('#fd_start_date').val("");
                    //   $('#fd_amt_invested').val(""); 
              }
            else if (msg == 'NO'){
                 toastr.error(msg); }
            else
               { toastr.error(msg);
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//FD code ends heree.....



//KisanVikasPatra codes starts heres .....
   

var kisan_var_ast="#kisan_transaction_type_astrik,#kisan_account_no_astrik,#kisan_start_date_astrik,#kisan_muturity_date_astrik,#kisan_amt_invested_astrik,#kisan_maturity_amt_astrik,#kisan_interest_rate_astrik";
$(kisan_var_ast).hide();
var kisan_var="#kisan_transaction_type,#kisan_account_no,#kisan_start_date,#kisan_muturity_date,#kisan_amt_invested,#kisan_maturity_amt,#kisan_interest_rate";
$(kisan_var).on('change', function(){
    $(kisan_var_ast).hide();
    $(kisan_var).css('border', '');
});
$(kisan_var).keyup(function(e){
    $(kisan_var_ast).hide();
    $(kisan_var).css('border', '');
});
$('#addkisanvikasdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
   var kisan_transaction_type = $('#kisan_transaction_type').val();
   var kisan_account_no = $('#kisan_account_no').val();
    var kisan_start_date = $('#kisan_start_date').val();
   var kisan_muturity_date = $('#kisan_muturity_date').val();
   var kisan_lockin_period = $('#kisan_lockin_period').val();
    var kisan_amt_invested = $('#kisan_amt_invested').val();
   var kisan_maturity_amt = $('#kisan_maturity_amt').val();
    var kisan_interest_rate = $('#kisan_interest_rate').val(); 
    var grp_asset = gr_assetn();
     
  
  
    if(kisan_transaction_type==""){
      $('#kisan_transaction_type').css('border', '1px solid red');
      $('#kisan_transaction_type').focus();
      $('#kisan_transaction_type_astrik').show();
      return false;
    }else{
     $('#kisan_transaction_type').css('border', '');
      $('#kisan_transaction_type_astrik').hide();
    }
      if(kisan_account_no==""){
      $('#kisan_account_no').css('border', '1px solid red');
      $('#kisan_account_no').focus();
      $('#kisan_account_no_astrik').show();
      return false;
    }else{
     $('#kisan_account_no').css('border', '');
      $('#kisan_account_no_astrik').hide();
    }
       if(kisan_start_date==""){
      $('#kisan_start_date').css('border', '1px solid red');
      $('#kisan_start_date').focus();
      $('#kisan_start_date_astrik').show();
      return false;
    }else{
     $('#kisan_start_date').css('border', '');
      $('#kisan_start_date_astrik').hide();
    }
      if(kisan_muturity_date==""){
      $('#kisan_muturity_date').css('border', '1px solid red');
      $('#kisan_muturity_date').focus();
      $('#kisan_muturity_date_astrik').show();
      return false;
    }else{
     $('#kisan_muturity_date').css('border', '');
      $('#kisan_muturity_date_astrik').hide();
    }
       if(kisan_amt_invested==""){
      $('#kisan_amt_invested').css('border', '1px solid red');
      $('#kisan_amt_invested').focus();
      $('#kisan_amt_invested_astrik').show();
      return false;
    }else{
     $('#kisan_amt_invested').css('border', '');
      $('#kisan_amt_invested_astrik').hide();
    }
     if(kisan_maturity_amt==""){
      $('#kisan_maturity_amt').css('border', '1px solid red');
      $('#kisan_maturity_amt').focus();
      $('#kisan_maturity_amt_astrik').show();
      return false;
    }else{
     $('#kisan_maturity_amt').css('border', '');
      $('#kisan_maturity_amt_astrik').hide();
    }
         if(kisan_interest_rate==""){
      $('#kisan_interest_rate').css('border', '1px solid red');
      $('#kisan_interest_rate').focus();
      $('#kisan_interest_rate_astrik').show();
      return false;
    }else{
     $('#kisan_interest_rate').css('border', '');
      $('#kisan_interest_rate_astrik').hide();
    }
 



     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
          assets_name: grp_asset[1],
            group_name:grp_asset[0],
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
                $('#addKisanVikasPatra').modal('hide');
                   toastr.success("Your form submitted successfully!!"); 
                        //  $('#kisan_transaction_type').val("");
                        //  $('#kisan_account_no').val("");
                        //  $('#kisan_start_date').val("");
                        //  $('#kisan_muturity_date').val("");
                        //  $('#kisan_lockin_period').val("");
                        //  $('#kisan_amt_invested').val("");
                        //  $('#kisan_maturity_amt').val("");
                        //  $('#kisan_interest_rate').val("");  
              }
            else if (msg == 'NO'){
                     toastr.error(msg);}
            else
               {     toastr.error(msg);
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//KisanVikasPatra code ends heree.....


//add mutual fund code start heress.....

var mut_var_ast="#mutual_company_name_astrik,#mutual_scheme_astrik,#mutual_folio_no_astrik,#mutual_transaction_astrik,#mutual_type_astrik,#mutual_sip_date_astrik,#mutual_date_astrik,#mutual_quantity_astrik,#mutual_amt_invested_astrik,#mutual_nav_astrik";
$(mut_var_ast).hide();
var mut_var="#mutual_company_name,#mutual_scheme,#mutual_folio_no,#mutual_transaction,#mutual_type,#mutual_date,#mutual_quantity,#mutual_nav,#mutual_amt_invested";
$(mut_var).on('change', function(){
    $(mut_var_ast).hide();
    $(mut_var).css('border', '');
});
$(mut_var).keyup(function(e){
    $(mut_var_ast).hide();
    $(mut_var).css('border', '');
});
$('#apply_mutual_fund').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
    var grp_asset = gr_assetn();
  

   
    if(mutual_company_name==""){
      $('#mutual_company_name').css('border', '1px solid red');
      $('#mutual_company_name').focus();
      $('#mutual_company_name_astrik').show();
      return false;
    }else{
     $('#mutual_company_name').css('border', '');
      $('#mutual_company_name_astrik').hide();
    }
      if(mutual_scheme==""){
      $('#mutual_scheme').css('border', '1px solid red');
      $('#mutual_scheme').focus();
      $('#mutual_scheme_astrik').show();
      return false;
    }else{
     $('#mutual_scheme').css('border', '');
      $('#mutual_scheme_astrik').hide();
    }
       if(mutual_folio_no==""){
      $('#mutual_folio_no').css('border', '1px solid red');
      $('#mutual_folio_no').focus();
      $('#mutual_folio_no_astrik').show();
      return false;
    }else{
     $('#mutual_folio_no').css('border', '');
      $('#mutual_folio_no_astrik').hide();
    }
      if(mutual_transaction==""){
      $('#mutual_transaction').css('border', '1px solid red');
      $('#mutual_transaction').focus();
      $('#mutual_transaction_astrik').show();
      return false;
    }
    else{
     $('#mutual_transaction').css('border', '');
      $('#mutual_transaction_astrik').hide();
    }
    
   
       if(mutual_type==""){
      $('#mutual_type').css('border', '1px solid red');
      $('#mutual_type').focus();
      $('#mutual_type_astrik').show();
      return false;
    }else{
     $('#mutual_type').css('border', '');
      $('#mutual_type_astrik').hide();
    }
       if(mutual_date==""){
      $('#mutual_date').css('border', '1px solid red');
      $('#mutual_date').focus();
      $('#mutual_date_astrik').show();
      return false;
    }else{
     $('#mutual_date').css('border', '');
      $('#mutual_date_astrik').hide();
    }
       if(mutual_quantity==""){
      $('#mutual_quantity').css('border', '1px solid red');
      $('#mutual_quantity').focus();
      $('#mutual_quantity_astrik').show();
      return false;
    }else{
     $('#mutual_quantity').css('border', '');
      $('#mutual_quantity_astrik').hide();
    }
   
       if(mutual_nav==""){
      $('#mutual_nav').css('border', '1px solid red');
      $('#mutual_nav').focus();
      $('#mutual_nav_astrik').show();
      return false;
    }else{
     $('#mutual_nav').css('border', '');
      $('#mutual_nav_astrik').hide();
    }
    
      if(mutual_amt_invested==""){
      $('#mutual_amt_invested').css('border', '1px solid red');
      $('#mutual_amt_invested').focus();
      $('#mutual_amt_invested_astrik').show();
      return false;
    }else{
     $('#mutual_amt_invested').css('border', '');
      $('#mutual_amt_invested_astrik').hide();
    }

//   if(select_assets=="1"){select_assets="Investment";}
//   else if(select_assets=="2"){select_assets="Insurance";}
//   else if(select_assets=="3"){select_assets="Assets";}
//   else if(select_assets=="4"){select_assets="Emergency Fund";}
//   else{select_assets="Liability"; }

     var form_data = {
      user_id: $('#mutual_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
            group_name:grp_asset[0],
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
                $('#addMutualFund').modal('hide');
          toastr.success("Your form submitted successfully!!");    
          $(mutual_var).val('');
                        // $('#mutual_company_name').val("");
                        // $('#mutual_scheme').val("");
                        // $('#mutual_folio_no').val("");
                        // $('#mutual_transaction').val("");
                        // $('#mutual_type').val("");
                        // $('#mutual_advisor').val("");
                        // $('#mutual_sip_date').val("");
                        // $('#mutual_date').val("");
                        // $('#mutual_quantity').val("");
                        // $('#mutual_nav').val("");
                        // $('#mutual_amt_invested').val("");
                        // $('#mutual_stamp_charge').val("");
                        // $('#mutual_exit_load').val("");
                        $("#mutualfund_table_data").DataTable().ajax.reload();
              }
            else if (msg == 'NO'){
                     toastr.error(msg); }
            else
               {     toastr.error(msg);
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});

//add mutual fund code ends here......



//add NCD start heress.....


var ncd_var_ast="#ncd_type_astrik,#ncd_name_astrik,#ncd_transaction_type_astrik,#ncd_date_astrik,#ncd_purchase_price_astrik,#ncd_quantity_astrik,#ncd_amt_invested_astrik,#ncd_interest_payout_astrik,#ncd_interest_rate_astrik,#ncd_interest_payable_astrik,#ncd_maturity_date_astrik";
$(ncd_var_ast).hide();
var ncd_var="#ncd_type,#ncd_name,#ncd_transaction_type,#ncd_date,#ncd_purchase_price,#ncd_quantity,#ncd_amt_invested,#ncd_interest_payout,#ncd_interest_rate,#ncd_interest_payable,#ncd_maturity_date";

$(ncd_var).on('change', function(){
    $(ncd_var_ast).hide();
    $(ncd_var).css('border', '');
});
$(ncd_var).keyup(function(e){
    $(ncd_var_ast).hide();
    $(ncd_var).css('border', '');
});
$('#addNCDdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
    var grp_asset = gr_assetn();
   
    if(ncd_type==""){
      $('#ncd_type').css('border', '1px solid red');
      $('#ncd_type').focus();
      $('#ncd_type_astrik').show();
      return false;
    }else{
     $('#ncd_type').css('border', '');
      $('#ncd_type_astrik').hide();
    }
      if(ncd_name==""){
      $('#ncd_name').css('border', '1px solid red');
      $('#ncd_name').focus();
      $('#ncd_name_astrik').show();
      return false;
    }else{
     $('#ncd_name').css('border', '');
      $('#ncd_name_astrik').hide();
    }
       if(ncd_transaction_type==""){
      $('#ncd_transaction_type').css('border', '1px solid red');
      $('#ncd_transaction_type').focus();
      $('#ncd_transaction_type_astrik').show();
      return false;
    }else{
     $('#ncd_transaction_type').css('border', '');
      $('#ncd_transaction_type_astrik').hide();
    }
      if(ncd_date==""){
      $('#ncd_date').css('border', '1px solid red');
      $('#ncd_date').focus();
      $('#ncd_date_astrik').show();
      return false;
    }
    else{
     $('#ncd_date').css('border', '');
      $('#ncd_date_astrik').hide();
    }
       if(ncd_purchase_price==""){
      $('#ncd_purchase_price').css('border', '1px solid red');
      $('#ncd_purchase_price').focus();
      $('#ncd_purchase_price_astrik').show();
      return false;
    }else{
     $('#ncd_purchase_price').css('border', '');
      $('#ncd_purchase_price_astrik').hide();
    }
       if(ncd_quantity==""){
      $('#ncd_quantity').css('border', '1px solid red');
      $('#ncd_quantity').focus();
      $('#ncd_quantity_astrik').show();
      return false;
    }else{
     $('#ncd_quantity').css('border', '');
      $('#ncd_quantity_astrik').hide();
    }
       if(ncd_amt_invested==""){
      $('#ncd_amt_invested').css('border', '1px solid red');
      $('#ncd_amt_invested').focus();
      $('#ncd_amt_invested_astrik').show();
      return false;
    }else{
     $('#ncd_amt_invested').css('border', '');
      $('#ncd_amt_invested_astrik').hide();
    }
   
       if(ncd_interest_payout==""){
      $('#ncd_interest_payout').css('border', '1px solid red');
      $('#ncd_interest_payout').focus();
      $('#ncd_interest_payout_astrik').show();
      return false;
    }else{
     $('#ncd_interest_payout').css('border', '');
      $('#ncd_interest_payout_astrik').hide();
    }
    
      if(ncd_interest_rate==""){
      $('#ncd_interest_rate').css('border', '1px solid red');
      $('#ncd_interest_rate').focus();
      $('#ncd_interest_rate_astrik').show();
      return false;
    }else{
     $('#ncd_interest_rate').css('border', '');
      $('#ncd_interest_rate_astrik').hide();
    }
         if(ncd_interest_payable==""){
      $('#ncd_interest_payable').css('border', '1px solid red');
      $('#ncd_interest_payable').focus();
      $('#ncd_interest_payable_astrik').show();
      return false;
    }else{
     $('#ncd_interest_payable').css('border', '');
      $('#ncd_interest_payable_astrik').hide();
    }

     if(ncd_maturity_date==""){
      $('#ncd_maturity_date').css('border', '1px solid red');
      $('#ncd_maturity_date').focus();
      $('#ncd_maturity_date_astrik').show();
      return false;
    }else{
     $('#ncd_maturity_date').css('border', '');
      $('#ncd_maturity_date_astrik').hide();
    }




     var form_data = {
      user_id: $('#mutual_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
        assets_name: grp_asset[1],
            group_name: grp_asset[0],
       sub_assets_name : valu,
       
       ncd_type : $('#ncd_type').val(),
       ncd_name : $('#ncd_name').val(),
       ncd_transaction_type : $('#ncd_transaction_type').val(),
       ncd_date : $('#ncd_date').val(),
       ncd_purchase_price : $('#ncd_purchase_price').val(),
       ncd_quantity : $('#ncd_quantity').val(),
       amt_invested : $('#ncd_amt_invested').val(),
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
                $('#addNCDebenture').modal('hide');
          toastr.success("Your form submitted successfully!!");
                     $(ncd_var).val('');
                //  $('#ncd_type').val("");
                //  $('#ncd_name').val("");
                //  $('#ncd_transaction_type').val("");
                //  $('#ncd_date').val("");
                //  $('#ncd_purchase_price').val("");
                //  $('#ncd_quantity').val("");
                //  $('#ncd_amt_invested').val("");
                //  $('#ncd_interest_payout').val("");
                //  $('#ncd_interest_rate').val("");
                //  $('#ncd_interest_payable').val("");
                //  $('#ncd_maturity_date').val("");
                //  $('#ncd_locking_period').val("");
              }
            else if (msg == 'NO'){
                toastr.error(msg); }
            else
               {toastr.error(msg);
                 
           }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});

//add NCD code ends here......



//NPS codes starts heres .....
   


var nps_var_ast="#nps_opening_date_astrik,#nps_type_astrik,#nps_pran_no_astrik,#nps_scheme_astrik,#nps_transaction_type_astrik,#nps_date_astrik,#nps_qty_astrik,#nps_purchase_price_astrik,#nps_amt_invested_astrik";
$(nps_var_ast).hide();
var nps_var="#nps_opening_date,#nps_type,#nps_pran_no,#nps_scheme,#nps_transaction_type,#nps_date,#nps_qty,#nps_purchase_price,#nps_amt_invested";
$(nps_var).on('change', function(){
    $(nps_var_ast).hide();
    $(nps_var).css('border', '');
});
$(nps_var).keyup(function(e){
    $(nps_var_ast).hide();
    $(nps_var).css('border', '');
});
$('#addnpsdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
      var grp_asset = gr_assetn();
  
  
         if(nps_pran_no==""){
      $('#nps_pran_no').css('border', '1px solid red');
      $('#nps_pran_no').focus();
      $('#nps_pran_no_astrik').show();
      return false;
    }else{
     $('#nps_pran_no').css('border', '');
      $('#nps_pran_no_astrik').hide();
    }
    if(nps_opening_date==""){
      $('#nps_opening_date').css('border', '1px solid red');
      $('#nps_opening_date').focus();
      $('#nps_opening_date_astrik').show();
      return false;
    }else{
     $('#nps_opening_date').css('border', '');
      $('#nps_opening_date_astrik').hide();
    }
      if(nps_type==""){
      $('#nps_type').css('border', '1px solid red');
      $('#nps_type').focus();
      $('#nps_type_astrik').show();
      return false;
    }else{
     $('#nps_type').css('border', '');
      $('#nps_type_astrik').hide();
    }

     if(nps_scheme==""){
      $('#nps_scheme').css('border', '1px solid red');
      $('#nps_scheme').focus();
      $('#nps_scheme_astrik').show();
      return false;
    }else{
     $('#nps_scheme').css('border', '');
      $('#nps_scheme_astrik').hide();
    }
         if(nps_transaction_type==""){
      $('#nps_transaction_type').css('border', '1px solid red');
      $('#nps_transaction_type').focus();
      $('#nps_transaction_type_astrik').show();
      return false;
    }else{
     $('#nps_transaction_type').css('border', '');
      $('#nps_transaction_type_astrik').hide();
    }
     if(nps_date==""){
      $('#nps_date').css('border', '1px solid red');
      $('#nps_date').focus();
      $('#nps_date_astrik').show();
      return false;
    }else{
     $('#nps_date').css('border', '');
      $('#nps_date_astrik').hide();
    }
      if(nps_qty==""){
      $('#nps_qty').css('border', '1px solid red');
      $('#nps_qty').focus();
      $('#nps_qty_astrik').show();
      return false;
    }else{
     $('#nps_qty').css('border', '');
      $('#nps_qty_astrik').hide();
    }
    if(nps_purchase_price==""){
      $('#nps_purchase_price').css('border', '1px solid red');
      $('#nps_purchase_price').focus();
      $('#nps_purchase_price_astrik').show();
      return false;
    }else{
     $('#nps_purchase_price').css('border', '');
      $('#nps_purchase_price_astrik').hide();
    }
     if(nps_amt_invested==""){
      $('#nps_amt_invested').css('border', '1px solid red');
      $('#nps_amt_invested').focus();
      $('#nps_amt_invested_astrik').show();
      return false;
    }else{
     $('#nps_amt_invested').css('border', '');
      $('#nps_amt_invested_astrik').hide();
    }



     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
          assets_name: grp_asset[1],
            group_name:grp_asset[0],
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
                // $('#addNPS').modal('hide');
                toastr.success("Your form submitted successfully!!");
                $(nps_var).val('');
                //   $('#nps_type').val("");
                //   $('#nps_pran_no').val("");
                //   $('#nps_scheme').val("");
                //   $('#nps_transaction_type').val("");
                //   $('#nps_date').val("");
                //   $('#nps_qty').val("");
                //   $('#nps_purchase_price').val("");
                //   $('#nps_amt_invested').val(""); 
                   $("#nps_table_data").DataTable().ajax.reload();
              }
            else if (msg == 'NO'){
                toastr.error(msg); }
            else
               {toastr.error(msg);
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//nps code ends heree.....



//NSC codes starts heres .....
   


var nsc_var_ast="#nsc_transaction_type_astrik,#nsc_account_no_astrik,#nsc_type_astrik,#nsc_opening_date_astrik,#nsc_amt_invested_astrik,#nsc_interest_rate_astrik,#nsc_maturity_date_astrik,#nsc_maturity_amt_astrik";
$(nsc_var_ast).hide();
var nsc_var="#nsc_transaction_type,#nsc_account_no,#nsc_type,#nsc_opening_date,#nsc_amt_invested,#nsc_interest_rate,#nsc_maturity_date,#nsc_maturity_amt";

$(nsc_var).on('change', function(){
    $(nsc_var_ast).hide();
    $(nsc_var).css('border', '');
});
$(nsc_var).keyup(function(e){
    $(nsc_var_ast).hide();
    $(nsc_var).css('border', '');
});
$('#addnscdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
  var grp_asset = gr_assetn();
  
    if(nsc_transaction_type==""){
      $('#nsc_transaction_type').css('border', '1px solid red');
      $('#nsc_transaction_type').focus();
      $('#nsc_transaction_type_astrik').show();
      return false;
    }else{
     $('#nsc_transaction_type').css('border', '');
      $('#nsc_transaction_type_astrik').hide();
    }
      if(nsc_account_no==""){
      $('#nsc_account_no').css('border', '1px solid red');
      $('#nsc_account_no').focus();
      $('#nsc_account_no_astrik').show();
      return false;
    }else{
     $('#nsc_account_no').css('border', '');
      $('#nsc_account_no_astrik').hide();
    }
       if(nsc_type==""){
      $('#nsc_type').css('border', '1px solid red');
      $('#nsc_type').focus();
      $('#nsc_type_astrik').show();
      return false;
    }else{
     $('#nsc_type').css('border', '');
      $('#nsc_type_astrik').hide();
    }
       if(nsc_opening_date==""){
      $('#nsc_opening_date').css('border', '1px solid red');
      $('#nsc_opening_date').focus();
      $('#nsc_opening_date_astrik').show();
      return false;
    }else{
     $('#nsc_opening_date').css('border', '');
      $('#nsc_opening_date_astrik').hide();
    }
       if(nsc_amt_invested==""){
      $('#nsc_amt_invested').css('border', '1px solid red');
      $('#nsc_amt_invested').focus();
      $('#nsc_amt_invested_astrik').show();
      return false;
    }else{
     $('#nsc_amt_invested').css('border', '');
      $('#nsc_amt_invested_astrik').hide();
    }
     if(nsc_interest_rate==""){
      $('#nsc_interest_rate').css('border', '1px solid red');
      $('#nsc_interest_rate').focus();
      $('#nsc_interest_rate_astrik').show();
      return false;
    }else{
     $('#nsc_interest_rate').css('border', '');
      $('#nsc_interest_rate_astrik').hide();
    }
       if(nsc_maturity_date==""){
      $('#nsc_maturity_date').css('border', '1px solid red');
      $('#nsc_maturity_date').focus();
      $('#nsc_maturity_date_astrik').show();
      return false;
    }else{
     $('#nsc_maturity_date').css('border', '');
      $('#nsc_maturity_date_astrik').hide();
    }
     if(nsc_maturity_amt==""){
      $('#nsc_maturity_amt').css('border', '1px solid red');
      $('#nsc_maturity_amt').focus();
      $('#nsc_maturity_amt_astrik').show();
      return false;
    }else{
     $('#nsc_maturity_amt').css('border', '');
      $('#nsc_maturity_amt_astrik').hide();
    }
   
 


     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
            assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
                $('#addNSC').modal('hide');
                toastr.success(msg, "Asset form submitted successfully!!"); 
                $(nsc_var).val('');
                    //   $('#nsc_transaction_type').val("");
                    //   $('#nsc_account_no').val("");
                    //   $('#nsc_type').val("");
                    //   $('#nsc_opening_date').val("");
                    //   $('#nsc_lockin_period').val("");
                    //   $('#nsc_amt_invested').val("");
                    //   $('#nsc_interest_rate').val(""); 
                    //   $('#nsc_maturity_date').val("");
                    //   $('#nsc_maturity_amt').val("");  
              }
            else if (msg == 'NO'){
             toastr.error(msg); }
            else
               {toastr.error(msg);
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//NSC code ends heree.....


//PPF codes starts heres .....
   


var ppf_var_ast="#ppf_transaction_type_astrik,#ppf_account_no_astrik,#ppf_opening_date_astrik,#ppf_date_astrik,#ppf_maturity_date_astrik,#ppf_amt_invested_astrik,#ppf_interest_rate_astrik";
$(ppf_var_ast).hide();
var ppf_var="#ppf_transaction_type,#ppf_account_no,#ppf_date, #ppf_opening_date,#ppf_maturity_date,#ppf_amt_invested,#ppf_interest_rate";
$(ppf_var).on('change', function(){
    $(ppf_var_ast).hide();
    $(ppf_var).css('border', '');
});
$(ppf_var).keyup(function(e){
    $(ppf_var_ast).hide();
    $(ppf_var).css('border', '');
});
$('#addppfdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
    var ppf_transaction_type = $('#ppf_transaction_type').val();
    var ppf_account_no = $('#ppf_account_no').val();
    var ppf_opening_date = $('#ppf_opening_date').val();
     var ppf_date = $('#ppf_date').val();
    var ppf_lockin_period = $('#ppf_lockin_period').val();    
    var ppf_maturity_date = $('#ppf_maturity_date').val();
    var ppf_amt_invested = $('#ppf_amt_invested').val();
    var ppf_interest_rate = $('#ppf_interest_rate').val();
     var grp_asset = gr_assetn();
  
    if(ppf_transaction_type==""){
      $('#ppf_transaction_type').css('border', '1px solid red');
      $('#ppf_transaction_type').focus();
      $('#ppf_transaction_type_astrik').show();
      return false;
    }else{
     $('#ppf_transaction_type').css('border', '');
      $('#ppf_transaction_type_astrik').hide();
    }
      if(ppf_account_no==""){
      $('#ppf_account_no').css('border', '1px solid red');
      $('#ppf_account_no').focus();
      $('#ppf_account_no_astrik').show();
      return false;
    }else{
     $('#ppf_account_no').css('border', '');
      $('#ppf_account_no_astrik').hide();
    }

       if(ppf_opening_date==""){
      $('#ppf_opening_date').css('border', '1px solid red');
      $('#ppf_opening_date').focus();
      $('#ppf_opening_date_astrik').show();
      return false;
    }else{
     $('#ppf_opening_date').css('border', '');
      $('#ppf_opening_date_astrik').hide();
    }
       if(ppf_maturity_date==""){
      $('#ppf_maturity_date').css('border', '1px solid red');
      $('#ppf_maturity_date').focus();
      $('#ppf_maturity_date_astrik').show();
      return false;
    }else{
     $('#ppf_maturity_date').css('border', '');
      $('#ppf_maturity_date_astrik').hide();
    }
       if(ppf_amt_invested==""){
      $('#ppf_amt_invested').css('border', '1px solid red');
      $('#ppf_amt_invested').focus();
      $('#ppf_amt_invested_astrik').show();
      return false;
    }else{
     $('#ppf_amt_invested').css('border', '');
      $('#ppf_amt_invested_astrik').hide();
    }
       if(ppf_interest_rate==""){
      $('#ppf_interest_rate').css('border', '1px solid red');
      $('#ppf_interest_rate').focus();
      $('#ppf_interest_rate_astrik').show();
      return false;
    }else{
     $('#ppf_interest_rate').css('border', '');
      $('#ppf_interest_rate_astrik').hide();
    }
     



     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
             assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
                $('#addPPF').modal('hide');
                toastr.success("Your form submitted successfully!");  
                $(ppf_var).val("");
                    //   $('#ppf_transaction_type').val("");
                    //   $('#ppf_account_no').val("");
                    //   $('#ppf_opening_date').val("");
                    //   $('#ppf_date').val("");
                    //   $('#ppf_lockin_period').val("");    
                    //   $('#ppf_maturity_date').val("");
                    //   $('#ppf_amt_invested').val("");
                    //   $('#ppf_interest_rate').val("");  
              }
            else if (msg == 'NO'){
                 toastr.error(msg); }
            else
               { toastr.error(msg);
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//PPF code ends heree.....



//Private Equity/ stratup codes starts heres .....
   

var pe_var_ast="#pe_asset_name_astrik,#pe_startup_astrik,#pe_start_date_astrik,#pe_transaction_type_astrik,#pe_date_astrik,#pe_qty_purchase_astrik,#pe_purchase_rate_astrik,#pe_amt_invested_astrik";
$('pe_var_ast').hide();
var pe_var="#pe_asset_name,#pe_startup,#pe_start_date,#pe_transaction_type,#pe_date,#pe_qty_purchase,#pe_purchase_rate,#pe_amt_invested";
$(pe_var).on('change', function(){
    $(pe_var_ast).hide();
    $(pe_var).css('border', '');
});
$(pe_var).keyup(function(e){
    $(pe_var_ast).hide();
    $(pe_var).css('border', '');
});
$('#addprivateequitydata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
    var grp_asset = gr_assetn();
  
  
    if(pe_asset_name==""){
      $('#pe_asset_name').css('border', '1px solid red');
      $('#pe_asset_name').focus();
      $('#pe_asset_name_astrik').show();
      return false;
    }else{
     $('#pe_asset_name').css('border', '');
      $('#pe_asset_name_astrik').hide();
    }
      if(pe_startup==""){
      $('#pe_startup').css('border', '1px solid red');
      $('#pe_startup').focus();
      $('#pe_startup_astrik').show();
      return false;
    }else{
     $('#pe_startup').css('border', '');
      $('#pe_startup_astrik').hide();
    }
       if(pe_start_date==""){
      $('#pe_start_date').css('border', '1px solid red');
      $('#pe_start_date').focus();
      $('#pe_start_date_astrik').show();
      return false;
    }else{
     $('#pe_start_date').css('border', '');
      $('#pe_start_date_astrik').hide();
    }
     if(pe_transaction_type==""){
      $('#pe_transaction_type').css('border', '1px solid red');
      $('#pe_transaction_type').focus();
      $('#pe_transaction_type_astrik').show();
      return false;
    }else{
     $('#pe_transaction_type').css('border', '');
      $('#pe_transaction_type_astrik').hide();
    }
         if(pe_date==""){
      $('#pe_date').css('border', '1px solid red');
      $('#pe_date').focus();
      $('#pe_date_astrik').show();
      return false;
    }else{
     $('#pe_date').css('border', '');
      $('#pe_date_astrik').hide();
    }
        if(pe_qty_purchase==""){
      $('#pe_qty_purchase').css('border', '1px solid red');
      $('#pe_qty_purchase').focus();
      $('#pe_qty_purchase_astrik').show();
      return false;
    }else{
     $('#pe_qty_purchase').css('border', '');
      $('#pe_qty_purchase_astrik').hide();
    }
     if(pe_purchase_rate==""){
      $('#pe_purchase_rate').css('border', '1px solid red');
      $('#pe_purchase_rate').focus();
      $('#pe_purchase_rate_astrik').show();
      return false;
    }else{
     $('#pe_purchase_rate').css('border', '');
      $('#pe_purchase_rate_astrik').hide();
    }
         if(pe_amt_invested==""){
      $('#pe_amt_invested').css('border', '1px solid red');
      $('#pe_amt_invested').focus();
      $('#pe_amt_invested_astrik').show();
      return false;
    }else{
     $('#pe_amt_invested').css('border', '');
      $('#pe_amt_invested_astrik').hide();
    }
    
 



     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
              assets_name: grp_asset[1],
       group_name:grp_asset[0],
       sub_assets_name : valu,
       
       pe_asset_name : $('#pe_asset_name').val(),
       pe_startup : $('#pe_startup').val(),
       pe_start_date : $('#pe_start_date').val(),
       pe_transaction_type : $('#pe_transaction_type').val(),
       pe_date : $('#pe_date').val(),
       pe_qty_purchase : $('#pe_qty_purchase').val(),
       pe_purchase_rate : $('#pe_purchase_rate').val(),
       amt_invested : $('#pe_amt_invested').val(),   
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
                $('#addPrivateEquity').modal('hide');
                  toastr.success("Your form submitted successfully!!");
                  $(pe_var).val('');
                //  $('#pe_asset_name').val("");
                //  $('#pe_startup').val("");
                //  $('#pe_start_date').val("");
                //  $('#pe_transaction_type').val("");
                //  $('#pe_date').val("");
                //  $('#pe_qty_purchase').val("");
                //  $('#pe_purchase_rate').val("");
                //  $('#pe_amt_invested').val("");   
                //  $('#pe_current_rate').val("");
                //  $('#pe_present_value').val("");
              }
            else if (msg == 'NO'){
               toastr.error(msg); }
            else
               {toastr.error(msg);
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//Private Equity/ startup code ends heree.....


//RD codes starts heres .....



var rd_ast_var="#rd_type_astrik,#rd_account_no_astrik,#rd_transaction_type_astrik,#rd_interest_rate_astrik,#rd_maturity_date_astrik,#rd_start_date_astrik,#rd_amt_invested_astrik";
$(rd_ast_var).hide();
var rd_var="#rd_type,#rd_account_no,#rd_transaction_type,#rd_interest_rate,#rd_maturity_date,#rd_start_date,#rd_amt_invested";
$(rd_var).on('change', function(){
    $(rd_ast_var).hide();
    $(rd_var).css('border', '');
});
$(rd_var).keyup(function(e){
    $(rd_ast_var).hide();
    $(rd_var).css('border', '');
});

$('#RDaddddata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
    var grp_asset = gr_assetn(); 
  
    if(rd_type==""){
      $('#rd_type').css('border', '1px solid red');
      $('#rd_type').focus();
      $('#rd_type_astrik').show();
      return false;
    }else{
     $('#rd_type').css('border', '');
      $('#rd_type_astrik').hide();
    }
      if(rd_account_no==""){
      $('#rd_account_no').css('border', '1px solid red');
      $('#rd_account_no').focus();
      $('#rd_account_no_astrik').show();
      return false;
    }else{
     $('#rd_account_no').css('border', '');
      $('#rd_account_no_astrik').hide();
    }
       if(rd_transaction_type==""){
      $('#rd_transaction_type').css('border', '1px solid red');
      $('#rd_transaction_type').focus();
      $('#rd_transaction_type_astrik').show();
      return false;
    }else{
     $('#rd_transaction_type').css('border', '');
      $('#rd_transaction_type_astrik').hide();
    }
     if(rd_interest_rate==""){
      $('#rd_interest_rate').css('border', '1px solid red');
      $('#rd_interest_rate').focus();
      $('#rd_interest_rate_astrik').show();
      return false;
    }else{
     $('#rd_interest_rate').css('border', '');
      $('#rd_interest_rate_astrik').hide();
    }
         if(rd_maturity_date==""){
      $('#rd_maturity_date').css('border', '1px solid red');
      $('#rd_maturity_date').focus();
      $('#rd_maturity_date_astrik').show();
      return false;
    }else{
     $('#rd_maturity_date').css('border', '');
      $('#rd_maturity_date_astrik').hide();
    }
        if(rd_start_date==""){
      $('#rd_start_date').css('border', '1px solid red');
      $('#rd_start_date').focus();
      $('#rd_start_date_astrik').show();
      return false;
    }else{
     $('#rd_start_date').css('border', '');
      $('#rd_start_date_astrik').hide();
    }
     if(rd_amt_invested==""){
      $('#rd_amt_invested').css('border', '1px solid red');
      $('#rd_amt_invested').focus();
      $('#rd_amt_invested_astrik').show();
      return false;
    }else{
     $('#rd_amt_invested').css('border', '');
      $('#rd_amt_invested_astrik').hide();
    }


     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
              assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
       amt_invested : $('#rd_amt_invested').val()
    };  

   if(valu != "")
   {
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_RD",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 'YES'){
                $('#addRD').modal('hide');
                        toastr.success("Your form submitted successfully!!");
                        $(rd_var).val('');
                    //   $('#rd_account_no').val("");
                    //   $('#rd_transaction_type').val("");
                    //   $('#rd_interest_payout').val("");
                    //   $('#rd_interest_payment').val("");
                    //   $('#rd_interest_rate').val("");
                    //   $('#rd_interest_type').val("");
                    //   $('#rd_maturity_amt').val("");
                    //   $('#rd_maturity_date').val("");
                    //   $('#rd_start_date').val("");
                    //   $('#rd_amt_invested').val(""); 
              }
            else if (msg == 'NO'){
                toastr.error(msg); }
            else
               {toastr.error(msg);
                 
           }
        }
    });  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//RD code ends heree.....


//SCSS codes starts heres .....
   


var scss_var_ast="#scss_transaction_type_astrik, #scss_account_no_astrik, #scss_muturity_date_astrik, #scss_lockin_period_astrik, #scss_date_astrik, #scss_amt_invested_astrik";
$(scss_var_ast).hide();
var scss_var="#scss_transaction_type,#scss_account_no,#scss_muturity_date,#scss_lockin_period,#scss_date,#scss_amt_invested";
$(scss_var).on('change', function(){
    $(scss_var_ast).hide();
    $(scss_var).css('border', '');
});
$(scss_var).keyup(function(e){
    $(scss_var_ast).hide();
    $(scss_var).css('border', '');
});
$('#addscssdata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
  var grp_asset = gr_assetn();
    if(scss_transaction_type==""){
      $('#scss_transaction_type').css('border', '1px solid red');
      $('#scss_transaction_type').focus();
      $('#scss_transaction_type_astrik').show();
      return false;
    }else{
     $('#scss_transaction_type').css('border', '');
      $('#scss_transaction_type_astrik').hide();
    }
      if(scss_account_no==""){
      $('#scss_account_no').css('border', '1px solid red');
      $('#scss_account_no').focus();
      $('#scss_account_no_astrik').show();
      return false;
    }else{
     $('#scss_account_no').css('border', '');
      $('#scss_account_no_astrik').hide();
    }
      if(scss_muturity_date==""){
      $('#scss_muturity_date').css('border', '1px solid red');
      $('#scss_muturity_date').focus();
      $('#scss_muturity_date_astrik').show();
      return false;
    }else{
     $('#scss_muturity_date').css('border', '');
      $('#scss_muturity_date_astrik').hide();
    }
      if(scss_lockin_period==""){
      $('#scss_lockin_period').css('border', '1px solid red');
      $('#scss_lockin_period').focus();
      $('#scss_lockin_period_astrik').show();
      return false;
    }else{
     $('#scss_lockin_period').css('border', '');
      $('#scss_lockin_period_astrik').hide();
    }
       if(scss_date==""){
      $('#scss_date').css('border', '1px solid red');
      $('#scss_date').focus();
      $('#scss_date_astrik').show();
      return false;
    }else{
     $('#scss_date').css('border', '');
      $('#scss_date_astrik').hide();
    }
    
    if(scss_amt_invested==""){
      $('#scss_amt_invested').css('border', '1px solid red');
      $('#scss_amt_invested').focus();
      $('#scss_amt_invested_astrik').show();
      return false;
    }else{
     $('#scss_amt_invested').css('border', '');
      $('#scss_amt_invested_astrik').hide();
    }
 


     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
              assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
                $('#addSCSS').modal('hide');
                toastr.success("Your form submitted successfully!!");
                $(scss_var).val();
                            // $('#scss_transaction_type').val("");
                            // $('#scss_account_no').val("");
                            // $('#scss_muturity_date').val("");
                            // $('#scss_lockin_period').val("");
                            // $('#scss_date').val("");
                            // $('#scss_amt_invested').val("");
                            // $('#scss_interest_rate').val(""); 
                            // $('#scss_interest_type').val("");
                            // $('#scss_interest_payment').val(""); 
                            // $('#scss_interest_payout').val(""); 
                            // $('#scss_maturity_amt').val("");  
              }
            else if (msg == 'NO'){
                          toastr.error(msg);
                
               }
            else
               {          toastr.error(msg);
                 
                 
           }
        }
    });  
    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//SCSS code ends heree.....


//add SGB code start heress.....




var sgb_var_ast="#sgb_stock_name_astrik,#sgb_transaction_type_astrik,#sgb_broker_astrik,#sgb_date_astrik,#sgb_qty_astrik,#sgb_purchase_price_astrik,#sgb_amt_invested_astrik,#sgb_net_rate_astrik,#sgb_net_amt_astrik";
$(sgb_var_ast).hide();
var sgb_var="#sgb_stock_name,#sgb_transaction_type,#sgb_broker,#sgb_date,#sgb_qty,#sgb_purchase_price,#sgb_amt_invested,#sgb_net_rate,#sgb_net_amt";
$(sgb_var).on('change', function(){
    $(sgb_var_ast).hide();
    $(sgb_var).css('border', '');
});
$(sgb_var).keyup(function(e){
    $(sgb_var_ast).hide();
    $(sgb_var).css('border', '');
});
//table data hide of bond and sgb......
// $('#sgb_table_data').hide();
// $('#bond_table_data').hide();

$('#addSGBdata').click(function() {
    var valu = $('#select_sub_Assets').val();
    var portfolio_name = $('#select_portfolio_name').val();
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
    var grp_asset = gr_assetn();
    
   
    if(sgb_stock_name==""){
      $('#sgb_stock_name').css('border', '1px solid red');
      $('#sgb_stock_name').focus();
      $('#sgb_stock_name_astrik').show();
      return false;
    }else{
     $('#sgb_stock_name').css('border', '');
      $('#sgb_stock_name_astrik').hide();
    }
      if(sgb_transaction_type==""){
      $('#sgb_transaction_type').css('border', '1px solid red');
      $('#sgb_transaction_type').focus();
      $('#sgb_transaction_type_astrik').show();
      return false;
    }else{
     $('#sgb_transaction_type').css('border', '');
      $('#sgb_transaction_type_astrik').hide();
    }
       if(sgb_broker==""){
      $('#sgb_broker').css('border', '1px solid red');
      $('#sgb_broker').focus();
      $('#sgb_broker_astrik').show();
      return false;
    }else{
     $('#sgb_broker').css('border', '');
      $('#sgb_broker_astrik').hide();
    }
      if(sgb_date==""){
      $('#sgb_date').css('border', '1px solid red');
      $('#sgb_date').focus();
      $('#sgb_date_astrik').show();
      return false;
    }
    else{
     $('#sgb_date').css('border', '');
      $('#sgb_date_astrik').hide();
    }
    
       if(sgb_qty==""){
      $('#sgb_qty').css('border', '1px solid red');
      $('#sgb_qty').focus();
      $('#sgb_qty_astrik').show();
      return false;
    }else{
     $('#sgb_qty').css('border', '');
      $('#sgb_qty_astrik').hide();
    }
       if(sgb_purchase_price==""){
      $('#sgb_purchase_price').css('border', '1px solid red');
      $('#sgb_purchase_price').focus();
      $('#sgb_purchase_price_astrik').show();
      return false;
    }else{
     $('#sgb_purchase_price').css('border', '');
      $('#sgb_purchase_price_astrik').hide();
    }
        if(sgb_amt_invested==""){
      $('#sgb_amt_invested').css('border', '1px solid red');
      $('#sgb_amt_invested').focus();
      $('#sgb_amt_invested_astrik').show();
      return false;
    }else{
     $('#sgb_amt_invested').css('border', '');
      $('#sgb_amt_invested_astrik').hide();
    }
    //   if(sgb_net_rate==""){
    //   $('#sgb_net_rate').css('border', '1px solid red');
    //   $('#sgb_net_rate').focus();
    //   $('#sgb_net_rate_astrik').show();
    //   return false;
    // }else{
    //  $('#sgb_net_rate').css('border', '');
    //   $('#sgb_net_rate_astrik').hide();
    // }
   
    //   if(sgb_net_amt==""){
    //   $('#sgb_net_amt').css('border', '1px solid red');
    //   $('#sgb_net_amt').focus();
    //   $('#sgb_net_amt_astrik').show();
    //   return false;
    // }else{
    //  $('#sgb_net_amt').css('border', '');
    //   $('#sgb_net_amt_astrik').hide();
    // }
    



     var form_data = {
       user_id: $('#sgb_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
       group_name:grp_asset[0],
       sub_assets_name : valu,
  
        stock_name : $('#sgb_stock_name').val(),
        stock_transaction_type : $('#sgb_transaction_type').val(),
        stock_broker : $('#sgb_broker').val(),
        stock_date : $('#sgb_date').val(),
        stock_contract_no : $('#sgb_contract_no').val(),
        stock_settlement_no : $('#sgb_settlement_no').val(),
        stock_qty : $('#sgb_qty').val(),
        stock_purchase_price : $('#sgb_purchase_price').val(),
        amt_invested : $('#sgb_amt_invested').val(),
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
                 if (msg == 1){
                // $('#addSGB').modal('hide');
                 toastr.error("You don't have sufficient Shares for sale..!!");}
                 else if(msg == 2){
                  toastr.success("Data Inserted Successfully ..!!"); 
                  $(sgb_var).val('');
                  $("#sgb_table_data").DataTable().ajax.reload();
                //   $("#bond_table_data").DataTable().ajax.reload();
                 }
                 else if(msg == 3){
                  toastr.error("Not Inserted ..!!"); 
                 }
                 else if(msg == 4){
                  toastr.success("Data Inserted Successfully ..!!"); 
                  $(sgb_var).val('');
                  $("#sgb_table_data").DataTable().ajax.reload();
                //   $("#bond_table_data").DataTable().ajax.reload();
                 }
                 else if(msg == 5){
                  toastr.error("Not Inserted ..!!"); 
                 }
                 else if(msg == 6){
                  toastr.success("Data Inserted Successfully ..!!"); 
                  $(sgb_var).val('');
                  $("#sgb_table_data").DataTable().ajax.reload();
                //   $("#bond_table_data").DataTable().ajax.reload();
                 }
                 else if(msg == 7){
                  toastr.error("Not Inserted ..!!"); 
                 }
                 else if(msg == 8){
                  toastr.error("You don't have sufficient Shares for sale..!!"); 
                 }
                
        }
    });

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});

//add SGB code ends here......
//add bond code starts here
var bond_var_ast="#bond_stock_name_astrik,#bond_transaction_type_astrik,#bond_broker_astrik,#bond_date_astrik,#bond_qty_astrik,#bond_purchase_price_astrik,#bond_amt_invested_astrik,#bond_net_rate_astrik,#bond_net_amt_astrik";
$(bond_var_ast).hide();
var bond_var="#bond_stock_name,#bond_transaction_type,#bond_broker,#bond_date,#bond_qty,#bond_purchase_price,#bond_amt_invested,#bond_net_rate,#bond_net_amt";
$(bond_var).on('change', function(){
    $(bond_var_ast).hide();
    $(bond_var).css('border', '');
});
$(bond_var).keyup(function(e){
    $(bond_var_ast).hide();
    $(bond_var).css('border', '');
});
//table data hide of bond and bond......
// $('#bond_table_data').hide();
// $('#bond_table_data').hide();

$('#addbonddata').click(function() {
    var valu = $('#select_sub_Assets').val();
    var portfolio_name = $('#select_portfolio_name').val();
    var select_assets = $('#select_assets').val();
  
    var bond_stock_name = $('#bond_stock_name').val();
    var bond_transaction_type = $('#bond_transaction_type').val();
    var bond_broker = $('#bond_broker').val();
    var bond_date = $('#bond_date').val();
    var bond_contract_no = $('#bond_contract_no').val();
    var bond_settlement_no = $('#bond_settlement_no').val();
    var bond_qty = $('#bond_qty').val();
    var bond_purchase_price = $('#bond_purchase_price').val();
    var bond_amt_invested = $('#bond_amt_invested').val();
    var bond_brokerage = $('#bond_brokerage').val();
    var bond_net_rate = $('#bond_net_rate').val();
    var bond_tax_value = $('#bond_tax_value').val();
    var bond_cgst = $('#bond_cgst').val();
    var bond_sgst = $('#bond_sgst').val();
    var bond_igst = $('#bond_igst').val();
    var bond_exchange_transaction = $('#bond_exchange_transaction').val();
    var bond_stt = $('#bond_stt').val();
    var bond_sebi_fee = $('#bond_sebi_fee').val();
    var bond_stamp_duty = $('#bond_stamp_duty').val();
    var bond_net_amt = $('#bond_net_amt').val();
    var grp_asset = gr_assetn();
    
   
    if(bond_stock_name==""){
      $('#bond_stock_name').css('border', '1px solid red');
      $('#bond_stock_name').focus();
      $('#bond_stock_name_astrik').show();
      return false;
    }else{
     $('#bond_stock_name').css('border', '');
      $('#bond_stock_name_astrik').hide();
    }
      if(bond_transaction_type==""){
      $('#bond_transaction_type').css('border', '1px solid red');
      $('#bond_transaction_type').focus();
      $('#bond_transaction_type_astrik').show();
      return false;
    }else{
     $('#bond_transaction_type').css('border', '');
      $('#bond_transaction_type_astrik').hide();
    }
       if(bond_broker==""){
      $('#bond_broker').css('border', '1px solid red');
      $('#bond_broker').focus();
      $('#bond_broker_astrik').show();
      return false;
    }else{
     $('#bond_broker').css('border', '');
      $('#bond_broker_astrik').hide();
    }
      if(bond_date==""){
      $('#bond_date').css('border', '1px solid red');
      $('#bond_date').focus();
      $('#bond_date_astrik').show();
      return false;
    }
    else{
     $('#bond_date').css('border', '');
      $('#bond_date_astrik').hide();
    }
    
       if(bond_qty==""){
      $('#bond_qty').css('border', '1px solid red');
      $('#bond_qty').focus();
      $('#bond_qty_astrik').show();
      return false;
    }else{
     $('#bond_qty').css('border', '');
      $('#bond_qty_astrik').hide();
    }
       if(bond_purchase_price==""){
      $('#bond_purchase_price').css('border', '1px solid red');
      $('#bond_purchase_price').focus();
      $('#bond_purchase_price_astrik').show();
      return false;
    }else{
     $('#bond_purchase_price').css('border', '');
      $('#bond_purchase_price_astrik').hide();
    }
        if(bond_amt_invested==""){
      $('#bond_amt_invested').css('border', '1px solid red');
      $('#bond_amt_invested').focus();
      $('#bond_amt_invested_astrik').show();
      return false;
    }else{
     $('#bond_amt_invested').css('border', '');
      $('#bond_amt_invested_astrik').hide();
    }
    //    if(bond_net_rate==""){
    //   $('#bond_net_rate').css('border', '1px solid red');
    //   $('#bond_net_rate').focus();
    //   $('#bond_net_rate_astrik').show();
    //   return false;
    // }else{
    //  $('#bond_net_rate').css('border', '');
    //   $('#bond_net_rate_astrik').hide();
    // }
   
       if(bond_net_amt==""){
      $('#bond_net_amt').css('border', '1px solid red');
      $('#bond_net_amt').focus();
      $('#bond_net_amt_astrik').show();
      return false;
    }else{
     $('#bond_net_amt').css('border', '');
      $('#bond_net_amt_astrik').hide();
    }
    



     var form_data = {
       user_id: $('#bond_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
       assets_name: grp_asset[1],
       group_name:grp_asset[0],
       sub_assets_name : valu,
  
        stock_name : $('#bond_stock_name').val(),
        stock_transaction_type : $('#bond_transaction_type').val(),
        stock_broker : $('#bond_broker').val(),
        stock_date : $('#bond_date').val(),
        stock_contract_no : $('#bond_contract_no').val(),
        stock_settlement_no : $('#bond_settlement_no').val(),
        stock_qty : $('#bond_qty').val(),
        stock_purchase_price : $('#bond_purchase_price').val(),
        amt_invested : $('#bond_amt_invested').val(),
        stock_brokerage : $('#bond_brokerage').val(),
        stock_net_rate : $('#bond_net_rate').val(),
        stock_tax_value : $('#bond_tax_value').val(),
        stock_cgst : $('#bond_cgst').val(),
        stock_sgst : $('#bond_sgst').val(),
        stock_igst : $('#bond_igst').val(),
        stock_exchange_transaction : $('#bond_exchange_transaction').val(),
        stock_stt : $('#bond_stt').val(),
        stock_sebi_fee : $('#bond_sebi_fee').val(),
        stock_stamp_duty : $('#bond_stamp_duty').val(),
        stock_net_amt : $('#bond_net_amt').val()       

    };  

   if(valu != "")
   {
  
    $.ajax({
        url:"<?php echo base_url(); ?>Add_details/add_stock",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            if (msg == 1){
                // $('#addbond').modal('hide');
                 toastr.error("You don't have sufficient Shares for sale..!!");}
                 else if(msg == 2){
                  toastr.success("Data Inserted Successfully ..!!"); 
                  $(bond_var).val('');
                  $("#bond_table_data").DataTable().ajax.reload();
                  // $("#bond_table_data").DataTable().ajax.reload();
                 }
                 else if(msg == 3){
                  toastr.error("Not Inserted ..!!"); 
                 }
                 else if(msg == 4){
                  toastr.success("Data Inserted Successfully ..!!"); 
                  $(bond_var).val('');
                  // $("#sgb_table_data").DataTable().ajax.reload();
                  $("#bond_table_data").DataTable().ajax.reload();
                 }
                 else if(msg == 5){
                  toastr.error("Not Inserted ..!!"); 
                 }
                 else if(msg == 6){
                  toastr.success("Data Inserted Successfully ..!!"); 
                  $(bond_var).val('');
                  // $("#bond_table_data").DataTable().ajax.reload();
                  $("#bond_table_data").DataTable().ajax.reload();
                 }
                 else if(msg == 7){
                  toastr.error("Not Inserted ..!!"); 
                 }
                 else if(msg == 8){
                  toastr.error("You don't have sufficient Shares for sale..!!"); 
                 }
                

    
                
        
        }
    });

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
//add bond code Ends here

//sukanya codes starts heres .....


var sukanya_ast="#sukanya_transaction_type_astrik,#sukanya_account_no_astrik,#sukanya_opening_date_astrik,#sukanya_maturity_date_astrik,#sukanya_date_astrik,#sukanya_amt_invested_astrik,#sukanya_interest_rate_astrik";
$(sukanya_ast).hide();
var sukanya_var="#sukanya_transaction_type, #sukanya_account_no, #sukanya_opening_date, #sukanya_maturity_date, #sukanya_date, #sukanya_amt_invested, #sukanya_interest_rate";
$(sukanya_var).on('change', function(){
  $(sukanya_ast).hide();  
  $(sukanya_var).css('border', ''); 
    
});
$(sukanya_var).keyup(function(e){
    $(sukanya_ast).hide();
    $(sukanya_var).css('border', '');
});

$('#sukanyaadddata').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
   var select_assets = $('#select_assets').val();
  
    var sukanya_transaction_type = $('#sukanya_transaction_type').val();
    var sukanya_account_no = $('#sukanya_account_no').val();
   var sukanya_opening_date = $('#sukanya_opening_date').val();
   var sukanya_maturity_date = $('#sukanya_maturity_date').val();
   var sukanya_lockin_period = $('#sukanya_lockin_period').val();
    var sukanya_date = $('#sukanya_date').val();
   var sukanya_amt_invested = $('#sukanya_amt_invested').val();
    var sukanya_interest_rate = $('#sukanya_interest_rate').val();   
  var grp_asset = gr_assetn();
    if(sukanya_transaction_type==""){
      $('#sukanya_transaction_type').css('border', '1px solid red');
      $('#sukanya_transaction_type').focus();
      $('#sukanya_transaction_type_astrik').show();
      return false;
    }else{
     $('#sukanya_transaction_type').css('border', '');
      $('#sukanya_transaction_type_astrik').hide();
    }
      if(sukanya_account_no==""){
      $('#sukanya_account_no').css('border', '1px solid red');
      $('#sukanya_account_no').focus();
      $('#sukanya_account_no_astrik').show();
      return false;
    }else{
     $('#sukanya_account_no').css('border', '');
      $('#sukanya_account_no_astrik').hide();
    }
       if(sukanya_opening_date==""){
      $('#sukanya_opening_date').css('border', '1px solid red');
      $('#sukanya_opening_date').focus();
      $('#sukanya_opening_date_astrik').show();
      return false;
    }else{
     $('#sukanya_opening_date').css('border', '');
      $('#sukanya_opening_date_astrik').hide();
    }
     if(sukanya_maturity_date==""){
      $('#sukanya_maturity_date').css('border', '1px solid red');
      $('#sukanya_maturity_date').focus();
      $('#sukanya_maturity_date_astrik').show();
      return false;
    }else{
     $('#sukanya_maturity_date').css('border', '');
      $('#sukanya_maturity_date_astrik').hide();
    }
         if(sukanya_date==""){
      $('#sukanya_date').css('border', '1px solid red');
      $('#sukanya_date').focus();
      $('#sukanya_date_astrik').show();
      return false;
    }else{
     $('#sukanya_date').css('border', '');
      $('#sukanya_date_astrik').hide();
    }
        if(sukanya_amt_invested==""){
      $('#sukanya_amt_invested').css('border', '1px solid red');
      $('#sukanya_amt_invested').focus();
      $('#sukanya_amt_invested_astrik').show();
      return false;
    }else{
     $('#sukanya_amt_invested').css('border', '');
      $('#sukanya_amt_invested_astrik').hide();
    }
     if(sukanya_interest_rate==""){
      $('#sukanya_interest_rate').css('border', '1px solid red');
      $('#sukanya_interest_rate').focus();
      $('#sukanya_interest_rate_astrik').show();
      return false;
    }else{
     $('#sukanya_interest_rate').css('border', '');
      $('#sukanya_interest_rate_astrik').hide();
    }



     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
           assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
                $('#addSukanya').modal('hide');
                toastr.success("Your Form is submitted successfully!");
                $(sukanya_var).val('');
                   
                //   $('#sukanya_transaction_type').val("");
                //   $('#sukanya_account_no').val("");
                //   $('#sukanya_opening_date').val("");
                //   $('#sukanya_maturity_date').val("");
                //   $('#sukanya_lockin_period').val("");
                //   $('#sukanya_date').val("");
                //   $('#sukanya_amt_invested').val("");
                //   $('#sukanya_interest_rate').val("");   
  
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

var stok_var_ast="#stock_net_amt_astrik, #stock_name_astrik, #stock_transaction_type_astrik, #stock_broker_astrik, #stock_date_astrik, #stock_qty_astrik, #stock_net_rate_astrik, #stock_amt_invested_astrik, #stock_purchase_price_astrik";
$(stok_var_ast).hide();
var stok_var="#stock_name,#stock_transaction_type,#stock_broker,#stock_date,#stock_qty,#stock_purchase_price,#stock_amt_invested,#stock_net_rate,#stock_net_amt";
$(stok_var).on('change',function(){
    $(stok_var_ast).hide();
    $(stok_var).css('border', '');
});
$(stok_var).keyup(function(e) {
     $(stok_var_ast).hide();
    $(stok_var).css('border', '');
});
$('#apply_stock').click(function() {
   var valu = $('#select_sub_Assets').val();
   var portfolio_name = $('#select_portfolio_name').val();
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
    var grp_asset = gr_assetn();
    if(stock_name==""){
      $('#stock_name').css('border', '1px solid red');
      $('#stock_name').focus();
      $('#stock_name_astrik').show();
      return false;
    }else{
     $('#stock_name').css('border', '');
      $('#stock_name_astrik').hide();
    }
      if(stock_transaction_type==""){
      $('#stock_transaction_type').css('border', '1px solid red');
      $('#stock_transaction_type').focus();
      $('#stock_transaction_type_astrik').show();
      return false;
    }else{
     $('#stock_transaction_type').css('border', '');
      $('#stock_transaction_type_astrik').hide();
    }
       if(stock_broker==""){
      $('#stock_broker').css('border', '1px solid red');
      $('#stock_broker').focus();
      $('#stock_broker_astrik').show();
      return false;
    }else{
     $('#stock_broker').css('border', '');
      $('#stock_broker_astrik').hide();
    }
      if(stock_date==""){
      $('#stock_date').css('border', '1px solid red');
      $('#stock_date').focus();
      $('#stock_date_astrik').show();
      return false;
    }
    else{
     $('#stock_date').css('border', '');
      $('#stock_date_astrik').hide();
    }
    
   
       if(stock_qty==""){
      $('#stock_qty').css('border', '1px solid red');
      $('#stock_qty').focus();
      $('#stock_qty_astrik').show();
      return false;
    }else{
     $('#stock_qty').css('border', '');
      $('#stock_qty_astrik').hide();
    }
       if(stock_purchase_price==""){
      $('#stock_purchase_price').css('border', '1px solid red');
      $('#stock_purchase_price').focus();
      $('#stock_purchase_price_astrik').show();
      return false;
    }else{
     $('#stock_purchase_price').css('border', '');
      $('#stock_purchase_price_astrik').hide();
    }
       if(stock_amt_invested==""){
      $('#stock_amt_invested').css('border', '1px solid red');
      $('#stock_amt_invested').focus();
      $('#stock_amt_invested_astrik').show();
      return false;
    }else{
     $('#stock_amt_invested').css('border', '');
      $('#stock_amt_invested_astrik').hide();
    }
   
       if(stock_net_rate==""){
      $('#stock_net_rate').css('border', '1px solid red');
      $('#stock_net_rate').focus();
      $('#stock_net_rate_astrik').show();
      return false;
    }else{
     $('#stock_net_rate').css('border', '');
      $('#stock_net_rate_astrik').hide();
    }
    
      if(stock_net_amt==""){
      $('#stock_net_amt').css('border', '1px solid red');
      $('#stock_net_amt').focus();
      $('#stock_net_amt_astrik').show();
      return false;
    }else{
     $('#stock_net_amt').css('border', '');
      $('#stock_net_amt_astrik').hide();
    }




    var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
              assets_name: grp_asset[1],
       group_name:grp_asset[0],
       sub_assets_name : valu,
       
    stock_name : $('#stock_name').val(),
   stock_transaction_type : $('#stock_transaction_type').val(),
    stock_broker : $('#stock_broker').val(),
   stock_date : $('#stock_date').val(),
   stock_contract_no : $('#stock_contract_no').val(),
   stock_settlement_no : $('#stock_settlement_no').val(),
    stock_qty : $('#stock_qty').val(),
    stock_purchase_price : $('#stock_purchase_price').val(),
    amt_invested : $('#stock_amt_invested').val(),
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
           if (msg == 1){
                // $('#addSGB').modal('hide');
                 toastr.error("You don't have sufficient share to sell ...");}
                 else if(msg == 2){
                  toastr.success("Data Inserted Successfully ..!!"); 
                  $(stok_var).val('');
                  $("#stock_table_data").DataTable().ajax.reload();
                 }
                 else if(msg == 3){
                  toastr.error("Not Inserted ..!!"); 
                 }
                 else if(msg == 4){
                  toastr.success("Data Inserted Successfully ..!!"); 
                  $(stok_var).val('');
                  $("#stock_table_data").DataTable().ajax.reload();
                 }
                 else if(msg == 5){
                  toastr.error("Not Inserted ..!!"); 
                 }
                 else if(msg == 6){
                  toastr.success("Data Inserted Successfully ..!!"); 
                  $(stok_var).val('');
                  $("#stock_table_data").DataTable().ajax.reload();
                 }
                 else if(msg == 7){
                  toastr.error("Not Inserted ..!!"); 
                 }
                 else if(msg == 8){
                  toastr.error("You don't have sufficient Shares to sale..!!"); 
                 }
        }
    });

  

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});


//Investment sub-assets stock code end here..... 


// All investment forms code ends here ... 

// Libality all loan forms code start heres....



var loan_var_ast="#loan_bank_name_astrik,#loan_account_no_astrik,#loan_start_date_astrik,#loan_amount_astrik,#loan_period_astrik,#loan_emi_amt_astrik,#loan_emi_date_astrik,#loan_downpayment_amt_astrik,#loan_Interest_rate_type_astrik,#loan_fixed_rate_value_astrik";
$(loan_var_ast).hide();
var loan_var="#loan_bank_name,#loan_account_no,#loan_topup_amt,#loan_fixed_rate_value,#loan_balance_amt,#loan_pre_emi_amt,#loan_end_date,#loan_processing_fees,#loan_total_emipaid,#loan_start_date,#loan_amount,#loan_period,#loan_emi_amt,#loan_emi_date,#loan_downpayment_amt,#loan_Interest_rate_type";

$(loan_var).on('change',function(){
    $(loan_var_ast).hide();
    $(loan_var).css('border', '');
});
$(loan_var).keyup(function(e) {
     $(loan_var_ast).hide();
    $(loan_var).css('border', '');
});

$('#addAllLoans').click(function()
 {
     var valu = $('#select_sub_Assets').val();
     var portfolio_name = $('#select_portfolio_name').val();
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
  var grp_asset = gr_assetn();



     if(loan_bank_name==""){
      $('#loan_bank_name').css('border', '1px solid red');
      $('#loan_bank_name').focus();
      $('#loan_bank_name_astrik').show();
      return false;
    }else{
     $('#loan_bank_name').css('border', '');
      $('#loan_bank_name_astrik').hide();
    }

    if(loan_account_no==""){
      $('#loan_account_no').css('border', '1px solid red');
      $('#loan_account_no').focus();
      $('#loan_account_no_astrik').show();
      return false;
    }else{
     $('#loan_account_no').css('border', '');
      $('#loan_account_no_astrik').hide();
    }
         if(loan_start_date==""){
      $('#loan_start_date').css('border', '1px solid red');
      $('#loan_start_date').focus();
      $('#loan_start_date_astrik').show();
      return false;
    }else{
     $('#loan_start_date').css('border', '');
      $('#loan_start_date_astrik').hide();
    }
     if(loan_amount==""){
      $('#loan_amount').css('border', '1px solid red');
      $('#loan_amount').focus();
      $('#loan_amount_astrik').show();
      return false;
    }else{
     $('#loan_amount').css('border', '');
      $('#loan_amount_astrik').hide();
    }
      if(loan_period==""){
      $('#loan_period').css('border', '1px solid red');
      $('#loan_period').focus();
      $('#loan_period_astrik').show();
      return false;
    }else{
     $('#loan_period').css('border', '');
      $('#loan_period_astrik').hide();
    }
      if(loan_emi_amt==""){
      $('#loan_emi_amt').css('border', '1px solid red');
      $('#loan_emi_amt').focus();
      $('#loan_emi_amt_astrik').show();
      return false;
    }else{
     $('#loan_emi_amt').css('border', '');
      $('#loan_emi_amt_astrik').hide();
    }
     if(loan_emi_date==""){
      $('#loan_emi_date').css('border', '1px solid red');
      $('#loan_emi_date').focus();
      $('#loan_emi_date_astrik').show();
      return false;
    }else{
     $('#loan_emi_date').css('border', '');
      $('#loan_emi_date_astrik').hide();
    }
     if(loan_downpayment_amt==""){
      $('#loan_downpayment_amt').css('border', '1px solid red');
      $('#loan_downpayment_amt').focus();
      $('#loan_downpayment_amt_astrik').show();
      return false;
    }else{
     $('#loan_downpayment_amt').css('border', '');
      $('#loan_downpayment_amt_astrik').hide();
    }
     if(loan_Interest_rate_type==""){
      $('#loan_Interest_rate_type').css('border', '1px solid red');
      $('#loan_Interest_rate_type').focus();
      $('#loan_Interest_rate_type_astrik').show();
      return false;
    }else{
     $('#loan_Interest_rate_type').css('border', '');
      $('#loan_Interest_rate_type_astrik').hide();
    }
   

     var form_data = {
      user_id: $('#stock_user_id').val(),
       portfolio_name : $('#select_portfolio_name').val(),
              assets_name: grp_asset[1],
       group_name:grp_asset[0],
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
                $('#addLoan').modal('hide');
                 toastr.success("Your Loan form submitted successfully!");
                $(loan_var).val('');
                        }
            else if (msg == 'NO'){
                 toastr.error(msg);
                 }
            else
               { toastr.error(msg);
                   
                 
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
      $('#floating_date_from').focus();
      $('#floating_date_from_astrik').show();
      return false;
    }else{
     $('#floating_date_from').css('border', '');
      $('#floating_date_from_astrik').hide();
    }
      if(floating_date_to==""){
      $('#floating_date_to').css('border', '1px solid red');
      $('#floating_date_to').focus();
      $('#floating_date_to_astrik').show();
      return false;
    }else{
     $('#floating_date_to').css('border', '');
      $('#floating_date_to_astrik').hide();
    }

    if(loan_floating_value==""){
      $('#loan_floating_value').css('border', '1px solid red');
      $('#loan_floating_value').focus();
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
            else if (msg == 'NO'){ toastr.error(msg); }
             
            else { toastr.error(msg); }
        }
    });

    return false;
  }
  else{alert("Table is not avaliable..!!");}
});
// Libality all loan form code ENDS here....

});
</script>