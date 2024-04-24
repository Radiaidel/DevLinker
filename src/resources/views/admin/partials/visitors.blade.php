<div class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-8">
    <div id="visitors" data-visitors="{{ json_encode($visitorsPerDay) }}"></div>
    <div id="chartContainer" style="height: 370px; width: 100%;">
        <canvas id="myChartCanvas"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
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
    </script>
</div>
