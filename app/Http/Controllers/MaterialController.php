<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::paginate(25);
        return response()->json($materials);
    }


    public function show($id)
    {
        $material = Material::find($id);
        return response()->json($material);
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create(Request $request)
    {
        Material::create(
            [
                'name' => $request->name,
                'quantity' => $request->quantity,
            ]);
            return response()->json([
                'message' => 'Material created successfully',
            ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try{

            $material = Material::find($id);
            $material->quantity = $request->quantity;
            $material->save();
            return response()->json([
                'message' => 'Material updated successfully',
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error updating material',
                'data'=> $e->getMessage()
            ], 400);
        }
    }
   
}
