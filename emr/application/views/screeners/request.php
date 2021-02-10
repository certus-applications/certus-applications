<!-- page content -->
<div class="right_col" role="main">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">		
            
            <div class="x_panel">
                <div class="x_title">
                    <h2>Emergency Shift Change</h2>
                    <div class="clearfix"></div>
                </div>
                
                <?php echo form_open('request/addRequest'); ?>
                    <fieldset>
                        <legend for="919003939">Type of time-off requested</legend>
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
                        <tbody>
                            <div class="col-sm-6">
                                <fieldset class="form-group">
                                    Start Date<input id="start_date" class="form-control" type="date" name="start_date" placeholder="" value="date" required>
                                </fieldset>
                            </div>

                            <div class="col-sm-6">
                                <fieldset class="form-group">
                                    End Date<input id="end_date" class="form-control" type="date" name="end_date" placeholder="" value="date" required>
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
                                    <button type="button" class="btn btn-danger" style="padding: 5px 18px 5px 18px; margin: 5px 0 5px 5px;"><a href="main/index" style="color: white">Back</a></button>
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

                <script type="text/javascript">
                    var tomorrow = new Date();
                    tomorrow.setDate(new Date().getDate()+1);
                    document.getElementById("start_date").valueAsDate = new Date();
                    document.getElementById("end_date").valueAsDate = tomorrow;
                    
                    function show() { document.getElementById('other-text').style.display = 'block'; }
                    function hide() { document.getElementById('other-text').style.display = 'none'; }
                    
                </script>
            </div>
        </div>
    </div>
</div>