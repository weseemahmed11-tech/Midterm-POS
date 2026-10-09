# IT0049 Complete Point-of-Sale System

This CodeIgniter 4 application provides authenticated staff workflows for products, inventory, customers, staff accounts, recording sales, and sales history.

## Requirements

- PHP 8.2 or newer with `intl`, `mbstring`, and `mysqli` enabled
- Composer 2
- MySQL or MariaDB

## Local setup

1. Run `composer install` in the project root if needed.
2. Create the `pos_midterm` database and run the application migration and seeder:

   ```powershell
   php spark migrate
   php spark db:seed MidtermSeeder
   ```

   The migration creates the complete `pos_midterm` schema, and the seeder adds demo data.
3. Copy `.env.example` to `.env` if needed. Set `app.baseURL` and the `database.default.*` values. This project uses `pos_midterm`.
4. Run `php spark serve` and open `http://localhost:8080/`.

The document root for another web server must be `public/`. Uploaded avatars are stored in `public/uploads`; the folder is included in the project with an `index.html` placeholder.

## Routes and testing

- `/` and `/login` are public.
- All product, customer, staff, sale, and sales-history routes require login.
- `/logout` destroys the current session and redirects to `/login`.

Customer full name and email are required, and email must be valid. User username, full name, and (for new users) password are required; usernames must be unique. Avatars accept JPG or PNG files up to 2 MB; files receive a random safe filename and only that filename is stored in the database. Existing user passwords can be changed on the edit form, or left blank to keep the current password.

## Demo login

- Username: `jdelacruz`
- Password: `Password123`

All sample users in the SQL export use this demo password. Passwords are stored only as `password_hash()` hashes. Use the visible Logout link in the navigation when finished.

Run the safe checks from the project root:

```powershell
php spark routes
php -l app\Controllers\Auth.php
php -l app\Controllers\Customers.php
php -l app\Controllers\Users.php
php -l app\Filters\AuthFilter.php
vendor\bin\phpunit
git diff --check
```

For browser testing, open each new route, submit blank and invalid values to confirm validation, create/edit valid records, test duplicate usernames, and upload valid and invalid avatar files. Do not use destructive database commands.

## Database files

`database/midterm_pos_export.sql` is the complete schema/data export for `pos_midterm`, including sample password hashes.

```powershell
& 'C:\xampp\mysql\bin\mysqldump.exe' --user=root --databases pos_midterm --skip-add-drop-table --result-file=database/midterm_pos_export.sql
```
