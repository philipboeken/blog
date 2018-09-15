<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use App\Post;
use App\Label;
use App\Contact;
use App\Filters\PostsFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->with('labels')->with('user')->get();

        $filter = new PostsFilter();

        return view('posts.index', compact('posts', 'filter'));
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
            'body' => request('body'),
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
        $post->body = request('body');
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
