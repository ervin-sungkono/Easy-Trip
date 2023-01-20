# Projek Web Programming (EasyTrip)
Deskripsi: EasyTrip merupakan sebuah aplikasi untuk memesan tiket tempat wisata yang ada di Indonesia. 

## Requirement untuk menjalankan projek ini:
- Download XAMPP di https://www.apachefriends.org/download.html
- Download Composer dengan https://getcomposer.org/Composer-Setup.exe   
- Buka dan jalankan XAMPP, kemudian buat database baru agar bisa disambungkan dengan projek

## Installation Guide
1. Buat folder baru

2. Clone project dari repository Github dibawah ini di dalam folder tersebut dengan menggunakan Command Line Interface (CLI)
```sh
git clone https://github.com/ervin-sungkono/Easy-Trip
```
## Setup Guide
1. Buka projek laravel yang sudah di clone pada Visual Studio Code

> *Semua step dibawah ini dilakukan dalam terminal*


2. Setup Laravel & install npm dependencies
```sh
composer install
npm install
```

3. Link ke storage laravel untuk cek upload image
```sh
php artisan storage:link
```

4. Copy .env.example file 
```sh
cp .env.example .env
```

Kemudian tambahkan credentials dibawah ini pada file .env tersebut

| Variable | Description |
| :--- | :--- |
| `DB_DATABASE` | Nama Database yang dibuat di PHPMyAdmin (XAMPP) |
| `GOOGLE_CLIENT_ID` | Google Client ID Anda |
| `GOOGLE_CLIENT_SECRET` | Google Client Secret Anda |

Untuk mendapatkan Google Client ID dan Google Client Secret melalui https://console.cloud.google.com

5. Generate application key
 ```sh
php artisan key:generate
```

6. Migrate Database dan Seeder
 ```sh
php artisan migrate:fresh --seed
```

7. Run app
```sh
php artisan serve
```
