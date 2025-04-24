<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

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

        // Simpan gambar pamflet ke public/images
        $filename = time().'_'.$request->file('pamflet')->getClientOriginalName();
        $request->file('pamflet')->move(public_path('images'), $filename);
        $pamfletPath = 'images/' . $filename;

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

        // Update data dasar
        $event->update([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // Jika ada file pamflet baru, update juga
        if ($request->hasFile('pamflet')) {
            // Hapus pamflet lama dari public/images
            $oldPamfletPath = public_path($event->pamflet);
            if (file_exists($oldPamfletPath)) {
                unlink($oldPamfletPath);
            }

            // Simpan pamflet baru
            $filename = time().'_'.$request->file('pamflet')->getClientOriginalName();
            $request->file('pamflet')->move(public_path('images'), $filename);
            $pamfletPath = 'images/' . $filename;
            $event->update(['pamflet' => $pamfletPath]);
        }

        return redirect()->route('admin.dashboard')->with('edit', 'Event berhasil diperbarui');
    }

    // Hapus event
    public function destroy($id)
    {
        $event = Events::findOrFail($id);

        // Hapus file pamflet dari public/images jika ada
        if ($event->pamflet) {
            $pamfletPath = public_path($event->pamflet);
            if (file_exists($pamfletPath)) {
                unlink($pamfletPath);
            }
        }

        $event->delete();

        return redirect()->route('admin.dashboard')->with('delete', 'Event berhasil dihapus');
    }

    public function tampilTambah()
    {
        return view('admin.create');
    }
}
