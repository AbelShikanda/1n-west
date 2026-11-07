# Task: 1n-west-apartments — Real Estate & Apartment Management Platform

## Work Organization Strategy
Work is organized **one page/module at a time**. Each module is completed end-to-end (controllers, routes, views, migrations, models, seeders, tests) before moving to the next. This keeps each change focused, reviewable, and independently deployable.

## Git Workflow (Branch Protection)
**Every module/solution must be developed on its own branch.** No direct commits to master/main.

1. Create a feature branch from master: `git checkout -b feature/<module-name>`
2. Implement all changes for that module on the branch
3. Test locally: `vendor/bin/phpunit`
4. Commit changes on the branch: `git add . && git commit -m "feat: <module description>"`
5. Push the branch: `git push origin feature/<module-name>`
6. Create a Pull Request from the branch to master/main
7. Review and merge the PR into master/main
8. Delete the feature branch after merge

This protects master/main from incomplete or broken changes.

## Project Context
- **Project path:** /home/abel/Desktop/projects/1n-west-apartments
- **Framework:** Laravel 8.x (PHP ^7.3|^8.0)
- **Database:** PostgreSQL (replacing MySQL) — update `.env` `DB_CONNECTION=pgsql`, migrate all tables
- **Frontend:** Blade + Sass via Laravel Mix, Bootstrap 5, jQuery
- **Auth:** Dual guard — `web` (users) and `admin` (admins) with Spatie Laravel Permission
- **Two themes:** Public site (FreeHTML5.co 1-North-West) and Admin dashboard (Tiny Dashboard)

## Module Execution Order (Complete List of All Pages & Modules Needing Updates)

### Module 1: Property Detail Page (Public Frontend) — COMPLETE
**Branch:** `feature/module-1-property-detail-page` (committed, push pending — GitHub PAT expired)

New page — `/properties/{slug}` showing full property information.

Tasks:
- [x] Create `PropertyController` with `show()` method for property detail
- [x] Add route: `GET /properties/{slug}` → `PropertyController@show`
- [x] Create view: `resources/views/pages/property-details.blade.php`
- [x] Link property cards from `/properties` and home to detail pages (replace `underConstruction` links)
- [x] Add property images support (meta_image column used)
- [x] Add meta tags (meta_description, meta_keywords, meta_image) to detail page
- [x] Add WhatsApp/Telegram/Website contact links on detail page
- [x] Write feature test: property detail page loads with correct data
- [x] Commit on branch (push pending — GitHub PAT expired)
- [ ] Push branch → PR → merge to master (blocked by expired PAT)

### Module 2: Homepage (Public Frontend)
**File:** `resources/views/home.blade.php`

Tasks:
- [ ] Replace all `route('underConstruction')` links with real routes
- [ ] Make "Move House", "Mortgage", "Explorer" feature links go to real pages
- [ ] Make staff social links point to real agent pages
- [ ] Make contact form submit to a real contact handler
- [ ] Make hero slider properties dynamic from database
- [ ] Write feature test: homepage loads with dynamic data
- [ ] Branch → PR → merge to master

### Module 3: Properties Listing Page (Public Frontend) — COMPLETE
**Already implemented in Module 1** — Dynamic property listing via `newProperties` partial.
Feature tests pass (6 tests including filter by category and type).

### Module 4: Search Properties Partial (Public Frontend) — COMPLETE
**Uncommented** — Search form now visible on properties page. Uses existing Bootstrap/select2 classes.
All 8 tests pass.

### Module 5: New Properties Partial (Public Frontend) — COMPLETE
**Already implemented in Module 1** — Dynamic property cards from database, replaces static hardcoded content.
- [ ] Replace static hardcoded property card with dynamic properties from database
- [ ] Add "Rent"/"Sale" status badge
- [ ] Link to property detail pages
- [ ] Branch → PR → merge to master

### Module 6: Agent Page (Public Frontend)
**File:** `resources/views/pages/agent.blade.php`

Tasks:
- [ ] Replace static agent data with dynamic staff/agent data from database
- [ ] Make social links functional
- [ ] Add "View Properties" button linking to agent's properties
- [ ] Write feature test: agent page loads agent data
- [ ] Branch → PR → merge to master

### Module 7: Blog Page (Public Frontend)
**File:** `resources/views/pages/blog.blade.php`

Tasks:
- [ ] Replace static blog content with dynamic blog posts from database
- [ ] Add blog post listing with pagination
- [ ] Link blog posts to detail pages
- [ ] Write feature test: blog page loads posts
- [ ] Branch → PR → merge to master

### Module 8: Contact Page (Public Frontend)
**File:** `resources/views/pages/contact.blade.php`

Tasks:
- [ ] Make contact form functional (set form action, handle submission)
- [ ] Replace `route('underConstruction')` email/website links with real mailto/URL
- [ ] Add contact form validation and success/error messages
- [ ] Write feature test: contact form submits successfully
- [ ] Branch → PR → merge to master

### Module 9: Header Navigation (Public Frontend)
**File:** `resources/views/layouts/header.blade.php`

