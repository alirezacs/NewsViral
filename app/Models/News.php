<?php

namespace App\Models;

use Database\Factories\NewsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'newses';

    protected $fillable = [
        'title',
        'author_id',
        'released',
        'last_update',
        'reading_time',
        'text',
        'is_published'
    ];

    protected static function newFactory()
    {
        return NewsFactory::new();
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
