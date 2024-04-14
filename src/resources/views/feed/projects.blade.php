<div class="flex flex-col px-8 py-6 mt-10 w-full bg-white rounded-3xl shadow-lg text-neutral-900 max-md:px-5 max-md:max-w-full">
    <div class="flex gap-5 justify-between items-center w-full max-md:flex-wrap max-md:mr-1.5 max-md:max-w-full">
        <div class="flex gap-4 px-px">
            @if($project->user->profile && $project->user->profile->profile_image)
            <img src="{{ asset('storage/profile/' . $project->user->profile->profile_image) }}" class="shrink-0 aspect-square w-[52px] rounded-full" />
            @else
            <img src="{{ asset('storage/profile/unknown.png') }}" class="shrink-0 aspect-square w-[52px] rounded-full" />
            @endif
            <div class="flex flex-col my-auto">
                <div class="text-sm">{{ $project->user->name }}</div>
                <div class="mt-2.5 text-xs leading-4">{{ $project->user->profile->title }}</div>
            </div>
        </div>
        <div class="relative  gap-5 justify-between text-xs max-md:flex cursor-pointer">
            <svg onclick="toggleDropdownProject(event)" fill="#000000" width="25px" height="25px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" id="Glyph" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                <g id="SVGRepo_iconCarrier">

                    <path d="M13,16c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,14.346,13,16z" id="XMLID_294_" />

                    <path d="M13,26c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,24.346,13,26z" id="XMLID_295_" />

                    <path d="M13,6c0,1.654,1.346,3,3,3s3-1.346,3-3s-1.346-3-3-3S13,4.346,13,6z" id="XMLID_297_" />

                </g>

            </svg>


            <div id="Drop_project_menu" class="text-md absolute right-0 mt-1 w-40 bg-white border border-gray-200 rounded shadow-lg z-10 hidden">
                <a onclick="openLikesPopup('{{$project->id}}')" class="block px-5 py-3 text-gray-800 hover:bg-gray-200">See Likes</a>
                <a  href="{{ route('profile.show', ['user' => $project->user]) }}" class="block px-5 py-3 text-gray-800 hover:bg-gray-200">View User Profile</a>
                <a href="#" class="block px-5 py-3 text-gray-800 hover:bg-gray-200">Report Project</a>
            </div>
        </div>



        <script>
            function toggleDropdownProject(event) {
                var dropdownMenu = event.target.nextElementSibling;
                dropdownMenu.classList.toggle('hidden');
            }
        </script>


        <!-- pop up like -->
        <div id="likesPopup" class="z-20 fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex justify-center items-center hidden">
            <div class="bg-white rounded-lg p-8 w-[40%] relative">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold">Likes (<span id="likesCount">0</span>)</h2>
                    <button onclick="closeLikesPopup()" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <ul id="likesList" >
                    <!-- Likes will be dynamically inserted here -->
                </ul>
            </div>
        </div>


        <script>
            function openLikesPopup(projectId) {


                // Make AJAX request to get likes
                fetch('/projects/' + projectId + '/likes')
                    .then(response => response.json())
                    .then(data => {
                        var likesList = document.getElementById('likesList');
                        likesList.innerHTML = '';
                        const likesCount = data.likes.length;
                        document.getElementById('likesCount').textContent = likesCount;

                        data.likes.forEach(like => {
                            const listItem = document.createElement('li');
                            listItem.classList.add('flex', 'items-center', 'py-2');

                            const userImage = document.createElement('img');
                            if (like.user.profile && like.user.profile.profile_image) {
                                // Construction de l'URL de l'image de profil si elle est disponible
                                userImage.src = '{{ asset("storage/profile/") }}' + '/' + like.user.profile.profile_image;
                            } else {
                                // Utilisation de l'image par défaut si aucune image de profil n'est disponible
                                userImage.src = '{{ asset("storage/profile/unknown.png") }}';
                            }
                            userImage.alt = 'Profile Image';
                            userImage.classList.add('w-10', 'h-10', 'rounded-full', 'mr-4');
                            listItem.appendChild(userImage);

                            const userName = document.createElement('span');
                            userName.textContent = like.user.name; // Nom de l'utilisateur
                            userName.classList.add('text-gray-800');
                            listItem.appendChild(userName);

                            likesList.appendChild(listItem);
                        });
                        var popup = document.getElementById('likesPopup');
                popup.classList.remove('hidden');

                    });


            }

            function closeLikesPopup() {
                var popup = document.getElementById('likesPopup');
                popup.classList.add('hidden');
            }
        </script>






    </div>
    <div class="mt-5 mb-2 text-lg leading-5 max-md:max-w-full "> <strong>{{$project->title}}</strong> </div>
    <div class="text-sm max-h-24 mb-4 overflow-hidden leading-6 max-md:max-w-full" id="description_{{$project->id}}">
        {{$project->description}}
    </div>
    @if(strlen($project->description) > 120)
    <button class="toggleDescriptionBtn text-sm text-blue-500 cursor-pointer">...lire la suite</button>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var description = document.getElementById('description_{{$project->id}}');
            var toggleBtn = description.nextElementSibling;

            toggleBtn.addEventListener('click', function() {
                if (description.classList.contains('max-h-24')) {
                    description.classList.remove('max-h-24');
                    toggleBtn.textContent = 'réduire';
                } else {
                    description.classList.add('max-h-24');
                    toggleBtn.textContent = '...lire la suite';
                }
            });
        });
    </script>



    @php
    $mediaData = [];

    @endphp


    @foreach ($project->media as $media)
    @if ($media->type === 'document')
    <div class="flex gap-5 justify-between px-6 py-5 mt-5 w-full bg-indigo-50 rounded leading-[150%] max-md:flex-wrap max-md:pr-5 max-md:max-w-full">
        <div class="flex gap-4">
            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ce3b78eb4910f8881d4d5316b82b4352381767a0953bf889bdd252361cba0248?" class="shrink-0 aspect-square w-[42px]" />
            <div class="flex flex-col self-start mt-1.5">
                <div class="text-sm ">{{ $media->path }}</div>
                <div class="mt-3.5 text-xs">{{ strtoupper(pathinfo(asset('storage/documents/'.$media->path), PATHINFO_EXTENSION)) }} file, {{ round(Storage::size('public/documents/'.$media->path) / 1024, 2) }} Ko</div>
            </div>
        </div>
        <div class="my-auto">
            <a href="{{ asset('storage/documents/'.$media->path) }}" download>
                <svg width="26px" height="26px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                    <g id="SVGRepo_iconCarrier">
                        <path d="M12 7L12 14M12 14L15 11M12 14L9 11" stroke="#0284c7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M16 17H12H8" stroke="#0284c7" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C21.5093 4.43821 21.8356 5.80655 21.9449 8" stroke="#0284c7" stroke-width="1.5" stroke-linecap="round" />
                    </g>
                </svg>
            </a>
        </div>

    </div>



    @elseif ($media->type === 'link')
    <!-- Afficher le lien en bleu -->
    <a href="{{ $media->path }}" class="text-blue-500 hover:underline" target="_blank">{{ $media->path }}</a>






    @elseif ($media->type === 'image')
    @php
    $mediaData[] = [
    'type' => 'image',
    'path' => asset('storage/images/'.$media->path)
    ];
    @endphp
    @elseif ($media->type === 'video')
    @php
    $mediaData[] = [
    'type' => 'video',
    'path' => asset('storage/videos/'.$media->path)
    ];
    @endphp

    @endif



    @endforeach




    <div class="relative overflow-hidden" id="carousel_{{$project->id}}" data-media="{{ json_encode($mediaData) }}">
        <div class="flex carousel-scroll">
            <!-- Affichage de la première image ou vidéo dans le carrousel -->
            @foreach($mediaData as $media)
            @if ($media['type'] === 'image')
            <div class="w-full flex-shrink-0">
                <img src="{{ $media['path'] }}" alt="Image">
            </div>
            @elseif ($media['type'] === 'video')
            <div class="w-full flex-shrink-0">
                <video controls>
                    <source src="{{ $media['path'] }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            @endif
            @endforeach
        </div>
        <!-- Boutons de navigation du carrousel -->
        @if (count($mediaData) > 1)
        <button class="prevBtn absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-md">Previous</button>
        <button class="nextBtn absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-md">Next</button>
        @endif
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('[id^="carousel_"]').forEach(function(carousel) {
                var mediaData = JSON.parse(carousel.getAttribute('data-media'));
                var totalMedia = mediaData.length;
                var currentMediaIndex = 0;

                function nextMedia() {
                    currentMediaIndex = (currentMediaIndex + 1) % totalMedia;
                    updateMedia();
                }

                function prevMedia() {
                    currentMediaIndex = currentMediaIndex === 0 ? totalMedia - 1 : currentMediaIndex - 1;
                    updateMedia();
                }

                function updateMedia() {
                    var flexContainer = carousel.querySelector('.flex');
                    flexContainer.innerHTML = ''; // Nettoyer le contenu du carrousel
                    if (totalMedia > 0) {
                        var currentMedia = mediaData[currentMediaIndex];
                        if (currentMedia['type'] === 'image') {
                            var img = document.createElement('img');
                            img.src = currentMedia['path'];
                            img.alt = 'Image';
                            flexContainer.appendChild(img);
                        } else if (currentMedia['type'] === 'video') {
                            var video = document.createElement('video');
                            video.controls = true;
                            var source = document.createElement('source');
                            source.src = currentMedia['path'];
                            source.type = 'video/mp4';
                            video.appendChild(source);
                            flexContainer.appendChild(video);
                        }
                    }
                }

                if (totalMedia > 1) { // Vérifier s'il y a plus d'un média dans le carrousel
                    carousel.querySelector('.nextBtn').addEventListener('click', nextMedia);
                    carousel.querySelector('.prevBtn').addEventListener('click', prevMedia);
                }
            });
        });
    </script>

    <div class="flex gap-5 justify-between pr-4 mt-5 w-full text-xs uppercase whitespace-nowrap max-md:flex-wrap max-md:max-w-full">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex gap-2 justify-center self-stretch">
                <div id="like">
                    <svg onclick="toggleColors(this , '{{ $project->id }}')" id="likeIcon" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="{{ $project->isLikedBy(auth()->user()) ? '#ff0000' : '#000000' }}">
                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                        <g id="SVGRepo_iconCarrier">
                            <path id="heartPath" d="M2 9.1371C2 14 6.01943 16.5914 8.96173 18.9109C10 19.7294 11 20.5 12 20.5C13 20.5 14 19.7294 15.0383 18.9109C17.9806 16.5914 22 14 22 9.1371C22 4.27416 16.4998 0.825464 12 5.50063C7.50016 0.825464 2 4.27416 2 9.1371Z" fill="{{ $project->isLikedBy(auth()->user()) ? '#ff0000' : '#ffffff' }}" />
                        </g>
                    </svg>



                </div>
                <div class="justify-center py-1 my-auto">{{$project->likes()->count()}}</div>
            </div>

            <script>
                function toggleColors(svgElement, projectId) {
                    var pathElement = svgElement.querySelector('#heartPath');
                    var strokeColor = svgElement.getAttribute('stroke');
                    var fillColor = pathElement.getAttribute('fill');

                    // Création de l'objet XMLHttpRequest
                    var xhr = new XMLHttpRequest();

                    // Préparation des données à envoyer
                    var data = 'project_id=' + projectId;

                    // Configuration de la requête
                    xhr.open('POST', '/projects/like', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector('meta[name="csrf-token"]').content);
                    // Gestion de la réponse de la requête
                    xhr.onload = function() {
                        if (xhr.status >= 200 && xhr.status < 300) {
                            var response = xhr.responseText;
                            console.log(response);
                            if (response === 'like') {
                                // Si la réponse est 'like', remplir le cœur en rouge
                                pathElement.setAttribute('fill', '#ff0000');
                                svgElement.setAttribute('stroke', '#ff0000');
                            } else if (response === 'dislike') {
                                // Si la réponse est 'dislike', remplir le cœur en blanc
                                pathElement.setAttribute('fill', '#ffffff');
                                svgElement.setAttribute('stroke', '#000000');
                            } else {
                                console.error('Réponse inattendue du serveur :', response);
                            }
                        } else {
                            console.error('Erreur lors de la requête :', xhr.statusText);
                        }
                    };

                    // Gestion des erreurs de la requête
                    xhr.onerror = function() {
                        console.error('Erreur lors de la requête :', xhr.statusText);
                    };

                    // Envoi de la requête avec les données
                    xhr.send(data);
                }
            </script>



            <div class="flex gap-2 justify-center self-stretch my-auto">
                <a href="{{ route('project.comments', $project->id) }}">
                    <svg width="25px" height="25px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="red">
                        <g id="SVGRepo_bgCarrier" stroke-width="0" />
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                        <g id="SVGRepo_iconCarrier">
                            <title>comment-1</title>
                            <desc>Created with Sketch Beta.</desc>
                            <defs> </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                <g id="Icon-Set" sketch:type="MSLayerGroup" transform="translate(-100.000000, -255.000000)" fill="#082f49">
                                    <path d="M116,281 C114.832,281 113.704,280.864 112.62,280.633 L107.912,283.463 L107.975,278.824 C104.366,276.654 102,273.066 102,269 C102,262.373 108.268,257 116,257 C123.732,257 130,262.373 130,269 C130,275.628 123.732,281 116,281 L116,281 Z M116,255 C107.164,255 100,261.269 100,269 C100,273.419 102.345,277.354 106,279.919 L106,287 L113.009,282.747 C113.979,282.907 114.977,283 116,283 C124.836,283 132,276.732 132,269 C132,261.269 124.836,255 116,255 L116,255 Z" id="comment-1" sketch:type="MSShapeGroup"> </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
                <div class="justify-center py-1 my-auto italic">{{$project->comments()->count()}}</div>
            </div>
            <div id="save">


                <svg onclick="toggleSave(this, '{{ $project->id }}')" id="saveIcon" fill="{{ $project->isSavedBy(auth()->user()) ? '#000000' : '#ffffff' }}" width="25px" height="25px" viewBox="0 0 56.00 56.00" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" stroke-width="0.001">

                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#000000" stroke-width="5.5">

                        <path d="M 12.0156 53.1602 C 13.2344 53.1602 13.8672 52.4805 16.3047 50.1836 L 26.8516 40.0586 C 27.3906 39.5664 27.6719 39.4258 28 39.4258 C 28.3281 39.4258 28.6563 39.5898 29.1484 40.0586 L 41.1250 51.5898 C 42.0625 52.4805 42.7890 53.1602 43.9844 53.1602 C 45.4609 53.1602 46.5859 52.2696 46.5859 50.1367 L 46.5859 10.1758 C 46.5859 5.3008 44.1719 2.8398 39.3203 2.8398 L 16.6797 2.8398 C 11.8516 2.8398 9.4141 5.3008 9.4141 10.1758 L 9.4141 50.1367 C 9.4141 52.2696 10.5625 53.1602 12.0156 53.1602 Z" />

                    </g>

                    <g id="SVGRepo_iconCarrier">

                        <path d="M 12.0156 53.1602 C 13.2344 53.1602 13.8672 52.4805 16.3047 50.1836 L 26.8516 40.0586 C 27.3906 39.5664 27.6719 39.4258 28 39.4258 C 28.3281 39.4258 28.6563 39.5898 29.1484 40.0586 L 41.1250 51.5898 C 42.0625 52.4805 42.7890 53.1602 43.9844 53.1602 C 45.4609 53.1602 46.5859 52.2696 46.5859 50.1367 L 46.5859 10.1758 C 46.5859 5.3008 44.1719 2.8398 39.3203 2.8398 L 16.6797 2.8398 C 11.8516 2.8398 9.4141 5.3008 9.4141 10.1758 L 9.4141 50.1367 C 9.4141 52.2696 10.5625 53.1602 12.0156 53.1602 Z" />

                    </g>

                </svg>
            </div>

            <script>
                function toggleSave(svgElement, projectId) {

                    // Création de l'objet XMLHttpRequest
                    var xhr = new XMLHttpRequest();

                    // Préparation des données à envoyer
                    var data = 'project_id=' + projectId;

                    // Configuration de la requête
                    xhr.open('POST', '/projects/save', true);
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector('meta[name="csrf-token"]').content);

                    // Gestion de la réponse de la requête
                    xhr.onload = function() {
                        if (xhr.status >= 200 && xhr.status < 300) {
                            var response = xhr.responseText;

                            if (response === 'save') {
                                // Si la réponse est 'save', remplir l'icône en bleu
                                svgElement.setAttribute('fill', '#000000');
                            } else if (response === 'unsave') {
                                // Si la réponse est 'unsave', remplir l'icône en gris
                                svgElement.setAttribute('fill', '#ffffff');
                            } else {
                                console.error('Réponse inattendue du serveur :', response);
                            }
                        } else {
                            console.error('Erreur lors de la requête :', xhr.statusText);
                        }
                    };

                    // Gestion des erreurs de la requête
                    xhr.onerror = function() {
                        console.error('Erreur lors de la requête :', xhr.statusText);
                    };

                    // Envoi de la requête avec les données
                    xhr.send(data);
                }
            </script>
        </div>
        <div id="share" class="flex gap-3">
            <p class="copiedText hidden text-xs text-gray-400 p-1">Copied !!</p>
            <svg onclick="CopyLink('{{ $project->id }}', event)" width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                <g id="SVGRepo_iconCarrier">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.803 5.33333C13.803 3.49238 15.3022 2 17.1515 2C19.0008 2 20.5 3.49238 20.5 5.33333C20.5 7.17428 19.0008 8.66667 17.1515 8.66667C16.2177 8.66667 15.3738 8.28596 14.7671 7.67347L10.1317 10.8295C10.1745 11.0425 10.197 11.2625 10.197 11.4872C10.197 11.9322 10.109 12.3576 9.94959 12.7464L15.0323 16.0858C15.6092 15.6161 16.3473 15.3333 17.1515 15.3333C19.0008 15.3333 20.5 16.8257 20.5 18.6667C20.5 20.5076 19.0008 22 17.1515 22C15.3022 22 13.803 20.5076 13.803 18.6667C13.803 18.1845 13.9062 17.7255 14.0917 17.3111L9.05007 13.9987C8.46196 14.5098 7.6916 14.8205 6.84848 14.8205C4.99917 14.8205 3.5 13.3281 3.5 11.4872C3.5 9.64623 4.99917 8.15385 6.84848 8.15385C7.9119 8.15385 8.85853 8.64725 9.47145 9.41518L13.9639 6.35642C13.8594 6.03359 13.803 5.6896 13.803 5.33333Z" fill="#082f49" />
                </g>
            </svg>
        </div>
        <script>
            function CopyLink(projectId, event) {
                var projectLink = window.location.origin + '/projects/' + projectId; // URL originale + slug du projet
                navigator.clipboard.writeText(projectLink);

                // Récupérer l'élément .copiedText associé à l'icône SVG cliqué
                var copiedTextElement = event.target.parentNode.querySelector('.copiedText');

                // Afficher l'élément .copiedText
                copiedTextElement.classList.remove("hidden");

                // Masquer l'élément après 2 secondes
                setTimeout(function() {
                    copiedTextElement.classList.add("hidden");
                }, 1000); // Masquer le message après 2 secondes
            }
        </script>



    </div>
</div>