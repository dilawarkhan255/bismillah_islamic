# Deploying to the live server

Checklist for putting Bismillah Islamic Academy live. `.env` is not in git, so set
these on the server yourself (`.env.example` already has the safe values).

## 1. `.env` on the server

```
APP_ENV=production
APP_DEBUG=false          # true shows code + DB details to visitors on any error
APP_URL=https://your-domain.com
LOG_LEVEL=error
CACHE_STORE=file
QUEUE_CONNECTION=database
ADMIN_EMAIL=...          # receives enrollment / free trial / contact emails
MAIL_MAILER=smtp         # + MAIL_HOST / MAIL_USERNAME / MAIL_PASSWORD
```

Generate a fresh key once on a new server: `php artisan key:generate`

## 2. Commands after every upload

```
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan storage:link        # first deploy only
php artisan optimize            # caches config, routes, views
php artisan queue:restart
```

## 3. Keep the queue worker running

Admin emails and notifications are queued. Without a worker they are never sent.
Run `php artisan queue:work --tries=3` permanently (Supervisor, or the hosting
panel's "background process" option). On shared hosting without that, add a cron:

```
* * * * * cd /path/to/site && php artisan queue:work --stop-when-empty --tries=3 >> /dev/null 2>&1
```

## 4. Admin accounts

Public registration is turned off. Create staff accounts from **Admin → Users**.
Roles: `admin` (everything) and `editor` (content only). After changing roles or
permissions in the seeder, run `php artisan permission:cache-reset`.

## 5. Dummy data

`EnrollmentSeeder` and `FreeTrialSeeder` add test data with `@example.com`
emails. Do not run them on the live site. To remove them:

```
php artisan tinker --execute="App\Models\Enrollment::where('email','like','%@example.com')->delete(); App\Models\FreeTrial::where('email','like','%@example.com')->delete();"
```
