<!-- page content -->
<?php if (empty($avail)) { ?>
	<div class="right_col" role="main">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">						
				<div class="x_panel">
					<div class="x_title">
						<h2>Availability <small>For <?php echo date('l, M jS', strtotime($week_2start)); ?> - <?php echo date('l, M jS', strtotime($week_2end)); ?></small></h2>
						<div class="clearfix"></div>
					</div>

					<?php echo form_open('screeners/added_time'); ?>

						<!-- <div class="x_content">
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

							</tbody>
						</div> -->

						<div class="x_content">
							<div class="col-xs-1"></div>
							<div class="col-xs-10 table-responsive">
								<table class="table table-hover table-striped table-bordered">
									<thead class="thead-dark">
										<tr>
											<th class='th_center' scope="col" style="width: 25%;">Days</th>
											<th class='th_center' scope="col" style="width: 25%;">Morning <i class="fa fa-info-circle morn_times"><span class="morn_hours">5am - 1pm</span></i></th>
											<th class='th_center' scope="col" style="width: 25%;">Evening <i class="fa fa-info-circle eve_times"><span class="eve_hours">1pm - 9pm</span></i></th>
											<th class='th_center' scope="col" style="width: 25%;">Night <i class="fa fa-info-circle night_times"><span class="night_hours">9pm - 5am</span></i></th>
										</tr>
										
										<?php for($i = 7;  $i < 14; $i++) { echo "<tr>"; ?>
											<th scope="col">
												<?php echo date('l', strtotime($datesArr[$i])); ?>
											</th>
											<td id="morn"><input type="checkbox" name="morn_times[]" value=<?php echo json_encode($mornTimeArr[$i]); ?>></td>
											<td id="eve"><input type="checkbox" name="eve_times[]" value=<?php echo json_encode($eveTimeArr[$i]); ?>></td>
											<td id="night"><input type="checkbox" name="night_times[]" value=<?php echo json_encode($nightTimeArr[$i]); ?>></td>
										<?php echo "</tr>"; } ?>
									</thead>
								</table>
							</div>
							<div class="col-xs-1"></div>

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
<?php } else { ?>
	  <!-- page content -->
	<div class="right_col" role="main">
		<div class="">
		<div class="page-title">
			<div class="title_left">
			<h3>User Profile</h3>
			</div>

			<div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
				<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Go!</button>
				</span>
				</div>
			</div>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
				<h2>User Report <small>Activity report</small></h2>
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
				<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
					<div class="profile_img">
					<div id="crop-avatar">
						<!-- Current avatar -->
						<img class="img-responsive avatar-view" src="../../../img/user.png" style="width:50%; height:50%;" alt="Avatar" title="Change the avatar">
					</div>
					</div>
					<br>
					<!-- <ul class="list-unstyled user_data">
					<li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
					</li>

					<li>
						<i class="fa fa-briefcase user-profile-icon"></i> Dr. Patel's Patient
					</li>

					<li class="m-top-xs">
						<i class="fa fa-external-link user-profile-icon"></i>
						<a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
					</li>
					</ul> -->
					<ul class="tab" id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
					<li role="presentation"><a href="#my_profile" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">My Profile</a>
					</li>

					<li role="presentation"><a href="#availability_tab" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">My Availability</a>
					</li>

					<li role="presentation"><a href="#edit_profile" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Edit Profile</a>
					</li>
					</ul>
					<br />


				</div>

				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="" role="tabpanel" data-example-id="togglable-tabs">
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade active in" id="my_profile" aria-labelledby="home-tab">
						<div class="profile_title">
							<div class="col-md-6">
							<h2>My Profile</h2>
							</div>
						</div>
						<div class="x_content">
							<tbody>
							<div class="col-sm-6">
								<fieldset class="form-group">
								First Name<input class="form-control" type="text" name="first_name" placeholder="<?php echo $userFirstName;?>" readonly>
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
								Last Name<input class="form-control" type="text" name="last_name" placeholder="<?php echo $userLastName?>" readonly>
								</fieldset> 
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">   
								Email<input class="form-control" type="email" name="email" placeholder="<?php echo $email?>" readonly>
								</fieldset>
							</div>

							</tbody>
						</div>

						</div>

						<div role="tabpanel" class="tab-pane fade" id="availability_tab" aria-labelledby="profile-tab">
						<div class="profile_title">
							<div class="col-md-6">
							<h2>My Availability</h2>
							</div>
						</div>

						<!-- start user projects -->
						<table class="data table table-striped no-margin">
							<thead>
							<tr>
								<th>#</th>
								<th>Project Name</th>
								<th>Client Company</th>
								<th class="hidden-phone">Hours Spent</th>
								<th>Contribution</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>1</td>
								<td>New Company Takeover Review</td>
								<td>Deveint Inc</td>
								<td class="hidden-phone">18</td>
								<td class="vertical-align-mid">
								<div class="progress">
									<div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
								</div>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>New Partner Contracts Consultanci</td>
								<td>Deveint Inc</td>
								<td class="hidden-phone">13</td>
								<td class="vertical-align-mid">
								<div class="progress">
									<div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
								</div>
								</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Partners and Inverstors report</td>
								<td>Deveint Inc</td>
								<td class="hidden-phone">30</td>
								<td class="vertical-align-mid">
								<div class="progress">
									<div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
								</div>
								</td>
							</tr>
							<tr>
								<td>4</td>
								<td>New Company Takeover Review</td>
								<td>Deveint Inc</td>
								<td class="hidden-phone">28</td>
								<td class="vertical-align-mid">
								<div class="progress">
									<div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
								</div>
								</td>
							</tr>
							</tbody>
						</table>
						<!-- end user projects -->

						</div>

						<div role="tabpanel" class="tab-pane fade" id="edit_profile" aria-labelledby="profile-tab">
						<div class="profile_title">
							<div class="col-md-6">
							<h2>Edit Profile</h2>
							</div>
						</div>

						<?php echo form_open(''); ?>
						<div class="x_content">
							<tbody>
							<div class="col-sm-6">
								<fieldset class="form-group">
								First Name<input class="form-control" type="text" name="first_name" placeholder="<?php echo $userFirstName;?>" >
								</fieldset>
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">
								Last Name<input class="form-control" type="text" name="last_name" placeholder="<?php echo $userLastName?>" >
								</fieldset> 
							</div>

							<div class="col-sm-6">
								<fieldset class="form-group">   
								Email<input class="form-control" type="email" name="email" placeholder="<?php echo $email?>" >
								</fieldset>
							</div>

							</tbody>
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
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
  <!-- /page content -->
<?php } ?>


