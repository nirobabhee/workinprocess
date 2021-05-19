<!DOCTYPE html>
<!-- 
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.5.1
Author: Sunnyat A.
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0?ref=myorange
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        <?php echo $title; ?> - WIPLayer
    </title>
    <meta name="description" content="Analytics Dashboard">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- base css -->
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/app.bundle.css">
    <link id="mytheme" rel="stylesheet" media="screen, print" href="#">
    <link id="myskin" rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/skins/skin-master.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>/assets/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="<?php echo base_url(); ?>/assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/miscellaneous/reactions/reactions.css">
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/miscellaneous/fullcalendar/fullcalendar.bundle.css">
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/miscellaneous/jqvmap/jqvmap.bundle.css">
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/datagrid/datatables/datatables.bundle.css">
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url(); ?>/assets/css/formplugins/select2/select2.bundle.css">
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>/assets/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>/assets/css/fa-brands.css">

    <!--================Script____________________Start -->
    <!-- base vendor bundle: 
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations 
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
    <script src=" <?php echo base_url() ?>/assets/js/vendors.bundle.js"></script>
    <!-- *****DropDown - Select2--Assets With Script given below********** -->
    <script src="<?php echo base_url(); ?>/assets/js/formplugins/select2/select2.bundle.js"></script>
    <!--START DatePicker&DaterangePicker Assets -->
    <script src="<?php echo base_url(); ?>/assets/js/dependency/moment/moment.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <!--END DatePicker&DaterangePicker Assets -->
    <script src="<?php echo base_url() ?>/assets/js/formplugins/inputmask/inputmask.bundle.js"></script>
    <!-- ================Script____________________End -->



</head>