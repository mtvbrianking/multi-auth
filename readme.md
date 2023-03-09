# Laravel Multi-Authentication Package

[![Total Downloads](https://poser.pugx.org/bmatovu/multi-auth/downloads)](https://packagist.org/packages/bmatovu/multi-auth)
[![Latest Stable Version](https://poser.pugx.org/bmatovu/multi-auth/v/stable)](https://packagist.org/packages/bmatovu/multi-auth)
[![Quality](https://scrutinizer-ci.com/g/mtvbrianking/multi-auth/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mtvbrianking/multi-auth/?branch=master)
[![Coverage](https://scrutinizer-ci.com/g/mtvbrianking/multi-auth/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mtvbrianking/multi-auth/?branch=master)
[![Unit Tests](https://github.com/mtvbrianking/multi-auth/workflows/run-tests/badge.svg)](https://github.com/mtvbrianking/multi-auth/actions?query=workflow:run-tests)

This package gives you the ability to separate user areas in your application. 

E.g, an ecommerce application with customers, sellers, and administrators user areas using [auth guards](https://laravel.com/docs/master/authentication#adding-custom-guards)

## Prerequisite

This package only extends the official [`laravel/breeze`](https://github.com/laravel/breeze) starter kit, it doesn't regenerate the frontend assets [js, css - tailwind, vite, ...]

Therefore, you need to use it after scaffolding basic auth using Breeze.

**Breaking Changes**

For old versions (Laravel v9 and below) refer to [v11](https://github.com/mtvbrianking/multi-auth/tree/11.x)

## Installation

```bash
composer require bmatovu/multi-auth --dev
```

## Scaffolding

```bash
php artisan multi-auth:install admin
```

## Register service provider

> config/app.php

```diff
  'providers' => [
      /*
      * Package Service Providers...
      */
+     App\Modules\Admins\AdminServiceProvider::class,
  ],
```

## Register JS entry point in Vite (Inertia - Vue, React)

> vite.config.js

```diff
  export default defineConfig({
      plugins: [
          laravel({
-             input: 'resources/js/app.js',
+             input: [
+                 'resources/js/app.js',
+                 'resources/js/Admins/app.js',
+             ],
-             ssr: 'resources/js/ssr.js',
+             ssr: [
+                 'resources/js/ssr.js',
+                 'resources/js/Admins/ssr.js',
+             ],
              refresh: true,
          }),
          ...
      ],
  });
```

Read more about [Inertia Server Side Rendering](https://inertiajs.com/server-side-rendering)

## Recompile frontend assets

```bash
npm run build
```

## Run Database Migrations

```bash
php artisan migrate
```

## Possible approaches for separating user areas

### Using sub-domains

Separate user areas by sub-domains.

_I would use separate repos for each sub-domain_

| URI | User Group |
| ---- | ---- |
| larastore.com | customers |
| seller.larastore.com | sellers |
| admin.larastore.com | administrators |

### Using URLs\*

_Separate user areas based on URLs. Restricted with auth guards_

\* What this package offers

| URI | User Group |
| ---- | ---- |
| larastore.com | customers |
| larastore.com/seller | sellers |
| larastore.com/admin | administrators |

### Using roles

Restrict access based on the user's roles and permissions

_I'd stay away from this approach as it'd more complex to maintain for large projects_

| URI | User Group |
| ---- | ---- |
| larastore.com | customers, sellers, administrators |
