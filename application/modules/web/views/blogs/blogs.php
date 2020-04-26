<!-- content -->
<div class="page-content">

  <div class="container">

    <h1> Blogs </h1>

    <h4> Featured Posts </h4>

    <div class="uk-child-width-1-2@m uk-grid-match uk-grid-small" uk-grid>
      <?php foreach ($featured as $key => $value): ?>
        <?php if ($key < 1): ?>
          <div>
            <a href="<?php echo base_url('single/').$value['postid']; ?>" class="uk-flex">
              <div data-src="<?php echo base_url().$value['image']; ?>" class="uk-card-default uk-background-cover rounded uk-flex uk-flex-bottom" uk-img>
                <div class="uk-light p-3 my-3">
                  <h2><?php echo ucfirst($value['title']); ?></h2>
                  <p>
                    <?php echo $value['slug']; ?>
                  </p>
                </div>
              </div>
            </a>
          </div>
          <?php else: ?>
        <?php endif; ?>
      <?php endforeach; ?>
      <div>
        <div class="uk-child-width-1-2@m uk-grid-small uk-card-match" uk-grid>
          <div> <a href="#">
            <div class="uk-card-default rounded uk-overflow-hidden">
              <img src="<?php echo base_url(); ?>/assets/images/blog/img-1.jpg" alt="">
              <div class="p-3">
                <h5 class="mb-0">10 amazing web demos and experiments for 2020 </h5>
              </div>
            </div>
          </a>
        </div>
        <div><a href="#">
          <div class="uk-card-default rounded uk-overflow-hidden">
            <img src="<?php echo base_url(); ?>/assets/images/blog/img-2.jpg" alt="" class="uk-width-1-1">
            <div class="p-3">
              <h5 class="mb-0">10 Awesome Web Dev Tools and Resources </h5>
            </div>
          </div>
        </a>
      </div>
      <div><a href="#">
        <div class="uk-card-default rounded uk-overflow-hidden">
          <img src="<?php echo base_url(); ?>/assets/images/blog/img-3.jpg" alt="">
          <div class="p-3">
            <h5 class="mb-0">10 Interesting JavaScript and CSS Libraries </h5>
          </div>
        </div>
      </a>
    </div>
    <div><a href="#">
      <div class="uk-card-default rounded uk-overflow-hidden">
        <img src="<?php echo base_url(); ?>/assets/images/blog/img-4.jpg" alt="">
        <div class="p-3">
          <h5 class="mb-0">10 Interesting JavaScript and CSS libraries for 2020 </h5>
        </div>
      </div>
    </a>
  </div>
