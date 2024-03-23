<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user')->get();
        return response()->json([
            'orders' => $orders
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $platesJson= json_encode($request->plates);
        try {
            // $isAvailable = User::where('id', $request->user_id)->where('role', ['admin', 'manager', 'waitress'])->first();
            // if (!$isAvailable) {
            //     return response()->json([
            //         'message' => 'you already have an order',
            //     ], 400);
            // }
        
            $order = Order::create([
                'user_id' => $request->user_id,
                'plates' => $platesJson
            ]);

            
        
            return response()->json([
                'data' => $order,
                'plates'=> $platesJson
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'failed to save data',
                'error' => $e->getMessage(),
                'request'=>$platesJson
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $order = Order::with('user')->find($id);
            $order->plates = json_decode($order->plates);
            return response()->json([
                'order' => $order
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'failed to get data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->json()->all();
        $platesArray = $data['plates'];
        $platesJson = json_encode($platesArray);
        try {
            $order = Order::find($id);
            $order->update([
                'plates' => $platesJson,
            ]);

            return response()->json([
                'message' => 'success update data',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'failed to update data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $order = Order::find($id);
            $order->delete();

            return response()->json([
                'message' => 'success delete data',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'failed to delete data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
