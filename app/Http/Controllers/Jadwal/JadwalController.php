<?php

namespace App\Http\Controllers\Jadwal;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalCreateRequest;
use App\Http\Requests\JadwalEditRequest;
use App\Models\Ekskul\Ekskul;
use App\Models\Jadwal;
use Illuminate\Http\Request;

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

        // Menambahkan logika untuk menentukan status validasi
        if ($request->has('panggil_pelatih') && $request->panggil_pelatih == '1') {
            $data['status_validasi'] = 'menunggu validasi'; // Memerlukan validasi pelatih
        } else {
            $data['status_validasi'] = 'disetujui'; // Langsung disetujui
        }

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

    public function validasi(string $id)
{
    $jadwal = Jadwal::findOrFail($id);

    // Pastikan status validasi 'belum divalidasi' sebelum menampilkan form
    if ($jadwal->status_validasi === 'sudah divalidasi') {
        return redirect()->route('jadwal.index')->with('error', 'Jadwal sudah divalidasi');
    }

    return view('jadwal.validasi', compact('jadwal'));
}



public function approve($id)
{
    $jadwal = Jadwal::findOrFail($id);
    
    // Pastikan statusnya belum divalidasi
    if ($jadwal->status_validasi === 'sudah divalidasi') {
        return redirect()->route('jadwal.index')->with('error', 'Jadwal sudah divalidasi');
    }
    
    // Update status validasi menjadi 'sudah divalidasi'
    $jadwal->status_validasi = 'sudah divalidasi';
    
    // Menyimpan materi yang diinput oleh pelatih
    $jadwal->materi = request('materi');
    $jadwal->save();

    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil divalidasi');
}


}
