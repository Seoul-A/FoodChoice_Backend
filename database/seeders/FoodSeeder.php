<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        // Helper: cari id tag berdasarkan nama
        $tag = fn($name) => Tag::where('name', $name)->value('id');

        $foods = [
            [
                'name'        => 'Mie Ayam Bakso',
                'description' => 'Mie ayam dengan kuah kaldu segar dan bakso kenyal',
                'tags'        => [$tag('Berkuah'), $tag('Gurih'), $tag('Ayam'), $tag('Murah')],
            ],
            [
                'name'        => 'Ayam Geprek Sambal Bawang',
                'description' => 'Ayam crispy geprek dengan sambal bawang super pedas',
                'tags'        => [$tag('Pedas'), $tag('Gurih'), $tag('Ayam'), $tag('Kering'), $tag('Murah')],
            ],
            [
                'name'        => 'Es Teh Manis',
                'description' => 'Teh manis dingin segar',
                'tags'        => [$tag('Manis'), $tag('Minuman'), $tag('Murah')],
            ],
            [
                'name'        => 'Nasi Goreng Seafood',
                'description' => 'Nasi goreng dengan campuran udang, cumi, dan sayuran',
                'tags'        => [$tag('Gurih'), $tag('Seafood'), $tag('Kering'), $tag('Sedang')],
            ],
            [
                'name'        => 'Gado-Gado',
                'description' => 'Sayuran segar dengan bumbu kacang khas',
                'tags'        => [$tag('Vegetarian'), $tag('Gurih'), $tag('Murah')],
            ],
        ];

        foreach ($foods as $data) {
            $food = Food::create([
                'name'        => $data['name'],
                'description' => $data['description'],
                'created_by'  => $admin?->id,
            ]);

            // Attach tag ke makanan
            $food->tags()->attach(array_filter($data['tags']));
        }
    }
}