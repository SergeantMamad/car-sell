<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cars>
 */
class CarsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company'=>fake()->company(),
            'model'=>fake()->bloodGroup(),
            'mileage'=>fake()->randomNumber(5),
            'price'=>fake()->randomNumber(5),
            'year'=>fake()->year(),
            'color'=>fake()->colorName(),
            'location'=>fake()->city(),
            'engine'=>"2.0 4 Cylinder,3.0 6 Cylinder",
            'gearbox'=>'automatic,manual',
            'fuel'=>'petrol',
            'created_at'=>Carbon::now()->diffForHumans(),
        ];
    }
}
