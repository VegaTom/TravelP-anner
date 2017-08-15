'use strict';

angular.module('comunidadDigitalApp')
    .controller('changePasswordModalCtrl', function($scope, $uibModalInstance, parentData, adminService, toaster, $translate) {

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
            adminService.update($scope.formData).promise
                .then(function(response) {
                        console.log(response);
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