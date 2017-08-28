'use strict';

// var WEBSERVICE_DIR = location.origin == 'http://localhost:9000' || 'http://127.0.0.1:9000' ? 'http://127.0.0.1:8000/' : 'http://192.168.1.130:8000/';
// var WEBSERVICE_DIR = 'http://comunidaddigital.softdevmanager.com/';
var WEBSERVICE_DIR = 'http://127.0.0.1:8000/';

angular.module('travelPlannerApp')
    .constant('URL_CONST', {
        WEBSERVICE_DIR: WEBSERVICE_DIR,
        API: WEBSERVICE_DIR + 'api/v1/',
        AUTH: WEBSERVICE_DIR + 'authenticate/',
        REGISTER: WEBSERVICE_DIR + 'register/',
        PASSWORD: WEBSERVICE_DIR + 'password/',
        LANGUAGE: WEBSERVICE_DIR + 'lang/',
        ROUTE: 'routes/',
        TRIP: 'trips/',
        USER: 'users/'
    })
    .constant('ROLES', {
        ADMIN: 1,
        USER: 2,
    });
