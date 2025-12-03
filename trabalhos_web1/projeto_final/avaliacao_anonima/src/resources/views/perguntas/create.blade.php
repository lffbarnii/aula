@extends('layouts.padrao')
@section('title', 'Nova Pergunta')

@section('content')

<div class="quiz-modal">
    <h3>Criar Pergunta</h3>

    <form method="POST" action="{{ route('perguntas.store') }}">
        @csrf

        <div class="form-group">
            <label>Texto:</label>
            <textarea name="texto" rows="4">{{ old('texto') }}</textarea>
        </div>

        <div class="form-group">
            <label>Ordem:</label>
            <input type="number" name="ordem" value="{{ old('ordem') }}">
        </div>

        <div class="form-group">
            <label>
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" checked>
                <span>Ativa</span>
            </label>
        </div>

        <div class="form-group">
            <label>Setor:</label>
            <select name="setor_id">
                <option value="">Nenhum</option>
                @foreach ($setores as $s)
                    <option value="{{ $s->id }}">{{ $s->descricao }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</div>

@endsection