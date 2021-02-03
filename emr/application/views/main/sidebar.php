<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title">
                <center><a href="main/index" class="site_title"><img src="../img/MGH.svg"></a></center>
            </div>
            <div class="clearfix"></div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <br>
                <h3>General</h3>
                <ul class="nav side-menu">
                  <?php foreach ($sideMenu as $key => $option){ ?>
                    <li><a href="<?php echo $link[$key] ?>"><i class="fa fa-<?php echo $icon[$key] ?>"></i> <?php echo $option?></a></li>
                  <?php } ?>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small" style="background: #172D44; padding: 5px 0 10px;">
              <div class="block">
                  <center>Powered by Certus</center>
              </div>

            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
