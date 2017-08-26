'use strict';

angular.module('travelPlannerApp')
    .controller('indexTripsCtrl', function($scope, $rootScope, $location, $translate, tripService, userService, $q, ROLES, toaster, DTOptionsBuilder, DTColumnBuilder, $compile, sweetAlertService) {

        $scope.blockActions = false;
        $scope.dates = {};

        function createdRow(row) {
            // Recompiling so we can bind Angular directive to the DT
            $compile(angular.element(row).contents())($scope);
        }

        function actionsHtml(data) {
            return  '<a uib-tooltip="' + $translate.instant('view') + '" ng-disabled="blockActions" ng-click="view(\'' + data.id + '\')"><img src="images/svg/eye-on.svg"></a>' +
                    '<a uib-tooltip="' + $translate.instant('edit') + '" ng-disabled="blockActions" ng-click="edit(\'' + data.id + '\')"><img src="images/svg/edit.svg"></a>' +
                    '<a uib-tooltip="' + $translate.instant('delete') + '" ng-disabled="blockActions" ng-click="destroy(\'' + data.id + '\')"><img src="images/svg/trash.svg"></a>';
        }

        function date(date) {
            return moment(date).parseZone().local().format('DD/MM/YYYY h:mm a');
        }

        function timeLeft(date) {
            return !date ? 'N/A' : $translate.instant('days_from_now', {
              days: moment(date).parseZone().local().diff(moment(), 'days'),
            });
        }

        $scope.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
                var defer = $q.defer();
                var data = {
                  id: $rootScope.$userInfo.id,
                  start_date: $scope.dates.start_date ? moment($scope.dates.start_date).format('YYYY-MM-DDTHH:mm:ssZ') : null,
                  end_date: $scope.dates.end_date ? moment($scope.dates.end_date).format('YYYY-MM-DDTHH:mm:ssZ') : null,
                };
                userService.trips(data).promise
                    .then(function(response) {
                            defer.resolve(response.data.data);
                        },
                        function(error) {
                            if (error.status == 422) {
                              angular.forEach(error.data, function(messages, field) {
                                toaster.pop('error', $translate.instant(field), messages.shift());
                              });
                            }
                            if (error.status == 500) {
                              toaster.pop('error', $translate.instant('error'));
                            }
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
            DTColumnBuilder.newColumn('destination').withTitle($translate('destination')).withOption('sWidth', '30%'),
            DTColumnBuilder.newColumn('start_date').withTitle($translate('start_date')).renderWith(date).withOption('sWidth', '20%'),
            DTColumnBuilder.newColumn('end_date').withTitle($translate('end_date')).renderWith(date).withOption('sWidth', '20%'),
            DTColumnBuilder.newColumn('time_left').withTitle($translate('time_left')).withOption('sWidth', '20%'),
            DTColumnBuilder.newColumn(null).withTitle($translate('action')).renderWith(actionsHtml).withClass('text-center actions').withOption('sWidth', '10%').notSortable()
        ];

        $scope.dtInstance = {};

        $scope.filter = function(){
          if ($scope.dates.end_date && $scope.dates.start_date && moment($scope.dates.end_date) < moment($scope.dates.start_date)) {
            toaster.pop('error', $translate.instant('end_date_greater_than_start_date'));
            return;
          };
          $scope.dtInstance.reloadData();
        };

        $scope.view = function(id) {
            $location.path('/trips/edit/' + id);
        };

        $scope.edit = function(id) {
            $location.path('/trips/edit/' + id);
        };

        $scope.destroy = function(id) {
            sweetAlertService.confirm({ title: $translate.instant('trips.question_delete'), type: 'warning' }, function(isConfirm) {
                if (isConfirm) {
                    destroy(id);
                }
            });
        };

        function destroy(id) {
            $scope.blockActions = true;
            tripService.destroy({ id: id }).promise
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
