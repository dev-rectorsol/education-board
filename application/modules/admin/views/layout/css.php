<?php $application_name = $this->db->get_where('setting', array('setting_name' => 'application_name'))->row()->setting_value; ?>
<?php $application_title = $this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value; ?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title><?php echo $application_title." || ".$application_name; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">

    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/responsive.css">
      <!-- dropzone CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/dropzone/dropzone.css">
     <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/modals.css">

    <!-- notifications CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/notifications/notifications.css">

    <link href="<?php echo base_url(OPTIMUM) ?>/js/toastr/build/toastr.min.css" rel="stylesheet">

    <!-- select2 CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/select2/select2.min.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/data-table/bootstrap-editable.css">
    <!-- modernizr JS
		============================================ -->
     <!-- summernote CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/summernote/summernote.css">
    <link rel="stylesheet" href="<?php echo base_url(OPTIMUM)?>/css/__media.css">

    <link rel="stylesheet" href="<?php echo base_url('assets')?>/css/icons.css">

    <!-- jquery
    ============================================ -->
    <script src="<?php echo base_url(OPTIMUM)?>/js/vendor/jquery-1.12.4.min.js"></script>
</head>

<body>
