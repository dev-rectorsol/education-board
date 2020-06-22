 <div class="page-content">

   <?php if (is_array($slider)): ?>
   <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="sets: true">
     <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-2@m">
       <?php foreach ($slider as $value):?>
       <li>
         <?php if ($value['buttonUrl'] != ""): ?>
           <a href="<?php echo $value['buttonUrl']; ?>">
             <img src="<?php echo base_url($value['source']); ?>" alt="">
             <div class="uk-position-center uk-panel">
               <h1 uk-slideshow-parallax="x: 200,0,0"><?php echo $value['heading']; ?></h1>
               <h4 uk-slideshow-parallax="x: 200,0,0" class="my-lg-4"> <?php echo $value['details']; ?> <br> </h4>
             </div>
           </a>
          <?php else:?>
            <img src="<?php echo base_url($value['source']); ?>" alt="">
            <div class="uk-position-center uk-panel">
              <h1 uk-slideshow-parallax="x: 200,0,0"><?php echo $value['heading']; ?></h1>
              <h4 uk-slideshow-parallax="x: 200,0,0" class="my-lg-4"> <?php echo $value['details']; ?> <br> </h4>
            </div>
          <?php endif; ?>

       </li>
       <?php endforeach; ?>
     </ul>
     <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
     <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
       uk-slider-item="next"></a>
   </div>
   <?php else: ?>
   <div class="home-hero" data-src="<?php echo base_url()?>/assets/images/home-hero.png" uk-img>
     <div class="uk-width-1-1">
       <div class="page-content-inner uk-position-z-index">
         <h1>Learn HTML , CSS , iphone <br> Apps & More</h1>
         <h4 class="my-lg-4"> Learn how to build websites & apps <br> write a code or start a business </h4>
         <a href="#" class="btn btn-default">Free trailer </a>
       </div>
     </div>
   </div>
   <?php endif; ?>


   <div class="container">

     <div class="section-small">

       <div class="course-grid-slider" uk-slider="finite: true">

         <div class="grid-slider-header">
           <div>
             <h4 class="uk-text-truncate"> Trending Videos
               <a href="" class="text-muted">(Popular Courses)</a> </h4>
           </div>
           <div class="grid-slider-header-link">
             <a href="" class="button transparent uk-visible@m"> View all </a>
             <a href="#" class="slide-nav-prev" uk-slider-item="previous"></a>
             <a href="#" class="slide-nav-next" uk-slider-item="next"></a>
           </div>
         </div>

         <!-- Tranding Videos -->

         <?php get_section('web/layout/get_trending'); ?>

       </div>

     </div>

     <div class="section-small pt-0">

       <div class="course-grid-slider" uk-slider="finite: true">

         <div class="grid-slider-header">
           <div>
             <h4 class="uk-text-truncate"> popular <a href="#" class="text-muted">Courses</a> </h4>
           </div>
           <div class="grid-slider-header-link">

             <a href="course-path.html" class="button transparent uk-visible@m"> View all </a>
             <a href="#" class="slide-nav-prev" uk-slider-item="previous"></a>
             <a href="#" class="slide-nav-next" uk-slider-item="next"></a>

           </div>
         </div>

         <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid">
           <?php foreach ($category as $value): ?>
           <li>
             <a href="<?php echo base_url(); ?>" class="skill-card">
               <i class="icon-brand-angular skill-card-icon" style="color:#dd0031"></i>
               <div>
                 <h2 class="skill-card-title"> <?php echo ucfirst($value['name']); ?> Courses</h2>
                 <p class="skill-card-subtitle"> <?php echo $value['course']; ?> courses <span class="skill-card-bullet"></span> 3
                   bundles
                 </p>
               </div>
             </a>
           </li>
           <?php endforeach; ?>
         </ul>

       </div>

     </div>

     <div class="section-small pt-0">

       <div class="course-grid-slider" uk-slider="finite: true">

         <div class="grid-slider-header">
           <div>
             <h4 class="uk-text-truncate"> Demo Videos & PDF
               <a href="#" class="text-muted">(Free Access)</a> </h4>
           </div>
           <div class="grid-slider-header-link">

             <a href="" class="button transparent uk-visible@m"> View all </a>
             <a href="#" class="slide-nav-prev" uk-slider-item="previous"></a>
             <a href="#" class="slide-nav-next" uk-slider-item="next"></a>

           </div>
         </div>

         <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" ng-controller="coursesController">
           <li ng-repeat='course in courses'>
             <a href="<?php echo base_url('resume/').'{{course.course_id}}' ?>">
               <div class="course-card">
                 <div class="course-card-thumbnail ">
                   <img class="lazyload blur-up" src="{{course.image}}">
                   <span class="play-button-trigger"></span>
                 </div>
                 <div class="course-card-body">
                   <div class="course-card-info">
                     <div>
                       <span class="catagroy">Angular</span>
                     </div>
                     <div>
                       <i class="icon-feather-bookmark icon-small"></i>
                     </div>
                   </div>
                   <h4> {{course.name}} </h4>
                   <p> {{course.slug}} </p>
                   <div class="course-card-footer">
                     <h5> <i class="icon-feather-film"></i> {{course.course_type}} level </h5>
                     <h5> <i class="icon-feather-clock"></i> 64 Hours </h5>
                   </div>
                 </div>

               </div>
             </a>

           </li>
         </ul>

       </div>

     </div>

     <!-- Footer  -->
     <?php
      get_footer();
     ?>
   </div>
 </div>

 <script type="text/javascript">
   app.controller('coursesController', function($scope, $http) {
     $scope.courses = [];
     $http.get('<?php echo base_url('courses/get_list '); ?>')
       .then(function($data) {
         $scope.courses = $data.data;
       });
   });
 </script>
