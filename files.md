File change log
--
Here is a list of files created or affected by this package;

1. Migration

`database/migrations/{guard}.php`

2. Model

`app/{guard}.php`

3. Configurations **\***

`config/auth.php`

4. Controllers

`app/Http/Controllers/{guard}/...`

5. Views

`resources/views/{guard}/...`

6. Routes

`routes/{guard}.php`

7. Route Service Provider **\***

`app/Providers/RouteServiceProvider.php`

8. Middleware

`app/Http/Middleware/RedirectIf{guard}.php`

`app/Http/Middleware/RedirectIfNot{guard}.php`

9. Route Middleware **\***

`app/Http/Kernel.php`

(**\***) Updated existing files...

**Uninstalling**:

Remove package using composer; and reverse the changes above _manually_.