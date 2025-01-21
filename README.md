# API Salonku Booking

Proyek ini adalah aplikasi backend yang dibangun menggunakan Laravel untuk mengelola pemesanan salon. Berikut adalah panduan untuk mengatur proyek ini.

## Persyaratan Lingkungan

Pastikan Anda telah menginstal hal berikut di sistem Anda:
- **PHP**: versi 8.2 atau lebih tinggi
- **Composer**: versi terbaru
- **Database**: MySQL atau yang kompatibel

## Library yang Digunakan

Proyek ini menggunakan library berikut:
- `spatie/laravel-permission`

## Langkah Instalasi Program

1. **Clone Repository**
   Buka terminal Anda dan navigasikan ke direktori tempat Anda ingin menyimpan proyek. Clone repository menggunakan perintah berikut:
   ```bash
   git clone https://github.com/fajaryumna/BE_Salon_Booking.git
   ```

2. **Masuk ke Direktori Proyek**
   ```bash
   cd BE_Salon_Booking
   ```

3. **Instal Dependensi Composer**
   Jalankan perintah berikut untuk menginstal dependensi PHP yang diperlukan:
   ```bash
   composer install
   ```

4. **Buat File .env**
   Salin file `.env.example` ke `.env`:
   ```bash
   cp .env.example .env
   ```

5. **Generate Key Aplikasi**
   Jalankan perintah berikut untuk membuat application key:
   ```bash
   php artisan key:generate
   ```

6. **Install Library Laravel Spatie**
   Instal dan publikasikan konfigurasi library Spatie:
   ```bash
   composer require spatie/laravel-permission
   php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
   ```

7. **Jalankan Migrasi Database**
   Buat tabel database yang diperlukan dengan menjalankan migrasi:
   ```bash
   php artisan migrate
   ```

8. **Jalankan Seeder**
   Isi database dengan data awal menggunakan seeder:
   ```bash
   php artisan db:seed
   ```

9. **Jalankan Aplikasi**
   Setelah instalasi selesai, Anda dapat menjalankan server pengembangan dengan perintah:
   ```bash
   php artisan serve
   ```
   Aplikasi backend akan berjalan di `http://127.0.0.1:8000` secara default.

## Catatan Penting

- Pastikan database telah dikonfigurasi dengan benar di file `.env`.
- Untuk panduan lengkap tentang API yang tersedia, silakan lihat dokumentasi di repository ini.
