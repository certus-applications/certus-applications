  
<!-- Admin: View Requests -->
<?php if($this->ion_auth->in_group("hostpial admin") || $this->ion_auth->is_admin()): ?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                <h2>MGH <small>Screener Requests</small></h2>
                <div class="clearfix"></div>
                </div>

                
                <div class="x_content">
                <h3>Emergency Time-Off Requests</h3>
                <div class="col-xs-12 table-responsive">
                    <table class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of submission</th>
                        <th>Date of time-off</th>
                        <th>Reason for time-off</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            
                            foreach($avail as $availability) {
                                $split_up = explode(',', str_replace(array('[', ']','"'), '', $availability['timeoff_shift']) );                     
                        ?>
                        <?php if($availability['approved']==TRUE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Emergency Time-Off')) { ?>
                            <tr style=" background-color: rgba(177, 210, 53, 0.3); color: black;">
                                <td><?php echo $availability['first_name'];?></td>
                                <td><?php echo $availability['last_name'];?></td>
                                <td><?php echo date("l M jS", strtotime($availability['timestamp'])); ?></td>
                                <td>
                                    <?php 
                                        $comma_sep = array();
                                        for ($i = 0; $i < sizeof($split_up); $i++) {
                                            $timed = strtotime($split_up[$i]);
                                            $format = date('l - M jS', $timed);
                                            echo $format.'<br>';
                                        }
                                    ?>
                                </td>                            
                                <td><?php echo $availability['reason'];?></td>
                                <td><a class="btn btn-success btn-xs" readonly> Approved </a></td>
                            </tr>
                        <?php } elseif($availability['approved']==FALSE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Emergency Time-Off')) { ?>
                            <tr style="background-color: rgba(216, 83, 79, 0.3); color: black;">
                                <td><?php echo $availability['first_name'];?></td>
                                <td><?php echo $availability['last_name'];?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                                <td>
                                    <?php 
                                        $comma_sep = array();
                                        for ($i = 0; $i < sizeof($split_up); $i++) {
                                            $timed = strtotime($split_up[$i]);
                                            $format = date('l - M jS', $timed);
                                            echo $format.'<br>';
                                        }
                                    ?>
                                </td>                            
                                <td><?php echo $availability['reason'];?></td>
                                <td><a class="btn btn-danger btn-xs" readonly> Declined </a></td>
                            </tr>
                        <?php } elseif ($availability['timeoff_type']=='Emergency Time-Off') { ?>
                            <tr style="background-color: none;">
                                <td><?php echo $availability['first_name'];?></td>
                                <td><?php echo $availability['last_name'];?></td>

                                <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                                <?php echo form_open('request/update'); ?>
                                <td>
                                    <?php 
                                        $compare = array();
                                        $comma = array();
                                        for ($i = 0; $i < sizeof($split_up); $i++) {
                                            $timed = strtotime($split_up[$i]);
                                            $format = date('l - M jS', $timed);


                                            $datetime = new DateTime($split_up[$i]);
                                            $compare = $datetime->format('Y-m-d H:i:s');
                                    ?>  
                                    <input type="hidden" class="form-control" id="timeoff_date" name="timeoff_date[]" value="<?php echo $compare; ?>" >
                                    <?php echo $format.'<br>'; } ?>
                                </td>                            
                                <td><?php echo $availability['reason'];?></td>
                                <td>
                                        <input type="submit" class="btn btn-danger btn-xs"  name="choice" value="Decline"></button>
                                        <input type="submit" class="btn btn-success btn-xs" name="choice" value="Approve"></button>
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $availability['id']; ?>">
                                        <input type="hidden" class="form-control" id="firstname" name="firstname" value="<?php echo $availability['first_name']; ?>">
                                        <input type="hidden" class="form-control" id="lastname" name="lastname" value="<?php echo $availability['last_name']; ?>">
                                    <?php echo form_close(); ?>
                                </td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                    </table>
                </div>
                </div>

                <div class="x_content">
                <h3>Shift Change Requests</h3>
                <div class="col-xs-12 table-responsive">
                    <table class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date of submission</th>
                        <th>Current Availability</th>
                        <th>Requested Availability</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($avail as $availability) {
                                $date_req = explode(',', str_replace(array('[', ']'), '', $availability['updated_start_req']) );  
                        ?>
                        <?php if($availability['approved']==TRUE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Request Shift Change')) { ?>
                            <tr style=" background-color: rgba(177, 210, 53, 0.3); color: black;">
                                <td><?php echo $availability['first_name'];?></td>
                                <td><?php echo $availability['last_name'];?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                                <td>
                                    <?php 
                                        $day = date('w'); 
                                        $week_start = date('Y-m-d H:i:s', strtotime('-'.$day.' days'));
                                        $week_end = date('Y-m-d H:i:s', strtotime('+'.(13-$day).' days'));
                                        foreach($screenerAvail as $view) {
                                            $time = date('Y-m-d', strtotime($view['start']));
                                            
                                            if(($availability['first_name'] == $view['first_name']) && ($availability['last_name'] == $view['last_name'])) {
                                                if (($view['start'] >= $week_start) && ($view['start'] <= $week_end)) {
                                                    if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'05:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'13:00:00')))) {
                                                        echo date("l M jS", strtotime($view['start'])).' - Morn'.'<br>';
                                                    }
                                                    if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'13:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'21:00:00')))) {
                                                        echo date("l M jS", strtotime($view['start'])).' - Eve'.'<br>';
                                                    }
                                                    if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'23:00:00')))) {
                                                        echo date("l M jS", strtotime($view['start'])).' - Night'.'<br>';
                                                    }
                                                }
                                            }
                                        }    
                                    ?>
                                </td> 
                                <td>
                                    <?php 
                                        for ($i = 0; $i < sizeof($date_req); $i++) {
                                            echo $date_req[$i].'<br>';
                                        }
                                    ?>
                                </td> 
                                <td><a class="btn btn-success btn-xs" readonly> Approved </a></td>
                            </tr>
                        <?php } elseif($availability['approved']==FALSE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Request Shift Change')) { ?>
                            <tr style="background-color: rgba(216, 83, 79, 0.3); color: black;">
                                <td><?php echo $availability['first_name'];?></td>
                                <td><?php echo $availability['last_name'];?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                                <td>
                                    <?php 
                                        $day = date('w'); 
                                        $week_start = date('Y-m-d H:i:s', strtotime('-'.$day.' days'));
                                        $week_end = date('Y-m-d H:i:s', strtotime('+'.(13-$day).' days'));
                                        foreach($screenerAvail as $view) {
                                            $time = date('Y-m-d', strtotime($view['start']));
                                            
                                            if(($availability['first_name'] == $view['first_name']) && ($availability['last_name'] == $view['last_name'])) {
                                                if (($view['start'] >= $week_start) && ($view['start'] <= $week_end)) {
                                                    if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'05:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'13:00:00')))) {
                                                        echo date("l M jS", strtotime($view['start'])).' - Morn'.'<br>';
                                                    }
                                                    if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'13:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'21:00:00')))) {
                                                        echo date("l M jS", strtotime($view['start'])).' - Eve'.'<br>';
                                                    }
                                                    if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'23:00:00')))) {
                                                        echo date("l M jS", strtotime($view['start'])).' - Night'.'<br>';
                                                    }
                                                }
                                            }
                                        }    
                                    ?>
                                </td> 
                                <td>
                                    <?php 
                                        for ($i = 0; $i < sizeof($date_req); $i++) {
                                            echo $date_req[$i].'<br>';
                                        }
                                    ?>
                                </td>                        
                                <td><a class="btn btn-danger btn-xs" readonly> Declined </a></td>
                            </tr>
                        <?php } elseif ($availability['timeoff_type']=='Request Shift Change') { ?>
                            <tr style="background-color: none;">
                                <td><?php echo $availability['first_name'];?></td>                                  
                                <td><?php echo $availability['last_name'];?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                                <td>
                                    <?php 
                                        $day = date('w'); 
                                        $week_start = date('Y-m-d H:i:s', strtotime('-'.$day.' days'));
                                        $week_end = date('Y-m-d H:i:s', strtotime('+'.(13-$day).' days'));
                                        foreach($screenerAvail as $view) {
                                            $time = date('Y-m-d', strtotime($view['start']));
                                            
                                            if(($availability['first_name'] == $view['first_name']) && ($availability['last_name'] == $view['last_name'])) {
                                                if (($view['start'] >= $week_start) && ($view['start'] <= $week_end)) {
                                                    if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'05:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'13:00:00')))) {
                                                        echo date("l M jS", strtotime($view['start'])).' - Morn'.'<br>';
                                                    }
                                                    if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'13:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'21:00:00')))) {
                                                        echo date("l M jS", strtotime($view['start'])).' - Eve'.'<br>';
                                                    }
                                                    if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'23:00:00')))) {
                                                        echo date("l M jS", strtotime($view['start'])).' - Night'.'<br>';
                                                    }
                                                }
                                            }
                                        }                             
                                    ?>
                                </td> 
                                <td>
                                    <?php 
                                        for ($i = 0; $i < sizeof($date_req); $i++) {
                                            echo $date_req[$i].'<br>';
                                        }
                                    ?>
                                </td>                          
                                <td>
                                    <?php echo form_open('request/update'); ?>
                                        <input type="submit" class="btn btn-danger btn-xs"  name="choice" value="Decline"></button>
                                        <input type="submit" class="btn btn-success btn-xs" name="choice" value="Approve"></button>
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $availability['id']; ?>">
                                        <input type="hidden" class="form-control" id="firstname" name="firstname" value="<?php echo $availability['first_name']; ?>">
                                        <input type="hidden" class="form-control" id="lastname" name="lastname" value="<?php echo $availability['last_name']; ?>">
                                    <?php echo form_close(); ?>
                                </td>
                            </tr>
                        <?php } } ?>
                        
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
<?php endif ?>

