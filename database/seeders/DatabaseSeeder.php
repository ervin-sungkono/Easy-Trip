<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'email' => 'admin@example.com',
            'role' => 'admin'
        ]);

        User::factory(1)->create([
            'email' => 'member@example.com',
        ]);

        User::factory(10)->create();

        Item::factory(12)->sequence([
            'name' => 'Monumen Nasional',
            'description' => 'Bangunan setinggi 132 meter ini dibangun untuk menghormati perjuangan Kemerdekaan. Anda dapat menikmati pemandangan arsitektur yang menakjubkan ini dari bawah atau Anda dapat memanjat sampai ke puncak dan menikmati pemandangan kota yang menakjubkan',
            'image' => 'https://gallery.poskota.co.id/storage/Foto/Foto_20210622_093409_UE7.jpeg',
            'location' => 'Jakarta',
            'price' => 12000
        ], [
            'name' => 'Museum Pusaka (Taman Mini Indonesia Indah)',
            'description' => 'Taman mini Indonesia Indah adalah tempat yang wajib Anda kunjungi jika Anda ingin menjelajahi sejarah dan budaya masyarakat Indonesia',
            'image' => 'https://asset.kompas.com/crops/MamNPh9l0TZaSLTA0DJ4ZJv13sI=/2x0:902x600/750x500/data/photo/2021/09/25/614ecf8a4f82c.jpg',
            'location' => 'Jakarta',
            'price' => 12000
        ], [
            'name' => 'Dufan (Ancol)',
            'description' => 'Dufan atau disebut juga Dunia Fantasi adalah sebuah theme park yang terletak di kawasan Taman Impian Jaya Ancol, Jakarta Utara, Indonesia',
            'image' => 'https://asset-a.grid.id/crop/0x224:1080x1080/x/photo/2021/09/14/asyik-pantai-ancol-dan-dufan-ke-20210914124033.jpg',
            'location' => 'Jakarta',
            'price' => 200000
        ], [
            'name' => 'Kebun Binatang Ragunan',
            'description' => 'Pencinta satwa liar dan alam harus menuju ke Kebun Binatang Ragunan yang tersebar di lahan seluas 185 hektar dan menawarkan lebih dari 3.600 spesies',
            'image' => 'https://sikidang.com/wp-content/uploads/Kebun-Binatang-Ragunan-Jakarta.jpg',
            'location' => 'Jakarta',
            'price' => 7000
        ], [
            'name' => 'Museum Nasional Indonesia',
            'description' => 'Museum ini memiliki koleksi artefak yang menakjubkan yang memberikan perspektif rinci tentang sejarah dan warisan budaya Indonesia',
            'image' => 'https://awsimages.detik.net.id/community/media/visual/2022/07/15/harga-tiket-museum-nasional-naik-16-juli-ini-daftar-lengkapnya_169.jpeg?w=1200',
            'location' => 'Jakarta',
            'price' => 10000
        ], [
            'name' => 'Planetarium',
            'description' => 'Planetarium dan Observatorium Jakarta yang berada di kawasan Pusat Kesenian Jakarta, Taman Ismail Marzuki ini merupakan sebuah tempat edukasi bagi pelajar khususnya dan juga publik pada umumnya tentang ilmu astronomi',
            'image' => 'https://cdn.nativeindonesia.com/foto/planetarium-jakarta/Lorong-Zodiak-1.jpg',
            'location' => 'Jakarta',
            'price' => 5000
        ], [
            'name' => 'The World Landmarks Merapi Park',
            'description' => 'Surga spot selfie kekinian ini berada di kilometer 25 Jalan Kaliurang, Desa Pakembinagun, Kabupaten Sleman. Di sini ada berbagai miniatur landmark dari seluruh dunia',
            'image' => 'https://asset.kompas.com/crops/UCKtBa5ISuVunfJhWsiv1MYUHKQ=/173x115:1555x1037/750x500/data/photo/2019/06/27/2323331594.jpeg',
            'location' => 'Yogyakarta',
            'price' => 15000
        ], [
            'name' => 'Jogja Bay Waterpark',
            'description' => 'Ini adalah kompleks wahana air di atas lahan seluas 7,7 hektar yang mengusung konsep bajak laut. Selain berbagai wahana air, di sini juga diselenggarakan pertunjukan bertema bajak laut',
            'image' => 'https://asset.kompas.com/crops/GlbwdkbT_onb41nSTifNSAHgero=/100x104:826x588/750x500/data/photo/2018/12/31/47499531617.JPG',
            'location' => 'Yogyakarta',
            'price' => 90000
        ], [
            'name' => 'Umbul Ponggok Klaten',
            'description' => 'Kolam natural dengan air biru jernih di Klaten ini menawarkan wisata underwater kekinian. Lengkap dengan aneka properti untuk foto keren di dasar. Wisatawan yang tak bisa berenang pun tetap bisa foto di sini',
            'image' => 'https://www.indonesia-tourism.com/central-java/klaten/images/umbul_ponggok.jpg',
            'location' => 'Yogyakarta',
            'price' => 80000
        ], [
            'name' => 'Taman Pelangi Monjali',
            'description' => 'Tempat wisata di Jogja yang menawarkan romantisme sederhana di malam hari. Taman Pelangi Monumen Jogja Kembali alias Monjali. Monumen yang berada di Jalan Lingkar Utara Yogyakarta itu tampil semarak dengan aneka bentuk lampion dan lampu warna-warni',
            'image' => 'https://tempatasik.com/wp-content/uploads/2017/05/taman-pelangi-jogja-1024x768.jpg',
            'location' => 'Yogyakarta',
            'price' => 15000
        ], [
            'name' => 'Orchid Forest Cikole',
            'description' => 'Selain menawarkan pemandangan hutan pinus dan anggrek, Orchid Forest Cikole juga memiliki tempat bermain golf, area bermain dengan kelinci, jembatan tali yang bersinar di malam hari, sampai horse ranch',
            'image' => 'https://i0.wp.com/penginapan.net/wp-content/uploads/Orchid-Forest-Cikole-1.jpg?resize=460%2C300&ssl=1',
            'location' => 'Bandung',
            'price' => 55000
        ], [
            'name' => 'Tangkuban Perahu',
            'description' => 'Jika di selatan Bandung ada Kawah Putih, di utara Bandung terdapat Gunung Tangkuban Perahu, gunung stratovolcano yang masih aktif dan menjadi tempat wisata populer di Bandung sejak lama',
            'image' => 'https://asset.kompas.com/crops/ilcgxQBDmeUuoES_SK8mjjhAEvU=/0x0:1000x667/750x500/data/photo/2022/06/27/62b946699ed13.jpg',
            'location' => 'Bandung',
            'price' => 20000
        ])->create();

        Item::factory(24)->create();
    }
}
