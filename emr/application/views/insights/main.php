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
                              <td>I can now do shifts on Friday as well.</td>
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
                          <th>Request Type</th>
                          <th>Message</th>
                          <th>Accept/Decline Changes</th>
                        </tr>
                      </thead>
                      <tbody>
                            <tr>
                              <td>Katelyn</td>
                              <td>Smith</td>
                              <td>X5FQ5</td>
                              <td>Feb. 10, 2021</td>
                              <td>Feb. 15, 2021</td>
                              <td>Other</td>
                              <td>I have a family emergency so I won't be able to come in for my shift.</td>
                              <td>
                                <a data-toggle="modal" class="btn btn-danger btn-xs" data-target="#deleteClient"><i class="fa fa-trash-o"></i> Decline </a>
                                <a href="" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Accept </a>
                              </td>
                            </tr>
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

  <!-- Modal -->
<?php foreach($clientsAll as $clients){?>
  <div class="modal fade" id="deleteClient<?php echo $clients['id'];  ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h2 class="modal-title" id="exampleModalLabel">Delete Client</h5>
        </div>
        <div class="modal-body">
          Are you sure you want to delete <?php echo $clients['first_name'].' '.$clients['last_name'];?>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

