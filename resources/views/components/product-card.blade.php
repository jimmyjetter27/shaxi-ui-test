@props(['product'])

@php
    $info  = $product['about_product'];
    $price = $info['price'] ?? 0;
@endphp

<div class="h-full">
    <div
        class="rounded-xl bg-white text-slate-900 group relative overflow-hidden
               border border-amber-200 shadow-sm hover:shadow-md transition-all duration-200
               bg-gradient-to-br from-amber-50/50 to-yellow-50/30 h-full flex flex-col"
    >
        <a href="{{ route('listings.show', $info['slug']) }}"
           class="flex-1 flex flex-col">

            {{-- Promoted badge --}}
            <div class="absolute top-2 left-2 z-10">
                <div
                    class="border border-transparent bg-amber-500/90 text-white text-[10px]
                           font-semibold px-2 py-0.5 rounded-md shadow-sm flex items-center gap-1
                           backdrop-blur-sm"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                         class="h-2.5 w-2.5" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"/>
                        <path d="M20 3v4"/>
                        <path d="M22 5h-4"/>
                        <path d="M4 17v2"/>
                        <path d="M5 18H3"/>
                    </svg>
                    Promoted
                </div>
            </div>

            <div
                class="relative aspect-[4/3] overflow-hidden bg-gray-100 rounded-t-lg
                       border-b border-amber-200/50"
            >
                <img
                    src="{{ asset($info['image']) }}"
                    alt="{{ $info['name'] }}"
                    class="absolute inset-0 w-full h-full object-cover bg-white"
                >
            </div>

            {{-- CONTENT (smaller padding & fonts) --}}
            <div
                class="px-3 py-2.5 space-y-1 bg-gradient-to-br from-amber-50/50 to-yellow-50/30
                       flex-1 flex flex-col"
            >
                <div class="text-base font-bold text-gray-900">
                    ₵{{ number_format($price, 0, '.', ',') }}
                </div>

                {{-- Title (2-line clamp with ellipsis) --}}
                <h3
                    class="text-xs sm:text-sm text-gray-700 leading-tight line-clamp-2 flex-1"
                >
                    {{ $info['name'] }}
                </h3>

                {{-- Location --}}
                <div class="flex items-center gap-1 text-[11px] text-gray-500 mt-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                         class="h-3 w-3 flex-shrink-0" fill="none"
                         stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    <span class="truncate">
                        {{ $info['location'] ?? 'Greater Accra, Ghana' }}
                    </span>
                </div>
            </div>
        </a>
    </div>
</div>
