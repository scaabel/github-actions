<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Login extends Model
{
    use HasFactory;

    protected $table = 'login';

    protected $fillable = [
        'user_id',
        'login_at'
    ];

    protected $casts = [
        'login_at' => 'datetime:Y-m-d H:i A'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
