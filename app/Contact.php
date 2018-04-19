<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'surname', 'email', 'phonenumber1', 'phonenumber1_description', 'phonenumber2', 'phonenumber2_description'
    ];

    protected $appends = [
        'created_at_formatted'
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function name()
    {
        return $this->first_name . ' ' . $this->surname;
    }

    public function getCreatedAtFormattedAttribute()
    {
        $date = new Carbon($this->attributes['created_at']);
        return $date->timezone(2)->format('H:i d-m-Y');
    }
}
