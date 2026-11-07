# Decisions: 1n-west-apartments

## Architecture & Framework
- Laravel 8.x chosen as the framework (per composer.json). Provides built-in auth, Eloquent ORM, Blade templating, routing, middleware, and artisan CLI.
- MySQL as the database (per .env DB_CONNECTION=mysql).
- Dual auth guards: web for public users (App\Models\User) and admin for administrators (App\Models\Admin). Admin guard configured in config/auth.php per follow-up.txt.

## Frontend Strategy
- Two separate themes:
  - Public site: FreeHTML5.co 1-North-West HTML5 template (Blade views in resources/views/, assets in public/1n-west/)
  - Admin dashboard: Tiny Dashboard Bootstrap template (Blade views in resources/views/admin/, assets in public/admin/)
- Asset compilation: Laravel Mix (Webpack) compiles resources/js/app.js -> public/js, Sass files -> public/css and public/1n-west/css.

## Database Design Decisions

### Property Model
- properties table uses direct foreign keys (categories_id -> property_categories, types_id -> property_types) rather than many-to-many pivot tables.
- property_property_types and property_property_categories pivot tables exist but have no foreign keys and are unused. Decision needed: remove them or wire them up for many-to-many relationships.

### Slug Generation
- PropertyTypes and PropertyCategories use Spatie\Sluggable\HasSlug but getSlugOptions() generates from title, while the migration only creates a name column. Bug identified — must change slug source to name or add a title column.

### Admin Model
- Admin extends Authenticatable with a custom admin guard.
- Auto-generates UUID on creation via boot() method.
- HasRoles trait from Spatie is commented out. Decision needed: uncomment to enable role-based access control.

## Pending Implementation Decisions

### Controllers (empty stubs)
- PropertyCategoriesController — all 7 resource methods are empty. Need to decide: implement full CRUD or simplify to index/show only.
- PropertyTypesController — same as above.
- DashboardController — index() returns a view with all analytics code commented out (references non-existent models: VisitorData, VisitorJourney, Products, Order_Items). Need to decide: implement analytics with new models, or simplify to basic stats from existing tables.

### Routes
- A large block of admin resource routes (colors, sizes, types, materials, products, orders, users, roles, permissions, blogs, contacts, prices) is commented out in web.php. Decision needed: uncomment as controllers are implemented, or remove if out of scope.

### Missing Models (from follow-up.txt)
Planned but not yet created: Country, CountryUsers, PropertyImages, PropertyPropertyImages, BlogCategories, Blogs, BlogImages, Cart, Orders, Order_Items, WishList, Contacts, Prices, Comments, Ratings, VisitorData, VisitorJourney. Decision needed: which are required for MVP vs. post-MVP.

### Email Verification
- User model does not implement MustVerifyEmail.
- Auth::routes() called without ['verify' => true].
- Decision needed: enable email verification for user registration.

### Security
- .env is committed to the repo and contains DB_PASSWORD="capping_123.". Decision needed: add .env to .gitignore (it may already be there — verify) and use environment-specific secrets in production.

## Rejected / Deferred
- Laravel Sail: dev dependency only, not used for local development currently.
- Pest: not installed; PHPUnit is the test framework.
- Intervention Image: mentioned in notes but not in composer.json require list.
- Laravel Sanctum: mentioned in notes but not installed.
- Spatie Sitemap: mentioned in notes but not installed.
- Country package (wisdom-diala/countrypkg-laravel): mentioned in notes but not installed.
