<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Books;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'user 1',
                'email' => 'teguh.nugraha76@gmail.com',
                'password' => Hash::make('pass'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'user 2',
                'email' => 'teguh@rastek.id',
                'password' => Hash::make('pass'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'user 3',
                'email' => 'dummy_3@gmail.com',
                'password' => Hash::make('pass'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'user 4',
                'email' => 'dummy_4@gmail.com',
                'password' => Hash::make('pass'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $books = [
            [
                'cover' => '',
                'title' => 'Laskar Pelangi',
                'author' => 'Andrea Hirata',
                'description' => 'Mengisahkan tentang perjuangan anak-anak Belitong dalam mengejar mimpi mereka di tengah keterbatasan.',
                'rating' => 4.5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'cover' => '',
                'title' => 'Bumi Manusia',
                'author' => 'Pramoedya Ananta Toer',
                'description' => 'Novel sejarah yang menceritakan kehidupan Minke, seorang pribumi di masa kolonial Belanda.',
                'rating' => 4.7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'cover' => '',
                'title' => 'Perahu Kertas',
                'author' => 'Dee Lestari',
                'description' => 'Kisah cinta dan persahabatan antara Kugy dan Keenan, dua orang dengan impian berbeda.',
                'rating' => 4.2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'cover' => '',
                'title' => 'Negeri 5 Menara',
                'author' => 'Ahmad Fuadi',
                'description' => 'Perjalanan Alif, seorang santri dari Maninjau, dalam menuntut ilmu di Pondok Madani.',
                'rating' => 4.6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'cover' => '',
                'title' => 'Ayat-Ayat Cinta',
                'author' => 'Habiburrahman El Shirazy',
                'description' => 'Kisah cinta Fahri, seorang mahasiswa Indonesia di Kairo, dengan Aisha, seorang wanita Turki.',
                'rating' => 4.3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'cover' => '',
                'title' => 'Harry Potter and the Sorcerer\'s Stone',
                'author' => 'J.K. Rowling',
                'description' => 'Petualangan Harry Potter, seorang penyihir muda, di sekolah sihir Hogwarts.',
                'rating' => 4.8,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'cover' => '',
                'title' => 'The Lord of the Rings',
                'author' => 'J.R.R. Tolkien',
                'description' => 'Epik fantasi tentang perjalanan Frodo Baggins untuk menghancurkan Cincin Kekuasaan.',
                'rating' => 4.9,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'cover' => '',
                'title' => 'Pride and Prejudice',
                'author' => 'Jane Austen',
                'description' => 'Kisah cinta Elizabeth Bennet dan Mr. Darcy di Inggris abad ke-19.',
                'rating' => 4.4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'cover' => '',
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'description' => 'Novel tentang rasialisme dan ketidakadilan di Amerika Serikat Selatan.',
                'rating' => 4.7,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'cover' => '',
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'Novel distopia tentang masyarakat yang dikontrol oleh rezim totaliter.',
                'rating' => 4.5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        User::insert($user);
        Books::insert($books);
    }
}
