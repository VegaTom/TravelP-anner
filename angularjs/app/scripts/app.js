'use strict';

/**
 * @ngdoc overview
 * @name travelPlannerApp
 * @description
 * # travelPlannerApp
 *
 * Main module of the application.
 */
angular
    .module('travelPlannerApp', [
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
    .controller('mainCtrl', function($scope, $rootScope, $localStorage, $location, $translate, $timeout, $uibModal, authService, sweetAlertService, languageService, toaster, amMoment) {

        $scope.logout = function() {
            authService.logout().promise
                .then(function() {
                    $rootScope.isLogged = false;
                    toaster.pop('success', $translate.instant('done'));
                    $localStorage.$reset();
                    $timeout(function() { $location.path('/login'); }, 200);
                }, function(error) {
                    toaster.pop('error', $translate.instant('error'));
                    $localStorage.$reset();
                    $timeout(function() { $location.path('/login'); }, 200);
                    console.log(error);
                });
        };

        $rootScope.$userInfo.language = $localStorage.language || 'es';

        $scope.changeLanguage = function() {
            amMoment.changeLocale($rootScope.$userInfo.language);
            $translate.use($rootScope.$userInfo.language);
            // languageService.changeLanguage($rootScope.$userInfo.language);
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
    .run(function($rootScope, $location, authService, ROLES, toaster, amMoment, $localStorage, $sessionStorage) {

        if (!$sessionStorage.running) {
            $sessionStorage.running = true;

            if (!$localStorage.remember) {
                $localStorage.$reset();
            }
        }

        $rootScope.dateOptions = {
            formatYear: 'yy',
            maxDate: new Date(2020, 5, 22),
            // minDate: new Date(),
            // startingDay: 1
        };

        $rootScope.$userInfo = $localStorage || {
            isLogged: false,
            id: null,
            name: null,
            id_token: null,
            roles: [],
            remember: false,
            language: 'es'
        };

        if (!$rootScope.$userInfo.isLogged) {
            $location.path('/login');
        }

        $rootScope.$on('$routeChangeStart', function(event, next) {

            $rootScope.adminAccess = $rootScope.$userInfo.roles ? $rootScope.$userInfo.roles.indexOf(ROLES.ADMIN) > -1 : false;

            if (next.data && !next.data.authenticated && $rootScope.$userInfo.isLogged) {
                $location.path('/');
            }

            if (next.data.allowed && !next.data.allowed.filter(function (allowed) {
                  $rootScope.$userInfo.roles.indexOf(allowed) > -1;
                }).length === 0) {
                $location.path('/');
            }

        });

    })
    .config(function($translateProvider, $localStorageProvider) {
        $translateProvider
            .translations('es', translation_es)
            .translations('en', translation_en)
            .preferredLanguage('es');
    })
    .config(function($httpProvider, jwtOptionsProvider, $localStorageProvider) {
        jwtOptionsProvider.config({
            tokenGetter: [function() {
                return $localStorageProvider.get('id_token');
            }],
            whiteListedDomains: ['127.0.0.1', 'localhost']
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
                config.headers['language'] = $rootScope.$userInfo.language;
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
                if (response.status === 422) {}
                if (response.status === 419 || response.status === 440) {}

                pleaseWaitService.finish();
                return $q.reject(response);
            }
        };
    });
