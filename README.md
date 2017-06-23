# kubide-backend-test
Kubide PHP Backend Code Test 

## How to install

* php composer install
* php -r "file_exists('.env') || copy('.env.example', '.env');"
* Edit .env
* php artisan key:generate
* php artisan migrate

## Then

* LIST ALL NOTES GET HTTP://KUBIDE.DEV/API/NOTES
* LIST FAVORITE NOTES GET HTTP://KUBIDE.DEV/API/NOTES?FAVORITE=1
* POST A NOTE POST HTTP://KUBIDE.DEV/API/NOTES
* SHOW A NOTE GET HTTP://KUBIDE.DEV/API/NOTES/{ID}
* FAVORITE A NOTE POST HTTP://KUBIDE.DEV/API/NOTES/{ID}/FAVORITE
* UNAVORITE A NOTE POST HTTP://KUBIDE.DEV/API/NOTES/{ID}/UNFAVORITE

## To run test (NoteControllerTest.php)

* phpunit
* (After, to restore database)php artisan migrate
