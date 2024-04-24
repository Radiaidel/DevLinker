var projectsPerDayData = JSON.parse(document.getElementById('projectsPerDay').getAttribute('data-projects-per-day'));

// Extraire les dates et les totaux de projets créés par jour
var dates = projectsPerDayData.map(function(item) {
    return item.date;
});
var totals = projectsPerDayData.map(function(item) {
    return item.total;
});

// Récupérer le canvas pour dessiner le graphique
var ctx = document.getElementById('barChart').getContext('2d');

// Créer le graphique à barres
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: dates,
        datasets: [{
            label: 'Nombre total de projets créés par jour',
            data: totals,
            backgroundColor: 'rgba(75, 192, 192, 0.7)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