<style>
	.morn_times .morn_hours {
		visibility: hidden;
		width: 120px;
		background-color: #544D71;
		color: #fff;
		text-align: center;
		border-radius: 6px;
		padding: 5px 0;

		/* Position the tooltip */
		position: absolute;
		z-index: 1;
	}

	.morn_times:hover .morn_hours {
		visibility: visible;
	}

	.eve_times .eve_hours {
		visibility: hidden;
		width: 120px;
		background-color: #544D71;
		color: #fff;
		text-align: center;
		border-radius: 6px;
		padding: 5px 0;

		/* Position the tooltip */
		position: absolute;
		z-index: 1;
	}

	.eve_times:hover .eve_hours {
		visibility: visible;
	}

	.night_times .night_hours {
		visibility: hidden;
		width: 120px;
		background-color: #544D71;
		color: #fff;
		text-align: center;
		border-radius: 6px;
		padding: 5px 0;

		/* Position the tooltip */
		position: absolute;
		z-index: 1;
	}

	.night_times:hover .night_hours {
		visibility: visible;
	}

	.tab li{
		display: block;
		background-color: inherit;
		color: black;
		padding: 22px 16px;
		margin-left: -20px;
		width: 100%;
		border: none;
		outline: none;
		text-align: left;
		cursor: pointer;
		transition: 0.3s;
		font-size: 17px;
  	}

</style>

<script type="text/javascript">
	function notifyUser(message) {
		if(message == "error_nothing") {
		new PNotify({
			title: 'Error!',
			text: "Please select at least one date before submitting.",
			type: 'error',
			styling: 'bootstrap3',
			delay: 2000
		});
		} else if(message == "error") {
		new PNotify({
			title: 'Error!',
			text: "An error has occurred, please try submitting again.",
			type: 'error',
			styling: 'bootstrap3',
			delay: 2000
		});
		} else if(message == "success") {
			new PNotify({
			title: 'Success!',
			text: "Your availability has been submitted in successfully!",
			type: 'success',
			styling: 'bootstrap3',
			delay: 2000
		});
		}
  	}
</script>