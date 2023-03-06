<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reg_number'=>fake()->randomNumber(9),
            'brand'=>ucfirst(fake()->word()),
            'model'=>ucfirst(fake()->word()),
            'owner_id'=>rand(1, 1000)

            ];
    }
}
// $table->id();
//            $table->string("reg_number",255);
//            $table->string("brand",100);
//            $table->string("model",100);
//            $table->foreignId("owner_id");
//            $table->timestamps();
