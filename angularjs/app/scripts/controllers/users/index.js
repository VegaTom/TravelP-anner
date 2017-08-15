'use strict';

angular.module('comunidadDigitalApp')
    .controller('indexUsersCtrl', function($scope, $rootScope, $location, $translate, userService, $q, toaster, DTOptionsBuilder, DTColumnBuilder, $compile, sweetAlertService) {

        $scope.blockActions = false;

        function createdRow(row) {
            // Recompiling so we can bind Angular directive to the DT
            $compile(angular.element(row).contents())($scope);
        }

        function actionsHtml(data) {
            return '<a ng-if="' + (data.user_role[0].level > 0) + '" uib-tooltip="' + $translate.instant('delete') + '" ng-disabled="blockActions" ng-click="destroy(\'' + data.id + '\')"><img src="images/svg/trash.svg"></a>' +
                '<a ng-disabled="blockActions" uib-tooltip="' + $translate.instant('view') + '" ng-click="view(\'' + data.id + '\')"><img src="images/svg/go.svg"></a>';
        }

        function registerDate(date) {
            return moment(date).format('DD/MM/YYYY');
        }

        $scope.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
                var defer = $q.defer();
                userService.index().promise
                    .then(function(response) {
                            defer.resolve(response.data);
                        },
                        function(error) {
                            toaster.pop('error', $translate.instant('error'));
                            console.log(error);
                            defer.resolve([]);
                        });
                return defer.promise;
            })
            .withPaginationType('full_numbers')
            .withDOM('frtip')
            .withOption('createdRow', createdRow)
            .withLanguage(datatable_es);

        $scope.dtColumns = [
            DTColumnBuilder.newColumn('name').withTitle($translate('name')).withOption('sWidth', '20%'),
            DTColumnBuilder.newColumn('email').withTitle($translate('email')).withOption('sWidth', '35%'),
            DTColumnBuilder.newColumn('created_at').withTitle($translate('register_date')).renderWith(registerDate).withOption('sWidth', '20%'),
            DTColumnBuilder.newColumn(null).withTitle($translate('action')).renderWith(actionsHtml).withClass('text-center actions').withOption('sWidth', '10%').notSortable()
        ];

        $scope.dtInstance = {};

        $scope.view = function(id) {
            $location.path('/users/' + id);
        };

        $scope.destroy = function(id) {
            sweetAlertService.confirm({ title: $translate.instant('users.question_delete'), type: 'warning' }, function(isConfirm) {
                if (isConfirm) {
                    destroy(id);
                }
            });
        };

        function destroy(id) {
            $scope.blockActions = true;
            userService.destroy({ id: id }).promise
                .then(function(response) {
                        $scope.blockActions = false;
                        toaster.pop('success', $translate.instant('done'));
                        $scope.dtInstance.reloadData();
                    },
                    function(error) {
                        $scope.blockActions = false;
                        toaster.pop('error', $translate.instant('error'));
                        console.log(error);
                    });
        }


    });