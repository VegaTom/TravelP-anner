'use strict';

// var WEBSERVICE_DIR = location.origin == 'http://localhost:9000' || 'http://127.0.0.1:9000' ? 'http://127.0.0.1:8000/' : 'http://192.168.1.130:8000/';
var WEBSERVICE_DIR = 'http://comunidaddigital.softdevmanager.com/';
 //var WEBSERVICE_DIR = 'http://127.0.0.1:8000/';

angular.module('comunidadDigitalApp')
    .constant('URL_CONST', {
        WEBSERVICE_DIR: WEBSERVICE_DIR,
        API: WEBSERVICE_DIR + 'api.admin/v1/',
        AUTH: WEBSERVICE_DIR + 'authenticate/',
        ADMIN: 'admins/',
        LOCATION: 'locations/',
        NOTIFICATION: 'notifications/',
        POST: 'posts/',
        ROUTE: 'routes/',
        SECTION: 'sections/',
        SUBSECTION: 'subsections/',
        TRIVIA: 'trivias/',
        TRIVIA_CATEGORY: 'trivias/categories/',
        TRIVIA_PARTICIPATION: 'trivias/participation/',
        USER: 'users/'
    })
    .constant('ROLES', {
        SUPER: {
            ROL: 0,
        },
        ADMIN: {
            ROL: 1,
        }
    });