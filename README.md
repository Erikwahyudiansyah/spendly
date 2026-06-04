# Spendly - Personal Expense Tracker

Spendly adalah aplikasi pencatat pemasukan dan pengeluaran pribadi berbasis Laravel 12.  
Aplikasi ini dibuat sebagai project portfolio pribadi serta untuk mempelajari Laravel MVC, Blade templating, TailwindCSS, database relational, authentication, Git workflow, dan dokumentasi project.

## Features

- Authentication login dan register menggunakan Laravel Breeze
- Dashboard summary:
  - Total income
  - Total expense
  - Balance
  - Recent transactions
- Category management:
  - Add category
  - Edit category
  - Delete category
  - Category type: income / expense
- Transaction management:
  - Add transaction
  - Edit transaction
  - Delete transaction
  - Relasi transaksi dengan category
- Filter dan search transactions:
  - Search berdasarkan title
  - Filter berdasarkan type
  - Filter berdasarkan category
  - Filter berdasarkan date range
- User-based data access
- Spendly landing page
- Navigation menu untuk Dashboard, Categories, dan Transactions

## Tech Stack

- Laravel 12
- PHP 8.2
- MySQL
- Laravel Breeze
- Blade
- TailwindCSS
- Vite
- Git & GitHub

## Database Structure

### users

Digunakan untuk authentication user.

### categories

Digunakan untuk menyimpan kategori income dan expense.

| Field | Description |
|---|---|
| id | Primary key |
| user_id | Relasi ke user |
| name | Nama kategori |
| type | income / expense |
| timestamps | created_at dan updated_at |

### transactions

Digunakan untuk menyimpan data transaksi user.

| Field | Description |
|---|---|
| id | Primary key |
| user_id | Relasi ke user |
| category_id | Relasi ke category |
| title | Judul transaksi |
| amount | Nominal transaksi |
| type | income / expense |
| transaction_date | Tanggal transaksi |
| description | Catatan tambahan |
| timestamps | created_at dan updated_at |

#### Installation
1. Clone repository
     -  git clone https://github.com/Erikwahyudiansyah/spendly.git
     -  cd spendly
2. Install dependency PHP:
     -  composer install
3. Install dependency frontend:
     -  npm install
4. Copy environment file:
     -  cp .env.example .env
5. Generate application key:
     -  php artisan key:generate
6. Atur database di file .env:
     -  DB_DATABASE=spendly_db
     -  DB_USERNAME=root
     -  DB_PASSWORD=
7. Jalankan migration:
     -  php artisan migrate
8. Jalankan frontend:
     -  npm run dev
9. Jalankan Laravel server:
     -  php artisan serve
10. Buka aplikasi:
     -  http://127.0.0.1:8000

##### Project Status

- Completed:
    - Authentication
    - Category CRUD
    - Transaction CRUD
    - Dashboard summary
    - Navigation improvement
    - Filter and search transactions
    - Spendly landing page
    - Basic documentation

- Next improvement:
    - REST API for transactions
    - Refactor controller logic into service classes
    - Export report to PDF/Excel
    - Chart visualization
    - Deployment
    - Automated testing

Author

Developed by Erik Wahyudiansyah as a Laravel portfolio project.