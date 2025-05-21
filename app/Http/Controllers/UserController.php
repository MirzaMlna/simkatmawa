<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('identity_number', 'like', "%$search%")
                    ->orWhere('name', 'like', "%$search%")
                    ->orWhere('study_program', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%")
                    ->orWhere('role', 'like', "%$search%");
            });
        }

        $users = $query->latest()->paginate(10)->withQueryString();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'identity_number' => 'required|string|max:50|unique:users',
            'study_program' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6',
            'role' => 'required|in:Admin,Mahasiswa',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['is_approved'] = true;

        User::create($validated);
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan.');
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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }

    public function approve($id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'is_approved' => !$user->is_approved,
        ]);
        return redirect()->route('users.index')->with('success', 'Status verifikasi berhasil diperbarui.');
    }
}
