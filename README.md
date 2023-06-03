1. Склонируйте репозиторий 
2. Сделайте composer install
3. Сделайте npm install
4. Переиминуйте .env.example в .env
5. Пропишите 
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
6. npm run build
7. php artisan migrate --seed
8. php artisan user:make-token, получеый токен впишите в .env в API_TOKEN=""
9. php artisan serve