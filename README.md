# Multi-Vendor Store – Laravel 9 Project

This project is a **Multi-Vendor E-commerce Platform** built with **PHP Laravel 9**, aiming to provide a modern shopping experience for both customers and vendors.  
The project is currently under development and production, and more features will be added and refined over time.

---

## Features

**Core Functionality**
- Multi-vendor product management with CRUD operations (categories, products, tags, users, and orders).
- Blade templates and reusable components for clean layouts.
- Request validation and custom validation rules for secure data handling.
- Soft deletes, pagination, local and global scopes for efficient Eloquent model management.

**Authentication & Authorization**
- Built using Laravel Breeze and Laravel Fortify with multi-guard authentication.
- Two-Factor Authentication (2FA) and custom login methods.
- Role-based access control using Gates and Policies.
- Social login integration with Google and Facebook.

**Storefront & Shopping Experience**
- Dynamic store layout with Blade components.
- Shopping cart system, checkout, order management, and live order tracking.
- Real-time delivery tracking (integration planned with maps and broadcasting).

**Notifications & Events**
- Event-driven architecture with events and listeners.
- Notifications via mail, database, and broadcast channels (under development).

**Payments & Integrations**
- Stripe payment integration (webhook handling in progress).
- Currency conversion via external API integration.

**API & Backend**
- RESTful API with Laravel Sanctum authentication.
- API Resources for structured responses.
- Endpoints for products, users, orders, and tracking updates (under continuous improvement).

**Advanced Laravel Concepts**
- Middleware for user type checks and activity tracking.
- Factories and seeders for testing and data population.
- Scheduled jobs and queued tasks for background processing.
- Exception and error handling for production readiness.

**Localization**
- Multi-language support (Arabic & English) under active enhancement.

---

## Tech Stack
- Backend: Laravel 9 (PHP 8+)
- Frontend: Blade Templates, Bootstrap, JavaScript
- Database: MySQL
- Authentication: Breeze, Fortify, Socialite, Sanctum
- Realtime & Notifications: Pusher, Events, Listeners
- Payments: Stripe API
- APIs: RESTful APIs + 3rd Party Integrations

---

## Deployment
Manual deployment setup including environment configuration, queue workers, and scheduler setup. Full production deployment is ongoing.

---

## Status
This project is **under active development and production**, and more features and improvements will be added continuously.

---

## License
