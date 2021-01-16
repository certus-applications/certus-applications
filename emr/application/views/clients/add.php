                <!-- page content -->
        <div class="right_col" role="main">
                      <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Availability Form <small>Enter in the times you're available</small></h2> 

                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="clients"><button  type="submit" class="btn btn-success">Back</button></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <tbody>
                          <form action ="<?php echo base_url(); ?>Clients/added_time" method="POST">
							
							<div class="col-sm-6">
							<fieldset class="form-group">
								First Name<input class="form-control" type="text" name="first_name" placeholder="First Name ex. Bob">
							</fieldset> 
							</div>

							<div class="col-sm-6">
							<fieldset class="form-group">
								Last Name<input class="form-control" type="text" name="last_name" placeholder="Last Name ex. Dylan">
							</fieldset> 
							</div>

							<!-- <div class="col-sm-6">
							<fieldset class="form-group">   
								Last Visit<input class="form-control" type="date" name="last_visit" placeholder="Last Visit">
							</fieldset>
							</div>

							<div class="col-sm-6">
							<fieldset class="form-group">   
								Name Of Clinician<input class="form-control" type="text" name="clinician" placeholder="Ex. Dr. Singh">
							</fieldset>
							</div> -->

							<div class="col-sm-6">
							<fieldset class="form-group">   
								Phone Number<input class="form-control" type="number" name="telephone" placeholder="123 456 7890">
							</fieldset>
							</div>

							<div class="col-sm-6">
							<fieldset class="form-group">   
								Email<input class="form-control" type="email" name="email" placeholder="email ex. bob@example.ca">
							</fieldset>
							</div>

							
							<div class="col-sm-12">
								<hr class="rounded">
								<style>
								hr.rounded {
									border-top: 2px solid #bbb;
									border-radius: 5px;
								}
								</style>
							</div>

							<div class="col-sm-6">
							<fieldset class="form-group">   
								Employee Number<input class="form-control" type="number" name="empnumb" placeholder="1234567">
							</fieldset>
							</div>
							<div class="col-sm-6">
							<fieldset class="form-group">   
								Employee Username<input class="form-control" type="text" name="empuser" placeholder="sam.smith">
							</fieldset>
							</div>

							<hr>
							<div class="form-row">
							<h3>Select the days you're Available</h3>
								
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
									<th scope="row">Evening (5:00am - 12:00pm):</th>
									<?php for($i = 0; $i < 7; $i++) { ?>
										<td><input type="checkbox" name="eve_times[]" value=<?php echo json_encode($eveTimeArr[$i]); ?>></td>
									<?php } ?>
									</tr>
									<tr>
									<th scope="row">Night (5:00am - 12:00pm):</th>
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
									<th scope="row">Evening (5:00am - 12:00pm):</th>
									<?php for($i = 7; $i < 14; $i++) { ?>
										<td><input type="checkbox" name="eve_times[]" value=<?php echo json_encode($eveTimeArr[$i]); ?>></td>
									<?php } ?>
									</tr>
									<tr>
									<th scope="row">Night (5:00am - 12:00pm):</th>
									<?php for($i = 7; $i < 14; $i++) { ?>
										<td><input type="checkbox" name="night_times[]" value=<?php echo json_encode($nightTimeArr[$i]); ?>></td>
									<?php } ?>
									</tr>
								</tbody>
								</table>
							</div>


							
							<br><br>
							<br><br>

							<div class="col-sm-12">
							<fieldset class="form-group">       
							<?php
								$data = [
									'class' => 'login100-form-btn',
									'value' => 'Submit',
									'type' => 'submit',
									'name' => 'submit',
									'content' => 'Submit'
								]; 
								echo form_button($data);
								?>
							</fieldset>
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