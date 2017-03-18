## OAuth-Server
[![Build Status](https://travis-ci.org/233sec/laravel-oauth-server.png)](https://travis-ci.org/233sec/laravel-oauth-server)
[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE)

An oauth server based on Laravel 5.2, it's simple, but powerful.

## Installation
```shell
git clone https://github.com/233sec/laravel-oauth-server.git
composer install
cp .env.example .env
vim .env #edit db config
php artisan migrate
vim app/Providers/OauthServerEloquentUserProvider.php #for existing business, you had to edit this file to integrate with your user auth algorithm.
```

## Trouble shooting
See and search issue ( https://github.com/233sec/laravel-oauth-server/issues ).

## License
MIT
