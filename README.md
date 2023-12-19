## Clone and run project:

```bash
    cd shoppe

    composer install
    composer update
    composer install --ignore-platform-reqs

    npm install
    
    cp .env.example .env (config...)

    php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

    php artisan migrate

    php artisan serve

```
