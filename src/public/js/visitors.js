window.onload = function () {
    var visitorsData = document.getElementById('visitors').getAttribute('data-visitors');
    var visitors = JSON.parse(visitorsData);

    var visitorsByDay = {};

    visitors.forEach(function(visitor) {
        var date = visitor.date;
        var count = visitor.total_visitors;
        if (visitorsByDay[date]) {
            visitorsByDay[date] += count;
        } else {
            visitorsByDay[date] = count;
        }
    });

    var labels = Object.keys(visitorsByDay);
    var data = Object.values(visitorsByDay);

    var ctx = document.getElementById('myChartCanvas').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nombre de visiteurs par jour',
                data: data,
                borderColor: 'rgb(75, 192, 192)',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
}
