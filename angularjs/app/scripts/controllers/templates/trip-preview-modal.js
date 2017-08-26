'use strict';

angular.module('travelPlannerApp')
    .controller('tripPreviewCtrl', function($scope, $uibModalInstance, parentData) {

        $scope.trip = parentData.trip;

        $scope.close = function() {
            $uibModalInstance.dismiss('close');
        };
    });
