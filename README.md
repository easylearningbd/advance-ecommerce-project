<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
