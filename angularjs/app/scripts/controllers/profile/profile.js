'use strict';

angular.module('travelPlannerApp')
    .controller('profileCtrl', function($scope, $rootScope, $localStorage, $routeParams, $translate, $location, userService, toaster) {

        $scope.blockButtons = false;
        $scope.header = 'profile';

        $scope.formData = {

        };

        $scope.back = function(){
          window.history.back();
        }

        load();

        function load() {
            userService.show({ id: $rootScope.$userInfo.id }).promise
                .then(function(response) {
                        $scope.formData = {
                            id: response.data.data.id,
                            name: response.data.data.name,
                            email: response.data.data.email,
                        };
                    },
                    function(error) {
                        toaster.pop('error', $translate.instant('error'));
                        console.log(error);
                    });
        }

        $scope.cancel = function() {
            load();
        };

        $scope.save = function() {
            userService.update($scope.formData).promise
                .then(function(response) {
                        toaster.pop('success', $translate.instant('done'));
                        $localStorage.name = response.data.data.name;
                    },
                    function(error) {
                        $scope.errors = error.data;
                    });
        };

    });
