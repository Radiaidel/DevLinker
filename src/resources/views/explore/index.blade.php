@extends('layouts.app')

@section('content')
<div class="flex justify-center mt-6">


    <div class='max-w-md mx-auto w-[60%]'>
        <div class="relative flex items-center w-full h-12 rounded-full shadow-md focus-within:shadow-lg bg-white overflow-hidden">
            <div class="grid place-items-center h-full w-12 text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <input class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text" id="searchInput" placeholder="Search something.." />
        </div>
    </div>
</div>


<div class="p-5 sm:p-8">
    <div id="projects-container"class="columns-1 gap-5 sm:columns-2 sm:gap-8 md:columns-2 lg:columns-3">
    @include('feed.projects')
    </div>
    <div id="loading" class="hidden">..</div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('input', function() {
            const searchText = this.value.trim();
            if (searchText.length >= 2) {
                // Effectuer une requête Ajax pour récupérer les projets correspondants
                fetchProjects(searchText);
            } else if (searchText.length == '') {
                // Si la longueur du texte de recherche est inférieure à 2, affichez à nouveau tous les projets
                resetProjects();
            }
        });

        function fetchProjects(searchText) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '{{ route("projects.search") }}', true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector('meta[name="csrf-token"]').content);

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Manipulez les données récupérées (projets) et affichez-les dans la vue
                        document.getElementById('projects-container').innerHTML = xhr.responseText;
                    } else {
                        console.error('Request failed with status:', xhr.status);
                    }
                }
            };

            xhr.send('search=' + encodeURIComponent(searchText));
        }

        function resetProjects() {
            // Rechargez la page pour afficher à nouveau tous les projets
            location.reload();
        }
    });
</script>
@endsection