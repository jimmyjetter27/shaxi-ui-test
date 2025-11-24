<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function home()
    {
        $path = resource_path('data/products.json');

        $products = [];
        if (File::exists($path)) {
            $products = json_decode(File::get($path), true) ?? [];
        }

        $collection = collect($products);

        // 1) Promoted
        $promoted = $collection
            ->filter(fn($p) => data_get($p, 'about_product.promoted') === true)
            ->values()
            ->all();

        // 2) Non-promoted = "all listings" (fallback to all if empty)
        $nonPromoted = $collection
            ->reject(fn($p) => data_get($p, 'about_product.promoted') === true)
            ->values();

        if ($nonPromoted->isEmpty()) {
            $nonPromoted = $collection->values();
        }

        $listings = $nonPromoted->values()->all(); // plain array

        return view('welcome', [
            'promoted' => $promoted,
            'listings' => $listings,
        ]);
    }
}
