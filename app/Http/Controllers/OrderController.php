<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();

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
        $data = $request->json()->all();
        $platesArray = $data['plates'];
        $user = $data['user_id'];
        $platesJson = json_encode($platesArray);
        try {
            Order::create([
                'plates' => $platesJson,
                'user_id' => $user,
            ]);

            return response()->json([
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'failed to save data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'message' => 'not found',
            ], 404);
        } else {
            return response()->json([
                'message' => 'detail data order',
                'order' => $order
            ], 200);
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
