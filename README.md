<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# API Manajemen Produk dan Transaksi

## Deskripsi Singkat
API Manajemen Produk dan Transaksi adalah sistem Web Service berbasis RESTful API
yang digunakan untuk mengelola data pengguna, produk, transaksi, dan pembayaran.
Sistem ini dibangun sebagai backend aplikasi dengan autentikasi menggunakan
JSON Web Token (JWT).

## Teknologi yang Digunakan
- Laravel
- PHP
- MySQL
- JWT Authentication
- Postman

## Cara Menjalankan Sistem
1. Clone repository
   git clone https://github.com/anshary244/api-manajemen-produk.git
   cd api-manajemen-produk

2. Install dependency
   composer install

3. Konfigurasi environment
   cp .env.example .env
   php artisan key:generate

4. Atur database pada file .env
   DB_DATABASE=nama_database
   DB_USERNAME=username_database
   DB_PASSWORD=password_database

5. Migrasi database
   php artisan migrate

6. Jalankan server
   php artisan serve

Aplikasi akan berjalan di:
http://127.0.0.1:8000

## Informasi Akun Uji Coba
Email: admin@test.com  
Password: password  

(Jika akun belum tersedia, silakan register melalui endpoint register)

## Dokumentasi API
Dokumentasi API tersedia dalam folder:
docs/

File dokumentasi:
postman_collection.json

Dokumentasi berisi daftar endpoint, HTTP method, parameter,
serta contoh response JSON dan penggunaan Bearer Token (JWT).

## Catatan
Proyek ini dikembangkan sebagai Ujian Akhir Semester (UAS)
Mata Kuliah Pemrograman Web Service.