<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            // Tipe
            ['name' => 'Makanan berat',      'type' => 'tipe'],
            ['name' => 'Camilan',     'type' => 'tipe'],
            // Jenis
            ['name' => 'Kuah',               'type' => 'jenis'],
            ['name' => 'Kering',             'type' => 'jenis'],
            ['name' => 'Nyemek',             'type' => 'jenis'],
            ['name' => 'Bakar',              'type' => 'jenis'],
            // Rasa
            ['name' => 'Pedas',              'type' => 'rasa'],
            ['name' => 'Manis',              'type' => 'rasa'],
            ['name' => 'Asin',               'type' => 'rasa'],
            // Bahan Utama
            ['name' => 'Nasi',               'type' => 'bahan_utama'],
            ['name' => 'Mi',               'type' => 'bahan_utama'],
            ['name' => 'Sayur',               'type' => 'bahan_utama'],
            ['name' => 'Ikan',               'type' => 'bahan_utama'],
            ['name' => 'Lontong',               'type' => 'bahan_utama'],
            ['name' => 'Ayam',               'type' => 'bahan_utama'],
            ['name' => 'Seafood',            'type' => 'bahan_utama'],
            ['name' => 'Sapi',               'type' => 'bahan_utama'],
            ['name' => 'Kambing',            'type' => 'bahan_utama'],
        ];

        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}