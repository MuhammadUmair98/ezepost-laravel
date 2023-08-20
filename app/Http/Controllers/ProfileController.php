<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return Inertia::render('profile/Index', [
            'user' => [
                'name' => $user->name,
                'password' => $user->password,
            ],
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        if ($request->has('password') && $request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return Redirect::route('profile.index')->with('success', 'Profile updated successfully.');
    }
}
