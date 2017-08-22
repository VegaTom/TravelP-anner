'use strict';

angular.module('travelPlannerApp')
    .factory('authService', ['$http', '$q', 'URL_CONST', function($http, $q, URL_CONST) {

        var URL = URL_CONST.AUTH;

        function login(data) {
            var defer = $q.defer();
            return {
                promise: $http({
                    method: 'POST',
                    url: URL,
                    data: data,
                    skipAuthorization: true,
                    timeout: defer.promise
                }),
                cancel: function(reason) {
                    defer.resolve(reason);
                }
            };
        }

        function logout() {
            var defer = $q.defer();
            return {
                promise: $http({
                    method: 'DELETE',
                    url: URL,
                    timeout: defer.promise
                }),
                cancel: function(reason) {
                    defer.resolve(reason);
                }
            };
        }

        return {
            login: function(data) {
                return login(data);
            },
            logout: function() {
                return logout('GET');
            }
        };

    }]);
