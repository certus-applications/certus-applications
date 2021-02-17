<!-- page content -->
<div class="right_col" role="main">
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">     
            
            <div class="x_panel">
                <div class="x_title">
                    <h2>Emergency Time-Off/Update a Shift</h2>
                    <div class="clearfix"></div>
                </div>

                    <input type="button" class="btn btn-primary" value="Emergency Time Off" onclick="showTimeOff('timeoff')"></button>

                    <?php
                    foreach($screenerSche as $view) {
                        $day = date('w'); 
                        $week_2start = date('m/j/Y', strtotime('+'.(7-$day).' days'));
                        $week_2end = date('m/j/Y', strtotime('+'.(13-$day).' days'));

                        $time_in = date('m/j/Y', strtotime($view['start']));

                        if ( !($time_in >= $week_2start) || !($time_in <= $week_2end)) {
                    ?>
                    <?php } else { ?>
                        <input type="button" class="btn btn-primary" value="Request Shift Change" onclick="changeShift('changeshift')"></button>
                    <?php break; } } ?>
                    
                    <div id="timeoff" style="display: none">
                        <?php echo form_open('request/add'); ?>
                            <input type="hidden" class="form-control" name="timeoffType" value="Emergency Time Off">
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
                    </div>

                    <div id="changeshift" style="display: none">
                        <?php echo form_open('request/add'); ?>
                            <input type="hidden" class="form-control" name="timeoffType" value="Request Shift Change">
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
                                <h3> Which day do you want to reschedule for? </h3>
                                <div class="col-sm-6">
                                    <table class="table table-striped table-bordered">
                                        <?php 
                                            foreach($screenerSche as $view) {
                                                $day = date('w'); 
                                                $week_2start = date('m/j/Y', strtotime('+'.(7-$day).' days'));
                                                $week_2end = date('m/j/Y', strtotime('+'.(13-$day).' days'));

                                                $time_in = date('m/j/Y', strtotime($view['start']));

                                                if (($time_in >= $week_2start) && ($time_in <= $week_2end)) {
                                            
                                        ?>
                                        
                                            <tbody>
                                                <tr>
                                                    <td><input type="radio" name="update_time" value=<?php echo json_encode($view['start']); ?>> <?php echo date('M jS, Y h:i:sa', strtotime($view['start'])); ?></td>
                                                </tr>
                                            </tbody>
                                        <?php } } ?>
                                    
                                    </table>
                                </div>
                                
                                <div class="col-sm-6">
                                    <tbody>
                                        <fieldset class="form-group">
                                            Start Date<input id="start_date" class="form-control" type="date" name="start_date" value="date" required>
                                        </fieldset>
                                    </tbody>
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

