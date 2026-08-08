<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function edit()
    {
        $profil = Profil::current();
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = Profil::current();

        $validated = $request->validate([
            'nama_sekolah'    => 'required|string|max:255',
            'sejarah'         => 'nullable|string',
            'visi'            => 'nullable|string',
            'misi'            => 'nullable|string',
            'gambar_struktur' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar_struktur')) {
            if ($profil->gambar_struktur) {
                Storage::disk('public')->delete($profil->gambar_struktur);
            }
            $validated['gambar_struktur'] = $request->file('gambar_struktur')->store('profil', 'public');
        }

        $profil->update($validated);

        return back()->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}