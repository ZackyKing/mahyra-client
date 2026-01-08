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

        // Get treatment details
        $treatments = [
            1 => ['title' => 'Mencerahkan Wajah', 'price' => 'Rp 350.000', 'duration' => '75 Menit'],
            2 => ['title' => 'Perawatan Kulit Jerawat', 'price' => 'Rp 300.000', 'duration' => '60 Menit'],
            3 => ['title' => 'Perawatan Anti Penuaan', 'price' => 'Rp 500.000', 'duration' => '90 Menit'],
            4 => ['title' => 'Injeksi Botox', 'price' => 'Rp 850.000', 'duration' => '45 Menit'],
            5 => ['title' => 'Perawatan Filler', 'price' => 'Rp 950.000', 'duration' => '60 Menit'],
            6 => ['title' => 'Pencerahan Badan', 'price' => 'Rp 450.000', 'duration' => '120 Menit'],
        ];

        $treatmentId = (int) $validated['treatment_id'];
        $treatment = $treatments[$treatmentId] ?? ['title' => 'Perawatan', 'price' => 'Rp 0', 'duration' => '0 Menit'];

        // Store reservation data in session for success page
        session([
            'reservation' => [
                'treatment' => $treatment['title'],
                'price' => $treatment['price'],
                'duration' => $treatment['duration'],
                'date' => $validated['date'],
                'time' => $validated['time'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
            ]
        ]);

        // Here you would also save the reservation to the database

        return redirect()->route('reservasi.success');
    }

    public function success()
    {
        if (!session('reservation')) {
            return redirect()->route('services');
        }

        return view('reservation-success');
    }
}

