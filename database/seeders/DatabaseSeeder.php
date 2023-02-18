<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Food;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory()->times(20)->create();

        Transaction::factory(10)->create();
        
        Food::create([
            'name' => 'Spaghetti Carbonara',
            'description' => 'A classic Italian dish made with spaghetti, bacon, eggs, and Parmesan cheese in a creamy sauce.',
            'ingredients' => 'Spaghetti, bacon, eggs, Parmesan cheese, cream, black pepper',
            'price' => 12.99,
            'rate' => 4.5,
            'type' => 'Pasta']);

        Food::create(
            [        'name' => 'Chicken Teriyaki',        'description' => 'Grilled chicken with a sweet and savory teriyaki sauce, served with steamed rice and vegetables.',        'ingredients' => 'Chicken breast, soy sauce, brown sugar, honey, garlic, ginger, rice, vegetables',        'price' => 14.99,        'rate' => 4.2,        'type' => 'Japanese'    ]
        );
        Food::create(
            [        'name' => 'Beef Burger',        'description' => 'A juicy beef patty with melted cheese, lettuce, tomato, and pickles on a toasted bun.',        'ingredients' => 'Beef patty, cheese, lettuce, tomato, pickles, bun',        'price' => 9.99,        'rate' => 4.0,        'type' => 'American'    ]
        );
        Food::create(
            [        'name' => 'Pad Thai',        'description' => 'A classic Thai dish made with stir-fried rice noodles, tofu, shrimp, and vegetables in a sweet and sour sauce.',        'ingredients' => 'Rice noodles, tofu, shrimp, bean sprouts, eggs, peanuts, tamarind paste, fish sauce',        'price' => 11.99,        'rate' => 4.6,        'type' => 'Thai'    ]
        );
    }
}
