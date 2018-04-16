## Laravel Multi-Authentication Package
This package simplifies multi authentication for your Laravel project. It builds on the default [Laravel authentiaction](https://laravel.com/docs/5.6/authentication) to keep things as familair.

In brief; the package will scaffold all the files you need for creating a custom [**guard**](https://laravel.com/docs/5.6/authentication#adding-custom-guards), along with setting up its authentication.

### Installation
Since this pacakge builds on default laravel authentication; make sure you've set it up first. [**_Ref_**](https://laravel.com/docs/5.6/authentication)

`$ composer require bmatovu/multi-auth`

### Register Service Provider 
In `config/app.php`
```
'providers' => array(
    // ...
   Bmatovu\MultiAuth\MultiAuthServiceProvider::class,
),
```

### Register Alias 
In `config/app.php`
```
'aliases' => [
    // ...
    'MultiAuth' => Bmatovu\MultiAuth\MultiAuth::class,
],
```

### Install Package
`$ php artisan multi-auth:install {guard}`

Default guard is named: `admin` be sure to use a name that suits your needs.
This command will scaffold configurations, controllers, middleware, migrations, models, routes, and views; to get you started.

See a list of files created, or affected the [files.md](https://github.com/mtvbrianking/multi-auth/blob/master/files.md)

### Run Database Migrations
`$ php artisan migrate`

### Testing...
`http://127.0.0.1:8000/{guard}`

### Extras:
**Check Routes:** `php artisan route:list`

<hr/>

I Need help!
---
Feel free to open an issue on [Github](https://github.com/mtvbrianking/multi-auth/issues/new). Please be as specific as possible if you want to get help.

Reporting bugs
--
If you've stumbled across a bug, please help us out by reporting the bug you have found by leaving as much information about the bug as possible, e.g.
- Steps to reproduce
- Expected result
- Actual result

This will help me to fix the bug as quickly as possible, and if you'd like to fix it yourself feel free to [fork the package on GitHub](https://github.com/mtvbrianking/multi-auth) and submit a pull request!