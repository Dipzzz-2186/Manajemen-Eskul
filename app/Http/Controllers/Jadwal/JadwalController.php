<?php

namespace App\Http\Controllers\Jadwal;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalCreateRequest;
use App\Http\Requests\JadwalEditRequest;
use App\Models\Ekskul\Ekskul;
use App\Models\Jadwal;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwals = Jadwal::all();

        return view('jadwal.index', compact('jadwals'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ekskuls = Ekskul::all();

        return view('jadwal.create', compact('ekskuls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JadwalCreateRequest $request)
    {
        $data = $request->validated();

        Jadwal::create($data);

        return redirect()->route('jadwal.index')->with('success', 'Berhasil Membuat Jadwal!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        return view('jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JadwalEditRequest $request, string $id)
    {
        $getJadwal = Jadwal::findOrFail($id);

        $jadwal = $getJadwal->fill($request->validated());

        $jadwal->save();

        return redirect()->route('jadwal.index')->with('success', 'Berhasil Mengubah Jadwal!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Berhasil Menghapus Jadwal!');
    }
}