</div>
</div>
    </div>

    <h3 class="mt-5 mb-0"> Category </h3>
    <div class="section-header mb-lg-3">
      <div class="section-header-left">

        <nav class="responsive-tab style-2">
          <ul>
            <li class="uk-active"><a href="#">JavaScript</a></li>
            <li><a href="#">CSS</a></li>
            <li><a href="#">HTML</a></li>
            <li><a href="#">Freebie</a></li>
            <li><a href="#">Resources</a></li>
          </ul>
        </nav>

      </div>
      <div class="section-header-right">

        <div class="display-as">
          <a href="blog-card.html"><i class="icon-feather-grid"></i></a>
          <a href="blog-2.html"><i class="icon-feather-square"></i></a>
          <a href="blog-1.html" class="active"><i class="icon-feather-list"></i></a>
        </div>

        <select class="selectpicker ml-3">
          <option value=""> Newest </option>
          <option value="1">Popular</option>
          <option value="2">Free</option>
          <option value="3">Premium</option>
        </select>

        <!-- Custom select structure -->

      </div>
    </div>

    <div class="uk-grid-large" uk-grid>
      <div class="uk-width-expand">

        <!-- Blog Post -->
        <a href="blog-single-1.html" class="blog-post">
          <!-- Blog Post Thumbnail -->
          <div class="blog-post-thumbnail">
            <div class="blog-post-thumbnail-inner">
              <span class="blog-item-tag">Tips</span>
              <img src="<?php echo base_url(); ?>/assets/images/blog/img-1.jpg" alt="">
            </div>
          </div>
          <!-- Blog Post Content -->
          <div class="blog-post-content">
            <span class="blog-post-date">22 July 2020</span>
            <h3>10 amazing web demos and experiments For Developers</h3>
            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id
              quod mazim placerat facer possim tempor cum soluta nobis</p>
          </div>
        </a>

        <!-- Blog Post -->
        <a href="blog-single-1.html" class="blog-post">
          <!-- Blog Post Thumbnail -->
          <div class="blog-post-thumbnail">
            <div class="blog-post-thumbnail-inner">
              <span class="blog-item-tag">Tools</span>
              <img src="<?php echo base_url(); ?>/assets/images/blog/img-2.jpg" alt="">
            </div>
          </div>
          <!-- Blog Post Content -->
          <div class="blog-post-content">
            <span class="blog-post-date">12 MAy 2020</span>
            <h3>10 Awesome Web Dev Tools and Resources For 2020</h3>
            <p>Nam liber tempor cum soluta nobis nihil imperdiet doming id tempor cum soluta nobis
              quod mazim placerat facer possim soluta nobis eleifend assum</p>
          </div>
        </a>

        <!-- Blog Post -->
        <a href="blog-single-1.html" class="blog-post">
          <!-- Blog Post Thumbnail -->
          <div class="blog-post-thumbnail">
            <div class="blog-post-thumbnail-inner">
              <img src="<?php echo base_url(); ?>/assets/images/blog/img-3.jpg" alt="">
            </div>
          </div>
          <!-- Blog Post Content -->
          <div class="blog-post-content">
            <div class="blog-post-content-info">
              <span class="blog-post-info-tag btn btn-soft-danger"> Softwares </span>
              <span class="blog-post-info-date">10 June</span>
            </div>
            <h3>10 Interesting JavaScript and CSS Libraries for November 2020 </h3>
            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id
              quod mazim placerat facer possim assum tempor cum soluta nobis</p>
          </div>
        </a>

        <!-- Blog Post -->
        <a href="blog-single-1.html" class="blog-post">
          <!-- Blog Post Thumbnail -->
          <div class="blog-post-thumbnail">
            <div class="blog-post-thumbnail-inner">
              <img src="<?php echo base_url(); ?>/assets/images/blog/img-4.jpg" alt="">
            </div>
          </div>
          <!-- Blog Post Content -->
          <div class="blog-post-content">
            <div class="blog-post-content-info">
              <span class="blog-post-info-tag btn btn-soft-primary"> Programming </span>
              <span class="blog-post-info-date">10 June</span>
            </div>
            <h3>10 Interesting JavaScript and CSS libraries for 2020 </h3>
            <p>Nam liber tempor cum soluta nobis nihil imperdiet doming id tempor cum soluta nobis
              quod mazim placerat facer possim soluta nobis eleifend assum</p>
          </div>
        </a>

        <ul class="uk-pagination my-5 uk-flex-center" uk-margin>
          <li class="uk-active"><span>1</span></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li class="uk-disabled"><span>...</span></li>
          <li><a href="#"><span uk-pagination-next></span></a></li>
        </ul>

      </div>
      <div class="uk-width-1-3@s">

        <div class="uk-card-default rounded uk-overflow-hidden">
          <div class="p-4 text-center">

            <h4 class="uk-text-bold"> Subsicribe </h4>
            <p> Get the Latest Posts and Article for us On Your Email</p>

            <form class="mt-3">
              <input type="text" class="uk-input uk-form-small" placeholder="Enter your email address">
              <input type="submit" value="Subscirbe" class="btn btn-default btn-block mt-3">
            </form>

          </div>
        </div>

        <div class="uk-card-default rounded mt-4">

          <ul class="uk-child-width-expand uk-tab" uk-switcher="animation: uk-animation-fade">
            <li><a href="#">Newest</a></li>
            <li><a href="#">Popular</a></li>
          </ul>

          <ul class="uk-switcher">
            <!-- tab 1 -->
            <li>
              <div class="py-3 px-4">

                <div class="uk-grid-small" uk-grid>
                  <div class="uk-width-expand">
                    <p> Overview of SQL Commands and PDO </p>
                  </div>
                  <div class="uk-width-1-3">
                    <img src="<?php echo base_url(); ?>/assets/images/blog/img-3.jpg" alt="" class="rounded-sm">
                  </div>
                </div>
                <div class="uk-grid-small" uk-grid>
                  <div class="uk-width-expand">
                    <p> Writing a Simple MVC App in Plain </p>
                  </div>
                  <div class="uk-width-1-3">
                    <img src="<?php echo base_url(); ?>/assets/images/blog/img-2.jpg" alt="" class="rounded-sm">
                  </div>
                </div>
                <div class="uk-grid-small" uk-grid>
                  <div class="uk-width-expand">
                    <p> How to Create and Use Bash Scripts </p>
                  </div>
                  <div class="uk-width-1-3">
                    <img src="<?php echo base_url(); ?>/assets/images/blog/img-3.jpg" alt="" class="rounded-sm">
                  </div>
                </div>

              </div>
            </li>

            <!-- tab 2 -->
            <li>
              <div class="py-3 px-4">

                <div class="uk-grid-small" uk-grid>
                  <div class="uk-width-expand">
                    <p> Overview of SQL Commands and PDO </p>
                  </div>
                  <div class="uk-width-1-3">
                    <img src="<?php echo base_url(); ?>/assets/images/blog/img-3.jpg" alt="" class="rounded-sm">
                  </div>
                </div>
                <div class="uk-grid-small" uk-grid>
                  <div class="uk-width-expand">
                    <p> Writing a Simple MVC App in Plain </p>
                  </div>
                  <div class="uk-width-1-3">
                    <img src="<?php echo base_url(); ?>/assets/images/blog/img-2.jpg" alt="" class="rounded-sm">
                  </div>
                </div>
                <div class="uk-grid-small" uk-grid>
                  <div class="uk-width-expand">
                    <p> How to Create and Use Bash Scripts </p>
                  </div>
                  <div class="uk-width-1-3">
                    <img src="<?php echo base_url(); ?>/assets/images/blog/img-3.jpg" alt="" class="rounded-sm">
                  </div>
                </div>

              </div>
            </li>
          </ul>

        </div>

        <h4 class="mt-4"> Tags </h4>
        <div uk-margin>
          <a href="#" class="btn btn-small btn-light">#Webdesing</a>
          <a href="#" class="btn btn-small btn-light">#Business</a>
          <a href="#" class="btn btn-small btn-light">#Programming</a>
          <a href="#" class="btn btn-small btn-light">#Hacking</a>
        </div>


      </div>
    </div>


    <!-- Footer  -->
    <?php
     get_footer();
    ?>

  </div>

</div>
