<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationHistoryController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Dummy data for reservations
        $reservations = [
            [
                'id' => 1,
                'treatment' => 'Mencerahkan Wajah',
                'date' => '07/11/2025',
                'time' => '10:00',
                'status' => 'Dikonfirmasi',
                'status_color' => 'bg-blue-400',
                'price' => 'Rp 350.000',
                'can_cancel' => true,
            ],
            [
                'id' => 2,
                'treatment' => 'Perawatan Jerawat',
                'date' => '07/11/2025',
                'time' => '11:00',
                'status' => 'Selesai',
                'status_color' => 'bg-green-400',
                'price' => 'Rp 300.000',
                'can_cancel' => false,
            ],
            [
                'id' => 3,
                'treatment' => 'Facial Treatment',
                'date' => '08/11/2025',
                'time' => '14:00',
                'status' => 'Menunggu',
                'status_color' => 'bg-yellow-500',
                'price' => 'Rp 400.000',
                'can_cancel' => true,
            ],
        ];

        return view('reservation-history', compact('reservations'));
    }

    public function cancel($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Here you would cancel the reservation in the database
        // For now, just redirect back with success message
        
        return redirect()->route('reservation-history')->with('success', 'Reservasi berhasil dibatalkan.');
    }
}

