<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        return view('account', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'gebruikersnaam' => 'required|email',
            'wachtwoord' => 'present|nullable|min:8|regex:/(?=.*\d)(?=.*[A-Z])/',
            'wachtwoord-bevestiging' => 'same:wachtwoord'
        ]);
        $user = Auth::user();

        $user->email = request('gebruikersnaam');

        if (request('password')) {
            $user->password = bcrypt(request('password'));
        }

        $user->save();

        $request->session()->flash('status', 'Oplsaan gelukt!');

        return redirect()->back();
    }
}
