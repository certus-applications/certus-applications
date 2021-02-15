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
                            <tr class="strikeout" style="color: black; background-color: green; opacity: 0.25;">
                                <td><?php echo $availability['employeeid'];?></td>
                                <td><?php echo date('M jS, Y'); ?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></td>
                                <td><?php echo $availability['reason'];?></td>
                                <td><a class="btn btn-success btn-xs" readonly> Approved </a></td>
                            </tr>
                        <?php } elseif($availability['approved']==FALSE && $availability['approved']!=NULL) { ?>
                            <tr class="strikeout" style="background-color: red; opacity: 0.25;">
                                <td><?php echo $availability['employeeid'];?></td>
                                <td><?php echo date('M jS, Y'); ?></td>
                                <td><?php echo date("M jS, Y", strtotime($availability['start']));?> to <?php echo date("M jS, Y", strtotime($availability['start']));?></td>
                                <td><?php echo $availability['reason'];?></td>
                                <td><a class="btn btn-danger btn-xs" readonly> Declined </a></td>
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
            </div>
        </div>
    </div>
    </div>
</div>