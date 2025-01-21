# API Salonku Booking

Proyek ini adalah aplikasi backend yang dibangun menggunakan Laravel untuk melakukan pemesanan salon secara online.

## Environment

- **PHP**: versi 8.2 atau lebih tinggi
- **Laravel**: versi 11.0 atau lebih tinggi
- **Database**: MySQL

## Library 

- `spatie/laravel-permission`

## Langkah Instalasi

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

6. **Pada file .env, perbarui dan tambahkan variabel berikut**
   ```bash
   DB_CONNECTION=mysql
   SANCTUM_STATEFUL_DOMAINS=localhost
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
- Untuk panduan lengkap tentang API yang tersedia, silakan lihat dokumentasi. 
- Untuk detail lebih lanjut tentang pengaturan fronent, kunjungi [Repository Frontend Salonku](https://github.com/fajaryumna/FE_Salon_Booking).
