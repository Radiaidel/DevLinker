@extends('layouts.app')

@section('content')
<div class="flex justify-center mt-6">
    <div class="w-[60%]">
        <input type="text" id="searchInput" placeholder="Rechercher des projets..." class="w-full px-4 py-2 border bg-gray-300 text-white border-gray-500 rounded-full ">
    </div>
</div>
<div class="grid grid-cols-3 gap-4 row-gap-1 grid-rows-auto flex items-start w-[80%] mx-auto" id="projectsContainer">

    @foreach($projects as $project)

    @include('feed.projects')
    @endforeach
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
                        document.getElementById('projectsContainer').innerHTML = xhr.responseText;
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