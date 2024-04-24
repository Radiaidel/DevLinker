var mediaPercentages = JSON.parse(document.getElementById('medias').getAttribute('data-medias'));

// Vérifier que les données existent avant de les utiliser
if (typeof mediaPercentages !== 'undefined' && Object.keys(mediaPercentages).length > 0) {
    var ctx = document.getElementById('donutChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: Object.keys(mediaPercentages),
            datasets: [{
                data: Object.values(mediaPercentages),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    // Ajoutez plus de couleurs au besoin
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    // Ajoutez plus de couleurs au besoin
                ],
                borderWidth: 1
            }]
        },
        options: {
            cutout: '70%', // Pourcentage du graphique qui est découpé
            responsive: false,
            plugins: {
                legend: {
                    position: 'bottom' // Déplacer la légende en bas du graphique
                },
                title: {
                    display: true,
                    text: 'Pourcentage de types de médias par rapport aux projets'
                }
            }
        }
    });
}

    