 <?php include('header.php'); ?>

<style>
#submaintable{
 width:-webkit-fill-available !important;
 margin-left: 100px;
}

#tableinside-portfolio_filter , #tableinside-portfolio_length  ,#tableinside-portfolio_info,#tableinside-portfolio_paginate{
  display: none;
}  

  
td.details-control {
    background-image: url('<?php echo base_url()?>asstes/img/plus4.png') ;
    background-repeat: no-repeat;
    background-position: center;
    background-size: 20px 15px;
    cursor: pointer;
   
}
tr.shown td.details-control {
    background-image: url('<?php echo base_url()?>asstes/img/minus.jpg') ;
    background-repeat: no-repeat;
    background-position: center;
    background-size: 20px 15px;
    cursor: pointer;
}
 
td.data {font-size:9px}
 
</style>
     <div class="container-fluid" style="font-weight: bold; padding: 6px; cursor: pointer;">
      <a href="<?php echo base_url(); ?>/Dashboard" id="linksubdetails">
        <span  value="<?php echo $assets_name; ?>">
          <?php echo $assets_name; ?>
        </span>
      </a>
       >
        <span id="linksubdetails" onclick="location.reload();" value="<?php echo $port_name; ?>">
          <?php echo $port_name; ?>
       </span>
    </div>

     <table class="table table-hover " id="tableinside-portfolio" style="width: 100% !important;">
               <thead >

                 <tr class="">
                   <th style="width: 2%;">   
                   
                  </th>
      
                     <th  style="width: 16%;" >
                          <div class="input-group ">
                          <input type="search" id="search-company" class="form-control" placeholder="Search Company" >
                           </div>
                    </th> 

                    <th style="width: 5%;">Qty.</th>
                    <th style="width: 10%;">Avg. Price / NAV</th>
                    <th style="width: 6%;">Amt. Inv.</th>
                    <th style="width: 6%;">LTP</th>
                    <th style="width: 10%;">Current Value</th>
                    <th style="width: 10%;">Today's Gain / Gain %</th>
                     <th style="width: 10%;">Notional Gain / Gain %</th>
                  </tr>

                </thead>

                <tbody>
                 
                </tbody>
             
          </table>










<?php include('footer.php'); ?>

<script type="text/javascript">

 $(document).ready(function() {


 
function format ( d ) {
   var i,row='';
      row +='<table id="submaintable">'
         +'<thead>'+
         '<tr >'+                  
                    '<th >Trans. Type</th>'+
                    '<th >Date</th>'+
                    '<th >Qty</th>'+
                    '<th>Price</th>'+
                    '<th >Amt. invested</th>'+
                    '<th >Purchase amt.</th>'+
                     
          '</tr>'+
          '</thead>'+
       '<tbody>';
     
         for(i=0; i< Object.keys( d.kk ).length; i++)
        { 
          
             row +='<tr><td><a href="#" id="linksubdetails">'+d.kk[i].transaction_type+'</a></td>'+
              '<td>'+d.kk[i].date+'</td>'+
              '<td>'+d.kk[i].qty+'</td>'+
              '<td>'+d.kk[i].price+'</td>'+
               '<td>'+d.kk[i].amt_invested+'</td>'+
              '<td>'+d.kk[i].purchase_amt+'</td>'+'</tr>';
             
        }

        row +='<tr><td colspan="5">Current Price: 553.60</td><td>Current Value: 1,107.20</td></tr>'
 
     row += '</tbody>'+'</table>';

  return row;        
       
}
  
    var table = $('#tableinside-portfolio').DataTable( {
        "ajax": "<?php echo base_url(); ?>Portfolio/userportfolio",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "name" },
            { "data": "qty" },
            { "data": "avg_price" },
            { "data": "amt_invested" },
            { "data": "ltp" },
            { "data": "current_value" },
            { "data": "today_gain" },
            { "data": "national_gain" },
          
      

        ],

         "columnDefs": [ {
        "targets": [0,1], 
        "orderable": false,
     }],
     "retrieve": true
        
    } );

    




    
   $('#search-company').keyup(function(){ table.search($(this).val()).draw(); });    

    $('#tableinside-portfolio tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
     
            row.child.hide();
            tr.removeClass('shown');

        }
        else {
      
    
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });  
  



});// doc.ready bala close h..

     



</script>

