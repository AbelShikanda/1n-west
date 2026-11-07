# Agent Instructions

## Database Seeding

- Run `php artisan migrate --seed` **once** on a fresh database only.
- Do **not** run `php artisan db:seed` routinely on an existing or production database; it restores demo data and can overwrite edited records or passwords.
- In normal development, run only `php artisan migrate`.
- If a specific seeder is needed, run it individually, e.g. `php artisan db:seed --class=SettingsSeeder`.
- Seeders that preserve existing credentials/data (such as `CreateAdminSeeder` and `SettingsSeeder`) are safe to re-run; other seeders may overwrite seeded records.
- Never run demo seeders against production/live data.

## Tests

- Use `vendor/bin/phpunit`; tests run against the separate `nnwest_test` database configured in `.env.testing` and never touch the dev database.
