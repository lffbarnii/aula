<div class="quiz-page">
    <div class="quiz-modal">
        {{-- Mensagem final --}}
        @if ($finalizado)
            <div class="finalizado">
                <h2>O Estabelecimento agradece sua resposta!</h2>
                <p>Ela é muito importante para nós, pois nos ajuda a melhorar continuamente nossos serviços.</p>
            </div>

        {{-- Etapa de feedback aberto --}}
        @elseif ($modoFeedback)
            <div class="feedback">
                <h3>Deixe um comentário geral</h3>
                <p>Quer compartilhar algo sobre sua experiência? (opcional)</p>

                <form wire:submit.prevent="enviarFeedback">
                    <textarea wire:model.defer="feedbackTexto" rows="5" placeholder="Escreva aqui..."></textarea>

                    <div class="actions">
                        <button type="submit" wire:loading.attr="disabled" wire:target="responder">
                            <span wire:loading.remove wire:target="responder">Enviar</span>
                            <span wire:loading wire:target="responder">Enviando...</span>
                        </button>
                    </div>

                </form>
            </div>

        {{-- Etapa das perguntas --}}
        @else
            <div class="questao">
                <h3>Pergunta {{ $index + 1 }}</h3>
                @if ($perguntaAtual)
                    <p>{{ $perguntaAtual->texto }}</p>
                @else
                    <p>Carregando pergunta...</p>
                @endif
            </div>

            <form wire:submit.prevent="responder" class="form-resposta">
                <div class="form-group">
                    <label>Nota (0 a 10)</label>
                    <div class="escala-nota">
                        @for ($i = 0; $i <= 10; $i++)
                            <button
                                type="button"
                                wire:click="$set('nota', {{ $i }})"
                                wire:loading.attr="disabled"
                                wire:target="$set('nota', {{ $i }})"
                                class="{{ $nota === $i ? 'selecionado' : '' }}"
                            >
                                <span wire:loading.remove wire:target="$set('nota', {{ $i }})">
                                    {{ $i }}
                                </span>
                                <span wire:loading wire:target="$set('nota', {{ $i }})">
                                    Carregando...
                                </span>
                            </button>
                        @endfor
                    </div>

                    @error('nota') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="texto">Comentário (opcional)</label>
                    <textarea id="texto" wire:model.defer="texto" rows="3" placeholder="Comentário..."></textarea>
                    @error('texto') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="actions">
                    <div class="actions">
                        <button type="submit" wire:loading.attr="disabled">
                            <span wire:loading.remove>Enviar</span>
                            <span wire:loading>Carregando...</span>
                        </button>  
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
