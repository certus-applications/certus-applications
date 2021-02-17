                <!-- page content -->
                <div class="right_col" role="main">
                      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>MGH <small>Screener Requests</small></h2>
                    <div class="clearfix"></div>
                  </div>

                  
                  <div class="x_content">
                    <h3>Emergency Time Off Requests</h3>
                    <div class="col-xs-12 table-responsive">
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Employee ID</th>
                            <th>Time-Off Request Type</th>
                            <th>Date of request</th>
                            <th>Date of time-off</th>
                            <th>Reason for time-off</th>
                            <th>Accept/Decline Changes</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($avail as $availability) {?>
                          <?php if($availability['approved']==TRUE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Emergency Time Off')) { ?>
                              <tr style=" background-color: rgba(50, 205, 50, 0.3); color: black;">
                                <td><?php echo $availability['first_name'];?></td>
                                <td><?php echo $availability['last_name'];?></td>
                                <td><?php echo $availability['employeeid'];?></td>
                                <td><?php echo $availability['timeoff_type'];?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></td>
                                <td><?php echo $availability['reason'];?></td>
                                <td><a class="btn btn-danger btn-xs" style="background-color: #32CD32; border-color: #32CD32" readonly> Approved </a></td>
                              </tr>
                            <?php } elseif($availability['approved']==FALSE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Emergency Time Off')) { ?>
                              <tr style="background-color: rgba(128, 0, 0, 0.3); color: black;">
                                <td><?php echo $availability['first_name'];?></td>
                                <td><?php echo $availability['last_name'];?></td>
                                <td><?php echo $availability['employeeid'];?></td>
                                <td><?php echo $availability['timeoff_type'];?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></td>
                                <td><?php echo $availability['reason'];?></td>
                                <td><a class="btn btn-danger btn-xs" style="background-color: #800000; border-color: #800000;" readonly> Declined </a></td>
                              </tr>
                            <?php } elseif ($availability['timeoff_type']=='Emergency Time Off') { ?>
                              <tr style="background-color: none;">
                                <td><?php echo $availability['first_name'];?></td>
                                <td><?php echo $availability['last_name'];?></td>
                                <td><?php echo $availability['employeeid'];?></td>
                                <td><?php echo $availability['timeoff_type'];?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></td>
                                <td><?php echo $availability['reason'];?></td>
                                <td>
                                  <?php echo form_open('request/update'); ?>
                                    <input type="submit" class="btn btn-danger btn-xs"  style="background-color: #800000; border-color: #800000;" name="choice" value="Decline"></button>
                                    <input type="submit" class="btn btn-success btn-xs" style="background-color: #32CD32; border-color: #32CD32" name="choice" value="Approve"></button>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $availability['id']; ?>">
                                  <?php echo form_close(); ?>
                                </td>
                              </tr>
                          <?php } } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
  

                  <div class="x_content">
                    <h3>Shift Change Requests</h3>
                    <div class="col-xs-12 table-responsive">
                      <table class="display table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Employee ID</th>
                            <th>Time-Off Request Type</th>
                            <th>Date of request</th>
                            <th>Requested Date</th>
                            <th>Date of time-off</th>
                            <th>Reason for Shift Change</th>
                            <th>Accept/Decline Changes</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($avail as $availability) {?>
                          <?php if($availability['approved']==TRUE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Request Shift Change')) { ?>
                              <tr style=" background-color: rgba(50, 205, 50, 0.3); color: black;">
                                <td><?php echo $availability['first_name'];?></td>
                                <td><?php echo $availability['last_name'];?></td>
                                <td><?php echo $availability['employeeid'];?></td>
                                <td><?php echo $availability['timeoff_type'];?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                                <td><b><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></b></td>
                                <td><?php echo date("M jS, Y, H:i:sa", strtotime($availability['requested_date_timeoff']));?></td>
                                <td><?php echo $availability['reason'];?></td>
                                <td><a class="btn btn-danger btn-xs" style="background-color: #32CD32; border-color: #32CD32" readonly> Approved </a></td>
                              </tr>
                            <?php } elseif($availability['approved']==FALSE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Request Shift Change')) { ?>
                              <tr style="background-color: rgba(128, 0, 0, 0.3); color: black;">
                                <td><?php echo $availability['first_name'];?></td>
                                <td><?php echo $availability['last_name'];?></td>
                                <td><?php echo $availability['employeeid'];?></td>
                                <td><?php echo $availability['timeoff_type'];?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                                <td><b><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></b></td>                              
                                <td><?php echo date("M jS, Y, H:i:sa", strtotime($availability['requested_date_timeoff']));?></td>
                                <td><?php echo $availability['reason'];?></td>
                                <td><a class="btn btn-danger btn-xs" style="background-color: #800000; border-color: #800000;" readonly> Declined </a></td>
                              </tr>
                            <?php } elseif ($availability['timeoff_type']=='Request Shift Change') { ?>
                              <tr style="background-color: none;">
                                <td><?php echo $availability['first_name'];?></td>
                                <td><?php echo $availability['last_name'];?></td>
                                <td><?php echo $availability['employeeid'];?></td>
                                <td><?php echo $availability['timeoff_type'];?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                                <td><b><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></b></td>                              
                                <td><?php echo date("M jS, Y, H:i:sa", strtotime($availability['requested_date_timeoff']));?></td>
                                <td><?php echo $availability['reason'];?></td>
                                <td>
                                  <?php echo form_open('request/update'); ?>
                                    <input type="submit" class="btn btn-danger btn-xs"  style="background-color: #800000; border-color: #800000;" name="choice" value="Decline"></button>
                                    <input type="submit" class="btn btn-success btn-xs" style="background-color: #32CD32; border-color: #32CD32" name="choice" value="Approve"></button>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $availability['id']; ?>">
                                </td>
                              </tr>
                          <?php } } ?>
                          <?php echo form_close(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


      </div>
    </div>

  </body>

<script type="text/javascript">
  $(document).ready(function notifyUser(message) {
    PNotify.removeAll();
    if(message == "approved") {
      new PNotify({
        title: 'Screener Approved!',
        text: "You have successfully approved the screener's request!",
        type: 'success',
        styling: 'bootstrap3',
        delay: 2000
      });
    } else if (message == "declined"){
      new PNotify({
        title: 'Screener Denied!',
        text: "You have successfully denied the screener's request!",
        type: 'success',
        styling: 'bootstrap3',
        delay: 2000
      });
    }
  });

  $(document).ready(function() {
    $('table.display').DataTable();
  });

</script>