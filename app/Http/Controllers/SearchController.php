<?php

namespace App\Http\Controllers;

use App\Contact;
use App\File;
use App\Label;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {

        $posts = Post::latest();

        if (request('search')) {
            $search = request('search');
            $posts = $posts->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('text', 'LIKE', '%' . $search . '%');
        }

        $posts = $posts->get();

        return view('search', compact('posts'));
    }
}
