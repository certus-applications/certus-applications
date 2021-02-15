<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Your Requests</h2> 
                <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h3>Emergency</h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Date of request</th>
                            <th>Date of time-off</th>
                            <th>Reason for time-off</th>
                            <th>Approved/Declined</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($viewReq as $availability) {?>
                        <?php if($availability['approved']==TRUE && $availability['approved']!=NULL ) { ?>
                            <tr style=" background-color: rgba(50, 205, 50, 0.3); color: black;">
                                <td><?php echo $availability['employeeid'];?></td>
                                <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></td>
                                <td><?php echo $availability['reason'];?></td>
                                <td><a class="btn btn-danger btn-xs" style="background-color: #32CD32; border-color: #32CD32" readonly> Approved </a></td>
                            </tr>
                        <?php } elseif($availability['approved']==FALSE && $availability['approved']!=NULL) { ?>
                            <tr style="background-color: rgba(128, 0, 0, 0.3); color: black;">
                                <td><?php echo $availability['employeeid'];?></td>
                                <td><?php echo date('M jS, Y', strtotime($availability['timestamp'])); ?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></td>
                                <td><?php echo $availability['reason'];?></td>
                                <td><a class="btn btn-danger btn-xs" style="background-color: #800000; border-color: #800000;" readonly> Declined </a></td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td><?php echo $availability['employeeid'];?></td>
                                <td><?php echo date('M jS, Y'); ?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></td>
                                <td><?php echo $availability['reason'];?></td>
                                <td> <b>Pending</b> </td>
                            </tr>

                        <?php } } ?>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary" style="padding: 5px 18px 5px 18px; margin: 5px 0 5px 5px; text-align: right;"><a href="request" style="color: white">Request Time-Off</a></button>
            </div>
        </div>
    </div>
    </div>
</div>