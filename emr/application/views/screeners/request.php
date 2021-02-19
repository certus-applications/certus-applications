<!-- page content -->
<div class="right_col" role="main">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">     
            
            <div class="x_panel">
                <div class="x_title">
                    <h2>New Request</h2>
                    <div class="clearfix"></div>
                </div>
                    
                    <div class="accordion col-xs-6" id="accordion" role="tablist">
                        <div class="panel">
                            <a class="panel-heading" role="tab" id="timeOffReq" data-toggle="collapse" data-parent="#accordion" href="#timeoff" aria-expanded="false" aria-controls="timeoff">
                                <h4 class="panel-title" style="color: #73879C">Time-Off</h4>
                            </a>
                            <div id="timeoff" class="panel-collapse collapse" role="tabpanel" aria-labelledby="timeOffReq">
                                <div class="col-xs-6">
                                    <?php echo form_open('request/add'); ?>
                                    <input type="hidden" class="form-control" name="timeoffType" value="Emergency Time Off">
                                    <fieldset>
                                        <div class="form-group">

                                            <div>
                                                <input type="radio" id="f-option" name="timeoff_type" onclick="hide();" value="Sick Leave"> 
                                                <label for="f-option">Sick Leave</label>
                                                
                                                <div class="check"></div>
                                            </div>
                                            
                                            <div>
                                                <input type="radio" id="s-option" name="timeoff_type" onclick="hide();" value="Jury Duty">
                                                <label for="s-option">Jury Duty</label>
                                                
                                                <div class="check"><div class="inside"></div></div>
                                            </div>

                                            <div>
                                                <input type="radio" id="s-option" name="timeoff_type" onclick="hide();" value="Breavement">
                                                <label for="s-option">Breavement</label>
                                                
                                                <div class="check"><div class="inside"></div></div>
                                            </div>

                                            <div>
                                                <input type="radio" id="s-option" name="timeoff_type" onclick="hide();" value="Vacation">
                                                <label for="s-option">Vacation</label>
                                                
                                                <div class="check"><div class="inside"></div></div>
                                            </div>
                                            
                                            <div>
                                                <input type="radio" id="choice-others-click" name="timeoff_type" onclick="show();" value="Other:">
                                                <label for="choice-others-click">Other</label>

                                                <label for="other-text" id="text-title" style="display: none">Please explain.</label>

                                                <div class="check"><div class="inside"></div></div>
                                            </div>

                                            <div>
                                            <TEXTAREA type="text" id="other-text" name="other-text" style="display:none"></TEXTAREA>
                                            </div>


                                        </div>
                                    </fieldset>
                                    
                                    <div class="x_content">
                                        <h3> Which day(s) are you requesting off? </h3>                                
                                        <div class="col-sm-12">
                                            <tbody>
                                                <fieldset class="form-group">
                                                    Start Date<input id="start_date" class="form-control" type="date" name="start_date" value="date" required>
                                                </fieldset>
                                            </tbody>
                                            <tbody>
                                                <fieldset class="form-group">
                                                    End Date<input id="end_date" class="form-control" type="date" name="end_date" value="date" required>
                                                </fieldset>
                                            </tbody>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion col-xs-6" id="accordion" role="tablist">
                        <div class="panel">
                            <a class="panel-heading" role="tab" id="shiftReq" data-toggle="collapse" data-parent="#accordion" href="#shift" aria-expanded="false" aria-controls="shift">
                                <h4 class="panel-title" style="color: #73879C">Shift-Update</h4>
                            </a>
                            <div id="shift" class="panel-collapse collapse" role="tabpanel" aria-labelledby="shiftReq">
                                    <?php echo form_open('request/add'); ?>
                                        <input type="hidden" class="form-control" name="timeoffType" value="Request Shift Change">
                                        <div class="x_content">
                                            <h3> Which day do you want to reschedule for? </h3>
                                            <table class="table table-hover table-striped table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th class='th_center' scope="col">
                                                            Days of the week.
                                                        </th>
                                                        <th class='th_center' scope="col">Morning <br>(5:00am - 12:00pm)</th>
                                                        <th class='th_center' scope="col">Evening <br>(1:00pm - 9:00pm)</th>
                                                        <th class='th_center' scope="col">Night <br>(11:00pm - 4:00am)</th>
                                                    </tr>
                                                    
                                                    <?php for($i = 0;  $i < 7; $i++) { echo "<tr>"; ?>
                                                        <th class='th_center' scope="col">
                                                            <?php echo date('l', strtotime($datesArr[$i])); ?>
                                                        </th>
                                                        <td id="morn"><input type="checkbox" name="morn_times[]" value=""></td>
                                                        <td id="eve"><input type="checkbox" name="eve_times[]" value=""></td>
                                                        <td id="night"><input type="checkbox" name="night_times[]" value=""></td>
                                                    <?php echo "</tr>"; } ?>
                                                </thead>
                                            </table>                             
                                        </div>
                            </div>
                        </div>
                    </div>

                    <div class="x_content">
                            <div class="x_title">
                                <div class="clearfix"></div>
                            </div>  
                            <div class="col-xs-6">
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <button type="button" class="btn btn-danger" style="padding: 5px 18px 5px 18px; margin: 5px 0 5px 5px;"><a href="main/index" style="color: white">Back</a></button>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-6">
                                <ul class="nav navbar-left panel_toolbox">      
                                    <li><button type="submit" class="btn btn-success" style="padding: 5px 11px 5px 11px; margin: 5px 5px 5px 0;">Submit</button></li>
                                </ul>
                            </div>      
                            <?php echo form_close(); ?>    
                    </div>

                <script type="text/javascript">
                    var tomorrow = new Date();
                    tomorrow.setDate(new Date().getDate()+1);
                    document.getElementById("start_date").valueAsDate = new Date();
                    document.getElementById("end_date").valueAsDate = tomorrow;

                    var showTimeOff = function(id){
                        document.getElementById(id).style.display = '';
                        document.getElementById('changeshift').style.display = 'none';
                    }

                    var changeShift = function(id){
                        document.getElementById(id).style.display = '';
                        document.getElementById('timeoff').style.display = 'none';
                    }
                    
                    function show() { document.getElementById('other-text').style.display = 'block'; }
                    function hide() { document.getElementById('other-text').style.display = 'none'; }
                    
                </script>
            </div>
        </div>
    </div>
</div>

