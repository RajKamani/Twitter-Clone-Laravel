

## Follow steps After Clone    

- `composer install`
- Change `.env.example` file to `.env`
- Configure `.env` 
    -  Change `DB_DATABASE` to your Database
    - `DB_USERNAME` to your username
    - `DB_PASSWORD` to your password
    -  change `DEFAULT_AVATAR=avatars/Default_pic.jpg` to `DEFAULT_AVATAR=public\avatars/Your_Default_pic.jpg`
    - change `DEFAULT_BANNER=avatars/Default_banner.jpg` to `DEFAULT_BANNER=avatars/Your_Default_banner.jpg`
   <br> if  `avatars` folder does not found in `Storage/app/public` then try to Upload Banner or Profile Pic through running Application once and `avatars` Folder shows up. <br> Then You can place your Your_Default_pic.jpg
 & Your_Default_banner.jpg in that folder.
- `php artisan key:generate`
- Get all Table using `php artisan migrate` 
- Link storage to public directory `php artisan storage:link`

- - - - 
Now you all set to go.
