<script src="{{ asset('js/doc_analytics.js') }}" defer></script>

<div class="col-span-12   border border-stroke bg-white p-6 rounded-xl shadow-md xl:col-span-4">
    <div id="medias" data-medias="{{ json_encode($mediaPercentages) }}"></div>

    <canvas id="donutChart" width="400" height="470" class="mx-auto "></canvas>

</div>
