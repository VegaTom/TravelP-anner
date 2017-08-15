<?php

return [
    /**
     * General
     */
    'app' => [
        'yes' => 'Sí',
        'no' => 'No',
        'search' => 'Buscar',
        'close' => 'Cerrar',
        'change' => 'Cambiar',
        'activate' => 'Activar',
        'delete' => 'Eliminar (o desactivar)',
        'index' => 'Listar',
        'show' => 'Ver detalle',
        'store' => 'Crear nuevo',
        'update' => 'Actualizar',
        'toggle_active' => 'Activar/Desactivar',
        'toggle_blocked' => 'Bloquear/Desbloquear',
        'roles' => 'Roles',
        'forceDestroy' => 'Eliminar',
        'participation' => 'Participación',
        'createAttendant' => 'Crear asistente',
        'toggleAttendant' => 'Activar/Desactivar asistente',
        'restore' => 'Restablecer',
        'new' => 'Nuevo',
        'empty' => 'Vacío',
        'details' => 'Detalles',
        'edit' => 'Editar',
        'new_section' => 'Nueva sección',
        'new_view' => 'Nueva pantalla',
        'save' => 'Guardar',
        'cancel' => 'Cancelar',
        'processing' => 'Procesando',
        'login' => 'Inicio de sesión',
        'successful_operation' => 'Operación exitosa',
        'select_one' => 'Seleccione uno',
        'select' => 'Seleccionar',
        'all' => 'Tod@s',
        'selected' => 'Seleccionado/s',
        'export' => 'Exportar',
        'created_at' => 'Creado el',
        'field_required' => 'Campo obligatorio',
        'are_you_sure' => '¿Está segur@?',
    ],

    'roles' => [
        'admin' => 'Administrador',
        'analyst' => 'Analista',
        'visitor' => 'Visitante',
        'user' => 'Usuario',
    ],

    'types' => [
        'text' => 'Texto',
        'url' => 'Enlace externo',
        'img' => 'Imagen',
        'video' => 'Vídeo',
    ],

    'sections_name' => [
        'abouts' => 'Acerca de',
        'admins' => 'Usuarios Administración',
        'answers' => 'Respuestas',
        'countries' => 'Países',
        'home' => 'Dashboard',
        'questions' => 'Preguntas',
        'roles' => 'Roles',
        'routes' => 'Rutas',
        'tos' => 'TOS',
        'travel-form' => 'Inicio de viaje',
        'trivias' => 'Trivias',
        'tutorials' => 'Tutoriales',
        'users' => 'Usuarios APP',
        'web-routes' => 'Permisos y acciones',
        'operators' => 'Operadores',
        'stops' => 'Paradas',
        'states' => 'Estados',
        'cities' => 'Ciudades',
        'buses' => 'Autobuses',
        'attendants' => 'Asistentes',
        'travel-summary' => 'Resumen de viajes',
        'drafts' => 'Mensajes',
        'draftTypes' => 'Borradores de plantillas',
        'settings' => 'Configuraciones generales',
        'complaint-categories' => 'Denuncias - Categorías',
        'complaint-subcategories' => 'Denuncias - Subcategorías',
        'profile-window' => 'Perfil de usuaruio en app',
    ],

    /**
     * Specific
     */
    'answers' => [
        'text' => 'Texto',
        'new_answer' => 'Nueva respuesta',
    ],

    'attendants' => [
        'active' => 'Activo',
        'email' => 'Correo',
        'name' => 'Nombre',
        'phone' => 'Teléfono',
    ],

    'abouts' => [
        'name' => 'Nombre',
        'active' => 'Activo',
        'sections' => 'Secciones',
        'type' => 'Tipo',
        'text' => 'Texto',
    ],

    'cities' => [
        'name' => 'Nombre',
        'iso' => 'ISO',
        'state' => 'Estado',
    ],

    'complaint_categories' => [
        'type' => 'Tipo',
        'created_at' => 'Creado el',
        'name' => 'Nombre',
        'photo' => 'Icono',
        'active' => 'Activo',
        'description' => 'Descripción',
        'travel_dependant' => 'En viaje',
        'non_travel_dependant' => 'Fuera de viaje',
    ],

    'complaint_subcategories' => [
        'type' => 'Tipo',
        'created_at' => 'Creado el',
        'name' => 'Nombre',
        'photo' => 'Icono',
        'trigger' => 'Disparador',
        'active' => 'Activo',
        'description' => 'Descripción',
        'travel_dependant' => 'En viaje',
        'non_travel_dependant' => 'Fuera de viaje',
    ],

    'countries' => [
        'name' => 'Nombre',
        'iso' => 'ISO',
    ],

    'dashboard' => [
        'from_date' => 'Desde',

        'labels' => [
            'PANIC_BUTTON' => 'Botón de pánico',
            'VELOCITY' => 'Velocidad',
            'CONDUCTION' => 'Conducción',
            'MECHANIC' => 'Mecánica',
            'STOPS' => 'Parada',
            'POLUTION' => 'Contaminación',
        ],
    ],

    'drafts' => [
        'active' => 'Activo',
        'name' => 'Nombre',
        'type' => 'Tipo',
        'text' => 'Texto',
        'draft_type_name' => 'Tipo',
    ],

    'indicators' => [
        'user_distribucion' => [
            'name_section' => 'Distribución de usuarios',
            'active_users_number' => 'Número de usuarios activos',
            'avg_actions_by_users' => 'Promedio de acciones por usuario',
            'total_accounts' => 'Total de registros',
            'total_validated_accounts' => 'Total de registros validados',
        ],

        'user_list' => [
            'name_section' => 'Listado de usuarios',
        ],

        'complaint_distribution' => [
            'name_section' => 'Distribución de reclamos',
            'complaint_categories' => 'Categorías',
        ],

        'complaint_list' => [
            'name_section' => 'Listado de reclamos',
            'created_at' => 'Creado el',
            'operator' => 'Operador',
            'city_origin' => 'ISO Origen',
            'origin' => 'Parada origen',
            'city_destiny' => 'ISO Destino',
            'destiny' => 'Parada destino',
            'complaint_category' => 'Categoría',
            'complaint_subcategory' => 'Subcategoría',
            'attachments' => 'Adjuntos',
        ],

        'operator_distribucion' => [
            'name_section' => 'Distribución de operadores',
        ],

        'operator_list' => [
            'name_section' => 'Listado de operadores',
            'operator' => 'Operador',
            'complaint' => 'Categoría de denuncia',
        ],

        'route_distribucion' => [
            'name_section' => 'Distribución de rutas',
            'city_origin_iso' => 'ISO Origen',
            'origin_name' => 'Parada origen',
            'city_destiny_iso' => 'ISO Destino',
            'destiny_name' => 'Parada destino',
            'quantity_travels' => 'Cantidad de viajes',
        ],

        'trivia_distribucion' => [
            'name_section' => 'Distribución de trivias',
            'trivia_type' => 'Tipo',
            'register_trivia' => 'En registro',
            'travel_trivia' => 'En viajes',
        ],
    ],

    'exports' => [
        'prizes' => [
            'name_section' => 'Exportar puntos Pasify',
            'start_date' => 'Desde',
            'end_date' => 'Hasta',
            'type' => 'Tipo',
            'user' => 'Usuario',
            'export_to' => 'Exportar a',
        ],

        'operators' => [
            'name_section' => 'Exportar operadores',
            'start_date' => 'Desde',
            'end_date' => 'Hasta',
            'name' => 'Nombre',
            'state' => 'Estado',
            'export_to' => 'Exportar a',
        ],

        'users_admin' => [
            'name_section' => 'Exportar usuarios',
            'role' => 'Rol',
            'state' => 'Estado',
            'export_to' => 'Exportar a',
        ],

        'users_app' => [
            'name_section' => 'Exportar usuarios',
            'status' => 'Estado',
            'state' => 'Activo/Pasivo',
            'export_to' => 'Exportar a',
        ],
    ],

    'logged-profile' => [
        'password' => [
            'name_section' => 'Contraseña',
            'actual_password' => 'Contraseña actual',
            'new_password' => 'Contraseña nueva',
            'repeat_password' => 'Confirmar contraseña',
        ],
    ],

    'notifications' => [
        'send_now' => 'Enviar inmediato',
        'hour' => 'Hora',
        'operator' => 'Operador',
        'active' => 'Activo',
        'status' => 'Estado',
        'text' => 'Texto',
        'title' => 'Título',
        'description' => 'Descripción',
        'type' => 'Tipo',
        'action' => 'Acción',
        'detail' => 'Detalle',
        'users' => 'Usuarios APP',
        'publish_date' => 'Fecha de publicación',
        'expire_date' => 'Fecha de vencimiento',
    ],

    'operator_statistics' => [
        'ranking' => 'Valoración',
        'complaints' => 'Denuncias',
        'puntuality' => 'Puntualidad',
        'attention' => 'Atención',
        'comfort' => 'Comodidad',
        'security' => 'Seguridad',
    ],

    'operators' => [
        'type' => 'Tipo',
        'active' => 'Activo',
        'photo' => 'Foto',
        'pasify_alert' => 'Pasify alerta',

        'name' => 'Nombre',
        'n_complaints' => 'Cantidad de denuncias',
        'n_patents' => 'Cantidad de patentes',
        'n_travels' => 'Cantidad de viajes',
        'attention' => 'Atención',
        'comfort' => 'Comodidad',
        'puntuality' => 'Puntualidad',
        'avg_score' => 'Valoración',
        'security' => 'Seguridad',

        'attendants' => 'Asistentes',
    ],

    'prizes' => [
        'unlimited' => 'Ilimitado',
        'week' => 'Semanas',
        'mounth' => 'Meses',
        'sticker' => 'Sticker',
        'prize' => 'Premio',
        'link' => 'Enlace',
        'type' => 'Tipo',
        'name' => 'Nombre',
        'active' => 'Activo',
        'description' => 'Descripción',
        'photo' => 'Foto',
        'expires_in' => 'Expira',
        'ammount' => 'Costo de reclamo',
        'available_time_measure' => 'Tipo de duración',
        'available_time_quantity' => 'Tiempo de duración',
    ],

    'profile_window' => [
        'complaints' => 'Total de Denuncias',
        'points' => 'Puntos Pasify',
        'stickers' => 'Cantidad de Stickers',
        'travels' => 'Total de Viaje',
    ],

    'questions' => [
        'active' => 'Activo',
        'title' => 'Título',
    ],

    'routes' => [
        'name_section' => 'Rutas',
        'route' => 'Ruta',
        'origin_destiny' => 'Origen - Destino',
    ],

    'settings' => [
        'report_time' => 'Tiempo para reporte de posición actual (min)',
        'notification_time_alert' => 'Tiempo para notificación de alerta de fin de viaje (min)',
        'notifiction_distance_alert' => 'Distancia para notificación de alerta de fin de viaje (km)',
        'complaint_report_interval' => 'Intervalo de grabación de posición y velocidad en denuncia de exceso de velocidad (seg)',
        'complaint_report_time' => 'Tiempo máximo de grabación en denuncia de exceso de velocidad (min)',
    ],

    'states' => [
        'name' => 'Nombre',
        'iso' => 'ISO',
        'country' => 'País',
    ],

    'stops' => [
        'active' => 'Activo',
        'name' => 'Nombre',
        'city' => 'Ciudad',
        'state' => 'Estado',
        'country' => 'País',
        'latitude' => 'Latitud',
        'longitude' => 'Longitud',
    ],

    'tos' => [
        'active' => 'Activo',
        'name' => 'Nombre',
        'file' => 'Archivo',
    ],

    'travel_form' => [
        'origin' => 'Origen',
        'destiny' => 'Destino',
        'hour' => 'Hora',
        'operator' => 'Operador',
        'ammount' => 'Precio',
        'patent' => 'Patente',
        'partners' => 'Con compañeros',
        'sharing' => 'Compartir',
    ],

    'travel_summary' => [
        'origin_destiny' => 'Origen - Destino',
        'total_time' => 'Tiempo total Recorrido',
        'total_distance' => 'Distancia total Recorrida',
        'average_speed' => 'Velocidad promedio',
        'maximun_speed' => 'Velocidad Máxima Registrada',
        'route_graph' => 'Presentación traza de la ruta recorrido en mapa',
        'passengers_number' => 'Número total de usuarios Pasify conectados en el Viaje',
        'total_comments' => 'Número total de comentarios en muro durante el viaje por todos los usuarios',
        'total_complaints' => 'Número total de denuncias en muro durante el viaje por todos los usuarios',
        'user_comments' => 'Número de comentarios en muro del usuario',
        'user_complaints' => 'Número de denuncias del usuarios',
        'total_points' => 'Total de puntos Pasify gnados durante el viaje',
        'travel_rating' => 'Valoración del viaje',
        'travel_sharing' => 'Compartir viaje finalizado',
    ],

    'trivias' => [
        'title' => 'Título',
    ],

    'tutorials' => [
        'name' => 'Nombre',
        'active' => 'Activo',
        'sections' => 'Secciones',
        'type' => 'Tipo',
        'text' => 'Texto',
    ],

    'users' => [
        'name_complete' => 'Nombre Completo',
        'email' => 'Correo',
        'active' => 'Activo',
        'profile' => 'Perfil',
        'photo' => 'Foto',
        'role_id' => 'Rol',
        'role' => 'Rol',
        'phone' => 'Teléfono',
        'password' => 'Contraseña',
        'password_confirmation' => 'Confirmar contraseña',
        'first_name' => 'Nombres',
        'last_name' => 'Apellidos',
        'gender' => 'Género',
        'male' => 'Masculino',
        'female' => 'Femenino',
        'last_action' => 'Última acción',
        'last_login_date' => 'Último inicio de sesión',
        'blocked' => 'Bloquead@',
        'birth_date' => 'Fecha de nacimiento',
        'registry_date' => 'Fecha de registro',

        'complaints' => [
            'name_section' => 'Mis denuncias',
            'origin_destiny' => 'Origen - Destino',
            'created_at' => 'Creada el',
            'speed' => 'Velocidad',
            'latitude' => 'Latitud',
            'longitude' => 'Longitud',

            'complaint_description' => 'Descripción',
            'complaint_latitude' => 'Latitud',
            'complaint_longitude' => 'Longitud',
            'complaint_subcategory_name' => 'Subcategoría',
            'complaint_subcategory_photo' => 'Foto',

            'operator_name' => 'Operador',
            'operator_photo' => 'Foto',
            'bus_patent' => 'Patente',

            'travel_origin_name' => 'Parada',
            'travel_origin_latitude' => 'Latitud',
            'travel_origin_longitude' => 'Longitud',
            'travel_origin_city_name' => 'Ciudad',
            'travel_origin_city_iso' => 'ISO Ciudad',
            'travel_origin_state_name' => 'Estado',
            'travel_origin_state_iso' => 'ISO Estado',

            'travel_destiny_name' => 'Parada',
            'travel_destiny_latitude' => 'Latitud',
            'travel_destiny_longitude' => 'Longitud',
            'travel_destiny_city_name' => 'Ciudad',
            'travel_destiny_city_iso' => 'ISO Ciudad',
            'travel_destiny_state_name' => 'Estado',
            'travel_destiny_state_iso' => 'ISO Estado',
        ],

        'operators' => [
            'name_section' => 'Operadores',
            'origin_destiny' => 'Origen - Destino',
            'operators_count' => 'Cantidad de operadores',

            'operator_name' => 'Operador',
            'operator_photo' => 'Foto',
            'avg_score' => 'Valoración',
            'complaints' => 'Denuncias',
            'puntuality' => 'Puntualidad',
            'attention' => 'Atención',
            'comfort' => 'Comodidad',
            'security' => 'Seguridad',
            'total_complaints' => 'Total denuncias',

            'route_origin_name' => 'Parada',
            'route_origin_city_name' => 'Ciudad',
            'route_origin_city_iso' => 'ISO Ciudad',

            'route_destiny_name' => 'Parada',
            'route_destiny_city_name' => 'Ciudad',
            'route_destiny_city_iso' => 'ISO Ciudad',
        ],

        'prizes' => [
            'created_at' => 'Creado el',
            'name_section' => 'Mis premios',
            'unlimited' => 'Ilimitado',
            'week' => 'Semanas',
            'mounth' => 'Meses',
            'sticker' => 'Sticker',
            'prize' => 'Premio',
            'link' => 'Enlace',
            'type' => 'Tipo',
            'name' => 'Nombre',
            'active' => 'Activo',
            'description' => 'Descripción',
            'photo' => 'Foto',
            'expires_in' => 'Expira',
            'ammount' => 'Costo de reclamo',
            'available_time_measure' => 'Tipo de duración',
            'available_time_quantity' => 'Tiempo de duración',
        ],

        'travels' => [
            'name_section' => 'Mis viajes',
            'created_at' => 'Creada el',
            'origin_destiny' => 'Origen - Destino',

            'travel_closed' => 'Cerrado',
            'travel_score' => 'Puntuación',
            'travel_total_time' => 'Tiempo total',
            'travel_total_distance' => 'Total distancia',
            'travel_average_speed' => 'Promedio de velocidad',
            'travel_maximun_speed' => 'Velocidad máxima',
            'travel_passengers' => 'Cantidad de pasajeros',
            'travel_comments' => 'Comentarios',
            'travel_travels' => 'Viajes',

            'operator_name' => 'Operador',
            'operator_photo' => 'Foto',
            'bus_patent' => 'Patente',

            'travel_origin_name' => 'Parada',
            'travel_origin_latitude' => 'Latitud',
            'travel_origin_longitude' => 'Longitud',
            'travel_origin_city_name' => 'Ciudad',
            'travel_origin_city_iso' => 'ISO Ciudad',
            'travel_origin_state_name' => 'Estado',
            'travel_origin_state_iso' => 'ISO Estado',

            'travel_destiny_name' => 'Parada',
            'travel_destiny_latitude' => 'Latitud',
            'travel_destiny_longitude' => 'Longitud',
            'travel_destiny_city_name' => 'Ciudad',
            'travel_destiny_city_iso' => 'ISO Ciudad',
            'travel_destiny_state_name' => 'Estado',
            'travel_destiny_state_iso' => 'ISO Estado',
        ],

        'trivias' => [
            'name_section' => 'Preguntas y respuestas',
            'answer' => 'Respuesta',
            'question' => 'Pregunta',
        ],
    ],
];
