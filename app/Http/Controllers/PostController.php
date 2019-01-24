<?php

namespace App\Http\Controllers;

use App\File;
use App\User;
use App\Post;
use App\Label;
use App\Contact;
use Carbon\Carbon;
use App\Filters\PostsFilter;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PostsFilter $filters)
    {
        $posts = Post::latest()->filter($filters)->paginate(25);
        $users = User::select('id', 'first_name')->get();
        $labels = Label::select('id', 'title')->get();
        $minDate = Carbon::parse(Post::latest()->min('created_at'))->toW3cString();
        $maxDate = Carbon::parse(Post::latest()->max('created_at'))->toW3cString();
        return view('posts.index', compact('posts', 'filters', 'users', 'labels', 'minDate', 'maxDate'));
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

        // $post->labels()->sync(array_filter(explode(',', request('labelIDs'))));
        // $post->contacts()->sync(array_filter(explode(',', request('contactIDs'))));
        // $post->files()->sync(array_filter(explode(',', request('fileIDs'))));

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
