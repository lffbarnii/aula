@extends('layouts.padrao')
@section('title', 'Editar Dispositivo')

@section('content')

<div class="quiz-modal">
    <h3>Editar Dispositivo</h3>

    <form method="POST" action="{{ route('dispositivos.update', $dispositivo->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="descricao"
                style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;"
                value="{{ $dispositivo->descricao }}">
        </div>

        <div class="form-group">
            <label>Status:</label><br>
            <input type="hidden" name="status" value="0">
            <input type="checkbox" name="status" value="1" {{ $dispositivo->status ? 'checked' : '' }}>
            <span>Ativo</span>
        </div>

        <div class="form-group">
            <label>Setor:</label>
            <select name="setor_id"
                style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;">
                <option value="">Nenhum</option>
                @foreach($setores as $s)
                    <option value="{{ $s->id }}" 
                        {{ $dispositivo->setor_id == $s->id ? 'selected' : '' }}>
                        {{ $s->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <button>Salvar</button>
    </form>
</div>

@endsection
