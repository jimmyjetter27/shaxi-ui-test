<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>{{ $product['about_product']['name'] }} • {{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net"/>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @endif

    <style>
        /* Hide scrollbars for WebKit-based browsers (Chrome, Safari, Edge) */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbars but keep scrolling enabled (non-WebKit browsers) */
        .scrollbar-hide {
            -ms-overflow-style: none; /* IE and old Edge */
            scrollbar-width: none; /* Firefox */
        }

        /* Clamp text to 2 lines (used for shorter titles / snippets) */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Clamp text to 3 lines (used for longer descriptions) */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="min-h-screen flex flex-col bg-[#f5f6fb] font-sans text-[#1b1b18] overflow-x-hidden">
@include('layouts.navigation') @php $info = $product['about_product']; $seller = $product['seller_information']
        ?? [];
@endphp

<main class="flex-1">
    <div class="min-h-screen bg-gray-50">
        <div class="container mx-auto px-4 py-6">
            @php
                $info = $product['about_product'];
                $seller = $product['seller_information'] ?? [];
            @endphp

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                {{-- LEFT SECTION: Image + thumbnails --}}
                <div>
                    {{-- Main Image Container --}}
                    <div class="relative bg-white rounded-xl shadow overflow-hidden mx-auto w-full max-w-[550px] sm:max-w-[600px] md:max-w-[650px] lg:max-w-[720px]">
                        {{-- Aspect-ratio box so the image scales nicely on all screens --}}
                        <div class="w-full aspect-[4/3]">
                            <img
                                    src="{{ asset($info['image']) }}"
                                    class="w-full h-full object-cover"
                            />
                        </div>

                        {{-- Prev arrow --}}
                        <button
                                class="absolute left-3 top-1/2 -translate-y-1/2 h-10 w-10 flex items-center justify-center
               bg-gray-100/90 rounded-full shadow hover:bg-gray-200"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5">
                                <path
                                        fill-rule="evenodd"
                                        d="M12.79 4.21a.75.75 0 0 1 0 1.06L9.06 9l3.73 3.73a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0z"
                                />
                            </svg>
                        </button>

                        {{-- Next arrow --}}
                        <button
                                class="absolute right-3 top-1/2 -translate-y-1/2 h-10 w-10 flex items-center justify-center
               bg-gray-100/90 rounded-full shadow hover:bg-gray-200"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5">
                                <path
                                        fill-rule="evenodd"
                                        d="M7.21 4.21a.75.75 0 0 0 0 1.06L10.94 9l-3.73 3.73a.75.75 0 1 0 1.06 1.06l4.25-4.25a.75.75 0 0 0 0-1.06L8.27 4.21a.75.75 0 0 0-1.06 0z"
                                />
                            </svg>
                        </button>
                    </div>


                    {{-- Thumbnail Row --}}
                    <div class="grid grid-cols-4 gap-3 mt-4">
                        @foreach ([$info['image'], $info['image'], $info['image'], $info['image']] as $i =>
                        $thumb)
                            <button
                                    class="rounded-lg overflow-hidden border
                    {{ $i === 0 ? 'border-blue-500 ring-2 ring-blue-500' : 'border-gray-200 hover:border-blue-400' }}"
                            >
                                <img src="{{ asset($thumb) }}" class="w-full h-20 object-cover"/>
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- RIGHT SECTION: Product Info Card --}}
                <div
                        class="bg-white rounded-3xl shadow-sm border border-gray-200 p-8 w-full max-w-lg space-y-6"
                >
                    {{-- Title --}}
                    <h1 class="text-2xl font-semibold leading-snug">{{ $info['name'] }}</h1>

                    {{-- Price --}}
                    <p class="text-3xl font-bold text-emerald-600">
                        GH₵ {{ number_format($info['price'], 0) }}
                    </p>

                    {{-- Category icons --}}
                    <div class="flex items-center gap-6 text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                                    <span
                                            class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-gray-100"
                                    >
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                    d="M10.6 2.2a1 1 0 0 0-.8 0L4.4 4.7A1 1 0 0 0 4 5.6v8.8a1 1 0 0 0 .6.9l5.4 2.4a1 1 0 0 0 .8 0l5.4-2.4a1 1 0 0 0 .6-.9V5.6a1 1 0 0 0-.6-.9l-5.4-2.5z"
                                            />
                                        </svg>
                                    </span>
                            <span>Property</span>
                        </div>

                        <div class="flex items-center gap-2">
                                    <span
                                            class="inline-flex h-7 w-7 items-center justify-center rounded-full bg-gray-100"
                                    >
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                    d="M17.45 10.12 10.9 3.57A2 2 0 0 0 9.48 3H4a1 1 0 0 0-1 1v5.48a2 2 0 0 0 .59 1.42l6.55 6.55a2 2 0 0 0 2.83 0l4.48-4.48a2 2 0 0 0 0-2.85zM6.75 7.25a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5z"
                                            />
                                        </svg>
                                    </span>
                            <span>Houses & Apartments</span>
                        </div>
                    </div>

                    {{-- Badge --}}
                    <span
                            class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700"
                    >
                                Brand New
                            </span>

                    {{-- Meta info --}}
                    <div class="space-y-1 text-sm text-gray-700">
                        <p>
                            <span class="font-medium text-gray-900">Posted:</span> {{ $info['posted'] }} in {{
                                    $info['location'] }}
                        </p>
                        <p>
                            <span class="font-medium text-gray-900">Condition:</span>
                            <b>{{ $info['condition'] }}</b>
                        </p>
                        <p><span class="font-medium text-gray-900">Property -</span> {{ $info['category'] }}</p>
                    </div>

                    {{-- CALL BUTTON – fixed to OLX style --}}
                    <button
                            class="w-full h-12 rounded-full bg-blue-500 hover:bg-[#1f4ac0] text-white font-semibold flex items-center justify-center gap-2 shadow-sm transition"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-phone h-4 w-4 mr-2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        Call for details
                    </button>

                    {{-- CHAT BUTTON --}}
                    <button
                            class="w-full h-12 rounded-full border border-[#2557D6] text-[#2557D6] font-semibold flex items-center justify-center gap-2 bg-white hover:bg-blue-50 transition"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-message-circle h-4 w-4 mr-2">
                            <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
                        </svg>
                        Chat
                    </button>

                    {{-- App badges --}}
                    <div class="rounded-2xl bg-gray-50 p-4">
                        <p class="text-sm font-medium text-gray-900 mb-3">Chat securely on the app</p>

                        <div class="flex items-center gap-2">
                            <img src="{{ asset('images/playstore.webp') }}" class="h-10"/>
                            <img src="{{ asset('images/appstore.webp') }}" class="h-10"/>
                            <img src="{{ asset('images/qrcode.svg') }}" class="h-14"/>
                        </div>
                    </div>
                </div>
            </div>

            {{-- BELOW MAIN GRID: About Product + Seller Information --}}
            <div class="mt-10 grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- ABOUT PRODUCT CARD --}}
                <section class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6 lg:p-8 space-y-6">
                    {{-- Header --}}
                    <div class="flex items-center gap-3">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-gray-700">
                {{-- cube icon --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-package h-5 w-5"><path d="m7.5 4.27 9 5.15"></path><path
                            d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"></path><path
                            d="m3.3 7 8.7 5 8.7-5"></path><path d="M12 22V12"></path></svg>
            </span>
                        <h2 class="text-base font-semibold text-gray-900">
                            About Product
                        </h2>
                    </div>

                    {{-- Grid info --}}
                    <div class="grid grid-cols-2 gap-y-4 text-sm">
                        <div>
                            <p class="font-semibold text-gray-800">Condition</p>
                            <p class="text-gray-700">{{ $info['condition'] ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Category</p>
                            <p class="text-gray-700">{{ $info['category'] ?? '—' }}</p>
                        </div>

                        <div>
                            <p class="font-semibold text-gray-800">Posted</p>
                            <p class="text-gray-700">{{ $info['posted'] ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Price</p>
                            <p class="text-gray-700">GH₵ {{ number_format($info['price'] ?? 0, 0) }}</p>
                        </div>

                        <div class="col-span-2">
                            <p class="font-semibold text-gray-800">Location</p>
                            <p class="text-gray-700">{{ $info['location'] ?? '—' }}</p>
                        </div>
                    </div>

                    <div class="border-t border-gray-200"></div>

                    {{-- Description --}}
                    <div x-data="{ expanded: false }" class="space-y-2 text-sm">
                        <p
                                class="text-gray-700 leading-relaxed"
                                :class="expanded ? '' : 'line-clamp-3'"
                        >
                            {{ $info['description'] ?? '' }}
                        </p>

                        <button
                                type="button"
                                class="text-sm font-medium text-[#2557D6] hover:underline"
                                @click="expanded = !expanded"
                                x-text="expanded ? 'Show less' : 'Show more'"
                        ></button>
                    </div>

                </section>

                {{-- SELLER INFORMATION CARD --}}
                <section class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6 lg:p-8 space-y-6">
                    {{-- Header --}}
                    <div class="flex items-center gap-3">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-gray-700">
                {{-- store icon --}}
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-store h-4 w-4 mr-2"><path
                           d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"></path><path
                           d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path><path
                           d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"></path><path d="M2 7h20"></path><path
                           d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"></path></svg>
            </span>
                        <h2 class="text-base font-semibold text-gray-900">
                            Seller Information
                        </h2>
                    </div>

                    {{-- Seller header --}}
                    <div class="flex items-center gap-4">
                        {{-- Avatar placeholder --}}
                        <div class="h-12 w-12 rounded-full bg-gray-200 overflow-hidden">

                        </div>

                        <div class="space-y-0.5 text-sm">
                            <p class="font-semibold text-gray-900">
                                {{ $seller['name'] ?? 'Seller' }}
                            </p>
                            <p class="text-gray-500 text-xs">
                                Joined 1 month ago
                            </p>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm text-gray-700">
                        <div>
                            <p class="font-semibold text-gray-900">Location</p>
                            <p class="text-gray-700 whitespace-pre-line">
                                {{ $seller['location'] ?? ($info['location'] ?? '—') }}
                            </p>
                        </div>

                        <div>
                            <p class="font-semibold text-gray-900">About Store</p>
                            <p class="text-gray-700 leading-relaxed">
                                {{ $seller['about_store'] ?? 'No store information provided yet.' }}
                            </p>
                        </div>
                    </div>

                    <div class="border-t border-gray-200"></div>

                    {{-- View store button --}}
                    <div class="pt-1">
                        <button
                                type="button"
                                class="w-full h-11 rounded-full border border-gray-300 bg-white text-gray-800 text-sm font-medium flex items-center justify-center gap-2 hover:bg-gray-50 transition"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-store h-4 w-4 mr-2">
                                <path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"></path>
                                <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                <path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"></path>
                                <path d="M2 7h20"></path>
                                <path d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"></path>
                            </svg>
                            View Store
                        </button>
                    </div>
                </section>

            </div>


            {{-- SIMILAR LISTINGS --}}
            <section class="mt-14">
                <h2 class="text-2xl font-semibold mb-6">Similar Listings</h2>

                <div class="flex gap-5 overflow-x-auto scrollbar-hide pb-2">

                    @foreach ($similar as $item)
                        @php
                            $data = $item['about_product'];
                        @endphp

                        <a href="{{ route('listings.show', $data['slug']) }}"
                           class="min-w-[220px] max-w-[220px] bg-white rounded-2xl shadow-sm border border-gray-200 hover:shadow-md transition p-3 flex flex-col">

                            {{-- Image --}}
                            <div class="w-full h-[140px] rounded-xl overflow-hidden bg-gray-50">
                                <img src="{{ asset($data['image']) }}"
                                     class="w-full h-full object-cover">
                            </div>

                            {{-- Price --}}
                            <p class="mt-3 font-semibold text-gray-900 text-lg">
                                GH₵ {{ number_format($data['price'], 0) }}
                            </p>

                            {{-- Title --}}
                            <p class="text-sm font-medium text-gray-800 line-clamp-2">
                                {{ $data['name'] }}
                            </p>

                            {{-- Location --}}
                            <p class="mt-auto flex items-center gap-1 text-xs text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M10 2a6 6 0 0 0-6 6c0 4 6 10 6 10s6-6 6-10a6 6 0 0 0-6-6zm0 8.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z"
                                          clip-rule="evenodd"/>
                                </svg>
                                {{ $data['location'] ?? 'Greater Accra' }},
                            </p>
                        </a>
                    @endforeach

                </div>
            </section>


        </div>
    </div>
</main>
@include('layouts.footer')
<script>
    // Run this script only after the whole page has finished loading
    document.addEventListener('DOMContentLoaded', () => {

        // Prepare the current product data (passed from Laravel into JavaScript)
        // json_encode converts PHP data into JS, and asset()/route() generate URLs
        const product = {!! json_encode([
            'slug' => $info['slug'],
            'name' => $info['name'],
            'price' => $info['price'],
            'image' => asset($info['image']),
            'location' => $info['location'],
            'url' => route('listings.show', $info['slug']), // URL to the product details page
        ]) !!};

        // Key used to store and retrieve data from localStorage
        const STORAGE_KEY = 'recently_viewed_products';

        let items = [];

        // Safely read from localStorage because JSON.parse can fail if data is corrupted
        try {
            items = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
        } catch (e) {
            // If anything goes wrong, reset to an empty array
            items = [];
        }

        // Remove the product if it already exists in the list
        // This prevents duplicates when a user revisits the same product
        items = items.filter(p => p.slug !== product.slug);

        // Add the current product to the front of the list (most recent first)
        items.unshift(product);

        // Keep only the latest 10 items to avoid unlimited growth in localStorage
        if (items.length > 10) {
            items = items.slice(0, 10);
        }

        // Save the updated list back into localStorage as a JSON string
        localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
    });
</script>
</body>
</html>
