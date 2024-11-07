@extends('layouts.app')

@section('content')
    <h1>Editar Pessoa</h1>
    <form action="{{ route('pessoas.update', $pessoa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome:</label>
        <input type="text" name="name" value="{{ $pessoa->name }}" required>
        <button type="submit">Atualizar</button>
    </form>
@endsection
