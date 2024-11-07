@extends('layouts.app')

@section('content')
    <h1>Lista de Pessoas</h1>
    <a href="{{ route('pessoas.create') }}">Adicionar Nova Pessoa</a>
    <ul>
        @foreach ($pessoas as $pessoa)
            <li>{{ $pessoa->name }} - <a href="{{ route('pessoas.edit', $pessoa->id) }}">Editar</a></li>
        @endforeach
    </ul>
@endsection
