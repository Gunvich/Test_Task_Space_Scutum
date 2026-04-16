## Tech

- PHP (Laravel 12)
- Docker
- MariaDB
- phpMyAdmin
- Laravel Sanctum (Auth API)

## Instalation

docker compose up -d --build
docker compose exec app bash
cd app
composer install

### .env

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=user
DB_PASSWORD=password

### Generate application key

php artisan key:generate 

### Migrations

php artisan migrate:fresh --seed

### Links

API: http://localhost:8080/api
phpMyAdmin: http://localhost:8081

## Routes

POST /api/register
POST /api/login

### Next with Bearer Token

GET /api/me
GET /api/products
POST /api/products
GET /api/products?category=books
GET /api/products?min_price=100&max_price=500
GET /api/products/{id}/comments
POST /api/products/{id}/comments
DELETE /api/comments/{id}
POST /api/purchase
GET /api/purchases
