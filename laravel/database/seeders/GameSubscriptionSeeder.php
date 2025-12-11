<?php

namespace Database\Seeders;

use App\Models\GameSubscription;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GameSubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $subscriptions = [
            [
                'name' => 'Premium Gaming Pass',
                'description' => 'Get access to all premium games with exclusive content, early access to new releases, and priority server access.',
                'category' => 'MMORPG',
                'price' => 29.99,
                'duration_days' => 30,
                'max_players' => 1,
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Multiplayer Squad Pack',
                'description' => 'Perfect for gaming squads! Includes 5 player slots, team matchmaking, and squad-based challenges.',
                'category' => 'FPS',
                'price' => 49.99,
                'duration_days' => 30,
                'max_players' => 5,
                'image_url' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Strategy Master Bundle',
                'description' => 'Unlock all strategy games, premium maps, advanced AI opponents, and historical campaign modes.',
                'category' => 'Strategy',
                'price' => 24.99,
                'duration_days' => 30,
                'max_players' => 1,
                'image_url' => 'https://images.unsplash.com/photo-1585504198191-3d09acfc7a1c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Racing Pro League',
                'description' => 'Access to all racing simulators, exclusive cars and tracks, online tournaments, and leaderboard challenges.',
                'category' => 'Racing',
                'price' => 34.99,
                'duration_days' => 30,
                'max_players' => 4,
                'image_url' => 'https://images.unsplash.com/photo-1586500036706-41963de24d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Battle Royale Ultimate',
                'description' => 'Exclusive skins, early map access, bonus XP, and priority queue for battle royale matches.',
                'category' => 'Battle Royale',
                'price' => 19.99,
                'duration_days' => 30,
                'max_players' => null,
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=60',
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Sports Fan Pack',
                'description' => 'All sports games included with real-time updates, fantasy leagues, and multiplayer competitions.',
                'category' => 'Sports',
                'price' => 27.99,
                'duration_days' => 30,
                'max_players' => 2,
                'image_url' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'MOBA Champions Pass',
                'description' => 'Unlock all heroes, premium skins, exclusive tournaments, and priority matchmaking for MOBA games.',
                'category' => 'MOBA',
                'price' => 22.99,
                'duration_days' => 30,
                'max_players' => 5,
                'image_url' => 'https://images.unsplash.com/photo-1614680376573-df3480f0c6ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Adventure Explorer Pack',
                'description' => 'Access to all adventure games, DLC content, secret levels, and developer commentary.',
                'category' => 'Adventure',
                'price' => 31.99,
                'duration_days' => 30,
                'max_players' => 1,
                'image_url' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Simulation Pro Bundle',
                'description' => 'Realistic simulation experiences including flight sims, city builders, and life simulation games.',
                'category' => 'Simulation',
                'price' => 39.99,
                'duration_days' => 30,
                'max_players' => 1,
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=70',
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Family Gaming Pass',
                'description' => 'Perfect for families! Up to 6 players, family-friendly content, parental controls, and educational games.',
                'category' => 'Other',
                'price' => 59.99,
                'duration_days' => 30,
                'max_players' => 6,
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=50',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Gaming Yearly Pro',
                'description' => 'Annual subscription with 2 months free! All games, priority support, and exclusive yearly rewards.',
                'category' => 'MMORPG',
                'price' => 299.99,
                'duration_days' => 365,
                'max_players' => 1,
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=40',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Weekly Trial Pass',
                'description' => 'Try our premium games for 7 days. Limited access but perfect for testing the service.',
                'category' => 'Other',
                'price' => 9.99,
                'duration_days' => 7,
                'max_players' => 1,
                'image_url' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=30',
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Retro Classics Collection',
                'description' => 'Access to hundreds of retro and classic games from the 80s and 90s. Nostalgia guaranteed!',
                'category' => 'Other',
                'price' => 14.99,
                'duration_days' => 30,
                'max_players' => 2,
                'image_url' => 'https://images.unsplash.com/photo-1534423861386-85a16f5d13fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'VR Gaming Experience',
                'description' => 'Premium VR games and experiences. Requires VR headset. Includes motion-based games and simulations.',
                'category' => 'Simulation',
                'price' => 44.99,
                'duration_days' => 30,
                'max_players' => 1,
                'image_url' => 'https://images.unsplash.com/photo-1518709268805-4e9042af2176?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'is_featured' => true,
                'is_active' => false,
            ],
            [
                'name' => 'Indie Games Showcase',
                'description' => 'Support indie developers! Access to hundreds of independent games with new additions monthly.',
                'category' => 'Adventure',
                'price' => 12.99,
                'duration_days' => 30,
                'max_players' => 1,
                'image_url' => 'https://images.unsplash.com/photo-1552820728-8b83bb6b773f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($subscriptions as $subscription) {
            GameSubscription::create($subscription);
        }

        $this->command->info('✅ Game subscriptions seeded successfully!');
        $this->command->info('📊 Total subscriptions: ' . count($subscriptions));
        $this->command->info('🔥 Featured subscriptions: ' . collect($subscriptions)->where('is_featured', true)->count());
        $this->command->info('📈 Active subscriptions: ' . collect($subscriptions)->where('is_active', true)->count());
    }
}