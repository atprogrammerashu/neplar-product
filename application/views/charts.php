  <?php include('header.php'); ?>

  <style>
  #dashboard_table_filter , #dashboard_table_length  ,#dashboard_table_info,#dashboard_table_paginate ,#dashboard_table_filter ,#dashboard_table_length ,#dashboard_table_info,#dashboard_table_paginate{
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

@media print{
  #showPortfolioWise_table_filter {display: none;}
}


  </style>

  <div class="container-fluid" style="margin-top: 20px;">
    <h5><a  href="<?=base_url('/Dashboard');?>" style="text-decoration: none"><i class="fa fa-hand-o-left"></i>&nbsp;Back</a></h5>
    <div class="container  text-center">
      <h4>Asset Allocation <span style="font-size:15px;">as on <?php
      date_default_timezone_set('Asia/Kolkata');
      $currentTime = date( 'd/m/Y h:i:s A', time () );
      echo $currentTime;
      ?></span> </h4>
    </div>
  <br>

    <div class="container-fluid">
      <div class="row">
                <div class="col-md-4">
                  
                    <div class=" text-left">
                        <select class="form-control"  id="chart_value" >
                        <option value="">Choose Asset Class</option>
                       <option value="Mutual Funds (Equity)">Mutual Funds (Equity)</option>
                       <option value="Stock / Share">Stock / Share</option>
                       <option value="Mutual Funds (Debt)">Mutual Funds (Debt)</option>
                       <option value="Traded Bonds">Traded Bonds</option>
                      </select>
                   </div>

               </div>  
               <div class="col-md-4"></div>       
          
            <div class="col-md-4">
                <div class="text-right">
                  <button type="button" class="btn btn-secondary btn-sm"  data-toggle="modal" data-target="#showPortfolioWise">
                   Portfolio-wise
                 </button>
                 <button type="button" class="btn btn-primary" onClick="window.print()" >
                   <span class="fa fa-print fa-lg" aria-hidden="true"></span>
                 </button>
               </div>
           </div>    
      </div>   
   </div>
  </div>
  <div class="container">
   <div class="row">
     <div class="col-md-8">

      <div id="piechart" style="width: 650px; height: 500px;"></div>  
    </div>
    <div class="col-md-4">
      <div class="container-fluid" style="padding-top: 50px;">
        <div class="row">
          <div class="col-md-12">
            <ul style="list-style: none">
                  <h6>Current Value</h6>
                  <li style="color: black;"><span>₹ <?php echo number_format($all_total_current_value,2,'.',','); ?></span></li><br>
                  <h6>Amount Invested</h6>
                  <li style="color: black;">₹ <?php echo number_format($all_total_amt_invested,2,'.',',');?></li><br>
                  <h6>Overall Gain</h6>
                  <li style="color: green;">₹ <?php echo number_format($all_total_overall_gain,2,'.',','); ?></li><br>
                  <h6>Overall Gain %</h6>
                  <li style="color: green;"><?php echo number_format($all_total_overall_gain_percent,2,'.',',');?>%</li>
                </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="container">
    <table class="table table-hover" id="dashboard_table">
      <thead>
        <tr>
          <th scope="col" ></th>
          <th scope="col">Assets</th>
          <th scope="col">Quantity</th>
          <th scope="col">Amt. invested</th>
          <th scope="col">Overall Gain</th>
          <th scope="col">Gain%</th>
          <th scope="col">Current Value</th>
          <th scope="col">Holding</th>
        </tr>
      </thead>
      <tbody class="tbody"> 

      </tbody>
    </table>

  </div>
  <br><br><br><br><br><br>

    

  <?php include('footer.php'); ?>
  <script type="text/javascript" src="<?php echo base_url(); ?>asstes/js/loader.js"></script>

  <script type="text/javascript">
   $(document).ready(function() {

  //gooogle code starts heere.....
          google.charts.load('current', {packages: ['corechart']});
          google.charts.setOnLoadCallback();

 //Onload me pie chart code assets wise...........
        $.ajax({
        url:"<?php echo base_url(); ?>Charts/fetch_onload_piechart",
        method:"POST",
        dataType:"JSON",
        success:function(data)
        {  drawMonthwiseChart(data, "Assets Wise Data"); }
        });

// On dropdown me pie chart load assets wise code .............
         $('#chart_value').change(function(){ 
            var chart_value = $('#chart_value :selected').text();   
          load_monthwise_data(chart_value, 'Asset-Wise Data For');  });
     
  });// onload fnction ends here ...

   function format ( d ) {

    var i,row='';
    row +='<table class="table table-hover">'+ '<tbody>';

    for(i=0; i< Object.keys( d.kk ).length; i++)
    {
      if(d.kk[i].assets_name=='Investment')
      {
        row +='<tr><td>'+d.kk[i].stock_name+'</td>'+
        '<td>'+d.kk[i].stock_qty+'</td>'+
        '<td>'+d.kk[i].amt_invested+'</td>'+        
        '<td>'+d.kk[i].overall_gain+'</td>'+
        '<td>'+d.kk[i].gain_percentage+'</td>'+
        '<td>'+d.kk[i].current_value+'</td>'+
        '<td>'+d.kk[i].holding+'</td></tr>';
      }  
      else if(d.kk[i].dummy_data=='Mutual Funds (Equity)')
      {
       row +='<tr><td>'+d.kk[i].mutual_scheme+'</td>'+
       '<td>'+d.kk[i].mutual_quantity+'</td>'+
       '<td>'+d.kk[i].amt_invested+'</td>'+     
       '<td>'+d.kk[i].overall_gain+'</td>'+
        '<td>'+d.kk[i].gain_percentage+'</td>'+
        '<td>'+d.kk[i].current_value+'</td>'+
        '<td>'+d.kk[i].holding+'</td></tr>';

     }
     else if(d.kk[i].dummy_data=='Mutual Funds (Debt)')
     {
       row +='<tr><td>'+d.kk[i].mutual_scheme+'</td>'+
       '<td>'+d.kk[i].mutual_quantity+'</td>'+
       '<td>'+d.kk[i].amt_invested+'</td>'+
        '<td>'+d.kk[i].overall_gain+'</td>'+
        '<td>'+d.kk[i].gain_percentage+'</td>'+
        '<td>'+d.kk[i].current_value+'</td>'+
        '<td>'+d.kk[i].holding+'</td></tr>';

     }
     else if(d.kk[i].dummy_data=='Traded Bonds')
     {
       row +='<tr><td>'+d.kk[i].stock_name+'</td>'+
       '<td>'+d.kk[i].stock_qty+'</td>'+
       '<td>'+d.kk[i].amt_invested+'</td>'+
        '<td>'+d.kk[i].overall_gain+'</td>'+
        '<td>'+d.kk[i].gain_percentage+'</td>'+
        '<td>'+d.kk[i].current_value+'</td>'+
        '<td>'+d.kk[i].holding+'</td></tr>';

     }


   }

   row += '</tbody>'+'</table>';
   return row;  
  }

  var table = $('#dashboard_table').DataTable( {
    "ajax": "<?php echo base_url(); ?>Charts/fetch_all_data",
    "columns": [
    {
      "className":      'details-control',
      "orderable":      false,
      "data":           null,
      "defaultContent": ''
    },
    { "data": "stock_name"},
    { "data": "stock_qty" },
    { "data": "amt_invested" },
    { "data": "overall_gain" },  
    { "data": "gain_percentage" },  
    { "data": "current_value"},  
    { "data": "holding"},  

    ]

  } );


  $('#dashboard_table tbody').on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = table.row( tr );

    if ( row.child.isShown() )
    {
      row.child.hide();
      tr.removeClass('shown');

    }
    else
    {
      row.child( format(row.data()) ).show();
      tr.addClass('shown');
    }
  });





