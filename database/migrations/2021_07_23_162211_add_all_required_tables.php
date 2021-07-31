<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAllRequiredTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id');
            $table->timestamp('login_at');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('description');
            $table->string('module');
            $table->string('sub_module');
            $table->timestamps();
        });

        Schema::create('roles_has_permissions', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('role_id');
            $table->foreignId('permission_id');
            $table->timestamps();
        });

        Schema::create('users_has_roles', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('user_id');
            $table->foreignId('role_id');
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id('id');
            $table->string('comment');
            $table->foreignId('commented_by');
            $table->foreignId('commentable_id');
            $table->string('commentable_type');
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id('id');
            $table->string('description');
            $table->string('name');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('roles_has_permissions');
        Schema::dropIfExists('users_has_roles');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
    }
}
