<!-- Profile Start -->
<div class="right_col" role="main">
    <div class="">

	<div class="x_title">
		<h2>My Profile</h2>
		<div class="clearfix"></div>
	</div>

		<div class="row">
			<div class="col-md-4 col-sm-3">
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
			

			<div class="col-md-8 col-sm-3">
				<div class="x_panel">
					<div class="x_content">
						<tbody>
							<div class="col-sm-6 border-line">	
								<div class="x_title">
									<h3>My Information</h3>
									<div class="clearfix"></div>
								</div>	
								<fieldset class="form-group">
									First Name<input class="form-control" type="text" name="first_name" placeholder="<?php echo $userFirstName;?>" readonly>
								</fieldset>
								<fieldset class="form-group">
									Last Name<input class="form-control" type="text" name="last_name" placeholder="<?php echo $userLastName?>" readonly>
								</fieldset> 
								<fieldset class="form-group">   
									Email<input class="form-control" type="email" name="email" placeholder="<?php echo $email?>" readonly>
								</fieldset>
								<fieldset class="form-group">   
									Employee ID<input class="form-control" type="email" name="email" placeholder="<?php echo $screenerID?>" readonly>
								</fieldset>
								<fieldset class="form-group">
									<button type="button" class="btn btn-primary" style="padding: 5px 18px 5px 18px; margin: 5px 0 5px 0;"><a href="auth/change_password" style="color: white">Change Password</a></button>
								</fieldset>	
							</div>

							<div class="border border-primary col-sm-6">
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
							</div>


						</tbody>
					</div>
				</div>
			</div>	
		</div>

		<div class="row">
			<div class="col-md-4 col-sm-3">
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
				</div>
			</div>
		</div>

    </div>
</div>
<!-- Profile End -->

<style>
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
	width: 250px; 
	height: 250px; 
	font-size: 46px;
	align-items: center;
	justify-content: center;
}

.border-line {
  border-right: 1px solid #000;
}

.scroll {
	overflow: scroll;
	height: 250px;
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