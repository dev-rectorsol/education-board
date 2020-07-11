<!-- content -->
<div class="page-content pt-lg-5">


    <div class="course-resume-wrapper topic-1">
        <div class="container">

            <div class="uk-grid-large uk-light mt-lg-3" uk-grid>

                <div class="uk-width-1-2@m">
                    <div class="course-thumbnail m-lg-4 p-lg-3">
                        <img src="<?php echo !empty(isset($thumb->image)) ? $thumb->image : base_url('assets/images/defult_banner.jpg'); ?>" alt="">
                        <a class="play-button-trigger show" href="#trailer-modal" uk-toggle> </a>
                    </div>

                    <!-- video demo model -->
                    <div id="trailer-modal" uk-modal>
                        <div class="uk-modal-dialog">
                            <button class="uk-modal-close-default mt-2  mr-1" type="button" uk-close></button>
                            <div class="uk-modal-header">
                                <h4> <?php echo ucfirst($course->name); ?> </h4>
                            </div>
                            <div class="video-responsive">
                                <iframe src="https://www.youtube.com/embed/nOCXXHGMezU"
                                    class="uk-padding-remove" uk-video="automute: true" frameborder="0"
                                    allowfullscreen uk-responsive></iframe>
                            </div>

                            <div class="uk-modal-body">
                                <h3> <?php echo ucfirst($course->name); ?> </h3>
                                <p><?php echo ucfirst($course->slug); ?></p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="uk-width-1-2@m course-details">
                    <h2> <?php echo ucfirst($course->name); ?> </h2>
                    <p> <?php echo ucfirst($course->slug); ?> </p>

                    <div class="course-details-info mt-5">
                        <ul>
                            <li>
                                <div class="star-rating"><span class="avg"> 4.9 </span> <span
                                        class="star"></span><span class="star"></span><span
                                        class="star"></span><span class="star"></span><span class="star"></span>
                                </div>
                            </li>
                            <li> <i class="icon-feather-users"></i> 1200 Enerolled </li>
                        </ul>
                    </div>
                    <div class="course-details-info">

                        <ul>
                            <li> Created by <a href="#"> <?php echo $this->common_model->get_username($course->created_by); ?> </a> </li>
                            <li> Last updated <?php echo time_diff($course->last_update); ?> ago</li>
                            <li> Hindi </li>
                        </ul>

                    </div>

                    <div class="uk-flex uk-flex-between uk-flex-middle">
                        <div class=" uk-visible@m">
                            <a hred="#" uk-tooltip="title: Add to your Bookmarks ; pos: top">
                                <i class="icon-feather-bookmark icon-small"></i> </a>
                            <a hred="#" uk-tooltip="title: Add to wishlist ; pos: top">
                                <i class="icon-feather-heart icon-small ml-3 text-danger"></i> </a>
                        </div>
                        <a href="<?php echo base_url('demo/') . $course->course_id ; ?>" class="btn-course-start-2 my-lg-4 mt-3"> Start Learning
                            <i class="icon-feather-chevron-right"></i> </a>
                    </div>


                </div>

            </div>

            <div class="subnav">

                <ul class="uk-child-width-expand mb-0"
                    uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium"
                    uk-tab>
                    <li><a href="#"> <i class="uil-file-alt"></i>
                            <span> Description</span> </a>
                    </li>
                    <li><a href="#"> <i class="uil-film"></i>
                            <span> Curriculum</span></a>
                    </li>
                  </ul>
            </div>

        </div>
    </div>

    <div class="container">

        <div class="uk-grid-large mt-4" uk-grid>
            <div class="uk-width-2-3@m">
                <ul id="course-intro-tab" class="uk-switcher">

                    <!-- course description -->
                    <li class="course-description-content">

                        <h4> Description </h4>
                        <?php echo $course->description; ?>


                    </li>

                    <!-- course Curriculum-->
                    <li>
                        <h4> Course Curriculum </h4>

                        <ul class="course-curriculum" uk-accordion="multiple: true" ng-controller="curriculumController">

                          <li ng-repeat='curriculum in curriculums' repeat-done="layoutDone()">
                            <a class="uk-accordion-title" href="#"> {{curriculum.subject_name}} </a>
                            <div class="uk-accordion-content">

                              <!-- course-video-list -->
                              <ul class="course-curriculum-list" ng-repeat='subculum in curriculum.subject_curriculum'>
                                <li> {{subculum.lesson_name}}
                                  </a> <span> 23 min </span>
                                </li>
                              </ul>

                            </div>
                          </li>

                        </ul>

                    </li>

                </ul>
            </div>


            <!-- sidebar -->
            <div class="uk-width-1-3@m">

                <h4 class="mt-lg-4"> Related Courses</h4>

            </div>

        </div>
        <!-- footer
        ================================================== -->
        <?php get_footer(); ?>

    </div>

</div>


<script type="text/javascript">

app.directive('repeatDone', function() {
return function() {
    $('.course-curriculum li:first').addClass('uk-open');
}
});

app.controller('curriculumController', function($scope, $http){
$scope.curriculums = [];
  $http.get('<?php echo base_url('course/course_curriculum/').$course->course_id; ?>')
  .then(function($data){
    $scope.curriculums = $data.data;
  });
});
</script>
