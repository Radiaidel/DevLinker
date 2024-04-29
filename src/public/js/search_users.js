document.addEventListener('DOMContentLoaded', function() {
    var seeAllLink = document.getElementById('see-all');
    var popup = document.getElementById('popup');

    seeAllLink.addEventListener('click', function() {
        popup.classList.remove('hidden');

    });

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
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var users = JSON.parse(xhr.responseText);
                displaySearchResults(users);
            }
        };
        xhr.open('GET', '/search-users?term=' + searchTerm, true);
        xhr.send();
    }



    function displaySearchResults(users) {
        searchResultsContainer.innerHTML = '';

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
