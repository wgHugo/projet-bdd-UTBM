<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function index()
    {
        $product = Product::with('product')->get();
        return view('search', compact('product'));
    }

    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Product::class, 'name', 'author')
            ->registerModel(Category::class, 'name')
            ->search($request->input('search'));
        return view('search', compact('searchResults'));
    }
}
