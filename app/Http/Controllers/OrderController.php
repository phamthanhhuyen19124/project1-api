<?php

namespace App\Http\Controllers;
use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request) // thêm mới
    {
        $order = new order([
            'name' => $request->get('name'),
            'total' => $request->get('total'),
            'price' => $request->get('price'),
        ]);
        $request->all();
        $order->save();
        return response()->json($order);
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
        $order = category::findOrFail($id);
        return response()->json($order);
    }
    public function update($id, Request $request) //chỉnh sửa
    {
        $order = order::findOrFail($id);
        $order->update($request->all());
        return response()->json($order);
    }
    public function delete($id) // xoas
    {
        $order = order::findOrFail($id);
        $order->delete();
        return response()->json('successfully deleted');
    }
}
