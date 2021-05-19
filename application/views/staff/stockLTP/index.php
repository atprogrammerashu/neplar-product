<?php
  $this->load->view("staff/include/header");
  $this->load->view("staff/include/sidebar");
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('staff-dashboard')?>">Staff Dashboard</a></li>
              <li class="breadcrumb-item active">Stock LTP</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Stock LTP</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="data-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>STOCK/ETF NAME</th>
                    <th>CURRENT PRICE</th>
                    <th>PREVIOUS DAY PRICE</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                      
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
    <div class="modal fade" id="form-modal-lg" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="insert-form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">STOCK/ETF NAME</label>
                    <input type="text" class="form-control" id="stock-etf-name">
                  </div>
                  <span id="stock-etf-err" style="color:red;font-size:15px;font-style:italic"></span>
                  <div class="form-group">
                    <label for="exampleInputPassword1">CURRENT PRICE</label>
                    <input type="text" class="form-control" id="current-price">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">PREVIOUS DAY PRICE</label>
                    <input type="text" class="form-control" id="previous-day-price">
                  </div>
                  <div class="form-group">
                    <label for="stock-lte-file">(OR)Import From Excel File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="stock-lte-file" accept=".xlsx,.csv">
                        <label class="custom-file-label" for="stock-lte-file">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn custom-btn model-action-btn" id="save-record-new">Save Record</button>    
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php
  $this->load->view("staff/include/footer");
?>
<script>
  $(document).ready(function () {
    $("#data-table").DataTable({
      "ajax":"<?=base_url('staff/Staff/get_all_stock_ltp')?>",
      "order":[],
      "ordering":false,
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "dom": 'Bfrtip',
      "buttons": ["copy", "csv", "excel", "pdf", "print","pageLength"]
    })
  });
</script>
<script>
    $(document).ready(function(){
        var html='';
            html+='<div id="action-btns">';
            html+='<button type="button" class="btn btn-outline-success btn-sm cust-btns" id="add-new-record">New Record <i class="fa fa-plus-circle" aria-hidden="true"></i></button>';
            html+='</div>';
        $("#data-table_filter").append(html);
    })
</script>
<script>
    $(document).on("click","#add-new-record",function(){
       $('#insert-form')[0].reset();   
       $(".modal-title").text("New Record");    
       $(".model-action-btn").attr("id","save-record-new");
       $(".model-action-btn").text("Save Record");    
       $("#form-modal-lg").modal("show"); 
    })
</script>
<script>
    $(document).on("click","#save-record-new",function(){
        
        var baseUrl = "<?=base_url()?>";
        var form_data = new FormData();
        
        var stockname = $("#stock-etf-name").val();
        var currentprice = $("#current-price").val();
        var pre_price = $("#previous-day-price").val();
        
        form_data.append('stock_name',stockname);
        form_data.append('current_price',currentprice);
        form_data.append('previous_day_price',pre_price);
        if(stockname!="")
        {
            $("#stock-etf-name").removeClass("is-invalid");
            $.ajax({
            url: baseUrl + "staff/Staff/insert_stock_ltp",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(jsonStr) {
            var res_data = JSON.stringify(jsonStr);
            var response = JSON.parse(res_data);
            var responseData = response['responseData'];
              if ((responseData != null) && (responseData == 'record-inserted-scs')) 
               {
                 $('#insert-form')[0].reset();
                 $('#form-modal-lg').modal('hide');
                 swal({
                  title: "New Record",
                  text: "New record inserted successfully.!",
                  type: "success",
                  confirmButtonClass: 'btn-primary btn-sm',
                  confirmButtonText: 'OK'
                });
                $("#data-table").DataTable().ajax.reload();
              }
            }
            });
        }else if(stockname=="")
        {
           $("#stock-etf-name").addClass("is-invalid");
           $("#stock-etf-name").parent().css("margin-bottom","0");
           $("#stock-etf-err").text("This feild is required.*");
        }
    });
</script>

<script>
    $(document).on("click","#record-edit-btn",function(){
       var baseUrl = "<?=base_url()?>";
       var id = $(this).attr("key");
       var form_data = new FormData();
       form_data.append('id',id);
       $.ajax({
        url: baseUrl + "staff/Staff/edit_stock_ltp",
        type: "POST",
        data:form_data,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(jsonStr) {
        var res_data = JSON.stringify(jsonStr);
        var response = JSON.parse(res_data);
        var responseData = response['responseData'];
          if ((responseData != null)) 
           {
             $("#stock-etf-name").val(responseData['stock_name']);
             $("#current-price").val(responseData['current_price']);
             $("#previous-day-price").val(responseData['previous_day_price']);  
             $(".modal-title").text("Edit Record");  
             $(".model-action-btn").attr("id","update-record-btn");
             $(".model-action-btn").attr("key",id);
             $(".model-action-btn").text("Update record");
             $("#form-modal-lg").modal("show");
           }
        }
        });
    })
