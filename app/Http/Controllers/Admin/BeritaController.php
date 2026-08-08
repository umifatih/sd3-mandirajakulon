<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'ringkasan' => 'nullable|string|max:500',
            'konten'    => 'required|string',
            'status'    => 'required|in:draft,published',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $validated['penulis'] = auth()->user()->name ?? 'Admin';
        $validated['slug'] = Str::slug($validated['judul']) . '-' . Str::random(5);

        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dipublikasikan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'ringkasan' => 'nullable|string|max:500',
            'konten'    => 'required|string',
            'status'    => 'required|in:draft,published',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus.');
    }
}