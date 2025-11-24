<nav
    class="w-full bg-white shadow-sm border-b border-slate-200"
    x-data="{ showLocationModal: false, mobileOpen: false }"
>
    <div class="mx-auto max-w-7xl px-4 lg:px-6">

        {{-- TOP ROW --}}
        <div
            class="flex items-center justify-between py-3 gap-3"
        >
            {{-- LEFT: mobile menu button + Logo --}}
            <div class="flex items-center gap-2">
                {{-- Mobile menu button (shown on md and smaller) --}}
                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-full p-2
                           text-slate-700 hover:bg-slate-100 lg:hidden"
                    @click="mobileOpen = true"
                >
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                {{-- Logo --}}
                <a href="{{ route('home') }}">
                    <div class="flex items-center justify-center lg:justify-start">
                        <x-application-logo class="h-10 w-auto mb-0"/>
                    </div>
                </a>
            </div>

            {{-- CENTER + RIGHT: Search + Ride + Login (hidden on md and smaller) --}}
            <div class="hidden lg:flex flex-1 items-center justify-between gap-4">

                {{-- CENTER: Search Bar --}}
                <div class="w-full lg:flex-1 lg:max-w-3xl">
                    <form class="w-full">
                        <div
                            class="flex w-full items-center border-2 border-blue-500 rounded-full bg-white overflow-hidden">

                            {{-- Search input --}}
                            <div class="flex-1 flex items-center px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     class="h-4 w-4 text-gray-500 mr-3 flex-shrink-0" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>

                                <input
                                    type="text"
                                    placeholder="Search for anything"
                                    class="w-full border-0 focus:ring-0 text-sm text-gray-800 placeholder:text-gray-400"
                                />
                            </div>

                            {{-- Location pill: All Ghana --}}
                            <button
                                type="button"
                                class="hidden sm:inline-flex items-center gap-2 px-4 py-2 text-sm
                                       bg-gray-100 hover:bg-gray-200 border-l border-gray-200
                                       whitespace-nowrap"
                                @click="showLocationModal = true"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     class="h-4 w-4 text-gray-600" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path
                                        d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                <span>All Ghana</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                     class="h-4 w-4 text-gray-500" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.08 1.04l-4.24 4.5a.75.75 0 0 1-1.08 0l-4.24-4.5a.75.75 0 0 1 .02-1.06z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>

                            {{-- Search button --}}
                            <button
                                type="submit"
                                class="flex items-center justify-center h-10 w-10 sm:h-11 sm:w-11
                                       rounded-full bg-blue-600 text-white hover:bg-blue-700
                                       mr-1 sm:mr-1.5"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     class="h-4 w-4" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                {{-- RIGHT: Ride + Login --}}
                <div class="flex items-center justify-center gap-4 lg:justify-end">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="lucide lucide-car h-5 w-5">
                            <path
                                d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"/>
                            <circle cx="7" cy="17" r="2"/>
                            <path d="M9 17h6"/>
                            <circle cx="17" cy="17" r="2"/>
                        </svg>
                        <span class="text-xs">Ride</span>
                    </div>

                    <a
                        class="flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white
                               hover:bg-blue-700 transition-colors duration-200 text-sm font-medium"
                        href="#"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                             class="w-4 h-4" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                            <polyline points="10 17 15 12 10 7"></polyline>
                            <line x1="15" x2="3" y1="12" y2="12"></line>
                        </svg>
                        <span>Log In</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- SECOND ROW — CATEGORY MENU (desktop only) --}}
        <div class="hidden lg:flex items-center justify-center space-x-8 py-3 text-sm text-slate-700">
            <a href="{{ route('home') }}"
               class="flex items-center gap-1 px-3 py-1 rounded-full bg-blue-50 text-blue-600 font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 3.22l6 4.5V17a1 1 0 01-1 1h-3v-4H8v4H5a1 1 0 01-1-1V7.72l6-4.5z"/>
                </svg>
                Home
            </a>

            <a href="#" class="flex items-center gap-1">
                🐶 Animals & Pets
            </a>
            <a href="#" class="flex items-center gap-1">
                🧒 Babies & Kids
            </a>
            <a href="#" class="flex items-center gap-1">
                💄 Beauty & Personal Care
            </a>
            <a href="#" class="flex items-center gap-1">
                🧰 Commercial Equipment & Tools
            </a>
            <a href="#" class="flex items-center gap-1">
                ⚙️ Electronics
            </a>
            <a href="#" class="flex items-center gap-1">
                👕 Fashion
            </a>
            <a href="#" class="flex items-center gap-1">
                More
            </a>
        </div>
    </div>

    {{-- MOBILE OFF-CANVAS MENU --}}
    <div
        x-show="mobileOpen"
        x-cloak
        class="fixed inset-0 z-50 flex lg:hidden"
        x-transition.opacity
    >
        {{-- Drawer --}}
        <div
            class="relative w-80 max-w-full bg-white shadow-xl flex flex-col"
            x-transition:enter="transform transition ease-out duration-200"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in duration-150"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
        >
            {{-- Header --}}
            <div class="flex items-center justify-between px-4 pt-4 pb-3">
                <x-application-logo class="h-7 w-auto"/>

                <button
                    type="button"
                    class="rounded-full p-2 text-slate-500 hover:bg-slate-100"
                    @click="mobileOpen = false"
                >
                    <span class="sr-only">Close menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Sign in --}}
            <div class="px-4 pb-3 border-b border-slate-100">
                <a
                    href="#"
                    class="w-full inline-flex items-center justify-center rounded-full border border-slate-200
                           px-4 py-2.5 text-sm font-semibold text-slate-800 hover:bg-slate-50"
                >
                    Sign In
                </a>
            </div>

            {{-- Scrollable content --}}
            <div class="flex-1 overflow-y-auto px-4 pb-6 pt-4 space-y-6">

                {{-- MENU --}}
                <div>
                    <p class="text-xs font-semibold text-slate-400 tracking-wide mb-2">
                        MENU
                    </p>
                    <div class="space-y-1">
                        <a href="{{ route('home') }}"
                           class="flex items-center gap-2 px-3 py-2 rounded-xl text-sm
                                  text-slate-900 bg-[#eef3ff]">
                            <span class="inline-flex h-5 w-5 items-center justify-center rounded-full bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4 text-[#2557D6]" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z"/>
                                </svg>
                            </span>
                            <span>Home</span>
                        </a>

                        <a href="#"
                           class="flex items-center gap-2 px-3 py-2 rounded-xl text-sm
                                  text-slate-700 hover:bg-slate-100">
                            <span class="h-5 w-5 inline-flex items-center justify-center">
                                {{-- bookmark --}}
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6 4h12v16l-6-3-6 3z"/>
                                </svg>
                            </span>
                            <span>Saved</span>
                        </a>

                        <a href="#"
                           class="flex items-center gap-2 px-3 py-2 rounded-xl text-sm
                                  text-slate-700 hover:bg-slate-100">
                            <span class="h-5 w-5 inline-flex items-center justify-center">
                                {{-- car --}}
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M3 13l2-6h14l2 6M5 13h14M7 18h.01M17 18h.01M6 13v5M18 13v5"/>
                                </svg>
                            </span>
                            <span>Ride</span>
                        </a>
                    </div>
                </div>

                {{-- CATEGORIES --}}
                <div>
                    <p class="text-xs font-semibold text-slate-400 tracking-wide mb-2">
                        CATEGORIES
                    </p>

                    <div class="space-y-1 text-sm">
                        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100">
                            <span>🐶</span>
                            <span>Animals & Pets</span>
                        </a>
                        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100">
                            <span>🧒</span>
                            <span>Babies & Kids</span>
                        </a>
                        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100">
                            <span>💄</span>
                            <span>Beauty & Personal Care</span>
                        </a>
                        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100">
                            <span>🧰</span>
                            <span>Commercial Equipment & Tools</span>
                        </a>
                        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100">
                            <span>⚙️</span>
                            <span>Electronics</span>
                        </a>
                        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100">
                            <span>👕</span>
                            <span>Fashion</span>
                        </a>
                        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100">
                            <span>🍔</span>
                            <span>Food, Agriculture & Farming</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Backdrop --}}
        <button
            class="flex-1 bg-black/30"
            @click="mobileOpen = false"
            aria-hidden="true"
        ></button>
    </div>

    {{-- LOCATION MODAL --}}
    <div
        x-show="showLocationModal"
        x-cloak
        class="fixed inset-0 z-40 flex items-center justify-center bg-black/40 px-4"
        x-transition.opacity
        @click="showLocationModal = false"
    >
        <div
            class="bg-white rounded-2xl w-full max-w-4xl max-h-[80vh] overflow-hidden shadow-xl"
            @click.stop
        >
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <div>
                    <h2 class="text-lg font-semibold">Select Location</h2>
                    <p class="text-sm text-gray-500">
                        Choose a region or a specific district within a region
                    </p>
                </div>
                <button
                    type="button"
                    class="p-2 rounded-full hover:bg-gray-100"
                    @click="showLocationModal = false"
                >
                    <span class="sr-only">Close</span>
                    ✕
                </button>
            </div>

            <div class="px-6 py-4 space-y-4 overflow-y-auto">
                <div>
                    <input
                        type="text"
                        placeholder="Search region or district"
                        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm
                               focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="space-y-3">
                    <h3 class="text-sm font-semibold text-gray-700">Popular Locations</h3>

                    <div class="space-y-3">
                        <button type="button" class="flex items-start gap-2 text-left w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-[#2557D6]">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>
                                <span class="block font-medium text-sm">Accra</span>
                                <span class="block text-xs text-gray-500">Greater Accra</span>
                            </span>
                        </button>

                        <button type="button" class="flex items-start gap-2 text-left w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-[#2557D6]">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>
                                <span class="block font-medium text-sm">Kumasi</span>
                                <span class="block text-xs text-gray-500">Ashanti</span>
                            </span>
                        </button>

                        <button type="button" class="flex items-start gap-2 text-left w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-[#2557D6]">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span>
                                <span class="block font-medium text-sm">Cape Coast</span>
                                <span class="block text-xs text-gray-500">Central</span>
                            </span>
                        </button>

                        <div class="pt-2 border-t border-gray-100 mt-2">
                            <button type="button" class="flex items-center gap-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-[#2557D6]">
                                    <path
                                        d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span class="font-medium text-sm">Ahafo</span>
                                <span class="text-xs text-gray-500">(6 districts)</span>
                            </button>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-gray-700">
                                <span>Asunafo North Municipal</span>
                                <span>Asunafo South District</span>
                                <span>Asutifi North District</span>
                                <span>Asutifi South District</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
