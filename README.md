# API Salonku Booking

Environment Program

```
- PHP 8.2
- Laravel 11.0
```

Library yang digunakan 

```
- spatie/laravel-permission
```

## Langkah Instalasi Program

1. Buatlah folder dimanapun untuk menyimpan project, lalu buka cmd/terminal/PS pada direktori folder tersebut

2. Clone project dari github melalui cmd/terminal/PS
```PowerShell
git clone https://github.com/fajaryumna/BE_Salon_Booking.git
```

3. Setelah itu, buka projet tersebut menggunakan vscode dan buka terminal. Lalu jalankan beberapa command berikut
- Instal composer
```PowerShell
composer install
```
- Buat file .env
```PowerShell
cp .env.example .env
```
- Generate key 
```PowerShell
php artisan key:generate
```
- Install library Laravel Spatie
```PowerShell
composer require spatie/laravel-permission
```
- Publish konfigurasi Laravel Spatie
```PowerShell
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
```
- Jalankan migrasi database 
```PowerShell
php artisan migrate
```
- Jalankan seeder 
```PowerShell
php artisan db:seed
```

4. Setelah instalasi selesai, anda bisa menjalankan aplikasi tersebut dan mencoba akses API yang tersedia
```PowerShell
php artisan serve
```



