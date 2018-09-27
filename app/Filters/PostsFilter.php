<?php

namespace App\Filters;

use Carbon\Carbon;

class PostsFilter extends Filters
{
    /**
       * Registered filters to operate upon.
       *
       * @var array
       */
    protected $filters = ['from', 'by',  'till', 'labeled'];

    /**
     * Filter the query by a given username.
     *
     * @param  string $username
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function by($users)
    {
        if ($users) {
            return $this->builder->whereIn('user_id', $users);
        }
        return $this->builder;
    }

    protected function labeled($labels)
    {
        if ($labels) {
            return $this->builder->whereHas('labels', function ($label) use ($labels) {
                $label->whereIn('label_id', $labels);
            });
        }
        return $this->builder;
    }

    protected function from($date)
    {
        return $this->builder->where('created_at', '>=', Carbon::parse($date));
    }

    protected function till($date)
    {
        return $this->builder->where('created_at', '<=', Carbon::parse($date));
    }
}
