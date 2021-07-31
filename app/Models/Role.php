<?php

namespace App\Models;

use Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    protected  $fillable = [
        'name',
        'description',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_has_roles', 'user_id', 'role_id');
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'roles_has_permissions');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return new RoleFactory();
    }
}
