<!-- content -->
<div class="page-content pt-lg-5">


    <div class="course-resume-wrapper topic-1">
        <div class="container">

            <div class="uk-grid-large uk-light mt-lg-3" uk-grid>

                <div class="uk-width-1-2@m">
                    <div class="course-thumbnail m-lg-4 p-lg-3">
                        <img src="../assets/images/course/1.png" alt="">
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
                    <li><a href="#"> <i class="uil-comment-lines"></i>
                            <span> FAQ</span></a>
                    </li>
                    <li><a href="#"> <i class="uil-envelope-info"></i>
                            <span> Announcement</span></a>
                    </li>
                    <li><a href="#"> <i class="uil-star"></i>
                            <span> Reviews</span></a>
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

                    <!-- course Faq-->
                    <li>

                        <h4 class="my-4"> Course Faq</h4>

                        <ul class="course-faq" uk-accordion>

                            <li class="uk-open">
                                <a class="uk-accordion-title" href="#"> Html Introduction </a>
                                <div class="uk-accordion-content">
                                    <p> The primary goal of this quick start guide is to introduce you to
                                        Unreal
                                        Engine 4`s (UE4) development environment. By the end of this guide,
                                        you`ll
                                        know how to set up and develop C++ Projects in UE4. This guide shows
                                        you
                                        how
                                        to create a new Unreal Engine project, add a new C++ class to it,
                                        compile
                                        the project, and add an instance of a new class to your level. By
                                        the
                                        time
                                        you reach the end of this guide, you`ll be able to see your
                                        programmed
                                        Actor
                                        floating above a table in the level. </p>
                                </div>
                            </li>

                            <li>
                                <a class="uk-accordion-title" href="#"> Your First webpage</a>
                                <div class="uk-accordion-content">
                                    <p> The primary goal of this quick start guide is to introduce you to
                                        Unreal
                                        Engine 4`s (UE4) development environment. By the end of this guide,
                                        you`ll
                                        know how to set up and develop C++ Projects in UE4. This guide shows
                                        you
                                        how
                                        to create a new Unreal Engine project, add a new C++ class to it,
                                        compile
                                        the project, and add an instance of a new class to your level. By
                                        the
                                        time
                                        you reach the end of this guide, you`ll be able to see your
                                        programmed
                                        Actor
                                        floating above a table in the level. </p>
                                </div>
                            </li>

                            <li>
                                <a class="uk-accordion-title" href="#"> Some Special Tags </a>
                                <div class="uk-accordion-content">
                                    <p> The primary goal of this quick start guide is to introduce you to
                                        Unreal
                                        Engine 4`s (UE4) development environment. By the end of this guide,
                                        you`ll
                                        know how to set up and develop C++ Projects in UE4. This guide shows
                                        you
                                        how
                                        to create a new Unreal Engine project, add a new C++ class to it,
                                        compile
                                        the project, and add an instance of a new class to your level. By
                                        the
                                        time
                                        you reach the end of this guide, you`ll be able to see your
                                        programmed
                                        Actor
                                        floating above a table in the level. </p>
                                </div>
                            </li>

                            <li>
                                <a class="uk-accordion-title" href="#"> Html Introduction </a>
                                <div class="uk-accordion-content">
                                    <p> The primary goal of this quick start guide is to introduce you to
                                        Unreal
                                        Engine 4`s (UE4) development environment. By the end of this guide,
                                        you`ll
                                        know how to set up and develop C++ Projects in UE4. This guide shows
                                        you
                                        how
                                        to create a new Unreal Engine project, add a new C++ class to it,
                                        compile
                                        the project, and add an instance of a new class to your level. By
                                        the
                                        time
                                        you reach the end of this guide, you`ll be able to see your
                                        programmed
                                        Actor
                                        floating above a table in the level. </p>
                                </div>
                            </li>

                        </ul>

                    </li>

                    <!-- course Announcement-->
                    <li>
                        <h4> Announcement </h4>

                        <div class="user-details-card">
                            <div class="user-details-card-avatar">
                                <img src="../assets/images/avatars/avatar-2.jpg" alt="">
                            </div>
                            <div class="user-details-card-name">
                                Stella Johnson <span> Instructor <span> 1 year ago </span> </span>
                            </div>
                        </div>



                        <article class="uk-article">

                            <p class="lead"> Nam liber tempor cum soluta nobis eleifend option
                                congue imperdiet doming id quod mazim placerat facer possim assum.</p>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                aute
                                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia
                                deserunt mollit anim id est laborum.</p>

                            <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                enim ad
                                minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                ut
                                aliquip ex ea commodo consequat. Nam liber tempor cum soluta nobis eleifend
                                option congue nihil imperdiet doming id quod mazim placerat facer possim
                                assum.
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                enim ad
                                minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                                ut
                                aliquip ex ea commodo consequat.</p>


                        </article>
                    </li>

                    <!-- course Reviews-->
                    <li>

                        <div class="review-summary">
                            <h4 class="review-summary-title"> Student feedback </h4>
                            <div class="review-summary-container">
                                <div class="review-summary-avg">
                                    <div class="avg-number">
                                        4.8
                                    </div>
                                    <div class="review-star">
                                        <div class="star-rating"><span class="star"></span><span
                                                class="star"></span><span class="star"></span><span
                                                class="star"></span><span class="star half"></span></div>
                                    </div>
                                    <span>Course Rating</span>
                                </div>


                                <div class="review-summary-rating">
                                    <div class="review-summary-rating-wrap">
                                        <div class="review-bars">
                                            <div class="full_bar">
                                                <div class="bar_filler" style="width:95%"></div>
                                            </div>
                                        </div>
                                        <div class="review-stars">
                                            <div class="star-rating"><span class="star"></span><span
                                                    class="star"></span><span class="star"></span><span
                                                    class="star"></span><span class="star"></span></div>
                                        </div>
                                        <div class="review-avgs">
                                            95 %
                                        </div>
                                    </div>
                                    <div class="review-summary-rating-wrap">
                                        <div class="review-bars">
                                            <div class="full_bar">
                                                <div class="bar_filler" style="width:80%"></div>
                                            </div>
                                        </div>
                                        <div class="review-stars">
                                            <div class="star-rating"><span class="star"></span><span
                                                    class="star"></span><span class="star"></span><span
                                                    class="star"></span><span class="star empty"></span>
                                            </div>
                                        </div>
                                        <div class="review-avgs">
                                            80 %
                                        </div>
                                    </div>
                                    <div class="review-summary-rating-wrap">
                                        <div class="review-bars">
                                            <div class="full_bar">
                                                <div class="bar_filler" style="width:60%"></div>
                                            </div>
                                        </div>
                                        <div class="review-stars">
                                            <div class="star-rating"><span class="star"></span><span
                                                    class="star"></span><span class="star"></span><span
                                                    class="star empty"></span><span class="star empty"></span>
                                            </div>
                                        </div>
                                        <div class="review-avgs">
                                            60 %
                                        </div>
                                    </div>
                                    <div class="review-summary-rating-wrap">
                                        <div class="review-bars">
                                            <div class="full_bar">
                                                <div class="bar_filler" style="width:45%"></div>
                                            </div>
                                        </div>
                                        <div class="review-stars">
                                            <div class="star-rating"><span class="star"></span><span
                                                    class="star"></span><span class="star empty"></span><span
                                                    class="star empty"></span><span class="star empty"></span>
                                            </div>
                                        </div>
                                        <div class="review-avgs">
                                            45 %
                                        </div>
                                    </div>
                                    <div class="review-summary-rating-wrap">
                                        <div class="review-bars">
                                            <div class="full_bar">
                                                <div class="bar_filler" style="width:25%"></div>
                                            </div>
                                        </div>
                                        <div class="review-stars">
                                            <div class="star-rating"><span class="star"></span><span
                                                    class="star empty"></span><span
                                                    class="star empty"></span><span
                                                    class="star empty"></span><span class="star empty"></span>
                                            </div>
                                        </div>
                                        <div class="review-avgs">
                                            25 %
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>

                        <div class="comments">
                            <h4>Reviews <span class="comments-amount"> (4610) </span> </h4>

                            <ul>
                                <li>
                                    <div class="avatar"><img src="../assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-by">Stella Johnson<span>Student</span>
                                            <div class="comment-stars">
                                                <div class="star-rating"><span class="star"></span><span
                                                        class="star"></span><span class="star"></span><span
                                                        class="star"></span><span class="star"></span></div>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                            diam
                                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                            erat
                                            volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                            tation
                                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                            consequat.
                                        </p>
                                        <div class="comment-footer">
                                            <span> Was this review helpful? </span>
                                            <button> Yes </button>
                                            <button> No </button>
                                            <a href="#"> Report</a>
                                        </div>
                                    </div>

                                </li>

                                <li>
                                    <div class="avatar"><img src="../assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-by"> Adrian Mohani <span>Instructor </span>
                                            <div class="comment-stars">
                                                <div class="star-rating"><span class="star"></span><span
                                                        class="star"></span><span class="star"></span><span
                                                        class="star"></span><span class="star half"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <p> Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                            ullamcorper
                                            suscipit lobortis nisl ut aliquip ex ea commodo consequat. Nam
                                            liber
                                            tempor cum soluta nobis eleifend
                                        </p>
                                        <div class="comment-footer">
                                            <span> Was this review helpful? </span>
                                            <button> Yes </button>
                                            <button> No </button>
                                            <a href="#"> Report</a>
                                        </div>
                                    </div>

                                </li>

                                <li>
                                    <div class="avatar"><img src="../assets/images/avatars/avatar-3.jpg" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-by"> Adrian Mohani <span>Student</span>
                                            <div class="comment-stars">
                                                <div class="star-rating"><span class="star"></span><span
                                                        class="star"></span><span class="star"></span><span
                                                        class="star"></span><span class="star"></span></div>
                                            </div>
                                        </div>
                                        <p> Nam liber tempor cum soluta nobis eleifend option congue nihil
                                            imperdiet doming id quod mazim placerat facer possim assum.
                                            Lorem
                                            ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                            nonummy
                                            nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                            volutpat.
                                        </p>
                                        <div class="comment-footer">
                                            <span> Was this review helpful? </span>
                                            <button> Yes </button>
                                            <button> No </button>
                                            <a href="#"> Report</a>
                                        </div>
                                    </div>

                                </li>

                                <li>
                                    <div class="avatar"><img src="../assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-by">Stella Johnson<span>Student</span>
                                            <div class="comment-stars">
                                                <div class="star-rating"><span class="star"></span><span
                                                        class="star"></span><span class="star"></span><span
                                                        class="star"></span><span class="star"></span></div>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                                            diam
                                            nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                            erat
                                            volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                            tation
                                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                            consequat.
                                        </p>
                                        <div class="comment-footer">
                                            <span> Was this review helpful? </span>
                                            <button> Yes </button>
                                            <button> No </button>
                                            <a href="#"> Report</a>
                                        </div>
                                    </div>

                                </li>

                            </ul>

                        </div>

                        <div class="comments">
                            <h3>Submit Review </h3>
                            <ul>
                                <li>
                                    <div class="avatar"><img src="../assets/images/avatars/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <form class="uk-grid-small" uk-grid>
                                            <div class="uk-width-1-2@s">
                                                <label class="uk-form-label">Name</label>
                                                <input class="uk-input" type="text" placeholder="Name">
                                            </div>
                                            <div class="uk-width-1-2@s">
                                                <label class="uk-form-label">Email</label>
                                                <input class="uk-input" type="text" placeholder="Email">
                                            </div>
                                            <div class="uk-width-1-1@s">
                                                <label class="uk-form-label">Comment</label>
                                                <textarea class="uk-textarea"
                                                    placeholder="Enter Your Comments her..."
                                                    style=" height:160px"></textarea>
                                            </div>
                                            <div class="uk-grid-margin">
                                                <input type="submit" value="submit" class="button grey">
                                            </div>
                                        </form>

                                    </div>
                                </li>
                            </ul>
                        </div>

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
  $http.get('<?php echo base_url('courses/course_curriculum/').$course->course_id; ?>')
  .then(function($data){
    $scope.curriculums = $data.data;
  });
});
</script>
