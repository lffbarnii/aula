@extends('layouts.padrao')
@section('title', 'Perguntas')

@section('content')

<div class="quiz-modal">
    <h3>Perguntas Cadastradas</h3>

    <a href="{{ route('perguntas.create') }}">
        <button class="btn-new">+ Nova Pergunta</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Texto</th>
                <th class="center">Ordem</th>
                <th class="center">Status</th>
                <th class="center">Setor</th>
                <th class="center">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($perguntas->sortBy('id') as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->texto }}</td>
                <td class="center">{{ $p->ordem }}</td>
                <td class="center">{{ $p->status ? 'Ativa' : 'Inativa' }}</td>
                <td class="center">{{ $p->setor->descricao ?? '-' }}</td>
                <td class="center">
                    <a href="{{ route('perguntas.edit', $p->id) }}">Editar</a> |
                    <form method="POST" action="{{ route('perguntas.destroy', $p->id) }}" class="inline-form">
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