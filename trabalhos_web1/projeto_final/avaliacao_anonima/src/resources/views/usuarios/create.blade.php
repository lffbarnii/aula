@extends('layouts.padrao')
@section('title', 'Cadastrar Usuário')

@section('content')

<div class="quiz-modal">
    <h3>Criar Usuário</h3>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Login:</label>
            <input type="text" name="login" required>
        </div>

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" required>
        </div>

        <button type="submit">Salvar</button>
    </form>

    <div class="actions">
        <a href="{{ route('usuarios.index') }}">
            <button type="button">Voltar</button>
        </a>
    </div>
</div>

@endsection