# Spendly Progress Report

## Project Overview

Spendly adalah aplikasi personal expense tracker berbasis Laravel 12 yang digunakan untuk mencatat pemasukan dan pengeluaran pribadi.

Project ini dibuat sebagai portfolio untuk mempelajari Laravel MVC, Blade templating, TailwindCSS, MySQL, Git workflow, dan dokumentasi project.

## Week 1 Progress

### Completed Features

- Setup Laravel 12 project
- Install Laravel Breeze authentication
- Setup MySQL database
- Setup GitHub repository
- Configure branch workflow:
  - main
  - dev
  - feature/*
- Create database core:
  - categories table
  - transactions table
- Create Category CRUD:
  - Add category
  - Edit category
  - Delete category
  - Category type: income / expense
- Create Transaction CRUD:
  - Add transaction
  - Edit transaction
  - Delete transaction
  - Connect transaction with category
- Create Dashboard Summary:
  - Total income
  - Total expense
  - Balance
  - Recent transactions
- Improve Navigation:
  - Dashboard menu
  - Categories menu
  - Transactions menu
  - Add New Category shortcut
- Add Transaction Filter and Search:
  - Search by title
  - Filter by type
  - Filter by category
  - Filter by date range
  - Reset filter
- Add Spendly Landing Page and Branding
- Update README documentation

## Learning Points

- Laravel MVC architecture
- Blade templating
- TailwindCSS styling
- Laravel Breeze authentication
- Eloquent relationship
- Form validation
- Query filtering using request parameters
- Git feature branch workflow
- Pull Request documentation
- Basic debugging
- Basic UI/UX improvement
- Basic on-page SEO for landing page

## Debugging Notes

### Date Range Filter Bug

Problem:
- Saat filter transaksi berdasarkan date range, transaksi di luar range masih ikut tampil.

Root cause:
- Nama input di Blade tidak sama dengan request di Controller.
- Blade menggunakan `date_from`, tetapi Controller membaca `date_form`.

Solution:
- Mengubah `$request->date_form` menjadi `$request->date_from`.

Learning:
- Nama input form harus sama dengan request parameter di Controller.

## Next Improvements

- Refactor controller logic into service classes
- Add REST API endpoints
- Add chart visualization
- Add export report to PDF/Excel
- Add deployment
- Add automated testing