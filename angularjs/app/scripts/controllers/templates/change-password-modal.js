'use strict';

angular.module('travelPlannerApp')
    .controller('changePasswordModalCtrl', function($scope, $uibModalInstance, parentData, passwordService, toaster, $translate) {

        $scope.blockButtons = false;
        $scope.formData = {
            id: parentData.id,
            password: '',
            password_confirmation: ''
        };
        $scope.errors = {};

        $scope.ok = function() {
            $scope.errors = {};
            $scope.blockButtons = true;
            passwordService.change($scope.formData).promise
                .then(function(response) {
                        toaster.pop('success', $translate.instant('done'));
                        $uibModalInstance.close(true);
                    },
                    function(error) {
                        $scope.errors = error.data;
                        $scope.blockButtons = false;
                    });
        };

        $scope.cancel = function() {
            $uibModalInstance.dismiss('cancel');
        };
    });
