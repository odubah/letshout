## Letshout API

This is a very small and simple API that returns any tweet in uppercase and adds on an ! mark at the end of the tweet. 
 - For example, a tweet like “Hello this is my first Tweet” will be converted to “HELLO THIS IS MY FIRST TWEET!”.
 
## Getting Started

I have chosen Laravel for this development because it uses and takes advantage of some of the symfony components such as:

- Console, CssSelector, Debug, DomCrawler, Filesystem, Finder, HttpFoundation, HttpKernel, Process, Routing, VarDumper.

I have implemented the repository pattern to make the code smoother, flexible and easy to maintain in the long run.

but also added two pluses:

- The Decorator pattern
- Caching to avoid repeated calls to Twitter’s API. 

Why I have combined the two of them into the project ?
 - Well think about the "S" in SOLID that stands for Single Responsibility Principle,
by doing so we can stack on functionality or decorate it without modifying the original object. That's how the caching is implemented; it is just a
decorator in our repository so in the future if additional decoration is needed (for example logging) we can implement it easily without braking the existing code.

The biggest challenge was which design pattern I should use to do this fun exercise, what type of framework should I use, apart from understanding the Twitter API errors
and access creation for the purpose of this project.

### Prerequisites

What things you need to install the laravel software and how to install them

```
https://laravel.com/docs/5.5/installation
```

## Installation

 * Clone the repository into your server
 * Register your domain on your webserver (either APACHE/ NGinx / local) (sites:
                                               - map: homestead.test
                                                 to: /home/vagrant/code/Laravel/public for Nginx.)
 * Run composer install inside the main project folder                                              
 * You need to create an application and create your access token in the [Application Management](https://apps.twitter.com/) in twitter. 
 * create your .env file from .env.example add the values needed from twitter apps (**TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET, TWITTER_ACCESS_TOKEN, TWITTER_ACCESS_TOKEN_SECRET**) 
  * Visit yourdomain.com/api/shout using postman so you can get a pretty version of the json response.
 * Pass on two parameters **username**: odubah and **number_of_last_tweets** = 10
 * Example: http://letshout.local/api/shout?username=odubah&number_of_last_tweets=1
 * Have Fun! 
 
 Special thanks to <a href="https://github.com/thujohn/twitter">@thujohn</a> and his simple and amazing Twitter library that I have used to communicate with it!

### Running tests

Just go to the root of the project and run the next command so checkout the tests that I have developed
```
phpunit tests/Feature/APITest.php
```

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
