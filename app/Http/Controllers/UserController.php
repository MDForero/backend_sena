<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json(['user' => $user], 200);
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
        try{

            $admin = User::find($request->id);
            $nit = User::all()->where('nit', $request->nit)->first();
            if ($nit) {
                return response()->json([
                    'message' => 'user already exists'
                ], 404);
            }
            $email = User::all()->where('email', $request->email)->first();
            if ($email) {
                return response()->json([
                    'message' => 'email already exists'
                ], 404);
            }

            if ($admin->role == 'admin') {
                $user = new User();
                $user->name = $request->name;
                $user->nit = $request->nit;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->save();
                return response()->json([
                    'user' => $user,
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'user not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nit)
    {
        try {
            $user = User::all()->where('nit', $nit)->first();
            
            if (!$user) {
                return response()->json([
                    'message' => 'user not found'
                ], 404);
            }
            return response()->json([
                'user' => $user,
                'invoices' => $user->invoices
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'user not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $user = User::find($id);
            $user->role = $request->role;
            $user->status = $request->status;
            $user->save();
            return response()->json([
                'user' => $user,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'user not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }


    public function destroy(string $id)
    {
        //
    }
}
