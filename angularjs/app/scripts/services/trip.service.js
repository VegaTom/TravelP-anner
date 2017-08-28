'use strict';

angular.module('travelPlannerApp')
    .factory('tripService', ['apiService', 'URL_CONST', function(apiService, URL_CONST) {

        var URL = URL_CONST.TRIP;

        function index(method, data) {
            return apiService.createRequest(method, {
                url: URL,
                data: data
            });
        }

        function nextMonth(method) {
            return apiService.createRequest(method, {
                url: URL + 'next-month'
            });
        }

        function store(method, data) {
            return apiService.createRequest(method, {
                url: URL,
                data: data
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

        function destroy(method, data) {
            return apiService.createRequest(method, {
                url: URL + data.id
            });
        }

        return {
            index: function(data) {
                return index('GET', data);
            },
            nextMonth: function() {
                return nextMonth('GET');
            },
            store: function(data) {
                return store('POST', data);
            },
            show: function(data) {
                return show('GET', data);
            },
            update: function(data) {
                return update('PUT', data);
            },
            destroy: function(data) {
                return destroy('DELETE', data);
            }
        };

    }]);
