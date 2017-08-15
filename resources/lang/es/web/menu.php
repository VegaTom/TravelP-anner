<?php

return [
    'home' => 'Dashboard',
    'users' => [
        'admin' => [
            'roles' => 'Permisos y acciones',
            'index' => 'Usuarios',
            'name_section' => 'Usuarios Administración',
        ],
        'app' => [
            'profiles' => 'Perfiles',
            'index' => 'Usuarios',
            'name_section' => 'Usuarios APP',
        ],
    ],
    'register' => [
        'name_section' => 'Registros',
        'surveys' => 'Encuestas',
        'tutorials' => 'Tutorial',
        'messages_rrss' => 'Mensajes RRSS',
        'terms_conditions' => 'Términos y condiciones',
        'about' => 'Acerca de',
    ],
    'travel' => [
        'name_section' => 'Viajes',
        'begin' => 'Inicio',
        'summary' => 'Resumen',
        'messages' => 'Mensajes en viaje',
        'surveys' => 'Encuestas',
    ],
    'states' => [
        'name_section' => 'Estados',
        'index' => 'Estados',
    ],
    'cities' => [
        'name_section' => 'Ciudades',
        'index' => 'Ciudades',
    ],
    'stops' => [
        'name_section' => 'Paradas',
        'index' => 'Paradas',
        'countries' => 'Países',
        'states' => 'Estados',
        'cities' => 'Ciudades',
    ],
    'notifications' => [
        'name_section' => 'Notificaciones',
        'index' => 'Notificaciones',
    ],
    'complaints' => [
        'name_section' => 'Denuncias',
        'index' => 'Categorías y subcategorías',
        'messages_rrss' => 'Mensajes RRSS',
    ],
    'operators' => [
        'name_section' => 'Operadores',
        'index' => 'Operadores',
        'statistics' => 'Parametrización',
        'messages_alert' => 'Mensajes de alerta',
    ],
    'points' => [
        'name_section' => 'Puntos Pasify',
        'index' => 'Puntos Pasify',
    ],
    'reports' => [
        'name_section' => 'Reportes',
        'index' => 'Reportes',
        'user_distribucion' => trans('web/general.indicators.user_distribucion.name_section'),
        'user_list' => trans('web/general.indicators.user_list.name_section'),
        'complaint_distribution' => trans('web/general.indicators.complaint_distribution.name_section'),
        'complaint_list' => trans('web/general.indicators.complaint_list.name_section'),
        'operator_distribucion' => trans('web/general.indicators.operator_distribucion.name_section'),
        'operator_list' => trans('web/general.indicators.operator_list.name_section'),
        'route_distribucion' => trans('web/general.indicators.route_distribucion.name_section'),
        'trivia_distribucion' => trans('web/general.indicators.trivia_distribucion.name_section'),
    ],
    'configuration_general' => [
        'name_section' => 'Configuración General',
        'index' => 'Configuración General',
    ],
    'profile' => [
        'name_section' => 'Perfil de usuario',
        'index' => 'Perfil de usuario',
    ],
];
