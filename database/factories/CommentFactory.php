<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->sentence,
            'commented_by' => function () {
                return User::factory()->create()->id;
            },
            'commentable_id' => function () {
                return Post::factory()->create()->id;
            },
            'commentable_type' => Post::class
        ];
    }
}
