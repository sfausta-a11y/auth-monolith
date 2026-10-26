<?php

namespace Modules\Product\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Product\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product::index', compact('products'));
    }

    public function create()
    {
        return view('product::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index');
    }
}