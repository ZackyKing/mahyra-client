<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun - MAHYRA Aestetic Clinic</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Nobile:wght@400;500;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'brand-pink': '#FFF0F0',
                        'brand-pink-light': '#FFF5F5',
                        'brand-dark': '#1F2937',
                        'brand-btn-dark': '#2D3748',
                    },
                    fontFamily: {
                        'serif': ['"Nobile"', 'sans-serif'],
                        'sans': ['"Nobile"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(to bottom, #FFF0F0 0%, #FFFFFF 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="font-sans text-brand-dark antialiased overflow-x-hidden">

    @include('partials.navbar')

    <!-- Main Content -->
    <div class="container mx-auto px-6 pt-24 lg:pt-32 pb-20">
        <div class="max-w-3xl mx-auto">
            <!-- Edit Account Card -->
            <div class="bg-white rounded-2xl p-8 shadow-xl">
                <h1 class="text-3xl font-bold text-center mb-8 text-black">Edit Akun</h1>

                <form method="POST" action="{{ route('edit-account.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Profile Picture -->
                    <div class="flex justify-center mb-8">
                        <div class="relative">
                            <div class="w-32 h-32 rounded-full bg-gradient-to-br from-pink-200 to-pink-300 flex items-center justify-center overflow-hidden">
                                @if($user->profile_picture)
                                    <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile" class="w-full h-full object-cover">
                                @elseif($user->name)
                                    <span class="text-4xl font-bold text-white">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                @else
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                @endif
                            </div>
                            <label for="profile_picture" class="absolute bottom-0 right-0 w-10 h-10 bg-red-500 rounded-full flex items-center justify-center cursor-pointer hover:bg-red-600 transition shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <input type="file" id="profile_picture" name="profile_picture" accept="image/*" class="hidden" onchange="this.form.submit()">
                            </label>
                        </div>
                    </div>

                    <!-- Informasi Akun Section -->
                    <div class="mb-8">
                        <h2 class="text-xl font-bold mb-6 text-black">Informasi Akun</h2>
                        
                        <div class="space-y-6">
                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Depan</label>
                                <input 
                                    type="text" 
                                    id="first_name" 
                                    name="first_name" 
                                    value="{{ old('first_name', $user->first_name ?? explode(' ', $user->name)[0] ?? '') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                    placeholder="Masukkan nama depan"
                                >
                                @error('first_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Belakang</label>
                                <input 
                                    type="text" 
                                    id="last_name" 
                                    name="last_name" 
                                    value="{{ old('last_name', $user->last_name ?? (count(explode(' ', $user->name)) > 1 ? implode(' ', array_slice(explode(' ', $user->name), 1)) : '')) }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                    placeholder="Masukkan nama belakang"
                                >
                                @error('last_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email', $user->email) }}"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                    placeholder="Masukkan email"
                                >
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Gender -->
                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                                <select 
                                    id="gender" 
                                    name="gender" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                >
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('gender', $user->gender) === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('gender', $user->gender) === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('gender')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Telpon</label>
                                <input 
                                    type="text" 
                                    id="phone" 
                                    name="phone" 
                                    value="{{ old('phone', $user->phone) }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                    placeholder="Masukkan nomor telepon"
                                >
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Section -->
                    <div class="mb-8">
                        <h2 class="text-xl font-bold mb-6 text-black">Alamat</h2>
                        
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Alamat
                            </label>
                            <textarea 
                                id="address" 
                                name="address" 
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Masukkan alamat lengkap"
                            >{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit" class="px-12 py-3 bg-brand-btn-dark text-white rounded-lg font-medium hover:bg-gray-800 transition">
                            Simpan
                        </button>
                    </div>
                </form>

                @if(session('success'))
                    <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm text-center">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

</body>
</html>

