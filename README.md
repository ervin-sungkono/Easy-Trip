# Projek Web Programming (EasyTrip)
Deskripsi: EasyTrip merupakan sebuah aplikasi untuk memesan tiket tempat wisata yang ada di Indonesia. 

## Requirement untuk menjalankan projek ini:
- Download PHP versi 7.3 atau keatas [disini](https://www.php.net/downloads.php)
- Download XAMPP [disini](https://www.apachefriends.org/download.html)
- Download Composer [disini](https://getcomposer.org/Composer-Setup.exe)   
- Buka dan jalankan XAMPP, kemudian buat database baru agar bisa disambungkan dengan projek

## Installation Guide
Clone project dari repository Github dengan command dibawah
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

## Library/Package yang digunakan projek ini
- [CKEditor4](https://ckeditor.com/ckeditor-4/download/) untuk membuat editor teks
- [DOMPDF](https://github.com/barryvdh/laravel-dompdf) untuk menghasilkan file pdf
- [Bootstrap](https://github.com/twbs/bootstrap) untuk membuat website menjadi rapi
- [Bootstrap Icons](https://github.com/twbs/icons) untuk memunculkan icon pada website
