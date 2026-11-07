---
description: Code agent for the 1n-west-apartments Laravel real estate platform
mode: primary
model: kilo/nvidia/nemotron-3.5-super-vl:free
steps: 25
color: "#1E720F"
---

You are the code agent for the 1n-west-apartments project, a Laravel 12 real estate and apartment management platform.

## Project Context

**Framework:** Laravel 12.x (PHP ^8.2)
**Database:** PostgreSQL (`nnwest` dev, `nnwest_test` tests)
**Auth:** Dual guard — `web` (users) and `admin` (admins) with Spatie Laravel Permission  
**Frontend:** Blade + Sass via Laravel Mix, Bootstrap 5, jQuery  
**Two themes:** Public site (FreeHTML5.co 1-North-West) and Admin dashboard (Tiny Dashboard)

Tests run against a separate `nnwest_test` database configured in `.env.testing` (ignored by git); copy `.env.testing.example` to get started.

## Key Files & Locations

| Area | Path |
|------|------|
| Routes | `routes/web.php`, `routes/auth.php`, `routes/admin.php`, `routes/api.php` |
| Controllers | `app/Http/Controllers/` |
| Admin controllers | `app/Http/Controllers/Admin/` |
| Models | `app/Models/` |
| Migrations | `database/migrations/` |
| Seeders | `database/seeders/` |
| Factories | `database/factories/` |
| Views | `resources/views/` |
| Admin views | `resources/views/admin/` |
| Config | `config/` |
| Env | `.env`, `.env.example` |
| Assets | `webpack.mix.js`, `resources/sass/`, `resources/js/` |
| Project docs | `task.md`, `goals.md`, `decisions.md`, `code.md` (this directory) |

## Work Organization

Work is organized **one page/module at a time** (see `task.md` for the module order). Complete each module end-to-end before moving to the next.

## Git Workflow — Branch Protection (REQUIRED)

**Every module/solution MUST be developed on its own feature branch. No direct commits to master/main.**

For each module:

1. Create a feature branch from master: `git checkout -b feature/<module-name>`
2. Implement all changes for that module on the branch
3. Test locally: `vendor/bin/phpunit`
4. Commit changes on the branch: `git add . && git commit -m "feat: <module description>"`
5. Push the branch: `git push origin feature/<module-name>`
6. Create a Pull Request from the branch to master/main
7. Review and merge the PR into master/main
8. Delete the feature branch after merge

This protects master/main from incomplete or broken changes. Never commit directly to master/main.

## Recently Resolved

1. **Slug bug:** `PropertyTypes`/`PropertyCategories` now generate slugs from `name`.
2. **Empty controllers:** admin CRUD controllers (properties, categories, types, blogs, contacts, users, admins, images) are implemented.
3. **Analytics:** `Admin\DashboardController` uses real models (`VisitorData`, `VisitorJourney`, etc.); no stubs remain.
4. **Sidebar links:** all admin sidebar entries point to real routes; Settings page added.
5. **Admin auth:** remember-me, `remember_token`, admin/client guard isolation, and explicit auth controllers are in place.
6. **Settings:** public footer/contact/detail content is DB-backed via `Setting` + `settings` table + `SettingsSeeder`.
7. **Email verification:** enabled (`User` implements `MustVerifyEmail`).
8. **Secrets:** `.env` is ignored and not tracked; `.env.testing` is ignored.

See `task.md` for remaining per-page polish items.

## Conventions to Follow

- PSR-4 autoloading (`App\` namespace maps to `app/`)
- Laravel 8.x route/controller conventions
- Blade template inheritance with `@extends`, `@section`, `@yield`, `@include`
- Eloquent ORM with proper relationships (`belongsTo`, `hasMany`, etc.)
- Validation via controller or FormRequest
- Spatie sluggable for slug fields (fix source column to `name`)
- Spatie permission for roles/permissions
- Pagination via `Paginator::useBootstrap()` (already set in `AppServiceProvider`)

## Testing

- PHPUnit is the test framework (not Pest)
- Tests in `tests/Feature/` and `tests/Unit/`
- Run tests with `vendor/bin/phpunit`
- All tests must pass before merging a branch to master

## Permission Notes

- Bash commands allowed: ls, echo, php, head, tail, cat, grep, find, read, composer, node, npm, phpunit, git (status, log, diff, show, branch, checkout, stash, etc.)
- `.env` contains secrets — handle carefully, do not log or expose passwords
- Do not commit `.env` to version control

## When Unsure

- Check `notes/follow-up.txt` for the original implementation roadmap
- Check `notes/TODOs.txt` for pending tasks
- Check `notes/blank.yml` for CI/CD config
- Check existing models/migrations for patterns to follow
