<?php

namespace App\Api\V1;

use Illuminate\Http\Request;
use App\Exceptions\VraagDoesNotExistException;

class PostController extends Controllerr
{
    public function index(Request $request)
    {
        $filter_users = collect([]);
        $filter_labels = collect([]);
        $filter_min_date = '';
        $filter_max_date = '';

        $posts = Post::latest();
        $users = User::all();
        $labels = Label::all();

        $date_min = Carbon::parse($posts->min('created_at'))->toW3cString();;
        $date_max = Carbon::parse($posts->max('created_at'))->toW3cString();;

        if (request('filter_users')) {
            $filter_users = $users->whereIn('id', explode(',', request('filter_users')));
            $posts = $posts->whereIn('user_id', $filter_users->map(function ($user) {
                return $user->id;
            }));
        }

        if (request('filter_labels')) {
            $filter_labels = $labels->whereIn('id', explode(',', request('filter_labels')));
            $posts = $posts->whereHas('labels', function ($label) use ($filter_labels) {
                $label->whereIn('label_id', $filter_labels->map(function ($label) {
                    return $label->id;
                }));
            });
        }

        if (request('filter_min_date')) {
            $filter_min_date = request('filter_min_date');
            $posts = $posts->where('created_at', '>', Carbon::parse($filter_min_date));
        }

        if (request('filter_max_date')) {
            $filter_max_date = request('filter_max_date');
            $posts = $posts->where('created_at', '<',  Carbon::parse($filter_max_date));
        }

        $posts = $posts->get();
        
        return view(
            'posts.index',
            compact(
                'posts',
                'users',
                'labels',
                'date_min',
                'date_max',
                'filter_users',
                'filter_labels',
                'filter_min_date',
                'filter_max_date'
            )
        );
    }
}