<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan - MAHYRA Aestetic Clinic</title>
    
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

    <!-- Banner Section -->
    <div class="bg-gradient-to-r from-pink-100 to-pink-50 py-12 mt-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl lg:text-5xl font-bold mb-4 text-black">Berikan Ulasan Anda</h1>
            <p class="text-gray-700 text-lg max-w-3xl mx-auto">
                Ulasan jujur dari Anda membantu kami terus memberikan perawatan terbaik dan pengalaman yang lebih nyaman di setiap kunjungan.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <!-- Left Column: Latest Reviews -->
                <div class="bg-white rounded-2xl p-8 shadow-xl">
                    <h2 class="text-2xl font-bold mb-6 text-black">Masukkan Terbaru</h2>
                    <div class="space-y-6">
                        @foreach($reviews as $review)
                        <div class="flex items-start gap-4 pb-6 border-b border-gray-200 last:border-b-0 last:pb-0">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-200 to-pink-300 overflow-hidden flex-shrink-0">
                                <img src="{{ $review['avatar'] }}" alt="{{ $review['name'] }}" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-800 mb-1">{{ $review['name'] }}</h3>
                                <div class="flex mb-2">
                                    @for($i = 0; $i < $review['rating']; $i++)
                                    <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                    @endfor
                                </div>
                                <p class="text-gray-700 text-sm leading-relaxed">"{{ $review['review'] }}"</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right Column: Add Review Form -->
                <div class="bg-white rounded-2xl p-8 shadow-xl">
                    <h2 class="text-2xl font-bold mb-6 text-black">Tambahkan Ulasan</h2>
                    
                    <form method="POST" action="{{ route('reviews.store') }}" x-data="{ rating: 0, hoverRating: 0 }">
                        @csrf

                        <!-- Rating -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-3">Tambahkan Rating Kepuasan</label>
                            <div class="flex gap-2">
                                @for($i = 1; $i <= 5; $i++)
                                <button 
                                    type="button"
                                    @click="rating = {{ $i }}"
                                    @mouseenter="hoverRating = {{ $i }}"
                                    @mouseleave="hoverRating = 0"
                                    class="focus:outline-none"
                                >
                                    <svg 
                                        class="w-8 h-8 transition-colors"
                                        :class="(hoverRating >= {{ $i }} || rating >= {{ $i }}) ? 'text-yellow-400 fill-current' : 'text-gray-300'"
                                        viewBox="0 0 20 20"
                                    >
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                </button>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" x-model="rating" required>
                            @error('rating')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Name -->
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="{{ old('name', Auth::check() ? Auth::user()->name : '') }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Masukkan Nama Anda...."
                            >
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Masukkan Email Anda...."
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Review Text -->
                        <div class="mb-6">
                            <label for="review" class="block text-sm font-medium text-gray-700 mb-2">Tulis Ulasan Ulasan Anda</label>
                            <textarea 
                                id="review" 
                                name="review" 
                                rows="5"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300 outline-none transition"
                                placeholder="Ceritakan Pengalaman Anda Menggunakan Layanan Kami......"
                            >{{ old('review') }}</textarea>
                            @error('review')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="w-full px-6 py-3 bg-brand-btn-dark text-white rounded-lg font-medium hover:bg-gray-800 transition"
                        >
                            Kirim Ulasan
                        </button>
                    </form>

                    @if(session('success'))
                        <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg text-sm">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

</body>
</html>

