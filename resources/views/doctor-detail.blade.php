<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $doctor['name'] }} - MAHYRA Aestetic Clinic</title>
    
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
        <div class="max-w-6xl mx-auto">
            <!-- Doctor Profile Section -->
            <div class="text-center mb-12">
                <div class="flex justify-center mb-6">
                    <div class="w-48 h-48 rounded-full bg-gradient-to-br from-pink-100 to-pink-200 overflow-hidden border-4 border-white shadow-xl">
                        <img src="{{ $doctor['image'] }}" alt="{{ $doctor['name'] }}" class="w-full h-full object-cover">
                    </div>
                </div>
                <h1 class="text-4xl font-bold mb-2 text-black">{{ $doctor['name'] }}</h1>
                <p class="text-xl text-gray-600">{{ $doctor['title'] }}</p>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white rounded-2xl border-2 border-pink-100 p-8 shadow-xl">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-8">
                        <!-- PROFIL Section -->
                        <div>
                            <h2 class="text-2xl font-bold mb-4 text-black">PROFIL</h2>
                            <p class="text-gray-700 leading-relaxed">{{ $doctor['profile'] }}</p>
                        </div>

                        <!-- PENGHARGAAN Section -->
                        <div>
                            <h2 class="text-2xl font-bold mb-4 text-black">PENGHARGAAN</h2>
                            <ul class="space-y-3">
                                @foreach($doctor['awards'] as $award)
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-gray-400 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ $award }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- KONTAK Section -->
                        <div>
                            <h2 class="text-2xl font-bold mb-4 text-black">KONTAK</h2>
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ $doctor['contact']['phone'] }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ $doctor['contact']['email'] }}</span>
                                </div>
                                <div class="flex items-center gap-3">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ $doctor['contact']['location'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-8">
                        <!-- PENDIDIKAN Section -->
                        <div>
                            <h2 class="text-2xl font-bold mb-4 text-black">PENDIDIKAN</h2>
                            <ul class="space-y-3">
                                @foreach($doctor['education'] as $edu)
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-gray-400 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    <span class="text-gray-700">{{ $edu }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- PENGALAMAN Section -->
                        <div>
                            <h2 class="text-2xl font-bold mb-4 text-black">PENGALAMAN</h2>
                            <div class="space-y-6">
                                @foreach($doctor['experience'] as $exp)
                                <div>
                                    <div class="flex items-start gap-3 mb-2">
                                        <svg class="w-5 h-5 text-gray-400 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <div>
                                            <h3 class="font-bold text-gray-800">{{ $exp['position'] }} - {{ $exp['company'] }}</h3>
                                            <p class="text-sm text-gray-500">{{ $exp['period'] }}</p>
                                        </div>
                                    </div>
                                    <p class="text-gray-700 ml-8 leading-relaxed">{{ $exp['description'] }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

