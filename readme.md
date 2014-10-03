### Simple OAuth2 server

Install via composer `composer install --no-scripts`.

Configure DB first at `app/config/database.php`.

Then install OAuth2 migrations
`php artisan migrate --package="lucadegasperi/oauth2-server-laravel"`

After migrate and seed
`php artisan migrate --seed`

Start server `php artisan serve`

Go to `http://localhost:8000/auth/login`.
Login: `master`, password: `master`. 
There is default application at `http://localhost:8000/applications`

Load [Simple oauth client github](https://github.com/andrewdacenko/laravel-oauth2-client-example) and authorize with password or via auth code.
