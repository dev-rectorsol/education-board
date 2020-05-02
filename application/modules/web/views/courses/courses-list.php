<div class="page-content">

  <div class="container">

    <h1> Courses </h1>

    <h4> Browse Kalka Ias Zone <a href="#" class="text-muted">Courses</a> </h4>

    <div class="section-header mb-4">
      <div class="section-header-left">
        <nav class="responsive-tab style-4">
          <ul>
            <li class="uk-active"><a href="#">Most popular</a></li>
            <li><a href="#">New</a></li>
            <li><a href="#">Intermediate </a></li>
            <li><a href="#">advanced</a></li>
          </ul>
        </nav>
      </div>
      <div class="section-header-right">

        <div class="display-as">
          <a href="courses.html" uk-tooltip="title: Course list; pos: top-right">
            <i class="icon-feather-list"></i></a>
          <a href="#" class="active" uk-tooltip="title: Course Grid; pos: top-right">
            <i class="icon-feather-grid"></i></a>
        </div>

        <select class="selectpicker ml-3">
          <option value=""> Newest </option>
          <option value="1">Popular</option>
          <option value="2">Free</option>
          <option value="3">Premium</option>
        </select>

      </div>
    </div>

    <div class="uk-grid-large" uk-grid>
      <div class="uk-width-3-4@m" ng-app="educationbourd" ng-controller="coursesController">

          <div class="course-card course-card-list" ng-repeat='course in courses'>
            <div class="course-card-thumbnail">
              <img src="{{course.image}}">
              <a href="<?php echo base_url('courses/').'{{course.course_id}}' ?>" class="play-button-trigger"></a>
            </div>
            <div class="course-card-body">
              <a href="<?php echo base_url('course/').'{{course.course_id}}' ?>">
                <h4>{{course.name}}</h4>
              </a>
              <p>{{course.slug}}</p>
              <div class="course-details-info">
                <ul>
                  <li> <i class="icon-feather-sliders"></i> {{course.course_type}} level </li>
                  <li> By <a href=""> {{course.created_by}} </a> </li>
                  <li>
                    <div class="star-rating"><span class="avg"> 4.8 </span> <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                    </div>
                  </li>
                </ul>
              </div>

            </div>
          </div>

        <!-- pagination menu -->
        <ul class="uk-pagination my-5 uk-flex-center" uk-margin>
          <li><a href="#"><span uk-pagination-previous></span></a></li>
          <li class="uk-disabled"><span>...</span></li>
          <li><a href="#">4</a></li>
          <li class="uk-active"><span>7</span></li>
          <li><a href="#">8</a></li>
          <li><a href="#">10</a></li>
          <li class="uk-disabled"><span>...</span></li>
          <li><a href="#"><span uk-pagination-next></span></a></li>
        </ul>

      </div>
      <div class="uk-width-expand">
        <button class="btn-sidebar-filter" uk-toggle="target: .sidebar-filter; cls: sidebar-filter-visible">Filter </button>
        <div class="sidebar-filter" uk-sticky="offset:30 ; media : @s: bottom: true">

          <div class="sidebar-filter-contents">


            <h4> Filter By </h4>

            <ul class="sidebar-filter-list uk-accordion" uk-accordion="multiple: true">

              <li class="uk-open">
                <a class="uk-accordion-title" href="#"> Skill Levels </a>
                <div class="uk-accordion-content" aria-hidden="false">
                  <div class="uk-form-controls">
                    <label>
                      <input class="uk-radio" type="radio" name="radio1">
                      <span class="test"> Beginner <span> (25) </span> </span>
                    </label>
                    <label>
                      <input class="uk-radio" type="radio" name="radio1">
                      <span class="test"> Entermidate<span> (32) </span></span>
                    </label>
                    <label>
                      <input class="uk-radio" type="radio" name="radio1">
                      <span class="test"> Expert <span> (12) </span></span>
                    </label>
                  </div>
                </div>
              </li>

              <li class="uk-open">
                <a class="uk-accordion-title" href="#"> Course type </a>
                <div class="uk-accordion-content" aria-hidden="false">
                  <div class="uk-form-controls">
                    <label>
                      <input class="uk-radio" type="radio" name="radio2">
                      <span class="test"> Free (42) </span>
                    </label>
                    <label>
                      <input class="uk-radio" type="radio" name="radio2">
                      <span class="test"> Paid </span>
                    </label>
                  </div>
                </div>
              </li>

              <li class="uk-open">
                <a class="uk-accordion-title" href="#"> Duration time </a>
                <div class="uk-accordion-content" aria-hidden="false">
                  <div class="uk-form-controls">
                    <label>
                      <input class="uk-radio" type="radio" name="radio3">
                      <span class="test"> +5 Hourse (23) </span>
                    </label>
                    <label>
                      <input class="uk-radio" type="radio" name="radio3">
                      <span class="test"> +10 Hourse (12)</span>
                    </label>
                    <label>
                      <input class="uk-radio" type="radio" name="radio3">
                      <span class="test"> +20 Hourse (5)</span>
                    </label>
                    <label>
                      <input class="uk-radio" type="radio" name="radio3">
                      <span class="test"> +30 Hourse (2)</span>
                    </label>
                  </div>
                </div>
              </li>


            </ul>



          </div>

        </div>

      </div>
    </div>

    <!-- footer
           ================================================== -->
    <?php get_footer(); ?>


  </div>

</div>


<script type="text/javascript">

var app = angular.module('educationbourd', []);

app.controller('coursesController', function($scope, $http){
    $scope.courses = [];
      $http.get('<?php echo base_url('courses/get_list'); ?>')
      .then(function($data){
        $scope.courses = $data.data;
      });
});
</script>