</script>

<script>
    $(document).on("click","#update-record-btn",function(){
       var id = $(this).attr("key");
       var baseUrl = "<?=base_url()?>";
        var form_data = new FormData();
        
        var stockname = $("#stock-etf-name").val();
        var currentprice = $("#current-price").val();
        var pre_price = $("#previous-day-price").val();
        
        form_data.append('id',id);
        form_data.append('stock_name',stockname);
        form_data.append('current_price',currentprice);
        form_data.append('previous_day_price',pre_price);
        if(stockname!="")
        {
            $("#stock-etf-name").removeClass("is-invalid");
            $.ajax({
            url: baseUrl + "staff/Staff/update_stock_ltp",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(jsonStr) {
            var res_data = JSON.stringify(jsonStr);
            var response = JSON.parse(res_data);
            var responseData = response['responseData'];
              if ((responseData != null) && (responseData == 'record-updated-scs')) 
               {
                 $('#insert-form')[0].reset();
                 $('#form-modal-lg').modal('hide');
                 swal({
                  title: "Record Updated",
                  text: "Record updated successfully.!",
                  type: "success",
                  confirmButtonClass: 'btn-primary btn-sm',
                  confirmButtonText: 'OK'
                });
                $("#data-table").DataTable().ajax.reload();
              }
            }
            });
        }else if(stockname=="")
        {
           $("#stock-etf-name").addClass("is-invalid");
           $("#stock-etf-name").parent().css("margin-bottom","0");
           $("#stock-etf-err").text("This feild is required.*");
        }
    });
</script>

<script>
    $(document).on('change','#stock-lte-file',function(){
       var baseUrl = "<?=base_url()?>";
       var form_data = new FormData(); 
       var files = $(this)[0].files[0];
       form_data.append('excelfile',files);
       
       $.ajax({
        url: baseUrl + "staff/Staff/upload_excel_to_stock_ltp",
        type: "POST",
        data: form_data,
        contentType: false,
        processData: false,
        dataType: "JSON",
        beforeSend: function(){
          swal({
              title: "",
              text: "<div>Please wait..<br><div class='mt-4 spinner-border text-success'style='width: 5rem;height: 5rem;'></div></div>",
              html: true,
              showCancelButton: false,
              showConfirmButton: false
            })  
        },
        success: function(jsonStr) {
        var res_data = JSON.stringify(jsonStr);
        var response = JSON.parse(res_data);
        var responseData = response['responseData'];
          if ((responseData != null) && (responseData == 'records-inserted-scs')) 
          {
             $('#insert-form')[0].reset();
             $('#form-modal-lg').modal('hide');
             swal({
              title: "Records Inserted",
              text: "All Records inserted successfully.!",
              type: "success",
              confirmButtonClass: 'btn-primary btn-sm',
              confirmButtonText: 'OK'
            });
            $("#data-table").DataTable().ajax.reload();
          }
        },
        complete:function(data){
                      
        }
        }); 
    })
</script>

<script>
    $(document).on("click","#record-delete-btn",function(){
       var baseUrl = "<?=base_url()?>";
       var recordid = $(this).attr("key");
        swal({
          title: "Are you sure.?",
          text: "You want to delete this record.?",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger btn-sm',
          cancelButtonClass: 'btn-dark btn-sm',
          confirmButtonText: 'Yes, delete it!',
          closeOnConfirm: false,
          //closeOnCancel: false
        },
        function(){
            var form_data = new FormData();
            var table = "stock_details";
            form_data.append('id',recordid);
            form_data.append('table',table);
            
            $.ajax({
            url: baseUrl + "staff/Staff/Delete_record_to",
            type: "POST",
            data: form_data,
            contentType: false,
            processData: false,
            dataType: "JSON",
            beforeSend: function(){},
            success: function(jsonStr) {
            var res_data = JSON.stringify(jsonStr);
            var response = JSON.parse(res_data);
            var responseData = response['responseData'];
              if ((responseData != null) && (responseData == 'records-deleted-scs')) 
              {
                 swal({
                  title: "Deleted",
                  text: "Record has been deleted successfully.!",
                  type: "success",
                  confirmButtonClass: 'btn-primary btn-sm',
                  confirmButtonText: 'OK'
                });
                $("#data-table").DataTable().ajax.reload();
              }
            },
            complete:function(data){}
            });   
        });
    });
</script>


