# requirement #
xampp or php environmet (php > 7.3)
composer
Node js package manager


# create database and privileges in mysql #

CREATE USER 'wad'@'localhost' IDENTIFIED BY 'wad@123';
GRANT ALL PRIVILEGES ON * . * TO 'wad'@'localhost';

create database wad-laravel

# run this command #

composer install (install vendor files)

npm install (npm modules)

npm run dev ( after finished Stop if session didnt close  automaticaly  by ctrl^c )

php artisan migrate:fresh --seed (create tables and insert testing data)

php artisan key:generate (generate app key)

php artisan passport:keys (keys for passsport)

php artisan passport:install (setup passport requirments)

php artisan l5-swagger:generate

# final steps #

if run on virtual host

stop npm run dev
php artisan serve

or else rename server.php -> index.php 
host in linux var/html/www
xampp htdocs

change env file
----------------
get backup from .env.example and rename to .env

db credentials and APP_URL

# login details for dashboard#
admin@wearedesigners.net
654321

# swagger Document #
<APP_URL>/api/documentation



