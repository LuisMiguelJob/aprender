<?php

namespace Database\Factories;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lender>
 */
class LenderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'codigo' => $this->faker->randomNumber(9, true),
            'correo' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
            'carrera_id' => Carrera::inRandomOrder()->first()->id
            //'carrera_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
