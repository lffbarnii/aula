import './bootstrap';
document.addEventListener('DOMContentLoaded', function() {
    const setorId = "{{ request('setor_id') ?? '' }}";
    
    fetch(`{{ route('relatorios.dados') }}?setor_id=${setorId}`)
        .then(response => response.json())
        .then(data => {
            const ctxPergunta = document.getElementById('graficoPergunta').getContext('2d');
            new Chart(ctxPergunta, {
                type: 'bar',
                data: {
                    labels: data.mediasPorPergunta.map(item => item.pergunta.substring(0, 30) + '...'),
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
                        legend: {
                            display: false
                        }
                    }
                }
            });
            if (data.mediasPorSetor.length > 0) {
                const ctxSetor = document.getElementById('graficoSetor').getContext('2d');
                new Chart(ctxSetor, {
                    type: 'doughnut',
                    data: {
                        labels: data.mediasPorSetor.map(item => item.setor),
                        datasets: [{
                            label: 'Média por Setor',
                            data: data.mediasPorSetor.map(item => item.media),
                            backgroundColor: [
                                '#1976d2',
                                '#43a047',
                                '#fb8c00',
                                '#d32f2f',
                                '#7b1fa2',
                                '#00897b'
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }
                });
            }
        });
});