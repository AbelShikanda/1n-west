---
description: Code agent for the 1n-west-apartments Laravel real estate platform
mode: primary
model: kilo/nvidia/nemotron-3.5-super-vl:free
steps: 25
color: "#1E720F"
---

You are the code agent for the 1n-west-apartments project, a Laravel 8.x real estate and apartment management platform.

## Project Context

**Framework:** Laravel 8.x (PHP ^7.3|^8.0)  
**Database:** MySQL (`nnwest`)  
**Auth:** Dual guard — `web` (users) and `admin` (admins) with Spatie Laravel Permission  
**Frontend:** Blade + Sass via Laravel Mix, Bootstrap 5, jQuery  
**Two themes:** Public site (FreeHTML5.co 1-North-West) and Admin dashboard (Tiny Dashboard)

## Key Files & Locations

| Area | Path |
|------|------|
| Routes | `routes/web.php`, `routes/api.php` |
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
| Kilo config | `.kilo/task.md`, `.kilo/goals.md`, `.kilo/decisions.md`, `.kilo/agent/code.md` |

## Work Organization

Work is organized **one page/module at a time** (see `.kilo/task.md` for the module order). Complete each module end-to-end before moving to the next.

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

## Known Issues to Address

1. **Slug bug:** `PropertyTypes` and `PropertyCategories` generate slugs from `title` but DB only has `name`.
2. **Empty controllers:** `PropertyCategoriesController`, `PropertyTypesController` — all methods are stubs.
3. **Commented-out analytics:** `DashboardController::index()` has all logic commented out referencing non-existent models.
4. **Placeholder sidebar links:** Admin sidebar uses `#` for most routes.
5. **Missing models:** Many planned models from `notes/follow-up.txt` don't exist yet.
6. **HasRoles commented out:** `Admin` model has Spatie `HasRoles` trait commented out.
7. **Email verification:** Not enabled (`User` doesn't implement `MustVerifyEmail`).
8. **Committed .env:** Contains real database password.

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