<!-- Screener: View Requests -->       
<?php if($this->ion_auth->in_group("screener")): ?>
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                    <h2>Your Requests</h2>                          
                        <button type="button" class="btn btn-success pull-right" style="padding: 5px 18px 5px 18px; margin: 5px 0 5px 5px;"><a href="request" style="color: white">New Request</a></button>
                    <div class="clearfix"></div>

                        <div class="x_content">
                            <h3>Emergency Time-Off Requests</h3>

                            <div class="col-xs-12 table-responsive">
                                <table class="display table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Date of submission</th>
                                        <th>Date of time-off</th>
                                        <th>Reason for time-off</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach($viewReq as $availability) {
                                            $split_up = explode(',', str_replace(array('[', ']','"'), '', $availability['timeoff_shift']) ); 
                                    ?>
                                    <?php if(($availability['approved']==TRUE) && ($availability['approved']!=NULL) && ($availability['timeoff_type']=='Emergency Time-Off')) { ?>
                                        <tr style=" background-color: rgba(177, 210, 53, 0.3); color: black;">
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td>
                                                <?php 
                                                    for ($i = 0; $i < sizeof($split_up); $i++) {
                                                        $timed = strtotime($split_up[$i]);
                                                        $format = date('l - M jS', $timed);
                                                        echo $format.'<br>';
                                                    }
                                                ?>
                                            </td>                                            
                                            <td><?php echo $availability['reason'];?></td>
                                            <td><a class="btn btn-success btn-xs" readonly> Approved </a></td>
                                        </tr>
                                    <?php } elseif(($availability['approved']==FALSE) && ($availability['approved']!=NULL) && ($availability['timeoff_type']=='Emergency Time-Off')) { ?>
                                        <tr style="background-color: rgba(216, 83, 79, 0.3); color: black;">
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td>
                                                <?php 
                                                    for ($i = 0; $i < sizeof($split_up); $i++) {
                                                        $timed = strtotime($split_up[$i]);
                                                        $format = date('l - M jS', $timed);
                                                        echo $format.'<br>';
                                                    }
                                                ?>
                                            </td>                                            
                                            <td><?php echo $availability['reason'];?></td>
                                            <td><a class="btn btn-danger btn-xs"  readonly> Declined </a></td>
                                        </tr>
                                    <?php } elseif ($availability['timeoff_type']=='Emergency Time-Off') { ?>
                                        <tr>
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td>
                                                <?php 
                                                    for ($i = 0; $i < sizeof($split_up); $i++) {
                                                        $timed = strtotime($split_up[$i]);
                                                        $format = date('l - M jS', $timed);
                                                        echo $format.'<br>';
                                                    }
                                                ?>
                                            </td>                                           
                                            <td><?php echo $availability['reason'];?></td>
                                            <td> <b>Pending</b> </td>
                                        </tr>

                                    <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="x_content">
                            <h3>Shift Change Request</h3>
                            <div class="col-xs-12 table-responsive">
                                <table class="display table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Date of submission</th>
                                        <th>Current Availability</th>
                                        <th>Requested Availability</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        foreach($viewReq as $availability) {
                                            $date_req = explode(',', str_replace(array('[', ']'), '', $availability['updated_start_req']) );                  
                                    ?>
                                    <?php if($availability['approved']==TRUE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Request Shift Change')) { ?>
                                        <tr style=" background-color: rgba(177, 210, 53, 0.3); color: black;">
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td>
                                            <?php 
                                                $day = date('w'); 
                                                $week_start = date('Y-m-d H:i:s', strtotime('-'.$day.' days'));
                                                $week_end = date('Y-m-d H:i:s', strtotime('+'.(13-$day).' days'));
                                                foreach($screenerAvail as $view) {
                                                    $time = date('Y-m-d', strtotime($view['start']));
                                                    
                                                    if(($availability['first_name'] == $view['first_name']) && ($availability['last_name'] == $view['last_name'])) {
                                                        if (($view['start'] >= $week_start) && ($view['start'] <= $week_end)) {
                                                            if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'05:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'13:00:00')))) {
                                                                echo date("l M jS", strtotime($view['start'])).' - Morn'.'<br>';
                                                            }
                                                            if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'13:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'21:00:00')))) {
                                                                echo date("l M jS", strtotime($view['start'])).' - Eve'.'<br>';
                                                            }
                                                            if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'23:00:00')))) {
                                                                echo date("l M jS", strtotime($view['start'])).' - Night'.'<br>';
                                                            }
                                                        }
                                                    }
                                                }    
                                            ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    for ($i = 0; $i < sizeof($date_req); $i++) {
                                                        echo $date_req[$i].'<br>';
                                                    }
                                                ?>
                                            </td>                                            
                                            <td><a class="btn btn-success btn-xs" readonly> Approved </a></td>
                                        </tr>
                                    <?php } elseif($availability['approved']==FALSE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Request Shift Change')) { ?>
                                        <tr style="background-color: rgba(216, 83, 79, 0.3); color: black;">
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td>
                                                <?php 
                                                    $day = date('w'); 
                                                    $week_start = date('Y-m-d H:i:s', strtotime('-'.$day.' days'));
                                                    $week_end = date('Y-m-d H:i:s', strtotime('+'.(13-$day).' days'));
                                                    foreach($screenerAvail as $view) {
                                                        $time = date('Y-m-d', strtotime($view['start']));
                                                        
                                                        if(($availability['first_name'] == $view['first_name']) && ($availability['last_name'] == $view['last_name'])) {
                                                            if (($view['start'] >= $week_start) && ($view['start'] <= $week_end)) {
                                                                if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'05:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'13:00:00')))) {
                                                                    echo date("l M jS", strtotime($view['start'])).' - Morn'.'<br>';
                                                                }
                                                                if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'13:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'21:00:00')))) {
                                                                    echo date("l M jS", strtotime($view['start'])).' - Eve'.'<br>';
                                                                }
                                                                if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'23:00:00')))) {
                                                                    echo date("l M jS", strtotime($view['start'])).' - Night'.'<br>';
                                                                }
                                                            }
                                                        }
                                                    }    
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    for ($i = 0; $i < sizeof($date_req); $i++) {
                                                        echo $date_req[$i].'<br>';
                                                    }
                                                ?>
                                            </td>                                            
                                            <td><a class="btn btn-danger btn-xs" readonly> Declined </a></td>
                                        </tr>
                                    <?php } elseif ($availability['timeoff_type']=='Request Shift Change') { ?>
                                        <tr>
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td>
                                            <?php 
                                                $day = date('w'); 
                                                $week_start = date('Y-m-d H:i:s', strtotime('-'.$day.' days'));
                                                $week_end = date('Y-m-d H:i:s', strtotime('+'.(13-$day).' days'));
                                                foreach($screenerAvail as $view) {
                                                    $time = date('Y-m-d', strtotime($view['start']));
                                                    
                                                    if(($availability['first_name'] == $view['first_name']) && ($availability['last_name'] == $view['last_name'])) {
                                                        if (($view['start'] >= $week_start) && ($view['start'] <= $week_end)) {
                                                            if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'05:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'13:00:00')))) {
                                                                echo date("l M jS", strtotime($view['start'])).' - Morn'.'<br>';
                                                            }
                                                            if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'13:00:00'))) && ($view['start'] < date('Y-m-d H:i:s', strtotime($time.'21:00:00')))) {
                                                                echo date("l M jS", strtotime($view['start'])).' - Eve'.'<br>';
                                                            }
                                                            if(($view['start'] >= date('Y-m-d H:i:s', strtotime($time.'23:00:00')))) {
                                                                echo date("l M jS", strtotime($view['start'])).' - Night'.'<br>';
                                                            }
                                                        }
                                                    }
                                                }    
                                            ?>
                                            </td> 
                                            <td>
                                                <?php 
                                                    for ($i = 0; $i < sizeof($date_req); $i++) {
                                                        echo $date_req[$i].'<br>';
                                                    }
                                                ?>
                                            </td>                                            
                                            <td> <b>Pending</b> </td>
                                        </tr>

                                    <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php endif ?>



</body>

<script type="text/javascript">
  function notifyUser(message) {
    if(message == "approved") {
      new PNotify({
        title: 'Screener Approved!',
        text: "You have successfully approved the screener's request!",
        type: 'success',
        styling: 'bootstrap3',
        delay: 2000
      });
    } else if (message == "declined"){
      new PNotify({
        title: 'Screener Denied!',
        text: "You have successfully denied the screener's request!",
        type: 'success',
        styling: 'bootstrap3',
        delay: 2000
      });
    }
  }

  $(document).ready(function() {
    $('table.display').DataTable();
  });

</script>
