@extends('layouts.padrao')
@section('title', 'Editar Usuário')

@section('content')
<div class="container">

    <h1>Editar Usuário</h1>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Login:</label>
            <input type="text" name="login" value="{{ $usuario->login }}" required>
        </div>

        <div class="form-group">
            <label>Senha (deixe em branco para não alterar):</label>
            <input type="password" name="senha">
        </div>

        <button type="submit">Atualizar</button>
    </form>

    <br>

    <a href="{{ route('usuarios.index') }}">
        <button>Voltar</button>
    </a>

</div>
@endsection
