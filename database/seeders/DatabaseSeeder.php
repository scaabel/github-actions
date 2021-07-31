<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Login;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(100)->create();

        $users = User::cursor();

        foreach ($users as $user) {
            Login::factory()
                ->count(20)
                ->create([
                    'user_id' => $user->id
                ]);

            $posts = Post::factory()
                ->count(100)
                ->create([
                    'user_id' => $user->id
                ]);

            foreach ($posts as $pos) {
                Comment::factory()
                    ->count(50)
                    ->create([
                        'commentable_id' => $pos->id
                    ]);
            }

            Role::factory()
                ->count(6)
                ->create();

            Permission::factory()
                ->count(50)
                ->create();

            $roles = Role::cursor();

            foreach ($roles as $role) {
                DB::table('users_has_roles')
                    ->insert([
                        'user_id' => $user->id,
                        'role_id' => $role->id
                    ]);

                $permissions = Permission::all()->random(20)->first();

                foreach ($permissions as $permission) {
                    DB::table('roles_has_permissions')
                        ->insert([
                            'role_id' => $role->id,
                            'permission_id' => $permissions->id
                        ]);
                }
            }

        }

    }
}
