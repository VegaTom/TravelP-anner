'use strict';

angular.module('comunidadDigitalApp')
    .controller('loginCtrl', function($scope, $rootScope, $location, toaster, $translate, $timeout, authService) {

        $scope.loginData = {};
        $scope.remember = false;
        $scope.message = 'login';
        $scope.blockButton = false;

        $scope.login = function() {
            $scope.blockButton = true;
            $scope.message = 'logining';
            var data = {
                email: $scope.loginData.email,
                password: $scope.loginData.password
            };

            authService.login(data).promise
                .then(function(response) {
                    $scope.blockButton = false;
                    $scope.message = 'success';

                    toaster.pop('success', $translate.instant('done'));

                    $rootScope.$userInfo.isLogged = true;
                    $rootScope.$userInfo.full_name = response.data.user.first_name + ' ' + response.data.user.last_name;
                    $rootScope.$userInfo.location = response.data.user.location;
                    $rootScope.$userInfo.id_token = response.data.token;
                    $rootScope.$userInfo.id = response.data.user.id;
                    $rootScope.$userInfo.role = response.data.user.role;
                    $rootScope.$userInfo.remember = $scope.remember;

                    $timeout(function() {
                        $location.path('/');
                    }, 500);

                }, function(response) {
                    toaster.pop('error', response.status, response.statusText);
                    console.log(response.data.error);
                    $scope.blockButton = false;
                    $scope.message = 'login';
                });

        };
    });