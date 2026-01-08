<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - MAHYRA Aestetic Clinic</title>

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
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl lg:text-5xl font-bold mb-4 text-black">Layanan Perawatan Kami</h1>
                <p class="text-gray-600 text-lg mb-8">Pilih perawatan yang sesuai dengan kebutuhan kecantikan Anda</p>

                <!-- Search Bar -->
                <div class="max-w-md mx-auto">
                    <div class="relative">
                        <input type="text" placeholder="Cari Perawatan....."
                            class="w-full px-4 py-3 pl-12 bg-gray-100 border border-gray-200 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition">
                        <svg class="w-5 h-5 text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach($services as $service)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition">
                        <!-- Service Image -->
                        <div class="relative h-64 bg-gradient-to-br from-pink-100 to-pink-200">
                            <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}"
                                class="w-full h-full object-cover">

                            <!-- Price Tag -->
                            <div
                                class="absolute top-4 right-4 bg-red-700 text-white px-4 py-2 rounded-full text-sm font-bold">
                                {{ $service['price'] }}
                            </div>

                            <!-- Category Badge -->
                            <div
                                class="absolute top-4 left-4 bg-gray-200 bg-opacity-90 text-gray-700 px-3 py-1 rounded-full text-xs font-medium">
                                {{ $service['category'] }}
                            </div>
                        </div>

                        <!-- Service Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3 text-black">{{ $service['title'] }}</h3>
                            <p class="text-gray-600 text-sm mb-4 leading-relaxed">{{ $service['description'] }}</p>

                            <!-- Duration -->
                            <div class="flex items-center gap-2 mb-4 text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm">Durasi : {{ $service['duration'] }}</span>
                            </div>

                            <!-- Reservasi Button -->
                            <a href="{{ route('service.detail', ['id' => $service['id']]) }}"
                                class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-brand-btn-dark text-white rounded-lg font-medium hover:bg-gray-800 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Reservasi
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Show All Services Button -->
            <div class="text-center">
                <button
                    class="px-8 py-3 bg-white border-2 border-gray-300 rounded-lg font-medium text-gray-700 hover:bg-gray-50 transition inline-flex items-center gap-2">
                    <span>Tampilkan Semua Perawatan</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

</body>

</html>