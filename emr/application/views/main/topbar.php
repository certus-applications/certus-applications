        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <!-- <img src="images/img.jpg" alt=""> -->
                    <?php echo $userFirstName;?> <?php echo $userLastName?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"><?php echo $userRole; ?></a></li>
                    <?php foreach ($options as $key => $option){ ?>
                      <li><a href="<?php echo $href[$key] ?>"><i class="fa fa-<?php echo $font[$key] ?> pull-right"></i><?php echo $option?></a></li>
                    <?php } ?>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge" style="background: #B2D235 !important; border: 1px solid #B2D235 !important;">3</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span>
                          <span>Page Branch</span>
                          <span class="time">13 mins ago</span>
                        </span>
                        <span class="message">
                          Is requesting shift change for Feb 28
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>
                          <span>Janet Burn</span>
                          <span class="time">53 mins ago</span>
                        </span>
                        <span class="message">
                          Is requesting shift change for Mar 02
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span>
                          <span>Katelyn Smith</span>
                          <span class="time">2 hours ago</span>
                        </span>
                        <span>
                          <span class="message">
                            Is requesting shift change for Feb 15
                          </span>
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Requests</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->