  
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
                <h3>Emergency Time Off Requests</h3>
                <div class="col-xs-12 table-responsive">
                    <table class="display table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Employee ID</th>
                        <th>Date of submission</th>
                        <th>Date of time-off</th>
                        <th>Reason for time-off</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($avail as $availability) {
                                // $time[] = $availability['timeoff_shift'];
                                $split_up = explode(',', str_replace(array('[', ']','"'), '', $availability['timeoff_shift']) );                        ?>
                        <?php if($availability['approved']==TRUE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Emergency Time Off')) { ?>
                            <tr style=" background-color: rgba(50, 205, 50, 0.3); color: black;">
                            <td><?php echo $availability['first_name'];?></td>
                            <td><?php echo $availability['last_name'];?></td>
                            <td><?php echo $availability['employeeid'];?></td>
                            <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                            <td>
                                <?php 
                                for ($i = 0; $i < sizeof($split_up); $i++) {
                                    $timed = strtotime($split_up[$i]);
                                    $format = date('M jS, Y', $timed);
                                    echo $format.', ';
                                }
                                
                                ?>
                            </td>                            
                            <td><?php echo $availability['reason'];?></td>
                            <td><a class="btn btn-danger btn-xs" style="background-color: #32CD32; border-color: #32CD32" readonly> Approved </a></td>
                            </tr>
                        <?php } elseif($availability['approved']==FALSE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Emergency Time Off')) { ?>
                            <tr style="background-color: rgba(128, 0, 0, 0.3); color: black;">
                            <td><?php echo $availability['first_name'];?></td>
                            <td><?php echo $availability['last_name'];?></td>
                            <td><?php echo $availability['employeeid'];?></td>
                            <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                            <td>
                                <?php 
                                for ($i = 0; $i < sizeof($split_up); $i++) {
                                    $timed = strtotime($split_up[$i]);
                                    $format = date('M jS, Y', $timed);
                                    echo $format.', ';
                                }
                                
                                ?>
                            </td>                            
                            <td><?php echo $availability['reason'];?></td>
                            <td><a class="btn btn-danger btn-xs" style="background-color: #800000; border-color: #800000;" readonly> Declined </a></td>
                            </tr>
                        <?php } elseif ($availability['timeoff_type']=='Emergency Time Off') { ?>
                            <tr style="background-color: none;">
                            <td><?php echo $availability['first_name'];?></td>
                            <td><?php echo $availability['last_name'];?></td>
                            <td>
                                <?php echo $availability['employeeid'];?>
                            </td>
                            <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                            <td>
                                <?php 
                                    $compare = array();
                                    for ($i = 0; $i < sizeof($split_up); $i++) {
                                        $timed = strtotime($split_up[$i]);
                                        $format = date('M jS, Y', $timed);

                                        $datetime = new DateTime($split_up[$i]);
                                        
                                        $compare = $datetime->format('Y-m-d H:i:s');

                                        // echo $format.', ';
                                    
                                ?>  
                                <input type="hidden" class="form-control" id="timeoff_date" name="timeoff_date" value="<?php echo $compare; ?>" >
                                <?php echo $compare; } ?>
                            </td>                            
                            <td><?php echo $availability['reason'];?></td>
                            <td>
                                <?php echo form_open('request/update'); ?>
                                    <input type="submit" class="btn btn-danger btn-xs"  style="background-color: #800000; border-color: #800000;" name="choice" value="Decline"></button>
                                    <input type="submit" class="btn btn-success btn-xs" style="background-color: #32CD32; border-color: #32CD32" name="choice" value="Approve"></button>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $availability['id']; ?>">
                                    <input type="hidden" class="form-control" id="employeeid" name="employeeid" value="<?php echo $availability['employeeid']; ?>">
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
                        <th>Employee ID</th>
                        <th>Date of submission</th>
                        <th>Requested Date(s) of Time Off</th>
                        <th>Requested Dates(s) for New Shift Update</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($avail as $availability) {?>
                        <?php if($availability['approved']==TRUE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Request Shift Change')) { ?>
                            <tr style=" background-color: rgba(50, 205, 50, 0.3); color: black;">
                            <td><?php echo $availability['first_name'];?></td>
                            <td><?php echo $availability['last_name'];?></td>
                            <td><?php echo $availability['employeeid'];?></td>
                            <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                            <td><b><?php echo $availability['timeoff_shift'];?></td> 
                            <td><b><?php echo $availability['updated_start_req'];?></td>
                            <td><a class="btn btn-danger btn-xs" style="background-color: #32CD32; border-color: #32CD32" readonly> Approved </a></td>
                            </tr>
                        <?php } elseif($availability['approved']==FALSE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Request Shift Change')) { ?>
                            <tr style="background-color: rgba(128, 0, 0, 0.3); color: black;">
                            <td><?php echo $availability['first_name'];?></td>
                            <td><?php echo $availability['last_name'];?></td>
                            <td><?php echo $availability['employeeid'];?></td>
                            <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                            <td><b><?php echo $availability['timeoff_shift'];?></td> 
                            <td><b><?php echo $availability['updated_start_req'];?></td>                         
                            <td><a class="btn btn-danger btn-xs" style="background-color: #800000; border-color: #800000;" readonly> Declined </a></td>
                            </tr>
                        <?php } elseif ($availability['timeoff_type']=='Request Shift Change') { ?>
                            <tr style="background-color: none;">
                            <td><?php echo $availability['first_name'];?></td>
                            <td><?php echo $availability['last_name'];?></td>
                            <td><?php echo $availability['employeeid'];?></td>
                            <td><?php echo date("M jS, Y", strtotime($availability['timestamp'])); ?></td>
                            <td><b><?php echo $availability['timeoff_shift'];?></td> 
                            <td><b><?php echo $availability['updated_start_req'];?></td>                          
                            <td>
                                <?php echo form_open('request/update'); ?>
                                <input type="submit" class="btn btn-danger btn-xs"  style="background-color: #800000; border-color: #800000;" name="choice" value="Decline"></button>
                                <input type="submit" class="btn btn-success btn-xs" style="background-color: #32CD32; border-color: #32CD32" name="choice" value="Approve"></button>
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $availability['id']; ?>">
                            </td>
                            </tr>
                        <?php } } ?>
                        <?php echo form_close(); ?>
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
                        <button type="button" class="btn btn-primary pull-right" style="padding: 5px 18px 5px 18px; margin: 5px 0 5px 5px;"><a href="request" style="color: white">New Request</a></button>
                    <div class="clearfix"></div>

                        <div class="x_content">
                            <h3>Emergency Time Off Requests</h3>

                            <div class="col-xs-12 table-responsive">
                                <table class="display table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Employee ID</th>
                                        <th>Date of submission</th>
                                        <th>Date of time-off</th>
                                        <th>Reason for time-off</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($viewReq as $availability) {?>
                                    <?php if(($availability['approved']==TRUE) && ($availability['approved']!=NULL) && ($availability['timeoff_type']=='Emergency Time Off')) { ?>
                                        <tr style=" background-color: rgba(50, 205, 50, 0.3); color: black;">
                                            <td><?php echo $availability['employeeid'];?></td>
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td><b><?php echo $availability['timeoff_shift'];?></td>                            
                                            <td><?php echo $availability['reason'];?></td>
                                            <td><a class="btn btn-danger btn-xs" style="background-color: #32CD32; border-color: #32CD32" readonly> Approved </a></td>
                                        </tr>
                                    <?php } elseif(($availability['approved']==FALSE) && ($availability['approved']!=NULL) && ($availability['timeoff_type']=='Emergency Time Off')) { ?>
                                        <tr style="background-color: rgba(128, 0, 0, 0.3); color: black;">
                                            <td><?php echo $availability['employeeid'];?></td>
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td><b><?php echo $availability['timeoff_shift'];?></td>                            
                                            <td><?php echo $availability['reason'];?></td>
                                            <td><a class="btn btn-danger btn-xs" style="background-color: #800000; border-color: #800000;" readonly> Declined </a></td>
                                        </tr>
                                    <?php } elseif ($availability['timeoff_type']=='Emergency Time Off') { ?>
                                        <tr>
                                            <td><?php echo $availability['employeeid'];?></td>
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td><b><?php echo $availability['timeoff_shift'];?></td>                            
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
                                        <th>Employee ID</th>
                                        <th>Date of submission</th>
                                        <th>Requested Date(s) of Time Off</th>
                                        <th>Requested Dates(s) for New Shift Update</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($viewReq as $availability) {?>
                                    <?php if($availability['approved']==TRUE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Request Shift Change')) { ?>
                                        <tr style=" background-color: rgba(50, 205, 50, 0.3); color: black;">
                                            <td><?php echo $availability['employeeid'];?></td>
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td><b><?php echo $availability['timeoff_shift'];?></td> 
                                            <td><b><?php echo $availability['updated_start_req'];?></td> 
                                            <td><a class="btn btn-danger btn-xs" style="background-color: #32CD32; border-color: #32CD32" readonly> Approved </a></td>
                                        </tr>
                                    <?php } elseif($availability['approved']==FALSE && $availability['approved']!=NULL && ($availability['timeoff_type']=='Request Shift Change')) { ?>
                                        <tr style="background-color: rgba(128, 0, 0, 0.3); color: black;">
                                            <td><?php echo $availability['employeeid'];?></td>
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td><b><?php echo $availability['timeoff_shift'];?></td> 
                                            <td><b><?php echo $availability['updated_start_req'];?></td>                                             
                                            <td><a class="btn btn-danger btn-xs" style="background-color: #800000; border-color: #800000;" readonly> Declined </a></td>
                                        </tr>
                                    <?php } elseif ($availability['timeoff_type']=='Request Shift Change') { ?>
                                        <tr>
                                            <td><?php echo $availability['employeeid'];?></td>
                                            <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                            <td><b><?php echo $availability['timeoff_shift'];?></td> 
                                            <td><b><?php echo $availability['updated_start_req'];?></td>                                           
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
