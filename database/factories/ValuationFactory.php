<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Valuation>
 */
class ValuationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /** @var StatusEnum $status */
        $status = fake()->randomElement(StatusEnum::cases());
        return [
            'customerName' => fake()->name(),
            'customerEmail' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'value' => $status === StatusEnum::COMPLETED ? fake()->numberBetween(100000, 1000000) : null,
            'comments' => fake()->boolean(75) ? fake()->paragraph() : null,
            'status' => $status,
        ];
    }
}
