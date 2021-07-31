<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'users_has_roles', 'role_id', 'user_id');
    }

    public function Logins(): HasMany
    {
        return $this->hasMany(Login::class);
    }

    public function lastLogin()
    {
        return $this->belongsTo(Login::class);
    }


    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function scopeWithLastLogin($query)
    {
        $query->addSelect([
           'last_login_id' => Login::select('id')
                ->whereColumn('user_id', 'users.id')
                ->latest()
                ->take(1)
        ])->with('lastLogin');
    }
}
