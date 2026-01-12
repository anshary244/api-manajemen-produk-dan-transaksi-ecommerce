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

## Resource Utama
1. users
2. Products
3. Transaction
4. Payment
5. Transaction Details

## Tim Pengembang
 Rini = Autentikasi JWT & Database
 Qory = Products & Transaction
 Lia  = Payment & Transaction detail

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
    DB_DATABASE=api_ecommerce
    DB_USERNAME=root
    DB_PASSWORD=

5. Migrasi database
   php artisan migrate

6. Jalankan server
   php artisan serve

Aplikasi akan berjalan di:
http://127.0.0.1:8000

## Informasi Akun Uji Coba
Email: rini@gmail.com  
Password: 123456  

(Jika akun belum tersedia, silakan register melalui endpoint register)

## Dokumentasi API (Postman)

Link Dokumentasi Rini: https://documenter.getpostman.com/view/49032366/2sBXVfiBPA

Link Dokumentasi Qory: https://documenter.getpostman.com/view/49032366/2sBXVfiBPA

Link Dokumentasi Dahlia : https://documenter.getpostman.com/view/49032366/2sBXVfiBPA



## Catatan
Proyek ini dikembangkan sebagai Ujian Akhir Semester (UAS)
Mata Kuliah Pemrograman Web Service.