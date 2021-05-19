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
              <li class="breadcrumb-item active">Mutual Fund Nav</li>
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
                <h3 class="card-title">Mutual Fund Nav</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="data-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#SR.No.</th>
                    <th>SYMBOL</th>
                    <th>STOCK/ETF NAME</th>
                    <th>CURRENT PRICE</th>
                    <th>TODAY DATE</th>
                    <th>PREVIOUS DAY PRICE</th>
                    <th>YESTERDAY DATE</th>
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
<?php
  $this->load->view("staff/include/footer");
?>
<script>
  $(document).ready(function () {
    $("#data-table").DataTable({
      "ajax":"<?=base_url('staff/Staff/get_all_stock_ltp')?>",
      "order":[], 
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "dom": 'Bfrtip',
      "buttons": ["copy", "csv", "excel", "pdf", "print","pageLength"]
    }).buttons().appendTo('#data-table_wrapper .col-md-6:eq(0)');
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
        window.location.href='<?=base_url('staff-dashboard')?>';
    })
</script>