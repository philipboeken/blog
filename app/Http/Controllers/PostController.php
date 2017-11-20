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

        $posts = Post::latest();

        if (request('search')) {
            $search = request('search');
            $posts = $posts->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('text', 'LIKE', '%' . $search . '%');
        }

        if (request('userId')) {
            $userId = request('userId');
            $posts = $posts->where('user_id', $userId);
        }

        if (request('date_min')) {
            $date_min = request('date_min');
            $posts = $posts->where('created_at', '>', $date_min);
        }

        if (request('date_max')) {
            $date_max = request('date_max');
            $posts = $posts->where('created_at', '<', $date_max);
        }

        $posts = $posts->get();

        $users = User::all();
        $labels = Label::all();
        $date_min = $posts->min('created_at');
        $date_max = $posts->max('created_at');

        return view('posts.index', compact('posts', 'users', 'labels', 'date_min', 'date_max'));
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

        if (request('labelId')) {
            $post->labels()->attach(request('labelId'));
        }
        if (request('contactId')) {
            $post->labels()->attach(request('contactId'));
        }
        if (request('fileId')){
            $post->labels()->attach(request('fileId'));
        }

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
        return view('posts.edit', compact('post'));
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
        $post->text = request('text');
        $post->title = request('title');
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
