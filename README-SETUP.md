# Ben Maker Studio — PHP + MySQL setup

A complete PHP/MySQL website for selling your 3D-printed products, with a public shop,
product popups, contact form, and a protected admin dashboard (product CRUD + messages inbox).

> The files that matter are the PHP files, the `includes/`, `assets/`, `admin/`, and `uploads/`
> folders. You can ignore the Next.js scaffold files (`app/`, `package.json`, etc.) — they only
> exist so v0 can host a project and are not part of your PHP site.

## What you need
- A PHP host with MySQL. Locally the easiest is **XAMPP** (Windows/Mac) or **MAMP**.
- On shared hosting / cPanel it works the same way.

## Install with XAMPP (local)
1. Install XAMPP and start **Apache** + **MySQL**.
2. Copy these files into `htdocs/benmaker/` (any folder name).
3. Open `config.php` and check the database settings. XAMPP defaults are already set:
   - host `localhost`, user `root`, password *(empty)*, database `ben_maker`.
4. In your browser go to: `http://localhost/benmaker/install.php`
   - This creates the database, tables, a default admin, and sample products.
5. **Delete `install.php`** afterwards.
6. Visit `http://localhost/benmaker/` for the site.

## Admin login
- URL: `http://localhost/benmaker/admin/login.php`
- Username: **admin**
- Password: **admin123**

Change the password after first login (see "Change password" below).

## Deploy to cPanel / shared hosting
1. Upload all files via File Manager or FTP into `public_html/` (or a subfolder).
2. Create a MySQL database + user in cPanel, and note the name/user/password.
3. Edit `config.php` with those credentials (and set `DB_HOST` if your host requires it).
4. Visit `yourdomain.com/install.php`, then delete `install.php`.
5. Make sure the `uploads/` folder is writable (permissions `755` or `775`).

## Edit your details
Open `config.php` to change:
- `SITE_NAME`, `SITE_TAGLINE`
- `CONTACT_EMAIL`, `CONTACT_PHONE`, `CONTACT_CITY`
- Currency is set to `DZD`.

## Change the admin password
Log in, or run a tiny script once: create `newpass.php` with
`<?php echo password_hash('YOUR_NEW_PASSWORD', PASSWORD_DEFAULT);`
open it, copy the hash, and update the `password_hash` value in the `admins` table via phpMyAdmin.
Then delete `newpass.php`.

## Features
- Public shop with search + category filters.
- Click any product to open a popup with the full image, description and price (in DZD).
- About and Contact pages, with a message form that saves to your database.
- Responsive mobile menu and dark/light theme toggle (saved per visitor).
- Admin dashboard: stats, recent messages, latest products.
- Products: add / edit / delete with image upload, price, description, category.
- Messages inbox: read/unread, reply by email, delete.
- Security: PDO prepared statements, CSRF tokens, hashed passwords, upload type checks.
