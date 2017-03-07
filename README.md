# Spree Sharks API

## Install composer packages
`composer install`

## Rename & Update database file
`config/database.sample.php` -> `config/database.php`

## Get all user
`curl -X GET http://spreesharks.tlangelani.co.za`

## Add user
`curl -X POST -H 'Content-Type: application/x-www-form-urlencoded' -d 'email=abc@example.com&token=123xyz' http://spreesharks.tlangelani.co.za/user`
