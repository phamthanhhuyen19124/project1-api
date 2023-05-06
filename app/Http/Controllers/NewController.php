<?php

namespace App\Http\Controllers;
use App\Models\brand;
use App\Models\newspaper;
use App\Models\order;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function store(Request $request) // thêm mới
    {
        $newspaper = new newspaper([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);
        $request->all();
        $newspaper->save();
        return response()->json($newspaper);
    }
    public function index(Request $request) //get
    {
        $search = $request->input('search') || '';
        $limit = $request->input('limit') ? $request->input('limit') : 10;
        return newspaper::where('title', 'like', '%'.$search.'%')
            ->orderBy('id', 'desc')
            ->paginate($limit); //phan trang
    }
    public function show($id) //show chi tiết 1 bản ghi ra mh
    {
        $newspaper = newspaper::findOrFail($id);//tra về 1 hoặc trảề 1 bản nén
        return response()->json($newspaper);
    }
    public function update($id, Request $request) //chỉnh sửa
    {
        $newspaper = newspaper::findOrFail($id);
        $newspaper->update($request->all());
        return response()->json($newspaper);
    }
    public function destroy($id) // xoas
    {
        $newspaper = newspaper::findOrFail($id);
        $newspaper->delete();
        return response()->json('successfully deleted');
    }
}
