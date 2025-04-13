<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function tampilHome(Request $request){
    $query = Events::query();

    if ($request->has('search') && $request->search != '') {
        $query->where('judul', 'like', '%' . $request->search . '%')
              ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
    }

    $events = $query->get();

    return view('user.home', compact('events'));
    }

    function tampilSubmission(){
        return view('user.submission');
    }
}
