<?php

namespace App\Http\Controllers;

use App\Contact;
use App\File;
use App\Label;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter_users = collect([]);
        $filter_labels = collect([]);
        $filter_min_date = '';
        $filter_max_date = '';

        $posts = Post::latest();
        $users = User::all();
        $labels = Label::all();

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
            $posts = $posts->where('created_at', '>', $filter_min_date);
        }

        if (request('date_max_filter')) {
            $filter_max_date = request('date_max_filter');
            $posts = $posts->where('created_at', '<', $filter_max_date);
        }

        $posts = $posts->get();

        $date_min = $posts->min('created_at');
        $date_max = $posts->max('created_at');

        return view('posts.index',
            compact('posts', 'users', 'labels', 'date_min', 'date_max', 'filter_users', 'filter_labels',
                'filter_min_date', 'filter_max_date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labels = Label::all();
        $contacts = Contact::all();
        $files = File::all();

        return view('posts.create', compact('labels', 'contacts', 'files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        $post = Post::create([
            'text' => request('text'),
            'title' => request('title'),
            'user_id' => $user_id
        ]);

        $post->labels()->sync(array_filter(explode(',', request('labelIDs'))));
        $post->contacts()->sync(array_filter(explode(',', request('contactIDs'))));
        $post->files()->sync(array_filter(explode(',', request('fileIDs'))));

        return redirect('/posts/' . $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = Auth::user();

        return view('posts.show', compact('post', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $labels = Label::all();
        $contacts = Contact::all();
        $files = File::all();

        return view('posts.edit', compact('post', 'labels', 'contacts', 'files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = request('title');
        $post->text = request('text');
        $post->labels()->sync(array_filter(explode(',', request('labelIDs'))));
        $post->contacts()->sync(array_filter(explode(',', request('contactIDs'))));
        $post->files()->sync(array_filter(explode(',', request('fileIDs'))));
        $post->save();

        return redirect('/posts/' . $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
