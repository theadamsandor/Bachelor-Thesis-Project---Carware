<h1>Üdvözöllek, <?php echo $_settings->userdata('lastname')." ".$_settings->userdata('firstname') ?>!</h1>
<hr>
<div class="">

<div class="col-12 col-sm-3 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-calendar-week"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">
                <?php echo date("Y-m-d H:i");?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <?php if($_settings->userdata('type') == 1): ?>
        <div class="col-12 col-sm-3 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-car-side"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Szolgáltatások</span>
                <span class="info-box-number">
                  <?php 
                    $service = $conn->query("SELECT * FROM service_list where delete_flag = 0 and `status` = 1")->num_rows;
                    echo format_num($service);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-3 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-toolbox"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Termékek</span>
                <span class="info-box-number">
                  <?php 
                    $total = $conn->query("SELECT * FROM product_list where `delete_flag` = 0 ")->num_rows;
                    echo format_num($total);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <?php endif; ?>
          <?php if($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2): ?>
          <!-- /.col -->
          <div class="col-12 col-sm-3 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-light border elevation-1"><i class="fas fa-sync"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Függőben lévő munkalap</span>
                <span class="info-box-number">
                  <?php 						
                    $total = $conn->query("SELECT * FROM worksheet_list where `status` = 0 ")->num_rows;
                    echo format_num($total);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-3 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-spinner"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Folyamatban lévő munkalap</span>
                <span class="info-box-number">
                  <?php 
                    $total = $conn->query("SELECT * FROM worksheet_list where `status` = 1 ")->num_rows;
                    echo format_num($total);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-3 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-file-invoice"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Befejezett munkalap</span>
                <span class="info-box-number">
                  <?php 
                    $total = $conn->query("SELECT * FROM worksheet_list where `status` = 2 ")->num_rows;
                    echo format_num($total);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <?php endif; ?>
          <?php if($_settings->userdata('type') == 1): ?>
          <div class="col-12 col-sm-3 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-users-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Szerelők</span>
                <span class="info-box-number">
                  <?php 
                    $total = $conn->query("SELECT * FROM mechanic_list where `delete_flag` = 0 ")->num_rows;
                    echo format_num($total);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-3 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-maroon elevation-1"><i class="fas fa-user-friends"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Felhasználók</span>
                <span class="info-box-number">
                  <?php 
                    $total = $conn->query("SELECT * FROM users ")->num_rows;
                    echo format_num($total);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!--osszes eddigi bevetel-->
          <div class="col-12 col-sm-3 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-balance-scale"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Összes bevétel</span>
                <span class="info-box-number">
                <?php 
                    $total_worksheet = $conn->query('SELECT SUM(amount) FROM worksheet_list');
                    while($row = mysqli_fetch_array($total_worksheet)){
                      echo format_num($row['SUM(amount)']); echo " Ft";
                  }
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <!-- /.col -->
          <?php endif; ?>
        </div>
