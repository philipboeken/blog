<?php

namespace App\Filters;

use App\User;
use App\Post;
use App\Label;
use Carbon\Carbon;
use Jenssegers\Model\Model;
use Illuminate\Support\Facades\Auth;

class PostsFilter extends Model
{
    protected $appends = [
        'users', 'labels', 'date_min', 'date_max'
    ];

    public function getUsersAttribute()
    {
        return ['options' => User::all(), 'value' => []];
    }

    public function getLabelsAttribute()
    {
        return ['options' => Label::all(), 'value' => []];
    }

    public function getDateMinAttribute()
    {
        return [
            'lower' => Carbon::parse(Post::all()->min('created_at'))->toW3cString(),
            'upper' => Carbon::parse(Post::all()->min('created_at'))->toW3cString(),
            'value' => ''
        ];
    }

    public function getDateMaxAttribute()
    {
        return [
            'lower' => Carbon::parse(Post::all()->min('created_at'))->toW3cString(),
            'upper' => Carbon::parse(Post::all()->min('created_at'))->toW3cString(),
            'value' => ''
        ];
    }
}
