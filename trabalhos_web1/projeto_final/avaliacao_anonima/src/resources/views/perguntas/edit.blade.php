@extends('layouts.padrao')
@section('title', 'Editar Pergunta')

@section('content')

<div class="quiz-modal">
    <h3>Editar Pergunta</h3>

    <form method="POST" action="{{ route('perguntas.update', $pergunta->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Texto:</label>
            <textarea name="texto" rows="4">{{ $pergunta->texto }}</textarea>
        </div>

        <div class="form-group">
            <label>Ordem:</label>
            <input type="number" name="ordem" value="{{ $pergunta->ordem }}">
        </div>

        <div class="form-group">
            <label>
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1" {{ $pergunta->status ? 'checked' : '' }}>
                <span>Ativa</span>
            </label>
        </div>

        <div class="form-group">
            <label>Setor:</label>
            <select name="setor_id">
                <option value="">Nenhum</option>
                @foreach ($setores as $s)
                    <option value="{{ $s->id }}" {{ $pergunta->setor_id == $s->id ? 'selected' : '' }}>
                        {{ $s->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Salvar</button>
    </form>
</div>

@endsection