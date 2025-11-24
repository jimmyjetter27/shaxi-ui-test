<section x-data="recentlyViewed()" x-init="init()">
    <template x-if="items.length">
        <div>
            <h2 class="text-xl font-semibold mb-4">Recently Viewed</h2>

            <div class="relative rounded-3xl bg-[#f2f7ff] px-10 py-5">
                {{-- Prev arrow --}}
                <button
                    type="button"
                    class="hidden md:flex absolute left-4 top-1/2 -translate-y-1/2
                           h-9 w-9 items-center justify-center rounded-full bg-white shadow
                           hover:bg-gray-50"
                    @click="scrollLeft()"
                >
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M12.79 4.21a.75.75 0 0 1 0 1.06L9.06 9l3.73 3.73a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0z" />
                    </svg>
                </button>

                {{-- Cards track --}}
                <div class="flex gap-4 overflow-x-auto scrollbar-hide" x-ref="track">
                    <template x-for="item in items" :key="item.slug">
                        <a
                            :href="item.url"
                            class="min-w-[180px] max-w-[180px] bg-white rounded-2xl shadow-sm
                                   border border-gray-200 p-3 flex flex-col hover:shadow-md transition"
                        >
                            <div
                                class="relative w-full aspect-[4/3] overflow-hidden rounded-t-2xl bg-white border-b border-gray-100"
                            >
                                <img
                                    :src="item.image"
                                    :alt="item.name"
                                    class="absolute inset-0 w-full h-full object-cover"
                                >
                            </div>

                            <p class="mt-2 font-semibold text-gray-900 text-sm">
                                ₵<span x-text="new Intl.NumberFormat('en-GH').format(item.price)"></span>
                            </p>

                            <p class="text-xs text-gray-800 line-clamp-2" x-text="item.name"></p>

                            <p class="mt-auto flex items-center gap-1 text-[11px] text-gray-500">
                                <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M10 2a6 6 0 0 0-6 6c0 4 6 10 6 10s6-6 6-10a6 6 0 0 0-6-6zm0 8.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z" />
                                </svg>
                                <span x-text="item.location"></span>
                            </p>
                        </a>
                    </template>
                </div>

                {{-- Next arrow --}}
                <button
                    type="button"
                    class="hidden md:flex absolute right-4 top-1/2 -translate-y-1/2
                           h-9 w-9 items-center justify-center rounded-full bg-white shadow
                           hover:bg-gray-50"
                    @click="scrollRight()"
                >
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M7.21 4.21a.75.75 0 0 0 0 1.06L10.94 9l-3.73 3.73a.75.75 0 1 0 1.06 1.06l4.25-4.25a.75.75 0 0 0 0-1.06L8.27 4.21a.75.75 0 0 0-1.06 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </template>
</section>
