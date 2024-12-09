<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Mengambil semua data user dari model User
        return view('users.index', compact('users')); // Mengembalikan view dengan data user
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ];
    
        User::create($user); // Menyimpan data user ke database
    
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id); // Mencari user berdasarkan ID
        return view('users.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id); // Mencari user berdasarkan ID
        return view('users.edit', compact('user'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UserEditRequest $request, string $id)
    {
        $user = User::find($id);
        
        $validatedData = $request->validated();
    
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        } else {
            unset($validatedData['password']);
        }
    
        $user->fill($validatedData);
        $user->save();
        
        return redirect()->route('users.index')->with('success','User successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id); // Mencari user berdasarkan ID
    
        if ($user->profile_picture != null) {
            Storage::disk('public')->delete($user->profile_picture); // Menghapus file foto profil jika ada
        }
    
        $user->delete(); // Menghapus user dari database
    
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
