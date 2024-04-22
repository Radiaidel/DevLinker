document.addEventListener('DOMContentLoaded', function() {
    // Récupérer les éléments nécessaires
    var seeAllLink = document.getElementById('see-all');
    var popup = document.getElementById('popup');

    // Ajouter un écouteur d'événements pour le clic sur "See all"
    seeAllLink.addEventListener('click', function() {
        popup.classList.remove('hidden');

    });

    // Ajouter un écouteur d'événements pour le clic en dehors du popup pour le fermer
    window.addEventListener('click', function(event) {
        if (event.target == popup) {
            popup.classList.add('hidden');
        }
    });





    var searchInput = document.getElementById('search-input');

    searchInput.addEventListener('input', function() {
        var searchTerm = searchInput.value.trim();

        if (searchTerm.length > 0) {
            fetchUsers(searchTerm);
        }
    });

    function fetchUsers(searchTerm) {
        // Effectuer une requête AJAX pour récupérer les utilisateurs ayant le même nom que searchTerm
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Traitement de la réponse de la requête AJAX
                var users = JSON.parse(xhr.responseText);
                displaySearchResults(users);
            }
        };
        xhr.open('GET', '/search-users?term=' + searchTerm, true);
        xhr.send();
    }



    function displaySearchResults(users) {
        // Effacer les résultats précédents
        searchResultsContainer.innerHTML = '';

        // Créer et afficher les résultats pour chaque utilisateur
        var profileRoute = "/profile/:userId";
        users.forEach(function(user) {
            var userCard = document.createElement('a');
            var userId = user.id;
            var profileUrl = profileRoute.replace(':userId', userId);
            userCard.href = profileUrl;
            userCard.classList.add('flex', 'gap-5', 'justify-between', 'px-3.5', 'py-1.5', 'mt-3', 'w-full', 'whitespace-nowrap', 'bg-white', 'rounded-md', 'border', 'border-solid', 'border-zinc-100');
            userCard.innerHTML = `
                <div class="flex gap-2.5 text-xs text-neutral-900">
                    <img src="{{asset('storage/profile/${user.profile.profile_image}')}}" alt="${user.name}" class="shrink-0 aspect-square w-12 rounded-full" />
                    <div class="my-auto text-sm">${user.name}</div>
                </div>
            `;
            searchResultsContainer.appendChild(userCard);
        });
        
    }
});
