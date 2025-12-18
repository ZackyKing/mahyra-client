<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        // Dummy reviews data
        $reviews = [
            [
                'id' => 1,
                'name' => 'Desca Nabila Putri',
                'rating' => 5,
                'review' => 'Pelayanan sangat profesional dan hasil perawatan sangat memuaskan!',
                'avatar' => asset('img/hero-girl.png'),
            ],
            [
                'id' => 2,
                'name' => 'Putri Sundari',
                'rating' => 5,
                'review' => 'Pelayanan sangat profesional dan hasil perawatan sangat memuaskan!',
                'avatar' => asset('img/hero-girl.png'),
            ],
            [
                'id' => 3,
                'name' => 'Julia Elisa',
                'rating' => 5,
                'review' => 'Mahyra Aestetic Clinic adalah tempat terbaik untuk perawatan kecantikan.',
                'avatar' => asset('img/hero-girl.png'),
            ],
        ];

        return view('reviews', compact('reviews'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'review' => ['required', 'string', 'max:1000'],
        ]);

        // Here you would save the review to the database
        // For now, just redirect back with success message
        
        return redirect()->route('reviews')->with('success', 'Ulasan Anda berhasil dikirim! Terima kasih atas feedback Anda.');
    }
}

