<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Skema Database
[![image.png](https://i.postimg.cc/rm1BX2yq/image.png)](https://postimg.cc/WF4WgKJy)

# Tutorial Penggunaan & Konfigurasi Laravel

1. Install Composer Terlebih Dahulu <br>
   [Download disini](https://getcomposer.org/download/)
2. Install Packagenya Terlebih Dahulu

```
composer install
```

3. Copy isi file .env.example

```
cp .env.example .env
```

5. Buatlah database kosong di phpmyadmin dengan nama **articles**
6. Lakukan Migrasi Database dan Jalankan Seeder

```
php artisan migrate --seed
```

7. Jalankan aplikasi

```
php artisan serve
```
