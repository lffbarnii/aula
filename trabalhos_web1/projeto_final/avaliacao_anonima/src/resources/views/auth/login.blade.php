@extends('layouts.padrao')
@section('title', 'Login')

@section('content')

<div class="quiz-modal">
    <h3>Login</h3>

    @if ($errors->any())
        <p class="error">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>Login:</label>
            <input type="text" name="login" value="{{ old('login') }}" required autofocus>
        </div>

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>
</div>

@endsection