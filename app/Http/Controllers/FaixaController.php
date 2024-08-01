<?php

namespace App\Http\Controllers;

use App\Models\Faixa;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FaixaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $albumId)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|min:3',
                'duracao' => 'nullable|integer'
            ],[
                'name.required' => 'Nome é obrigatório.',
                'name.min' => 'Nome precisa ter no mínimo 3 letras.',
                'duracao.integer' => 'Duração precisa ser um numero inteiro'
            ]);
    
            $track = new Faixa($validated);
            $track->album_id = $albumId;
            $track->save();
    
            return response()->json($track, 201);
    
        } catch (ValidationException $e) {

            return response()->json([
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faixa $faixa)
    {
        $faixa->delete();
        return response()->json(null, 204);
    }
}
