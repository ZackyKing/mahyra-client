<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        // All available treatments
        $treatments = [
            [
                'id' => 1,
                'title' => 'Mencerahkan Wajah',
                'price' => 'Rp 350.000',
                'icon' => 'face',
            ],
            [
                'id' => 2,
                'title' => 'Perawatan Jerawat',
                'price' => 'Rp 300.000',
                'icon' => 'acne',
            ],
            [
                'id' => 3,
                'title' => 'Perawatan Anti Penuaan',
                'price' => 'Rp 500.000',
                'icon' => 'anti-aging',
            ],
            [
                'id' => 4,
                'title' => 'Injeksi Botox',
                'price' => 'Rp 850.000',
                'icon' => 'syringe',
            ],
            [
                'id' => 5,
                'title' => 'Perawatan Filler',
                'price' => 'Rp 950.000',
                'icon' => 'syringe',
            ],
            [
                'id' => 6,
                'title' => 'Pencerah Badan',
                'price' => 'Rp 450.000',
                'icon' => 'body',
            ],
            [
                'id' => 7,
                'title' => 'Masker Wajah',
                'price' => 'Rp 100.000',
                'icon' => 'mask',
            ],
            [
                'id' => 8,
                'title' => 'Perawatan Komedo',
                'price' => 'Rp 100.000',
                'icon' => 'komedo',
            ],
        ];

        // Available time slots
        $timeSlots = ['09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00', '17:00'];

        return view('reservation', compact('treatments', 'timeSlots'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'treatment_id' => ['required', 'integer'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
        ]);

        // Here you would save the reservation to the database
        // For now, just redirect to reservation history with success message
        
        return redirect()->route('reservation-history')->with('success', 'Reservasi berhasil dibuat!');
    }
}

