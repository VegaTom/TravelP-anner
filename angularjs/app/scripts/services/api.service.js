'use strict';

angular.module('comunidadDigitalApp')
    .factory('apiService', ['$http', '$q', 'URL_CONST', function($http, $q, URL_CONST) {

        var API = URL_CONST.API;
        //create cancellable requests
        function createRequest(method, info) {
            var defer = $q.defer();
            return {
                promise: $http({
                    method: method,
                    url: API + info.url,
                    data: info.data,
                    timeout: defer.promise
                }),
                cancel: function(reason) {
                    defer.resolve(reason);
                }
            };
        }

        return {
            createRequest: function(method, info) {
                return createRequest(method, info);
            }
        };

    }]);