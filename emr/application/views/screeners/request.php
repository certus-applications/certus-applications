<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <style>
            #reveal-if-active {
            opacity: 1;
            max-height: 100px;
            padding: 5px 20px;
            transform: scale(1);
            overflow: visible;
                
            label {
                display: block;
                margin: 0 0 3px 0;
            }
            input[type=text] {
                width: 100%;
            }

            
            }
        </style>
        <div class="col-md-12 col-sm-12 col-xs-12">		
            
            <div class="x_panel">
                <div class="x_title">
                    <h2>Emergency Shift Change</h2>
                    <div class="clearfix"></div>
                </div>
                
                <form>
                    <fieldset>
                        <legend for="919003939">Type of time-off requested</legend>
                        <div class="form-group">

                            <div>
                                <input type="radio" id="f-option" name="selector">
                                <label for="f-option">Sick Leave</label>
                                
                                <div class="check"></div>
                             </div>
                            
                            <div>
                                <input type="radio" id="s-option" name="selector">
                                <label for="s-option">Jury Duty</label>
                                
                                <div class="check"><div class="inside"></div></div>
                             </div>

                            <div>
                                <input type="radio" id="s-option" name="selector">
                                <label for="s-option">Breavement</label>
                                
                                <div class="check"><div class="inside"></div></div>
                            </div>

                            <div>
                                <input type="radio" id="s-option" name="selector">
                                <label for="s-option">Vacation</label>
                                
                                <div class="check"><div class="inside"></div></div>
                            </div>
                            
                            <div>
                                <input type="radio" name="other-click" id="choice-others-click">
                                <label for="choice-others-click">Other</label>
                                
                                <div id="reveal-if-active">
                                    <label for="other-text">Please explain.</label>
                                    <input type="text" id="other-text" name="other-text" class="require-if-active" data-require-pair="#choice-others-click">
                                </div>

                                <div class="check"><div class="inside"></div></div>
                            </div>


                        </div>
                    </fieldset>
                    

                    <div class="x_content">
                        <tbody>
                            <div class="col-sm-6">
                                <fieldset class="form-group">
                                    Start Date<input id="start_date" class="form-control" type="date" name="start_date" placeholder="" required>
                                </fieldset>
                            </div>

                            <div class="col-sm-6">
                                <fieldset class="form-group">
                                    End Date<input id="end_date" class="form-control" type="date" name="end_date" placeholder="" required>
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
                </form>

                <script type="text/javascript">
                    var tomorrow = new Date();
                    tomorrow.setDate(new Date().getDate()+1);
                    document.getElementById("start_date").valueAsDate = new Date();
                    document.getElementById("end_date").valueAsDate = tomorrow;

                    var FormStuff = {
  
                        init: function() {
                            this.applyConditionalRequired();
                            this.bindUIActions();
                        },
                        
                        bindUIActions: function() {
                            $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
                        },
                        
                        applyConditionalRequired: function() {
                            
                            $("#require-if-active").each(function() {
                            var el = $(this);
                            if ($(el.data("require-pair")).is(":checked")) {
                                el.prop("required", true);
                            } else {
                                el.prop("required", false);
                            }
                            });
                            
                        }
                        
                    };

                    FormStuff.init();
                </script>
            </div>
        </div>
    </div>
</div>