<section
    class="space-y-4"
    x-data="{
        perPage: 14,
        visible: 14,
        total: {{ count($listings) }},
        loading: false,
        loadMore() {
            if (this.visible >= this.total) return;

            this.loading = true;
            setTimeout(() => {
                this.visible = Math.min(this.visible + this.perPage, this.total);
                this.loading = false;
            }, 400);
        }
    }"
>
    <h2 class="text-xl font-semibold">All Listings</h2>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-3 md:gap-4 xl:gap-5">
        @forelse ($listings as $product)
            @php
                if (!isset($product['about_product'])) {
                    continue;
                }

                $info = $product['about_product'];
                $price = $info['price'] ?? 0;
            @endphp

            {{-- only show if index < visible --}}
            <a
                href="{{ route('listings.show', $info['slug']) }}"
                class="h-full"
                x-show="{{ $loop->index }} < visible"
                x-transition.opacity.duration.200ms
            >
                <div
                    class="rounded-xl bg-white text-slate-900 relative overflow-hidden
                           border border-gray-200 shadow-sm hover:shadow-md transition-all duration-200
                           h-full flex flex-col"
                >
                    <div
                        class="relative aspect-[4/3] overflow-hidden bg-gray-100 rounded-t-lg
                               border-b border-gray-100"
                    >
                        <img
                            src="{{ asset($info['image']) }}"
                            alt="{{ $info['name'] }}"
                            class="absolute inset-0 w-full h-full object-cover bg-white"
                        >
                    </div>

                    <div class="px-3 py-2.5 space-y-1 bg-white flex-1 flex flex-col">
                        <div class="text-base font-bold text-gray-900">
                            ₵{{ number_format($price, 0, '.', ',') }}
                        </div>

                        <h3 class="text-xs sm:text-sm text-gray-700 leading-tight line-clamp-2 flex-1">
                            {{ $info['name'] }}
                        </h3>

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
                </div>
            </a>
        @empty
            <p class="text-sm text-gray-500 col-span-full">
                No listings found.
            </p>
        @endforelse
    </div>

    {{-- optional skeletons while loading --}}
    <div
        class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-3 md:gap-4 xl:gap-5"
        x-show="loading"
    >
        <template x-for="n in perPage" :key="n">
            <div class="rounded-xl bg-white border border-gray-200 shadow-sm animate-pulse flex flex-col">
                <div class="aspect-[4/3] bg-gray-200 rounded-t-lg"></div>
                <div class="px-3 py-2.5 space-y-2">
                    <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                    <div class="h-3 bg-gray-100 rounded w-full"></div>
                    <div class="h-3 bg-gray-100 rounded w-2/3"></div>
                </div>
            </div>
        </template>
    </div>

    {{-- Load more button – purely JS, no reload --}}
    <div class="flex justify-center mt-6" x-show="visible < total">
        <button
            type="button"
            @click="loadMore"
            class="px-6 py-2.5 rounded-full bg-[#2557D6] text-white text-sm font-semibold
                   shadow-sm hover:bg-[#1f4ac0] transition flex items-center gap-2"
        >
            <span x-show="!loading">Load More</span>
            <span x-show="loading">Loading…</span>
        </button>
    </div>
</section>
