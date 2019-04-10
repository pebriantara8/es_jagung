<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="http://sinodegki.org/2016/wp-content/themes/exodus/favicon.ico">
    <?php if (isset($title)): ?>
        <title><?php echo $title ?></title>
    <?php else: ?>
        <title>Admin - Gereja Kristen Indonesia Adisucipto</title>
    <?php endif ?>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/admin/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="<?php echo base_url() ?>assets/admin/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/admin/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/admin/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/css/gkiadisucipto_custom.css" rel="stylesheet">

    <!-- All Jquery -->
    <script src="<?php echo base_url() ?>assets/admin/js/lib/jquery/jquery.min.js"></script>

    <!-- Jquery Confirm -->
    <link href="<?php echo base_url() ?>assets/main/jconfirm/jquery-confirm.min.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url() ?>assets/main/jconfirm/jquery-confirm.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- toastr -->
    <link href="<?php echo base_url() ?>assets/toastr/toastr.min.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url() ?>assets/toastr/toastr.min.js" type="text/javascript"></script>
    <!-- end toastr -->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
<!--     <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> -->
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
            <?php require_once __DIR__."/../../blocks/header.php"; ?>
        <!-- End header header -->

        <!-- Left Sidebar  -->
            <?php require_once __DIR__."/../../blocks/left_sidebar_menu.php"; ?>
        <!-- End Left Sidebar  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center" style="display: inline;">
                    <h3 class="text-primary"><?php echo $this->data['page_title']; ?></h3> 
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <?php if(isset($content)) $this->load->view($content); ?>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->

            <!-- footer -->
                <?php require_once __DIR__."/../../blocks/footer.php"; ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->

    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url() ?>assets/admin/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() ?>assets/admin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url() ?>assets/admin/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->


    <!-- Amchart -->
     <script src="<?php echo base_url() ?>assets/admin/js/lib/morris-chart/raphael-min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/lib/morris-chart/morris.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/lib/morris-chart/dashboard1-init.js"></script>


    <script src="<?php echo base_url() ?>assets/admin/js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url() ?>assets/admin/js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url() ?>assets/admin/js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url() ?>assets/admin/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url() ?>assets/admin/js/lib/calendar-2/pignose.init.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/js/lib/owl-carousel/owl.carousel-init.js"></script>

    <!-- scripit init-->

    <script src="<?php echo base_url() ?>assets/admin/js/scripts.js"></script>

    <script src="<?php echo base_url() ?>assets/admin/js/gki_custom.js"></script>

</body>

</html>