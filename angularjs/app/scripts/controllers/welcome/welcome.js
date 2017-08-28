'use strict';

angular.module('travelPlannerApp')
    .controller('welcomeCtrl', function($scope, $rootScope, $localStorage, $routeParams, $translate, $location, tripService, toaster) {

        $scope.trips = [];

        tripsNextMonth();

        function tripsNextMonth(){
          tripService.nextMonth().promise
            .then(function(response) {
                    $scope.trips = response.data.data;
                },
                function(error) {
                    toaster.pop('error', $translate.instant('error'));
                    console.log(error);
                });
        }

        $scope.date = function(date) {
            return moment(date).parseZone().local().format('DD/MM/YYYY h:mm a');
        }

        $scope.color = function(){
          var color = Math.floor(Math.random() * 3) + 1;
          switch (color){
            case 1: return 'lazur-bg';
            case 2: return 'yellow-bg';
            case 3: return 'red-bg';
          }
        }

        $scope.rotation = function(){
          var rotation = Math.floor(Math.random() * 2) + 1;
          return 'rotate-' + rotation;
        }



    });
