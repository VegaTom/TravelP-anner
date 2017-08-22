'use strict';

angular.module('travelPlannerApp')
    .config(function($routeProvider, ROLES) {
        $routeProvider
            .when('/', {
                templateUrl: 'views/welcome.html',
                controller: 'mainCtrl',
                data: {
                    authenticated: true,
                }
            })
            .when('/login', {
                templateUrl: 'views/auth/login.html',
                controller: 'loginCtrl',
                data: {
                    authenticated: false,
                }
            })
            .when('/profile', {
                templateUrl: 'views/profile/show.html',
                controller: 'profileCtrl',
                data: {
                    authenticated: true,
                    allowed: [ROLES.ADMIN, ROLES.USER]
                }
            })
            .when('/routes', {
                templateUrl: 'views/routes/index.html',
                controller: 'indexRoutesCtrl',
                data: {
                    authenticated: true,
                    allowed: [ROLES.ADMIN]
                }
            })
            .when('/trips', {
                templateUrl: 'views/trips/index.html',
                controller: 'indexTripsCtrl',
                data: {
                    authenticated: true,
                    allowed: [ROLES.ADMIN, ROLES.USER]
                }
            })
            .when('/trips/create', {
                templateUrl: 'views/trips/show.html',
                controller: 'createTripCtrl',
                data: {
                    authenticated: true,
                    allowed: [ROLES.ADMIN, ROLES.USER]
                }
            })
            .when('/trips/edit/:id', {
                templateUrl: 'views/trips/show.html',
                controller: 'editTripCtrl',
                data: {
                    authenticated: true,
                    allowed: [ROLES.ADMIN, ROLES.USER]
                }
            })
            .when('/users', {
                templateUrl: 'views/users/index.html',
                controller: 'indexUsersCtrl',
                data: {
                    authenticated: true,
                    allowed: [ROLES.ADMIN]
                }
            })
            .when('/users/edit/:id', {
                templateUrl: 'views/users/show.html',
                controller: 'editUserCtrl',
                data: {
                    authenticated: true,
                    allowed: [ROLES.ADMIN]
                }
            })
            .otherwise({
                redirectTo: '/',
            });
    });
