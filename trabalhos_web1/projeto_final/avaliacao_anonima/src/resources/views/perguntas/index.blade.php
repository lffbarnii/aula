@extends('layouts.padrao')
@section('title', 'Perguntas')

@section('content')

<div class="quiz-modal">
    <h3>Perguntas Cadastradas</h3>

    <a href="{{ route('perguntas.create') }}">
        <button style="margin-bottom:16px;">+ Nova Pergunta</button>
    </a>

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#e3eaf5;">
                <th style="padding:10px;text-align:left;">ID</th>
                <th style="padding:10px;text-align:left;">Texto</th>
                <th style="padding:10px;">Ordem</th>
                <th style="padding:10px;">Status</th>
                <th style="padding:10px;">Setor</th>
                <th style="padding:10px;">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($perguntas as $p)
            <tr style="border-bottom:1px solid #ddd;">
                <td style="padding:10px;">{{ $p->id }}</td>
                <td style="padding:10px;">{{ $p->texto }}</td>
                <td style="padding:10px;">{{ $p->ordem }}</td>
                <td style="padding:10px;">{{ $p->status ? 'Ativa' : 'Inativa' }}</td>
                <td style="padding:10px;">{{ $p->setor->descricao ?? '-' }}</td>
                <td style="text-align:center;padding:10px;">
                    <a href="{{ route('perguntas.edit', $p->id) }}">Editar</a> |
                    <form method="POST" action="{{ route('perguntas.destroy', $p->id) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button style="background:#d32f2f;">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
