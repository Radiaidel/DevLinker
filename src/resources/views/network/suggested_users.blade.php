<div class="flex flex-col  pt-7 pb-4 mt-5 w-full bg-white rounded">
    <div class="flex gap-5 px-5 uppercase">
        <div class="flex-auto text-xs text-neutral-900">Suggested for YOU</div>
        <div class="text-xs text-right text-sky-800 cursor-pointer" id="see-all">See all</div>

        <div id="popup" class="hidden z-50 fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex justify-center items-center">
            <div class='max-w-md mx-auto w-[60%]'>
                <div class="relative flex items-center w-full h-12 rounded-full shadow-md focus-within:shadow-lg bg-white overflow-hidden">
                    <div class="grid place-items-center h-full w-12 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <input id="search-input" class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text" placeholder="Search users.." />
                </div>
                <div id="searchResultsContainer"></div>
            </div>
        </div>
    </div>
    <div class="shrink-0 mt-4 h-px border border-solid bg-zinc-100 border-zinc-100"></div>
    @foreach($suggestedUsers as $user)
    <div class="flex gap-5 justify-between px-3.5 py-1.5 mt-3 w-full whitespace-nowrap bg-white rounded-md border border-solid border-zinc-100">
        <div class="flex gap-2.5 text-xs text-neutral-900">
            @if($user->profile && $user->profile->profile_image)
            <img src="{{ asset('storage/profile/' . $user->profile->profile_image) }}" class="shrink-0 aspect-square w-[52px] rounded-full" />
            @else
            <img src="{{ asset('storage/profile/unknown.png') }}" class="shrink-0 aspect-square w-[52px] rounded-full" />
            @endif
            <div class="my-auto text-sm">{{ $user->name }}</div>
        </div>
        <div class="my-auto text-xs text-right text-sky-800 uppercase">
            <form action="{{ route('connect.send') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <button type="submit">CONNECT</button>
            </form>
        </div>

    </div>
    @endforeach


    <script>
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
                users.forEach(function(user) {
                    var userCard = document.createElement('a');
                    userCard.href = "{{ route('profile.show', ['user' => ':userId']) }}".replace(':userId', user.id); // Remplacez :userId par l'ID de l'utilisateur
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
    </script>
</div>