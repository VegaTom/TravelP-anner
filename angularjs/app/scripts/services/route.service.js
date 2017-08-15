'use strict';

angular.module('comunidadDigitalApp')
    .factory('routeService', ['apiService', 'URL_CONST', function(apiService, URL_CONST) {

        var URL = URL_CONST.ROUTE;

        function index(method) {
            return apiService.createRequest(method, {
                url: URL
            });
        }

        function update(method, data) {
            return apiService.createRequest(method, {
                url: URL + data.id,
                data: data
            });
        }

        return {
            index: function() {
                return index('GET');
            },
            update: function(data) {
                return update('PUT', data);
            }
        };

    }]);