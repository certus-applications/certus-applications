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
                    <h3>Availability Update</h3>
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Employee ID</th>
                          <th>Date of request</th>
                          <th>New Availability</th>
                          <th>Message</th>
                          <th>Accept/Decline Changes</th>
                        </tr>
                      </thead>
                      <tbody>
                            <tr>
                              <td>Page</td>
                              <td>Branch</td>
                              <td>3YIEN</td>
                              <td>Feb. 28, 2021</td>
                              <td><a href="" class="btn btn-info btn-xs">View</a></td>
                              <td>I'm no longer available for Monday morning, I can do Monday evening or night.</td>
                              <td>
                                
                                <a data-toggle="modal" class="btn btn-danger btn-xs" data-target="#deleteClient"><i class="fa fa-trash-o"></i> Decline </a>
                                <a href="" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Accept </a>
                              </td>
                            </tr>

                            <tr>
                              <td>Janet</td>
                              <td>Burn</td>
                              <td>2E6OA</td>
                              <td>Mar. 02, 2021</td>
                              <td><a href="" class="btn btn-info btn-xs">View</a></td>
                              <td>I can now do shifts on Friday.</td>
                              <td>
                                <a data-toggle="modal" class="btn btn-danger btn-xs" data-target="#deleteClient"><i class="fa fa-trash-o"></i> Decline </a>
                                <a href="" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Accept </a>
                              </td>
                            </tr>

                      </tbody>
                    </table>
                  </div>

                  <div class="x_content">
                    <h3>Emergency</h3>
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Employee ID</th>
                          <th>Date of request</th>
                          <th>Date of time-off</th>
                          <th>Reason for time-off</th>
                          <th>Accept/Decline Changes</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($avail as $availability) {?>
                        <?php if($availability['approved']==TRUE && $availability['approved']!=NULL ) { ?>
                            <tr class="strikeout" style="background-color: green;">
                              <td><?php echo $availability['first_name'];?></td>
                              <td><?php echo $availability['last_name'];?></td>
                              <td><?php echo $availability['employeeid'];?></td>
                              <td><?php date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                              <td><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></td>
                              <td><?php echo $availability['reason'];?></td>
                              <td><a class="btn btn-success btn-xs" readonly> Approved </a></td>
                            </tr>
                          <?php } elseif($availability['approved']==FALSE && $availability['approved']!=NULL) { ?>
                            <tr class="strikeout" style="background-color: red;">
                              <td><?php echo $availability['first_name'];?></td>
                              <td><?php echo $availability['last_name'];?></td>
                              <td><?php echo $availability['employeeid'];?></td>
                              <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                              <td><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></td>
                              <td><?php echo $availability['reason'];?></td>
                              <td><a class="btn btn-danger btn-xs" readonly> Declined </a></td>
                            </tr>
                          <?php } else { ?>
                            <tr class="strikeout" style="background-color: none;">
                              <td><?php echo $availability['first_name'];?></td>
                              <td><?php echo $availability['last_name'];?></td>
                              <td><?php echo $availability['employeeid'];?></td>
                              <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                              <td><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></td>
                              <td><?php echo $availability['reason'];?></td>
                              <td>
                                <?php echo form_open('request/updateRequest'); ?>
                                  <input type="submit" class="btn btn-danger btn-xs"  name="choice" value="Decline"></button>
                                  <input type="submit" class="btn btn-success btn-xs" name="choice" value="Approve"></button>
                                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $availability['id']; ?>">
                                <?php echo form_close(); ?>
                              </td>
                            </tr>
                        <?php } } ?>
                      </tbody>
                    </table>
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


