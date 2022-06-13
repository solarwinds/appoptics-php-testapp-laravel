# appoptics-php-testapp-laravel
Test Apps for Laravel

## Steps to add a new version for Nosetests (example for Laravel 8)

1. Find out the [earliest supported PHP version](https://en.wikipedia.org/wiki/Laravel#Release_history) for Laravel 8: 7.3.0
2. `docker run -it php:7.3 bash`
3. Then inside docker:
    * `curl -sS https://getcomposer.org/installer | php`
    * `mv composer.phar /usr/local/bin/composer`
    * `apt update && apt install git zip unzip`
    * `composer create-project --prefer-dist laravel/laravel 8`
    * \<log out of docker\>
4. `docker cp \<docker-id\>:/8 .`
5. We need to edit this folder  in order to fit in nosetest, here is the list of files. Can refer to the `8` folder in master branch
    1. Added `app/Http/Controllers/TestControllers.php` (There are 2 functions for nosetest, `nosetest()` & `nosetestError()`. They are testing event + listeners, database, cache & exceptions
    2. Added `app/Listeners/NosetestQueuedListener.php`
    3. Added `app/Listeners/NosetestSyncedListener.php`
    4. Updated `app/Providers/EventServiceProvider.php` to listen `NoseEvent`
    5. Added `app/Models/Nosetest.php` for database object
    6. Added `app/Events/NoseEvent.php` for event object
    7. Updated `bootstrap/cache` into symbolic link because Jenkins doesn't have admin right in nosetest runtime
    8. Added `database/migrations/2020_10_21_212030_create_nosetest_table.php` to create the database and table in sqlite
    9. Updated `routes/web.php` for `/nosetest` & `/nosetesterror` routing
    10. Updated `storage/framework/views` into symbolic link because Jenkins doesn't have admin right in nosetest runtime
    11. Added `terminate` function to `vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php` for nosetest [This path can be different from newer laravel version]
    12.  Updated `.env` for Jenkins environment
6. Create database and table file by touch `8/database/database.sqlite`
7. Create database and table from the migrations files by `cd 8 && php artisan migrate`
8. Make sure all files are committed by editing `.gitignore` files in all folder

Tips: Use `php artisan serve` to test the laravel app step by step first and customize the environment setting for Jenkins

Reference: [commit](https://github.com/appoptics/appoptics-php-testapp-laravel/compare/2ac1459e8c2711428d3b5feb83e1223364dbfaf8...45c228d8b1472098377896766c4c74fee1840452)  from the laravel 6 update

