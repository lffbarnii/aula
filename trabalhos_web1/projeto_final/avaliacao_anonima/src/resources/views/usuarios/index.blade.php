@extends('layouts.padrao')
@section('title', 'Usuários')

@section('content')

<div class="quiz-modal">
    <h3>Lista de Usuários</h3>

    <a href="{{ route('usuarios.create') }}">
        <button class="btn-new">+ Criar Novo Usuário</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th class="center" colspan="2">Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($usuarios->sortBy('id') as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->login }}</td>
                <td class="center">
                    <a href="{{ route('usuarios.edit', $usuario->id) }}">
                        <button class="btn-new">Editar</button>
                    </a>
                </td>
                <td>
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline-form">
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