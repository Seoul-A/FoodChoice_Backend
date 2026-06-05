@extends('layouts.app')

@section('content')
<div class="bg-[#F5F5F5] min-h-screen">

    {{-- Hero Section --}}
    <section class="relative">
        <img src="{{ asset('images/banner-food.jpg') }}"
            class="w-full h-[450px] object-cover"
            alt="Food Banner">

        <div class="absolute inset-0 bg-black/40"></div>

        <div class="absolute inset-0 flex items-center">
            <div class="max-w-7xl mx-auto px-6 w-full text-white">
                <div class="max-w-2xl">
                    <h1 class="text-5xl font-bold mb-4">
                        Temukan Makanan Sesuai Selera Kamu
                    </h1>

                    <p class="text-lg text-gray-200 mb-6">
                        Pilih preferensi seperti rasa, bahan dan jenis makanan
                        untuk mendapatkan rekomendasi terbaik untukmu.
                    </p>

                    <a href="{{ url('/preferences') }}"
                        class="bg-[#A52A2A] hover:bg-[#8B1E1E]
                        px-6 py-3 rounded-full text-white shadow-lg">
                        🔍 Mulai pilih preferensi
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Menu Teratas --}}
    <section class="max-w-7xl mx-auto px-6 py-16">

        <h2 class="text-center text-3xl font-bold text-[#8B1E1E] mb-12">
            MENU TERATAS
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

            @foreach ($foods as $food)
            <div class="bg-white rounded-[30px] shadow-md overflow-hidden hover:shadow-xl transition">

                {{-- Gambar --}}
                <div class="h-[280px]">
                    <img src="{{ asset('storage/' . $food->gambar) }}"
                        alt="{{ $food->nama }}"
                        class="w-full h-full object-cover">
                </div>

                {{-- Isi Card --}}
                <div class="p-6">

                    <h3 class="text-3xl font-bold mb-5">
                        {{ $food->nama }}
                    </h3>

                    {{-- Tag --}}
                    <div class="flex flex-wrap gap-3 mb-8">

                        <span class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full">
                            {{ $food->kategori }}
                        </span>

                        <span class="bg-orange-100 text-orange-700 px-4 py-2 rounded-full">
                            {{ $food->jenis }}
                        </span>

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">
                            {{ $food->tekstur }}
                        </span>

                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">
                            {{ $food->rasa }}
                        </span>

                    </div>

                    {{-- Like --}}
                    <div class="flex justify-end items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-10 h-10 text-[#8B1E1E]">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21.435 4.582a5.5 5.5 0 00-7.778
                                0L12 6.239l-1.657-1.657a5.5 5.5
                                0 00-7.778 7.778l1.657
                                1.657L12 21.675l7.778-7.658
                                1.657-1.657a5.5 5.5 0 000-7.778z" />
                        </svg>

                        <span class="text-xl">
                            {{ $food->likes ?? 0 }}
                        </span>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
    </section>

</div>
@endsection