<?php

namespace Database\Factories;

use App\Models\Baker;
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
        $name = $this->faker->unique()->firstName();
        $slug = Str::slug($name);

        $imageNames = ['AMANDA', 'CHIGS', 'CRYSTELLE', 'FREYA', 'GEORGE', 'GUISEPPE', 'JAIRZENO', 'JURGEN', 'LIZZIE', 'MAGGIE', 'ROCHICA', 'TOM'];

        return [
            'slug' => $slug,
            'name' => $name,
            'age' => $this->faker->numberBetween(18, 80),
            'from' => $this->faker->city(),
            'job' => $this->faker->jobTitle(),
            'bio' => $this->faker->paragraph(),
            'image_path' => 'images/bakers/2022/' . $this->faker->randomElement($imageNames) . '-740x740.jpg'
        ];
    }
}
