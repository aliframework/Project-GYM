# Heroes Gym

## Deskripsi Proyek

Heroes Gym adalah aplikasi berbasis web yang dirancang untuk mengelola keanggotaan gym dan jadwal kelas. Aplikasi ini memungkinkan pengguna untuk mendaftar keanggotaan gym, melihat jadwal kelas yang tersedia, dan mengelola status keanggotaan mereka. Sistem ini juga mendukung otentikasi pengguna untuk keamanan dan manajemen data yang lebih baik.

## Fitur Utama
- Manajemen Keanggotaan: Pengguna dapat melihat, membuat, dan memperbarui keanggotaan gym.
- Manajemen Jadwal Kelas: Pengguna dapat melihat jadwal kelas gym yang tersedia.
- Dashboard Pengguna: Pengguna dapat mengakses dashboard untuk melihat dan mengelola informasi pribadi serta status keanggotaan mereka.
- Otentikasi Pengguna: Pengguna dapat melakukan login dan registrasi untuk mengakses fitur-fitur aplikasi.

## Teknologi yang Digunakan

- Framework: Laravel 11
- Frontend: Bootstrap 5
- Database: MySQL
- API Testing: Postman

## Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di mesin lokal Anda:

1. Clone Repository:
   bash
   git clone https://github.com/aliframework/Project-GYM.git
   

2. Masuk ke Direktori Proyek:

   bash
   cd project-gym
   

3. Install Dependensi:

   bash
   composer install
   npm install
   

4. Copy File Konfigurasi:

   bash
   cp .env.example .env
   

5. Atur File **``:

   - Konfigurasi database Anda di file .env:
     env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=project_gym
     DB_USERNAME=root
     

6. Generate Key Aplikasi:

   bash
   php artisan key:generate
   

7. Migrasi Database:

   bash
   php artisan migrate
   

8. Jalankan Server:

   bash
   php artisan serve
   

   Aplikasi akan tersedia di [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Dokumentasi API

Gunakan Postman atau aplikasi serupa untuk menguji API. Beberapa endpoint utama:

- Manajemen Membership:

  - URL: /api/membership
  - Metode: GET, POST, PUT, DELETE
