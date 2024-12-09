<?php

namespace App\Http\Controllers;

use App\Http\Requests\DaftarRequest;
use App\Models\Ekskul\Ekskul;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekskuls = Ekskul::all();

        return view('pendaftaran.index', compact('ekskuls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Jika perlu membuat form input tambahan
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DaftarRequest $request)
    {
        $data = $request->validated();

        // Pastikan data kelas ada
        if (empty($data['kelas'])) {
            return back()->withErrors(['kelas' => 'Kelas wajib dipilih'])->withInput();
        }

        // Simpan data pendaftaran tanpa menyertakan users_id
        Pendaftaran::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Berhasil Mendaftar!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $daftars = Pendaftaran::all();

        return view('pendaftaran.show', compact('daftars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Jika perlu edit data pendaftaran
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Jika perlu update data pendaftaran
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Jika perlu hapus data pendaftaran
    }
}