function load_monthwise_data(chart_value, title)
{
    var temp_title = title + ' '+chart_value+'';
    $.ajax({
        url:"<?php echo base_url(); ?>Charts/fetch_piChart_stockData",
        method:"POST",
        data:{chart_value:chart_value},
        dataType:"JSON",
        success:function(data)
        {
            drawMonthwiseChart(data, temp_title);
        }
    });
}

function drawMonthwiseChart(chart_data, chart_main_title)
{
    var jsonData = chart_data;
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'stock_name');
    data.addColumn('number', 'holding');
    $.each(jsonData, function(i, jsonData){
        var stock_name = jsonData.stock_name;
        var holding = parseFloat($.trim(jsonData.holding));
        data.addRows([[stock_name, holding]]);
    });


    var options = {
        hAxis: {
            title: "stock_name"
        },
        vAxis: {
            title: 'holding'
        }
    };


    var counter = 0;

    var handler = setInterval(function(){
      counter = counter + 0.1
      options = {
        title:chart_main_title,
        pieHole: 0.4,
        is3D: true,          
        slices: { 1: {offset: counter},                      
        2: {offset: counter},                      
        4: {offset: counter},
      }
    };
    chart.draw(data, options);

    if (counter > 0.3) clearInterval(handler);
  }, 200);   


    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}

</script>

<?php include('Chart_portfolio_wise.php'); ?>


  
                       
                     