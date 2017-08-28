'use strict';

angular.module('travelPlannerApp')
    .controller('tripPreviewCtrl', function($scope, $uibModalInstance, parentData) {

        $scope.trip = JSON.parse(unescape(parentData.trip));

        console.log($scope.trip);

        $scope.close = function() {
            $uibModalInstance.dismiss('close');
        };
    });
