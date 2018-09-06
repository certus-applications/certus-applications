                <!-- page content -->
        <div class="right_col" role="main">
                      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ryerson Health Clinic <small>Clients</small></h2>
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
                                <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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