'use strict';

angular.module('travelPlannerApp')
    .controller('registerCtrl', function($scope, $rootScope, $location, toaster, $translate, $timeout, authService) {

        $scope.loginData = {};
        $scope.remember = false;
        $scope.message = 'register';
        $scope.blockButton = false;

        $scope.login = function() {
            $scope.blockButton = true;
            $scope.message = 'registering';
            var data = {
                email: $scope.loginData.email,
                name: $scope.loginData.name,
                password: $scope.loginData.password,
                password_confirmation: $scope.loginData.password_confirmation
            };

            authService.register(data).promise
                .then(function(response) {
                    $scope.blockButton = false;
                    $scope.message = 'success';

                    toaster.pop('success', $translate.instant('done'));

                    $rootScope.$userInfo.isLogged = true;
                    $rootScope.$userInfo.id = response.data.data.id;
                    $rootScope.$userInfo.name = response.data.data.name;
                    $rootScope.$userInfo.id_token = response.data.meta.token;
                    $rootScope.$userInfo.roles = response.data.data.roles.data.map(function(role) {
                      return role.level;
                    });
                    $rootScope.$userInfo.remember = $scope.remember;

                    $timeout(function() {
                        $location.path('/');
                    }, 500);

                }, function(response) {
                    console.log(response);
                    $scope.blockButton = false;
                    $scope.message = 'register';
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
