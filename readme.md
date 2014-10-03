### Simple OAuth2 server

Install via composer `composer install --no-scripts`.

Configure DB first at `app/config/database.php`.

Then install OAuth2 migrations
`php artisan migrate --package="lucadegasperi/oauth2-server-laravel"`

After migrate and seed
`php artisan migrate --seed`

Start server `php artisan serve`

Go to `/applications`. Login: `master`, password: `master`. Add new application. And add new endpoint as `http://localhost:8080/authenticated`

[Simple oauth client github](https://github.com/andrewdacenko/laravel-oauth2-client-example)
