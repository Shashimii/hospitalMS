<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'description' => fake()->paragraph(),
            'doctor' => fake()->name(),
            'patient' => fake()->name(),
            'schedule' => fake()->date('d/m/Y'),
            'doctor_id' => fake()->numberBetween(1, 100),
            'patient_id' => fake()->numberBetween(1, 100),
        ];
    }
}
