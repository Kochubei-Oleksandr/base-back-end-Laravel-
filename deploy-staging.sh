#!/usr/bin/bash

cd /home/dev_root/smartfit-v2/stage/backend/
git status
git checkout .
git checkout staging
git pull staging

composer install
php artisan migrate

