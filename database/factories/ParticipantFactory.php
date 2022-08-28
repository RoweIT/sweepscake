<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $avatarNames = ['avatar-1.png', 'avatar-1.jpg', 'avatar-1.jpg', 'avatar-4.png', 'avatar-5.jpg', 'avatar-6.png',
            'avatar-7.png', 'avatar-8.jpg', 'avatar-9.png', 'avatar-10.png', 'avatar-11.png', 'avatar-12.jpg'];

        return [
            'slug' => $this->faker->unique()->slug(),
            'name' => $this->faker->unique()->name(),
            'avatar_path' => 'images/avatars/' . $this->faker->randomElement($avatarNames),

        ];
    }
}
