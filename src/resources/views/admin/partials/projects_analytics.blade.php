<script src="{{ asset('js/project_analytics.js') }}" defer></script>

<div class="col-span-12 p-6 rounded-xl shadow-md  border border-stroke bg-white px-5 pb-5 pt-7.5  xl:col-span-8">
    <div id="projectsPerDay" data-projects-per-day="{{ json_encode($projectsPerDay) }}"></div>

    <canvas id="barChart" width="400" height="180"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</div>
        