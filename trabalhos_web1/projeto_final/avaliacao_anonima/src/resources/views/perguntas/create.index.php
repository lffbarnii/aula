@extends('layouts.padrao')
@section('title', 'Nova Pergunta')

@section('content')

<div class="quiz-modal">
    <h3>Criar Pergunta</h3>

    <form method="POST" action="{{ route('perguntas.store') }}">
        @csrf

        <div class="form-group">
            <label>Texto:</label>
            <textarea name="texto">{{ old('texto') }}</textarea>
        </div>

        <div class="form-group">
            <label>Ordem:</label>
            <input type="number" name="ordem"
            style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;">
        </div>

        <div class="form-group">
            <label>Status:</label><br>
            <input type="checkbox" name="status" checked> Ativa
        </div>

        <div class="form-group">
            <label>Setor:</label>
            <select name="setor_id"
            style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;">
                <option value="">Nenhum</option>
                @foreach ($setores as $s)
                    <option value="{{ $s->id }}">{{ $s->descricao }}</option>
                @endforeach
            </select>
        </div>

        <button>Cadastrar</button>
    </form>
</div>

@endsection
