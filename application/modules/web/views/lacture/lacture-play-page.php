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
      <meta name="description" content="Courseplus - Professional Learning Management HTML Template">

      <!-- Favicon -->
      <link href="<?php echo base_url() ?>/assets/images/favicon.png" rel="icon" type="image/png">

      <!-- CSS
      ================================================== -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/night-mode.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/framework.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">

      <!-- icons
      ================================================== -->
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/icons.css">

      <!-- JQuery -->

      <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>


      <script src="<?php echo base_url('optimum/js/google.lazy.load/lazysizes.min.js') ?>" charset="utf-8"></script>


      <!-- Anguler Js
        ================================================ -->

      <script src="<?php echo base_url('assets/js/angular.min.js'); ?>" charset="utf-8"></script>

      <script type="text/javascript">

      var app = angular.module('educationbourd', []);


      </script>

      <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/preloder.css">

      <script type="text/javascript">
          setTimeout(function(){
            $('body').addClass('loaded');
          }, 1200);
      </script>
  </head>

<body ng-app="educationbourd" class="course-watch-page">
  <div class="loader-wrapper">
   <div class="loader"></div>
   <div class="loader-section section-left"></div>
   <div class="loader-section section-right"></div>
  </div>

        <!-- Wrapper -->
        <div id="wrapper">

            <div class="course-layouts">

                <div class="course-content bg-dark">

                    <div class="course-header">

                        <a href="#" class="btn-back" uk-toggle="target: .course-layouts; cls: course-sidebar-collapse">
                            <i class="icon-feather-chevron-left"></i>
                        </a>

                        <h4 class="text-white"> <?php echo ucfirst($course->name); ?> </h4>

                        <div>
                            <a href="#">
                                <i class="icon-feather-help-circle btns"></i> </a>
                            <div uk-drop="pos: bottom-right;mode : click">
                                <div class="uk-card-default p-4">
                                    <h4> <?php echo ucfirst($course->name); ?> </h4>
                                    <p class="mt-2 mb-0"><?php echo $course->slug; ?></p>
                                </div>
                            </div>

                            <a hred="#">
                                <i class="icon-feather-more-vertical btns"></i>
                            </a>
                            <div class="dropdown-option-nav " uk-dropdown="pos: bottom-right ;mode : click">
                                <ul>

                                    <li><a href="#">
                                            <i class="icon-feather-bookmark"></i>
                                            Add To Bookmarks</a></li>
                                    <li><a href="<?php echo base_url('resume/').$course->course_id; ?>">
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
                                <!-- to autoplay video uk-video="automute: true" -->
                                <div id="player" class="video-responsive" >
                                  <iframe width="560" height="315" src="https://www.youtube.com/embed/YXZ9n6QiRZs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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

                        <ul class="course-video-list-section"
                        uk-switcher=" connect: #video-slider  ; animation: uk-animation-slide-right-small, uk-animation-slide-left-medium"
                         uk-accordion ng-controller="curriculumController">

                            <li ng-repeat='curriculum in curriculums' repeat-done="layoutDone()">
                                <a class="uk-accordion-title" href="#"> {{curriculum.subject_name}} </a>
                                <div class="uk-accordion-content">
                                    <!-- course-video-list -->
                                    <ul class="course-video-list highlight-watched" ng-repeat='subculum in curriculum.subject_curriculum'>
                                        <li ng-click="loadLactureComponent($event)" data-src="{{subculum.lesson_id}}"><a> {{subculum.lesson_name}} <span> 2 min </span> </a> </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>

                    </div>

                </div>

            </div>



        </div>

        <script type="text/javascript">

          var player = angular.element(document.querySelector("#player"));

          app.directive('repeatDone', function() {
          return function() {
              $('.course-curriculum li:first').addClass('uk-open');
          }
          });

          app.controller('curriculumController', function($scope, $http){
          $scope.curriculums = [];
            $http.get('<?php echo base_url('courses/course_curriculum/').$course->course_id; ?>')
            .then(function($data){
              $scope.curriculums = $data.data;
            });

            $scope.loadLactureComponent = function(event){
              var data = event.currentTarget.getAttribute("data-src");
              var url = '<?php echo base_url('watch/') ?>' + data;
              $scope.lacture = [];
              $http.get(url).then(function($data) {
                $scope.lacture = $data.data;
                player.html($scope.lacture);

              });

            }
          });

        </script>

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
    <script src="<?php echo base_url() ?>/assets/js/framework.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/simplebar.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/main.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap-select.min.js"></script>

    <script>
      var video = document.getElementById('video');
      video.addEventListener('loadedmetadata', function() {
        if (video.buffered.length === 0) return;
        var bufferedSeconds = video.buffered.end(0) - video.buffered.start(0);
      });
      document.addEventListener("DOMContentLoaded", function() {
        var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

        if ("IntersectionObserver" in window) {
          var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(video) {
              if (video.isIntersecting) {
                for (var source in video.target.children) {
                  var videoSource = video.target.children[source];
                  if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
                    videoSource.src = videoSource.dataset.src;
                  }
                }

                video.target.load();
                video.target.classList.remove("lazy");
                lazyVideoObserver.unobserve(video.target);
              }
            });
          });

          lazyVideos.forEach(function(lazyVideo) {
            lazyVideoObserver.observe(lazyVideo);
          });
        }
      });

    </script>


</body>
</html>
