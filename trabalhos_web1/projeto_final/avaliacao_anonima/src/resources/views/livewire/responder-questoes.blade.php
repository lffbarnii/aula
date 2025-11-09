<div class="quiz-page">
    <div class="quiz-modal">
        @if ($finalizado)
            <div class="finalizado">
                <h2>Obrigado!</h2>
                <p>Sua avaliação foi registrada. Agradecemos o feedback.</p>
            </div>
        @else
            <div class="questao">
                <h3>Questão {{ $perguntaAtual->ordem ?? ($index + 1) }}</h3>
                <p>{{ $perguntaAtual->texto }}</p>
            </div>

            <form wire:submit.prevent="responder" class="form-resposta">
                <div class="form-group">
                    <label for="nota">Nota (0 a 10)</label>
                    <select id="nota" wire:model.defer="nota" required>
                        <option value="" selected>-- selecione --</option>
                        @for ($i = 0; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    @error('nota') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="texto">Comentário (opcional)</label>
                    <textarea id="texto" wire:model.defer="texto" rows="3" placeholder="Comentário..."></textarea>
                    @error('texto') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="actions">
                    <button type="submit" wire:loading.attr="disabled" wire:target="responder">
                        <span wire:loading.remove wire:target="responder">Enviar</span>
                        <span wire:loading wire:target="responder">Enviando...</span>
                    </button>
                </div>
            </form>
        @endif
    </div>
</div>