Tasks:
- [ ] Fix login link (currently points to `underConstruction`) → real login route
- [ ] Fix register link (currently points to `underConstruction`) → real register route
- [ ] Fix Apartments submenu items (Family, etc.) → real property pages
- [ ] Ensure active states work correctly
- [ ] Branch → PR → merge to master

### Module 10: Footer (Public Frontend)
**File:** `resources/views/layouts/footer.blade.php`

Tasks:
- [ ] Replace all `route('underConstruction')` links with real pages
- [ ] Fix newsletter form to submit to a real endpoint
- [ ] Fix social media links
- [ ] Branch → PR → merge to master

### Module 11: Aside / Hero Slider Partial (Public Frontend)
**File:** `resources/views/layouts/partials/aside.blade.php`

Tasks:
- [ ] Make hero slider properties dynamic from database (not hardcoded)
- [ ] Make "Learn More" buttons link to property detail pages
- [ ] Fix HTML bug: `<h2 class="price">Ksh 30,000<h2>` (missing closing slash)
- [ ] Branch → PR → merge to master

### Module 12: Blog Partial (Public Frontend)
**File:** `resources/views/layouts/partials/blog.blade.php`

Tasks:
- [ ] Replace static blog post with dynamic blog data from database
- [ ] Link "Learn More" to blog detail page
- [ ] Branch → PR → merge to master

### Module 13: PropertyController (Backend)
**New controller** — `app/Http/Controllers/PropertyController.php`

Tasks:
- [ ] Create `index()` — listing with filtering and pagination
- [ ] Create `show($slug)` — property detail page
- [ ] Add validation for property queries
- [ ] Write unit/feature tests
- [ ] Branch → PR → merge to master

### Module 14: PropertyCategoriesController (Backend)
**File:** `app/Http/Controllers/PropertyCategoriesController.php`

Tasks:
- [ ] Implement all 7 resource methods (index, create, store, show, edit, update, destroy)
- [ ] Add validation
- [ ] Write feature tests
- [ ] Branch → PR → merge to master

### Module 15: PropertyTypesController (Backend)
**File:** `app/Http/Controllers/PropertyTypesController.php`

Tasks:
- [ ] Implement all 7 resource methods (index, create, store, show, edit, update, destroy)
- [ ] Add validation
- [ ] Write feature tests
- [ ] Branch → PR → merge to master

### Module 16: DashboardController (Admin Backend)
**File:** `app/Http/Controllers/Admin/DashboardController.php`

Tasks:
- [ ] Uncomment and implement analytics (page views, conversions, visitors, trends, sales, regions, traffic, browsers)
- [ ] Create missing analytics models if needed (VisitorData, VisitorJourney)
- [ ] Wire up Chart.js/ApexCharts data in dashboard view
- [ ] Write feature tests for dashboard access
- [ ] Branch → PR → merge to master

### Module 17: Admin Sidebar Navigation (Admin Frontend)
**File:** `resources/views/admin/layouts/sidebar.blade.php`

Tasks:
- [ ] Replace all `#` placeholder links with real routes
- [ ] Wire up: Property Components (Property, Rooms, Baths, Images, Prices)
- [ ] Wire up: Users (Admins, Staff, Tenants, Contacts)
- [ ] Wire up: User Management (Roles, Permissions)
- [ ] Wire up: Blog Components (Articles, Categories, Images, Comments)
- [ ] Ensure all links resolve to existing controller methods
- [ ] Branch → PR → merge to master

### Module 18: Admin Auth (Admin Frontend)
**Files:** `resources/views/admin/auth/login.blade.php`, `app/Http/Controllers/Admin/Auth/AdminAuthController.php`

Tasks:
- [ ] Fix `is_admin` check logic: `if (!$user->is_admin == 1)` is buggy (operator precedence)
- [ ] Ensure login redirects correctly on success/failure
- [ ] Add flash messages for login errors
- [ ] Write feature tests for admin login/logout
- [ ] Branch → PR → merge to master

### Module 19: User Authentication (Public Frontend)
**Files:** `resources/views/auth/*, app/Http/Controllers/Auth/*`

Tasks:
- [ ] Enable email verification: `User` implements `MustVerifyEmail`
- [ ] Enable `Auth::routes(['verify' => true])`
- [ ] Add `verified` middleware to `/home` route
- [ ] Create verification email views/templates
- [ ] Write feature tests for registration + verification flow
- [ ] Branch → PR → merge to master

### Module 20: Slug Generation Bug Fix (Database/Models) — COMPLETE
**Files:** `app/Models/PropertyTypes.php`, `app/Models/PropertyCategories.php`

Tasks:
- [x] `getSlugOptions()` generates from `name` for `PropertyTypes` and `PropertyCategories` (and `BlogCategories`); `Blog` correctly uses `title`
- [x] `name` column exists in migrations
- [x] Regression tests: `tests/Unit/SlugGenerationTest.php`
- [ ] Branch → PR → merge to master (working directly on master per user request)

### Module 21: Admin RBAC — Roles & Permissions (Backend) — COMPLETE
**File:** `app/Models/Admin.php`, Spatie permission tables

