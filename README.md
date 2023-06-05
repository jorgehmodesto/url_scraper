# Koombea Techinical Assesment

## PHP Senior Developer

This repository contains an URL Scraper a application developed with the following stack:
* [PHP 8.2.6](https://www.php.net/releases/8.2/en.php)
  * [Codeigniter 4.3.5](http://forum.codeigniter.com)
* [SQLite](https://www.sqlite.org/index.html)
* [Bootstrap 5.3.0](https://getbootstrap.com/docs/5.3/getting-started/introduction/)

## Steps to run the application

The intention was to provide a solution with the minimal environment requirements to run it. So,
you gotta have only php 7.2+, [composer](https://getcomposer.org/) and git running fine.

For that, you can simply run the php version checker command:
* ``php -v``

And check if the PHP version has returned:
* ``PHP 8.2.6 (cli) (built: May 11 2023 12:51:38) (NTS) Copyright (c) The PHP Group``

Then, simply clone the repository to the desired location in you env:
``git clone https://github.com/jorgehmodesto/url_scraper.git``

After downloading this repository, navigate to its root path, and run the following command:
* ``composer install``

The command above, is gonna install all the dependencies to make the framework, and the used libraries work.

### Accessing the Application

PHP has a built-in server which was introducted in version 5.4.0, turning too much server conf unneeded,
so, you can use the codeigniter [spark](https://codeigniter.org/user_guide/cli/cli_overview.html?highlight=spark#the-spark-commands)
to make your application accessible throught the web browser. To do that, you may run the following command:

* ``php spark serve``

The command above is gonna run the built-in server from your PHP, and by default, use the port 8080 from your
server, as you can see below:

```
CodeIgniter v4.3.5 Command Line Tool - Server Time: 2023-06-05 07:57:51 UTC+00:00

CodeIgniter development server started on http://localhost:8080
Press Control-C to stop.
[Mon Jun  5 04:57:51 2023] PHP 8.2.6 Development Server (http://localhost:8080) started
```

## Used tools

### [Symfony DomCrawler Component](https://symfony.com/doc/current/components/dom_crawler.html)

In order to make the links scrape from the pages, probably the best library to be used, was Symfony DomCrawler,
because its easy, powerful and precise, turning the activity of managing dom elements from page contents
easier.

## Additional observations

Even if the logics to the page status be based on finishing an ajax request, triggering another, we could also 
implement some queue worker in order to handle the page links extraction. But for something so fast and simple, it could
be easily considered [over engineering](https://en.wikipedia.org/wiki/Overengineering).

This application is not containerized in order to avoid hardware platforms conflicts.
