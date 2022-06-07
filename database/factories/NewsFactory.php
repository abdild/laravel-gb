<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
		$title = $this->faker->jobTitle();
        return [
            'categories_id' => 3,
			'title' => $title,
			'slug' => Str::slug($title),
			'author' => $this->faker->userName(),
			'image' => $this->faker->imageUrl(),
			'status' => 'ACTIVE',
			'description' => $this->faker->text(100),
			'only_admin' => false
        ];
    }
}
