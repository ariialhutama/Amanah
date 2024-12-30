<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // $users = User::all();
        $users = DB::table('users')
            ->where('name', 'like', '%' . $request->search . '%')
            ->paginate(5);
        return view('pages.user.index', [
            'users' => $users,
            // 'type_menu' => 'user'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
            'phone' => 'required',
        ]);
        DB::beginTransaction();
        $newValidated = User::create($validated);
        DB::commit();
        return redirect()->route('user.index')->with(key: 'added', value: true);
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
    public function edit(User $user)
    {
        return view('pages.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
            'phone' => 'required',
        ]);
        DB::beginTransaction();
        $user->update($validated);
        DB::commit();
        return redirect()->route('user.index')->with(key: 'added', value: true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // try {
        //     $users->delete();
        //     return redirect()->back();
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     $error = ValidationException::withMessages([
        //         'system_error' => ['System error!', $e->getMessage()],
        //     ]);
        //     throw $error;
        // }

        $user->delete();
        return redirect()->back();
    }
}
