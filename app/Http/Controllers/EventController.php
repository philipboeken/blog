<?php

namespace App\Http\Controllers;

use App\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('agenda.index', compact('events'));
    }
}
