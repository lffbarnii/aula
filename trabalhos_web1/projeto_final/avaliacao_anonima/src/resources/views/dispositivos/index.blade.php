@extends('layouts.padrao')
@section('title', 'Dispositivos')

@section('content')

<div class="quiz-modal">
    <h3>Dispositivos</h3>

    <a href="{{ route('dispositivos.create') }}">
        <button class="btn-new">+ Novo Dispositivo</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th class="center">Status</th>
                <th class="center">Setor</th>
                <th class="center">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($dispositivos->sortBy('id') as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->descricao }}</td>
                <td class="center">{{ $item->status ? 'Ativo' : 'Inativo' }}</td>
                <td class="center">{{ $item->setor->descricao ?? '-' }}</td>
                <td class="center">
                    <a href="{{ route('dispositivos.edit', $item->id) }}">Editar</a> |
                    <form method="POST" action="{{ route('dispositivos.destroy', $item->id) }}" class="inline-form">
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