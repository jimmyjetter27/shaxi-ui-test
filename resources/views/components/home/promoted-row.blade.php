@props(['products'])

@if (!empty($products))
    <section class="space-y-4">
{{--        <h2 class="text-xl font-semibold">Promoted</h2>--}}

        {{-- 2 cols on mobile, 4 on medium, 7 on large+ --}}
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-3 md:gap-4 xl:gap-5">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </section>
@endif
