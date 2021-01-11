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
                          <form method='post'>
							
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

							
							</br><br><br><br>
							<h3>Select the days you're Availability</h3>

							<!-- <div class="form-row col-sm-6">
							<div class="col-sm-6">
							<fieldset class="form-group">   
								Employee Number<input class="form-control" type="email" name="email" placeholder="email ex. bob@example.ca">
							</fieldset>
							</div>

							<div class="col-sm-6">
							<fieldset class="form-group">   
								Employee Number<input class="form-control" type="email" name="email" placeholder="email ex. bob@example.ca">
							</fieldset>
							</div>
							</div> -->

							<div class="form-row">
								
							<table class="table table-striped table-bordered">
								<thead class="thead-dark">
									<?php 
										$day = date('w'); 
										$week_start = date('m/j/Y', strtotime('-'.$day.' days'));
										$week_end = date('m/j/Y', strtotime('+'.(6-$day).' days'));	
									?>
									<tr>
									<th scope="col">Week Of: <?php echo $week_start; ?> - <?php echo $week_end; ?></th>

									<?php 
										$datesArr = array();
										for($i = 0;  $i < 7; $i++) {
											$date = date('m/j/Y', strtotime("$week_start + $i days"));
											$datesArr[] = $date;
									?>
										<th scope="col"><?php echo date('l', strtotime($datesArr[$i]))." - ". $datesArr[$i]; ?></th>
									<?php } ?>
								</thead>
								<tbody>
									<tr>
									<th scope="row">Morning (5:00am - 12:00pm):</th>
									<td><input type="checkbox" name="check_list[]" value="morn_mon"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_tues"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_wed"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_thurs"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_fri"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_sat"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_sun"></td>
									</tr>
									<tr>
									<th scope="row">Afternoon (5:00am - 12:00pm):</th>
									<td><input type="checkbox" name="check_list[]" value="aft_mon"></td>
									<td><input type="checkbox" name="check_list[]" value="aft_tues"></td>
									<td><input type="checkbox" name="check_list[]" value="aft_wed"></td>
									<td><input type="checkbox" name="check_list[]" value="aft_thurs"></td>
									<td><input type="checkbox" name="check_list[]" value="aft_fri"></td>
									<td><input type="checkbox" name="check_list[]" value="aft_sat"></td>
									<td><input type="checkbox" name="check_list[]" value="aft_sun"></td>
									</tr>
									<tr>
									<th scope="row">Night (5:00am - 12:00pm):</th>
									<td><input type="checkbox" name="check_list[]" value="morn_mon"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_tues"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_wed"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_thurs"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_fri"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_sat"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_sun"></td>
									</tr>
								</tbody>
								</table>

								<table class="table table-striped table-bordered">
								<thead class="thead-light">
									<?php 
										$day = date('w'); 
										$week_2start = date('m/j/Y', strtotime('+'.(7-$day).' days'));
										$week_2end = date('m/j/Y', strtotime('+'.(13-$day).' days'));	
									?>
									<tr>
										<th scope="col">Week Of: <?php echo $week_2start; ?> - <?php echo $week_2end; ?></th>
										<?php 
										$datesArr = array();
										for($i = 0;  $i < 7; $i++) {
											$date = date('m/j/Y', strtotime("$week_2start + $i days"));
											$datesArr[] = $date;
										?>
										<th scope="col"><?php echo date('l', strtotime($datesArr[$i]))." - ". $datesArr[$i]; ?></th>
									<?php } ?>
									</tr>
								</thead>
								<tbody>
									<tr>
									<th scope="row">Morning (5:00am - 12:00pm):</th>
									<td><input type="checkbox" name="check_list[]" value="morn_mon"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_tues"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_wed"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_thurs"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_fri"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_sat"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_sun"></td>
									</tr>
									<tr>
									<th scope="row">Afternoon (5:00am - 12:00pm):</th>
									<td><input type="checkbox" name="check_list[]" value="morn_mon"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_tues"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_wed"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_thurs"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_fri"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_sat"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_sun"></td>
									</tr>
									<tr>
									<th scope="row">Night (5:00am - 12:00pm):</th>
									<td><input type="checkbox" name="check_list[]" value="morn_mon"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_tues"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_wed"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_thurs"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_fri"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_sat"></td>
									<td><input type="checkbox" name="check_list[]" value="morn_sun"></td>
									</tr>
								</tbody>
								</table>
							</div>
							<br><br>
							<br><br>

							<div class="col-sm-12">
							<fieldset class="form-group">       
								<a href=""><button  type="submit" class="btn btn-success">Add Availability</button></a>
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