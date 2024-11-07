<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna a lista de todas as pessoas
        $pessoas = Pessoa::all();
        return Inertia::render('Pessoas/Index', [
            'pessoas' => $pessoas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retorna a view para criar uma nova pessoa
        return Inertia::render('Pessoas/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|size:11|unique:pessoas,cpf',
            'tipo' => 'required|in:fisica,juridica',
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|unique:pessoas,email',
        ]);

        // Cria uma nova pessoa
        $pessoa = Pessoa::create($validatedData);

        return response()->json($pessoa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pessoa $pessoa)
    {
        // Retorna os dados de uma pessoa específica
        return response()->json($pessoa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pessoa $pessoa)
    {
        // Retorna a view para editar uma pessoa específica
        return Inertia::render('Pessoas/Edit', [
            'pessoa' => $pessoa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|size:11|unique:pessoas,cpf,' . $pessoa->id,
            'tipo' => 'required|in:fisica,juridica',
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|unique:pessoas,email,' . $pessoa->id,
        ]);

        // Atualiza os dados da pessoa
        $pessoa->update($validatedData);

        return response()->json($pessoa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pessoa $pessoa)
    {
        // Remove a pessoa do banco de dados
        $pessoa->delete();

        return response()->json(['message' => 'Pessoa excluída com sucesso.']);
    }
}
