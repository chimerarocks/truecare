#!/bin/bash

npm install
npm run prod
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
php-fpm
