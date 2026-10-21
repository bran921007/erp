# ERP

Runs on PHP 8.2+ and maintained Laravel 12. Install with `composer install`, copy `.env.example` to `.env`, configure the existing database and run `php artisan key:generate`. Serve only `public/`. Composer installs into `vendor-runtime/`; all entrypoints use it. The tracked `vendor/` is an inactive historical snapshot and must not be served or loaded.

Routes, model tables, field names and business calculations are retained. Modern Laravel handles sessions, authentication and CSRF; the login page sends the CSRF token and Angular uses Laravel's XSRF cookie. Existing database rows and migration history must be preserved. New installations no longer seed sample people or public default passwords; the `casual` walk-in customer remains. Provision users explicitly. Set `SESSION_SECURE_COOKIE=false` only for local HTTP.

Run `composer test` for HTTP login/logout, dashboard, CRUD, inventory, order and purchase flows and migrations against in-memory SQLite. Never run `migrate:fresh` on an existing application database. Before deployment plan the application key/session cutover from Laravel 4. No deployment or production database operation is included.
