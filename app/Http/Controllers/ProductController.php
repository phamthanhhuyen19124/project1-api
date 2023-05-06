<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function store(Request $request) // thêm mới
    {
        $product = new product([
            'name' => $request->get('name'),
            'img' => $request->get('img'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'category_id'=> $request->get('category_id'),
            'brand_id'=> $request->get('brand_id'),
        ]);
        $request->all();
        $product->save();
        return response()->json($product);
    }

    public function index(Request $request) //get
    {
        $search = $request->input('search') || '';
        $limit = $request->input('limit') ? $request->input('limit') : 10;
        return product::with(['category', 'brand'])
            ->where('name', 'like', '%'.$search.'%')
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }
    public function show($id) //lay ra id hiện lên mh
    {
        $product = product::findOrFail($id);
        return response()->json($product);
    }
    public function update($id, Request $request) //chỉnh sửa
    {
        $product = product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }
    public function destroy($id) // xoas
    {
        $product = product::findOrFail($id);
        $product->delete();
        return response()->json('successfully deleted');
    }
}
