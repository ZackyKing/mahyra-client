<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Dummy data for services
        $services = [
            [
                'id' => 1,
                'title' => 'Mencerahkan Wajah',
                'category' => 'Wajah',
                'description' => 'Perawatan untuk mencerahkan kulit wajah dan mengurangi noda hitam',
                'price' => 'Rp 350.000',
                'duration' => '75 menit',
                'image' => asset('img/service-face.png'), // You can replace with actual images
            ],
            [
                'id' => 2,
                'title' => 'Perawatan Kulit Jerawat',
                'category' => 'Wajah',
                'description' => 'Perawatan jerawat dengan teknologi terkini untuk kulit bersih dan sehat',
                'price' => 'Rp 300.000',
                'duration' => '60 menit',
                'image' => asset('img/service-face.png'),
            ],
            [
                'id' => 3,
                'title' => 'Perawatan Anti Penuaan',
                'category' => 'Peremajaan wajah',
                'description' => 'Perawatan Anti Penuaan untuk kulit tampak lebih muda dan kencang',
                'price' => 'Rp 500.000',
                'duration' => '90 menit',
                'image' => asset('img/service-face.png'),
            ],
            [
                'id' => 4,
                'title' => 'Injeksi Botox',
                'category' => 'Injeksi',
                'description' => 'Injeksi botox untuk mengurangi kerutan dan garis halus wajah',
                'price' => 'Rp 850.000',
                'duration' => '45 menit',
                'image' => asset('img/service-face.png'),
            ],
            [
                'id' => 5,
                'title' => 'Perawatan Filler',
                'category' => 'Injeksi',
                'description' => 'Perawatan filler untuk meningkatkan volume dan kontur wajah',
                'price' => 'Rp 950.000',
                'duration' => '60 menit',
                'image' => asset('img/service-face.png'),
            ],
            [
                'id' => 6,
                'title' => 'Pencerahan Badan',
                'category' => 'Badan',
                'description' => 'Perawatan pencerah badan untuk kulit lebih cerah merata',
                'price' => 'Rp 450.000',
                'duration' => '120 menit',
                'image' => asset('img/service-face.png'),
            ],
        ];

        return view('services', compact('services'));
    }
}

