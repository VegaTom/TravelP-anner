<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
     */

    'accepted' => 'El campo :attribute debe ser aceptado.',
    'active_url' => 'El campo :attribute no es una URL válida.',
    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El campo :attribute sólo puede contener letras.',
    'alpha_dash' => 'El campo :attribute sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
    'alpha_num' => 'El campo :attribute sólo puede contener letras y números.',
    'array' => 'El campo :attribute debe ser un array.',
    'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El campo :attribute debe ser un valor entre :min y :max.',
        'file' => 'El archivo :attribute debe pesar entre :min y :max kilobytes.',
        'string' => 'El campo :attribute debe contener entre :min y :max caracteres.',
        'array' => 'El campo :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'El campo confirmación de :attribute no coincide.',
    'country' => 'El campo :attribute no es un país válido.',
    'date' => 'El campo :attribute no corresponde con una fecha válida.',
    'date_format' => 'El campo :attribute no corresponde con el formato de fecha :format.',
    'different' => 'Los campos :attribute y :other han de ser diferentes.',
    'digits' => 'El campo :attribute debe ser un número de :digits dígitos.',
    'digits_between' => 'El campo :attribute debe contener entre :min y :max dígitos.',
    'dimensions' => 'El campo :attribute tiene dimensiones invalidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'email' => 'El campo :attribute no corresponde con una dirección de e-mail válida.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute es obligatorio.',
    'exists' => 'El campo :attribute no existe.',
    'image' => 'El campo :attribute debe ser una imagen.',
    'in' => 'El campo :attribute debe ser igual a alguno de estos valores :values',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El campo :attribute debe ser un número entero.',
    'ip' => 'El campo :attribute debe ser una dirección IP válida.',
    'json' => 'El campo :attribute debe ser una cadena de texto JSON válida.',
    'max' => [
        'numeric' => 'El campo :attribute debe ser :max como máximo.',
        'file' => 'El archivo :attribute debe pesar :max kilobytes como máximo.',
        'string' => 'El campo :attribute debe contener :max caracteres como máximo.',
        'array' => 'El campo :attribute debe contener :max elementos como máximo.',
    ],
    'mimes' => 'El campo :attribute debe ser un archivo de tipo :values.',
    'mimetypes' => 'El campo :attribute debe ser un archivo de tipo :values.',
    'min' => [
        'numeric' => 'El campo :attribute debe tener al menos :min.',
        'file' => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string' => 'El campo :attribute debe contener al menos :min caracteres.',
        'array' => 'El campo :attribute no debe contener más de :min elementos.',
    ],
    'not_in' => 'El campo :attribute seleccionado es invalido.',
    'numeric' => 'El campo :attribute debe ser un numero.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El formato del campo :attribute es inválido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_if' => 'El campo :attribute es obligatorio cuando el campo :other es :value.',
    'required_unless' => 'El campo :attribute es requerido a menos que :other se encuentre en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ningún campo :values están presentes.',
    'same' => 'Los campos :attribute y :other deben coincidir.',
    'size' => [
        'numeric' => 'El campo :attribute debe ser :size.',
        'file' => 'El archivo :attribute debe pesar :size kilobytes.',
        'string' => 'El campo :attribute debe contener :size caracteres.',
        'array' => 'El campo :attribute debe contener :size elementos.',
    ],
    'state' => 'El estado no es válido para el país seleccionado.',
    'string' => 'El campo :attribute debe contener solo caracteres.',
    'timezone' => 'El campo :attribute debe contener una zona válida.',
    'unique' => 'El elemento :attribute ya está en uso.',
    'uploaded' => 'El elemento :attribute fallo al subir.',
    'url' => 'El formato de :attribute no corresponde con el de una URL válida.',

    'exists_by_id_or_serial' => 'El ID/Serial de :param indicado no es válido.',
    'image_url_or_b64' => 'La foto que se desea subir debe ser o bien una imágen válida (jpg, png, bmp, etc), dirección URL o Base64.',
    'used_token' => 'El código de 6 dígitos indicado ya ha sido usado.',
    'valid_user_token' => 'El código de 6 dígitos indicado no es correcto.',
    'has_no_recovery_request' => 'Actualmente tienes una petición de recuperación de contraseña pendiente. Debes proseguirla o cancelarla.',

    'none_or_one_true' => 'Debes seleccionar una respuesta correcta si es una trivia o ninguna correcta si es una encuesta.',
    'not_from_same_question' => 'Las respuestas indicadas no pueden ser de la misma pregunta.',
    'survey_for_register' => 'Las respuestas indicadas deben ser de la encuesta de :survey.',

    'not_in_process' => 'El número de teléfono indicado ya se encuentra en proceso de registro.',
    'valid_register_token' => 'El token de registro indicado no es válido o ya ha expirado.',

    'not_user' => 'El :attribute indicado ya se encuentra registrado para un usuario.',
    'not_admin' => 'El :attribute indicado ya se encuentra registrado para un administrador.',
    'not_analyst' => 'El :attribute indicado ya se encuentra registrado para un analista.',
    'not_visitor' => 'El :attribute indicado ya se encuentra registrado para un visitante.',
    'active_user_or_admin' => 'El :attribute indicado no pertenece a un usuario activo.',

    'no_more_than' => 'El recurso indicado excede el máximo número de activos permitidos (3).',

    'about_priorities' => 'Las prioridades de los elementos del acerca de no son válidas.',
    'page_priorities' => 'Las prioridades de las páginas del tutorial no son válidas.',
    'draft_priorities' => 'Las prioridades de los elementos de la plantilla no son válidas.',
    #'section_priorities' => 'Las prioridades de las secciones :attribute del tutorial no son válidas.',

    'abouts.content.value_url_if_type_no_text' => 'El valor del elemento :element debe ser una cadena si el tipo es text, una url válida o una imagen en b64 si el tipo es img o una url válida si es url o video.',
    'abouts.content.type.required' => 'El tipo del elemento :element es obligatorio.',
    'abouts.content.type.in' => 'El tipo del elemento :element debe ser igual a alguno de estos valores :values.',
    'abouts.content.value.required' => 'El valor del elemento :element es obligatorio.',
    'abouts.content.value.string' => 'El valor del elemento :element debe contener solo caracteres.',
    'abouts.content.priority.required' => 'La prioridad del elemento :element es obligatoria.',
    'abouts.content.priority.integer' => 'La prioridad del elemento :element debe ser un número entero.',
    'abouts.content.priority.min' => 'La prioridad del elemento :element debe ser al menos :min.',
    'abouts.content.priority.distinct' => 'La prioridad del elemento :element tiene un valor duplicado.',

    'drafts.content.value_url_if_type_no_text' => 'El valor del elemento :element debe ser una cadena si el tipo es text, una url válida o una imagen en b64 si el tipo es img o una url válida si es url o video.',
    'drafts.content.type.required' => 'El tipo del campo :element es obligatorio.',
    'drafts.content.type.in' => 'El tipo del campo :element debe ser igual a alguno de estos valores :values.',
    'drafts.content.type.distinct' => 'El tipo del campo :element ya ha sido seleccionado.',
    'drafts.content.value.required' => 'El valor del campo :element es obligatorio.',
    'drafts.content.value.string' => 'El valor del campo :element debe contener solo caracteres.',
    'drafts.content.priority.required' => 'La prioridad del campo :element es obligatoria.',
    'drafts.content.priority.integer' => 'La prioridad del campo :element debe ser un número entero.',
    'drafts.content.priority.min' => 'La prioridad del campo :element debe ser al menos :min.',
    'drafts.content.priority.distinct' => 'La prioridad del campo :element tiene un valor duplicado.',

    'notifications.content.value_url_if_type_no_text' => 'El valor del elemento :element debe ser una cadena si el tipo es text, una url válida o una imagen en b64 si el tipo es img o una url válida si es url o video.',
    'notifications.content.type.required' => 'El tipo del elemento :element es obligatorio.',
    'notifications.content.type.in' => 'El tipo del elemento :element debe ser igual a alguno de estos valores :values.',
    'notifications.content.value.required' => 'El valor del elemento :element es obligatorio.',
    'notifications.content.value.string' => 'El valor del elemento :element debe contener solo caracteres.',
    'notifications.content.priority.required' => 'La prioridad del elemento :element es obligatoria.',
    'notifications.content.priority.integer' => 'La prioridad del elemento :element debe ser un número entero.',
    'notifications.content.priority.min' => 'La prioridad del elemento :element debe ser al menos :min.',
    'notifications.content.priority.distinct' => 'La prioridad del elemento :element tiene un valor duplicado.',
    'notifications.send_to.required' => 'El id del usuario :element es obligatorio.',
    'notifications.send_to.string' => 'El id del usuario :element debe contener solo caracteres.',
    'notifications.send_to.exists' => 'El id del usuario :element no existe.',
    'notifications.publish_date.required_if' => 'El campo fecha de publicación es obligatorio cuando el campo enviar ahora es falso.',
    'notifications.publish_date.date_format' => 'El campo fecha de publicación debe ser de la forma 2000-12-31T20:00:00+00:00.',
    'notifications.expire_date.date_format' => 'El campo fecha de vencimiento debe ser de la forma 2000-12-31T20:00:00+00:00.',

    'trivias.answers.text.required' => 'La respuesta #:number es obligatoria.',
    'trivias.answers.text.max' => 'La respuesta #:number debe ser como máximo :max caracteres.',
    'trivias.answers.text.distinct' => 'La respuesta #:number se encuentra duplicada.',

    'tutorials.content.priority.required' => 'La prioridad de la página :page es obligatoria.',
    'tutorials.content.priority.integer' => 'La prioridad de la página :page debe ser un número entero.',
    'tutorials.content.priority.min' => 'La prioridad de la página :page debe ser al menos :min.',
    'tutorials.content.priority.max' => 'La prioridad de la página :page debe ser :max como máximo.',
    'tutorials.content.priority.distinct' => 'La prioridad de la página :page tiene un valor duplicado.',
    'tutorials.content.content.required' => 'El contenido de la página :page es obligatorio.',
    'tutorials.content.content.value_url_if_type_no_text' => 'El valor del elemento :element de la página :page debe ser una cadena si el tipo es text, una url válida o una imagen en b64 si el tipo es img o una url válida si es url o video.',
    'tutorials.content.content.section_priorities' => 'Las prioridades de los elementos de la página :page no son válidas.',
    'tutorials.content.content.type.required' => 'El tipo del elemento :element de la página :page es obligatorio.',
    'tutorials.content.content.type.in' => 'El tipo del elemento :element de la página :page debe ser igual a alguno de estos valores :values.',
    'tutorials.content.content.value.required' => 'El valor del elemento :element de la página :page es obligatorio.',
    'tutorials.content.content.value.string' => 'El valor del elemento :element de la página :page debe contener solo caracteres.',
    'tutorials.content.content.priority.required' => 'La prioridad del elemento :element de la página :page es obligatoria.',
    'tutorials.content.content.priority.integer' => 'La prioridad del elemento :element de la página :page debe ser un número entero.',
    'tutorials.content.content.priority.min' => 'La prioridad del elemento :element de la página :page debe ser al menos :min.',
    'tutorials.content.content.priority.distinct' => 'La prioridad del elemento :element de la página :page tiene un valor duplicado.',

    'unique_for_operator' => 'El campo :attribute ya se encuentra registrado para un encargado del operador.',

    'existing_patent_or_new' => 'La patente no es válida para el operador indicado.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
     */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
            '15 years ago' => 'hace 15 años',
            'yesterday' => 'ayer',
        ],
        'yesterday' => 'ayer',
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
     */

    'attributes' => [
        'action_id' => 'acción',
        'activate' => 'activar',
        'activate.0' => 'activar',
        'activate.1' => 'activar',
        'activate.2' => 'activar',
        'alias' => 'Alias',
        'ammount' => 'monto',
        'available_time_quantity' => 'tiempo de duración',
        'available_time_measure' => 'medida del tiempo de duración',
        'birth_date' => 'Fecha de nacimiento',
        'complaint_category_id' => 'categoría de denuncia',
        'content.image' => 'imagen del contenido',
        'content.logo' => 'logo del contenido',
        'content.text' => 'texto del contenido',
        'description' => 'descripción',
        'destiny' => 'destino',
        'email' => 'Correo Electrónico',
        'end_date' => 'Fecha de fin',
        'expire_date' => 'fecha de vencimiento',
        'fb_ids' => 'IDs de facebook',
        'first_name' => 'Nombre',
        'hour' => 'hora',
        'img' => 'imagen',
        'last_name' => 'Apellido',
        'name' => 'Nombre',
        'operator' => 'operador',
        'operator_id' => 'operador',
        'origin' => 'origen',
        'partners' => 'viaja con acompañantes',
        'password' => 'Contraseña',
        'password_confirmation' => 'Confirmar Contraseña',
        'patent' => 'patente',
        'phone' => 'Teléfono',
        'photo' => 'Foto',
        'price' => 'premio',
        'publish_date' => 'fecha de publicación',
        'send_to' => 'enviar a',
        'send_now' => 'enviar ahora',
        'start_date' => 'Fecha de inicio',
        'status' => 'estatus',
        'state' => 'estado',
        'text' => 'texto',
        'ticket_ammount' => 'valor del pasaje',
        'title' => 'título',
        'travel_share' => 'compartir el viaje',
        'type' => 'tipo',
        'url' => 'link externo',

    ],

];
