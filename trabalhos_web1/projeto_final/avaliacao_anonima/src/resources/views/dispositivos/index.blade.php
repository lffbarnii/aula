@extends('layouts.padrao')
@section('title', 'Dispositivos')

@section('content')

<div class="quiz-modal">
    <h3>Dispositivos</h3>

    <a href="{{ route('dispositivos.create') }}">
        <button style="margin-bottom: 16px;">+ Novo Dispositivo</button>
    </a>

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#e3eaf5;">
                <th style="padding:10px;text-align:left;">ID</th>
                <th style="padding:10px;text-align:left;">Descrição</th>
                <th style="padding:10px;">Status</th>
                <th style="padding:10px;">Setor</th>
                <th style="padding:10px;">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($dispositivos as $item)
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding:10px;">{{ $item->id }}</td>
                <td style="padding:10px;">{{ $item->descricao }}</td>
                <td style="padding:10px;">{{ $item->status ? 'Ativo' : 'Inativo' }}</td>
                <td style="padding:10px;">{{ $item->setor->descricao ?? '-' }}</td>
                <td style="padding:10px;text-align:center;">
                    <a href="{{ route('dispositivos.edit', $item->id) }}">Editar</a> |
                    <form method="POST" action="{{ route('dispositivos.destroy', $item->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button style="background:#d32f2f;">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
