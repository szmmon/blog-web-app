<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostComment extends Model
{
    protected $fillable = [
        'body',
        'post_id'
    ];

    public function blogPost():BelongsTo{
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function commentOwner():BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
    

    use HasFactory;
}
