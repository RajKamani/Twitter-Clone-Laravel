

## Follow steps After Clone    

- `composer install`
- Change `.env.example` file to `.env`
- Configure `.env` 
    -  Change `DB_DATABASE` to your Database
    - `DB_USERNAME` to your username
    - `DB_PASSWORD` to your password
- `php artisan key:generate`
- Get all Table using `php artisan migrate` 
- Link storage to public directory `php artisan storage:link`

- - - - 
Now you all set to go.
