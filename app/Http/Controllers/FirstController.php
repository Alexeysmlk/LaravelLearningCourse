<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FirstController extends Controller
{
    public function index() {
        $latestProducts = Product::query()
            ->where('status', true)
            ->limit(10)
            ->latest()
            ->with('category')
            ->get();

        return view('welcome', compact('latestProducts'));
    }
}
