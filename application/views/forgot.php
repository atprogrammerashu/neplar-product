<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<style type="text/css">
  .form-gap {
    padding-top: 70px;
}
</style>
</head>

 <div class="form-gap"></div>
<div class="container">
<?php  if($msg=$this->session->flashdata('msg')): 

$msg_class=$this->session->flashdata('msg_class')

 ?>
<div class="row">
<div class="col-lg-12">
<div class="alert text-center <?= $msg_class ?>">
<?= $msg; ?>
</div>
</div>
</div>

<?php endif; ?>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You got your password from here, in your mail..</p>
                  <div class="panel-body">
    
                
                   <?php echo form_open('ForgotPassword');?> 
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="forgot_pass" class="btn btn-lg btn-primary btn-block" value="Send Password" type="submit">
                        <input  class="btn btn-lg btn-danger btn-block" value="Back to login page" type="button" onclick="window.location.href= '<?php echo base_url();?>Login';">
                      </div>
                      
                    
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>