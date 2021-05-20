<!-- add Stock modal body -->

<script type="text/javascript">
    function printPageArea(areaID){
    var printContent = document.getElementById(areaID);
    var WinPrint = window.open('', '', 'width=900,height=1900');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}

</script>

<div class="modal fade bd-example-modal-lg" id="showPortfolioWise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-size" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Portfolio Wise Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  style="overflow-y:scroll;height:600px ;">

          <div class="container-fluid">
                  <div class="row">
                      <div class="col-md-5">
                        
                              <div class=" text-left">
                                  <select class="form-control"  id="Assets_value" >
                                  <option value="">Choose Asset Class</option>
                                 <option value="Mutual Funds (Equity)">Mutual Funds (Equity)</option>
                                 <option value="Stock / Share">Stock / Share</option>
                                 <option value="Mutual Funds (Debt)">Mutual Funds (Debt)</option>
                                 <option value="Traded Bonds">Traded Bonds</option>
                                </select>
                             </div>

                         </div>  
                         <div class="col-md-5">
                                     <select class="form-control" id="portfoliowise_name" >
                                                 <option value="">Choose portfolio name</option>              
                                       <?php
                                               foreach($show_portfolio as $row)
                                            {
                                             echo '<option value="'.$row->portfolio_name.'">'.$row->portfolio_name.'</option>';
                                            }
                                        ?>
                                    </select>
                        </div> 
                        <div class="col-md-2 text-center">
                            <button type="button" class="btn btn-primary" onclick="printPageArea('print_forParticularSection')" >
                             <span class="fa fa-print fa-lg" aria-hidden="true"></span>
                           </button>
                    
                        </div>
                   </div>     
         </div>

               <div id="print_forParticularSection">
                 <!--  yeh chart portfolio-wise start    -->    
                       <div class="d-flex justify-content-center">
                        <div id="piechart_PortfolioWise"  style="width: 670px; height: 400px;"></div> 
                        </div> 
                  <!-- yaha end -->
                            <div class="container-fluid">
                                      <table class="table table-hover" id="showPortfolioWise_table">
                                      <thead>
                                        <tr>
                                          <th scope="col">Assets</th>
                                          <th scope="col">Quantity</th>
                                          <th scope="col">Amt. invested</th>
                                          <th scope="col">Overall Gain</th>
                                          <th scope="col">Gain%</th>
                                          <th scope="col">Current Value</th>
                                          <th scope="col">Holding%</th>
                                        </tr>
                                      </thead>
                                      <tbody class="tbody"> </tbody>
                                      <tfoot id="maintfoot">
                                           <tr id="networth">
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

      
      </div>
 
    </div>
  </div> <!--  modal close here .... -->


<script type="text/javascript">
 $(document).ready(function() {    



       $('#portfoliowise_name').change(function(){ 
            var Assets_value = $('#Assets_value :selected').val();  
            var portfoliowise_name = $('#portfoliowise_name :selected').val();   

            if(Assets_value != "" && portfoliowise_name != "")
            {    
                 // yaha chart load function call kiya h .... 
              load_PortfolioWise_data(Assets_value,portfoliowise_name, 'Portfolio-wise Data For');

              // table load karne ke liye ...
              var form_data = { Assets_value: Assets_value, portfoliowise_name: portfoliowise_name };
               // form data se id send ki.....   

                   $('#showPortfolioWise_table').DataTable().destroy();
              // yeh har bar table destry karke new data initialize karega....

                   $('#showPortfolioWise_table').DataTable({ 
                    "retrieve": true,
                    "ajax": {"url":"<?php echo base_url(); ?>Charts/showPortfolioWise_data",
                             "type":"POST",
                             "data": form_data },
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
                                var holding = api
                                    .column( 6 )
                                    .data()
                                    .reduce( function (a, b) {
                                        return (intVal(a) + intVal(b)).toFixed(2);
                                    }, 0 );
                            
                                var current_value = api
                                    .column( 5 )
                                    .data()
                                    .reduce( function (a, b) {
                                        return (intVal(a) + intVal(b)).toFixed(2);
                                    }, 0 );
                              
                                var gain_percent = api
                                    .column(4)
                                    .data()
                                    .reduce( function (a, b) {
                                        return (intVal(a) + intVal(b)).toFixed(2);
                                    }, 0 );

                                    var overall_gain = api
                                    .column(3)
                                    .data()
                                    .reduce( function (a, b) {
                                        return (intVal(a) + intVal(b)).toFixed(2);
                                    }, 0 );

                                     var amt_invested = api
                                    .column(2)
                                    .data()
                                    .reduce( function (a, b) {
                                        return (intVal(a) + intVal(b)).toFixed(2);
                                    }, 0 );
                            
                                  var quantity = api
                                    .column(1)
                                    .data()
                                    .reduce( function (a, b) {
                                        return (intVal(a) + intVal(b)).toFixed(2);
                                    }, 0 );
                            
                                
                                $( api.column( 6 ).footer() ).html(holding+" %");
                                $( api.column( 5 ).footer() ).html(current_value);
                                $( api.column( 4 ).footer() ).html(gain_percent+" %");
                                 $( api.column( 3 ).footer() ).html(overall_gain);
                                  $( api.column( 2 ).footer() ).html(amt_invested);
                                $( api.column( 1 ).footer() ).html(quantity);
                                $( api.column( 0 ).footer() ).html('Total');
                            }
   
                          
                   });          
                  
              }
             else{alert("data is not found..!!");}   

       });// yaha datatable code finish

  });// onload fnction ends here ...

   



function load_PortfolioWise_data(Assets_value,portfoliowise_name, title)
{
    var temp_title = title + ' '+portfoliowise_name+'';
     var form_data = { Assets_value: Assets_value, portfoliowise_name: portfoliowise_name };
    $.ajax({
        url:"<?php echo base_url(); ?>Charts/fetch_piChart_PortfolioWise",
        method:"POST",
        data:form_data,
        dataType:"JSON",
        success:function(data)
        {
            drawPortfolioWiseChart(data, temp_title);
        }
    });
}

function drawPortfolioWiseChart(chart_data, chart_main_title)
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
        title: chart_main_title,
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


    var chart = new google.visualization.PieChart(document.getElementById('piechart_PortfolioWise'));
    chart.draw(data, options);
}

  
</script>