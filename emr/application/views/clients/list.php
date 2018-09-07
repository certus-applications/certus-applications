                <!-- page content -->
        <div class="right_col" role="main">
                      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ryerson Health Clinic <small>Clients</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><button type="submit" class="btn btn-success">Add Client</button></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Last Visit</th>
                          <th>Name of Clinician</th>
                          <th>Phone Number</th>
                          <th>Email</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php foreach($clientsAll as $clients){?>
                            <tr>
                              <td><?php echo $clients['first_name'];?></td>
                              <td><?php echo $clients['last_name'];?></td>
                              <td><?php echo $clients['last_visit'];?></td>
                              <td><?php echo $clients['name_clinician'];?></td>
                              <td><?php echo $clients['phone'];?></td>
                              <td><?php echo $clients['email'];?></td>
                              <td>
                                <a href="" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a data-toggle="modal" class="btn btn-danger btn-xs" data-target="#deleteClient<?php echo $clients['id'];  ?>"><i class="fa fa-trash-o"></i> Delete </a>
                              </td>
                            </tr>
                          <?php } ?>
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo $clients['email'];  ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>