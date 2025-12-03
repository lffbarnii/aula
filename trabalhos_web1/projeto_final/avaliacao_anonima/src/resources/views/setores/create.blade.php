@extends('layouts.padrao')
@section('title', 'Novo Setor')

@section('content')

<div class="quiz-modal">
    <h3>Cadastrar Setor</h3>

    <form method="POST" action="{{ route('setores.store') }}">
        @csrf

        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="descricao" value="{{ old('descricao') }}">
            @error('descricao')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</div>

@endsection