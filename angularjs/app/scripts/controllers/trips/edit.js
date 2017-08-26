'use strict';

angular.module('travelPlannerApp')
    .controller('editTripCtrl', function($scope, $rootScope, $routeParams, $location, $translate, userService, toaster) {

        $scope.blockButtons = false;
        $scope.header = 'users.info';
        $scope.message = 'edit';
        $scope.edit = false;

        $scope.formData = {};

        load();

        function load() {
            userService.show({ id: $routeParams.id }).promise
                .then(function(response) {
                        console.log(response);
                        $scope.formData = {
                            email: response.data.data.email,
                            name: response.data.data.name,
                            id: response.data.data.id
                        };
                    },
                    function(error) {
                        toaster.pop('error', $translate.instant('error'));
                        console.log(error);
                    });
        }

        $scope.save = function(){
          if (!$scope.edit) {
            $scope.edit = true;
            $scope.message = 'save';
            $scope.header = 'users.edit';
            return;
          };

          $scope.blockButtons = true;
          userService.update($scope.formData).promise
            .then(function(response) {
                    toaster.pop('success', $translate.instant('done'));
                    $location.path('/users');
                },
                function(error) {
                    $scope.blockButtons = false;
                    $scope.errors = error.data;
                });

        };

        $scope.cancel = function() {
            $location.path('/users');
        };

    });
