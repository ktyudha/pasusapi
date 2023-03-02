<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'user_id',
        'category_id',
        'status',
        'body',
        'slug',
        'summary',
        'thumbnail',
    ];

    public function getCreatedAtAttribute()
    {
        return date('d-m-Y H:i', strtotime($this->attributes['created_at']));
    }

    public function getUpdatedAtAttribute()
    {
        return date('d-m-Y H:i', strtotime($this->attributes['updated_at']));
    }

    public function comment()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function like()
    {
        return $this->morphOne(Like::class, 'likeable');
    }

    public function likes() {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
