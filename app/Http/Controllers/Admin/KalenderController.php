<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KalenderAkademik;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index()
    {
        $kalenders = KalenderAkademik::orderBy('tanggal_mulai')->paginate(15);
        return view('admin.kalender.index', compact('kalenders'));
    }

    public function create()
    {
        return view('admin.kalender.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kegiatan'         => 'required|string|max:255',
            'kategori'         => 'required|in:KBM,Ujian,Kegiatan,Libur',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'nullable|date|after_or_equal:tanggal_mulai',
            'keterangan'       => 'nullable|string',
        ]);

        KalenderAkademik::create($validated);

        return redirect()->route('admin.kalender.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(KalenderAkademik $kalender)
    {
        return view('admin.kalender.edit', compact('kalender'));
    }

    public function update(Request $request, KalenderAkademik $kalender)
    {
        $validated = $request->validate([
            'kegiatan'         => 'required|string|max:255',
            'kategori'         => 'required|in:KBM,Ujian,Kegiatan,Libur',
            'tanggal_mulai'    => 'required|date',
            'tanggal_selesai'  => 'nullable|date|after_or_equal:tanggal_mulai',
            'keterangan'       => 'nullable|string',
        ]);

        $kalender->update($validated);

        return redirect()->route('admin.kalender.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(KalenderAkademik $kalender)
    {
        $kalender->delete();
        return back()->with('success', 'Kegiatan berhasil dihapus.');
    }
}