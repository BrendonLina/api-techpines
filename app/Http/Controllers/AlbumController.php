<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Album::with('faixas')->get();
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

    
        if (!$search) {
            return response()->json(Album::all());
        }

    
        $albums = Album::where('name', $search)->get();

    
        if ($albums->isEmpty()) {
            return response()->json(['message' => '0 resultados na busca.'], 404);
        }

        return response()->json($albums);
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
            $request->validate([
                'name' => 'required',
                'artista' => 'nullable|string',
                'data_lancamento' => 'nullable|date'
            ], [
                'name.required' => 'Nome do álbum é obrigatório.',
                'artist.string' => 'O nome do artista deve ser uma string.',
                'data_lancamento.date' => 'A data de lançamento deve ser uma data válida ex: 2024-01-31.'
            ]);

            $album = Album::create($request->all());

            return response()->json($album, 201);

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
    public function destroy(Album $album)
    {
        $album->delete();
        return response()->json(null, 204);
    }
}
