<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Invoice = Invoice::with('user', 'order')->paginate();
        return response()->json($Invoice);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {


            $user = User::all()->where('nit', $request->nit)->first();
            if (!$user) {
                return response()->json([
                    'message' => 'Usuario no encontrado'
                ], 404);
            }
            $invoice = Invoice::create([
                'status' => $request->status,
                'address' => $request->address,
                'user_id' => $user->id,
                'order_id' => $request->order_id,
                'value' => $request->value,
            ]);
            Order::find($request->order_id)->update([
                'status' => 'delivered',
                'invoice_id' => $invoice->id,
            ]);
            return response()->json([
                'message' => 'Factura creada correctamente',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear la factura',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $Invoice = Invoice::with('user')->find($id);
            return response()->json([
                'invoice' => $Invoice,
                'order' => $Invoice->order

            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener la factura',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $Invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Invoice = Invoice::find($id);
        if ($Invoice) {
            try {
                $Invoice->update([
                    'status' => $request->status,
                ]);
                return response()->json([
                    'message' => 'Factura actualizada correctamente',
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Error al actualizar la factura',
                    'error' => $e->getMessage()
                ], 400);
            }
        } else {
            return response()->json([
                'message' => 'Factura no encontrada',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $Invoice)
    {
    }
}
