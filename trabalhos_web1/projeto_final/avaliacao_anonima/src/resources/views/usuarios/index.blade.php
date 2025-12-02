@extends('layouts.padrao')
@section('title', 'Usuários')

@section('content')
<div class="container">

    <h1>Lista de Usuários</h1>

    <a href="{{ route('usuarios.create') }}">
        <button>Criar novo usuário</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->login }}</td>

                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}">
                            <button>Editar</button>
                        </a>

                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>
@endsection
