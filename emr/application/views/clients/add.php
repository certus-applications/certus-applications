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

							
							</br><br>
							<h3>Select the days you're available for</h3>
							<div class="form-row">
								<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
									<div class="btn-group" role="group">
										<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Monday
										</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
										<label for="start-time">Start Time: </label>
										<input id="start-time" type="time" name="appt-time" value="13:30">

										<label for="end-time">End Time: </label>
										<input id="end-time" type="time" name="appt-time" value="13:30">
										</div>
									</div>

									<div class="btn-group" role="group">
										<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Tuesday
										</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
										<label for="start-time">Start Time: </label>
										<input id="start-time" type="time" name="appt-time" value="13:30">

										<label for="end-time">End Time: </label>
										<input id="end-time" type="time" name="appt-time" value="13:30">
										</div>
									</div>

									<div class="btn-group" role="group">
										<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Wednesday
										</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
										<label for="start-time">Start Time: </label>
										<input id="start-time" type="time" name="appt-time" value="13:30">

										<label for="end-time">End Time: </label>
										<input id="end-time" type="time" name="appt-time" value="13:30">
										</div>
									</div>

									<div class="btn-group" role="group">
										<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Thursday
										</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
										<label for="start-time">Start Time: </label>
										<input id="start-time" type="time" name="appt-time" value="13:30">

										<label for="end-time">End Time: </label>
										<input id="end-time" type="time" name="appt-time" value="13:30">
										</div>
									</div>

									<div class="btn-group" role="group">
										<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Friday
										</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
										<label for="start-time">Start Time: </label>
										<input id="start-time" type="time" name="appt-time" value="13:30">

										<label for="end-time">End Time: </label>
										<input id="end-time" type="time" name="appt-time" value="13:30">
										</div>
									</div>

									<div class="btn-group" role="group">
										<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Saturday
										</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
										<label for="start-time">Start Time: </label>
										<input id="start-time" type="time" name="appt-time" value="13:30">

										<label for="end-time">End Time: </label>
										<input id="end-time" type="time" name="appt-time" value="13:30">
										</div>
									</div> 

									<div class="btn-group" role="group">
										<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Sunday
										</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
											<label for="start-time">Start Time: </label>
											<input id="start-time" type="time" name="appt-time" value="13:30">

											<label for="end-time">End Time: </label>
											<input id="end-time" type="time" name="appt-time" value="13:30">
										</div>
									</div>
								</div>
							</div>
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