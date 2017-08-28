'use strict';

angular.module('travelPlannerApp')
    .controller('indexUsersCtrl', function($scope, $rootScope, $location, $translate, userService, $q, ROLES, toaster, DTOptionsBuilder, DTColumnBuilder, $compile, sweetAlertService) {

        $scope.blockActions = false;

        function createdRow(row) {
            // Recompiling so we can bind Angular directive to the DT
            $compile(angular.element(row).contents())($scope);
        }

        function isAdmin(user){
          return user.roles.data.filter(function(role) {
            return role.level === ROLES.ADMIN;
          }).length > 0;
        }

        function actionsHtml(data) {
            return  '<a ng-if="adminAccess" uib-tooltip="' + $translate.instant('toggle_admin_role') + '" ng-disabled="blockActions" ng-click="toggleAdminRole(\'' + data.id + '\')"><img src="images/svg/user-2.svg"></a>' +
                    '<a ng-if="' + !isAdmin(data) + '" uib-tooltip="' + $translate.instant('edit') + '" ng-disabled="blockActions" ng-click="edit(\'' + data.id + '\')"><img src="images/svg/edit.svg"></a>' +
                    '<a ng-if="' + !isAdmin(data) + '" uib-tooltip="' + $translate.instant('delete') + '" ng-disabled="blockActions" ng-click="destroy(\'' + data.id + '\')"><img src="images/svg/trash.svg"></a>';
        }

        function registerDate(date) {
            return moment(date).format('DD/MM/YYYY');
        }

        function roles(user){
          return user.roles.data.map(function(role) {
            return '<img style="width: 20px;" uib-tooltip="' + $translate.instant(role.name) + '" src="images/svg/role-' + role.level + '.svg">';
          });
        }

        $scope.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
                var defer = $q.defer();
                userService.index().promise
                    .then(function(response) {
                            defer.resolve(response.data.data);
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
            DTColumnBuilder.newColumn('name').withTitle($translate('name')).withOption('sWidth', '25%'),
            DTColumnBuilder.newColumn('email').withTitle($translate('email')).withOption('sWidth', '35%'),
            DTColumnBuilder.newColumn('created_at').withTitle($translate('register_date')).renderWith(registerDate).withOption('sWidth', '20%'),
            DTColumnBuilder.newColumn(null).withTitle($translate('roles')).renderWith(roles).withOption('sWidth', '10%'),
            DTColumnBuilder.newColumn(null).withTitle($translate('action')).renderWith(actionsHtml).withClass('text-center actions').withOption('sWidth', '10%').notSortable()
        ];

        $scope.dtInstance = {};

        $scope.edit = function(id) {
            $location.path('/users/edit/' + id);
        };

        $scope.destroy = function(id) {
            sweetAlertService.confirm({ title: $translate.instant('users.question_delete'), type: 'warning' }, function(isConfirm) {
                if (isConfirm) {
                    destroy(id);
                }
            });
        };

        $scope.toggleAdminRole = function(id) {
          toggleAdminRole(id);
        }

        function toggleAdminRole(id) {
            $scope.blockActions = true;
            userService.toggleAdminRole({ id: id }).promise
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
