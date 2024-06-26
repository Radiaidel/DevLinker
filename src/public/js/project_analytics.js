var projectsPerDayData = JSON.parse(document.getElementById('projectsPerDay').getAttribute('data-projects-per-day'));

var dates = projectsPerDayData.map(function(item) {
    return item.date;
});
var totals = projectsPerDayData.map(function(item) {
    return item.total;
});

var ctx = document.getElementById('barChart').getContext('2d');

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

