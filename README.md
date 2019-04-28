# Heredoc

[![Latest Stable Version](https://poser.pugx.org/janisbiz/heredoc/v/stable)](https://packagist.org/packages/janisbiz/heredoc)
[![Build Status](https://travis-ci.com/janisbiz/heredoc.svg?branch=master)](https://travis-ci.com/janisbiz/heredoc)
[![Total Downloads](https://poser.pugx.org/janisbiz/heredoc/downloads)](https://packagist.org/packages/janisbiz/heredoc)
![Deps](https://img.shields.io/badge/dependencies-up%20to%20date-brightgreen.svg)

A helper for outputting values to PHP heredoc=

## Installing

`composer require janisbiz/heredoc`

## Getting started

These instructions will help you set up this helper, so you can use it. As well, there are provided 
instructions to run tests for the extension.

## Using extension

To use helper:
 - your class should use trait [HeredocTrait](src/HeredocTrait.php)
 - you should call global function ´heredoc()´

## Running tests

There are two ways to run tests:
1) By using docker containers:
    - Copy `.env.dist` to `.env` and adjust defined values for your needs
    - Execute `docker-compose up -d --build`
    - Execute `docker-compose exec php-cli composer install`
    - Execute `docker-compose exec php-cli vendor/bin/phpunit -c phpunit.xml`
2) By using your local php and mysql database environment:
    - Ensure, that your php version is `5.6+`
    - Execute `composer install`
    - Execute `vendor/bin/phpunit -c phpunit.xml`
