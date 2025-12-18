<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        // Dummy data for doctors list
        $doctors = [
            [
                'id' => 1,
                'name' => 'Dr. Lisa',
                'title' => 'Dokter Estetika',
                'image' => asset('img/doctor.png'),
            ],
        ];

        return view('doctors', compact('doctors'));
    }

    public function show($id)
    {
        // Dummy data for Dr. Lisa
        $doctor = [
            'id' => 1,
            'name' => 'Dr. Lisa',
            'title' => 'Dokter Estetika',
            'image' => asset('img/doctor.png'),
            'profile' => 'Dr. Lisa adalah seorang dokter estetika berpengalaman yang memiliki dedikasi tinggi dalam membantu pasien mencapai penampilan terbaik mereka melalui perawatan yang aman, modern, dan efektif. Dengan latar belakang pendidikan kedokteran dan sertifikasi di bidang estetika medik, Dr. Lisa berkomitmen untuk memberikan pelayanan profesional dengan sentuhan personal bagi setiap pasien.',
            'awards' => [
                'Pelatihan Filler & Botox - Allergan Medical Institute',
                'Laser Aesthetic Certification - SkinPro Academy',
                'Workshop Anti Aging - DermaPro International',
            ],
            'contact' => [
                'phone' => '+62 812-3456-7890',
                'email' => 'dr.lisa@dhaestheticclinic.com',
                'location' => 'Marpoyan, Pekanbaru',
            ],
            'education' => [
                'Dokter Umum - Universitas Indonesia',
                'Sertifikasi Estetika Medik - Lembaga Estetika Indonesia',
                'Pelatihan Advanced Aesthetic & Anti-Aging - DermaPro Academy, Jakarta',
            ],
            'experience' => [
                [
                    'position' => 'Dokter Estetika',
                    'company' => 'DH Aesthetic Clinic',
                    'period' => '2020 - Sekarang',
                    'description' => 'Merancang program perawatan kulit dan kecantikan sesuai kebutuhan pasien. Melakukan prosedur estetika seperti filler, botox, laser, dan perawatan wajah.',
                ],
                [
                    'position' => 'Medical Consultant',
                    'company' => 'Glow Derma Center',
                    'period' => '2018 - 2020',
                    'description' => 'Memberikan konsultasi estetika dan rekomendasi perawatan berbasis hasil analisis kulit pasien.',
                ],
            ],
        ];

        return view('doctor-detail', compact('doctor'));
    }
}

