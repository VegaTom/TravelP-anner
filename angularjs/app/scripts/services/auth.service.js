'use strict';

angular.module('travelPlannerApp')
    .factory('authService', ['$http', '$q', 'URL_CONST', function($http, $q, URL_CONST) {

        function createRequest(info){
          var defer = $q.defer();
            return {
                promise: $http({
                    method: info.method,
                    url: info.url,
                    data: info.data,
                    skipAuthorization: true,
                    timeout: defer.promise
                }),
                cancel: function(reason) {
                    defer.resolve(reason);
                }
            };
        }

        function login(data) {
            return createRequest({
              url: URL_CONST.AUTH,
              method: 'POST',
              data: data
            });
        }

        function logout() {
            return createRequest({
              url: URL_CONST.AUTH,
              method: 'DELETE',
            });
        }

        function register(data) {
            return createRequest({
              url: URL_CONST.REGISTER,
              method: 'POST',
              data: data
            });
        }

        function forgot(data) {
            return createRequest({
              url: URL_CONST.PASSWORD,
              method: 'POST',
              data: data
            });
        }

        return {
            login: function(data) {
                return login(data);
            },
            register: function(data) {
                return register(data);
            },
            forgot: function(data) {
                return forgot(data);
            },
            logout: function() {
                return logout('GET');
            }
        };

    }]);
