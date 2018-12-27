<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function labels()
    {
        return $this->hasMany(Label::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function name()
    {
        return $this->first_name . ' ' . $this->surname;
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
