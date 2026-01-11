<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditAccountController extends Controller
{
    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        return view('edit-account', compact('user'));
    }

    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:pengguna,email,' . $user->id],
            'gender' => ['nullable', 'in:Laki-laki,Perempuan'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:500'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'skin_type' => ['nullable', 'string', 'in:kering,normal,berminyak,kombinasi,berjerawat'],
            'skin_color' => ['nullable', 'string', 'in:terang,sedang,gelap'],
            'skin_problem' => ['nullable', 'string', 'in:bekas_jerawat,komedo,mata_panda,kulit_kusam,hiperpigmentasi,kulit_kasar,pori_besar,kulit_sensitif,keriput'],
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->foto_profil) {
                Storage::disk('public')->delete($user->foto_profil);
            }

            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
            $user->foto_profil = $path;
        }

        // Map fields to Indonesian column names
        if (isset($validated['first_name'])) {
            $user->nama_depan = $validated['first_name'];
        }
        if (isset($validated['last_name'])) {
            $user->nama_belakang = $validated['last_name'];
        }
        if (isset($validated['email'])) {
            $user->email = $validated['email'];
        }
        if (isset($validated['gender'])) {
            $user->jenis_kelamin = $validated['gender'];
        }
        if (isset($validated['phone'])) {
            $user->telepon = $validated['phone'];
        }
        if (isset($validated['address'])) {
            $user->alamat = $validated['address'];
        }

        // Update skin profile
        if (isset($validated['skin_type'])) {
            $user->jenis_kulit = $validated['skin_type'];
        }
        if (isset($validated['skin_color'])) {
            $user->warna_kulit = $validated['skin_color'];
        }
        if (isset($validated['skin_problem'])) {
            $user->masalah_kulit = $validated['skin_problem'];
        }

        // Update name if first_name or last_name is provided
        if (isset($validated['first_name']) || isset($validated['last_name'])) {
            $user->nama = trim(($validated['first_name'] ?? $user->nama_depan ?? '') . ' ' . ($validated['last_name'] ?? $user->nama_belakang ?? ''));
        }

        $user->save();

        return redirect()->route('edit-account')->with('success', 'Akun berhasil diperbarui!');
    }
}


