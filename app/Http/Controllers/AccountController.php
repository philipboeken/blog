<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if (str_contains(collect($request->segments())->last(), 'account')) {
            return view('account.account', compact('user'));
        }
        if (str_contains($request->url(), 'notifications')) {
            return view('account.notifications', compact('user'));
        }
        return view('account.personal', compact('user'));
    }
}
