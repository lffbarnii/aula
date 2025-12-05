@extends('layouts.padrao')
@section('title', 'Feedbacks')

@section('content')

<div class="quiz-modal">
    <h3>Feedbacks dos Usuários</h3>

    <form method="GET" action="{{ route('feedbacks.index') }}" class="filtro-form">
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
            <h4>Total de Feedbacks</h4>
            <p class="stat-number">{{ $totalFeedbacks }}</p>
        </div>
        <div class="stat-card">
            <h4>Setor Selecionado</h4>
            <p class="stat-text">{{ $setorSelecionado->descricao ?? 'Todos' }}</p>
        </div>
        <div class="stat-card">
            <h4>Nesta Página</h4>
            <p class="stat-number">{{ $feedbacks->count() }}</p>
        </div>
    </div>

    @if(!request('setor_id') && $feedbacksPorSetor->isNotEmpty())
    <div class="tabela-secao">
        <h4>Feedbacks por Setor</h4>
        <table>
            <thead>
                <tr>
                    <th>Setor</th>
                    <th class="center">Total de Feedbacks</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacksPorSetor as $item)
                <tr>
                    <td>{{ $item->descricao }}</td>
                    <td class="center">{{ $item->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div class="feedbacks-lista">
        <h4>Lista de Feedbacks <span class="total-badge">{{ $feedbacks->total() }}</span></h4>
        
        @forelse($feedbacks as $feedback)
        <div class="feedback-card">
            <div class="feedback-meta">
                <div class="feedback-left">
                    <span class="feedback-id">#{{ $feedback->id }}</span>
                    <span class="feedback-dispositivo">{{ $feedback->dispositivo->descricao }}</span>
                    <span class="feedback-setor">{{ $feedback->dispositivo->setor->descricao ?? 'Sem setor' }}</span>
                </div>
                <div class="feedback-right">
                    <span class="feedback-data">{{ $feedback->data_feedback->format('d/m/Y') }}</span>
                    <span class="feedback-hora">{{ $feedback->data_feedback->format('H:i') }}</span>
                </div>
            </div>
            <div class="feedback-conteudo">
                <p>{{ $feedback->texto }}</p>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            <p>Nenhum feedback encontrado</p>
        </div>
        @endforelse
    </div>

    @if($feedbacks->hasPages())
    <div class="pagination-wrapper">
        <div class="pagination-info">
            Mostrando {{ $feedbacks->firstItem() }} - {{ $feedbacks->lastItem() }} de {{ $feedbacks->total() }}
        </div>
        <div class="pagination-container">
            {{ $feedbacks->appends(request()->query())->links() }}
        </div>
    </div>
    @endif
</div>

@endsection