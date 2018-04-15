## Laravel Multi-Authentication Package
This package will create a new authentication guard called **'admin'**, as well as scaffold all of the routes and views you need for admin authentication. 
The package will add registration and login views, as well as routes for all authentication end-points to 'admin'.
A HomeController will also be generated to handle post-login requests from your application's dashboard.

### Installation
`$ composer require bmatovu/multi-auth`

### Register Service Provider [`config/app.php`]
```
'providers' => array(
    // ...
   Bmatovu\MultiAuth\MultiAuthServiceProvider::class,
),
```

### Register Alias [`config/app.php`]
```
'aliases' => [
    // ...
    'MultiAuth' => Bmatovu\MultiAuth\MultiAuth::class,    
],
```

### Install Package
```
$ php artisan multi-auth:install
```

This command will scaffold configurations, controllers, middleware, migrations, models, routes, and views; to get you started.

### Run Database Migrations
`$ php artisan migrate`

### Testing...
Unguarded: `http://127.0.0.1:8000/admin`
Unguard: `http://127.0.0.1:8000/admin/home`

### Extras:
**Check Routes:** `php artisan route:list`