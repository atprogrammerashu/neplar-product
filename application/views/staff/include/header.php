<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Neplar Money | Staff Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('asstes/staff/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('asstes/staff/')?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('asstes/staff/')?>dist/css/adminlte.min.css">
   <!-- Sweet Alert -->
  <link rel="stylesheet" href="<?php echo base_url('asstes/staff/')?>dist/css/sweetalert.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('asstes/staff/')?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('asstes/staff/')?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('asstes/staff/')?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('asstes/staff/')?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>
<style type="text/css">
.side-active{
  background-color: #20c997 !important;
  color: #fff !important;
}  
.small-box p {
    font-size: 18px;
    font-weight: 500;
}
#action-btns{
    float: right !important;
    padding-left: 5px !important;
}
.cust-btns{
        margin-left: 5px;
}
.dt-buttons{
    position:absolute;
}
.table-bordered thead td, .table-bordered thead th {
    border-bottom-width: 0px;
}
.modal-title{
 line-height:1;   
}
.custom-btn{
    background-color: #20c997;
    color:#fff
}
/* width */
::-webkit-scrollbar {
  width: 6px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #fff; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>

<?
$loggedIn = $this->session->userdata('loggedIn');  
$role = $loggedIn['role'];
if($role!="1")
{
    echo "<style>#record-delete-btn{display:none;}#manage-staff-btn{display:none}</style>";
}
?>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="javascript:void(0)" role="button" title="Full-Screen-mode">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('staff-logout')?>" title="Sign-Out">
          <i class="fa fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
