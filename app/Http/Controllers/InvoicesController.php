<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Invoice = Invoice::all();
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
            Invoice::create([
                'name' => $request->name,
                'description' => $request->description,
                'value' => $request->value,
                'status' => $request->status,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'nit' => $request->nit,
                'order_id' => $request->order_id,
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
            $Invoice = Invoice::find($id);
            return response()->json($Invoice);
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
