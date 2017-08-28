'use strict';

angular.module('travelPlannerApp')
    .controller('forgotCtrl', function($scope, $rootScope, $location, toaster, $translate, $timeout, authService) {

        $scope.loginData = {};
        $scope.remember = false;
        $scope.message = 'password_recovery';
        $scope.blockButton = false;

        $scope.login = function() {
            $scope.blockButton = true;
            $scope.message = 'recovering';
            var data = {
                email: $scope.loginData.email,
            };

            authService.forgot(data).promise
                .then(function(response) {
                    // $scope.blockButton = false;
                    $scope.message = 'success';

                    toaster.pop('success', $translate.instant('forgot_success'));
                    $scope.loginData = {};

                }, function(response) {
                    $scope.blockButton = false;
                    $scope.message = 'password_recovery';
                    if (response.status == 401) {
                      toaster.pop('error', $translate.instant('error'), response.data.error.message);
                    };
                    if (response.status == 422) {
                      angular.forEach(response.data, function(messages, field) {
                        toaster.pop('error', $translate.instant(field), messages.shift());
                      });
                    }
                });

        };
    });
