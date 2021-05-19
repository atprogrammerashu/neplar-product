
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Neplar Money | Users Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('asstes/staff/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('asstes/staff/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('asstes/staff/')?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Neplar </b>Money</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Staff login</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter your id.*" id="staff-id">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fa fa-key"></span>
            </div>
          </div>
        </div>
        <span class="font-weight-bold" style="color:red;font-style:italic" id="staff-id-err"></span>
        <div class="d-flex justify-content-center" id="sign-btn-container">
          <button type="button" class="btn btn-outline-success" id="staff-login-btn">Sign In</button>
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('asstes/staff/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('asstes/staff/')?>dist/js/adminlte.min.js"></script>
</body>
</html>
<script>
    $(document).on("click","#staff-login-btn",function(){
        var sid = $("#staff-id").val();
        if(sid!="")
        {
           $("#staff-id").parent().addClass("mb-3");    
           $("#staff-id-err").text("");
           $("#staff-id").removeClass("is-invalid");
           proceed_to_login(sid); 
        }else if(sid==""){
          $("#staff-id").parent().removeClass("mb-3");    
          $("#staff-id").addClass("is-invalid");    
          $("#staff-id-err").text("Enter Your id.*"); 
        }
    })
</script>
<script>
    function proceed_to_login(id)
    {
       $.ajax({
           url: '<?=base_url('staff/Login/login_auth')?>',
           type: 'post',
           data: {staff_id:id},
           beforeSend: function(){
            $("#staff-id").parent().addClass("mb-3");    
            $("#staff-id-err").text("");
            $("#staff-id").removeClass("is-invalid");
            $("#sign-btn-container").html('<div class="spinner-border text-success text-right"></div>');
           },
           success: function(response){
               console.log(response);
            if(response=="loginscs")
            {
              $("#staff-id").parent().addClass("mb-3");    
              $("#staff-id-err").text("");
              $("#staff-id").removeClass("is-invalid");
              $("#staff-id").addClass("is-valid");
              window.location.href = "<?=base_url('staff-dashboard')?>"; 
            }else if(response=="NOTEXISTS"){
              $("#staff-id").parent().removeClass("mb-3");    
              $("#staff-id").addClass("is-invalid");    
              $("#staff-id-err").text("Please enter valid id*");  
            }
           },
           complete:function(data){
             $("#sign-btn-container").html('<button type="button" class="btn btn-outline-success" id="staff-login-btn">Sign In</button>');
           }
        });  
    }
</script>
