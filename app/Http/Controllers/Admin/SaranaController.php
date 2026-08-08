<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SaranaController extends Controller
{
    public function index()
    {
        $saranas = Sarana::latest()->paginate(12);
        return view('admin.sarana.index', compact('saranas'));
    }

    public function create()
    {
        return view('admin.sarana.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'ukuran'    => 'nullable|string|max:100',
            'jumlah'    => 'nullable|string|max:100',
            'kondisi'   => 'required|in:Baik,Cukup,Rusak',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('sarana', 'public');
        }

        Sarana::create($validated);

        return redirect()->route('admin.sarana.index')->with('success', 'Data sarana berhasil ditambahkan.');
    }

    public function edit(Sarana $sarana)
    {
        return view('admin.sarana.edit', compact('sarana'));
    }

    public function update(Request $request, Sarana $sarana)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'ukuran'    => 'nullable|string|max:100',
            'jumlah'    => 'nullable|string|max:100',
            'kondisi'   => 'required|in:Baik,Cukup,Rusak',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($sarana->gambar) {
                Storage::disk('public')->delete($sarana->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('sarana', 'public');
        }

        $sarana->update($validated);

        return redirect()->route('admin.sarana.index')->with('success', 'Data sarana berhasil diperbarui.');
    }

    public function destroy(Sarana $sarana)
    {
        if ($sarana->gambar) {
            Storage::disk('public')->delete($sarana->gambar);
        }

        $sarana->delete();

        return back()->with('success', 'Data sarana berhasil dihapus.');
    }
}