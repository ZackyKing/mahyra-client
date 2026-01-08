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
                        'brand-pink-light': '#FDE8E8',
                        'brand-dark': '#1F2937',
                        'brand-btn-dark': '#2D3748',
                        'brand-teal': '#2C4A52',
                        'brand-cream': '#FDF5F0',
                    },
                    fontFamily: {
                        'serif': ['"Nobile"', 'sans-serif'],
                        'sans': ['"Nobile"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans text-brand-dark antialiased overflow-x-hidden bg-white">

    @include('partials.navbar')

    <!-- Hero Section with Split Background -->
    <div class="relative min-h-[500px] pt-16">
        <!-- Split Background Container -->
        <div class="absolute inset-0 flex">
            <!-- Left side - Pink/Peach gradient -->
            <div class="w-3/5 bg-gradient-to-b from-[#FDEAE8] via-[#FDF0EE] to-[#FDF5F3]"></div>
            <!-- Right side - Dark Teal -->
            <div class="w-2/5 bg-[#2C4A52]"></div>
        </div>

        <!-- Content -->
        <div class="relative container mx-auto px-6 py-20 lg:py-28">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8 lg:gap-16">
                    <!-- Left Content - Text -->
                    <div class="w-full lg:w-1/2 lg:pr-8">
                        <h2 class="text-sm tracking-[0.4em] text-[#2C4A52] uppercase mb-6 font-bold">Dokter Kami</h2>
                        <h1 class="text-3xl lg:text-4xl font-bold mb-4 text-black">{{ $doctor['name'] }}</h1>
                        <p class="text-gray-600 text-base italic">{{ $doctor['subtitle'] }}</p>
                    </div>

                    <!-- Right Content - Doctor Image -->
                    <div class="w-full lg:w-1/2 flex justify-center lg:justify-end">
                        <div class="w-72 h-[400px] lg:w-80 lg:h-[450px] overflow-hidden shadow-2xl">
                            <img src="{{ asset('img/Dokter.png') }}" alt="{{ $doctor['name'] }}"
                                class="w-full h-full object-cover object-top">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Cards Section -->
    <div class="bg-white py-16">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- PENDIDIKAN Card -->
                    <div class="bg-[#FDF5F0] rounded-lg p-6 shadow-sm border border-gray-100">
                        <h3 class="text-base font-bold mb-6 text-center tracking-[0.2em] text-black uppercase">
                            Pendidikan</h3>
                        <ul class="space-y-4">
                            @foreach($doctor['education'] as $edu)
                                <li class="flex items-start gap-3">
                                    <span class="text-gray-800 mt-0.5 font-bold">•</span>
                                    <span class="text-gray-700 text-sm leading-relaxed">{{ $edu }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- PENGALAMAN Card -->
                    <div class="bg-[#FDF5F0] rounded-lg p-6 shadow-sm border border-gray-100">
                        <h3 class="text-base font-bold mb-6 text-center tracking-[0.2em] text-black uppercase">
                            Pengalaman</h3>
                        <ul class="space-y-4">
                            @foreach($doctor['experience'] as $exp)
                                <li class="flex items-start gap-3">
                                    <span class="text-gray-800 mt-0.5 font-bold">•</span>
                                    <div class="text-sm">
                                        <span class="font-semibold text-gray-800">{{ $exp['position'] }} –
                                            {{ $exp['company'] }}</span>
                                        <span class="text-gray-600"> ({{ $exp['period'] }})</span>
                                        <p class="text-gray-700 mt-1 leading-relaxed">{{ $exp['description'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- PENGHARGAAN Card -->
                    <div class="bg-[#FDF5F0] rounded-lg p-6 shadow-sm border border-gray-100">
                        <h3 class="text-base font-bold mb-6 text-center tracking-[0.2em] text-black uppercase">
                            Penghargaan</h3>
                        <ul class="space-y-4">
                            @foreach($doctor['awards'] as $award)
                                <li class="flex items-start gap-3">
                                    <span class="text-gray-800 mt-0.5 font-bold">•</span>
                                    <span class="text-gray-700 text-sm leading-relaxed">{{ $award }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bar - Dark Teal -->
    <div class="h-20 bg-[#2C4A52]"></div>

</body>

</html>