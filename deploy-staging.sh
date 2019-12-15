#!/usr/bin/bash

cd /home/dev_root/www/smartfit-v2/stage/backend
git status
git checkout .
git checkout staging
git pull

composer install
php artisan migrate

