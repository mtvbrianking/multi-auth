## Laravel Multi-Authentication Package

[![Total Downloads](https://poser.pugx.org/bmatovu/multi-auth/downloads)](https://packagist.org/packages/bmatovu/multi-auth)
[![Latest Stable Version](https://poser.pugx.org/bmatovu/multi-auth/v/stable)](https://packagist.org/packages/bmatovu/multi-auth)
[![License](https://poser.pugx.org/bmatovu/multi-auth/license)](https://packagist.org/packages/bmatovu/multi-auth)
[![Build Status](https://travis-ci.org/mtvbrianking/multi-auth.svg?branch=master)](https://travis-ci.org/mtvbrianking/multi-auth)

This package gives you the ability to separate user areas in your application. 

E.g, an ecommerce application with customers, sellers, and administrators user areas using [auth guards](https://laravel.com/docs/master/authentication#adding-custom-guards)

### Older versions

We've switched from [`laravel/ui`](https://github.com/laravel/ui) to [`laravel/breeze`](https://github.com/laravel/breeze) and adopted a modular approach.

Each user group will be setup in a dedicated modules dir, e.g `app/Modules/Admin`.

For old versions (Laravel v9 and below) refer to [v11](https://github.com/mtvbrianking/multi-auth/tree/11.x)

### Installation

```bash
composer require bmatovu/multi-auth --dev
```

### Scaffolding

```bash
php artisan multi-auth:install {guard}
```

### Register service provider

> config/app.php

```diff
      'providers' => [
          /*
           * Package Service Providers...
           */
+         App\Modules\Admins\AdminServiceProvider::class,
      ],
```
### Run Database Migrations

```bash
php artisan migrate
```

### Changes

See a full list of files created, or updated at [files.md](https://github.com/mtvbrianking/multi-auth/blob/master/files.md)

### Possible approaches for separating user areas

1. Using sub-domains

_Great approach. It may require separate repos for each user group_

| URI | User Group |
| ---- | ---- |
| lara-store.com | customers |
| seller.lara-store.com | sellers |
| admin.lara-store.com | administrators |

2. Using guards

_This is what this package offers. User areas packaged as modules in the same application_

| URI | User Group |
| ---- | ---- |
| lara-store.com | customers |
| lara-store.com/seller | sellers |
| lara-store.com/admin | administrators |

3. Using roles

_Restrict access based on the user's roles and permissions_

| URI | User Group |
| ---- | ---- |
| lara-store.com | customers, sellers, administrators |
