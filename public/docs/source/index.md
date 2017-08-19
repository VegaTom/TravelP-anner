---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://127.0.0.1:8000/docs/collection.json)
<!-- END_INFO -->

#Login

Handles incoming login requests.
<!-- START_41821268d5085280cd080f269bf5e085 -->
## Handle a login request.

> Example request:

```bash
curl -X POST "http://127.0.0.1:8000/authenticate" \
-H "Accept: application/json" \
    -d "email"="bartoletti.madeline@example.org" \
    -d "password"="soluta" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/authenticate",
    "method": "POST",
    "data": {
        "email": "bartoletti.madeline@example.org",
        "password": "soluta"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST authenticate`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | Valid user email
    password | string |  required  | 

<!-- END_41821268d5085280cd080f269bf5e085 -->

<!-- START_30427ba110fe7cb636e40afde651c171 -->
## Retrieves user info and renews the token.

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/authenticate" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/authenticate",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": {
        "id": "21f34a05-adb4-4be8-9a3b-f2017830ef25",
        "name": "Travel Planner Admin",
        "email": "admin@travelplanner.com",
        "created_at": "2017-08-19T00:12:26+00:00",
        "roles": {
            "data": [
                {
                    "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                    "name": "Administrador",
                    "level": 1
                },
                {
                    "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                    "name": "Usuario",
                    "level": 2
                }
            ]
        }
    },
    "meta": {
        "token": {}
    }
}
```

### HTTP Request
`GET authenticate`

`HEAD authenticate`


<!-- END_30427ba110fe7cb636e40afde651c171 -->

<!-- START_246a65a38098802705f7e5a260656c97 -->
## Log the user out of the Application.

> Example request:

```bash
curl -X DELETE "http://127.0.0.1:8000/authenticate" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/authenticate",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE authenticate`


<!-- END_246a65a38098802705f7e5a260656c97 -->

#Password Recovery

Handles incoming Password recovery requests.
<!-- START_e4916137930217de906c444c33de5b89 -->
## Password Request Recovery.

> Example request:

```bash
curl -X POST "http://127.0.0.1:8000/password" \
-H "Accept: application/json" \
    -d "email"="jdare@example.com" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/password",
    "method": "POST",
    "data": {
        "email": "jdare@example.com"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST password`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | Valid user email

<!-- END_e4916137930217de906c444c33de5b89 -->

