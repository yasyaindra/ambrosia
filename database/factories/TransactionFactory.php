<?php

namespace Database\Factories;

use App\Models\Food;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = $this->faker->numberBetween(1, 5);
        $food_id = $this->faker->numberBetween(1, 4);
        $quantity = $this->faker->numberBetween(1, 5);
        $total = $quantity * $this->faker->randomFloat(2, 10, 50);
        $status = $this->faker->randomElement(['DELIVERED', 'PENDING', 'CANCELLED']);
        $payment_url = $this->faker->url;

        return [
            'user_id' => $user_id,
            'food_id' => $food_id,
            'quantity' => $quantity,
            'total' => $total,
            'status' => $status,
            'payment_url' => $payment_url,
        ];
    }
}
