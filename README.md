# Laravel POS Management System

A Laravel-based Point of Sale (POS) web application for authenticated staff. The system manages products, customers, and staff accounts, records sales, and updates product inventory safely.

## Developer

Eidref Cyrus Bauza

## Features

- Laravel MVC structure with Eloquent models and migrations
- Laravel Breeze authentication
- Protected management pages and sales pages
- Product CRUD with name, price, stock quantity, and product image upload
- Customer CRUD with full name, email, and optional phone number
- Staff CRUD with username, full name, email, avatar upload, and hashed passwords
- Record sales with an optional customer or walk-in customer
- Automatic total-price calculation
- Inventory deduction after a successful sale
- Stock protection: sales are rejected when quantity is greater than available stock
- Transaction-based sale processing to keep sale and inventory data consistent
- Sales history with product, customer, staff, quantity, total price, and date

## Database Relationships

- A Product has many Sales.
- A Customer has many Sales. A sale may also have no customer for walk-in transactions.
- A User/Staff member has many Sales.
- A Sale belongs to one Product, one User/Staff member, and optionally one Customer.

## Requirements

- PHP 8.2 or newer
- Composer
- Node.js and npm
- MySQL / XAMPP

## Local Setup

1. Clone the repository.

```bash
git clone https://github.com/eidrefcyrus/Initial-Laravel-POS-project.git
cd laravel-pos
```

2. Install PHP and JavaScript dependencies.

```bash
composer install
npm install
```

3. Create the environment file.

```bash
copy .env.example .env
php artisan key:generate
```

4. Create a MySQL database named `laravel_pos`.

5. Update the database settings in `.env`.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_pos
DB_USERNAME=root
DB_PASSWORD=
```

6. Run the migrations and seeders.

```bash
php artisan migrate --seed
```

7. Create the public storage link for uploaded product images and avatars.

```bash
php artisan storage:link
```

8. Build the front-end assets and start the application.

```bash
npm run build
php artisan serve
```

Open `http://127.0.0.1:8000`.

## Seeder Login

After running `php artisan migrate --seed`, use:

- Email: `admin@pos.test`
- Password: `password123`

## Uploaded Files

Product images and staff avatars are validated as JPG, JPEG, PNG, or WEBP files with a maximum size of 2 MB. Files are stored on Laravel's `public` disk and displayed through `/storage/...`.

## Sale and Stock Protection

When a sale is recorded, the system:

1. Validates the product, optional customer, and quantity.
2. Locks the selected product within a database transaction.
3. Rejects the sale if requested quantity exceeds available stock.
4. Creates the sale record.
5. Deducts the stock only when the sale succeeds.

This prevents partial sales and overselling.

## Testing

Run automated tests with:

```bash
php artisan test
```

Manual testing performed:

- Added and edited products with uploaded images
- Created, edited, and deleted customers
- Created staff users with hashed passwords and avatar upload
- Recorded a successful sale and confirmed the stock decreased
- Attempted a sale beyond available stock and confirmed it was rejected
- Confirmed sales history shows transaction details

## Live Deployment

http://eidref-initial-laravel.great-site.net