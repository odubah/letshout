## Letshout API

This is a very small and simple API that return any tweet in capitals and adds on an ! mark at the end tweet. 
 - For example, a tweet like “Hello this is my first Tweet” would be converted to “HELLO THIS IS MY FIRST TWEET!”.
 
 I have implemented the repository pattern to make the code smoother, flexible and easy to maintain in the long run.

but also added two pluses:

- the Decorator pattern
- Caching to avoid repeated calls to Twitter’s API. 

Why I have combined the two of them into the project, well think about the "S" in SOLID that stands for Single Responsibility Principle,
by doing so we can stack on functionality or decorated without modifying the original object. That's how the caching is implemented is just a
decorator on our repository so in the future if additional decoration is needed (for example logging) we can implemented easily without braking existing code.

## Installation

 * Copy the repository into your server
 * Run composer install inside the main project folder
 * Register your domain on your webserver (sites:
                                               - map: homestead.test
                                                 to: /home/vagrant/code/Laravel/public for Nginx.)
 * Visit yourdomain.com/api/shout using postman so you can get a pretty version of the json response.
 * Pass on two parameters **username**: odubah and **number_of_last_tweets** = 10
 * Example: http://letshout.local/api/shout?username=odubah&number_of_last_tweets=1
 * Have Fun! 
 
 Special thanks to <a href="https://github.com/thujohn/twitter">@thujohn</a> and his simple and amazing Twitter library that I have used to communicate with it!

## Framework used
 
<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
