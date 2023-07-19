#!/bin/bash

# composer install
php artisan config:clear
php artisan cache:clear
php artisan route:cache
php artisan migrate
# npm install
# npm run development //run on first launch
php artisan serve --host=0.0.0.0
npm run watch