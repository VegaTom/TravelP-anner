'use strict';

angular.module('travelPlannerApp')
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

        function update(method, data) {
            return apiService.createRequest(method, {
                url: URL + data.id,
                data: data
            });
        }

        function trips(method, data) {
            return apiService.createRequest(method, {
                url: URL + data.id + '/trips'
            });
        }

        function toggleAdminRole(method, data) {
            return apiService.createRequest(method, {
                url: URL + data.id + '/admin'
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
            update: function(data) {
                return update('PUT', data);
            },
            trips: function(data) {
                return trips('GET', data);
            },
            toggleAdminRole: function(data) {
                return toggleAdminRole('PUT', data);
            },
            destroy: function(data) {
                return destroy('DELETE', data);
            }
        };

    }]);
