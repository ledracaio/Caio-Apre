@extends('layouts.app')

@section('content')
    <h1>Cadastrar Nova Pessoa</h1>
    <form action="{{ route('pessoas.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" required>
        <button type="submit">Salvar</button>
    </form>
@endsection
