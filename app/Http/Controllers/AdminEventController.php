<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    // Tampilkan daftar event di dashboard
    public function index()
    {
        $events = Events::all();
        return view('admin.dashboard', compact('events'));
    }

    // Tampilkan form tambah event
    public function create()
    {
        return view('admin.create');
    }

    // Simpan event baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'pamflet' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'required|max:255',
        ]);

        // Simpan gambar pamflet
        $pamfletPath = $request->file('pamflet')->store('pamflet', 'public');
        // Simpan data ke database
        Events::create([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'pamflet' => $pamfletPath,
            'link' => $request->link
        ]);

        return redirect()->back()->with('success', 'Event berhasil ditambahkan');
    }

    // Tampilkan form edit event
    public function edit($id)
    {
        $event = Events::findOrFail($id);
        return view('admin.edit', compact('event'));
    }

    // Update data event
    public function update(Request $request, $id)
    {
        $event = Events::findOrFail($id);

    $request->validate([
        'nama' => 'required|string|max:255',
        'telepon' => 'required|string|max:15',
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'pamflet' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update data event
    $event->update([
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
    ]);

    // Jika ada file pamflet baru, update juga
    if ($request->hasFile('pamflet')) {
        // Hapus pamflet lama
        if ($event->pamflet) {
            Storage::disk('public')->delete($event->pamflet);
        }

        // Simpan pamflet baru
        $pamfletPath = $request->file('pamflet')->store('pamflet', 'public');
        $event->update(['pamflet' => $pamfletPath]);
    }

    return redirect()->route('admin.dashboard')->with('info', 'Event berhasil diperbarui');
    }

    // Hapus event
    public function destroy($id)
    {
        $event = Events::findOrFail($id);

        if ($event->pamflet) {
            Storage::disk('public')->delete($event->pamflet);
        }

        $event->delete();

        return redirect()->route('admin.dashboard')->with('delete', 'Event berhasil dihapus');
    }

    public function tampilTambah(){
        return view('admin.create');
    }
}

