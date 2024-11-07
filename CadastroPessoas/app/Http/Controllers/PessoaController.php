<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PessoaController extends Controller
{
    public function index()
    {
        $pessoas = Pessoa::all();
        return Inertia::render('Pessoas/Index', ['pessoas' => $pessoas]);
    }

    public function create()
    {
        return Inertia::render('Pessoas/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required|string|unique:pessoas',
            'tipo' => 'required|string|in:fisica,juridica',
            'telefone' => 'required|string',
            'email' => 'required|email|unique:pessoas'
        ]);

        Pessoa::create($data);
        return redirect()->route('pessoas.index')->with('success', 'Pessoa criada com sucesso!');
    }

    public function edit($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        return Inertia::render('Pessoas/Edit', ['pessoa' => $pessoa]);
    }

    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::findOrFail($id);
        
        $data = $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required|string|unique:pessoas,cpf,' . $id,
            'tipo' => 'required|string|in:fisica,juridica',
            'telefone' => 'required|string',
            'email' => 'required|email|unique:pessoas,email,' . $id
        ]);

        $pessoa->update($data);
        return redirect()->route('pessoas.index')->with('success', 'Pessoa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();
        return redirect()->route('pessoas.index')->with('success', 'Pessoa excluída com sucesso!');
    }
}
