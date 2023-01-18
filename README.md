# Projek Web Programming (EasyTrip)
Deskripsi: EasyTrip merupakan sebuah aplikasi untuk memesan tiket tempat wisata yang ada pada beberapa kota besar di Indonesia. 

## Installation Guide
1. Buat folder baru

2. Clone project dari repository Github dibawah ini di dalam folder tersebut dengan menggunakan Command Line Interface (CLI)
```sh
git clone https://github.com/ervin-sungkono/Easy-Trip
```
## Setup Guide
1. Buka projek laravel yang sudah di clone pada Visual Studio Code

*Semua step dibawah ini dilakukan dalam terminal*

2. Setup Laravel & install npm dependencies
```sh
composer install
npm install
```

3. Copy .env file with this command in the terminal
```sh
cp .env.example .env
```

4. Migrate Database dan Seeder
 ```sh
php artisan migrate:fresh --seed
```

5. Generate application key
 ```sh
php artisan key:generate
```

6. Run app
```sh
php artisan serve
```
