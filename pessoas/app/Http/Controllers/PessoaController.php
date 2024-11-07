<?php
namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function index()
    {
        return Pessoa::all();
    }

    public function store(Request $request)
    {
        $pessoa = Pessoa::create($request->all());
        return response()->json($pessoa, 201);
    }

    public function show(Pessoa $pessoa)
    {
        return $pessoa;
    }

    public function update(Request $request, Pessoa $pessoa)
    {
        $pessoa->update($request->all());
        return response()->json($pessoa, 200);
    }

    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return response()->json(null, 204);
    }
}
?>