 <html lang="en">
<head>
    <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link href="<?=base_url('asstes/css/style.css');?>" rel="stylesheet">

    <style>
        body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #B0BEC5;
    background-repeat: no-repeat
}

.card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px
}

.card2 {
    margin: 0px 40px
}

.logo {
    width: 150px;
    height: 80px;
    margin-top: 20px;
    margin-left: 35px
}

.image {
    width: 360px;
    height: 280px
}

.border-line {
    border-right: 1px solid #EEEEEE
}

.line {
    height: 1px;
    width: 45%;
    background-color: #E0E0E0;
    margin-top: 10px
}

.or {
    width: 10%;
    font-weight: bold
}

.text-sm {
    font-size: 14px !important
}

::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
}

:-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

input,
textarea {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

a {
    color: inherit;
    cursor: pointer
}

.btn-blue {
    background-color: rgb(38,189,154);
    width: 150px;
    color: #fff;
    border-radius: 2px;
    font-weight: bold;
}

.btn-blue:hover {
    background-color: #000;
    cursor: pointer
}

.bg-blue {
    color: #fff;

   background-color:rgb(38,189,154);
}

@media screen and (max-width: 991px) {
    .logo {
        margin-left: 0px
    }

    .image {
        width: 300px;
        height: 220px
    }

    .border-line {
        border-right: none
    }

    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
    }
}


    </style>
</head>
<body>

<?php  if($user=$this->session->flashdata('user')): 

$user_class=$this->session->flashdata('user_class')

 ?>
<div class="row">
<div class="col-lg-12">
<div class="alert text-center <?= $user_class ?>">
<?= $user; ?>
</div>
</div>
</div>

<?php endif; ?>



<!--    background-color: #1A237E; -->

<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto" >
    <div class="card card0 border-0" >
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row"> <img src="<?=base_url('asstes/img/logo1.jpg');?>" class="logo"> </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h6 class="mb-0 mr-4 mt-2">Sign in with &nbsp;&nbsp;&nbsp;&nbsp;</h6>
                       
                           
                       
                      <div class="row">
                        <a class="btn btn-outline-dark" href="#" >
                            <div class="col-md-12">
                                <img width="20px" alt="Google sign-in" 
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                  &nbsp;&nbsp;  Login with Google
                            </div>
                            
                        </a>
                    </div>
                    </div>
                    <div class="row px-3 mb-4">
                        <div class="line"></div> <small class="or text-center">Or</small>
                        <div class="line"></div>
                    </div>

                    <?php  if($error=$this->session->flashdata('Login_failed')):  ?>
                    <div class="row">
                    <div class="col-md-12">
                    <div class="alert alert-danger text-center">
                    <?= $error; ?>
                    </div>
                    </div>
                    </div>

                    <?php endif; ?>

                    

              <?php echo form_open('Login/index');?>
                    <div class="row px-3">
                       <label class="mb-1"> <h6 class="mb-0 text-sm">Email Address</h6> </label>

                   
                      <?php echo form_input(['type'=>'text','class'=>'form-control','placeholder'=>'Enter a valid email address','name'=>'email','value'=>set_value('email')]);?>                                        
                                    <?php echo form_error('email');  ?>
                                  

                    </div>

                    <div class="row px-3">
                     <label class="mb-1"> <h6 class="mb-0 text-sm">Password</h6> </label> 
                      

                       <?php echo form_password(['type'=>'password','class'=>'form-control','placeholder'=>'Enter Password','name'=>'pass','value'=>set_value('pass')]);?>

                                            <?php echo form_error('pass');  ?>

                    </div>

                    <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> 
                            <input id="chk1" type="checkbox" name="chk" class="custom-control-input">
                             <label for="chk1" class="custom-control-label text-sm">Remember me</label> 
                        </div>
                         <a href="<?=base_url('ForgotPassword');?>" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                    </div>

                    <div class="row mb-3 px-3">
                  
                   
                     <?php echo form_submit(['type'=>'submit','class'=>'btn btn-blue text-center','value'=>'Login']);?>

                   </div>

                    <div class="row mb-4 px-3">
                     <small class="font-weight-bold">Don't have an account?
                      <a  class="text-danger ">Register</a></small> 
                   </div>


                </div>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">    <p class="text-white">© Copyright <b>Neplar® Techno Pvt. Ltd. </b> All Rights Reserved.</p></small>
                <div class="social-contact ml-4 ml-sm-auto">
                  <a href="https://www.facebook.com/neplartechno/" class="facebook"><span class="fa fa-facebook mr-4 text-sm"></span></a> 
                
                  <a href="https://www.instagram.com/neplartechno/" class="mr-4 text-sm"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/neplartechno" class="linkedin"><span class="fa fa-linkedin mr-4 text-sm"></span></a>
                  <a href="https://twitter.com/neplartechno" class="twitter"><span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span></a>
              </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>