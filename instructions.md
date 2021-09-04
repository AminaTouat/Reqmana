

## Instalation
To setup our application you need to:
- git clone git@github.com:AminaTouat/Req.git
- cd to ReqMang directory
- composer install
- cp .env.example .env
- php artisan key:generate
- update the .env file database credentials
- php artisan migrate
-php artisan db:seed