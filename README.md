
## What is car sale project?
Car sale project is a simple car shopping laravel project with some cool functionalities
## Features

- admin and user dashboard for better management
- Multi picture upload
- Seprate page for each ad
- Custom made template

## Getting started
### Database
this laravel app uses MySql for database service , you can use any other database services if you like to but make sure to change it in config/Database.php
### Running migrations and seeds
first,make sure to install composer first and then make sure to run migrations if you don't want to face any problams
here is artisan migration command :
<pre><code>php artisan migrate</code></pre>
you can also use the seeders to have roles and have some dummy ads:
<pre> <code> php artisan migrate:refresh --seed </code> </pre>
after you run seeders you can enter admin dashboard using login panel and this credentials
you can also use sail if you are using docker
### Link public storage
if you want to use upload functionality you need to make them accessible using this artisan command :
<pre><code>php artisan storage:link</code></pre>
