@extends('layouts.padrao')
@section('title', 'Cadastrar Usuário')

@section('content')
<div class="container">

    <h1>Criar Usuário</h1>

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

    <br>

    <a href="{{ route('usuarios.index') }}">
        <button>Voltar</button>
    </a>

</div>
@endsection
