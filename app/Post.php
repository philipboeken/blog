<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Filters\PostsFilter;

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

    public function isMine()
    {
        return Auth::user()->id == $this->user_id;
    }

    /**
     * Apply all relevant thread filters.
     *
     * @param  Builder       $query
     * @param  ThreadFilters $filters
     * @return Builder
     */
    public function scopeFilter($query, PostsFilter $filters)
    {
        return $filters->apply($query);
    }

    public function getCreatedAtFormattedAttribute()
    {
        $date = new Carbon($this->attributes['created_at']);
        return $date->timezone(2)->format('H:i d-m-Y');
    }

    public function getCreatedAtAttribute()
    {
        $date = new Carbon($this->attributes['created_at']);
        return $date->timezone(2)->toW3cString();
    }

    public function getUpdatedAtAttribute()
    {
        $date = new Carbon($this->attributes['updated_at']);
        return $date->timezone(2)->toW3cString();
    }
}
