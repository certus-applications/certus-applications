
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Profile</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="../../../img/avatar.png" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                        <?php foreach($viewClient as $k => $value){ ?>
                          <?php if( is_array($value) && isset($value['first_name']) && isset($value['last_name']) ){ ?>
                        <h3><?php echo $value['first_name'];?> <?php echo $value['last_name'];?></h3>
                          <?php } else { echo 'Something went wrong';} ?>
                        <?php } ?>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> Dr. Patel's Patient
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                        </li>
                      </ul>

                      <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />

                      <!-- start skills -->
                      <h4>What to look out for</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Eating</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                        <li>
                          <p>Sleeping Pattern</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                          </div>
                        </li>
                        <li>
                          <p>Change in mood</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                          </div>
                        </li>
                        <li>
                          <p>Self-Esteem</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                          </div>
                        </li>
                      </ul>
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Activity Report</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                          </div>
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
                      <div id="graph_bar" style="width:100%; height:280px;"></div>
                      <!-- end of user-activity-graph -->

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Weekly Analytics</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Daily Updates</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <!-- Analytics Tab -->
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <!-- start analytics -->
                            

                            <canvas id="myChart" width="400" height="400"></canvas>
                            <!-- <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                                        datasets: [
                                            {
                                                label: 'Sleep Pattern',
                                                data: [10, 4, 3, 5, 2, 3, 8],
                                                backgroundColor: [
                                                    'rgba(255, 255, 255, 0.1)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)'
                                                ],
                                                borderWidth: 5,
                                            },
                                            {
                                                label: 'Eatting Pattern',
                                                data: [9, 8.5, 6.5, 5, 9, 8, 6],
                                                backgroundColor: [
                                                    'rgba(255, 255, 255, 0.1)'
                                                ],
                                                borderColor: [
                                                    'rgba(54, 162, 235, 1)',
                                                ],
                                                borderWidth: 5
                                            },
                                            {
                                                label: 'Changes in Mood',
                                                data: [4, 4.5, 3.5, 5, 7, 2, 7],
                                                backgroundColor: [
                                                    'rgba(255, 255, 255, 0.1)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 206, 86, 1)',
                                                ],
                                                borderWidth: 5
                                            },
                                            {
                                                label: 'Self-Esteem',
                                                data: [3, 2.5, 5, 7, 8, 3, 7.5],
                                                backgroundColor: [
                                                    'rgba(255, 255, 255, 0.1)'
                                                ],
                                                borderColor: [
                                                    'rgba(75, 192, 192, 1)',
                                                ],
                                                borderWidth: 5
                                            },
                                        ]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script> -->
                            <!-- end analytics -->
                          </div>

                          <!-- Tab 2 -->
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Emotions</th>
                                  <th>Days emotion felt</th>
                                  <th class="hidden-phone">Avg Rating from 1 - 10 of emotion</th>
                                  <th>Percentage bar</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Happiness</td>
                                  <td>Sat, Sun, Mon</td>
                                  <td class="hidden-phone">1.7 Average</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="17"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>Anxiety</td>
                                  <td>Mon, Tues, Wed, Thurs, Fri</td>
                                  <td class="hidden-phone">4.5 Average</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-danger" data-transitiongoal="45"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td>Stress</td>
                                  <td>Sun, Mon, Tues, Wed, Thurs, Fri</td>
                                  <td class="hidden-phone">5.8 Average</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-danger" data-transitiongoal="58"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td>Sadness</td>
                                  <td>Wed, Thurs, Fri, Sat</td>
                                  <td class="hidden-phone">4.9 Average</td>
                                  <td class="vertical-align-mid">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-success" data-transitiongoal="49"></div>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- end user projects -->
                            </br>

                            <canvas id="patRadar" ></canvas>
                            <script>
                                var ctx = document.getElementById('patRadar').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'radar',
                                    data: {
                                        labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                                        datasets: [
                                            {
                                                label: 'Happiness',
                                                data: [4, 2, 0, 0, 0, 0, 6],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.6)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)'
                                                ],
                                                borderWidth: 2,
                                            },
                                            {
                                                label: 'Anxiety',
                                                data: [0, 4, 4.5, 6, 9, 8, 0],
                                                backgroundColor: [
                                                    'rgba(54, 162, 235, 0.6)'
                                                ],
                                                borderColor: [
                                                    'rgba(54, 162, 235, 1)',
                                                ],
                                                borderWidth: 2
                                            },
                                            {
                                                label: 'Stress',
                                                data: [4, 6.5, 7, 9, 9, 5, 0],
                                                backgroundColor: [
                                                    'rgba(255, 206, 86, 0.6)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 206, 86, 1)',
                                                ],
                                                borderWidth: 2
                                            },
                                            {
                                                label: 'Sadness',
                                                data: [0, 0, 0, 9, 8, 9, 8.5],
                                                backgroundColor: [
                                                    'rgba(75, 192, 192, 0.6)'
                                                ],
                                                borderColor: [
                                                    'rgba(75, 192, 192, 1)',
                                                ],
                                                borderWidth: 2
                                            },
                                        ]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
