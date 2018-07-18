File change log
--
Here is a list of files created or affected by this package;

1. Migration

`database/migrations/{guard}.php`

2. Model

`app/{guard}.php`

3. Notification

`app/Notifications/{guard}/ResetPassword.php`

4. Configurations **\***

`config/auth.php`

5. Controllers

`app/Http/Controllers/{guard}/...`

6. Views

`resources/views/{guard}/...`

7. Routes

`routes/{guard}.php`

8. Route Service Provider **\***

`app/Providers/RouteServiceProvider.php`

9. Middleware

`app/Http/Middleware/RedirectIf{guard}.php`

`app/Http/Middleware/RedirectIfNot{guard}.php`

10. Route Middleware **\***

`app/Http/Kernel.php`

(**\***) Updated existing files...

**Uninstalling**:

Remove package using composer; and reverse the changes above _manually_.