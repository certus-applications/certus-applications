        <!-- Calendar content -->
        <div class="right_col" role="main">
          <script>
            $(document).ready(function() {
            <?php if($this->session->flashdata('success')){ ?>
              new PNotify({
                title: 'Success',
                text: 'Availability added successfully!',
                type: 'success',
                styling: 'bootstrap3',
                delay: 2500
              });
            <?php } ?>
            });
          </script>
          <div class="">

            <?php if ($this->ion_auth->is_admin()): ?>
              <div class="title_right">
                <div class="col-md-3 col-sm-3  form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by name..." id="nameToSearch">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button" id="nameFilter">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            <?php endif ?>

            <div class="clearfix"></div>
            <div class="row">
              <?php if ($this->ion_auth->is_admin()): ?>
              <div class="col-md-9 col-sm-3">
              <?php else: ?>
                <div class="col-md-12 col-sm-3">
              <?php endif ?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Schedule</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown" style="float: right;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <a onclick="updateCookie('month'); return false;">Make month view default</a>
                          </li>
                          <li>
                            <a onclick="updateCookie('agendaWeek'); return false;">Make week view default</a>
                          </li>
                          <li>
                            <a onclick="updateCookie('agendaDay'); return false;">Make day view default</a>
                          </li>
                          <li>
                            <a onclick="updateCookie('listMonth'); return false;">Make list view default</a>
                          </li>
                        </ul>
                      </li>

                      <li class="dropdown" style="float: right;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-filter"></i></a>
                        <ul class="dropdown-menu" role="menu" id="buildingFilter">
                          <li id = "all">
                            <a>Show All</a>
                          </li>
                          <li id = "MOR">
                            <a>Filter by MOR</a>
                          </li>
                          <li id = "COX">
                            <a>Filter by COX</a>
                          </li>
                          <li id = "Receiving">
                            <a>Filter by Receiving</a>
                          </li>
                          <li id = "840C">
                            <a>Filter by 840C</a>
                          </li>
                          <li id = "INF">
                            <a>Filter by INF</a>
                          </li>
                          <li id = "Vaccine Clinic">
                            <a>Filter by Vaccine Clinic</a>
                          </li>
                          <li id = "BRK">
                            <a>Filter by BRK</a>
                          </li>
                          <li id = "CAC">
                            <a>Filter by CAC</a>
                          </li>
                          <li id = "J-Wing">
                            <a>Filter by J-Wing</a>
                          </li>
                          <li id = "D1–Out">
                            <a>Filter by D1–Out</a>
                          </li>
                          <li id = "PAE">
                            <a>Filter by PAE</a>
                          </li>
                          <li id = "OHS DC">
                            <a>Filter by OHS DC</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- Calendar Data -->
                    <div id='calendar'> </div>
                  </div>
                </div>
              </div>
              <?php if ($this->ion_auth->is_admin()): ?>
                <div class="col-md-9 col-md-3">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Availability</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <!-- <li class="dropdown" style="float: right;">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                          <ul class="dropdown-menu" role="menu">
                            <li>
                              <a onclick="updateCookie('month'); return false;">Make month view default</a>
                            </li>
                            <li>
                              <a onclick="updateCookie('agendaWeek'); return false;">Make week view default</a>
                            </li>
                            <li>
                              <a onclick="updateCookie('agendaDay'); return false;">Make day view default</a>
                            </li>
                            <li>
                              <a onclick="updateCookie('listMonth'); return false;">Make list view default</a>
                            </li>
                          </ul>
                        </li> -->

                        <li class="dropdown" style="float: right;">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-filter"></i></a>
                          <ul class="dropdown-menu" role="menu" id="dayofweek">
                            <li id="Monday">
                              <a>View Monday</a>
                            </li>
                            <li id="Tuesday">
                              <a>View Tuesday</a>
                            </li>
                            <li id="Wednesday">
                              <a>View Wednesday</a>
                            </li>
                            <li id="Thursday">
                              <a>View Thursday</a>
                            </li>
                            <li id="Friday">
                              <a>View Friday</a>
                            </li>
                            <li id="Saturday">
                              <a>View Saturday</a>
                            </li>
                            <li id="Sunday">
                              <a>View Sunday</a>
                            </li>
                          </ul>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                      <div id="filterby"></div>
                    </div>
                    <div class="x_content" id = "external-events">
                      <!-- start accordion -->
                      <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel">
                          <a class="panel-heading" role="tab" id="morningShift" data-toggle="collapse" data-parent="#accordion" href="#morning" aria-expanded="true" aria-controls="morning">
                            <h4 class="panel-title" style="color: #73879C">Morning</h4>
                          </a>
                          <div id="morning" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="morningShift">
                            <ul class="list-unstyled msg_list" id="availability_morning">
                              <?php foreach($availabilities as $availability){?>
                                <?php if($availability['shift_type'] == "morning"){?>
                                  <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                  <a>                              
                                      <div class='fc-event-main' style="color: #73879C" > 
                                        <?php echo $availability['first_name'];?> <?php echo $availability['last_name'];?>
                                      </div>
                                      <div style="display: none;">
                                        <?php
                                          $dayofweek = date('l', strtotime($availability['start']));
                                          echo $dayofweek;
                                        ?>
                                      </div>
                                  </a>
                                <?php } ?>
                              <?php } ?>
                            </ul>
                          </div>
                        </div>
                        <div class="panel">
                          <a class="panel-heading collapsed" role="tab" id="eveningShift" data-toggle="collapse" data-parent="#accordion" href="#evening" aria-expanded="false" aria-controls="evening">
                            <h4 class="panel-title" style="color: #73879C">Evening</h4>
                          </a>
                          <div id="evening" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="eveningShift">
                            <ul class="list-unstyled msg_list" id="availability_evening">
                              <?php foreach($availabilities as $availability){?>
                                <?php if($availability['shift_type'] == "evening"){?>
                                  <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                  <a>                              
                                      <div class='fc-event-main' style="color: #73879C" > 
                                        <?php echo $availability['first_name'];?> <?php echo $availability['last_name'];?>
                                      </div>
                                      <div style="display: none;">
                                        <?php
                                          $dayofweek = date('l', strtotime($availability['start']));
                                          echo $dayofweek;
                                        ?>
                                      </div>
                                  </a>
                                <?php } ?>
                              <?php } ?>
                            </ul>
                          </div>
                        </div>
                        <div class="panel">
                          <a class="panel-heading collapsed" role="tab" id="nightShift" data-toggle="collapse" data-parent="#accordion" href="#night" aria-expanded="false" aria-controls="night">
                            <h4 class="panel-title" style="color: #73879C">Night</h4>
                          </a>
                          <div id="night" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="nightShift">
                            <ul class="list-unstyled msg_list" id="availability_night">
                              <?php foreach($availabilities as $availability){?>
                                <?php if($availability['shift_type'] == "night"){?>
                                  <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                  <a>                              
                                      <div class='fc-event-main' style="color: #73879C" > 
                                        <?php echo $availability['first_name'];?> <?php echo $availability['last_name'];?>
                                      </div>
                                      <div style="display: none;">
                                        <?php
                                          $dayofweek = date('l', strtotime($availability['start']));
                                          echo $dayofweek;
                                        ?>
                                      </div>
                                  </a>
                                <?php } ?>
                              <?php } ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <!-- end of accordion -->
                    </div>
                  </div>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- Admin: edit calendar entry -->
    <?php if($this->ion_auth->in_group("hostpial admin") || $this->ion_auth->is_admin()): ?>
      <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Edit Entry</h4>
            </div>
            <div class="modal-body">
              <div id="testmodal2" style="padding: 5px 20px;">
                <form action ="<?php echo base_url(); ?>screeners/editSchedule" method="post" id="antoform2" class="form-horizontal calender" role="form">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title2" name="title2" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Location</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="location" name="location"></select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Start (EST)</label>
                    <div class="col-sm-9">
                      <input type="datetime-local" class="form-control" id="start" name="start">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">End (EST)</label>
                    <div class="col-sm-9">
                      <input type="datetime-local" class="form-control" id="end" name="end">
                      <input type="hidden" class="form-control" id="id" name="id">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal" id="closeButton">Close</button>
                    <button type="submit" class="btn btn-primary antosubmit2" id="saveButton">Save changes</button>
                    <center id = "loader">
                      <div class="loaderAnimation"></div>
                    </center>
                  </div>
                </form>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
            </div> -->
          </div>
        </div>
      </div>
    <?php endif ?>
    
    <?php if($this->ion_auth->in_group("screener")): ?>
    <!-- Screener: edit calendar entry -->
      <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2">Request Shift Change</h4>
            </div>
            <div class="modal-body">
              <div id="testmodal2" style="padding: 5px 20px;">
                <form action ="<?php echo base_url(); ?>screeners/editSchedule" method="post" id="antoform2" class="form-horizontal calender" role="form">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="title2" name="title2" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Location</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="location" name="location" readonly></select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Start (EST)</label>
                    <div class="col-sm-9">
                      <input type="datetime-local" class="form-control" id="start" name="start" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">End (EST)</label>
                    <div class="col-sm-9">
                      <input type="datetime-local" class="form-control" id="end" name="end" readonly>
                      <input type="hidden" class="form-control" id="id" name="id">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default antoclose2" style="padding: 5px 18px 5px 18px; margin: 5px 0 5px 5px;" data-dismiss="modal" id="closeButton">Close</button>
                    <button type="button" class="btn btn-primary" style="padding: 5px 18px 5px 18px; margin: 5px 0 5px 5px;"><a href="request" style="color: white">New Request</a></button>
                    <center id = "loader">
                      <div class="loaderAnimation"></div>
                    </center>
                  </div>
                </form>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
            </div> -->
          </div>
        </div>
      </div>
    <?php endif ?>

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->
    </div>

    <div id="setCookie" data-toggle="modal" data-target="#setCookieSuccess"></div>

  </body>

  <script type="text/javascript">
    function updateCookie(preference) {
      var preferenceText = ""
      $('#calendar').fullCalendar('changeView', preference);

      if (preference == "agendaWeek") {
        preferenceText = "week"
      } else if (preference == "agendaDay") {
        preferenceText = "day"
      } else if (preference == "listMonth") {
        preferenceText = "list"
      } else {
        preferenceText = "month"
      }

      new PNotify({
        title: 'Preferences updated!',
        text: 'Default view set to ' + preferenceText + '.',
        type: 'success',
        styling: 'bootstrap3',
        delay: 2000
      });

      document.cookie = "preference="+preference;
    }
  </script>

  <style type="text/css">
    .loaderAnimation {
      border: 4px solid #f3f3f3;
      border-radius: 50%;
      border-top: 4px solid #3498db;
      width: 39px;
      height: 39px;
      -webkit-animation: spin 2s linear infinite; /* Safari */
      animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>