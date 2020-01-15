<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About This Project

This project is REST API test from Mamikost

- first you must import database from mamikost.sql file into your mysql
- than import mamikost.postman_collection.json into your postman
- after that run the laravel (go to dir project and than "php artisan serve" to run)
- first if you dont have user account, please register
- after that you will get user id and api_token for other transaction
- the scheduled job is set on this project, to run it just execute php artisan schedule:run >> /dev/null 2>&1
