<?php

namespace App\Http\Controllers;

use App\Exports\PenilaianExport;
use App\Http\Requests\PenilaianRequest;
use App\Models\Ekskul\Ekskul;
use App\Models\Pendaftaran;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekskuls = Ekskul::all();
        $members = Pendaftaran::all();

        return view('penilaian.index', compact('ekskuls', 'members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PenilaianRequest $request)
    {
        $data = $request->validated();

        if (empty($data['ekskul'])) {
            return back()->withErrors(['ekskul' => 'Ekskul wajib dipilih'])->withInput();
        }

        Penilaian::create($data);

        return redirect()->route('dashboard')->with('success', 'Berhasil Menambah Penilaian!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ekskul = Ekskul::findOrFail($id);
        $grades = Penilaian::where('ekskul', $ekskul->name)->get(); 

        return view('penilaian.show', compact('ekskul', 'grades'));
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
}
