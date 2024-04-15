<nav class="flex justify-between pr-10 w-full bg-white shadow-sm max-md:flex-wrap max-md:pr-5 max-md:max-w-full">
    <div class="flex items-center px-5 py-4 bg-white">
        <img src="{{ asset('storage/images/devlinker_logo.png') }}" class="w-36" />
    </div>
    <div class="max-md:hidden flex  gap-1.5 items-center">
        <a href="{{ route('feed') }}" class="shrink-0 aspect-[1.12] w-[90px] flex flex-col justify-center items-center {{ request()->routeIs('feed') ? 'border-b border-sky-800 border-b-2': '' }}">
            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.4498 10.275L11.9998 3.1875L2.5498 10.275L2.9998 11.625H3.7498V20.25H20.2498V11.625H20.9998L21.4498 10.275ZM5.2498 18.75V10.125L11.9998 5.0625L18.7498 10.125V18.75H14.9999V14.3333L14.2499 13.5833H9.74988L8.99988 14.3333V18.75H5.2498ZM10.4999 18.75H13.4999V15.0833H10.4999V18.75Z" fill=" {{ request()->routeIs('feed') ? '#075985' : '#080341' }}" />
                </g>

            </svg>
            <strong class="uppercase text-xs {{ request()->routeIs('feed') ? 'text-sky-800' : 'hidden' }}">
                home
            </strong>
        </a>
        <a href="{{ route('network') }}" class="shrink-0 aspect-[1.12] w-[90px] flex flex-col justify-center items-center {{ request()->routeIs('network') ? 'border-b border-sky-800 border-b-2' : '' }}">
            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <g clip-path="url(#clip0_1251_98416)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 0C5.96243 0 3.5 2.46243 3.5 5.5C3.5 8.53757 5.96243 11 9 11C12.0376 11 14.5 8.53757 14.5 5.5C14.5 2.46243 12.0376 0 9 0ZM5.5 5.5C5.5 3.567 7.067 2 9 2C10.933 2 12.5 3.567 12.5 5.5C12.5 7.433 10.933 9 9 9C7.067 9 5.5 7.433 5.5 5.5Z" fill=" {{ request()->routeIs('network') ? '#075985' : '#080341' }}" />
                        <path d="M15.5 0C14.9477 0 14.5 0.447715 14.5 1C14.5 1.55228 14.9477 2 15.5 2C17.433 2 19 3.567 19 5.5C19 7.433 17.433 9 15.5 9C14.9477 9 14.5 9.44771 14.5 10C14.5 10.5523 14.9477 11 15.5 11C18.5376 11 21 8.53757 21 5.5C21 2.46243 18.5376 0 15.5 0Z" fill=" {{ request()->routeIs('network') ? '#075985' : '#080341' }}" />
                        <path d="M19.0837 14.0157C19.3048 13.5096 19.8943 13.2786 20.4004 13.4997C22.5174 14.4246 24 16.538 24 19V21C24 21.5523 23.5523 22 23 22C22.4477 22 22 21.5523 22 21V19C22 17.3613 21.0145 15.9505 19.5996 15.3324C19.0935 15.1113 18.8625 14.5217 19.0837 14.0157Z" fill=" {{ request()->routeIs('network') ? '#075985' : '#080341' }}" />
                        <path d="M6 13C2.68629 13 0 15.6863 0 19V21C0 21.5523 0.447715 22 1 22C1.55228 22 2 21.5523 2 21V19C2 16.7909 3.79086 15 6 15H12C14.2091 15 16 16.7909 16 19V21C16 21.5523 16.4477 22 17 22C17.5523 22 18 21.5523 18 21V19C18 15.6863 15.3137 13 12 13H6Z" fill=" {{ request()->routeIs('network') ? '#075985' : '#080341' }}" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1251_98416">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </g>

            </svg>
            <strong class="uppercase text-xs {{ request()->routeIs('network') ? 'text-sky-800' : 'hidden' }}">
                network
            </strong>
        </a>
        <a href="{{ route('explore') }}" class="shrink-0 aspect-[1.12] w-[90px] flex flex-col justify-center items-center {{ request()->routeIs('explore') ? 'border-b border-sky-800 border-b-2' : '' }}">
            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path d="M9.87868 9.87869L15.5355 8.46448L14.1213 14.1213L8.46446 15.5355L9.87868 9.87869Z" stroke=" {{ request()->routeIs('explore') ? '#075985' : '#080341' }}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke=" {{ request()->routeIs('explore') ? '#075985' : '#080341' }}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </g>

            </svg>
            <strong class="uppercase text-xs {{ request()->routeIs('explore') ? 'text-sky-800' : 'hidden' }}">
                explore
            </strong>
        </a>
        <a href="{{ route('feed') }}" class="shrink-0 aspect-[1.12] w-[90px] flex justify-center items-center ">
            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22Z" stroke="#1C274C" stroke-width="1.5" />
                    <path opacity="0.5" d="M8 12H8.009M11.991 12H12M15.991 12H16" stroke="#1C274C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>

            </svg>
        </a>
        <a href="{{ route('feed') }}" class="shrink-0 aspect-[1.12] w-[90px] flex justify-center items-center">
            <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path d="M11.713 7.14977C12.1271 7.13953 12.4545 6.79555 12.4443 6.38146C12.434 5.96738 12.0901 5.63999 11.676 5.65023L11.713 7.14977ZM6.30665 12.193H7.05665C7.05665 12.1874 7.05659 12.1818 7.05646 12.1761L6.30665 12.193ZM6.30665 14.51L6.34575 15.259C6.74423 15.2382 7.05665 14.909 7.05665 14.51H6.30665ZM6.30665 17.6L6.26755 18.349C6.28057 18.3497 6.29361 18.35 6.30665 18.35L6.30665 17.6ZM9.41983 18.35C9.83404 18.35 10.1698 18.0142 10.1698 17.6C10.1698 17.1858 9.83404 16.85 9.41983 16.85V18.35ZM10.9445 6.4C10.9445 6.81421 11.2803 7.15 11.6945 7.15C12.1087 7.15 12.4445 6.81421 12.4445 6.4H10.9445ZM12.4445 4C12.4445 3.58579 12.1087 3.25 11.6945 3.25C11.2803 3.25 10.9445 3.58579 10.9445 4H12.4445ZM11.713 5.65023C11.299 5.63999 10.955 5.96738 10.9447 6.38146C10.9345 6.79555 11.2619 7.13953 11.676 7.14977L11.713 5.65023ZM17.0824 12.193L16.3325 12.1761C16.3324 12.1818 16.3324 12.1874 16.3324 12.193H17.0824ZM17.0824 14.51H16.3324C16.3324 14.909 16.6448 15.2382 17.0433 15.259L17.0824 14.51ZM17.0824 17.6V18.35C17.0954 18.35 17.1084 18.3497 17.1215 18.349L17.0824 17.6ZM13.9692 16.85C13.555 16.85 13.2192 17.1858 13.2192 17.6C13.2192 18.0142 13.555 18.35 13.9692 18.35V16.85ZM10.1688 17.6027C10.1703 17.1885 9.83574 16.8515 9.42153 16.85C9.00732 16.8485 8.67034 17.1831 8.66886 17.5973L10.1688 17.6027ZM10.0848 19.3L10.6322 18.7873L10.6309 18.786L10.0848 19.3ZM13.3023 19.3L12.7561 18.786L12.7549 18.7873L13.3023 19.3ZM14.7182 17.5973C14.7167 17.1831 14.3797 16.8485 13.9655 16.85C13.5513 16.8515 13.2167 17.1885 13.2182 17.6027L14.7182 17.5973ZM9.41788 16.85C9.00366 16.85 8.66788 17.1858 8.66788 17.6C8.66788 18.0142 9.00366 18.35 9.41788 18.35V16.85ZM13.9692 18.35C14.3834 18.35 14.7192 18.0142 14.7192 17.6C14.7192 17.1858 14.3834 16.85 13.9692 16.85V18.35ZM11.676 5.65023C8.198 5.73622 5.47765 8.68931 5.55684 12.2099L7.05646 12.1761C6.99506 9.44664 9.09735 7.21444 11.713 7.14977L11.676 5.65023ZM5.55665 12.193V14.51H7.05665V12.193H5.55665ZM6.26755 13.761C5.0505 13.8246 4.125 14.8488 4.125 16.055H5.625C5.625 15.6136 5.95844 15.2792 6.34575 15.259L6.26755 13.761ZM4.125 16.055C4.125 17.2612 5.0505 18.2854 6.26755 18.349L6.34575 16.851C5.95843 16.8308 5.625 16.4964 5.625 16.055H4.125ZM6.30665 18.35H9.41983V16.85H6.30665V18.35ZM12.4445 6.4V4H10.9445V6.4H12.4445ZM11.676 7.14977C14.2917 7.21444 16.3939 9.44664 16.3325 12.1761L17.8322 12.2099C17.9114 8.68931 15.191 5.73622 11.713 5.65023L11.676 7.14977ZM16.3324 12.193V14.51H17.8324V12.193H16.3324ZM17.0433 15.259C17.4306 15.2792 17.764 15.6136 17.764 16.055H19.264C19.264 14.8488 18.3385 13.8246 17.1215 13.761L17.0433 15.259ZM17.764 16.055C17.764 16.4964 17.4306 16.8308 17.0433 16.851L17.1215 18.349C18.3385 18.2854 19.264 17.2612 19.264 16.055H17.764ZM17.0824 16.85H13.9692V18.35H17.0824V16.85ZM8.66886 17.5973C8.66592 18.4207 8.976 19.2162 9.53861 19.814L10.6309 18.786C10.335 18.4715 10.1673 18.0473 10.1688 17.6027L8.66886 17.5973ZM9.53739 19.8127C10.0977 20.4109 10.8758 20.7529 11.6935 20.7529V19.2529C11.2969 19.2529 10.9132 19.0873 10.6322 18.7873L9.53739 19.8127ZM11.6935 20.7529C12.5113 20.7529 13.2894 20.4109 13.8497 19.8127L12.7549 18.7873C12.4739 19.0873 12.0901 19.2529 11.6935 19.2529V20.7529ZM13.8484 19.814C14.4111 19.2162 14.7211 18.4207 14.7182 17.5973L13.2182 17.6027C13.2198 18.0473 13.0521 18.4715 12.7561 18.786L13.8484 19.814ZM9.41788 18.35H13.9692V16.85H9.41788V18.35Z" fill="#000000" />
                </g>

            </svg>
        </a>

    </div>
    <div class="flex items-center pr-5 hidden max-md:flex">
        <!-- Bouton du menu burger -->
        <button id="burger-menu" class="block flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-gray-900">
            <svg class="h-3 w-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
        <!-- Contenu du menu burger -->
        <div id="burger-menu-content" class="flex flex-col items-center justify-center text-xs bg-white border border-gray-200 py-4 px-2 absolute top-16 right-0 z-10 hidden w-1/2 h-screen">
            <a href="#" class="text-gray-900 hover:text-gray-700">Accueil</a>
            <a href="#" class="text-gray-900 hover:text-gray-700">Profil</a>
            <a href="#" class="text-gray-900 hover:text-gray-700">Paramètres</a>
            <a href="#" class="text-gray-900 hover:text-gray-700">Déconnexion</a>
        </div>

    </div>


    <div class="relative max-md:hidden gap-5 justify-between text-xs mr-12 max-md:flex">
        <a href="{{ route('profile.show', ['user' => auth()->id()]) }}" class="flex gap-4 items-center" onclick="toggleDropdown(event)">
            <div class="shrink-0 self-stretch w-px h-20 border border-solid bg-zinc-100 border-zinc-100"></div>
            @if(Auth::user()->profile && Auth::user()->profile->profile_image)
            <img src="{{ asset('storage/profile/' . Auth::user()->profile->profile_image) }}" class="rounded-full shrink-0 self-stretch my-auto aspect-square w-[42px]" />
            @else
            <img src="{{ asset('storage/profile/unknown.png') }}" class="rounded-full shrink-0 self-stretch my-auto aspect-square w-[42px]" />
            @endif
            <div class="flex flex-col self-stretch my-auto">
                <div class="uppercase text-neutral-900">{{ Auth::user()->name }}</div>
                <div class="flex  items-center justify-start gap-2 mt-1">
                    <div class="w-2 h-2 rounded-full bg-green-400"></div>
                    <div class="text-neutral-500">online</div>
                </div>
            </div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <!-- Dropdown menu -->
        <div id="dropdownMenu" class="absolute right-0 mt-1 w-40 bg-white border border-gray-200 rounded shadow-lg z-10 hidden">
            <a href="{{ route('profile.show', ['user' => auth()->id()]) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
            <a href="{{ route('preferences.show') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Preferences</a>
            <a onclick="fetchSavedItems()" class="cursor-pointer block px-4 py-2 text-gray-800 hover:bg-gray-200">Mes enregistrements</a>

            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>
        </div>
    </div>




    <div id="savedItemsPopup" class="z-20 fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg p-8 w-[40%] relative">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Saves </h2>
                <button onclick="closeSavesPopup()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <ul id="SavesList" class="mb-4">
                <!-- Saved items will be dynamically inserted here -->
            </ul>
        </div>
    </div>



    <script>
        // Sélectionnez l'élément du bouton de menu burger et l'élément du contenu du menu burger
        var burgerButton = document.getElementById('burger-menu');
        var menuContent = document.getElementById('burger-menu-content');

        // Ajoutez un gestionnaire d'événements de clic au bouton de menu burger
        burgerButton.addEventListener('click', function() {
            // Vérifiez si l'élément du contenu du menu burger est actuellement masqué
            var isHidden = menuContent.classList.contains('hidden');

            // Si l'élément est masqué, montrez-le en supprimant la classe "hidden"
            // Sinon, masquez-le en ajoutant la classe "hidden"
            if (isHidden) {
                menuContent.classList.remove('hidden');
            } else {
                menuContent.classList.add('hidden');
            }
        });


        function closeSavesPopup() {
            var popup = document.getElementById('savedItemsPopup');
            popup.classList.add('hidden');
        }
    </script>
    <script>
        function toggleDropdown(event) {
            event.preventDefault();
            var dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        }
    </script>


    <script>
        function fetchSavedItems() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            fetch('/saved-items')
                .then(response => response.json())
                .then(data => {
                    var savedItemsList = document.getElementById('SavesList');
                    savedItemsList.innerHTML = ''; // Clear previous saved items
                    data.forEach(project => {
                        // Créez un élément de liste pour chaque projet
                        var listItem = document.createElement('li');
                        listItem.classList.add('flex', 'items-center', 'py-2');

                        // Incluez dynamiquement la vue pour le projet
                        console.log(project);
                        fetch('/render-project-view', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken,
                                },

                                body: JSON.stringify({
                                    project: project
                                }),
                            })
                            .then(response => response.text())
                            .then(html => {
                                listItem.innerHTML = html;
                                savedItemsList.appendChild(listItem);
                            })
                            .catch(error => {
                                console.error("Une erreur s'est produite lors de l'inclusion de la vue du projet:", error);
                            });
                    });
                    const savedItemsPopup = document.getElementById('savedItemsPopup');
                    savedItemsPopup.classList.remove('hidden');
                })
                .catch(error => {
                    console.error("Une erreur s'est produite lors du traitement des données des projets:", error);
                });
        }
    </script>



</nav>