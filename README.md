# Zend Framework 2 Module for sending proper HTTP headers (for requests handled by Zend\Mvc)

[![Build Status](https://travis-ci.org/detailnet/zf-headers-module.svg?branch=master)](https://travis-ci.org/detailnet/zf-headers-module)
[![Coverage Status](https://img.shields.io/coveralls/detailnet/zf-headers-module.svg)](https://coveralls.io/r/detailnet/zf-headers-module)
[![Latest Stable Version](https://poser.pugx.org/detailnet/zf-headers-module/v/stable.svg)](https://packagist.org/packages/detailnet/zf-headers-module)
[![Latest Unstable Version](https://poser.pugx.org/detailnet/zf-headers-module/v/unstable.svg)](https://packagist.org/packages/detailnet/zf-headers-module)

## Introduction
This module currently only fixes a [bug in ZF](https://github.com/zendframework/zend-http/issues/26) related to sending proper Content-Type headers.

## Requirements
[Zend Framework 2 Skeleton Application](http://www.github.com/zendframework/ZendSkeletonApplication) (or compatible architecture)

## Installation
Install the module through [Composer](http://getcomposer.org/) using the following steps:

  1. `cd my/project/directory`
  
  2. Create a `composer.json` file with following contents (or update your existing file accordingly):

     ```json
     {
         "require": {
             "detailnet/zf-headers-module": "1.x-dev"
         }
     }
     ```
  3. Install Composer via `curl -s http://getcomposer.org/installer | php` (on Windows, download
     the [installer](http://getcomposer.org/installer) and execute it with PHP)
     
  4. Run `php composer.phar self-update`
     
  5. Run `php composer.phar install`
  
  6. Open `configs/application.config.php` and add following key to your `modules`:

     ```php
     'Detail\Headers',
     ```

  7. Copy `vendor/detailnet/zf-headers-module/config/detail_headers.local.php.dist` into your application's
     `config/autoload` directory, rename it to `detail_headers.local.php` and make the appropriate changes.

## Usage
tbd
