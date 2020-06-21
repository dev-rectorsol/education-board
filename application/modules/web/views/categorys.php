<!-- content -->
<div class="page-content">

  <div class="container">

    <h1 class="mt-5 mb-0"> Category  </h1>
    <div class="section-header mb-lg-3">
      <div class="section-header-left">

        <nav class="responsive-tab style-2">
          <ul>
            <?php if ($param == 'all'): ?>
              <li class="uk-active"><a href="<?php echo base_url('category/').str_replace(" ", "", $param) ?>"><?php echo ucfirst($param); ?></a></li>
              <?php else: ?>
                <li><a href="<?php echo base_url('category/all') ?>">All</a></li>
            <?php endif; ?>
            <?php foreach ($category as $key => $value): ?>
              <?php if ($value['name'] == $param): ?>
                <li class="uk-active"><a href="<?php echo base_url('category/').str_replace(" ", "", $value['name']) ?>"><?php echo ucfirst($value['name']); ?></a></li>
                <?php else: ?>
                  <li><a href="<?php echo base_url('category/').str_replace(" ", "", $value['name']) ?>"><?php echo ucfirst($value['name']); ?></a></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </nav>

      </div>
      <div class="section-header-right">

        <div class="display-as">
          <a href="#"><i class="icon-feather-grid"></i></a>
          <a href="#"><i class="icon-feather-square"></i></a>
          <a href="#" class="active"><i class="icon-feather-list"></i></a>
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
      <div class="uk-width-expand" ng-app="educationbourd" ng-controller="categoryController">

        <!-- Blog Post -->
        <a href="<?php echo base_url('single/') ?>{{blog.id}}" class="blog-post" ng-repeat='blog in blogs'>
          <!-- Blog Post Thumbnail -->
          <div class="blog-post-thumbnail">
            <div class="blog-post-thumbnail-inner">
              <span class="blog-item-tag">Tips</span>
              <img src="" alt="">
            </div>
          </div>
          <!-- Blog Post Content -->
          <div class="blog-post-content">
            <div class="blog-post-content-info">
              <!-- <span class="blog-post-info-tag btn btn-soft-danger"> {{blog.name}} </span> -->
              <span class="blog-post-info-date">{{blog.created}}</span>
            </div>
            <h3>{{blog.name}}</h3>
            <p ng-bind-html="blog.slug | renderHTMLCorrectly"></p>
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
  var url = '<?php echo base_url('web/home/get_categorys/').$pageparam['param'].'/'.$pageparam['page']; ?>';
  var pagination = angular.element(document.querySelector('#pagination'));
  var param = <?php echo json_encode($pageparam); ?>;
  app.controller('categoryController', function($scope, $http) {
    $scope.blogs = [];
    $http.get(url)
      .then(function($data) {
        console.log($data);
        $scope.blogs = $data.data.datas;
        pagination.html($data.data.links);
      });
  });
</script>
