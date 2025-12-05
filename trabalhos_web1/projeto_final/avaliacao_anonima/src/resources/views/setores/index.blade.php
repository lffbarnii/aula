@extends('layouts.padrao')
@section('title', 'Setores')

@section('content')

<div class="quiz-modal">
    <h3>Setores Cadastrados</h3>

    <a href="{{ route('setores.create') }}">
        <button class="btn-new">+ Novo Setor</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th class="center" colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($setores->sortBy('id') as $setor)
            <tr>
                <td>{{ $setor->id }}</td>
                <td>{{ $setor->descricao }}</td>
                <td class="center">
                    <a href="{{ route('setores.edit', $setor->id) }}">
                        <button class="btn-new">Editar</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('setores.destroy', $setor->id) }}" method="POST" class="inline-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection