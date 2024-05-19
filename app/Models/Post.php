<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
    ];


    public function owner(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments(): HasMany{
        return $this->hasMany(PostComment::class, 'post_id');
    }
    public function images(): HasMany{
        return $this->hasMany(PostImage::class);
    }
}
