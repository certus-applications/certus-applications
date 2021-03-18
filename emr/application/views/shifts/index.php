<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Certus Applications</title>
        <link rel="icon" type="image/png" href="../img/certus_logo-remove.png" sizes="32x32" />

        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet" />
        <!-- FullCalendar -->
        <link href="../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
        <link href="../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print" />
        <!-- iCheck -->
        <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet" />

        <!-- bootstrap-progressbar -->
        <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" />
        <!-- JQVMap -->
        <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
        <!-- bootstrap-daterangepicker -->
        <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

        <!-- Datatables -->
        <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" />
        <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet" />
        <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet" />
        <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet" />
        <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css" />
        <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

        <!-- Firebase -->
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/7.15.4/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.15.4/firebase-firestore.js"></script>

        <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
        <script src="https://www.gstatic.com/firebasejs/7.15.4/firebase-analytics.js"></script>

        <!-- jQuery -->
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

        <!-- Ajax -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

        <!-- Custom Theme Style -->
        <!-- <link href="../build/css/custom.min.css" rel="stylesheet"> -->
        <link href="../build/css/custom.css" rel="stylesheet" />

        <!-- PNotify -->
        <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet" />
        <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet" />
        <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet" />
    </head>

    <!-- page content -->
    <div class="right_col" role="main">
    	<div class="jumbotron vertical-center">
    		<div class="container">
		        <div class="row">
		        	<div class="col-md-2"></div>
		            <div class="col-md-8 col-sm-12 col-xs-12">
		                <div class="x_panel">
		                    <!-- Smart Wizard -->
		                    <div id="wizard" class="form_wizard wizard_horizontal">
		                        <ul class="wizard_steps">
                                    <li>
                                        <a href="#step-1">
                                            <span class="step_no">1</span>
                                            <span class="step_descr"> Step 1<br />
                                                <small>Email</small>
                                            </span>
                                      </a>
                                    </li>
                                    <li>
                                      <a href="#step-2">
                                            <span class="step_no">2</span>
                                            <span class="step_descr"> Step 2<br />
                                                <small></small>
                                            </span>
                                      </a>
                                    </li>
                                    <li>
                                      <a href="#step-3">
                                            <span class="step_no">3</span>
                                            <span class="step_descr"> Step 3<br />
                                                <small>Complete</small>
                                            </span>
                                      </a>
                                    </li>
                                </ul>
		                        <div id="step-1">
		                            <form class="form-horizontal form-label-left">
		                                <div class="form-group row">
		                                	<div class="col-md-3 col-sm-3"></div>
		                                    <div class="col-md-6 col-sm-6">
		                                        <input type="text" id="email" required="required" class="form-control" placeholder="Email" />
		                                    </div>
		                                </div>
		                            </form>
		                        </div>
		                        <div id="step-2">
		                            <form class="form-horizontal form-label-left">
		                                <div class="form-group row">
		                                	<div class="col-md-3 col-sm-3"></div>
		                                    <div class="col-md-6 col-sm-6">
												<input type="radio" name="shift" value="checkin"> checkin<br>
												<input type="radio" name="shift" value="checkout"> checkout<br>
		                                    </div>
		                                </div>
		                            </form>
		                        </div>

		                        <div id="step-3">
		                            <form class="form-horizontal form-label-left">
		                                <div class="form-group row">
		                                	<div class="col-md-5 col-sm-5"></div>
		                                    <div class="col-md-6 col-sm-6">
		                                    	<div style="font-size: 35px;">&#9989;</div>
		                                    </div>
		                                </div>
		                            </form>
		                        </div>
		                    </div>
		                    <!-- End SmartWizard Content -->
		                </div>
		            </div>

		        </div>
    		</div>    		
    	</div>
    </div>
    <!-- /page content -->

    <style type="text/css">
		.jumbotron.vertical-center {
		    margin-bottom: 0;
		    /*background: #544D71;*/
		}

		.vertical-center {
		    min-height: 100%;
		    min-height: 100vh;

		    display: -webkit-box;
		    display: -moz-box;
		    display: -ms-flexbox;
		    display: -webkit-flex;
		    display: flex;

		    -webkit-box-align: center;
		    -webkit-align-items: center;
		    -moz-box-align: center;
		    -ms-flex-align: center;
		    align-items: center;

		    width: 100%;

		    -webkit-box-pack: center;
		    -moz-box-pack: center;
		    -ms-flex-pack: center;
		    -webkit-justify-content: center;
		    justify-content: center;
		}

    </style>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- FullCalendar -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/fullcalendar/dist/fullcalendar.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>

    <!-- Calendar Scripts -->
    <!-- <script src="../build/js/calendar1.js"></script> -->

    <!-- Locations Scripts -->
    <script src="../build/js/locations.js"></script>

    <!-- Availability Widget Scripts -->
    <!-- <script src="../build/js/availability.js"></script> -->

    <!-- Analytic Scripts -->
    <!-- <script src="../build/js/analytics.js"></script> -->

    <!-- Shift Scripts -->
    <script src="../build/js/shift.js"></script>
</html>
