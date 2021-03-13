<!-- Profile Start -->
<div class="right_col" role="main">


	<div class="x_title">
		<h2>My Profile</h2>
		<div class="clearfix"></div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12 pr-1">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="profile_img">
							<div id="crop-avatar">
								<!-- Current avatar -->
								<div class="center">
									<div class="prof_icon"><?php echo $userFirstName[0].' '.$userLastName[0]; ?></div>
								</div>
							</div>
						</div>
						<div class="center">
							<h3><?php echo $userFirstName.' '.$userLastName; ?></h3>
						</div>
						<div class="center">
							<h3>Position: Screener</h3>
						</div>
						<div class="center">
							<h3>Employee ID: <?php echo $screenerID; ?></h3>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h3>Upcoming Shifts</h3>
							<div class="clearfix"></div>
						</div>
						<div class="scroll panel-collapse collapse in" role="tabpanel" >
							<ul class="list-unstyled msg_list" id="availability_night">
								<?php 
									$day = date('w'); 
									$week_start = date('Y-m-d H:i:s', strtotime('-'.$day.' days'));
									$week_end = date('Y-m-d H:i:s', strtotime('+'.(13-$day).' days'));
									foreach($scheduleViewScreener as $availability){
										$time = date('Y-m-d', strtotime($availability['start']));
								?>

									<li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
									<a>                              
										<div class='fc-event-main' style="color: #73879C" > 
											<?php 
												if(($availability['start'] >= date('Y-m-d H:i:s', strtotime($time.'05:00:00'))) && ($availability['start'] < date('Y-m-d H:i:s', strtotime($time.'13:00:00')))) {
													echo date('l', strtotime($availability['start'])).' - Morning, Location: '.$availability['location'];
												}
												if(($availability['start'] >= date('Y-m-d H:i:s', strtotime($time.'13:00:00'))) && ($availability['start'] < date('Y-m-d H:i:s', strtotime($time.'21:00:00')))) {
													echo date('l', strtotime($availability['start'])).' - Evening, Location: '.$availability['location'];;
												}
												if(($availability['start'] >= date('Y-m-d H:i:s', strtotime($time.'23:00:00')))) {
													echo date('l', strtotime($availability['start'])).' - Night, Location: '.$availability['location'];;
												}
												
											?>
										</div>
										<div style="display: none;">
										<?php
											$dayofweek = date('l', strtotime($availability['start']));
											echo $dayofweek;
										?>
										</div>
									</a>

								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-8 col-sm-12 col-xs-12 pl-1">
				<div class="x_panel">
						<div role="tabpanel" data-example-id="togglable-tabs" >
							<ul class="nav nav-tabs bar_tabs responsive">
								<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">My Information</a>
								</li>
								<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">My Availability</a>
								</li>
							</ul>
						</div>
					<div class="x_content">
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
									<tbody>
										<!-- Start Screener Profile -->
										<div class="x_title">
											<h3>My Information</h3>
											<div class="clearfix"></div>
										</div>
										<div class="col-sm-6 col-xs-12">	
											<fieldset class="form-group">
												First Name<input class="form-control" type="text" name="first_name" placeholder="<?php echo $userFirstName;?>" readonly>
											</fieldset>
										</div>

										<div class="col-sm-6 col-xs-12">
											<fieldset class="form-group">
												Last Name<input class="form-control" type="text" name="last_name" placeholder="<?php echo $userLastName?>" readonly>
											</fieldset> 
										</div>

										<div class="col-sm-6 col-xs-12">
											<fieldset class="form-group">   
												Position<input class="form-control" type="text" name="position" placeholder="Screener" readonly>
											</fieldset>
										</div>
										<div class="col-sm-6 col-xs-12">
											<fieldset class="form-group">   
												Employee ID<input class="form-control" type="text" name="employeeid" placeholder="<?php echo $screenerID?>" readonly>
											</fieldset>
										</div>

										<div class="col-sm-12 col-xs-12">
											<fieldset class="form-group">   
												Email<input class="form-control" type="email" name="email" placeholder="<?php echo $email?>" readonly>
											</fieldset>
										</div>

										<div class="col-sm-12 col-xs-12 buttonWrap">
											<fieldset class="input-group"> 
												Password<input class="form-control" type="password" name="password" placeholder="********" readonly>
												<div class="input-group-append">
													<button type="button" class="change_pass btn btn-primary"><a href="auth/change_password" style="color: white">Change Password</a></button>
												</div>
											</fieldset>
										</div>
									</tbody>
										<!-- End Screener Profile -->

									<tbody>
										<!-- Start Manager Profile -->
										<div class="x_title col-sm-12">
											<h3>My Supervisor</h3>
											<div class="clearfix"></div>
										</div>

										<div class="col-sm-6 col-xs-12">	
											<fieldset class="form-group">
												First Name<input class="form-control" type="text" name="first_name" placeholder="Brendon" readonly>
											</fieldset>
										</div>

										<div class="col-sm-6 col-xs-12">
											<fieldset class="form-group">
												Last Name<input class="form-control" type="text" name="last_name" placeholder="Lam" readonly>
											</fieldset> 
										</div>

										<div class="col-sm-12 col-xs-12">
											<fieldset class="form-group">   
												Email<input class="form-control" type="email" name="email" placeholder="brendon.lam@tehn.ca" readonly>
											</fieldset>
										</div>

									</tbody>

								<!-- end recent activity -->

							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

								<!-- start user projects -->
									<div class="x_title">
										<h3>My Availability</h3>
										<div class="clearfix"></div>
									</div>
									<div class="scroll panel-collapse collapse in" role="tabpanel" aria-labelledby="nightShift">
										<ul class="list-unstyled msg_list" id="availability_night">
											<?php 
												$day = date('w'); 
												$week_start = date('Y-m-d H:i:s', strtotime('-'.$day.' days'));
												$week_end = date('Y-m-d H:i:s', strtotime('+'.(13-$day).' days'));
												foreach($screenerAvail as $availability){
													$time = date('Y-m-d', strtotime($availability['start']));
											?>

												<li class='fc-event' style="border: 1px solid #73879C cursor: -webkit-grab; cursor: grab;">
												<a>                              
													<div class='fc-event-main' style="color: #73879C" > 
														<?php 
															if(($availability['start'] >= date('Y-m-d H:i:s', strtotime($time.'05:00:00'))) && ($availability['start'] < date('Y-m-d H:i:s', strtotime($time.'13:00:00')))) {
																echo date('l', strtotime($availability['start'])).' - Morning';
															}
															if(($availability['start'] >= date('Y-m-d H:i:s', strtotime($time.'13:00:00'))) && ($availability['start'] < date('Y-m-d H:i:s', strtotime($time.'21:00:00')))) {
																echo date('l', strtotime($availability['start'])).' - Evening';
															}
															if(($availability['start'] >= date('Y-m-d H:i:s', strtotime($time.'23:00:00')))) {
																echo date('l', strtotime($availability['start'])).' - Night';
															}
															
														?>
													</div>
													<div style="display: none;">
													<?php
														$dayofweek = date('l', strtotime($availability['start']));
														echo $dayofweek;
													?>
													</div>
												</a>

											<?php } ?>
										</ul>
									</div>
								<!-- end user projects -->

							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>



</div>


<style>
/* @media only screen and (max-width:768px) {
    .nav.nav-tabs{
        padding-top: 100px;
    }
} */

.center {
	display: flex;
	justify-content: center;
}

.prof_icon {
	background: #544D71;
	color: white;
	opacity: 1; 
	display: flex; 
	margin: 30px 0 20px 0;
	font-weight: bold; 
	border-radius: 50%; 
	width: 192px; 
	height: 192px; 
	font-size: 46px;
	align-items: center;
	justify-content: center;
}

.change_pass {
	cursor: pointer;
	position: absolute;
	border-radius: 0;
	margin-left: -140px;
	z-index: 2;
}

.buttonwrapper {
  display: inline-block;
}

.scroll {
	overflow: scroll;
	height: 75%;
}

.tab li {
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