## Laravel Multi-Authentication Package

[![Total Downloads](https://poser.pugx.org/bmatovu/multi-auth/downloads)](https://packagist.org/packages/bmatovu/multi-auth)
[![Latest Stable Version](https://poser.pugx.org/bmatovu/multi-auth/v/stable)](https://packagist.org/packages/bmatovu/multi-auth)
[![License](https://poser.pugx.org/bmatovu/multi-auth/license)](https://packagist.org/packages/bmatovu/multi-auth)
[![Build Status](https://travis-ci.org/mtvbrianking/multi-auth.svg?branch=master)](https://travis-ci.org/mtvbrianking/multi-auth)

This package simplifies multi [authentication](https://laravel.com/docs/master/authentication) for your Laravel project, 
it will scaffold all the files you need for creating a custom [**guard**](https://laravel.com/docs/master/authentication#adding-custom-guards) as well as setting it up ready for use.

### Installation

| Laravel version | Branch | Install                                   |
|-----------------|--------|------------------------------------------ |
| 5.3             | 2.x    | `composer require bmatovu/multi-auth 2.*` |
| 5.4             | 3.x    | `composer require bmatovu/multi-auth 3.*` |
| 5.5             | 4.x    | `composer require bmatovu/multi-auth 4.*` |
| 5.6             | 5.x    | `composer require bmatovu/multi-auth 5.*` |
| 5.7             | 6.x    | `composer require bmatovu/multi-auth 6.*` |
| 5.8             | master | `composer require bmatovu/multi-auth`     |

### Register Service Provider 

In `config/app.php` (For Laravel: v5.3, v5.4)
```php
'providers' => array(
    // ...
   Bmatovu\MultiAuth\MultiAuthServiceProvider::class,
),
```

If you've cached your configurations, you need to run

`$ php artisan config:cache`

### Bootstrapping
`$ php artisan multi-auth:install {guard}`

Default guard is named: `admin` be sure to use a guard name that suits your needs.
This command will scaffold configurations, controllers, middleware, migrations, models, factories, notifications, routes, and views; to get you started.

See a full list of files created, or affected at [files.md](https://github.com/mtvbrianking/multi-auth/blob/master/files.md)

### Run Database Migrations
`$ php artisan migrate`

### Usage
`http://127.0.0.1:8000/{guard}`

### Extras:
**Check guards:**
```php
$ php artisan tinker
...
>>> config('auth.guards');
```

**Access guard instance:**

Specify the guard instance you would like to use:

`Auth::guard(<GUARD>)->user()` like;
 
`Auth::guard('admin')->user()`

**Check routes:** 

To find out which routes have been created for your guard

`$ php artisan route:list`

**Email verification:** 

You may require users to verify their email addresses before using the application. 
Read the [wiki](https://github.com/mtvbrianking/multi-auth/wiki/Email-Verification) on how to enable this.

<hr/>

I Need help!
---
Feel free to [open an issue](https://github.com/mtvbrianking/multi-auth/issues/new). Please be as specific as possible if you want to get help.

Reporting bugs
--
If you've stumbled across a bug, please help us by leaving as much information about the bug as possible, e.g.
- Steps to reproduce
- Expected result
- Actual result

This will help us to fix the bug as quickly as possible, and if you wish to fix it yourself feel free to [fork the package](https://github.com/mtvbrianking/multi-auth) and submit a pull request!
