CREATE USER 'wad'@'localhost' IDENTIFIED BY 'wad@123';
GRANT ALL PRIVILEGES ON * . * TO 'wad'@'localhost';

create database wad-laravel

admin@wearedesigners.net
654321

composer create-project laravel/laravel="8.0.*" wad-laravel


composer install
npm install
npm run dev

php artisan migrate:fresh --seed
php artisan key:generate 
php artisan passport:keys
php artisan passport:install

##########
if run on virtual host

stop npm run dev
php artisan serve

or else rename server.php -> index.php 
host in linux var/html/www
xampp htdocs

change env file
----------------
db credentials and APP_URL

