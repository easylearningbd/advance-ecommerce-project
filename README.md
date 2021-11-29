
## About This project

- install composer 

- run composer install

- run cp .env.example .env

- create db and config DB_.. key in .env file

- run php artisan key:gen

- run php artisan migrate

- run php artisan storage:link

- run php artisan serve

- if you want to use it as microservice read [As Microservice] of this readme file below.

- if you want to config in cpanel read CPANEL section

## As Microservice

if you use this app as microservice you should config
``` AS_MICROSERVICE=1 ``` in your project .env file

## Documentation

For swagger documentations please open : localhost:8000/api/docs

## CPANEL

- for FILESYSTEM_DRIVER and storate you need: https://gist.github.com/saber13812002/75db95cc2ce47067e8730f3ff8e9def5

 - your php version should be 7.4
 - mbstring and fileinfo installed in extension tab
 - composer update needed if upgrade


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
