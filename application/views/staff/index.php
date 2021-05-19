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
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger" id="mfn">
              <div class="inner">
                 <h3 class="m-0">
                      <?
                     if(!empty($this->data['to_mfnav']))
                     {
                        echo $this->data['to_mfnav']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 
                <p class="m-0 p-0">MUTUAL FUND NAV</p>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_mfnav']))
                    {
                      $last_update_mfnav = $this->data['last_update_mfnav'];  
                      $last_update_mfnav = date("d-M-Y", strtotime($last_update_mfnav->cdate));
                    }else{
                        $last_update_mfnav = "";
                    }
                  ?>    
                  last updated : <?=$last_update_mfnav?>
                </small>
              <a href="<?=base_url('staff/mutual-fund-nav')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger" id="ltp">
              <div class="inner">
                 <h3 class="m-0">
                    <?
                     if(!empty($this->data['to_stock_details']))
                     {
                        echo $this->data['to_stock_details']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 
                <p class="m-0 p-0">STOCK LTP</p>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_stock_details']))
                    {
                      $last_update_stock_details = $this->data['last_update_stock_details'];  
                      $last_update_stock_details = date("d-M-Y", strtotime($last_update_stock_details->cdate));
                    }else{
                        $last_update_stock_details = "";
                    }
                  ?>    
                  last updated : <?=$last_update_stock_details?>
                </small>
              <a href="<?=base_url('staff/stock-ltp')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger" id="npsn">
              <div class="inner">
                 <h3 class="m-0">
                     <?
                     if(!empty($this->data['to_nps_scheme']))
                     {
                        echo $this->data['to_nps_scheme']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 
                <p class="m-0 p-0">NEW PENSION SYSTEM NAV</p>
              </div>
               <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_nps_scheme']))
                    {
                      $last_update_nps_scheme = $this->data['last_update_nps_scheme'];  
                      $last_update_nps_scheme = date("d-M-Y", strtotime($last_update_nps_scheme->cdate));
                    }else{
                        $last_update_nps_scheme = "";
                    }
                  ?>    
                  last updated : <?=$last_update_nps_scheme?>
                </small>
              <a href="<?=base_url('staff/new-pension-system-nav')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger" id="bond-ltp">
              <div class="inner">
                 <h3 class="m-0">
                     <?
                     if(!empty($this->data['to_bond_ltp']))
                     {
                        echo $this->data['to_bond_ltp']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 

                <p class="m-0 p-0">BOND LTP</p>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_bond_ltp']))
                    {
                      $last_update_bond_ltp = $this->data['last_update_bond_ltp'];  
                      $last_update_bond_ltp = date("d-M-Y", strtotime($last_update_bond_ltp->cdate));
                    }else{
                        $last_update_bond_ltp ="";
                    }
                  ?>    
                  last updated : <?=$last_update_bond_ltp?>
                </small>
              <a href="<?=base_url('staff/bond-ltp')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-red" id="ncd-ltp">
              <div class="inner">
                 <h3 class="m-0">
                     <?
                     if(!empty($this->data['to_ncd_ltp']))
                     {
                        echo $this->data['to_ncd_ltp']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 

                <p class="m-0 p-0">NON CONVERTIBLE DEBENTURE LTP</p>
              </div>
               <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_ncd_ltp']))
                    {
                      $last_update_ncd_ltp = $this->data['last_update_ncd_ltp'];  
                      $last_update_ncd_ltp = date("d-M-Y", strtotime($last_update_ncd_ltp->cdate));
                    }else{
                        $last_update_ncd_ltp = "";
                    }
                  ?>    
                  last updated : <?=$last_update_ncd_ltp?>
                </small>
              <a href="<?=base_url('staff/non-convertible-debenture-ltp')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-red" id="sgb-ltp">
              <div class="inner">
                 <h3 class="m-0">
                     
                     <?
                     if(!empty($this->data['to_sgb_ltp']))
                     {
                        echo $this->data['to_sgb_ltp']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 
                <p class="m-0 p-0">SOVERGINE GOLD BOND LTP</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_sgb_ltp']))
                    {
                      $last_update_sgb_ltp = $this->data['last_update_sgb_ltp']; 
                      $last_update_sgb_ltp = date("d-M-Y", strtotime($last_update_sgb_ltp->cdate));
                    }else{
                        $last_update_sgb_ltp = "";
                    }
                  ?>    
                  last updated : <?=$last_update_sgb_ltp?>
                </small>
              <a href="<?=base_url('staff/sovergine-gold-bond-ltp')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-red" id="sgb-ltp">
              <div class="inner">
                 <h3 class="m-0">
                     
                     <?
                     if(!empty($this->data['to_nsc_cc']))
                     {
                        echo $this->data['to_nsc_cc']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 
                <p class="m-0 p-0">CRYPTOCURRENCY</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_cc']))
                    {
                      $last_update_cc = $this->data['last_update_cc']; 
                      $last_update_cc = date("d-M-Y", strtotime($last_update_cc->cdate));
                    }else{
                        $last_update_cc = "";
                    }
                  ?>    
                  last updated : <?=$last_update_cc?>
                </small>
              <a href="<?=base_url('staff/crypto-currency')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-red" id="sgb-ltp">
              <div class="inner">
                 <h3 class="m-0">
                     
                     <?
                     if(!empty($this->data['to_nsc_c']))
                     {
                        echo $this->data['to_nsc_c']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 
                <p class="m-0 p-0">CURRENCY</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_c']))
                    {
                      $last_update_c = $this->data['last_update_c']; 
                      $last_update_c = date("d-M-Y", strtotime($last_update_c->cdate));
                    }else{
                        $last_update_c = "";
                    }
                  ?>    
                  last updated : <?=$last_update_c?>
                </small>
              <a href="<?=base_url('staff/currency')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-red" id="sgb-ltp">
              <div class="inner">
                 <h3 class="m-0">
                     
                     <?
                     if(!empty($this->data['to_nsc_com']))
                     {
                        echo $this->data['to_nsc_com']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 
                <p class="m-0 p-0">COMMODITY</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_com']))
                    {
                      $last_update_com = $this->data['last_update_com']; 
                      $last_update_com = date("d-M-Y", strtotime($last_update_com->cdate));
                    }else{
                        $last_update_com = "";
                    }
                  ?>    
                  last updated : <?=$last_update_com?>
                </small>
              <a href="<?=base_url('staff/commodity')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-red" id="sgb-ltp">
              <div class="inner">
                 <h3 class="m-0">
                     
                     <?
                     if(!empty($this->data['to_nsc_it']))
                     {
                        echo $this->data['to_nsc_it']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 
                <p class="m-0 p-0">INDEX TABLE</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_it']))
                    {
                      $last_update_it = $this->data['last_update_it']; 
                      $last_update_it = date("d-M-Y", strtotime($last_update_it->cdate));
                    }else{
                        $last_update_it = "";
                    }
                  ?>    
                  last updated : <?=$last_update_it?>
                </small>
              <a href="<?=base_url('staff/index-table')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success" id="EP-FI">
              <div class="inner">
                 <h3 class="m-0">
                     <?
                     if(!empty($this->data['to_epfint']))
                     {
                        echo $this->data['to_epfint']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 

                <p class="m-0 p-0"> EMPLOYEE PROVIDENT FUND INT</p>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_epfint']))
                    {
                      $last_update_epfint = $this->data['last_update_epfint']; 
                      $last_update_epfint = date("d-M-Y", strtotime($last_update_epfint->cdate));
                    }else{
                        $last_update_epfint = "";
                    }
                  ?>    
                  last updated : <?=$last_update_epfint?> 
                </small>
              <a href="<?=base_url('staff/employee-provident-fund-int')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success" id="PP-FI">
              <div class="inner">
                 <h3 class="m-0">
                     <?
                     if(!empty($this->data['to_ppfint']))
                     {
                        echo $this->data['to_ppfint']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 

                <p class="m-0 p-0">PUBLIC PROVIDENT FUND INT</p>
              </div>
                <small class="ml-3 font-weight-bold">
                   <?
                    if(!empty($this->data['last_update_ppfint']))
                    {
                      $last_update_ppfint = $this->data['last_update_ppfint']; 
                      $last_update_ppfint = date("d-M-Y", strtotime($last_update_ppfint->cdate));
                    }else{
                        $last_update_ppfint = "";
                    }
                  ?>    
                  last updated : <?=$last_update_ppfint?>
                </small>
              <a href="<?=base_url('staff/public-provident-fund-int')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success" id="SS-YI">
              <div class="inner">
                 <h3 class="m-0">
                     <?
                     if(!empty($this->data['to_ssyint']))
                     {
                        echo $this->data['to_ssyint']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 

                <p class="m-0 p-0">SUKANYA SAMRIDDHI YOJANA INT</p>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_ssyint']))
                    {
                      $last_update_ssyint = $this->data['last_update_ssyint']; 
                      $last_update_ssyint = date("d-M-Y", strtotime($last_update_ssyint->cdate));
                    }else{
                        $last_update_ssyint = "";
                    }
                  ?>    
                  last updated : <?=$last_update_ssyint?> 
                </small>
              <a href="<?=base_url('staff/sukanya-samriddhi-yojna-int')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success" id="SC-SI">
              <div class="inner">
                 <h3 class="m-0">
                    <?
                     if(!empty($this->data['to_scsc_int']))
                     {
                        echo $this->data['to_scsc_int']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 

                <p class="m-0 p-0">SENIOR CITIZEN SAVING SCHEME IN</p>
              </div>
               <small class="ml-3 font-weight-bold">
                 <?
                    if(!empty($this->data['last_update_scsc_int']))
                    {
                      $last_update_scsc_int = $this->data['last_update_scsc_int']; 
                      $last_update_scsc_int = date("d-M-Y", strtotime($last_update_scsc_int->cdate));
                    }else{
                        $last_update_scsc_int = "";
                    }
                  ?>    
                  last updated : <?=$last_update_scsc_int?>
                </small>
              <a href="<?=base_url('staff/senior-citizen-scheme-in')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success" id="NS-CI">
              <div class="inner">
                 <h3 class="m-0">
                     <?
                     if(!empty($this->data['to_nsc_int']))
                     {
                        echo $this->data['to_nsc_int']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 

                <p class="m-0 p-0">NATIONAL SAVING CERTIFICATE INT</p>
              </div>
                <small class="ml-3 font-weight-bold">
                   <?
                    if(!empty($this->data['last_update_nsc_int']))
                    {
                      $last_update_nsc_int = $this->data['last_update_nsc_int']; 
                      $last_update_nsc_int = date("d-M-Y", strtotime($last_update_nsc_int->cdate));
                    }else{
                        $last_update_nsc_int = "";
                    }
                  ?>    
                  last updated : <?=$last_update_nsc_int?>
                </small>
              <a href="<?=base_url('staff/national-saving-certificate-int')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success" id="KV-PI">
              <div class="inner">
                 <h3 class="m-0">
                     <?
                     if(!empty($this->data['to_nsc_kvpint']))
                     {
                        echo $this->data['to_nsc_kvpint']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 
                <p class="m-0 p-0">KISHAN VIKASH PATRA INT</p>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_kvpint']))
                    {
                      $last_update_kvpint = $this->data['last_update_kvpint']; 
                      $last_update_kvpint = date("d-M-Y", strtotime($last_update_kvpint->cdate));
                    }else{
                        $last_update_kvpint = "";
                    }
                  ?>    
                  last updated : <?=$last_update_kvpint?> 
                </small>
              <a href="<?=base_url('staff/kishan-vikash-patra-int')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning" id="KV-PI">
              <div class="inner">
                 <h3 class="m-0">
                     <?
                     if(!empty($this->data['to_mutual_fund_name']))
                     {
                        echo $this->data['to_mutual_fund_name']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 
                <p class="m-0 p-0">MUTUAL FUND COMPANIES</p>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_mutual_fund_name']))
                    {
                      $last_update_mutual_fund_name = $this->data['last_update_mutual_fund_name'];  
                    }
                  ?>    
                  last updated : <?=date("d-M-Y", strtotime($last_update_mutual_fund_name->cdate))?>
                </small>
              <a href="<?=base_url('staff/mutual-fund-companies')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning" id="KV-PI">
              <div class="inner">
                 <h3 class="m-0">
                     <?
                     if(!empty($this->data['to_broker_details']))
                     {
                        echo $this->data['to_broker_details']; 
                     }else{
                         echo "0";
                     }
                     ?>
                 </h3> 
                <p class="m-0 p-0">BROKERS</p>
              </div>
                <small class="ml-3 font-weight-bold">
                  <?
                    if(!empty($this->data['last_update_broker_details']))
                    {
                      $last_update_broker_details = $this->data['last_update_broker_details'];  
                    }
                  ?>    
                  last updated : <?=date("d-M-Y", strtotime($last_update_broker_details->cdate))?>
                </small>
              <a href="<?=base_url('staff/brokers')?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
  $this->load->view("staff/include/footer");
?>
  