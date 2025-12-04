@extends('layouts.padrao')
@section('title', 'Selecionar Dispositivo')

@section('content')

<div class="quiz-modal">
    <h3>Selecionar Dispositivo Atual</h3>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if($dispositivoAtual)
        <p class="info-message">
            Dispositivo atual: <strong>ID {{ $dispositivoAtual }}</strong>
        </p>
    @endif

    <form method="POST" action="{{ route('dispositivos.definir') }}">
        @csrf

        <div class="form-group">
            <label>Escolha o Dispositivo:</label>
            <select name="dispositivo_id" required>
                <option value="">Selecione um dispositivo</option>
                @foreach($dispositivos as $dispositivo)
                    <option 
                        value="{{ $dispositivo->id }}"
                        {{ $dispositivoAtual == $dispositivo->id ? 'selected' : '' }}
                    >
                        ID {{ $dispositivo->id }} - {{ $dispositivo->descricao }}
                        @if($dispositivo->setor)
                            ({{ $dispositivo->setor->descricao }})
                        @endif
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Definir como Atual</button>
    </form>
</div>

@endsection