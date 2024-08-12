# appoptics-php-testapp-laravel
Test Apps for Laravel

## Steps to add a new version for Nosetests (example for Laravel 11)

Noted: It is better to perform the following these steps in a GUI VM environment rather than docker so you can check the laravel application using a browser

1. Find out the [earliest supported PHP version](https://en.wikipedia.org/wiki/Laravel#Release_history) for Laravel 11: 8.2.0
2. `docker run -it php:8.2 bash` (docker only) / Setup PHP 8.2 using phpbrew
3. Then inside docker/VM:
    * `curl -sS https://getcomposer.org/installer | php`
    * `mv composer.phar /usr/local/bin/composer`
    * `apt update && apt install git zip unzip`
    * `composer create-project --prefer-dist laravel/laravel 11`
    * \<log out of docker\>
4. `docker cp \<docker-id\>:/11 .` (docker only)

Noted: Laravel framework is changing so the setup are also changing. Some steps may not valid for the future laravel versions but the idea is somehow similar.

We have a laravel test case testing controller, events, sql, cache. In order to get controller, events, listener setup, we need to refer to laravel document.

e.g. https://laravel.com/docs/11.x/events

5. We need to edit this folder  in order to fit in nosetest, here is the list of files. Can refer to the `11` folder in master branch
    1. Added `app/Http/Controllers/TestControllers.php` (There are 2 functions for nosetest, `nosetest()` & `nosetestError()`. They are testing event + listeners, database, cache & exceptions
    2. Updated `routes/web.php` for `/nosetest` & `/nosetesterror` routing
    3. Added `app/Events/NoseEvent.php` for event object / `php artisan make:event NoseEvent` and merged the code
    4. Added `app/Listeners/NosetestQueuedListener.php` / `php artisan make:listener NosetestQueuedListener --event=NoseEvent` and merged the code
    5. Added `app/Listeners/NosetestSyncedListener.php` / (refer https://laravel.com/docs/11.x/events#event-subscribers )
    6. Updated `app/Providers/EventServiceProvider.php` to listen `NoseEvent` (Not valid anymore for laravel 11+)
    7. Added `app/Models/Nosetest.php` for database object / `php artisan make:model Nosetest` and merged the code
    8. Updated `bootstrap/cache` into symbolic link because Jenkins doesn't have admin right in nosetest runtime
    9. Added `database/migrations/2020_10_21_212030_create_nosetest_table.php` to create the database and table in sqlite
    10. Updated `storage/framework/views` into symbolic link because Jenkins doesn't have admin right in nosetest runtime
    11. Added `terminate` function to `vendor/laravel/framework/src/Illuminate/Http/Middleware/TrustProxies.php` for nosetest [This path can be different from newer laravel version] (Not valid anymore for laravel 11+)
    12. Updated `.env` for Jenkins environment (The keys are database connection parameters and using array for cache)
    13. Create database and table file by touch `11/database/database.sqlite`
    14. Create database and table from the migrations files by `cd 11 && php artisan migrate`
    15. **IMPORTANT** Make sure all files are committed by editing `.gitignore` files in all folder (e.g. `11/` and `11/database/`)

Tips: Use `php artisan serve` to test the laravel app step by step first and customize the environment setting for Jenkins

Reference: [commit](https://github.com/appoptics/appoptics-php-testapp-laravel/compare/2ac1459e8c2711428d3b5feb83e1223364dbfaf8...45c228d8b1472098377896766c4c74fee1840452)  from the laravel 6 update

