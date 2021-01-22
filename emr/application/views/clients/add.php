                <!-- page content -->
        <div class="right_col" role="main">
                      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Screener Information</h2> 

                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a href="clients"><button  type="submit" class="btn btn-danger">Back</button></a></li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <tbody>
                          <form action ="<?php echo base_url(); ?>Clients/added_time" method="POST">
							
							<div class="col-sm-6">
							<fieldset class="form-group">
								First Name<input class="form-control" type="text" name="first_name" placeholder="<?php echo $first_name;?>" readonly>
							</fieldset> 
							</div>

							<div class="col-sm-6">
							<fieldset class="form-group">
								Last Name<input class="form-control" type="text" name="last_name" placeholder="<?php echo $last_name?>" readonly>
							</fieldset> 
							</div>

							<div class="col-sm-6">
							<fieldset class="form-group">   
								Email<input class="form-control" type="email" name="email" placeholder="<?php echo $email?>" readonly>
							</fieldset>
							</div>

							
							<div class="col-sm-6">
							<fieldset class="form-group">   
								Employee Number<input class="form-control" type="number" name="empnumb" placeholder="<?php echo $employeeid?>" readonly>
							</fieldset>
							</div>
						</tbody>
					</div>
						
<!-- 
							<div class="col-sm-12">
								<h4>*If you would like to change any of the information shown, please contact your hospital administrator.</h4>
							</div> -->

							<!-- <div class="col-sm-12">
								<hr class="rounded">
								<style>
								hr.rounded {
									border-top: 0.5px solid #bbb;
									border-radius: 5px;
								}
								</style>
							</div> -->


						<div class="x_content">
							<div class="col-sm"><h2>Select Your Bi-Weekly Availability</h2></div>

								<div class="col-sm-12">
									<table class="table table-striped table-bordered">
										<thead class="thead-dark">
											<tr>
											<th scope="col">Week Of: <?php echo $week_start; ?> - <?php echo $week_end; ?></th>

											<?php for($i = 0;  $i < 7; $i++) { ?>
												<th scope="col"><?php echo date('l', strtotime($datesArr[$i]))." - ". $datesArr[$i]; ?></th>
											<?php } ?>
										</thead>
										<tbody>

											<tr>
											<th scope="row">Morning (5:00am - 12:00pm):</th>
											<?php for($i = 0; $i < 7; $i++) { ?>
												<td><input type="checkbox" name="morn_times[]" value=<?php echo json_encode($mornTimeArr[$i]); ?>></td>
											<?php } ?>
											</tr>
											<tr>
											<th scope="row">Evening (1:00pm - 9:00pm):</th>
											<?php for($i = 0; $i < 7; $i++) { ?>
												<td><input type="checkbox" name="eve_times[]" value=<?php echo json_encode($eveTimeArr[$i]); ?>></td>
											<?php } ?>
											</tr>
											<tr>
											<th scope="row">Night (11:00pm - 4:00am):</th>
											<?php for($i = 0; $i < 7; $i++) { ?>
												<td><input type="checkbox" name="night_times[]" value=<?php echo json_encode($nightTimeArr[$i]); ?>></td>
											<?php } ?>
											</tr>
										</tbody>
									</table>
								

									<table class="table table-striped table-bordered">
										<thead class="thead-light">
											<tr>
												<th scope="col">Week Of: <?php echo $week_2start; ?> - <?php echo $week_2end; ?></th>
												<?php for($i = 7;  $i < 14; $i++) {?>
												<th scope="col"><?php echo date('l', strtotime($datesArr[$i]))." - ". $datesArr[$i]; ?></th>
											<?php } ?>
											</tr>
										</thead>
										<tbody>
											<tr>
											<th scope="row">Morning (5:00am - 12:00pm):</th>
											<?php for($i = 7; $i < 14; $i++) { ?>
												<td><input type="checkbox" name="morn_times[]" value=<?php echo json_encode($mornTimeArr[$i]); ?>></td>
											<?php } ?>

											</tr>
											<tr>
											<th scope="row">Evening (1:00pm - 9:00pm):</th>
											<?php for($i = 7; $i < 14; $i++) { ?>
												<td><input type="checkbox" name="eve_times[]" value=<?php echo json_encode($eveTimeArr[$i]); ?>></td>
											<?php } ?>
											</tr>
											<tr>
											<th scope="row">Night (11:00pm - 4:00am):</th>
											<?php for($i = 7; $i < 14; $i++) { ?>
												<td><input type="checkbox" name="night_times[]" value=<?php echo json_encode($nightTimeArr[$i]); ?>></td>
											<?php } ?>
											</tr>
										</tbody>
									</table>

								</div>



							<div class="col-sm-12">

								<ul class="nav navbar-left panel_toolbox">
									<li><a href="clients"><button  type="submit" class="btn btn-danger">Back</button></a></li>
								</ul>
								<ul class="nav navbar-right panel_toolbox">      
								<?php
									$data = [
										'class' => 'btn btn-success',
										'value' => 'Submit',
										'type' => 'submit',
										'name' => 'submit',
										'content' => 'Submit'
									]; 
									echo form_button($data);
									?>
									
								</ul>
							</div>
						</div>


					</form>
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