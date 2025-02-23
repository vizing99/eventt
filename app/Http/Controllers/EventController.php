<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show(Event $event)
    {
        // Tampilkan detail acara
        return view('user.event_detail', compact('event'));
    }
}
