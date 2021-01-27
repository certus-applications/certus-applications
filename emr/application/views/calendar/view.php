        <!-- Calendar content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12">
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
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    

    <!-- add new calendar entry -->
    <div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="title">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary antosubmit" id="add_new_event">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- edit calendar entry -->
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
                  <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary antosubmit2">Save changes</button>
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

    <div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
    <div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
    <!-- /calendar modal -->

      <div id="setCookieSuccess" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title" id="myModalLabel2" style="text-align: center;">Preferences updated!</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="setCookie" data-toggle="modal" data-target="#setCookieSuccess"></div>

  </body>

  <script type="text/javascript">
    function updateCookie(preference) {
      $('#setCookie').click();
      document.cookie = "preference="+preference;
    }
  </script>