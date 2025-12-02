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
            <textarea name="texto">{{ $pergunta->texto }}</textarea>
        </div>

        <div class="form-group">
            <label>Ordem:</label>
            <input type="number" name="ordem"
                style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;"
                value="{{ $pergunta->ordem }}">
        </div>

        <div class="form-group">
            <label>Status:</label><br>
            <input type="hidden" name="status" value="0">
            <input type="checkbox" name="status" value="1" {{ $pergunta->status ? 'checked' : '' }}>
        </div>

        <div class="form-group">
            <label>Setor:</label>
            <select name="setor_id"
                style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;">
                <option value="">Nenhum</option>
                @foreach ($setores as $s)
                    <option value="{{ $s->id }}"
                        {{ $pergunta->setor_id == $s->id ? 'selected' : '' }}>
                        {{ $s->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <button>Salvar</button>
    </form>
</div>

@endsection
