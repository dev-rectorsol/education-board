<?php $application_name = $this->db->get_where('setting', array('setting_name' => 'application_name'))->row()->setting_value; ?>
<?php $application_title = $this->db->get_where('setting', array('setting_name' => 'application_title'))->row()->setting_value; ?>

  <!doctype html>
  <html lang="en">


  <!-- Mirrored from demo.foxthemes.net/courseplusv3.3/default/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Mar 2020 12:31:46 GMT -->
  <head>

      <!-- Basic Page Needs
      ================================================== -->
      <title><?php echo $application_title." || ".$application_name; ?></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="<?php echo $application_title ?> - <?php echo $application_name; ?>">

      <!-- Favicon -->
      <link href="<?php echo base_url() ?>/assets/images/favicon.png" rel="icon" type="image/png">

      <!-- CSS
      ================================================== -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/night-mode.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/framework.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">

      <!-- icons
      ================================================== -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/icons.css">

      <!-- JQuery -->

      <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>

      <style media="screen">
        .course-content-inner{
          background: #FFFFFF !important;
        }
      </style>


      <!-- Anguler Js
        ================================================ -->

      <script src="<?php echo base_url('assets/js/angular.min.js'); ?>" charset="utf-8"></script>

      <script type="text/javascript">

      var app = angular.module('educationbourd', [])
      .filter('renderHTMLCorrectly', function($sce)
        {
        	return function(stringToParse)
        	{
        		return $sce.trustAsHtml(stringToParse);
        	}
        });


      </script>

</head>


<body class="course-watch-page">

        <!-- Wrapper -->
        <div id="wrapper">

            <div class="course-layouts">

                <div class="course-content bg-dark">

                    <div class="course-header">

                        <a href="#" class="btn-back" uk-toggle="target: .course-layouts; cls: course-sidebar-collapse">
                            <i class="icon-feather-chevron-left"></i>
                        </a>

                        <h4 class="text-white"> <?php echo $test->title; ?> </h4>

                        <div>
                            <a href="#">
                            <i class="icon-material-outline-alarm-on btns"></i> </a>
                            <div uk-drop="pos: bottom-right;mode : click">

                            </div>

                            <a hred="#">
                                <i class="icon-feather-more-vertical btns"></i>
                            </a>
                            <div class="dropdown-option-nav " uk-dropdown="pos: bottom-right ;mode : click">
                                <ul>

                                    <li><a href="#">
                                            <i class="icon-feather-bookmark"></i>
                                            Add To Bookmarks</a></li>
                                    <li><a href="#">
                                            <i class="icon-feather-share-2"></i>
                                            Share With Friend </a></li>

                                    <li>
                                        <a href="#" id="night-mode" class="btn-night-mode">
                                            <i class="icon-line-awesome-lightbulb-o"></i> Night mode
                                            <label class="btn-night-mode-switch">
                                                <div class="uk-switch-button"></div>
                                            </label>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                        </div>

                    </div>

                    <div class="course-content-inner">

                        <ul id="video-slider" class="uk-switcher">
                            <li>
                              <article class="">
                                <?php echo $test->description; ?>
                              </article>
                            </li>
                            <li>
                                <!-- to autoplay video uk-video="automute: true" -->
                                <div class="video-responsive">
                                </div>

                            </li>

                        </ul>

                    </div>

                </div>

                <!-- course sidebar -->

                <div class="course-sidebar">
                    <div class="course-sidebar-title">
                        <h3> Table of Contents </h3>
                    </div>
                    <div class="course-sidebar-container" data-simplebar>

                        <ul class="course-video-list-section" uk-accordion>

                            <li class="uk-open">
                                <div class="uk-accordion-content">
                                    <!-- course-video-list -->
                                    <ul class="course-video-list highlight-watched"
                                        uk-switcher=" connect: #video-slider  ; animation: uk-animation-slide-right-small, uk-animation-slide-left-medium">
                                        <li class="watched"> <a href="#"> Introduction <span> 23 min </span> </a>
                                        </li>
                                        <li> <a href="#"> Headings in HTML <span> 23 min </span> </a> </li>
                                    </ul>

                                </div>
                            </li>

                        </ul>

                    </div>

                </div>

            </div>



        </div>


        <script>
            (function (window, document, undefined) {
                'use strict';
                if (!('localStorage' in window)) return;
                var nightMode = localStorage.getItem('gmtNightMode');
                if (nightMode) {
                    document.documentElement.className += ' night-mode';
                }
            })(window, document);


            (function (window, document, undefined) {

                'use strict';

                // Feature test
                if (!('localStorage' in window)) return;

                // Get our newly insert toggle
                var nightMode = document.querySelector('#night-mode');
                if (!nightMode) return;

                // When clicked, toggle night mode on or off
                nightMode.addEventListener('click', function (event) {
                    event.preventDefault();
                    document.documentElement.classList.toggle('night-mode');
                    if (document.documentElement.classList.contains('night-mode')) {
                        localStorage.setItem('gmtNightMode', true);
                        return;
                    }
                    localStorage.removeItem('gmtNightMode');
                }, false);

            })(window, document);
        </script>

        <script src="../../../code.jquery.com/jquery-2.2.4.min.js"></script>
        <script>
            function make_button_active(tab) {
                //Get item siblings
                var siblings = tab.siblings();

                /* Remove active class on all buttons
                siblings.each(function(){
                    $(this).removeClass('active');
                }) */

                //Add the clicked button class
                tab.addClass('watched');
            }

            //Attach events to highlight-watched
            $(document).ready(function () {

                if (localStorage) {
                    var ind = localStorage['tab']
                    make_button_active($('.highlight-watched li').eq(ind));
                }

                $(".highlight-watched li").click(function () {
                    if (localStorage) {
                        localStorage['tab'] = $(this).index();
                    }
                    make_button_active($(this));
                });

            });
        </script>

    <!-- javaScripts
    ================================================== -->
    <script src="<?php echo base_url() ?>assets/js/framework.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/simplebar.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-select.min.js"></script>


</body>


<!-- Mirrored from demo.foxthemes.net/courseplusv3.3/default/course-lesson-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 16 Mar 2020 12:33:14 GMT -->
</html>
