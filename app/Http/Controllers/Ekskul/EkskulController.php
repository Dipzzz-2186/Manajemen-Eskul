<?php

namespace App\Http\Controllers\Ekskul;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ekskul\EkskulCreateRequest;
use App\Http\Requests\Ekskul\EkskulEditRequest;
use App\Models\Ekskul\Ekskul;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekskuls = Ekskul::orderBy('created_at', 'desc')->get();
        

        return view('ekskul.index', compact('ekskuls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ekskul.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EkskulCreateRequest $request)
    {
        $data = $request->validated();

        $data['featured_image'] = $request->file('featured_image')->store('ekskul', 'public');

        Ekskul::create($data);

        return redirect()->route("ekskul.index")->with("success","Event created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ekskul = Ekskul::findOrFail($id);
        $members = Pendaftaran::where('ekskul', $ekskul->name)->get(); 

        return view('ekskul.show', compact('ekskul', 'members'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ekskul = Ekskul::findOrFail($id);

        return view('ekskul.edit', compact('ekskul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EkskulEditRequest $request, string $id)
    {
        $getEkskul = Ekskul::findOrFail($id);
        
        $oldImage = $getEkskul->featured_image;
        
        $ekskul = $getEkskul->fill($request->validated());

        if ($request->hasFile("featured_image")) {
            $newImagePath = $request->file('featured_image')->store('ekskul', 'public');

            $ekskul->featured_image = $newImagePath;

            Storage::disk('public')->delete($oldImage);
        }

        $ekskul->save();

        return redirect()->route('ekskul.index')->with('success','Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ekskul = Ekskul::findOrFail($id);

        Storage::disk('public')->delete($ekskul->featured_image);

        $ekskul->delete();

        return redirect()->route('ekskul.index')->with('success', 'Berhasil Menghapus Data!');
    }

    public function dashboard () {
        $ekskuls = Ekskul::all();

        return view('dashboard', compact('ekskuls'));
    }
}
