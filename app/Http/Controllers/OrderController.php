<?php

namespace App\Http\Controllers;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class OrderController extends Controller
{
    public function store(Request $request) // thêm mới
    {
        $order = new order([
            'user_id' => $request->get('user_id'),
            'total' => $request->get('total'),
            'product_id' => $request->get('product_id'),
        ]);
        $request->all();
        $order->save();
        return response()->json($order);
    }
    public function index(Request $request) //get
    {
        $limit = $request->input('limit') ? $request->input('limit') : 10;
        return order::with(['product','user'])
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }
    public function show($id) //hiện ra mh
    {
        $order = order::findOrFail($id);
        return response()->json($order);
    }
    public function update($id, Request $request) //chỉnh sửa
    {
        $order = order::findOrFail($id);
        $order->update($request->all());
        return response()->json($order);
    }
    public function destroy($id) // xoas
    {
        $order = order::findOrFail($id);
        $order->delete();
        return response()->json('successfully deleted');
    }
}
