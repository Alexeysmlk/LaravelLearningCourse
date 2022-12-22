<?php

namespace App\Http\Controllers;

use App\Models\Product;
use http\Cookie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalog(Request $request){
        $products = Product::query()
            ->where('status', 1)
            ->paginate();

        return view('catalog.catalog', compact('products'));
    }

    public function category(){

    }

    public function product(){

    }
}
