<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function tampilHome(){
        $events = Events::all(); // Ambil semua event dari database
        return view('user.home', compact('events'));
    }

    function tampilSubmission(){
        return view('user.submission');
    }
}
