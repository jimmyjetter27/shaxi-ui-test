<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        /* Hiding scrollbars for WeKit-based browsers*/
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbars but keep scrolling enabled for other engines like the old edge */
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none; }

        /* Utility class to clamp text to 2 lines and hide the rest */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="min-h-screen flex flex-col bg-[#f5f6fb] font-sans text-[#1b1b18] overflow-x-hidden">


@include('layouts.navigation')

<main class="flex-grow mx-auto w-full max-w-7xl px-3 sm:px-4 lg:px-8 py-6 space-y-10">

    {{-- 1. Promoted products row --}}
    <x-home.promoted-row :products="$promoted" />

    {{-- 2. Recently viewed row --}}
    <x-home.recently-viewed-row />

    {{-- 3. All listings with th Load More button --}}
    <x-home.all-listings-row :listings="$listings" />

</main>

@include('layouts.footer')

{{-- Alpine helper functions only for home page --}}
@include('layouts.home-scripts')

</body>
</html>
