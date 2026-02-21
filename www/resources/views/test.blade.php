Команды docker

docker-compose up -d
chmod 777 * -R
docker exec -it lamp-php83 bash


LARAVEL

php artisan make:model Category -m  //создание модели и файла миграции (-m)

php artisan migrate //заливаем мигрцию

php artisan migrate:rollback  //откат миграции

php artisan migrate:refresh //обновление всех файлов (удаление и залив)

php artisan make:controller CategoryController --resource //создание ресурсного контроллера (для круда)php