Tasks:
- [x] `HasRoles` trait enabled in `Admin` model
- [x] Seed roles and permissions (`RolesAndPermissionsSeeder`)
- [x] Protect admin RBAC routes with `role:Super Admin,admin` middleware (Spatie)
- [x] Add admin UI for managing roles and permissions (`RolesController`, `PermissionsController`, views)
- [x] Write feature tests for role-based access (`tests/Feature/RolesPermissionsTest.php`)
- [x] Super Admin gate bypass in `AuthServiceProvider`
- [ ] Branch → PR → merge to master (working directly on master per user request)

### Module 22: Missing Models & Migrations (Database) — COMPLETE (core)
**New models/migrations**

Tasks:
- [x] `PropertyImages` model + migration (exists; `Property::images()`/`primaryImage()` added)
- [x] Property property pivot tables wired (`property_property_types`, `property_property_categories`) with FK/unique columns in migrations + minimal pivot models
- [x] `BlogCategories` model + migration
- [x] `Blog` (Blogs) model + migration
- [x] `BlogImages` model + migration
- [x] `Contacts` model + migration
- [x] `VisitorData` model + migration
- [x] `VisitorJourney` model + migration
- [x] Factories added for Module 22 models; `PropertyFactory` now satisfies FKs
- [x] `users.tenant` migration added (per `notes/follow-up.txt`/TODO); `User` fillable/cast updated
- [x] Feature tests: `tests/Feature/Module22ModelsTest.php` (relations/factories/pivots)
- [ ] Audit `notes/follow-up.txt` for any remaining MVP models (Country/CountryUsers deferred; PropertyPropertyImages not needed — using `property_images`)
- [ ] Branch → PR → merge to master (working directly on master per user request)

### Module 23: Seeders (Database) — COMPLETE (core)
**Files:** `database/seeders/*`

Tasks:
- [x] Seeders present for Module 22 models (PropertyImages, Blogs, BlogCategories, BlogImages, Contacts, VisitorData, VisitorJourney)
- [x] `DatabaseSeeder` calls all seeders in dependency order (includes `RolesAndPermissionsSeeder`)
- [x] Seeder smoke test: `tests/Feature/SeedersTest.php`
- [ ] Run `php artisan db:seed` against Postgres (env-specific; SQLite/RefreshDatabase tests validate seeders)
- [ ] Branch → PR → merge to master (working directly on master per user request)

### Module 24: Database Migration — MySQL to PostgreSQL — COMPLETE (verification pass)
**Database engine replacement**

Tasks:
- [x] `pdo_pgsql` available; `.env` configured for `pgsql` (nnwest @ 127.0.0.1:5434)
- [x] Pending migration applied on pgsql: `2026_11_07_140000_add_tenant_to_users_table` (all migrations now Ran)
- [x] Migrations reviewed/applied on PostgreSQL (`migrate:status` clean); UUID/boolean/FK patterns compatible in current schema
- [x] Seeders validated; fixed Postgres FK/sequence issues (BlogsSeeder resolves category IDs dynamically + updateOrCreate; VisitorJourneySeeder resolves visitor IDs dynamically)
- [x] `RolesAndPermissionsSeeder` runs on pgsql
- [x] Full test suite against PostgreSQL (`DB_CONNECTION=pgsql vendor/bin/phpunit --do-not-cache-result`): **45 tests, 102 assertions, OK**
- [ ] Optional: `migrate:fresh --seed` on a disposable/test Postgres DB for full reset proof (skipped to avoid destructive reset of configured DB without explicit confirmation)
- [ ] Branch → PR → merge to master (working directly on master per user request)

### Module 25: Security & Configuration
**Files:** `.env`, `.env.example`, `.gitignore`

Tasks:
- [ ] Add `.env` to `.gitignore` (verify it's not tracked)
- [ ] Remove committed `.env` from git history if present
- [ ] Use `.env.example` as the template for new environments
- [ ] Branch → PR → merge to master

### Module 26: Test Coverage
**Files:** `tests/Feature/*`, `tests/Unit/*`

Tasks:
- [ ] Feature tests for all public routes (home, properties, property detail, agent, blog, contact)
- [ ] Feature tests for all admin routes (dashboard, login, property CRUD, category CRUD, type CRUD)
- [ ] Unit tests for models and slug generation
- [ ] Ensure `vendor/bin/phpunit` passes against PostgreSQL
- [ ] Branch → PR → merge to master

## Status
**Modules 21-24** committed to `master` (`25b20ac`, `c218616`, `6ede4c9`, plus Module 24 commit). PostgreSQL (`nnwest`, pgsql) migrations current; **full suite passes on PostgreSQL**: `DB_CONNECTION=pgsql vendor/bin/phpunit --do-not-cache-result` → **45 tests, 102 assertions, OK**. SQLite suite also OK. `.kilo/task.md` still needs a broader reconciliation pass for Modules 1–20. **Next:** Module 20 slug regression test/close, Module 17 admin sidebar wiring (where controllers exist), Module 25 security/config hygiene, Module 26 coverage expansion. Push to GitHub may still require valid PAT.