<!-- START_8cd27ba8f277a62f8db01114035dcfcb -->
## Password Recovery.

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/password/{email}/{token}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/password/{email}/{token}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET password/{email}/{token}`

`HEAD password/{email}/{token}`


<!-- END_8cd27ba8f277a62f8db01114035dcfcb -->

#Register

Handles registration on Comunidad Digital.
<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a register request.

> Example request:

```bash
curl -X POST "http://127.0.0.1:8000/register" \
-H "Accept: application/json" \
    -d "name"="sed" \
    -d "email"="mose01@example.com" \
    -d "password"="sed" \
    -d "password_confirmation"="sed" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/register",
    "method": "POST",
    "data": {
        "name": "sed",
        "email": "mose01@example.com",
        "password": "sed",
        "password_confirmation": "sed"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST register`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    email | email |  required  | 
    password | string |  required  | 
    password_confirmation | string |  optional  | Required if the parameters `password` are present.

<!-- END_d7aad7b5ac127700500280d511a3db01 -->

#Routes

Allowed actions for Routes.
<!-- START_e2f3d7fb3c463a6d8fc1fb3fa9f19e11 -->
## Get all Routes

Gets all the routes.

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/api/v1/routes" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/routes",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [
        {
            "id": "d797fa97-c16b-4ef4-9309-9b3914b64e0e",
            "name": "api.v1.index",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "14f41ade-3aa7-43e2-bfe3-9ae8199f1e8c",
            "name": "api.v1.routes.index",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "67c45204-2955-4a38-a08b-1a8003b29600",
            "name": "api.v1.routes.roles",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "857d27b2-cd3b-4c86-b895-97849bee0456",
            "name": "api.v1.trips.delete",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "44ec48c5-c65b-4688-8276-2772cd01c804",
            "name": "api.v1.trips.index",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "437da301-aed3-4510-9cf2-4a1c7609d3c1",
            "name": "api.v1.trips.show",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "eaa5203e-dbb8-42e8-94c8-c3bbbb9c469e",
            "name": "api.v1.trips.store",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "230c1f36-5eeb-4270-8062-8743e2085f82",
            "name": "api.v1.trips.update",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "3a60ddef-df0a-4e06-abe0-41b2487eaac4",
            "name": "api.v1.users.delete",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "dac9a7c7-8d97-4f55-8760-0952499fc15b",
            "name": "api.v1.users.getTrips",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "acecb0d0-163b-4600-9e0c-823e50e26776",
            "name": "api.v1.users.index",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "b969bf0e-aadd-4ca0-aceb-6a93cf223e33",
            "name": "api.v1.users.show",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "a128c901-5c9e-4a02-9c0c-95c1e73d6544",
            "name": "api.v1.users.toggleAdminRole",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "a5eb3aba-fb01-4ae3-8018-5ab777ee7386",
            "name": "api.v1.users.update",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "361066c5-ed25-433a-b7ae-e30c55420f4c",
            "name": "web",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "87b1bc6d-8ed1-4da7-bc9f-bd3c5d47312d",
            "name": "web.authenticate.info",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "12450066-51f4-4d39-8d96-d051845fb14e",
            "name": "web.authenticate.login",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "85d8c087-5996-4bdb-8624-826b34e608ef",
            "name": "web.authenticate.logout",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "aced85e9-ce46-469e-ba56-221b5293683a",
            "name": "web.init",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "aa918c08-dabf-4b63-98dc-279421f9c98a",
            "name": "web.password.password.recovery",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "506ae28a-1622-4ec7-ab50-d70245dcbfca",
            "name": "web.password.password.request.recovery",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "bf33cb90-3d28-4ab7-bd6d-c3bf469f051d",
            "name": "web.register",
            "permissions": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        }
    ],
    "meta": {
        "roles": [
            {
                "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                "name": "Administrador",
                "level": 1
            },
            {
                "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                "name": "Usuario",
                "level": 2
            }
        ]
    }
}
```

### HTTP Request
`GET api/v1/routes`

`HEAD api/v1/routes`


<!-- END_e2f3d7fb3c463a6d8fc1fb3fa9f19e11 -->

<!-- START_666af45deac7de2324548bf975088060 -->
## Toggle role permission

Toggles the permission over the given role_id.

> Example request:

```bash
curl -X PUT "http://127.0.0.1:8000/api/v1/routes/{id}" \
-H "Accept: application/json" \
    -d "role_id"="exercitationem" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/routes/{id}",
    "method": "PUT",
    "data": {
        "role_id": "exercitationem"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/routes/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    role_id | string |  required  | Valid role id

<!-- END_666af45deac7de2324548bf975088060 -->

#Trips

Allowed actions for Trips.
<!-- START_14e6a3f095eb4a9865c98ec21e08e48c -->
## Get all Trips

Gets all the trips on storage. May be filtered by destination,
start_date and/or end_date.

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/api/v1/trips" \
-H "Accept: application/json" \
    -d "destination"="ut" \
    -d "start_date"="2017-08-19T05:52:32+00:00" \
    -d "end_date"="2017-08-19T05:52:32+00:00" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/trips",
    "method": "GET",
    "data": {
        "destination": "ut",
        "start_date": "2017-08-19T05:52:32+00:00",
        "end_date": "2017-08-19T05:52:32+00:00"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [
        {
            "id": "7cb59a1f-ff48-4a0d-9b67-a7558b7db60b",
            "destination": "Arianeview",
            "comment": null,
            "start_date": "2017-08-20T00:12:26+00:00",
            "end_date": "2017-08-24T00:12:26+00:00",
            "time_left": "dentro de 18 horas"
        },
        {
            "id": "390bd859-9a15-4191-ba25-770ff879591d",
            "destination": "Diamondside",
            "comment": null,
            "start_date": "2017-08-20T00:12:26+00:00",
            "end_date": "2017-08-24T00:12:26+00:00",
            "time_left": "dentro de 18 horas"
        },
        {
            "id": "2f433f42-b137-471a-8386-1535f21a19cc",
            "destination": "Lowemouth",
            "comment": "King put on one.",
            "start_date": "2017-08-20T00:12:26+00:00",
            "end_date": "2017-08-24T00:12:26+00:00",
            "time_left": "dentro de 18 horas"
        },
        {
            "id": "d8409841-372b-4d7b-ad91-b5276cb18cf3",
            "destination": "South Miracle",
            "comment": "Dormouse say?' one.",
            "start_date": "2017-08-20T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 18 horas"
        },
        {
            "id": "6ce86fa0-4511-4acc-a576-2543d788f6ac",
            "destination": "Unaburgh",
            "comment": "Alice looked.",
            "start_date": "2017-08-20T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 18 horas"
        },
        {
            "id": "e9abc16b-e769-49d5-94b1-191f65d4f187",
            "destination": "Emmerichfort",
            "comment": null,
            "start_date": "2017-08-21T00:12:26+00:00",
            "end_date": "2017-08-24T00:12:26+00:00",
            "time_left": "dentro de 1 día"
        },
        {
            "id": "8d760581-0b0d-43a1-a912-be9269d441ce",
            "destination": "North Dorothytown",
            "comment": null,
            "start_date": "2017-08-21T00:12:26+00:00",
            "end_date": "2017-08-24T00:12:26+00:00",
            "time_left": "dentro de 1 día"
        },
        {
            "id": "57b875e6-4179-4352-beaa-a2455e1ca207",
            "destination": "East Bernicemouth",
            "comment": "Caterpillar seemed.",
            "start_date": "2017-08-21T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 1 día"
        },
        {
            "id": "ba05031e-60ba-452d-b87d-e8f831dc1fe2",
            "destination": "East Tayaview",
            "comment": "Duchess was.",
            "start_date": "2017-08-21T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 1 día"
        },
        {
            "id": "77f95987-6625-4a42-b6c9-590a2503fbf3",
            "destination": "Kundetown",
            "comment": null,
            "start_date": "2017-08-21T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 1 día"
        },
        {
            "id": "0013d24a-ba82-4122-bc43-bd2baefe9d06",
            "destination": "Markfurt",
            "comment": "Gryphon, and the.",
            "start_date": "2017-08-21T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 1 día"
        },
        {
            "id": "c2f46333-71a2-4e5d-8340-9853f63309d8",
            "destination": "Murphyshire",
            "comment": null,
            "start_date": "2017-08-21T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 1 día"
        },
        {
            "id": "a07c58e5-6bb0-4c7d-b498-8310da3534a6",
            "destination": "Tabithaland",
            "comment": "Go on!' 'I'm a.",
            "start_date": "2017-08-21T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 1 día"
        },
        {
            "id": "c1f699b1-c06c-42e6-bd20-8d013dfc9f47",
            "destination": "Eichmannmouth",
            "comment": null,
            "start_date": "2017-08-22T00:12:26+00:00",
            "end_date": "2017-08-24T00:12:26+00:00",
            "time_left": "dentro de 2 días"
        },
        {
            "id": "28d07987-b418-440a-9922-5c0f4116d4bc",
            "destination": "Lake Dameonbury",
            "comment": null,
            "start_date": "2017-08-22T00:12:26+00:00",
            "end_date": "2017-08-24T00:12:26+00:00",
            "time_left": "dentro de 2 días"
        },
        {
            "id": "1019eee9-5509-4f42-9316-abdd9f149117",
            "destination": "Port Eleazar",
            "comment": null,
            "start_date": "2017-08-22T00:12:26+00:00",
            "end_date": "2017-08-24T00:12:26+00:00",
            "time_left": "dentro de 2 días"
        },
        {
            "id": "d4e9bf0c-1b6e-49b0-9be4-d8b16f2deb30",
            "destination": "Port Sadye",
            "comment": null,
            "start_date": "2017-08-22T00:12:26+00:00",
            "end_date": "2017-08-24T00:12:26+00:00",
            "time_left": "dentro de 2 días"
        },
        {
            "id": "2dbdcf7d-922f-47d8-a15c-08f27590663f",
            "destination": "Chanelchester",
            "comment": "March Hare. 'Yes.",
            "start_date": "2017-08-22T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 2 días"
        },
        {
            "id": "7935d7aa-212b-433b-9645-e5981c151ac1",
            "destination": "Lake Robynfurt",
            "comment": null,
            "start_date": "2017-08-22T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 2 días"
        },
        {
            "id": "8ae75c0d-98ce-4982-ba55-accd29dfc393",
            "destination": "Milanborough",
            "comment": null,
            "start_date": "2017-08-22T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 2 días"
        },
        {
            "id": "aad764ad-127a-4433-a28e-3f544079fd8d",
            "destination": "North Eladiofort",
            "comment": null,
            "start_date": "2017-08-22T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 2 días"
        },
        {
            "id": "f8041ce9-04aa-4caa-a20b-a0246acda345",
            "destination": "Port Jany",
            "comment": null,
            "start_date": "2017-08-22T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 2 días"
        },
        {
            "id": "334acaf8-ba87-4ce1-b1df-2f14a2fed5a2",
            "destination": "Lake Ruthe",
            "comment": "Alice again, for.",
            "start_date": "2017-08-23T00:12:26+00:00",
            "end_date": "2017-08-24T00:12:26+00:00",
            "time_left": "dentro de 3 días"
        },
        {
            "id": "6d4c6488-f284-4244-baaf-dcb3755fc728",
            "destination": "East Vancehaven",
            "comment": null,
            "start_date": "2017-08-23T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 3 días"
        },
        {
            "id": "e3064867-8005-4242-8109-5b64ff4d0b3e",
            "destination": "Gutkowskiborough",
            "comment": null,
            "start_date": "2017-08-23T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 3 días"
        },
        {
            "id": "0daa945a-6635-43a9-942a-667ca07e65e9",
            "destination": "Hicklefurt",
            "comment": "And the Gryphon.",
            "start_date": "2017-08-23T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 3 días"
        },
        {
            "id": "2993404e-5115-4029-83a5-866093e8cb29",
            "destination": "Lake Adell",
            "comment": null,
            "start_date": "2017-08-23T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 3 días"
        },
        {
            "id": "5e5ff5ed-1428-4fa2-b3b2-88ba046ce77b",
            "destination": "New Giuseppeside",
            "comment": "Caterpillar's.",
            "start_date": "2017-08-23T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 3 días"
        },
        {
            "id": "3e470a99-0988-49d6-bd02-bcac1946341b",
            "destination": "New Marcos",
            "comment": null,
            "start_date": "2017-08-23T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 3 días"
        },
        {
            "id": "79cd6e94-c603-4c90-a50e-5accd817abc9",
            "destination": "Starkmouth",
            "comment": null,
            "start_date": "2017-08-23T00:12:27+00:00",
            "end_date": "2017-08-24T00:12:27+00:00",
            "time_left": "dentro de 3 días"
        }
    ]
}
```

### HTTP Request
`GET api/v1/trips`

`HEAD api/v1/trips`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    destination | string |  optional  | 
    start_date | date |  optional  | Date format: `Y-m-d\TH:i:sP`
    end_date | date |  optional  | Date format: `Y-m-d\TH:i:sP`

<!-- END_14e6a3f095eb4a9865c98ec21e08e48c -->

<!-- START_b0bfe967e103764914eff25d075c572c -->
## Creates a new Trip

If there is no given user_id then the trip will be
assigned to the logged user.

> Example request:

```bash
curl -X POST "http://127.0.0.1:8000/api/v1/trips" \
-H "Accept: application/json" \
    -d "destination"="repudiandae" \
    -d "comment"="repudiandae" \
    -d "start_date"="2017-08-19T05:52:32+00:00" \
    -d "end_date"="Friday, 02-Jan-70 00:00:00 UTC" \
    -d "user_id"="repudiandae" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/trips",
    "method": "POST",
    "data": {
        "destination": "repudiandae",
        "comment": "repudiandae",
        "start_date": "2017-08-19T05:52:32+00:00",
        "end_date": "Friday, 02-Jan-70 00:00:00 UTC",
        "user_id": "repudiandae"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/trips`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    destination | string |  required  | 
    comment | string |  optional  | 
    start_date | date |  required  | Date format: `Y-m-d\TH:i:sP`
    end_date | date |  required  | Date format: `Y-m-d\TH:i:sP` Must be a date after: `Thursday, 01-Jan-70 00:00:00 UTC`
    user_id | string |  required  | Valid user id

<!-- END_b0bfe967e103764914eff25d075c572c -->

<!-- START_7ec811b79b627b20c3f728d178c591f7 -->
## Show the trip.

Shows the given trip.

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/api/v1/trips/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/trips/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/v1/trips/{id}`

`HEAD api/v1/trips/{id}`


<!-- END_7ec811b79b627b20c3f728d178c591f7 -->

<!-- START_0e49d0a48471720e3d9198bece9c5c82 -->
## Update the trip.

Updates the given trip.

> Example request:

```bash
curl -X PUT "http://127.0.0.1:8000/api/v1/trips/{id}" \
-H "Accept: application/json" \
    -d "destination"="quis" \
    -d "comment"="quis" \
    -d "start_date"="2017-08-19T05:52:32+00:00" \
    -d "end_date"="Friday, 02-Jan-70 00:00:00 UTC" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/trips/{id}",
    "method": "PUT",
    "data": {
        "destination": "quis",
        "comment": "quis",
        "start_date": "2017-08-19T05:52:32+00:00",
        "end_date": "Friday, 02-Jan-70 00:00:00 UTC"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/trips/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    destination | string |  required  | 
    comment | string |  optional  | 
    start_date | date |  required  | Date format: `Y-m-d\TH:i:sP`
    end_date | date |  optional  | Required if the parameters `start_date` are present. Date format: `Y-m-d\TH:i:sP` Must be a date after: `Thursday, 01-Jan-70 00:00:00 UTC`

<!-- END_0e49d0a48471720e3d9198bece9c5c82 -->

<!-- START_ccf8af9f918f70a1aa9d6a0c4e8188ad -->
## Delete the trip.

Deletes the given trip.

> Example request:

```bash
curl -X DELETE "http://127.0.0.1:8000/api/v1/trips/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/trips/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/trips/{id}`


<!-- END_ccf8af9f918f70a1aa9d6a0c4e8188ad -->

#Users

Allowed actions for Users.
<!-- START_080f3ecebb7bcc2f93284b8f5ae1ac3b -->
## Get all Users

Gets all the users.

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/api/v1/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "data": [
        {
            "id": "a16a3764-e0fa-4885-a594-d627d299d26d",
            "name": "Alba Lindgren DVM",
            "email": "freeda50@example.com",
            "created_at": "2017-08-19T00:12:26+00:00",
            "roles": {
                "data": [
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "5051b568-bfe8-4e06-ad33-19dc4bc7ffe6",
            "name": "Annamae Hand",
            "email": "shayna95@example.com",
            "created_at": "2017-08-19T00:12:26+00:00",
            "roles": {
                "data": [
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "61b31cef-51d7-4f90-bd6f-e0064c8e1eaf",
            "name": "Aubrey Swaniawski",
            "email": "icollins@example.com",
            "created_at": "2017-08-19T00:12:26+00:00",
            "roles": {
                "data": [
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "e4b5660b-1227-4938-9614-0396aa4905c9",
            "name": "Prof. Maurice Krajcik",
            "email": "ywelch@example.org",
            "created_at": "2017-08-19T00:12:26+00:00",
            "roles": {
                "data": [
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "fedc07ac-82a8-4ccf-a1b0-cbf35897e107",
            "name": "Santa Douglas",
            "email": "ohara.branson@example.org",
            "created_at": "2017-08-19T00:12:26+00:00",
            "roles": {
                "data": [
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        },
        {
            "id": "21f34a05-adb4-4be8-9a3b-f2017830ef25",
            "name": "Travel Planner Admin",
            "email": "admin@travelplanner.com",
            "created_at": "2017-08-19T00:12:26+00:00",
            "roles": {
                "data": [
                    {
                        "id": "30722964-8176-4222-a2e4-c8143cfcc6db",
                        "name": "Administrador",
                        "level": 1
                    },
                    {
                        "id": "cf2ea5d3-0b48-4dcf-9ff2-a2441da9b7d8",
                        "name": "Usuario",
                        "level": 2
                    }
                ]
            }
        }
    ]
}
```

### HTTP Request
`GET api/v1/users`

`HEAD api/v1/users`


<!-- END_080f3ecebb7bcc2f93284b8f5ae1ac3b -->

<!-- START_d4601f72a90719299f051e31bd8f894a -->
## Show the Users

Shows the specified user.

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/api/v1/users/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/users/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/v1/users/{id}`

`HEAD api/v1/users/{id}`


<!-- END_d4601f72a90719299f051e31bd8f894a -->

<!-- START_4a5d19d4bd94b15e8aaf05f0cf462ef3 -->
## Update the Users

Updates the specified user.

> Example request:

```bash
curl -X PUT "http://127.0.0.1:8000/api/v1/users/{id}" \
-H "Accept: application/json" \
    -d "name"="esse" \
    -d "email"="fdeckow@example.net" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/users/{id}",
    "method": "PUT",
    "data": {
        "name": "esse",
        "email": "fdeckow@example.net"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/users/{id}`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    email | email |  required  | 

<!-- END_4a5d19d4bd94b15e8aaf05f0cf462ef3 -->

<!-- START_8b97688fa48f9a3858d3b640a906b76b -->
## Delete the Users

Deletes the specified user.

> Example request:

```bash
curl -X DELETE "http://127.0.0.1:8000/api/v1/users/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/users/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/users/{id}`


<!-- END_8b97688fa48f9a3858d3b640a906b76b -->

<!-- START_c1fdb3dc7cbf3e1da9e49f81855b5b00 -->
## Get Trips

Gets all the trips on storage for the given user.
May be filtered by destination, start_date and/or end_date.

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/api/v1/users/{id}/trips" \
-H "Accept: application/json" \
    -d "destination"="tenetur" \
    -d "start_date"="2017-08-19T05:52:33+00:00" \
    -d "end_date"="2017-08-19T05:52:33+00:00" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/users/{id}/trips",
    "method": "GET",
    "data": {
        "destination": "tenetur",
        "start_date": "2017-08-19T05:52:33+00:00",
        "end_date": "2017-08-19T05:52:33+00:00"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/v1/users/{id}/trips`

`HEAD api/v1/users/{id}/trips`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    destination | string |  optional  | 
    start_date | date |  optional  | Date format: `Y-m-d\TH:i:sP`
    end_date | date |  optional  | Date format: `Y-m-d\TH:i:sP`

<!-- END_c1fdb3dc7cbf3e1da9e49f81855b5b00 -->

<!-- START_cef900d987e8cd200b100d3ab42777be -->
## Toggle admin role

Toggles the admin role over the given user.

> Example request:

```bash
curl -X PUT "http://127.0.0.1:8000/api/v1/users/{id}/admin" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/v1/users/{id}/admin",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/users/{id}/admin`


<!-- END_cef900d987e8cd200b100d3ab42777be -->

#general
<!-- START_e88d0620830b5dbcbaf5936cfd2747a7 -->
## Dump api-docs.json content endpoint.

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/docs/{jsonFile?}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/docs/{jsonFile?}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET docs/{jsonFile?}`

`HEAD docs/{jsonFile?}`

`POST docs/{jsonFile?}`

`PUT docs/{jsonFile?}`

`PATCH docs/{jsonFile?}`

`DELETE docs/{jsonFile?}`


<!-- END_e88d0620830b5dbcbaf5936cfd2747a7 -->

<!-- START_8e0ec6fba3d92922930a840cdbf22a68 -->
## Display Swagger API page.

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/api/documentation" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/documentation",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/documentation`

`HEAD api/documentation`


<!-- END_8e0ec6fba3d92922930a840cdbf22a68 -->

<!-- START_60aaaceb8214a6e74a00af1504417121 -->
## docs/asset/{asset}

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/docs/asset/{asset}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/docs/asset/{asset}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET docs/asset/{asset}`

`HEAD docs/asset/{asset}`


<!-- END_60aaaceb8214a6e74a00af1504417121 -->

<!-- START_111f2ea586c7503d078532919600dbf6 -->
## Display Oauth2 callback pages.

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/api/oauth2-callback" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/api/oauth2-callback",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/oauth2-callback`

`HEAD api/oauth2-callback`


<!-- END_111f2ea586c7503d078532919600dbf6 -->

<!-- START_cd4bc6b66f8bb0e646d0529a4e192c3f -->
## Terms of Use

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/terms" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/terms",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET terms`

`HEAD terms`


<!-- END_cd4bc6b66f8bb0e646d0529a4e192c3f -->

<!-- START_38cc0386bf020528383ad3edcf4826d1 -->
## Privacy Policy

> Example request:

```bash
curl -X GET "http://127.0.0.1:8000/privacy" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://127.0.0.1:8000/privacy",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET privacy`

`HEAD privacy`


<!-- END_38cc0386bf020528383ad3edcf4826d1 -->

