<!-- page content -->
	<div class="right_col" role="main">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">		
				<?php if($this->session->flashdata('err')){ ?>
						<div class = "alert alert-danger"> 
							<?php 
								echo $this->session->flashdata('err'); 
								echo validation_errors(); 
							?>
						</div>
					<?php } ?>
					<?php if($this->session->flashdata('success')){ ?>
                  		<div class="alert alert-success"> <?php  echo $this->session->flashdata('success'); }?></div>	
				
				<div class="x_panel">
					<div class="x_title">
						<h2>Screener Information</h2>
						<div class="clearfix"></div>
					</div>

					<?php echo form_open('screeners/added_time'); ?>
						<div class="x_content">
							<tbody>
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
										Employee Number<input class="form-control" type="text" name="employeeid" placeholder="<?php echo $employeeid?>" readonly>
									</fieldset>
								</div>
							</tbody>
						</div>

						<div class="x_content">
							<div class="col-sm"><h2>Select Your Bi-Weekly Availability</h2></div>
							
							<div class="col-xs-6 table-responsive">
								<table class="table table-hover table-striped table-bordered">
									<thead class="thead-dark">
										<tr>
											<th class ='th_center' scope="col">
												Week Of: <?php echo $week_start; ?> - <?php echo $week_end; ?>
											</th>
											<th class='th_center' scope="col">Morning <br>(5:00am - 12:00pm)</th>
											<th class='th_center' scope="col">Evening <br>(1:00pm - 9:00pm)</th>
											<th class='th_center' scope="col">Night <br>(11:00pm - 4:00am)</th>
										</tr>
										
										<?php for($i = 0;  $i < 7; $i++) { echo "<tr>"; ?>
											<th scope="col">
												<?php echo date('l', strtotime($datesArr[$i]))." - ". $datesArr[$i]; ?>
											</th>
											<div class='double'>
												<td><input type="checkbox" name="morn_times[]" value=<?php echo json_encode($mornTimeArr[$i]); ?>></td>
												<td><input type="checkbox" name="eve_times[]" value=<?php echo json_encode($eveTimeArr[$i]); ?>></td>
												<td><input type="checkbox" name="night_times[]" value=<?php echo json_encode($nightTimeArr[$i]); ?>></td>
											</div>
										<?php echo "</tr>"; } ?>
									</thead>
								</table>
							</div>
							
							<div class="col-xs-6 table-responsive">
								<table class="table table-hover table-striped table-bordered">
									<thead class="thead-dark">
										<tr>
											<th class='th_center' scope="col">
												Week Of: <?php echo $week_2start; ?> - <?php echo $week_2end; ?>
											</th>
											<th class='th_center' scope="col">Morning <br>(5:00am - 12:00pm)</th>
											<th class='th_center' scope="col">Evening <br>(1:00pm - 9:00pm)</th>
											<th class='th_center' scope="col">Night <br>(11:00pm - 4:00am)</th>
										</tr>
										
										<?php for($i = 7;  $i < 14; $i++) { echo "<tr>"; ?>
											<th scope="col">
												<?php echo date('l', strtotime($datesArr[$i]))." - ". $datesArr[$i]; ?>
											</th>
											<td><input type="checkbox" name="morn_times[]" value=<?php echo json_encode($mornTimeArr[$i]); ?>></td>
											<td><input type="checkbox" name="eve_times[]" value=<?php echo json_encode($eveTimeArr[$i]); ?>></td>
											<td><input type="checkbox" name="night_times[]" value=<?php echo json_encode($nightTimeArr[$i]); ?>></td>
										<?php echo "</tr>"; } ?>
									</thead>
								</table>
							</div>
						</div>
							
						<div class="x_content">
							<div class="x_title">
								<div class="clearfix"></div>
							</div>	
							<div class="col-xs-6">
								<ul class="nav navbar-right panel_toolbox">
									<li>
										<button type="button" class="btn btn-danger" style="padding: 5px 18px 5px 18px; margin: 5px 0 5px 5px;"><a href="screeners" style="color: white">Back</a></button>
									</li>
								</ul>
							</div>
							<div class="col-xs-6">
								<ul class="nav navbar-left panel_toolbox">      
									<li><button type="submit" class="btn btn-success" style="padding: 5px 11px 5px 11px; margin: 5px 5px 5px 0;">Submit</button></li>
								</ul>
							</div>			
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>