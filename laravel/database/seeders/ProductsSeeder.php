<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductsSeeder extends Seeder
{
    

    public function run()
{
    $products = [
            [
                'name' => 'Cyberpunk 2077',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQt-dZ8u_dXZ4-AhDROEpQNiXqh9VNbGH1B9g&s',
                'category' => 'Windows',
                'description' => 'Open-world RPG set in a dystopian future Night City',
                'price' => 49.99,
                'rating' => 4.5,
            ],
            [
                'name' => 'GTA V',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/271590/header.jpg',
                'category' => 'Windows',
                'description' => 'Crime adventure in the massive open world of Los Santos',
                'price' => 29.99,
                'rating' => 4.8,
            ],
            [
                'name' => 'The Witcher 3',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/292030/header.jpg',
                'category' => 'Windows',
                'description' => 'Epic fantasy RPG as monster slayer Geralt of Rivia',
                'price' => 39.99,
                'rating' => 4.6,
            ],
            [
                'name' => 'Elden Ring',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1245620/header.jpg',
                'category' => 'Windows',
                'description' => 'Open-world action RPG from the creators of Dark Souls',
                'price' => 59.99,
                'rating' => 4.8,
            ],
            [
                'name' => 'Red Dead Redemption 2',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1174180/header.jpg',
                'category' => 'Windows',
                'description' => 'Western epic following outlaw Arthur Morgan\'s journey',
                'price' => 59.99,
                'rating' => 4.9,
            ],
            [
                'name' => 'Doom Eternal',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/782330/header.jpg',
                'category' => 'Windows',
                'description' => 'Fast-paced FPS where you battle demons across dimensions',
                'price' => 39.99,
                'rating' => 4.7,
            ],
            [
                'name' => 'Counter-Strike 2',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/730/header.jpg',
                'category' => 'Windows',
                'description' => 'Legendary tactical team-based first-person shooter',
                'price' => 0.00,
                'rating' => 4.8,
            ],
            [
                'name' => 'Baldur\'s Gate 3',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1086940/header.jpg',
                'category' => 'Windows',
                'description' => 'Dungeons & Dragons CRPG with deep storytelling',
                'price' => 59.99,
                'rating' => 4.9,
            ],
            [
                'name' => 'Starfield',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1716740/header.jpg',
                'category' => 'Windows',
                'description' => 'Space exploration RPG from Bethesda Game Studios',
                'price' => 69.99,
                'rating' => 4.3,
            ],
            [
                'name' => 'Hogwarts Legacy',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/990080/header.jpg',
                'category' => 'Windows',
                'description' => 'Open-world RPG set in the Harry Potter universe',
                'price' => 59.99,
                'rating' => 4.7,
            ],
            [
                'name' => 'Resident Evil 4',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/2050650/header.jpg',
                'category' => 'Windows',
                'description' => 'Survival horror remake of the classic zombie adventure',
                'price' => 59.99,
                'rating' => 4.8,
            ],
            [
                'name' => 'Call of Duty: MW3',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1938090/header.jpg',
                'category' => 'Windows',
                'description' => 'Intense military FPS with campaign and multiplayer',
                'price' => 69.99,
                'rating' => 4.2,
            ],
            [
                'name' => 'Forza Horizon 5',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1551360/header.jpg',
                'category' => 'Windows',
                'description' => 'Open-world racing adventure set in vibrant Mexico',
                'price' => 59.99,
                'rating' => 4.8,
            ],
            [
                'name' => 'Sea of Thieves',
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1172620/header.jpg',
                'category' => 'Windows',
                'description' => 'Multiplayer pirate adventure on the high seas',
                'price' => 39.99,
                'rating' => 4.5,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }

}
