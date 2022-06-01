<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDomicilio>
 */
class UserDomicilioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \App\Providers\Faker\CustomFakerProvider($this->faker));

        return [
            'domicilio' => $this->faker->streetPrefixes().' '.$this->faker->lastName(),
            'numero_exterior' => $this->faker->buildingNumber(),
            'colonia' => $this->faker->neighborhood(),
            'cp' => $this->faker->postcode(), 
            'ciudad' => $this->faker->city(),
        ];
    }
}
