<?
$this->load->view('header');
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<style>
.myfooter{
    
}
.card-header {
    padding: 0.75rem 0.25rem !important;
    margin-bottom: 0 !important;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125); 
}
.dt-button{
    background: rgb(38,189,154) !important;
    color: #fff !important;
    outline: none !important;
    border:0 !important;
    padding: 2px 10px !important;
    margin: 3px !important;
    border-radius: 2px !important;
}
.paginate_button {
    background: rgb(38,189,154) !important;
    color: #fff !important;
    outline: none !important;
    border:0 !important;
    padding: 2px 10px !important;
    margin: 3px !important;
}
.set-icon{
   padding-left:0px !important; 
   margin: 2px !important;
}

.scrollable-select {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}
</style>

<?
//echo $date = date("d-m-Y", strtotime($income_data[0]->date));
foreach($income_data as $key=>$row)
{
    
}
?>

<div class="container-fluid mt-5">
    <h5 class="mt-2"><a href="<?=base_url('Dashboard')?>" style="text-decoration: none"><i class="fa fa-hand-o-left"></i>&nbsp;Back</a></h5>
</div>
<div class="container-fluid pb-5">
    
    <div class="row">
        <div class="col-md-12">
            <div class="p-4" id="chart_div" style="width: 100%; height: 100%;"></div>
        </div>
        <!--<div class="col-md-2">
            <div class="card rounded-0" id="month-chart" style="width: 100%; height: 300px;"></div>
        </div>
        <div class="col-md-2">
            <div class="card rounded-0" id="year-chart" style="width: 100%; height: 300px;"></div>
        </div>-->
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card rounded-0" id="month-chart" style="width: 100%; height: 300px;"></div>
        </div>
        <div class="col-md-6">
            <div class="card rounded-0" id="year-chart" style="width: 100%; height: 300px;"></div>
        </div>
    </div>
    
    <div class="card rounded-0 pb-2">
        <div class="card-header">
            <h5>Expence Data Table</h5>
        </div>
        <table id="data-table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Expence</th>
                <th>Sub Expence</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?
            foreach($budget_arr as $row):
            ?>
            <tr>
                <td><?=$row['expence']?></td>
                <td><?=$row['sub_expence']?></td>
                <td><?=$row['amount']?></td>
                <td><?=$row['date']?></td>
            </tr>
            <?
            endforeach
            ?>
        </tbody>
    </table>
    </div>
    
    <div class="card rounded-0 pb-2 mt-5">
        <div class="card-header">
            <h5>Income Data Table</h5>
        </div>
        <table id="data-table-1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Income Source</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?
            foreach($income_data as $value):
            ?>
            <tr>
                <td><?=$value->income_source_name?></td>
                <td><?=$value->income_amount?></td>
                <td><?=$value->date?></td>
            </tr>
            <?
            endforeach
            ?>
        </tbody>
    </table>
    </div>
</div>

<div class="modal fade" id="add-new-expence" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New Expence</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="pwd">Date</label>
                <input class="form-control" data-date-format="dd-mm-yyyy" id="datepicker">
              </div>
              <div class="form-group">
                <label for="email">Expence</label>
                <select class="form-control scrollable-select" id="expence">
                    <?
                    foreach($expences as $row):
                    ?>
                    <option value="<?=$row->id?>"><?=$row->name?></option>
                    <?endforeach?>
                </select>
              </div>
              <div class="form-group">
                <label for="pwd">Sub-Expence</label>
                <select class="form-control scrollable-select" id="sub-expence">
                </select>    
              </div>
              <div class="form-group">
                <label for="pwd">Expence amount</label>
                <input type="number" class="form-control" placeholder="Expence amount" id="expence-amt">
              </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success cust-btn-modal">Save</button>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="add-new-income" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">New Expence</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="pwd">Date</label>
                <input class="form-control" data-date-format="dd-mm-yyyy" id="datepicker-1">
              </div>
              <div class="form-group">
                <label for="email">Income Source</label>
                <select class="form-control scrollable-select" id="income">
                    <?
                    foreach($income_arr as $row):
                    ?>
                    <option value="<?=$row->income_name?>"><?=$row->income_name?></option>
                    <?endforeach?>
                </select>
              </div>
              <div class="form-group">
                <label for="pwd">Income amount</label>
                <input type="number" class="form-control" placeholder="Incmome amount" id="income-amt">
              </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success cust-btn-modal">Save</button>
        </div>
      </div>
    </div>
</div>

