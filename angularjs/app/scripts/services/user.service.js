'use strict';

angular.module('comunidadDigitalApp')
    .factory('userService', ['apiService', 'URL_CONST', function(apiService, URL_CONST) {

        var URL = URL_CONST.USER;

        function index(method) {
            return apiService.createRequest(method, {
                url: URL
            });
        }

        function show(method, data) {
            return apiService.createRequest(method, {
                url: URL + data.id
            });
        }

        function destroy(method, data) {
            return apiService.createRequest(method, {
                url: URL + data.id
            });
        }

        return {
            index: function() {
                return index('GET');
            },
            show: function(data) {
                return show('GET', data);
            },
            destroy: function(data) {
                return destroy('DELETE', data);
            }
        };

    }]);