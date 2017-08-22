'use strict';

angular.module('travelPlannerApp')
    .factory('passwordService', ['$http', '$q', 'URL_CONST', function($http, $q, URL_CONST) {

        var URL = URL_CONST.PASSWORD;

        function createRequest(method, info) {
            var defer = $q.defer();
            return {
                promise: $http({
                    method: method,
                    url: info.url,
                    data: info.data,
                    timeout: defer.promise
                }),
                cancel: function(reason) {
                    defer.resolve(reason);
                }
            };
        }

        function change(method, data) {
            return apiService.createRequest(method, {
                url: URL,
                data: data
            });
        }

        return {
            change: function(data) {
                return change('PUT', data);
            },
        };

    }]);
