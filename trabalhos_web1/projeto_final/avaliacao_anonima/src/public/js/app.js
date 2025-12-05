document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('relatorios-container');
    
    if (!container) {
        console.error('Container #relatorios-container não encontrado.');
        return;
    }

    const baseUrl = container.getAttribute('data-url');
    
    const urlParams = new URLSearchParams(window.location.search);
    const setorId = urlParams.get('setor_id') || '';
    
    fetch(`${baseUrl}?setor_id=${setorId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na resposta da rede');
            }
            return response.json();
        })
        .then(data => {
            
            const ctxPergunta = document.getElementById('graficoPergunta');
            if (ctxPergunta) {
                const labelsPergunta = data.mediasPorPergunta.map(item => {
                    const texto = item.pergunta_texto || item.pergunta || 'Questão'; 
                    return texto.substring(0, 30) + '...';
                });

                new Chart(ctxPergunta.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: labelsPergunta,
                        datasets: [{
                            label: 'Média de Notas',
                            data: data.mediasPorPergunta.map(item => item.media),
                            backgroundColor: '#1976d2',
                            borderColor: '#125aa0',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 10
                            }
                        },
                        plugins: {
                            legend: { display: false }
                        }
                    }
                });
            }
            const ctxSetor = document.getElementById('graficoSetor');
            if (ctxSetor && data.mediasPorSetor && data.mediasPorSetor.length > 0) {
                
                const labelsSetor = data.mediasPorSetor.map(item => item.descricao || item.setor);

                new Chart(ctxSetor.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: labelsSetor,
                        datasets: [{
                            label: 'Média por Setor',
                            data: data.mediasPorSetor.map(item => item.media),
                            backgroundColor: [
                                '#1976d2', '#43a047', '#fb8c00', 
                                '#d32f2f', '#7b1fa2', '#00897b'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 10
                            }
                        },
                        plugins: {
                            legend: { display: false }
                        }
                    }
                });
            }
        })
        .catch(error => console.error('Erro ao carregar gráficos:', error));
});