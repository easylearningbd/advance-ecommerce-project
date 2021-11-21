## About This Project

This project use Laravel. 

## Steps:

 - clone this project
 - install composer
 - run compose install
 - create db for this project e.g advance_ecommerce_db_01
 - clone .env file with this command : cp .env.example .env
 - modify .env file with proper connection string and credentials


DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=advance_ecommerce_db_01
DB_USERNAME=root
DB_PASSWORD=1234567890

 - run php artisan migrate --seed

or   

 - restore db_backup.sql on your mysql db from /database folder


login in localhost:8000/login

user: saber@admin.com
pass: 1234567890

then login in admin panel with localhost:8000/admin/login

user:admin@admin.com
pass:1234567890
=======
install composer 

run composer install

run cp .env.example .env

create db and config DB_.. key in .env file

run php artisan key:gen

run php artisan migrate

run php artisan serve

if you want to use it as microservice read [As Microservice] of this readme file below.

## As Microservice

if you use this app as microservice you should config
``` AS_MICROSERVICE=1 ``` in your project .env file

## Documentation

For swagger documentations please open : localhost:8000/api/documentation

## CPANEL

 - your php version should be 7.4
 - mbstring and fileinfo installed in extension tab
 - composer update needed if upgrade


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
