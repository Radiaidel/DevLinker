<nav class="flex justify-between pr-10 w-full bg-white shadow-sm max-md:flex-wrap max-md:pr-5 max-md:max-w-full">
    <div class="flex items-center px-5 py-4 bg-white">
        <img src="{{ asset('storage/images/devlinker_logo.png') }}" class="w-36" />
    </div>
    <div class="relative max-md:hidden flex  gap-1.5 items-center">
        <a href="{{ route('dashboard') }}" class="shrink-0 aspect-[1.12] w-[90px] flex flex-col justify-center items-center {{ request()->routeIs('dashboard') ? 'border-b border-sky-800 border-b-2': '' }}">
            <svg width="27px" height="27px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.4498 10.275L11.9998 3.1875L2.5498 10.275L2.9998 11.625H3.7498V20.25H20.2498V11.625H20.9998L21.4498 10.275ZM5.2498 18.75V10.125L11.9998 5.0625L18.7498 10.125V18.75H14.9999V14.3333L14.2499 13.5833H9.74988L8.99988 14.3333V18.75H5.2498ZM10.4999 18.75H13.4999V15.0833H10.4999V18.75Z" fill=" {{ request()->routeIs('dashboard') ? '#155e75' : '#080341' }}" />
                </g>

            </svg>
            <strong class="uppercase text-xs absolute bottom-2 {{ request()->routeIs('dashboard') ? 'text-sky-800' : 'hidden' }}">
                dashboard
            </strong>
        </a>
        <a href="{{ route('users') }}" class="shrink-0 aspect-[1.12] w-[90px] flex flex-col justify-center items-center {{ request()->routeIs('users') ? 'border-b border-sky-800 border-b-2' : '' }}">
            <svg width="27px" height="27px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <g clip-path="url(#clip0_1251_98416)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9 0C5.96243 0 3.5 2.46243 3.5 5.5C3.5 8.53757 5.96243 11 9 11C12.0376 11 14.5 8.53757 14.5 5.5C14.5 2.46243 12.0376 0 9 0ZM5.5 5.5C5.5 3.567 7.067 2 9 2C10.933 2 12.5 3.567 12.5 5.5C12.5 7.433 10.933 9 9 9C7.067 9 5.5 7.433 5.5 5.5Z" fill=" {{ request()->routeIs('users') ? '#155e75' : '#080341' }}" />
                        <path d="M15.5 0C14.9477 0 14.5 0.447715 14.5 1C14.5 1.55228 14.9477 2 15.5 2C17.433 2 19 3.567 19 5.5C19 7.433 17.433 9 15.5 9C14.9477 9 14.5 9.44771 14.5 10C14.5 10.5523 14.9477 11 15.5 11C18.5376 11 21 8.53757 21 5.5C21 2.46243 18.5376 0 15.5 0Z" fill=" {{ request()->routeIs('users') ? '#155e75' : '#080341' }}" />
                        <path d="M19.0837 14.0157C19.3048 13.5096 19.8943 13.2786 20.4004 13.4997C22.5174 14.4246 24 16.538 24 19V21C24 21.5523 23.5523 22 23 22C22.4477 22 22 21.5523 22 21V19C22 17.3613 21.0145 15.9505 19.5996 15.3324C19.0935 15.1113 18.8625 14.5217 19.0837 14.0157Z" fill=" {{ request()->routeIs('users') ? '#155e75' : '#080341' }}" />
                        <path d="M6 13C2.68629 13 0 15.6863 0 19V21C0 21.5523 0.447715 22 1 22C1.55228 22 2 21.5523 2 21V19C2 16.7909 3.79086 15 6 15H12C14.2091 15 16 16.7909 16 19V21C16 21.5523 16.4477 22 17 22C17.5523 22 18 21.5523 18 21V19C18 15.6863 15.3137 13 12 13H6Z" fill=" {{ request()->routeIs('users') ? '#155e75' : '#080341' }}" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1251_98416">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </g>

            </svg>
            <strong class="uppercase text-xs  absolute bottom-2  {{ request()->routeIs('users') ? 'text-sky-800' : 'hidden' }}">
                Users
            </strong>
        </a>
        <a href="{{ route('explore') }}" class="shrink-0 aspect-[1.12] w-[90px] flex flex-col justify-center items-center {{ request()->routeIs('explore') ? 'border-b border-sky-800 border-b-2' : '' }}">
            <svg width="29px" height="29px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">
                    <path d="M9.87868 9.87869L15.5355 8.46448L14.1213 14.1213L8.46446 15.5355L9.87868 9.87869Z" stroke=" {{ request()->routeIs('explore') ? '#155e75' : '#080341' }}" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke=" {{ request()->routeIs('explore') ? '#155e75' : '#080341' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>

            </svg>
            <strong class="uppercase text-xs  absolute bottom-2  {{ request()->routeIs('explore') ? 'text-sky-800' : 'hidden' }}">
                explore
            </strong>
        </a>
        <a href="{{ route('report') }}" class="relative  shrink-0 aspect-[1.12] w-[90px] flex flex-col justify-center items-center   {{ request()->routeIs('report') ? 'border-b border-sky-800 border-b-2' : '' }} ">
            <svg fill=" {{ request()->routeIs('report') ? '#155e75' : '#000000' }} " width="25px" height="25px" viewBox="0 0 24.00 24.00" xmlns="http://www.w3.org/2000/svg" stroke=" {{ request()->routeIs('report') ? '#155e75' : '#000000' }}" stroke-width="0.5">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.048"></g>
                <g id="SVGRepo_iconCarrier">
                    <path fill-rule="evenodd" d="M3.25 4a.25.25 0 00-.25.25v12.5c0 .138.112.25.25.25h2.5a.75.75 0 01.75.75v3.19l3.427-3.427A1.75 1.75 0 0111.164 17h9.586a.25.25 0 00.25-.25V4.25a.25.25 0 00-.25-.25H3.25zm-1.75.25c0-.966.784-1.75 1.75-1.75h17.5c.966 0 1.75.784 1.75 1.75v12.5a1.75 1.75 0 01-1.75 1.75h-9.586a.25.25 0 00-.177.073l-3.5 3.5A1.457 1.457 0 015 21.043V18.5H3.25a1.75 1.75 0 01-1.75-1.75V4.25zM12 6a.75.75 0 01.75.75v4a.75.75 0 01-1.5 0v-4A.75.75 0 0112 6zm0 9a1 1 0 100-2 1 1 0 000 2z"></path>
                </g>
            </svg>
            <span id="report_count" class="absolute bg-red-600 text-white h-4 w-4 text-center top-5 right-6 text-xs rounded-full {{request()->routeIs('report') ? 'hidden' : '' }}">{{ App\Models\Project::countReportedProjects() }}
            </span>
            <strong class="uppercase text-xs  absolute bottom-2  {{ request()->routeIs('report') ? 'text-sky-800' : 'hidden' }}">
                report
            </strong>
        </a>



        <span id="notif_count" class=""></span>




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


    <script src="{{ asset('js/project_script.js') }}" defer></script>


    <div id="savedItemsPopup" class="z-20 fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg p-8 w-[40%] h-[95%] relative overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Saves </h2>
                <button onclick="closeSavedItemsPopup()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <ul id="SavesList" class=" ">
                <!-- Saved items will be dynamically inserted here -->
            </ul>
        </div>
    </div>



    <script>
        var burgerButton = document.getElementById('burger-menu');
        var menuContent = document.getElementById('burger-menu-content');

        burgerButton.addEventListener('click', function() {

            var isHidden = menuContent.classList.contains('hidden');

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
                .then(response => response.text())
                .then(data => {
                    var savedItemsList = document.getElementById('SavesList');
                    savedItemsList.innerHTML = '';

                    savedItemsList.innerHTML = data;

                    const savedItemsPopup = document.getElementById('savedItemsPopup');
                    savedItemsPopup.classList.remove('hidden');
                })
                .catch(error => {
                    console.error("Une erreur s'est produite lors du traitement des données des projets:", error);
                });
        }

        function closeSavedItemsPopup() {
            const savedItemsPopup = document.getElementById('savedItemsPopup');
            savedItemsPopup.classList.add('hidden');
        }
    </script>


</nav>