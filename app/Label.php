<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'color', 'is_mutable'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getCreatedAtAttribute()
    {
        $date = new Carbon($this->attributes['created_at']);
        return $date->toW3cString();
    }

    public function getUpdatedAtAttribute()
    {
        $date = new Carbon($this->attributes['updated_at']);
        return $date->toW3cString();
    }
}
