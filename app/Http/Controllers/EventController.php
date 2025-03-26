<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    function tampilHome(){
        return view('home');
    }

    function tampilDashboard(){
        return view('dashboard');
    }
}
