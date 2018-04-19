<?php

namespace App\Api\V1;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $contact = Contact::create([
            'user_id' => Auth::user()->id,
            'first_name' => request('first_name'),
            'surname' => request('surname'),
            'email' => request('email'),
            'phonenumber1' => request('tel1'),
            'phonenumber1_description' => 'Mobiel',
            'phonenumber2' => request('tel2'),
            'phonenumber2_description' => 'Vast',
        ]);
        $contact->save();
        return $contact;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());
        return $contact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
    }
}
