<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultationController extends Controller
{
    public function index()
    {
        // Dummy chat messages
        $messages = [
            [
                'id' => 1,
                'sender' => 'clinic',
                'message' => 'Halo! Selamat datang di MAHYRA Aesthetic Clinic. Ada yang bisa kami bantu?',
                'time' => '10:00',
            ],
            [
                'id' => 2,
                'sender' => 'user',
                'message' => 'Halo, saya ingin konsultasi tentang perawatan wajah',
                'time' => '10:02',
            ],
            [
                'id' => 3,
                'sender' => 'clinic',
                'message' => 'Baik, kami memiliki berbagai layanan perawatan wajah. Bisa ceritakan lebih detail tentang kondisi kulit Anda?',
                'time' => '10:03',
            ],
            [
                'id' => 4,
                'sender' => 'user',
                'message' => 'Kulit saya cenderung berminyak dan ada beberapa bekas jerawat',
                'time' => '10:05',
            ],
        ];

        return view('consultation', compact('messages'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $validated = $request->validate([
            'message' => ['required', 'string', 'max:1000'],
        ]);

        // Here you would save the message to the database
        // For now, just redirect back with success
        
        return redirect()->route('consultation')->with('success', 'Pesan berhasil dikirim!');
    }
}

