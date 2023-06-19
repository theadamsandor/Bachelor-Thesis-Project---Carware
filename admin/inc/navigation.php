<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-light-primary elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <a href="<?php echo base_url ?>" class="brand-link bg-gradient-white text-lg">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Logó" class="brand-image img-circle elevation-2" style="width: 2.2rem;height: 2.2rem;max-height: unset">
        <span class="brand-text font-weight-bold"><?php echo $_settings->info('short_name') ?></span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-4">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                   <?php if($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2): ?>
                   <li class="nav-item dropdown">
                      <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="h6">
                          Kezdőlap
                        </p>
                        <?php endif; ?>
                        <?php if($_settings->userdata('type') == 3): ?>
                        <li class="nav-item dropdown">
                        <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p class="h6">
                          Kezdőlap
                        </p>
                        </a>
                        </li> 
                        <?php endif; ?>
                        <?php if($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2): ?>    
                      </a>
                    </li> 
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=products" class="nav-link nav-products">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p class="h6">
                          Termékek
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=inventory" class="nav-link nav-inventory">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p class="h6">
                          Készlet
                        </p>
                      </a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=worksheets" class="nav-link nav-worksheets">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <?php if($_settings->userdata('type') == 1 or $_settings->userdata('type') == 2): ?>
                        <p class="h6">
                          Munkalap
                        </p>
                        <?php endif; ?>
                        <?php if($_settings->userdata('type') == 3): ?>
                          <p class="h6">
                          Javítási állapot
                        </p>
                        <?php endif; ?>
                      </a>
                    </li>
                    <?php if($_settings->userdata('type') == 1): ?>
                    <li class="nav-header text-uppercase font-weight-bold text-center">Kimutatások</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=reports/daily_sales_report" class="nav-link nav-reports_daily_sales_report">
                        <i class="nav-icon fas fa-balance-scale-left"></i>
                        <p class="h6">
                          Napi értékesítés jelentés
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=reports/daily_service_report" class="nav-link nav-reports_daily_service_report">
                        <i class="nav-icon fas fa-balance-scale-right"></i>
                        <p class="h6">
                          Napi szolgáltatás jelentés
                        </p>
                      </a>
                    </li>
                    <li class="nav-header text-uppercase font-weight-bold text-center">Karbantartás</li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=services" class="nav-link nav-services">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p class="h6">
                          Szolgáltatás lista
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=mechanics" class="nav-link nav-mechanics">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p class="h6">
                          Szerelők
                        </p>
                      </a>
                    </li>
                    <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p class="h6">
                          Felhasználók
                        </p>
                      </a>
                    </li>
                    <?php endif; ?>
                  </ul>
                </nav>
                <div class="nav-link">
                 <p class="h3 mt-5 pt-2">Ügyfélszolgálat <br> </p> <p class="h5">Hétfőtől-Péntekig<br></p> <p class="h6">8:00-17:00<br></p><p class="h6">info@carware.hu <br></p> <p class="h6">+36201234567 <br></p>
                </div>
                <!-- /.sidebar-menu -->
              </div>
            </div>
          </div>

          <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
              <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
            </div>
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
    $(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      page = page.replace(/\//g,'_');
      console.log(page)

      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
      $('.nav-link.active').addClass('bg-gradient-navy')
    })
  </script>