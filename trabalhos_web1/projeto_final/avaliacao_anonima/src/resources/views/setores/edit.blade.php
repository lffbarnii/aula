@extends('layouts.padrao')
@section('title', 'Editar Setor')

@section('content')

<div class="quiz-modal">
    <h3>Editar Setor</h3>

    <form method="POST" action="{{ route('setores.update', $setor->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="descricao" value="{{ $setor->descricao }}">
            @error('descricao')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Salvar</button>
    </form>
</div>

@endsection