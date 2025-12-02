@extends('layouts.padrao')
@section('title', 'Novo Dispositivo')

@section('content')

<div class="quiz-modal">
    <h3>Cadastrar Dispositivo</h3>

    <form method="POST" action="{{ route('dispositivos.store') }}">
        @csrf

        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="descricao"
            style="width:100%; padding:10px; border-radius:6px; border:1px solid #ccc;">
        </div>

        <div class="form-group">
            <label>Status:</label><br>
            <input type="checkbox" name="status" checked>
            <span>Ativo</span>
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
