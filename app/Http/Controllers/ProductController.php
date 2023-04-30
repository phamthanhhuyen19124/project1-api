<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request) // thêm mới
    {
        $product = new product([
            'name' => $request->get('name'),
            'img' => $request->get('img'),
            'price' => $request->get('price'),
            'category_id'=> $request->get('category_id'),
            'brand_id'=> $request->get('brand_id'),
        ]);
        $request->all();
        $product->save();
        return response()->json($product);
    }
}
