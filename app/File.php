<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'post_id', 'name', 'extension', 'type', 'description', 'data'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
