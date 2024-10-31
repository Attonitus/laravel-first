<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->userName(),
            'description' => $this->faker->paragraph(2, true),
            'value' => $this->faker->numberBetween(1, 250000),
            'card_img' => $this->faker->imageUrl(350, 280),
            'illustrator' => $this->faker->name(),
            'type' => $this->faker->randomElement(['Normal', 'Water', 'Grass', 'Fire', 'Psych', 'Fight', 'Steel', 'Dragon', 'Poison']),
            'country' => $this->faker->country(),
            'rarity' => $this->faker->randomElement(['Normal', 'Holo', 'Special']),
            'condition' => $this->faker->randomElement(['Poor', 'Good', 'Perfect']),
            'bidding' => $this->faker->boolean()
        ];
    }
}
