<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'filename'
    ];
    protected $appends = ['src'];

    public function getSrcAttribute()
    {
        return asset("storage/{$this->filename}");
    }

    public function blogPost(): BelongsTo{
        return $this->belongsTo(Post::class);
    }

}