<?
$this->load->view('footer');
?>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['April',      2],
      ['May',  2],
      ['June', 2],
      ['July',    7],
      ['August', 5],
      ['September',    7],
      ['October', 2],
      ['November',    7],
      ['December', 2],
      ['January',    7],
      ['February', 2],
      ['March',     11]
    ]);

    var options = {
      title: 'Expense Details- Monthly Basis',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('month-chart'));
    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['April',      2],
      ['May',  2],
      ['June', 2],
      ['July',    7],
      ['August', 5],
      ['September',    7],
      ['October', 2],
      ['November',    7],
      ['December', 2],
      ['January',    7],
      ['February', 2],
      ['March',     11]
    ]);

    var options = {
      title: 'Income Details- Monthly Basis',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('year-chart'));
    chart.draw(data, options);
  }
</script>

<script>
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Months', 'Sales', 'Expenses', 'Profit'],
          ['April', 1000, 400, 200],
          ['May', 1170, 460, 250],
          ['June', 660, 1120, 300],
          ['July', 1030, 540, 350],
          ['August', 1030, 540, 350],
          ['September', 1030, 540, 350],
          ['October', 1030, 540, 350],
          ['November', 1030, 540, 350],
          ['December', 1030, 540, 350],
          ['January', 1030, 540, 350],
          ['February', 1030, 540, 350],
          ['March', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Income vs Expense Details - Yearly Basis',
            subtitle: '',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
</script>

<script>
$(document).ready(function() {
    $('#data-table').DataTable({
        "bFilter": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false, 
        "info": false,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ]
    });
});
</script> 

<script>
$(document).ready(function() {
    $('#data-table-1').DataTable({
        "bFilter": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false, 
        "info": false,
        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ]
    });
});
</script> 

<script>
    $(document).ready(function(){
       $('#data-table_wrapper .dt-buttons').append('<button class="dt-button buttons-add-expence" type="button"><i class="fa fa-plus-circle set-icon"></i></button>'); 
    });
    $(document).ready(function(){
       $('#data-table-1_wrapper .dt-buttons').append('<button class="dt-button buttons-add-income" type="button"><i class="fa fa-plus-circle set-icon"></i></button>'); 
    });
</script>

<script>
    $(document).on('click','.buttons-add-expence',function(){
        $(".cust-btn-modal").text("Save");
        $(".cust-btn-modal").attr("id","save-new-expence");
        $("#add-new-expence").modal('show');
    });
    $(document).on('click','.buttons-add-income',function(){
        $(".cust-btn-modal").text("Save");
        $(".cust-btn-modal").attr("id","save-new-income");
        $("#add-new-income").modal('show');
    });
</script>

<script>
    $(document).on("change","#expence",function(){
        var id = $(this).val();
        $.post("<?=base_url()?>Budget/get_sub_expences",
        {
            expence:id
        },
        function(data, status){
            $("#sub-expence").html(data);
        });
    });
</script>

<script>
    $(document).ready(function(){
        $("#expence").trigger("change");
    });
    
    $(document).on("click","#save-new-expence",function(){
        var baseUrl = '<?php echo base_url(); ?>';
        var date = $("#datepicker").val();
        var expence = $("#expence").val();
        var subexpence = $("#sub-expence").val();
        var amount = $("#expence-amt").val();
        var fd = new FormData();
        fd.append('expence_id',expence);
        fd.append('sub_expence_id',subexpence);
        fd.append('expence_amt',amount);
        fd.append('date',date);
        $.ajax({
        url: baseUrl + "Budget/add_new_budget",
        type: "POST",
        data: fd,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(jsonStr) 
        {
            var res_data = JSON.stringify(jsonStr);
            var response = JSON.parse(res_data);
            var responseData = response['responseData'];
            if ((responseData != null) && (responseData == 'new budget added successfully')) 
            {
               location.reload(); 
            }else {
                console.log(responseData);
            }
        }
  });
    });
</script>

<script>
    $(document).on("click","#save-new-income",function(){
        var baseUrl = '<?php echo base_url(); ?>';
        var date = $("#datepicker-1").val();
        var income = $("#income").val();
        var amt = $("#income-amt").val();
        var fd = new FormData();
        fd.append('income_source_name',income);
        fd.append('income_amount',amt);
        fd.append('date',date);
        $.ajax({
        url: baseUrl + "Budget/add_new_income",
        type: "POST",
        data: fd,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(jsonStr) 
        {
            var res_data = JSON.stringify(jsonStr);
            var response = JSON.parse(res_data);
            var responseData = response['responseData'];
            if ((responseData != null) && (responseData == 'new budget added successfully')) 
            {
               location.reload(); 
            }else {
                console.log(responseData);
            }
        }
    });
    });
</script>

<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());
    
    $('#datepicker-1').datepicker({
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker-1').datepicker("setDate", new Date());
</script>
