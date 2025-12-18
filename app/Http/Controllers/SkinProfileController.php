<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkinProfileController extends Controller
{
    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $user = Auth::user();
        return view('skin-profile', compact('user'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'skin_type' => ['required', 'string'],
            'skin_color' => ['required', 'string'],
            'skin_problems' => ['required', 'array'],
            'skin_problems.*' => ['string'],
        ], [
            'skin_problems.required' => 'Pilih setidaknya satu masalah kulit.',
        ]);

        // Here you can save the skin profile data to database
        // For now, we'll just redirect back with success message
        
        return redirect()->route('profile')->with('success', 'Profil kulit Anda berhasil disimpan!');
    }
}

