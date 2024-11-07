<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index()
    {
        return Pessoa::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|size:11|unique:pessoas',
            'tipo' => 'required|in:fisica,juridica',
            'telefone' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:255|unique:pessoas',
        ]);

        $pessoa = Pessoa::create($validatedData);
        return response()->json($pessoa, 201);
    }

    public function show(Pessoa $pessoa)
    {
        return $pessoa;
    }

    public function update(Request $request, Pessoa $pessoa)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|size:11|unique:pessoas,cpf,' . $pessoa->id,
            'tipo' => 'required|in:fisica,juridica',
            'telefone' => 'nullable|string|max:15',
            'email' => 'required|string|email|max:255|unique:pessoas,email,' . $pessoa->id,
        ]);

        $pessoa->update($validatedData);
        return response()->json($pessoa);
    }

    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return response()->json(null, 204);
    }
}
