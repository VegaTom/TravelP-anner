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

        function login(method, data) {
            return createRequest({
              url: URL_CONST.AUTH,
              method: method,
              data: data
            });
        }

        function logout(method, data) {
            return createRequest({
              url: URL_CONST.AUTH,
              method: method,
              data: data,
            });
        }

        function register(method, data) {
            return createRequest({
              url: URL_CONST.REGISTER,
              method: method,
              data: data
            });
        }

        function forgot(method, data) {
            return createRequest({
              url: URL_CONST.PASSWORD,
              method: method,
              data: data
            });
        }

        return {
            login: function(data) {
                return login('POST', data);
            },
            register: function(data) {
                return register('POST', data);
            },
            forgot: function(data) {
                return forgot('POST', data);
            },
            logout: function() {
                return logout('DELETE');
            }
        };

    }]);
