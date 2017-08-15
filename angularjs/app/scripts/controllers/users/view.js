'use strict';

angular.module('comunidadDigitalApp')
    .controller('viewUserCtrl', function($scope, $rootScope, $routeParams, $location, $translate, userService, toaster) {

        $scope.blockButtons = false;
        $scope.header = 'users.view';

        $scope.formData = {};
        $scope.formData.notify = true;

        load();

        function load() {
            userService.show({ id: $routeParams.id }).promise
                .then(function(response) {
                        console.log(response);
                        $scope.formData = {
                            email: response.data.email,
                            first_name: response.data.user_profile.first_name,
                            last_name: response.data.user_profile.last_name,
                            phone: response.data.user_profile.phone,
                            photo: response.data.user_profile.photo,
                            location: response.data.user_profile.location,
                            id: response.data.id
                        };
                    },
                    function(error) {
                        toaster.pop('error', $translate.instant('error'));
                        console.log(error);
                    });
        }

        $scope.cancel = function() {
            $location.path('/users');
        };

    });