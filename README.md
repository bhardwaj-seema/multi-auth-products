- Install Dependencies
  composer install
  npm install

- Database Migration
   php artisan migrate

- Run Queues
  php artisan run:work

- run vite assets
  npm run dev 



Laravel Multi Auth Products Management System

Description
This project is a backend-focused Laravel application
- Select multi authentication (Admin/Customer)


The UI is intentionally minimal (Blade + Tailwind) to keep the focus on backend logic, security, and scalability.


Tech 

Laravel 10+

PHP 8.2+

MySQL

Laravel Vite

Tailwind CSS

Laravel Queues & Jobs

WebSockets (Laravel Echo + Pusher / Soketi / Reverb)

Laravel Testing (PHPUnit)


Features Implemented
1. Multi-Authentication System

Separate authentication flows for:

Admin

Customer

Separate models, tables, guards, and middleware

Route protection using:

auth:admin

auth:customer

2. Product Management (Admin)

Admins can:

Create, update, delete products

Manage product fields:

name

description

price

category

stock

image


3. Frontend (Minimal by Design)

  Blade templates

  Tailwind CSS via Vite

  Separate layouts:

  web.blade.php

  app.blade.php
