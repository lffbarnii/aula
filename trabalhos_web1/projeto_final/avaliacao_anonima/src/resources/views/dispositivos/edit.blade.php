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
            <input type="text" name="descricao" value="{{ $dispositivo->descricao }}">
        </div>

        <div class="form-group">
            <label>
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1" {{ $dispositivo->status ? 'checked' : '' }}>
                <span>Ativo</span>
            </label>
        </div>

        <div class="form-group">
            <label>Setor:</label>
            <select name="setor_id">
                <option value="">Nenhum</option>
                @foreach ($setores as $s)
                    <option value="{{ $s->id }}" {{ $dispositivo->setor_id == $s->id ? 'selected' : '' }}>
                        {{ $s->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Salvar</button>
    </form>
</div>

@endsection