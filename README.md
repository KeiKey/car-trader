# CarTrader

This project runs with Laravel version 8.75.

## Getting started

Assuming you've already installed on your machine: PHP (>= 7.3.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and [Node.js](https://nodejs.org).

``` bash
# install dependencies
composer install
npm install && npm run dev

# create .env file, fill your database configurations and generate the application key
cp .env.example .env
php artisan key:generate

# seed data
php artisan db:seed
