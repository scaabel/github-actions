<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return arraycom
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence,
            'name' => $this->faker->word,
            'user_id' => function () {
                return User::factory()->create()->id;
            }
        ];
    }
}
