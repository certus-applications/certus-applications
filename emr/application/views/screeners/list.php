        
<?php if($this->ion_auth->in_group("hostpial admin") || $this->ion_auth->is_admin()): ?>     
  <!-- page content -->
  <div class="right_col" role="main">
                <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>MGH <small>Screeners</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a href="auth/create_user"><button  type="submit" class="btn btn-success">Add Screeners</button></a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($screenersAll as $screeners){?>
                      <tr>
                        <td><?php echo $screeners['first_name'];?></td>
                        <td><?php echo $screeners['last_name'];?></td>
                        <td><a href="auth/edit_user/<?php echo $screeners['user_id'];?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a></td>
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
<?php endif; ?>

  </div>
</div>

</body>

