<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        $jenis = $request->query('jenis', 'guru'); // tab aktif: guru, siswa, alumni

        $wargas = Warga::where('jenis', $jenis)->latest()->paginate(12)->withQueryString();

        return view('admin.warga.index', compact('wargas', 'jenis'));
    }

    public function create(Request $request)
    {
        $jenis = $request->query('jenis', 'guru');
        return view('admin.warga.create', compact('jenis'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis'         => 'required|in:guru,siswa,alumni',
            'nama'          => 'required|string|max:255',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'keterangan'    => 'nullable|string|max:255',
            'info_tambahan' => 'nullable|string|max:255',
            'deskripsi'     => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('warga', 'public');
        }

        Warga::create($validated);

        return redirect()->route('admin.warga.index', ['jenis' => $validated['jenis']])
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Warga $warga)
    {
        return view('admin.warga.edit', compact('warga'));
    }

    public function update(Request $request, Warga $warga)
    {
        $validated = $request->validate([
            'jenis'         => 'required|in:guru,siswa,alumni',
            'nama'          => 'required|string|max:255',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'keterangan'    => 'nullable|string|max:255',
            'info_tambahan' => 'nullable|string|max:255',
            'deskripsi'     => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($warga->foto) {
                Storage::disk('public')->delete($warga->foto);
            }
            $validated['foto'] = $request->file('foto')->store('warga', 'public');
        }

        $warga->update($validated);

        return redirect()->route('admin.warga.index', ['jenis' => $warga->jenis])
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Warga $warga)
    {
        $jenis = $warga->jenis;

        if ($warga->foto) {
            Storage::disk('public')->delete($warga->foto);
        }

        $warga->delete();

        return redirect()->route('admin.warga.index', ['jenis' => $jenis])
            ->with('success', 'Data berhasil dihapus.');
    }
}