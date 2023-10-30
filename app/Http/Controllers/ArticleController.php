<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Articles = Article::all();
        return response()->json($Articles);
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
    public function store(ArticleStoreRequest $request)
    {
        try {
            if ($request->image) {
                $imageName = Str::random(32) . '.' . $request->image->getClientOriginalExtension();
                Article::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'value' => $request->value,
                    'image' => $imageName,
                    'category' => $request->category,
                ]);
                Storage::disk('public')->put($imageName, file_get_contents($request->image));
                return response()->json([
                    'message' => 'Articulo creado correctamente',
                ], 201);
            } else {
                Article::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'value' => $request->value,
                    'category' => $request->category,
                ]);
                return response()->json([
                    'message' => 'Articulo creado correctamente',
                ], 201);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al guardar la imagen',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $Article = Article::find($id);
            return response()->json($Article);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al obtener el articulo',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $Article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $Article = Article::find($id);
            $Article->name = $request->name;
            $Article->description = $request->description;
            $Article->value = $request->value;
            $Article->category = $request->category;

            if ($request->image) {
                $imageName = Str::random(32) . '.' . $request->image->getClientOriginalExtension();
                if ($Article->image) {
                    Storage::disk('public')->delete($Article->image);
                }
                $Article->image = $imageName;
                Storage::disk('public')->put($imageName, file_get_contents($request->image));
            }
            $Article->save();
            return response()->json([
                'message' => 'Articulo actualizado correctamente',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al guardar la imagen',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $article = Article::find($id);
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $article->delete();
            return response()->json([
                'message' => 'Articulo eliminado correctamente',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar el articulo',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
