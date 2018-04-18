<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'note', 'location', 'start', 'end', 'allDay'
    ];

    protected $casts = [
        'allDay' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class);
    }

    public function getStartAttribute()
    {
        $date = new Carbon($this->attributes['start']);
        return $date->toW3cString();
    }

    public function getEndAttribute()
    {
        $date = new Carbon($this->attributes['end']);
        return $date->toW3cString();
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
