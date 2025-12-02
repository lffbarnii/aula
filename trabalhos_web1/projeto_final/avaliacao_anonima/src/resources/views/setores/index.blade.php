@extends('layouts.padrao')
@section('title', 'Setores')

@section('content')

<div class="quiz-modal">
    <h3>Setores Cadastrados</h3>

    <a href="{{ route('setores.create') }}">
        <button style="margin-bottom: 16px;">+ Novo Setor</button>
    </a>

    <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
        <thead>
            <tr style="background: #e3eaf5;">
                <th style="padding: 10px; text-align:left;">ID</th>
                <th style="padding: 10px; text-align:left;">Descrição</th>
                <th style="padding: 10px;">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($setores as $setor)
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 10px;">{{ $setor->id }}</td>
                <td style="padding: 10px;">{{ $setor->descricao }}</td>
                <td style="padding: 10px; text-align:center;">
                    <a href="{{ route('setores.edit', $setor->id) }}">Editar</a> |
                    <form action="{{ route('setores.destroy', $setor->id) }}" method="POST" style="display:inline;">
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
