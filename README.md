# ELRUMI TOBACCO

Aplikasi e-commerce untuk toko rokok dengan integrasi pembayaran Midtrans.

## Persyaratan Sistem

-   PHP 8.1 atau lebih tinggi
-   Composer
-   Node.js & NPM
-   MySQL/MariaDB
-   Git

## Cara Instalasi

1. Clone repository ini
2. Salin file `.env.example` menjadi `.env` dengan perintah `cp .env.example .env`
3. Generate application key dengan perintah `php artisan key:generate`
4. Jalankan perintah `composer install` untuk menginstal dependensi
5. Jalankan perintah `npm install` untuk menginstal dependensi JavaScript
6. Jalankan perintah `php artisan migrate` untuk membuat tabel database
7. Jalankan perintah `php artisan db:seed` untuk mengisi tabel database dengan data awal
8. Jalankan perintah `composer run dev` untuk menjalankan aplikasi
9. Buka browser dan akses `http://localhost:8000` untuk mengakses aplikasi
