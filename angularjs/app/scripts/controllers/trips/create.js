'use strict';

angular.module('travelPlannerApp')
    .controller('createTripCtrl', function($scope, $rootScope, $routeParams, $location, $translate, tripService, toaster) {

        $scope.blockButtons = false;
        $scope.header = 'trips.info';
        $scope.edit = true;

        $scope.formData = {};

        $scope.save = function(){
          var data = {
            destination: $scope.formData.destination,
            start_date: moment($scope.formData.start_date).format('YYYY-MM-DDTHH:mm:ssZ'),
            end_date: moment($scope.formData.end_date).format('YYYY-MM-DDTHH:mm:ssZ'),
            comment: $scope.formData.comment
          };

          $scope.blockButtons = true;

          tripService.store(data).promise
            .then(function(response) {
                toaster.pop('success', $translate.instant('done'));
                $location.path('/trips');
            },
            function(error) {
                $scope.blockButtons = false;
                $scope.errors = error.data;
            });

        };

        $scope.cancel = function() {
            $location.path('/trips');
        };

    });
