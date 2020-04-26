 <div class="page-content">

<?php if (is_array($slider)): ?>
  <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay: true; autoplay-interval: 6000; pause-on-hover: true; animation: push">

     <ul class="uk-slideshow-items">
       <?php foreach ($slider as $value):?>
         <li>
         <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
           <img src="<?php echo base_url($value['source']); ?>" alt="" uk-cover>
         </div>
         <div class="uk-position-cover" uk-slideshow-parallax="opacity: 0,0,0.2; backgroundColor: #000,#000">
         </div>
         <div class="uk-position-center uk-position-medium uk-text-center">
           <div class="page-content-inner uk-position-z-index" uk-slideshow-parallax="scale: 1,1,0.8">
             <h1 uk-slideshow-parallax="x: 200,0,0"><?php echo $value['heading']; ?></h1>
             <h4 uk-slideshow-parallax="x: 200,0,0" class="my-lg-4"> <?php echo $value['details']; ?> <br>  </h4>
             <?php if ($value['buttonUrl'] != ""): ?>
               <a uk-slideshow-parallax="x: 400,0,0;" href="<?php echo $value['buttonUrl'];  ?>" class="btn btn-default"> Go More </a>
             <?php endif; ?>
           </div>
         </div>
       </li>
       <?php endforeach; ?>
     </ul>

     <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
     <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

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


     <?php if (check()): ?>
       <!-- course card resume sliders  -->
       <div class="section-small">

       <div uk-slider="finite: true" class="course-grid-slider">

         <div class="grid-slider-header">
           <div>
             <h4 class="uk-text-truncate"> Progress Courses</a>
             </h4>
           </div>
           <div class="grid-slider-header-link">

             <a href="courses.html" class="button transparent uk-visible@m"> View all </a>
             <a href="#" class="slide-nav-prev" uk-slider-item="previous"></a>
             <a href="#" class="slide-nav-next" uk-slider-item="next"></a>

           </div>
         </div>

         <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m uk-grid">
           <li>
             <a href="course-lesson-1.html">
               <div class="course-card-resume">
                 <div class="course-card-resume-thumbnail">
                   <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/course/2.png">
                 </div>
                 <div class="course-card-resume-body">
                   <h5>Angular Fundamentals From Scratch To Experts</h5>
                   <span class="number"> 3/20 </span>
                   <div class="course-progressbar">
                     <div class="course-progressbar-filler" style="width:65%"></div>
                   </div>
                 </div>
               </div>
             </a>
           </li>
           <li> <a href="course-lesson-1.html">
               <div class="course-card-resume">
                 <div class="course-card-resume-thumbnail">
                   <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/course/1.png">
                 </div>
                 <div class="course-card-resume-body">
                   <h5> Ultimate Web Designer And Developer Course </h5>
                   <span class="number"> 3/20 </span>
                   <div class="course-progressbar">
                     <div class="course-progressbar-filler" style="width:65%"></div>
                   </div>
                 </div>
               </div>
             </a>
           </li>
           <li> <a href="course-lesson-1.html">
               <div class="course-card-resume">
                 <div class="course-card-resume-thumbnail">
                   <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/course/7.png">
                 </div>
                 <div class="course-card-resume-body">
                   <h5> Bootstrap Framework From Scratch To Experts </h5>
                   <span class="number"> 3/20 </span>
                   <div class="course-progressbar">
                     <div class="course-progressbar-filler" style="width:65%"></div>
                   </div>
                 </div>
               </div>
             </a>
           </li>
           <li>
             <a href="course-lesson-1.html">
               <div class="course-card-resume">
                 <div class="course-card-resume-thumbnail">
                   <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/course/3.png">
                 </div>
                 <div class="course-card-resume-body">
                   <h5> Ultimate Web Designer And Developer Course </h5>
                   <span class="number"> 3/20 </span>
                   <div class="course-progressbar">
                     <div class="course-progressbar-filler" style="width:65%"></div>
                   </div>
                 </div>
               </div>
             </a>
           </li>
           <li>
             <a href="course-lesson-1.html">
               <div class="course-card-resume">
                 <div class="course-card-resume-thumbnail">
                   <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/course/4.png">
                 </div>
                 <div class="course-card-resume-body">
                   <h5>Angular Fundamentals From Scratch To Experts</h5>
                   <span class="number"> 3/20 </span>
                   <div class="course-progressbar">
                     <div class="course-progressbar-filler" style="width:65%"></div>
                   </div>
                 </div>
               </div>
             </a>
           </li>
           <li> <a href="course-lesson-1.html">
               <div class="course-card-resume">
                 <div class="course-card-resume-thumbnail">
                   <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/course/1.png">
                 </div>
                 <div class="course-card-resume-body">
                   <h5> Ultimate Web Designer And Developer Course </h5>
                   <span class="number"> 3/20 </span>
                   <div class="course-progressbar">
                     <div class="course-progressbar-filler" style="width:65%"></div>
                   </div>
                 </div>
               </div>
             </a>
           </li>
         </ul>

       </div>

     </div>
     <?php endif; ?>


      <div class="section-small">

        <div class="course-grid-slider" uk-slider="finite: true">

          <div class="grid-slider-header">
            <div>
              <h4 class="uk-text-truncate"> Browse Trending Videos
                <a href="episode.html" class="text-muted">Episodes</a> </h4>
            </div>
            <div class="grid-slider-header-link">

              <a href="courses.html" class="button transparent uk-visible@m"> View all </a>
              <a href="#" class="slide-nav-prev" uk-slider-item="previous"></a>
              <a href="#" class="slide-nav-next" uk-slider-item="next"></a>

            </div>
          </div>

          <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid">
            <?php foreach ($trending as $value): ?>
              <li>
              <a href="episode-details.html">
                <div class="course-card episode-card animate-this">
                  <div class="course-card-thumbnail ">
                    <span class="item-tag">HTML</span>
                    <?php if ($value['image']): ?>
                        <img class="lazyload blur-up" src="<?php echo base_url($value['image']);  ?>">
                      <?php else: ?>
                        <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/defult_banner.jpg">
                    <?php endif; ?>
                    <span class="play-button-trigger"></span>
                  </div>
                  <div class="course-card-body">
                    <h4 class="mb-0"> <?php echo ucfirst($value['name']); ?> </h4>
                  </div>
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
             <h4 class="uk-text-truncate"> popular <a href="#" class="text-muted">Topics</a> </h4>
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
             <h4 class="uk-text-truncate"> Browse Web Development
               <a href="#" class="text-muted">Courses</a> </h4>
           </div>
           <div class="grid-slider-header-link">

             <a href="courses.html" class="button transparent uk-visible@m"> View all </a>
             <a href="#" class="slide-nav-prev" uk-slider-item="previous"></a>
             <a href="#" class="slide-nav-next" uk-slider-item="next"></a>

           </div>
         </div>

         <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid">
           <li>
             <a href="course-intro.html">
               <div class="course-card">
                 <div class="course-card-thumbnail ">
                   <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/course/2.png">
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
                   <h4>Learn Angular Fundamentals </h4>
                   <p> Learn how to build and launch React web applications with .. </p>
                   <div class="course-card-footer">
                     <h5> <i class="icon-feather-film"></i> 12 Lectures </h5>
                     <h5> <i class="icon-feather-clock"></i> 64 Hours </h5>
                   </div>
                 </div>

               </div>
             </a>

           </li>
           <li>
             <a href="course-intro.html">
               <div class="course-card">
                 <div class="course-card-thumbnail ">
                   <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/course/3.png">
                   <span class="play-button-trigger"></span>
                 </div>
                 <div class="course-card-body">
                   <div class="course-card-info">
                     <div>
                       <span class="catagroy">JavaScript</span>
                     </div>
                     <div>
                       <i class="icon-feather-bookmark icon-small"></i>
                     </div>
                   </div>
                   <h4>The Complete JavaScript </h4>
                   <p> JavaScript is how you build interactivity on the web.. </p>
                   <div class="course-card-footer">
                     <h5> <i class="icon-feather-film"></i> 14 Lectures </h5>
                     <h5> <i class="icon-feather-clock"></i> 55 Hours </h5>
                   </div>
                 </div>

               </div>
             </a>

           </li>
           <li>
             <a href="course-intro.html">
               <div class="course-card">
                 <div class="course-card-thumbnail ">
                   <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/course/1.png">
                   <span class="play-button-trigger"></span>
                 </div>
                 <div class="course-card-body">
                   <div class="course-card-info">
                     <div>
                       <span class="catagroy">HTML</span>
                     </div>
                     <div>
                       <i class="icon-feather-bookmark icon-small"></i>
                     </div>
                   </div>

                   <h4>Ultimate Web Developer Course </h4>
                   <p> HTML is the building blocks of the web. It gives pages structure .
                   </p>

                   <div class="course-card-footer">
                     <h5> <i class="icon-feather-film"></i> 33 Lectures </h5>
                     <h5> <i class="icon-feather-clock"></i> 26 Hours </h5>
                   </div>
                 </div>

               </div>
             </a>

           </li>
           <li>
             <a href="course-intro.html">
               <div class="course-card">
                 <div class="course-card-thumbnail ">
                   <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/course/6.png">
                   <span class="play-button-trigger"></span>
                 </div>
                 <div class="course-card-body">
                   <div class="course-card-info">
                     <div>
                       <span class="catagroy">HTML</span>
                     </div>
                     <div>
                       <i class="icon-feather-bookmark icon-small"></i>
                     </div>
                   </div>
                   <h4>Learn Modern HTML &amp; CSS </h4>
                   <p> HTML is the building blocks of the web. It gives pages structure.. </p>

                   <div class="course-card-footer">
                     <h5> <i class="icon-feather-film"></i> 16 Lectures </h5>
                     <h5> <i class="icon-feather-clock"></i> 52 Hours </h5>
                   </div>
                 </div>

               </div>
             </a>
           </li>
           <li>
             <a href="course-intro.html">
               <div class="course-card">
                 <div class="course-card-thumbnail ">
                   <img class="lazyload blur-up" src="<?php echo base_url()?>/assets/images/course/5.png">
                   <span class="play-button-trigger"></span>
                 </div>
                 <div class="course-card-body">
                   <div class="course-card-info">
                     <div>
                       <span class="catagroy">HTML</span>
                     </div>
                     <div>
                       <i class="icon-feather-bookmark icon-small"></i>
                     </div>
                   </div>

                   <h4>Ultimate Web Developer Course </h4>
                   <p> HTML is the building blocks of the web. It gives pages structure.
                   </p>

                   <div class="course-card-footer">
                     <h5> <i class="icon-feather-film"></i> 34 Lectures </h5>
                     <h5> <i class="icon-feather-clock"></i> 54 Hours </h5>
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
