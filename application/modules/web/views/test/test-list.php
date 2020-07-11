<div class="page-content">

  <div class="container">

    <h1> Test Series </h1>

    <h4> Kalka Ias Zone <a href="#" class="text-muted">Online Test</a> </h4>

    <div class="section-header mb-4">
      <div class="section-header-left">
        <nav class="responsive-tab style-4">
          <ul>
            <?php if ($param == 'all' || $param == ''): ?>
              <li class="uk-active"><a href="<?php echo base_url('test/').strtolower(str_replace(" ", "", $param)) ?>"><?php echo ucfirst('All'); ?></a></li>
              <?php else: ?>
                <li><a href="<?php echo base_url('test/') ?>">All</a></li>
            <?php endif; ?>
            <?php foreach ($levels as $value): ?>
              <?php if (strtolower($value['name']) == $param): ?>
                <li class="uk-active"><a href="<?php echo base_url('test/').strtolower(str_replace(" ", "", $value['name'])) ?>"><?php echo ucfirst($value['name']); ?></a></li>
                <?php else: ?>
                  <li><a href="<?php echo base_url('test/').strtolower(str_replace(" ", "", $value['name'])) ?>"><?php echo ucfirst($value['name']); ?></a></li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </nav>
      </div>
      <div class="section-header-right">

        <div class="display-as">
          <a href="#" uk-tooltip="title: Course list; pos: top-right">
            <i class="icon-feather-list"></i></a>
          <a href="#" class="active" uk-tooltip="title: Course Grid; pos: top-right">
            <i class="icon-feather-grid"></i></a>
        </div>

        <select class="selectpicker ml-3">
          <option value="2">Free</option>
          <option value="3">Premium</option>
        </select>

      </div>
    </div>

    <div class="uk-grid-large" uk-grid>
      <div class="uk-width-3-4@m" ng-app="educationbourd" ng-controller="testController">

          <div class="course-card course-card-list" ng-repeat='test in tests'>
            <div class="course-card-thumbnail">
              <img src="{{test.image}}">
            </div>
            <div class="course-card-body">
              <a href="<?php echo base_url('test/show/').'{{test.testid}}' ?>">
                <h4>{{test.title}}</h4>
              </a>
              <p>{{test.slug}}</p>
              <div class="course-details-info">
                <ul>
                  <li> <i class="icon-feather-sliders"></i> {{test.level}} level </li>
                  <li> <a href=""> {{test.created}} </a> </li>
                  <li>
                    <div class="star-rating"><span class="avg"> 4.8 </span> <span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span>
                    </div>
                  </li>
                </ul>
              </div>

            </div>
          </div>

        <!-- pagination menu -->
        <ul class="uk-pagination my-5 uk-flex-center" uk-margin id="pagination"> </ul>

      </div>
      <!-- Add filter -->
    </div>

    <!-- footer
           ================================================== -->
    <?php get_footer(); ?>


  </div>

</div>


<script type="text/javascript">

var url = '<?php echo $url; ?>';
var pagination = angular.element(document.querySelector('#pagination'));
app.controller('testController', function($scope, $http){
    $scope.tests = [];
      $http.get(url)
      .then(function($data){
        $scope.tests = $data.data.products;
        pagination.html($data.data.links);

      });
});
</script>
