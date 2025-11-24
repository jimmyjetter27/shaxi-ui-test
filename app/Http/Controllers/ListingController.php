<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ListingController extends Controller
{
    public function lists(string $slug)
    {
        $path = resource_path('data/products.json');
        $products = File::exists($path)
            ? json_decode(File::get($path), true) ?? []
            : [];

        $product = collect($products)->first(function ($item) use ($slug) {
            return ($item['about_product']['slug'] ?? null) === $slug;
        });

        abort_if(!$product, 404);

        // Find similar products and fetch only 4 of them
        $similar = collect($products)
            ->filter(fn($p) => ($p['about_product']['category'] ?? null) === ($product['about_product']['category'] ?? null)
                && ($p['about_product']['slug'] ?? null) !== $slug
            )
            ->take(4)
            ->values()
            ->all();


        return view('listing-show', [
            'product' => $product,
            'similar' => $similar,
        ]);
    }
}
