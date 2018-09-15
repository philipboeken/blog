<?php

namespace App\Filters;

use App\User;
use App\Label;
use Carbon\Carbon;
use Jenssegers\Model\Model;
use Illuminate\Support\Facades\Auth;

class DateFilter extends Model
{    
    public function getMinDateAttribute()
    {
        return Carbon::parse($posts->min('created_at'))->toW3cString();
    }
    
    public function getMaxDateAttribute()
    {
        return Carbon::parse($posts->max('created_at'))->toW3cString();
    }

    public function setValueAttribute($value)
    {
        $this->attributes['value'] = $value;
    }
}
