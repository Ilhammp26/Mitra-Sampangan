## Instalasi & Setup Project

Ikuti langkah-langkah mudah ini untuk menjalankan proyek secara lokal:

1.  **Clone Repositori**

    Pertama, clone repository ini ke mesin lokal Anda:

    ```bash
    git clone [https://github.com/Ilhammp26/Mitra-Sampangan.git]
    ```

2.  **Instal Dependensi**

    Masuk ke folder proyek yang telah Anda clone dan instal dependensi PHP dengan Composer:
    
    ```bash
    composer install
    ```

3.  **Siapkan Konfigurasi:**

    Salin file `.env.example` menjadi `.env` dan buat key aplikasi:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    **Penting:** Edit file `.env` dan atur detail koneksi database Anda (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`). Pastikan database yang Anda tentukan sudah dibuat di MySQL.

5.  **Migrasi Database dan Seed Data:**

    Jalankan perintah berikut untuk menyiapkan struktur tabel di database dan mengisi data awal:
    
    ```bash
    php artisan migrate:fresh --seed
    ```

    Perintah ini akan menghapus semua tabel yang ada, melakukan migrasi ulang, dan mengisi data awal yang telah dikonfigurasi.

6.  **Optimalkan Aplikasi:**

    Setelah migrasi dan seeding selesai, jalankan perintah berikut untuk mengoptimalkan aplikasi Laravel:

    ```bash
    php artisan optimize
    ```

    Perintah ini akan membersihkan dan mempercepat berbagai cache yang digunakan oleh Laravel, termasuk cache konfigurasi, rute, dan view.

7.  **Buat Storage Link:**

    Jalankan perintah berikut untuk membuat symbolic link ke folder `public/storage`:

    ```bash
    php artisan storage:link
    ```

8.  **Jalankan Aplikasi Laravel:**

    Setelah frontend siap, jalankan aplikasi Laravel dengan perintah artisan:

    ```bash
    php artisan serve
    ```
    
    Aplikasi Laravel Anda sekarang berjalan di `http://127.0.0.1:8000` dan frontend di `http://localhost:3000`.