## Laravel Multi-Authentication Package

[![Total Downloads](https://poser.pugx.org/bmatovu/multi-auth/downloads)](https://packagist.org/packages/bmatovu/multi-auth)
[![Latest Stable Version](https://poser.pugx.org/bmatovu/multi-auth/v/stable)](https://packagist.org/packages/bmatovu/multi-auth)
[![License](https://poser.pugx.org/bmatovu/multi-auth/license)](https://packagist.org/packages/bmatovu/multi-auth)
[![Build Status](https://travis-ci.org/mtvbrianking/multi-auth.svg?branch=master)](https://travis-ci.org/mtvbrianking/multi-auth)

This package simplifies multi [authentication](https://laravel.com/docs/master/authentication) for your Laravel project, 
it will scaffold all the files you need for creating a custom [**guard**](https://laravel.com/docs/master/authentication#adding-custom-guards) as well as setting it up ready for use.

### Version Compatibility

| Laravel | Package | Installation                               |
| :-----: | :----: | ------------------------------------------- |
| 6.0     | 8.x    | `composer require bmatovu/multi-auth ^8.0`  |
| 7.0     | 9.x    | `composer require bmatovu/multi-auth ^9.0`  |
| 8.0     | 10.x   | `composer require bmatovu/multi-auth ^10.0` |
| 9.0     | master | `composer require bmatovu/multi-auth`       |

### Bootstrapping

```bash
php artisan multi-auth:install {guard}
```

Default guard is named: `admin` be sure to use a guard name that suits your needs.
This command will scaffold configurations, controllers, middleware, migrations, models, factories, notifications, routes, and views; to get you started.

See a full list of files created, or affected at [files.md](https://github.com/mtvbrianking/multi-auth/blob/master/files.md)

### Run Database Migrations

```bash
php artisan migrate
```

### Getting started

**Compile CSS and JS** (Optional)

_The Bootstrap and Vue scaffolding provided by Laravel as of version 6.0 is now located in the [`laravel/ui`](https://laravel.com/docs/7.x/frontend) Composer package._

_There's consideration to move aware from [`laravel/ui`](https://github.com/laravel/ui) to [`laravel/fortify`](https://github.com/laravel/breeze)_

Note: This should only be done for fresh installations.

```bash
composer require laravel/ui

php artisan ui bootstrap

# php artisan ui bootstrap --auth

npm install && npm run dev
```

**Serve application**

```
http://127.0.0.1:8000/{guard}
```

### Extras

**Check guards**

```php
$ php artisan tinker
...
>>> config('auth.guards');
```

**Access guard instance:**

Specify the guard instance you would like to use, eg using `admin` guard...

```php
Auth::guard('admin')->user();
```

**Check routes:** 

To find out which routes have been created for your guard.

```bash
php artisan route:list
```

**Email verification:** 

You may require users to verify their email addresses before using the application. 
Read the [wiki](https://github.com/mtvbrianking/multi-auth/wiki/Email-Verification) on how to enable this.

### Reporting bugs

If you've stumbled across a bug, please help us by leaving as much information about the bug as possible, e.g.
- Steps to reproduce
- Expected result
- Actual result

This will help us to fix the bug as quickly as possible, and if you wish to fix it yourself feel free to [fork the package](https://github.com/mtvbrianking/multi-auth) and submit a pull request!
