 
<nav class="navbar myfooter justify-content-center">
	<p class="">© Copyright <b>Neplar® Techno Pvt. Ltd. </b> All Rights Reserved</p>
</nav>

<?php include('addformsfooter.php'); ?>

<style>
#submaintable{
width: 100%;
}


#tableMain_filter , #tableMain_length  ,#tableMain_info,#tableMain_paginate ,#tableMain2_filter ,#tableMain2_length ,#tableMain2_info,#tableMain2_paginate{
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

table.dataTable thead th {
  border-bottom: none !important;
}
table.dataTable.no-footer {
  border-bottom: none !important;
}

table.dataTable thead .sorting_asc {
    background : none !important;
}
 
</style>

<script type="text/javascript">

 $(document).ready(function() {
     
     $('#showgrp').hover(function() {
  $.ajax({
              url:"<?php echo base_url(); ?>Dashboard/getGroupOnhover",
              type: 'POST',
              success: function(jsonStr) {       
                $('#pp').html(jsonStr);
              }
          });
}); 

 $(document).on("click", ".grpdataID a span" , function() { 
      var grp_name = $(this).parent().text();
      $.ajax({
              url:"<?php echo base_url(); ?>Dashboard/getPortfolioOnhover",
              type: 'POST',
              data:{grp_name:grp_name},
              success: function(jsonStr) {    
                 $('.sub_data').html(jsonStr);
              }
          });
 });

       // modal ke andar bali table ka code ...
       var table2 = $('#tableMain2').DataTable({ "ajax" : "<?php echo base_url(); ?>Dashboard/displayassets" ,
                  "columnDefs": [ {
              "targets": [0,1], 
              "orderable": false,
           }]});

        // table me search ka code ..... 
          $('#search-inp2').keyup(function(){
            table2.search($(this).val()).draw() ;
           });
       
    
 }); // onload code ends here ....
     


// first table front table code starts here....

    var table = $('#tableMain').DataTable( {
        "ajax": "<?php echo base_url(); ?>Dashboard/fetch_maintable",
        "columns": [
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "sub_assets" },
            { "data": "qty" },
            { "data": "avg_price" },
            { "data": "amt_invest" },
            { "data": "ltp" },
            { "data": "current_value" },
            { "data": "today_gain" },
            { "data": "national_gain" },
          
      

        ],

         "columnDefs": [ {
        "targets": [0,1], 
        "orderable": false,
          
         //   "visible": false,
           // "targets": -1
       
     }],
     "retrieve": true,
   "aLengthMenu": [100],
   "scrollY": 340,

    "paging": false,
    "responsive": true,

      "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
  
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
            var amt_invest = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
        
            var today_gain = api
                .column( 7 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
          
            var notional_gain = api
                .column(8)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
        
            $( api.column( 1 ).footer() ).html('Net worth');
            $( api.column( 4 ).footer() ).html(amt_invest);
            $( api.column( 7 ).footer() ).html('<p class="top-data">'+today_gain+'</p><p class="bottom-data">25.04%</p>');
            $( api.column( 8 ).footer() ).html('<p class="top-data">'+notional_gain+'</p><p class="bottom-data">57.14%</p>');
           
        }
   

        
    });


  // table one front bali search code ....
        $('#search-inp').keyup(function(){
      table.search($(this).val()).draw() ;
     });
        

     
    $('#tableMain tbody').on('click', 'td.details-control', function () {
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

function format ( d ) {
   var i,row='';
      row +='<table class="table table-hover" id="submaintable">'+
     
        '<tbody>';
     
         for(i=0; i< Object.keys( d.kk ).length; i++)
        { 
          if(d.kk[i].sub_assets_name=='Cash in Hand' || d.kk[i].sub_assets_name=='Cash in post office saving A/c' || d.kk[i].sub_assets_name=='Cash in Saving A/C' || d.kk[i].sub_assets_name=='Cash in wallet')
          {
              row +='<tr><td style="width:30px;"></td><td>'+d.kk[i].sub_portfolio_name+'</td>'+
              '<td></td>'+
               '<td></td>'+
               '<td>'+d.kk[i].sub_assets_amt_invested+'</td>'+
               '<td></td>'+
              '<td>'+d.kk[i].current_value+'</td>'+
              '<td>'+'100'+'</td>'+
              '<td>'+'100'+'</td></tr>';
          }
           else if(d.kk[i].sub_assets_name=='Stock / Share' || d.kk[i].sub_assets_name=='Bond / Corporate Bond' || d.kk[i].sub_assets_name=='MF / Mutual Fund' || d.kk[i].sub_assets_name=='NPS / National Pension System' || d.kk[i].sub_assets_name=='SGB / Sovereign Gold Bond' || d.kk[i].sub_assets_name=='NCD / Debenture' || d.kk[i].sub_assets_name=='Private Equity / Startup' || d.kk[i].sub_assets_name=='RD / Recurring Deposit')
          {
              row +='<tr><td></td><td><a href="<?php echo base_url()?>Portfolio?var='+d.kk[i].sub_assets_name+'&var2='+d.kk[i].sub_portfolio_name+'" id="linksubdetails">'+d.kk[i].sub_portfolio_name+'</a></form></td>'+
              '<td></td>'+
               '<td></td>'+
               '<td>'+d.kk[i].sub_assets_amt_invested+'</td>'+
               '<td></td>'+
              '<td>'+d.kk[i].current_value+'</td>'+
              '<td>'+'100'+'</td>'+
              '<td>'+'100'+'</td></tr>';
          }
          else
          { 

             row +='<tr><td></td><td><a href="#" id="linksubdetails">'+d.kk[i].sub_portfolio_name+'</a></td>'+
              '<td>'+d.kk[i].sub_assets_quantity+'</td>'+
              '<td>'+d.kk[i].sub_assets_avg_price+'</td>'+
              '<td>'+d.kk[i].sub_assets_amt_invested+'</td>'+
               '<td></td>'+
              '<td>'+'100'+'</td>'+
               '<td>'+'100'+'</td>'+
              '<td>'+'100'+'</td></tr>';
          }    
        }
 
     row += '</tbody>'+'</table>';

  return row;        
       
}

</script>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?=base_url('asstes/js/chosen.jquery.js');?>"></script>   
    <script type="text/javascript" src="<?=base_url('asstes/js/DropSearchCode.js');?>"></script>
 
  </body>
</html>




