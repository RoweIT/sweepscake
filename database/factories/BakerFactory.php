<?php

namespace Database\Factories;

use App\Models\Baker;
use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class BakerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageNames = ['AMANDA', 'CHIGS', 'CRYSTELLE', 'FREYA', 'GEORGE', 'GUISEPPE', 'JAIRZENO', 'JURGEN', 'LIZZIE', 'MAGGIE', 'ROCHICA', 'TOM'];

        return [
            'slug' => $this->faker->unique()->slug(),
            'name' => $this->faker->unique()->firstName(),
            'age' => $this->faker->numberBetween(18, 80),
            'from' => $this->faker->city(),
            'job' => $this->faker->jobTitle(),
            'bio' => mb_strimwidth($this->faker->paragraph(10), 0, 4000, '', 'UTF-8'),
            'image_path' => 'images/bakers/2021/' . $this->faker->randomElement($imageNames) . '-740x740.jpg',
        ];
    }
}
