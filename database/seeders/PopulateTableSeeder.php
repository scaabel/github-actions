<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\LazyCollection;

class PopulateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(1000)
            ->has(Role::factory()->count(10)->has(Permission::factory()->create(100)))
            ->create();

        $users = User::cursor();

        foreach ($users as $user) {
            Post::factory()
                ->count(100)
                ->for($user)
                ->create();

            $user
                ->posts
                ->each(function ($post) {
                    Comment::factory()
                        ->count(200)
                        ->for($post)
                        ->create();
                });
        }
    }
}
