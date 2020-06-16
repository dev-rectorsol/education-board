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
      <div>
        <div class="uk-child-width-1-2@m uk-grid-small uk-card-match" uk-grid>
          <div>
            <a href="#">
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
      <?php endif; ?>
      <?php endforeach; ?>

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
      <div class="uk-width-expand" ng-app="educationbourd" ng-controller="blogController">

        <!-- Blog Post -->
        <a href="<?php echo base_url('single/') ?>{{blog.postid}}" class="blog-post" ng-repeat='blog in blogs'>
          <!-- Blog Post Thumbnail -->
          <div class="blog-post-thumbnail">
            <div class="blog-post-thumbnail-inner">
              <span class="blog-item-tag">Tips</span>
              <img src="{{blog.image}}" alt="">
            </div>
          </div>
          <!-- Blog Post Content -->
          <div class="blog-post-content">
            <div class="blog-post-content-info">
              <span class="blog-post-info-tag btn btn-soft-danger"> {{blog.title}} </span>
              <span class="blog-post-info-date">{{blog.created}}</span>
            </div>
            <h3>{{blog.title}}</h3>
            <p ng-bind-html="blog.content | renderHTMLCorrectly"></p>
          </div>
        </a>

        <ul class="uk-pagination my-5 uk-flex-center" uk-margin id="pagination"></ul>


      </div>
      <?php get_sidebar('web/blogs/sidebar'); ?>
    </div>

    <!-- Footer  -->
    <?php
     get_footer();
    ?>

  </div>

</div>

<script type="text/javascript">
  var url = '<?php echo base_url('blog/get_list/').$page; ?>';
  var pagination = angular.element(document.querySelector('#pagination'));
  app.controller('blogController', function($scope, $http) {
    $scope.blogs = [];
    $http.get(url)
      .then(function($data) {
        $scope.blogs = $data.data.blogs;
        pagination.html($data.data.links);
      });
  });
</script>
