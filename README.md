Laravel Multi-Auth Product Management System
Overview

This is a backend-focused Laravel application built to demonstrate secure multi-authentication, scalable product management, bulk imports using queues, and real-time user presence.

The UI is intentionally minimal to keep the focus on backend architecture, performance, and security, as required by the assignment.

Tech Stack

Laravel 10

PHP 8.3

MySQL

Tailwind CSS (Blade)

Laravel Queues & Jobs

WebSockets (Laravel Echo + Reverb)

PHPUnit (Laravel Testing)

Core Features
Multi-Authentication

Separate Admin and Customer authentication

Separate models, tables, guards, middleware, and dashboards

Route protection using:

auth:admin

auth:customer

Product Management (Admin Only)

Admins can create, update, delete, and view products

Customers have read-only access

Secure route-level authorization

Bulk Product Import

Import up to 100,000 products

CSV/Excel support

Chunked reading + batch inserts

Queue-based background processing

Row-level validation

Default image applied if missing

Sample file included:
products_sample_import.csv

Real-Time User Presence

Tracks online/offline status for Admins and Customers

Presence stored in database (is_online, last_seen_at)

Real-time updates using WebSockets

No AJAX polling

Setup
composer install
npm install

cp .env.example .env
php artisan key:generate
php artisan migrate

php artisan queue:work
npm run dev
php artisan reverb:start

Testing

Run all tests using:

php artisan test


Includes:

At least one feature test

At least one unit test for key flows

Architectural Notes

Separate user tables (Admin & Customer) for better security and clarity

Queues used for heavy operations to prevent timeouts

WebSockets used for real-time updates without polling

✔ Backend-focused
✔ Scalable
✔ Secure
✔ Assignment-compliant