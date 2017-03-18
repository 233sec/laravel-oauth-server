## OAuth-Server
An oauth server based on Laravel 5.2, it's simple, but powerful.

## Installation
1. git clone https://github.com/233sec/laravel-oauth-server.git
2. composer install
3. cp .env.example .env
4. vim .env
5. php artisan migrate
6. vim app/Providers/OauthServerEloquentUserProvider.php #for existing business, you had to edit this file to integrate with your user auth algorithm.

## Trouble shooting
See and search issue.

## License
use laravelLicense as laravel;
class oauthServerLicense extends Laravel{

}
