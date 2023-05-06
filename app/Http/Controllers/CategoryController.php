<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function store(Request $request) // thêm mới
    {
        $category = new category([
            'name' => $request->get('name'),
        ]);
        $request->all();
        $category->save();
        return response()->json($category);
    }

    public function index(Request $request) //get
    {
        $search = $request->input('search') || '';
        $limit = $request->input('limit') ? $request->input('limit') : 10;
        return category::where('name', 'like', '%'.$search.'%')
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public function show($id) //hiện ra mh
    {
        $category = category::findOrFail($id);
        return response()->json($category);
    }

    public function update($id, Request $request) //chỉnh sửa
    {
        $category = category::findOrFail($id);
        $category->update($request->all());
        return response()->json($category);
    }

    public function destroy($id) // xoas
    {
        $category = category::findOrFail($id);
        $category->delete();
        return response()->json('successfully deleted');
    }
}
