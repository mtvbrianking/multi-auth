File change log
--
Here is a list of files created or affected by this package;

1. Migration

`database/migrations/create_{guard}_table.php`

`database/migrations/create_{guard}_password_resets_table.php`

2. Model

`app/{guard}.php`

3. Factory

`database/factories/{guard}Factory.php`

4. Notification

`app/Notifications/{guard}/Auth/ResetPassword.php`

`app/Notifications/{guard}/Auth/VerifyEmail.php`

5. Configurations **\***

`config/auth.php`

6. Controllers

`app/Http/Controllers/{guard}/...`

7. Views

`resources/views/{guard}/...`

8. Routes

`routes/{guard}.php`

9. Route Service Provider **\***

`app/Providers/RouteServiceProvider.php`

10. Middleware

`app/Http/Middleware/RedirectIf{guard}.php`

`app/Http/Middleware/RedirectIfNot{guard}.php`

`app/Http/Middleware/Ensure{guard}EmailIsVerified.php`

11. Route Middleware **\***

`app/Http/Kernel.php`

(**\***) Updated existing files...

### Uninstalling:

Remove package using composer; and reverse the changes above _manually_.
