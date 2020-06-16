<ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid" ng-app="educationbourd" ng-controller="trendingController">
  <li ng-repeat='video in trending'>
    <a href="{{video.url}}">
      <div class="course-card">
        <div class="course-card-thumbnail ">
          <img class="lazyload blur-up" src="{{video.image}}">
          <span class="play-button-trigger"></span>
        </div>
        <div class="course-card-body">
          <h5> <i class="icon-feather-film"></i> {{video.name}} </h5>
        </div>

      </div>
    </a>

  </li>
</ul>


<script type="text/javascript">

  var app = angular.module('educationbourd', []);

  app.controller('trendingController', function($scope, $http){
      $scope.trending = [];
        $http.get('<?php echo base_url('web/home/get_home_trending'); ?>')
        .then(function($data){
          $scope.trending = $data.data;
        });
  });
</script>
