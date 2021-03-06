'use strict';

angular.module('travelPlannerApp')
    .factory('pleaseWaitService', ['$rootScope', function($rootScope) {

        function wait() {
            if ($rootScope.pleaseWait) {
                finish();
            }
            $rootScope.pleaseWait = pleaseWait({
                logo: '',
                backgroundColor: 'rgba(0, 73, 66, 0.4)',
                loadingHtml: '<div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>'
            });
        }

        function finish() {
            $rootScope.pleaseWait.finish();
        }

        return {
            wait: function() {
                return wait();
            },
            finish: function() {
                return finish();
            },
        };

    }]);
