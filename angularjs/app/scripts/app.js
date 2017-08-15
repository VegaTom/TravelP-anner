'use strict';

/**
 * @ngdoc overview
 * @name comunidadDigitalApp
 * @description
 * # comunidadDigitalApp
 *
 * Main module of the application.
 */
angular
    .module('comunidadDigitalApp', [
        'ngAnimate',
        'ngCookies',
        'ngMessages',
        'ngResource',
        'ngRoute',
        'ngSanitize',
        'ngFileUpload',
        'uiCropper',
        'toaster',
        'ngCookies',
        'datatables',
        'datatables.buttons',
        'angularMoment',
        'ngDialog',
        'textAngular',
        'angularSpectrumColorpicker',
        'ngStorage',
        'angular-jwt',
        'oitozero.ngSweetAlert',
        'ui.select',
        'frapontillo.bootstrap-switch',
        'ui.bootstrap',
        'pascalprecht.translate',
        'chart.js',
        'uiSwitch'
    ])
    .controller('mainCtrl', function($scope, $rootScope, $localStorage, $location, $timeout, $uibModal, authService, userService, sweetAlertService, toaster) {

        $scope.logout = function() {
            authService.logout().promise
                .then(function() {
                    $rootScope.isLogged = false;
                    toaster.pop('success', 'OK');
                    $localStorage.$reset();
                    $timeout(function() { $location.path('/login'); }, 200);
                }, function(error) {
                    toaster.pop('error', error.status, error.statusText);
                    console.log(error);
                });
        };

        $scope.changePassword = function() {
            $uibModal.open({
                animation: true,
                templateUrl: 'views/dialogs/change-password-modal.html',
                controller: 'changePasswordModalCtrl',
                controllerAs: '$scope',
                size: 'md',
                keyboard: false,
                backdrop: 'static',
                resolve: {
                    parentData: function() {
                        return {
                            id: $rootScope.$userInfo.id
                        };
                    }
                }
            });
        };

    })
    .run(function($rootScope, $location, authService, toaster, amMoment, $localStorage, $sessionStorage) {

        if (!$sessionStorage.running) {
            $sessionStorage.running = true;

            if (!$localStorage.remember) {
                $localStorage.$reset();
            }
        }

        amMoment.changeLocale('es');

        $rootScope.dateOptions = {
            formatYear: 'yy',
            maxDate: new Date(2020, 5, 22),
            // minDate: new Date(),
            // startingDay: 1
        };

        $rootScope.$userInfo = $localStorage || {
            isLogged: false,
            full_name: null,
            location: null,
            id_token: null,
            role: null,
            id: null,
            remember: false
        };

        if (!$rootScope.$userInfo.isLogged) {
            $location.path('/login');
        }

        $rootScope.$on('$routeChangeStart', function(event, next) {

            $rootScope.superAccess = $rootScope.$userInfo.role === 0;
            $rootScope.adminAccess = $rootScope.$userInfo.role === 1;

            if (next.data && !next.data.authenticated && $rootScope.$userInfo.isLogged) {
                $location.path('/');
            }

            if (next.data.allowed && next.data.allowed.indexOf($rootScope.$userInfo.role) === -1) {
                $location.path('/');
            }

        });

    })
    .config(function($translateProvider) {
        $translateProvider
            .translations('es', translation_es)
            .preferredLanguage('es');
    })
    .config(function($httpProvider, jwtOptionsProvider, $localStorageProvider) {
        jwtOptionsProvider.config({
            tokenGetter: [function() {
                return $localStorageProvider.get('id_token');
            }],
            whiteListedDomains: ['127.0.0.1', 'localhost', 'comunidaddigital.softdevmanager.com']
        });

        $httpProvider.interceptors.push('jwtInterceptor');

        $httpProvider.interceptors.push(['$injector', function($injector) {
            return $injector.get('AuthInterceptor');
        }]);
    })
    .factory('AuthInterceptor', function($rootScope, $q, $location, $localStorage, pleaseWaitService) {
        return {
            request: function(config) {
                pleaseWaitService.wait();
                config.url = config.url.replace(/\/$/, '');
                return config;
            },
            response: function(response) {
                pleaseWaitService.finish();
                return response;
            },
            responseError: function(response) {

                if (response.status === 401) {
                    $localStorage.$reset();
                    $location.path('/login');
                }
                if (response.status === 403) {}
                if (response.status === 419 || response.status === 440) {}

                pleaseWaitService.finish();
                return $q.reject(response);
            }
        };
    });