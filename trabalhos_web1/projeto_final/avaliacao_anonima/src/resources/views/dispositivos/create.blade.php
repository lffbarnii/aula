@extends('layouts.padrao')
@section('title', 'Novo Dispositivo')

@section('content')

<div class="quiz-modal">
    <h3>Cadastrar Dispositivo</h3>

    <form method="POST" action="{{ route('dispositivos.store') }}">
        @csrf

        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="descricao" value="{{ old('descricao') }}">
        </div>

        <div class="form-group">
            <label>
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" checked>
                <span>Ativo</span>
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