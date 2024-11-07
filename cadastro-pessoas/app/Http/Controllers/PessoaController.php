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
        $data = $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required|string|unique:pessoas,cpf',
            'tipo' => 'required|in:fisica,juridica',
            'telefone' => 'required|string',
            'email' => 'required|email|unique:pessoas,email',
        ]);
        return Pessoa::create($data);
    }

    public function show($id)
    {
        return Pessoa::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $data = $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required|string|unique:pessoas,cpf,' . $id,
            'tipo' => 'required|in:fisica,juridica',
            'telefone' => 'required|string',
            'email' => 'required|email|unique:pessoas,email,' . $id,
        ]);
        $pessoa->update($data);
        return $pessoa;
    }

    public function destroy($id)
    {
        $pessoa = Pessoa::findOrFail($id);
        $pessoa->delete();
        return response()->json(['message' => 'Pessoa deletada com sucesso']);
    }
}