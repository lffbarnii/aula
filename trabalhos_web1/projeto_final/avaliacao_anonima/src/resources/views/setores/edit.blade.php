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
            <input type="text" name="descricao"
                style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;"
                value="{{ $setor->descricao }}">
        </div>

        @error('descricao')
            <p class="error">{{ $message }}</p>
        @enderror

        <button>Salvar</button>
    </form>
</div>

@endsection
