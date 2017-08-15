'use strict';

angular.module('comunidadDigitalApp')
    .config(function($routeProvider) {
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
            .when('/admins', {
                templateUrl: 'views/admins/index.html',
                controller: 'indexAdminsCtrl',
                data: {
                    authenticated: true,
                    allowed: [0]
                }
            })
            .when('/admins/create', {
                templateUrl: 'views/admins/show.html',
                controller: 'createAdminCtrl',
                data: {
                    authenticated: true,
                    allowed: [0]
                }
            })
            .when('/admins/edit/:id', {
                templateUrl: 'views/admins/show.html',
                controller: 'editAdminCtrl',
                data: {
                    authenticated: true,
                    allowed: [0]
                }
            })
            .when('/locations', {
                templateUrl: 'views/locations/index.html',
                controller: 'indexLocationsCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/locations/create', {
                templateUrl: 'views/locations/show.html',
                controller: 'createLocationCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/locations/edit/:id', {
                templateUrl: 'views/locations/show.html',
                controller: 'editLocationCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/notifications', {
                templateUrl: 'views/notifications/index.html',
                controller: 'indexNotificationsCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/notifications/create', {
                templateUrl: 'views/notifications/show.html',
                controller: 'createNotificationCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/notifications/edit/:id', {
                templateUrl: 'views/notifications/show.html',
                controller: 'editNotificationCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/routes', {
                templateUrl: 'views/routes/index.html',
                controller: 'indexRoutesCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/sections', {
                templateUrl: 'views/sections/index.html',
                controller: 'indexSectionsCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/sections/create', {
                templateUrl: 'views/sections/show.html',
                controller: 'createSectionCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/sections/edit/:id', {
                templateUrl: 'views/sections/show.html',
                controller: 'editSectionCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/sections/:section_id/subsections', {
                templateUrl: 'views/subsections/index.html',
                controller: 'indexSubsectionsCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/sections/:section_id/subsections/create', {
                templateUrl: 'views/subsections/show.html',
                controller: 'createSubsectionCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/sections/:section_id/subsections/edit/:id', {
                templateUrl: 'views/subsections/show.html',
                controller: 'editSubsectionCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/sections/:section_id/subsections/:subsection_id/posts', {
                templateUrl: 'views/posts/index.html',
                controller: 'indexPostsCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/sections/:section_id/subsections/:subsection_id/posts/create', {
                templateUrl: 'views/posts/show.html',
                controller: 'createPostCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/sections/:section_id/subsections/:subsection_id/posts/edit/:id', {
                templateUrl: 'views/posts/show.html',
                controller: 'editPostCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/trivia-categories', {
                templateUrl: 'views/trivia-categories/index.html',
                controller: 'indexTriviaCategoriesCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/trivia-categories/create', {
                templateUrl: 'views/trivia-categories/show.html',
                controller: 'createTriviaCategoryCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/trivia-categories/edit/:id', {
                templateUrl: 'views/trivia-categories/show.html',
                controller: 'editTriviaCategoryCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/trivia-categories/:trivia_category_id/trivias', {
                templateUrl: 'views/trivias/index.html',
                controller: 'indexTriviasCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/trivia-categories/:trivia_category_id/trivias/create', {
                templateUrl: 'views/trivias/show.html',
                controller: 'createTriviaCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/trivia-categories/:trivia_category_id/trivias/edit/:id', {
                templateUrl: 'views/trivias/show.html',
                controller: 'editTriviaCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/trivia-categories/:trivia_category_id/trivias/:trivia_id/participation', {
                templateUrl: 'views/trivia-participation/index.html',
                controller: 'triviaParticipationCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/users', {
                templateUrl: 'views/users/index.html',
                controller: 'indexUsersCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .when('/users/:id', {
                templateUrl: 'views/users/show.html',
                controller: 'viewUserCtrl',
                data: {
                    authenticated: true,
                    allowed: [0, 1]
                }
            })
            .otherwise({
                redirectTo: '/',
            });
    });