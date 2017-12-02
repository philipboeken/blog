<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'file_id', 'title', 'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasOne(File::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function addComment($body)
    {
        $user_id = Auth::user()->id;
        $this->comments()->create(compact('body', 'user_id'));
    }

//    @TODO: Implement as trait
    public function isMine()
    {
        return Auth::user()->id == $this->user_id;
    }
}
