<?php

namespace App\Http\Controllers;

use App\Exports\AbsensiExport;
use App\Http\Requests\AbsensiRequest;
use App\Models\Absensi;
use App\Models\Ekskul\Ekskul;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $ekskuls = Ekskul::all();

        return view('absensi.index', compact('ekskuls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AbsensiRequest $request)
    {
        $data = $request->validated();

        Absensi::create($data);

        return redirect()->route('jadwal.index')->with('success', 'Berhasil Melakukan Absensi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ekskul = Ekskul::findOrFail($id);
        $hadirs = Absensi::where('ekskul', $ekskul->name)->get(); 

        return view('absensi.show', compact('ekskul', 'hadirs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function export($ekskul)
    {
        $ekskulName = Ekskul::findOrFail($ekskul)->name; // Ambil nama ekskul dari ID ekskul

        return Excel::download(new AbsensiExport($ekskulName), $ekskulName . '_absensi.xlsx');
    }
}