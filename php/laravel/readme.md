Example that describes how to send mail via Iron.io Worker in Laravel PHP Framework
-------------
-------------

<p align="center">
<img align="center" src="../../../master/images/laravel_iron_worker.png" alt="laravel+iron.io">
</p>

## Getting Started

### Set credentials

1. Set database credentials in `app/config/database.php` (for app) and in `worker/app/config/database.php` (for worker). The database must be accessible from the outside.
2. Set Iron.io credentials in `app/config/iron.php`
3. Set smtp settings in `worker/app/config/mail.php`

### Set up the database

1. Run `php artisan migrate --package=cartalyst/sentry` for run sentry migrations.
2. Run `php artisan db:seed` for seed database. After that you can launch your app and login (URL: `/admin/login`) with next credentials: email - `admin@admin.com`, password - `admin`

### How to use

In the user list (URL: `/admin/users`) you can select one or more users (via checkboxes) that you want to send mail and then clicking the "send mail" button  will make an ajax request to the app.

The app will then check if the worker exists at Iron.io. If it doesn't, it will upload before sending to the selected users.

You can change the letter template in `worker/app/views/mail/template.blade.php`

-------------
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

### Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
