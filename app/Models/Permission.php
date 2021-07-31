<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'module',
        'sub_module'
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'roles_has_permissions');
    }
}
