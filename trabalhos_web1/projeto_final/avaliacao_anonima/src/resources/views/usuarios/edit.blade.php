@extends('layouts.padrao')
@section('title', 'Editar Usuário')

@section('content')

<div class="quiz-modal">
    <h3>Editar Usuário</h3>

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

    <div class="actions">
        <a href="{{ route('usuarios.index') }}">
            <button type="button">Voltar</button>
        </a>
    </div>
</div>

@endsection