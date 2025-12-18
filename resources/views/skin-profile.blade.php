<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Kulit - MAHYRA Aestetic Clinic</title>
    
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
        <div class="max-w-4xl mx-auto">
            <!-- Skin Profile Form Card -->
            <div class="bg-white rounded-2xl p-8 shadow-xl">
                <!-- Greeting -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold mb-2 text-black">Hallo {{ $user->name ?? 'User' }}</h1>
                    <p class="text-gray-600 text-lg">Beritahu Kami Tentang Kulit Anda.</p>
                </div>

                <form method="POST" action="{{ route('skin-profile.store') }}" x-data="{ selectedType: '', selectedColor: '', selectedProblems: [] }">
                    @csrf

                    <!-- Section 1: Skin Type -->
                    <div class="mb-10">
                        <div class="flex items-center gap-2 mb-6">
                            <h2 class="text-xl font-bold text-black">Apa Jenis Kulit Anda?</h2>
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                            @php
                                $skinTypes = [
                                    'kering' => ['label' => 'Kering', 'color' => 'bg-amber-800'],
                                    'normal' => ['label' => 'Normal', 'color' => 'bg-amber-300'],
                                    'berminyak' => ['label' => 'Berminyak', 'color' => 'bg-amber-100'],
                                    'kombinasi' => ['label' => 'Kombinasi', 'color' => 'bg-pink-200'],
                                    'berjerawat' => ['label' => 'Berjerawat', 'color' => 'bg-amber-50'],
                                ];
                            @endphp
                            @foreach($skinTypes as $key => $type)
                            <label class="cursor-pointer">
                                <input type="radio" name="skin_type" value="{{ $key }}" x-model="selectedType" class="hidden peer" required>
                                <div class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-xl hover:border-pink-300 peer-checked:border-brand-btn-dark peer-checked:bg-pink-50 transition">
                                    <div class="w-16 h-16 rounded-full {{ $type['color'] }} mb-2"></div>
                                    <span class="text-sm font-medium text-center">{{ $type['label'] }}</span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                        @error('skin_type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Section 2: Skin Color -->
                    <div class="mb-10">
                        <div class="flex items-center gap-2 mb-6">
                            <h2 class="text-xl font-bold text-black">Apa Warna Kulit Anda?</h2>
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            @php
                                $skinColors = [
                                    'terang' => ['label' => 'Terang', 'color' => 'bg-amber-50'],
                                    'sedang' => ['label' => 'Sedang', 'color' => 'bg-amber-200'],
                                    'gelap' => ['label' => 'Gelap', 'color' => 'bg-amber-600'],
                                ];
                            @endphp
                            @foreach($skinColors as $key => $color)
                            <label class="cursor-pointer">
                                <input type="radio" name="skin_color" value="{{ $key }}" x-model="selectedColor" class="hidden peer" required>
                                <div class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-xl hover:border-pink-300 peer-checked:border-brand-btn-dark peer-checked:bg-pink-50 transition">
                                    <div class="w-16 h-16 rounded-full {{ $color['color'] }} mb-2"></div>
                                    <span class="text-sm font-medium text-center">{{ $color['label'] }}</span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                        @error('skin_color')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Section 3: Skin Problems -->
                    <div class="mb-10">
                        <div class="flex items-center gap-2 mb-6">
                            <h2 class="text-xl font-bold text-black">Apa Masalah Kulit Anda?</h2>
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="grid grid-cols-3 md:grid-cols-4 gap-4">
                            @php
                                $skinProblems = [
                                    'bekas_jerawat' => 'Bekas Jerawat',
                                    'komedo' => 'Komedo Hitam/Putih',
                                    'mata_panda' => 'Mata Panda',
                                    'kulit_kusam' => 'Kulit Kusam',
                                    'hiperpigmentasi' => 'Hiperpigmentasi',
                                    'kulit_kasar' => 'Kulit Kasar',
                                    'pori_besar' => 'Pori-pori Besar',
                                    'kulit_sensitif' => 'Kulit Sensitif',
                                    'keriput' => 'Keriput',
                                ];
                            @endphp
                            @foreach($skinProblems as $key => $problem)
                            <label class="cursor-pointer">
                                <input type="checkbox" name="skin_problems[]" value="{{ $key }}" x-model="selectedProblems" class="hidden peer">
                                <div class="flex flex-col items-center p-4 border-2 border-gray-200 rounded-xl hover:border-pink-300 peer-checked:border-brand-btn-dark peer-checked:bg-pink-50 transition">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-br from-pink-100 to-pink-200 mb-2 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-xs font-medium text-center leading-tight">{{ $problem }}</span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                        @error('skin_problems')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8">
                        <button type="submit" class="w-full px-6 py-4 bg-brand-btn-dark text-white rounded-lg font-bold text-lg hover:bg-gray-800 transition">
                            Mulailah Perjalanan Mu!
                        </button>
                    </div>
                </form>

                @if(session('success'))
                    <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

</body>
</html>

