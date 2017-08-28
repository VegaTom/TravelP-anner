# Travel Planner
##### Example test for 4Geeks

[![Laravel](https://dynamicimageses-v2b.netdna-ssl.com/product_class_external_product/laravel_128.png)](https://laravel.com/)[![AngularJS](http://www.script-tutorials.com/demos/359/thumb.png)](https://angularjs.org/)

### 1. Requirements
  - PHP ^7.0
  - Laravel ^5.4
  - AngularJS ^1.6
  - Composer
  - Yarn

### 2. Instalation
- Download or clone this repo.
### 2.1 Laravel
- Run:
```sh
    $ cd TravelPlanner
    $ composer install
    $ cp .env.example .env
    $ php artisan key:generate
```
- Edit .env file:
```sh
    APP_URL=http://localhost                #where the project is deployed
    APP_LOCALE=es                           #default locale

    DB_DATABASE=travel_planner              #default database
    DB_DATABASE_test=travel_planner_test    #database for unit tests
    
    EXCEPTION_REPORT_OVER_EMAIL=true        #whether or not exceptions should be reported over email
    EXCEPTION_REPORT_EMAIL=                 #email where exceptions should be reported
    
    JWT_TTL=9600                            #WebTokens Time To Live (minutes)
    JWT_REFRESH_TTL=20160                   #WebTokens Refreshing TTL (minutes)
    JWT_BLACKLIST_ENABLED=true              #whether or not WebTokens should be blacklisted 
```
 - Run:
```sh
    $ php artisan migrate --seed
    $ php artisan queue:listen&               #& symbol releases the cli
``` 
### 2.2 AngularJS
```sh
    $ cd angularjs
    $ yarn
```
* Reffer to angularjs/Readme.md for further info

### 3. Running
Travel Planner comes with a ready angularjs build, just run
```sh
    $ php artisan serve
```
and open the browser at http://localhost:8000.
Default admin user is: 
* email: admin@travelplanner.com
* password: secret

### 4. Building new modifications on angularjs code
* Reffer to angularjs/Readme.md for further info

### 5. Tests
There is only php unit tests fo backend.
Make sure to have DB_DATABASE_TEST in both .env and phpunit.xml files configured and correctly migrated
```sh
    $ php artisan migrate --seed --database=mysql-test
```
For tests, run:
```sh
    $ vendor/bin/phpunit
```

