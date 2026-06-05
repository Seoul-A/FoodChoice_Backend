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
        
        $food = function (
            $name,
            $description,
            $tags,
            $likes = 50
        ) {
            return [
                'name' => $name,
                'description' => $description,
                'image_url' => 'image/makanan/' . strtolower($name) . '.svg',
                'price' => 0,
                'likes_count' => $likes,
                'tags' => $tags,
            ];
        };

        $foods = [

            $food(
                'ayam bakar',
                'Ayam bakar dengan bumbu khas.',
                [
                    $tag('Makanan berat'),
                    $tag('Bakar'),
                    $tag('Asin'),
                    $tag('Ayam'),
                ],
                180
            ),

            $food(
                'bakso aci',
                'Bakso aci kuah pedas.',
                [
                    $tag('Makanan berat'),
                    $tag('Kuah'),
                    $tag('Pedas'),
                ],
                175
            ),

            $food(
                'bubur ayam',
                'Bubur ayam hangat gurih.',
                [
                    $tag('Makanan berat'),
                    $tag('Asin'),
                    $tag('Ayam'),
                ],
                170
            ),

            $food(
                'chicken steak',
                'Chicken steak dengan saus spesial.',
                [
                    $tag('Makanan berat'),
                    $tag('Kering'),
                    $tag('Ayam'),
                ],
                168
            ),

            $food(
                'dimsum',
                'Dimsum ayam lembut.',
                [
                    $tag('Camilan'),
                    $tag('Kering'),
                    $tag('Ayam'),
                ],
                165
            ),

            $food(
                'kare',
                'Kare hangat berbumbu.',
                [
                    $tag('Makanan berat'),
                    $tag('Kuah'),
                    $tag('Ayam'),
                ],
                160
            ),

            $food(
                'lele goreng',
                'Lele goreng renyah.',
                [
                    $tag('Makanan berat'),
                    $tag('Kering'),
                    $tag('Ikan'),
                ],
                158
            ),

            $food(
                'mi rebus',
                'Mi rebus kuah hangat.',
                [
                    $tag('Makanan berat'),
                    $tag('Kuah'),
                    $tag('Mi'),
                ],
                155
            ),

            $food(
                'nasgor seafood',
                'Nasi goreng seafood.',
                [
                    $tag('Makanan berat'),
                    $tag('Nasi'),
                    $tag('Seafood'),
                ],
                150
            ),

            $food(
                'nasi ayam geprek',
                'Nasi ayam geprek pedas.',
                [
                    $tag('Makanan berat'),
                    $tag('Pedas'),
                    $tag('Ayam'),
                    $tag('Nasi'),
                ],
                148
            ),

            $food(
                'nasi kebuli',
                'Nasi kebuli khas Timur Tengah.',
                [
                    $tag('Makanan berat'),
                    $tag('Nasi'),
                    $tag('Kambing'),
                ],
                145
            ),

            $food(
                'nasi pecel',
                'Nasi pecel sayur segar.',
                [
                    $tag('Makanan berat'),
                    $tag('Sayur'),
                    $tag('Nasi'),
                ],
                142
            ),

            $food(
                'nasi telur kriwul',
                'Nasi telur kriwil gurih.',
                [
                    $tag('Makanan berat'),
                    $tag('Nasi'),
                ],
                140
            ),

            $food(
                'rawon',
                'Rawon khas Jawa Timur.',
                [
                    $tag('Makanan berat'),
                    $tag('Kuah'),
                    $tag('Sapi'),
                ],
                138
            ),

            $food(
                'sate kambing',
                'Sate kambing bakar.',
                [
                    $tag('Makanan berat'),
                    $tag('Bakar'),
                    $tag('Kambing'),
                ],
                135
            ),

            $food(
                'sop',
                'Sop hangat gurih.',
                [
                    $tag('Makanan berat'),
                    $tag('Kuah'),
                    $tag('Sapi'),
                ],
                132
            ),

            $food(
                'sushi',
                'Sushi seafood khas Jepang.',
                [
                    $tag('Makanan berat'),
                    $tag('Kering'),
                    $tag('Seafood'),
                ],
                130
            ),

            $food(
                'ayam goreng',
                'Ayam goreng renyah.',
                [
                    $tag('Makanan berat'),
                    $tag('Kering'),
                    $tag('Ayam'),
                ],
                128
            ),

            $food(
                'bakso',
                'Bakso sapi kuah hangat.',
                [
                    $tag('Makanan berat'),
                    $tag('Kuah'),
                    $tag('Sapi'),
                ],
                125
            ),

            $food(
                'ca kangkung',
                'Ca kangkung segar.',
                [
                    $tag('Makanan berat'),
                    $tag('Sayur'),
                ],
                122
            ),

            $food(
                'cilok',
                'Cilok kenyal gurih.',
                [
                    $tag('Camilan'),
                    $tag('Kering'),
                    $tag('Asin'),
                ],
                120
            ),

            $food(
                'gado-gado',
                'Gado-gado saus kacang.',
                [
                    $tag('Makanan berat'),
                    $tag('Sayur'),
                ],
                118
            ),

            $food(
                'kentucky fried chicken',
                'Ayam crispy gurih.',
                [
                    $tag('Makanan berat'),
                    $tag('Kering'),
                    $tag('Ayam'),
                ],
                115
            ),

            $food(
                'mi ayam',
                'Mi ayam topping ayam.',
                [
                    $tag('Makanan berat'),
                    $tag('Mi'),
                    $tag('Asin'),
                    $tag('Ayam'),
                ],
                112
            ),

            $food(
                'nasgor mawut',
                'Nasi goreng mawut spesial.',
                [
                    $tag('Makanan berat'),
                    $tag('Nasi'),
                    $tag('Asin'),
                ],
                110
            ),

            $food(
                'nasgor telor',
                'Nasi goreng telur.',
                [
                    $tag('Makanan berat'),
                    $tag('Nasi'),
                    $tag('Asin'),
                ],
                108
            ),

            $food(
                'nasi bakar',
                'Nasi bakar aroma khas.',
                [
                    $tag('Makanan berat'),
                    $tag('Bakar'),
                    $tag('Nasi'),
                ],
                105
            ),

            $food(
                'nasi kuning',
                'Nasi kuning khas Indonesia.',
                [
                    $tag('Makanan berat'),
                    $tag('Nasi'),
                ],
                100
            ),

            $food(
                'nasi rendang',
                'Nasi rendang daging sapi.',
                [
                    $tag('Makanan berat'),
                    $tag('Nasi'),
                    $tag('Sapi'),
                ],
                98
            ),

            $food(
                'pempek',
                'Pempek ikan khas Palembang.',
                [
                    $tag('Camilan'),
                    $tag('Ikan'),
                ],
                95
            ),

            $food(
                'salad sayur',
                'Salad sayur segar.',
                [
                    $tag('Camilan'),
                    $tag('Sayur'),
                ],
                92
            ),

            $food(
                'sayur asem',
                'Sayur asem segar.',
                [
                    $tag('Makanan berat'),
                    $tag('Kuah'),
                    $tag('Sayur'),
                ],
                90
            ),
            
            $food(
                'soto betawi',
                'Soto betawi kuah gurih.',
                [
                    $tag('Makanan berat'),
                    $tag('Kuah'),
                    $tag('Sapi'),
                ],
                88
            ),

            $food(
                'tahu bakso',
                'Tahu isi bakso gurih.',
                [
                    $tag('Camilan'),
                    $tag('Sapi'),
                ],
                85
            ),

            $food(
                'ayam kecap',
                'Ayam kecap manis gurih.',
                [
                    $tag('Makanan berat'),
                    $tag('Ayam'),
                    $tag('Manis'),
                ],
                82
            ),

            $food(
                'beef steak',
                'Beef steak spesial.',
                [
                    $tag('Makanan berat'),
                    $tag('Sapi'),
                    $tag('Kering'),
                ],
                80
            ),

            $food(
                'capcay',
                'Capcay sayur sehat.',
                [
                    $tag('Makanan berat'),
                    $tag('Sayur'),
                ],
                78
            ),

            $food(
                'cireng',
                'Cireng renyah gurih.',
                [
                    $tag('Camilan'),
                    $tag('Kering'),
                ],
                75
            ),

            $food(
                'gulai kikil',
                'Gulai kikil gurih.',
                [
                    $tag('Makanan berat'),
                    $tag('Kuah'),
                    $tag('Sapi'),
                ],
                72
            ),

            $food(
                'lele bakar',
                'Lele bakar gurih.',
                [
                    $tag('Makanan berat'),
                    $tag('Bakar'),
                    $tag('Ikan'),
                ],
                70
            ),

            $food(
                'mi goreng',
                'Mi goreng spesial.',
                [
                    $tag('Makanan berat'),
                    $tag('Mi'),
                    $tag('Kering'),
                ],
                68
            ),

            $food(
                'nasgor mentega',
                'Nasi goreng mentega.',
                [
                    $tag('Makanan berat'),
                    $tag('Nasi'),
                    $tag('Asin'),
                ],
                65
            ),

            $food(
                'nasi ayam bumbu hitam',
                'Nasi ayam bumbu hitam.',
                [
                    $tag('Makanan berat'),
                    $tag('Ayam'),
                    $tag('Nasi'),
                ],
                62
            ),

            $food(
                'nasi bebek bumbu hitam',
                'Nasi bebek bumbu hitam.',
                [
                    $tag('Makanan berat'),
                    $tag('Nasi'),
                ],
                60
            ),

            $food(
                'nasi padang',
                'Nasi padang khas Minang.',
                [
                    $tag('Makanan berat'),
                    $tag('Nasi'),
                    $tag('Pedas'),
                ],
                58
            ),

            $food(
                'nasi scramble egg',
                'Nasi scramble egg.',
                [
                    $tag('Makanan berat'),
                    $tag('Nasi'),
                ],
                55
            ),

            $food(
                'ramen',
                'Ramen kuah khas Jepang.',
                [
                    $tag('Makanan berat'),
                    $tag('Mi'),
                    $tag('Kuah'),
                ],
                52
            ),

            $food(
                'sate ayam',
                'Sate ayam bakar.',
                [
                    $tag('Makanan berat'),
                    $tag('Ayam'),
                    $tag('Bakar'),
                ],
                50
            ),

            $food(
                'seblak',
                'Seblak pedas nyemek.',
                [
                    $tag('Camilan'),
                    $tag('Nyemek'),
                    $tag('Pedas'),
                ],
                48
            ),

            $food(
                'soto lamongan',
                'Soto lamongan hangat.',
                [
                    $tag('Makanan berat'),
                    $tag('Kuah'),
                    $tag('Ayam'),
                ],
                45
            ),

        ];

    foreach ($foods as $data) {

        $food = Food::create([

            'name'         => $data['name'],
            'description'  => $data['description'],
            'image_url'    => $data['image_url'],
            'likes_count'  => $data['likes_count'],
            'is_available' => true,
            'created_by'   => $admin?->id,

        ]);

        $food->tags()->attach(
            array_filter(
                $data['tags']
            )
        );
    }

    }
}