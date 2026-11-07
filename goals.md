# Goals: 1n-west-apartments

## Primary Goal
Build a fully functional real estate and apartment management platform ("1N-West") where users can browse rental properties and administrators can manage properties, users, and content through a dedicated dashboard.

## Functional Goals

### 1. Public Property Browsing
- Users can view a homepage with featured/available properties
- Users can browse properties by category (Residential, Commercial, Industrial) and type (Apartment, Villa, Office Space)
- Users can view property details (price, rooms, baths, location, amenities)
- Users can search and filter properties (keyword, status, type, location, price, bedrooms, bathrooms, area, parking)
- Contact agents/owners via WhatsApp/Telegram/Website links on property pages

### 2. User Authentication
- User registration and login (standard Laravel auth)
- Email verification on registration
- Password reset flow
- Profile management (future)

### 3. Admin Dashboard
- Admin login with role-based access (is_admin flag)
- Dashboard analytics: page views, conversions, visitors, trends, sales, regions, traffic sources, browser breakdown
- Property management: create, read, update, delete property listings
- Property category and type management
- User management: admins, staff, tenants, contacts
- Role and permission management (Spatie Laravel Permission)
- Blog management: articles, categories, images, comments

### 4. Content Management
- Blog articles with categories and images
- Property images/galleries
- Contact form submissions

## Technical Goals

### Code Quality
- Follow Laravel 8.x conventions and PSR-4 autoloading
- Use Eloquent ORM with proper relationships
- Validate all user input via FormRequest or controller validation
- Use Blade templates with layout inheritance
- Keep controllers thin; move logic to services or models where appropriate

### Performance
- Eager-load relationships to avoid N+1 queries
- Cache permission checks (Spatie permission caching)
- Optimize asset compilation with Laravel Mix (minification in production)
- Use database indexes on frequently queried columns (slug, email, foreign keys)

### Security
- CSRF protection on all forms (already in Laravel)
- SQL injection prevention via Eloquent/query builder
- Password hashing (bcrypt)
- Admin guard separate from web guard
- .env never committed to version control (secrets externalized)

### Maintainability
- Clear separation between public frontend and admin backend
- Documented routes, models, and controllers
- Seeders for initial data (admins, property categories, types)
- Factories for test data generation

## Non-Goals (Out of Scope for MVP)
- E-commerce checkout / payment processing (Orders, Cart models planned but not needed initially)
- Real-time notifications / broadcasting
- Multi-tenancy
- Mobile app
- API v1 (only a stub /api/user route exists)
- Sitemap auto-generation (planned in notes, not yet implemented)
- Telegram/WhatsApp bot automation (planned in notes)

## Success Criteria
- php artisan migrate runs cleanly on a fresh database
- php artisan db:seed populates admins, categories, and types
- Admin can log in at /admin/login and access dashboard
- Public users can browse properties at /properties
- Property detail pages render with correct data
- Admin can create/edit/delete properties
- Slug generation works (no title column errors)
- .env is not tracked in git
- PHPUnit tests pass
