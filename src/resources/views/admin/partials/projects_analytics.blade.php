<div class="col-span-12 p-6 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8">
    <div id="projectsPerDay" data-projects-per-day="{{ json_encode($projectsPerDay) }}"></div>

    <canvas id="barChart" width="400" height="180"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Récupérer les données du nombre total de projets créés par jour depuis l'attribut data-projects-per-day
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
    </script>
</div>
        