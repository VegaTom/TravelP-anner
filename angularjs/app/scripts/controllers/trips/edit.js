'use strict';

angular.module('travelPlannerApp')
    .controller('editTripCtrl', function($scope, $rootScope, $routeParams, $location, $translate, tripService, toaster) {

        $scope.blockButtons = false;
        $scope.header = 'trips.info';

        $scope.formData = {};

        load();

        function load() {
            tripService.show({ id: $routeParams.id }).promise
                .then(function(response) {
                        $scope.formData = {
                            id: response.data.data.id,
                            destination: response.data.data.destination,
                            start_date: moment(response.data.data.start_date).parseZone().local().toDate(),
                            end_date: moment(response.data.data.end_date).parseZone().local().toDate(),
                            comment: response.data.data.comment
                        };

                    },
                    function(error) {
                        toaster.pop('error', $translate.instant('error'));
                        console.log(error);
                    });
        }

        $scope.save = function(){
          var data = {
            id: $scope.formData.id,
            destination: $scope.formData.destination,
            start_date: moment($scope.formData.start_date).format('YYYY-MM-DDTHH:mm:ssZ'),
            end_date: moment($scope.formData.end_date).format('YYYY-MM-DDTHH:mm:ssZ'),
            comment: $scope.formData.comment
          };

          $scope.blockButtons = true;
          tripService.update(data).promise
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
