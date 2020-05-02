<div uk-sticky="media :@m ; bottom: true ; offset:16" ng-controller="relatedController">

  <h4> Related Tutorials </h4>

  <a href="{{relateddata.url}}" ng-repeat='relateddata in related'>
    <div class="course-card episode-card animate-this mb-3">
      <div class="course-card-thumbnail ">
        <span class="item-tag" ng-if="key !== 0" ng-repeat='(key, value) in relateddata.category'>{{value}}</span>
        <img src="{{relateddata.image}}">
        <span class="play-button-trigger"></span>
      </div>
      <div class="course-card-body">
        <h4 class="mb-0"> {{relateddata.name}} </h4>
      </div>
    </div>
  </a>

</div>

<script type="text/javascript">
  app.controller('relatedController', function($scope, $http){
      $scope.related = [];
        $http.get('<?php echo base_url('web/trending/get_related/') . $type . "/" . $node; ?>')
        .then(function($data){
          $scope.related = $data.data;
        });
  });

</script>
