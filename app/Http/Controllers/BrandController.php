<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function store(Request $request) // thêm mới
    {
        $brand = new brand([
            'name' => $request->get('name'),
        ]);
        $request->all();
        $brand->save();
        return response()->json($brand);
    }
    public function index(Request $request) //get
    {
        $search = $request->input('search') || '';
        $limit = $request->input('limit') ? $request->input('limit') : 10;
        return brand::where('name', 'like', '%'.$search.'%')
            ->orderBy('id', 'desc')
            ->paginate($limit); //phan trang
    }
    public function show($id) //lay ra id mog muon
    {
        $brand = brand::findOrFail($id); // truy vaans vao id
        return response()->json($brand);
    }
    public function update($id, Request $request) //chỉnh sửa
    {
        $brand = brand::findOrFail($id);
        $brand->update($request->all());
        return response()->json($brand);
    }
//    public function delete($id) // xoas
//    {
//        $brand = brand::findOrFail($id);
//        $brand->delete();
//        return response()->json('successfully deleted');
//    }
}
