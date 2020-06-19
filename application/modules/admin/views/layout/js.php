
<!-- bootstrap JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/bootstrap.min.js"></script>
<!-- wow JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/wow.min.js"></script>
<!-- price-slider JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/jquery-price-slider.js"></script>
<!-- meanmenu JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/owl.carousel.min.js"></script>
<!-- sticky JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/jquery.sticky.js"></script>
<!-- scrollUp JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/jquery.scrollUp.min.js"></script>
<!-- counterup JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/counterup/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(OPTIMUM)?>/js/counterup/waypoints.min.js"></script>
<script src="<?php echo base_url(OPTIMUM)?>/js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url(OPTIMUM)?>/js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/metisMenu/metisMenu.min.js"></script>
<script src="<?php echo base_url(OPTIMUM)?>/js/metisMenu/metisMenu-active.js"></script>
<!-- morrisjs JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/morrisjs/raphael-min.js"></script>
<script src="<?php echo base_url(OPTIMUM)?>/js/morrisjs/morris.js"></script>
<script src="<?php echo base_url(OPTIMUM)?>/js/morrisjs/morris-active.js"></script>
<!-- morrisjs JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(OPTIMUM)?>/js/sparkline/jquery.charts-sparkline.js"></script>
<script src="<?php echo base_url(OPTIMUM)?>/js/sparkline/sparkline-active.js"></script>
<!-- calendar JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/calendar/moment.min.js"></script>
<script src="<?php echo base_url(OPTIMUM)?>/js/calendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url(OPTIMUM)?>/js/calendar/fullcalendar-active.js"></script>

  <!-- after glow video player  -->
  <script src="<?php echo base_url(OPTIMUM)?>/js/jquery.fancybox.min.js"></script>

<!-- plugins JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/plugins.js"></script>
<!-- main JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/main.js"></script>
<!-- tawk chat JS
============================================ -->
<!-- <script src="<?php //echo base_url(OPTIMUM)?>/js/tawk-chat.js"></script> -->
<!-- Dropzone
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/dropzone/dropzone.js"></script>

<!-- notification JS
============================================ -->
<script src="<?php echo base_url(OPTIMUM)?>/js/notifications/Lobibox.js"></script>
<script src="<?php echo base_url(OPTIMUM)?>/js/notifications/notification-active.js"></script>


<script src="<?php echo base_url(OPTIMUM) ?>/js/toastr/build/toastr.min.js"></script>
  <!-- select2 JS
		============================================ -->
    <script src="<?php echo base_url(OPTIMUM)?>/js/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url(OPTIMUM)?>/js/select2/select2-active.js"></script>
     <!-- summernote JS
		============================================ -->
    <script src="<?php echo base_url(OPTIMUM)?>/js/summernote/summernote.min.js"></script>
    <script src="<?php echo base_url(OPTIMUM)?>/js/summernote/summernote-active.js"></script>

<!-- data table JS
		============================================ -->
    <script src="<?php echo base_url(OPTIMUM)?>/js/data-table/bootstrap-table.js"></script>
    <script src="<?php echo base_url(OPTIMUM)?>/js/data-table/tableExport.js"></script>
    <script src="<?php echo base_url(OPTIMUM)?>/js/data-table/data-table-active.js"></script>
    <script src="<?php echo base_url(OPTIMUM)?>/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?php echo base_url(OPTIMUM)?>/js/data-table/bootstrap-editable.js"></script>
    <script src="<?php echo base_url(OPTIMUM)?>/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?php echo base_url(OPTIMUM)?>/js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?php echo base_url(OPTIMUM)?>/js/data-table/bootstrap-table-export.js"></script>

    <script src="<?php echo base_url(OPTIMUM)?>/js/vendor/modernizr-2.8.3.min.js"></script>

    <?php include("__media.php"); ?>
    <?php include("__notification.php"); ?>
    <?php include("__address.php"); ?>

    <?php if(isset($script)):
        echo $script;
     endif; ?>
</body>

</html>
