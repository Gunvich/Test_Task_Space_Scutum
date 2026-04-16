<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        //return response()->json(['ok' => true]);
      $query = Product::query();

        if ($request->category) {
            $query->where('category', $request->category);
        }
        if ($request->min_price){
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->max_price){
            $query->where('price', '<=', $request->max_price);
        }

        return $query->get();

    }
    public function store(Request $request)
    {
        return Product::create($request->all());
    }
    public function show($id)
    {
        return Product::findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return $product;
    }
    public function destroy($id)
    {
        Product::destroy($id);

        return response()->json(['message' => 'deleted']);
    }
}
