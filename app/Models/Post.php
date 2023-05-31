<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable=[
        'user_id',
        'category_id',
        'title',
        'slug',
        'body',
        'published',
        'published_at'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id');
    }
}
