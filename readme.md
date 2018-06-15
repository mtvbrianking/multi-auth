## Laravel Multi-Authentication Package

[![Total Downloads](https://poser.pugx.org/bmatovu/multi-auth/downloads)](https://packagist.org/packages/bmatovu/multi-auth)
[![Latest Stable Version](https://poser.pugx.org/bmatovu/multi-auth/v/stable)](https://packagist.org/packages/bmatovu/multi-auth)
[![License](https://poser.pugx.org/bmatovu/multi-auth/license)](https://packagist.org/packages/bmatovu/multi-auth)

This package simplifies multi authentication for your Laravel project. It builds on the default [Laravel authentication](https://laravel.com/docs/5.6/authentication) to keep things familiar.

In brief; the package will scaffold all the files you need for creating a custom [**guard**](https://laravel.com/docs/5.6/authentication#adding-custom-guards), as well as setting it up for authentication.

**Supports:** Laravel versions 5.3, 5.4, 5.5, 5.6

### Installation
Since this pacakge builds on default laravel authentication; make sure you've set it up first. [**_Ref_**](https://laravel.com/docs/5.6/authentication)

`$ composer require bmatovu/multi-auth`

### Register Service Provider 
Only for Laravel versions 5.3 and 5.4. For v5.5 and above; this package's service provider and facade alias will be discovered automatically upon installation.

In `config/app.php`
```
'providers' => array(
    // ...
   Bmatovu\MultiAuth\MultiAuthServiceProvider::class,
),
```

**Register Alias** 
In `config/app.php`
```
'aliases' => [
    // ...
    'MultiAuth' => Bmatovu\MultiAuth\MultiAuth::class,
],
```

If you've cached your configurations, you need to run;
`$ php artisan config:cache`

### Install Package
`$ php artisan multi-auth:install {guard}`

Default guard is named: `admin` be sure to use a name that suits your needs.
This command will scaffold configurations, controllers, middleware, migrations, models, routes, and views; to get you started.

See a list of files created, or affected at [files.md](https://github.com/mtvbrianking/multi-auth/blob/master/files.md)

### Run Database Migrations
`$ php artisan migrate`

### Usage
`http://127.0.0.1:8000/{guard}`

### Extras:
**Check guards:**
```
$ php artisan tinker
...
>>> config('auth.guards');
```

**Check routes:** to find out which new routes have been created for your guard
`$ php artisan route:list`

<hr/>

I Need help!
---
Feel free to [open an issue on Github](https://github.com/mtvbrianking/multi-auth/issues/new). Please be as specific as possible if you want to get help.

Reporting bugs
--
If you've stumbled across a bug, please help us by leaving as much information about the bug as possible, e.g.
- Steps to reproduce
- Expected result
- Actual result

This will help me to fix the bug as quickly as possible, and if you'd like to fix it yourself feel free to [fork the package on GitHub](https://github.com/mtvbrianking/multi-auth) and submit a pull request!