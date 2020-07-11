
    <!-- content -->
    <div class="page-content">

      <div class="course-details-wrapper topic-1 uk-light pt-5">

        <div class="container p-sm-0">

          <div uk-grid>
            <div class="uk-width-2-3@m">

              <div class="course-details">
                <h1> <?php echo ucfirst($test->title); ?> </h1>
                <p> <?php echo ucfirst($test->slug); ?> </p>

                <div class="course-details-info mt-4">
                  <ul>
                    <li>
                      <div class="star-rating"><span class="avg"> 4.9 </span> <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                      </div>
                    </li>
                    <li> <i class="icon-feather-users"></i> 1200 Enerolled </li>
                  </ul>
                </div>

                <div class="course-details-info">

                  <ul>
                    <li> Created by <a href="#"> Kalka IAS Team </a> </li>
                    <li> Last updated <?php echo time_diff($test->created); ?></li>
                  </ul>

                </div>
              </div>
              <nav class="responsive-tab style-5">
                <ul uk-switcher="connect: #course-intro-tab ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                  <li><a href="#">Overview</a></li>
                </ul>
              </nav>

            </div>
          </div>

        </div>
      </div>

      <div class="container">

        <div class="uk-grid-large mt-4" uk-grid>
          <div class="uk-width-2-3@m">
            <ul id="course-intro-tab" class="uk-switcher mt-4">

              <!-- course description -->
              <li class="course-description-content">

                <h4> Description </h4>
                <?php echo $test->description; ?>

              </li>

          </ul>
          </div>

          <div class="uk-width-1-3@m">
            <div class="course-card-trailer" uk-sticky="top: 10 ;offset:95 ; media: @m ; bottom:true">

              <div class="course-thumbnail">
                <img src="<?php echo base_url($image); ?>" alt="">
              </div>

              <div class="p-3">

                <div class="uk-child-width-1-2 uk-grid-small mb-4" uk-grid>
                  <div>
                    <a href="<?php echo base_url('tstart?key='.$test->testid.'&star='.$this->session->userdata('userID')) ?>" class="uk-width-1-1 btn btn-default transition-3d-hover"> <i class="uil-play"></i> Start </a>
                  </div>
                  <div>
                    <a href="#" class="btn btn-danger uk-width-1-1 transition-3d-hover"> <i class="uil-heart"></i> Add wishlist </a>
                  </div>
                </div>

                <p class="uk-text-bold"> This Course Incluce </p>

                <div class="uk-child-width-1-2 uk-grid-small" uk-grid>
                  <div>
                    <span><i class="uil-clock"></i> <?php echo convertToHoursMins($test->duration); ?> min</span>
                  </div>
                  <div>
                    <span> <i class="uil-award"></i> Certificate </span>
                  </div>
                  <div>
                    <span> <i class="uil-file-question-alt"></i> <?php echo $test->nofqus; ?> </span>
                  </div>
                  <div>
                    <span> <i class="icon-line-awesome-level-up"></i> <?php echo $test->level; ?> </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- footer
               ================================================== -->
        <?php get_footer(); ?>



      </div>

    </div>
