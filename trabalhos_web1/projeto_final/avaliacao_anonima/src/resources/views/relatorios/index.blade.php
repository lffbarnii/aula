@extends('layouts.padrao')
@section('title', 'Relatórios e Análises')

@section('content')

<div class="quiz-modal">
    <h3>Painel de Avaliações</h3>

    <form method="GET" action="{{ route('relatorios.index') }}" class="filtro-form">
        <div class="form-group">
            <label>Filtrar por Setor:</label>
            <select name="setor_id" onchange="this.form.submit()">
                <option value="">Todos os Setores</option>
                @foreach($setores as $setor)
                    <option value="{{ $setor->id }}" {{ request('setor_id') == $setor->id ? 'selected' : '' }}>
                        {{ $setor->descricao }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <div class="stats-grid">
        <div class="stat-card">
            <h4>Total de Respostas</h4>
            <p class="stat-number">{{ $totalRespostas }}</p>
        </div>
        <div class="stat-card">
            <h4>Média Geral</h4>
            <p class="stat-number">{{ number_format($mediaGeral ?? 0, 2) }}</p>
        </div>
        <div class="stat-card">
            <h4>Setor Selecionado</h4>
            <p class="stat-text">{{ $setorSelecionado->descricao ?? 'Todos' }}</p>
        </div>
    </div>

    <div class="graficos-container">
        <div class="grafico-box">
            <h4>Média por Pergunta</h4>
            <canvas id="graficoPergunta"></canvas>
        </div>

        <div class="grafico-box">
            <h4>Média por Setor</h4>
            <canvas id="graficoSetor"></canvas>
        </div>
    </div>

    <div class="tabela-secao">
        <h4>Médias Detalhadas por Pergunta</h4>
        <table>
            <thead>
                <tr>
                    <th>Pergunta</th>
                    <th class="center">Média</th>
                    <th class="center">Total Respostas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mediasPorPergunta as $media)
                <tr>
                    <td>{{ $media->pergunta_texto }}</td>
                    <td class="center">{{ number_format($media->media, 2) }}</td>
                    <td class="center">{{ $media->total }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="center">Nenhuma resposta encontrada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(!request('setor_id'))
    <div class="tabela-secao">
        <h4>Médias por Setor</h4>
        <table>
            <thead>
                <tr>
                    <th>Setor</th>
                    <th class="center">Média</th>
                    <th class="center">Total Respostas</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mediasPorSetor as $media)
                <tr>
                    <td>{{ $media->descricao }}</td>
                    <td class="center">{{ number_format($media->media, 2) }}</td>
                    <td class="center">{{ $media->total }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="center">Nenhum dado encontrado</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif

    <div class="tabela-secao">
        <h4>Respostas Recentes</h4>
        <table>
            <thead>
                <tr>
                    <th>Data/Hora</th>
                    <th>Pergunta</th>
                    <th class="center">Nota</th>
                    <th>Dispositivo</th>
                    <th>Setor</th>
                    <th>Comentário</th>
                </tr>
            </thead>
            <tbody>
                @forelse($respostasRecentes as $resposta)
                <tr>
                    <td>{{ $resposta->data_resposta->format('d/m/Y H:i') }}</td>
                    <td>{{ Str::limit($resposta->pergunta->texto, 40) }}</td>
                    <td class="center">
                        <span class="nota-badge nota-{{ $resposta->nota }}">{{ $resposta->nota }}</span>
                    </td>
                    <td>{{ $resposta->dispositivo->descricao }}</td>
                    <td>{{ $resposta->dispositivo->setor->descricao ?? '-' }}</td>
                    <td>{{ $resposta->texto ? Str::limit($resposta->texto, 30) : '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="center">Nenhuma resposta recente</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="{{ asset('js/relatorios.js') }}"></script>
@endsection