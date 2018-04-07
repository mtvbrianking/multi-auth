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
   Bmatovu\MultiAuth\Providers\MultiAuthServiceProvider::class,
),
```

### Register Alias [`config/app.php`]
```
'aliases' => [
    // ...
    'MultiAuth' => Bmatovu\MultiAuth\MultiAuth::class,    
],
```

### Publish Configurations
```
$ php artisan vendor:publish \
    --provider="Bmatovu\MultiAuth\Providers\MultiAuthServiceProvider" \
    --tag=config
```

If you so wish; you may publish `migrations` and `views` to your project as well.

### Run Database Migrations
`$ php artisan migrate`

### Testing...
Unguarded: `http://127.0.0.1:8000/admin`
Unguard: `http://127.0.0.1:8000/admin/home`

### Extras:
**Check Routes:** `php artisan route:list`