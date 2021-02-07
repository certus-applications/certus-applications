        <!-- Calendar content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-9 col-sm-3">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendar Events <small>Sessions</small></h2>
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
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content" id = "external-events">
                      <!-- start accordion -->
                      <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel">
                          <a class="panel-heading" role="tab" id="morningShift" data-toggle="collapse" data-parent="#accordion" href="#morning" aria-expanded="true" aria-controls="morning">
                            <h4 class="panel-title" style="color: #73879C">Morning</h4>
                          </a>
                          <div id="morning" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="morningShift">
                            <ul class="list-unstyled msg_list">
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C" >Screener 1</div>
                                </a>
                              </li>
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C">Screener 2</div>
                                </a>
                              </li>
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C">Screener 3</div>
                                </a>
                              </li>
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C">Screener 4</div>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="panel">
                          <a class="panel-heading collapsed" role="tab" id="eveningShift" data-toggle="collapse" data-parent="#accordion" href="#evening" aria-expanded="false" aria-controls="evening">
                            <h4 class="panel-title" style="color: #73879C">Evening</h4>
                          </a>
                          <div id="evening" class="panel-collapse collapse" role="tabpanel" aria-labelledby="eveningShift">
                            <ul class="list-unstyled msg_list">
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C" >Screener 5</div>
                                </a>
                              </li>
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C">Screener 6</div>
                                </a>
                              </li>
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C">Screener 7</div>
                                </a>
                              </li>
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C">Screener 8</div>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <div class="panel">
                          <a class="panel-heading collapsed" role="tab" id="nightShift" data-toggle="collapse" data-parent="#accordion" href="#night" aria-expanded="false" aria-controls="night">
                            <h4 class="panel-title" style="color: #73879C">Night</h4>
                          </a>
                          <div id="night" class="panel-collapse collapse" role="tabpanel" aria-labelledby="nightShift">
                            <ul class="list-unstyled msg_list">
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C" >Screener 9</div>
                                </a>
                              </li>
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C">Screener 10</div>
                                </a>
                              </li>
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C">Screener 11</div>
                                </a>
                              </li>
                              <li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
                                <a>
                                    <div class='fc-event-main' style="color: #73879C">Screener 12</div>
                                </a>
                              </li>
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
    <?php if($this->ion_auth->in_group("hostpial admin")): ?>
      <div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    
    <?php else: ?>
    
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
                    <button type="button" class="btn btn-default antoclose2" data-dismiss="modal" id="closeButton">Close</button>
                    <button type="button" class="btn btn-primary" style="padding: 5px 18px 5px 18px; margin: 5px 0 5px 5px;"><a href="request" style="color: white">Request Time-Off</a></button>
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