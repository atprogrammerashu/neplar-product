<?
  $uri_segment = $this->uri->segment(1);
?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" class="brand-link">
      <img src="https://neplartechno.com/assets/img/logo/logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Neplar Money</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('asstes/staff/')?>dist/img/man.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block">
              <?
                $loggedIn = $this->session->userdata('loggedIn');
                echo $loggedIn['name'];
              ?>
          </a>
        </div>
      </div>    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="<?=base_url('staff-dashboard')?>" class="nav-link <?if(!empty($uri_segment)){if($uri_segment=="staff-dashboard"){echo "side-active";}}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open" id="manage-staff-btn">
            <a href="<?=base_url('staffs-management')?>" class="nav-link <?if(!empty($uri_segment)){if($uri_segment=="staffs-management"){echo "side-active";}}?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                 Manage Staff 
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>