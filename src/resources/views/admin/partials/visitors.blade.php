<script src="{{ asset('js/visitors.js') }}" defer></script>

<div class="col-span-12 p-6 rounded-xl shadow-md border border-stroke bg-white px-5 pb-5 pt-7.5  xl:col-span-8">
    <div id="visitors" data-visitors="{{ json_encode($visitorsPerDay) }}"></div>
    <div id="chartContainer" >
        <canvas id="myChartCanvas" style="height: 470px; width: 100%;"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</div>
