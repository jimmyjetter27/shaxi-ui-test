<section
    class="space-y-4"
    x-data="recentlyViewed()"
    x-init="init()"
>
    <template x-if="items.length">
        <div>
            <h2 class="text-xl font-semibold mb-3">Recently Viewed</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-3 md:gap-4 xl:gap-5">
                <template x-for="item in items" :key="item.slug">
                    <a
                        :href="item.url"
                        class="h-full"
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
                                    :src="item.image"
                                    :alt="item.name"
                                    class="absolute inset-0 w-full h-full object-cover bg-white"
                                >
                            </div>

                            <div class="px-3 py-2.5 space-y-1 bg-white flex-1 flex flex-col">
                                <div class="text-base font-bold text-gray-900">
                                    ₵<span x-text="Number(item.price).toLocaleString('en-US', { maximumFractionDigits: 0 })"></span>
                                </div>

                                <h3
                                    class="text-xs sm:text-sm text-gray-700 leading-tight line-clamp-2 flex-1"
                                    x-text="item.name"
                                ></h3>

                                <div class="flex items-center gap-1 text-[11px] text-gray-500 mt-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         class="h-3 w-3 flex-shrink-0" fill="none"
                                         stroke="currentColor" stroke-width="2"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/>
                                        <circle cx="12" cy="10" r="3"/>
                                    </svg>
                                    <span class="truncate" x-text="item.location ?? 'Greater Accra, Ghana'"></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </template>
            </div>
        </div>
    </template>
</section>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('recentlyViewed', () => ({
            items: [],

            init() {
                const STORAGE_KEY = 'recently_viewed_products';
                try {
                    this.items = JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
                } catch (e) {
                    this.items = [];
                }
            },
        }));
    });
</script>
