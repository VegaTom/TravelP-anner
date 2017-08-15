'use strict';

angular.module('comunidadDigitalApp')
    .controller('indexRoutesCtrl', function($scope, $rootScope, $location, $translate, routeService, $q, toaster, DTOptionsBuilder, DTColumnBuilder, $compile, sweetAlertService) {

        $scope.blockActions = false;
        $scope.roles = [];
        $scope.selected = {};

        function createdRow(row) {
            // Recompiling so we can bind Angular directive to the DT
            $compile(angular.element(row).contents())($scope);
        }

        function actionsHtml(data) {
            return '<ui-select multiple ng-model="selected[\'' + data.id + '\']" theme="bootstrap" ng-disabled="blockActions" close-on-select="false" class="form-control" title="Select ROL" on-select="togglePermission(\'' + data.id + '\', $item.id)" on-remove="togglePermission(\'' + data.id + '\', $item.id)">' +
                '<ui-select-match placeholder="Select ROL">{{ $item.name | translate }}</ui-select-match>' +
                '<ui-select-choices repeat="role in roles | filter: $select.search track by role.name">' +
                '{{ role.name | translate }}' +
                '</ui-select-choices>' +
                '</ui-select>';
        }

        $scope.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
                var defer = $q.defer();
                routeService.index().promise
                    .then(function(response) {
                            $scope.roles = response.data.roles;
                            for (var i = response.data.routes.length - 1; i >= 0; i--) {
                                $scope.selected[response.data.routes[i].id] = response.data.routes[i].role_permissions;
                            };
                            defer.resolve(response.data.routes);
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
            DTColumnBuilder.newColumn('name').withTitle($translate.instant('name')).withOption('sWidth', '50%'),
            DTColumnBuilder.newColumn(null).withTitle($translate.instant('permissions')).renderWith(actionsHtml).withOption('sWidth', '50%').notSortable()
        ];

        $scope.dtInstance = {};

        $scope.togglePermission = function(route_id, role_id) {
            console.log(route_id, role_id);
            $scope.blockActions = true;
            routeService.update({ id: route_id, role_id: role_id }).promise
                .then(function(response) {
                        $scope.blockActions = false;
                        toaster.pop('success', $translate.instant('done'));
                    },
                    function(error) {
                        $scope.blockActions = false;
                        toaster.pop('error', $translate.instant('error'));
                        console.log(error);
                    });
        };


    });