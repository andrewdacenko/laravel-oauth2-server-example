### Simple OAuth2 server

Install via composer `composer install --no-scripts`.

Configure DB first at `app/config/database.php`.

Then install OAuth2 migrations
```php artisan migrate --package="lucadegasperi/oauth2-server-laravel"```

After migrate and seed
```php artisan migrate --seed```

At the end test it `php artisan serve`

Go to `/users`. Login: `master`, password: `master`. Add new application.

[Simple oauth client github](https://github.com/andrewdacenko/laravel-oauth2-client-example)