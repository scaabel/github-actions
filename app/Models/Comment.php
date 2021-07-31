<?php

namespace App\Models;

use Database\Factories\CommentFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'commented_by',
        'commentable_id',
        'commentable_type'
    ];

    public function posts(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphedByMany(Post::class, 'commentable');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return new CommentFactory();
    }
}
