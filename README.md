# IT0049 Technical Formative Assessment 4

This CodeIgniter 4 POS application continues TFA3 with login authentication, protected customer and user account pages, server-side validation, and user avatars.

## Requirements

- PHP 8.2 or newer with `intl`, `mbstring`, and `mysqli` enabled
- Composer 2
- MySQL or MariaDB

## Local setup

1. Run `composer install` in the project root if needed.
2. Start MySQL and import `database/pos_tfa4_export.sql` into the TFA4 database. With XAMPP on Windows:

   ```powershell
   & 'C:\xampp\mysql\bin\mysql.exe' --user=root --execute="source database/pos_tfa4_export.sql"
   ```

   The export creates/uses `pos_tfa4`, including the password column and hashed passwords. Do not re-import it over existing tables unless replacing that database is intended.
3. Copy `.env.example` to `.env` if needed. Set `app.baseURL` and the `database.default.*` values. This project is configured for the separate `pos_tfa4` database.
4. Run `php spark serve` and open `http://localhost:8080/`.

The document root for another web server must be `public/`. Uploaded avatars are stored in `public/uploads`; the folder is included in the project with an `index.html` placeholder.

## Routes and testing

- `/`, `/about`, and `/login` are public.
- `/customers`, `/customers/new`, and `/customers/{id}/edit` require login.
- `/users`, `/users/new`, and `/users/{id}/edit` require login.
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

`database/pos_tfa4_export.sql` is the TFA4 schema/data export for `pos_tfa4`, including the non-plain-text `users.password` column and sample password hashes. To generate a fresh export from a populated database:

```powershell
& 'C:\xampp\mysql\bin\mysqldump.exe' --user=root --databases pos_tfa4 --skip-add-drop-table --result-file=database/pos_tfa4_export.sql
```
