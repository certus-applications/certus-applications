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
							<h3>Select the days you're available for: <a id="current-date"></a> to <a id="twoweeks-date"></a></h3>
							<div class="form-row">
								
							<fieldset id='week1'>
									<input type="radio" value="mon" name="monday" style="margin: 0 10px 0 10px;"><label for="mon">Monday</label>
   									<input type="radio" value="tues" name="tuesday" style="margin: 0 10px 0 10px;"><label for="tues">Tuesday</label>
									<input type="radio" value="wed" name="wednesday" style="margin: 0 10px 0 10px;"><label for="wed">Wednesday</label>	
   									<input type="radio" value="thurs" name="thursday" style="margin: 0 10px 0 10px;"><label for="thurs">Thursday</label>
									<input type="radio" value="fri" name="friday"><label for="fri" style="margin: 0 10px 0 10px;">Friday</label>
   									<input type="radio" value="sat" name="saturday" style="margin: 0 10px 0 10px;"><label for="sat">Saturday</label>
									<input type="radio" value="sun" name="sunday" style="margin: 0 10px 0 10px;"><label for="sun">Sunday</label>
								</fieldset>

								<fieldset id='week2'>
									<input type="radio" value="mon2" name="monday" style="margin: 0 10px 0 10px;"><label for="mon2">Monday</label>
   									<input type="radio" value="tues2" name="tuesday" style="margin: 0 10px 0 10px;"><label for="tues2">Tuesday</label>
									<input type="radio" value="wed2" name="wednesday" style="margin: 0 10px 0 10px;"><label for="wed2">Wednesday</label>	
   									<input type="radio" value="thurs2" name="thursday" style="margin: 0 10px 0 10px;"><label for="thurs2">Thursday</label>
									<input type="radio" value="fri2" name="friday" style="margin: 0 10px 0 10px;"><label for="fri2">Friday</label>
   									<input type="radio" value="sat2" name="saturday" style="margin: 0 10px 0 10px;"><label for="sat2">Saturday</label>
									<input type="radio" value="sun2" name="sunday" style="margin: 0 10px 0 10px;"><label for="sun2">Sunday</label>
								</fieldset>

							</div>
							<br><br>

							<script text="javascript">
								let n = new Date();
								let y = n.getFullYear();
								let m = n.getMonth() + 1;
								let d = n.getDate();

								let two_n = new Date(Date.now() + 12096e5);
								let two_y = two_n.getFullYear();
								let two_m = two_n.getMonth() + 1;
								let two_d = two_n.getDate();

								document.getElementById("current-date").innerHTML = m + "/" + d + "/" + y;
								document.getElementById("twoweeks-date").innerHTML = two_m + "/" + two_d + "/" + two_y;
							</script>
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