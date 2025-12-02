@extends('layouts.padrao')
@section('title', 'Novo Setor')

@section('content')

<div class="quiz-modal">
    <h3>Cadastrar Setor</h3>

    <form method="POST" action="{{ route('setores.store') }}">
        @csrf

        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="descricao" class="form-control"
                style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;"
                value="{{ old('descricao') }}">

            @error('descricao')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button>Cadastrar</button>
    </form>
</div>

@endsection
