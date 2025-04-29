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

    public function store(Request $request){
    $request->validate([
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:20',
        'namaEvent' => 'required|string|max:255',
        'link' => 'required',
        'deskripsi' => 'required|string',
    ]);

    $nomorAdmin = '6283121450782';
    $pesan = "Halo Admin, saya ingin mengajukan event:\n\n" .
             "Nama: {$request->nama}\n" .
             "Telepon: {$request->telepon}\n" .
             "Nama Event: {$request->namaEvent}\n" .
             "Deskripsi: {$request->deskripsi}\n\n" .
             "Link: {$request->link}\n\n" .
             "Pamflet akan saya kirim setelah ini.";

    $urlWhatsApp = "https://api.whatsapp.com/send?phone=$nomorAdmin&text=" . urlencode($pesan);

    return redirect()->away($urlWhatsApp);
    }
}
