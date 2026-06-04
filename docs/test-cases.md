# Spendly Test Cases

## Authentication

| Test Case ID | Scenario | Steps | Expected Result | Status |
|---|---|---|---|---|
| TC001 | User register account | Open register page, fill name, email, password, submit | User account created and redirected to dashboard | Passed |
| TC002 | User login account | Open login page, fill email and password, submit | User successfully logged in and redirected to dashboard | Passed |
| TC003 | User logout account | Click logout button | User successfully logged out | Passed |

## Category Management

| Test Case ID | Scenario | Steps | Expected Result | Status |
|---|---|---|---|---|
| TC004 | Create income category | Open Categories, click Add Category, input name and type income, save | Category created successfully | Passed |
| TC005 | Create expense category | Open Categories, click Add Category, input name and type expense, save | Category created successfully | Passed |
| TC006 | Edit category | Open Categories, click Edit, update category name/type, save | Category updated successfully | Passed |
| TC007 | Delete category | Open Categories, click Delete, confirm delete | Category deleted successfully | Passed |
| TC008 | Validate empty category name | Submit category form without name | Validation error displayed | Passed |

## Transaction Management

| Test Case ID | Scenario | Steps | Expected Result | Status |
|---|---|---|---|---|
| TC009 | Create income transaction | Open Transactions, click Add Transaction, fill form with type income, save | Transaction created successfully | Passed |
| TC010 | Create expense transaction | Open Transactions, click Add Transaction, fill form with type expense, save | Transaction created successfully | Passed |
| TC011 | Edit transaction | Open Transactions, click Edit, update transaction data, save | Transaction updated successfully | Passed |
| TC012 | Delete transaction | Open Transactions, click Delete, confirm delete | Transaction deleted successfully | Passed |
| TC013 | Validate empty transaction title | Submit transaction form without title | Validation error displayed | Passed |
| TC014 | Validate empty amount | Submit transaction form without amount | Validation error displayed | Passed |
| TC015 | Validate transaction without category | Submit transaction form without category | Validation error displayed | Passed |

## Dashboard

| Test Case ID | Scenario | Steps | Expected Result | Status |
|---|---|---|---|---|
| TC016 | Show total income | Create income transactions, open dashboard | Total income displays correct amount | Passed |
| TC017 | Show total expense | Create expense transactions, open dashboard | Total expense displays correct amount | Passed |
| TC018 | Show balance | Create income and expense transactions, open dashboard | Balance equals total income minus total expense | Passed |
| TC019 | Show recent transactions | Create several transactions, open dashboard | Recent transactions displayed correctly | Passed |

## Filter and Search Transactions

| Test Case ID | Scenario | Steps | Expected Result | Status |
|---|---|---|---|---|
| TC020 | Search transaction by title | Input keyword in search field, click Filter | Transactions matching title are displayed | Passed |
| TC021 | Filter by income type | Select type income, click Filter | Only income transactions are displayed | Passed |
| TC022 | Filter by expense type | Select type expense, click Filter | Only expense transactions are displayed | Passed |
| TC023 | Filter by category | Select category, click Filter | Only transactions from selected category are displayed | Passed |
| TC024 | Filter by date range | Select date from and date to, click Filter | Only transactions within selected range are displayed | Passed |
| TC025 | Reset filter | Click Reset button | All transactions are displayed again | Passed |

## Navigation

| Test Case ID | Scenario | Steps | Expected Result | Status |
|---|---|---|---|---|
| TC026 | Open Dashboard menu | Click Dashboard menu | Dashboard page displayed | Passed |
| TC027 | Open Categories menu | Click Categories menu | Categories page displayed | Passed |
| TC028 | Open Transactions menu | Click Transactions menu | Transactions page displayed | Passed |
| TC029 | Open Add New Category from transaction form | Open Add Transaction page, click Add New Category | Create category page displayed | Passed |

## Security / User Access

| Test Case ID | Scenario | Steps | Expected Result | Status |
|---|---|---|---|---|
| TC030 | User only sees own categories | Login as different user and open Categories | Only categories owned by logged-in user are displayed | Passed |
| TC031 | User only sees own transactions | Login as different user and open Transactions | Only transactions owned by logged-in user are displayed | Passed |