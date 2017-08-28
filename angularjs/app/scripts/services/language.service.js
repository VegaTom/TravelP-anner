'use strict';

angular.module('travelPlannerApp')
    .factory('languageService', ['$http', '$q', 'URL_CONST', function($http, $q, URL_CONST) {

        var URL = URL_CONST.LANGUAGE;

        function changeLanguage(method, lang) {
            var defer = $q.defer();
            return {
                promise: $http({
                    method: method,
                    url: URL + lang,
                    skipAuthorization: true,
                    timeout: defer.promise
                }),
                cancel: function(reason) {
                    defer.resolve(reason);
                }
            };
        }

        return {
            changeLanguage: function(lang) {
                return changeLanguage('GET', lang);
            },
        };

    }]);
