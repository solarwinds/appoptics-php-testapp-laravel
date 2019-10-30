# appoptics-php-testapp-laravel
Test Apps for Laravel

## Steps to add a new version for Nosetests (example for Laravel 6)

1. Find out the [earliest supported PHP version](https://en.wikipedia.org/wiki/Laravel#Release_history) for Laravel 6: 7.2.0
2. docker run -it php:7.2 bash
3. Then inside docker:
    * curl -sS https://getcomposer.org/installer | php
    * mv composer.phar /usr/local/bin/composer
    * apt update && apt install git zip unzip
    * composer create-project --prefer-dist laravel/laravel 6
    * \<log out of docker\>
4. docker cp <docker-id>:/6 .
5. \<edit .gitignore and remove exclusion of 'vendor' and '.env'\>
6. \<commit pristine laravel version\>
7. \<copy all custom files from previous Laravel folder, see [commit](https://github.com/appoptics/appoptics-php-testapp-laravel/compare/2ac1459e8c2711428d3b5feb83e1223364dbfaf8...45c228d8b1472098377896766c4c74fee1840452) (except for database.sqlite)\>
8. mkdir /tmp/laravel6 && touch /tmp/laravel6/database.sqlite
9. cd 6/
10. php artisan migrate
11. mv /tmp/laravel6/database.sqlite database/
12. \<commit new/modified files\>
