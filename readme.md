## EdPaper

EdPaper is a laravel-php driven Document organizer made for PDFs. They are stored on your server (unencrypted, beware !)
You'll need composer and PHP (5 or 7).

Run a `composer install`/`php composer install`(depends of your configuration) within the app root path (you'll need composer)

Rename `.env.example` to `.env` and run `php artisan key:generate` from the app's root path.

Open `.env` and fill it with your database details and your Google's reCaptcha site and secret key (otherwise users won't be able to register).

Run `php artisan migrate` from the app's root path, and you're all done.

You just have to create an apache/nginx vhost (site root must me the `public` folder).
